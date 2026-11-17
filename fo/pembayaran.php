<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Warung Azzahroh</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ==================================================
           RESET & BASE
        ================================================== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        @keyframes fadeUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        @keyframes cardPop { from { opacity:0; transform:scale(0.94) translateY(14px); } to { opacity:1; transform:scale(1) translateY(0); } }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            /* Gradient background: deep maroon to warm brown */
            background: linear-gradient(145deg, #3d0d14 0%, #7a1f2e 35%, #a8503c 70%, #c4784c 100%);
            background-attachment: fixed;
            color: #222222;
        }

        /* Background overlay texture */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: url('../img/backgroundall.png') center/cover no-repeat;
            opacity: 0.08;
            pointer-events: none;
            z-index: 0;
        }

        /* ==================================================
           TOP NAVBAR
        ================================================== */
        .top-navbar {
            background-color: #7a1f2e;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 36px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
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
           CONTENT
        ================================================== */
        .content-container {
            position: relative;
            z-index: 1;
            padding: 44px 60px 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Page title */
        .page-title {
            font-size: 2.8rem;
            font-weight: 900;
            color: #ffffff;
            line-height: 1.1;
            text-align: center;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            margin-bottom: 6px;
            animation: fadeUp 0.5s ease both;
        }

        .page-subtitle {
            font-size: 0.95rem;
            color: rgba(255,255,255,0.72);
            text-align: center;
            margin-bottom: 32px;
            animation: fadeUp 0.5s ease 0.1s both;
        }

        /* ==================================================
           DETAIL BAR
        ================================================== */
        .detail-bar {
            border: 1.5px solid rgba(255,255,255,0.25);
            border-radius: 14px;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 36px;
            width: 100%;
            max-width: 680px;
            background-color: rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            animation: fadeUp 0.5s ease 0.15s both;
        }

        .btn-detail-trx {
            background-color: rgba(255,255,255,0.9);
            color: #7a1f2e;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-detail-trx:hover {
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .bar-divider {
            width: 1px;
            height: 34px;
            background-color: rgba(255,255,255,0.3);
            flex-shrink: 0;
        }

        .bar-text {
            font-size: 15px;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
            white-space: nowrap;
        }

        .bar-total {
            display: flex;
            flex-direction: column;
            margin-left: auto;
            text-align: right;
        }

        .bar-total-label {
            font-size: 12px;
            color: rgba(255,255,255,0.65);
            font-weight: 500;
        }

        .bar-total-value {
            font-size: 1.5rem;
            font-weight: 900;
            color: #f5c842;
            line-height: 1.1;
        }

        .payment-summary {
            width: 100%;
            max-width: 760px;
            margin-bottom: 24px;
            padding: 16px 20px;
            border: 1px solid rgba(255,255,255,0.28);
            border-radius: 12px;
            background: rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.9);
        }

        .payment-summary-row {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            padding: 6px 0;
            font-size: 14px;
        }

        .payment-summary-row + .payment-summary-row {
            border-top: 1px solid rgba(255,255,255,0.16);
        }

        .payment-summary-row.total {
            margin-top: 5px;
            padding-top: 12px;
            color: #f5c842;
            font-size: 16px;
            font-weight: 800;
        }

        .payment-summary-note {
            margin-top: 7px;
            color: rgba(255,255,255,0.65);
            font-size: 11px;
        }

        /* ==================================================
           PAYMENT BOX
        ================================================== */
        .payment-box {
            width: 100%;
            max-width: 760px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 24px;
            padding: 36px 44px 40px;
            animation: cardPop 0.55s ease 0.2s both;
        }

        .box-top-row {
            display: flex;
            align-items: center;
            margin-bottom: 28px;
        }

        .btn-back {
            background-color: rgba(255,255,255,0.15);
            border: 1.5px solid rgba(255,255,255,0.35);
            border-radius: 8px;
            padding: 7px 18px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            align-self: flex-start;
            margin-bottom: 18px;
        }

        .btn-back:hover {
            background-color: rgba(255,255,255,0.25);
            color: #fff;
        }

        .btn-back svg {
            width: 14px; height: 14px;
            fill: none; stroke: currentColor;
            stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;
        }

        .method-title-wrapper {
            flex: 1;
            text-align: center;
        }

        .method-title {
            display: inline-block;
            border: 1.5px solid rgba(255,255,255,0.4);
            border-radius: 50px;
            padding: 10px 28px;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.3px;
            background: rgba(255,255,255,0.1);
        }

        /* ==================================================
           METHOD OPTIONS
        ================================================== */
        .method-options {
            display: flex;
            gap: 32px;
            justify-content: center;
        }

        .method-card {
            background-color: #ffffff;
            border: 2px solid transparent;
            border-radius: 20px;
            padding: 28px 24px 22px;
            text-align: center;
            cursor: pointer;
            width: 280px;
            text-decoration: none;
            color: inherit;
            transition: all 0.25s;
            box-shadow: 0 8px 28px rgba(0,0,0,0.18);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        .method-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 48px rgba(0,0,0,0.3);
            border-color: #7a1f2e;
        }

        .method-card-img-wrap {
            width: 220px;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7f2ee;
            border-radius: 12px;
            overflow: hidden;
        }

        .method-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
        }

        .method-label {
            font-weight: 800;
            font-size: 1.15rem;
            color: #222222;
            letter-spacing: 0.5px;
        }

        .method-desc {
            font-size: 12px;
            color: #888;
            font-weight: 500;
            margin-top: -10px;
        }

        /* ==================================================
           BATAL BUTTON (fixed)
        ================================================== */
        .btn-batal {
            background: linear-gradient(135deg, #e02020 0%, #b01818 100%);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            padding: 13px 30px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            position: fixed;
            bottom: 32px;
            right: 48px;
            z-index: 200;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 24px rgba(220,32,32,0.4);
            transition: all 0.2s;
        }

        .btn-batal:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(220,32,32,0.5);
        }

        .btn-batal svg {
            width: 16px; height: 16px;
            fill: none; stroke: currentColor;
            stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 760px) {
            .content-container { padding: 32px 20px 120px; }
            .detail-bar { flex-wrap: wrap; }
            .bar-total { margin-left: 0; text-align: left; }
            .method-options { flex-direction: column; align-items: center; }
            .payment-box { padding: 24px 20px; }
        }
    </style>
</head>
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
    <main class="content-container">

        <a href="detail-transaksi.html" class="btn-back">
            <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali
        </a>

        <h1 class="page-title">Pembayaran</h1>
        <p class="page-subtitle">Pilih metode pembayaran untuk menyelesaikan transaksi</p>

        <!-- DETAIL BAR -->
        <div class="detail-bar">
            <a href="detail-transaksi.html" class="btn-detail-trx">Detail Transaksi</a>
            <div class="bar-divider"></div>
            <span class="bar-text">ID Transaksi : TRX001</span>
            <div class="bar-divider"></div>
            <div class="bar-total">
                <span class="bar-total-label">Total Pembayaran</span>
                <span class="bar-total-value">Rp109.500</span>
            </div>
        </div>

        <div class="payment-summary" aria-label="Ringkasan pembayaran">
            <div class="payment-summary-row">
                <span>Subtotal</span>
                <strong>Rp119.500</strong>
            </div>
            <div class="payment-summary-row">
                <span>Voucher</span>
                <strong>HEMAT10</strong>
            </div>
            <div class="payment-summary-row">
                <span>Diskon</span>
                <strong>-Rp10.000</strong>
            </div>
            <div class="payment-summary-row total">
                <span>Total Pembayaran</span>
                <strong>Rp109.500</strong>
            </div>
            <p class="payment-summary-note">Contoh ringkasan voucher; nominal ditampilkan sebagai prototype statis.</p>
        </div>

        <!-- PAYMENT BOX -->
        <div class="payment-box">
            <div class="box-top-row">
                <div class="method-title-wrapper">
                    <span class="method-title">Pilih Metode Pembayaran</span>
                </div>
            </div>

            <div class="method-options">
                <!-- QRIS -->
                <a href="qris.html" class="method-card">
                    <div class="method-card-img-wrap">
                        <img src="../img/tombol-qris.png" alt="QRIS">
                    </div>
                    <div class="method-label">QRIS</div>
                    <div class="method-desc">Bayar lewat scan QR code</div>
                </a>

                <!-- TUNAI -->
                <a href="pembayaran-berhasil.html" class="method-card">
                    <div class="method-card-img-wrap">
                        <img src="../img/tombol-tunai.png" alt="TUNAI">
                    </div>
                    <div class="method-label">TUNAI</div>
                    <div class="method-desc">Bayar langsung dengan uang tunai</div>
                </a>
            </div>
        </div>

    </main>

    <!-- BATAL BUTTON -->
    <a href="katalog-semua.html" class="btn-batal">
        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        Batal
    </a>

</body>
</html>
