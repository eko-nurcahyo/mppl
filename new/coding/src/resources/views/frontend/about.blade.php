@extends('layouts.app')
@section('title', 'About | ChariTeam')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/pages') }}">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100 pt-5 pe-5" src="{{ asset('assets/charitee/img/about-1.jpg') }}" alt="" style="object-fit: cover;">
                        <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="{{ asset('assets/charitee/img/about-2.jpg') }}" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">About Us</div>
                        <h1 class="display-6 mb-5">Bersama Anda, Kami Bantu Mereka yang Membutuhkan di Seluruh Indonesia</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Kami percaya bahwa setiap kebaikan, sekecil apa pun, dapat membawa perubahan besar. Dengan donasi Anda, kami hadir untuk membantu masyarakat yang membutuhkan di berbagai daerah, dari kota hingga pelosok negeri, di seluruh Indonesia.</p>
                            <span class="text-primary">Jhon Doe, Founder</span>
                        </div>
                        <p class="mb-5">Indonesia adalah rumah bagi jutaan harapan. Melalui semangat gotong royong, kita dapat menjangkau saudara-saudara kita di seluruh penjuru tanah air. Bersama, kita bangun masa depan yang lebih baik untuk semua.</p>
                        <a class="btn btn-primary py-2 px-3 me-3" href="">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                        <a class="btn btn-outline-primary py-2 px-3" href="">
                            Contact Us
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Apa yang Kami Lakukan</div>
            <h1 class="display-6 mb-5">Pelajari Lebih Lanjut Apa yang Kami Lakukan dan Terlibat</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Pendidikan -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <i class="fa fa-graduation-cap fa-3x text-primary mb-4"></i>
                    <h4 class="mb-3">Pendidikan Anak</h4>
                    <p class="mb-4">Kami mendukung akses pendidikan berkualitas bagi anak-anak di seluruh Indonesia, terutama di wilayah kurang terjangkau.</p>
                    <a class="btn btn-outline-primary px-3" href="{{ route('causes', ['kategori' => 'Pendidikan']) }}">
                        Selengkapnya
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Air Bersih -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <i class="fa fa-tint fa-3x text-success mb-4"></i>
                    <h4 class="mb-3">Akses Air Bersih</h4>
                    <p class="mb-4">Kami menyediakan akses air bersih dan sanitasi untuk masyarakat yang membutuhkan di daerah terpencil.</p>
                    <a class="btn btn-outline-primary px-3" href="{{ route('causes', ['kategori' => 'Air Bersih']) }}">
                        Selengkapnya
                        <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Bencana Alam -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                    <i class="fa fa-life-ring fa-3x text-danger mb-4"></i>
                    <h4 class="mb-3">Bantuan Bencana Alam</h4>
                    <p class="mb-4">Kami hadir cepat untuk menyalurkan bantuan kepada korban bencana alam di seluruh pelosok negeri.</p>
                    <a class="btn btn-outline-primary px-3" href="{{ route('causes', ['kategori' => 'Bencana Alam']) }}">
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



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Team Members</div>
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