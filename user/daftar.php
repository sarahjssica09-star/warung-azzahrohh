<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#741d2b">
    <title>Daftar Pengguna - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --wine: #741d2b; --wine-dark: #4d111c; --gold: #f5c842; --ink: #29191a; --muted: #806f6c; --line: #eadeda; }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; min-height: 100vh; font-family: 'Poppins', sans-serif; color: var(--ink); background: #fbf8f5; }
        @keyframes enter { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes drift { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
        @keyframes glow { 0%,100% { opacity: .28; transform: scale(.96); } 50% { opacity: .52; transform: scale(1.06); } }
        .topbar { height: 72px; padding: 0 clamp(18px,5vw,72px); display: flex; align-items: center; justify-content: space-between; background: var(--wine); box-shadow: 0 5px 24px rgba(47,14,20,.18); position: relative; z-index: 2; }
        .brand { display: inline-flex; align-items: center; text-decoration: none; }
        .brand img { width: auto; height: 46px; object-fit: contain; }
        .home-link { display: inline-flex; align-items: center; gap: 9px; padding: 9px 17px; color: white; border: 1px solid rgba(255,255,255,.5); border-radius: 999px; text-decoration: none; font-size: .86rem; font-weight: 600; transition: .2s ease; }
        .home-link:hover { color: var(--wine); background: #fff; transform: translateY(-1px); }
        .home-link svg { width: 17px; height: 17px; }
        .page { min-height: calc(100vh - 72px); display: grid; grid-template-columns: minmax(330px,.88fr) minmax(0,1.12fr); }
        .welcome { position: relative; isolation: isolate; overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 48px clamp(28px,5vw,76px); color: white; text-align: center; background: linear-gradient(145deg,#8f2b3a 0%,var(--wine) 45%,var(--wine-dark) 100%); }
        .welcome::before,.welcome::after { content: ''; position: absolute; z-index: -1; border-radius: 50%; pointer-events: none; }
        .welcome::before { width: 360px; height: 360px; top: -100px; right: -100px; background: radial-gradient(circle,rgba(245,200,66,.34),transparent 68%); animation: glow 8s ease-in-out infinite; }
        .welcome::after { width: 400px; height: 400px; bottom: -190px; left: -150px; background: radial-gradient(circle,rgba(255,255,255,.14),transparent 70%); }
        .welcome-copy { max-width: 450px; animation: enter .7s ease both; }
        .eyebrow { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 17px; padding: 7px 13px; color: #fff2c5; background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.19); border-radius: 999px; font-size: .72rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; }
        .eyebrow span { width: 7px; height: 7px; border-radius: 50%; background: var(--gold); box-shadow: 0 0 12px var(--gold); }
        .welcome h1 { margin: 0; font-size: clamp(2rem,3.5vw,3.1rem); line-height: 1.12; letter-spacing: -.04em; }
        .welcome h1 strong { color: var(--gold); }
        .welcome-copy > p { max-width: 390px; margin: 15px auto 4px; color: rgba(255,255,255,.78); font-size: .93rem; line-height: 1.8; }
        .illustration { display: block; width: min(72%,300px); height: 230px; object-fit: contain; margin: 18px auto 10px; filter: drop-shadow(0 18px 24px rgba(25,5,9,.3)); animation: drift 5s ease-in-out infinite; }
        .perks { width: 100%; max-width: 430px; display: grid; grid-template-columns: repeat(3,1fr); gap: 10px; margin-top: 4px; }
        .perk { min-height: 78px; padding: 13px 8px 10px; border: 1px solid rgba(255,255,255,.18); border-radius: 15px; background: rgba(255,255,255,.09); backdrop-filter: blur(8px); color: rgba(255,255,255,.9); font-size: .7rem; font-weight: 500; }
        .perk svg { display: block; width: 20px; height: 20px; margin: 0 auto 7px; color: var(--gold); }
        .form-side { display: flex; justify-content: center; align-items: flex-start; padding: clamp(28px,5vw,64px) clamp(20px,5vw,72px); }
        .form-card { width: 100%; max-width: 670px; animation: enter .75s .1s ease both; }
        .form-heading { margin-bottom: 23px; }
        .form-heading .step { color: var(--wine); font-size: .74rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; }
        .form-heading h2 { margin: 6px 0 4px; font-size: clamp(1.8rem,3vw,2.35rem); letter-spacing: -.045em; line-height: 1.2; }
        .form-heading p { margin: 0; color: var(--muted); font-size: .88rem; }
        .form-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: 16px 18px; }
        .field { min-width: 0; }
        .field.full { grid-column: 1 / -1; }
        .field label { display: block; margin: 0 0 7px; color: #4c3938; font-size: .78rem; font-weight: 600; }
        .required { color: var(--wine); }
        .control { position: relative; }
        .control input,.control select,.control textarea { display: block; width: 100%; min-height: 48px; padding: 11px 14px; border: 1px solid var(--line); border-radius: 12px; outline: none; color: var(--ink); background: white; font: 400 .84rem 'Poppins',sans-serif; transition: border-color .2s,box-shadow .2s,transform .2s; }
        .control textarea { min-height: 76px; resize: vertical; }
        .control input::placeholder,.control textarea::placeholder { color: #b2a3a0; }
        .control input:focus,.control select:focus,.control textarea:focus { border-color: #9a4653; box-shadow: 0 0 0 4px rgba(116,29,43,.09); transform: translateY(-1px); }
        .control input[type="date"] { color-scheme: light; padding-right: 12px; }
        .control input[type="date"]::-webkit-calendar-picker-indicator { cursor: pointer; opacity: .78; }
        .control select { appearance: none; cursor: pointer; padding-right: 40px; }
        .select-arrow { position: absolute; top: 16px; right: 15px; width: 15px; height: 15px; color: #8a7370; pointer-events: none; }
        .password-input { padding-right: 48px !important; }
        .toggle-password { position: absolute; top: 50%; right: 9px; width: 34px; height: 34px; display: grid; place-items: center; transform: translateY(-50%); border: 0; border-radius: 9px; color: #8a7370; background: transparent; cursor: pointer; transition: .2s; }
        .toggle-password:hover { color: var(--wine); background: #f8eff0; }
        .toggle-password svg { width: 19px; height: 19px; }
        .hint { margin: 6px 0 0; color: #9b8a87; font-size: .68rem; }
        .submit { width: 100%; min-height: 51px; display: inline-flex; align-items: center; justify-content: center; gap: 10px; margin-top: 21px; border: 0; border-radius: 13px; color: white; background: linear-gradient(100deg,#8b2939,var(--wine),#591421); box-shadow: 0 10px 22px rgba(116,29,43,.2); font: 700 .94rem 'Poppins',sans-serif; cursor: pointer; transition: transform .2s,box-shadow .2s,filter .2s; }
        .submit:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(116,29,43,.28); filter: saturate(1.12); }
        .submit svg { width: 19px; height: 19px; }
        .login-prompt { margin: 18px 0 0; color: var(--muted); text-align: center; font-size: .82rem; }
        .login-prompt a { color: var(--wine); font-weight: 700; text-decoration: none; }
        .login-prompt a:hover { text-decoration: underline; }
        .form-note { display: flex; justify-content: center; align-items: center; gap: 7px; margin-top: 18px; color: #9b8a87; font-size: .7rem; }
        .form-note svg { width: 15px; height: 15px; color: #6b8b68; }
        @media (max-width: 900px) { .page { grid-template-columns: minmax(280px,.75fr) minmax(0,1.25fr); } .welcome { padding-inline: 24px; } .illustration { height: 185px; } .form-side { padding-inline: 28px; } }
        @media (max-width: 700px) { .page { display: block; } .welcome { padding: 33px 20px 27px; } .welcome h1 { font-size: 2rem; } .welcome-copy > p { margin-top: 10px; font-size: .82rem; } .illustration { width: 145px; height: 115px; margin: 8px auto; } .perks { max-width: 390px; } .perk { min-height: 68px; padding-top: 10px; font-size: .65rem; } .form-side { padding: 32px 20px 44px; } .form-heading { margin-bottom: 19px; } }
        @media (max-width: 440px) { .topbar { height: 64px; padding-inline: 16px; } .brand img { height: 40px; } .home-link { padding: 8px 12px; font-size: .78rem; } .form-side { padding-inline: 16px; } .form-grid { grid-template-columns: 1fr; gap: 14px; } .field.full { grid-column: auto; } .welcome h1 { font-size: 1.8rem; } }
        @media (prefers-reduced-motion: reduce) { *,*::before,*::after { scroll-behavior: auto !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="../../HTML/index.html" aria-label="Warung Azzahroh, beranda"><img src="../img/logo-utama.png" alt="Warung Azzahroh"></a>
        <a class="home-link" href="../../HTML/index.html">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 10 9-7 9 7"/><path d="M5 9v11h14V9M9 20v-6h6v6"/></svg>
            Kembali ke Beranda
        </a>
    </header>

    <main class="page">
        <section class="welcome" aria-label="Keuntungan menjadi pelanggan">
            <div class="welcome-copy">
                <div class="eyebrow"><span></span> Teman belanja harianmu</div>
                <h1>Belanja nyaman,<br><strong>mulai dari sini.</strong></h1>
                <p>Buat akun Warung Azzahroh dan temukan kebutuhan sehari-hari favoritmu dengan lebih mudah.</p>
                <img class="illustration" src="../img/fo-cewenulis.png" alt="Ilustrasi kasir Warung Azzahroh">
                <div class="perks">
                    <div class="perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="9"/></svg>Belanja praktis</div>
                    <div class="perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h11v11H3zM14 11h4l3 3v4h-7z"/><circle cx="7.5" cy="18" r="1.5"/><circle cx="17.5" cy="18" r="1.5"/></svg>Pesanan mudah</div>
                    <div class="perk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/><path d="m9 12 2 2 4-4"/></svg>Akun aman</div>
                </div>
            </div>
        </section>

        <section class="form-side" aria-labelledby="form-title">
            <div class="form-card">
                <div class="form-heading">
                    <span class="step">Buat akun baru</span>
                    <h2 id="form-title">Yuk, bergabung!</h2>
                    <p>Isi data diri untuk mulai menikmati pengalaman belanja yang praktis.</p>
                </div>
                <form id="register-form">
                    <div id="register-error" style="display:none; margin-bottom: 16px; background: #fff0f0; color: #8b1a2b; border: 1px solid #f2c7ce; border-radius: 10px; padding: 10px 12px; font-size: 0.82rem; font-weight: 600;"></div>
                    <div class="form-grid">
                        <div class="field">
                            <label for="nama_pengguna">Nama Pengguna <span class="required">*</span></label>
                            <div class="control"><input type="text" id="nama_pengguna" name="nama_pengguna" placeholder="Contoh: Siti Aminah" autocomplete="name" minlength="2" required></div>
                        </div>
                        <div class="field">
                            <label for="nomor_telepon">Nomor Telepon <span class="required">*</span></label>
                            <div class="control"><input type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="08xxxxxxxxxx" autocomplete="tel" inputmode="tel" pattern="[0-9+() -]{8,20}" required></div>
                        </div>
                        <div class="field full">
                            <label for="alamat">Alamat <span class="required">*</span></label>
                            <div class="control"><textarea id="alamat" name="alamat" placeholder="Nama jalan, nomor rumah, kelurahan, dan kecamatan" autocomplete="street-address" minlength="8" required></textarea></div>
                        </div>
                        <div class="field">
                            <label for="email">Email <span class="required">*</span></label>
                            <div class="control"><input type="email" id="email" name="email" placeholder="nama@email.com" autocomplete="email" required></div>
                        </div>
                        <div class="field">
                            <label for="tanggal_lahir">Tanggal Lahir <span class="required">*</span></label>
                            <div class="control"><input type="date" id="tanggal_lahir" name="tanggal_lahir" autocomplete="bday" required></div>
                        </div>
                        <div class="field">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <div class="control">
                                <select id="gender" name="gender" required>
                                    <option value="" disabled selected>Pilih gender</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password">Kata Sandi <span class="required">*</span></label>
                            <div class="control">
                                <input class="password-input" type="password" id="password" name="password" placeholder="Buat kata sandi" autocomplete="new-password" minlength="8" required>
                                <button class="toggle-password" type="button" aria-label="Tampilkan kata sandi" aria-pressed="false" data-target="password"></button>
                            </div>
                            <p class="hint">Gunakan minimal 8 karakter.</p>
                        </div>
                        <div class="field full">
                            <label for="konfirmasi_password">Konfirmasi Kata Sandi <span class="required">*</span></label>
                            <div class="control">
                                <input class="password-input" type="password" id="konfirmasi_password" name="konfirmasi_password" placeholder="Ketik ulang kata sandi" autocomplete="new-password" required>
                                <button class="toggle-password" type="button" aria-label="Tampilkan konfirmasi kata sandi" aria-pressed="false" data-target="konfirmasi_password"></button>
                            </div>
                        </div>
                    </div>
                    <button class="submit" type="submit">
                        Buat Akun
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </button>
                </form>
                <p class="login-prompt">Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
                <div class="form-note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>Data akunmu terlindungi dengan aman</div>
            </div>
        </section>
    </main>

    <script>
        const password = document.getElementById('password');
        const confirmation = document.getElementById('konfirmasi_password');
        const eyeIcon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>';
        const eyeOffIcon = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a15.8 15.8 0 0 1-3 3.8M6.2 6.2C3.5 8 2 12 2 12s3.6 7 10 7a10 10 0 0 0 4-.8"/></svg>';

        document.querySelectorAll('.toggle-password').forEach((button) => {
            button.innerHTML = eyeIcon;
            button.addEventListener('click', () => {
                const input = document.getElementById(button.dataset.target);
                const visible = input.type === 'password';
                input.type = visible ? 'text' : 'password';
                button.innerHTML = visible ? eyeOffIcon : eyeIcon;
                button.setAttribute('aria-pressed', String(visible));
                button.setAttribute('aria-label', `${visible ? 'Sembunyikan' : 'Tampilkan'} ${button.dataset.target === 'password' ? 'kata sandi' : 'konfirmasi kata sandi'}`);
                input.focus();
            });
        });

        function validatePasswordMatch() {
            confirmation.setCustomValidity(confirmation.value && confirmation.value !== password.value ? 'Konfirmasi kata sandi belum sama.' : '');
        }
        password.addEventListener('input', validatePasswordMatch);
        confirmation.addEventListener('input', validatePasswordMatch);

        const birthDate = document.getElementById('tanggal_lahir');
        const today = new Date();
        birthDate.max = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;

        const registerForm = document.getElementById('register-form');
        const registerError = document.getElementById('register-error');

        registerForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const payload = {
                action: 'register',
                nama_pengguna: document.getElementById('nama_pengguna').value.trim(),
                nomor_telepon: document.getElementById('nomor_telepon').value.trim(),
                alamat: document.getElementById('alamat').value.trim(),
                email: document.getElementById('email').value.trim(),
                tanggal_lahir: document.getElementById('tanggal_lahir').value,
                gender: document.getElementById('gender').value,
                password: document.getElementById('password').value,
                konfirmasi_password: document.getElementById('konfirmasi_password').value
            };

            const missing = Object.entries(payload).find(([key, value]) => key !== 'action' && !String(value).trim());
            if (missing) {
                registerError.textContent = 'Semua field wajib diisi.';
                registerError.style.display = 'block';
                return;
            }

            if (payload.password !== payload.konfirmasi_password) {
                registerError.textContent = 'Konfirmasi kata sandi tidak sama.';
                registerError.style.display = 'block';
                return;
            }

            registerError.style.display = 'none';

            try {
                const response = await fetch('../api/user/auth.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    credentials: 'same-origin',
                    body: JSON.stringify(payload)
                });

                const result = await response.json();
                if (!response.ok || !result.success) {
                    throw new Error(result.message || 'Pendaftaran gagal.');
                }

                window.location.href = 'login.php';
            } catch (error) {
                registerError.textContent = error.message || 'Pendaftaran gagal.';
                registerError.style.display = 'block';
            }
        });
    </script>
</body>
</html>
