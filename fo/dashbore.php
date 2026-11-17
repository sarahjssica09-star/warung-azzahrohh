<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbore Front Office - Warung Azzahroh</title>

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
            background-color: #f7ebe6;
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
            background-color: #f5f5f5;
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
            border: 2px solid #7a1f2e;
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
            background-color: #7a1f2e;
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
            background-color: #7a1f2e;
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
            fill: #7a1f2e;
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
            padding: 36px 44px;
            flex: 1;
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 900;
            color: #222222;
            margin-bottom: 6px;
        }

        .welcome-subtitle {
            font-size: 0.88rem;
            color: #666666;
            margin-bottom: 36px;
        }

        /* ==================================================
           DASHBOARD GRID
        ================================================== */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
        }

        .dash-card {
            background-color: #ffffff;
            border: 1px solid #f0e2dc;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.2s, transform 0.15s;
        }

        .dash-card:hover {
            box-shadow: 0 12px 32px rgba(122, 31, 46, 0.18), 0 4px 12px rgba(0, 0, 0, 0.12);
            transform: translateY(-6px);
        }

        .dash-card-img {
            width: 100%;
            height: 240px;
            min-height: 240px;
            object-fit: contain;
            background-color: #f9f4f0;
            padding: 20px;
        }

        .dash-card-bar {
            display: none;
        }

        .dash-card-bar-left {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .dash-bar-icon {
            width: 28px;
            height: 28px;
            object-fit: contain;
            display: none;
            flex-shrink: 0;
        }

        .dash-bar-text span {
            display: block;
            font-size: 1rem;
            font-weight: 700;
            color: #702431;
        }

        .dash-bar-text p {
            margin-top: 3px;
            font-size: 0.78rem;
            color: #81716d;
        }

        .dash-arrow {
            width: 28px;
            height: 28px;
            display: none;
            background-color: rgba(255, 255, 255, 0.20);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .dash-arrow svg {
            width: 14px;
            height: 14px;
            fill: #ffffff;
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

            .dashboard-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                max-width: 760px;
            }
        }
        @media (max-width: 560px) {
            .content-container { padding: 26px 18px; }
            .dashboard-grid { grid-template-columns: 1fr; max-width: 440px; gap: 18px; }
            .dash-card-img { height: 220px; min-height: 220px; }
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
</style></head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-logo-box">
                <img src="../img/logo-kedua.png" alt="Warung Azzahroh" class="sidebar-logo">
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="dashbore.html" class="sidebar-link active">
                        <img src="../img/icone-home.png" alt="" class="sidebar-icon">
                        <span>Dashbore</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="katalog-semua.html" class="sidebar-link">
                        <img src="../img/icon-keranjang.png" alt="" class="sidebar-icon">
                        <span>Katalog Produk</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="pesanan-masuk.html" class="sidebar-link"><img src="../img/icon-note.png" alt="" class="sidebar-icon">
                        <span>Pesanan Masuk</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="status-pesanan.html" class="sidebar-link"><img src="../img/icon-transaksi.png" alt="" class="sidebar-icon">
                        <span>Status Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="riwayat-transaksi.html" class="sidebar-link"><img src="../img/icon-card.png" alt="" class="sidebar-icon">
                        <span>Riwayat Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="kelola-fo.html" class="sidebar-link"><img src="../img/icon-calender.png" alt="" class="sidebar-icon">
                        <span>Jadwal Layanan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="biodata-saya.html" class="sidebar-link"><img src="../img/icon-biodata-saya.png" alt="" class="sidebar-icon">
                        <span>Biodata Saya</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-bottom">
            <div class="sidebar-logout">
                <a href="login-fo.html" class="btn-keluar">
                    <img src="../img/tandapanah.png" alt="" class="sidebar-icon">
                    <span>Keluar</span>
                </a>
            </div>
            <div class="sidebar-footer-bar"></div>
        </div>
    </aside>

    <!-- MAIN -->
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
            <h1 class="welcome-title">Selamat Datang, Front Office!</h1>
            <p class="welcome-subtitle">Kelola transaksi, pesanan dan layanan toko dengan mudah</p>

            <div class="dashboard-grid">

                <!-- Katalog Produk -->
                <a href="katalog-semua.html" class="dash-card">
                    <img src="../img/fo-db-katalogproduk.png" alt="Katalog Produk" class="dash-card-img">
                    <div class="dash-card-bar">
                        <div class="dash-card-bar-left">
                            <img src="../img/icon-keranjang.png" alt="" class="dash-bar-icon">
                            <div class="dash-bar-text">
                                <span>Katalog Produk</span>
                                <p>Lihat dan pilih produk toko</p>
                            </div>
                        </div>
                        <div class="dash-arrow">
                            <svg viewBox="0 0 24 24"><path d="M8 5l8 7-8 7V5z"/></svg>
                        </div>
                    </div>
                </a>

                <!-- Pesanan Masuk -->
                <a href="pesanan-masuk.html" class="dash-card">
                    <img src="../img/fo-db-pesananmasuk.png" alt="Pesanan Masuk" class="dash-card-img">
                    <div class="dash-card-bar">
                        <div class="dash-card-bar-left">
                            <img src="../img/icon-note.png" alt="" class="dash-bar-icon">
                            <div class="dash-bar-text">
                                <span>Pesanan Masuk</span>
                                <p>Lihat dan proses pesanan pelanggan</p>
                            </div>
                        </div>
                        <div class="dash-arrow">
                            <svg viewBox="0 0 24 24"><path d="M8 5l8 7-8 7V5z"/></svg>
                        </div>
                    </div>
                </a>

                <!-- Status Pesanan -->
                <a href="status-pesanan.html" class="dash-card">
                    <img src="../img/fo-db-statuspesanan.png" alt="Status Pesanan" class="dash-card-img">
                    <div class="dash-card-bar">
                        <div class="dash-card-bar-left">
                            <img src="../img/icon-transaksi.png" alt="" class="dash-bar-icon">
                            <div class="dash-bar-text">
                                <span>Status Pesanan</span>
                                <p>Lihat status dan progres pesanan Anda</p>
                            </div>
                        </div>
                        <div class="dash-arrow">
                            <svg viewBox="0 0 24 24"><path d="M8 5l8 7-8 7V5z"/></svg>
                        </div>
                    </div>
                </a>

                <!-- Jadwal Layanan -->
                <a href="kelola-fo.html" class="dash-card">
                    <img src="../img/fo-db-jadwallayanan.png" alt="Jadwal Layanan" class="dash-card-img">
                    <div class="dash-card-bar">
                        <div class="dash-card-bar-left">
                            <img src="../img/icon-calender.png" alt="" class="dash-bar-icon">
                            <div class="dash-bar-text">
                                <span>Jadwal Layanan</span>
                                <p>Lihat jadwal operasional toko</p>
                            </div>
                        </div>
                        <div class="dash-arrow">
                            <svg viewBox="0 0 24 24"><path d="M8 5l8 7-8 7V5z"/></svg>
                        </div>
                    </div>
                </a>

                <!-- Riwayat Transaksi -->
                <a href="riwayat-transaksi.html" class="dash-card">
                    <img src="../img/fo-db-riwatartransaksi.png" alt="Riwayat Transaksi" class="dash-card-img">
                    <div class="dash-card-bar">
                        <div class="dash-card-bar-left">
                            <img src="../img/icon-card.png" alt="" class="dash-bar-icon">
                            <div class="dash-bar-text">
                                <span>Riwayat Transaksi</span>
                                <p>Lihat semua riwayat transaksi Anda</p>
                            </div>
                        </div>
                        <div class="dash-arrow">
                            <svg viewBox="0 0 24 24"><path d="M8 5l8 7-8 7V5z"/></svg>
                        </div>
                    </div>
                </a>

                <!-- Biodata Saya -->
                <a href="biodata-saya.html" class="dash-card">
                    <img src="../img/fo-db-biodatasaya.png" alt="Biodata Saya" class="dash-card-img">
                    <div class="dash-card-bar">
                        <div class="dash-card-bar-left">
                            <img src="../img/icon-biodata-saya.png" alt="" class="dash-bar-icon">
                            <div class="dash-bar-text">
                                <span>Biodata Saya</span>
                                <p>Lihat dan kelola data pribadi Anda</p>
                            </div>
                        </div>
                        <div class="dash-arrow">
                            <svg viewBox="0 0 24 24"><path d="M8 5l8 7-8 7V5z"/></svg>
                        </div>
                    </div>
                </a>

            </div>
        </main>
    </div>

</body>
</html>

