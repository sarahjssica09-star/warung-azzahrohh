<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Kebersihan - Warung Azzahroh</title>

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

        /* Hero Banner */
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-bottom: 24px;
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
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
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
            width: 300px;
            height: auto;
            pointer-events: none;
        }

        .hero-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        /* Filter Pills */
        .filter-section {
            display: flex;
            gap: 16px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .filter-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 22px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            transition: all 0.2s ease;
        }

        .filter-pill.default {
            background-color: #8e947d;
            color: #111111;
        }

        .filter-pill.secondary {
            background-color: #baa882;
            color: #111111;
        }

        /* Active highlight on Kebersihan */
        .filter-pill.active {
            background-color: #baa882;
            color: #111111;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.25), 0 2px 4px rgba(0,0,0,0.15);
            outline: 2px solid #8e947d;
        }

        .filter-pill:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.18);
        }

        .filter-icon {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }

        /* Search & Actions Bar */
        .action-bar {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            height: 38px;
            border: 1.5px solid #dcdcdc;
            border-radius: 50px;
            padding: 0 38px 0 18px;
            font-family: inherit;
            font-size: 13.5px;
            color: #333333;
            outline: none;
            background-color: #ffffff;
            transition: border-color 0.2s;
        }

        .search-input::placeholder {
            color: #999999;
        }

        .search-input:focus {
            border-color: #7e3b3d;
        }

        .search-icon-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #777777;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-add-product {
            background-color: #d8d4cd;
            color: #222222;
            border: none;
            border-radius: 50px;
            padding: 9px 20px;
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .btn-add-product:hover {
            background-color: #cb6b6b;
            color: #ffffff;
        }

        .sort-dropdown {
            background-color: #d8d4cd;
            color: #222222;
            border: none;
            border-radius: 50px;
            padding: 9px 18px;
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            padding-right: 32px;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 14px;
        }

        /* ==================================================
           PRODUCT GRID
        ================================================== */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .product-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .product-left-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .product-image-container {
            width: 140px;
            height: 100px;
            background-color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 6px;
        }

        .product-thumb {
            max-width: 90%;
            max-height: 85px;
            object-fit: contain;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 500;
            color: #583a3a;
            line-height: 1.25;
        }

        .product-price {
            font-size: 15px;
            font-weight: 800;
            color: #000000;
        }

        .product-stock-badge {
            background-color: #9baa76;
            color: #203521;
            font-size: 10px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 30px;
            width: fit-content;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            margin-top: 2px;
        }

        .product-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
            margin-left: 12px;
        }

        .btn-delete {
            background-color: #ff383c;
            color: #000000;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            text-align: center;
            min-width: 48px;
            transition: opacity 0.2s;
        }

        .btn-delete:hover {
            opacity: 0.85;
        }

        .btn-edit {
            background-color: #009dff;
            color: #000000;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            text-align: center;
            min-width: 48px;
            transition: opacity 0.2s;
        }

        .btn-edit:hover {
            opacity: 0.85;
        }

        /* ==================================================
           PAGINATION
        ================================================== */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .page-num {
            font-size: 14px;
            font-weight: 500;
            color: #222222;
            text-decoration: none;
            padding: 4px 8px;
            transition: color 0.2s;
        }

        .page-num.active {
            background-color: #252525;
            color: #ffffff;
            border-radius: 4px;
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
        @media (max-width: 1200px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .hero-image-box {
                width: 220px;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 230px;
            }

            .sidebar-link {
                font-size: 16px;
                padding: 10px 14px;
            }

            .content-container {
                padding: 20px;
            }

            .hero-image-box {
                display: none;
            }

            .hero-title {
                font-size: 40px;
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
                    <a href="katalog.html" class="sidebar-link active">
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
                    <a href="promosi.html" class="sidebar-link">
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
                <a href="katalog.html">Katalog</a>
                <span class="divider">&gt;</span>
                <span class="current">Katalog Kebersihan</span>
            </div>

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="hero-text">
                    <h1 class="hero-title">Produk</h1>
                    <p class="hero-subtitle">Kelola data produk toko, mulai dari tambah, ubah, hingga hapus produk</p>
                </div>
                <div class="hero-image-box">
                    <img src="../img/produk.png" alt="Produk Toko" class="hero-image">
                </div>
            </div>

            <!-- Category Filter Pills -->
            <div class="filter-section">
                <a href="katalog.html" class="filter-pill default">
                    Semua Produk
                </a>
                <a href="katalog-makanan.html" class="filter-pill secondary">
                    <img src="../img/makanan-ringan.png" alt="Makanan Ringan" class="filter-icon">
                    <span>Makanan Ringan</span>
                </a>
                <a href="katalog-kebersihan.html" class="filter-pill active">
                    <img src="../img/kebersihan.png" alt="Kebersihan" class="filter-icon">
                    <span>Kebersihan</span>
                </a>
            </div>

            <!-- Action & Search Bar -->
            <div class="action-bar">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Cari Nama Produk">
                    <button type="button" class="search-icon-btn" aria-label="Search">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>

                <a href="tambah-data-produk.html" class="btn-add-product">+ Tambah Produk</a>

                <select class="sort-dropdown" aria-label="Urutkan Produk">
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                    <option value="termurah">Harga Terendah</option>
                    <option value="termahal">Harga Tertinggi</option>
                </select>
            </div>

            <!-- Product Grid (6 Items: Kebersihan) -->
            <div class="product-grid">

                <!-- 1. Downy Lavender 900 ml -->
                <div class="product-card">
                    <div class="product-left-content">
                        <div class="product-image-container">
                            <img src="../img/produk/downy.png" alt="Downy Lavender 900 ml" class="product-thumb">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Downy Lavender 900 ml</h3>
                            <div class="product-price">Rp55.500</div>
                            <div class="product-stock-badge">Stok : 50</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-delete">Delete</button>
                        <a href="edit-data-produk.html" class="btn-edit">Edit</a>
                    </div>
                </div>

                <!-- 2. Rinso Detergen Bubuk 1,2 Kg -->
                <div class="product-card">
                    <div class="product-left-content">
                        <div class="product-image-container">
                            <img src="../img/produk/rinso.png" alt="Rinso Detergen Bubuk 1,2 Kg" class="product-thumb">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Rinso Detergen Bubuk 1,2 Kg</h3>
                            <div class="product-price">Rp34.100</div>
                            <div class="product-stock-badge">Stok : 50</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-delete">Delete</button>
                        <a href="edit-data-produk.html" class="btn-edit">Edit</a>
                    </div>
                </div>

                <!-- 3. Sunlight Sabun Cuci Piring Refil 660 g -->
                <div class="product-card">
                    <div class="product-left-content">
                        <div class="product-image-container">
                            <img src="../img/produk/sunlight.png" alt="Sunlight Sabun Cuci Piring Refil 660 g" class="product-thumb">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Sunlight Sabun Cuci Piring Refil 660 g</h3>
                            <div class="product-price">Rp15.700</div>
                            <div class="product-stock-badge">Stok : 50</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-delete">Delete</button>
                        <a href="edit-data-produk.html" class="btn-edit">Edit</a>
                    </div>
                </div>

                <!-- 4. Polyex Spons Sabun -->
                <div class="product-card">
                    <div class="product-left-content">
                        <div class="product-image-container">
                            <img src="../img/produk/polytex.png" alt="Polyex Spons Sabun" class="product-thumb">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Polyex Spons Sabun</h3>
                            <div class="product-price">Rp19.900</div>
                            <div class="product-stock-badge">Stok : 50</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-delete">Delete</button>
                        <a href="edit-data-produk.html" class="btn-edit">Edit</a>
                    </div>
                </div>

                <!-- 5. Vixal Lavender 700 ml -->
                <div class="product-card">
                    <div class="product-left-content">
                        <div class="product-image-container">
                            <img src="../img/produk/kispray.png" alt="Vixal Lavender 700 ml" class="product-thumb">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vixal Lavender 700 ml</h3>
                            <div class="product-price">Rp15.700</div>
                            <div class="product-stock-badge">Stok : 50</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-delete">Delete</button>
                        <a href="edit-data-produk.html" class="btn-edit">Edit</a>
                    </div>
                </div>

                <!-- 6. Kispray Fresh Blue 318 ml -->
                <div class="product-card">
                    <div class="product-left-content">
                        <div class="product-image-container">
                            <img src="../img/produk/kispray.png" alt="Kispray Fresh Blue 318 ml" class="product-thumb">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Kispray Fresh Blue 318 ml</h3>
                            <div class="product-price">Rp13.100</div>
                            <div class="product-stock-badge">Stok : 50</div>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button type="button" class="btn-delete">Delete</button>
                        <a href="edit-data-produk.html" class="btn-edit">Edit</a>
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

