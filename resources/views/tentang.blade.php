<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang - Tim Statistik Produksi Provinsi Jambi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1a56db;
            --gray-50: #f8faff; --gray-100: #f3f4f6; --gray-200: #e5e7eb;
            --gray-400: #9ca3af; --gray-500: #6b7280;
            --gray-800: #1f2937; --gray-900: #111827;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--gray-800);
            background: #f0f4ff;
            line-height: 1.6;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: rgba(255,255,255,0.97); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 2rem; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            transition: all 0.3s;
        }
        .navbar.scrolled {
            background: var(--blue);
            box-shadow: 0 4px 20px rgba(26,86,219,0.3);
            border-bottom-color: transparent;
        }
        .navbar.scrolled .brand-text { color: #fff; }
        .navbar.scrolled .navbar-nav a { color: rgba(255,255,255,0.85); }
        .navbar.scrolled .navbar-nav a:hover,
        .navbar.scrolled .navbar-nav a.active { color: #fff; }
        .navbar.scrolled .navbar-nav a.active { border-bottom-color: #fff; }
        .navbar-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand-text { font-size: 13px; font-weight: 700; color: var(--gray-900); }
        .navbar-nav { display: flex; list-style: none; gap: 4px; }
        .navbar-nav a {
            text-decoration: none; color: var(--gray-800);
            font-size: 14px; font-weight: 500;
            padding: 6px 16px; border-radius: 6px; transition: color 0.2s;
        }
        .navbar-nav a:hover { color: var(--blue); }
        .navbar-nav a.active {
            color: var(--blue);
            border-bottom: 2px solid var(--blue);
            border-radius: 0;
        }

        /* ===== MAIN ===== */
        .main { margin-top: 64px; }

        /* ===== HERO — PERSIS SEPERTI SCREENSHOT ===== */
        /*
           Di screenshot: background gambar gedung BPS (gelap/malam),
           di atasnya overlay biru dongker + gradient,
           teks putih di kiri, visi misi di kotak semi-transparan di bawah.
           Karena file gambar gedung ada di project, kita pakai:
           background-image: url("{{ asset('images/gedung-bps.png') }}")
        */
        .hero-tentang {
            position: relative;
            min-height: 340px;
            display: flex;
            align-items: flex-end;
            padding: 0 5% 3rem;

            /* Gambar gedung BPS sebagai background */
            background-image: url("{{ asset('images/gedung-bps.png') }}");
            background-size: cover;
            background-position: center right;
            background-repeat: no-repeat;
        }

        /* Overlay biru gelap di atas gambar — persis seperti screenshot */
        .hero-tentang::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(
                135deg,
                rgba(14, 37, 84, 0.92) 0%,
                rgba(26, 86, 219, 0.82) 50%,
                rgba(37, 99, 235, 0.70) 100%
            );
            z-index: 0;
        }

        /* Pola titik-titik subtle di atas overlay */
        .hero-tentang::after {
            content: '';
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.07) 1px, transparent 1px);
            background-size: 22px 22px;
            z-index: 0;
        }

        .hero-inner {
            position: relative; z-index: 1;
            width: 100%;
            padding-top: 3.5rem;
        }

        .hero-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 0.75rem;
        }

        .hero-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.85);
            max-width: 520px;
            line-height: 1.75;
            margin-bottom: 2rem;
        }

        /* Visi Misi — 2 kotak sejajar */
        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            max-width: 820px;
        }

        .vm-card {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            backdrop-filter: blur(10px);
            transition: background 0.2s;
        }
        .vm-card:hover { background: rgba(255,255,255,0.18); }

        .vm-head {
            display: flex; align-items: center; gap: 8px;
            font-size: 11px; font-weight: 800;
            letter-spacing: 0.09em; text-transform: uppercase;
            color: rgba(255,255,255,0.7);
            margin-bottom: 10px;
        }
        .vm-head i {
            width: 26px; height: 26px; border-radius: 50%;
            background: rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; color: #fff;
            flex-shrink: 0;
        }
        .vm-card p {
            font-size: 13.5px;
            line-height: 1.75;
            color: rgba(255,255,255,0.88);
        }

        /* ===== SECTION HEADER ===== */
        .section-head {
            text-align: center;
            padding: 3rem 5% 2rem;
        }
        .section-head h2 {
            font-size: 1.7rem; font-weight: 800;
            color: var(--gray-900); margin-bottom: 6px;
        }
        .section-head p { font-size: 13.5px; color: var(--gray-500); }

        /* ===== TEAM ===== */
        .team-wrap {
            padding: 0 5% 5rem;
            display: flex; flex-direction: column; gap: 2.5rem;
        }

        /* Baris pimpinan */
        .row-pimpinan {
            display: flex; justify-content: center;
            gap: 24px; flex-wrap: wrap;
        }
        .row-pimpinan .tim-card { width: 270px; flex-shrink: 0; }

        /* Baris anggota */
        .row-anggota {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }

        /* Garis pemisah */
        .divider {
            height: 1px; margin: 0 8%;
            background: linear-gradient(to right, transparent, #d1d5db 30%, #d1d5db 70%, transparent);
        }

        /* ===== CARD ===== */
        .tim-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #eaecf2;
            box-shadow: 0 2px 14px rgba(0,0,0,0.055);
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
            display: flex; flex-direction: column;
        }
        .tim-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 44px rgba(26,86,219,0.13);
            border-color: #93c5fd;
        }

        /* Logo BPS kecil di pojok kiri atas */
        .card-top {
            padding: 10px 12px 0;
            display: flex; align-items: center; min-height: 34px;
        }
        .card-top img { height: 20px; width: auto; object-fit: contain; opacity: 0.8; }
        .card-top .logo-fb { display: none; align-items: center; gap: 4px; }
        .sq { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; width: 14px; height: 14px; }
        .sq span { border-radius: 1.5px; display: block; }
        .bps-lbl { font-size: 8px; font-weight: 800; color: var(--blue); letter-spacing: 0.05em; }

        /* Foto */
        .card-photo {
            position: relative; margin: 6px 10px 0;
            border-radius: 12px; overflow: hidden;
        }
        .row-pimpinan .card-photo { height: 220px; }
        .row-anggota  .card-photo { height: 160px; }

        .photo-bg { position: absolute; inset: 0; }
        .bg-pink   { background: linear-gradient(150deg,#fce7f3,#f9a8d4); }
        .bg-blue2  { background: linear-gradient(150deg,#dbeafe,#93c5fd); }
        .bg-orange { background: linear-gradient(150deg,#ffedd5,#fdba74); }
        .bg-teal   { background: linear-gradient(150deg,#ccfbf1,#5eead4); }
        .bg-purple { background: linear-gradient(150deg,#f3e8ff,#d8b4fe); }
        .bg-lblue  { background: linear-gradient(150deg,#dbeafe,#bfdbfe); }
        .bg-cream  { background: linear-gradient(150deg,#fef3c7,#fde68a); }
        .bg-green  { background: linear-gradient(150deg,#dcfce7,#86efac); }

        .card-photo img {
            position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);
            height: 100%; width: auto; max-width: 115%;
            object-fit: contain; object-position: bottom center;
            filter: drop-shadow(0 6px 12px rgba(0,0,0,0.10));
            transition: transform 0.3s ease; z-index: 1;
        }
        .tim-card:hover .card-photo img { transform: translateX(-50%) translateY(-5px); }

        .photo-ph {
            position: absolute; inset: 0; z-index: 1;
            display: flex; align-items: flex-end; justify-content: center; padding-bottom: 8px;
        }
        .photo-ph i { font-size: 52px; color: rgba(100,130,200,0.22); }
        .row-anggota .photo-ph i { font-size: 38px; }

        /* Info */
        .card-info { padding: 12px 13px 15px; }
        .row-pimpinan .card-info { padding: 14px 15px 17px; }

        .card-badge {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 9px; font-weight: 700; letter-spacing: 0.04em;
            padding: 3px 9px; border-radius: 20px; margin-bottom: 7px;
        }
        .b-ketua  { background: #fef3c7; color: #92400e; }
        .b-subtim { background: #d1fae5; color: #065f46; }
        .b-anggota{ background: #dbeafe; color: #1e40af; }

        .card-name {
            font-weight: 800; color: var(--gray-900);
            line-height: 1.25; margin-bottom: 3px;
        }
        .row-pimpinan .card-name { font-size: 1rem; }
        .row-anggota  .card-name { font-size: 0.8rem; }

        .card-role {
            font-size: 9px; font-weight: 700; color: var(--blue);
            text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 3px;
        }
        .card-jab { font-size: 0.66rem; color: var(--gray-400); line-height: 1.4; }

        /* ===== FOOTER ===== */
        .footer {
            background: var(--gray-900); color: var(--gray-400);
            padding: 3.5rem 5% 2rem;
        }
        .footer-grid {
            display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem; margin-bottom: 2.5rem;
        }
        .footer-brand p { font-size: 13px; line-height: 1.7; }
        .footer-col h4 { color: #fff; font-size: 14px; font-weight: 700; margin-bottom: 1rem; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 8px; }
        .footer-col ul li a { color: var(--gray-400); text-decoration: none; font-size: 13px; transition: color 0.2s; }
        .footer-col ul li a:hover { color: #fff; }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.5rem; font-size: 12px;
            text-align: center; color: var(--gray-400);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeUp { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
        .hero-inner    { animation: fadeUp 0.4s ease both; }
        .section-head  { animation: fadeUp 0.4s ease 0.1s both; }
        .row-pimpinan  { animation: fadeUp 0.4s ease 0.18s both; }
        .row-anggota   { animation: fadeUp 0.4s ease 0.28s both; }

        /* ===== RESPONSIVE ===== */
        @media (max-width:1200px) { .row-anggota { grid-template-columns: repeat(3,1fr); } }
        @media (max-width:860px)  { .row-anggota { grid-template-columns: repeat(2,1fr); } }
        @media (max-width:640px) {
            .navbar-nav { display: none; }
            .hero-title { font-size: 1.5rem; }
            .vm-grid { grid-template-columns: 1fr; }
            .row-pimpinan .tim-card { width: 100%; max-width: 300px; }
            .row-anggota { grid-template-columns: repeat(2,1fr); }
            .footer-grid { grid-template-columns: 1fr; gap: 1.5rem; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <a href="/" class="navbar-brand">
        <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS" style="height:42px;width:auto;object-fit:contain;">
        <span class="brand-text">BPS PROVINSI JAMBI</span>
    </a>
    <ul class="navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/kegiatan">Kegiatan</a></li>
        <li><a href="/tentang" class="active">Tentang</a></li>
    </ul>
</nav>

<main class="main">

    <!-- ===== HERO PERSIS SEPERTI SCREENSHOT ===== -->
    <div class="hero-tentang">
        <div class="hero-inner">
            <h1 class="hero-title">Tim Statistik Produksi</h1>
            <p class="hero-desc">
                Kami berkomitmen menyediakan data statistik produksi yang akurat,
                tepat waktu, dan relevan untuk mendukung perencanaan pembangunan
                di Provinsi Jambi.
            </p>
            <div class="vm-grid">
                <div class="vm-card">
                    <div class="vm-head">
                        <i class="fas fa-eye"></i> VISI
                    </div>
                    <p>Menjadi sumber data statistik produksi yang terpercaya, akurat, dan tepat waktu untuk mendukung perencanaan dan evaluasi pembangunan Provinsi Jambi yang berkelanjutan.</p>
                </div>
                <div class="vm-card">
                    <div class="vm-head">
                        <i class="fas fa-paper-plane"></i> MISI
                    </div>
                    <p>Melaksanakan pengumpulan data secara profesional, meningkatkan kualitas melalui inovasi, dan mendiseminasikan hasil statistik kepada seluruh pemangku kepentingan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== PERSONIL ===== -->
    <div class="section-head">
        <h2>Personil Tim Produksi 2026</h2>
        <p>Struktur organisasi pelaksanaan kegiatan statistik produksi BPS Provinsi Jambi</p>
    </div>

    <div class="team-wrap">

        <!-- PIMPINAN -->
        <div class="row-pimpinan">

            <div class="tim-card">
                <div class="card-top">
                    <img src="{{ asset('images/Logo BPS.png') }}" alt="BPS"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <span class="logo-fb">
                        <span class="sq">
                            <span style="background:#e63946"></span><span style="background:#2196F3"></span>
                            <span style="background:#4CAF50"></span><span style="background:#FF9800"></span>
                        </span>
                        <span class="bps-lbl">BPS</span>
                    </span>
                </div>
                <div class="card-photo">
                    <div class="photo-bg bg-pink"></div>
                    <img src="{{ asset('images/eva.png') }}" alt="Eva Riani"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-ketua"> Ketua Tim</span>
                    <p class="card-name">Eva Riani</p>
                    <p class="card-role">Ketua Tim Statistik Produksi</p>
                    <p class="card-jab">Statistisi Ahli Madya — BPS Provinsi Jambi</p>
                </div>
            </div>

            <div class="tim-card">
                <div class="card-top">
                    <img src="{{ asset('images/Logo BPS.png') }}" alt="BPS"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <span class="logo-fb">
                        <span class="sq">
                            <span style="background:#e63946"></span><span style="background:#2196F3"></span>
                            <span style="background:#4CAF50"></span><span style="background:#FF9800"></span>
                        </span>
                        <span class="bps-lbl">BPS</span>
                    </span>
                </div>
                <div class="card-photo">
                    <div class="photo-bg bg-blue2"></div>
                    <img src="{{ asset('images/eni.png') }}" alt="Eny Tristanti"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-subtim"> Ketua Subtim</span>
                    <p class="card-name">Eny Tristanti</p>
                    <p class="card-role">Ketua Subtim Statistik Pertanian</p>
                    <p class="card-jab">Fungsional Ahli Madya — BPS Provinsi Jambi</p>
                </div>
            </div>

        </div>

        <div class="divider"></div>

        <!-- ANGGOTA -->
        <div class="row-anggota">

            <div class="tim-card">
                <div class="card-top"><img src="{{ asset('images/Logo BPS.png') }}" alt="BPS" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"><span class="logo-fb"><span class="sq"><span style="background:#e63946"></span><span style="background:#2196F3"></span><span style="background:#4CAF50"></span><span style="background:#FF9800"></span></span><span class="bps-lbl">BPS</span></span></div>
                <div class="card-photo">
                    <div class="photo-bg bg-orange"></div>
                    <img src="{{ asset('images/fathina.png') }}" alt="Fathina" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-anggota">Anggota</span>
                    <p class="card-name">Fathina Mufrodi</p>
                    <p class="card-role">PJ Statistik PEK</p>
                    <p class="card-jab">Statistisi Ahli Muda</p>
                </div>
            </div>

            <div class="tim-card">
                <div class="card-top"><img src="{{ asset('images/Logo BPS.png') }}" alt="BPS" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"><span class="logo-fb"><span class="sq"><span style="background:#e63946"></span><span style="background:#2196F3"></span><span style="background:#4CAF50"></span><span style="background:#FF9800"></span></span><span class="bps-lbl">BPS</span></span></div>
                <div class="card-photo">
                    <div class="photo-bg bg-teal"></div>
                    <img src="{{ asset('images/fatih.png') }}" alt="Fatih" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-anggota">Anggota</span>
                    <p class="card-name">Muhammad Al Fatih</p>
                    <p class="card-role">Anggota Pemuda Produksi</p>
                    <p class="card-jab">Statistisi Ahli Pertama</p>
                </div>
            </div>

            <div class="tim-card">
                <div class="card-top"><img src="{{ asset('images/Logo BPS.png') }}" alt="BPS" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"><span class="logo-fb"><span class="sq"><span style="background:#e63946"></span><span style="background:#2196F3"></span><span style="background:#4CAF50"></span><span style="background:#FF9800"></span></span><span class="bps-lbl">BPS</span></span></div>
                <div class="card-photo">
                    <div class="photo-bg bg-purple"></div>
                    <img src="{{ asset('images/heni.png') }}" alt="Heni" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-anggota">Anggota</span>
                    <p class="card-name">Heni Widiyanti</p>
                    <p class="card-role">Statistisi Ahli Muda</p>
                    <p class="card-jab">PJ Statistik Tanaman Pangan, Perkebunan</p>
                </div>
            </div>

            <div class="tim-card">
                <div class="card-top"><img src="{{ asset('images/Logo BPS.png') }}" alt="BPS" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"><span class="logo-fb"><span class="sq"><span style="background:#e63946"></span><span style="background:#2196F3"></span><span style="background:#4CAF50"></span><span style="background:#FF9800"></span></span><span class="bps-lbl">BPS</span></span></div>
                <div class="card-photo">
                    <div class="photo-bg bg-lblue"></div>
                    <img src="{{ asset('images/linda.png') }}" alt="Linda" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-anggota">Anggota</span>
                    <p class="card-name">Linda Marlina</p>
                    <p class="card-role">Statistisi Ahli Muda</p>
                    <p class="card-jab">Ketua Kegiatan IMK</p>
                </div>
            </div>

            <div class="tim-card">
                <div class="card-top"><img src="{{ asset('images/Logo BPS.png') }}" alt="BPS" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"><span class="logo-fb"><span class="sq"><span style="background:#e63946"></span><span style="background:#2196F3"></span><span style="background:#4CAF50"></span><span style="background:#FF9800"></span></span><span class="bps-lbl">BPS</span></span></div>
                <div class="card-photo">
                    <div class="photo-bg bg-cream"></div>
                    <img src="{{ asset('images/oemar.png') }}" alt="Oemar" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-anggota">Anggota</span>
                    <p class="card-name">Oemar Syarief Wibisono</p>
                    <p class="card-role">Pranata Komputer Ahli Pertama</p>
                    <p class="card-jab">Anggota Pemuda Produksi</p>
                </div>
            </div>

            <div class="tim-card">
                <div class="card-top"><img src="{{ asset('images/Logo BPS.png') }}" alt="BPS" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"><span class="logo-fb"><span class="sq"><span style="background:#e63946"></span><span style="background:#2196F3"></span><span style="background:#4CAF50"></span><span style="background:#FF9800"></span></span><span class="bps-lbl">BPS</span></span></div>
                <div class="card-photo">
                    <div class="photo-bg bg-green"></div>
                    <img src="{{ asset('images/eka.png') }}" alt="Eka" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                    <div class="photo-ph" style="display:none"><i class="fas fa-user"></i></div>
                </div>
                <div class="card-info">
                    <span class="card-badge b-anggota">Anggota</span>
                    <p class="card-name">Eka Aulia Liusta</p>
                    <p class="card-role">Statistisi Ahli Pertama</p>
                    <p class="card-jab">Anggota Statistik Produksi</p>
                </div>
            </div>

        </div>
    </div>
</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <img src="{{ asset('images/Logo BPS.png') }}" alt="BPS"
                 style="height:44px;width:auto;margin-bottom:14px;filter:brightness(0) invert(1);">
            <p>Tim Statistik Produksi BPS Provinsi Jambi.<br>Jl. Jend. A. Thalib No.5, Pematang Sulur, Kota Jambi.</p>
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
        <div class="footer-col">
            <h4>Direktorat</h4>
            <ul>
                <li><a href="#">Tanaman Pangan</a></li>
                <li><a href="#">Hortikultura</a></li>
                <li><a href="#">Peternakan & Perikanan</a></li>
                <li><a href="#">Statistik Industri</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Kontak</h4>
            <ul>
                <li><a href="#">📍 Jambi, Indonesia</a></li>
                <li><a href="#">📧 bps1500@bps.go.id</a></li>
                <li><a href="#">📞 (0741) 60497</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        © {{ date('Y') }} Tim Statistik Produksi BPS Provinsi Jambi.
    </div>
</footer>

<script>
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
</body>
</html>