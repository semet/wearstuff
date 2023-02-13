<?php

namespace App\Http\Controllers\Landing;

use App\Enums\PaymentStatusEnum;
use App\Events\OrderCancelled;
use App\Events\OrderExpired;
use App\Events\PaymentSuccessful;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Log;

class MidtransController extends Controller
{
    public function paymentSuccess(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        //SHA512(order_id+status_code+gross_amount+ServerKey)
        $hashed = hash('SHA512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        $order = Order::where('number', $request->order_id)->first();
        //check if order is Expire ?
        if ($order->payment_status == PaymentStatusEnum::EXPIRE->value) {
            OrderExpired::dispatch($order);
            //Check if order has been cancelled
        } elseif ($order->payment_status == PaymentStatusEnum::CANCELED->value) {
            OrderCancelled::dispatch($order);
        } elseif ($order->payment_status == PaymentStatusEnum::PENDING->value) {
            //check Signature Key
            if ($hashed == $request->signature_key) {
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $order->payment_status = PaymentStatusEnum::PAID;
                    $order->save();

                    PaymentSuccessful::dispatch($order);
                }
            } else {
                Log::error('Invalid signature key');
                throw new Exception('Invalid signature key');
            }
        }
    }
}
