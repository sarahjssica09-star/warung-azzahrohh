<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Voucher - Warung Azzahroh</title>

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
           FORM TWO-CARD LAYOUT
        ================================================== */
        .form-outer-wrapper {
            background-color: #f6f5f1;
            border-radius: 20px;
            padding: 30px;
            display: flex;
            gap: 30px;
            align-items: stretch;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            position: relative;
        }

        /* Left Card: Upload Circle */
        .left-upload-col {
            width: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            padding: 10px 0;
        }

        .upload-content-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .voucher-black-circle {
            width: 175px;
            height: 175px;
            background-color: #000000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .voucher-circle-letter {
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            user-select: none;
        }

        .upload-heading {
            font-size: 26px;
            font-weight: 800;
            color: #555555;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }

        .file-upload-row {
            display: flex;
            align-items: center;
            background-color: #dbcece;
            border-radius: 50px;
            padding: 4px;
            margin-bottom: 12px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }

        .choose-file-btn {
            background-color: #443c3c;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 50px;
            cursor: pointer;
            border: none;
            user-select: none;
        }

        .file-chosen-text {
            font-size: 12px;
            color: #333333;
            padding: 0 14px;
            font-weight: 500;
        }

        .btn-upload-photo {
            background-color: #649f7e;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 28px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12);
            transition: all 0.2s;
        }

        .btn-upload-photo:hover {
            background-color: #55876a;
        }

        .btn-kembali-pill {
            align-self: flex-start;
            background-color: #b8e2f2;
            color: #111111;
            font-size: 14px;
            font-weight: 600;
            padding: 7px 22px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            margin-top: 30px;
        }

        .btn-kembali-pill:hover {
            background-color: #a2d5e7;
        }

        /* Right Card: Form Fields */
        .right-form-col {
            flex: 1;
            background-color: #e9e7e2;
            border-radius: 18px;
            padding: 28px 34px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .form-card-title {
            font-size: 38px;
            font-weight: 800;
            color: #666161;
            margin-bottom: 24px;
            letter-spacing: -0.5px;
        }

        .form-grid-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 24px;
            row-gap: 16px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 700;
            color: #333333;
        }

        .form-input {
            width: 100%;
            height: 38px;
            background-color: #f7f6f4;
            border: 1px solid #e0ddd7;
            border-radius: 8px;
            padding: 0 14px;
            font-family: inherit;
            font-size: 14px;
            color: #333333;
            outline: none;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .form-input:focus {
            border-color: #b5ada3;
            background-color: #ffffff;
        }

        /* Style select to match form-input */
        select.form-input {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 14px;
            padding-right: 32px;
            cursor: pointer;
        }

        /* Style date input to match form-input */
        input[type="date"].form-input {
            cursor: pointer;
        }

        .input-with-select {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-select-arrow {
            position: absolute;
            right: 14px;
            font-size: 12px;
            color: #444444;
            pointer-events: none;
            font-weight: 700;
        }

        .input-with-prefix {
            display: flex;
            align-items: center;
            background-color: #f7f6f4;
            border: 1px solid #e0ddd7;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .input-prefix {
            padding: 0 12px;
            font-size: 13px;
            font-weight: 600;
            color: #333333;
            border-right: 1px solid #e0ddd7;
            background-color: #f0ede8;
            height: 38px;
            display: flex;
            align-items: center;
        }

        .input-prefix-field {
            flex: 1;
            height: 38px;
            border: none;
            background: transparent;
            padding: 0 12px;
            font-family: inherit;
            font-size: 14px;
            color: #333333;
            outline: none;
        }

        /* Buttons Row at Bottom Right */
        .form-actions-row {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-form-reset {
            background-color: #ffffff;
            color: #222222;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 22px;
            border-radius: 8px;
            border: 1px solid #d8d4cd;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-form-reset:hover {
            background-color: #f0f0f0;
        }

        .btn-form-save {
            background-color: #b9ab9d;
            color: #1a1a1a;
            font-size: 14px;
            font-weight: 700;
            padding: 8px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12);
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-form-save:hover {
            background-color: #a89889;
        }

        /* Responsive */
        @media (max-width: 1050px) {
            .hero-image-box {
                display: none;
            }

            .form-outer-wrapper {
                flex-direction: column;
            }

            .left-upload-col {
                width: 100%;
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
                <a href="promosi.html">Promosi</a>
                <span class="divider">&gt;</span>
                <span class="current">Tambah Voucher</span>
            </div>

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="hero-text">
                    <h1 class="hero-title">Tambah Voucher</h1>
                    <p class="hero-subtitle">Tambahkan promo dan voucher untuk pelanggan toko</p>
                </div>
                <div class="hero-image-box">
                    <img src="../img/admin/admin-komputer.png" alt="Komputer Admin" class="hero-image">
                </div>
            </div>

            <!-- Form Two-Card Layout -->
            <form action="promosi.html" method="get" class="form-outer-wrapper">

                <!-- Left Column: Gambar Voucher Upload -->
                <div class="left-upload-col">
                    <div class="upload-content-center">
                        <div class="voucher-black-circle">
                            <span class="voucher-circle-letter">G</span>
                        </div>

                        <h3 class="upload-heading">Gambar Voucher</h3>

                        <div class="file-upload-row">
                            <button type="button" class="choose-file-btn">Choose File</button>
                            <span class="file-chosen-text">No File Chosen</span>
                        </div>

                        <button type="button" class="btn-upload-photo">Upload Photo</button>
                    </div>

                    <a href="promosi.html" class="btn-kembali-pill">
                        <span>&larr;</span> Kembali
                    </a>
                </div>

                <!-- Right Column: Voucher Belanja Form -->
                <div class="right-form-col">
                    <div>
                        <h2 class="form-card-title">Voucher Belanja</h2>

                        <div class="form-grid-2col">
                            <!-- Left Field 1: Kode Voucher -->
                            <div class="form-group">
                                <label class="form-label">Kode Voucher</label>
                                <input type="text" class="form-input">
                            </div>

                            <!-- Right Field 1: Nilai Diskon -->
                            <div class="form-group">
                                <label class="form-label">Nilai Diskon</label>
                                <input type="text" class="form-input">
                            </div>

                            <!-- Left Field 2: Jenis Diskon -->
                            <div class="form-group">
                                <label class="form-label">Jenis Diskon</label>
                                <select class="form-input" name="jenis_diskon">
                                    <option value="persen">Persentase (%)</option>
                                    <option value="nominal">Nominal (Rp)</option>
                                </select>
                            </div>

                            <!-- Right Field 2: Maksimal Diskon -->
                            <div class="form-group">
                                <label class="form-label">Maksimal Diskon</label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix">Rp</span>
                                    <input type="text" name="maksimal_diskon" class="input-prefix-field" placeholder="0">
                                </div>
                            </div>

                            <!-- Left Field 3: Minimal Belanja -->
                            <div class="form-group">
                                <label class="form-label">Minimal Belanja</label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix">Rp</span>
                                    <input type="text" name="minimal_belanja" class="input-prefix-field">
                                </div>
                            </div>

                            <!-- Right Field 3: Tanggal Berakhir -->
                            <div class="form-group">
                                <label class="form-label">Tanggal Berakhir</label>
                                <input type="date" name="tanggal_berakhir" class="form-input">
                            </div>

                            <!-- Left Field 4: Tanggal Mulai -->
                            <div class="form-group">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-input">
                            </div>

                            <!-- Right Field 4: Status -->
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="form-input" name="status">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Right Actions -->
                    <div class="form-actions-row">
                        <button type="reset" class="btn-form-reset">Atur Ulang</button>
                        <button type="submit" class="btn-form-save">Simpan</button>
                    </div>
                </div>

            </form>

        </main>

    </div>

</body>
</html>
