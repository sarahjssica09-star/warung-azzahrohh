<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Front Office - Warung Azzahroh</title>

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
            font-size: 52px;
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
           FORM CONTAINER (TWO COLUMNS)
        ================================================== */
        .form-outer-card {
            background-color: #f2eded;
            border-radius: 20px;
            display: flex;
            gap: 30px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            min-height: 520px;
        }

        /* Left Column: Photo & Profile Info */
        .form-left-col {
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .photo-upload-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .avatar-circle-box-dark {
            width: 200px;
            height: 200px;
            background-color: #0b0101;
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }

        .avatar-circle-box-dark svg {
            width: 120px;
            height: 120px;
            fill: #ffffff;
        }

        .photo-title-text {
            font-size: 22px;
            font-weight: 800;
            color: #333333;
            margin-bottom: 2px;
        }

        .photo-subtitle-text {
            font-size: 13px;
            font-weight: 600;
            color: #555555;
            text-align: center;
            margin-bottom: 18px;
        }

        .file-choose-pill {
            background: linear-gradient(90deg, #444444 0%, #444444 45%, #e8dddc 45%, #e8dddc 100%);
            border-radius: 50px;
            width: 230px;
            height: 38px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            margin-bottom: 12px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
        }

        .file-choose-pill input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .btn-choose-file-label {
            width: 45%;
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            pointer-events: none;
        }

        .file-chosen-text {
            width: 55%;
            color: #222222;
            font-size: 11px;
            text-align: center;
            pointer-events: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 6px;
        }

        .btn-upload-photo {
            background-color: #5c9979;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            padding: 7px 28px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
        }

        .btn-upload-photo:hover {
            background-color: #4b8064;
        }

        .btn-kembali-pill {
            background-color: #c1edfa;
            color: #111111;
            font-size: 15px;
            font-weight: 600;
            padding: 8px 22px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            align-self: flex-start;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            margin-top: 20px;
        }

        .btn-kembali-pill:hover {
            background-color: #aee0ee;
        }

        /* Right Column: Form Data */
        .form-right-col {
            flex: 1;
            background-color: #e4dddd;
            border-radius: 20px;
            padding: 30px 36px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .form-card-title {
            font-size: 38px;
            font-weight: 800;
            color: #554d4d;
            margin-bottom: 22px;
            letter-spacing: -0.5px;
        }

        .form-grid-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px 24px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .input-label {
            font-size: 14px;
            font-weight: 700;
            color: #222222;
        }

        .input-text {
            width: 100%;
            height: 42px;
            background-color: rgba(255, 255, 255, 0.55);
            border: 1px solid #d4c8c8;
            border-radius: 8px;
            padding: 0 14px;
            font-family: inherit;
            font-size: 14px;
            color: #222222;
            outline: none;
            transition: all 0.2s;
        }

        .input-text:focus {
            background-color: #ffffff;
            border-color: #7e3b3d;
        }

        /* Split inputs (Hari Kerja & Jam Kerja) */
        .input-split-row {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .input-split-row .input-text {
            flex: 1;
        }

        .split-divider {
            font-weight: 700;
            color: #555555;
        }

        /* Bottom Form Buttons */
        .form-bottom-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 16px;
            margin-top: 24px;
        }

        .btn-atur-ulang {
            background-color: rgba(255, 255, 255, 0.7);
            color: #111111;
            font-size: 15px;
            font-weight: 600;
            padding: 8px 24px;
            border-radius: 10px;
            border: 1px solid #dcdcdc;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .btn-atur-ulang:hover {
            background-color: #ffffff;
        }

        .btn-simpan {
            background-color: #cfb9a5;
            color: #111111;
            font-size: 15px;
            font-weight: 700;
            padding: 8px 26px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
        }

        .btn-simpan:hover {
            background-color: #c4ab94;
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 1100px) {
            .form-outer-card {
                flex-direction: column;
            }

            .form-left-col {
                width: 100%;
            }

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
                    <a href="fo.html" class="sidebar-link active">
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
                <a href="fo.html">Front Office</a>
                <span class="divider">&gt;</span>
                <span class="current">Edit Front Office</span>
            </div>

            <!-- Hero Section -->
            <div class="hero-section">
                <div class="hero-text">
                    <h1 class="hero-title">Edit Front Office</h1>
                    <p class="hero-subtitle">Perbaharui informasi akun Front Office</p>
                </div>
                <div class="hero-image-box">
                    <img src="../img/admin/admin-komputer.png" alt="Komputer Admin" class="hero-image">
                </div>
            </div>

            <!-- Form Outer Card (Two Columns) -->
            <form action="fo.html" method="POST" class="form-outer-card">

                <!-- Left Column: Photo & Profile Info -->
                <div class="form-left-col">
                    <div class="photo-upload-section">
                        <!-- Black Rounded Square Avatar -->
                        <div class="avatar-circle-box-dark">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>

                        <div class="photo-title-text">Graycia Ana</div>
                        <div class="photo-subtitle-text">ID FO : F001</div>

                        <!-- Choose File pill -->
                        <div class="file-choose-pill">
                            <input type="file" name="foto_fo" id="foto_fo">
                            <span class="btn-choose-file-label">Choose File</span>
                            <span class="file-chosen-text">No File Chosen</span>
                        </div>

                        <!-- Upload Photo button -->
                        <button type="button" class="btn-upload-photo">Upload Photo</button>
                    </div>

                    <!-- Kembali button -->
                    <a href="fo.html" class="btn-kembali-pill">
                        <span>&larr;</span> Kembali
                    </a>
                </div>

                <!-- Right Column: Form Data (10 fields in 2 columns) -->
                <div class="form-right-col">
                    <h2 class="form-card-title">Informasi Front Office</h2>

                    <div class="form-grid-2col">
                        <!-- Row 1: ID & Alamat -->
                        <div class="input-group">
                            <label class="input-label" for="id_fo">ID</label>
                            <input type="text" id="id_fo" name="id_fo" class="input-text">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="input-text">
                        </div>

                        <!-- Row 2: Nama Lengkap & Hari Kerja -->
                        <div class="input-group">
                            <label class="input-label" for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="input-text">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Hari Kerja</label>
                            <div class="input-split-row">
                                <input type="text" name="hari_kerja_dari" class="input-text">
                                <span class="split-divider">-</span>
                                <input type="text" name="hari_kerja_sampai" class="input-text">
                            </div>
                        </div>

                        <!-- Row 3: Tanggal Lahir & Jam Kerja -->
                        <div class="input-group">
                            <label class="input-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="input-text">
                        </div>
                        <div class="input-group">
                            <label class="input-label">Jam Kerja</label>
                            <div class="input-split-row">
                                <input type="text" name="jam_mulai" class="input-text">
                                <span class="split-divider">:</span>
                                <input type="text" name="jam_selesai" class="input-text">
                            </div>
                        </div>

                        <!-- Row 4: Gender & Email -->
                        <div class="input-group">
                            <label class="input-label" for="gender">Gender</label>
                            <input type="text" id="gender" name="gender" class="input-text">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="input-text">
                        </div>

                        <!-- Row 5: No HP & Password -->
                        <div class="input-group">
                            <label class="input-label" for="no_hp">No Hp</label>
                            <input type="text" id="no_hp" name="no_hp" class="input-text">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="input-text">
                        </div>
                    </div>

                    <!-- Bottom Buttons -->
                    <div class="form-bottom-actions">
                        <button type="reset" class="btn-atur-ulang">Atur Ulang</button>
                        <button type="submit" class="btn-simpan">Simpan</button>
                    </div>
                </div>

            </form>

        </main>

    </div>

</body>
</html>

