<div class="site-navbar-top py-3" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-md-4 order-2 order-md-2 site-search-icon text-left">
                <!-- Jika user login, tampilkan pesan selamat datang -->
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <img width="50" src="image/Ducatilogo.svg" alt="ducati" />
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                    <ul class="list-unstyled mb-1 d-flex justify-content-end">
                        <!-- Jika user login, tampilkan cart dan logout -->
                        {{-- <li class="me-4">
                            <a href="cart.php" class="text-dark" title="Cart">
                                <i class="bi bi-cart"></i>
                            </a>
                        </li>
                        <li class="me-3">
                            <a href="logout.php" class="text-dark" title="Logout">
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </li> --}}

                        <li class="me-3">
                            <a href="/login" class="text-dark" title="Login">
                                <i class="bi bi-person"></i>
                            </a>
                        </li>

                        <!-- Jika tidak login, tampilkan tombol login -->
                        <!-- Tampilkan menu untuk mobile -->
                        <li class="d-inline-block d-md-none">
                            <a href="#" class="text-dark site-menu-toggle">
                                <i class="bi bi-list"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>