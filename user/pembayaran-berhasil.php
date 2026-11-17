<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembayaran Berhasil – Warung Azzahroh</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Poppins', sans-serif; min-height: 100vh; display: flex; flex-direction: column; background: url('../img/backgroundall.png') center/cover no-repeat; position: relative; }
  body::before { content: ''; position: fixed; inset: 0; background: rgba(235,215,215,0.75); z-index: 0; }

  .navbar { background: #7a1f2e; padding: 0 40px; height: 68px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 200; box-shadow: 0 2px 12px rgba(0,0,0,0.25); }
  .nav-logo { height: 46px; object-fit: contain; }
  .nav-icon { color: #fff; text-decoration: none; font-size: 24px; }

  .footer { background: #7a1f2e; height: 72px; display: flex; align-items: center; padding: 0 40px; gap: 20px; position: relative; z-index: 1; }
  .footer-logo { height: 48px; object-fit: contain; }
  .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,0.35); }
  .footer-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }

  .main-area { flex: 1; position: relative; z-index: 1; display: flex; flex-direction: column; }

  .btn-kembali { background: #d4cfc9; border: none; border-radius: 6px; padding: 6px 16px; font-size: 13px; font-family: inherit; cursor: pointer; text-decoration: none; color: #333; display: inline-block; margin: 20px 48px; align-self: flex-start; }

  /* Success card */
  .success-card {
    background: white;
    border-radius: 16px;
    max-width: 500px;
    margin: 0 auto 60px;
    padding: 40px;
    box-shadow: 0 6px 24px rgba(0,0,0,0.12);
    text-align: center;
  }
  .check-circle { width: 72px; height: 72px; display: inline-flex; align-items: center; justify-content: center; }
  .success-title { font-size: 1.8rem; font-weight: 900; color: #222; margin-top: 16px; }
  .success-sub { font-size: 14px; color: #666; margin-bottom: 24px; margin-top: 6px; }
  .card-divider { height: 1px; background: #eee; margin: 8px 0; }
  .info-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; font-size: 14px; color: #444; }
  .info-row:last-child { border-bottom: none; }
  .info-row .info-left { display: flex; align-items: center; gap: 8px; color: #666; }
  .info-row .info-left svg { width: 17px; height: 17px; flex: 0 0 17px; color: #7a1f2e; }
  .info-row .info-val { font-weight: 600; color: #222; }
  .info-row .info-val.total { color: #7a1f2e; font-weight: 800; font-size: 1.1rem; }
  .btn-row { display: flex; gap: 12px; justify-content: center; margin-top: 24px; }
  .btn-lihat { background: #d4cfc9; color: #333; border: none; border-radius: 8px; padding: 10px 24px; font-weight: 700; cursor: pointer; font-family: inherit; font-size: 14px; text-decoration: none; display: inline-block; }
  .btn-beli { background: #7a1f2e; color: white; border: none; border-radius: 8px; padding: 10px 24px; font-weight: 700; cursor: pointer; font-family: inherit; font-size: 14px; text-decoration: none; display: inline-block; }
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
        <a href="katalog-semua.php" class="nav-pill ">Katalog Produk</a>
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

<div class="main-area">
  <a href="dashboard.php" class="btn-kembali">← Kembali</a>

  <div class="success-card">
    <svg class="check-circle" viewBox="0 0 72 72" width="72" height="72" xmlns="http://www.w3.org/2000/svg">
      <circle cx="36" cy="36" r="32" fill="none" stroke="#7a1f2e" stroke-width="4"/>
      <polyline points="20,37 31,48 52,26" fill="none" stroke="#7a1f2e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <div class="success-title">Pembayaran Berhasil</div>
    <div class="success-sub">Terimakasih atas transaksi anda di Warung Azzahroh</div>
    <div class="card-divider"></div>

    <div class="info-row">
      <span class="info-left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4.5h6M9 9h6M9 13h6M9 17h3"/></svg>ID Transaksi</span>
      <span class="info-val">TRX001</span>
    </div>
    <div class="info-row">
      <span class="info-left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18M8 14h2M14 14h2"/></svg>Tanggal Pembayaran</span>
      <span class="info-val">11 Nov 2026, 11:13</span>
    </div>
    <div class="info-row">
      <span class="info-left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2.5" y="5" width="19" height="14" rx="2"/><path d="M3 10h18M7 15h3"/></svg>Metode Pembayaran</span>
      <span class="info-val">QRIS</span>
    </div>
    <div class="info-row">
      <span class="info-left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v20M17 6H9a3 3 0 000 6h6a3 3 0 010 6H6"/></svg>Total Pembayaran</span>
      <span class="info-val total">Rp119.500</span>
    </div>

    <div class="card-divider"></div>
    <div class="btn-row">
      <a href="struk.pdf" class="btn-lihat" target="_blank" rel="noopener">Cetak Struk</a>
      <a href="katalog-semua.php" class="btn-beli">Beli Lagi</a>
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


