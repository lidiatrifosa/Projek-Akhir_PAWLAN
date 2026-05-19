<div class="mb-3">
    <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
           value="{{ old('judul', $announcement->judul ?? '') }}" required>
    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
            <option value="">Pilih Kategori</option>
            @foreach(['Akademik','Event','Beasiswa','Magang','Organisasi'] as $k)
                <option value="{{ $k }}" @selected(old('kategori', $announcement->kategori ?? '') === $k)>{{ $k }}</option>
            @endforeach
        </select>
        @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Fakultas</label>
        <input type="text" name="fakultas" class="form-control"
               value="{{ old('fakultas', $announcement->fakultas ?? '') }}" placeholder="Opsional">
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Tanggal Mulai <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror"
               value="{{ old('tanggal_mulai', isset($announcement) ? $announcement->tanggal_mulai->format('Y-m-d') : '') }}" required>
        @error('tanggal_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control"
               value="{{ old('tanggal_selesai', isset($announcement) && $announcement->tanggal_selesai ? $announcement->tanggal_selesai->format('Y-m-d') : '') }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
    <textarea name="deskripsi" rows="6" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $announcement->deskripsi ?? '') }}</textarea>
    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
        @if(isset($announcement) && $announcement->gambar)
            <small class="text-muted">Gambar saat ini: <a href="{{ Storage::url($announcement->gambar) }}" target="_blank">Lihat</a></small>
        @endif
        @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Lampiran (PDF/DOC)</label>
        <input type="file" name="lampiran" class="form-control @error('lampiran') is-invalid @enderror" accept=".pdf,.doc,.docx">
        @if(isset($announcement) && $announcement->lampiran)
            <small class="text-muted">Lampiran saat ini: <a href="{{ Storage::url($announcement->lampiran) }}" target="_blank">Unduh</a></small>
        @endif
        @error('lampiran')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
