<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tim Statistik Produksi Provinsi Jambi - BPS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1a56db; --blue-dark: #1340b0; --blue-light: #e8f0fe;
            --orange: #f97316; --orange-light: #fff7ed;
            --green: #22c55e; --green-light: #f0fdf4;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb;
            --gray-400: #9ca3af; --gray-500: #6b7280; --gray-600: #4b5563;
            --gray-700: #374151; --gray-800: #1f2937; --gray-900: #111827;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.1);
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; color: var(--gray-800); background: var(--white); line-height: 1.6; }

        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 2rem; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            transition: box-shadow 0.3s ease, background 0.3s ease, border-color 0.3s ease;
        }
        .navbar.scrolled {
            background: var(--blue);
            box-shadow: 0 4px 24px rgba(26,86,219,0.25);
            border-bottom-color: var(--blue-dark);
        }
        .navbar.scrolled .brand-text { color: var(--white); }
        .navbar.scrolled .navbar-nav a { color: rgba(255,255,255,0.85); }
        .navbar.scrolled .navbar-nav a:hover { color: var(--white); }
        .navbar.scrolled .navbar-nav a.active { color: var(--white); border-bottom-color: var(--white); }

        .navbar-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand-text { font-size: 13px; font-weight: 700; color: var(--gray-900); letter-spacing: 0.02em; }
        .navbar-nav { display: flex; align-items: center; gap: 0; list-style: none; }
        .navbar-nav a { text-decoration: none; color: var(--gray-700); font-size: 14px; font-weight: 500; padding: 6px 16px; border-radius: 6px; transition: color 0.2s; }
        .navbar-nav a:hover { color: var(--blue); }
        .navbar-nav a.active { color: var(--blue); border-bottom: 2px solid var(--blue); border-radius: 0; }

        /* HERO */
        .hero {
            margin-top: 64px; min-height: calc(100vh - 64px);
            display: grid; grid-template-columns: 55% 45%;
            position: relative; overflow: hidden;
        }
        .hero-content {
            display: flex; flex-direction: column; justify-content: center;
            padding: 5rem 3rem 5rem 5rem; position: relative; z-index: 2;
        }
        .hero-title { font-size: 3.2rem; font-weight: 800; color: var(--gray-900); line-height: 1.1; margin-bottom: 1.25rem; letter-spacing: -0.02em; }
        .hero-subtitle { font-size: 1rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.75rem; }
        .hero-desc { font-size: 0.9rem; color: var(--gray-500); line-height: 1.7; margin-bottom: 2rem; max-width: 480px; }
        .hero-buttons { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--blue); color: var(--white); padding: 12px 24px;
            border-radius: 10px; font-weight: 700; font-size: 14px; text-decoration: none;
            transition: background 0.2s, transform 0.15s;
            box-shadow: 0 4px 14px rgba(26,86,219,0.3);
        }
        .btn-primary:hover { background: var(--blue-dark); transform: translateY(-2px); }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            background: transparent; color: var(--blue); padding: 12px 24px;
            border-radius: 10px; font-weight: 700; font-size: 14px;
            text-decoration: none; border: 2px solid var(--blue); transition: all 0.2s;
        }
        .btn-outline:hover { background: var(--blue); color: var(--white); transform: translateY(-2px); }
        .hero-image { position: relative; overflow: hidden; }
        .hero-image img { width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to right, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.4) 30%, transparent 60%);
            z-index: 1;
        }

        /* SECTION */
        .section { padding: 4rem 5rem; }
        .section-alt { background: var(--gray-50); }
        .section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; }
        .section-title { font-size: 1.5rem; font-weight: 800; color: var(--gray-900); display: flex; align-items: center; gap: 10px; }
        .section-title::before { content: ''; display: block; width: 4px; height: 24px; background: var(--blue); border-radius: 2px; }
        .section-link { color: var(--blue); font-size: 13.5px; font-weight: 600; text-decoration: none; }
        .section-link:hover { text-decoration: underline; }

        /* KEGIATAN */
        .kegiatan-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .kegiatan-card { border-radius: 12px; overflow: hidden; background: var(--white); box-shadow: var(--shadow-sm); border: 1px solid var(--gray-200); transition: transform 0.2s, box-shadow 0.2s; }
        .kegiatan-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .kegiatan-placeholder { width: 100%; height: 180px; background: linear-gradient(135deg, #e8f0fe, #c7d7f8); display: flex; align-items: center; justify-content: center; font-size: 40px; }
        .kegiatan-body { padding: 14px 16px 16px; }
        .kegiatan-title { font-size: 14px; font-weight: 700; color: var(--gray-900); line-height: 1.4; margin-bottom: 8px; }
        .kegiatan-date { font-size: 12px; color: var(--gray-500); display: flex; align-items: center; gap: 5px; }

        /* PUBLIKASI */
        .publikasi-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
        .publikasi-card {
            border-radius: 12px; overflow: hidden; background: var(--white);
            box-shadow: var(--shadow-sm); border: 1px solid var(--gray-200);
            display: flex; transition: transform 0.2s, box-shadow 0.2s;
        }
        .publikasi-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .publikasi-cover {
            width: 140px; flex-shrink: 0;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            display: flex; align-items: center; justify-content: center; font-size: 48px;
        }
        .publikasi-body { padding: 18px 20px; display: flex; flex-direction: column; justify-content: center; }
        .publikasi-tag { display: inline-block; background: var(--blue-light); color: var(--blue); font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; margin-bottom: 8px; }
        .publikasi-title { font-size: 14px; font-weight: 700; color: var(--gray-900); line-height: 1.5; margin-bottom: 8px; }
        .publikasi-meta { font-size: 12px; color: var(--gray-400); display: flex; align-items: center; gap: 6px; }
        .btn-download {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--blue); color: var(--white);
            padding: 7px 14px; border-radius: 7px; font-size: 12px; font-weight: 600;
            text-decoration: none; margin-top: 12px; width: fit-content; transition: background 0.2s;
        }
        .btn-download:hover { background: var(--blue-dark); }

        /* FOOTER */
        .footer { background: var(--gray-900); color: var(--gray-400); padding: 3rem 5rem 2rem; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 2.5rem; }
        .footer-brand p { font-size: 13px; line-height: 1.7; color: var(--gray-400); }
        .footer-col h4 { color: var(--white); font-size: 14px; font-weight: 700; margin-bottom: 1rem; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 8px; }
        .footer-col ul li a {
            color: var(--gray-400); text-decoration: none; font-size: 13px;
            transition: color 0.2s, padding-left 0.2s;
            display: inline-flex; align-items: center; gap: 6px;
        }
        .footer-col ul li a:hover { color: var(--white); padding-left: 4px; }

        /* Direktorat link — sedikit highlight saat hover */
        .footer-col.direktorat ul li a::before {
            content: '›';
            font-size: 14px;
            color: var(--blue);
            opacity: 0;
            transition: opacity 0.2s;
        }
        .footer-col.direktorat ul li a:hover::before { opacity: 1; }

        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; font-size: 12px; text-align: center; color: var(--gray-500); }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .hero { grid-template-columns: 1fr; }
            .hero-image { display: none; }
            .hero-content { padding: 4rem 3rem; }
            .hero-title { font-size: 2.4rem; }
            .kegiatan-grid { grid-template-columns: repeat(2, 1fr); }
            .publikasi-grid { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .section { padding: 3rem; }
        }
        @media (max-width: 640px) {
            .navbar-nav { display: none; }
            .hero-title { font-size: 1.9rem; }
            .hero-content { padding: 3rem 1.5rem; }
            .kegiatan-grid { grid-template-columns: 1fr; }
            .publikasi-card { flex-direction: column; }
            .publikasi-cover { width: 100%; height: 120px; }
            .section { padding: 2rem 1.5rem; }
            .footer { padding: 2rem 1.5rem; }
            .footer-grid { grid-template-columns: 1fr; gap: 1.5rem; }
        }

        @keyframes fadeUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        .hero-content > * { animation: fadeUp 0.5s ease both; }
        .hero-title      { animation-delay: 0.05s; }
        .hero-subtitle   { animation-delay: 0.1s;  }
        .hero-desc       { animation-delay: 0.15s; }
        .hero-buttons    { animation-delay: 0.2s; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="/" class="navbar-brand">
        <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS" style="height:42px; width:auto; object-fit:contain;">
        <span class="brand-text">BPS PROVINSI JAMBI</span>
    </a>
    <ul class="navbar-nav">
        <li><a href="/" class="active">Home</a></li>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/kegiatan">Kegiatan</a></li>
        <li><a href="/tentang">Tentang</a></li>
        <li><a href="/login" title="Login Admin" style="color:#6b7280;padding:6px 10px;border-radius:8px;transition:color 0.2s;" onmouseover="this.style.color='#1a56db'" onmouseout="this.style.color='#6b7280'"><i class="fas fa-user-circle" style="font-size:18px;"></i></a></li>    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title">TIM STATISTIK PRODUKSI<br>PROVINSI JAMBI</h1>
        <p class="hero-subtitle">Selamat datang di Pusat Informasi Kegiatan Statistik Produksi BPS Provinsi Jambi!</p>
        <p class="hero-desc">
            Situs ini adalah wadah untuk dokumentasi, monitoring dan evaluasi kegiatan statistik produksi.
            Kegiatan tim Statistik Produksi BPS Provinsi Jambi merupakan implementasi dari program Kedeputian
            Statistik Produksi BPS yang terdiri dari tiga direktorat utama:
        </p>
        <div class="hero-buttons">
            <a href="/dashboard" class="btn-primary"><i class="fas fa-external-link-alt" style="font-size:12px"></i> Lihat Dashboard</a>
            <a href="/tentang" class="btn-outline"><i class="fas fa-info-circle" style="font-size:12px"></i> Pelajari Lebih Lanjut</a>
        </div>
    </div>
    <div class="hero-image">
        <div class="hero-overlay"></div>
        <img src="{{ asset('images/gedung-bps.png') }}" alt="Gedung BPS Provinsi Jambi">
    </div>
</section>

<!-- KEGIATAN TERBARU -->
<section class="section">
    <div class="section-header">
        <h2 class="section-title">Kegiatan Terbaru</h2>
        <a href="/kegiatan" class="section-link">Lihat Semua Kegiatan →</a>
    </div>
    <div class="kegiatan-grid">
        <div class="kegiatan-card">
            <div class="kegiatan-placeholder">🌾</div>
            <div class="kegiatan-body">
                <h3 class="kegiatan-title">KSA Padi di Kabupaten Muaro Jambi</h3>
                <p class="kegiatan-date"><i class="far fa-calendar-alt"></i> 20 Mei 2025</p>
            </div>
        </div>
        <div class="kegiatan-card">
            <div class="kegiatan-placeholder">🌽</div>
            <div class="kegiatan-body">
                <h3 class="kegiatan-title">Ubinan Jagung di Kabupaten Bungo</h3>
                <p class="kegiatan-date"><i class="far fa-calendar-alt"></i> 18 Mei 2025</p>
            </div>
        </div>
        <div class="kegiatan-card">
            <div class="kegiatan-placeholder">📊</div>
            <div class="kegiatan-body">
                <h3 class="kegiatan-title">Rapat Evaluasi Kegiatan Statistik Produksi</h3>
                <p class="kegiatan-date"><i class="far fa-calendar-alt"></i> 15 Mei 2025</p>
            </div>
        </div>
    </div>
</section>

<!-- PUBLIKASI -->
<section class="section section-alt">
    <div class="section-header">
        <h2 class="section-title">Publikasi Tim Statistik Produksi 2025</h2>
        <a href="/publikasi" class="section-link">Lihat Semua →</a>
    </div>
    <div class="publikasi-grid">
        <div class="publikasi-card">
            <div class="publikasi-cover">📗</div>
            <div class="publikasi-body">
                <span class="publikasi-tag">Tanaman Pangan</span>
                <h3 class="publikasi-title">Statistik Tanaman Pangan Provinsi Jambi 2025</h3>
                <p class="publikasi-meta"><i class="far fa-calendar-alt"></i> 2025 &nbsp;·&nbsp; <i class="fas fa-file-pdf"></i> PDF</p>
                <a href="#" class="btn-download"><i class="fas fa-download" style="font-size:11px"></i> Unduh</a>
            </div>
        </div>
        <div class="publikasi-card">
            <div class="publikasi-cover" style="background:linear-gradient(135deg,#d1fae5,#a7f3d0)">📘</div>
            <div class="publikasi-body">
                <span class="publikasi-tag" style="background:#dcfce7;color:#16a34a">Perikanan</span>
                <h3 class="publikasi-title">Statistik Perikanan Tangkap Provinsi Jambi 2025</h3>
                <p class="publikasi-meta"><i class="far fa-calendar-alt"></i> 2025 &nbsp;·&nbsp; <i class="fas fa-file-pdf"></i> PDF</p>
                <a href="#" class="btn-download"><i class="fas fa-download" style="font-size:11px"></i> Unduh</a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS" style="height:48px; width:auto; object-fit:contain; margin-bottom:12px; filter:brightness(0) invert(1);">
            <p>Tim Statistik Produksi BPS Provinsi Jambi. Pusat informasi dan dokumentasi kegiatan statistik produksi di Provinsi Jambi.</p>
        </div>

        <div class="footer-col">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/kegiatan">Kegiatan</a></li>
                <li><a href="/tentang">Tentang</a></li>
            </ul>
        </div>

        <!-- ✅ Link direktorat sudah diperbaiki — mengarah ke section di dashboard -->
        <div class="footer-col direktorat">
            <h4>Direktorat</h4>
            <ul>
                <li><a href="/dashboard#tanaman-pangan">Tanaman Pangan</a></li>
                <li><a href="/dashboard#hortikultura">Hortikultura</a></li>
                <li><a href="/dashboard#peternakan-perikanan">Peternakan & Perikanan</a></li>
                <li><a href="/dashboard#industri">Statistik Industri</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Kontak</h4>
            <ul>
                <li><a href="#">📍 Jambi, Indonesia</a></li>
                <li><a href="#">📧 bps1500@bps.go.id</a></li>
                <li><a href="#">🌐 www.jambi.bps.go.id</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        © {{ date('Y') }} Tim Statistik Produksi BPS Provinsi Jambi. All rights reserved.
    </div>
</footer>

<script>
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 10) nav.classList.add('scrolled');
        else nav.classList.remove('scrolled');
    });

    // Jika halaman dashboard dibuka dengan hash anchor, buka modal yang sesuai
    // dan scroll ke section SDH/industri
    window.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash;
        const modalMap = {
            '#tanaman-pangan':       'modalTanamanPangan',
            '#hortikultura':         'modalHortikultura',
            '#peternakan-perikanan': 'modalPeternakan',
            '#industri':             'modalIndustri',
        };
        if (hash && modalMap[hash]) {
            // Buka modal yang sesuai jika elemen ada di halaman ini
            const modalEl = document.getElementById(modalMap[hash]);
            if (modalEl && typeof bukaModal === 'function') {
                bukaModal(modalMap[hash]);
            }
        }
    });
</script>
</body>
</html>