<div class="tab-pane fade bg-white shadow rounded p-4 @if(request()->get('tab') == 'order') show active @endif" id="orders" role="tabpanel" aria-labelledby="order-history">
    <div class="table-responsive bg-white shadow rounded">
        <table class="table mb-0 table-center table-nowrap">
            <thead>
                <tr>
                    <th scope="col" class="border-bottom">No.</th>
                    <th scope="col" class="border-bottom">Tanggal</th>
                    <th scope="col" class="border-bottom">Status</th>
                    <th scope="col" class="border-bottom">Total</th>
                    <th scope="col" class="border-bottom">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->number }}</th>
                    <td>{{ $order->created_at->toFormattedDateString() }}</td>
                    <td class="@if($order->payment_status == \App\Enums\PaymentStatusEnum::PAID->value) text-success @elseif($order->payment_status == \App\Enums\PaymentStatusEnum::PENDING->value) text-warning @elseif($order->payment_status == \App\Enums\PaymentStatusEnum::EXPIRE->value) text-danger @elseif($order->payment_status == \App\Enums\PaymentStatusEnum::CANCELED->value) text-secondry @endif">
                        {{ $order->payment_status }}
                    </td>
                    <td>Rp. {{ $order->total_price }} <span class="text-muted">({{ $order->items->count() }} Item)</span></td>
                    <td><a href="{{ route('checkout.success', $order) }}" class="text-primary">Lihat <i class="uil uil-arrow-right"></i></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
