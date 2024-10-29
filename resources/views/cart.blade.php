@extends('layouts.app')
@section('content')
    {{-- Content Section --> --}}

    <section class="container my-5">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Produk 1 -->
                        <tr>
                            <td>Polo</td>
                            <td>
                                <img src="image/polo1.webp" alt="Product 1" class="img-fluid rounded" width="150"
                                    height="75">
                            </td>
                            <td>Rp. 150.000</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 140px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-dark js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="hidden" name="product_id" value="1" />
                                    <!-- Ganti dengan ID produk yang sesuai -->
                                    <input type="text" name="quantity" class="form-control text-center" value="1"
                                        aria-label="Jumlah Produk" aria-describedby="button-addon1" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-dark js-btn-plus" type="button">&plus;</button>
                                    </div>
                                </div>
                            </td>
                            <td>Rp. 150.000</td>
                            <td><a href="deleteproduct.php?id=1" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                            </td>
                        </tr>

                        <!-- Produk 2 -->
                        <tr>
                            <td>Sepatu</td>
                            <td>
                                <img src="image/sepatu1.webp" alt="Product 2" class="img-fluid rounded" width="150"
                                    height="75">
                            </td>
                            <td>Rp. 250.000</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 140px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-dark js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="hidden" name="product_id" value="1" />
                                    <!-- Ganti dengan ID produk yang sesuai -->
                                    <input type="text" name="quantity" class="form-control text-center" value="1"
                                        aria-label="Jumlah Produk" aria-describedby="button-addon1" />
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-dark js-btn-plus" type="button">&plus;</button>
                                    </div>
                                </div>
                            </td>
                            <td>Rp. 250.000</td>
                            <td><a href="deleteproduct.php?id=2" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                            </td>
                        </tr>
                        <!-- Jika tidak ada produk -->
                        <tr>
                            <td colspan="8" class="text-center">No products available</td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <!-- Kolom Kiri: Tombol Update Cart dan Continue Shopping -->

            <div class="col-md-5 mb-4">
                <div class="mb-4 mt-4">
                    <input type="submit" name="submit" value="Update Cart" class="btn btn-danger btn-sm btn-block py-3"
                        aria-label="Update your cart">
                </div>
                <div class="mb-5"> <!-- Tambahkan mb-4 di sini untuk memberikan spasi bawah -->
                    <a href="/produk" class="btn btn-outline-danger btn-sm btn-block py-3">Continue Shopping</a>
                </div>
            </div>


            <!-- Kolom Kanan: Cart Totals -->
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-4">
                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">Rp. 250.000</strong>
                    </div>
                </div>

                <!-- Tombol Proceed to Checkout -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <a href="/checkout" class="btn btn-danger btn-sm btn-block py-3">
                            Proceed To Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- End of Content Section --}}
@endsection
