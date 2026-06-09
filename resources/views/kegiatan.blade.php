<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kegiatan - Tim Statistik Produksi Provinsi Jambi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1a56db; --blue-dark: #1340b0; --blue-light: #e8f0fe;
            --green: #16a34a; --green-light: #dcfce7;
            --purple: #7c3aed; --purple-light: #ede9fe;
            --gray-200: #e5e7eb; --gray-400: #9ca3af; --gray-500: #6b7280;
            --gray-700: #374151; --gray-800: #1f2937; --gray-900: #111827;
            --white: #ffffff;
            --shadow-lg: 0 20px 50px rgba(0,0,0,0.12);
        }
        html, body { height: 100%; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--gray-800);
            background: #f0f4f8;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* PAGE TRANSITION */
        #page-transition {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(255,255,255,0.9); backdrop-filter: blur(4px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none; transition: opacity 0.25s ease;
        }
        #page-transition.active { opacity: 1; pointer-events: all; }
        .pt-spinner {
            width: 40px; height: 40px;
            border: 3px solid var(--blue-light); border-top-color: var(--blue);
            border-radius: 50%; animation: spin 0.7s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: var(--blue);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.15);
            padding: 0 2rem; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            transition: box-shadow 0.3s ease;
        }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(26,86,219,0.35); }
        .navbar-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand-text { font-size: 13px; font-weight: 700; color: var(--white); letter-spacing: 0.02em; }
        .navbar-nav { display: flex; align-items: center; list-style: none; }
        .navbar-nav a { text-decoration: none; color: rgba(255,255,255,0.8); font-size: 14px; font-weight: 500; padding: 6px 16px; border-radius: 6px; transition: color 0.2s; }
        .navbar-nav a:hover { color: var(--white); }
        .navbar-nav a.active { color: var(--white); border-bottom: 2px solid var(--white); border-radius: 0; }

        /* ── HERO SECTION ── */
        .hero {
            margin-top: 64px;
            position: relative;
            min-height: calc(100vh - 64px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
            background: #dce8f5;
        }

        /* Foto gedung sebagai background penuh */
        .hero-bg {
            position: absolute; inset: 0;
            background-image: url('{{ asset("images/gedung-bps.png") }}');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            z-index: 0;
        }

        /* Overlay gradien seperti di gambar referensi */
        .hero-overlay {
            position: absolute; inset: 0;
            z-index: 1;
            background: linear-gradient(
                to right,
                rgba(220,232,245,0.98) 0%,
                rgba(210,225,245,0.92) 30%,
                rgba(190,210,240,0.65) 55%,
                rgba(170,195,230,0.30) 75%,
                rgba(150,180,220,0.08) 100%
            );
        }

        /* Konten di atas overlay */
        .hero-content {
            position: relative; z-index: 2;
            padding: 4rem 5rem 2rem;
            max-width: 600px;
            animation: fadeUp 0.6s ease both;
        }

        .hero-label {
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 1rem;
        }
        .hero-label img {
            height: 28px; width: auto; object-fit: contain;
        }
        .hero-label-text {
            font-size: 12px; font-weight: 700; color: var(--blue);
            letter-spacing: 0.08em; text-transform: uppercase;
        }

        .hero-title {
            font-size: 5rem; font-weight: 800;
            color: var(--gray-900); line-height: 1.0;
            margin-bottom: 1rem; letter-spacing: -0.02em;
        }

        .hero-desc {
            font-size: 1.1rem; color: var(--gray-700);
            line-height: 1.65; margin-bottom: 1.5rem;
            max-width: 380px;
        }

        .hero-divider {
            width: 48px; height: 4px;
            background: var(--blue); border-radius: 2px;
            margin-bottom: 3rem;
        }

        /* ── CARDS SECTION ── */
        .cards-wrap {
            position: relative; z-index: 2;
            padding: 0 5rem 4rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: 960px;
            animation: fadeUp 0.6s ease 0.15s both;
        }

        .keg-card {
            background: rgba(255,255,255,0.96);
            border-radius: 24px;
            padding: 32px 28px 28px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08), 0 2px 8px rgba(0,0,0,0.04);
            border: 1px solid rgba(255,255,255,0.8);
            text-decoration: none;
            display: flex; flex-direction: column; align-items: center;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .keg-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 56px rgba(0,0,0,0.14), 0 4px 12px rgba(0,0,0,0.06);
        }

        /* Icon wrapper */
        .keg-icon-wrap {
            width: 90px; height: 90px;
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            font-size: 42px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .keg-card:hover .keg-icon-wrap { transform: scale(1.08); }

        .icon-green-bg  { background: #e8f7ef; }
        .icon-blue-bg   { background: #e8f0fe; }
        .icon-purple-bg { background: #f0ebff; }

        .keg-title {
            font-size: 1.3rem; font-weight: 800;
            color: var(--gray-900); margin-bottom: 10px;
            line-height: 1.2;
        }

        .keg-desc {
            font-size: 0.88rem; color: var(--gray-500);
            line-height: 1.65; margin-bottom: 24px; flex: 1;
        }

        .keg-cta {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 14px; font-weight: 700;
            text-decoration: none;
            transition: gap 0.2s ease;
        }
        .keg-card:hover .keg-cta { gap: 10px; }

        .cta-green  { color: var(--green); }
        .cta-blue   { color: var(--blue); }
        .cta-purple { color: var(--purple); }

        /* ── FOOTER BAR (bawah seperti di gambar) ── */
        .footer-bar {
            position: relative; z-index: 2;
            display: flex; justify-content: center;
            padding-bottom: 2rem;
            animation: fadeUp 0.6s ease 0.3s both;
        }
        .footer-bar-inner {
            display: inline-flex; align-items: center; gap: 20px;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 40px;
            padding: 10px 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .footer-bar-loc {
            display: flex; align-items: center; gap: 7px;
            font-size: 13px; font-weight: 600; color: var(--gray-700);
        }
        .footer-bar-loc i { color: var(--blue); font-size: 13px; }
        .footer-bar-divider { width: 1px; height: 18px; background: var(--gray-200); }
        .footer-bar-socials { display: flex; align-items: center; gap: 14px; }
        .footer-bar-socials a { color: var(--gray-500); font-size: 16px; text-decoration: none; transition: color 0.2s; }
        .footer-bar-socials a:hover { color: var(--blue); }

        /* ANIMATIONS */
        @keyframes fadeUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .hero-title { font-size: 3.5rem; }
            .hero-content { padding: 3rem 3rem 2rem; }
            .cards-wrap { padding: 0 3rem 3rem; gap: 18px; }
        }
        @media (max-width: 768px) {
            .navbar-nav { display: none; }
            .hero-title { font-size: 3rem; }
            .hero-content { padding: 2.5rem 1.5rem 2rem; }
            .cards-wrap { grid-template-columns: 1fr; padding: 0 1.5rem 3rem; gap: 16px; }
            .keg-card { padding: 24px 20px 20px; }
        }
    </style>
</head>
<body>

<!-- PAGE TRANSITION -->
<div id="page-transition"><div class="pt-spinner"></div></div>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <a href="/" class="navbar-brand nav-link-transition">
        <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS" style="height:42px;width:auto;object-fit:contain;">
        <span class="brand-text">BPS PROVINSI JAMBI</span>
    </a>
    <ul class="navbar-nav">
        <li><a href="/" class="nav-link-transition">Home</a></li>
        <li><a href="/dashboard" class="nav-link-transition">Dashboard</a></li>
        <li><a href="/kegiatan" class="active nav-link-transition">Kegiatan</a></li>
        <li><a href="/tentang" class="nav-link-transition">Tentang</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <!-- Background gedung BPS -->
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>

    <!-- Teks hero -->
    <div class="hero-content">
        <div class="hero-label">
            <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS">
            <span class="hero-label-text">Badan Pusat Statistik</span>
        </div>
        <h1 class="hero-title">Kegiatan</h1>
        <p class="hero-desc">Pilih menu kegiatan untuk melihat informasi lebih lanjut.</p>
        <div class="hero-divider"></div>
    </div>

    <!-- 3 Card -->
    <div class="cards-wrap">

        <!-- Card 1: Daftar Sampel -->
        <a href="https://jambi.bps.go.id/id" target="_blank" rel="noopener" class="keg-card">
            <div class="keg-icon-wrap icon-green-bg">
                📋
            </div>
            <div class="keg-title">Daftar Sampel</div>
            <p class="keg-desc">Lihat daftar sampel yang akan digunakan dalam kegiatan.</p>
            <span class="keg-cta cta-green">
                Buka <i class="fas fa-arrow-right" style="font-size:12px;"></i>
            </span>
        </a>

        <!-- Card 2: Buku Pedoman -->
        <a href="https://jambi.bps.go.id/id" target="_blank" rel="noopener" class="keg-card">
            <div class="keg-icon-wrap icon-blue-bg">
                📘
            </div>
            <div class="keg-title">Buku Pedoman</div>
            <p class="keg-desc">Akses buku pedoman pelaksanaan kegiatan secara lengkap.</p>
            <span class="keg-cta cta-blue">
                Buka <i class="fas fa-arrow-right" style="font-size:12px;"></i>
            </span>
        </a>

        <!-- Card 3: Kuesioner -->
        <a href="https://jambi.bps.go.id/id" target="_blank" rel="noopener" class="keg-card">
            <div class="keg-icon-wrap icon-purple-bg">
                📝
            </div>
            <div class="keg-title">Kuesioner</div>
            <p class="keg-desc">Unduh kuesioner yang digunakan pada kegiatan ini.</p>
            <span class="keg-cta cta-purple">
                Buka <i class="fas fa-arrow-right" style="font-size:12px;"></i>
            </span>
        </a>

    </div>

    <!-- Footer bar -->
    <div class="footer-bar">
        <div class="footer-bar-inner">
            <div class="footer-bar-loc">
                <i class="fas fa-map-marker-alt"></i>
                Badan Pusat Statistik
            </div>
            <div class="footer-bar-divider"></div>
            <div class="footer-bar-socials">
                <a href="https://www.instagram.com/bps_jambi" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/bpsjambi" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.youtube.com/@bpsjambi" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

</section>

<script>
    /* PAGE TRANSITION */
    const overlay = document.getElementById('page-transition');
    window.addEventListener('DOMContentLoaded', function() {
        overlay.classList.remove('active');
    });
    document.querySelectorAll('a.nav-link-transition').forEach(function(link) {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('http') || href.startsWith('mailto')) return;
            e.preventDefault();
            overlay.classList.add('active');
            setTimeout(function() { window.location.href = href; }, 400);
        });
    });

    /* NAVBAR SCROLL */
    window.addEventListener('scroll', function() {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 10);
    });
</script>
</body>
</html>