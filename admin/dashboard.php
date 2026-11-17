<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Warung Azzahroh</title>

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ==================================================
           RESET & BASIC STYLES
        ================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f7ebe6;
            color: #222222;
            display: flex;
            min-height: 100vh;
        }

        /* ==================================================
           SIDEBAR (EXACT MATCH DENGAN KATALOG)
        ================================================== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 290px;
            height: 100vh;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid #f0f0f0;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-top {
            display: flex;
            flex-direction: column;
        }

        .sidebar-header-box {
            background-color: #7e3b3d;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .sidebar-logo {
            max-width: 200px;
            max-height: 110px;
            object-fit: contain;
        }

        .sidebar-menu {
            list-style: none;
            padding: 24px 0 10px 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sidebar-menu-item {
            padding: 0 16px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 12px 18px;
            text-decoration: none;
            color: #260404;
            font-size: 20px;
            font-weight: 700;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            background-color: #f7f3f3;
        }

        /* Dashbore AKTIF */
        .sidebar-link.active {
            background-color: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        .sidebar-icon {
            width: 32px;
            height: 32px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .sidebar-bottom {
            display: flex;
            flex-direction: column;
        }

        .sidebar-logout {
            padding: 0 16px 20px 16px;
        }

        .sidebar-footer-bar {
            background-color: #7e3b3d;
            height: 55px;
            width: 100%;
        }

        /* ==================================================
           MAIN CONTENT AREA
        ================================================== */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background-color: #fdf8f6;
            margin-left: 290px;
        }

        /* Top Bar */
        .top-navbar {
            background-color: #faedea;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 45px;
            border-bottom: 1px solid #f2dfdc;
        }

        .admin-profile-badge {
            background: linear-gradient(90deg, #5b1010 0%, #fad4d4 100%);
            border: 1px solid #e0c8c8;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            padding: 4px 20px 4px 6px;
            gap: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .admin-avatar {
            width: 32px;
            height: 32px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-avatar svg {
            width: 20px;
            height: 20px;
            fill: #5b1010;
        }

        .admin-name {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
        }

        /* Page Content */
        .content-container {
            padding: 30px 45px 40px 45px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: -16px;
            color: #8d7a7a;
            font-size: 16px;
        }

        .breadcrumb .current {
            color: #925555;
            font-weight: 600;
        }

        /* ==================================================
           HERO SECTION: HALO ADMIN & STATS
        ================================================== */
        .hero-banner {
            position: relative;
            border-radius: 20px;
            padding: 24px 30px 24px 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            /* overflow visible so character image can exceed banner top */
            overflow: visible;
        }

        /* background + overlay clipped inside the rounded box */
        .hero-banner-bg {
            position: absolute;
            inset: 0;
            border-radius: 20px;
            overflow: hidden;
            z-index: 0;
        }

        .hero-banner-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('../img/toko-asli.png') no-repeat right center / cover;
        }

        .hero-banner-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.96) 0%, rgba(255,248,245,0.90) 60%, rgba(255,248,245,0.65) 100%);
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hero-left-content {
            flex: 1;
            max-width: 720px;
        }

        .hero-title {
            font-size: 50px;
            font-weight: 800;
            color: #252525;
            line-height: 1.1;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        .hero-subtitle {
            font-size: 16px;
            font-weight: 400;
            color: #333333;
            margin-top: 6px;
            margin-bottom: 22px;
        }

        /* 4 Stats Cards Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            max-width: 660px;
        }

        .stat-card {
            background: linear-gradient(135deg, #5c2424 0%, #682c2c 100%);
            border-radius: 12px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            color: #ffffff;
            min-height: 72px;
            text-decoration: none;
            cursor: default;
        }

        .stat-label {
            font-size: 16px;
            font-weight: 600;
            color: #f7e6e6;
            line-height: 1.2;
            max-width: 140px;
        }

        .stat-number {
            font-size: 38px;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .stat-number.gold {
            font-size: 26px;
            color: #d4c546;
            font-weight: 800;
            background-color: #801b1b;
            padding: 4px 14px;
            border-radius: 10px;
            white-space: nowrap;
        }

        /* Employees Graphic on the Right */
        .hero-employees-box {
            width: 320px;
            flex-shrink: 0;
            margin-left: 20px;
            /* align-self stretch so the box fills the full banner height */
            align-self: stretch;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
        }

        .hero-employees-img {
            /* sit exactly on the bottom edge of the banner */
            position: absolute;
            bottom: -24px;          /* matches banner padding-bottom 24px */
            right: 0;
            height: 115%;           /* taller than banner so feet touch the edge */
            width: auto;
            max-width: none;
            object-fit: contain;
            object-position: bottom;
            filter: drop-shadow(0 6px 14px rgba(0, 0, 0, 0.22));
        }

        /* Bottom row: columns stretch to same height */
        .dashboard-columns {
            display: flex;
            gap: 24px;
            align-items: stretch;
        }

        /* Left Column: Transaksi Terbaru */
        .transaksi-card {
            flex: 1.35;
            background: linear-gradient(135deg, #f0e5e5 0%, #d8bebe 100%);
            border-radius: 20px;
            padding: 24px 26px 20px 26px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .transaksi-header-title {
            font-size: 32px;
            font-weight: 800;
            color: #252525;
            letter-spacing: -0.5px;
            margin-bottom: 18px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .transaksi-table-header {
            background-color: #631616;
            border-radius: 10px;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 14px;
        }

        .col-id { width: 22%; }
        .col-pelanggan { width: 33%; }
        .col-total { width: 25%; }
        .col-status { width: 20%; text-align: center; }

        .transaksi-table-body {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 22px;
        }

        .transaksi-row {
            display: flex;
            align-items: center;
            padding: 4px 18px;
            font-size: 14.5px;
            color: #222222;
        }

        .badge-id {
            background-color: #c49f9f;
            color: #1a0505;
            font-weight: 700;
            padding: 4px 14px;
            border-radius: 20px;
            display: inline-block;
            font-size: 13px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.15);
        }

        .nama-pelanggan {
            font-weight: 600;
            color: #250808;
        }

        .total-nominal {
            font-weight: 700;
            color: #111111;
        }

        /* Status Badges */
        .status-pill {
            display: inline-block;
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            min-width: 80px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
        }

        .status-selesai {
            background-color: #c4dbc5;
            color: #1b4b1e;
        }

        .status-diproses {
            background-color: #c5d8ea;
            color: #183e65;
        }

        .status-menunggu {
            background-color: #ebdcb9;
            color: #634d13;
        }

        .btn-lihat-semua-tr {
            align-self: center;
            background-color: #8ea3bc;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            padding: 8px 32px;
            border-radius: 20px;
            text-decoration: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
            transition: all 0.2s ease;
        }

        .btn-lihat-semua-tr:hover {
            background-color: #7990ab;
            transform: translateY(-1px);
        }

        /* Right Column (Stacked Cards) */
        .right-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Widget: Stok Barang */
        .widget-stok {
            background-color: #cbb1b1;
            border-radius: 20px;
            padding: 20px 22px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            flex-shrink: 0;
        }

        .widget-top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .widget-title {
            font-size: 26px;
            font-weight: 800;
            color: #252525;
            line-height: 1.1;
        }

        .btn-lihat-kecil {
            background-color: #ddcccc;
            color: #222222;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            text-decoration: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .btn-lihat-kecil:hover {
            background-color: #caa8a8;
        }

        .stok-items-row {
            display: flex;
            gap: 12px;
        }

        .stok-item-card {
            flex: 1;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 10px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            min-height: 135px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .stok-thumb {
            height: 65px;
            max-width: 100%;
            object-fit: contain;
        }

        .stok-item-title {
            font-size: 11px;
            font-weight: 600;
            color: #333333;
            margin-top: 4px;
            line-height: 1.2;
        }

        .stok-item-qty {
            font-size: 10px;
            color: #666666;
            margin-top: 2px;
        }

        .btn-edit-produk {
            background-color: #009dff;
            color: #000000;
            font-size: 9px;
            font-weight: 700;
            padding: 2px 10px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
            transition: opacity 0.2s;
        }

        .btn-edit-produk:hover {
            opacity: 0.85;
        }

        /* Widget: Aksi Cepat — grows to fill remaining height so bottom aligns with Transaksi card */
        .widget-aksi {
            background-color: #cbb1b1;
            border-radius: 20px;
            padding: 20px 22px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .aksi-buttons-row {
            display: flex;
            justify-content: space-around;
            gap: 14px;
            margin-top: 14px;
        }

        .aksi-btn-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            gap: 8px;
            transition: transform 0.2s;
        }

        .aksi-btn-item:hover {
            transform: translateY(-2px);
        }

        .aksi-icon-box {
            width: 65px;
            height: 65px;
            background: #681515;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .aksi-icon-img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .aksi-btn-label {
            font-size: 11.5px;
            font-weight: 700;
            color: #222222;
            text-align: center;
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 1200px) {
            .dashboard-columns {
                flex-direction: column;
            }

            .hero-employees-box {
                display: none;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 230px;
            }

            .sidebar-link {
                font-size: 16px;
                padding: 10px 14px;
            }

            .content-container {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Dashboard refresh */
        body { background: #f7f3ef; color: #342b2b; }
        .main-wrapper {
            min-height: 100vh;
            background-color: #f7f3ef;
            background-image:
                radial-gradient(ellipse at 12% 10%, rgba(112,36,49,.10), transparent 28%),
                radial-gradient(ellipse at 94% 32%, rgba(198,157,91,.13), transparent 25%),
                radial-gradient(ellipse at 48% 88%, rgba(112,36,49,.065), transparent 32%),
                radial-gradient(rgba(112,36,49,.045) .8px, transparent .8px);
            background-size: auto, auto, auto, 30px 30px;
            background-attachment: fixed;
        }
        .top-navbar {
            position: sticky; top: 0; z-index: 50;
            height: 68px; padding: 0 34px;
            background: rgba(250,246,241,.94);
            border-bottom: 1px solid #eee4df;
            backdrop-filter: blur(12px);
        }
        .admin-profile-badge {
            padding: 4px 15px 4px 5px;
            border: 1px solid #eadbd5;
            background: #fffdfa;
            box-shadow: 0 4px 12px rgba(52,30,27,.06);
        }
        .admin-avatar { background: #f5e9e5; }
        .admin-avatar svg { fill: #702431; }
        .admin-name { color: #4c3938; }
        .content-container { padding: 30px clamp(18px,3.4vw,48px) 42px; gap: 22px; }
        .hero-banner {
            position: relative; isolation: isolate; overflow: hidden; padding: 27px 32px;
            border: 1px solid rgba(255,255,255,.2); border-radius: 21px;
            background: linear-gradient(112deg,#581723 0%,#762432 55%,#91434a 100%);
            box-shadow: 0 16px 38px rgba(90,32,42,.18);
        }
        .hero-banner::before,.hero-banner::after { content: ''; position: absolute; z-index: -1; border-radius: 50%; pointer-events: none; }
        .hero-banner::before { width: 410px; height: 410px; right: 150px; top: -285px; border: 1px solid rgba(255,255,255,.13); box-shadow: 0 0 0 28px rgba(255,255,255,.035),0 0 0 70px rgba(255,255,255,.025); }
        .hero-banner::after { width: 240px; height: 240px; right: 35%; bottom: -195px; background: radial-gradient(circle,rgba(245,200,66,.21),transparent 70%); }
        .hero-banner-bg { display: block; opacity: .22; }
        .hero-banner-bg::before { background: radial-gradient(circle at 82% 16%,rgba(245,200,66,.3),transparent 28%),radial-gradient(circle at 56% 100%,rgba(255,255,255,.12),transparent 38%); }
        .hero-banner-bg::after { background: linear-gradient(90deg,rgba(65,15,25,.08),rgba(65,15,25,.12) 58%,rgba(65,15,25,.35)); }
        .hero-inner { display: flex; align-items: center; min-height: 190px; }
        .hero-left-content { position: relative; z-index: 2; max-width: 70%; }
        .dashboard-kicker,.section-kicker {
            margin: 0 0 6px; color: #9a6b63;
            font-size: 10px; font-weight: 700; letter-spacing: .14em;
        }
        .dashboard-kicker { color: #f3d99f; }
        .dashboard-kicker span { padding-inline: 4px; color: rgba(255,255,255,.55); }
        .hero-title {
            color: #fffaf5; font-size: clamp(27px,3vw,38px);
            line-height: 1.15; letter-spacing: -.035em; text-shadow: 0 3px 16px rgba(36,8,15,.2);
        }
        .hero-title span { color: #f4ca68; }
        .hero-subtitle { margin: 10px 0 17px; color: rgba(255,248,241,.8); font-size: 13px; }
        .hero-quick-facts { display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,.78); font-size: 10px; }
        .hero-quick-facts strong { color: #fff; font-size: 13px; }
        .hero-quick-facts i { width: 4px; height: 4px; border-radius: 50%; background: #e9bf62; }
        .hero-employees-box { position: relative; z-index: 1; display: flex; align-self: stretch; align-items: flex-end; justify-content: flex-end; flex: 1; min-width: 210px; margin-left: 16px; }
        .hero-employees-img { position: relative; right: -8px; bottom: -27px; height: 225px; width: auto; max-width: 100%; object-fit: contain; object-position: bottom; filter: drop-shadow(0 13px 19px rgba(30,6,12,.25)); animation: admin-people-float 6s ease-in-out infinite; }
        @keyframes admin-people-float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
        .dashboard-summary { padding: 22px; border: 1px solid #eee2dc; border-radius: 20px; background: linear-gradient(145deg,#fffdfa,#fbf4ef); box-shadow: 0 10px 28px rgba(64,37,33,.055); }
        .summary-heading { display: flex; align-items: center; justify-content: space-between; gap: 14px; margin-bottom: 16px; }
        .summary-heading h2 { margin: 0; color: #342122; font-size: 20px; font-weight: 800; letter-spacing: -.025em; }
        .summary-heading .section-kicker { color: #9a6b63; }
        .summary-link { display: inline-flex; align-items: center; gap: 7px; padding: 8px 12px; border: 1px solid #ead8d1; border-radius: 10px; color: #702431; background: #fff; font-size: 10px; font-weight: 700; text-decoration: none; transition: .2s ease; }
        .summary-link:hover { color: white; background: #702431; border-color: #702431; transform: translateY(-1px); }
        .stats-grid {
            grid-template-columns: repeat(3,minmax(0,1fr));
            gap: 12px; max-width: none;
        }
        .stat-card {
            position: relative; overflow: hidden; min-width: 0; min-height: 103px; justify-content: flex-start;
            gap: 12px; padding: 15px;
            border: 1px solid #eee4df; border-radius: 15px;
            background: #fff; color: #342b2b;
            box-shadow: 0 5px 14px rgba(64,37,33,.055);
            cursor: default;
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        }
        .stat-card::after { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 3px; background: #8c3643; opacity: .72; }
        .stat-card:nth-child(2)::after,.stat-card:nth-child(6)::after { background: #c49640; }
        .stat-card:nth-child(3)::after,.stat-card:nth-child(4)::after { background: #a9654e; }
        .stat-card:nth-child(5)::after { background: #728a68; }
        .stat-card:hover { transform: translateY(-3px); border-color: #dfc8c0; box-shadow: 0 13px 24px rgba(64,37,33,.11); }
        .stat-icon {
            flex: 0 0 38px; width: 38px; height: 38px;
            display: grid; place-items: center; border-radius: 11px;
            color: #702431; background: #f6eae6;
        }
        .stat-icon svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
        .stat-icon.attention { color: #94651f; background: #fbf2df; }
        .stat-icon.warm { color: #9a503d; background: #f8ece6; }
        .stat-copy { min-width: 0; display: flex; flex-direction: column; align-items: flex-start; gap: 3px; }
        .stat-label { max-width: none; color: #7d6d69; font-size: 11px; font-weight: 600; line-height: 1.3; }
        .stat-number,.stat-number.gold,.stat-number.compact {
            padding: 0; color: #342122; background: transparent;
            font-size: 22px; font-weight: 800; line-height: 1.2; white-space: normal;
        }
        .stat-number.compact { font-size: 17px; }
        .stat-number.unavailable { color: #84535a; font-size: 17px; }
        .stat-meta { color: #a0918d; font-size: 9px; line-height: 1.35; }
        .dashboard-columns {
            display: grid; grid-template-columns: minmax(0,1.35fr) minmax(310px,.9fr);
            align-items: start; gap: 20px;
        }
        .transaksi-card,.widget-stok,.widget-aksi {
            min-width: 0; border: 1px solid #eee4df; border-radius: 17px;
            background: #fffdfa; box-shadow: 0 8px 22px rgba(64,37,33,.05);
        }
        .transaksi-card { padding: 21px; gap: 20px; }
        .section-heading { display: flex; align-items: flex-end; justify-content: space-between; gap: 12px; margin-bottom: 14px; }
        .section-kicker { margin-bottom: 4px; }
        .transaksi-header-title,.widget-title {
            margin: 0; color: #342122; font-size: 18px; font-weight: 700;
            line-height: 1.3; letter-spacing: -.02em; text-shadow: none;
        }
        .section-count { color: #9a8984; font-size: 10px; white-space: nowrap; }
        .transaksi-table-header {
            min-height: 39px; margin-bottom: 4px; padding: 8px 10px;
            border-radius: 9px; color: #8d7771; background: #f8f2ee;
            font-size: 10px; font-weight: 700;
        }
        .col-id { width: 22%; }
        .col-pelanggan { width: 32%; }
        .col-total { width: 26%; }
        .col-status { width: 20%; }
        .transaksi-table-body { gap: 0; margin-bottom: 8px; }
        .transaksi-row {
            min-height: 50px; padding: 7px 10px;
            border-bottom: 1px solid #f1e9e5; color: #4a3a38; font-size: 11px;
        }
        .badge-id { padding: 4px 8px; color: #702431; background: #f6eae6; box-shadow: none; font-size: 10px; }
        .nama-pelanggan,.total-nominal { color: #453534; font-weight: 600; }
        .status-pill { min-width: 0; padding: 4px 8px; font-size: 9px; box-shadow: none; }
        .status-selesai { background: #e7f1e7; color: #38623b; }
        .status-diproses { background: #e8eff7; color: #385a7c; }
        .status-menunggu { background: #f8f0db; color: #785f1d; }
        .btn-lihat-semua-tr {
            align-self: flex-start; padding: 9px 14px; border-radius: 9px;
            color: #702431; background: #f6eae6; box-shadow: none; font-size: 11px;
        }
        .btn-lihat-semua-tr:hover { color: white; background: #702431; }
        .right-column { gap: 16px; }
        .widget-stok,.widget-aksi { padding: 19px; }
        .widget-top-bar { align-items: flex-end; gap: 10px; margin-bottom: 14px; }
        .stock-note { margin: -6px 0 12px; color: #998983; font-size: 9px; line-height: 1.5; }
        .btn-lihat-kecil { flex: 0 0 auto; padding: 7px 10px; color: #702431; background: #f6eae6; box-shadow: none; font-size: 9px; }
        .btn-lihat-kecil:hover { color: white; background: #702431; }
        .stok-items-row { display: grid; grid-template-columns: repeat(3,minmax(0,1fr)); gap: 9px; }
        .stok-item-card {
            min-width: 0; min-height: 146px; padding: 10px 7px;
            border: 1px solid #f0e7e2; border-radius: 12px;
            background: #fff; box-shadow: none;
        }
        .stok-thumb { height: 52px; }
        .stok-item-title { color: #4b3936; font-size: 9px; }
        .stok-item-qty { color: #988782; font-size: 8px; }
        .btn-edit-produk { padding: 5px 10px; color: #702431; background: #f6eae6; font-size: 9px; box-shadow: none; }
        .btn-edit-produk:hover { color: white; background: #702431; opacity: 1; }
        .widget-aksi { flex: 0 0 auto; }
        .aksi-buttons-row { display: grid; grid-template-columns: repeat(4,minmax(0,1fr)); gap: 8px; margin-top: 15px; }
        .aksi-btn-item { min-width: 0; padding: 10px 4px; border: 1px solid #f0e7e2; border-radius: 12px; background: #fff; }
        .aksi-btn-item:hover { border-color: #dfc8c0; background: #fffaf7; transform: translateY(-2px); }
        .aksi-icon-box { width: 38px; height: 38px; border-radius: 11px; background: #f6eae6; box-shadow: none; }
        .aksi-icon-img { width: 24px; height: 24px; object-fit: contain; }
        .aksi-btn-label { color: #5d4945; font-size: 8px; line-height: 1.35; }
        @media (max-width: 1200px) {
            .dashboard-columns { grid-template-columns: 1fr; }
            .right-column { display: grid; grid-template-columns: minmax(0,1.2fr) minmax(280px,.8fr); align-items: start; }
            .hero-employees-box { display: flex; min-width: 170px; }
            .hero-employees-img { height: 190px; }
        }
        @media (max-width: 900px) {
            .stats-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .content-container { padding: 20px; }
        }
        @media (max-width: 620px) {
            .top-navbar { height: 58px; padding-inline: 14px; }
            .content-container { padding: 14px 12px 28px; gap: 14px; }
            .hero-banner { padding: 18px 14px; border-radius: 15px; }
            .hero-inner { min-height: 145px; }
            .hero-left-content { max-width: 74%; }
            .hero-title { font-size: 23px; }
            .hero-subtitle { font-size: 11px; line-height: 1.6; }
            .hero-employees-box { min-width: 90px; margin-left: 3px; }
            .hero-employees-img { right: -4px; bottom: -19px; height: 142px; }
            .hero-quick-facts { flex-wrap: wrap; gap: 6px; font-size: 8px; }
            .hero-quick-facts strong { font-size: 10px; }
            .dashboard-summary { padding: 14px 11px; border-radius: 15px; }
            .summary-heading h2 { font-size: 17px; }
            .summary-link { padding: 7px 8px; font-size: 8px; }
            .stats-grid { gap: 8px; }
            .stat-card { min-height: 96px; gap: 8px; padding: 10px 8px; border-radius: 12px; }
            .stat-icon { flex-basis: 30px; width: 30px; height: 30px; border-radius: 9px; }
            .stat-icon svg { width: 16px; height: 16px; }
            .stat-number,.stat-number.gold,.stat-number.compact { font-size: 17px; }
            .stat-number.compact { font-size: 13px; }
            .stat-label { font-size: 9px; }
            .stat-meta { font-size: 8px; }
            .dashboard-columns { gap: 14px; }
            .transaksi-card,.widget-stok,.widget-aksi { padding: 14px 11px; border-radius: 14px; }
            .transaksi-card { overflow: hidden; }
            .transaksi-header-title,.widget-title { font-size: 15px; }
            .transaksi-table-header,.transaksi-row { padding-inline: 5px; }
            .transaksi-table-header { font-size: 8px; }
            .transaksi-row { font-size: 9px; }
            .col-id { width: 25%; }
            .col-pelanggan { width: 29%; }
            .col-total { width: 25%; }
            .col-status { width: 21%; }
            .badge-id { padding: 3px 5px; font-size: 8px; }
            .status-pill { padding: 3px 5px; font-size: 7px; }
            .right-column { display: flex; }
            .stok-items-row { gap: 6px; }
            .stok-item-card { min-height: 132px; }
            .widget-top-bar { align-items: flex-start; }
            .aksi-buttons-row { grid-template-columns: repeat(2,minmax(0,1fr)); }
            .aksi-btn-label { font-size: 9px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .hero-employees-img,.stat-card,.summary-link { animation: none !important; transition: none !important; }
        }

        /* Slightly larger type and controls from the summary through the dashboard content. */
        .dashboard-summary { padding: 26px; }
        .summary-heading { margin-bottom: 19px; }
        .summary-heading h2 { font-size: 23px; }
        .summary-heading .section-kicker,.section-kicker { font-size: 11px; }
        .summary-link { padding: 9px 13px; font-size: 11px; }
        .stats-grid { gap: 14px; }
        .stat-card { min-height: 120px; gap: 14px; padding: 18px; }
        .stat-icon { flex-basis: 44px; width: 44px; height: 44px; }
        .stat-icon svg { width: 22px; height: 22px; }
        .stat-label { font-size: 12px; line-height: 1.4; }
        .stat-number,.stat-number.gold,.stat-number.compact { font-size: 25px; }
        .stat-number.compact { font-size: 19px; }
        .stat-number.unavailable { font-size: 19px; }
        .stat-meta { font-size: 10px; }
        .transaksi-header-title,.widget-title { font-size: 20px; }
        .section-count { font-size: 11px; }
        .transaksi-table-header { font-size: 11px; }
        .transaksi-row { min-height: 56px; font-size: 12px; }
        .badge-id { font-size: 11px; }
        .status-pill { font-size: 10px; }
        .btn-lihat-semua-tr { font-size: 12px; }
        .stock-note { font-size: 10px; }
        .btn-lihat-kecil { font-size: 10px; }
        .stok-item-title { font-size: 11px; }
        .stok-item-qty { font-size: 9px; }
        .btn-edit-produk { font-size: 10px; }
        .aksi-btn-label { font-size: 10px; }
        @media (max-width: 620px) {
            .dashboard-summary { padding: 16px 12px; }
            .summary-heading h2 { font-size: 18px; }
            .summary-link { padding: 8px 9px; font-size: 9px; }
            .stats-grid { gap: 9px; }
            .stat-card { min-height: 103px; gap: 7px; padding: 10px 9px; }
            .stat-icon { flex-basis: 32px; width: 32px; height: 32px; }
            .stat-icon svg { width: 17px; height: 17px; }
            .stat-label { font-size: 10px; }
            .stat-number,.stat-number.gold,.stat-number.compact { font-size: 18px; }
            .stat-number.compact,.stat-number.unavailable { font-size: 14px; }
            .stat-meta { font-size: 9px; }
            .transaksi-header-title,.widget-title { font-size: 16px; }
            .transaksi-table-header { font-size: 9px; }
            .transaksi-row { min-height: 50px; font-size: 10px; }
            .badge-id { font-size: 9px; }
            .status-pill { font-size: 8px; }
            .stok-item-title { font-size: 10px; }
            .stok-item-qty { font-size: 9px; }
            .aksi-btn-label { font-size: 10px; }
        }
    </style>
    <style>
/* Shared Admin navigation: fixed on desktop, horizontal and scrollable on small screens. */
:root {
    --admin-wine: #702431;
    --admin-wine-deep: #511923;
    --admin-cream: #faf6f1;
    --admin-ink: #342b2b;
    --admin-muted: #8b7b78;
}

body .sidebar {
    position: fixed;
    inset: 0 auto 0 0;
    width: 264px;
    height: 100vh;
    overflow-x: hidden;
    overflow-y: auto;
    background: #fffdfa;
    border-right: 1px solid #eee4df;
    box-shadow: 8px 0 28px rgba(52, 30, 27, .055);
    z-index: 1000;
    scrollbar-width: thin;
    scrollbar-color: #d8c7c0 transparent;
}

body .sidebar-header-box {
    height: 150px;
    flex-direction: column;
    gap: 8px;
    padding: 18px 20px 15px;
    background: linear-gradient(145deg, var(--admin-wine), var(--admin-wine-deep));
}

body .sidebar-header-box::after {
    content: "ADMIN PANEL";
    color: rgba(255,255,255,.72);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .16em;
}

body .sidebar-logo {
    max-width: 168px;
    max-height: 88px;
}

body .sidebar-menu {
    gap: 4px;
    padding: 22px 0 16px;
}

body .sidebar-menu::before {
    content: "MENU UTAMA";
    padding: 0 22px 9px;
    color: #a18d88;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .14em;
}

body .sidebar-menu-item,
body .sidebar-logout {
    padding-inline: 13px;
}

body .sidebar-link {
    position: relative;
    min-height: 45px;
    gap: 13px;
    padding: 10px 14px;
    border: 1px solid transparent;
    border-radius: 11px;
    color: #625350;
    font-size: 13px;
    font-weight: 600;
    transition: background-color .18s ease, color .18s ease, border-color .18s ease, transform .18s ease;
}

body .sidebar-link:hover {
    color: var(--admin-wine);
    background: #f8f0ed;
    border-color: #f1e3de;
    transform: translateX(2px);
}

body .sidebar-link.active {
    color: var(--admin-wine);
    background: #f5e9e5;
    border-color: #ead6d0;
    box-shadow: none;
}

body .sidebar-link.active::before {
    content: "";
    position: absolute;
    left: -14px;
    top: 9px;
    bottom: 9px;
    width: 3px;
    border-radius: 0 4px 4px 0;
    background: var(--admin-wine);
}

body .sidebar-icon {
    width: 22px;
    height: 22px;
    object-fit: contain;
}

body .sidebar-bottom {
    gap: 10px;
}

body .sidebar-logout {
    padding-bottom: 14px;
}

body .sidebar-logout .sidebar-link:hover {
    color: #a33d45;
    background: #fbefed;
}

body .sidebar-footer-bar {
    height: 7px;
    background: var(--admin-wine);
}

body .main-wrapper {
    min-width: 0;
    margin-left: 264px;
}

@media (max-width: 760px) {
    body .sidebar {
        position: sticky;
        inset: 0 0 auto;
        width: 100%;
        height: auto;
        overflow: visible;
        border-right: 0;
        border-bottom: 1px solid #e9ded9;
        box-shadow: 0 5px 18px rgba(52, 30, 27, .08);
    }

    body .sidebar-top {
        flex-direction: row;
        align-items: stretch;
        min-width: 0;
    }

    body .sidebar-header-box {
        flex: 0 0 126px;
        width: 126px;
        height: 68px;
        gap: 0;
        padding: 7px 10px;
    }

    body .sidebar-header-box::after { display: none; }
    body .sidebar-logo { max-width: 106px; max-height: 54px; }

    body .sidebar-menu {
        flex: 1;
        min-width: 0;
        flex-direction: row;
        align-items: center;
        gap: 3px;
        padding: 7px 8px;
        overflow-x: auto;
        overflow-y: hidden;
        scrollbar-width: thin;
    }

    body .sidebar-menu::before { display: none; }
    body .sidebar-menu-item { flex: 0 0 auto; padding: 0; }

    body .sidebar-link {
        min-height: 46px;
        gap: 7px;
        padding: 8px 10px;
        border-radius: 9px;
        font-size: 11px;
        white-space: nowrap;
    }

    body .sidebar-link:hover { transform: none; }
    body .sidebar-link.active::before { display: none; }
    body .sidebar-icon { width: 18px; height: 18px; }

    body .sidebar-bottom {
        flex: 0 0 auto;
        justify-content: center;
    }

    body .sidebar-logout { padding: 0 8px; }
    body .sidebar-logout .sidebar-link { padding-inline: 9px; }
    body .sidebar-footer-bar { display: none; }
    body .main-wrapper { margin-left: 0; }
}

@media (prefers-reduced-motion: reduce) {
    body .sidebar-link { transition: none; }
}

    </style>

        <style>
/* Admin page backdrop: visible but quiet store-inspired curves and color fields. */
body {
    background-color: #f6eee8;
    background-image:
        radial-gradient(ellipse at 9% 12%, rgba(112,36,49,.16), transparent 29%),
        radial-gradient(ellipse at 91% 14%, rgba(218,176,99,.25), transparent 25%),
        radial-gradient(ellipse at 82% 82%, rgba(112,36,49,.12), transparent 30%),
        radial-gradient(ellipse at 17% 79%, rgba(218,176,99,.18), transparent 26%),
        repeating-radial-gradient(circle at 100% 0%, transparent 0 132px, rgba(112,36,49,.038) 133px 134px, transparent 135px 190px),
        radial-gradient(rgba(112,36,49,.055) .9px, transparent .9px);
    background-size: auto, auto, auto, auto, auto, 30px 30px;
    background-attachment: fixed;
}
body .main-wrapper {
    background-color: #f6eee8;
    background-image:
        radial-gradient(ellipse at 9% 12%, rgba(112,36,49,.16), transparent 29%),
        radial-gradient(ellipse at 91% 14%, rgba(218,176,99,.25), transparent 25%),
        radial-gradient(ellipse at 82% 82%, rgba(112,36,49,.12), transparent 30%),
        radial-gradient(ellipse at 17% 79%, rgba(218,176,99,.18), transparent 26%),
        repeating-radial-gradient(circle at 100% 0%, transparent 0 132px, rgba(112,36,49,.038) 133px 134px, transparent 135px 190px),
        radial-gradient(rgba(112,36,49,.055) .9px, transparent .9px);
    background-size: auto, auto, auto, auto, auto, 30px 30px;
    background-attachment: fixed;
}
body .right-panel {
    background-color: #faf4ee;
    background-image:
        radial-gradient(ellipse at 89% 9%, rgba(112,36,49,.10), transparent 29%),
        radial-gradient(ellipse at 8% 92%, rgba(218,176,99,.17), transparent 25%),
        repeating-radial-gradient(circle at 100% 0%, transparent 0 132px, rgba(112,36,49,.032) 133px 134px, transparent 135px 190px),
        radial-gradient(rgba(112,36,49,.045) .9px, transparent .9px);
    background-size: auto, auto, auto, 30px 30px;
}
    </style>
    <style>
        /* Customer-friendly styling for recent transactions */
        .transaksi-card { border-color: #eadbd5; box-shadow: 0 12px 30px rgba(68,35,32,.08); }
        .transaksi-card .section-heading { align-items: center; }
        .transaksi-table-header {
            min-height: 42px;
            margin-bottom: 8px;
            padding: 9px 12px;
            border: 1px solid #efe1db;
            border-radius: 11px;
            background: linear-gradient(110deg, #f8eee9, #f5e9e4);
            color: #7a1f2e;
            font-size: 11px;
            letter-spacing: .02em;
        }
        .transaksi-table-body { gap: 7px; margin-bottom: 12px; }
        .transaksi-row {
            min-height: 58px;
            padding: 8px 12px;
            border: 1px solid #f0e7e2;
            border-left: 3px solid #c98d86;
            border-radius: 12px;
            background: linear-gradient(100deg, #fff6f2 0%, #fffdfa 78%);
            color: #463735;
            transition: border-color .18s ease, background .18s ease, transform .18s ease, box-shadow .18s ease;
        }
        .transaksi-row:nth-child(2) { border-left-color: #c9a66b; background: linear-gradient(100deg, #fbf6eb 0%, #fffdfa 78%); }
        .transaksi-row:nth-child(3) { border-left-color: #8ea58d; background: linear-gradient(100deg, #f1f6f0 0%, #fffdfa 78%); }
        .transaksi-row:nth-child(4) { border-left-color: #a19bbd; background: linear-gradient(100deg, #f4f2f8 0%, #fffdfa 78%); }
        .transaksi-row:nth-child(5) { border-left-color: #c98d86; background: linear-gradient(100deg, #fff6f2 0%, #fffdfa 78%); }
        .transaksi-row:hover {
            transform: translateY(-1px);
            border-color: #dfc0b6;
            background: linear-gradient(100deg, #f8eae5 0%, #fffdfa 82%);
            box-shadow: 0 6px 14px rgba(85,43,40,.07);
        }
        .badge-id { padding: 5px 9px; border: 1px solid #ead5ce; border-radius: 8px; background: #f8eeea; color: #702431; font-size: 10px; letter-spacing: .02em; }
        .nama-pelanggan { display: flex; align-items: center; gap: 9px; min-width: 0; }
        .customer-avatar {
            display: inline-grid;
            flex: 0 0 30px;
            width: 30px;
            height: 30px;
            place-items: center;
            border: 1px solid #efdcd5;
            border-radius: 10px;
            background: #f8e9e4;
            color: #7a1f2e;
            font-size: 9px;
            font-weight: 800;
        }
        .transaksi-row:nth-child(2) .customer-avatar { background: #f5eee0; color: #856531; border-color: #eee2c9; }
        .transaksi-row:nth-child(3) .customer-avatar { background: #eaf0ea; color: #4d7151; border-color: #dce8dc; }
        .transaksi-row:nth-child(4) .customer-avatar { background: #ececf5; color: #5d5b83; border-color: #deddec; }
        .transaksi-row:nth-child(5) .customer-avatar { background: #f8e9e4; color: #7a1f2e; }
        .customer-name { overflow: hidden; color: #453534; font-weight: 650; text-overflow: ellipsis; white-space: nowrap; }
        .total-nominal { color: #702431; font-weight: 700; }
        .status-pill { min-width: 68px; padding: 5px 9px; border: 1px solid transparent; font-size: 9px; }
        .status-selesai { border-color: #dce9dc; }
        .status-diproses { border-color: #dce5f0; }
        .status-menunggu { border-color: #eee2c5; }
        @media (max-width: 620px) {
            .transaksi-table-header { min-height: 35px; padding: 7px 5px; font-size: 8px; }
            .transaksi-row { min-height: 48px; padding: 5px; font-size: 9px; }
            .nama-pelanggan { gap: 4px; }
            .customer-avatar { flex-basis: 23px; width: 23px; height: 23px; border-radius: 7px; font-size: 7px; }
            .badge-id { padding: 4px 5px; font-size: 8px; }
            .status-pill { min-width: 0; padding: 4px 5px; font-size: 7px; }
        }
        /* Summary cards are clear links to their related admin sections. */
        .stat-card {
            display: flex;
            position: relative;
            overflow: hidden;
            border-color: #eadbd5;
            color: inherit;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(75,38,36,.075), inset 0 1px 0 rgba(255,255,255,.9);
        }
        .stat-card:nth-child(1) { background: linear-gradient(130deg,#fff7f4,#fffdfa 78%); }
        .stat-card:nth-child(2) { background: linear-gradient(130deg,#fff9ec,#fffdfa 78%); }
        .stat-card:nth-child(3) { background: linear-gradient(130deg,#fff3ef,#fffdfa 78%); }
        .stat-card:nth-child(4) { background: linear-gradient(130deg,#fbf1eb,#fffdfa 78%); }
        .stat-card:nth-child(5) { background: linear-gradient(130deg,#f3f7f1,#fffdfa 78%); }
        .stat-card:nth-child(6) { background: linear-gradient(130deg,#fbf6eb,#fffdfa 78%); }
        .stat-card::before {
            content: '';
            position: absolute;
            top: -39px;
            right: -27px;
            width: 112px;
            height: 112px;
            border: 1px solid rgba(112,36,49,.08);
            border-radius: 50%;
            box-shadow: 0 0 0 13px rgba(112,36,49,.025), 0 0 0 27px rgba(112,36,49,.018);
            pointer-events: none;
        }
        .stat-card::after { height: 4px; opacity: 1; }
        .stat-card .stat-icon,.stat-card .stat-copy,.stat-card .stat-arrow { position: relative; z-index: 1; }
        .stat-card .stat-icon { width: 46px; height: 46px; flex-basis: 46px; border: 1px solid rgba(112,36,49,.08); box-shadow: 0 5px 12px rgba(112,36,49,.07); }
        .stat-card .stat-arrow {
            position: absolute;
            right: 16px;
            bottom: 14px;
            display: grid;
            width: 27px;
            height: 27px;
            place-items: center;
            border: 1px solid #ead8d1;
            border-radius: 9px;
            background: rgba(255,255,255,.82);
            color: #702431;
            font-size: 16px;
            line-height: 1;
            transition: transform .18s ease, color .18s ease, background .18s ease;
        }
        .stat-card:hover { border-color: #d9b9af; box-shadow: 0 15px 28px rgba(75,38,36,.14); }
        .stat-card:hover .stat-arrow,.stat-card:focus-visible .stat-arrow { transform: translateX(3px); color: #fff; background: #702431; }
        .stat-card:focus-visible { outline: 3px solid rgba(112,36,49,.25); outline-offset: 3px; }
        @media (max-width: 620px) {
            .stat-card .stat-icon { width: 32px; height: 32px; flex-basis: 32px; }
            .stat-card .stat-arrow { right: 7px; bottom: 7px; width: 20px; height: 20px; font-size: 12px; }
            .stat-meta { max-width: calc(100% - 12px); }
        }
    </style>
</head>
<body>

    <!-- ==================================================
         SIDEBAR (SAMA PERSIS DENGAN KATALOG)
    ================================================== -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-header-box">
                <img src="../img/sidebar-admin/logo.png" alt="Warung Azzahroh" class="sidebar-logo">
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="dashboard.html" class="sidebar-link active">
                        <img src="../img/sidebar-admin/sidebar-dashbore.png" alt="Dashbore" class="sidebar-icon">
                        <span>Dashbore</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="fo.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-fo.png" alt="Front Office" class="sidebar-icon">
                        <span>Front Office</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="pengguna.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-pengguna.png" alt="Pengguna" class="sidebar-icon">
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="katalog.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-katalog.png" alt="Katalog" class="sidebar-icon">
                        <span>Katalog</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="transaksi.html" class="sidebar-link">
                        <img src="../img/icon-transaksi.png" alt="Transaksi" class="sidebar-icon">
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="promosi.html" class="sidebar-link">
                        <img src="../img/sidebar-admin/sidebar-promo.png" alt="Promosi" class="sidebar-icon">
                        <span>Promosi</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-bottom">
            <div class="sidebar-logout">
                <a href="login.html" class="sidebar-link">
                    <img src="../img/sidebar-admin/sidebar-keluar.png" alt="Keluar" class="sidebar-icon">
                    <span>Keluar</span>
                </a>
            </div>
            <div class="sidebar-footer-bar"></div>
        </div>
    </aside>

    <!-- ==================================================
         MAIN CONTENT
    ================================================== -->
    <div class="main-wrapper">

        <!-- Top Navigation Bar -->
        <header class="top-navbar">
            <div class="admin-profile-badge">
                <div class="admin-avatar">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <span class="admin-name">Admin</span>
            </div>
        </header>

        <!-- Main Body -->
        <main class="content-container">

            <div class="breadcrumb"><span class="current">Dashboard</span></div>

            <!-- Welcome banner -->
            <section class="hero-banner">
                <div class="hero-banner-bg" aria-hidden="true"></div>
                <div class="hero-inner">
                    <div class="hero-left-content">
                        <p class="dashboard-kicker">WARUNG AZZAHROH <span>•</span> ADMIN PANEL</p>
                        <h1 class="hero-title">Selamat datang, Admin</h1>
                        <p class="hero-subtitle">Kelola aktivitas Warung Azzahroh dari satu tempat.</p>
                        <div class="hero-quick-facts"><span><strong>100</strong> transaksi tercatat</span><i></i><span><strong>26</strong> produk terjual</span></div>
                    </div>
                    <div class="hero-employees-box">
                        <img src="../img/admin/admin-2orang.png" alt="Tim Warung Azzahroh" class="hero-employees-img">
                    </div>
                </div>
            </section>

            <!-- Store summary -->
            <section class="dashboard-summary" aria-labelledby="summary-title">
                <div class="summary-heading">
                    <div><p class="section-kicker">PANTAU PERFORMA TOKO</p><h2 id="summary-title">Ringkasan toko</h2></div>
                    <a href="katalog.html" class="summary-link">Lihat katalog <span aria-hidden="true">→</span></a>
                </div>
                <div class="stats-grid">
                    <a class="stat-card" href="katalog.html" aria-label="Buka katalog produk">
                        <span class="stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5z"/><path d="m4.5 7.8 7.5 4.3 7.5-4.3M12 12v8.5"/></svg></span>
                        <span class="stat-copy"><span class="stat-label">Total Produk</span><strong class="stat-number">6</strong><span class="stat-meta">Produk di katalog</span></span>
                        <span class="stat-arrow" aria-hidden="true">→</span>
                    </a>
                    <a class="stat-card" href="katalog.html" aria-label="Lihat produk dengan stok menipis">
                        <span class="stat-icon attention" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3 2.8 19h18.4L12 3z"/><path d="M12 9v4m0 3h.01"/></svg></span>
                        <span class="stat-copy"><span class="stat-label">Stok Menipis</span><strong class="stat-number unavailable">Periksa</strong><span class="stat-meta">Cek stok produk di katalog</span></span>
                        <span class="stat-arrow" aria-hidden="true">→</span>
                    </a>
                    <a class="stat-card" href="transaksi.html" aria-label="Buka transaksi hari ini">
                        <span class="stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M8 2v4m8-4v4M4 9h16m-11 4h6m-6 3h4"/></svg></span>
                        <span class="stat-copy"><span class="stat-label">Transaksi Hari Ini</span><strong class="stat-number unavailable">Lihat</strong><span class="stat-meta">Buka daftar transaksi</span></span>
                        <span class="stat-arrow" aria-hidden="true">→</span>
                    </a>
                    <a class="stat-card" href="transaksi.html" aria-label="Buka laporan transaksi dan pendapatan">
                        <span class="stat-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 2v20m5-16H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
                        <span class="stat-copy"><span class="stat-label">Total Pendapatan</span><strong class="stat-number compact">Rp 2.500.000</strong><span class="stat-meta">Nilai tercatat di dashboard</span></span>
                        <span class="stat-arrow" aria-hidden="true">→</span>
                    </a>
                    <a class="stat-card" href="pengguna.html" aria-label="Kelola data pengguna">
                        <span class="stat-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M20 8v6m3-3h-6"/></svg></span>
                        <span class="stat-copy"><span class="stat-label">Total Pengguna</span><strong class="stat-number">55</strong><span class="stat-meta">Jumlah yang tercatat</span></span>
                        <span class="stat-arrow" aria-hidden="true">→</span>
                    </a>
                    <a class="stat-card" href="promosi.html" aria-label="Kelola voucher aktif">
                        <span class="stat-icon warm" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0L3 13V4h9l8.6 6.6a2 2 0 0 1 0 2.8z"/><circle cx="7.5" cy="8.5" r="1"/></svg></span>
                        <span class="stat-copy"><span class="stat-label">Voucher Aktif</span><strong class="stat-number">2</strong><span class="stat-meta">Voucher aktif di promosi</span></span>
                        <span class="stat-arrow" aria-hidden="true">→</span>
                    </a>
                </div>
            </section>

            <!-- Dashboard Columns: Transaksi Terbaru & Widgets -->
            <div class="dashboard-columns">

                <!-- Left Column: Transaksi Terbaru -->
                <div class="transaksi-card">
                    <div>
                        <div class="section-heading"><div><p class="section-kicker">AKTIVITAS</p><h2 class="transaksi-header-title">Transaksi Terbaru</h2></div><span class="section-count">5 transaksi</span></div>

                        <!-- Table Header -->
                        <div class="transaksi-table-header">
                            <span class="col-id">ID Transaksi</span>
                            <span class="col-pelanggan">Pelanggan</span>
                            <span class="col-total">Total</span>
                            <span class="col-status">Status</span>
                        </div>

                        <!-- Table Rows -->
                        <div class="transaksi-table-body">
                            <!-- Row 1 -->
                            <div class="transaksi-row">
                                <span class="col-id"><span class="badge-id">AW001</span></span>
                                <span class="col-pelanggan nama-pelanggan"><span class="customer-avatar">GA</span><span class="customer-name">Graycia A.S</span></span>
                                <span class="col-total total-nominal">Rp37.000</span>
                                <span class="col-status"><span class="status-pill status-selesai">Selesai</span></span>
                            </div>

                            <!-- Row 2 -->
                            <div class="transaksi-row">
                                <span class="col-id"><span class="badge-id">AW002</span></span>
                                <span class="col-pelanggan nama-pelanggan"><span class="customer-avatar">DJ</span><span class="customer-name">Derryel Josua</span></span>
                                <span class="col-total total-nominal">Rp125.000</span>
                                <span class="col-status"><span class="status-pill status-diproses">Diproses</span></span>
                            </div>

                            <!-- Row 3 -->
                            <div class="transaksi-row">
                                <span class="col-id"><span class="badge-id">AW003</span></span>
                                <span class="col-pelanggan nama-pelanggan"><span class="customer-avatar">AY</span><span class="customer-name">Alindra Yefta</span></span>
                                <span class="col-total total-nominal">Rp66.000</span>
                                <span class="col-status"><span class="status-pill status-selesai">Selesai</span></span>
                            </div>

                            <!-- Row 4 -->
                            <div class="transaksi-row">
                                <span class="col-id"><span class="badge-id">AW004</span></span>
                                <span class="col-pelanggan nama-pelanggan"><span class="customer-avatar">SK</span><span class="customer-name">Shafa Kamila</span></span>
                                <span class="col-total total-nominal">Rp95.200</span>
                                <span class="col-status"><span class="status-pill status-menunggu">Menunggu</span></span>
                            </div>

                            <!-- Row 5 -->
                            <div class="transaksi-row">
                                <span class="col-id"><span class="badge-id">AW005</span></span>
                                <span class="col-pelanggan nama-pelanggan"><span class="customer-avatar">ZM</span><span class="customer-name">Zelly Marliaty</span></span>
                                <span class="col-total total-nominal">Rp376.700</span>
                                <span class="col-status"><span class="status-pill status-selesai">Selesai</span></span>
                            </div>
                        </div>
                    </div>

                    <a href="transaksi.html" class="btn-lihat-semua-tr">Lihat Selengkapnya..</a>
                </div>

                <!-- Right Column: Stok Barang & Aksi Cepat -->
                <div class="right-column">

                    <!-- Widget: Stok Barang -->
                    <div class="widget-stok">
                        <div class="widget-top-bar">
                            <div><p class="section-kicker">INVENTARIS</p><h3 class="widget-title">Produk Perlu Perhatian</h3></div>
                            <a href="katalog.html" class="btn-lihat-kecil">Lihat Selengkapnya</a>
                        </div>
                        <p class="stock-note">Periksa data stok dan perbarui bila diperlukan.</p>

                        <div class="stok-items-row">
                            <!-- Item 1 -->
                            <div class="stok-item-card">
                                <img src="../img/produk/pringless.png" alt="Pringles 107g" class="stok-thumb">
                                <span class="stok-item-title">Pringles 107g</span>
                                <span class="stok-item-qty">Stok tercatat: 15</span>
                                <a href="edit-data-produk.html" class="btn-edit-produk">Edit</a>
                            </div>

                            <!-- Item 2 -->
                            <div class="stok-item-card">
                                <img src="../img/produk/tictac.png" alt="TicTac 90gr" class="stok-thumb">
                                <span class="stok-item-title">TicTac 90gr</span>
                                <span class="stok-item-qty">Stok tercatat: 15</span>
                                <a href="edit-data-produk.html" class="btn-edit-produk">Edit</a>
                            </div>

                            <!-- Item 3 -->
                            <div class="stok-item-card">
                                <img src="../img/produk/downy.png" alt="Downy Lavender" class="stok-thumb">
                                <span class="stok-item-title">Downy Lavender</span>
                                <span class="stok-item-qty">Stok tercatat: 15</span>
                                <a href="edit-data-produk.html" class="btn-edit-produk">Edit</a>
                            </div>
                        </div>
                    </div>

                    <!-- Widget: Aksi Cepat -->
                    <div class="widget-aksi">
                        <div><p class="section-kicker">PINTASAN</p><h3 class="widget-title">Aksi Cepat</h3></div>

                        <div class="aksi-buttons-row">
                            <!-- Action 1: Tambah Produk -->
                            <a href="tambah-data-produk.html" class="aksi-btn-item">
                                <div class="aksi-icon-box">
                                    <img src="../img/admin/admin-db-tambahproduk.png" alt="Tambah Produk" class="aksi-icon-img">
                                </div>
                                <span class="aksi-btn-label">Tambah Produk</span>
                            </a>

                            <!-- Tambah Voucher -->
                            <a href="tambah-voucher.html" class="aksi-btn-item">
                                <div class="aksi-icon-box"><img src="../img/admin/admin-db-tambahvoucher.png" alt="Tambah Voucher" class="aksi-icon-img"></div>
                                <span class="aksi-btn-label">Tambah Voucher</span>
                            </a>

                            <!-- Tambah Diskon: follows the existing voucher creation flow -->
                            <a href="tambah-voucher.html" class="aksi-btn-item">
                                <div class="aksi-icon-box">
                                    <img src="../img/admin/admin-db-tambahvoucher.png" alt="Tambah Diskon" class="aksi-icon-img">
                                </div>
                                <span class="aksi-btn-label">Tambah Diskon</span>
                            </a>

                            <!-- Action 3: Transaksi -->
                            <a href="transaksi.html" class="aksi-btn-item">
                                <div class="aksi-icon-box">
                                    <img src="../img/admin/admin-db-transaksi.png" alt="Transaksi" class="aksi-icon-img">
                                </div>
                                <span class="aksi-btn-label">Transaksi</span>
                            </a>
                            <a href="katalog.html" class="aksi-btn-item">
                                <div class="aksi-icon-box"><img src="../img/sidebar-admin/sidebar-katalog.png" alt="Kelola Stok" class="aksi-icon-img"></div>
                                <span class="aksi-btn-label">Kelola Stok</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </main>

    </div>

</body>
</html>
