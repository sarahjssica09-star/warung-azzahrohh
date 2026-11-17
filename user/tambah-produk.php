<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Warung Azzahroh</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f0ebe6;
            color: #222;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar {
            background: #7a1f2e; padding: 0 40px; height: 68px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
            box-shadow: 0 2px 12px rgba(0,0,0,0.25);
        }
        .nav-logo { height: 46px; object-fit: contain; }
        .nav-center { display: flex; gap: 10px; align-items: center; }
        .nav-pill {
            border: 2px solid rgba(255,255,255,0.7); color: #fff;
            padding: 6px 20px; border-radius: 50px; text-decoration: none;
            font-size: 14px; font-weight: 600; transition: all 0.2s;
        }
        .nav-pill:hover, .nav-pill.active { background: #fff; color: #7a1f2e; }
        .nav-right { display: flex; align-items: center; gap: 20px; }
        .nav-search {
            display: flex; align-items: center; background: #fff;
            border-radius: 50px; overflow: hidden; padding: 0 4px 0 16px; height: 36px;
        }
        .nav-search input { border: none; outline: none; font-family: inherit; font-size: 13px; width: 160px; background: transparent; }
        .nav-search button { background: none; border: none; cursor: pointer; padding: 4px 8px; color: #666; }
        .nav-icon { color: #fff; text-decoration: none; font-size: 22px; position: relative; }
        .nav-icon span {
            position: absolute; top: -4px; right: -6px; background: #ff4444; color: #fff;
            font-size: 9px; font-weight: 700; border-radius: 50%; width: 16px; height: 16px;
            display: flex; align-items: center; justify-content: center;
        }

        /* CONTENT */
        .content-container {
            flex: 1;
            padding: 30px 48px 48px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex; align-items: center; gap: 8px;
            font-size: 15px; margin-bottom: 12px;
        }
        .breadcrumb a { color: #8d7a7a; text-decoration: none; font-weight: 500; }
        .breadcrumb a:hover { color: #554d4d; }
        .breadcrumb .divider { color: #8d7a7a; }
        .breadcrumb .current { color: #925555; font-weight: 600; }

        /* Hero */
        .hero-title {
            font-size: 2.6rem; font-weight: 800; color: #252525;
            line-height: 1.1; letter-spacing: -1px; margin-bottom: 6px;
        }
        .hero-subtitle { font-size: 16px; color: #555; margin-bottom: 28px; }

        /* FORM OUTER CARD */
        .form-outer-card {
            background-color: #f2eded;
            border-radius: 20px;
            display: flex;
            gap: 30px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            min-height: 520px;
        }

        /* Left Column */
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

        .photo-preview-box {
            width: 220px; height: 220px;
            background-color: #d9d9d9;
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px; overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .file-choose-pill {
            background: linear-gradient(90deg, #444 0%, #444 45%, #e8dddc 45%, #e8dddc 100%);
            border-radius: 50px; width: 220px; height: 38px;
            display: flex; align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
            margin-bottom: 14px; overflow: hidden; cursor: pointer; position: relative;
        }
        .file-choose-pill input[type="file"] {
            position: absolute; opacity: 0; width: 100%; height: 100%; cursor: pointer;
        }
        .btn-choose-file-label {
            width: 45%; color: #fff; font-size: 12px; font-weight: 600;
            text-align: center; pointer-events: none;
        }
        .file-chosen-text {
            width: 55%; color: #222; font-size: 11px; text-align: center;
            pointer-events: none; white-space: nowrap; overflow: hidden;
            text-overflow: ellipsis; padding: 0 6px;
        }

        .btn-upload-photo {
            background-color: #5c9979; color: #fff;
            font-size: 14px; font-weight: 600;
            padding: 8px 28px; border-radius: 50px;
            border: none; cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
            transition: all 0.2s; font-family: inherit;
        }
        .btn-upload-photo:hover { background-color: #4b8064; }

        .btn-kembali-pill {
            background-color: #c1edfa; color: #111;
            font-size: 15px; font-weight: 600;
            padding: 8px 22px; border-radius: 12px;
            text-decoration: none; display: inline-flex;
            align-items: center; gap: 8px; align-self: flex-start;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.2s; margin-top: 20px;
        }
        .btn-kembali-pill:hover { background-color: #aee0ee; }

        /* Right Column */
        .form-right-col {
            flex: 1;
            background-color: #e4dddd;
            border-radius: 20px;
            padding: 30px 36px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .form-card-title {
            font-size: 2rem; font-weight: 800; color: #554d4d;
            margin-bottom: 24px; letter-spacing: -0.5px;
        }

        .form-fields-container { display: flex; flex-direction: column; gap: 16px; }

        .input-group { display: flex; flex-direction: column; gap: 6px; }

        .input-label { font-size: 15px; font-weight: 700; color: #222; }

        .input-text {
            width: 100%; height: 44px;
            background-color: rgba(255,255,255,0.55);
            border: 1px solid #d4c8c8; border-radius: 8px;
            padding: 0 16px; font-family: inherit; font-size: 14.5px;
            color: #222; outline: none; transition: all 0.2s;
        }
        .input-text:focus { background-color: #fff; border-color: #7a1f2e; }

        .input-row-2col { display: flex; gap: 20px; }
        .input-row-2col .input-group { flex: 1; }

        .input-textarea {
            width: 100%; height: 95px;
            background-color: rgba(255,255,255,0.55);
            border: 1px solid #d4c8c8; border-radius: 8px;
            padding: 12px 16px; font-family: inherit; font-size: 14px;
            color: #222; outline: none; resize: none; transition: all 0.2s;
        }
        .input-textarea:focus { background-color: #fff; border-color: #7a1f2e; }

        .input-half-width { width: 48%; }

        .form-bottom-actions {
            display: flex; align-items: center; justify-content: flex-end;
            gap: 16px; margin-top: 24px;
        }

        .btn-atur-ulang {
            background-color: rgba(255,255,255,0.7); color: #111;
            font-size: 15px; font-weight: 600; padding: 8px 24px;
            border-radius: 10px; border: 1px solid #dcdcdc;
            cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.2s; font-family: inherit;
        }
        .btn-atur-ulang:hover { background-color: #fff; }

        .btn-simpan {
            background-color: #cfb9a5; color: #111;
            font-size: 15px; font-weight: 700; padding: 8px 26px;
            border-radius: 10px; border: none; cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            transition: all 0.2s; font-family: inherit;
        }
        .btn-simpan:hover { background-color: #c4ab94; }

        /* FOOTER */
        .footer {
            background: #7a1f2e; height: 72px;
            display: flex; align-items: center; padding: 0 40px; gap: 20px;
        }
        .footer-logo { height: 48px; object-fit: contain; }
        .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,0.35); }
        .footer-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .form-outer-card { flex-direction: column; }
            .form-left-col { width: 100%; }
        }
        @media (max-width: 700px) {
            .content-container { padding: 20px; }
            .hero-title { font-size: 1.8rem; }
            .input-row-2col { flex-direction: column; }
            .input-half-width { width: 100%; }
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
</style></head>
<body>

    <!-- NAVBAR -->
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

    <!-- CONTENT -->
    <main class="content-container">

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="katalog-semua.php">Katalog Produk</a>
            <span class="divider">&gt;</span>
            <span class="current">Tambah Produk</span>
        </div>

        <!-- Hero -->
        <h1 class="hero-title">Tambah Produk</h1>
        <p class="hero-subtitle">Tambahkan produk baru ke katalog toko</p>

        <!-- Form -->
        <form action="katalog-semua.php" method="get" class="form-outer-card">

            <!-- Left Column: Photo Upload & Kembali -->
            <div class="form-left-col">
                <div class="photo-upload-section">
                    <div class="photo-preview-box"></div>

                    <div class="file-choose-pill">
                        <input type="file" name="foto_produk" id="foto_produk">
                        <span class="btn-choose-file-label">Choose File</span>
                        <span class="file-chosen-text">No File Chosen</span>
                    </div>

                    <button type="button" class="btn-upload-photo">Upload Photo</button>
                </div>

                <a href="katalog-semua.php" class="btn-kembali-pill">
                    <span>&larr;</span> Kembali
                </a>
            </div>

            <!-- Right Column: Form Data -->
            <div class="form-right-col">
                <h2 class="form-card-title">Informasi Data Produk</h2>

                <div class="form-fields-container">
                    <!-- Nama Produk -->
                    <div class="input-group">
                        <label class="input-label" for="nama_produk">Nama Produk</label>
                        <input type="text" id="nama_produk" name="nama_produk" class="input-text">
                    </div>

                    <!-- Kategori & Harga -->
                    <div class="input-row-2col">
                        <div class="input-group">
                            <label class="input-label" for="kategori">Kategori</label>
                            <input type="text" id="kategori" name="kategori" class="input-text">
                        </div>
                        <div class="input-group">
                            <label class="input-label" for="harga">Harga (Rp)</label>
                            <input type="text" id="harga" name="harga" class="input-text">
                        </div>
                    </div>

                    <!-- Deskripsi Produk -->
                    <div class="input-group">
                        <label class="input-label" for="deskripsi">Deskripsi Produk</label>
                        <textarea id="deskripsi" name="deskripsi" class="input-textarea"></textarea>
                    </div>

                    <!-- Stok -->
                    <div class="input-group input-half-width">
                        <label class="input-label" for="stok">Stok</label>
                        <input type="number" id="stok" name="stok" class="input-text">
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

    <!-- FOOTER -->
    <footer class="footer">
        <img src="../img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo">
        <div class="footer-div"></div>
        <span class="footer-tag">Belanja kebutuhan sehari-hari</span>
    </footer>

</body>
</html>

