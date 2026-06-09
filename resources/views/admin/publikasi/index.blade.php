@extends('admin.layout')
@section('title', 'Kelola Publikasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Daftar Publikasi</h3>
        <a href="{{ route('admin.publikasi.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Publikasi
        </a>
    </div>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tahun</th>
                    <th>PDF</th>
                    <th>Tampil di Home</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($publikasi as $p)
                <tr>
                    <td style="color:#9ca3af;">{{ $loop->iteration }}</td>
                    <td>
                        @if($p->cover)
                            <img src="{{ asset('images/publikasi/'.$p->cover) }}" alt=""
                                style="height:48px;width:36px;object-fit:cover;border-radius:4px;border:1px solid #e5e7eb;">
                        @else
                            <div style="height:48px;width:36px;background:#e8f0fe;border-radius:4px;display:flex;align-items:center;justify-content:center;color:#1a56db;font-size:18px;">
                                <i class="fas fa-book"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight:600;max-width:260px;">{{ $p->judul }}</td>
                    <td><span class="badge badge-info">{{ $p->kategori }}</span></td>
                    <td>{{ $p->tahun }}</td>
                    <td>
                        @if($p->file_pdf)
                            <a href="{{ asset('files/publikasi/'.$p->file_pdf) }}" target="_blank"
                                style="color:#1a56db;font-size:12.5px;"><i class="fas fa-file-pdf"></i> Lihat</a>
                        @else
                            <span style="color:#9ca3af;font-size:12px;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($p->tampil_di_home)
                            <span class="badge badge-success">Ya</span>
                        @else
                            <span class="badge badge-gray">Tidak</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:6px;">
                        <a href="{{ route('admin.publikasi.edit', $p) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.publikasi.destroy', $p) }}"
                            onsubmit="return confirm('Hapus publikasi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" style="text-align:center;color:#9ca3af;padding:32px;">Belum ada publikasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
