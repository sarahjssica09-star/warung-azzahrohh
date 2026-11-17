<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Front Office - Warung Azzahroh</title>

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
           TOP ROW: BADGE + TOMBOL
        ================================================== */
        .top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            flex-wrap: wrap;
            gap: 14px;
        }

        .total-badge {
            background-color: #f5b8b8;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 16px;
            color: #333333;
            font-size: 15px;
        }

        .total-num {
            color: #8B1A2B;
            font-size: 1.5rem;
            font-weight: 800;
        }

        .btn-tambah-fo {
            background-color: #3bb8c3;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            padding: 10px 22px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.2s;
        }

        .btn-tambah-fo:hover {
            background-color: #33a3ad;
        }

        /* ==================================================
           SEARCH BOX
        ================================================== */
        .search-box-fo {
            position: relative;
            width: 320px;
            margin-bottom: 20px;
        }

        .search-input-fo {
            width: 100%;
            height: 38px;
            border: 1.5px solid #dddddd;
            border-radius: 20px;
            padding: 0 40px 0 18px;
            font-family: inherit;
            font-size: 13px;
            color: #333333;
            outline: none;
            background-color: #ffffff;
            transition: border-color 0.2s;
        }

        .search-input-fo::placeholder {
            color: #999999;
        }

        .search-input-fo:focus {
            border-color: #8B1A2B;
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

        /* ==================================================
           FO TABLE
        ================================================== */
        .fo-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .fo-table thead th {
            background-color: #666666;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            padding: 13px 16px;
            text-align: left;
        }

        .fo-table tbody td {
            padding: 13px 16px;
            font-size: 14px;
            color: #333333;
            border-bottom: 1px solid #eeeeee;
        }

        .fo-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .fo-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .fo-table tbody tr:last-child td {
            border-bottom: none;
        }

        .aksi-cell {
            display: flex;
            gap: 8px;
        }

        .btn-delete-fo {
            background-color: #ff3b3b;
            color: #000000;
            border: none;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 14px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-delete-fo:hover {
            opacity: 0.88;
        }

        .btn-edit-fo {
            background-color: #2196f3;
            color: #000000;
            border: none;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 14px;
            cursor: pointer;
            transition: opacity 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit-fo:hover {
            opacity: 0.88;
        }

        .btn-lihat-fo {
            background-color: #1a1a1a;
            color: #ffffff;
            border: none;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 14px;
            cursor: pointer;
            transition: opacity 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-lihat-fo:hover {
            opacity: 0.88;
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

            .fo-table {
                font-size: 12px;
            }

            .fo-table thead th,
            .fo-table tbody td {
                padding: 10px 8px;
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
/* Kartu ringkasan Total Front Office */
.total-badge {
    position: relative;
    isolation: isolate;
    min-width: 310px;
    min-height: 82px;
    gap: 14px;
    padding: 14px 18px;
    overflow: hidden;
    border: 1px solid rgba(122, 31, 46, .14);
    border-left: 5px solid #7a1f2e;
    border-radius: 18px;
    background: linear-gradient(115deg, #fffdfa 0%, #f9eeea 100%);
    box-shadow: 0 12px 28px rgba(77, 34, 35, .10), inset 0 1px 0 rgba(255,255,255,.9);
    color: #543337;
    transition: transform .2s ease, box-shadow .2s ease;
}
.total-badge::before {
    content: "";
    flex: 0 0 44px;
    width: 44px;
    height: 44px;
    border: 1px solid rgba(122, 31, 46, .10);
    border-radius: 14px;
    background-color: #f6e7e3;
    background-image:
        radial-gradient(circle at 50% 34%, #7a1f2e 0 5px, transparent 5.5px),
        radial-gradient(ellipse at 50% 96%, #7a1f2e 0 11px, transparent 11.5px);
    background-repeat: no-repeat;
}
.total-badge::after {
    content: "";
    position: absolute;
    z-index: 0;
    top: -32px;
    right: -22px;
    width: 100px;
    height: 100px;
    border: 1px solid rgba(122, 31, 46, .08);
    border-radius: 50%;
    box-shadow: 0 0 0 14px rgba(122, 31, 46, .025), 0 0 0 29px rgba(122, 31, 46, .02);
}
.total-badge span { position: relative; z-index: 1; }
.total-badge span:first-child { flex: 1; font-size: 14px; line-height: 1.35; }
.total-num {
    min-width: 44px;
    padding: 5px 12px;
    border: 1px solid rgba(122, 31, 46, .10);
    border-radius: 12px;
    background: #fff;
    color: #7a1f2e;
    font-size: 25px;
    line-height: 1.2;
    text-align: center;
    box-shadow: 0 4px 12px rgba(77, 34, 35, .08);
}
.total-badge:hover { transform: translateY(-2px); box-shadow: 0 16px 32px rgba(77, 34, 35, .14); }
@media (max-width: 520px) { .total-badge { min-width: min(100%, 310px); } }
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
                    <a href="kelola-fo.html" class="sidebar-link active">
                        <img src="../img/icon-calender.png" alt="" class="sidebar-icon"><span>Jadwal Layanan</span>
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
                <span class="current">Kelola Front Office</span>
            </div>

            <!-- Title -->
            <h1 class="hero-title">Kelola Front Office</h1>
            <p class="hero-subtitle">Kelola data pesanan yang telah masuk</p>

            <!-- Top Row: Total Badge + Tambah Pengguna -->
            <div class="top-row">
                <div class="total-badge">
                    <span>Total Front Office</span>
                    <span class="total-num">3</span>
                </div>
                <button type="button" class="btn-tambah-fo">+ Tambah Pengguna</button>
            </div>

            <!-- Search -->
            <div class="search-box-fo">
                <input type="text" class="search-input-fo" placeholder="Cari Nama Front Office">
                <button type="button" class="search-icon-btn" aria-label="Cari">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>

            <!-- FO Table -->
            <table class="fo-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Hari Kerja</th>
                        <th>Aksi</th>
                        <th>Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>F01</td>
                        <td>Graycia Ana</td>
                        <td>081339554297</td>
                        <td>Senin - Rabu</td>
                        <td>
                            <div class="aksi-cell">
                                <button type="button" class="btn-delete-fo">Delete</button>
                                <button type="button" class="btn-edit-fo">Edit</button>
                            </div>
                        </td>
                        <td><a href="biodata-saya.html" class="btn-lihat-fo">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>F01</td>
                        <td>Graycia Ana</td>
                        <td>081339554297</td>
                        <td>Senin - Rabu</td>
                        <td>
                            <div class="aksi-cell">
                                <button type="button" class="btn-delete-fo">Delete</button>
                                <button type="button" class="btn-edit-fo">Edit</button>
                            </div>
                        </td>
                        <td><a href="biodata-saya.html" class="btn-lihat-fo">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>F01</td>
                        <td>Graycia Ana</td>
                        <td>081339554297</td>
                        <td>Senin - Rabu</td>
                        <td>
                            <div class="aksi-cell">
                                <button type="button" class="btn-delete-fo">Delete</button>
                                <button type="button" class="btn-edit-fo">Edit</button>
                            </div>
                        </td>
                        <td><a href="biodata-saya.html" class="btn-lihat-fo">Lihat</a></td>
                    </tr>
                </tbody>
            </table>

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


