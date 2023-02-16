<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function getOrders(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::where('payment_status', $request->status)->get();

            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('number', fn (Order $order) => $order->number)
                ->addColumn('customer', fn (Order $order) => $order->user->name)
                ->addColumn('price', fn (Order $order) => 'Rp. ' . number_format($order->total_price))
                ->addColumn('status', fn (Order $order) => view('admin.datatable.order-status', ['status' => $order->payment_status]))
                ->addColumn('order_date', fn (Order $order) => Carbon::parse($order->created_at)->toFormattedDateString())
                ->addColumn('action', fn (Order $order) => view('admin.datatable.order-buttons', ['order' => $order]))
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function show(Order $order)
    {
        return view('admin.order.show', [
            'order' => $order
        ]);
    }

    public function print(Order $order)
    {
        return view('admin.order.print', ['order' => $order]);
    }
}
