@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
{{-- Hero --}}
<div class="p-5 mb-4 rounded-3 text-white" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold"><i class="bi bi-megaphone-fill me-3"></i>KampusInfo</h1>
        <p class="col-md-8 fs-5">Papan informasi kampus digital — pengumuman, event, beasiswa, magang, dan organisasi dalam satu tempat.</p>
        <a href="{{ route('announcements.index') }}" class="btn btn-light btn-lg fw-semibold">
            <i class="bi bi-search me-2"></i>Jelajahi Pengumuman
        </a>
        @guest
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg ms-2">Daftar Sekarang</a>
        @endguest
    </div>
</div>

{{-- Kategori Quick Filter --}}
<div class="row g-3 mb-5">
    @php
    $kategoriList = [
        ['nama' => 'Akademik',   'icon' => 'bi-book',          'color' => 'primary'],
        ['nama' => 'Event',      'icon' => 'bi-calendar-event','color' => 'success'],
        ['nama' => 'Beasiswa',   'icon' => 'bi-award',         'color' => 'warning'],
        ['nama' => 'Magang',     'icon' => 'bi-briefcase',     'color' => 'info'],
        ['nama' => 'Organisasi', 'icon' => 'bi-people',        'color' => 'secondary'],
    ];
    @endphp
    @foreach($kategoriList as $kat)
    <div class="col-6 col-md">
        <a href="{{ route('announcements.index', ['kategori' => $kat['nama']]) }}"
           class="card text-center text-decoration-none h-100 shadow-sm border-0">
            <div class="card-body py-3">
                <i class="bi {{ $kat['icon'] }} fs-2 text-{{ $kat['color'] }}"></i>
                <div class="fw-semibold mt-1 small">{{ $kat['nama'] }}</div>
            </div>
        </a>
    </div>
    @endforeach
</div>

{{-- Pengumuman Terbaru --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0"><i class="bi bi-clock-history me-2 text-primary"></i>Pengumuman Terbaru</h4>
    <a href="{{ route('announcements.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
</div>

@php
$kategoriColors = [
    'Akademik' => 'primary', 'Event' => 'success',
    'Beasiswa' => 'warning', 'Magang' => 'info', 'Organisasi' => 'secondary'
];
@endphp

<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($latest as $ann)
    <div class="col">
        <div class="card h-100 shadow-sm">
            @if($ann->gambar)
                <div style="aspect-ratio: 16/9; overflow: hidden; background: #f8f9fa;">
                    <img src="{{ Storage::url($ann->gambar) }}"
                         style="width:100%; height:100%; object-fit:contain;"
                         alt="{{ $ann->judul }}">
                </div>
            @endif
            <div class="card-body">
                <span class="badge bg-{{ $kategoriColors[$ann->kategori] ?? 'secondary' }} mb-2 small">{{ $ann->kategori }}</span>
                <h6 class="card-title fw-bold">{{ $ann->judul }}</h6>
                <p class="card-text text-muted small">{{ Str::limit($ann->deskripsi, 90) }}</p>
            </div>
            <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $ann->tanggal_mulai->format('d M Y') }}</small>
                <a href="{{ route('announcements.show', $ann) }}" class="btn btn-sm btn-outline-primary">Detail</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
