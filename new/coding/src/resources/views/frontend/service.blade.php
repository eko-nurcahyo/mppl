@extends('layouts.app')
@section('title', 'Service | FundUnity')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn text-white" data-wow-delay="0.1s"
    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('assets/charitee/img/gmbr/dnsi.png') }}') center center / cover no-repeat;">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Layanan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/pages') }}">Halaman</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Layanan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Apa yang Kami Lakukan</div>
                <h1 class="display-6 mb-5">Pelajari lebih lanjut apa yang kami lakukan dan ikut terlibat</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <div class="icon mb-4">
                            <i class="fa fa-book-reader fa-3x text-primary"></i>
                        </div>
                        <h4 class="mb-3">Pendidikan</h4>
                        <p class="mb-4">Kami membantu menyediakan akses pendidikan yang layak bagi anak-anak kurang mampu di seluruh Indonesia.</p>
                        <a class="btn btn-outline-primary px-3" href="#">
                            Selengkapnya
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <div class="icon mb-4">
                            <i class="fa fa-tint fa-3x text-info"></i>
                        </div>
                        <h4 class="mb-3">Air Bersih</h4>
                        <p class="mb-4">Kami membantu masyarakat terpencil mendapatkan akses air bersih dan sanitasi yang aman.</p>
                        <a class="btn btn-outline-primary px-3" href="#">
                            Selengkapnya
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <div class="icon mb-4">
                            <i class="fa fa-hand-holding-heart fa-3x text-danger"></i>
                        </div>
                        <h4 class="mb-3">Bencana Alam</h4>
                        <p class="mb-4">Kami menyalurkan bantuan dan dukungan kepada korban bencana alam dengan cepat dan tepat.</p>
                        <a class="btn btn-outline-primary px-3" href="#">
                            Selengkapnya
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
