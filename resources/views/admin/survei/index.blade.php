@extends('admin.layout')
@section('title', 'Kelola Survei')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Daftar Survei</h3>
        <a href="{{ route('admin.survei.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Survei
        </a>
    </div>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Survei</th>
                    <th>Tim</th>
                    <th>Target / Realisasi</th>
                    <th>Progres</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($survei as $s)
                <tr>
                    <td style="color:#9ca3af;">{{ $loop->iteration }}</td>
                    <td style="font-weight:600;">{{ $s->nama }}</td>
                    <td>
                        <span class="badge {{ str_contains($s->tim,'Hayati') ? 'badge-success' : 'badge-info' }}" style="font-size:11px;">
                            {{ str_contains($s->tim,'Hayati') ? 'SDH' : 'SDMKI' }}
                        </span>
                    </td>
                    <td>{{ $s->realisasi }} / {{ $s->target }}</td>
                    <td style="width:120px;">
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div class="prog-bar" style="flex:1;">
                                <div class="prog-fill" style="width:{{ $s->progres }}%;background:{{ $s->progres==100?'#16a34a':'#1a56db' }};"></div>
                            </div>
                            <span style="font-size:12px;font-weight:600;color:#374151;white-space:nowrap;">{{ $s->progres }}%</span>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">
                        {{ $s->tanggal_mulai->format('d M Y') }} –<br>
                        {{ $s->tanggal_selesai->format('d M Y') }}
                    </td>
                    <td>
                        @if($s->status == 'Selesai')   <span class="badge badge-success">Selesai</span>
                        @elseif($s->status == 'Berjalan') <span class="badge badge-info">Berjalan</span>
                        @else <span class="badge badge-warning">Persiapan</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:6px;flex-wrap:wrap;">
                        <a href="{{ route('admin.survei.edit', $s) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-pen"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.survei.destroy', $s) }}"
                            onsubmit="return confirm('Hapus survei ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" style="text-align:center;color:#9ca3af;padding:32px;">Belum ada survei.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
