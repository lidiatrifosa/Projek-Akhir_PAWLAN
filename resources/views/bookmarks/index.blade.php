@extends('layouts.app')
@section('title', 'Bookmark Saya')

@php
$kategoriColors = [
    'Akademik' => 'primary', 'Event' => 'success',
    'Beasiswa' => 'warning', 'Magang' => 'info', 'Organisasi' => 'secondary'
];
@endphp

@section('content')
<h2 class="fw-bold mb-4"><i class="bi bi-bookmark-fill me-2 text-warning"></i>Bookmark Saya</h2>

@if($bookmarks->isEmpty())
    <div class="text-center py-5 text-muted">
        <i class="bi bi-bookmark display-4"></i>
        <p class="mt-2">Belum ada pengumuman yang disimpan.</p>
        <a href="{{ route('announcements.index') }}" class="btn btn-primary">Jelajahi Pengumuman</a>
    </div>
@else
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($bookmarks as $bookmark)
        @php $ann = $bookmark->announcement; @endphp
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <span class="badge bg-{{ $kategoriColors[$ann->kategori] ?? 'secondary' }} mb-2">{{ $ann->kategori }}</span>
                    <h6 class="card-title fw-bold">{{ $ann->judul }}</h6>
                    <p class="card-text text-muted small">{{ Str::limit($ann->deskripsi, 100) }}</p>
                </div>
                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                    <a href="{{ route('announcements.show', $ann) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus bookmark?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">{{ $bookmarks->links() }}</div>
@endif
@endsection
