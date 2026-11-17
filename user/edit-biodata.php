<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Biodata Saya – Warung Azzahroh</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Poppins', sans-serif; min-height: 100vh; display: flex; flex-direction: column; }

  .page-bg { flex: 1; background: url('../img/backgroundall.png') center/cover no-repeat; position: relative; }
  .page-bg::before { content: ''; position: absolute; inset: 0; background: rgba(235,215,215,0.75); }
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
  .nav-icon-active { color: #fff; text-decoration: none; font-size: 22px; background: rgba(255,255,255,0.25); border-radius: 50%; padding: 4px; }

  .footer { background: #7a1f2e; height: 72px; display: flex; align-items: center; padding: 0 40px; gap: 20px; }
  .footer-logo { height: 48px; object-fit: contain; }
  .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,0.35); }
  .footer-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }

  .page-title { font-size: 2.4rem; font-weight: 900; color: #2a1a1a; }
  .page-sub { font-size: 14px; color: #666; margin-top: 6px; margin-bottom: 28px; }

  .bio-card { background: rgba(255,255,255,0.88); border-radius: 20px; padding: 36px; display: flex; gap: 36px; max-width: 900px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }

  .bio-left { width: 280px; flex-shrink: 0; text-align: center; }
  .avatar-box { width: 200px; height: 200px; background: #111; border-radius: 32px; display: flex; align-items: center; justify-content: center; margin: 0 auto; }
  .bio-name { font-size: 1.3rem; font-weight: 800; color: #5c2b22; margin-top: 14px; }
  .bio-id { font-size: 13px; color: #777; margin-bottom: 20px; }
  .btn-back { background: #c1edfa; color: #111; border: none; border-radius: 8px; padding: 8px 20px; font-weight: 600; font-size: 14px; text-decoration: none; display: inline-block; font-family: inherit; cursor: pointer; }

  .bio-right { flex: 1; }
  .bio-right-title { font-size: 1.6rem; font-weight: 800; color: #554d4d; margin-bottom: 20px; }

  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 20px; }
  .form-group { display: flex; flex-direction: column; gap: 4px; }
  .form-group label { font-size: 12px; color: #888; font-weight: 600; }
  .form-input { background: white; border: 1px solid #d4c8c8; border-radius: 8px; height: 40px; padding: 0 14px; font-size: 14px; font-family: inherit; outline: none; color: #333; }
  .form-input:focus { border-color: #7a1f2e; }
  .form-select { background: white; border: 1px solid #d4c8c8; border-radius: 8px; height: 40px; padding: 0 14px; font-size: 14px; font-family: inherit; outline: none; color: #333; appearance: auto; }

  .btn-row { display: flex; gap: 10px; justify-content: flex-end; margin-top: 16px; }
  .btn-atur-ulang { background: white; border: 1px solid #ccc; border-radius: 8px; padding: 9px 20px; font-weight: 600; font-family: inherit; font-size: 14px; cursor: pointer; color: #333; }
  .btn-simpan { background: #b5a898; color: #333; border: none; border-radius: 8px; padding: 9px 20px; font-weight: 700; font-family: inherit; font-size: 14px; cursor: pointer; }
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

<div class="page-bg">
  <div class="page-content">

    <div class="page-title">Edit Biodata Saya</div>
    <div class="page-sub">Masukan ke keranjang sebanyak banyaknyaa</div>

    <div class="bio-card">
      <!-- Left -->
      <div class="bio-left">
        <div class="avatar-box">
          <svg viewBox="0 0 100 100" width="120" height="120">
            <circle cx="50" cy="36" r="22" stroke="#f5c0c0" stroke-width="3" fill="none"/>
            <path d="M15 85 Q15 65 50 65 Q85 65 85 85" stroke="#f5c0c0" stroke-width="3" fill="none" stroke-linecap="round"/>
          </svg>
        </div>
        <div class="bio-name">Derryel Josua</div>
        <div class="bio-id">ID : AW001</div>
        <a href="dashboard.php" class="btn-back">← Kembali</a>
      </div>

      <!-- Right -->
      <div class="bio-right">
        <div class="bio-right-title">Informasi Data Pengguna</div>
        <form action="biodata.php" method="get">
          <div class="form-grid">
            <div class="form-group">
              <label>ID</label>
              <input class="form-input" type="text" name="id" value="AW001">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input class="form-input" type="text" name="alamat" value="Sukolilo">
            </div>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input class="form-input" type="text" name="nama" value="Derryel Josua">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-input" type="email" name="email" value="derryll@gmail.com">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <select class="form-select" name="tgl_lahir">
                <option selected>26 September 2006</option>
                <option>1 Januari 2000</option>
                <option>15 Maret 2003</option>
                <option>20 Agustus 1998</option>
              </select>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="form-input" type="password" name="password" placeholder="Masukkan password baru">
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-select" name="gender">
                <option selected>Laki - Laki</option>
                <option>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>No Hp</label>
              <input class="form-input" type="text" name="nohp" value="087567865572">
            </div>
          </div>

          <div class="btn-row">
            <button type="reset" class="btn-atur-ulang">Atur Ulang</button>
            <button type="submit" class="btn-simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<footer class="footer">
  <img src="../img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo">
  <div class="footer-div"></div>
  <span class="footer-tag">Belanja kebutuhan sehari-hari</span>
</footer>

</body>
</html>


