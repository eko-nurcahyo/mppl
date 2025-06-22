@extends('layouts.app')
@section('title', 'Team | ChariTeam')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn text-white" data-wow-delay="0.1s"
    style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('assets/charitee/img/gmbr/dnsi.png') }}') center center / cover no-repeat;">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Tim Kami</h1>
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

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Tim Kami</div>
                <h1 class="display-6 mb-5">Kenali Tim Hebat di Balik Aksi Kemanusiaan Kita</h1>
            </div>
            <div class="row g-4 justify-content-center ">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/charitee/img/team-1.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Eko NurCahyo</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square" href="https://wa.me/+6281913339357" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                  </a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/charitee/img/team-2.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Fiqri Fathurrohman</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square" href="https://wa.me/+6282114151478" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/charitee/img/team-3.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Alfin Khalaj Syahruwardi</h5>
                            <p class="text-primary">Designation</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square" href="https://wa.me/+62895379520899" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


@endsection
