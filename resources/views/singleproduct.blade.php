@extends('layouts.app')
@section('content')
    <!-- Content Section -->
    <section class="container mt-5 pt-5 site-section">
      <div class="row">
        <!-- Carousel Section -->
        <div class="col-md-6">
          <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
            <div class="carousel-inner">
              <?php
              // Array gambar produk
              $images = [
                  "image/baju1.webp",
                  "image/ducatilogo.svg",
                  "image/topi1.webp",
              ];

              // Menampilkan gambar dalam carousel
              foreach ($images as $index => $image) {
                  $activeClass = $index === 0 ? 'active' : ''; // Menandai item aktif
                  echo "<div class='carousel-item $activeClass'>";
                  echo "<img src='$image' class='d-block w-100' alt='Produk'>";
                  echo "</div>";
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <!-- Thumbnail Images Below the Carousel -->
          <div class="row mt-3">
            <?php
            // Menampilkan thumbnail gambar
            foreach ($images as $index => $image) {
                echo "<div class='col-4'>";
                echo "<img src='$image' class='img-thumbnail carousel-thumbnail' alt='Produk' data-bs-target='#carouselExampleControlsNoTouching' data-bs-slide-to='$index'>";
                echo "</div>";
            }
            ?>
          </div>
        </div>

        <!-- Product Details Section -->
        <div class="col-md-6">
          <h2 class="text-black">Product 2</h2>
          <p>Keterangan produk secara detail ditulis di sini.</p>
          <p>
            <strong class="text-danger h4">Rp. 100.000</strong>
          </p>

          <form action="" method="POST">
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 140px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-dark js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="hidden" name="product_id" value="1"/> <!-- Ganti dengan ID produk yang sesuai -->
                <input 
                  type="text" 
                  name="quantity" 
                  class="form-control text-center" 
                  value="1" 
                  aria-label="Jumlah Produk" 
                  aria-describedby="button-addon1"/>
                <div class="input-group-append">
                  <button class="btn btn-outline-dark js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
            </div>


            <p>
              <input type="submit" class="buy-now btn btn-sm btn-danger" name="submit" value="Add To Cart">
            </p>
          </form>
          
        </div>

      </div>
    </section>
@endsection