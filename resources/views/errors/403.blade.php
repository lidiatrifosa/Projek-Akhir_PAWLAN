@extends('layouts.app')
@section('title', '403 - Akses Ditolak')
@section('content')
<div class="text-center py-5">
    <i class="bi bi-shield-lock display-1 text-danger"></i>
    <h2 class="mt-3 fw-bold">403 — Akses Ditolak</h2>
    <p class="text-muted">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-2"><i class="bi bi-house me-1"></i>Kembali ke Beranda</a>
</div>
@endsection
