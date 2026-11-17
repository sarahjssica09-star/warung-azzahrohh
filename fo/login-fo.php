<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Front Office - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        /* -- ANIMATIONS -- */
        @keyframes fadeUp  { from { opacity:0; transform:translateY(28px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeIn  { from { opacity:0; } to { opacity:1; } }
        @keyframes floatUp { 0%,100% { transform:translateY(0); } 50% { transform:translateY(-16px); } }
        @keyframes gradShift { 0%,100% { background-position:0% 50%; } 50% { background-position:100% 50%; } }
        @keyframes ticker  { 0% { transform:translateX(0); } 100% { transform:translateX(-50%); } }
        @keyframes glow    { 0%,100% { box-shadow:0 0 20px rgba(245,200,66,0.3); } 50% { box-shadow:0 0 40px rgba(245,200,66,0.6); } }

        html, body { width:100%; min-height:100vh; font-family:'Poppins',sans-serif; }

        /* Full page */
        .page {
            min-height: 100vh; display: flex; flex-direction: column;
            background: #faf6f2;
        }

        /* -- TOP BAR -- */
        .topbar {
            background: #7a1f2e; height: 64px;
            display: flex; align-items: center;
            justify-content: space-between; padding: 0 48px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        }
        .topbar-logo img { height: 44px; object-fit: contain; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.3)); }
        .topbar-actions { display: flex; align-items: center; gap: 10px; }
        .topbar-btn {
            display: flex; align-items: center; gap: 7px;
            font-size: 13px; font-weight: 600; color: rgba(255,255,255,0.85);
            text-decoration: none; padding: 7px 16px;
            border-radius: 50px; border: 1.5px solid rgba(255,255,255,0.3);
            transition: all 0.2s;
        }
        .topbar-btn:hover { background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.6); color: #fff; }
        .topbar-btn svg { width: 14px; height: 14px; fill: currentColor; }

        /* -- HERO SECTION WITH BG -- */
        .hero-bg {
            flex: 1; position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: center;
            padding: 48px 24px 60px;
        }
        /* Background image with overlay */
        .hero-bg-img {
            position: absolute; inset: 0;
            background: url('../img/backgroundall.png') center/cover no-repeat;
        }
        .hero-bg-img::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg,
                rgba(30,5,8,0.75) 0%,
                rgba(90,25,35,0.65) 50%,
                rgba(20,4,7,0.80) 100%);
        }
        /* Animated particles */
        .particle {
            position: absolute; border-radius: 50%;
            background: rgba(245,200,66,0.15); pointer-events: none;
        }
        .p1 { width:180px; height:180px; top:8%; left:4%; animation: floatUp 7s ease-in-out infinite; }
        .p2 { width:120px; height:120px; top:60%; right:5%; animation: floatUp 9s ease-in-out 2s infinite; }
        .p3 { width:80px; height:80px; bottom:12%; left:30%; animation: floatUp 6s ease-in-out 1s infinite; }

        /* -- LOGIN CARD -- */
        .login-card {
            position: relative; z-index: 10;
            width: 100%; max-width: 860px;
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.08);
            display: flex; min-height: 520px;
            animation: fadeUp 0.6s ease both;
        }

        /* Left column — character */
        .card-left {
            flex: 0 0 40%; position: relative;
            display: flex; align-items: flex-end; justify-content: center;
            overflow: hidden;
        }
        .card-left-bg {
            position: absolute; inset: 0;
            background: linear-gradient(160deg, rgba(90,30,40,0.9) 0%, rgba(40,8,12,0.95) 100%);
        }
        .blob {
            position: absolute; bottom: -30px; left: 50%;
            transform: translateX(-50%);
            width: 290px; height: 390px;
            background: radial-gradient(ellipse at 50% 60%, rgba(122,31,46,0.6) 0%, rgba(60,10,15,0.4) 70%, transparent 100%);
            border-radius: 50% 50% 45% 45%;
        }
        .card-char-img {
            position: relative; z-index: 2;
            width: 88%; max-width: 310px;
            object-fit: contain; object-position: bottom;
            margin-top: -30px;
            filter: drop-shadow(0 10px 30px rgba(0,0,0,0.5));
            animation: floatUp 5s ease-in-out infinite;
        }
        /* Decorative label on left */
        .card-left-badge {
            position: absolute; top: 24px; left: 50%; transform: translateX(-50%);
            background: rgba(245,200,66,0.15); border: 1px solid rgba(245,200,66,0.4);
            color: #f5c842; font-size: 10px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            padding: 5px 14px; border-radius: 50px; z-index: 3;
            white-space: nowrap;
        }

        /* Right column — form */
        .card-right {
            flex: 1; padding: 48px 44px;
            display: flex; flex-direction: column; justify-content: center;
        }
        .login-title {
            font-size: 3rem; font-weight: 900; color: #fff;
            line-height: 1; margin-bottom: 8px; letter-spacing: -1px;
            text-shadow: 0 4px 16px rgba(0,0,0,0.4);
        }
        .login-sub { font-size: 14px; color: rgba(255,255,255,0.75); margin-bottom: 28px; }
        .login-sub .hl-gold { color: #f5c842; font-weight: 700; }
        .login-sub .hl-dark { color: rgba(255,255,255,0.5); }

        /* White form box */
        .form-box {
            background: rgba(255,255,255,0.97); border-radius: 18px;
            padding: 28px 26px 24px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2), 0 2px 8px rgba(0,0,0,0.1);
        }
        .form-group { margin-bottom: 18px; }
        .form-label {
            display: flex; align-items: center; gap: 7px;
            font-size: 14px; font-weight: 700; color: #333; margin-bottom: 8px;
        }
        .form-label svg { width: 15px; height: 15px; fill: #7a1f2e; }
        .form-input {
            width: 100%; border: 1.5px solid #e0d4d0;
            border-radius: 10px; padding: 12px 15px;
            font-family: inherit; font-size: 14px; color: #333;
            outline: none; transition: all 0.2s;
            background: #fdfafa;
        }
        .form-input::placeholder { color: #bbb; }
        .form-input:focus { border-color: #7a1f2e; box-shadow: 0 0 0 3px rgba(122,31,46,0.08); }

        .btn-masuk {
            width: 100%; height: 48px;
            background: linear-gradient(135deg, #7a1f2e 0%, #5c1622 100%);
            color: #fff; border: none; border-radius: 10px;
            font-family: inherit; font-size: 15px; font-weight: 700;
            cursor: pointer; margin-top: 6px;
            display: flex; align-items: center; justify-content: center; gap: 10px;
            box-shadow: 0 6px 18px rgba(122,31,46,0.4);
            transition: all 0.25s; animation: glow 3s ease-in-out infinite;
        }
        .btn-masuk:hover {
            background: linear-gradient(135deg, #8e2535 0%, #6a1c26 100%);
            transform: translateY(-2px); box-shadow: 0 10px 28px rgba(122,31,46,0.5);
        }
        .btn-masuk svg { width: 18px; height: 18px; fill: currentColor; }

        .form-footer {
            display: flex; justify-content: space-between; align-items: flex-start;
            margin-top: 14px;
        }
        .form-alt-links { display: flex; flex-direction: column; gap: 2px; }
        .form-alt-links a {
            font-size: 12px; color: #555; text-decoration: none;
            border-left: 2px solid #d0c0bc; padding-left: 8px;
            line-height: 1.8; transition: color 0.2s;
        }
        .form-alt-links a:hover { color: #7a1f2e; border-color: #7a1f2e; }
        .link-forgot { font-size: 12px; font-weight: 600; color: #777; text-decoration: none; align-self: center; transition: color 0.2s; }
        .link-forgot:hover { color: #7a1f2e; }

        /* -- BOTTOM FOOTER -- */
        .foot {
            background: #7a1f2e; padding: 20px 48px;
            display: flex; align-items: center; gap: 20px;
        }
        .foot-logo { height: 44px; object-fit: contain; filter: brightness(0) invert(1) opacity(0.8); }
        .foot-div { width: 2px; height: 36px; background: rgba(255,255,255,0.3); }
        .foot-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }

        @media (max-width: 680px) {
            .login-card { flex-direction: column; max-width: 420px; }
            .card-left { flex: 0 0 200px; }
            .card-char-img { width: 65%; margin-top: 0; }
            .card-right { padding: 28px 22px 32px; }
            .login-title { font-size: 2.2rem; }
            .topbar { padding: 0 20px; }
        }
    </style>
<style>
/* Shared Warung Azzahroh FO page backdrop */
html { min-height: 100%; background: #f6eee8; }
body {
    background-color: #f6eee8 !important;
    background-image:
        radial-gradient(ellipse at 8% 12%, rgba(122, 31, 46, .10) 0, rgba(122, 31, 46, 0) 34%),
        radial-gradient(ellipse at 94% 82%, rgba(190, 139, 91, .13) 0, rgba(190, 139, 91, 0) 38%),
        repeating-linear-gradient(128deg, rgba(122, 31, 46, .025) 0, rgba(122, 31, 46, .025) 1px, transparent 1px, transparent 88px),
        linear-gradient(135deg, #faf5f0 0%, #f4e9e2 52%, #f8f0e9 100%) !important;
    background-attachment: fixed !important;
}
</style></head>
<body>
<div class="page">

    <!-- TOP BAR -->
    <header class="topbar">
        <div class="topbar-logo">
            <a href="../index.html"><img src="../img/logo-utama.png" alt="Warung Azzahroh"></a>
        </div>
        <div class="topbar-actions">
            <a href="../index.html" class="topbar-btn">
                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Beranda
            </a>
        </div>
    </header>

    <!-- HERO BG WITH CARD -->
    <div class="hero-bg">
        <div class="hero-bg-img"></div>
        <div class="particle p1"></div>
        <div class="particle p2"></div>
        <div class="particle p3"></div>

        <div class="login-card">
            <!-- Left: Character -->
            <div class="card-left">
                <div class="card-left-bg"></div>
                <div class="blob"></div>
                <div class="card-left-badge">Front Office</div>
                <img src="../img/fo-cewenulis.png" alt="Kasir Front Office" class="card-char-img">
            </div>

            <!-- Right: Form -->
            <div class="card-right">
                <h1 class="login-title">LOGIN</h1>
                <p class="login-sub">
                    masuk ke akun <span class="hl-gold">Front Office</span>
                    <span class="hl-dark"> toko</span> sekarang!
                </p>

                <div class="form-box">
                    <form action="dashbore.html" method="GET" novalidate>
                        <div class="form-group">
                            <label class="form-label">
                                <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                Email
                            </label>
                            <input type="email" name="email" class="form-input" placeholder="Masukan Email" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                                Kata Sandi
                            </label>
                            <input type="password" name="password" class="form-input" placeholder="Masukan Kata Sandi" required>
                        </div>

                        <button type="submit" class="btn-masuk">
                            <svg viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                            Masuk
                        </button>

                        <div class="form-footer">
                            <div class="form-alt-links">
                                <a href="../user/login.html">Login Pengguna</a>
                                <a href="../admin/login.html">Login Admin</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="foot">
        <img src="../img/logo-utama.png" alt="Warung Azzahroh" class="foot-logo">
        <div class="foot-div"></div>
        <span class="foot-tag">Belanja kebutuhan sehari-hari</span>
    </footer>

</div>
</body>
</html>
