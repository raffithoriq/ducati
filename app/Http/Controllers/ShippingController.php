<?php

namespace App\Http\Controllers;

use App\Services\RajaOngkirService;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    protected $rajaOngkirService;

    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }

    public function getProvinces()
    {
        $response = $this->rajaOngkirService->getProvinces();
        return response()->json($response->json());
    }

    public function getCities($provinceId)
    {
        $response = $this->rajaOngkirService->getCities($provinceId);
        return response()->json($response->json());
    }

    public function getShippingCost(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $weight = $request->input('weight');
        $courier = $request->input('courier');

        $response = $this->rajaOngkirService->getShippingCost($origin, $destination, $weight, $courier);
        return response()->json($response->json());
    }
}
