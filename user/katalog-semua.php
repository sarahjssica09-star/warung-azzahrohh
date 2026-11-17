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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f0ebe6; color: #222; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── NAVBAR ── */
        .navbar {
            background: #7a1f2e; padding: 0 40px; height: 68px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 200;
            box-shadow: 0 2px 12px rgba(0,0,0,0.25);
        }
        .nav-logo { height: 46px; object-fit: contain; }
        .nav-center { display: flex; gap: 10px; align-items: center; }
        .nav-pill {
            border: 2px solid rgba(255,255,255,0.65); color: #fff;
            padding: 6px 20px; border-radius: 50px; text-decoration: none;
            font-size: 14px; font-weight: 600; transition: all 0.2s;
        }
        .nav-pill:hover, .nav-pill.active { background: #fff; color: #7a1f2e; }
        .nav-right { display: flex; align-items: center; gap: 18px; }
        .nav-search {
            display: flex; align-items: center; background: #fff;
            border-radius: 50px; overflow: hidden; padding: 0 4px 0 16px; height: 36px;
        }
        .nav-search input { border: none; outline: none; font-family: inherit; font-size: 13px; width: 150px; }
        .nav-search button { background: none; border: none; cursor: pointer; padding: 4px 8px; color: #666; }
        .nav-icon { color: #fff; text-decoration: none; position: relative; display: flex; align-items: center; }
        .nav-icon span {
            position: absolute; top: -5px; right: -7px;
            background: #ff4444; color: #fff; font-size: 9px; font-weight: 700;
            border-radius: 50%; width: 16px; height: 16px;
            display: flex; align-items: center; justify-content: center;
        }
        /* Profile dropdown */
        .nav-profile-wrap { position: relative; }
        .nav-profile-btn {
            background: none; border: none; cursor: pointer; padding: 4px;
            color: #fff; display: flex; align-items: center;
            border-radius: 50%; transition: background 0.15s;
        }
        .nav-profile-btn:hover { background: rgba(255,255,255,0.15); }
        .nav-dropdown {
            position: absolute; right: 0; top: calc(100% + 10px);
            background: #fff; border-radius: 12px; min-width: 170px;
            box-shadow: 0 8px 28px rgba(0,0,0,0.18); overflow: hidden;
            z-index: 300; display: none;
        }
        .nav-profile-wrap:focus-within .nav-dropdown { display: block; }
        .nav-dropdown a {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 18px; text-decoration: none;
            font-size: 14px; font-weight: 600; color: #222; transition: background 0.15s;
        }
        .nav-dropdown a:hover { background: #f5ebe8; color: #7a1f2e; }
        .nav-dropdown a svg { flex-shrink: 0; }
        .nav-dropdown-divider { height: 1px; background: #f0e8e0; }

        /* ── CONTENT ── */
        .content { flex: 1; padding: 32px 40px 20px; }
        .page-title { font-size: 2.4rem; font-weight: 900; color: #222; margin-bottom: 4px; }
        .page-sub { font-size: 14px; color: #666; margin-bottom: 20px; }

        /* FILTER TABS */
        .filter-row { display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap; align-items: center; }
        .filter-btn {
            display: flex; align-items: center; gap: 8px;
            padding: 8px 20px; border-radius: 20px; border: none;
            font-family: inherit; font-size: 14px; font-weight: 600;
            cursor: pointer; text-decoration: none;
            box-shadow: 0 2px 6px rgba(0,0,0,0.12); transition: all 0.2s;
        }
        .filter-btn img { width: 20px; height: 20px; object-fit: contain; }
        .filter-btn.all { background: #9ea08c; color: #111; }
        .filter-btn.cat { background: #c4aa80; color: #111; }
        .filter-btn.active, .filter-btn:hover { transform: translateY(-1px); box-shadow: 0 4px 10px rgba(0,0,0,0.18); }
        .select-urut {
            margin-left: auto; padding: 8px 32px 8px 16px;
            border: 1.5px solid #d0c8c0; border-radius: 20px;
            font-family: inherit; font-size: 13px; appearance: none;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24'%3E%3Cpath d='M7 10l5 5 5-5z' fill='%23555'/%3E%3C/svg%3E") no-repeat right 10px center;
            cursor: pointer; outline: none;
        }

        /* PRODUCT GRID */
        .product-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 24px; }
        .prod-card {
            background: #fff; border-radius: 12px; padding: 14px 18px;
            display: flex; align-items: center; gap: 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .prod-img-box {
            width: 90px; height: 86px; background: #f9f4f0; border-radius: 8px;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0; padding: 6px;
        }
        .prod-img-box img { max-width: 80px; max-height: 76px; object-fit: contain; }
        .prod-info { flex: 1; min-width: 0; }
        .prod-name { font-size: 13px; font-weight: 600; color: #333; margin-bottom: 3px; line-height: 1.3; }
        .prod-price { font-size: 14px; font-weight: 800; color: #7a1f2e; margin-bottom: 4px; }
        .prod-stok {
            display: inline-block; font-size: 10px; font-weight: 600;
            background: #9baa76; color: #1e3a1e; border-radius: 20px; padding: 2px 10px;
            margin-bottom: 8px;
        }
        /* Qty control */
        .qty-row {
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 8px;
        }
        .qty-ctrl {
            display: flex; align-items: center; gap: 0;
            border: 1.5px solid #d0c8c0; border-radius: 8px; overflow: hidden;
        }
        .qty-btn {
            width: 28px; height: 28px; background: #f5ebe8; border: none;
            font-size: 16px; font-weight: 700; color: #7a1f2e;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.15s; flex-shrink: 0;
        }
        .qty-btn:hover { background: #ecd8d0; }
        .qty-num {
            width: 32px; height: 28px; background: #fff;
            border: none; border-left: 1.5px solid #d0c8c0; border-right: 1.5px solid #d0c8c0;
            text-align: center; font-family: inherit; font-size: 13px; font-weight: 700;
            color: #222; outline: none;
        }
        /* Two action buttons */
        .prod-actions { display: flex; gap: 6px; }
        .btn-keranjang {
            flex: 1; text-align: center; background: #fff;
            color: #7a1f2e; border: 1.5px solid #7a1f2e; border-radius: 8px;
            padding: 6px 0; font-size: 11px; font-weight: 700;
            text-decoration: none; transition: all 0.2s;
        }
        .btn-keranjang:hover { background: #f5ebe8; }
        .btn-beli-now {
            flex: 1; text-align: center; background: #7a1f2e;
            color: #fff; border: none; border-radius: 8px;
            padding: 6px 0; font-size: 11px; font-weight: 700;
            text-decoration: none; transition: background 0.2s; cursor: pointer;
        }
        .btn-beli-now:hover { background: #5c1622; }

        /* TOTAL BELANJA BAR */
        .total-bar {
            background: #fff; border-radius: 14px; padding: 16px 24px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08); margin-bottom: 20px;
            text-decoration: none; border: 1.5px solid #f0e0d8;
            transition: box-shadow 0.2s;
        }
        .total-bar:hover { box-shadow: 0 4px 16px rgba(122,31,46,0.15); }
        .total-bar-left { display: flex; flex-direction: column; gap: 2px; }
        .total-bar-label { font-size: 12px; color: #888; font-weight: 600; }
        .total-bar-amount { font-size: 1.3rem; font-weight: 900; color: #7a1f2e; }
        .total-bar-arrow {
            width: 36px; height: 36px; background: #7a1f2e; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .total-bar-arrow svg { width: 18px; height: 18px; fill: #fff; }

        /* PAGINATION */
        .pagination { display: flex; gap: 8px; justify-content: center; margin-bottom: 32px; }
        .pagination a, .pagination span {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px; border-radius: 50%;
            font-size: 14px; color: #333; text-decoration: none; transition: background 0.15s;
        }
        .pagination a:hover { background: #e0d8d0; }
        .pagination .active { background: #7a1f2e; color: #fff; font-weight: 700; }

        /* FOOTER */
        .footer {
            background: #7a1f2e; height: 72px;
            display: flex; align-items: center; padding: 0 40px; gap: 20px;
        }
        .footer-logo { height: 48px; object-fit: contain; }
        .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,0.35); }
        .footer-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }
    </style>
<style>
/* Shared customer navigation: consistent links and CSS-only profile menu */
.navbar {
    position: sticky; top: 0; z-index: 500;
    min-height: 72px; height: auto;
    display: grid; grid-template-columns: minmax(110px,1fr) auto minmax(270px,1fr);
    align-items: center; gap: 18px;
    padding: 9px clamp(18px,3vw,42px);
    background: #7a1f2e;
    box-shadow: 0 5px 18px rgba(58,16,22,.18);
}
.navbar > a:first-child { display: inline-flex; align-items: center; width: fit-content; }
.nav-logo { width: auto; height: 46px; max-width: 150px; object-fit: contain; }
.nav-center { display: flex; align-items: center; justify-content: center; gap: 8px; min-width: 0; }
.nav-pill {
    display: inline-flex; min-height: 42px; align-items: center; justify-content: center;
    padding: 7px 17px; border: 1px solid rgba(255,255,255,.55); border-radius: 999px;
    color: #fff; font-size: 13px; font-weight: 700; line-height: 1.2; white-space: nowrap;
    text-decoration: none; transition: color .18s ease, background .18s ease, border-color .18s ease, transform .18s ease;
}
.nav-pill:hover { transform: translateY(-1px); border-color: #fff; background: rgba(255,255,255,.12); }
.nav-pill.active { border-color: #fff; background: #fff; color: #7a1f2e; }
.nav-right { display: flex; align-items: center; justify-content: flex-end; gap: 12px; min-width: 0; }
.nav-search { display: flex; align-items: center; width: min(230px,100%); min-width: 135px; height: 40px; padding: 0 7px 0 15px; overflow: hidden; border: 1px solid rgba(255,255,255,.25); border-radius: 999px; background: #fff; }
.nav-search input { width: 100%; min-width: 0; border: 0; outline: 0; background: transparent; color: #3d3030; font: 500 13px 'Poppins',sans-serif; }
.nav-search input::placeholder { color: #948b89; }
.nav-search button { display: grid; flex: 0 0 28px; width: 28px; height: 28px; place-items: center; padding: 0; border: 0; border-radius: 50%; background: transparent; color: #756967; cursor: pointer; }
.nav-search button:hover { background: #f7ece8; color: #7a1f2e; }
.nav-icon,.nav-profile-btn {
    position: relative; display: inline-flex; flex: 0 0 42px; width: 42px; height: 42px;
    align-items: center; justify-content: center; border: 1px solid transparent; border-radius: 50%;
    background: transparent; color: #fff; text-decoration: none; cursor: pointer;
    transition: background .18s ease, border-color .18s ease, transform .18s ease;
}
.nav-icon:hover,.nav-profile-btn:hover { transform: translateY(-1px); border-color: rgba(255,255,255,.22); background: rgba(255,255,255,.13); }
.nav-icon svg,.nav-profile-btn svg { width: 23px; height: 23px; }
.nav-icon > span { position: absolute; top: 0; right: -1px; display: grid; min-width: 17px; height: 17px; place-items: center; padding: 0 4px; border: 1px solid #7a1f2e; border-radius: 999px; background: #f04b4b; color: #fff; font-size: 9px; font-weight: 800; }
.nav-profile-wrap { position: relative; display: inline-flex; flex: 0 0 42px; width: 42px; height: 42px; outline: none; }
.nav-profile-wrap:focus-visible { border-radius: 50%; outline: 2px solid rgba(255,255,255,.75); outline-offset: 2px; }
.nav-dropdown { position: absolute; top: calc(100% + 10px); right: 0; z-index: 700; min-width: 190px; overflow: hidden; border: 1px solid #eee0da; border-radius: 13px; background: #fffdfa; box-shadow: 0 14px 34px rgba(42,18,20,.2); opacity: 0; pointer-events: none; transform: translateY(-5px); transition: opacity .16s ease, transform .16s ease; }
.nav-profile-wrap:hover .nav-dropdown,.nav-profile-wrap:focus-within .nav-dropdown { opacity: 1; pointer-events: auto; transform: translateY(0); }
.nav-dropdown a { display: flex; align-items: center; gap: 10px; padding: 12px 15px; color: #443335; font-size: 13px; font-weight: 600; text-decoration: none; }
.nav-dropdown a:hover { background: #f8eeea; color: #7a1f2e; }
.nav-dropdown a svg { flex: 0 0 17px; width: 17px; height: 17px; color: #7a1f2e; }
.nav-dropdown-divider { height: 1px; background: #eee2dc; }
@media (max-width: 1100px) {
    .navbar { grid-template-columns: auto minmax(0,1fr) auto; gap: 10px; padding-inline: 18px; }
    .nav-center { gap: 5px; }
    .nav-pill { min-height: 38px; padding: 6px 11px; font-size: 11px; }
    .nav-search { width: 175px; min-width: 120px; }
}
@media (max-width: 780px) {
    .navbar { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 7px 12px; padding: 8px 14px; }
    .nav-logo { height: 39px; }
    .nav-right { gap: 7px; }
    .nav-search { width: clamp(112px,32vw,190px); min-width: 0; height: 36px; padding-left: 11px; }
    .nav-search input { font-size: 11px; }
    .nav-icon,.nav-profile-wrap,.nav-profile-btn { flex-basis: 36px; width: 36px; height: 36px; }
    .nav-center { order: 3; flex: 0 0 100%; justify-content: flex-start; overflow-x: auto; padding: 2px 0 4px; scrollbar-width: thin; }
    .nav-pill { flex: 0 0 auto; min-height: 36px; padding: 6px 13px; font-size: 11px; }
}
</style></head>
<body>
    <nav class="navbar">
    <a href="dashboard.php" aria-label="Home Warung Azzahroh"><img src="../img/logo-utama.png" alt="Warung Azzahroh" class="nav-logo"></a>
    <div class="nav-center">
        <a href="dashboard.php" class="nav-pill ">Home</a>
        <a href="katalog-semua.php" class="nav-pill active">Katalog Produk</a>
        <a href="status-pesanan.php" class="nav-pill ">Status Pesanan</a>
        <a href="riwayat-pesanan.php" class="nav-pill ">Riwayat Pesanan</a>
    </div>
    <div class="nav-right">
        <div class="nav-search"><input type="text" placeholder="Cari Nama Produk" aria-label="Cari Nama Produk"><button type="button" aria-label="Cari"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button></div>
        <a href="keranjang.php" class="nav-icon" aria-label="Keranjang, 3 produk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 001.98 1.61h9.72a2 2 0 001.98-1.69l1.37-7.31H6"/></svg><span>3</span></a>
        <div class="nav-profile-wrap" tabindex="0"><button type="button" class="nav-profile-btn" tabindex="-1" aria-label="Menu profil"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></button>
            <div class="nav-dropdown"><a href="biodata.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Biodata Saya</a><a href="voucher-saya.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8Z"/><circle cx="7.5" cy="7.5" r="1"/></svg>Voucher Saya</a><div class="nav-dropdown-divider"></div><a href="login.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>Keluar</a></div>
        </div>
    </div>
</nav>

    <main class="content">
        <h1 class="page-title">Produk</h1>
        <p class="page-sub">Masukan ke keranjang sebanyak banyaknyaa</p>

        <div class="filter-row">
            <button class="filter-btn all active">Semua Produk</button>
            <a href="katalog-makanan.php" class="filter-btn cat">
                <img src="../img/makanan-ringan.png" alt=""> Makanan Ringan
            </a>
            <a href="katalog-kebersihan.php" class="filter-btn cat">
                <img src="../img/kebersihan.png" alt=""> Kebersihan
            </a>
            <select class="select-urut" aria-label="Urutkan">
                <option>Terbaru</option>
                <option>Terlama</option>
                <option>Harga Terendah</option>
                <option>Harga Tertinggi</option>
            </select>
        </div>

        <div class="product-grid">

            <div class="prod-card">
                <div class="prod-img-box"><img src="../img/produk/tanggo.png" alt="Tanggo Wafer"></div>
                <div class="prod-info">
                    <div class="prod-name">Tanggo Wafer Long 100 g</div>
                    <div class="prod-price">Rp8.500</div>
                    <span class="prod-stok">Stok : 50</span>
                    <div class="qty-row">
                        <div class="qty-ctrl">
                            <button class="qty-btn">−</button>
                            <input class="qty-num" type="number" value="1" min="1">
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                    <div class="prod-actions">
                        <a href="keranjang.php#item-tanggo" class="btn-keranjang">Keranjang</a>
                        <a href="detail-transaksi.php#beli-tanggo" class="btn-beli-now">Beli Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="prod-card">
                <div class="prod-img-box"><img src="../img/produk/biscoff.png" alt="Biscoff"></div>
                <div class="prod-info">
                    <div class="prod-name">Lotus Biscoff 250 g</div>
                    <div class="prod-price">Rp29.100</div>
                    <span class="prod-stok">Stok : 50</span>
                    <div class="qty-row">
                        <div class="qty-ctrl">
                            <button class="qty-btn">−</button>
                            <input class="qty-num" type="number" value="1" min="1">
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                    <div class="prod-actions">
                        <a href="keranjang.php#item-biscoff" class="btn-keranjang">Keranjang</a>
                        <a href="detail-transaksi.php#beli-biscoff" class="btn-beli-now">Beli Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="prod-card">
                <div class="prod-img-box"><img src="../img/produk/sariroti.png" alt="Sari Roti"></div>
                <div class="prod-info">
                    <div class="prod-name">Sari Roti Tawar 340 g</div>
                    <div class="prod-price">Rp15.500</div>
                    <span class="prod-stok">Stok : 50</span>
                    <div class="qty-row">
                        <div class="qty-ctrl">
                            <button class="qty-btn">−</button>
                            <input class="qty-num" type="number" value="1" min="1">
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                    <div class="prod-actions">
                        <a href="keranjang.php#item-sariroti" class="btn-keranjang">Keranjang</a>
                        <a href="detail-transaksi.php#beli-sariroti" class="btn-beli-now">Beli Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="prod-card">
                <div class="prod-img-box"><img src="../img/produk/silverqueen.png" alt="SilverQueen"></div>
                <div class="prod-info">
                    <div class="prod-name">SilverQueen Matcha 32 g</div>
                    <div class="prod-price">Rp28.900</div>
                    <span class="prod-stok">Stok : 50</span>
                    <div class="qty-row">
                        <div class="qty-ctrl">
                            <button class="qty-btn">−</button>
                            <input class="qty-num" type="number" value="1" min="1">
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                    <div class="prod-actions">
                        <a href="keranjang.php#item-silverqueen" class="btn-keranjang">Keranjang</a>
                        <a href="detail-transaksi.php#beli-silverqueen" class="btn-beli-now">Beli Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="prod-card">
                <div class="prod-img-box"><img src="../img/produk/pringless.png" alt="Pringles"></div>
                <div class="prod-info">
                    <div class="prod-name">Pringless Kaleng 102 g</div>
                    <div class="prod-price">Rp28.800</div>
                    <span class="prod-stok">Stok : 50</span>
                    <div class="qty-row">
                        <div class="qty-ctrl">
                            <button class="qty-btn">−</button>
                            <input class="qty-num" type="number" value="1" min="1">
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                    <div class="prod-actions">
                        <a href="keranjang.php#item-pringless" class="btn-keranjang">Keranjang</a>
                        <a href="detail-transaksi.php#beli-pringless" class="btn-beli-now">Beli Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="prod-card">
                <div class="prod-img-box"><img src="../img/produk/tictac.png" alt="Tictac"></div>
                <div class="prod-info">
                    <div class="prod-name">Tictac Snack 90 g</div>
                    <div class="prod-price">Rp7.100</div>
                    <span class="prod-stok">Stok : 50</span>
                    <div class="qty-row">
                        <div class="qty-ctrl">
                            <button class="qty-btn">−</button>
                            <input class="qty-num" type="number" value="1" min="1">
                            <button class="qty-btn">+</button>
                        </div>
                    </div>
                    <div class="prod-actions">
                        <a href="keranjang.php#item-tictac" class="btn-keranjang">Keranjang</a>
                        <a href="detail-transaksi.php#beli-tictac" class="btn-beli-now">Beli Sekarang</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- TOTAL BELANJA BAR -->
        <a href="detail-transaksi.php" class="total-bar">
            <div class="total-bar-left">
                <span class="total-bar-label">Total Belanja</span>
                <span class="total-bar-amount">Rp119.500</span>
            </div>
            <div class="total-bar-arrow">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
        </a>

        <nav class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <span>...</span>
            <a href="#">67</a>
            <a href="#">68</a>
        </nav>
    </main>

    <footer class="footer">
        <img src="../img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo">
        <div class="footer-div"></div>
        <span class="footer-tag">Belanja kebutuhan sehari-hari</span>
    </footer>
    <script src="api-integrasi.js" defer></script>
</body>
</html>
