<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #faf6f2;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(36px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-20px); }
        }
        @keyframes gradShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @keyframes chipIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ===== TOPBAR ===== */
        .topbar {
            background: #7a1f2e;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            flex-shrink: 0;
            box-shadow: 0 2px 14px rgba(0,0,0,0.25);
            z-index: 50;
        }
        .topbar-logo { height: 44px; object-fit: contain; }
        .btn-beranda {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255,255,255,0.12);
            border: 1.5px solid rgba(255,255,255,0.55);
            color: #fff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.25s;
        }
        .btn-beranda:hover { background: #fff; color: #7a1f2e; }
        .btn-beranda svg { width: 16px; height: 16px; }

        /* ===== MAIN SPLIT ===== */
        .login-main {
            flex: 1;
            display: flex;
            align-items: stretch;
            min-height: calc(100vh - 68px - 76px);
        }

        /* Left panel */
        .split-left {
            flex: 0 0 46%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 48px 44px;
            overflow: hidden;
            color: #fff;
            background: linear-gradient(135deg, #7a1f2e 0%, #4a1018 30%, #611826 60%, #7a1f2e 100%);
            background-size: 300% 300%;
            animation: gradShift 14s ease infinite;
        }
        .split-left::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 260px; height: 260px;
            background: radial-gradient(circle, rgba(245,200,66,0.18), transparent 70%);
            border-radius: 50%;
        }
        .split-left::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -60px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(255,255,255,0.10), transparent 70%);
            border-radius: 50%;
        }
        .brand-name {
            position: relative; z-index: 2;
            font-size: 1.7rem; font-weight: 800;
            letter-spacing: 0.5px;
            text-align: center;
            margin-bottom: 6px;
            animation: fadeUp 0.7s ease both;
        }
        .brand-tagline {
            position: relative; z-index: 2;
            font-size: 0.92rem; font-weight: 300;
            color: rgba(255,255,255,0.82);
            text-align: center;
            margin-bottom: 30px;
            animation: fadeUp 0.7s ease 0.1s both;
        }
        .kasir-wrap {
            position: relative; z-index: 2;
            width: 80%; max-width: 340px;
            display: flex; justify-content: center;
            margin-bottom: 30px;
        }
        .kasir-wrap img {
            width: 100%;
            object-fit: contain;
            filter: drop-shadow(0 18px 26px rgba(0,0,0,0.35));
            animation: float 5s ease-in-out infinite;
        }
        .feature-chips {
            position: relative; z-index: 2;
            display: flex; flex-wrap: wrap; gap: 10px;
            justify-content: center;
            max-width: 360px;
        }
        .chip {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.22);
            backdrop-filter: blur(4px);
            color: #fff;
            font-size: 0.78rem; font-weight: 500;
            padding: 7px 14px;
            border-radius: 50px;
            animation: chipIn 0.6s ease both;
        }
        .chip:nth-child(1) { animation-delay: 0.3s; }
        .chip:nth-child(2) { animation-delay: 0.45s; }
        .chip:nth-child(3) { animation-delay: 0.6s; }
        .chip svg { width: 15px; height: 15px; opacity: 0.9; }

        /* Right panel */
        .split-right {
            flex: 1;
            background: #faf6f2;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 28px;
        }
        .form-card {
            width: 100%;
            max-width: 380px;
            animation: fadeUp 0.7s ease both;
        }
        .form-card h1 {
            font-size: 2.6rem; font-weight: 800;
            color: #2a1518; line-height: 1.05;
            letter-spacing: 0.5px;
        }
        .form-card .sub {
            font-size: 0.92rem; color: #6b5550;
            margin: 8px 0 28px;
        }
        .field { margin-bottom: 18px; }
        .field label {
            display: block;
            font-size: 0.82rem; font-weight: 600;
            color: #4a3530; margin-bottom: 7px;
        }
        .input-wrap {
            position: relative;
            display: flex; align-items: center;
        }
        .input-wrap svg {
            position: absolute;
            left: 14px;
            width: 19px; height: 19px;
            color: #a8857e;
            pointer-events: none;
        }
        .input-wrap input {
            width: 100%;
            border: 1.6px solid #e3d6d0;
            background: #fff;
            border-radius: 12px;
            padding: 13px 16px 13px 44px;
            font-family: inherit;
            font-size: 0.9rem;
            color: #2a1518;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .input-wrap input::placeholder { color: #c2ada6; }
        .input-wrap input:focus {
            border-color: #7a1f2e;
            box-shadow: 0 0 0 3px rgba(122,31,46,0.12);
        }
        .btn-masuk {
            width: 100%;
            background: linear-gradient(135deg, #8a2635, #7a1f2e, #5c1620);
            background-size: 200% 200%;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-family: inherit;
            font-size: 1.02rem; font-weight: 700;
            cursor: pointer;
            margin-top: 6px;
            box-shadow: 0 8px 20px rgba(122,31,46,0.35);
            transition: transform 0.15s, box-shadow 0.2s, background-position 0.4s;
            letter-spacing: 0.5px;
        }
        .btn-masuk:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(122,31,46,0.45);
            background-position: 100% 50%;
        }
        .btn-masuk:active { transform: translateY(0); }

        .divider {
            display: flex; align-items: center; gap: 12px;
            margin: 22px 0 16px;
            color: #b09a93; font-size: 0.78rem;
        }
        .divider::before, .divider::after {
            content: ''; flex: 1; height: 1px; background: #e3d6d0;
        }
        .register-link {
            text-align: center; font-size: 0.88rem; color: #6b5550;
        }
        .register-link a {
            color: #7a1f2e; font-weight: 700; text-decoration: none;
        }
        .register-link a:hover { text-decoration: underline; }

        .alt-links {
            margin-top: 22px;
            display: flex; flex-direction: column; gap: 8px;
        }
        .alt-links a {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 0.78rem; color: #8a6f68;
            text-decoration: none;
            padding-left: 10px;
            border-left: 2px solid #e3d6d0;
            transition: color 0.2s, border-color 0.2s;
        }
        .alt-links a:hover { color: #7a1f2e; border-color: #7a1f2e; }
        .alt-links svg { width: 14px; height: 14px; }

        /* ===== FOOTER ===== */
        .login-footer {
            background: #7a1f2e;
            height: 76px;
            display: flex;
            align-items: center;
            padding: 0 32px;
            gap: 20px;
            flex-shrink: 0;
        }
        .footer-logo { height: 48px; object-fit: contain; }
        .footer-divider { width: 2px; height: 40px; background: rgba(255,255,255,0.32); }
        .footer-tagline {
            font-family: Georgia, serif; font-style: italic;
            color: #f5e8c8; font-size: 1.02rem;
        }

        @media (max-width: 860px) {
            .login-main { flex-direction: column; }
            .split-left { flex: 0 0 auto; padding: 40px 24px 28px; }
            .kasir-wrap { width: 50%; max-width: 220px; margin-bottom: 22px; }
            .split-right { padding: 40px 24px; }
            .form-card h1 { font-size: 2.1rem; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <a href="../../HTML/index.html">
            <img src="../img/logo-utama.png" alt="Warung Azzahroh" class="topbar-logo">
        </a>
        <a href="../../HTML/index.html" class="btn-beranda">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9.5L12 3l9 6.5"/><path d="M5 10v10a1 1 0 001 1h4v-6h4v6h4a1 1 0 001-1V10"/>
            </svg>
            Beranda
        </a>
    </header>

    <main class="login-main">
        <section class="split-left">
            <div class="brand-name">Warung Azzahroh</div>
            <div class="brand-tagline">Belanja kebutuhan sehari-hari</div>
            <div class="kasir-wrap">
                <img src="../img/fo-cewenulis.png" alt="Ilustrasi Kasir Warung Azzahroh">
            </div>
            <div class="feature-chips">
                <span class="chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                    Belanja Mudah
                </span>
                <span class="chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l2-5h14l2 5"/><path d="M3 9v11a1 1 0 001 1h16a1 1 0 001-1V9"/><path d="M9 13h6"/></svg>
                    Pengiriman Cepat
                </span>
                <span class="chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l8 4v6c0 5-3.5 8-8 10-4.5-2-8-5-8-10V6l8-4z"/></svg>
                    Pembayaran Aman
                </span>
            </div>
        </section>

        <section class="split-right">
            <div class="form-card">
                <h1>Masuk</h1>
                <p class="sub">Masuk ke akun Pengguna sekarang!</p>
                <form id="login-form" novalidate>
                    <div id="login-error" style="display:none; margin-bottom: 14px; background: #fff0f0; color: #8b1a2b; border: 1px solid #f2c7ce; border-radius: 10px; padding: 10px 12px; font-size: 0.82rem; font-weight: 600;"></div>
                    <div class="field">
                        <label for="email">Email</label>
                        <div class="input-wrap">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 6 10-6"/>
                            </svg>
                            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password">Kata Sandi</label>
                        <div class="input-wrap">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>
                            </svg>
                            <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-masuk">Masuk</button>
                </form>

                <div class="divider">atau</div>
                <p class="register-link">Belum punya akun? <a href="daftar.php">Daftar</a></p>

                <div class="alt-links">
                    <a href="../fo/login-fo.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8l2 2 2-2"/><path d="M21 4v6"/></svg>
                        Login Front Office
                    </a>
                    <a href="../admin/login.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><rect x="14" y="3" width="7" height="7" rx="1"/></svg>
                        Login Admin
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="login-footer">
        <img src="../img/logo-utama.png" alt="Logo Warung Azzahroh" class="footer-logo">
        <div class="footer-divider"></div>
        <span class="footer-tagline">Belanja kebutuhan sehari-hari</span>
    </footer>

    <script>
        const loginForm = document.getElementById('login-form');
        const loginError = document.getElementById('login-error');

        loginForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;

            if (!email || !password) {
                loginError.textContent = 'Email dan kata sandi harus diisi.';
                loginError.style.display = 'block';
                return;
            }

            loginError.style.display = 'none';

            try {
                const response = await fetch('../api/user/auth.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    credentials: 'same-origin',
                    body: JSON.stringify({ action: 'login', email, password })
                });

                const result = await response.json();
                if (!response.ok || !result.success) {
                    throw new Error(result.message || 'Login gagal.');
                }

                window.location.href = 'dashboard.php';
            } catch (error) {
                loginError.textContent = error.message || 'Login gagal.';
                loginError.style.display = 'block';
            }
        });
    </script>
</body>
</html>

