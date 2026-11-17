<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Warung Azzahroh</title>

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

        .sidebar-link.active .sidebar-icon {
            filter: brightness(0) saturate(100%) invert(17%) sepia(43%) saturate(2600%) hue-rotate(319deg) brightness(89%) contrast(95%);
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

        /* Hero */
        .hero-title {
            font-size: 52px;
            font-weight: 800;
            color: #252525;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 16px;
            color: #333333;
            margin-top: 6px;
            margin-bottom: 22px;
        }

        /* ==================================================
           FILTER PILLS
        ================================================== */
        .filter-section {
            display: flex;
            gap: 14px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-family: inherit;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.14);
            transition: transform 0.15s, box-shadow 0.15s;
        }

        .filter-pill:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.18);
        }

        .filter-pill.active {
            background-color: #8e947d;
            color: #111111;
        }

        .filter-pill.secondary {
            background-color: #baa882;
            color: #111111;
        }

        .filter-icon {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        /* ==================================================
           ACTION BAR
        ================================================== */
        .action-bar {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
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
            padding: 0 36px 0 18px;
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

        .btn-add-product {
            background-color: #d8d4cd;
            color: #222222;
            border: none;
            border-radius: 50px;
            padding: 9px 20px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.2s;
        }

        .btn-add-product:hover {
            background-color: #c0bbb3;
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
           PRODUCT GRID
        ================================================== */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 32px;
        }

        .product-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.14);
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .product-image-container {
            width: 110px;
            height: 90px;
            background-color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            padding: 6px;
        }

        .product-thumb {
            max-width: 90%;
            max-height: 80px;
            object-fit: contain;
        }

        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .product-name {
            font-size: 15px;
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
        }

        .btn-add-to-cart {
            width: 34px;
            height: 34px;
            background-color: #8B1A2B;
            border: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
            transition: background-color 0.2s;
            text-decoration: none;
            color: #fff;
        }

        .btn-add-to-cart:hover {
            background-color: #5c1622;
        }

        .btn-add-to-cart svg {
            width: 16px;
            height: 16px;
            fill: #ffffff;
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
        @media (max-width: 1100px) {
            .product-grid {
                grid-template-columns: 1fr;
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

            .hero-title {
                font-size: 36px;
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

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-logo-box">
                <img src="../img/logo-kedua.png" alt="Warung Azzahroh" class="sidebar-logo">
            </div>

            <ul class="sidebar-menu">
                <li><a href="dashbore.html" class="sidebar-link">
                    <img src="../img/icone-home.png" alt="" class="sidebar-icon"><span>Dashbore</span>
                </a></li>
                <li><a href="katalog-semua.html" class="sidebar-link active">
                    <img src="../img/icon-keranjang.png" alt="" class="sidebar-icon"><span>Katalog Produk</span>
                </a></li>
                <li><a href="pesanan-masuk.html" class="sidebar-link"><img src="../img/icon-note.png" alt="" class="sidebar-icon"><span>Pesanan Masuk</span>
                </a></li>
                <li><a href="status-pesanan.html" class="sidebar-link"><img src="../img/icon-transaksi.png" alt="" class="sidebar-icon"><span>Status Pesanan</span>
                </a></li>
                <li><a href="riwayat-transaksi.html" class="sidebar-link"><img src="../img/icon-card.png" alt="" class="sidebar-icon"><span>Riwayat Pesanan</span>
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
            <div class="breadcrumb">
                <a href="dashbore.html">Dashbore</a>
                <span class="divider">&gt;</span>
                <span class="current">Katalog Produk</span>
            </div>

            <h1 class="hero-title">Produk</h1>
            <p class="hero-subtitle">Kelola data produk toko, mulai dari tambah, ubah, hingga hapus produk</p>

            <div class="filter-section">
                <button class="filter-pill active">Semua Produk</button>
                <a href="katalog-makanan.html" class="filter-pill secondary">
                    <img src="../img/makanan-ringan.png" alt="" class="filter-icon"> Makanan Ringan
                </a>
                <a href="katalog-kebersihan.html" class="filter-pill secondary">
                    <img src="../img/kebersihan.png" alt="" class="filter-icon"> Kebersihan
                </a>
            </div>

            <div class="action-bar">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Cari Nama Produk">
                    <button type="button" class="search-icon-btn" aria-label="Cari">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
                <button class="btn-add-product" type="button">+ Tambah Produk</button>
                <select class="sort-dropdown" aria-label="Urutkan">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>Harga Terendah</option>
                    <option>Harga Tertinggi</option>
                </select>
            </div>

            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image-container">
                        <img src="../img/produk/tictac.png" alt="Tictac Snack 90g" class="product-thumb">
                    </div>
                    <div class="product-info">
                        <div class="product-name">Tictac Snack 90 g</div>
                        <div class="product-price">Rp7.100</div>
                        <div class="product-stock-badge">Stok : 50</div>
                    </div>
                    <a href="detail-transaksi.html" class="btn-add-to-cart" aria-label="Tambah ke keranjang">
                        <svg viewBox="0 0 24 24"><path d="M19 13H13v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </a>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="../img/produk/rinso.png" alt="Rinso Detergen 1,2 Kg" class="product-thumb">
                    </div>
                    <div class="product-info">
                        <div class="product-name">Rinso  Detergen Bubuk 1,2 Kg</div>
                        <div class="product-price">Rp34.100</div>
                        <div class="product-stock-badge">Stok : 50</div>
                    </div>
                    <a href="detail-transaksi.html" class="btn-add-to-cart" aria-label="Tambah ke keranjang">
                        <svg viewBox="0 0 24 24"><path d="M19 13H13v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </a>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="../img/produk/polytex.png" alt="Polyex Spons Sabun" class="product-thumb">
                    </div>
                    <div class="product-info">
                        <div class="product-name">Polyex Spons Sabun</div>
                        <div class="product-price">Rp19.900</div>
                        <div class="product-stock-badge">Stok : 50</div>
                    </div>
                    <a href="detail-transaksi.html" class="btn-add-to-cart" aria-label="Tambah ke keranjang">
                        <svg viewBox="0 0 24 24"><path d="M19 13H13v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </a>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="../img/produk/pringless.png" alt="Pringles Kaleng 102g" class="product-thumb">
                    </div>
                    <div class="product-info">
                        <div class="product-name">Pringless Kaleng 102 g</div>
                        <div class="product-price">Rp28.800</div>
                        <div class="product-stock-badge">Stok : 50</div>
                    </div>
                    <a href="detail-transaksi.html" class="btn-add-to-cart" aria-label="Tambah ke keranjang">
                        <svg viewBox="0 0 24 24"><path d="M19 13H13v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </a>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="../img/produk/kispray.png" alt="Vixal Lavender 700ml" class="product-thumb">
                    </div>
                    <div class="product-info">
                        <div class="product-name">Vixal Lavender 700 ml</div>
                        <div class="product-price">Rp15.700</div>
                        <div class="product-stock-badge">Stok : 50</div>
                    </div>
                    <a href="detail-transaksi.html" class="btn-add-to-cart" aria-label="Tambah ke keranjang">
                        <svg viewBox="0 0 24 24"><path d="M19 13H13v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </a>
                </div>

                <div class="product-card">
                    <div class="product-image-container">
                        <img src="../img/produk/biscoff.png" alt="Lotus Biscoff 250g" class="product-thumb">
                    </div>
                    <div class="product-info">
                        <div class="product-name">Lotus Biscoff 250 g</div>
                        <div class="product-price">Rp29.100</div>
                        <div class="product-stock-badge">Stok : 50</div>
                    </div>
                    <a href="detail-transaksi.html" class="btn-add-to-cart" aria-label="Tambah ke keranjang">
                        <svg viewBox="0 0 24 24"><path d="M19 13H13v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </a>
                </div>
            </div>

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

