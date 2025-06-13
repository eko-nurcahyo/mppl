@extends('layouts.app')
@section('title', 'Donasi | ' . ($program->judul ?? ''))

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Donasi untuk Program: <strong>{{ $program->judul ?? '-' }}</strong></h2>
    <p class="text-center mb-4">{{ $program->deskripsi ?? '-' }}</p>
    <p class="text-center mb-5">Total Donasi Terkumpul: <strong>Rp {{ number_format($totalTerkumpul ?? 0, 0, ',', '.') }}</strong></p>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
        @csrf
        <input type="hidden" name="program_id" value="{{ $program->id ?? '' }}">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal Donasi (Rp)</label>
            <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal') }}" min="1" required>
            @error('nominal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-select @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="" disabled {{ old('metode_pembayaran') ? '' : 'selected' }}>-- Pilih Metode Pembayaran --</option>
                <option value="BRI" {{ old('metode_pembayaran') == 'BRI' ? 'selected' : '' }}>Bank BRI</option>
                <option value="DANA" {{ old('metode_pembayaran') == 'DANA' ? 'selected' : '' }}>DANA</option>
                <option value="GoPay" {{ old('metode_pembayaran') == 'GoPay' ? 'selected' : '' }}>GoPay</option>
            </select>
            @error('metode_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bukti_transfer" class="form-label">Upload Bukti Transfer</label>
            <input class="form-control @error('bukti_transfer') is-invalid @enderror" type="file" id="bukti_transfer" name="bukti_transfer" accept="image/*" required>
            @error('bukti_transfer')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">
                Kirim Donasi <i class="fa fa-heart ms-2"></i>
            </button>
        </div>
    </form>
</div>
@endsection
