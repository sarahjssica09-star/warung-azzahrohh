<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - Warung Azzahroh</title>

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

        /* Transaksi AKTIF */
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
           CUSTOMER INFO HEADER CARD
        ================================================== */
        .customer-info-card {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 16px 10px;
            margin-bottom: 30px;
            gap: 0;
            flex-wrap: nowrap;
        }

        .customer-left-side {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-shrink: 0;
        }

        .avatar-black-circle {
            width: 68px;
            height: 68px;
            background-color: #000000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .avatar-black-circle svg {
            width: 44px;
            height: 44px;
        }

        .customer-details {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .customer-name {
            font-size: 26px;
            font-weight: 800;
            color: #5c2b22;
            line-height: 1.1;
        }

        .customer-meta-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #333333;
            font-weight: 500;
        }

        .customer-meta-row svg {
            width: 16px;
            height: 16px;
            fill: #73362a;
            flex-shrink: 0;
        }

        .customer-email-link {
            color: #333333;
            text-decoration: underline;
        }

        .meta-divider {
            width: 1.5px;
            height: 60px;
            background-color: #333333;
            margin: 0 24px;
        }

        .transaction-meta-details {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .trx-meta-item {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 14px;
        }

        .trx-meta-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: #333333;
            width: 175px;
        }

        .trx-meta-label svg {
            width: 16px;
            height: 16px;
            fill: #73362a;
            flex-shrink: 0;
        }

        .trx-meta-val {
            font-weight: 500;
            color: #222222;
        }

        .status-badge-lg {
            background-color: #dff2db;
            color: #111111;
            font-size: 15px;
            font-weight: 600;
            padding: 6px 32px;
            border-radius: 50px;
            border: 1px solid #c8e8c2;
            display: inline-block;
            white-space: nowrap;
            flex-shrink: 0;
            margin-left: auto;
            align-self: center;
        }

        /* Metode pembayaran + link bukti inline */
        .trx-meta-val-row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .link-lihat-bukti {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background-color: #3662c7;
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 20px;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 1px 3px rgba(0,0,0,0.18);
            transition: background-color 0.2s;
        }

        .link-lihat-bukti:hover {
            background-color: #274fa8;
        }

        .link-lihat-bukti svg {
            width: 11px;
            height: 11px;
            fill: #ffffff;
            flex-shrink: 0;
        }

        /* ==================================================
           RINCIAN PRODUK SECTION
        ================================================== */
        .rincian-title {
            font-size: 36px;
            font-weight: 800;
            color: #726d6d;
            margin-bottom: 14px;
            letter-spacing: -0.5px;
        }

        .rincian-outer-box {
            background-color: #f5f4ef;
            border-radius: 14px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .rincian-item-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .item-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .item-thumb-box {
            width: 110px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-thumb-img {
            max-height: 55px;
            max-width: 100%;
            object-fit: contain;
        }

        .item-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .item-name {
            font-size: 16px;
            font-weight: 600;
            color: #222222;
        }

        .item-category {
            font-size: 11px;
            color: #888888;
        }

        .item-calc {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 15px;
            font-weight: 600;
            color: #222222;
        }

        .item-subtotal-badge {
            background-color: #b8c5a4;
            color: #1e301d;
            font-size: 13.5px;
            font-weight: 700;
            padding: 5px 22px;
            border-radius: 30px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12);
        }

        /* Bottom Row: Kembali & Total */
        .rincian-bottom-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn-kembali-pill {
            background-color: #b8e2f2;
            color: #111111;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 24px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .btn-kembali-pill:hover {
            background-color: #a4d6ea;
        }

        .total-payment-box {
            background-color: #ebe9e2;
            border-radius: 8px;
            padding: 10px 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .total-payment-label {
            font-size: 18px;
            font-weight: 700;
            color: #666666;
        }

        .total-payment-divider {
            color: #999999;
            font-size: 18px;
            font-weight: 400;
        }

        .total-payment-val {
            font-size: 24px;
            font-weight: 800;
            color: #444444;
        }

        .payment-breakdown {
            width: min(100%, 460px);
            align-self: flex-end;
            padding: 12px 18px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .payment-breakdown-title {
            margin-bottom: 6px;
            color: #666666;
            font-size: 15px;
            font-weight: 700;
        }

        .payment-breakdown-row {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            padding: 5px 0;
            color: #555555;
            font-size: 14px;
        }

        .payment-breakdown-value {
            color: #333333;
            font-weight: 600;
            text-align: right;
        }

        .payment-breakdown-separator {
            margin-top: 5px;
            border-top: 1px solid #e6e3dd;
        }

        @media (max-width: 1050px) {
            .hero-image-box {
                display: none;
            }

            .customer-info-card {
                flex-wrap: wrap;
                gap: 16px;
            }

            .meta-divider {
                display: none;
            }

            .status-badge-lg {
                margin-left: 0;
                align-self: flex-start;
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
                    <a href="transaksi.html" class="sidebar-link active">
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
                <a href="transaksi.html">Transaksi</a>
                <span class="divider">&gt;</span>
                <span class="current">Detail Transaksi</span>
            </div>

                  <!-- Customer Info Header Card -->
            <div class="customer-info-card">
                <!-- Customer Left -->
                <div class="customer-left-side">
                    <div class="avatar-black-circle">
                        <!-- Pink Outline User Icon matching screenshot -->
                        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="16" r="6" stroke="#f1c7c7" stroke-width="2.5"/>
                            <path d="M10 32C10 26.5 15.5 24 22 24C28.5 24 34 26.5 34 32" stroke="#f1c7c7" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div class="customer-details">
                        <h3 class="customer-name">Derryel Josua</h3>
                        <div class="customer-meta-row">
                            <!-- Phone Icon -->
                            <svg viewBox="0 0 24 24">
                                <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span>088798328312</span>
                        </div>
                        <div class="customer-meta-row">
                            <!-- Mail Icon -->
                            <svg viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <a href="mailto:derryll@gmail.com" class="customer-email-link">derryll@gmail.com</a>
                        </div>
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="meta-divider"></div>

                <!-- Transaction Details Middle -->
                <div class="transaction-meta-details">
                    <div class="trx-meta-item">
                        <div class="trx-meta-label">
                            <svg viewBox="0 0 24 24"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                            <span>ID Transaksi</span>
                        </div>
                        <span class="trx-meta-val">TRX001</span>
                    </div>

                    <div class="trx-meta-item">
                        <div class="trx-meta-label">
                            <svg viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 002 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z"/></svg>
                            <span>Tanggal Transaksi</span>
                        </div>
                        <span class="trx-meta-val">11 November 2026, 13.30 WIB</span>
                    </div>

                    <div class="trx-meta-item">
                        <div class="trx-meta-label">
                            <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                            <span>Metode Pembayaran</span>
                        </div>
                        <!-- QRIS: tampilkan teks + link buka bukti pembayaran di tab baru -->
                        <div class="trx-meta-val-row">
                            <span class="trx-meta-val">QRIS</span>
                            <a href="../img/fo/qris.png" target="_blank" class="link-lihat-bukti">
                                <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                Lihat Bukti Pembayaran
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Status Badge — di ujung kanan, tidak akan numpuk karena margin-left auto -->
                <span class="status-badge-lg">Selesai</span>
            </div>

            <!-- Rincian Produk Title -->
            <h2 class="rincian-title">Rincian Produk</h2>

            <!-- Rincian Outer Box -->
            <div class="rincian-outer-box">

                <!-- Product 1 -->
                <div class="rincian-item-card">
                    <div class="item-left">
                        <div class="item-thumb-box">
                            <img src="../img/produk/biscoff.png" alt="Lotus Biscoff 250 g" class="item-thumb-img">
                        </div>
                        <div class="item-info">
                            <h4 class="item-name">Lotus Biscoff 250 g</h4>
                            <span class="item-category">Kategori : Makanan Ringan</span>
                        </div>
                    </div>
                    <div class="item-calc">
                        <span>Rp29.100</span>
                        <span>X</span>
                        <span>3 Pcs</span>
                        <span class="item-subtotal-badge">Rp87.300</span>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="rincian-item-card">
                    <div class="item-left">
                        <div class="item-thumb-box">
                            <img src="../img/produk/biscoff.png" alt="Lotus Biscoff 250 g" class="item-thumb-img">
                        </div>
                        <div class="item-info">
                            <h4 class="item-name">Lotus Biscoff 250 g</h4>
                            <span class="item-category">Kategori : Makanan Ringan</span>
                        </div>
                    </div>
                    <div class="item-calc">
                        <span>Rp29.100</span>
                        <span>X</span>
                        <span>3 Pcs</span>
                        <span class="item-subtotal-badge">Rp87.300</span>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="rincian-item-card">
                    <div class="item-left">
                        <div class="item-thumb-box">
                            <img src="../img/produk/biscoff.png" alt="Lotus Biscoff 250 g" class="item-thumb-img">
                        </div>
                        <div class="item-info">
                            <h4 class="item-name">Lotus Biscoff 250 g</h4>
                            <span class="item-category">Kategori : Makanan Ringan</span>
                        </div>
                    </div>
                    <div class="item-calc">
                        <span>Rp29.100</span>
                        <span>X</span>
                        <span>3 Pcs</span>
                        <span class="item-subtotal-badge">Rp87.300</span>
                    </div>
                </div>

                <div class="payment-breakdown" aria-label="Rincian pembayaran transaksi">
                    <h3 class="payment-breakdown-title">Rincian Pembayaran</h3>
                    <div class="payment-breakdown-row">
                        <span>Subtotal</span>
                        <span class="payment-breakdown-value">Rp261.900</span>
                    </div>
                    <div class="payment-breakdown-row">
                        <span>Voucher</span>
                        <span class="payment-breakdown-value">HEMAT10</span>
                    </div>
                    <div class="payment-breakdown-row">
                        <span>Diskon</span>
                        <span class="payment-breakdown-value">-Rp10.000</span>
                    </div>
                    <div class="payment-breakdown-separator"></div>
                </div>

                <!-- Bottom Row: Kembali & Total Pembayaran -->
                <div class="rincian-bottom-row">
                    <a href="transaksi.html" class="btn-kembali-pill">
                        <span>&larr;</span> Kembali
                    </a>

                    <div class="total-payment-box">
                        <span class="total-payment-label">Total Pembayaran</span>
                        <span class="total-payment-divider">|</span>
                        <span class="total-payment-val">Rp 251.900</span>
                    </div>
                </div>

            </div>

        </main>

    </div>

</body>
</html>
