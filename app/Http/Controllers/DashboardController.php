<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Survei lengkap untuk digunakan di semua bagian
        $surveys = [
            // --- Sumber Daya Hayati ---
            ['id' => 'sdh_1', 'name' => 'Survei Ubinan', 'team' => 'Sumber Daya Hayati', 'class' => 'bar-sdh', 'target' => 350, 'realization' => 340, 'start' => '-5 days', 'end' => '+10 days', 'progress' => 80],
            ['id' => 'sdh_2', 'name' => 'Survei KSA Padi', 'team' => 'Sumber Daya Hayati', 'class' => 'bar-sdh', 'target' => 500, 'realization' => 450, 'start' => '-2 days', 'end' => '+5 days', 'progress' => 60],
            ['id' => 'sdh_3', 'name' => 'KSA Jagung', 'team' => 'Sumber Daya Hayati', 'class' => 'bar-sdh', 'target' => 200, 'realization' => 100, 'start' => '+1 days', 'end' => '+15 days', 'progress' => 20],
            ['id' => 'sdh_4', 'name' => 'Survei Perkebunan', 'team' => 'Sumber Daya Hayati', 'class' => 'bar-sdh', 'target' => 150, 'realization' => 150, 'start' => '-20 days', 'end' => '-2 days', 'progress' => 100],
            ['id' => 'sdh_5', 'name' => 'Survei Hortikultura', 'team' => 'Sumber Daya Hayati', 'class' => 'bar-sdh', 'target' => 280, 'realization' => 50, 'start' => '+5 days', 'end' => '+25 days', 'progress' => 10],

            // --- Sumber Daya Mineral Konstruksi dan Industri ---
            ['id' => 'sdm_1', 'name' => 'Survei Konstruksi', 'team' => 'Sumber Daya Mineral Konstruksi dan Industri', 'class' => 'bar-sdmki', 'target' => 120, 'realization' => 90, 'start' => '-10 days', 'end' => '+4 days', 'progress' => 75],
            ['id' => 'sdm_2', 'name' => 'IMK Triwulanan', 'team' => 'Sumber Daya Mineral Konstruksi dan Industri', 'class' => 'bar-sdmki', 'target' => 400, 'realization' => 380, 'start' => '-15 days', 'end' => '+0 days', 'progress' => 95],
            ['id' => 'sdm_3', 'name' => 'IBS Triwulanan', 'team' => 'Sumber Daya Mineral Konstruksi dan Industri', 'class' => 'bar-sdmki', 'target' => 85, 'realization' => 85, 'start' => '-30 days', 'end' => '-5 days', 'progress' => 100],
            ['id' => 'sdm_4', 'name' => 'Survei Air Bersih', 'team' => 'Sumber Daya Mineral Konstruksi dan Industri', 'class' => 'bar-sdmki', 'target' => 40, 'realization' => 0, 'start' => '+10 days', 'end' => '+30 days', 'progress' => 0],
        ];

        // 2. Bar Chart Data: Monitor Realisasi
        $barChartData = [
            'labels' => array_column($surveys, 'name'),
            'targets' => array_column($surveys, 'target'),
            'realizations' => array_column($surveys, 'realization')
        ];

        // 3. Gantt Chart Data (5 Tahapan Beririsan per Survei & Dibagi jadi 2 Tim)
        $ganttSDH = [];
        $ganttSDMKI = [];
        $upcomingSurveys = [];
        $now = strtotime('today');
        
        foreach ($surveys as $survey) {
            $baseStart = strtotime($survey['start']);
            $t1_s_time = $baseStart;
            $t5_e_time = strtotime('+28 days', $baseStart);

            if ($now > $t5_e_time) {
                // MELEWATI BATAS (PAST) -> Diabaikan sepenuhnya
                continue;
            } elseif ($now < $t1_s_time) {
                // BELUM JALAN (UPCOMING) -> Masukkan ke List Peringatan
                $upcomingSurveys[] = [
                    'team' => $survey['team'],
                    'name' => $survey['name'],
                    'start_date' => date('Y-m-d', $t1_s_time),
                    'days_left' => ceil(($t1_s_time - $now) / 86400)
                ];
                continue;
            }
            
            // SEDANG BERJALAN (RUNNING) -> Buat balok Gantt-nya
            $t1_s = date('Y-m-d', $baseStart);
            $t1_e = date('Y-m-d', strtotime('+3 days', $baseStart));
            $t2_s = date('Y-m-d', strtotime('+3 days', $baseStart));
            $t2_e = date('Y-m-d', strtotime('+18 days', $baseStart));
            $t3_s = date('Y-m-d', strtotime('+10 days', $baseStart));
            $t3_e = date('Y-m-d', strtotime('+22 days', $baseStart));
            $t4_s = date('Y-m-d', strtotime('+16 days', $baseStart));
            $t4_e = date('Y-m-d', strtotime('+26 days', $baseStart)); 
            $t5_s = date('Y-m-d', strtotime('+25 days', $baseStart));
            $t5_e = date('Y-m-d', strtotime('+28 days', $baseStart));

            // Bentuk task nodes
            $tasks = [
                // Blok Pembungkus Nama Survei
                ['id' => $survey['id'].'_group', 'name' => $survey['name'], 'start' => $t1_s, 'end' => $t5_e, 'progress' => $survey['progress'], 'dependencies' => '', 'custom_class' => 'bar-group'],
                
                // 5 Tahapan Sub-task (Tipis)
                ['id' => $survey['id'].'_1', 'name' => 'Briefing', 'start' => $t1_s, 'end' => $t1_e, 'progress' => min(100, $survey['progress']*1.5), 'dependencies' => '', 'custom_class' => 'bar-tahap1'],
                ['id' => $survey['id'].'_2', 'name' => 'Pencacahan', 'start' => $t2_s, 'end' => $t2_e, 'progress' => $survey['progress'], 'dependencies' => $survey['id'].'_1', 'custom_class' => 'bar-tahap2'],
                ['id' => $survey['id'].'_3', 'name' => 'Pemeriksaan', 'start' => $t3_s, 'end' => $t3_e, 'progress' => max(0, $survey['progress']-20), 'dependencies' => '', 'custom_class' => 'bar-tahap3'],
                ['id' => $survey['id'].'_4', 'name' => 'Pengolahan', 'start' => $t4_s, 'end' => $t4_e, 'progress' => max(0, $survey['progress']-50), 'dependencies' => '', 'custom_class' => 'bar-tahap4'],
                ['id' => $survey['id'].'_5', 'name' => 'Evaluasi', 'start' => $t5_s, 'end' => $t5_e, 'progress' => max(0, $survey['progress']-80), 'dependencies' => '', 'custom_class' => 'bar-tahap5'],
            ];

            if (strpos(strtolower($survey['team']), 'hayati') !== false) {
                // Masukkan ke array SDH
                foreach ($tasks as $task) $ganttSDH[] = $task;
            } else {
                // Masukkan ke array SDMKI
                foreach ($tasks as $task) $ganttSDMKI[] = $task;
            }
        }

        // 4. Informasi Kegiatan Survei (Untuk Cards)
        // Kita juga tambahkan dummy text untuk pedoman/kuesionernya
        $activitiesInfo = array_map(function($survey) {
            $status = ($survey['progress'] == 100) ? 'Selesai' : (($survey['progress'] == 0) ? 'Persiapan' : 'Berjalan');
            return [
                'team' => $survey['team'],
                'name' => $survey['name'],
                'target' => $survey['target'],
                'realization' => $survey['realization'],
                'progress' => $survey['progress'],
                'status' => $status,
                'guideline' => 'Buku Pedoman ' . $survey['name'] . ' 2026.pdf',
                'questionnaire' => 'Kuesioner V.1 ' . $survey['name'],
            ];
        }, $surveys);

        return view('dashboard', compact('barChartData', 'ganttSDH', 'ganttSDMKI', 'activitiesInfo', 'upcomingSurveys'));
    }
}
