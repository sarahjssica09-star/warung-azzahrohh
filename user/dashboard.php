<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Warung Azzahroh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; background: #f5ebe8; color: #222; }

        /* ── NAVBAR ── */
        .navbar {
            background: #7a1f2e; padding: 0 40px; height: 68px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 200;
            box-shadow: 0 2px 12px rgba(0,0,0,0.25);
        }
        .nav-logo { height: 46px; object-fit: contain; }
        .nav-center { display: flex; gap: 10px; align-items: center; }
        .nav-pill {
            border: 2px solid rgba(255,255,255,0.65); color: #fff;
            padding: 6px 20px; border-radius: 50px; text-decoration: none;
            font-size: 14px; font-weight: 600; transition: all 0.2s;
        }
        .nav-pill:hover, .nav-pill.active { background: #fff; color: #7a1f2e; }
        .nav-right { display: flex; align-items: center; gap: 18px; }
        .nav-search {
            display: flex; align-items: center; background: #fff;
            border-radius: 50px; overflow: hidden; padding: 0 4px 0 16px; height: 36px;
        }
        .nav-search input { border: none; outline: none; font-family: inherit; font-size: 13px; width: 150px; }
        .nav-search button { background: none; border: none; cursor: pointer; padding: 4px 8px; color: #666; display:flex; align-items:center; }
        /* cart icon */
        .nav-icon { color: #fff; text-decoration: none; position: relative; display: inline-flex; align-items: center; }
        .nav-icon span {
            position: absolute; top: -6px; right: -8px;
            background: #ff4444; color: #fff; font-size: 9px; font-weight: 700;
            border-radius: 50%; width: 16px; height: 16px;
            display: flex; align-items: center; justify-content: center;
        }
        /* ── PROFILE DROPDOWN (CSS only via :focus-within) ── */
        .nav-profile-wrap { position: relative; }
        .nav-profile-btn {
            background: none; border: none; cursor: pointer;
            color: #fff; display: flex; align-items: center; padding: 4px;
            border-radius: 50%; transition: background 0.2s;
        }
        .nav-profile-btn:hover { background: rgba(255,255,255,0.15); }
        .nav-dropdown {
            position: absolute; top: calc(100% + 10px); right: 0;
            background: #fff; border-radius: 12px; min-width: 160px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.18);
            overflow: hidden; opacity: 0; pointer-events: none;
            transform: translateY(-6px); transition: all 0.2s;
            z-index: 300;
        }
        .nav-profile-wrap:focus-within .nav-dropdown {
            opacity: 1; pointer-events: auto; transform: translateY(0);
        }
        .nav-dropdown a {
            display: flex; align-items: center; gap: 10px;
            padding: 11px 16px; font-size: 14px; font-weight: 600;
            color: #333; text-decoration: none; transition: background 0.15s;
        }
        .nav-dropdown a:hover { background: #f5ebe8; color: #7a1f2e; }
        .nav-dropdown a svg { flex-shrink: 0; }
        .nav-dropdown-divider { height: 1px; background: #f0e8e0; margin: 0; }

        /* ── HERO BANNER ── */
        .hero {
            background: linear-gradient(120deg, #6b1a28 0%, #9a3040 55%, #7a1f2e 100%);
            position: relative; overflow: hidden;
            padding: 36px 48px 0; min-height: 230px;
            display: flex; align-items: flex-end;
        }
        .hero::before {
            content: ''; position: absolute; inset: 0;
            background: url('../img/backgroundall.png') center/cover; opacity: 0.15;
        }
        .hero-text { position: relative; z-index: 2; padding-bottom: 32px; max-width: 520px; }
        .hero-brand { margin-bottom: 10px; }
        .hero-brand img { height: 52px; object-fit: contain; }
        .hero-h1 { font-size: 2.6rem; font-weight: 900; color: #f5c842; line-height: 1.1; text-shadow: 0 2px 8px rgba(0,0,0,0.35); }
        .hero-sub { font-size: 14px; color: rgba(255,255,255,0.88); margin-top: 8px; line-height: 1.5; }
        .hero-cta {
            display: inline-block; margin-top: 18px;
            background: #fff; color: #7a1f2e; font-weight: 800;
            font-size: 14px; padding: 10px 28px; border-radius: 50px;
            text-decoration: none; box-shadow: 0 4px 14px rgba(0,0,0,0.2); transition: all 0.2s;
        }
        .hero-cta:hover { background: #f5c842; color: #3a1010; transform: translateY(-2px); }
        .hero-img { position: absolute; right: 40px; bottom: 0; height: 220px; object-fit: contain; z-index: 2; }

        /* ── MAIN ── */
        .main {
            position: relative;
            padding: 32px 40px 50px;
            display: flex;
            flex-direction: column;
            gap: 40px;
            background-color: #f6eee8;
            background-image:
                radial-gradient(ellipse at 5% 12%, rgba(122,31,46,.12), transparent 27%),
                radial-gradient(ellipse at 95% 48%, rgba(214,170,91,.13), transparent 24%),
                linear-gradient(rgba(250,245,240,.87), rgba(248,240,234,.93)),
                url('../img/backgroundall.png');
            background-position: left top, right center, center, center 38%;
            background-size: auto, auto, auto, cover;
            background-attachment: fixed;
        }

        /* section header */
        .sec-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
        .sec-title { font-size: 1.25rem; font-weight: 800; color: #3a1010; }
        .sec-link { font-size: 13px; color: #7a1f2e; font-weight: 600; text-decoration: none; }
        .sec-link:hover { text-decoration: underline; }

        /* ── KATEGORI & VOUCHER ── */
        .cat-voucher-row { display: flex; gap: 20px; align-items: stretch; flex-wrap: wrap; }

        /* Kategori box — kini dengan mini banner info juga */
        .cat-box-new {
            flex: 1.1; min-width: 280px;
            background: linear-gradient(135deg, #fff5f5 0%, #fff0ee 100%);
            border-radius: 16px; padding: 20px 22px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.07);
            border: 1.5px solid #f0d8d0;
            display: flex; flex-direction: column; gap: 14px;
        }
        .cat-box-title { font-size: 1rem; font-weight: 800; color: #3a1010; }
        .cat-cards-grid { display: flex; gap: 12px; flex-wrap: wrap; }
        .cat-card-item {
            display: flex; flex-direction: column; align-items: center; gap: 8px;
            background: #fff; border-radius: 12px; padding: 14px 10px;
            border: 1.5px solid #f0d8d0; text-decoration: none;
            transition: all 0.2s; flex: 1; min-width: 90px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }
        .cat-card-item:hover { border-color: #7a1f2e; box-shadow: 0 4px 12px rgba(122,31,46,0.15); transform: translateY(-2px); }
        .cat-card-img-wrap { width: 56px; height: 50px; display: flex; align-items: center; justify-content: center; }
        .cat-card-img-wrap img { width: 52px; height: 46px; object-fit: contain; }
        .cat-card-label { font-size: 11px; font-weight: 700; color: #3a1010; text-align: center; }
        /* Info strip di dalam kategori box */
        .cat-info-strip {
            background: linear-gradient(90deg, #7a1f2e 0%, #9a3040 100%);
            border-radius: 10px; padding: 10px 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .cat-info-strip svg { flex-shrink: 0; }
        .cat-info-text { font-size: 12px; color: #fff; font-weight: 600; line-height: 1.4; }
        .cat-info-text span { display: block; color: #f5c842; font-size: 11px; font-weight: 500; }

        /* Voucher box */
        .voucher-box {
            flex: 1; min-width: 260px; border-radius: 16px; overflow: hidden;
            background: linear-gradient(140deg, #2c1214 0%, #5c1a22 100%);
            padding: 20px 22px; display: flex; flex-direction: column; gap: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        }
        .v-title { color: #ffe082; font-size: 1.1rem; font-weight: 800; }
        .v-ticket {
            background: linear-gradient(135deg, #871f28 0%, #5c1117 100%);
            border: 1px dashed #f5c542; border-radius: 10px;
            padding: 12px 16px; display: flex; align-items: center; justify-content: space-between;
        }
        .v-disc { font-size: 1.6rem; font-weight: 900; color: #fff; }
        .v-label { font-size: 10px; color: #ffe082; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; }
        .v-min { font-size: 10px; color: #f7d4d6; }
        .v-sep { width: 1px; height: 48px; border-left: 2px dashed rgba(255,255,255,0.3); margin: 0 12px; }
        .v-code { background: #fff; color: #7a1f2e; font-size: 12px; font-weight: 800; padding: 3px 12px; border-radius: 6px; letter-spacing: 1px; }
        /* Voucher klaim — CSS checkbox trick */
        .v-klaim-wrap { margin-top: 6px; }
        .v-klaim-cb { display: none; }
        .v-claim {
            background: #f5c842; color: #3a1010; font-size: 11px; font-weight: 800;
            padding: 5px 14px; border-radius: 50px; text-decoration: none;
            display: inline-block; cursor: pointer; border: none; font-family: inherit;
            transition: all 0.2s; user-select: none;
        }
        .v-claim:hover { background: #ffc107; }
        .v-claimed {
            display: none; background: #4CAF50; color: #fff; font-size: 11px; font-weight: 800;
            padding: 5px 14px; border-radius: 50px; cursor: default;
        }
        .v-klaim-cb:checked ~ .v-claim { display: none; }
        .v-klaim-cb:checked ~ .v-claimed { display: inline-block; }
        .v-caption { font-size: 12px; color: #f3dedc; line-height: 1.4; }

        /* ── PRODUCT CAROUSEL ── */
        .carousel-wrap { position: relative; }
        .carousel {
            display: flex; gap: 14px; overflow-x: auto;
            padding-bottom: 8px; scroll-behavior: smooth;
        }
        .carousel::-webkit-scrollbar { height: 4px; }
        .carousel::-webkit-scrollbar-track { background: #f0e8e0; border-radius: 2px; }
        .carousel::-webkit-scrollbar-thumb { background: #c8a0a0; border-radius: 2px; }

        /* prod-card — fixed height so all align */
        .prod-card {
            background: #fff; border-radius: 14px; padding: 14px 12px 12px;
            min-width: 148px; max-width: 148px; height: 220px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            display: flex; flex-direction: column; align-items: center;
            flex-shrink: 0; transition: transform 0.2s, box-shadow 0.2s;
        }
        .prod-card:hover { transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,0.13); }
        .prod-card img { width: 86px; height: 76px; object-fit: contain; flex-shrink: 0; }
        .prod-name { font-size: 11px; font-weight: 600; color: #333; text-align: center; line-height: 1.3; margin-top: 6px; flex: 1; display: flex; align-items: center; justify-content: center; }
        .prod-price { font-size: 13px; font-weight: 800; color: #7a1f2e; margin-bottom: 8px; }
        /* btn-beli — fixed size, always at bottom */
        .btn-beli {
            width: 100%; height: 28px;
            background: #7a1f2e; color: #fff; border: none;
            border-radius: 20px; font-family: inherit; font-size: 10px; font-weight: 700;
            padding: 0; cursor: pointer; transition: background 0.2s;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; flex-shrink: 0;
        }
        .btn-beli:hover { background: #5c1622; }

        /* ── PROMO BANNER ── */
        .promo-banner {
            background: linear-gradient(135deg, #7a1f2e 0%, #b03040 100%);
            border-radius: 16px; padding: 24px 32px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 4px 16px rgba(122,31,46,0.35); flex-wrap: wrap; gap: 16px;
        }
        .promo-text h3 { font-size: 1.2rem; font-weight: 900; color: #f5c842; margin-bottom: 4px; }
        .promo-text p { font-size: 13px; color: rgba(255,255,255,0.88); max-width: 400px; }
        .promo-code { background: rgba(255,255,255,0.15); border: 2px dashed rgba(255,255,255,0.5); border-radius: 10px; padding: 12px 24px; text-align: center; }
        .promo-code span { display: block; font-size: 11px; color: #ffe082; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; }
        .promo-code strong { font-size: 1.5rem; color: #fff; letter-spacing: 2px; }

        /* ── STATUS PESANAN RINGKAS ── */
        .status-cards { display: flex; gap: 14px; flex-wrap: wrap; }
        .status-card {
            flex: 1; min-width: 140px; background: #fff; border-radius: 14px;
            padding: 16px 14px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.07);
            text-decoration: none; transition: all 0.2s;
        }
        .status-card:hover { transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,0.12); }
        .status-icon { display: flex; align-items: center; justify-content: center; margin-bottom: 8px; }
        .status-label { font-size: 12px; font-weight: 700; color: #333; margin-bottom: 4px; }
        .status-count { font-size: 1.4rem; font-weight: 900; color: #7a1f2e; }

        /* ── PESANAN TERAKHIR ── */
        .order-card {
            background: #fff; border-radius: 14px; padding: 14px 18px;
            display: flex; align-items: center; gap: 14px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.07); margin-bottom: 10px; flex-wrap: wrap;
        }
        .order-img { width: 76px; height: 64px; border-radius: 8px; background: #f5ebe8; object-fit: contain; padding: 4px; flex-shrink: 0; }
        .order-info { flex: 1; min-width: 150px; }
        .order-id { font-size: 11px; color: #888; font-weight: 600; margin-bottom: 3px; }
        .order-name { font-size: 13px; font-weight: 700; color: #222; margin-bottom: 4px; }
        .order-total { font-size: 13px; font-weight: 800; color: #7a1f2e; }
        .order-status { font-size: 11px; font-weight: 700; padding: 4px 14px; border-radius: 20px; white-space: nowrap; }
        .st-selesai { background: #d8eed5; color: #2a6125; }
        .st-diproses { background: #fcf3d6; color: #6f5923; }
        .st-menunggu { background: #f9d8d8; color: #8a2525; }
        .btn-detail {
            background: #7a1f2e; color: #fff; border: none; border-radius: 20px;
            font-family: inherit; font-size: 11px; font-weight: 700;
            padding: 6px 16px; cursor: pointer; text-decoration: none;
            display: inline-block; transition: background 0.2s;
        }
        .btn-detail:hover { background: #5c1622; }

        /* ── TENTANG & KONTAK ── */
        .about-row { display: flex; gap: 20px; flex-wrap: wrap; align-items: stretch; }
        .about-box {
            flex: 1; min-width: 260px;
            background: linear-gradient(135deg, #7a1f2e 0%, #9a3040 100%);
            border-radius: 16px; padding: 24px 26px; color: #fff;
            box-shadow: 0 4px 16px rgba(122,31,46,0.3);
        }
        .about-box h3 { font-size: 1.2rem; font-weight: 900; color: #f5c842; margin-bottom: 10px; }
        .about-box p { font-size: 13px; line-height: 1.7; color: rgba(255,255,255,0.9); }
        .contact-box { flex: 1; min-width: 260px; background: #fff; border-radius: 16px; padding: 24px 26px; box-shadow: 0 2px 10px rgba(0,0,0,0.07); }
        .contact-box h3 { font-size: 1.1rem; font-weight: 800; color: #3a1010; margin-bottom: 14px; }
        .contact-item { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
        .contact-icon { width: 28px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .contact-text { font-size: 13px; color: #444; }
        .contact-text a { color: #7a1f2e; text-decoration: none; font-weight: 600; }
        .contact-text a:hover { text-decoration: underline; }

        /* ── FOOTER ── */
        .footer { background: #7a1f2e; padding: 24px 40px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; }
        .footer-left { display: flex; align-items: center; gap: 16px; }
        .footer-logo { height: 48px; object-fit: contain; }
        .footer-div { width: 2px; height: 40px; background: rgba(255,255,255,0.35); }
        .footer-tag { font-family: Georgia, serif; font-style: italic; color: #f5e8c8; font-size: 1rem; }
        .footer-links { display: flex; gap: 20px; flex-wrap: wrap; }
        .footer-links a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: color 0.2s; }
        .footer-links a:hover { color: #fff; }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .nav-center { display: none; }
            .hero { padding: 24px 20px 0; }
            .hero-img { display: none; }
            .hero-h1 { font-size: 1.8rem; }
            .main { padding: 20px 16px 32px; }
            .main { background-attachment: scroll; background-position: left top, right center, center, center top; }
            .footer { padding: 20px 16px; }
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
        <a href="dashboard.php" class="nav-pill active">Home</a>
        <a href="katalog-semua.php" class="nav-pill ">Katalog Produk</a>
        <a href="status-pesanan.php" class="nav-pill ">Status Pesanan</a>
        <a href="riwayat-pesanan.php" class="nav-pill ">Riwayat Pesanan</a>
    </div>
    <div class="nav-right">
        <div class="nav-search"><input type="text" placeholder="Cari Nama Produk" aria-label="Cari Nama Produk"><button type="button" aria-label="Cari"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button></div>
        <a href="keranjang.php" class="nav-icon" aria-label="Keranjang"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 001.98 1.61h9.72a2 2 0 001.98-1.69l1.37-7.31H6"/></svg><span id="cart-count">0</span></a>
        <div class="nav-profile-wrap" tabindex="0"><button type="button" class="nav-profile-btn" tabindex="-1" aria-label="Menu profil"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></button>
            <div class="nav-dropdown"><a href="biodata.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Biodata Saya</a><a href="voucher-saya.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8Z"/><circle cx="7.5" cy="7.5" r="1"/></svg>Voucher Saya</a><div class="nav-dropdown-divider"></div><a href="login.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>Keluar</a></div>
        </div>
    </div>
</nav>

<!-- HERO BANNER -->
<section class="hero">
    <div class="hero-text">
        <div class="hero-brand">
            <img src="../img/tulisan-warung.png" alt="Warung Azzahroh">
        </div>
        <h1 class="hero-h1">Selamat Datang, User!</h1>
        <p class="hero-sub">Berbelanja puas harga pas, dan nyaman dirasakan di Warung Azzahroh.</p>
        <a href="katalog-semua.php" class="hero-cta">Belanja Sekarang &rarr;</a>
    </div>
    <img src="../img/elemen-index.png" alt="Keranjang Belanja" class="hero-img">
</section>

<!-- MAIN CONTENT -->
<main class="main">

    <!-- 1. KATEGORI + VOUCHER -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Kategori &amp; Promo</span>
        </div>
        <div class="cat-voucher-row">
            <div class="cat-box-new">
                <h3 class="cat-box-title">Kategori Produk</h3>
                <div class="cat-cards-grid">
                    <a href="katalog-makanan.php" class="cat-card-item">
                        <div class="cat-card-img-wrap">
                            <img src="../img/makanan-ringan.png" alt="Makanan Ringan">
                        </div>
                        <span class="cat-card-label">Makanan Ringan</span>
                    </a>
                    <a href="katalog-kebersihan.php" class="cat-card-item">
                        <div class="cat-card-img-wrap">
                            <img src="../img/kebersihan.png" alt="Kebersihan">
                        </div>
                        <span class="cat-card-label">Kebersihan</span>
                    </a>
                    <a href="katalog-semua.php" class="cat-card-item">
                        <div class="cat-card-img-wrap">
                            <svg viewBox="0 0 24 24" width="38" height="38" fill="none" stroke="#7a1f2e" stroke-width="1.5">
                                <rect x="2" y="3" width="7" height="7" rx="1"/>
                                <rect x="15" y="3" width="7" height="7" rx="1"/>
                                <rect x="2" y="14" width="7" height="7" rx="1"/>
                                <rect x="15" y="14" width="7" height="7" rx="1"/>
                            </svg>
                        </div>
                        <span class="cat-card-label">Semua Produk</span>
                    </a>
                </div>
                <!-- Info strip mengisi ruang kosong -->
                <div class="cat-info-strip">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#f5c842" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div class="cat-info-text">
                        Produk segar tersedia setiap hari
                        <span>Buka 24 jam &bull; Rungkut, Surabaya</span>
                    </div>
                </div>
            </div>
            <div class="voucher-box">
                <div class="v-title">Voucher Spesial Hari Ini</div>
                <div class="v-ticket">
                    <div>
                        <div class="v-label">Special Discount</div>
                        <div class="v-disc">DISKON 15%</div>
                        <div class="v-min">Min. Belanja Rp25.000</div>
                    </div>
                    <div class="v-sep"></div>
                    <div style="text-align:center;">
                        <div class="v-code">AZZAHROH15</div>
                        <div class="v-klaim-wrap">
                            <button type="button" class="v-claim" data-voucher="AZZAHROH15">Klaim Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="v-caption">Gunakan kode voucher saat checkout. Berlaku hari ini saja!</div>
            </div>
        </div>
    </section>

    <!-- 2. REKOMENDASI UNTUK ANDA -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Rekomendasi Untuk Anda</span>
            <a href="katalog-semua.php" class="sec-link">Lihat Semua &rarr;</a>
        </div>
        <div class="carousel-wrap">
            <div class="carousel">
                <div class="prod-card">
                    <img src="../img/produk/tictac.png" alt="Tictac">
                    <div class="prod-name">Tictac Snack 90 g</div>
                    <div class="prod-price">Rp7.100</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/pringless.png" alt="Pringles">
                    <div class="prod-name">Pringless Kaleng 102 g</div>
                    <div class="prod-price">Rp28.800</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/biscoff.png" alt="Biscoff">
                    <div class="prod-name">Lotus Biscoff 250 g</div>
                    <div class="prod-price">Rp29.100</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/kispray.png" alt="Vixal">
                    <div class="prod-name">Vixal Lavender 700 ml</div>
                    <div class="prod-price">Rp15.700</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/rinso.png" alt="Rinso">
                    <div class="prod-name">Rinso Detergen 1,2 Kg</div>
                    <div class="prod-price">Rp34.100</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/sariroti.png" alt="Sari Roti">
                    <div class="prod-name">Sari Roti Tawar 340 g</div>
                    <div class="prod-price">Rp15.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/silverqueen.png" alt="SilverQueen">
                    <div class="prod-name">SilverQueen Matcha 32 g</div>
                    <div class="prod-price">Rp28.900</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/downy.png" alt="Downy">
                    <div class="prod-name">Downy Lavender 900 ml</div>
                    <div class="prod-price">Rp55.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. MAKANAN RINGAN -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Makanan Ringan</span>
            <a href="katalog-makanan.php" class="sec-link">Lihat Semua &rarr;</a>
        </div>
        <div class="carousel-wrap">
            <div class="carousel">
                <div class="prod-card">
                    <img src="../img/produk/tanggo.png" alt="Tanggo">
                    <div class="prod-name">Tanggo Wafer Long 100 g</div>
                    <div class="prod-price">Rp8.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/tictac.png" alt="Tictac">
                    <div class="prod-name">Tictac Snack 90 g</div>
                    <div class="prod-price">Rp7.100</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/pringless.png" alt="Pringles">
                    <div class="prod-name">Pringless Kaleng 102 g</div>
                    <div class="prod-price">Rp28.800</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/biscoff.png" alt="Biscoff">
                    <div class="prod-name">Lotus Biscoff 250 g</div>
                    <div class="prod-price">Rp29.100</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/silverqueen.png" alt="SilverQueen">
                    <div class="prod-name">SilverQueen Matcha 32 g</div>
                    <div class="prod-price">Rp28.900</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/sariroti.png" alt="Sari Roti">
                    <div class="prod-name">Sari Roti Tawar 340 g</div>
                    <div class="prod-price">Rp15.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <!-- Produk tambahan mengisi space kosong -->
                <div class="prod-card">
                    <img src="../img/produk/pringless.png" alt="Pringles Sour Cream">
                    <div class="prod-name">Pringles Sour Cream 102 g</div>
                    <div class="prod-price">Rp28.800</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/tanggo.png" alt="Tanggo Coklat">
                    <div class="prod-name">Tanggo Wafer Coklat 100 g</div>
                    <div class="prod-price">Rp8.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. PROMO BANNER -->
    <section>
        <div class="promo-banner">
            <div class="promo-text">
                <h3>Belanja Lebih Hemat dengan Voucher!</h3>
                <p>Gunakan kode voucher eksklusif untuk mendapatkan potongan harga spesial di setiap pembelian produk Warung Azzahroh.</p>
            </div>
            <div class="promo-code">
                <span>Kode Voucher</span>
                <strong>P3NG9UN4B4RU</strong>
                <div style="font-size:11px; color:rgba(255,255,255,0.7); margin-top:4px;">Diskon 15% &bull; Min. Rp25.000</div>
            </div>
        </div>
    </section>

    <!-- 5. PRODUK KEBERSIHAN -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Produk Kebersihan</span>
            <a href="katalog-kebersihan.php" class="sec-link">Lihat Semua &rarr;</a>
        </div>
        <div class="carousel-wrap">
            <div class="carousel">
                <div class="prod-card">
                    <img src="../img/produk/rinso.png" alt="Rinso">
                    <div class="prod-name">Rinso Detergen 1,2 Kg</div>
                    <div class="prod-price">Rp34.100</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/downy.png" alt="Downy">
                    <div class="prod-name">Downy Lavender 900 ml</div>
                    <div class="prod-price">Rp55.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/polytex.png" alt="Polytex">
                    <div class="prod-name">Polyex Spons Sabun</div>
                    <div class="prod-price">Rp19.900</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/sunlight.png" alt="Sunlight">
                    <div class="prod-name">Sunlight Cuci Piring 660 g</div>
                    <div class="prod-price">Rp12.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/kispray.png" alt="Vixal">
                    <div class="prod-name">Vixal Lavender 700 ml</div>
                    <div class="prod-price">Rp15.700</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <!-- Produk tambahan mengisi space kosong -->
                <div class="prod-card">
                    <img src="../img/produk/rinso.png" alt="Rinso 500g">
                    <div class="prod-name">Rinso Detergen 500 g</div>
                    <div class="prod-price">Rp14.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/polytex.png" alt="Polytex Besar">
                    <div class="prod-name">Polyex Spons Besar</div>
                    <div class="prod-price">Rp24.900</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
                <div class="prod-card">
                    <img src="../img/produk/sunlight.png" alt="Sunlight Botol">
                    <div class="prod-name">Sunlight Botol 755 ml</div>
                    <div class="prod-price">Rp18.500</div>
                    <a href="detail-transaksi.php" class="btn-beli">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. STATUS PESANAN RINGKAS -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Pesanan Saya</span>
            <a href="status-pesanan.php" class="sec-link">Lihat Semua &rarr;</a>
        </div>
        <div class="status-cards">
            <a href="status-pesanan.php" class="status-card">
                <div class="status-icon">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#7a1f2e" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <div class="status-label">Menunggu</div>
                <div class="status-count">2</div>
            </a>
            <a href="status-pesanan.php" class="status-card">
                <div class="status-icon">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#7a1f2e" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
                    </svg>
                </div>
                <div class="status-label">Diproses</div>
                <div class="status-count">1</div>
            </a>
            <a href="riwayat-pesanan.php" class="status-card">
                <div class="status-icon">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#4CAF50" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                </div>
                <div class="status-label">Selesai</div>
                <div class="status-count">5</div>
            </a>
            <a href="riwayat-pesanan.php" class="status-card">
                <div class="status-icon">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="#7a1f2e" stroke-width="2">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <div class="status-label">Riwayat</div>
                <div class="status-count">8</div>
            </a>
        </div>
    </section>

    <!-- 7. PESANAN TERAKHIR -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Pesanan Terakhir</span>
            <a href="riwayat-pesanan.php" class="sec-link">Lihat Semua &rarr;</a>
        </div>
        <div class="order-card">
            <img src="../img/tombol-qris.png" alt="QRIS" class="order-img">
            <div class="order-info">
                <div class="order-id">ID: AW002 &bull; 20-09-2026 (18:20)</div>
                <div class="order-name">Rinso detergen bubuk 1,2 Kg &bull; Polyex Spons Sabun</div>
                <div class="order-total">Rp119.500</div>
            </div>
            <span class="order-status st-selesai">Selesai</span>
            <a href="riwayat-pesanan.php" class="btn-detail">Lihat Detail</a>
        </div>
        <div class="order-card">
            <img src="../img/tombol-tunai.png" alt="Tunai" class="order-img">
            <div class="order-info">
                <div class="order-id">ID: AW001 &bull; 20-09-2026 (18:20)</div>
                <div class="order-name">Rinso detergen bubuk 1,2 Kg &bull; Polyex Spons Sabun</div>
                <div class="order-total">Rp119.500</div>
            </div>
            <span class="order-status st-diproses">Diproses</span>
            <a href="status-pesanan.php" class="btn-detail">Cek Status</a>
        </div>
    </section>

    <!-- 8. TENTANG & KONTAK -->
    <section>
        <div class="sec-header">
            <span class="sec-title">Tentang Kami</span>
        </div>
        <div class="about-row">
            <div class="about-box">
                <h3>Warung Azzahroh</h3>
                <p>Warung Azzahroh menyediakan berbagai kebutuhan sehari-hari, mulai dari produk kebersihan hingga aneka makanan ringan, dengan kualitas terjamin dan harga yang bersahabat.</p>
                <p style="margin-top:10px;">Buka setiap hari — melayani dengan sepenuh hati.</p>
            </div>
            <div class="contact-box">
                <h3>Hubungi Kami</h3>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#7a1f2e" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    <span class="contact-text"><a href="mailto:warungazzahroh@gmail.com">warungazzahroh@gmail.com</a></span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#7a1f2e" stroke-width="2">
                            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                        </svg>
                    </span>
                    <span class="contact-text"><a href="https://wa.me/6287623677632" target="_blank">+62 87623677632</a></span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#7a1f2e" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </span>
                    <span class="contact-text">Surabaya, Rungkut</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#7a1f2e" stroke-width="2">
                            <rect x="2" y="6" width="20" height="14" rx="2"/>
                            <circle cx="12" cy="13" r="4"/>
                            <path d="M8 6l1-2h6l1 2"/>
                        </svg>
                    </span>
                    <span class="contact-text"><a href="https://instagram.com/warungazzahroh" target="_blank">@warungazzahroh</a></span>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-left">
        <img src="../img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo">
        <div class="footer-div"></div>
        <span class="footer-tag">Belanja kebutuhan sehari-hari</span>
    </div>
    <div class="footer-links">
        <a href="katalog-semua.php">Katalog</a>
        <a href="status-pesanan.php">Status Pesanan</a>
        <a href="biodata.php">Profil Saya</a>
        <a href="../../HTML/index.html">Beranda</a>
    </div>
</footer>

<script>
    async function loadCartCount() {
        try {
            const response = await fetch('../api/user/keranjang.php', {
                method: 'GET',
                credentials: 'same-origin'
            });
            const result = await response.json();
            const count = result && result.success && Array.isArray(result.data?.items) ? result.data.items.reduce((sum, item) => sum + (Number(item.jumlah) || 0), 0) : 0;
            const cartCount = document.getElementById('cart-count');
            if (cartCount) cartCount.textContent = count > 0 ? count : '0';
        } catch (error) {
            const cartCount = document.getElementById('cart-count');
            if (cartCount) cartCount.textContent = '0';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadCartCount();

        document.querySelectorAll('.v-claim').forEach((button) => {
            button.addEventListener('click', async () => {
                const voucher = button.dataset.voucher;
                if (!voucher) return;

                try {
                    const response = await fetch('../api/user/voucher.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        credentials: 'same-origin',
                        body: JSON.stringify({ voucher: voucher })
                    });
                    const result = await response.json();
                    if (!response.ok || !result.success) {
                        throw new Error(result.message || 'Voucher gagal diklaim.');
                    }
                    button.textContent = 'SUDAH DI-CLAIM';
                    button.disabled = true;
                    button.style.opacity = '0.8';
                } catch (error) {
                    alert(error.message || 'Voucher gagal diklaim.');
                }
            });
        });
    });
</script>

</body>
</html>
