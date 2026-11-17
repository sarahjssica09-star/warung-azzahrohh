<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; min-height: 100vh; display: flex; flex-direction: column; }

        /* NAVBAR */
        .navbar {
            background: #7a1f2e; padding: 0 40px; height: 68px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
        }
        .nav-logo { height: 46px; object-fit: contain; }
        .nav-center { display: flex; gap: 10px; }
        .nav-pill {
            border: 2px solid rgba(255,255,255,0.7); color: #fff;
            padding: 6px 20px; border-radius: 50px; text-decoration: none;
            font-size: 14px; font-weight: 600; transition: all 0.2s;
        }
        .nav-pill:hover, .nav-pill.active { background: #fff; color: #7a1f2e; }
        .nav-right { display: flex; align-items: center; gap: 20px; }
        .nav-search { display: flex; align-items: center; background: #fff; border-radius: 50px; overflow: hidden; padding: 0 4px 0 16px; height: 36px; }
        .nav-search input { border: none; outline: none; font-family: inherit; font-size: 13px; width: 160px; background: transparent; }
        .nav-search button { background: none; border: none; cursor: pointer; padding: 4px 8px; color: #666; }
        .nav-icon { color: #fff; text-decoration: none; font-size: 22px; position: relative; }
        .nav-icon span { position: absolute; top: -4px; right: -6px; background: #ff4444; color: #fff; font-size: 9px; font-weight: 700; border-radius: 50%; width: 16px; height: 16px; display: flex; align-items: center; justify-content: center; }

        /* CONTENT */
        .page-wrapper {
            flex: 1;
            background: url('../img/backgroundall.png') center/cover no-repeat;
            position: relative;
            padding: 36px 48px 48px;
        }
        .page-wrapper::before {
            content: ''; position: absolute; inset: 0;
            background: rgba(240, 230, 225, 0.82);
        }
        .content-inner { position: relative; z-index: 1; max-width: 820px; }

        .page-title { font-size: 2.4rem; font-weight: 900; color: #222; margin-bottom: 4px; }
        .page-sub { font-size: 14px; color: #555; margin-bottom: 24px; }

        /* META FIELDS */
        .meta-row { display: flex; gap: 16px; margin-bottom: 28px; flex-wrap: wrap; }
        .meta-field { display: flex; flex-direction: column; gap: 4px; }
        .meta-field label { font-size: 11px; font-weight: 600; color: #666; }
        .meta-input {
            border: 1.5px solid #d0c8c0; border-radius: 8px; padding: 8px 14px;
            font-family: inherit; font-size: 13px; min-width: 170px;
            background: rgba(255,255,255,0.75); color: #555; outline: none;
        }

        /* SECTION LABEL */
        .section-label {
            display: inline-block; font-size: 1.1rem; font-weight: 800;
            border: 2px solid #333; border-radius: 8px;
            padding: 6px 20px; margin-bottom: 16px;
        }

        /* TABLE */
        .detail-table {
            width: 100%; border-collapse: collapse;
            border-radius: 12px; overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            background: #fff;
        }
        .detail-table thead tr { background: #ccc8c2; }
        .detail-table th { padding: 12px 16px; font-size: 14px; font-weight: 600; text-align: center; color: #333; }
        .detail-table td { padding: 14px 16px; font-size: 14px; text-align: center; background: #fff; border-bottom: 1px solid #eee; }
        .detail-table tr:last-child td { border-bottom: none; }
        .td-prod { display: flex; align-items: center; justify-content: center; gap: 10px; }
        .td-prod img { width: 46px; height: 46px; object-fit: contain; background: #f9f4f0; border-radius: 6px; }
        .total-row td { background: #ddd8d2 !important; font-weight: 700; }

        /* Purchase detail can be opened from a catalog product using its URL fragment. */
        .direct-purchase { display: none; }
        .detail-table tbody:has(.direct-purchase:target) .default-purchase { display: none; }
        .direct-purchase:target { display: table-row; }

        .recommendation-section { margin-top: 26px; }
        .recommendation-title { margin: 0 0 12px; font-size: 1.1rem; font-weight: 800; }
        .recommendation-grid { display: grid; grid-template-columns: repeat(3,minmax(0,1fr)); gap: 12px; }
        .recommendation-card { display: flex; min-width: 0; flex-direction: column; align-items: center; gap: 7px; padding: 13px 10px; border: 1px solid #eee2dc; border-radius: 10px; background: #fff; text-align: center; }
        .recommendation-card img { width: 58px; height: 58px; object-fit: contain; }
        .recommendation-name { font-size: 12px; font-weight: 600; }
        .recommendation-price { color: #7a1f2e; font-size: 12px; font-weight: 700; }
        .recommendation-add { display: inline-block; padding: 6px 12px; border: 1px solid #7a1f2e; border-radius: 20px; background: #fff; color: #7a1f2e; font: 700 11px 'Poppins',sans-serif; cursor: pointer; }
        .recommendation-add:hover { background: #f8eeea; }
        .prototype-note { margin-top: 9px; color: #777; font-size: 11px; }

        .checkout-payment { margin-top: 22px; max-width: 660px; }
        .voucher-card { display: grid; grid-template-columns: minmax(0,1fr) auto; gap: 6px 16px; align-items: center; padding: 13px 16px; border: 1px solid #e5d8cf; border-radius: 10px; background: rgba(255,255,255,.88); }
        .voucher-copy strong { display: block; font-size: 14px; }
        .voucher-copy span { display: block; color: #666; font-size: 12px; }
        .voucher-apply { grid-column: 2; grid-row: 1 / span 2; padding: 8px 18px; border-radius: 7px; background: #7a1f2e; color: #fff; font-size: 12px; font-weight: 700; cursor: pointer; }
        #voucher-none,#voucher-hemat10,#voucher-azzahroh15 { position: absolute; opacity: 0; pointer-events: none; }
        .voucher-applied { display: none; grid-column: 1 / -1; padding-top: 8px; border-top: 1px solid #eee2dc; color: #4c7651; font-size: 12px; font-weight: 600; }
        .voucher-apply .used-label { display: none; }
        .voucher-azz-applied,.voucher-azz-used { display: none; }
        .voucher-azz-applied { grid-column: 1 / -1; padding-top: 8px; border-top: 1px solid #eee2dc; color: #4c7651; font-size: 12px; font-weight: 600; }
        .checkout-payment:has(#voucher-hemat10:checked) .voucher-applied,
        .checkout-payment:has(#voucher-azzahroh15:checked) .voucher-azz-applied { display: block; }
        .checkout-payment:has(#voucher-hemat10:checked) .voucher-apply.hemat10 .use-label,
        .checkout-payment:has(#voucher-azzahroh15:checked) .voucher-apply.azzahroh15 .use-label { display: none; }
        .checkout-payment:has(#voucher-hemat10:checked) .voucher-apply.hemat10 .used-label,
        .checkout-payment:has(#voucher-azzahroh15:checked) .voucher-apply.azzahroh15 .used-label { display: inline; }
        .voucher-none-label { display: inline-block; margin-top: 8px; color: #7a1f2e; font-size: 11px; text-decoration: underline; cursor: pointer; }
        .payment-summary { margin-top: 14px; padding: 12px 16px; border-radius: 8px; background: rgba(255,255,255,.82); }
        .payment-summary-row { display: flex; justify-content: space-between; gap: 16px; padding: 5px 0; font-size: 13px; }
        .payment-summary-row.discount,.payment-summary-row.voucher-payment-row { display: none; }
        .voucher-code-hemat10,.voucher-code-azzahroh15,.discount-hemat10,.discount-azzahroh15 { display: none; }
        .checkout-payment:has(#voucher-hemat10:checked) .voucher-code-hemat10,
        .checkout-payment:has(#voucher-azzahroh15:checked) .voucher-code-azzahroh15,
        .checkout-payment:has(#voucher-hemat10:checked) .discount-hemat10,
        .checkout-payment:has(#voucher-azzahroh15:checked) .discount-azzahroh15 { display: inline; }
        .payment-value span { display: none; }
        .payment-value .value-default { display: inline; }
        .checkout-payment:has(#voucher-hemat10:checked) .payment-summary-row.discount,
        .checkout-payment:has(#voucher-hemat10:checked) .payment-summary-row.voucher-payment-row,
        .checkout-payment:has(#voucher-azzahroh15:checked) .payment-summary-row.discount,
        .checkout-payment:has(#voucher-azzahroh15:checked) .payment-summary-row.voucher-payment-row { display: flex; }
        .checkout-payment:has(#voucher-hemat10:checked) .voucher-code-azzahroh15,
        .checkout-payment:has(#voucher-azzahroh15:checked) .voucher-code-hemat10,
        .checkout-payment:has(#voucher-hemat10:checked) .discount-azzahroh15,
        .checkout-payment:has(#voucher-azzahroh15:checked) .discount-hemat10 { display: none; }
        .payment-summary-row.total { margin-top: 5px; padding-top: 9px; border-top: 1px solid #ddd8d2; font-size: 15px; font-weight: 800; }
        .total-values span { display: none; }
        .total-values .total-normal { display: inline; }
        .checkout-payment:has(#voucher-hemat10:checked) .total-values .total-normal,
        .checkout-payment:has(#voucher-azzahroh15:checked) .total-values .total-normal { display: none; }
        .checkout-payment:has(#voucher-hemat10:checked) .total-values .total-hemat10,
        .checkout-payment:has(#voucher-azzahroh15:checked) .total-values .total-azzahroh15 { display: inline; }
        .direct-voucher-note { display: none; margin-top: 8px; color: #8a5b24; font-size: 11px; }
        body:has(.direct-purchase:target) .payment-summary-row.discount,
        body:has(.direct-purchase:target) .payment-summary-row.voucher-payment-row { display: none !important; }
        body:has(.direct-purchase:target) .voucher-applied,
        body:has(.direct-purchase:target) .voucher-azz-applied { display: none !important; }
        body:has(.direct-purchase:target):has(#voucher-hemat10:checked) .direct-voucher-note,
        body:has(.direct-purchase:target):has(#voucher-azzahroh15:checked) .direct-voucher-note { display: block; }
        body:has(#beli-tanggo:target) .subtotal-values .value-default,
        body:has(#beli-biscoff:target) .subtotal-values .value-default,
        body:has(#beli-sariroti:target) .subtotal-values .value-default,
        body:has(#beli-silverqueen:target) .subtotal-values .value-default,
        body:has(#beli-pringless:target) .subtotal-values .value-default,
        body:has(#beli-tictac:target) .subtotal-values .value-default,
        body:has(#beli-tanggo:target) .total-values .total-normal,
        body:has(#beli-biscoff:target) .total-values .total-normal,
        body:has(#beli-sariroti:target) .total-values .total-normal,
        body:has(#beli-silverqueen:target) .total-values .total-normal,
        body:has(#beli-pringless:target) .total-values .total-normal,
        body:has(#beli-tictac:target) .total-values .total-normal { display: none; }
        body:has(.direct-purchase:target) .total-values .total-hemat10,
        body:has(.direct-purchase:target) .total-values .total-azzahroh15 { display: none !important; }
        body:has(#beli-tanggo:target) .subtotal-values .value-tanggo,
        body:has(#beli-tanggo:target) .total-values .total-tanggo,
        body:has(#beli-biscoff:target) .subtotal-values .value-biscoff,
        body:has(#beli-biscoff:target) .total-values .total-biscoff,
        body:has(#beli-sariroti:target) .subtotal-values .value-sariroti,
        body:has(#beli-sariroti:target) .total-values .total-sariroti,
        body:has(#beli-silverqueen:target) .subtotal-values .value-silverqueen,
        body:has(#beli-silverqueen:target) .total-values .total-silverqueen,
        body:has(#beli-pringless:target) .subtotal-values .value-pringless,
        body:has(#beli-pringless:target) .total-values .total-pringless,
        body:has(#beli-tictac:target) .subtotal-values .value-tictac,
        body:has(#beli-tictac:target) .total-values .total-tictac { display: inline; }
        .detail-footer-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 20px; }
        @media (max-width: 760px) { .recommendation-grid { grid-template-columns: repeat(2,minmax(0,1fr)); } .checkout-payment { max-width: none; } }
        @media (max-width: 520px) { .recommendation-grid { grid-template-columns: 1fr; } }

        /* BUTTONS RIGHT SIDE */
        .action-col {
            position: absolute; right: 48px; top: 180px;
            display: flex; flex-direction: column; gap: 10px;
        }
        .btn-action {
            padding: 10px 28px; border-radius: 8px; border: none;
            font-family: inherit; font-size: 14px; font-weight: 700;
            cursor: pointer; min-width: 130px; transition: opacity 0.2s; text-decoration: none;
            text-align: center; display: block;
        }
        .btn-action:hover { opacity: 0.85; }
        .btn-tambah { background: #3498db; color: #fff; }
        .btn-batal  { background: #e03030; color: #fff; }
        .btn-simpan { background: #1a1a1a; color: #fff; }

        /* FOOTER */
        .footer { background: #7a1f2e; height: 72px; display: flex; align-items: center; padding: 0 40px; gap: 20px; }
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

    <div class="page-wrapper">
        <div class="content-inner">
            <h1 class="page-title">Detail Transaksi</h1>
            <p class="page-sub">Jangan lupa cek kembali pesanan ya!</p>

            <div class="meta-row">
                <div class="meta-field">
                    <label for="id-trx">ID Transaksi</label>
                    <input type="text" id="id-trx" class="meta-input" readonly>
                </div>
                <div class="meta-field">
                    <label for="nama-user">Nama Pengguna</label>
                    <input type="text" id="nama-user" class="meta-input" readonly>
                </div>
                <div class="meta-field">
                    <label for="tgl-pesan">Tanggal Pemesanan</label>
                    <input type="text" id="tgl-pesan" class="meta-input" readonly>
                </div>
            </div>

            <div class="section-label">Produk yang Dibeli</div>

            <table class="detail-table">
                <thead>
                    <tr class="default-purchase">
                        <th style="width:60px;">No.</th>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="default-purchase">
                        <td>1.</td>
                        <td><div class="td-prod"><img src="../img/produk/tictac.png" alt="Tictac"> Tictac Snack 90 g</div></td>
                        <td>Rp7.100</td>
                        <td>2</td>
                        <td>Rp14.200</td>
                    </tr>
                    <tr class="default-purchase">
                        <td>2.</td>
                        <td><div class="td-prod"><img src="../img/produk/kispray.png" alt="Vixal"> Vixal Lavender 700 ml</div></td>
                        <td>Rp15.700</td>
                        <td>3</td>
                        <td>Rp47.100</td>
                    </tr>
                    <tr class="default-purchase">
                        <td>3.</td>
                        <td><div class="td-prod"><img src="../img/produk/biscoff.png" alt="Biscoff"> Lotus Biscoff 250 g</div></td>
                        <td>Rp29.100</td>
                        <td>2</td>
                        <td>Rp58.200</td>
                    </tr>
                    <tr id="beli-tanggo" class="direct-purchase"><td>1.</td><td><div class="td-prod"><img src="../img/produk/tanggo.png" alt="Tanggo Wafer">Tanggo Wafer Long 100 g</div></td><td>Rp8.500</td><td>1</td><td>Rp8.500</td></tr>
                    <tr id="beli-biscoff" class="direct-purchase"><td>1.</td><td><div class="td-prod"><img src="../img/produk/biscoff.png" alt="Lotus Biscoff">Lotus Biscoff 250 g</div></td><td>Rp29.100</td><td>1</td><td>Rp29.100</td></tr>
                    <tr id="beli-sariroti" class="direct-purchase"><td>1.</td><td><div class="td-prod"><img src="../img/produk/sariroti.png" alt="Sari Roti">Sari Roti Tawar 340 g</div></td><td>Rp15.500</td><td>1</td><td>Rp15.500</td></tr>
                    <tr id="beli-silverqueen" class="direct-purchase"><td>1.</td><td><div class="td-prod"><img src="../img/produk/silverqueen.png" alt="SilverQueen">SilverQueen Matcha 32 g</div></td><td>Rp28.900</td><td>1</td><td>Rp28.900</td></tr>
                    <tr id="beli-pringless" class="direct-purchase"><td>1.</td><td><div class="td-prod"><img src="../img/produk/pringless.png" alt="Pringless">Pringless Kaleng 102 g</div></td><td>Rp28.800</td><td>1</td><td>Rp28.800</td></tr>
                    <tr id="beli-tictac" class="direct-purchase"><td>1.</td><td><div class="td-prod"><img src="../img/produk/tictac.png" alt="Tictac">Tictac Snack 90 g</div></td><td>Rp7.100</td><td>1</td><td>Rp7.100</td></tr>
                </tbody>
            </table>

            <section class="recommendation-section">
                <h2 class="recommendation-title">Produk Untuk Anda</h2>
                <div class="recommendation-grid">
                    <div class="recommendation-card"><img src="../img/produk/tanggo.png" alt="Tanggo Wafer"><span class="recommendation-name">Tanggo Wafer Long 100 g</span><span class="recommendation-price">Rp8.500</span><button type="button" class="recommendation-add">+ Tambahkan</button></div>
                    <div class="recommendation-card"><img src="../img/produk/sariroti.png" alt="Sari Roti"><span class="recommendation-name">Sari Roti Tawar 340 g</span><span class="recommendation-price">Rp15.500</span><button type="button" class="recommendation-add">+ Tambahkan</button></div>
                    <div class="recommendation-card"><img src="../img/produk/pringless.png" alt="Pringless"><span class="recommendation-name">Pringless Kaleng 102 g</span><span class="recommendation-price">Rp28.800</span><button type="button" class="recommendation-add">+ Tambahkan</button></div>
                </div>
                <p class="prototype-note">Rekomendasi ditampilkan terpisah dan belum masuk ke daftar produk yang dibeli.</p>
            </section>

            <section class="checkout-payment">
                <div class="section-label">Voucher Saya</div>
                <input type="radio" name="voucher" id="voucher-none" checked>
                <div class="voucher-control">
                    <input type="radio" name="voucher" id="voucher-hemat10">
                    <div class="voucher-card">
                        <div class="voucher-copy"><strong>HEMAT10</strong><span>Diskon Rp10.000 · Minimal pembelian Rp50.000</span><span>Berlaku sampai 30 November 2026</span></div>
                        <label class="voucher-apply hemat10" for="voucher-hemat10"><span class="use-label">Gunakan</span><span class="used-label">Digunakan</span></label>
                        <div class="voucher-applied">Voucher digunakan: HEMAT10</div>
                    </div>
                </div>
                <div class="voucher-control">
                    <input type="radio" name="voucher" id="voucher-azzahroh15">
                    <div class="voucher-card">
                        <div class="voucher-copy"><strong>AZZAHROH15</strong><span>Diskon 15% · Minimal pembelian Rp25.000</span><span>Berlaku hari ini</span></div>
                        <label class="voucher-apply azzahroh15" for="voucher-azzahroh15"><span class="use-label">Gunakan</span><span class="used-label">Digunakan</span></label>
                        <div class="voucher-azz-applied">Voucher digunakan: AZZAHROH15</div>
                    </div>
                </div>
                <label class="voucher-none-label" for="voucher-none">Lanjut tanpa voucher</label>
                <div class="payment-summary">
                    <div class="payment-summary-row"><span>Subtotal</span><strong class="payment-value subtotal-values"><span class="value-default">Rp119.500</span><span class="value-tanggo">Rp8.500</span><span class="value-biscoff">Rp29.100</span><span class="value-sariroti">Rp15.500</span><span class="value-silverqueen">Rp28.900</span><span class="value-pringless">Rp28.800</span><span class="value-tictac">Rp7.100</span></strong></div>
                    <div class="payment-summary-row voucher-payment-row"><span>Voucher</span><strong><span class="voucher-code-hemat10">HEMAT10</span><span class="voucher-code-azzahroh15">AZZAHROH15</span></strong></div>
                    <div class="payment-summary-row discount"><span>Diskon</span><strong><span class="discount-hemat10">-Rp10.000</span><span class="discount-azzahroh15">-Rp17.925</span></strong></div>
                    <div class="payment-summary-row total"><span>Total Pembayaran</span><strong class="payment-value total-values"><span class="total-normal">Rp119.500</span><span class="total-hemat10">Rp109.500</span><span class="total-azzahroh15">Rp101.575</span><span class="total-tanggo">Rp8.500</span><span class="total-biscoff">Rp29.100</span><span class="total-sariroti">Rp15.500</span><span class="total-silverqueen">Rp28.900</span><span class="total-pringless">Rp28.800</span><span class="total-tictac">Rp7.100</span></strong></div>
                </div>
                <p class="direct-voucher-note">Voucher belum diterapkan pada contoh transaksi produk tunggal ini.</p>
            </section>
        </div>

        <!-- Action buttons - right side -->
        <div class="action-col">
            <a href="katalog-semua.php" class="btn-action btn-tambah">Tambah Pesanan</a>
            <a href="riwayat-pesanan.php" class="btn-action btn-batal">Batal</a>
            <a href="pembayaran.php" class="btn-action btn-simpan">Lanjutkan Pembayaran</a>
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


