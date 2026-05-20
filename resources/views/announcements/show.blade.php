@extends('layouts.app')

@section('title', $announcement->judul)

@php
$kategoriColors = [
    'Akademik' => 'primary', 'Event' => 'success',
    'Beasiswa' => 'warning', 'Magang' => 'info', 'Organisasi' => 'secondary'
];
$color = $kategoriColors[$announcement->kategori] ?? 'secondary';

$isBookmarked = auth()->check()
    ? auth()->user()->bookmarks()->where('announcement_id', $announcement->id)->exists()
    : false;
$bookmark = $isBookmarked
    ? auth()->user()->bookmarks()->where('announcement_id', $announcement->id)->first()
    : null;

$lampiranExt = $announcement->lampiran
    ? strtolower(pathinfo($announcement->lampiran, PATHINFO_EXTENSION))
    : null;
@endphp

@section('content')
<div class="container py-5">

    <div class="mb-4">
        <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary">
            ← Kembali ke Daftar
        </a>
    </div>

    <div class="card border-0 shadow-lg" style="overflow: hidden;">

        {{-- Gambar dari database, tiap pengumuman beda --}}
        @if($announcement->gambar)
    <div>
        <img 
            src="{{ Storage::url($announcement->gambar) }}"
            style="width:100%; height:auto; display:block;"
            alt="{{ $announcement->judul }}">
    </div>
@else
            <div class="bg-{{ $color }} bg-opacity-10 d-flex align-items-center justify-content-center"
                 style="height: 180px;">
                <span style="font-size: 4rem; opacity: .25;">📢</span>
            </div>
        @endif

        <div class="card-body p-5">

            {{-- Badge kategori --}}
            <span class="badge bg-{{ $color }} px-3 py-2 fs-6 mb-3">
                {{ $announcement->kategori }}
            </span>
            @if($announcement->fakultas)
                <span class="badge bg-light text-dark border px-3 py-2 fs-6 mb-3 ms-1">
                    {{ $announcement->fakultas }}
                </span>
            @endif

            {{-- Judul --}}
            <h1 class="fw-bold mb-4">{{ $announcement->judul }}</h1>

            {{-- Meta --}}
            <div class="d-flex flex-wrap gap-4 text-muted mb-4">
                <div>
                    📅 {{ $announcement->tanggal_mulai->format('d M Y') }}
                    @if($announcement->tanggal_selesai)
                        — {{ $announcement->tanggal_selesai->format('d M Y') }}
                    @endif
                </div>
                <div>👤 {{ $announcement->admin->nama }}</div>
                <div>🕒 {{ $announcement->created_at->diffForHumans() }}</div>
            </div>

            <hr>

            {{-- Deskripsi --}}
            <div class="mt-4" style="line-height: 1.9; font-size: 17px; white-space: pre-wrap;">{{ $announcement->deskripsi }}</div>

            {{-- Lampiran --}}
            @if($announcement->lampiran)
                <div class="mt-5">
                    <h5 class="fw-bold mb-3">📎 Lampiran</h5>
                    <div class="card border">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ basename($announcement->lampiran) }}</strong>
                                <div class="text-muted small">File pendukung informasi pengumuman</div>
                            </div>
                            <a href="{{ Storage::url($announcement->lampiran) }}"
                               class="btn btn-primary" target="_blank" download>
                                Download {{ strtoupper($lampiranExt) }}
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Bookmark --}}
            <div class="mt-5">
                @auth
                    @if($isBookmarked)
                        <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-warning px-4 py-2">🔖 Hapus Bookmark</button>
                        </form>
                    @else
                        <form action="{{ route('bookmarks.store') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                            <button class="btn btn-outline-warning px-4 py-2">🔖 Simpan Bookmark</button>
                        </form>
                    @endif
                @else
                    <p class="text-muted small">
                        <a href="{{ route('login') }}">Login</a> untuk menyimpan bookmark.
                    </p>
                @endauth
            </div>

        </div>
    </div>
</div>
@endsection
