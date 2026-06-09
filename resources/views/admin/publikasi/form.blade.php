@extends('admin.layout')
@section('title', $publikasi ? 'Edit Publikasi' : 'Tambah Publikasi')

@section('content')
<div class="card" style="max-width:640px;">
    <div class="card-header">
        <h3>{{ $publikasi ? 'Edit Publikasi' : 'Tambah Publikasi Baru' }}</h3>
        <a href="{{ route('admin.publikasi') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ $publikasi ? route('admin.publikasi.update', $publikasi) : route('admin.publikasi.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if($publikasi) @method('PUT') @endif

            <div class="form-group">
                <label>Judul Publikasi *</label>
                <input type="text" name="judul" value="{{ old('judul', $publikasi?->judul) }}" required
                    placeholder="Contoh: Laporan Produksi Padi Jambi 2026">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kategori *</label>
                    <select name="kategori" required>
                        <option value="">-- Pilih --</option>
                        @foreach(['Laporan','Buletin','Statistik','Infografis','Lainnya'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $publikasi?->kategori) == $kat ? 'selected':'' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun *</label>
                    <input type="number" name="tahun" value="{{ old('tahun', $publikasi?->tahun ?? date('Y')) }}"
                        min="2000" max="2100" required style="width:120px;">
                </div>
            </div>

            <div class="form-group">
                <label>Cover (Gambar)</label>
                @if($publikasi && $publikasi->cover)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset('images/publikasi/'.$publikasi->cover) }}" alt=""
                            style="height:80px;border-radius:6px;border:1px solid #e5e7eb;">
                    </div>
                @endif
                <input type="file" name="cover" accept="image/*">
                <p class="form-hint">Format: JPG, PNG, WEBP. Maks 2MB.</p>
            </div>

            <div class="form-group">
                <label>File PDF</label>
                @if($publikasi && $publikasi->file_pdf)
                    <p class="form-hint" style="margin-bottom:6px;">File saat ini: {{ $publikasi->file_pdf }}</p>
                @endif
                <input type="file" name="file_pdf" accept=".pdf">
                <p class="form-hint">Format PDF, maks 20MB.</p>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:10px;">
                <input type="checkbox" name="tampil_di_home" id="tampil" style="width:16px;height:16px;"
                    {{ old('tampil_di_home', $publikasi ? $publikasi->tampil_di_home : true) ? 'checked' : '' }}>
                <label for="tampil" style="margin:0;cursor:pointer;">Tampilkan di halaman Home</label>
            </div>

            <div style="display:flex;gap:10px;margin-top:8px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-floppy-disk"></i> Simpan
                </button>
                <a href="{{ route('admin.publikasi') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
