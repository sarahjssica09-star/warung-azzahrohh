<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Masuk - Warung Azzahroh</title>

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
            background-color: #f7f2ee;
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
            flex-wrap: wrap;
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
           TOOLBAR (SEARCH + SORT)
        ================================================== */
        .order-toolbar {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            width: 290px;
        }

        .search-input {
            width: 100%;
            height: 38px;
            border: 1.5px solid #dcdcdc;
            border-radius: 50px;
            padding: 0 38px 0 18px;
            font-family: inherit;
            font-size: 13px;
            color: #333333;
            outline: none;
            background-color: #ffffff;
            transition: border-color 0.2s;
        }

        .search-input::placeholder {
            color: #999999;
        }

        .search-input:focus {
            border-color: #7a1f2e;
        }

        .search-icon-btn {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #777777;
            display: flex;
            align-items: center;
        }

        .sort-dropdown {
            background-color: #d8d4cd;
            color: #222222;
            border: none;
            border-radius: 50px;
            padding: 9px 32px 9px 18px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 14px;
        }

        /* ==================================================
           ORDER CARD
        ================================================== */
        .order-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 16px 20px;
            display: flex;
            align-items: stretch;
            gap: 18px;
            margin-bottom: 14px;
        }

        .order-pay {
            width: 140px;
            height: 100px;
            background-color: #e8e0d8;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            padding: 6px;
        }

        .order-pay-tunai {
            background-color: #e8f4e8;
        }

        .order-pay-qris {
            background-color: #e8f0f8;
        }

        .order-pay img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .order-mid {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
            justify-content: center;
            min-width: 0;
        }

        .order-id-row {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .order-num {
            background-color: #7a1f2e;
            color: #ffffff;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            padding: 2px 10px;
        }

        .order-name {
            font-size: 15px;
            font-weight: 600;
            color: #222222;
        }

        .order-awid {
            font-size: 13px;
            color: #777777;
        }

        .order-proses-time {
            font-size: 13px;
            color: #444444;
        }

        .pay-badge {
            border-radius: 20px;
            font-size: 11px;
            padding: 3px 12px;
            font-weight: 600;
            width: fit-content;
        }

        .pay-tunai {
            background-color: #f5b8a8;
            color: #7a3b2a;
        }

        .pay-qris {
            background-color: #a8d8e8;
            color: #1f6172;
        }

        .order-total-badge {
            border: 1px solid #333333;
            border-radius: 20px;
            font-size: 12px;
            padding: 3px 14px;
            width: fit-content;
            font-weight: 600;
            color: #222222;
        }

        .order-divider {
            width: 1px;
            background-color: #e0e0e0;
            align-self: stretch;
        }

        .order-right {
            flex: 0 0 250px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            justify-content: center;
        }

        .produk-badge {
            background-color: #f5d0d0;
            color: #7a1f2e;
            border-radius: 6px;
            font-size: 11px;
            padding: 2px 10px;
            width: fit-content;
            font-weight: 600;
        }

        .order-product-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #333333;
            gap: 14px;
        }

        .order-product-row .qty {
            font-weight: 600;
            flex-shrink: 0;
        }

        .order-btn-row {
            display: flex;
            gap: 10px;
            margin-top: 6px;
        }

        .btn-proses {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            font-size: 12px;
            padding: 5px 16px;
            cursor: pointer;
            font-weight: 600;
            font-family: inherit;
            transition: opacity 0.2s;
            text-decoration: none;
        }

        .btn-proses:hover {
            opacity: 0.9;
        }

        .btn-tolak {
            background-color: #ff5252;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            font-size: 12px;
            padding: 5px 16px;
            cursor: pointer;
            font-weight: 600;
            font-family: inherit;
            transition: opacity 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-tolak:hover {
            opacity: 0.9;
        }

        .link-bukti {
            font-size: 11px;
            color: #3662c7;
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 3px;
            font-weight: 600;
            border-bottom: 0;
            display: inline-block;
            align-self: flex-start;
            width: fit-content;
            margin-top: 2px;
        }

        /* ==================================================
           PAGINATION
        ================================================== */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-top: 22px;
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
        @media (max-width: 1100px) {
            .order-right {
                flex: 0 0 200px;
            }
        }

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

            .order-card {
                flex-direction: column;
            }

            .order-divider {
                width: 100%;
                height: 1px;
            }

            .order-right {
                flex: 1 1 auto;
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
</style></head>
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
                    <a href="pesanan-masuk.html" class="sidebar-link active">
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
                    <a href="biodata-saya.html" class="sidebar-link">
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
                <span class="current">Pesanan Masuk</span>
            </div>

            <!-- Title -->
            <h1 class="hero-title">Pesanan Masuk</h1>
            <p class="hero-subtitle">Kelola data pesanan yang telah masuk</p>

            <!-- Toolbar -->
            <div class="order-toolbar">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Cari Nama Produk">
                    <button type="button" class="search-icon-btn" aria-label="Cari">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
                <select class="sort-dropdown" aria-label="Urutkan">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                </select>
            </div>

            <!-- Order Card 1 -->
            <div class="order-card">
                <div class="order-pay order-pay-tunai">
                    <img src="../img/tombol-tunai.png" alt="Pembayaran Tunai">
                </div>
                <div class="order-mid">
                    <div class="order-id-row">
                        <span class="order-num">001</span>
                        <span class="order-name">Sarah Jessica</span>
                        <span class="order-awid">(ID: AW001)</span>
                    </div>
                    <div class="order-proses-time">Proses : 20-09-2025 (18:20)</div>
                    <span class="pay-badge pay-tunai">Pembayaran Tunai</span>
                    <div class="order-total-badge">Total : Rp119.500</div>
                </div>
                <div class="order-divider"></div>
                <div class="order-right">
                    <span class="produk-badge">Produk</span>
                    <div class="order-product-row"><span>Rinso detergen bubuk 1,2 Kg</span><span class="qty">x 2</span></div>
                    <div class="order-product-row"><span>Polyex Spons Sabun</span><span class="qty">x 3</span></div>
                    <div class="order-btn-row">
                        <a href="status-pesanan.html" class="btn-proses">Proses</a>
                        <button type="button" class="btn-tolak">Tolak</button>
                    </div>
                </div>
            </div>

            <!-- Order Card 2 -->
            <div class="order-card">
                <div class="order-pay order-pay-qris">
                    <img src="../img/tombol-qris.png" alt="Pembayaran QRIS">
                </div>
                <div class="order-mid">
                    <div class="order-id-row">
                        <span class="order-num">002</span>
                        <span class="order-name">Alindra Yefta</span>
                        <span class="order-awid">(ID: AW002)</span>
                    </div>
                    <div class="order-proses-time">Proses : 20-09-2025 (18:20)</div>
                    <span class="pay-badge pay-qris">Pembayaran QRIS</span>
                    <a href="../img/fo/qris.png" target="_blank" class="link-bukti">Lihat Bukti Pembayaran</a>
                    <div class="order-total-badge">Total : Rp119.500</div>
                </div>
                <div class="order-divider"></div>
                <div class="order-right">
                    <span class="produk-badge">Produk</span>
                    <div class="order-product-row"><span>Rinso detergen bubuk 1,2 Kg</span><span class="qty">x 2</span></div>
                    <div class="order-product-row"><span>Polyex Spons Sabun</span><span class="qty">x 3</span></div>
                    <div class="order-btn-row">
                        <a href="status-pesanan.html" class="btn-proses">Proses</a>
                        <button type="button" class="btn-tolak">Tolak</button>
                    </div>
                </div>
            </div>

            <!-- Order Card 3 -->
            <div class="order-card">
                <div class="order-pay order-pay-tunai">
                    <img src="../img/tombol-tunai.png" alt="Pembayaran Tunai">
                </div>
                <div class="order-mid">
                    <div class="order-id-row">
                        <span class="order-num">001</span>
                        <span class="order-name">Sarah Jessica</span>
                        <span class="order-awid">(ID: AW003)</span>
                    </div>
                    <div class="order-proses-time">Proses : 20-09-2025 (18:20)</div>
                    <span class="pay-badge pay-tunai">Pembayaran Tunai</span>
                    <div class="order-total-badge">Total : Rp119.500</div>
                </div>
                <div class="order-divider"></div>
                <div class="order-right">
                    <span class="produk-badge">Produk</span>
                    <div class="order-product-row"><span>Rinso detergen bubuk 1,2 Kg</span><span class="qty">x 2</span></div>
                    <div class="order-product-row"><span>Polyex Spons Sabun</span><span class="qty">x 3</span></div>
                    <div class="order-btn-row">
                        <a href="status-pesanan.html" class="btn-proses">Proses</a>
                        <button type="button" class="btn-tolak">Tolak</button>
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

    <script src="api-integrasi.js" defer></script>
</body>
</html>



