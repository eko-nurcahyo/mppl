@extends('layouts.app')
@section('title', 'Home | FoudUnity')


@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('assets/charitee/img/gmbr/PENDIDIKAN.png') }}" alt="Image">                    
                        <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Kebaikan Kecilmu, Berarti Besar di Mata Mereka</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Setiap donasi Anda membawa harapan baru bagi mereka yang membutuhkan. Bersama kita bisa wujudkan perubahan.</p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <a class="btn btn-outline-primary py-2 px-3" href="{{ url('/causes') }}">
                                            Donasi Sekarang
                                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                                <i class="fa fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/charitee/img/gmbr/AIR_BERSIH.png') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Kebaikan Kecilmu, Berarti Besar di Mata Mereka</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Setiap donasi Anda membawa harapan baru bagi mereka yang membutuhkan. Bersama kita bisa wujudkan perubahan.</p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <a class="btn btn-outline-primary py-2 px-3" href="{{ url('/causes') }}">
                                            Donasi Sekarang
                                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                                <i class="fa fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/charitee/img/gmbr/BENCANA_ALAM.png') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 pt-5">
                                    <h1 class="display-4 text-white mb-3 animated slideInDown">Kebaikan Kecilmu, Berarti Besar di Mata Mereka</h1>
                                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Setiap donasi Anda membawa harapan baru bagi mereka yang membutuhkan. Bersama kita bisa wujudkan perubahan.</p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <a class="btn btn-outline-primary py-2 px-3" href="{{ url('/causes') }}">
                                            Donasi Sekarang
                                            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                                <i class="fa fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


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
                        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Tentang Kami</div>
                        <h1 class="display-6 mb-5">Bersama Anda, Kami Bantu Mereka yang Membutuhkan di Seluruh Indonesia</h1>
                        <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                            <p class="text-dark mb-2">Kami percaya bahwa setiap kebaikan, sekecil apa pun, dapat membawa perubahan besar. Dengan donasi Anda, kami hadir untuk membantu masyarakat yang membutuhkan di berbagai daerah, dari kota hingga pelosok negeri, di seluruh Indonesia.</p>
                            <span class="text-primary">Jhon Doe, Founder</span>
                        </div>
                        <p class="mb-5">Indonesia adalah rumah bagi jutaan harapan. Melalui semangat gotong royong, kita dapat menjangkau saudara-saudara kita di seluruh penjuru tanah air. Bersama, kita bangun masa depan yang lebih baik untuk semua.</p>
                        <a class="btn btn-outline-primary py-2 px-3" href="{{ route('contact.index') }}">
                            Hubungi Kami
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

<!-- Peta Interaktif Start -->
<div class="container py-5">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Apa yang Kami Lakukan</div>
        <h1 class="display-6 mb-5">Peta Interaktif Program Donasi</h1>
    </div>

    <!-- Pusatkan gambar dan tombol -->
    <div class="d-flex flex-column align-items-center justify-content-center">
        <!-- Gambar -->
        <div class="image-container mb-4" style="text-align: center;">
            <img id="mainImage" src="{{ asset('assets/charitee/img/4.jpg') }}" alt="Peta Interaktif" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
        </div>

        <!-- Tombol -->
        <div class="button-container d-flex flex-wrap justify-content-center gap-3">
            <button class="btn-switch btn-active-1" onclick="changeImage('4.jpg', this, 'btn-active-1')">Pendidikan Anak</button>
            <button class="btn-switch" onclick="changeImage('5.jpg', this, 'btn-active-2')">Akses Air Bersih</button>
            <button class="btn-switch" onclick="changeImage('6.jpg', this, 'btn-active-3')">Bencana Alam</button>
        </div>
    </div>
</div>

<!-- Style -->
<style>
    .btn-switch {
        padding: 10px 25px;
        border: none;
        background-color: #ddd;
        color: #000;
        cursor: pointer;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-active-1 {
        background-color: #28A745; /* Biru - Pendidikan Anak */
        color: white;
    }

    .btn-active-2 {
        background-color: #007BFF; /* Hijau - Air Bersih */
        color: white;
    }

    .btn-active-3 {
        background-color: #DC3545; /* Merah - Bencana Alam */
        color: white;
    }

    .button-container button {
        min-width: 180px;
    }
</style>

<!-- Script -->
<script>
    function changeImage(image, btn, activeClass) {
        const basePath = "{{ asset('assets/charitee/img') }}/";
        document.getElementById('mainImage').src = basePath + image;

        document.querySelectorAll('.btn-switch').forEach(button => {
            button.classList.remove('btn-active-1', 'btn-active-2', 'btn-active-3');
        });

        btn.classList.add(activeClass);
    }
</script>
<!-- Peta Interaktif End -->





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
                    <i class="fa fa-graduation-cap fa-3x text-success mb-4"></i>
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
                    <i class="fa fa-tint fa-3x mb-4" style="color: #0d6efd;"></i>
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
                            <img class="img-fluid" src="{{ asset('assets/charitee/img/akg.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Eko NurCahyo</h5>
                            <p class="text-primary">Team Member</p>
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
                            <img class="img-fluid" src="{{ asset('assets/charitee/img/fqi.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Fiqri Fathurrohman</h5>
                            <p class="text-primary">Team Member</p>
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
                            <img class="img-fluid" src="{{ asset('assets/charitee/img/afn.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Alfin Khalaj Syahruwardi</h5>
                            <p class="text-primary">Team Member</p>
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



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/charitee/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/charitee/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/charitee/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/charitee/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/charitee/lib/parallax/parallax.min.js') }}"></script>

@endsection