@extends('layouts.app')
@section('title', 'Causes | ChariTeam')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Causes</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Causes</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Causes Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Feature Causes</div>
                <h1 class="display-6 mb-5">Every Child Deserves The Opportunity To Learn</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($programs as $program)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="causes-item d-flex flex-column bg-light border-top border-5 border-primary rounded-top overflow-hidden h-100">
                            <div class="text-center p-4 pt-0">
                                <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                    <small>{{ $program->kategori ?? 'Donasi' }}</small>
                                </div>
                                <h5 class="mb-3">{{ $program->judul }}</h5>
                                <p>{{ $program->deskripsi }}</p>
                                <div class="causes-progress bg-white p-3 pt-2">
                                    <div class="d-flex justify-content-between">
                                        <p class="text-dark">
                                            Rp{{ number_format($program->target,0,',','.') }} 
                                            <small class="text-body">Goal</small>
                                        </p>
                                        <p class="text-dark">
                                            Rp{{ number_format($program->total_raised ?? 0,0,',','.') }} 
                                            <small class="text-body">Raised</small>
                                        </p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar"
                                            role="progressbar"
                                            style="width:{{ $program->progress_percent ?? 0 }}%;"
                                            aria-valuenow="{{ $program->progress_percent ?? 0 }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100">
                                            <span>{{ round($program->progress_percent ?? 0) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid" src="{{ asset('storage/'.$program->gambar) }}" alt="{{ $program->judul }}">
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

@endsection
