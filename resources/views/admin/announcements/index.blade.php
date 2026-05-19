@extends('layouts.app')
@section('title', 'Kelola Pengumuman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-list-ul me-2 text-primary"></i>Kelola Pengumuman</h2>
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Tambah Pengumuman
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal Mulai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $ann)
                <tr>
                    <td>{{ $loop->iteration + ($announcements->currentPage() - 1) * $announcements->perPage() }}</td>
                    <td>{{ Str::limit($ann->judul, 50) }}</td>
                    <td><span class="badge bg-secondary">{{ $ann->kategori }}</span></td>
                    <td class="small">{{ $ann->tanggal_mulai->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('announcements.show', $ann) }}" class="btn btn-sm btn-outline-info" title="Lihat">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.announcements.edit', $ann) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.announcements.destroy', $ann) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus pengumuman ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pengumuman.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3 d-flex justify-content-center">{{ $announcements->links() }}</div>
@endsection
