
<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Esa Unggul Tangerang</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>sukseskita699@gmail.com</small>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
       <a href="{{ url('/') }}" class="navbar-brand">
    <img src="{{ asset('assets/charitee/img/eko.png') }}" alt="FundUnity Logo" height="80">
</a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">Tentang</a>
                <a href="{{ url('/causes') }}" class="nav-item nav-link {{ Request::is('causes') ? 'active' : '' }}">Donasi</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('service') || Request::is('donate') || Request::is('team') || Request::is('testimonial') || Request::is('404') ? 'active' : '' }}" data-bs-toggle="dropdown">Halaman</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/service') }}" class="dropdown-item {{ Request::is('service') ? 'active' : '' }}">Layanan</a>
                        <a href="{{ url('/donate') }}" class="dropdown-item {{ Request::is('donate') ? 'active' : '' }}">Donasi</a>
                        <a href="{{ url('/team') }}" class="dropdown-item {{ Request::is('team') ? 'active' : '' }}">Tim Kami</a>
                        <a href="{{ url('/404') }}" class="dropdown-item {{ Request::is('404') ? 'active' : '' }}">404 Page</a>
                    </div>
                </div>
                <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Kontak</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
