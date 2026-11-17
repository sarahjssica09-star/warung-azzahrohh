<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { min-height: 100vh; display: flex; flex-direction: column; font-family: 'Poppins', sans-serif; color: #222; }
        .navbar { position: sticky; top: 0; z-index: 500; min-height: 72px; height: auto; display: grid; grid-template-columns: minmax(110px,1fr) auto minmax(270px,1fr); align-items: center; gap: 18px; padding: 9px clamp(18px,3vw,42px); background: #7a1f2e; box-shadow: 0 5px 18px rgba(58,16,22,.18); }
        .navbar > a:first-child { display: inline-flex; align-items: center; width: fit-content; }
        .nav-logo { width: auto; height: 46px; max-width: 150px; object-fit: contain; }
        .nav-center { display: flex; align-items: center; justify-content: center; gap: 8px; min-width: 0; }
        .nav-pill { display: inline-flex; min-height: 42px; align-items: center; justify-content: center; padding: 7px 17px; border: 1px solid rgba(255,255,255,.55); border-radius: 999px; color: #fff; font-size: 13px; font-weight: 700; line-height: 1.2; white-space: nowrap; text-decoration: none; }
        .nav-pill:hover, .nav-pill.active { background: #fff; color: #7a1f2e; }
        .nav-right { display: flex; align-items: center; justify-content: flex-end; gap: 12px; min-width: 0; }
        .nav-search { display: flex; align-items: center; width: min(230px,100%); min-width: 135px; height: 40px; padding: 0 7px 0 15px; overflow: hidden; border: 1px solid rgba(255,255,255,.25); border-radius: 999px; background: #fff; }
        .nav-search input { width: 100%; min-width: 0; border: 0; outline: 0; background: transparent; font: 500 13px 'Poppins',sans-serif; }
        .nav-search button { display: grid; flex: 0 0 28px; width: 28px; height: 28px; place-items: center; border: 0; background: transparent; color: #756967; }
        .nav-icon,.nav-profile-btn { position: relative; display: inline-flex; flex: 0 0 42px; width: 42px; height: 42px; align-items: center; justify-content: center; border: 1px solid transparent; border-radius: 50%; background: transparent; color: #fff; text-decoration: none; }
        .nav-icon svg,.nav-profile-btn svg { width: 23px; height: 23px; }
        .nav-icon > span { position: absolute; top: 0; right: -1px; display: grid; min-width: 17px; height: 17px; place-items: center; padding: 0 4px; border: 1px solid #7a1f2e; border-radius: 999px; background: #f04b4b; color: #fff; font-size: 9px; font-weight: 800; }
        .nav-profile-wrap { position: relative; display: inline-flex; flex: 0 0 42px; width: 42px; height: 42px; }
        .nav-profile-btn { cursor: pointer; }
        .nav-dropdown { position: absolute; top: calc(100% + 10px); right: 0; z-index: 700; min-width: 190px; overflow: hidden; border: 1px solid #eee0da; border-radius: 13px; background: #fffdfa; box-shadow: 0 14px 34px rgba(42,18,20,.2); opacity: 0; pointer-events: none; transform: translateY(-5px); transition: .16s; }
        .nav-profile-wrap:hover .nav-dropdown,.nav-profile-wrap:focus-within .nav-dropdown { opacity: 1; pointer-events: auto; transform: translateY(0); }
        .nav-dropdown a { display: flex; align-items: center; gap: 10px; padding: 12px 15px; color: #443335; font-size: 13px; font-weight: 600; text-decoration: none; }
        .nav-dropdown a:hover { background: #f8eeea; color: #7a1f2e; }
        .nav-dropdown a svg { width: 17px; height: 17px; color: #7a1f2e; }
        .nav-dropdown-divider { height: 1px; background: #eee2dc; }
        .page-wrapper { position: relative; flex: 1; padding: 36px 48px 48px; background: url('../img/backgroundall.png') center/cover no-repeat; }
        .page-wrapper::before { content: ''; position: absolute; inset: 0; background: rgba(240,230,225,.82); }
        .content-inner { position: relative; z-index: 1; max-width: 980px; margin: 0 auto; }
        .page-title { margin-bottom: 4px; color: #222; font-size: 2.4rem; font-weight: 900; }
        .page-sub { margin-bottom: 24px; color: #555; font-size: 14px; }
        .section-label { display: inline-block; margin-bottom: 16px; padding: 6px 20px; border: 2px solid #333; border-radius: 8px; font-size: 1.1rem; font-weight: 800; }
        .cart-table { width: 100%; border-collapse: collapse; overflow: hidden; border-radius: 12px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
        .cart-table thead tr { background: #ccc8c2; }
        .cart-table th { padding: 12px 16px; color: #333; font-size: 14px; font-weight: 600; text-align: center; }
        .cart-table td { padding: 12px 16px; border-bottom: 1px solid #eee; background: #fff; font-size: 14px; text-align: center; }
        .cart-item { display: none; }
        .cart-item.default-item { display: table-row; }
        .cart-item:target { display: table-row; }
        .cart-list:has(.cart-item:target) .cart-item.default-item { display: none; }
        .cart-product { display: flex; align-items: center; justify-content: flex-start; gap: 12px; text-align: left; }
        .cart-product img { width: 46px; height: 46px; object-fit: contain; border-radius: 6px; background: #f9f4f0; }
        .cart-summary { display: flex; justify-content: flex-end; margin-top: 18px; }
        .cart-total { display: flex; min-width: 260px; justify-content: space-between; gap: 24px; padding: 12px 20px; border-radius: 8px; background: #ddd8d2; color: #333; font-weight: 800; }
        .cart-amount { display: inline-flex; }
        .cart-amount span { display: none; }
        .cart-amount .amount-default { display: inline; }
        .cart-list:has(#item-tanggo:target) ~ .cart-summary .amount-default,
        .cart-list:has(#item-biscoff:target) ~ .cart-summary .amount-default,
        .cart-list:has(#item-sariroti:target) ~ .cart-summary .amount-default,
        .cart-list:has(#item-silverqueen:target) ~ .cart-summary .amount-default,
        .cart-list:has(#item-pringless:target) ~ .cart-summary .amount-default,
        .cart-list:has(#item-tictac:target) ~ .cart-summary .amount-default { display: none; }
        .cart-list:has(#item-tanggo:target) ~ .cart-summary .amount-tanggo,
        .cart-list:has(#item-biscoff:target) ~ .cart-summary .amount-biscoff,
        .cart-list:has(#item-sariroti:target) ~ .cart-summary .amount-sariroti,
        .cart-list:has(#item-silverqueen:target) ~ .cart-summary .amount-silverqueen,
        .cart-list:has(#item-pringless:target) ~ .cart-summary .amount-pringless,
        .cart-list:has(#item-tictac:target) ~ .cart-summary .amount-tictac { display: inline; }
        .cart-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 18px; }
        .cart-button { display: inline-flex; align-items: center; justify-content: center; padding: 10px 24px; border-radius: 8px; color: #fff; font-size: 14px; font-weight: 700; text-decoration: none; }
        .cart-back { background: #777; }
        .cart-continue { display: none; background: #7a1f2e; }
        .cart-continue.default { display: inline-flex; }
        .cart-list:has(.cart-item:target) ~ .cart-actions .cart-continue { display: none; }
        .cart-list:has(#item-tanggo:target) ~ .cart-actions .continue-tanggo,
        .cart-list:has(#item-biscoff:target) ~ .cart-actions .continue-biscoff,
        .cart-list:has(#item-sariroti:target) ~ .cart-actions .continue-sariroti,
        .cart-list:has(#item-silverqueen:target) ~ .cart-actions .continue-silverqueen,
        .cart-list:has(#item-pringless:target) ~ .cart-actions .continue-pringless,
        .cart-list:has(#item-tictac:target) ~ .cart-actions .continue-tictac { display: inline-flex; }
        .footer { height: 72px; display: flex; align-items: center; gap: 20px; padding: 0 40px; background: #7a1f2e; }
        .footer-logo { height: 48px; object-fit: contain; }
        .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,.35); }
        .footer-tag { color: #f5e8c8; font: italic 1rem Georgia,serif; }
        @media (max-width: 1100px) { .navbar { grid-template-columns: auto minmax(0,1fr) auto; gap: 10px; padding-inline: 18px; } .nav-center { gap: 5px; } .nav-pill { min-height: 38px; padding: 6px 11px; font-size: 11px; } .nav-search { width: 175px; min-width: 120px; } }
        @media (max-width: 780px) { .navbar { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 7px 12px; padding: 8px 14px; } .nav-logo { height: 39px; } .nav-center { order: 3; flex: 0 0 100%; justify-content: flex-start; overflow-x: auto; padding: 2px 0 4px; } .nav-pill { flex: 0 0 auto; min-height: 36px; padding: 6px 13px; font-size: 11px; } .page-wrapper { padding: 24px 14px 36px; } .page-title { font-size: 1.9rem; } .cart-table th,.cart-table td { padding: 10px 7px; font-size: 12px; } .cart-product { gap: 6px; } .cart-product img { width: 38px; height: 38px; } .cart-actions { flex-wrap: wrap; } }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="dashboard.php" aria-label="Home Warung Azzahroh"><img src="../img/logo-utama.png" alt="Warung Azzahroh" class="nav-logo"></a>
        <div class="nav-center">
            <a href="dashboard.php" class="nav-pill">Home</a>
            <a href="katalog-semua.php" class="nav-pill active">Katalog Produk</a>
            <a href="status-pesanan.php" class="nav-pill">Status Pesanan</a>
            <a href="riwayat-pesanan.php" class="nav-pill">Riwayat Pesanan</a>
        </div>
        <div class="nav-right">
            <div class="nav-search"><input type="text" placeholder="Cari Nama Produk" aria-label="Cari Nama Produk"><button type="button" aria-label="Cari"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button></div>
            <a href="keranjang.php" class="nav-icon" aria-label="Keranjang"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 001.98 1.61h9.72a2 2 0 001.98-1.69l1.37-7.31H6"/></svg></a>
            <div class="nav-profile-wrap" tabindex="0"><button type="button" class="nav-profile-btn" aria-label="Menu profil"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></button><div class="nav-dropdown"><a href="biodata.php">Biodata Saya</a><div class="nav-dropdown-divider"></div><a href="login.php">Keluar</a></div></div>
        </div>
    </nav>
    <div class="page-wrapper">
        <main class="content-inner">
            <h1 class="page-title">Keranjang Belanja</h1>
            <p class="page-sub">Produk pilihan Anda</p>
            <div class="section-label">Daftar Produk</div>
            <table class="cart-table cart-list">
                <thead><tr><th>No.</th><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead>
                <tbody>
                    <tr id="item-tanggo" class="cart-item"><td>1</td><td><div class="cart-product"><img src="../img/produk/tanggo.png" alt="Tanggo Wafer Long 100 g">Tanggo Wafer Long 100 g</div></td><td>Rp8.500</td><td>1</td><td>Rp8.500</td></tr>
                    <tr id="item-biscoff" class="cart-item default-item"><td>1</td><td><div class="cart-product"><img src="../img/produk/biscoff.png" alt="Lotus Biscoff 250 g">Lotus Biscoff 250 g</div></td><td>Rp29.100</td><td>1</td><td>Rp29.100</td></tr>
                    <tr id="item-sariroti" class="cart-item"><td>1</td><td><div class="cart-product"><img src="../img/produk/sariroti.png" alt="Sari Roti Tawar 340 g">Sari Roti Tawar 340 g</div></td><td>Rp15.500</td><td>1</td><td>Rp15.500</td></tr>
                    <tr id="item-silverqueen" class="cart-item"><td>1</td><td><div class="cart-product"><img src="../img/produk/silverqueen.png" alt="SilverQueen Matcha 32 g">SilverQueen Matcha 32 g</div></td><td>Rp28.900</td><td>1</td><td>Rp28.900</td></tr>
                    <tr id="item-pringless" class="cart-item"><td>1</td><td><div class="cart-product"><img src="../img/produk/pringless.png" alt="Pringless Kaleng 102 g">Pringless Kaleng 102 g</div></td><td>Rp28.800</td><td>1</td><td>Rp28.800</td></tr>
                    <tr id="item-tictac" class="cart-item"><td>1</td><td><div class="cart-product"><img src="../img/produk/tictac.png" alt="Tictac Snack 90 g">Tictac Snack 90 g</div></td><td>Rp7.100</td><td>1</td><td>Rp7.100</td></tr>
                </tbody>
            </table>
            <div class="cart-summary">
                <div class="cart-total"><span>Total Belanja</span><strong class="cart-amount"><span class="amount-default">Rp29.100</span><span class="amount-tanggo">Rp8.500</span><span class="amount-biscoff">Rp29.100</span><span class="amount-sariroti">Rp15.500</span><span class="amount-silverqueen">Rp28.900</span><span class="amount-pringless">Rp28.800</span><span class="amount-tictac">Rp7.100</span></strong></div>
            </div>
            <div class="cart-actions">
                <a href="katalog-semua.php" class="cart-button cart-back">Kembali ke Katalog</a>
                <a href="detail-transaksi.php#beli-biscoff" class="cart-button cart-continue default">Lanjutkan Transaksi</a>
                <a href="detail-transaksi.php#beli-tanggo" class="cart-button cart-continue continue-tanggo">Lanjutkan Transaksi</a>
                <a href="detail-transaksi.php#beli-biscoff" class="cart-button cart-continue continue-biscoff">Lanjutkan Transaksi</a>
                <a href="detail-transaksi.php#beli-sariroti" class="cart-button cart-continue continue-sariroti">Lanjutkan Transaksi</a>
                <a href="detail-transaksi.php#beli-silverqueen" class="cart-button cart-continue continue-silverqueen">Lanjutkan Transaksi</a>
                <a href="detail-transaksi.php#beli-pringless" class="cart-button cart-continue continue-pringless">Lanjutkan Transaksi</a>
                <a href="detail-transaksi.php#beli-tictac" class="cart-button cart-continue continue-tictac">Lanjutkan Transaksi</a>
            </div>
        </main>
    </div>
    <footer class="footer"><img src="../img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo"><div class="footer-div"></div><span class="footer-tag">Belanja kebutuhan sehari-hari</span></footer>
    <script src="api-integrasi.js" defer></script>
</body>
</html>
