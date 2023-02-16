<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/adminlte.min.css">
</head>
<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> {{ config('app.name') }}.
                        <small class="float-right">Date: {{ $order->created_at->toFormattedDateString() }}</small>
                    </h2>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>
</html>
