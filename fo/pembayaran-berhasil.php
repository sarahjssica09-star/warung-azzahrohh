<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#741d2b">
    <title>Pembayaran Berhasil - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --wine: #741d2b; --wine-dark: #511923; --cream: #faf6f1; --ink: #342122; --muted: #867671; --line: #eee2dc; }
        * { box-sizing: border-box; }
        body {
            min-height: 100vh; margin: 0; color: var(--ink); font-family: 'Poppins', sans-serif;
            background: linear-gradient(145deg, #3d0d14 0%, #7a1f2e 35%, #a8503c 70%, #c4784c 100%);
            background-attachment: fixed;
        }
        body::before { content: ''; position: fixed; inset: 0; background: url('../img/backgroundall.png') center/cover no-repeat; opacity: .08; pointer-events: none; z-index: 0; }
        .topbar { height: 64px; display: flex; align-items: center; justify-content: flex-end; padding: 0 clamp(18px,4vw,48px); background: var(--wine); box-shadow: 0 5px 20px rgba(48,14,22,.18); }
        .user-badge { display: inline-flex; align-items: center; gap: 10px; padding: 5px 17px 5px 6px; border: 1px solid rgba(255,255,255,.28); border-radius: 999px; background: #fff; color: #3e2929; font-size: 13px; font-weight: 600; }
        .user-avatar { width: 31px; height: 31px; display: grid; place-items: center; border-radius: 50%; color: var(--wine); background: #f5e9e5; }
        .user-avatar svg { width: 19px; height: 19px; fill: currentColor; }
        .page { min-height: calc(100vh - 64px); display: flex; flex-direction: column; align-items: center; padding: 26px 20px 48px; }
        .back { align-self: flex-start; display: inline-flex; align-items: center; gap: 7px; margin: 0 0 18px clamp(0px,4vw,48px); padding: 9px 14px; border: 1px solid #e6d8d1; border-radius: 10px; color: #5f413e; background: rgba(255,255,255,.8); font-size: 12px; font-weight: 600; text-decoration: none; transition: .2s ease; }
        .back:hover { color: white; border-color: var(--wine); background: var(--wine); transform: translateX(-2px); }
        .back svg { width: 16px; height: 16px; }
        .success-card { width: min(100%,650px); margin: auto; padding: clamp(28px,5vw,48px); border: 1px solid rgba(255,255,255,.85); border-radius: 25px; background: rgba(255,253,250,.94); box-shadow: 0 22px 60px rgba(69,35,32,.14); text-align: center; }
        .success-mark { width: 76px; height: 76px; display: grid; place-items: center; margin: 0 auto 18px; border: 1px solid #d9e9d9; border-radius: 50%; color: #47734c; background: #edf5eb; box-shadow: 0 9px 22px rgba(71,115,76,.12); }
        .success-mark svg { width: 40px; height: 40px; }
        .eyebrow { margin: 0 0 7px; color: #9a6b63; font-size: 10px; font-weight: 700; letter-spacing: .16em; }
        h1 { margin: 0; color: #392426; font-size: clamp(26px,5vw,36px); font-weight: 800; letter-spacing: -.035em; line-height: 1.2; }
        .subtitle { margin: 10px 0 26px; color: var(--muted); font-size: 13px; line-height: 1.7; }
        .transaction-details { padding: 6px 18px; border: 1px solid var(--line); border-radius: 15px; background: #fff; text-align: left; }
        .detail-row { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 13px 0; border-bottom: 1px solid #f2eae6; font-size: 12px; }
        .detail-row:last-child { border-bottom: 0; }
        .detail-label { color: #887874; }
        .detail-value { color: #422e2d; font-weight: 700; text-align: right; }
        .detail-value.total { color: var(--wine); font-size: 18px; }
        .status { display: inline-flex; align-items: center; gap: 6px; padding: 5px 10px; border-radius: 999px; color: #47734c; background: #edf5eb; font-size: 10px; }
        .actions { display: flex; justify-content: center; flex-wrap: wrap; gap: 11px; margin-top: 25px; }
        .action { min-height: 44px; display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 18px; border: 1px solid transparent; border-radius: 11px; font: 700 12px 'Poppins',sans-serif; text-decoration: none; transition: .2s ease; }
        .action.primary { color: #fff; background: linear-gradient(120deg,#842b3a,var(--wine-dark)); box-shadow: 0 8px 18px rgba(100,27,41,.18); }
        .action.primary:hover { transform: translateY(-2px); box-shadow: 0 12px 22px rgba(100,27,41,.24); }
        .action.secondary { color: var(--wine); border-color: #ead8d1; background: #fff; }
        .action.secondary:hover { color: #fff; border-color: var(--wine); background: var(--wine); }
        .action svg { width: 16px; height: 16px; }
        @media (max-width: 520px) { .page { padding: 18px 14px 30px; } .back { margin-left: 0; } .success-card { padding: 28px 19px; border-radius: 20px; } .transaction-details { padding-inline: 13px; } .detail-row { font-size: 11px; } .detail-value.total { font-size: 16px; } .actions { flex-direction: column; } .action { width: 100%; } }
        @media (prefers-reduced-motion: reduce) { *,*::before,*::after { scroll-behavior: auto !important; transition-duration: .01ms !important; } }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="user-badge">
            <span class="user-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></span>
            <span>Front Office</span>
        </div>
    </header>
    <main class="page">
        <a href="katalog-semua.html" class="back"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5m7 7-7-7 7-7"/></svg>Kembali</a>
        <section class="success-card" aria-labelledby="success-title">
            <div class="success-mark" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 4 4L19 6"/></svg></div>
            <p class="eyebrow">TRANSAKSI SELESAI</p>
            <h1 id="success-title">Pembayaran Berhasil</h1>
            <p class="subtitle">Terima kasih telah bertransaksi di Warung Azzahroh. Pembayaran Anda telah dicatat.</p>
            <div class="transaction-details">
                <div class="detail-row"><span class="detail-label">ID Transaksi</span><span class="detail-value">TRX001</span></div>
                <div class="detail-row"><span class="detail-label">Status</span><span class="status">Berhasil</span></div>
                <div class="detail-row"><span class="detail-label">Total Pembayaran</span><span class="detail-value total">Rp109.500</span></div>
            </div>
            <div class="actions">
                <a href="struk.pdf" class="action secondary" target="_blank" rel="noopener">Cetak Struk</a>
                <a href="riwayat-transaksi.html" class="action secondary">Lihat Riwayat Pesanan</a>
                <a href="katalog-semua.html" class="action primary">Kembali ke Katalog</a>
            </div>
        </section>
    </main>
</body>
</html>
