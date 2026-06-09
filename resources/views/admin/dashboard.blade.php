<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin – Tim Statistik Produksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1a56db; --blue-dark: #1340b0; --blue-light: #e8f0fe;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb;
            --gray-500: #6b7280; --gray-900: #111827; --white: #ffffff;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--gray-50); display: flex; min-height: 100vh; }

        .sidebar { width: 240px; flex-shrink: 0; background: #0e2554; display: flex; flex-direction: column; position: fixed; inset: 0 auto 0 0; }
        .sidebar-brand { padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 10px; }
        .sidebar-brand img { height: 36px; filter: brightness(0) invert(1); }
        .sidebar-brand span { font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.9); line-height: 1.3; }
        .sidebar-nav { flex: 1; padding: 16px 12px; }
        .sidebar-label { font-size: 10px; font-weight: 700; color: rgba(255,255,255,0.35); letter-spacing: 0.08em; text-transform: uppercase; padding: 0 8px; margin: 16px 0 6px; }
        .sidebar-nav a { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13.5px; font-weight: 500; padding: 9px 12px; border-radius: 8px; transition: background 0.2s, color 0.2s; margin-bottom: 2px; }
        .sidebar-nav a:hover { background: rgba(255,255,255,0.08); color: #fff; }
        .sidebar-nav a.active { background: var(--blue); color: #fff; font-weight: 700; }
        .sidebar-nav a i { width: 18px; text-align: center; }
        .sidebar-footer { padding: 16px 12px; border-top: 1px solid rgba(255,255,255,0.08); }
        .sidebar-footer form button { width: 100%; display: flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.08); border: none; cursor: pointer; color: rgba(255,255,255,0.7); font-size: 13.5px; font-weight: 500; padding: 9px 12px; border-radius: 8px; transition: background 0.2s, color 0.2s; font-family: inherit; }
        .sidebar-footer form button:hover { background: rgba(239,68,68,0.2); color: #fca5a5; }

        .main { margin-left: 240px; flex: 1; }
        .topbar { background: #fff; border-bottom: 1px solid var(--gray-200); padding: 0 28px; height: 60px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 10; }
        .topbar-title { font-size: 16px; font-weight: 700; color: var(--gray-900); }
        .topbar-user { display: flex; align-items: center; gap: 10px; font-size: 13px; color: #374151; }
        .avatar { width: 34px; height: 34px; border-radius: 50%; background: var(--blue); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; }

        .content { padding: 28px; }
        .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 28px; }
        .stat-card { background: #fff; border-radius: 14px; padding: 20px 22px; border: 1px solid var(--gray-200); display: flex; align-items: center; gap: 16px; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0; }
        .stat-label { font-size: 12px; color: var(--gray-500); font-weight: 500; }
        .stat-value { font-size: 28px; font-weight: 800; color: var(--gray-900); line-height: 1.1; }

        .menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .menu-card { background: #fff; border-radius: 14px; border: 1px solid var(--gray-200); padding: 22px 24px; text-decoration: none; color: inherit; display: flex; align-items: center; gap: 16px; transition: transform 0.2s, box-shadow 0.2s; }
        .menu-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.08); }
        .menu-card-icon { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0; }
        .menu-card-title { font-size: 15px; font-weight: 700; color: var(--gray-900); margin-bottom: 3px; }
        .menu-card-desc { font-size: 12.5px; color: var(--gray-500); }
        .menu-card-arrow { margin-left: auto; color: #9ca3af; font-size: 16px; }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand">
        <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo">
        <span>Tim Statistik<br>Produksi Jambi</span>
    </div>
    <nav class="sidebar-nav">
        <div class="sidebar-label">Menu</div>
        <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('admin.anggota') }}"><i class="fas fa-users"></i> Anggota Tim</a>
        <a href="{{ route('admin.survei') }}"><i class="fas fa-clipboard-list"></i> Survei</a>
        <a href="{{ route('admin.kegiatan') }}"><i class="fas fa-calendar-alt"></i> Kegiatan</a>
        <a href="{{ route('admin.publikasi') }}"><i class="fas fa-book"></i> Publikasi</a>
        <div class="sidebar-label">Website</div>
        <a href="/" target="_blank"><i class="fas fa-globe"></i> Lihat Website</a>
    </nav>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><i class="fas fa-right-from-bracket"></i> Keluar</button>
        </form>
    </div>
</aside>

<div class="main">
    <div class="topbar">
        <div class="topbar-title">Dashboard Admin</div>
        <div class="topbar-user">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            {{ Auth::user()->name }}
        </div>
    </div>
    <div class="content">
        <div class="stat-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background:#dbeafe;">👥</div>
                <div><div class="stat-label">Anggota Aktif</div><div class="stat-value">{{ $stats['anggota'] }}</div></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:#dcfce7;">📋</div>
                <div><div class="stat-label">Survei Aktif</div><div class="stat-value">{{ $stats['survei'] }}</div></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:#fff7ed;">📅</div>
                <div><div class="stat-label">Kegiatan</div><div class="stat-value">{{ $stats['kegiatan'] }}</div></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:#ede9fe;">📚</div>
                <div><div class="stat-label">Publikasi</div><div class="stat-value">{{ $stats['publikasi'] }}</div></div>
            </div>
        </div>

        <div class="menu-grid">
            <a href="{{ route('admin.anggota') }}" class="menu-card">
                <div class="menu-card-icon" style="background:#dbeafe;">👥</div>
                <div><div class="menu-card-title">Kelola Anggota Tim</div><div class="menu-card-desc">Tambah, edit, atau hapus anggota tim</div></div>
                <i class="fas fa-chevron-right menu-card-arrow"></i>
            </a>
            <a href="{{ route('admin.survei') }}" class="menu-card">
                <div class="menu-card-icon" style="background:#dcfce7;">📋</div>
                <div><div class="menu-card-title">Kelola Survei</div><div class="menu-card-desc">Manajemen data survei dan progres</div></div>
                <i class="fas fa-chevron-right menu-card-arrow"></i>
            </a>
            <a href="{{ route('admin.kegiatan') }}" class="menu-card">
                <div class="menu-card-icon" style="background:#fff7ed;">📅</div>
                <div><div class="menu-card-title">Kelola Kegiatan</div><div class="menu-card-desc">Tambah dan edit kegiatan tim</div></div>
                <i class="fas fa-chevron-right menu-card-arrow"></i>
            </a>
            <a href="{{ route('admin.publikasi') }}" class="menu-card">
                <div class="menu-card-icon" style="background:#ede9fe;">📚</div>
                <div><div class="menu-card-title">Kelola Publikasi</div><div class="menu-card-desc">Upload dan kelola publikasi</div></div>
                <i class="fas fa-chevron-right menu-card-arrow"></i>
            </a>
        </div>
    </div>
</div>

</body>
</html>