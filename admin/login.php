<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        /* -- ANIMATIONS -- */
        @keyframes fadeUp   { from { opacity:0; transform:translateY(28px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeIn   { from { opacity:0; } to { opacity:1; } }
        @keyframes floatBg  { 0%,100% { transform:translateY(0) scale(1); } 50% { transform:translateY(-20px) scale(1.02); } }

        html, body {
            width: 100%; min-height: 100vh;
            font-family: 'Poppins', sans-serif; color: #333;
        }

        /* Full-page split layout */
        .page { display: flex; min-height: 100vh; }

        /* -- LEFT PANEL -- */
        .left-panel {
            flex: 0 0 45%; background: linear-gradient(135deg, #4b1720 0%, #702431 54%, #812b37 100%);
            display: flex; flex-direction: column; align-items: center;
            justify-content: center; padding: 60px 48px;
            position: relative; overflow: hidden;
        }
        /* Decorative circles */
        .left-panel::before {
            content: ''; position: absolute; top: -100px; right: -100px;
            width: 400px; height: 400px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 0 0 30px rgba(255,255,255,0.018), 0 0 0 70px rgba(255,255,255,0.012);
        }
        .left-panel::after {
            content: ''; position: absolute; bottom: -120px; left: -80px;
            width: 350px; height: 350px;
            background: radial-gradient(circle, rgba(245,200,66,0.12) 0%, transparent 70%);
            border-radius: 50%;
        }
        .lp-grid {
            position: absolute; inset: 0;
            background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 48px 48px;
        }
        .lp-content { position: relative; z-index: 2; text-align: center; }
        .lp-logo { margin-bottom: 36px; animation: fadeIn 0.6s ease both; }
        .lp-logo img { height: 72px; object-fit: contain; filter: drop-shadow(0 4px 20px rgba(0,0,0,0.4)); }
        .lp-admin-img {
            width: 200px; margin: 0 auto 32px;
            filter: drop-shadow(0 12px 32px rgba(0,0,0,0.5));
            animation: fadeIn 0.8s ease 0.15s both;
        }
        .lp-admin-img img { width: 100%; object-fit: contain; }
        .lp-title {
            font-size: 2rem; font-weight: 900; color: #fff;
            line-height: 1.2; margin-bottom: 12px;
            animation: fadeUp 0.6s ease 0.1s both;
        }
        .lp-title .accent { color: #f5c842; }
        .lp-sub {
            font-size: 14px; color: rgba(255,255,255,0.7); line-height: 1.6;
            max-width: 320px; margin: 0 auto;
            animation: fadeUp 0.6s ease 0.2s both;
        }
        /* Stats chips */
        .lp-stats {
            display: flex; gap: 12px; justify-content: center;
            margin-top: 32px; flex-wrap: wrap;
            animation: fadeUp 0.6s ease 0.3s both;
        }
        .lp-stat {
            background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15);
            border-radius: 50px; padding: 8px 18px;
            font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.9);
            display: flex; align-items: center; gap: 6px;
        }
        .lp-stat svg { width: 14px; height: 14px; fill: #f5c842; }

        /* -- RIGHT PANEL -- */
        .right-panel {
            flex: 1; background: #faf6f2;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding: 60px 48px; position: relative; overflow: hidden;
        }
        .right-panel::before,
        .right-panel::after {
            content: ''; position: absolute; border-radius: 50%; pointer-events: none;
        }
        .right-panel::before {
            width: 390px; height: 390px; top: -205px; right: -165px;
            border: 1px solid rgba(112,36,49,.09);
            box-shadow: 0 0 0 26px rgba(112,36,49,.025), 0 0 0 58px rgba(112,36,49,.018);
        }
        .right-panel::after {
            width: 250px; height: 250px; bottom: -155px; left: -120px;
            background: radial-gradient(circle, rgba(245,200,66,.17), rgba(245,200,66,0));
        }
        .rp-back {
            position: absolute; z-index: 2; top: 24px; left: 24px;
            display: flex; align-items: center; gap: 7px;
            font-size: 13px; font-weight: 600; color: #888;
            text-decoration: none; transition: color 0.2s;
        }
        .rp-back:hover { color: #7a1f2e; }
        .rp-back svg { width: 16px; height: 16px; fill: currentColor; }

        .form-card {
            width: 100%; max-width: 440px;
            position: relative; z-index: 1;
            padding: 38px 36px 32px;
            border: 1px solid rgba(112,36,49,.08);
            border-radius: 22px;
            background: rgba(255,255,255,.88);
            box-shadow: 0 24px 70px rgba(58,32,28,.10);
            animation: fadeUp 0.6s ease 0.1s both;
        }
        .form-eyebrow {
            font-size: 11px; font-weight: 700; letter-spacing: 2px;
            text-transform: uppercase; color: #7a1f2e; margin-bottom: 10px;
            display: flex; align-items: center; gap: 8px;
        }
        .form-eyebrow::before { content: ''; width: 24px; height: 2px; background: #7a1f2e; border-radius: 2px; }
        .form-title {
            font-size: 2.2rem; font-weight: 900; color: #1a0508;
            letter-spacing: -1px; margin-bottom: 6px;
        }
        .form-sub { font-size: 14px; color: #888; margin-bottom: 36px; }
        .form-sub .hl { color: #7a1f2e; font-weight: 700; }

        .form-group { margin-bottom: 20px; }
        .form-label {
            display: flex; align-items: center; gap: 7px;
            font-size: 13px; font-weight: 700; color: #333; margin-bottom: 8px;
        }
        .form-label svg { width: 15px; height: 15px; fill: #7a1f2e; }
        .input-wrap { position: relative; }
        .form-input {
            width: 100%; height: 50px;
            background: #fff; border: 1.5px solid #e8ddd8;
            border-radius: 12px; padding: 0 16px;
            font-family: inherit; font-size: 14px; color: #333;
            outline: none; transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .form-input::placeholder { color: #bbb; }
        .form-input:focus {
            border-color: #7a1f2e;
            box-shadow: 0 0 0 3px rgba(122,31,46,0.1), 0 2px 8px rgba(0,0,0,0.04);
        }

        .btn-submit {
            width: 100%; height: 52px;
            background: linear-gradient(135deg, #7a1f2e 0%, #5c1622 100%);
            color: #fff; border: none; border-radius: 12px;
            font-family: inherit; font-size: 15px; font-weight: 700;
            cursor: pointer; margin-top: 8px;
            box-shadow: 0 6px 20px rgba(122,31,46,0.35);
            display: flex; align-items: center; justify-content: center; gap: 10px;
            transition: all 0.25s;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, #8e2535 0%, #6a1c26 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(122,31,46,0.45);
        }
        .btn-submit svg { width: 18px; height: 18px; fill: currentColor; }

        .form-links {
            margin-top: 20px; border-left: 2px solid #e0d0cc; padding-left: 14px;
            display: flex; flex-direction: column; gap: 4px;
        }
        .form-links a {
            font-size: 13px; color: #888; text-decoration: none;
            font-weight: 500; transition: color 0.2s;
        }
        .form-links a:hover { color: #7a1f2e; }

        .form-divider {
            display: flex; align-items: center; gap: 14px;
            margin: 24px 0; color: #ccc; font-size: 12px;
        }
        .form-divider::before, .form-divider::after {
            content: ''; flex: 1; height: 1px; background: #e8ddd8;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; }
        }

        @media (max-width: 768px) {
            .page { flex-direction: column; }
            .left-panel { flex: none; padding: 40px 24px; }
            .lp-admin-img { width: 140px; }
            .right-panel { padding: 48px 24px 40px; }
            .form-card { padding: 30px 25px 26px; }
        }
    </style>
        <style>
/* Admin page backdrop: visible but quiet store-inspired curves and color fields. */
body {
    background-color: #f6eee8;
    background-image:
        radial-gradient(ellipse at 9% 12%, rgba(112,36,49,.16), transparent 29%),
        radial-gradient(ellipse at 91% 14%, rgba(218,176,99,.25), transparent 25%),
        radial-gradient(ellipse at 82% 82%, rgba(112,36,49,.12), transparent 30%),
        radial-gradient(ellipse at 17% 79%, rgba(218,176,99,.18), transparent 26%),
        repeating-radial-gradient(circle at 100% 0%, transparent 0 132px, rgba(112,36,49,.038) 133px 134px, transparent 135px 190px),
        radial-gradient(rgba(112,36,49,.055) .9px, transparent .9px);
    background-size: auto, auto, auto, auto, auto, 30px 30px;
    background-attachment: fixed;
}
body .main-wrapper {
    background-color: #f6eee8;
    background-image:
        radial-gradient(ellipse at 9% 12%, rgba(112,36,49,.16), transparent 29%),
        radial-gradient(ellipse at 91% 14%, rgba(218,176,99,.25), transparent 25%),
        radial-gradient(ellipse at 82% 82%, rgba(112,36,49,.12), transparent 30%),
        radial-gradient(ellipse at 17% 79%, rgba(218,176,99,.18), transparent 26%),
        repeating-radial-gradient(circle at 100% 0%, transparent 0 132px, rgba(112,36,49,.038) 133px 134px, transparent 135px 190px),
        radial-gradient(rgba(112,36,49,.055) .9px, transparent .9px);
    background-size: auto, auto, auto, auto, auto, 30px 30px;
    background-attachment: fixed;
}
body .right-panel {
    background-color: #faf4ee;
    background-image:
        radial-gradient(ellipse at 89% 9%, rgba(112,36,49,.10), transparent 29%),
        radial-gradient(ellipse at 8% 92%, rgba(218,176,99,.17), transparent 25%),
        repeating-radial-gradient(circle at 100% 0%, transparent 0 132px, rgba(112,36,49,.032) 133px 134px, transparent 135px 190px),
        radial-gradient(rgba(112,36,49,.045) .9px, transparent .9px);
    background-size: auto, auto, auto, 30px 30px;
}
    </style>
</head>
<body>
<div class="page">

    <!-- LEFT PANEL -->
    <aside class="left-panel">
        <div class="lp-grid"></div>
        <div class="lp-content">
            <div class="lp-logo">
                <img src="../img/logo-utama.png" alt="Warung Azzahroh">
            </div>
            <div class="lp-admin-img">
                <img src="../img/admin/admin-orang.png" alt="Admin">
            </div>
            <h2 class="lp-title">Panel <span class="accent">Admin</span></h2>
            <p class="lp-sub">Kelola seluruh operasional toko dari satu dashboard yang terintegrasi dan modern.</p>
            <div class="lp-stats">
                <div class="lp-stat">
                    <svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                    Manajemen Stok
                </div>
                <div class="lp-stat">
                    <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                    Kelola Transaksi
                </div>
                <div class="lp-stat">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    Data Pengguna
                </div>
            </div>
        </div>
    </aside>

    <!-- RIGHT PANEL -->
    <main class="right-panel">
        <a href="../index.html" class="rp-back">
            <svg viewBox="0 0 24 24"><path d="M19 12H5"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali ke Beranda
        </a>

        <div class="form-card">
            <div class="form-eyebrow">Selamat Datang</div>
            <h1 class="form-title">Login Admin</h1>
            <p class="form-sub">masuk ke akun <span class="hl">admin toko</span> sekarang!</p>

            <form action="dashboard.html" method="GET">
                <div class="form-group">
                    <label class="form-label">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        Email
                    </label>
                    <div class="input-wrap">
                        <input type="email" name="email" class="form-input" placeholder="admin@warungazzahroh.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        Kata Sandi
                    </label>
                    <div class="input-wrap">
                        <input type="password" name="password" class="form-input" placeholder="Masukan kata sandi" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="form-links">
                <a href="../fo/login-fo.html">Login Front Office</a>
                <a href="../user/login.html">Login Pengguna</a>
            </div>
        </div>
    </main>

</div>
</body>
</html>

