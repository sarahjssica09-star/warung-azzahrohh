<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voucher Saya - Warung Azzahroh</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Poppins', sans-serif; min-height: 100vh; display: flex; flex-direction: column; }

  .page-bg { flex: 1; background: url('../img/backgroundall.png') center/cover no-repeat; position: relative; }
  .page-bg::before { content: ''; position: absolute; inset: 0; background: rgba(240,220,220,0.75); }
  .page-content { position: relative; z-index: 1; padding: 32px 48px; }

  .navbar { background: #7a1f2e; padding: 0 40px; height: 68px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 200; box-shadow: 0 2px 12px rgba(0,0,0,0.25); }
  .nav-logo { height: 46px; object-fit: contain; }
  .nav-center { display: flex; gap: 10px; align-items: center; }
  .nav-pill { border: 2px solid rgba(255,255,255,0.65); color: #fff; padding: 6px 20px; border-radius: 50px; text-decoration: none; font-size: 14px; font-weight: 600; transition: all 0.2s; }
  .nav-pill:hover, .nav-pill.active { background: #fff; color: #7a1f2e; }
  .nav-right { display: flex; align-items: center; gap: 18px; }
  .nav-search { display: flex; align-items: center; background: #fff; border-radius: 50px; overflow: hidden; padding: 0 4px 0 16px; height: 36px; }
  .nav-search input { border: none; outline: none; font-family: inherit; font-size: 13px; width: 150px; }
  .nav-search button { background: none; border: none; cursor: pointer; padding: 4px 8px; color: #666; font-size: 15px; }
  .nav-icon { color: #fff; text-decoration: none; font-size: 22px; position: relative; }
  .nav-icon span { position: absolute; top: -5px; right: -7px; background: #ff4444; color: #fff; font-size: 9px; font-weight: 700; border-radius: 50%; width: 16px; height: 16px; display: flex; align-items: center; justify-content: center; }

  .footer { background: #7a1f2e; height: 72px; display: flex; align-items: center; padding: 0 40px; gap: 20px; }
  .footer-logo { height: 48px; object-fit: contain; }
  .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,0.35); }
  .footer-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }

  .page-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 24px; }
  .page-title { font-size: 2.6rem; font-weight: 900; color: #2a1a1a; line-height: 1.1; }
  .page-sub { font-size: 14px; color: #666; margin-top: 6px; }
  .tab-group { display: flex; gap: 10px; margin-top: 8px; }
  .tab-btn { padding: 8px 22px; border-radius: 50px; font-family: inherit; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none; border: 2px solid #7a1f2e; transition: all 0.2s; }
  .tab-btn.active { background: #7a1f2e; color: #fff; }
  .tab-btn:not(.active) { background: transparent; color: #7a1f2e; }

  .toolbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
  .search-input { border: 1.5px solid #ccc; border-radius: 50px; padding: 7px 20px; font-family: inherit; font-size: 13px; width: 240px; outline: none; }

  .order-card { background: white; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.09); margin-bottom: 14px; display: flex; overflow: hidden; align-items: stretch; }
  .card-img-col { width: 140px; min-height: 100px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .card-img-col img { width: 110px; object-fit: contain; }
  .card-mid { flex: 1; padding: 16px 18px; display: flex; flex-direction: column; justify-content: center; gap: 5px; }
  .card-divider { width: 1.5px; background: #eee; margin: 12px 0; }
  .card-right { width: 260px; padding: 16px 18px; display: flex; flex-direction: column; justify-content: center; gap: 6px; flex-shrink: 0; }

  .order-num { background: #7a1f2e; color: #fff; font-weight: 700; font-size: 13px; border-radius: 50%; width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center; }
  .order-name { font-weight: 700; font-size: 15px; color: #222; }
  .id-badge { background: #eee; color: #555; font-size: 11px; border-radius: 20px; padding: 2px 10px; display: inline-block; }
  .order-date { font-size: 12px; color: #666; }
  .pay-badge-tunai { background: #f5b8a8; color: #7a1f2e; font-size: 11px; border-radius: 20px; padding: 3px 12px; display: inline-block; font-weight: 600; }
  .pay-badge-qris { background: #a8d8e8; color: #1a5a6e; font-size: 11px; border-radius: 20px; padding: 3px 12px; display: inline-block; font-weight: 600; }
  .total-badge { border: 1.5px solid #ccc; border-radius: 20px; font-size: 12px; padding: 3px 14px; display: inline-block; color: #333; }
  .bukti-link { color: #7a1f2e; font-size: 11px; text-decoration: underline; cursor: pointer; }

  .prod-label { background: #f5d0d0; color: #7a1f2e; border-radius: 6px; font-size: 11px; padding: 2px 10px; display: inline-block; font-weight: 600; margin-bottom: 4px; }
  .prod-item { font-size: 13px; color: #333; }
  .badge-selesai { background: #4CAF50; color: white; border-radius: 20px; font-size: 12px; padding: 4px 14px; display: inline-block; font-weight: 600; }
  .detail-link { color: #7a1f2e; font-size: 12px; text-decoration: underline; cursor: pointer; }

  .pagination { display: flex; gap: 6px; align-items: center; justify-content: center; margin-top: 24px; padding-bottom: 32px; }
  .pag-btn { border: 1.5px solid #ccc; background: white; border-radius: 6px; width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center; font-family: inherit; font-size: 13px; cursor: pointer; color: #333; }
  .pag-btn.active { background: #7a1f2e; color: white; border-color: #7a1f2e; }
  .pag-dots { color: #999; font-size: 16px; }

  /* Filter collapsible */
  .filter-checkbox { display: none; }
  .filter-wrap { margin-bottom: 20px; }
  .filter-toggle-btn {
    display: inline-flex; align-items: center; gap: 8px;
    background: #7a1f2e; color: #fff; padding: 10px 20px;
    border-radius: 8px; cursor: pointer; font-weight: 700;
    font-size: 14px; border: none; user-select: none;
  }
  .filter-arrow { transition: transform 0.2s; }
  .filter-body {
    max-height: 0; overflow: hidden;
    transition: max-height 0.3s ease;
    background: #f5ebe8; border-radius: 0 0 10px 10px; padding: 0 20px;
  }
  .filter-checkbox:checked ~ .filter-body {
    max-height: 200px; padding: 16px 20px;
  }
  .filter-checkbox:checked ~ .filter-toggle-btn .filter-arrow {
    transform: rotate(180deg);
  }
  .filter-row { display: flex; gap: 16px; flex-wrap: wrap; }
  .filter-group { display: flex; flex-direction: column; gap: 4px; }
  .filter-group label { font-size: 12px; font-weight: 600; color: #555; }
  .filter-input {
    border: 1.5px solid #d0c8c0; border-radius: 8px;
    padding: 7px 12px; font-family: inherit; font-size: 13px; outline: none;
    background: #fff; min-width: 140px;
  }
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
</style><style>
.voucher-saved-list { display: grid; gap: 16px; max-width: 920px; }
.voucher-saved { display: flex; align-items: center; justify-content: space-between; gap: 24px; padding: 22px 26px; border: 1px solid #ead8d2; border-radius: 14px; background: #fffdfa; box-shadow: 0 4px 15px rgba(55,25,25,.1); }
.voucher-saved-main h2 { margin: 7px 0 4px; color: #7a1f2e; font-size: 20px; letter-spacing: .7px; }
.voucher-saved-main p { color: #443335; font-size: 14px; }
.voucher-saved-main small { display: block; margin-top: 5px; color: #827572; font-size: 12px; }
.voucher-saved-tag { color: #9b6d4e; font-size: 11px; font-weight: 700; letter-spacing: .8px; text-transform: uppercase; }
.voucher-saved-status { flex: 0 0 auto; padding: 9px 15px; border-radius: 999px; background: #e8f2e7; color: #3f7047; font-size: 12px; font-weight: 700; }
.voucher-saved-action { flex: 0 0 auto; padding: 10px 16px; border-radius: 8px; background: #7a1f2e; color: #fff; font-size: 12px; font-weight: 700; text-decoration: none; }
.voucher-saved-action:hover { background: #5c1723; }
.voucher-entry { max-width: 920px; margin: 0 0 24px; padding: 20px 22px; border: 1px solid #ead8d2; border-radius: 14px; background: #fffdfa; box-shadow: 0 4px 15px rgba(55,25,25,.08); }
.voucher-entry label { display: block; margin-bottom: 9px; color: #443335; font-size: 14px; font-weight: 700; }
.voucher-entry-row { display: flex; gap: 10px; }
.voucher-entry input { flex: 1; min-width: 0; height: 42px; padding: 0 14px; border: 1px solid #d9c9c3; border-radius: 8px; color: #443335; font: 13px 'Poppins',sans-serif; outline: none; }
.voucher-entry input:focus { border-color: #7a1f2e; box-shadow: 0 0 0 3px rgba(122,31,46,.1); }
.voucher-entry button { padding: 0 19px; border: 0; border-radius: 8px; background: #7a1f2e; color: #fff; font: 700 13px 'Poppins',sans-serif; cursor: pointer; }
.voucher-entry button:hover { background: #5c1723; }
.voucher-entry button:disabled { opacity: .72; cursor: not-allowed; }
.voucher-entry-note { margin-top: 8px; color: #827572; font-size: 11px; }
.voucher-list-title { margin: 0 0 12px; color: #443335; font-size: 16px; font-weight: 700; }
@media (max-width: 600px) { .voucher-saved { align-items: flex-start; flex-direction: column; gap: 14px; padding: 18px; } }
@media (max-width: 480px) { .voucher-entry-row { flex-direction: column; } .voucher-entry button { min-height: 40px; } }
</style>
</head>
<body>

<nav class="navbar">
    <a href="dashboard.php" aria-label="Home Warung Azzahroh"><img src="../img/logo-utama.png" alt="Warung Azzahroh" class="nav-logo"></a>
    <div class="nav-center">
        <a href="dashboard.php" class="nav-pill ">Home</a>
        <a href="katalog-semua.php" class="nav-pill ">Katalog Produk</a>
        <a href="status-pesanan.php" class="nav-pill ">Status Pesanan</a>
        <a href="riwayat-pesanan.php" class="nav-pill active">Riwayat Pesanan</a>
    </div>
    <div class="nav-right">
        <div class="nav-search"><input type="text" placeholder="Cari Nama Produk" aria-label="Cari Nama Produk"><button type="button" aria-label="Cari"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button></div>
        <a href="keranjang.php" class="nav-icon" aria-label="Keranjang, 3 produk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 001.98 1.61h9.72a2 2 0 001.98-1.69l1.37-7.31H6"/></svg><span>3</span></a>
        <div class="nav-profile-wrap" tabindex="0"><button type="button" class="nav-profile-btn" tabindex="-1" aria-label="Menu profil"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></button>
            <div class="nav-dropdown"><a href="biodata.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Biodata Saya</a><a href="voucher-saya.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8Z"/><circle cx="7.5" cy="7.5" r="1"/></svg>Voucher Saya</a><div class="nav-dropdown-divider"></div><a href="login.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>Keluar</a></div>
        </div>
    </div>
</nav>
<div class="page-bg">
  <div class="page-content">
    <div class="page-header">
      <div>
        <div class="page-title">Voucher Saya</div>
        <div class="page-sub">Voucher yang tersedia untuk akun Anda</div>
      </div>
    </div>
    <div class="voucher-entry">
      <label for="kode-voucher">Punya kode voucher?</label>
      <div class="voucher-entry-row">
        <input id="kode-voucher" type="text" placeholder="Masukkan kode voucher" autocomplete="off">
        <button type="button" disabled>Klaim Voucher</button>
      </div>
      <p class="voucher-entry-note">Masukkan kode voucher untuk menambahkannya ke daftar voucher Anda.</p>
    </div>
    <h2 class="voucher-list-title">Voucher Anda</h2>
    <div class="voucher-saved-list">
      <article class="voucher-saved" id="voucher-azzahroh15">
        <div class="voucher-saved-main">
          <span class="voucher-saved-tag">Voucher diklaim</span>
          <h2>AZZAHROH15</h2>
          <p>Diskon 15% · Minimal belanja Rp25.000</p>
          <small>Berlaku hari ini saja</small>
        </div>
        <div class="voucher-saved-status">Sudah Diklaim</div>
      </article>
      <article class="voucher-saved" id="voucher-hemat10">
        <div class="voucher-saved-main">
          <span class="voucher-saved-tag">Voucher tersedia</span>
          <h2>HEMAT10</h2>
          <p>Diskon Rp10.000 · Minimal pembelian Rp50.000</p>
          <small>Berlaku sampai 30 November 2026</small>
        </div>
        <a href="detail-transaksi.php" class="voucher-saved-action">Gunakan di transaksi</a>
      </article>
    </div>
  </div>
</div>
<footer class="footer">
  <img src="../img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo">
  <div class="footer-div"></div>
  <span class="footer-tag">Belanja kebutuhan sehari-hari</span>
</footer>

    <script src="api-integrasi.js" defer></script>
</body>
</html>


