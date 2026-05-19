@extends('layouts.app')

@section('title', $announcement->judul)

@php
$kategoriColors = [
    'Akademik' => 'primary', 'Event' => 'success',
    'Beasiswa' => 'warning', 'Magang' => 'info', 'Organisasi' => 'secondary'
];
$isBookmarked = auth()->check()
    ? auth()->user()->bookmarks()->where('announcement_id', $announcement->id)->exists()
    : false;
$bookmark = $isBookmarked
    ? auth()->user()->bookmarks()->where('announcement_id', $announcement->id)->first()
    : null;
@endphp

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <a href="{{ route('announcements.index') }}" class="btn btn-sm btn-outline-secondary mb-3">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>

        <div class="card shadow-sm">
            @if($announcement->gambar)
                <img src="{{ Storage::url($announcement->gambar) }}" class="card-img-top" style="max-height:350px;object-fit:cover" alt="">
            @endif
            <div class="card-body p-4">
                <span class="badge bg-{{ $kategoriColors[$announcement->kategori] ?? 'secondary' }} mb-2">{{ $announcement->kategori }}</span>
                @if($announcement->fakultas)
                    <span class="badge bg-light text-dark border mb-2">{{ $announcement->fakultas }}</span>
                @endif

                <h3 class="fw-bold mt-1">{{ $announcement->judul }}</h3>

                <div class="text-muted small mb-3">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ $announcement->tanggal_mulai->format('d M Y') }}
                    @if($announcement->tanggal_selesai)
                        — {{ $announcement->tanggal_selesai->format('d M Y') }}
                    @endif
                    <span class="ms-3"><i class="bi bi-person me-1"></i>{{ $announcement->admin->nama }}</span>
                </div>

                <hr>
                <div class="mt-3" style="white-space: pre-wrap;">{{ $announcement->deskripsi }}</div>

                @if($announcement->lampiran)
                    <div class="mt-4">
                        <a href="{{ Storage::url($announcement->lampiran) }}" class="btn btn-outline-secondary" target="_blank">
                            <i class="bi bi-paperclip me-1"></i>Unduh Lampiran
                        </a>
                    </div>
                @endif

                @auth
                    <div class="mt-4">
                        @if($isBookmarked)
                            <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-bookmark-fill me-1"></i>Hapus Bookmark
                                </button>
                            </form>
                        @else
                            <form action="{{ route('bookmarks.store') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                                <button class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-bookmark me-1"></i>Simpan Bookmark
                                </button>
                            </form>
                        @endif
                    </div>
                @else
                    <p class="mt-3 text-muted small"><a href="{{ route('login') }}">Login</a> untuk menyimpan bookmark.</p>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
