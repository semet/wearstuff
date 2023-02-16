<?php

namespace App\Services\Tripay;

abstract class Tripay
{
    public string $merchantCode;
    public string $merchantName;
    public string $apiKey;
    public string $privateKey;
    public string $paymentChannelsUrl;

    public function __construct()
    {
        $this->merchantCode = config('tripay.merchant_code');
        $this->merchantName = config('tripay.merchant_name');
        $this->apiKey = config('tripay.api_key');
        $this->privateKey = config('tripay.private_key');
        // $this->paymentChannelsUrl = 'https://tripay.co.id/api/merchant/payment-channel'; //--> production
        $this->paymentChannelsUrl = 'https://tripay.co.id/api-sandbox/merchant/payment-channel'; //--> dev
    }
}
