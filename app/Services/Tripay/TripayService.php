<?php

namespace App\Services\Tripay;

use App\Services\CartService;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class TripayService extends Tripay
{
    public $merchantRef;

    public function __construct()
    {
        parent::__construct();

        $this->merchantRef = Str::of(Str::random(6))->upper();
    }

    /**
     * get Payment Channels
     *
     * @return Collection
     */
    public function getPaymentChannels(): Collection
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get($this->paymentChannelsUrl);

        $decoded =  json_decode($response);

        return collect($decoded->data);
    }

    public function paymentChannels()
    {
        return $this->getPaymentChannels()->groupBy('type')->all();
    }

    public function requestTransaction(string $paymentCode)
    {
        $cart = new CartService();
        $request = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('tripay.api_key')
        ])
            ->post('https://tripay.co.id/api-sandbox/transaction/create', [
                'method' => $paymentCode,
                'merchant_ref' => $this->merchantRef,
                'amount' => $cart->totalPriceWithDelivery(),
                'customer_name' => auth()->user()->name,
                'customer_email' => auth()->user()->email,
                'customer_phone' => auth()->user()->phone,
                'order_items' => $cart->wholeItems(),
                'signature' => $this->createSignature($cart->totalPriceWithDelivery())
            ]);

        return json_decode($request);
    }

    public function createSignature(string|int $amount)
    {
        $signature = hash_hmac(
            'sha256',
            config('tripay.merchant_code') .
                $this->merchantRef .
                $amount,
            config('tripay.private_key')
        );

        return $signature;
    }
}
