<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat Transaksi - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            display: flex;
            color: #222222;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f6eee8;
            background-image:
                radial-gradient(ellipse at 8% 12%, rgba(122, 31, 46, .10) 0, rgba(122, 31, 46, 0) 34%),
                radial-gradient(ellipse at 94% 82%, rgba(190, 139, 91, .13) 0, rgba(190, 139, 91, 0) 38%),
                repeating-linear-gradient(128deg, rgba(122, 31, 46, .025) 0, rgba(122, 31, 46, .025) 1px, transparent 1px, transparent 88px),
                linear-gradient(135deg, #faf5f0 0%, #f4e9e2 52%, #f8f0e9 100%);
            background-attachment: fixed;
        }
        .sidebar {
            position: fixed; inset: 0 auto 0 0; z-index: 10;
            width: 260px; height: 100vh; overflow-y: auto;
            display: flex; flex-direction: column; justify-content: space-between;
            background: #ffffff; border-right: 1px solid #f0f0f0;
        }
        .sidebar-logo-box { padding: 28px 20px 18px; display: flex; justify-content: center; }
        .sidebar-logo { width: 120px; object-fit: contain; }
        .sidebar-menu { list-style: none; padding: 0 10px 10px; display: flex; flex-direction: column; gap: 4px; }
        .sidebar-link {
            display: flex; align-items: center; gap: 14px; padding: 11px 16px;
            color: #260404; font-size: 18px; font-weight: 700; text-decoration: none;
            border-radius: 8px; transition: background-color .2s;
        }
        .sidebar-link:hover { background-color: #f7f3f3; }
        .sidebar-link.active { background-color: #f5f5f5; box-shadow: 0 2px 5px rgba(0,0,0,.08); }
        .sidebar-icon { width: 28px; height: 28px; object-fit: contain; flex-shrink: 0; filter: brightness(0) saturate(100%) invert(17%) sepia(43%) saturate(2600%) hue-rotate(319deg) brightness(89%) contrast(95%); }
        .sidebar-logout { padding: 0 10px 16px; }
        .btn-keluar {
            display: flex; align-items: center; gap: 14px; padding: 11px 16px;
            color: #260404; font-size: 18px; font-weight: 700; text-decoration: none;
            border: 2px solid #8b1a2b; border-radius: 8px;
        }
        .sidebar-footer-bar { height: 64px; background: #8b1a2b; }
        .main-wrapper { width: calc(100% - 260px); min-height: 100vh; margin-left: 260px; }
        .top-navbar {
            position: sticky; top: 0; z-index: 5; height: 68px; padding: 0 36px;
            display: flex; align-items: center; justify-content: flex-end;
            background: #8b1a2b;
        }
        .user-badge { display: inline-flex; align-items: center; gap: 10px; padding: 5px 18px 5px 7px; border-radius: 50px; background: #ffffff; }
        .user-avatar { width: 34px; height: 34px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #f0e8e0; }
        .user-avatar svg { width: 20px; height: 20px; fill: #7a1f2e; }
        .user-name { color: #222222; font-size: 14px; font-weight: 600; }
        .content-container { max-width: 1120px; margin: 0 auto; padding: 36px 44px 60px; }
        .breadcrumb { display: flex; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 14px; font-size: 14px; }
        .breadcrumb a { color: #777777; text-decoration: none; }
        .breadcrumb a:hover, .breadcrumb .current { color: #8b1a2b; font-weight: 600; }
        .breadcrumb .divider { color: #999999; }
        .page-title { color: #222222; font-size: 2.2rem; font-weight: 900; line-height: 1.15; }
        .page-subtitle { margin-top: 5px; margin-bottom: 24px; color: #666666; font-size: 14px; }
        .detail-card {
            overflow: hidden; padding: 26px 28px; border: 1px solid #eaded7;
            border-radius: 12px; background: #ffffff; box-shadow: 0 2px 10px rgba(0,0,0,.08);
        }
        .section-title { margin-bottom: 14px; color: #333333; font-size: 16px; font-weight: 800; }
        .transaction-info { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        .info-item { padding: 13px 15px; border-radius: 8px; background: #f9f4f0; }
        .info-label { display: block; margin-bottom: 4px; color: #777777; font-size: 12px; }
        .info-value { color: #333333; font-size: 14px; font-weight: 700; }
        .status-done { color: #357a43; }
        .section-divider { margin: 22px 0; border: 0; border-top: 1px solid #eee5df; }
        .product-table { width: 100%; border-collapse: collapse; overflow: hidden; border-radius: 8px; }
        .product-table th { padding: 12px 14px; color: #444444; background: #f0ece8; text-align: left; font-size: 13px; font-weight: 700; }
        .product-table td { padding: 13px 14px; border-bottom: 1px solid #f0ece8; color: #333333; font-size: 14px; }
        .product-table tbody tr:last-child td { border-bottom: 0; }
        .num, .qty { text-align: center !important; }
        .money { text-align: right !important; white-space: nowrap; }
        .payment-summary { max-width: 460px; margin-left: auto; font-size: 14px; }
        .summary-row { display: flex; justify-content: space-between; gap: 20px; padding: 6px 0; color: #555555; }
        .summary-value { color: #333333; font-weight: 600; text-align: right; }
        .summary-total { margin-top: 7px; padding: 10px 14px; border-radius: 6px; background: #f5b8b8; color: #222222; font-weight: 800; }
        .summary-total .summary-value { color: #222222; font-weight: 800; }
        .payment-method { display: flex; align-items: center; gap: 12px; color: #333333; font-size: 14px; }
        .method-badge { display: inline-block; padding: 5px 14px; border-radius: 20px; background: #c0843e; color: #ffffff; font-size: 12px; font-weight: 600; }
        .detail-actions { display: flex; justify-content: flex-end; margin-top: 22px; }
        .btn-back {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 20px; border-radius: 8px; background: #8b1a2b;
            color: #ffffff; font-size: 14px; font-weight: 700; text-decoration: none;
            transition: background-color .2s;
        }
        .btn-back:hover { background: #6f1624; }
        @media (max-width: 960px) {
            .sidebar { width: 220px; }
            .main-wrapper { width: calc(100% - 220px); margin-left: 220px; }
            .content-container { padding: 30px 24px 48px; }
        }
        @media (max-width: 680px) {
            .sidebar { position: static; width: 100%; height: auto; }
            body { display: block; }
            .sidebar-menu { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .sidebar-link, .btn-keluar { font-size: 14px; }
            .main-wrapper { width: 100%; margin-left: 0; }
            .top-navbar { height: 58px; padding: 0 18px; }
            .content-container { padding: 24px 16px 36px; }
            .page-title { font-size: 1.8rem; }
            .transaction-info { grid-template-columns: 1fr; gap: 10px; }
            .detail-card { padding: 20px 16px; }
            .product-table th, .product-table td { padding: 10px 7px; font-size: 12px; }
            .payment-summary { max-width: none; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div>
            <div class="sidebar-logo-box"><img src="../img/logo-kedua.png" alt="Warung Azzahroh" class="sidebar-logo"></div>
            <ul class="sidebar-menu">
                <li><a href="dashbore.html" class="sidebar-link"><img src="../img/icone-home.png" alt="" class="sidebar-icon"><span>Dashbore</span></a></li>
                <li><a href="katalog-semua.html" class="sidebar-link"><img src="../img/icon-keranjang.png" alt="" class="sidebar-icon"><span>Katalog Produk</span></a></li>
                <li><a href="pesanan-masuk.html" class="sidebar-link"><img src="../img/icon-note.png" alt="" class="sidebar-icon"><span>Pesanan Masuk</span></a></li>
                <li><a href="status-pesanan.html" class="sidebar-link"><img src="../img/icon-transaksi.png" alt="" class="sidebar-icon"><span>Status Pesanan</span></a></li>
                <li><a href="riwayat-transaksi.html" class="sidebar-link active"><img src="../img/icon-card.png" alt="" class="sidebar-icon"><span>Riwayat Pesanan</span></a></li>
                <li><a href="kelola-fo.html" class="sidebar-link"><img src="../img/icon-calender.png" alt="" class="sidebar-icon"><span>Jadwal Layanan</span></a></li>
                <li><a href="biodata-saya.html" class="sidebar-link"><img src="../img/icon-biodata-saya.png" alt="" class="sidebar-icon"><span>Biodata Saya</span></a></li>
            </ul>
        </div>
        <div>
            <div class="sidebar-logout"><a href="login-fo.html" class="btn-keluar"><img src="../img/tandapanah.png" alt="" class="sidebar-icon"><span>Keluar</span></a></div>
            <div class="sidebar-footer-bar"></div>
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="top-navbar">
            <div class="user-badge">
                <div class="user-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></div>
                <span class="user-name">Front Office</span>
            </div>
        </header>

        <main class="content-container">
            <div class="breadcrumb">
                <a href="dashbore.html">Dashbore</a><span class="divider">&gt;</span>
                <a href="riwayat-transaksi.html">Riwayat Transaksi</a><span class="divider">&gt;</span>
                <span class="current">Detail Transaksi</span>
            </div>
            <h1 class="page-title">Detail Transaksi</h1>
            <p class="page-subtitle">Rincian arsip transaksi yang telah selesai</p>

            <section class="detail-card" aria-labelledby="transaction-heading">
                <h2 id="transaction-heading" class="section-title">Informasi Transaksi</h2>
                <div class="transaction-info">
                    <div class="info-item"><span class="info-label">Nomor Transaksi</span><span class="info-value">TRX0001</span></div>
                    <div class="info-item"><span class="info-label">Tanggal Transaksi</span><span class="info-value">21 Sep 2026, 10:05</span></div>
                    <div class="info-item"><span class="info-label">Status Transaksi</span><span class="info-value status-done">Selesai</span></div>
                </div>

                <hr class="section-divider">
                <h2 class="section-title">Daftar Produk</h2>
                <table class="product-table">
                    <thead><tr><th class="num">No.</th><th>Nama Produk</th><th class="qty">Qty</th><th class="money">Harga Satuan</th><th class="money">Subtotal Produk</th></tr></thead>
                    <tbody>
                        <tr><td class="num">1</td><td>Rinso Detergen Bubuk 1,2 Kg</td><td class="qty">1</td><td class="money">Rp34.100</td><td class="money">Rp34.100</td></tr>
                        <tr><td class="num">2</td><td>Polyex Spons Sabun</td><td class="qty">2</td><td class="money">Rp19.900</td><td class="money">Rp39.800</td></tr>
                        <tr><td class="num">3</td><td>Pringless Kaleng 102 g</td><td class="qty">1</td><td class="money">Rp28.800</td><td class="money">Rp28.800</td></tr>
                    </tbody>
                </table>

                <hr class="section-divider">
                <h2 class="section-title">Rincian Pembayaran</h2>
                <div class="payment-summary">
                    <div class="summary-row"><span>Subtotal</span><span class="summary-value">Rp102.700</span></div>
                    <div class="summary-row"><span>Voucher</span><span class="summary-value">HEMAT10</span></div>
                    <div class="summary-row"><span>Diskon</span><span class="summary-value">-Rp10.000</span></div>
                    <div class="summary-row summary-total"><span>Total Bayar</span><span class="summary-value">Rp92.700</span></div>
                </div>

                <hr class="section-divider">
                <h2 class="section-title">Metode Pembayaran</h2>
                <div class="payment-method"><span class="method-badge">Tunai</span></div>
            </section>

            <div class="detail-actions"><a href="riwayat-transaksi.html" class="btn-back">Kembali ke Riwayat Transaksi</a></div>
        </main>
    </div>
    <script src="api-integrasi.js" defer></script>
</body>
</html>
