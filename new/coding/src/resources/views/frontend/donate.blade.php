@extends('layouts.app')
@section('title', 'Donate | ChariTeam')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Donate</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Donate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Donate Start -->
   <!-- Donate Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Kiri: Kata-kata Mutiara -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="p-4 rounded shadow bg-white">
                    <div class="d-inline-block rounded-pill bg-primary text-white py-1 px-3 mb-3">Mengapa Donasi?</div>
                    <h2 class="mb-4">"Bersedekahlah, walau hanya dengan sebutir kurma."</h2>
                    <p class="mb-3">Setiap kebaikan kecil akan dibalas berlipat ganda. Donasi Anda sangat berarti untuk perubahan besar di kehidupan orang lain.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check-circle text-success me-2"></i>Donasi aman dan transparan</li>
                        <li><i class="fa fa-check-circle text-success me-2"></i>Bukti transfer diverifikasi oleh admin</li>
                        <li><i class="fa fa-check-circle text-success me-2"></i>Langsung membantu yang membutuhkan</li>
                    </ul>
                </div>
            </div>

            <!-- Kanan: Form Donasi -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-secondary p-5 rounded">
                    <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0 shadow-sm" id="name" name="nama" placeholder="Nama Anda" required>
                                    <label for="name">Nama Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-white border-0 shadow-sm" id="email" name="email" placeholder="Email Anda" required>
                                    <label for="email">Email Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control bg-white border-0 shadow-sm" id="nominal" name="nominal" placeholder="Nominal Donasi" required>
                                    <label for="nominal">Nominal Donasi (Rp)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0 shadow-sm" id="metode" name="metode_pembayaran" required>
                                        <option selected disabled>-- Pilih Metode Pembayaran --</option>
                                        <option value="BRI">Transfer Bank BRI</option>
                                        <option value="DANA">DANA</option>
                                        <option value="GoPay">GoPay</option>
                                    </select>
                                    <label for="metode">Metode Pembayaran</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold text-white">Upload Bukti Transfer</label>
                                <input type="file" name="bukti_transfer" class="form-control bg-white border-0 shadow-sm" accept="image/*" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-75 py-3 rounded-pill">
                                    Kirim Donasi <i class="fa fa-heart ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Donate End -->


@endsection
