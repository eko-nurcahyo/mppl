<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Logo dan Deskripsi -->
            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('assets/charitee/img/eko.png') }}" alt="FundUnity Logo" height="80">
                <p class="mt-3 text-white">FundUnity adalah platform donasi digital untuk mendukung berbagai program sosial di seluruh Indonesia.</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square me-1 text-white bg-primary" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1 text-white bg-primary" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1 text-white bg-primary" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square me-0 text-white bg-primary" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Kontak -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Kontak Kami</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>Universitas Esa Unggul, Tangerang</p>
                <p><i class="fa fa-phone-alt me-3"></i>+62 812 3456 7890</p>
                <p><i class="fa fa-envelope me-3"></i>sukseskita699@gmail.com</p>
            </div>

            <!-- Tautan Cepat -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Tautan Cepat</h5>
                <a class="btn btn-link" href="{{ url('/about') }}">Tentang Kami</a>
                <a class="btn btn-link" href="{{ url('/contact') }}">Kontak</a>
                <a class="btn btn-link" href="{{ url('/programs') }}">Program Donasi</a>
            </div>

           
        </div>
    </div>

    <!-- Copyright -->
    <div class="container-fluid border-top border-secondary py-4">
        <div class="container text-center text-md-start d-md-flex justify-content-between">
            <div class="mb-3 mb-md-0 text-white-50">
                &copy; {{ date('Y') }} <a class="text-primary" href="#">FundUnity</a>. Semua hak dilindungi.
            </div>
            <div class="text-white-50">
                Dibuat dengan ❤ oleh <a class="text-white" href="https://htmlcodex.com" target="_blank">Kelompok 10</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Tombol Kembali ke Atas -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>