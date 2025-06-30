@extends('layouts.app')
@section('title', 'Donasi untuk ' . $program->judul)

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn text-white" data-wow-delay="0.1s"
     style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('assets/charitee/img/gmbr/dnsi.png') }}') center center / cover no-repeat;">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{ $program->judul }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Program</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">{{ $program->judul }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- DONASI CONTENT -->
<div class="container my-5">
    <div class="row g-4">
        <!-- KISAH DI BALIK PROGRAM -->
        <div class="col-md-10 offset-md-1">
            <div class="bg-white p-4 rounded shadow-sm">
                <h4 class="fw-bold text-center mb-3">Kisah di Balik Program Ini</h4>
                @if($program->foto_kisah)
                    <div class="text-center mb-3">
                        <img src="{{ Str::startsWith($program->foto_kisah, '/assets') ? asset($program->foto_kisah) : asset('storage/' . $program->foto_kisah) }}"
                            alt="Foto Kisah {{ $program->judul }}"
                            class="img-fluid rounded"
                            style="max-height:800px; object-fit:cover;">
                    </div>
                @endif


                @if($program->kisah)
                    <div class="text-dark" style="line-height: 1.8;">
                        {!! $program->kisah !!}
                    </div>
                @else
                    <p class="text-muted text-center">Belum ada kisah ditambahkan untuk program ini.</p>
                @endif
            </div>
        </div>

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
                    @php
                        $target = $program->target_donasi ?? 0;
                        $raised = $totalTerkumpul ?? 0;
                        $progress = ($target > 0) ? min(100, ($raised / $target) * 100) : 0;
                    @endphp

                    <p class="mb-1"><strong>Target:</strong> Rp{{ number_format($target, 0, ',', '.') }}</p>
                    <p><strong>Terkumpul:</strong> Rp{{ number_format($raised, 0, ',', '.') }}</p>

                    <div class="progress mt-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ round($progress) }}%;" aria-valuenow="{{ round($progress) }}" aria-valuemin="0" aria-valuemax="100">
                            {{ round($progress) }}%
                        </div>
                    </div>
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
                        <input type="number" name="nominal" class="form-control" placeholder="Nominal Donasi (Rp)" required max="{{ $program->target_donasi - $totalTerkumpul }}">
                    </div>
                    <div class="col-md-6">
                        <select name="metode_pembayaran" class="form-select" id="metodeSelect" required>
                            <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
                            <option value="BRI">Transfer Bank BRI</option>
                            <option value="DANA">DANA</option>
                            <option value="GoPay">GoPay</option>
                        </select>
                    </div>

                    <!-- Info Rekening -->
                    <div id="info-rekening" class="col-12 d-none">
                        <div id="rekening-detail" class="text-center" style="background: white; border: 1px solid #ccc; border-radius: 10px; padding: 20px;"></div>
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

@endsection

@push('scripts')
<script>
    const metodeSelect = document.getElementById('metodeSelect');
    const rekeningDiv = document.getElementById('info-rekening');
    const rekeningDetail = document.getElementById('rekening-detail');

    metodeSelect.addEventListener('change', function () {
        const metode = this.value;
        let html = '';

        if (metode === 'BRI') {
            html = `
                <div class="text-center">
                    <img src="/assets/charitee/img/BRI.png" alt="BRI" style="height:40px;" class="mb-2"><br>
                    <strong>Atas Nama:</strong> EKO NUR CAHYO<br>
                    <strong>No Rekening:</strong> <span class="text-danger">351868379736311836</span><br>
                    <button class="btn btn-sm btn-outline-secondary mt-2" onclick="navigator.clipboard.writeText('351868379736311836')">Copy</button>
                </div>`;
        } else if (metode === 'DANA') {
            html = `
                <div class="text-center">
                    <img src="/assets/charitee/img/dana.png" alt="DANA" style="height:40px;" class="mb-2"><br>
                    <strong>Atas Nama:</strong> EKO NUR CAHYO<br>
                    <strong>No HP:</strong> <span class="text-danger">085812345678</span><br>
                    <button class="btn btn-sm btn-outline-secondary mt-2" onclick="navigator.clipboard.writeText('085812345678')">Copy</button>
                </div>`;
        } else if (metode === 'GoPay') {
            html = `
                <div class="text-center">
                    <img src="/assets/charitee/img/gopay.png" alt="GoPay" style="height:40px;" class="mb-2"><br>
                    <strong>Atas Nama:</strong> EKO NUR CAHYO<br>
                    <strong>No HP:</strong> <span class="text-danger">085876543210</span><br>
                    <button class="btn btn-sm btn-outline-secondary mt-2" onclick="navigator.clipboard.writeText('085876543210')">Copy</button>
                </div>`;
        }

        rekeningDetail.innerHTML = html;
        rekeningDiv.classList.remove('d-none');
    });
</script>
@endpush