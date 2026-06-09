<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Survei;
use App\Models\Kegiatan;
use App\Models\Publikasi;

class AdminController extends Controller
{
    // ===================== DASHBOARD ADMIN =====================
    public function dashboard()
    {
        $stats = [
            'anggota'    => Anggota::where('aktif', true)->count(),
            'survei'     => Survei::where('aktif', true)->count(),
            'kegiatan'   => Kegiatan::count(),
            'publikasi'  => Publikasi::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    // ===================== ANGGOTA =====================
    public function anggotaIndex()
    {
        $anggota = Anggota::orderBy('urutan')->get();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function anggotaCreate()
    {
        return view('admin.anggota.form', ['anggota' => null]);
    }

    public function anggotaStore(Request $request)
    {
        $data = $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'tim'     => 'nullable|string|max:20',
            'urutan'  => 'nullable|integer',
            'aktif'   => 'nullable|boolean',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['foto'] = $filename;
        }

        $data['aktif'] = $request->has('aktif');
        Anggota::create($data);

        return redirect()->route('admin.anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function anggotaEdit(Anggota $anggota)
    {
        return view('admin.anggota.form', compact('anggota'));
    }

    public function anggotaUpdate(Request $request, Anggota $anggota)
    {
        $data = $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'tim'     => 'nullable|string|max:20',
            'urutan'  => 'nullable|integer',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['foto'] = $filename;
        }

        $data['aktif'] = $request->has('aktif');
        $anggota->update($data);

        return redirect()->route('admin.anggota')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function anggotaDestroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('admin.anggota')->with('success', 'Anggota berhasil dihapus.');
    }

    // ===================== SURVEI =====================
    public function surveiIndex()
    {
        $survei = Survei::orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.survei.index', compact('survei'));
    }

    public function surveiCreate()
    {
        return view('admin.survei.form', ['survei' => null]);
    }

    public function surveiStore(Request $request)
    {
        $data = $request->validate([
            'nama'             => 'required|string|max:150',
            'tim'              => 'required|string|max:100',
            'target'           => 'required|integer|min:0',
            'realisasi'        => 'required|integer|min:0',
            'progres'          => 'required|integer|min:0|max:100',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'buku_pedoman'     => 'nullable|file|mimes:pdf|max:10240',
            'kuesioner'        => 'nullable|file|mimes:pdf|max:10240',
            'daftar_sampel'    => 'nullable|file|mimes:pdf|max:10240',
        ]);

        foreach (['buku_pedoman', 'kuesioner', 'daftar_sampel'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('files'), $filename);
                $data[$field] = $filename;
            }
        }

        $data['aktif'] = $request->has('aktif');
        Survei::create($data);

        return redirect()->route('admin.survei')->with('success', 'Survei berhasil ditambahkan.');
    }

    public function surveiEdit(Survei $survei)
    {
        return view('admin.survei.form', compact('survei'));
    }

    public function surveiUpdate(Request $request, Survei $survei)
    {
        $data = $request->validate([
            'nama'             => 'required|string|max:150',
            'tim'              => 'required|string|max:100',
            'target'           => 'required|integer|min:0',
            'realisasi'        => 'required|integer|min:0',
            'progres'          => 'required|integer|min:0|max:100',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'buku_pedoman'     => 'nullable|file|mimes:pdf|max:10240',
            'kuesioner'        => 'nullable|file|mimes:pdf|max:10240',
            'daftar_sampel'    => 'nullable|file|mimes:pdf|max:10240',
        ]);

        foreach (['buku_pedoman', 'kuesioner', 'daftar_sampel'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('files'), $filename);
                $data[$field] = $filename;
            } else {
                unset($data[$field]);
            }
        }

        $data['aktif'] = $request->has('aktif');
        $survei->update($data);

        return redirect()->route('admin.survei')->with('success', 'Survei berhasil diperbarui.');
    }

    public function surveiDestroy(Survei $survei)
    {
        $survei->delete();
        return redirect()->route('admin.survei')->with('success', 'Survei berhasil dihapus.');
    }

    // ===================== KEGIATAN =====================
    public function kegiatanIndex()
    {
        $kegiatan = Kegiatan::orderBy('tanggal', 'desc')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function kegiatanCreate()
    {
        return view('admin.kegiatan.form', ['kegiatan' => null]);
    }

    public function kegiatanStore(Request $request)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:200',
            'deskripsi'      => 'nullable|string',
            'tanggal'        => 'required|date',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tampil_di_home' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/kegiatan'), $filename);
            $data['gambar'] = $filename;
        }

        $data['tampil_di_home'] = $request->has('tampil_di_home');
        Kegiatan::create($data);

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function kegiatanEdit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.form', compact('kegiatan'));
    }

    public function kegiatanUpdate(Request $request, Kegiatan $kegiatan)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:200',
            'deskripsi'      => 'nullable|string',
            'tanggal'        => 'required|date',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tampil_di_home' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/kegiatan'), $filename);
            $data['gambar'] = $filename;
        }

        $data['tampil_di_home'] = $request->has('tampil_di_home');
        $kegiatan->update($data);

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function kegiatanDestroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil dihapus.');
    }

    // ===================== PUBLIKASI =====================
    public function publikasiIndex()
    {
        $publikasi = Publikasi::orderBy('tahun', 'desc')->get();
        return view('admin.publikasi.index', compact('publikasi'));
    }

    public function publikasiCreate()
    {
        return view('admin.publikasi.form', ['publikasi' => null]);
    }

    public function publikasiStore(Request $request)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:200',
            'kategori'       => 'required|string|max:50',
            'tahun'          => 'required|integer|min:2000|max:2100',
            'cover'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_pdf'       => 'nullable|file|mimes:pdf|max:20480',
            'tampil_di_home' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_cover_' . $file->getClientOriginalName();
            $file->move(public_path('images/publikasi'), $filename);
            $data['cover'] = $filename;
        }

        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/publikasi'), $filename);
            $data['file_pdf'] = $filename;
        }

        $data['tampil_di_home'] = $request->has('tampil_di_home');
        Publikasi::create($data);

        return redirect()->route('admin.publikasi')->with('success', 'Publikasi berhasil ditambahkan.');
    }

    public function publikasiEdit(Publikasi $publikasi)
    {
        return view('admin.publikasi.form', compact('publikasi'));
    }

    public function publikasiUpdate(Request $request, Publikasi $publikasi)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:200',
            'kategori'       => 'required|string|max:50',
            'tahun'          => 'required|integer|min:2000|max:2100',
            'cover'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_pdf'       => 'nullable|file|mimes:pdf|max:20480',
            'tampil_di_home' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_cover_' . $file->getClientOriginalName();
            $file->move(public_path('images/publikasi'), $filename);
            $data['cover'] = $filename;
        }

        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files/publikasi'), $filename);
            $data['file_pdf'] = $filename;
        }

        $data['tampil_di_home'] = $request->has('tampil_di_home');
        $publikasi->update($data);

        return redirect()->route('admin.publikasi')->with('success', 'Publikasi berhasil diperbarui.');
    }

    public function publikasiDestroy(Publikasi $publikasi)
    {
        $publikasi->delete();
        return redirect()->route('admin.publikasi')->with('success', 'Publikasi berhasil dihapus.');
    }
}
