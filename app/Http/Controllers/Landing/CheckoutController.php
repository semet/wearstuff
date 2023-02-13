<?php

namespace App\Http\Controllers\Landing;

use App\Enums\PaymentStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Courier;
use App\Models\Order;
use App\Services\CartService;
use App\Services\Midtrans\CreateSnapTokenService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Irfa\RajaOngkir\Facades\Ongkir;
use Str;

class CheckoutController extends Controller
{
    public function __construct(
        public CartService $cart
    ) {
    }
    public function index()
    {
        $address = Address::where('user_id', auth()->id())->get();
        $couriers = Courier::all();

        return view('pages.checkout.index', [
            'address' => $address,
            'couriers' => $couriers
        ]);
    }

    public function chooseDeliveryService(Request $request)
    {
        $cityId = Address::find($request->address)->city_id;
        $params = [
            'origin' => config('app.city_origin'),
            'destination' => $cityId,
            'weight' => $this->cart->getWeight(),
            'courier' => $request->courier
        ];
        $costDetails = Ongkir::find($params)->costDetails()->get();
        return view('pages.checkout.delivery', [
            'costDetails' => $costDetails,
            'selectedAddress' => $request->address
        ]);
    }

    public function insertData(Request $request)
    {
        DB::beginTransaction();
        try {
            ////////////////////////
            $order = new Order;
            $order->user_id = auth()->id();
            $order->number = Str::of(Str::random(6))->upper();
            $order->total_price = $this->cart->totalPiceWithDelivery($request->cost_value);
            $order->payment_status = PaymentStatusEnum::PENDING;
            /// no we create snap token
            /// but first we need items
            /// her we push delivery description to the items collection
            $items = $this->cart->itemsWithTax()->push([
                'service' => $request->service,
                'name' => $request->description,
                'price' => $request->cost_value,
                'quantity' => 1,
                'subtotal' => $request->cost_value,
            ])->toArray();
            // finally, create Snap token with required params
            $midtrans = new CreateSnapTokenService(
                items: $items,
                number: $order->number,
                total: $this->cart->totalPiceWithDelivery($request->cost_value)
            );
            $snapToken = $midtrans->getSnapToken();
            // continue on... we add snap token to the created order above..
            $order->snap_token = $snapToken;
            $order->save();
            // don't forget to save the delivery items
            $order->items()->createMany(
                $this->cart->items()->map(function ($item) {
                    return [
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity
                    ];
                })->toArray()
            );
            // and finally the delivery service
            $order->deliveryService()->create([
                'address_id' => $request->selectedAddress,
                'name' => $request->service,
                'description' => $request->description,
                'cost' => $request->cost_value,
                'estimated_day' => $request->estimated_day,
                'note' => $request->note,

            ]);
            DB::commit();
            return redirect()->route('checkout.preview', $order);
        } catch (Exception $e) {
            DB::rollBack();
            info($e->getMessage());
        }
    }

    public function preview(Order $order)
    {
        return view('pages.checkout.preview', [
            'order' => $order,
            'cart' => $this->cart,
            'snapToken' => $order->snap_token
        ]);
    }

    public function checkoutSuccess(Order $order)
    {
        return view('pages.checkout.invoice', [
            'order' => $order
        ]);
    }
}
