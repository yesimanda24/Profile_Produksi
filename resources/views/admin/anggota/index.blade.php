@extends('admin.layout')
@section('title', 'Kelola Anggota Tim')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Daftar Anggota Tim</h3>
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Anggota
        </a>
    </div>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tim</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggota as $a)
                <tr>
                    <td style="color:#9ca3af;">{{ $loop->iteration }}</td>
                    <td>
                        @if($a->foto)
                            <img src="{{ asset('images/'.$a->foto) }}" alt="{{ $a->nama }}"
                                style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid #e5e7eb;">
                        @else
                            <div style="width:40px;height:40px;border-radius:50%;background:#e8f0fe;display:flex;align-items:center;justify-content:center;color:#1a56db;">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight:600;">{{ $a->nama }}</td>
                    <td>{{ $a->jabatan }}</td>
                    <td>
                        @if($a->tim)
                            <span class="badge badge-info">{{ $a->tim }}</span>
                        @else
                            <span class="badge badge-gray">Pimpinan</span>
                        @endif
                    </td>
                    <td>{{ $a->urutan }}</td>
                    <td>
                        @if($a->aktif)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:6px;flex-wrap:wrap;">
                        <a href="{{ route('admin.anggota.edit', $a) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.anggota.destroy', $a) }}"
                            onsubmit="return confirm('Hapus anggota {{ $a->nama }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" style="text-align:center;color:#9ca3af;padding:32px;">Belum ada anggota.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
