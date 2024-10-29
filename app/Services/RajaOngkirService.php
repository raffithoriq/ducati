<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('RAJAONGKIR_API_KEY');
        $this->baseUrl = env('RAJAONGKIR_BASE_URL');
    }

    public function getProvinces()
    {
        return Http::withHeaders([
            'key' => $this->apiKey,
        ])->get("{$this->baseUrl}/province");
    }

    public function getCities($provinceId)
    {
        return Http::withHeaders([
            'key' => $this->apiKey,
        ])->get("{$this->baseUrl}/city", [
            'province' => $provinceId,
        ]);
    }

    public function getShippingCost($origin, $destination, $weight, $courier)
    {
        return Http::withHeaders([
            'key' => $this->apiKey,
        ])->post("{$this->baseUrl}/cost", [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ]);
    }
}
