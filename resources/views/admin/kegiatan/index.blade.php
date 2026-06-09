@extends('admin.layout')
@section('title', $kegiatan ? 'Edit Kegiatan' : 'Tambah Kegiatan')

@section('content')
<div class="card" style="max-width:640px;">
    <div class="card-header">
        <h3>{{ $kegiatan ? 'Edit Kegiatan' : 'Tambah Kegiatan Baru' }}</h3>
        <a href="{{ route('admin.kegiatan') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ $kegiatan ? route('admin.kegiatan.update', $kegiatan) : route('admin.kegiatan.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if($kegiatan) @method('PUT') @endif

            <div class="form-group">
                <label>Judul Kegiatan *</label>
                <input type="text" name="judul" value="{{ old('judul', $kegiatan?->judul) }}" required
                    placeholder="Contoh: Pelatihan Petugas Survei Ubinan 2026">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" placeholder="Deskripsi singkat kegiatan...">{{ old('deskripsi', $kegiatan?->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label>Tanggal *</label>
                <input type="date" name="tanggal"
                    value="{{ old('tanggal', $kegiatan?->tanggal?->format('Y-m-d')) }}" required style="width:200px;">
            </div>

            <div class="form-group">
                <label>Gambar</label>
                @if($kegiatan && $kegiatan->gambar)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset('images/kegiatan/'.$kegiatan->gambar) }}" alt=""
                            style="height:80px;border-radius:8px;border:1px solid #e5e7eb;">
                    </div>
                @endif
                <input type="file" name="gambar" accept="image/*">
                <p class="form-hint">Format: JPG, PNG, WEBP. Maks 2MB.</p>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:10px;">
                <input type="checkbox" name="tampil_di_home" id="tampil" style="width:16px;height:16px;"
                    {{ old('tampil_di_home', $kegiatan ? $kegiatan->tampil_di_home : true) ? 'checked' : '' }}>
                <label for="tampil" style="margin:0;cursor:pointer;">Tampilkan di halaman Home</label>
            </div>

            <div style="display:flex;gap:10px;margin-top:8px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-floppy-disk"></i> Simpan
                </button>
                <a href="{{ route('admin.kegiatan') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
