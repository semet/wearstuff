<x-layouts.admin.main>
    <x-slot:title>
        Order Details
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            @if($order->payment_status == 'paid')
            <div class="callout callout-success text-success">
                <h5><i class="fas fa-check"></i></h5>
                This order has been successfully paid.
            </div>
            @elseif($order->payment_status == 'pending')
            <div class="callout callout-info text-info">
                <h5><i class="fas fa-exclamation-circle"></i></h5>
                    This order is waiting for paiment. You can resend the payment notification to the customer.
            </div>
            @elseif($order->payment_status == 'canceled')
            <div class="callout callout-warning text-warning">
                <h5><i class="fas fa-exclamation-circle"></i></h5>
                    This order has been cancelled by the customer.
            </div>
            @elseif($order->payment_status == 'expire')
            <div class="callout callout-danger text-danger">
                <h5><i class="fas fa-times"></i></h5>
                    This order has already expired.
            </div>
            @endif


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> {{ config('app.name') }}.
                            <small class="float-right">Date: {{ $order->created_at->toFormattedDateString() }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>{{ config('app.name') }}.</strong><br>
                           Kabupaten {{ config('site.address.city') }}<br>
                           {{ config('site.address.line') }}<br>
                            Phone: {{ config('site.phone') }}<br>
                            Email: {{ config('site.email') }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>{{ $order->user->name }}</strong><br>
                            {{ $order->deliveryService->address->province->province }}<br>
                            {{ $order->deliveryService->address->line }}<br>
                            Phone: {{ $order->user->phone }}<br>
                            Email: {{ $order->user->email }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Order ID:</b> {{ $order->number }}<br>
                        <b>Payment Status:</b> {{ $order->payment_status }}<br>
                        <b>Payable Amount:</b> Rp. {{ number_format($order->total_price) }}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>SKU</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product->sku }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp. {{ number_format($item->product->finalPrice()) }}</td>
                                    <td>Rp {{ number_format($item->product->priceWithQuantity($item->quantity)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row d-flex justify-content-end">
                    <div class="col-6">
                        <p class="lead">Amount Due {{ $order->updated_at->toDateString() }}</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$p. {{ number_format($order->getSumPrice()) }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>Rp. {{ number_format($order->deliveryService->cost) }}</td>
                                </tr>
                                <tr>
                                    <th>PPN (10%)</th>
                                    <td>Rp. {{ number_format($order->getTax()) }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>Rp. {{ number_format($order->getTotalPrice()) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('admin.order.print', $order) }}" rel="noopener" target="_blank" class="btn btn-default">
                            <i class="fas fa-print"></i> Print
                        </a>
                        @if($order->payment_status == 'pending')
                        <button type="button" class="btn btn-danger ml-4">
                            <i class="fas fa-envelope"></i> Send payment notification
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div>


</x-layouts.admin.main>
