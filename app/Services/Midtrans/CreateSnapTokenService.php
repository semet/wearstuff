<?php

namespace App\Services\Midtrans;

use App\Services\CartService;
use Illuminate\Support\Collection;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    public function __construct(
        public array $items,
        public string $number,
        public int $total
    ) {
        parent::__construct();
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->number,
                'gross_amount' => $this->total,
            ],
            'item_details' => $this->items,
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone,
            ]
        ];

        return Snap::getSnapToken($params);
    }
}
