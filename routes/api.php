<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrudProdukApiController;
use App\Http\Controllers\Api\CrudCategoryApiController;
use App\Http\Controllers\Api\CrudPelangganApiController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OngkosKirimController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('produk', CrudProdukApiController::class);

Route::apiResource('kategori', CrudCategoryApiController::class);

Route::get('produk-with-category', [CrudProdukApiController::class, 'produkWithCategory']);

Route::get('category-with-product-count', [CrudCategoryApiController::class, 'categoryWithProductCount']);

Route::get('produk-with-transaction-count', [CrudProdukApiController::class, 'produkWithTransactionCount']);

Route::get('/pelanggan/transaksi', [CrudPelangganApiController::class, 'pelangganDenganJumlahTransaksi']);



Route::get('/provinces', [ShippingController::class, 'getProvinces']);
Route::get('/cities/{provinceId}', [ShippingController::class, 'getCities']);
Route::post('/shipping-cost', [ShippingController::class, 'getShippingCost']);
Route::get('/cities/{provinceId}', [OngkosKirimController::class, 'getCities']);
// Route::get('/api/cities/{provinceId}', [OngkosKirimController::class, 'getCities']);
Route::get('/cities/{provinceId}', [OngkosKirimController::class, 'getCities']);

