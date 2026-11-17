<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - Warung Azzahroh</title>

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
            background-color: #f0ebe5;
            color: #222222;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ==================================================
           HEADER
        ================================================== */
        .struk-header {
            background-color: #8B1A2B;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .header-logo {
            height: 44px;
            object-fit: contain;
        }

        .header-user {
            width: 40px;
            height: 40px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-user svg {
            width: 22px;
            height: 22px;
            fill: #8B1A2B;
        }

        /* ==================================================
           BACK BUTTON
        ================================================== */
        .btn-back {
            background-color: #d4cfc9;
            border: none;
            border-radius: 6px;
            padding: 6px 18px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            color: #333333;
            cursor: pointer;
            text-decoration: none;
            display: block;
            width: fit-content;
            margin: 20px 0 20px 48px;
            transition: background-color 0.2s;
        }

        .btn-back:hover {
            background-color: #c4bfb9;
        }

        /* ==================================================
           STRUK CARD
        ================================================== */
        .struk-card {
            background-color: #ffffff;
            border-radius: 12px;
            max-width: 480px;
            margin: 0 auto;
            padding: 36px 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        .struk-logo {
            height: 60px;
            display: block;
            margin: 0 auto 8px;
            object-fit: contain;
        }

        .struk-heading {
            text-align: center;
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: 1px;
            margin-bottom: 4px;
            color: #222222;
        }

        .struk-line {
            border-top: 1px solid #ddd;
            margin: 12px 0;
        }

        /* Transaction Info */
        .struk-info {
            font-size: 14px;
            color: #333333;
        }

        .info-row {
            display: flex;
            align-items: baseline;
            padding: 3px 0;
        }

        .info-label {
            min-width: 160px;
            color: #444444;
        }

        .info-sep {
            margin: 0 6px;
            color: #444444;
        }

        .info-value {
            font-weight: 600;
            color: #222222;
        }

        /* Product Table */
        .produk-table {
            width: 100%;
            border-collapse: collapse;
        }

        .produk-table th {
            background-color: #f0ece8;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 6px;
            color: #444444;
            text-align: center;
        }

        .produk-table th.col-produk {
            text-align: left;
        }

        .produk-table th.col-harga,
        .produk-table th.col-subtotal {
            text-align: right;
        }

        .produk-table td {
            font-size: 13px;
            padding: 9px 6px;
            text-align: center;
            border-bottom: 1px solid #f0ece8;
            color: #333333;
        }

        .produk-table td.td-produk {
            text-align: left;
        }

        .produk-table td.td-num,
        .produk-table td.td-qty {
            text-align: center;
        }

        .produk-table td.td-harga,
        .produk-table td.td-subtotal {
            text-align: right;
        }

        /* Summary */
        .struk-summary {
            font-size: 14px;
        }

        .summary-row {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 16px;
            padding: 4px 0;
            color: #333333;
        }

        .summary-label {
            color: #555555;
        }

        .summary-value {
            font-weight: 600;
            min-width: 90px;
            text-align: right;
        }

        .summary-total {
            background-color: #f5b8b8;
            border-radius: 6px;
            padding: 8px 14px;
            font-weight: 700;
            margin-top: 8px;
            justify-content: space-between;
        }

        .summary-total .summary-label {
            color: #222222;
            font-weight: 700;
        }

        .summary-total .summary-value {
            color: #222222;
            font-weight: 800;
        }

        /* Thanks */
        .struk-thanks {
            text-align: center;
            font-size: 13px;
            color: #666666;
            margin-top: 4px;
            line-height: 1.5;
        }

        /* ==================================================
           FOOTER
        ================================================== */
        .struk-footer {
            background-color: #8B1A2B;
            height: 72px;
            display: flex;
            align-items: center;
            padding: 0 36px;
            gap: 20px;
            margin-top: 28px;
        }

        .footer-logo {
            height: 46px;
            object-fit: contain;
        }

        .footer-divider {
            width: 2px;
            height: 38px;
            background-color: #ffffff;
            flex-shrink: 0;
        }

        .footer-tagline {
            font-family: Georgia, 'Times New Roman', serif;
            font-style: italic;
            color: #f5e8c8;
            font-size: 15px;
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 560px) {
            .struk-card {
                padding: 24px 22px;
                margin: 0 14px;
            }

            .btn-back {
                margin-left: 20px;
            }

            .info-label {
                min-width: 130px;
            }

            .produk-table th,
            .produk-table td {
                font-size: 12px;
                padding: 7px 4px;
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

    <!-- HEADER -->
    <header class="struk-header">
        <img src="../img/logo-utama.png" alt="Warung Azzahroh" class="header-logo">
        <div class="header-user">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
    </header>

    <!-- BACK BUTTON -->
    <a href="riwayat-transaksi.html" class="btn-back">Kembali</a>

    <!-- STRUK CARD -->
    <div class="struk-card">
        <img src="../img/logo-utama.png" alt="Warung Azzahroh" class="struk-logo">
        <div class="struk-heading">STRUK PEMBAYARAN</div>

        <div class="struk-line"></div>

        <!-- Transaction Info -->
        <div class="struk-info">
            <div class="info-row">
                <span class="info-label">ID Transaksi</span><span class="info-sep">:</span><span class="info-value">TRX0002</span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal</span><span class="info-sep">:</span><span class="info-value">11 Nov 2026, 11:13</span>
            </div>
            <div class="info-row">
                <span class="info-label">Metode Pembayaran</span><span class="info-sep">:</span><span class="info-value">Qris</span>
            </div>
        </div>

        <div class="struk-line"></div>

        <!-- Product Table -->
        <table class="produk-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="col-produk">Produk</th>
                    <th>Qty</th>
                    <th class="col-harga">Harga</th>
                    <th class="col-subtotal">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-num">1</td>
                    <td class="td-produk">Rinso 1kg</td>
                    <td class="td-qty">2</td>
                    <td class="td-harga">Rp32.300</td>
                    <td class="td-subtotal">Rp62.300</td>
                </tr>
                <tr>
                    <td class="td-num">2</td>
                    <td class="td-produk">Tango 200g</td>
                    <td class="td-qty">4</td>
                    <td class="td-harga">Rp5.300</td>
                    <td class="td-subtotal">Rp20.300</td>
                </tr>
            </tbody>
        </table>

        <div class="struk-line"></div>

        <!-- Summary -->
        <div class="struk-summary">
            <div class="summary-row">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value">Rp82.300</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Voucher</span>
                <span class="summary-value">HEMAT10</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Diskon</span>
                <span class="summary-value">-Rp10.000</span>
            </div>
            <div class="summary-row summary-total">
                <span class="summary-label">Total Bayar</span>
                <span class="summary-value">Rp72.300</span>
            </div>
        </div>

        <div class="struk-line"></div>

        <!-- Thanks -->
        <div class="struk-thanks">
            <p>Terimakasih Telah</p>
            <p>Berbelanja di Warung Azzahroh</p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="struk-footer">
        <img src="../img/logo-utama.png" alt="Warung Azzahroh" class="footer-logo">
        <div class="footer-divider"></div>
        <span class="footer-tagline">Belanja kebutuhan sehari-hari</span>
    </footer>

</body>
</html>


