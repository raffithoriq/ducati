<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\crudcategorycontroller;
use App\Http\Controllers\crudprodukcontroller;
use App\Http\Controllers\crudusercontroller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\kontakcontroller;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Registercontroller;
use App\Http\Middleware\CheckAuthenticated;


Route::get('/', function () {
    return view(
        'index',
        [
            "title" => "Home"
        ]
    );
});

Route::get('/index', function () {
    return view(
        'index',
        [
            "title" => "Home"
        ]
    );
});

Route::get('/produk', function () {
    return view(
        'produk',
        [
            "title" => "Produk"
        ]
    );
});

Route::get('/cart', function () {
    return view(
        'cart',
        [
            "title" => 'Cart'
        ]
    );
});

Route::get('/checkout', function () {
    return view(
        'checkout',
        [
            "title" => 'Checkout'
        ]
    );
});






Route::get('/kontak', [kontakController::class, 'show']);


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [kontakcontroller::class, 'dashboard']);
    Route::get('/users', [admincontroller::class, 'index']);
});

Route::get('/parsingdata', function () {
    return view(
        'parsingdata',
        [
            'nama_lengkap' => 'Achmad Roffi Thoriq',
            'email' => 'thoriqibb@gmail.com',
            'Jenis_kelamin' => 'Laki-laki',
        ]
    );
});







// LOGIN USER
Route::get('/login', [Logincontroller::class, 'index']);
Route::post('/login', [Logincontroller::class, 'authenticate']);


// REGISTER USER
Route::get('/register', [Registercontroller::class, 'index']);
Route::post('/register', [Registercontroller::class, 'store']);



// Route::middleware(['auth.check'])->group(function () {
    // CRUD 
    Route::prefix('/admin')->name('admin.')->middleware([CheckAuthenticated::class])->group(function () {

        Route::get('/', [crudusercontroller::class, 'index']);
        
        // PRODUCT
        Route::get('/produk', [crudprodukcontroller::class, 'index']);
        Route::get('/produk/add', [crudprodukcontroller::class, 'create']);
        Route::post('/produk/add', [crudprodukcontroller::class, 'store']);
        Route::get('/produk/edit/{product}', [crudprodukcontroller::class, 'edit'])->name('product.edit');
        Route::put('/produk/edit/{product}', [crudprodukcontroller::class, 'update'])->name('product.update');
        Route::delete('/produk/{product}', [crudprodukcontroller::class, 'destroy']);

        // CATEGORY
        Route::get('/category', [crudcategorycontroller::class, 'index']);
        Route::get('/category/add', [crudcategorycontroller::class, 'create']);
        Route::post('/category/add', [crudcategorycontroller::class, 'store']);
        Route::get('/category/edit/{category}', [CrudCategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/edit/{category}', [CrudCategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{category}', [CrudCategoryController::class, 'destroy']);

        // PELANGGAN
        Route::get('/pelanggan', [crudusercontroller::class, 'index']);
        Route::get('/pelanggan/add', [crudusercontroller::class, 'create']);
        Route::post('/pelanggan/add', [crudusercontroller::class, 'store']);
        Route::get('/pelanggan/edit/{pelanggan}', [crudusercontroller::class, 'edit'])->name('pelanggan.edit');
        Route::put('/pelanggan/edit/{pelanggan}', [crudusercontroller::class, 'update'])->name('pelanggan.update');
        Route::delete('/pelanggan/{pelanggan}', [crudusercontroller::class, 'destroy']);

        Route::get('/show-image/{filename}', [admincontroller::class, 'showImage'])
            ->where('filename', '.*')
            ->name('show-image');
    });
// });
