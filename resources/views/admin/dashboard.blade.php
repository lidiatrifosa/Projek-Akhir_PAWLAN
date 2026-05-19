@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard Admin</h2>
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Tambah Pengumuman
    </a>
</div>

{{-- Stats Cards --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-2 fw-bold">{{ $stats['total_announcements'] }}</div>
                    <div>Total Pengumuman</div>
                </div>
                <i class="bi bi-megaphone fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-2 fw-bold">{{ $stats['total_users'] }}</div>
                    <div>Total Mahasiswa</div>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-white shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-2 fw-bold">{{ $stats['total_bookmarks'] }}</div>
                    <div>Total Bookmark</div>
                </div>
                <i class="bi bi-bookmark-fill fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Kategori Stats --}}
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-header fw-bold">Pengumuman per Kategori</div>
            <div class="card-body">
                @foreach(['Akademik','Event','Beasiswa','Magang','Organisasi'] as $k)
                <div class="d-flex justify-content-between mb-2">
                    <span>{{ $k }}</span>
                    <span class="badge bg-secondary">{{ $stats['by_kategori'][$k] ?? 0 }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Recent Announcements --}}
    <div class="col-md-8">
        <div class="card shadow-sm h-100">
            <div class="card-header d-flex justify-content-between align-items-center fw-bold">
                Pengumuman Terbaru
                <a href="{{ route('admin.announcements.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>Judul</th><th>Kategori</th><th>Tanggal</th></tr>
                    </thead>
                    <tbody>
                        @foreach($recent as $ann)
                        <tr>
                            <td><a href="{{ route('announcements.show', $ann) }}" class="text-decoration-none">{{ Str::limit($ann->judul, 40) }}</a></td>
                            <td><span class="badge bg-secondary">{{ $ann->kategori }}</span></td>
                            <td class="small text-muted">{{ $ann->tanggal_mulai->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
