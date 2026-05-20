@extends('layouts.app')

@section('title', 'Pengumuman')

@php
$kategoriColors = [
    'Akademik' => 'primary', 'Event' => 'success',
    'Beasiswa' => 'warning', 'Magang' => 'info', 'Organisasi' => 'secondary'
];
@endphp

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold"><i class="bi bi-megaphone me-2 text-primary"></i>Pengumuman Kampus</h2>
    </div>
</div>

{{-- Filter & Search --}}
<form method="GET" action="{{ route('announcements.index') }}" class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari pengumuman..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach(['Akademik','Event','Beasiswa','Magang','Organisasi'] as $k)
                        <option value="{{ $k }}" @selected(request('kategori') === $k)>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}" title="Filter berdasarkan tanggal aktif">
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-fill"><i class="bi bi-search"></i></button>
                <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary flex-fill"><i class="bi bi-x-lg"></i></a>
            </div>
        </div>
    </div>
</form>

{{-- Results --}}
@if($announcements->isEmpty())
    <div class="text-center py-5 text-muted">
        <i class="bi bi-inbox display-4"></i>
        <p class="mt-2">Tidak ada pengumuman ditemukan.</p>
    </div>
@else
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($announcements as $ann)
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
                    <span class="badge bg-{{ $kategoriColors[$ann->kategori] ?? 'secondary' }} badge-kategori mb-2">{{ $ann->kategori }}</span>
                    <h6 class="card-title fw-bold">{{ $ann->judul }}</h6>
                    <p class="card-text text-muted small">{{ Str::limit($ann->deskripsi, 100) }}</p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                    <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $ann->tanggal_mulai->format('d M Y') }}</small>
                    <a href="{{ route('announcements.show', $ann) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $announcements->links() }}
    </div>
@endif
@endsection
