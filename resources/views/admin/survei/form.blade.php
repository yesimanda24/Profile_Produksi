@extends('admin.layout')
@section('title', $survei ? 'Edit Survei' : 'Tambah Survei')

@section('content')
<div class="card" style="max-width:720px;">
    <div class="card-header">
        <h3>{{ $survei ? 'Edit Survei: '.$survei->nama : 'Tambah Survei Baru' }}</h3>
        <a href="{{ route('admin.survei') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ $survei ? route('admin.survei.update', $survei) : route('admin.survei.store') }}"
            enctype="multipart/form-data">
            @csrf
            @if($survei) @method('PUT') @endif

            <div class="form-group">
                <label>Nama Survei *</label>
                <input type="text" name="nama" value="{{ old('nama', $survei?->nama) }}" required
                    placeholder="Contoh: Survei Ubinan">
            </div>

            <div class="form-group">
                <label>Tim *</label>
                <select name="tim" required>
                    <option value="">-- Pilih Tim --</option>
                    <option value="Sumber Daya Hayati" {{ old('tim', $survei?->tim) == 'Sumber Daya Hayati' ? 'selected':'' }}>
                        Sumber Daya Hayati (SDH)
                    </option>
                    <option value="Sumber Daya Mineral Konstruksi dan Industri" {{ old('tim', $survei?->tim) == 'Sumber Daya Mineral Konstruksi dan Industri' ? 'selected':'' }}>
                        Sumber Daya Mineral Konstruksi dan Industri (SDMKI)
                    </option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Target *</label>
                    <input type="number" name="target" value="{{ old('target', $survei?->target ?? 0) }}" min="0" required>
                </div>
                <div class="form-group">
                    <label>Realisasi *</label>
                    <input type="number" name="realisasi" value="{{ old('realisasi', $survei?->realisasi ?? 0) }}" min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label>Progres (%) *</label>
                <input type="number" name="progres" value="{{ old('progres', $survei?->progres ?? 0) }}" min="0" max="100" required style="width:120px;">
                <p class="form-hint">Isi 0–100. Nilai 100 = selesai.</p>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tanggal Mulai *</label>
                    <input type="date" name="tanggal_mulai"
                        value="{{ old('tanggal_mulai', $survei?->tanggal_mulai?->format('Y-m-d')) }}" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai *</label>
                    <input type="date" name="tanggal_selesai"
                        value="{{ old('tanggal_selesai', $survei?->tanggal_selesai?->format('Y-m-d')) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Buku Pedoman (PDF)</label>
                @if($survei && $survei->buku_pedoman)
                    <p class="form-hint" style="margin-bottom:6px;">File saat ini: {{ $survei->buku_pedoman }}</p>
                @endif
                <input type="file" name="buku_pedoman" accept=".pdf">
                <p class="form-hint">Format PDF, maks 10MB. Kosongkan jika tidak berubah.</p>
            </div>

            <div class="form-group">
                <label>Kuesioner (PDF)</label>
                @if($survei && $survei->kuesioner)
                    <p class="form-hint" style="margin-bottom:6px;">File saat ini: {{ $survei->kuesioner }}</p>
                @endif
                <input type="file" name="kuesioner" accept=".pdf">
                <p class="form-hint">Format PDF, maks 10MB.</p>
            </div>

            <div class="form-group">
                <label>Daftar Sampel (PDF)</label>
                @if($survei && $survei->daftar_sampel)
                    <p class="form-hint" style="margin-bottom:6px;">File saat ini: {{ $survei->daftar_sampel }}</p>
                @endif
                <input type="file" name="daftar_sampel" accept=".pdf">
                <p class="form-hint">Format PDF, maks 10MB.</p>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:10px;">
                <input type="checkbox" name="aktif" id="aktif" style="width:16px;height:16px;"
                    {{ old('aktif', $survei ? $survei->aktif : true) ? 'checked' : '' }}>
                <label for="aktif" style="margin:0;cursor:pointer;">Survei Aktif (tampil di website)</label>
            </div>

            <div style="display:flex;gap:10px;margin-top:8px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-floppy-disk"></i> Simpan
                </button>
                <a href="{{ route('admin.survei') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
