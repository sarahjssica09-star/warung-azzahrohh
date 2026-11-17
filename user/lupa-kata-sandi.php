<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

        @keyframes fadeUp   { from{opacity:0;transform:translateY(28px)} to{opacity:1;transform:translateY(0)} }
        @keyframes fadeIn   { from{opacity:0} to{opacity:1} }
        @keyframes gradShift{ 0%,100%{background-position:0% 50%} 50%{background-position:100% 50%} }
        @keyframes floatUp  { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-16px)} }
        @keyframes spin     { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
        @keyframes pulse    { 0%,100%{opacity:.6;transform:scale(1)} 50%{opacity:1;transform:scale(1.06)} }
        @keyframes glow     { 0%,100%{box-shadow:0 6px 20px rgba(122,31,46,.4)} 50%{box-shadow:0 10px 32px rgba(122,31,46,.7)} }

        html,body { width:100%; min-height:100vh; font-family:'Poppins',sans-serif; }
        .page { min-height:100vh; display:flex; flex-direction:column; }

        /* TOPBAR */
        .topbar {
            background:#7a1f2e; height:64px;
            display:flex; align-items:center; justify-content:space-between; padding:0 48px;
            box-shadow:0 4px 20px rgba(0,0,0,.25); flex-shrink:0;
        }
        .topbar-logo img { height:44px; object-fit:contain; filter:drop-shadow(0 2px 8px rgba(0,0,0,.3)); }
        .topbar-btn {
            display:flex; align-items:center; gap:7px;
            font-size:13px; font-weight:600; color:rgba(255,255,255,.85);
            text-decoration:none; padding:7px 16px; border-radius:50px;
            border:1.5px solid rgba(255,255,255,.3); transition:all .2s;
        }
        .topbar-btn:hover { background:rgba(255,255,255,.15); border-color:rgba(255,255,255,.6); color:#fff; }
        .topbar-btn svg { width:14px; height:14px; fill:currentColor; }

        /* HERO BG */
        .hero-bg {
            flex:1; position:relative; overflow:hidden;
            display:flex; align-items:center; justify-content:center;
            padding:48px 24px 60px;
        }
        .hero-bg-img {
            position:absolute; inset:0;
            background:url('../img/backgroundall.png') center/cover no-repeat;
        }
        .hero-bg-img::after {
            content:''; position:absolute; inset:0;
            background:linear-gradient(135deg, rgba(30,5,8,.78) 0%, rgba(90,25,35,.68) 50%, rgba(20,4,7,.82) 100%);
        }
        .particle { position:absolute; border-radius:50%; background:rgba(245,200,66,.1); pointer-events:none; }
        .p1 { width:180px; height:180px; top:8%; left:4%; animation:floatUp 8s ease-in-out infinite; }
        .p2 { width:120px; height:120px; bottom:10%; right:6%; animation:floatUp 10s ease-in-out 2s infinite; }

        /* CARD */
        .reset-card {
            position:relative; z-index:10;
            width:100%; max-width:480px;
            background:rgba(255,255,255,.07);
            backdrop-filter:blur(28px);
            border:1px solid rgba(255,255,255,.18);
            border-radius:28px; padding:48px 44px 44px;
            box-shadow:0 32px 80px rgba(0,0,0,.5);
            animation:fadeUp .6s ease both;
        }
        .ring-wrap { display:flex; justify-content:center; margin-bottom:24px; animation:fadeIn .6s ease .1s both; }
        .ring-outer {
            width:84px; height:84px; border-radius:50%;
            border:2px solid rgba(245,200,66,.4);
            display:flex; align-items:center; justify-content:center;
            position:relative; animation:pulse 3s ease-in-out infinite;
        }
        .ring-outer::before {
            content:''; position:absolute; inset:-8px; border-radius:50%;
            border:1px solid rgba(245,200,66,.18);
            animation:spin 8s linear infinite;
            border-top-color:rgba(245,200,66,.5);
        }
        .ring-inner {
            width:60px; height:60px; border-radius:50%;
            background:linear-gradient(135deg, #7a1f2e 0%, #5c1622 100%);
            display:flex; align-items:center; justify-content:center;
            box-shadow:0 4px 16px rgba(122,31,46,.5);
        }
        .ring-inner svg { width:28px; height:28px; fill:none; stroke:#fff; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; }

        .card-title {
            font-size:1.8rem; font-weight:900; color:#fff; text-align:center;
            margin-bottom:8px; text-shadow:0 4px 16px rgba(0,0,0,.4);
            animation:fadeUp .6s ease .15s both;
        }
        .card-sub {
            font-size:13px; color:rgba(255,255,255,.68); text-align:center;
            line-height:1.6; margin-bottom:28px;
            animation:fadeUp .6s ease .2s both;
        }
        .form-box {
            background:rgba(255,255,255,.97); border-radius:16px;
            padding:26px 22px 20px;
            box-shadow:0 8px 32px rgba(0,0,0,.2);
            animation:fadeUp .6s ease .25s both;
        }
        .form-group { margin-bottom:18px; }
        .form-label {
            display:flex; align-items:center; gap:7px;
            font-size:13px; font-weight:700; color:#333; margin-bottom:8px;
        }
        .form-label svg { width:15px; height:15px; fill:#7a1f2e; }
        .form-input {
            width:100%; height:48px;
            background:#fff; border:1.5px solid #e0d4d0; border-radius:10px;
            padding:0 16px; font-family:inherit; font-size:14px; color:#333;
            outline:none; transition:all .2s;
        }
        .form-input::placeholder { color:#bbb; }
        .form-input:focus { border-color:#7a1f2e; box-shadow:0 0 0 3px rgba(122,31,46,.08); }
        .btn-submit {
            width:100%; height:48px;
            background:linear-gradient(135deg, #7a1f2e 0%, #5c1622 100%);
            color:#fff; border:none; border-radius:10px;
            font-family:inherit; font-size:15px; font-weight:700; cursor:pointer;
            margin-top:4px;
            display:flex; align-items:center; justify-content:center; gap:10px;
            box-shadow:0 6px 18px rgba(122,31,46,.4);
            transition:all .25s; animation:glow 3s ease-in-out infinite;
        }
        .btn-submit:hover { transform:translateY(-2px); box-shadow:0 10px 28px rgba(122,31,46,.55); }
        .btn-submit svg { width:18px; height:18px; fill:currentColor; }
        .link-back {
            display:flex; align-items:center; justify-content:center; gap:7px;
            margin-top:18px; font-size:13px; font-weight:600;
            color:rgba(255,255,255,.72); text-decoration:none; transition:color .2s;
            animation:fadeUp .6s ease .3s both;
        }
        .link-back:hover { color:#f5c842; }
        .link-back svg { width:14px; height:14px; fill:currentColor; }

        /* FOOTER */
        .foot {
            background:#7a1f2e; padding:18px 48px;
            display:flex; align-items:center; gap:20px; flex-shrink:0;
        }
        .foot-logo { height:42px; object-fit:contain; filter:brightness(0) invert(1) opacity(.8); }
        .foot-div { width:2px; height:34px; background:rgba(255,255,255,.3); }
        .foot-tag { font-family:Georgia,serif; font-style:italic; color:#f5e8c8; font-size:.95rem; }

        @media(max-width:580px) {
            .topbar,.foot { padding:0 20px; height:60px; }
            .reset-card { padding:36px 22px; }
        }
    </style>
</head>
<body>
<div class="page">

    <!-- TOPBAR -->
    <header class="topbar">
        <div class="topbar-logo">
            <a href="../../HTML/index.html"><img src="../img/logo-utama.png" alt="Warung Azzahroh"></a>
        </div>
        <a href="login.php" class="topbar-btn">
            <svg viewBox="0 0 24 24"><path d="M19 12H5"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali ke Login
        </a>
    </header>

    <!-- HERO -->
    <div class="hero-bg">
        <div class="hero-bg-img"></div>
        <div class="particle p1"></div>
        <div class="particle p2"></div>

        <div class="reset-card">
            <div class="ring-wrap">
                <div class="ring-outer">
                    <div class="ring-inner">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <h1 class="card-title">Lupa Kata Sandi?</h1>
            <p class="card-sub">
                Masukan email akun Pengguna Anda.<br>
                Kami akan mengirimkan link reset kata sandi ke email tersebut.
            </p>

            <div class="form-box">
                <form action="login.php" method="get" novalidate>
                    <div class="form-group">
                        <label class="form-label">
                            <svg viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            Alamat Email
                        </label>
                        <input type="email" name="email" class="form-input"
                               placeholder="email@warungazzahroh.com" required>
                    </div>
                    <button type="submit" class="btn-submit">
                        <svg viewBox="0 0 24 24">
                            <line x1="22" y1="2" x2="11" y2="13"/>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                        </svg>
                        Kirim Link Reset
                    </button>
                </form>
            </div>

            <a href="login.php" class="link-back">
                <svg viewBox="0 0 24 24"><path d="M19 12H5"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Login Pengguna
            </a>
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
