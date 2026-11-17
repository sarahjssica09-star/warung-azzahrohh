<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Saya - Warung Azzahroh</title>

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ==================================================
           RESET & BASE
        ================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #ffffff;
            color: #222222;
            display: flex;
            min-height: 100vh;
        }

        /* ==================================================
           SIDEBAR
        ================================================== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid #f0f0f0;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-top {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logo-box {
            padding: 28px 20px 18px;
            display: flex;
            justify-content: center;
        }

        .sidebar-logo {
            width: 120px;
            object-fit: contain;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 10px 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sidebar-menu-item {
            padding: 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 11px 16px;
            text-decoration: none;
            color: #260404;
            font-size: 18px;
            font-weight: 700;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .sidebar-link:hover {
            background-color: #f7f3f3;
        }

        .sidebar-link.active {
            background-color: #f5f0f0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        .sidebar-icon {
            width: 28px;
            height: 28px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logout {
            padding: 0 10px 16px;
        }

        .btn-keluar {
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            padding: 11px 16px;
            border: 2px solid #8B1A2B;
            border-radius: 8px;
            background: transparent;
            font-family: inherit;
            font-size: 18px;
            font-weight: 700;
            color: #260404;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .btn-keluar:hover {
            background-color: #fdf0f0;
        }

        .sidebar-footer-bar {
            background-color: #8B1A2B;
            height: 50px;
        }

        /* ==================================================
           MAIN WRAPPER
        ================================================== */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            margin-left: 260px;
        }

        /* ==================================================
           TOP NAVBAR
        ================================================== */
        .top-navbar {
            background-color: #8B1A2B;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 36px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .user-badge {
            background-color: #ffffff;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 5px 18px 5px 7px;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            background-color: #f0e8e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar svg {
            width: 20px;
            height: 20px;
            fill: #8B1A2B;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #222222;
        }

        /* ==================================================
           CONTENT
        ================================================== */
        .content-container {
            padding: 28px 44px 40px;
            flex: 1;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .breadcrumb a {
            color: #8d7a7a;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb a:hover {
            color: #554d4d;
        }

        .breadcrumb .divider {
            color: #8d7a7a;
        }

        .breadcrumb .current {
            color: #925555;
            font-weight: 600;
        }

        /* Hero / Title */
        .hero-title {
            font-size: 2.4rem;
            font-weight: 900;
            color: #252525;
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 16px;
            color: #333333;
            margin-top: 6px;
            margin-bottom: 24px;
        }

        /* ==================================================
           BIODATA CARD
        ================================================== */
        .biodata-card {
            background-color: #e8e3de;
            border-radius: 16px;
            padding: 32px;
            display: flex;
            gap: 28px;
        }

        .biodata-left {
            flex: 0 0 34%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .biodata-avatar {
            width: 180px;
            height: 180px;
            background-color: #000000;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .biodata-avatar svg {
            width: 100px;
            height: 100px;
            fill: #ffffff;
        }

        .fo-name {
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 16px;
            color: #222222;
        }

        .fo-id {
            font-size: 0.85rem;
            color: #555555;
            margin-top: 2px;
        }

        .file-input-wrap {
            margin-top: 18px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .file-input {
            font-family: inherit;
            font-size: 12px;
            padding: 6px;
            border-radius: 6px;
            background-color: #ffffff;
            border: 1px solid #d0cbc6;
            width: 100%;
            max-width: 220px;
        }

        .btn-upload {
            background-color: #8db890;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 7px 20px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 14px;
            transition: background-color 0.2s;
        }

        .btn-upload:hover {
            background-color: #7da680;
        }

        .link-kembali {
            font-size: 0.85rem;
            color: #555555;
            text-decoration: none;
            margin-top: 16px;
            transition: color 0.2s;
        }

        .link-kembali:hover {
            color: #8B1A2B;
        }

        .biodata-right {
            flex: 1;
            min-width: 0;
        }

        .info-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #666666;
            margin-bottom: 22px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 28px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field label {
            font-size: 13px;
            font-weight: 600;
            color: #444444;
        }

        .field input,
        .field select {
            background-color: #ece8e4;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-family: inherit;
            font-size: 14px;
            color: #333333;
            outline: none;
        }

        .field input[readonly] {
            cursor: default;
        }

        .composite {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .composite input {
            width: 64px;
            text-align: center;
        }

        .composite .sep {
            color: #555555;
            font-weight: 700;
        }

        .composite select {
            width: auto;
            padding: 8px 10px;
        }

        .btn-area {
            display: flex;
            justify-content: flex-end;
            margin-top: 26px;
        }

        .btn-pengajuan {
            background-color: #b5a898;
            color: #333333;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-pengajuan:hover {
            background-color: #a99a8a;
        }

        /* ==================================================
           PAGINATION
        ================================================== */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-top: 28px;
        }

        .page-num {
            font-size: 14px;
            font-weight: 500;
            color: #222222;
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .page-num:hover {
            background-color: #eeeeee;
        }

        .page-num.active {
            background-color: #252525;
            color: #ffffff;
            font-weight: 700;
            min-width: 26px;
            text-align: center;
        }

        .page-dots {
            color: #777777;
            font-size: 14px;
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main-wrapper {
                margin-left: 220px;
            }

            .content-container {
                padding: 20px;
            }

            .biodata-card {
                flex-direction: column;
                padding: 22px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

<style>/* FO sidebar icon color */
.sidebar .sidebar-icon { filter: brightness(0) saturate(100%) invert(17%) sepia(43%) saturate(2600%) hue-rotate(319deg) brightness(89%) contrast(95%) !important; }
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
</style>
<style>
/* Same profile-card layout as Edit Biodata; this page remains read-only */
.content-container { padding: 16px clamp(24px, 3vw, 44px) 20px; }
.breadcrumb { margin-bottom: 6px; }
.hero-title { color: #321e21; font-size: 2rem; }
.hero-subtitle { margin: 4px 0 16px; color: #78615e; }
.biodata-card {
    max-width: 1420px; margin: 0 auto; gap: 24px; padding: 18px; align-items: stretch;
    border: 1px solid rgba(122, 31, 46, .12); border-radius: 22px;
    background: rgba(255, 253, 250, .94); box-shadow: 0 18px 42px rgba(82, 42, 40, .10);
}
.biodata-left {
    flex: 0 0 27%; justify-content: center; padding: 20px 18px;
    border: 1px solid rgba(122, 31, 46, .09); border-radius: 17px;
    background: linear-gradient(155deg, #fbf3ee, #f4e6e1);
}
.biodata-avatar {
    width: 116px; height: 116px; border: 5px solid rgba(255,255,255,.75); border-radius: 50%;
    background: linear-gradient(145deg, #8c2939, #581923); box-shadow: 0 10px 24px rgba(94, 27, 39, .20);
}
.biodata-avatar svg { width: 58px; height: 58px; fill: #fff8f3; }
.fo-name { margin-top: 12px; color: #3f292a; font-size: 1rem; }
.fo-id { color: #8a716c; }
.file-input-wrap { margin-top: 14px; }
.file-input { max-width: 240px; border-color: #e3d2cb; border-radius: 9px; background: rgba(255,255,255,.85); }
.btn-upload { margin-top: 10px; border-radius: 10px; background: #7a1f2e; box-shadow: 0 6px 14px rgba(122,31,46,.16); }
.btn-upload:hover { background: #5c1622; }
.link-kembali { margin-top: 12px; color: #755955; }
.biodata-right { padding: 8px 10px 4px 2px; }
.info-title { margin-bottom: 15px; color: #3a2528; font-size: 1.45rem; }
.info-title::after { content: ""; display: block; width: 42px; height: 3px; margin-top: 7px; border-radius: 5px; background: #8b2637; }
.info-grid { gap: 11px 22px; }
.field { gap: 4px; }
.field label { color: #5d4846; font-size: 12px; }
.field input, .field select {
    min-height: 39px; padding: 7px 11px; border-color: #e5d8d2; border-radius: 9px;
    background: #fff; color: #382c2b;
}
.field input:focus, .field select:focus { border-color: #8b2637; box-shadow: 0 0 0 3px rgba(139,38,55,.09); }
.composite { gap: 7px; }
.composite input { min-width: 0; }
.composite select { min-height: 39px; }
.btn-area { margin-top: 15px; }
.btn-pengajuan {
    min-height: 40px; display: inline-flex; align-items: center; justify-content: center;
    padding: 9px 18px; border: 0; border-radius: 10px; background: #7a1f2e;
    color: #fff; font: 600 14px 'Poppins', sans-serif; text-decoration: none;
    box-shadow: 0 7px 16px rgba(122,31,46,.18); transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
}
.btn-pengajuan:hover { transform: translateY(-1px); background: #5c1622; box-shadow: 0 10px 20px rgba(122,31,46,.22); }
.pagination-container { display: none; }
@media (max-width: 900px) {
    .content-container { padding: 20px; }
    .biodata-card { flex-direction: column; padding: 16px; }
    .biodata-left { flex-basis: auto; }
    .biodata-right { padding: 8px 4px 4px; }
    .info-grid { grid-template-columns: 1fr; }
    .info-title { font-size: 1.35rem; }
}
@media (max-height: 800px) and (min-width: 901px) {
    .content-container { padding-top: 9px; padding-bottom: 10px; }
    .hero-title { font-size: 1.8rem; }
    .hero-subtitle { margin-bottom: 10px; }
    .biodata-card { padding: 12px 16px; }
    .biodata-left { padding: 12px; }
    .biodata-avatar { width: 94px; height: 94px; }
    .biodata-avatar svg { width: 48px; height: 48px; }
    .info-grid { gap: 7px 16px; }
    .field input, .field select, .composite select { min-height: 35px; padding-block: 5px; }
    .info-title { margin-bottom: 9px; }
    .btn-area { margin-top: 9px; }
}
</style>
</head>
<body>

    <!-- ==================================================
         SIDEBAR
    ================================================== -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-logo-box">
                <img src="../img/logo-kedua.png" alt="Warung Azzahroh" class="sidebar-logo">
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="dashbore.html" class="sidebar-link">
                        <img src="../img/icone-home.png" alt="" class="sidebar-icon"><span>Dashbore</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="katalog-semua.html" class="sidebar-link">
                        <img src="../img/icon-keranjang.png" alt="" class="sidebar-icon"><span>Katalog Produk</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="pesanan-masuk.html" class="sidebar-link">
                        <img src="../img/icon-note.png" alt="" class="sidebar-icon"><span>Pesanan Masuk</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="status-pesanan.html" class="sidebar-link">
                        <img src="../img/icon-transaksi.png" alt="" class="sidebar-icon"><span>Status Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="riwayat-transaksi.html" class="sidebar-link"><img src="../img/icon-card.png" alt="" class="sidebar-icon"><span>Riwayat Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="kelola-fo.html" class="sidebar-link"><img src="../img/icon-calender.png" alt="" class="sidebar-icon"><span>Jadwal Layanan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="biodata-saya.html" class="sidebar-link active">
                        <img src="../img/icon-biodata-saya.png" alt="" class="sidebar-icon"><span>Biodata Saya</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-bottom">
            <div class="sidebar-logout">
                <a href="login-fo.html" class="btn-keluar">
                    <img src="../img/tandapanah.png" alt="" class="sidebar-icon"><span>Keluar</span>
                </a>
            </div>
            <div class="sidebar-footer-bar"></div>
        </div>
    </aside>

    <!-- ==================================================
         MAIN
    ================================================== -->
    <div class="main-wrapper">

        <header class="top-navbar">
            <div class="user-badge">
                <div class="user-avatar">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <span class="user-name">Front Office</span>
            </div>
        </header>

        <main class="content-container">

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="dashbore.html">Dashbore</a>
                <span class="divider">&gt;</span>
                <span class="current">Biodata Saya</span>
            </div>

            <!-- Title -->
            <h1 class="hero-title">Biodata Saya</h1>
            <p class="hero-subtitle">Informasi profil dan kontak Front Office Anda.</p>

            <!-- Biodata Card -->
            <div class="biodata-card">

                <!-- Left Column -->
                <div class="biodata-left">
                    <div class="biodata-avatar">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div class="fo-name">Graycia Ana</div>
                    <div class="fo-id">ID FO : F001</div>

                    <div class="file-input-wrap">
                        <input type="file" class="file-input" id="photo">
                    </div>
                    <button type="button" class="btn-upload">Upload Photo</button>
                    <a href="dashbore.html" class="link-kembali">&larr; Kembali</a>
                </div>

                <!-- Right Column -->
                <div class="biodata-right">
                    <h2 class="info-title">Informasi Front Office</h2>

                    <div class="info-grid">
                        <div class="field">
                            <label>ID</label>
                            <input type="text" value="F001" readonly>
                        </div>
                        <div class="field">
                            <label>Alamat</label>
                            <input type="text" value="Jl. Medokan Ayu No 90, Surabaya" readonly>
                        </div>

                        <div class="field">
                            <label>Nama Lengkap</label>
                            <input type="text" value="Graycia Ana" readonly>
                        </div>
                        <div class="field">
                            <label>Hari Kerja</label>
                            <div class="composite">
                                <input type="text" value="Senin" readonly>
                                <span class="sep">-</span>
                                <input type="text" value="Rabu" readonly>
                            </div>
                        </div>

                        <div class="field">
                            <label>Tanggal Lahir</label>
                            <input type="text" value="12-05-2000" readonly>
                        </div>
                        <div class="field">
                            <label>Jam Kerja</label>
                            <div class="composite">
                                <input type="text" value="08" readonly>
                                <span class="sep">:</span>
                                <input type="text" value="00" readonly>
                                <select>
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label>Gender</label>
                            <input type="text" value="Perempuan" readonly>
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="text" value="graycia@gmail.com" readonly>
                        </div>

                        <div class="field">
                            <label>No Hp</label>
                            <input type="text" value="081339554297" readonly>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="text" value="********" readonly>
                        </div>
                    </div>

                    <div class="btn-area">
                        <a href="edit-biodata.html" class="btn-pengajuan">Pengajuan Perubahan Data</a>
                    </div>
                </div>

            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                <span class="page-num active">1</span>
                <a href="#" class="page-num">2</a>
                <a href="#" class="page-num">3</a>
                <span class="page-dots">...</span>
                <a href="#" class="page-num">67</a>
                <a href="#" class="page-num">68</a>
            </div>

        </main>

    </div>

</body>
</html>



