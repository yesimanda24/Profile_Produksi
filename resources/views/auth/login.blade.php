<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin – Tim Statistik Produksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f0f4ff;
        }
        /* Sisi kiri — ilustrasi */
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #0e2554 0%, #1a56db 60%, #2563eb 100%);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding: 3rem;
            position: relative; overflow: hidden;
        }
        .left-panel::after {
            content: '';
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .left-inner { position: relative; z-index: 1; text-align: center; color: #fff; }
        .left-inner img { height: 72px; margin-bottom: 1.5rem; filter: brightness(0) invert(1); }
        .left-inner h1 { font-size: 1.7rem; font-weight: 800; line-height: 1.2; margin-bottom: 0.75rem; }
        .left-inner p { font-size: 14px; color: rgba(255,255,255,0.78); line-height: 1.7; max-width: 340px; }

        /* Sisi kanan — form */
        .right-panel {
            width: 460px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            padding: 3rem 3.5rem;
            background: #fff;
        }
        .form-box { width: 100%; }
        .form-box h2 { font-size: 1.5rem; font-weight: 800; color: #111827; margin-bottom: 0.4rem; }
        .form-box .subtitle { font-size: 13.5px; color: #6b7280; margin-bottom: 2rem; }

        .form-group { margin-bottom: 1.2rem; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-group .input-wrap { position: relative; }
        .form-group .input-wrap i {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            color: #9ca3af; font-size: 14px;
        }
        .form-group input {
            width: 100%; padding: 11px 14px 11px 40px;
            border: 1.5px solid #e5e7eb; border-radius: 10px;
            font-size: 14px; font-family: inherit; color: #111827;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .form-group input:focus {
            border-color: #1a56db;
            box-shadow: 0 0 0 3px rgba(26,86,219,0.12);
        }
        .form-group input.is-invalid { border-color: #ef4444; }

        .error-msg { font-size: 12px; color: #ef4444; margin-top: 5px; display: block; }
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            border-radius: 10px; padding: 12px 16px;
            font-size: 13px; color: #b91c1c; margin-bottom: 1.25rem;
            display: flex; align-items: center; gap: 8px;
        }

        .remember-row { display: flex; align-items: center; gap: 8px; margin-bottom: 1.5rem; }
        .remember-row input[type="checkbox"] { width: 16px; height: 16px; accent-color: #1a56db; cursor: pointer; }
        .remember-row label { font-size: 13px; color: #6b7280; cursor: pointer; user-select: none; }

        .btn-login {
            width: 100%; padding: 13px;
            background: #1a56db; color: #fff;
            border: none; border-radius: 10px;
            font-size: 15px; font-weight: 700; font-family: inherit;
            cursor: pointer; transition: background 0.2s, transform 0.15s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-login:hover { background: #1340b0; transform: translateY(-1px); }

        .back-link {
            text-align: center; margin-top: 1.5rem;
            font-size: 13px; color: #6b7280;
        }
        .back-link a { color: #1a56db; font-weight: 600; text-decoration: none; }
        .back-link a:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .left-panel { display: none; }
            .right-panel { width: 100%; padding: 2.5rem 1.75rem; }
        }
    </style>
</head>
<body>

<div class="left-panel">
    <div class="left-inner">
        <img src="{{ asset('images/Logo BPS.png') }}" alt="Logo BPS">
        <h1>Panel Admin<br>Tim Statistik Produksi</h1>
        <p>Kelola data anggota, survei, kegiatan, dan publikasi secara mudah dan terpusat.</p>
    </div>
</div>

<div class="right-panel">
    <div class="form-box">
        <h2>Selamat Datang</h2>
        <p class="subtitle">Masuk untuk mengakses panel admin</p>

        @if ($errors->any())
        <div class="alert-error">
            <i class="fas fa-circle-exclamation"></i>
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrap">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@bps.go.id"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        autocomplete="email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password"
                        placeholder="••••••••"
                        autocomplete="current-password" required>
                </div>
            </div>

            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-right-to-bracket"></i> Masuk
            </button>
        </form>

        <p class="back-link">
            <a href="/"><i class="fas fa-arrow-left" style="font-size:11px;"></i> Kembali ke Website</a>
        </p>
    </div>
</div>

</body>
</html>
