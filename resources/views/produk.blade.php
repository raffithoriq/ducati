@extends('layouts.app')
@section('content')


    {{-- Content Section --> --}}
    <section class="container mt-5 pt-5">
        <h1 class="text-center mb-5">Produk Kami</h1>
        <div class="row">
            <!-- Produk 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="singleproduct.php?id=1" style="text-decoration: none; color: inherit;">
                    <article class="card h-100">
                        <img src="image/product1.jpg" alt="Produk 1" class="card-img-top img-fluid">
                        <div class="card-body text-center">
                            <h2 class="card-title">Produk 1</h2>
                            <h4 class="text-danger">Rp. 150.000</h4>
                        </div>
                    </article>
                </a>
            </div>

            <!-- Produk 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="singleproduct.php?id=2" style="text-decoration: none; color: inherit;">
                    <article class="card h-100">
                        <img src="image/product2.jpg" alt="Produk 2" class="card-img-top img-fluid">
                        <div class="card-body text-center">
                            <h2 class="card-title">Produk 2</h2>
                            <h4 class="text-danger">Rp. 250.000</h4>
                        </div>
                    </article>
                </a>
            </div>

            <!-- Produk 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="" style="text-decoration: none; color: inherit;">
                    <article class="card h-100">
                        <img src="image/product3.jpg" alt="Produk 3" class="card-img-top img-fluid">
                        <div class="card-body text-center">
                            <h2 class="card-title">Produk 3</h2>
                            <h4 class="text-danger">Rp. 350.000</h4>
                        </div>
                    </article>
                </a>
            </div>

            <!-- Jika Tidak Ada Produk -->
            <!-- <div class="col-12 text-center">Tidak ada produk yang tersedia.</div> -->

        </div>
    </section>

    {{-- End of Content Section --> --}}
    
@endsection