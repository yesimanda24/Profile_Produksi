<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Produksi | BPS Provinsi Jambi</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Frappe Gantt CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.6.1/frappe-gantt.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
</head>
<body>

<!-- SLICING 0: HEADER -->
<header>
    <div class="header-inner">
        <div class="logo-container">
            <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS" class="logo-img">
        </div>
        <div class="header-text">
            <h1>Statistik Produksi</h1>
            <p>Badan Pusat Statistik Provinsi Jambi</p>
        </div>
    </div>
</header>

<div class="dashboard-container">

    <!-- SLICING 1: TAMPILAN AWAL (HERO) -->
    <section class="hero-section">
        <div class="hero-content">
            <h2>Selamat datang di Pusat Informasi Kegiatan Statistik Produksi BPS Provinsi Jambi!</h2>
            <p>
                Situs ini adalah wadah untuk dokumentasi, monitoring dan evaluasi kegiatan statistik produksi. Kegiatan tim Statistik Produksi BPS Provinsi Jambi merupakan implementasi dari program kedeputian Statistik Produksi BPS Pusat. Statistik Produksi BPS Provinsi Jambi, terbagi menjadi 2 tim yaitu:
            </p>
            <ul style="font-size: 1.125rem; color: #e2e8f0; margin-bottom: 2rem; line-height: 1.8;">
                <li>Tim Statistik Sumber Daya Hayati</li>
                <li>Tim Statistik Sumber Daya Mineral, Konstruksi dan Industri</li>
            </ul>
            
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <span class="badge-team" style="border-left: 4px solid var(--sdh-color);">🌱 Sumber Daya Hayati</span>
                <span class="badge-team" style="border-left: 4px solid var(--sdmki-color);">🏗️ Sumber Daya Mineral, Konstruksi & Industri</span>
            </div>
        </div>
    </section>

    <!-- SLICING 2: JADWAL KEGIATAN (GANTT CHART) -->
    <section class="slice-container">
        <h2 class="section-title">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Jadwal Pelaksanaan Survei
        </h2>
        
        <div class="legend" style="flex-wrap: wrap;">
            <div class="legend-item"><div class="legend-color" style="background-color: #8b5cf6;"></div>Pelatihan</div>
            <div class="legend-item"><div class="legend-color" style="background-color: #3b82f6;"></div>Pencacahan</div>
            <div class="legend-item"><div class="legend-color" style="background-color: #f59e0b;"></div>Pemeriksaan</div>
            <div class="legend-item"><div class="legend-color" style="background-color: #ec4899;"></div>Pengolahan</div>
            <div class="legend-item"><div class="legend-color" style="background-color: #10b981;"></div>Evaluasi</div>
        </div>

        <h3 style="color: var(--primary-color); border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-top: 2rem;">🌱 Tim Statistik Sumber Daya Hayati</h3>
        @if(count($ganttSDH) > 0)
            <div id="gantt-sdh" style="overflow-x: auto; margin-bottom: 2.5rem;"></div>
        @else
            <div style="padding: 1.5rem; margin-bottom: 2.5rem; background: #f8fafc; border-radius: 8px; border: 1px dashed #cbd5e1; text-align: center; color: #64748b; font-weight: 500;">
                <svg width="24" height="24" style="display:block; margin: 0 auto 0.5rem auto; color:#94a3b8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Tidak ada rutinitas survei yang sedang berjalan saat ini.
            </div>
        @endif

        <h3 style="color: var(--primary-color); border-bottom: 2px solid #e2e8f0; padding-bottom: 8px;">🏗️ Tim Statistik Sumber Daya Mineral, Konstruksi & Industri</h3>
        @if(count($ganttSDMKI) > 0)
            <div id="gantt-sdmki" style="overflow-x: auto;"></div>
        @else
            <div style="padding: 1.5rem; background: #f8fafc; border-radius: 8px; border: 1px dashed #cbd5e1; text-align: center; color: #64748b; font-weight: 500;">
                <svg width="24" height="24" style="display:block; margin: 0 auto 0.5rem auto; color:#94a3b8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Tidak ada rutinitas survei yang sedang berjalan saat ini.
            </div>
        @endif
    </section>

    <!-- SLICING 2.5: UPCOMING SURVEI -->
    @if(count($upcomingSurveys) > 0)
    <section class="slice-container" style="background-color: #f8fafc; border-color: #e2e8f0; border-top-left-radius: 0; border-top-right-radius: 0; border-top: 0; padding-top: 1rem;">
        <h2 class="section-title" style="color: var(--text-main); font-size: 1.25rem;">
            ⏳ Kegiatan Persiapan Mendatang
        </h2>
        <div style="display: flex; gap: 1rem; overflow-x: auto; padding-bottom: 0.5rem;">
            @foreach($upcomingSurveys as $up)
            <div style="min-width: 250px; background: white; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.25rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
                <div style="display:flex; justify-content: space-between; align-items:flex-start; margin-bottom: 0.75rem;">
                    <span class="badge-status" style="background: #fef9c3; color: #854d0e; margin: 0;">Dimulai Dalam {{ $up['days_left'] }} Hari</span>
                </div>
                <h4 style="margin: 0 0 0.5rem 0; font-size: 1rem; line-height:1.2;">{{ $up['name'] }}</h4>
                <p style="margin: 0 0 0.25rem 0; font-size: 0.8rem; color: var(--text-muted); font-weight:500;">
                    Estimasi Mulai / Pelatihan:<br>
                    <span style="color:#1e293b; font-weight:700;">{{ date('d M Y', strtotime($up['start_date'])) }}</span>
                </p>
                <div style="margin-top: 0.75rem; padding-top: 0.75rem; border-top: 1px dashed #e2e8f0;">
                    <p style="margin: 0; font-size: 0.75rem; color: var(--primary-color); font-weight: 600;">{{ $up['team'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- SLICING 3: DASHBOARD MONITORING (BAR CHART) -->
    <section class="slice-container">
        <h2 class="section-title">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            Monitoring Capaian Sampel
        </h2>
        <p style="color: var(--text-muted); margin-top: -1rem; margin-bottom: 2rem;">Perbandingan jumlah target sampel dengan kuesioner yang telah direalisasikan di lapangan.</p>
        
        <div class="chart-wrapper">
            <canvas id="realizationChart"></canvas>
        </div>
    </section>

    <!-- SLICING 4: INFORMASI KEGIATAN SURVEI (CARDS) -->
    <section>
        <h2 class="section-title" style="margin-bottom: 2rem;">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            Informasi Detail Kegiatan Survei
        </h2>
        
        <div class="card-grid">
            @foreach($activitiesInfo as $info)
            @php
                $topClass = ($info['team'] == 'Sumber Daya Hayati') ? 'bg-sdh' : 'bg-sdmki';
                
                $statusClass = 'status-persiapan';
                if($info['status'] == 'Selesai') $statusClass = 'status-selesai';
                if($info['status'] == 'Berjalan') $statusClass = 'status-berjalan';
                
                $colorCode = ($info['team'] == 'Sumber Daya Hayati') ? '#10b981' : '#f59e0b';
            @endphp
            
            <div class="survey-card">
                <div class="card-topbar {{ $topClass }}"></div>
                
                <div class="survey-card-header">
                    <span class="badge-status {{ $statusClass }}">{{ $info['status'] }}</span>
                    <h3>{{ $info['name'] }}</h3>
                    <div class="survey-card-team">{{ $info['team'] }}</div>
                </div>
                
                <div class="survey-card-body">
                    <div class="info-row">
                        <span class="info-label">Capaian Sampel</span>
                        <div class="info-value" style="font-weight: 600;">
                            {{ $info['realization'] }} / {{ $info['target'] }} Unit
                        </div>
                        <div class="mini-progress">
                            <div class="mini-progress-bar" style="width: {{ $info['progress'] }}%; background-color: {{ $colorCode }};"></div>
                        </div>
                    </div>
                    
                    <div class="info-row" style="margin-top: 0.5rem;">
                        <span class="info-label">Dokumen Pedoman</span>
                        <div class="info-value">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <a href="#">{{ $info['guideline'] }}</a>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Kuesioner Pendataan</span>
                        <div class="info-value">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <a href="#">{{ $info['questionnaire'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.6.1/frappe-gantt.min.js"></script>

<script>
    const barChartData = @json($barChartData);
    const ganttSDH = @json($ganttSDH);
    const ganttSDMKI = @json($ganttSDMKI);

    // SLICING 3: Initialize Bar Chart
    const ctx = document.getElementById('realizationChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: barChartData.labels,
            datasets: [
                {
                    label: 'Target Sampel',
                    data: barChartData.targets,
                    backgroundColor: '#e2e8f0',
                    borderRadius: 6,
                    borderWidth: 0,
                    categoryPercentage: 0.8,
                    barPercentage: 0.9,
                },
                {
                    label: 'Realisasi Berjalan',
                    data: barChartData.realizations,
                    backgroundColor: '#15803d', // BPS Green Theme
                    borderRadius: 6,
                    borderWidth: 0,
                    categoryPercentage: 0.8,
                    barPercentage: 0.9,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { borderDash: [2, 4], color: '#f1f5f9' }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { position: 'top', align: 'end' }
            }
        }
    });

    // SLICING 2: Initialize Gantt Charts
    const initGantt = (containerId, data) => {
        if(!data || data.length === 0) return null;
        
        return new Gantt(containerId, data, {
            header_height: 40,
            column_width: 25,
            step: 24,
            view_modes: ['Quarter Day', 'Half Day', 'Day', 'Week', 'Month'],
            bar_height: 12, // Bar lebih tipis untuk menghemat tempat
            bar_corner_radius: 2,
            arrow_curve: 5,
            padding: 10,
            view_mode: 'Day',
            custom_popup_html: function(task) {
                const diffTime = Math.abs(task._end - task._start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                // Format tgl indonesia
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const startDateStr = task._start.toLocaleDateString('id-ID', options);
                const endDateStr = task._end.toLocaleDateString('id-ID', options);

                return `
                <div style="padding: 12px; border-radius: 8px; background: white; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); min-width: 220px; border: 1px solid #e2e8f0; z-index: 9999;">
                    <h5 style="margin: 0 0 8px 0; font-size: 14px; font-weight: 700; color: #1e293b;">${task.name}</h5>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.6;">
                        <strong>Pengerjaan:</strong> ${diffDays} Hari<br>
                        <strong>Mulai:</strong> ${startDateStr}<br>
                        <strong>Berakhir:</strong> ${endDateStr}<br>
                        <strong>Status:</strong> ${task.progress}% Selesai
                    </p>
                </div>
                `;
            }
        });
    };

    initGantt("#gantt-sdh", ganttSDH);
    initGantt("#gantt-sdmki", ganttSDMKI);

    // Auto-scroll dan Penyesuaian Label Teks
    setTimeout(() => {
        const containers = document.querySelectorAll('.gantt-container');
        containers.forEach(ganttContainer => {
            const todayHighlight = ganttContainer.querySelector('.today-highlight');
            if (todayHighlight) {
                const todayX = parseFloat(todayHighlight.getAttribute('x'));
                
                // 1. Tarik sumbu X dikurangi 20px agar tanggal 'hari ini' menempel persis di sebelah kiri layar
                const scrollPos = todayX - 20;
                ganttContainer.scrollLeft = scrollPos > 0 ? scrollPos : 0;

                // 2. Modifikasi letak Teks Nama Survei
                ganttContainer.querySelectorAll('.bar-wrapper.bar-group').forEach(group => {
                    const bar = group.querySelector('.bar');
                    const text = group.querySelector('.bar-label');
                    if(bar && text) {
                        const barX = parseFloat(bar.getAttribute('x'));
                        const barWidth = parseFloat(bar.getAttribute('width'));
                        const barEndX = barX + barWidth;
                        
                        // Default anchoring
                        text.setAttribute('text-anchor', 'start');
                        
                        if (todayX < barX) {
                            // Belum mulai -> Rata Kiri di awal bar
                            text.setAttribute('x', barX + 8);
                        } 
                        else if (todayX >= barX && todayX <= barEndX) {
                            // Sedang berjalan -> Teks ditempatkan di posisi garis 'Hari Ini'
                            text.setAttribute('x', todayX + 8);
                        } 
                        else {
                            // Sudah selesai (di masa lalu) -> Rata Kanan di ujung akhir bar
                            text.setAttribute('x', barEndX - 8);
                            text.setAttribute('text-anchor', 'end'); 
                        }
                    }
                });
            }
        });
    }, 150);
</script>

</body>
</html>
