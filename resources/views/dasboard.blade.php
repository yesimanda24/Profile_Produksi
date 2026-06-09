<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Tim Statistik Produksi Provinsi Jambi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1a56db; --blue-dark: #1340b0; --blue-light: #e8f0fe; --blue-mid: #3b7de9;
            --green: #16a34a; --green-light: #dcfce7; --green-mid: #22c55e;
            --orange: #f97316; --orange-light: #fff7ed;
            --purple: #7c3aed; --purple-light: #ede9fe;
            --teal: #0d9488; --teal-light: #ccfbf1;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb;
            --gray-300: #d1d5db; --gray-400: #9ca3af; --gray-500: #6b7280;
            --gray-700: #374151; --gray-800: #1f2937; --gray-900: #111827;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.07);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.10);
            --radius: 14px;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: var(--gray-800); background: var(--gray-50); line-height: 1.6; }

        /* PAGE TRANSITION */
        #page-transition {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(255,255,255,0.9); backdrop-filter: blur(4px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none; transition: opacity 0.25s ease;
        }
        #page-transition.active { opacity: 1; pointer-events: all; }
        .pt-spinner { width: 40px; height: 40px; border: 3px solid var(--blue-light); border-top-color: var(--blue); border-radius: 50%; animation: spin 0.7s linear infinite; }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: rgba(255,255,255,0.97); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 2rem; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            transition: box-shadow 0.3s ease;
        }
        .navbar.scrolled { box-shadow: 0 2px 20px rgba(0,0,0,0.08); }
        .navbar-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand-text { font-size: 13px; font-weight: 700; color: var(--gray-900); letter-spacing: 0.02em; }
        .navbar-nav { display: flex; align-items: center; list-style: none; }
        .navbar-nav a { text-decoration: none; color: var(--gray-700); font-size: 14px; font-weight: 500; padding: 6px 16px; border-radius: 6px; transition: color 0.2s; }
        .navbar-nav a:hover { color: var(--blue); }
        .navbar-nav a.active { color: var(--blue); border-bottom: 2px solid var(--blue); border-radius: 0; }

        .page-wrap { margin-top: 64px; }

        /* HERO */
        .dash-hero {
            background: linear-gradient(135deg, #0e2554 0%, #1a56db 60%, #2563eb 100%);
            padding: 2.5rem 3rem; position: relative; overflow: hidden;
            min-height: 180px; display: flex; align-items: center;
        }
        .dash-hero::before {
            content: ''; position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .dash-hero-left { position: relative; z-index: 1; }
        .dash-hero-breadcrumb { font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.55); margin-bottom: 8px; letter-spacing: 0.05em; text-transform: uppercase; }
        .dash-hero-title { font-size: 2rem; font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 10px; }
        .dash-hero-desc { font-size: 13px; color: rgba(255,255,255,0.7); max-width: 400px; line-height: 1.65; }

        .content { padding: 2rem 3rem 4rem; }
        .row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }

        .panel {
            background: var(--white); border-radius: var(--radius); border: 1px solid var(--gray-200);
            padding: 22px 24px; box-shadow: var(--shadow-sm); animation: fadeUp 0.4s ease 0.2s both;
        }
        .panel-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 18px; }
        .panel-title-wrap { display: flex; align-items: center; gap: 10px; }
        .panel-title-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
        .panel-title { font-size: 15px; font-weight: 700; color: var(--gray-900); }
        .panel-subtitle { font-size: 12px; color: var(--gray-400); margin-top: 2px; }

        .category-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 10px; }
        .category-item {
            border: 1px solid var(--gray-200); border-radius: 10px; padding: 12px 14px;
            cursor: pointer; transition: border-color 0.2s, background 0.2s, transform 0.15s;
            display: flex; flex-direction: column; gap: 5px;
        }
        .category-item:hover { border-color: var(--blue); background: var(--blue-light); transform: translateY(-2px); }
        .cat-icon { font-size: 22px; }
        .cat-name { font-size: 12px; font-weight: 700; color: var(--gray-800); line-height: 1.3; }
        .cat-link { font-size: 11.5px; color: var(--blue); font-weight: 600; text-decoration: none; }

        /* ===== PROGRES KEGIATAN PRIORITAS ===== */
        .progres-hero {
            background: linear-gradient(135deg, #e8f4fd 0%, #f0f7ff 50%, #e8f4fd 100%);
            border-radius: var(--radius); border: 1px solid #c7dff7;
            padding: 28px 32px 24px; margin-bottom: 20px; position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: space-between;
        }
        .progres-hero::before {
            content: ''; position: absolute; top: -30px; right: 80px;
            width: 200px; height: 200px; border-radius: 50%;
            background: radial-gradient(circle, rgba(26,86,219,0.06) 0%, transparent 70%);
        }
        .progres-hero-left { position: relative; z-index: 1; }
        .progres-hero-title { font-size: 1.6rem; font-weight: 800; color: #0e2554; margin-bottom: 4px; }
        .progres-hero-sub { font-size: 13px; color: var(--gray-500); }
        .progres-hero-right { position: relative; z-index: 1; display: flex; gap: 14px; }

        .ph-stat {
            background: #fff; border-radius: 14px; padding: 14px 20px;
            box-shadow: 0 2px 10px rgba(26,86,219,0.08); border: 1px solid #e0ecff;
            display: flex; align-items: center; gap: 14px; min-width: 140px;
        }
        .ph-stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
        .ph-icon-blue { background: #1a56db; } .ph-icon-green { background: #16a34a; }
        .ph-icon-orange { background: #f97316; } .ph-icon-red { background: #ef4444; }
        .ph-stat-label { font-size: 11px; color: var(--gray-500); font-weight: 500; }
        .ph-stat-value { font-size: 22px; font-weight: 800; color: var(--gray-900); line-height: 1.1; }
        .ph-stat-sub { font-size: 10.5px; color: var(--gray-400); }
        .ph-update {
            background: #fff; border-radius: 14px; padding: 14px 18px;
            box-shadow: 0 2px 10px rgba(26,86,219,0.08); border: 1px solid #e0ecff;
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 2px;
        }
        .ph-update-icon { font-size: 18px; color: #1a56db; }
        .ph-update-label { font-size: 10px; color: var(--gray-500); font-weight: 600; text-align: center; }
        .ph-update-date { font-size: 14px; font-weight: 800; color: #0e2554; }
        .ph-update-badge { background: #1a56db; color: #fff; font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 20px; }

        .progres-table-wrap { background: #fff; border-radius: var(--radius); border: 1px solid var(--gray-200); box-shadow: var(--shadow-sm); overflow: hidden; margin-bottom: 20px; }
        .progres-table { width: 100%; border-collapse: collapse; }
        .progres-table thead tr { background: #1a56db; }
        .progres-table thead th { color: #fff; font-size: 12.5px; font-weight: 700; padding: 13px 16px; text-align: left; white-space: nowrap; }
        .progres-table thead th:first-child { text-align: center; width: 48px; }
        .progres-table tbody tr { border-bottom: 1px solid var(--gray-100); transition: background 0.15s; }
        .progres-table tbody tr:last-child { border-bottom: none; }
        .progres-table tbody tr:hover { background: var(--gray-50); }
        .progres-table tbody td { padding: 12px 16px; font-size: 13px; color: var(--gray-800); vertical-align: middle; }
        .progres-table tbody td:first-child { text-align: center; font-weight: 700; color: var(--gray-500); }

        .td-name { display: flex; align-items: center; gap: 10px; }
        .td-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .progress-bar-wrap { display: flex; align-items: center; gap: 10px; }
        .progress-info { font-size: 11.5px; color: var(--gray-500); white-space: nowrap; min-width: 110px; }
        .progress-pct { font-size: 13px; font-weight: 700; color: var(--gray-900); min-width: 36px; text-align: right; }
        .progress-bar { flex: 1; height: 7px; background: var(--gray-100); border-radius: 99px; overflow: hidden; min-width: 80px; }
        .progress-fill { height: 100%; border-radius: 99px; }
        .fill-blue { background: #1a56db; } .fill-green { background: #16a34a; } .fill-orange { background: #f97316; }
        .deadline-cell { font-size: 12px; }
        .deadline-date { font-weight: 700; color: var(--gray-800); }
        .deadline-late { font-size: 11px; color: #ef4444; font-weight: 500; }
        .badge { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 700; white-space: nowrap; }
        .badge-green { background: #dcfce7; color: #16a34a; }
        .badge-orange { background: #fff7ed; color: #f97316; }
        .badge-red { background: #fee2e2; color: #ef4444; }

        .progres-bottom { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .insight-panel { background: #fff; border-radius: var(--radius); border: 1px solid var(--gray-200); padding: 22px 24px; box-shadow: var(--shadow-sm); display: flex; gap: 20px; }
        .insight-img { width: 90px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
        .insight-body { flex: 1; }
        .insight-title { font-size: 15px; font-weight: 800; color: var(--gray-900); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; }
        .insight-item { display: flex; align-items: center; gap: 8px; font-size: 12.5px; color: var(--gray-700); margin-bottom: 7px; }
        .insight-dot { width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 9px; }
        .ins-green { background: #dcfce7; color: #16a34a; } .ins-orange { background: #fff7ed; color: #f97316; } .ins-red { background: #fee2e2; color: #ef4444; }
        .insight-avg { background: #f0f7ff; border-radius: 10px; padding: 12px 14px; margin-top: 12px; display: flex; align-items: center; gap: 10px; }
        .insight-avg-val { font-size: 22px; font-weight: 800; color: #1a56db; }
        .insight-avg-label { font-size: 12px; color: var(--gray-600); font-weight: 500; }
        .distribusi-panel { background: #fff; border-radius: var(--radius); border: 1px solid var(--gray-200); padding: 22px 24px; box-shadow: var(--shadow-sm); }
        .distribusi-title { font-size: 15px; font-weight: 800; color: var(--gray-900); margin-bottom: 18px; }
        .distribusi-body { display: flex; align-items: center; gap: 24px; }
        .donut-svg-wrap { position: relative; width: 140px; height: 140px; flex-shrink: 0; }
        .donut-svg-center { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .donut-svg-val { font-size: 22px; font-weight: 800; color: var(--gray-900); }
        .donut-svg-lbl { font-size: 10px; color: var(--gray-400); font-weight: 600; }
        .dist-legend { flex: 1; display: flex; flex-direction: column; gap: 12px; }
        .dist-legend-item { display: flex; align-items: center; gap: 10px; }
        .dist-dot { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }
        .dist-name { font-size: 13px; color: var(--gray-700); flex: 1; }
        .dist-val { font-size: 13px; font-weight: 700; color: var(--gray-900); }
        .dist-pct { font-size: 11px; color: var(--gray-400); }
        .progres-footer { background: #fff; border: 1px solid var(--gray-200); border-radius: var(--radius); padding: 12px 20px; margin-top: 20px; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow-sm); }
        .progres-footer-left { font-size: 12px; color: var(--gray-500); display: flex; align-items: center; gap: 6px; }
        .progres-footer-right { font-size: 12px; color: var(--gray-500); display: flex; align-items: center; gap: 6px; }

        /* ===== MODAL ===== */
        .modal-overlay {
            position: fixed; inset: 0; z-index: 500;
            background: rgba(17,24,39,0.45); backdrop-filter: blur(4px);
            display: flex; align-items: center; justify-content: center;
            padding: 1.5rem; opacity: 0; pointer-events: none;
            transition: opacity 0.25s ease;
        }
        .modal-overlay.show { opacity: 1; pointer-events: all; }
        .modal-box {
            background: var(--white); border-radius: 20px;
            width: 100%; max-width: 540px; max-height: 90vh; overflow-y: auto;
            box-shadow: 0 24px 60px rgba(0,0,0,0.18);
            transform: translateY(20px) scale(0.97);
            transition: transform 0.28s cubic-bezier(0.34,1.56,0.64,1);
        }
        .modal-overlay.show .modal-box { transform: translateY(0) scale(1); }
        .modal-head {
            padding: 22px 24px 16px; border-bottom: 1px solid var(--gray-100);
            display: flex; align-items: flex-start; justify-content: space-between; gap: 12px;
            position: sticky; top: 0; background: #fff; border-radius: 20px 20px 0 0; z-index: 1;
        }
        .modal-head-left h3 { font-size: 17px; font-weight: 800; color: var(--gray-900); margin-bottom: 3px; }
        .modal-head-left p { font-size: 12.5px; color: var(--gray-500); }
        .modal-close {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--gray-100); border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            color: var(--gray-500); font-size: 14px; flex-shrink: 0;
            transition: background 0.2s, color 0.2s;
        }
        .modal-close:hover { background: var(--gray-200); color: var(--gray-900); }
        .modal-body { padding: 12px 16px 20px; }
        .modal-item {
            display: flex; align-items: center; gap: 14px; padding: 14px 12px;
            border-radius: 12px; cursor: default; transition: background 0.18s;
            border-bottom: 1px solid var(--gray-100);
        }
        .modal-item:last-child { border-bottom: none; }
        .modal-item:hover { background: var(--gray-50); }
        .modal-item-icon { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 26px; flex-shrink: 0; }
        .mi-green { background: #dcfce7; } .mi-yellow { background: #fef9c3; }
        .mi-blue  { background: #dbeafe; } .mi-purple { background: #ede9fe; }
        .mi-teal  { background: #ccfbf1; } .mi-orange { background: #fff7ed; }
        .modal-item-body { flex: 1; min-width: 0; }
        .modal-item-title { font-size: 14px; font-weight: 700; color: var(--gray-900); line-height: 1.35; margin-bottom: 4px; }
        .modal-item-desc { font-size: 12px; color: var(--gray-500); line-height: 1.5; }

        @keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }

        @media (max-width:1100px) { .progres-hero{flex-direction:column;gap:20px;} .progres-hero-right{flex-wrap:wrap;} }
        @media (max-width:900px) {
            .content{padding:1.5rem} .dash-hero{padding:2rem 1.5rem;}
            .row-2{grid-template-columns:1fr} .category-grid{grid-template-columns:repeat(2,1fr)}
            .navbar-nav{display:none} .progres-bottom{grid-template-columns:1fr}
        }
    </style>
</head>
<body>

<div id="page-transition"><div class="pt-spinner"></div></div>

<!-- ===== MODAL TANAMAN PANGAN ===== -->
<div class="modal-overlay" id="modalTanamanPangan">
    <div class="modal-box">
        <div class="modal-head">
            <div class="modal-head-left">
                <h3>🌾 Statistik Tanaman Pangan</h3>
                <p>Pilih jenis kegiatan untuk melihat informasi lebih detail.</p>
            </div>
            <button class="modal-close" onclick="tutupModal('modalTanamanPangan')"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="modal-item">
                <div class="modal-item-icon mi-green">🛰️</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Survei Kerangka Sampel Area Padi dan Jagung</div>
                    <div class="modal-item-desc">Kegiatan survei untuk mendapatkan kerangka sampel area padi dan jagung.</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-yellow">🌾</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Ubinan Padi dan Palawija</div>
                    <div class="modal-item-desc">Pengumpulan data melalui kegiatan ubinan untuk komoditas padi dan palawija.</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-blue">⚖️</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Survei Konversi Gabah ke Beras (SKGB)</div>
                    <div class="modal-item-desc">Survei untuk mendapatkan angka konversi gabah ke beras.</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-purple">📊</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Survei Informasi Manajemen Tanaman Pangan (SIMTP)</div>
                    <div class="modal-item-desc">Survei untuk sistem informasi manajemen tanaman pangan.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== MODAL HORTIKULTURA ===== -->
<div class="modal-overlay" id="modalHortikultura">
    <div class="modal-box">
        <div class="modal-head">
            <div class="modal-head-left">
                <h3>🌿 Statistik Hortikultura</h3>
                <p>Pilih jenis kegiatan untuk melihat informasi lebih detail.</p>
            </div>
            <button class="modal-close" onclick="tutupModal('modalHortikultura')"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="modal-item">
                <div class="modal-item-icon mi-green">🥬</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Survei Hortikultura (SBS, TBF, TH, BST)</div>
                    <div class="modal-item-desc">Mencakup Survei Sayuran dan Buah Semusim (SBS), Tanaman Buah-buahan dan Sayuran Tahunan (TBF), Tanaman Hias (TH), dan Biofarmaka/Tanaman Obat (BST).</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-blue">🏢</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Survei Perusahaan Hortikultura (VP)</div>
                    <div class="modal-item-desc">Survei untuk mengumpulkan data dari perusahaan yang bergerak di bidang usaha hortikultura skala besar.</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-yellow">🌱</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Survei Usaha Hortikultura Lainnya (VN)</div>
                    <div class="modal-item-desc">Survei untuk mengumpulkan data usaha hortikultura non-perusahaan dan usaha hortikultura lainnya di Provinsi Jambi.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== MODAL PETERNAKAN ===== -->
<div class="modal-overlay" id="modalPeternakan">
    <div class="modal-box">
        <div class="modal-head">
            <div class="modal-head-left">
                <h3>🐄 Statistik Peternakan</h3>
                <p>Pilih jenis kegiatan untuk melihat informasi lebih detail.</p>
            </div>
            <button class="modal-close" onclick="tutupModal('modalPeternakan')"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="modal-item">
                <div class="modal-item-icon mi-orange">🥩</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Laporan Pemotongan Ternak Bulanan (LPTB)</div>
                    <div class="modal-item-desc">Pengumpulan data pemotongan ternak secara bulanan dari rumah potong hewan dan tempat pemotongan ternak lainnya di Provinsi Jambi.</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-yellow">🐔</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Laporan Ternak Unggas (LTU)</div>
                    <div class="modal-item-desc">Pengumpulan data populasi dan produksi ternak unggas seperti ayam, itik, dan jenis unggas lainnya secara periodik.</div>
                </div>
            </div>
            <div class="modal-item">
                <div class="modal-item-icon mi-teal">📋</div>
                <div class="modal-item-body">
                    <div class="modal-item-title">Laporan Ternak Tahunan (LTT)</div>
                    <div class="modal-item-desc">Pengumpulan data populasi, produksi, dan perkembangan ternak secara tahunan untuk seluruh jenis ternak di Provinsi Jambi.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <a href="/" class="navbar-brand nav-link-transition">
        <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS" style="height:42px;width:auto;object-fit:contain;">
        <span class="brand-text">BPS PROVINSI JAMBI</span>
    </a>
    <ul class="navbar-nav">
        <li><a href="/" class="nav-link-transition">Home</a></li>
        <li><a href="/dashboard" class="active nav-link-transition">Dashboard</a></li>
        <li><a href="/kegiatan" class="nav-link-transition">Kegiatan</a></li>
        <li><a href="/tentang" class="nav-link-transition">Tentang</a></li>
    </ul>
</nav>

<div class="page-wrap">
    <div class="dash-hero">
        <div class="dash-hero-left">
            <div class="dash-hero-breadcrumb">Dashboard</div>
            <div class="dash-hero-title">Tim Statistik Produksi<br>Provinsi Jambi</div>
            <div class="dash-hero-desc">Pusat informasi kegiatan statistik produksi untuk monitoring dan evaluasi kegiatan di lingkungan BPS Provinsi Jambi.</div>
        </div>
    </div>

    <div class="content">
        <div class="row-2">
            <!-- SDH Panel -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title-wrap">
                        <div class="panel-title-icon" style="background:#dcfce7;">🌿</div>
                        <div>
                            <div class="panel-title" style="color:#16a34a;">SDH (Sektor Hayati)</div>
                            <div class="panel-subtitle">Statistik terkait sumber daya hayati dan lingkungan</div>
                        </div>
                    </div>
                </div>
                <div class="category-grid">
                    <div class="category-item" onclick="bukaModal('modalTanamanPangan')">
                        <div class="cat-icon">🌾</div>
                        <div class="cat-name">Statistik Tanaman Pangan</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item" onclick="bukaModal('modalHortikultura')">
                        <div class="cat-icon">🌿</div>
                        <div class="cat-name">Statistik Hortikultura</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item" onclick="bukaModal('modalPeternakan')">
                        <div class="cat-icon">🐄</div>
                        <div class="cat-name">Statistik Peternakan</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-icon">🌴</div>
                        <div class="cat-name">Statistik Perkebunan</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-icon">🌲</div>
                        <div class="cat-name">Statistik Kehutanan</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-icon">🐟</div>
                        <div class="cat-name">Statistik Perikanan</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                </div>
            </div>

            <!-- SDMKI Panel -->
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title-wrap">
                        <div class="panel-title-icon" style="background:#dbeafe;">🏭</div>
                        <div>
                            <div class="panel-title" style="color:var(--blue);">Sumber Daya Mineral, Konstruksi & Industri</div>
                            <div class="panel-subtitle">Statistik terkait industri, pertambangan, energi dan konstruksi</div>
                        </div>
                    </div>
                </div>
                <div class="category-grid">
                    <div class="category-item">
                        <div class="cat-icon">🏭</div>
                        <div class="cat-name">Statistik Industri</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-icon">⛏️</div>
                        <div class="cat-name">Statistik Pertambangan & Energi</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                    <div class="category-item">
                        <div class="cat-icon">🏗️</div>
                        <div class="cat-name">Statistik Konstruksi</div>
                        <span class="cat-link">Lihat Detail →</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== PROGRES KEGIATAN PRIORITAS ===== -->
        <div class="progres-section">

            <!-- Hero Stats -->
            <div class="progres-hero">
                <div class="progres-hero-left">
                    <div class="progres-hero-title">Progres Kegiatan Prioritas</div>
                    <div class="progres-hero-sub">Pantau perkembangan kegiatan prioritas secara real-time</div>
                </div>
                <div class="progres-hero-right">
                    <div class="ph-stat">
                        <div class="ph-stat-icon ph-icon-blue"><i class="fas fa-clipboard-list" style="color:#fff;font-size:18px;"></i></div>
                        <div><div class="ph-stat-label">Total Kegiatan</div><div class="ph-stat-value">12</div><div class="ph-stat-sub">Kegiatan</div></div>
                    </div>
                    <div class="ph-stat">
                        <div class="ph-stat-icon ph-icon-green"><i class="fas fa-shield-alt" style="color:#fff;font-size:18px;"></i></div>
                        <div><div class="ph-stat-label">Sesuai Jadwal</div><div class="ph-stat-value">8</div><div class="ph-stat-sub">Kegiatan</div></div>
                    </div>
                    <div class="ph-stat">
                        <div class="ph-stat-icon ph-icon-orange"><i class="fas fa-bell" style="color:#fff;font-size:18px;"></i></div>
                        <div><div class="ph-stat-label">Peringatan</div><div class="ph-stat-value">2</div><div class="ph-stat-sub">Kegiatan</div></div>
                    </div>
                    <div class="ph-stat">
                        <div class="ph-stat-icon ph-icon-red"><i class="fas fa-clock" style="color:#fff;font-size:18px;"></i></div>
                        <div><div class="ph-stat-label">Terlambat</div><div class="ph-stat-value">2</div><div class="ph-stat-sub">Kegiatan</div></div>
                    </div>
                    <div class="ph-update">
                        <div class="ph-update-icon"><i class="far fa-calendar-alt"></i></div>
                        <div class="ph-update-label">Update Terakhir</div>
                        <div class="ph-update-date">27 Mei 2025</div>
                        <div class="ph-update-badge">10:30 WIB</div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="progres-table-wrap">
                <table class="progres-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kegiatan</th>
                            <th>Progres Kuantitas</th>
                            <th>Deadline Kegiatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="progresTableBody"></tbody>
                </table>
            </div>

            <!-- Bottom Row -->
            <div class="progres-bottom">
                <div class="insight-panel">
                    <div class="insight-img">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="44" width="12" height="28" rx="3" fill="#1a56db" opacity="0.8"/>
                            <rect x="24" y="32" width="12" height="40" rx="3" fill="#1a56db"/>
                            <rect x="40" y="20" width="12" height="52" rx="3" fill="#22c55e"/>
                            <rect x="56" y="28" width="12" height="44" rx="3" fill="#1a56db" opacity="0.6"/>
                            <path d="M8 44 Q20 28 40 20 Q55 14 68 28" stroke="#f97316" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                            <circle cx="68" cy="28" r="4" fill="#f97316"/>
                        </svg>
                    </div>
                    <div class="insight-body">
                        <div class="insight-title"><i class="fas fa-lightbulb" style="color:#f97316;"></i> Insight</div>
                        <div class="insight-item"><div class="insight-dot ins-green">✓</div> 8 dari 12 kegiatan (66,7%) sesuai jadwal.</div>
                        <div class="insight-item"><div class="insight-dot ins-orange">!</div> 2 kegiatan (16,7%) perlu perhatian (peringatan).</div>
                        <div class="insight-item"><div class="insight-dot ins-red">✕</div> 2 kegiatan (16,7%) terlambat dari deadline.</div>
                        <div class="insight-avg">
                            <i class="fas fa-chart-bar" style="color:#1a56db;font-size:18px;"></i>
                            <div>
                                <div class="insight-avg-label">Rata-rata progres seluruh kegiatan:</div>
                                <div class="insight-avg-val">36,2%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="distribusi-panel">
                    <div class="distribusi-title">Distribusi Status Kegiatan</div>
                    <div class="distribusi-body">
                        <div class="donut-svg-wrap">
                            <canvas id="distribusiChart" width="140" height="140"></canvas>
                            <div class="donut-svg-center">
                                <div class="donut-svg-val">12</div>
                                <div class="donut-svg-lbl">Total<br>Kegiatan</div>
                            </div>
                        </div>
                        <div class="dist-legend">
                            <div class="dist-legend-item"><div class="dist-dot" style="background:#16a34a;"></div><div class="dist-name">Sesuai Jadwal</div><div class="dist-val">8</div><div class="dist-pct">(66,7%)</div></div>
                            <div class="dist-legend-item"><div class="dist-dot" style="background:#f97316;"></div><div class="dist-name">Peringatan</div><div class="dist-val">2</div><div class="dist-pct">(16,7%)</div></div>
                            <div class="dist-legend-item"><div class="dist-dot" style="background:#ef4444;"></div><div class="dist-name">Terlambat</div><div class="dist-val">2</div><div class="dist-pct">(16,7%)</div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="progres-footer">
                <div class="progres-footer-left"><i class="fas fa-info-circle" style="color:#1a56db;"></i> Data bersumber dari sistem monitoring kegiatan prioritas.</div>
                <div class="progres-footer-right"><i class="far fa-clock" style="color:#1a56db;"></i> Update Terakhir: 27 Mei 2025 10:30 WIB</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script>
// DATA
const kegiatanData = [
    { no:1,  icon:'📋', iconBg:'#dbeafe', nama:'Survei Tahunan Perusahaan Industri Manufaktur (STPIM)', progres:18,  total:124, satuan:'Perusahaan', pct:14,  deadline:'31/12/2025', hariLambat:138, status:'peringatan' },
    { no:2,  icon:'🟣', iconBg:'#ede9fe', nama:'Survei Komoditas Industri Manufaktur (SKIM)',           progres:0,   total:1,   satuan:'Perusahaan', pct:0,   deadline:'15/11/2025', hariLambat:184, status:'sesuai' },
    { no:3,  icon:'🔄', iconBg:'#dcfce7', nama:'Pemutakhiran DPA',                                      progres:200, total:200, satuan:'Perusahaan', pct:100, deadline:'31/3/2026',  hariLambat:45,  status:'sesuai' },
    { no:4,  icon:'📊', iconBg:'#fff7ed', nama:'Survei IBS Bulanan',                                     progres:4,   total:98,  satuan:'Perusahaan', pct:4,   deadline:'1/10/2025',  hariLambat:229, status:'terlambat' },
    { no:5,  icon:'🟣', iconBg:'#ede9fe', nama:'Survei IMK Triwulan II',                                 progres:480, total:500, satuan:'Industri',   pct:96,  deadline:'30/9/2025',  hariLambat:230, status:'sesuai' },
    { no:6,  icon:'📅', iconBg:'#dcfce7', nama:'Survei IMK Tahunan (listing)',                           progres:0,   total:454, satuan:'Blok Sensus', pct:0,  deadline:'10/9/2025',  hariLambat:281, status:'sesuai' },
    { no:7,  icon:'🏗️', iconBg:'#fee2e2', nama:'Survei Perusahaan Penggalian Triwulan II',               progres:50,  total:102, satuan:'perusahaan', pct:49,  deadline:'20/11/2025', hariLambat:179, status:'sesuai' },
    { no:8,  icon:'🏠', iconBg:'#dbeafe', nama:'Survei Konstruksi Triwulan II',                          progres:16,  total:124, satuan:'Perusahaan', pct:13,  deadline:'31/12/2025', hariLambat:138, status:'peringatan' },
    { no:9,  icon:'🏡', iconBg:'#dbeafe', nama:'Survei Konstruksi Tahunan',                              progres:0,   total:1,   satuan:'Perusahaan', pct:0,   deadline:'31/12/2025', hariLambat:138, status:'sesuai' },
    { no:10, icon:'🌾', iconBg:'#dcfce7', nama:'Survei Konversi Gabah ke Beras (SKGB)',                  progres:200, total:200, satuan:'Perusahaan', pct:100, deadline:'31/12/2025', hariLambat:138, status:'sesuai' },
    { no:11, icon:'🌻', iconBg:'#fff7ed', nama:'Ubinan Padi dan Palawija Subround II',                   progres:4,   total:36,  satuan:'Perusahaan', pct:11,  deadline:'31/12/2025', hariLambat:138, status:'terlambat' },
    { no:12, icon:'🌲', iconBg:'#dcfce7', nama:'Pendataan Kehutanan Tahunan',                            progres:0,   total:1,   satuan:'Perusahaan', pct:0,   deadline:'31/12/2025', hariLambat:138, status:'sesuai' },
];

function getStatusBadge(s) {
    if (s === 'sesuai')    return '<span class="badge badge-green"><i class="fas fa-check-circle"></i> Sesuai Jadwal</span>';
    if (s === 'peringatan')return '<span class="badge badge-orange"><i class="fas fa-exclamation-triangle"></i> Peringatan</span>';
    if (s === 'terlambat') return '<span class="badge badge-red"><i class="fas fa-clock"></i> Terlambat</span>';
}
function getFill(s) {
    if (s === 'sesuai')     return 'fill-blue';
    if (s === 'peringatan') return 'fill-orange';
    if (s === 'terlambat')  return 'fill-orange';
    return 'fill-blue';
}

const tbody = document.getElementById('progresTableBody');
kegiatanData.forEach(k => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td>${k.no}</td>
        <td><div class="td-name"><div class="td-icon" style="background:${k.iconBg};">${k.icon}</div><span>${k.nama}</span></div></td>
        <td><div class="progress-bar-wrap">
            <div class="progress-info">${k.progres} / ${k.total} ${k.satuan}</div>
            <div class="progress-bar"><div class="progress-fill ${getFill(k.status)}" style="width:${k.pct}%;"></div></div>
            <div class="progress-pct">${k.pct}%</div>
        </div></td>
        <td><div class="deadline-cell">
            <div class="deadline-date"><i class="far fa-calendar-alt" style="color:#1a56db;margin-right:4px;"></i>${k.deadline}</div>
            <div class="deadline-late">(Terlambat ${k.hariLambat} hari)</div>
        </div></td>
        <td>${getStatusBadge(k.status)}</td>
    `;
    tbody.appendChild(tr);
});

// Donut chart
new Chart(document.getElementById('distribusiChart'), {
    type: 'doughnut',
    data: {
        labels: ['Sesuai Jadwal', 'Peringatan', 'Terlambat'],
        datasets: [{ data: [8, 2, 2], backgroundColor: ['#16a34a','#f97316','#ef4444'], borderWidth: 0, hoverOffset: 4 }]
    },
    options: {
        cutout: '70%',
        plugins: { legend: { display: false }, tooltip: { callbacks: { label: ctx => ` ${ctx.label}: ${ctx.raw} kegiatan` } } },
        animation: { duration: 900 }
    }
});

// MODAL FUNCTIONS
function bukaModal(id) {
    document.getElementById(id).classList.add('show');
    document.body.style.overflow = 'hidden';
}
function tutupModal(id) {
    document.getElementById(id).classList.remove('show');
    document.body.style.overflow = '';
}
// Klik overlay tutup modal
document.querySelectorAll('.modal-overlay').forEach(el => {
    el.addEventListener('click', function(e) {
        if (e.target === this) tutupModal(this.id);
    });
});
// ESC tutup semua
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal-overlay.show').forEach(el => tutupModal(el.id));
    }
});

// PAGE TRANSITION
const overlay = document.getElementById('page-transition');
window.addEventListener('DOMContentLoaded', () => { overlay.classList.remove('active'); });
document.querySelectorAll('a.nav-link-transition').forEach(link => {
    link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('http') || href.startsWith('mailto')) return;
        e.preventDefault();
        overlay.classList.add('active');
        setTimeout(() => { window.location.href = href; }, 400);
    });
});

window.addEventListener('scroll', () => {
    document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 10);
});
</script>
</body>
</html>