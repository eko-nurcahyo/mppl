@extends('layouts.app')
@section('title', 'Causes | FoudUnity')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn text-white" data-wow-delay="0.1s"
     style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('assets/charitee/img/gmbr/dnsi.png') }}') center center / cover no-repeat;">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Program</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/pages') }}">Halaman</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Program</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Causes Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Program Unggulan</div>
            <h2 class="section-title">Mari Ulurkan Tangan, Ringankan Beban Sesama</h2>
        </div>

        <!-- Filter -->
     <form method="GET" action="{{ route('causes') }}" class="d-flex justify-content-center align-items-center gap-3 mb-4">
    <select name="wilayah" class="form-select w-auto">
        <option value="">Semua Pulau</option>
        @foreach ($wilayahList as $wilayah)
            <option value="{{ $wilayah }}" {{ request('wilayah') == $wilayah ? 'selected' : '' }}>
                {{ $wilayah }}
            </option>
        @endforeach
    </select>

    <select name="kategori" class="form-select w-auto">
        <option value="">Semua Tema/Kategori</option>
        @foreach ($kategoriList as $kategori)
            <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                {{ $kategori }}
            </option>
        @endforeach
    </select>

    <!-- Tombol dengan ikon pencarian -->
    <button type="submit" class="btn btn-primary d-flex align-items-center gap-1">
        <i class="fas fa-search"></i> <span class="d-none d-sm-inline">Cari</span>
    </button>
</form>


        @php
            $colorClassMap = [
                'Pendidikan' => 'bg-success',
                'Air Bersih' => 'bg-info',
                'Bencana Alam' => 'bg-danger',
            ];
        @endphp

        <!-- List Program -->
        <div class="row g-4 justify-content-center">
            @forelse($programs as $program)
                @php
                    $target = $program->target_donasi ?? 0;
                    $raised = $program->donations()->where('status', 'approved')->sum('nominal');
                    $progress = ($target > 0) ? min(100, ($raised / $target) * 100) : 0;
                    $badgeClass = $colorClassMap[$program->kategori] ?? 'bg-secondary';
                @endphp

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="causes-item d-flex flex-column bg-light border-top border-5 border-primary rounded-top overflow-hidden h-100">

                        <!-- Kategori di tengah -->
                        <div class="text-center pt-3">
                            <span class="badge {{ $badgeClass }} px-3 py-2">{{ $program->kategori }}</span>
                        </div>

                        <div class="text-center p-4 pt-2">
                            <h5 class="mb-3">{{ $program->judul }}</h5>
                            <p>{{ $program->deskripsi }}</p>

                            <!-- Pulau dan Kota -->
                            <div class="text-start small mb-3">
                                <span class="fw-semibold d-block">Pulau: {{ $program->wilayah }}</span>
                                <span class="fw-semibold d-block">Kota: {{ $program->kota }}</span>
                            </div>

                            <!-- Progress -->
                            <div class="causes-progress bg-white p-3 pt-2">
                                <div class="d-flex justify-content-between">
                                    <p class="text-dark">Rp{{ number_format($target, 0, ',', '.') }} <small class="text-body">Goal</small></p>
                                    <p class="text-dark">Rp{{ number_format($raised, 0, ',', '.') }} <small class="text-body">Raised</small></p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success"
                                         role="progressbar"
                                         style="width: {{ round($progress) }}%;"
                                         aria-valuenow="{{ round($progress) }}"
                                         aria-valuemin="0"
                                         aria-valuemax="100">
                                        <span>{{ round($progress) }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="position-relative mt-auto">
                            @if($program->gambar)
                                <img class="img-fluid"
                                     src="{{ Str::startsWith($program->gambar, '/assets') ? asset($program->gambar) : asset('storage/' . $program->gambar) }}"
                                     alt="{{ $program->judul }}">
                            @else
                                <img class="img-fluid" src="{{ asset('images/default-donation.jpg') }}" alt="Default Gambar">
                            @endif

                            <div class="causes-overlay">
                                <a class="btn btn-outline-primary" href="{{ route('donate.show', ['program' => $program->id]) }}">
                                    Donasi
                                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada program donasi aktif.</p>
            @endforelse
        </div>
    </div>
</div>
<!-- Causes End -->
<div class="mt-4 d-flex justify-content-center">
    {{ $programs->links('components.custom-pagination') }}
</div>


@endsection

