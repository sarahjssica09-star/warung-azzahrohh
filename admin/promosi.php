<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Voucher - Warung Azzahroh</title>

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ==================================================
           RESET & BASIC STYLES
        ================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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
            width: 290px;
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

        .sidebar-header-box {
            background-color: #7e3b3d;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .sidebar-logo {
            max-width: 200px;
            max-height: 110px;
            object-fit: contain;
        }

        .sidebar-menu {
            list-style: none;
            padding: 24px 0 10px 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sidebar-menu-item {
            padding: 0 16px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 12px 18px;
            text-decoration: none;
            color: #260404;
            font-size: 20px;
            font-weight: 700;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            background-color: #f7f3f3;
        }

        /* Promosi AKTIF */
        .sidebar-link.active {
            background-color: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        .sidebar-icon {
            width: 32px;
            height: 32px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logout {
            padding: 0 16px 20px 16px;
        }

        .sidebar-footer-bar {
            background-color: #7e3b3d;
            height: 55px;
            width: 100%;
        }

        /* ==================================================
           MAIN CONTENT AREA
        ================================================== */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background-color: #ffffff;
            margin-left: 290px;
        }

        /* Top Bar */
        .top-navbar {
            background-color: #faedea;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 45px;
            border-bottom: 1px solid #f2dfdc;
        }

        .admin-profile-badge {
            background: linear-gradient(90deg, #5b1010 0%, #fad4d4 100%);
            border: 1px solid #e0c8c8;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            padding: 4px 20px 4px 6px;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .admin-avatar {
            width: 32px;
            height: 32px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-avatar svg {
            width: 20px;
            height: 20px;
            fill: #5b1010;
        }

        .admin-name {
            font-size: 16px;
            font-weight: 600;
            color: #1a0505;
        }

        /* Page Content */
        .content-container {
            padding: 30px 50px 40px 50px;
            flex: 1;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            margin-bottom: 12px;
        }

        .breadcrumb a {
            color: #8d7a7a;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb a:hover {
            color: #554d4d;
        }

        .breadcrumb span.divider {
            color: #8d7a7a;
        }

        .breadcrumb span.current {
            color: #925555;
            font-weight: 600;
        }

        /* Hero Section */
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-bottom: 28px;
        }

        .hero-text {
            max-width: 650px;
        }

        .hero-title {
            font-size: 54px;
            font-weight: 800;
            color: #252525;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 17px;
            font-weight: 400;
            color: #333333;
            margin-top: 8px;
        }

        .hero-image-box {
            position: absolute;
            right: 0;
            top: -20px;
            width: 260px;
            height: auto;
            pointer-events: none;
        }

        .hero-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        /* ==================================================
           ACTION BAR (SEARCH + TAMBAH + DROPDOWN)
        ================================================== */
        .action-bar-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .search-box-wrapper {
            position: relative;
            flex: 1;
            max-width: 440px;
        }

        .search-input {
            width: 100%;
            height: 42px;
            border-radius: 50px;
            border: 1px solid #d4c8c8;
            padding: 0 44px 0 20px;
            font-family: inherit;
            font-size: 14px;
            color: #444444;
            outline: none;
            background-color: #ffffff;
            transition: border-color 0.2s;
        }

        .search-input:focus {
            border-color: #a08080;
        }

        .search-icon-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666666;
        }

        .search-icon-btn svg {
            width: 18px;
            height: 18px;
            fill: #555555;
        }

        .btn-tambah-voucher {
            background-color: #dfdfdf;
            color: #222222;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.2s;
        }

        .btn-tambah-voucher:hover {
            background-color: #d2d2d2;
        }

        .status-dropdown-btn {
            background-color: #dedede;
            color: #333333;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 20px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            border: none;
            font-family: inherit;
        }

        .status-dropdown-btn svg {
            width: 14px;
            height: 14px;
            fill: #444444;
        }

        /* ==================================================
           VOUCHER TABLE
        ================================================== */
        .voucher-table-card {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .voucher-table-header {
            background-color: #9e9e9e;
            display: flex;
            align-items: center;
            padding: 16px 24px;
            font-weight: 700;
            font-size: 16px;
            color: #ffffff;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .col-v-nama { width: 22%; }
        .col-v-diskon { width: 14%; }
        .col-v-min { width: 18%; }
        .col-v-periode { width: 20%; }
        .col-v-status { width: 14%; text-align: center; }
        .col-v-aksi { width: 12%; text-align: center; }

        .voucher-table-body {
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
        }

        .voucher-table-row {
            display: flex;
            align-items: center;
            padding: 18px 24px;
            font-size: 16px;
            font-weight: 600;
            color: #222222;
            background-color: #ffffff;
            border-bottom: 1px solid #f2f2f2;
        }

        .voucher-table-row .col-v-nama {
            font-weight: 700;
            color: #1a1a1a;
        }

        /* Status Pills */
        .badge-status-v {
            display: inline-block;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 18px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
        }

        .badge-aktif {
            background-color: #ddf2db;
            color: #2a6125;
            border: 1px solid #c2e2be;
        }

        .badge-nonaktif {
            background-color: #fde2e2;
            color: #d13030;
            border: 1px solid #f9c6c6;
        }

        /* Actions: Stacked Delete and Edit buttons */
        .actions-stacked {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .btn-act-delete {
            background-color: #eb2828;
            color: #111111;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 18px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
            display: inline-block;
        }

        .btn-act-delete:hover {
            background-color: #d11e1e;
        }

        .btn-act-edit {
            background-color: #0099ff;
            color: #111111;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 22px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
            display: inline-block;
        }

        .btn-act-edit:hover {
            background-color: #0084dc;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-top: 35px;
            margin-bottom: 20px;
        }

        .page-num {
            font-size: 13px;
            font-weight: 600;
            color: #262626;
            text-decoration: none;
            padding: 3px 6px;
        }

        .page-num.active {
            background-color: #262626;
            color: #ffffff;
            border-radius: 4px;
            font-weight: 700;
            min-width: 24px;
            height: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .page-dots {
            color: #262626;
            font-size: 13px;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 1050px) {
            .hero-image-box {
                display: none;
            }
        }
    </style>
    <style>
/* Shared Admin navigation: fixed on desktop, horizontal and scrollable on small screens. */
:root {
    --admin-wine: #702431;
    --admin-wine-deep: #511923;
    --admin-cream: #faf6f1;
    --admin-ink: #342b2b;
    --admin-muted: #8b7b78;
}

body .sidebar {
    position: fixed;
    inset: 0 auto 0 0;
    width: 264px;
    height: 100vh;
    overflow-x: hidden;
    overflow-y: auto;
    background: #fffdfa;
    border-right: 1px solid #eee4df;
    box-shadow: 8px 0 28px rgba(52, 30, 27, .055);
    z-index: 1000;
    scrollbar-width: thin;
    scrollbar-color: #d8c7c0 transparent;
}

body .sidebar-header-box {
    height: 150px;
    flex-direction: column;
    gap: 8px;
    padding: 18px 20px 15px;
    background: linear-gradient(145deg, var(--admin-wine), var(--admin-wine-deep));
}

body .sidebar-header-box::after {
    content: "ADMIN PANEL";
    color: rgba(255,255,255,.72);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .16em;
}

body .sidebar-logo {
    max-width: 168px;
    max-height: 88px;
}

body .sidebar-menu {
    gap: 4px;
    padding: 22px 0 16px;
}

body .sidebar-menu::before {
    content: "MENU UTAMA";
    padding: 0 22px 9px;
    color: #a18d88;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .14em;
}

body .sidebar-menu-item,
body .sidebar-logout {
    padding-inline: 13px;
}

body .sidebar-link {
    position: relative;
    min-height: 45px;
    gap: 13px;
    padding: 10px 14px;
    border: 1px solid transparent;
    border-radius: 11px;
    color: #625350;
    font-size: 13px;
    font-weight: 600;
    transition: background-color .18s ease, color .18s ease, border-color .18s ease, transform .18s ease;
}

body .sidebar-link:hover {
    color: var(--admin-wine);
    background: #f8f0ed;
    border-color: #f1e3de;
    transform: translateX(2px);
}

body .sidebar-link.active {
    color: var(--admin-wine);
    background: #f5e9e5;
    border-color: #ead6d0;
    box-shadow: none;
}

body .sidebar-link.active::before {
    content: "";
    position: absolute;
    left: -14px;
    top: 9px;
    bottom: 9px;
    width: 3px;
    border-radius: 0 4px 4px 0;
    background: var(--admin-wine);
}

body .sidebar-icon {
    width: 22px;
    height: 22px;
    object-fit: contain;
}

body .sidebar-bottom {
    gap: 10px;
}

body .sidebar-logout {
    padding-bottom: 14px;
}

body .sidebar-logout .sidebar-link:hover {
    color: #a33d45;
    background: #fbefed;
}

body .sidebar-footer-bar {
    height: 7px;
    background: var(--admin-wine);
}

body .main-wrapper {
    min-width: 0;
    margin-left: 264px;
}

@media (max-width: 760px) {
    body .sidebar {
        position: sticky;
        inset: 0 0 auto;
        width: 100%;
        height: auto;
        overflow: visible;
        border-right: 0;
        border-bottom: 1px solid #e9ded9;
        box-shadow: 0 5px 18px rgba(52, 30, 27, .08);
    }

    body .sidebar-top {
        flex-direction: row;
        align-items: stretch;
        min-width: 0;
    }

    body .sidebar-header-box {
        flex: 0 0 126px;
        width: 126px;
        height: 68px;
        gap: 0;
        padding: 7px 10px;
    }

    body .sidebar-header-box::after { display: none; }
    body .sidebar-logo { max-width: 106px; max-height: 54px; }

    body .sidebar-menu {
        flex: 1;
        min-width: 0;
        flex-direction: row;
        align-items: center;
        gap: 3px;
        padding: 7px 8px;
        overflow-x: auto;
        overflow-y: hidden;
        scrollbar-width: thin;
    }

    body .sidebar-menu::before { display: none; }
    body .sidebar-menu-item { flex: 0 0 auto; padding: 0; }

    body .sidebar-link {
        min-height: 46px;
        gap: 7px;
        padding: 8px 10px;
        border-radius: 9px;
        font-size: 11px;
        white-space: nowrap;
    }

    body .sidebar-link:hover { transform: none; }
    body .sidebar-link.active::before { display: none; }
    body .sidebar-icon { width: 18px; height: 18px; }

    body .sidebar-bottom {
        flex: 0 0 auto;
        justify-content: center;
    }

    body .sidebar-logout { padding: 0 8px; }
    body .sidebar-logout .sidebar-link { padding-inline: 9px; }
    body .sidebar-footer-bar { display: none; }
    body .main-wrapper { margin-left: 0; }
}

@media (prefers-reduced-motion: reduce) {
    body .sidebar-link { transition: none; }
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

    <!-- ==================================================
         SIDEBAR
    ================================================== -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-header-box">
                <img src="../img/sidebar-admin/logo.png" alt="Warung Azzahroh" class="sidebar-logo">
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="dashboard.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-dashbore.png" alt="Dashbore" class="sidebar-icon">
                        <span>Dashbore</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="fo.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-fo.png" alt="Front Office" class="sidebar-icon">
                        <span>Front Office</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="pengguna.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-pengguna.png" alt="Pengguna" class="sidebar-icon">
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="katalog.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-katalog.png" alt="Katalog" class="sidebar-icon">
                        <span>Katalog</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="transaksi.html" class="sidebar-link">
                        <img src="../img/icon-transaksi.png" alt="Transaksi" class="sidebar-icon">
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="promosi.html" class="sidebar-link active">
                        <img src="../img/sidebar-admin/sidebar-promo.png" alt="Promosi" class="sidebar-icon">
                        <span>Promosi</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-bottom">
            <div class="sidebar-logout">
                <a href="login.html" class="sidebar-link">
                    <img src="../img/sidebar-admin/sidebar-keluar.png" alt="Keluar" class="sidebar-icon">
                    <span>Keluar</span>
                </a>
            </div>
            <div class="sidebar-footer-bar"></div>
        </div>
    </aside>

    <!-- ==================================================
         MAIN CONTENT
    ================================================== -->
    <div class="main-wrapper">

        <!-- Top Navigation Bar -->
        <header class="top-navbar">
            <div class="admin-profile-badge">
                <div class="admin-avatar">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <span class="admin-name">Admin</span>
            </div>
        </header>

        <!-- Main Body -->
        <main class="content-container">

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="dashboard.html">Dashboard</a>
                <span class="divider">&gt;</span>
                <span class="current">Promosi</span>
            </div>

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="hero-text">
                    <h1 class="hero-title">Kelola Voucher</h1>
                    <p class="hero-subtitle">Kelola promo dan voucher untuk pelanggan toko</p>
                </div>
                <div class="hero-image-box">
                    <img src="../img/produk.png" alt="Belanjaan Toko" class="hero-image">
                </div>
            </div>

            <!-- Action Bar: Search, + Tambah Voucher, Filter Dropdown -->
            <div class="action-bar-row">
                <div class="search-box-wrapper">
                    <input type="text" placeholder="Cari Nama Voucher" class="search-input">
                    <button type="button" class="search-icon-btn">
                        <svg viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </button>
                </div>

                <a href="tambah-voucher.html" class="btn-tambah-voucher">
                    + Tambah Voucher
                </a>

                <div class="status-dropdown-btn">
                    <span>Semua Status</span>
                    <svg viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </div>
            </div>

            <!-- Voucher Table -->
            <div class="voucher-table-card">
                <div class="voucher-table-header">
                    <span class="col-v-nama">Nama Voucher</span>
                    <span class="col-v-diskon">Diskon</span>
                    <span class="col-v-min">Min. Belanja</span>
                    <span class="col-v-periode">Periode</span>
                    <span class="col-v-status">Status</span>
                    <span class="col-v-aksi">Aksi</span>
                </div>

                <div class="voucher-table-body">
                    <!-- Row 1: WARUNGKU1 -->
                    <div class="voucher-table-row">
                        <span class="col-v-nama">WARUNGKU1</span>
                        <span class="col-v-diskon">10%</span>
                        <span class="col-v-min">Rp30.000</span>
                        <span class="col-v-periode">1 Nov - 1 Des</span>
                        <span class="col-v-status"><span class="badge-status-v badge-aktif">Aktif</span></span>
                        <span class="col-v-aksi">
                            <div class="actions-stacked">
                                <a href="#" class="btn-act-delete">Delete</a>
                                <a href="edit-voucher.html" class="btn-act-edit">Edit</a>
                            </div>
                        </span>
                    </div>

                    <!-- Row 2: GOWEEKEND -->
                    <div class="voucher-table-row">
                        <span class="col-v-nama">GOWEEKEND</span>
                        <span class="col-v-diskon">10000</span>
                        <span class="col-v-min">Rp25.000</span>
                        <span class="col-v-periode">Setiap Minggu</span>
                        <span class="col-v-status"><span class="badge-status-v badge-aktif">Aktif</span></span>
                        <span class="col-v-aksi">
                            <div class="actions-stacked">
                                <a href="#" class="btn-act-delete">Delete</a>
                                <a href="edit-voucher.html" class="btn-act-edit">Edit</a>
                            </div>
                        </span>
                    </div>

                    <!-- Row 3: HEMAT14 -->
                    <div class="voucher-table-row">
                        <span class="col-v-nama">HEMAT14</span>
                        <span class="col-v-diskon">20%</span>
                        <span class="col-v-min">Rp35.000</span>
                        <span class="col-v-periode">1 Feb - 2 Maret</span>
                        <span class="col-v-status"><span class="badge-status-v badge-nonaktif">Nonaktif</span></span>
                        <span class="col-v-aksi">
                            <div class="actions-stacked">
                                <a href="#" class="btn-act-delete">Delete</a>
                                <a href="edit-voucher.html" class="btn-act-edit">Edit</a>
                            </div>
                        </span>
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
