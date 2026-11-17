<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Warung Azzahroh</title>

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
            background-color: #f5f0ec;
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
            padding: 30px 50px 40px;
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

        .page-title {
            font-size: 2.4rem;
            font-weight: 900;
            color: #222222;
            line-height: 1.1;
        }

        .page-subtitle {
            font-size: 0.9rem;
            color: #666666;
            margin-top: 6px;
            margin-bottom: 24px;
        }

        /* ==================================================
           FILTER CARD
        ================================================== */
        .filter-card {
            background-color: #6b3535;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .filter-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }

        .filter-icon {
            width: 22px;
            height: 22px;
            fill: #ffffff;
            flex-shrink: 0;
        }

        .filter-title {
            color: #ffffff;
            font-weight: 700;
            font-size: 1rem;
        }

        .filter-row {
            display: flex;
            gap: 28px;
            align-items: flex-end;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter-group label {
            color: #f3e9d9;
            font-size: 12px;
            font-weight: 600;
        }

        .date-inputs {
            display: flex;
            gap: 8px;
        }

        .date-inputs input {
            width: 50px;
            height: 38px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #ffffff;
            text-align: center;
            font-family: inherit;
            font-size: 13px;
            color: #333333;
            outline: none;
            padding: 0 4px;
        }

        .date-inputs input.year {
            width: 70px;
        }

        .date-inputs input:focus {
            border-color: #8B1A2B;
        }

        .filter-group-search {
            flex: 1;
            min-width: 280px;
        }

        .search-input-wrap {
            position: relative;
        }

        .search-input-wrap input {
            width: 100%;
            height: 38px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #ffffff;
            padding: 0 38px 0 14px;
            font-family: inherit;
            font-size: 13px;
            color: #333333;
            outline: none;
        }

        .search-input-wrap input::placeholder {
            color: #999999;
        }

        .search-input-wrap input:focus {
            border-color: #8B1A2B;
        }

        .search-input-wrap svg {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #777777;
        }

        /* ==================================================
           ORDER CARDS
        ================================================== */
        .order-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 28px;
        }

        .order-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 20px 22px;
            display: flex;
            gap: 22px;
        }

        .order-left {
            flex-shrink: 0;
        }

        .order-method-img {
            width: 140px;
            height: 100px;
            object-fit: contain;
            background-color: #f9f4f0;
            border-radius: 10px;
            padding: 6px;
        }

        .order-right {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .order-line1 {
            display: flex;
            align-items: baseline;
            gap: 12px;
            flex-wrap: wrap;
        }

        .order-num {
            font-size: 1.2rem;
            font-weight: 800;
            color: #222222;
        }

        .order-name {
            font-size: 1.05rem;
            font-weight: 700;
            color: #222222;
        }

        .order-id {
            font-size: 0.85rem;
            font-weight: 500;
            color: #888888;
            background-color: #f0ece8;
            padding: 2px 10px;
            border-radius: 20px;
        }

        .order-proses {
            font-size: 0.85rem;
            color: #666666;
            margin-top: 6px;
        }

        .order-pay-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 10px;
        }

        .pay-badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 14px;
            border-radius: 20px;
            color: #ffffff;
        }

        .pay-qris {
            background-color: #2f8f8a;
        }

        .pay-tunai {
            background-color: #c0843e;
        }

        .link-bukti {
            color: #8B1A2B;
            font-size: 12px;
            text-decoration: underline;
            font-weight: 600;
        }

        .link-bukti:hover {
            color: #6b1421;
        }

        .order-divider {
            border-top: 1px solid #eee;
            margin: 14px 0;
        }

        .produk-badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 20px;
            background-color: #e9e3dd;
            color: #5a4a42;
            margin-bottom: 8px;
        }

        .produk-list {
            list-style: none;
            display: flex;
            flex-direction: column;
        }

        .produk-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: #333333;
            padding: 5px 0;
            border-bottom: 1px dashed #f0ece8;
        }

        .produk-list li:last-child {
            border-bottom: none;
        }

        .p-name {
            flex: 1;
            font-weight: 500;
        }

        .p-qty {
            color: #777777;
            font-size: 13px;
            min-width: 40px;
            text-align: center;
        }

        .p-sub {
            font-weight: 700;
            color: #222222;
            min-width: 90px;
            text-align: right;
        }

        .voucher-summary {
            width: min(100%, 280px);
            margin: 8px 0 0 auto;
            color: #555555;
            font-size: 12px;
        }

        .voucher-summary-row {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            padding: 3px 0;
        }

        .voucher-summary-row strong {
            color: #333333;
            font-weight: 600;
        }

        .voucher-summary-total {
            margin-top: 3px;
            padding-top: 6px;
            border-top: 1px solid #eee;
            color: #8B1A2B;
            font-weight: 800;
        }

        .voucher-summary-total strong {
            color: #8B1A2B;
            font-weight: 800;
        }

        .order-footer {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-top: 12px;
            gap: 16px;
        }

        .order-total {
            font-size: 1rem;
            font-weight: 800;
            color: #8B1A2B;
        }

        .order-status-col {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
        }

        .status-selesai {
            display: inline-block;
            background-color: #4CAF50;
            color: #ffffff;
            border-radius: 20px;
            padding: 6px 18px;
            font-size: 13px;
            font-weight: 600;
        }

        .link-detail {
            font-size: 12px;
            color: #8B1A2B;
            text-decoration: underline;
            font-weight: 600;
        }

        .link-detail:hover {
            color: #6b1421;
        }

        /* ==================================================
           PAGINATION
        ================================================== */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
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
        @media (max-width: 960px) {
            .sidebar {
                width: 220px;
            }

            .main-wrapper {
                margin-left: 220px;
            }

            .order-card {
                flex-direction: column;
            }
        }

        @media (max-width: 720px) {
            .content-container {
                padding: 24px 18px 36px;
            }

            .filter-row {
                gap: 18px;
            }

            .order-footer {
                flex-direction: column;
            }

            .order-status-col {
                align-items: flex-start;
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
                <li><a href="dashbore.html" class="sidebar-link">
                    <img src="../img/icone-home.png" alt="" class="sidebar-icon"><span>Dashbore</span>
                </a></li>
                <li><a href="katalog-semua.html" class="sidebar-link">
                    <img src="../img/icon-keranjang.png" alt="" class="sidebar-icon"><span>Katalog Produk</span>
                </a></li>
                <li><a href="pesanan-masuk.html" class="sidebar-link"><img src="../img/icon-note.png" alt="" class="sidebar-icon"><span>Pesanan Masuk</span>
                </a></li>
                <li><a href="status-pesanan.html" class="sidebar-link"><img src="../img/icon-transaksi.png" alt="" class="sidebar-icon"><span>Status Pesanan</span>
                </a></li>
                <li><a href="riwayat-transaksi.html" class="sidebar-link active">
                    <img src="../img/icon-card.png" alt="" class="sidebar-icon"><span>Riwayat Pesanan</span>
                </a></li>
                <li><a href="kelola-fo.html" class="sidebar-link"><img src="../img/icon-calender.png" alt="" class="sidebar-icon"><span>Jadwal Layanan</span>
                </a></li>
                <li><a href="biodata-saya.html" class="sidebar-link"><img src="../img/icon-biodata-saya.png" alt="" class="sidebar-icon"><span>Biodata Saya</span>
                </a></li>
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
                <span class="current">Riwayat Transaksi</span>
            </div>

            <h1 class="page-title">Riwayat Transaksi</h1>
            <p class="page-subtitle">Kelola data pesanan yang telah masuk</p>

            <!-- FILTER CARD -->
            <div class="filter-card">
                <div class="filter-header">
                    <svg class="filter-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 4h18a1 1 0 0 1 .8 1.6l-6.3 8.07V20a1 1 0 0 1-1.4.92l-3-1.5A1 1 0 0 1 11 18.5v-4.83L4.2 5.6A1 1 0 0 1 5 4z"/>
                    </svg>
                    <span class="filter-title">Filter Riwayat Pesanan</span>
                </div>

                <div class="filter-row">
                    <div class="filter-group">
                        <label>Tanggal Awal</label>
                        <div class="date-inputs">
                            <input type="text" placeholder="DD" maxlength="2">
                            <input type="text" placeholder="MM" maxlength="2">
                            <input type="text" class="year" placeholder="YYYY" maxlength="4">
                        </div>
                    </div>

                    <div class="filter-group">
                        <label>Tanggal Akhir</label>
                        <div class="date-inputs">
                            <input type="text" placeholder="DD" maxlength="2">
                            <input type="text" placeholder="MM" maxlength="2">
                            <input type="text" class="year" placeholder="YYYY" maxlength="4">
                        </div>
                    </div>

                    <div class="filter-group filter-group-search">
                        <label>Cari Pesanan</label>
                        <div class="search-input-wrap">
                            <input type="text" placeholder="ID Transaksi, Nama Produk, Status...">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ORDER LIST -->
            <div class="order-list">

                <!-- CARD 1: QRIS -->
                <div class="order-card">
                    <div class="order-left">
                        <img src="../img/tombol-qris.png" alt="QRIS" class="order-method-img">
                    </div>
                    <div class="order-right">
                        <div class="order-line1">
                            <span class="order-num">002</span>
                            <span class="order-name">Alindra Yefta</span>
                            <span class="order-id">ID AW002</span>
                        </div>
                        <div class="order-proses">Proses: 20-09-2026 (18:20)</div>
                        <div class="order-pay-row">
                            <span class="pay-badge pay-qris">Pembayaran QRIS</span>
                            <a href="../img/fo/qris.png" target="_blank" class="link-bukti">Bukti Pembayaran</a>
                        </div>

                        <div class="order-divider"></div>

                        <span class="produk-badge">Produk</span>
                        <ul class="produk-list">
                            <li><span class="p-name">Tictac Snack 90 g</span><span class="p-qty">2x</span><span class="p-sub">Rp14.200</span></li>
                            <li><span class="p-name">Vixal Lavender 700 ml</span><span class="p-qty">3x</span><span class="p-sub">Rp47.100</span></li>
                            <li><span class="p-name">Lotus Biscoff 250 g</span><span class="p-qty">2x</span><span class="p-sub">Rp58.200</span></li>
                        </ul>

                        <div class="order-footer">
                            <div class="order-total">Total : Rp119.500</div>
                            <div class="order-status-col">
                                <span class="status-selesai">Selesai</span>
                                <a href="detail-riwayat-transaksi.html" class="link-detail">Lihat Detail Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: TUNAI -->
                <div class="order-card">
                    <div class="order-left">
                        <img src="../img/tombol-tunai.png" alt="TUNAI" class="order-method-img">
                    </div>
                    <div class="order-right">
                        <div class="order-line1">
                            <span class="order-num">001</span>
                            <span class="order-name">Sarah Jessica</span>
                            <span class="order-id">ID AW003</span>
                        </div>
                        <div class="order-proses">Proses: 21-09-2026 (10:05)</div>
                        <div class="order-pay-row">
                            <span class="pay-badge pay-tunai">Pembayaran Tunai</span>
                        </div>

                        <div class="order-divider"></div>

                        <span class="produk-badge">Produk</span>
                        <ul class="produk-list">
                            <li><span class="p-name">Rinso Detergen Bubuk 1,2 Kg</span><span class="p-qty">1x</span><span class="p-sub">Rp34.100</span></li>
                            <li><span class="p-name">Polyex Spons Sabun</span><span class="p-qty">2x</span><span class="p-sub">Rp39.800</span></li>
                            <li><span class="p-name">Pringless Kaleng 102 g</span><span class="p-qty">1x</span><span class="p-sub">Rp28.800</span></li>
                        </ul>

                        <div class="voucher-summary" aria-label="Rincian voucher transaksi">
                            <div class="voucher-summary-row">
                                <span>Subtotal</span><strong>Rp102.700</strong>
                            </div>
                            <div class="voucher-summary-row">
                                <span>Voucher</span><strong>HEMAT10</strong>
                            </div>
                            <div class="voucher-summary-row">
                                <span>Diskon</span><strong>-Rp10.000</strong>
                            </div>
                            <div class="voucher-summary-row voucher-summary-total">
                                <span>Total Bayar</span><strong>Rp92.700</strong>
                            </div>
                        </div>

                        <div class="order-footer">
                            <div class="order-total">Total : Rp92.700</div>
                            <div class="order-status-col">
                                <span class="status-selesai">Selesai</span>
                                <a href="detail-riwayat-transaksi.html" class="link-detail">Lihat Detail Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- PAGINATION -->
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


