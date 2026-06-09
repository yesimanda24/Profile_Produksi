<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ===== ADMIN USER =====
        DB::table('users')->insert([
            'name'       => 'Admin Produksi',
            'email'      => 'admin@bps.go.id',
            'password'   => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ===== ANGGOTA TIM =====
        $anggota = [
            // Pimpinan (tanpa tim)
            ['nama' => 'Eva Riani',                'jabatan' => 'Kepala Seksi',         'tim' => null,    'foto' => 'eva.png',     'urutan' => 1],
            ['nama' => 'Eny Tristanti',            'jabatan' => 'Koordinator',           'tim' => null,    'foto' => 'eni.png',     'urutan' => 2],
            // Anggota SDH
            ['nama' => 'Fathina Mufrodi',          'jabatan' => 'Anggota',              'tim' => 'SDH',   'foto' => 'fathina.png', 'urutan' => 3],
            ['nama' => 'Muhammad Al Fatih',        'jabatan' => 'Anggota',              'tim' => 'SDH',   'foto' => 'fatih.png',   'urutan' => 4],
            ['nama' => 'Heni Widiyanti',           'jabatan' => 'Anggota',              'tim' => 'SDH',   'foto' => 'heni.png',    'urutan' => 5],
            // Anggota SDMKI
            ['nama' => 'Linda Marlina',            'jabatan' => 'Anggota',              'tim' => 'SDMKI', 'foto' => 'linda.png',   'urutan' => 6],
            ['nama' => 'Oemar Syarief Wibisono',   'jabatan' => 'Anggota',              'tim' => 'SDMKI', 'foto' => 'oemar.png',   'urutan' => 7],
            ['nama' => 'Eka Aulia Liusta',         'jabatan' => 'Anggota',              'tim' => 'SDMKI', 'foto' => 'eka.png',     'urutan' => 8],
        ];

        foreach ($anggota as $a) {
            DB::table('anggota')->insert(array_merge($a, [
                'aktif'      => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ===== SURVEI =====
        $survei = [
            ['nama' => 'Survei Ubinan',       'tim' => 'Sumber Daya Hayati',                               'target' => 350, 'realisasi' => 340, 'progres' => 80,  'tanggal_mulai' => now()->subDays(5)->format('Y-m-d'),  'tanggal_selesai' => now()->addDays(10)->format('Y-m-d')],
            ['nama' => 'Survei KSA Padi',     'tim' => 'Sumber Daya Hayati',                               'target' => 500, 'realisasi' => 450, 'progres' => 60,  'tanggal_mulai' => now()->subDays(2)->format('Y-m-d'),  'tanggal_selesai' => now()->addDays(5)->format('Y-m-d')],
            ['nama' => 'KSA Jagung',          'tim' => 'Sumber Daya Hayati',                               'target' => 200, 'realisasi' => 100, 'progres' => 20,  'tanggal_mulai' => now()->addDays(1)->format('Y-m-d'),  'tanggal_selesai' => now()->addDays(15)->format('Y-m-d')],
            ['nama' => 'Survei Perkebunan',   'tim' => 'Sumber Daya Hayati',                               'target' => 150, 'realisasi' => 150, 'progres' => 100, 'tanggal_mulai' => now()->subDays(20)->format('Y-m-d'), 'tanggal_selesai' => now()->subDays(2)->format('Y-m-d')],
            ['nama' => 'Survei Hortikultura', 'tim' => 'Sumber Daya Hayati',                               'target' => 280, 'realisasi' => 50,  'progres' => 10,  'tanggal_mulai' => now()->addDays(5)->format('Y-m-d'),  'tanggal_selesai' => now()->addDays(25)->format('Y-m-d')],
            ['nama' => 'Survei Konstruksi',   'tim' => 'Sumber Daya Mineral Konstruksi dan Industri',      'target' => 120, 'realisasi' => 90,  'progres' => 75,  'tanggal_mulai' => now()->subDays(10)->format('Y-m-d'), 'tanggal_selesai' => now()->addDays(4)->format('Y-m-d')],
            ['nama' => 'IMK Triwulanan',      'tim' => 'Sumber Daya Mineral Konstruksi dan Industri',      'target' => 400, 'realisasi' => 380, 'progres' => 95,  'tanggal_mulai' => now()->subDays(15)->format('Y-m-d'), 'tanggal_selesai' => now()->format('Y-m-d')],
            ['nama' => 'IBS Triwulanan',      'tim' => 'Sumber Daya Mineral Konstruksi dan Industri',      'target' => 85,  'realisasi' => 85,  'progres' => 100, 'tanggal_mulai' => now()->subDays(30)->format('Y-m-d'), 'tanggal_selesai' => now()->subDays(5)->format('Y-m-d')],
            ['nama' => 'Survei Air Bersih',   'tim' => 'Sumber Daya Mineral Konstruksi dan Industri',      'target' => 40,  'realisasi' => 0,   'progres' => 0,   'tanggal_mulai' => now()->addDays(10)->format('Y-m-d'), 'tanggal_selesai' => now()->addDays(30)->format('Y-m-d')],
        ];

        foreach ($survei as $s) {
            DB::table('survei')->insert(array_merge($s, [
                'aktif'      => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ===== KEGIATAN CONTOH =====
        $kegiatan = [
            ['judul' => 'Pelatihan Petugas Survei Ubinan 2026',          'deskripsi' => 'Pelatihan untuk petugas lapangan survei ubinan tahun 2026.',        'tanggal' => now()->subDays(10)->format('Y-m-d'), 'tampil_di_home' => true],
            ['judul' => 'Rapat Koordinasi Tim Produksi Triwulan I',      'deskripsi' => 'Rapat koordinasi evaluasi kegiatan triwulan pertama.',              'tanggal' => now()->subDays(20)->format('Y-m-d'), 'tampil_di_home' => true],
            ['judul' => 'Workshop Pengolahan Data KSA',                  'deskripsi' => 'Workshop pengolahan dan analisis data Kerangka Sampel Area.',       'tanggal' => now()->subDays(5)->format('Y-m-d'),  'tampil_di_home' => true],
        ];

        foreach ($kegiatan as $k) {
            DB::table('kegiatan')->insert(array_merge($k, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
