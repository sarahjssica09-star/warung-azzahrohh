<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRIS - Warung Azzahroh</title>

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
            background-image:
                radial-gradient(ellipse at 8% 18%, rgba(122,31,46,.15), transparent 29%),
                radial-gradient(ellipse at 92% 66%, rgba(216,174,105,.22), transparent 27%),
                radial-gradient(ellipse at 68% 16%, rgba(122,31,46,.07), transparent 25%),
                repeating-radial-gradient(circle at 100% 0%, transparent 0 125px, rgba(122,31,46,.04) 126px 127px, transparent 128px 180px),
                linear-gradient(135deg, #fbf6f1 0%, #f0e5dc 100%);
            background-attachment: fixed;
            color: #222222;
            min-height: 100vh;
        }

        /* ==================================================
           TOP NAVBAR
        ================================================== */
        .top-navbar {
            background-color: #8B1A2B;
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
            fill: #8B1A2B;
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
            padding: 32px 60px 110px;
        }

        .btn-back {
            background-color: #d4cfc9;
            border: none;
            border-radius: 6px;
            padding: 6px 16px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            color: #333333;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 16px;
            transition: background-color 0.2s;
        }

        .btn-back:hover {
            background-color: #c4bfb9;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 900;
            color: #222222;
            text-align: center;
            line-height: 1.1;
        }

        .page-subtitle {
            color: #666666;
            text-align: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        /* ==================================================
           DETAIL BAR
        ================================================== */
        .detail-bar {
            max-width: 700px;
            margin: 0 auto 28px;
            border: 1.5px solid #ccc;
            border-radius: 10px;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: #ffffff;
        }

        .btn-detail-trx {
            background-color: #c8c0b8;
            color: #333333;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s;
        }

        .btn-detail-trx:hover {
            background-color: #bab1a8;
        }

        .bar-divider {
            width: 1px;
            height: 34px;
            background-color: #ccc;
            flex-shrink: 0;
        }

        .bar-text {
            font-size: 15px;
            font-weight: 600;
            color: #333333;
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
            color: #888888;
            font-weight: 500;
        }

        .bar-total-value {
            font-size: 1.4rem;
            font-weight: 900;
            color: #8B1A2B;
            line-height: 1.1;
        }

        /* ==================================================
           QR AREA
        ================================================== */
        .qr-area {
            display: flex;
            gap: 60px;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 850px;
            margin: 8px auto 20px;
            padding: 24px 34px;
            border: 1px solid rgba(255,255,255,.72);
            border-radius: 24px;
            background: rgba(255,255,255,.66);
            box-shadow: 0 16px 38px rgba(75,35,32,.10);
            backdrop-filter: blur(12px);
        }

        .qr-img {
            width: 260px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .pay-time-label {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 12px;
            color: #4a2828;
        }

        .pay-time-col {
            min-width: 300px;
            padding: 22px 24px;
            border: 1px solid #f0e2dc;
            border-radius: 18px;
            background: linear-gradient(145deg, #fffdfa, #f8efea);
            box-shadow: 0 8px 22px rgba(76,37,34,.07);
        }

        .pay-hint { margin: 11px 0 0; color: #8a7772; font-size: .76rem; line-height: 1.55; }

        .timer {
            background: linear-gradient(135deg, #d7443e, #b92735);
            color: #ffffff;
            font-size: 2.4rem;
            font-weight: 900;
            border-radius: 10px;
            padding: 18px 32px;
            letter-spacing: 4px;
            display: inline-block;
            box-shadow: 0 8px 18px rgba(185,39,53,.2);
        }

        .upload-card {
            width: 100%;
            max-width: 850px;
            margin: 0 auto;
            padding: 22px 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            border: 1px solid rgba(122,31,46,.12);
            border-radius: 18px;
            background: rgba(255,255,255,.86);
            box-shadow: 0 12px 30px rgba(75,35,32,.08);
        }

        .upload-copy { display: flex; align-items: center; gap: 14px; }
        .upload-icon {
            width: 46px; height: 46px; flex: 0 0 46px;
            display: grid; place-items: center;
            border-radius: 14px; color: #7a1f2e; background: #f7e9e5;
        }
        .upload-icon svg { width: 23px; height: 23px; }
        .upload-title { display: block; color: #492b2b; font-size: 1rem; font-weight: 700; }
        .upload-hint { display: block; margin-top: 3px; color: #877874; font-size: .78rem; }
        .upload-input {
            width: min(100%, 350px);
            color: #695956;
            font: 500 .8rem 'Poppins', sans-serif;
        }
        .upload-input::file-selector-button {
            margin-right: 12px;
            padding: 10px 15px;
            border: 0;
            border-radius: 10px;
            color: #fff;
            background: #7a1f2e;
            font: 600 .78rem 'Poppins', sans-serif;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }
        .upload-input::file-selector-button:hover { background: #5f1825; transform: translateY(-1px); }

        .btn-lanjutkan {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            position: fixed;
            right: 34px;
            bottom: 24px;
            z-index: 200;
            margin: 0;
            width: max-content;
            padding: 13px 25px;
            border: 0;
            border-radius: 12px;
            color: #fff;
            background: linear-gradient(120deg, #842b3a, #641b29);
            box-shadow: 0 9px 22px rgba(100,27,41,.2);
            font: 700 15px 'Poppins', sans-serif;
            text-decoration: none;
            transition: transform .2s, box-shadow .2s, background .2s;
        }
        .btn-lanjutkan:hover { transform: translateY(-2px); box-shadow: 0 13px 26px rgba(100,27,41,.27); background: #581723; }
        .btn-lanjutkan svg { width: 18px; height: 18px; }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 760px) {
            .content-container {
                padding: 24px 20px 120px;
            }

            .detail-bar {
                flex-wrap: wrap;
                gap: 12px;
            }

            .bar-total {
                margin-left: 0;
                text-align: left;
            }

            .qr-area {
                flex-direction: column;
                gap: 20px;
                padding: 18px;
            }
            .qr-img { width: min(100%, 280px); }
            .pay-time-col { min-width: 0; width: min(100%, 320px); text-align: center; }
            .timer { font-size: 1.8rem; padding: 14px 22px; }
            .upload-card { flex-direction: column; align-items: stretch; padding: 18px; gap: 16px; }
            .upload-input { width: 100%; }
            .btn-lanjutkan { position: static; width: 100%; margin: 16px auto 0; }
        }

        @media (min-width: 761px) and (max-height: 950px) {
            .content-container { padding: 14px 36px 20px; }
            .btn-back { margin-bottom: 7px; padding: 5px 14px; }
            .page-title { font-size: 2rem; }
            .page-subtitle { margin-bottom: 12px; font-size: .82rem; }
            .detail-bar { max-width: 760px; margin-bottom: 12px; padding: 8px 18px; gap: 14px; }
            .btn-detail-trx { padding: 8px 14px; font-size: 12px; }
            .bar-text { font-size: 13px; }
            .bar-total-label { font-size: 10px; }
            .bar-total-value { font-size: 1.2rem; }
            .qr-area { max-width: 820px; gap: 34px; margin: 0 auto 12px; padding: 18px 30px; }
            .qr-img { width: 235px; border: 7px solid #fff; }
            .pay-time-col { min-width: 280px; padding: 18px 20px; }
            .pay-time-label { margin-bottom: 8px; font-size: 1rem; }
            .timer { padding: 13px 22px; font-size: 1.9rem; letter-spacing: 3px; }
            .pay-hint { margin-top: 9px; font-size: .7rem; }
            .upload-card { max-width: 760px; min-height: 66px; padding: 10px 16px; gap: 14px; }
            .upload-copy { gap: 10px; }
            .upload-icon { width: 38px; height: 38px; flex-basis: 38px; border-radius: 11px; }
            .upload-icon svg { width: 20px; height: 20px; }
            .upload-title { font-size: .88rem; }
            .upload-hint { margin-top: 1px; font-size: .68rem; }
            .upload-input { width: min(100%, 310px); font-size: .72rem; }
            .upload-input::file-selector-button { margin-right: 8px; padding: 8px 11px; font-size: .7rem; }
            .btn-lanjutkan { right: 30px; bottom: 22px; padding: 11px 22px; font-size: 14px; }
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
    <main class="content-container">
        <a href="pembayaran.html" class="btn-back">Kembali</a>

        <h1 class="page-title">QRIS</h1>
        <p class="page-subtitle">Lakukan pembayaran untuk melakukan transaksi</p>

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

        <!-- QR AREA -->
        <div class="qr-area">
            <img src="../img/fo/qris.png" alt="QRIS" class="qr-img">
            <div class="pay-time-col">
                <div class="pay-time-label">Waktu Pembayaran :</div>
                <div class="timer">00 : 02 : 00</div>
                <p class="pay-hint">Scan kode QR melalui aplikasi bank atau dompet digital.</p>
            </div>
        </div>

        <section class="upload-card" aria-labelledby="upload-title">
            <div class="upload-copy">
                <span class="upload-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m17 8-5-5-5 5M12 3v12"/></svg>
                </span>
                <span><span class="upload-title" id="upload-title">Unggah Bukti Transaksi</span><span class="upload-hint">Pilih foto atau PDF bukti pembayaran QRIS.</span></span>
            </div>
            <input class="upload-input" type="file" id="bukti-transaksi" name="bukti_transaksi" accept="image/*,application/pdf" aria-label="Pilih bukti transaksi">
        </section>

        <a href="pembayaran-berhasil.html" class="btn-lanjutkan">
            Lanjutkan
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
    </main>

</body>
</html>


