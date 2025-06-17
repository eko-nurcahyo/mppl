@extends('layouts.app')
@section('title', 'Donasi untuk ' . $program->judul)

@section('content')

<!-- HEADER -->
<div class="container-fluid py-5 text-white" style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url('/assets/img/bg-header.jpg') center center / cover no-repeat;">
    <div class="container text-center">
        <h1 class="fw-bold display-5 mb-0">Donasi untuk {{ strtoupper($program->judul) }}</h1>
    </div>
</div>

<!-- DONASI CONTENT -->
<div class="container my-5">
    <div class="row g-4 align-items-start">

        <!-- KIRI: INFO PROGRAM -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2 fw-semibold"><i class="bi bi-info-circle-fill me-1"></i> Mengapa Donasi?</span>
                    <h5 class="fw-bold">"Bersedekahlah, walau hanya dengan sebutir kurma."</h5>
                    <p class="text-muted">Setiap kebaikan kecil akan dibalas berlipat ganda. Donasi Anda sangat berarti untuk perubahan besar di kehidupan orang lain.</p>
                    <ul class="text-success small">
                        <li><i class="bi bi-check-circle-fill me-1"></i> Donasi aman dan transparan</li>
                        <li><i class="bi bi-check-circle-fill me-1"></i> Bukti transfer diverifikasi oleh admin</li>
                        <li><i class="bi bi-check-circle-fill me-1"></i> Langsung membantu yang membutuhkan</li>
                    </ul>
                    <hr>
                    <p class="mb-1"><i class="bi bi-bullseye text-danger me-1"></i><strong>Target:</strong> Rp {{ number_format($program->target, 0, ',', '.') }}</p>
                    <p><i class="bi bi-cash-coin text-warning me-1"></i><strong>Terkumpul:</strong> Rp {{ number_format($totalTerkumpul, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- KANAN: FORM -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="bi bi-heart-fill text-danger me-1"></i> Form Donasi
                </div>
                <div class="card-body">
                    <form action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="nominal" class="form-control" placeholder="Nominal Donasi (Rp)" required>
                            </div>
                            <div class="col-md-6">
                                <select name="metode_pembayaran" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
                                    <option value="BRI">Transfer Bank BRI</option>
                                    <option value="DANA">DANA</option>
                                    <option value="GoPay">GoPay</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="bukti_transfer" class="form-label fw-semibold text-muted small">Upload Bukti Transfer</label>
                                <input type="file" name="bukti_transfer" class="form-control" accept="image/*" required>
                            </div>
                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-warning text-dark fw-bold">
                                    <i class="bi bi-send-fill me-1"></i> Kirim Donasi
                                </button>
                            </div>
                        </div>
                    </form>
                    <small class="text-muted d-block text-center mt-3">* Donasi akan diverifikasi oleh admin dalam waktu 1×24 jam.</small>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
