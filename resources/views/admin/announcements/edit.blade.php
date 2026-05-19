@extends('layouts.app')
@section('title', 'Edit Pengumuman')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-sm btn-outline-secondary me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h2 class="fw-bold mb-0">Edit Pengumuman</h2>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('admin.announcements._form')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>Perbarui Pengumuman
                        </button>
                        <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
