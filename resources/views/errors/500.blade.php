@extends('layouts.app')
@section('title', '500 - Server Error')
@section('content')
<div class="text-center py-5">
    <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
    <h2 class="mt-3 fw-bold">500 — Server Error</h2>
    <p class="text-muted">Terjadi kesalahan pada server. Silakan coba lagi nanti.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-2"><i class="bi bi-house me-1"></i>Kembali ke Beranda</a>
</div>
@endsection
