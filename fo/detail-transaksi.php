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
            background-color: #f5f0ec;
            color: #222222;
            min-height: 100vh;
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
           PAGE CONTENT
        ================================================== */
        .content-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 36px 44px 60px;
            position: relative;
        }

        /* title row */
        .title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 2.4rem;
            font-weight: 900;
            color: #222222;
            line-height: 1.1;
        }

        .page-subtitle {
            font-size: 14px;
            color: #666666;
            margin-top: 5px;
        }

        .btn-home {
            background-color: #2d6fa8;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 26px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s;
        }

        .btn-home:hover {
            background-color: #245c90;
        }

        /* meta fields */
        .meta-row {
            display: flex;
            gap: 16px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .meta-field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .meta-field label {
            font-size: 12px;
            font-weight: 600;
            color: #666666;
        }

        .meta-input {
            border: 1.5px solid #d0c8c0;
            border-radius: 8px;
            padding: 9px 16px;
            font-family: inherit;
            font-size: 13px;
            min-width: 190px;
            background-color: #ece8e4;
            color: #888888;
            outline: none;
        }

        /* section header */
        .section-title {
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 800;
            color: #222222;
            border: 2.5px solid #222222;
            border-radius: 8px;
            padding: 7px 22px;
            margin-bottom: 18px;
        }

        /* ==================================================
           TABLE
        ================================================== */
        .detail-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.09);
        }

        .detail-table thead tr {
            background-color: #ccc8c2;
        }

        .detail-table th {
            font-size: 14px;
            font-weight: 600;
            padding: 13px 18px;
            text-align: center;
            color: #333333;
        }

        .detail-table tbody tr {
            background-color: #ffffff;
            border-bottom: 1px solid #eeeeee;
        }

        .detail-table tbody tr:last-child {
            border-bottom: none;
        }

        .detail-table td {
            padding: 14px 18px;
            font-size: 14px;
            text-align: center;
            vertical-align: middle;
        }

        .td-produk {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .td-produk img {
            width: 46px;
            height: 46px;
            object-fit: contain;
            background-color: #f9f4f0;
            border-radius: 6px;
            padding: 3px;
        }

        /* total row */
        .total-row td {
            background-color: #ddd8d2;
            font-weight: 700;
            border-top: 2px solid #c0bab2;
        }

        .total-label {
            text-align: right;
            padding-right: 10px;
            font-size: 14px;
            color: #444444;
        }

        .total-value {
            font-size: 1.1rem;
            font-weight: 900;
            color: #222222;
        }

        /* Voucher summary */
        .voucher-row td {
            padding: 14px 18px;
            text-align: left;
            background-color: #ffffff;
        }

        .voucher-box {
            display: grid;
            grid-template-columns: minmax(180px, 0.8fr) minmax(240px, 1.2fr);
            gap: 14px 22px;
            align-items: center;
            padding: 14px 16px;
            border: 1px solid #e5ddd7;
            border-radius: 10px;
            background-color: #faf7f4;
        }

        .voucher-control label,
        .voucher-details strong {
            display: block;
            margin-bottom: 6px;
            color: #333333;
            font-size: 13px;
            font-weight: 700;
        }

        .voucher-select {
            width: 100%;
            min-height: 40px;
            padding: 8px 12px;
            border: 1px solid #d6ccc5;
            border-radius: 7px;
            background-color: #ffffff;
            color: #333333;
            font: inherit;
        }

        .voucher-details p {
            margin: 3px 0;
            color: #66605b;
            font-size: 13px;
        }

        .voucher-details {
            display: none;
        }

        .detail-table tbody:has(.voucher-select option[value="HEMAT10"]:checked) .voucher-details {
            display: block;
        }

        .voucher-note {
            color: #888078 !important;
            font-size: 11px !important;
        }

        .subtotal-row td {
            background-color: #ffffff;
            border-top: 1px solid #eeeeee;
            font-weight: 700;
        }

        .total-with-voucher {
            display: none;
        }

        .detail-table tbody:has(.voucher-select option[value="HEMAT10"]:checked) .total-without-voucher {
            display: none;
        }

        .detail-table tbody:has(.voucher-select option[value="HEMAT10"]:checked) .total-with-voucher {
            display: table-row;
        }

        @media (max-width: 600px) {
            .voucher-box {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }

        /* ==================================================
           ACTION BUTTONS
        ================================================== */
        .action-row {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 22px;
        }

        .btn-batal {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #e03030;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            text-decoration: none;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-batal:hover {
            opacity: 0.85;
        }

        .btn-simpan {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #1a1a1a;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            text-decoration: none;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-simpan:hover {
            opacity: 0.80;
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 700px) {
            .content-container {
                padding: 24px 18px 40px;
            }

            .page-title {
                font-size: 1.7rem;
            }

            .meta-row {
                flex-direction: column;
            }

            .detail-table th,
            .detail-table td {
                padding: 10px 10px;
                font-size: 12px;
            }
        }
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

    <!-- TOP NAVBAR -->
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

    <!-- CONTENT -->
    <div class="content-container">

        <div class="title-row">
            <div>
                <h1 class="page-title">Lihat Detail Transaksi</h1>
                <p class="page-subtitle">Kelola seluruh transaksi pembelian</p>
            </div>
            <a href="dashbore.html" class="btn-home">Home</a>
        </div>

        <!-- Meta fields -->
        <div class="meta-row">
            <div class="meta-field">
                <label for="id-transaksi">ID Transaksi</label>
                <input type="text" id="id-transaksi" class="meta-input" readonly placeholder="">
            </div>
            <div class="meta-field">
                <label for="nama-fo">Nama Front Office</label>
                <input type="text" id="nama-fo" class="meta-input" readonly placeholder="">
            </div>
            <div class="meta-field">
                <label for="tgl-pesanan">Tanggal Pemesanan</label>
                <input type="text" id="tgl-pesanan" class="meta-input" readonly placeholder="">
            </div>
        </div>

        <div class="section-title">Daftar Produk Pesanan</div>

        <table class="detail-table">
            <thead>
                <tr>
                    <th style="width:60px;">No.</th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>
                        <div class="td-produk">
                            <img src="../img/produk/tictac.png" alt="Tictac Snack 90g">
                            Tictac Snack 90 g
                        </div>
                    </td>
                    <td>Rp7.100</td>
                    <td>2</td>
                    <td>Rp14.200</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>
                        <div class="td-produk">
                            <img src="../img/produk/kispray.png" alt="Vixal Lavender 700ml">
                            Vixal Lavender 700 ml
                        </div>
                    </td>
                    <td>Rp15.700</td>
                    <td>3</td>
                    <td>Rp47.100</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>
                        <div class="td-produk">
                            <img src="../img/produk/biscoff.png" alt="Lotus Biscoff 250g">
                            Lotus Biscoff 250 g
                        </div>
                    </td>
                    <td>Rp29.100</td>
                    <td>2</td>
                    <td>Rp58.200</td>
                </tr>
                <tr class="subtotal-row">
                    <td colspan="3" style="background-color:#ffffff;"></td>
                    <td class="total-label">Subtotal &nbsp;|</td>
                    <td class="total-value">Rp119.500</td>
                </tr>
                <tr class="voucher-row">
                    <td colspan="5">
                        <div class="voucher-box">
                            <div class="voucher-control">
                                <label for="voucher">Voucher (opsional)</label>
                                <select id="voucher" class="voucher-select" name="voucher">
                                    <option value="">Pilih Voucher</option>
                                    <option value="HEMAT10">HEMAT10</option>
                                </select>
                            </div>
                            <div class="voucher-details">
                                <strong>Contoh voucher: HEMAT10</strong>
                                <p>Jenis diskon: Nominal</p>
                                <p>Nilai diskon: -Rp10.000</p>
                                <p class="voucher-note">Simulasi total dengan voucher</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="total-row total-without-voucher">
                    <td colspan="3" style="background-color:#ddd8d2;"></td>
                    <td class="total-label">Total Bayar &nbsp;|</td>
                    <td class="total-value">Rp119.500</td>
                </tr>
                <tr class="total-row total-with-voucher">
                    <td colspan="3" style="background-color:#ddd8d2;"></td>
                    <td class="total-label">Total Bayar &nbsp;|</td>
                    <td class="total-value">Rp109.500</td>
                </tr>
            </tbody>
        </table>

        <div class="action-row">
            <a href="katalog-semua.html" class="btn-batal">Batal</a>
            <a href="pembayaran.html" class="btn-simpan">Simpan</a>
        </div>

    </div>

</body>
</html>

