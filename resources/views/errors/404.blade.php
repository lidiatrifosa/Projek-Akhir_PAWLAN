@extends('layouts.app')
@section('title', '404 - Halaman Tidak Ditemukan')
@section('content')
<div class="text-center py-5">
    <i class="bi bi-search display-1 text-secondary"></i>
    <h2 class="mt-3 fw-bold">404 — Halaman Tidak Ditemukan</h2>
    <p class="text-muted">Halaman yang Anda cari tidak ada atau telah dipindahkan.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-2"><i class="bi bi-house me-1"></i>Kembali ke Beranda</a>
</div>
@endsection
