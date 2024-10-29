<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OngkosKirimController extends Controller
{
    public function index()
    {
        // Fetch provinces
        $provinces = $this->getProvinces();
        $cities = []; // Initialize cities as an empty array

        // Only get cities if provinces are available
        if (!empty($provinces)) {
            // Fetch cities for the first province if available
            $defaultProvinceId = $provinces[0]['province_id'];
            $cities = $this->getCities($defaultProvinceId); // Fetch cities for the first province
        }

        // Fetch couriers for the dropdown
        $couriers = $this->getCouriers();

        return view('checkout', [
            'title' => 'Checkout',
            'provinces' => $provinces,
            'cities' => $cities,
            'couriers' => $couriers,
            'shippingCost' => null, // Initialize as null
        ]);
    }

    public function cekOngkosKirim(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'asal' => 'required|numeric',
            'tujuan' => 'required|numeric',
            'berat' => 'required|numeric',
            'kurir' => 'required|string',
            'phone' => 'required|string|max:15',
            'notes' => 'nullable|string',
        ]);

        // Call Rajaongkir API for shipping cost
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $validated['asal'],
            'destination' => $validated['tujuan'],
            'weight' => $validated['berat'],
            'courier' => $validated['kurir'],
        ]);

        // Initialize shipping cost
        $shippingCost = 0; // Default to 0 in case of error

        // Check for a successful response
        if ($response->successful()) {
            // Get response data
            $data = $response->json();
            $shippingCost = $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'] ?? 0; // Get the shipping cost
        } else {
            Log::error('Failed to fetch shipping cost', ['response' => $response->body()]);
            return back()->withErrors(['error' => 'Unable to fetch shipping costs. Please try again later.']);
        }

        // Fetch provinces and couriers again for the dropdowns
        $provinces = $this->getProvinces();
        $couriers = $this->getCouriers();

        // Pass the shipping cost to the view
        return view('checkout', [
            'data' => $data ?? null, // Pass the data if available
            'provinces' => $provinces,
            'couriers' => $couriers,
            'shippingCost' => $shippingCost, // Pass shipping cost to the view
        ]);
    }

    private function getProvinces() // Ensure this method is defined
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get('https://api.rajaongkir.com/starter/province');

        // Check if the request was successful and return the results
        if ($response->successful()) {
            return $response->json()['rajaongkir']['results'] ?? [];
        }

        // Log the error and return an empty array
        Log::error('Failed to fetch provinces', ['response' => $response->body()]);
        return [];
    }
    public function getCities($provinceId)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get("https://api.rajaongkir.com/starter/city?province={$provinceId}");

        // Log the response for debugging
        if ($response->successful()) {
            Log::info('Cities response:', $response->json());
            return $response->json()['rajaongkir']['results'] ?? []; // Return an empty array if no results
        }

        // Log the error if the response is not successful
        Log::error('Failed to fetch cities', ['response' => $response->body()]);
        return []; // Return an empty array if the API call fails
    }

    public function getCouriers()
    {
        return [
            'jne' => 'JNE',
            'pos' => 'POS Indonesia',
            'tiki' => 'TIKI'
        ]; // Provide more detail for display
    }
}
