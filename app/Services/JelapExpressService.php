<?php

namespace App\Services;

use App\Models\Courier;

class JelapExpressService
{
    public const VIP_COST_LOTENG = 10000;
    public const VIP_COST_OUTSIDE_LOTENG = 17000;
    public const REGULAR_LOTENG = 12000;
    public const REGULAR_OUTSIDE_LOTENG = 20000;

    public const LOTENG_ID = 239;

    public const ESTIMATED_DAY = 2;

    public $cities;
    public $selectedCity;

    public function __construct(string $selectedCity)
    {
        $this->cities = collect(config('jelap.cities'));
        $this->selectedCity = $selectedCity;
    }

    public function details()
    {
        $data = [
            [
                'service' => 'Jelap',
                'description' => $this->getJelap()->title,
                'cost' => [
                    [
                        'value' => $this->getCost(),
                        'etd' => self::ESTIMATED_DAY,
                        'note' => ''
                    ]
                ]
            ]
        ];

        return json_decode(json_encode($data));
    }

    public function getJelap()
    {
        return Courier::where('code', 'jlp')->first();
    }

    public function getCost()
    {
        return $this->isCustomerLoteng() ? self::REGULAR_LOTENG : self::REGULAR_OUTSIDE_LOTENG;
    }

    public function isCustomerLoteng()
    {
        return $this->selectedCity == self::LOTENG_ID;
    }
}
