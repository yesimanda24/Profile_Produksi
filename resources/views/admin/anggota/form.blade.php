@extends('admin.layout')
@section('title', $anggota ? 'Edit Anggota' : 'Tambah Anggota')

@section('content')
<div class="card" style="max-width:640px;">
    <div class="card-header">
        <h3>{{ $anggota ? 'Edit Anggota: '.$anggota->nama : 'Tambah Anggota Baru' }}</h3>
        <a href="{{ route('admin.anggota') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ $anggota ? route('admin.anggota.update', $anggota) : route('admin.anggota.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if($anggota) @method('PUT') @endif

            <div class="form-group">
                <label>Nama Lengkap *</label>
                <input type="text" name="nama" value="{{ old('nama', $anggota?->nama) }}" required placeholder="Contoh: Eva Riani">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jabatan *</label>
                    <select name="jabatan" required>
                        <option value="">-- Pilih --</option>
                        @foreach(['Kepala Seksi','Koordinator','Anggota'] as $j)
                            <option value="{{ $j }}" {{ old('jabatan', $anggota?->jabatan) == $j ? 'selected' : '' }}>{{ $j }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tim</label>
                    <select name="tim">
                        <option value="">-- Pimpinan (tanpa tim) --</option>
                        <option value="SDH"   {{ old('tim', $anggota?->tim) == 'SDH'   ? 'selected' : '' }}>SDH (Sumber Daya Hayati)</option>
                        <option value="SDMKI" {{ old('tim', $anggota?->tim) == 'SDMKI' ? 'selected' : '' }}>SDMKI (Sumber Daya Mineral dst)</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="urutan" value="{{ old('urutan', $anggota?->urutan ?? 0) }}" min="0" style="width:120px;">
                <p class="form-hint">Angka kecil tampil lebih dulu (0, 1, 2, …)</p>
            </div>

            <div class="form-group">
                <label>Foto</label>
                @if($anggota && $anggota->foto)
                    <div style="margin-bottom:10px;">
                        <img src="{{ asset('images/'.$anggota->foto) }}" alt="foto"
                            style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:2px solid #e5e7eb;">
                        <p class="form-hint">Foto saat ini: {{ $anggota->foto }}</p>
                    </div>
                @endif
                <input type="file" name="foto" accept="image/*">
                <p class="form-hint">Format: JPG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin mengubah foto.</p>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:10px;">
                <input type="checkbox" name="aktif" id="aktif" style="width:16px;height:16px;"
                    {{ old('aktif', $anggota ? $anggota->aktif : true) ? 'checked' : '' }}>
                <label for="aktif" style="margin:0;cursor:pointer;">Anggota Aktif</label>
            </div>

            <div style="display:flex;gap:10px;margin-top:8px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-floppy-disk"></i> Simpan
                </button>
                <a href="{{ route('admin.anggota') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
