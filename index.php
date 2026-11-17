<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Azzahroh - Belanja Kebutuhan Harian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ═══════════════════════════════════════════
           RESET & BASE
        ═══════════════════════════════════════════ */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #faf6f2;
            color: #2b1d1d;
            overflow-x: hidden;
        }

        /* ═══════════════════════════════════════════
           KEYFRAME ANIMATIONS
        ═══════════════════════════════════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(32px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(-1deg); }
            50%       { transform: translateY(-18px) rotate(1deg); }
        }
        @keyframes shimmer {
            0%   { background-position: -400px 0; }
            100% { background-position: 400px 0; }
        }
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @keyframes pulse-ring {
            0%   { transform: scale(1); opacity: 0.6; }
            100% { transform: scale(1.6); opacity: 0; }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-48px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(48px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes countUp {
            from { opacity: 0; transform: scale(0.7); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ═══════════════════════════════════════════
           NAVBAR
        ═══════════════════════════════════════════ */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            background: rgba(110, 28, 37, 0.96);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding: 0 60px; height: 70px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 4px 32px rgba(0,0,0,0.25);
            transition: all 0.3s;
        }
        .nav-logo img { height: 50px; object-fit: contain; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.3)); }
        .nav-links { display: flex; gap: 40px; list-style: none; }
        .nav-links a {
            color: rgba(255,255,255,0.88); text-decoration: none;
            font-size: 15px; font-weight: 500; letter-spacing: 0.3px;
            position: relative; padding-bottom: 4px;
            transition: color 0.2s;
        }
        .nav-links a::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 0; height: 2px; background: #f5c842;
            border-radius: 2px; transition: width 0.3s;
        }
        .nav-links a:hover { color: #fff; }
        .nav-links a:hover::after { width: 100%; }
        .nav-actions { display: flex; align-items: center; gap: 12px; }
        .nav-btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 22px; border-radius: 50px;
            font-size: 14px; font-weight: 700;
            text-decoration: none; transition: all 0.25s;
            border: 1.5px solid rgba(255,255,255,0.4);
            color: #fff;
        }
        .nav-btn:hover {
            background: #fff; color: #6e1c25;
            border-color: #fff; transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }
        .nav-btn svg { width: 16px; height: 16px; fill: currentColor; }
        .nav-btn-primary {
            background: #f5c842; color: #3a1010;
            border-color: #f5c842;
        }
        .nav-btn-primary:hover { background: #ffd553; color: #3a1010; border-color: #ffd553; }

        /* ═══════════════════════════════════════════
           HERO SECTION
        ═══════════════════════════════════════════ */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #3d0a10 0%, #6e1c25 40%, #8a2535 70%, #3d0a10 100%);
            background-size: 300% 300%;
            animation: gradientShift 10s ease infinite;
            display: flex; align-items: center;
            padding: 100px 60px 60px;
            position: relative; overflow: hidden;
        }
        /* Decorative background circles */
        .hero::before {
            content: '';
            position: absolute; top: -150px; right: -150px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(245,200,66,0.12) 0%, transparent 70%);
            border-radius: 50%; pointer-events: none;
        }
        .hero::after {
            content: '';
            position: absolute; bottom: -100px; left: -100px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            border-radius: 50%; pointer-events: none;
        }
        /* Grid overlay texture */
        .hero-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }
        .hero-content {
            position: relative; z-index: 2;
            display: flex; align-items: center;
            justify-content: space-between; gap: 60px;
            max-width: 1200px; margin: 0 auto; width: 100%;
        }
        .hero-left { flex: 1; }
        .hero-tag {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(245,200,66,0.15); border: 1px solid rgba(245,200,66,0.4);
            color: #f5c842; font-size: 12px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            padding: 6px 16px; border-radius: 50px; margin-bottom: 20px;
            animation: fadeIn 0.6s ease both;
        }
        .hero-tag span {
            width: 6px; height: 6px; background: #f5c842;
            border-radius: 50%;
            position: relative;
        }
        .hero-tag span::after {
            content: ''; position: absolute; inset: -3px;
            border-radius: 50%; border: 1.5px solid #f5c842;
            animation: pulse-ring 1.4s ease-out infinite;
        }
        .hero-h1 {
            font-size: 3.6rem; font-weight: 900; color: #fff;
            line-height: 1.1; letter-spacing: -1.5px;
            text-shadow: 0 4px 24px rgba(0,0,0,0.4);
            animation: fadeUp 0.7s ease 0.1s both;
        }
        .hero-h1 .accent { color: #f5c842; }
        .hero-sub {
            font-size: 1.1rem; color: rgba(255,255,255,0.78);
            font-weight: 400; line-height: 1.7; margin-top: 16px; margin-bottom: 32px;
            max-width: 480px;
            animation: fadeUp 0.7s ease 0.2s both;
        }
        .hero-btns {
            display: flex; gap: 14px; flex-wrap: wrap;
            animation: fadeUp 0.7s ease 0.3s both;
        }
        .btn-hero-primary {
            display: inline-flex; align-items: center; gap: 10px;
            background: linear-gradient(135deg, #f5c842 0%, #e0a800 100%);
            color: #3a1010; font-weight: 800; font-size: 15px;
            padding: 14px 32px; border-radius: 50px; text-decoration: none;
            box-shadow: 0 8px 24px rgba(245,200,66,0.4), 0 2px 8px rgba(0,0,0,0.2);
            transition: all 0.3s; letter-spacing: 0.3px;
        }
        .btn-hero-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 14px 36px rgba(245,200,66,0.5), 0 4px 12px rgba(0,0,0,0.3);
        }
        .btn-hero-primary svg { width: 18px; height: 18px; fill: currentColor; }
        .btn-hero-outline {
            display: inline-flex; align-items: center; gap: 10px;
            background: transparent; color: #fff; font-weight: 600; font-size: 15px;
            padding: 13px 28px; border-radius: 50px; text-decoration: none;
            border: 2px solid rgba(255,255,255,0.4);
            transition: all 0.3s;
        }
        .btn-hero-outline:hover {
            background: rgba(255,255,255,0.12);
            border-color: rgba(255,255,255,0.7);
            transform: translateY(-2px);
        }
        .btn-hero-outline svg { width: 16px; height: 16px; fill: currentColor; }
        /* Stats row */
        .hero-stats {
            display: flex; gap: 32px; margin-top: 44px;
            animation: fadeUp 0.7s ease 0.4s both;
        }
        .stat-item { text-align: left; }
        .stat-num {
            font-size: 1.8rem; font-weight: 900; color: #fff;
            line-height: 1; letter-spacing: -1px;
        }
        .stat-num .stat-plus { color: #f5c842; }
        .stat-label { font-size: 11px; color: rgba(255,255,255,0.6); font-weight: 500; margin-top: 3px; }
        .stat-sep { width: 1px; background: rgba(255,255,255,0.2); align-self: stretch; }
        /* Hero floating image */
        .hero-right {
            flex: 0 0 420px; display: flex; align-items: flex-end;
            justify-content: center; position: relative;
            animation: slideInRight 0.8s ease 0.3s both;
        }
        .hero-img-wrap {
            position: relative;
            animation: float 5s ease-in-out infinite;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.5));
        }
        .hero-img-wrap img { width: 420px; height: auto; object-fit: contain; }
        /* Orbiting badges */
        .hero-badge {
            position: absolute; background: #fff; border-radius: 14px;
            padding: 10px 16px; display: flex; align-items: center; gap: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            font-size: 12px; font-weight: 700; color: #333;
            animation: fadeIn 1s ease 1s both;
        }
        .hero-badge-1 { top: 20px; left: -20px; }
        .hero-badge-2 { bottom: 60px; right: -20px; }
        .hero-badge svg { width: 24px; height: 24px; fill: #7a1f2e; flex-shrink: 0; }
        .hero-badge .badge-num { font-size: 1.1rem; font-weight: 900; color: #7a1f2e; display: block; }

        /* ═══════════════════════════════════════════
           TICKER MARQUEE
        ═══════════════════════════════════════════ */
        .ticker-wrap {
            background: #f5c842; overflow: hidden;
            padding: 11px 0; border-top: 2px solid #e0a800;
        }
        .ticker-inner {
            display: flex; gap: 0;
            width: max-content;
            animation: ticker 28s linear infinite;
        }
        .ticker-item {
            display: flex; align-items: center; gap: 10px;
            padding: 0 36px; font-size: 13px; font-weight: 700;
            color: #3a1010; white-space: nowrap;
        }
        .ticker-dot {
            width: 6px; height: 6px; background: #7a1f2e;
            border-radius: 50%; flex-shrink: 0;
        }

        /* ═══════════════════════════════════════════
           FEATURES STRIP
        ═══════════════════════════════════════════ */
        .features-strip {
            background: #fff; padding: 56px 60px;
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 1px; border-bottom: 1px solid #f0e8e4;
        }
        .feat-item {
            display: flex; flex-direction: column; align-items: center;
            text-align: center; padding: 32px 20px;
            border-right: 1px solid #f0e8e4;
            transition: all 0.3s;
            cursor: default;
        }
        .feat-item:last-child { border-right: none; }
        .feat-item:hover { background: #fdf9f7; }
        .feat-icon-wrap {
            width: 60px; height: 60px; border-radius: 18px;
            background: linear-gradient(135deg, #fdf5f5 0%, #f9e8e8 100%);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 16px;
            box-shadow: 0 4px 16px rgba(122,31,46,0.1);
            transition: transform 0.3s;
        }
        .feat-item:hover .feat-icon-wrap { transform: translateY(-4px) scale(1.08); }
        .feat-icon-wrap svg { width: 28px; height: 28px; fill: #7a1f2e; }
        .feat-title { font-size: 15px; font-weight: 800; color: #2b1d1d; margin-bottom: 6px; }
        .feat-desc { font-size: 12.5px; color: #888; line-height: 1.5; }

        /* ═══════════════════════════════════════════
           ABOUT SECTION
        ═══════════════════════════════════════════ */
        .about-section {
            background: linear-gradient(135deg, #6e1c25 0%, #3d0a10 100%);
            padding: 80px 60px;
            display: flex; align-items: center; gap: 70px;
            position: relative; overflow: hidden;
        }
        .about-section::before {
            content: '';
            position: absolute; top: -80px; right: -80px;
            width: 350px; height: 350px;
            background: radial-gradient(circle, rgba(245,200,66,0.1) 0%, transparent 70%);
            border-radius: 50%; pointer-events: none;
        }
        .about-img-side {
            flex: 0 0 420px; border-radius: 24px; overflow: hidden;
            box-shadow: 0 24px 60px rgba(0,0,0,0.5);
            border: 3px solid rgba(255,255,255,0.15);
            transform: perspective(900px) rotateY(6deg);
            transition: transform 0.5s;
        }
        .about-img-side:hover { transform: perspective(900px) rotateY(0deg); }
        .about-img-side img { width: 100%; height: 300px; object-fit: cover; display: block; }
        .about-text { flex: 1; position: relative; z-index: 1; }
        .section-eyebrow {
            font-size: 11px; font-weight: 700; letter-spacing: 2.5px;
            text-transform: uppercase; color: #f5c842; margin-bottom: 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .section-eyebrow::before {
            content: ''; width: 32px; height: 2px;
            background: #f5c842; border-radius: 2px;
        }
        .about-h2 {
            font-size: 2.4rem; font-weight: 900; color: #fff;
            line-height: 1.15; letter-spacing: -0.8px; margin-bottom: 20px;
        }
        .about-h2 em { font-style: italic; color: #f5c842; font-family: 'Playfair Display', serif; }
        .about-desc {
            font-size: 15px; color: rgba(255,255,255,0.78); line-height: 1.8;
            margin-bottom: 32px;
        }
        .about-highlights { display: flex; gap: 20px; flex-wrap: wrap; }
        .about-hl {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.14);
            border-radius: 12px; padding: 10px 16px;
            font-size: 13px; font-weight: 600; color: #fff;
        }
        .about-hl svg { width: 18px; height: 18px; fill: #f5c842; flex-shrink: 0; }

        /* ═══════════════════════════════════════════
           KATEGORI
        ═══════════════════════════════════════════ */
        .kategori-section { background: #faf6f2; padding: 80px 60px; }
        .section-header { text-align: center; margin-bottom: 48px; }
        .section-title {
            font-size: 2.2rem; font-weight: 900; color: #2b1d1d;
            letter-spacing: -0.8px; margin-bottom: 10px;
        }
        .section-title span { color: #7a1f2e; }
        .section-sub { font-size: 15px; color: #888; }
        .kategori-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 900px; margin: 0 auto; }
        .kat-card {
            background: #fff; border-radius: 20px; padding: 36px 24px;
            text-align: center; cursor: pointer; text-decoration: none;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            border: 1.5px solid #f0e8e4;
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform: perspective(600px) rotateX(0deg);
        }
        .kat-card:hover {
            transform: perspective(600px) rotateX(-4deg) translateY(-8px) scale(1.02);
            box-shadow: 0 20px 48px rgba(122,31,46,0.18);
            border-color: #c47080;
        }
        .kat-img {
            width: 100px; height: 90px; object-fit: contain;
            margin: 0 auto 16px; display: block;
            transition: transform 0.3s;
        }
        .kat-card:hover .kat-img { transform: scale(1.1) translateY(-4px); }
        .kat-name {
            font-size: 15px; font-weight: 800; color: #2b1d1d; margin-bottom: 6px;
        }
        .kat-desc { font-size: 12.5px; color: #999; }
        .kat-btn {
            display: inline-block; margin-top: 14px;
            background: #7a1f2e; color: #fff;
            font-size: 11px; font-weight: 700; letter-spacing: 0.5px;
            padding: 7px 18px; border-radius: 50px;
            transition: background 0.2s;
        }
        .kat-card:hover .kat-btn { background: #5c1622; }

        /* ═══════════════════════════════════════════
           VOUCHER / PROMO SECTION
        ═══════════════════════════════════════════ */
        .promo-section {
            background: #fff; padding: 70px 60px;
            display: flex; align-items: center; gap: 60px;
        }
        .promo-left { flex: 1; }
        .promo-h2 { font-size: 2rem; font-weight: 900; color: #2b1d1d; margin-bottom: 12px; }
        .promo-h2 span { color: #7a1f2e; }
        .promo-desc { font-size: 14px; color: #666; line-height: 1.7; margin-bottom: 28px; }
        .promo-right { flex: 0 0 460px; }
        /* Voucher card 3D */
        .voucher-3d {
            background: linear-gradient(135deg, #2c1214 0%, #5c1a22 100%);
            border-radius: 20px; overflow: hidden; position: relative;
            box-shadow:
                0 2px 0 1px #3d0a10,
                0 4px 0 2px #2a0808,
                0 24px 48px rgba(0,0,0,0.4),
                inset 0 1px 0 rgba(255,255,255,0.1);
            transform: perspective(800px) rotateX(4deg) rotateY(-3deg);
            transition: transform 0.4s;
        }
        .voucher-3d:hover { transform: perspective(800px) rotateX(0deg) rotateY(0deg); }
        .voucher-top {
            padding: 28px 28px 20px;
            border-bottom: 2px dashed rgba(255,255,255,0.15);
            display: flex; justify-content: space-between; align-items: center;
        }
        .v-disc-big { font-size: 3rem; font-weight: 900; color: #fff; line-height: 1; }
        .v-disc-sub { font-size: 12px; color: #f5c842; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
        .v-brand img { height: 44px; object-fit: contain; filter: brightness(0) invert(1); opacity: 0.7; }
        .voucher-bottom { padding: 20px 28px 24px; display: flex; justify-content: space-between; align-items: center; gap: 16px; }
        .v-info p { font-size: 11.5px; color: rgba(255,255,255,0.65); line-height: 1.6; }
        .v-info strong { color: rgba(255,255,255,0.9); }
        .v-code-wrap { text-align: right; }
        .v-code {
            background: #fff; color: #7a1f2e;
            font-size: 14px; font-weight: 900; letter-spacing: 2px;
            padding: 6px 16px; border-radius: 8px; display: inline-block;
            margin-bottom: 8px;
        }
        .v-claim-btn {
            display: inline-block; background: #f5c842; color: #3a1010;
            font-size: 11px; font-weight: 800; padding: 6px 16px;
            border-radius: 50px; text-decoration: none; transition: all 0.2s;
        }
        .v-claim-btn:hover { background: #ffd553; transform: scale(1.05); }
        /* Shimmer overlay */
        .voucher-shimmer {
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.06) 50%, transparent 100%);
            background-size: 400px 100%;
            animation: shimmer 2.5s linear infinite;
            pointer-events: none;
        }

        /* ═══════════════════════════════════════════
           CONTACT / LOKASI
        ═══════════════════════════════════════════ */
        .contact-section { background: #faf6f2; padding: 80px 60px; }
        .contact-grid { display: grid; grid-template-columns: 1fr 1.5fr; gap: 60px; max-width: 1100px; margin: 0 auto; }
        .contact-channels { display: flex; flex-direction: column; gap: 22px; justify-content: center; }
        .ch-item {
            display: flex; align-items: flex-start; gap: 16px;
            padding: 20px; background: #fff; border-radius: 14px;
            border: 1px solid #f0e8e4;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.25s;
        }
        .ch-item:hover { transform: translateX(6px); box-shadow: 0 6px 20px rgba(122,31,46,0.1); border-color: #c47080; }
        .ch-icon {
            width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
            background: linear-gradient(135deg, #fdf5f5 0%, #f9e8e8 100%);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 2px 8px rgba(122,31,46,0.1);
        }
        .ch-icon svg { width: 22px; height: 22px; fill: #7a1f2e; }
        .ch-name { font-size: 15px; font-weight: 800; color: #2b1d1d; margin-bottom: 3px; }
        .ch-hint { font-size: 12px; color: #999; margin-bottom: 6px; }
        .ch-link {
            display: inline-block; color: #7a1f2e; font-weight: 700; font-size: 13px;
            text-decoration: none; border-bottom: 1px solid transparent;
            transition: border-color 0.2s;
        }
        .ch-link:hover { border-color: #7a1f2e; }
        .map-card {
            background: #fff; border-radius: 20px; overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1); border: 2px solid #f0e8e4;
        }
        .map-topbar {
            background: #7a1f2e; color: #fff;
            padding: 12px 20px; font-size: 13px; font-weight: 600;
            display: flex; align-items: center; justify-content: space-between;
        }
        .map-topbar a { color: #f5c842; text-decoration: none; font-weight: 700; font-size: 12px; }
        .map-topbar svg { width: 15px; height: 15px; fill: rgba(255,255,255,0.7); }
        .map-topbar-left { display: flex; align-items: center; gap: 8px; }
        .map-frame { width: 100%; height: 310px; border: 0; display: block; }

        /* ═══════════════════════════════════════════
           LOGIN PORTAL CTA
        ═══════════════════════════════════════════ */
        .login-cta {
            background: linear-gradient(135deg, #6e1c25 0%, #3d0a10 100%);
            padding: 72px 60px; text-align: center;
            position: relative; overflow: hidden;
        }
        .login-cta::before {
            content: ''; position: absolute;
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            width: 800px; height: 800px;
            background: radial-gradient(circle, rgba(245,200,66,0.08) 0%, transparent 65%);
            border-radius: 50%; pointer-events: none;
        }
        .login-cta h2 { font-size: 2.2rem; font-weight: 900; color: #fff; margin-bottom: 10px; position: relative; z-index: 1; }
        .login-cta p { font-size: 15px; color: rgba(255,255,255,0.75); margin-bottom: 36px; position: relative; z-index: 1; }
        .login-portal-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; position: relative; z-index: 1; }
        .portal-btn {
            display: flex; flex-direction: column; align-items: center; gap: 6px;
            background: rgba(255,255,255,0.08); border: 1.5px solid rgba(255,255,255,0.2);
            border-radius: 16px; padding: 20px 32px; text-decoration: none;
            color: #fff; min-width: 160px; transition: all 0.3s;
        }
        .portal-btn:hover {
            background: rgba(255,255,255,0.18); border-color: rgba(255,255,255,0.5);
            transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.3);
        }
        .portal-btn svg { width: 32px; height: 32px; fill: #f5c842; margin-bottom: 4px; }
        .portal-btn-name { font-size: 14px; font-weight: 800; }
        .portal-btn-desc { font-size: 11px; color: rgba(255,255,255,0.6); }

        /* ═══════════════════════════════════════════
           FOOTER
        ═══════════════════════════════════════════ */
        .footer {
            background: #1a0508;
            padding: 40px 60px;
            display: flex; align-items: center; justify-content: space-between;
            gap: 20px; flex-wrap: wrap;
        }
        .footer-brand { display: flex; align-items: center; gap: 20px; }
        .footer-logo { height: 50px; object-fit: contain; filter: brightness(0) invert(1) opacity(0.85); }
        .footer-div { width: 2px; height: 44px; background: rgba(255,255,255,0.2); }
        .footer-tagline {
            font-family: 'Dancing Script', cursive; font-size: 1.3rem;
            color: rgba(255,255,255,0.75); font-weight: 700;
        }
        .footer-copy { font-size: 12px; color: rgba(255,255,255,0.4); }

        /* ═══════════════════════════════════════════
           RESPONSIVE
        ═══════════════════════════════════════════ */
        @media (max-width: 1024px) {
            .navbar { padding: 0 24px; }
            .hero { padding: 90px 24px 50px; }
            .hero-content { flex-direction: column; gap: 40px; }
            .hero-right { flex: none; }
            .hero-img-wrap img { width: 320px; }
            .features-strip { grid-template-columns: repeat(2,1fr); padding: 40px 24px; }
            .about-section { flex-direction: column; padding: 60px 24px; }
            .about-img-side { flex: none; width: 100%; }
            .kategori-section { padding: 60px 24px; }
            .kategori-grid { grid-template-columns: repeat(2,1fr); }
            .promo-section { flex-direction: column; padding: 60px 24px; }
            .promo-right { flex: none; width: 100%; }
            .contact-section { padding: 60px 24px; }
            .contact-grid { grid-template-columns: 1fr; }
            .login-cta { padding: 56px 24px; }
            .footer { padding: 30px 24px; flex-direction: column; text-align: center; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <!-- ══════════ NAVBAR ══════════ -->
    <header class="navbar">
        <div class="nav-logo">
            <a href="#beranda"><img src="img/logo-utama.png" alt="Warung Azzahroh"></a>
        </div>
        <ul class="nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#kategori">Kategori</a></li>
            <li><a href="#lokasi">Lokasi</a></li>
        </ul>
        <div class="nav-actions">
            <a href="user/login.html" class="nav-btn">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Masuk
            </a>
            <a href="admin/login.html" class="nav-btn nav-btn-primary">
                <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Admin / FO
            </a>
        </div>
    </header>

    <!-- ══════════ HERO ══════════ -->
    <section class="hero" id="beranda">
        <div class="hero-grid"></div>
        <div class="hero-content">
            <div class="hero-left">
                <div class="hero-tag">
                    <span></span>
                    Toko Kelontong Terpercaya
                </div>
                <h1 class="hero-h1">
                    Belanja Kebutuhan<br>
                    Harian Lebih<br>
                    <span class="accent">Mudah &amp; Hemat</span>
                </h1>
                <p class="hero-sub">
                    Temukan ribuan produk kebutuhan sehari-hari dengan harga terjangkau, kualitas terjamin, dan pelayanan yang cepat di Warung Azzahroh.
                </p>
                <div class="hero-btns">
                    <a href="user/login.html" class="btn-hero-primary">
                        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
                        Mulai Belanja
                    </a>
                    <a href="#tentang" class="btn-hero-outline">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 8 12 12 14 14"/></svg>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-num">500<span class="stat-plus">+</span></div>
                        <div class="stat-label">Produk Tersedia</div>
                    </div>
                    <div class="stat-sep"></div>
                    <div class="stat-item">
                        <div class="stat-num">1K<span class="stat-plus">+</span></div>
                        <div class="stat-label">Pelanggan Setia</div>
                    </div>
                    <div class="stat-sep"></div>
                    <div class="stat-item">
                        <div class="stat-num">24<span class="stat-plus">j</span></div>
                        <div class="stat-label">Buka Setiap Hari</div>
                    </div>
                </div>
            </div>
            <div class="hero-right">
                <div class="hero-img-wrap">
                    <img src="img/elemen-index.png" alt="Keranjang Belanja Warung Azzahroh">
                    <div class="hero-badge hero-badge-1">
                        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <div>
                            <span class="badge-num">100%</span>
                            Kualitas Terjamin
                        </div>
                    </div>
                    <div class="hero-badge hero-badge-2">
                        <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                        <div>
                            <span class="badge-num">Rp7.100</span>
                            Harga Mulai Dari
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════ TICKER ══════════ -->
    <div class="ticker-wrap">
        <div class="ticker-inner">
            <!-- duplicated for seamless loop -->
            <span class="ticker-item"><span class="ticker-dot"></span>Produk Lengkap</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Harga Terjangkau</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Pelayanan Cepat</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Buka 24 Jam</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Kualitas Terjamin</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Makanan Ringan</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Produk Kebersihan</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Warung Azzahroh</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Produk Lengkap</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Harga Terjangkau</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Pelayanan Cepat</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Buka 24 Jam</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Kualitas Terjamin</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Makanan Ringan</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Produk Kebersihan</span>
            <span class="ticker-item"><span class="ticker-dot"></span>Warung Azzahroh</span>
        </div>
    </div>

    <!-- ══════════ FEATURES ══════════ -->
    <div class="features-strip">
        <div class="feat-item">
            <div class="feat-icon-wrap">
                <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
            </div>
            <div class="feat-title">Produk Lengkap</div>
            <div class="feat-desc">Ratusan produk pilihan dari berbagai kategori tersedia setiap hari.</div>
        </div>
        <div class="feat-item">
            <div class="feat-icon-wrap">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="feat-title">Buka 24 Jam</div>
            <div class="feat-desc">Warung kami siap melayani kapanpun Anda membutuhkan.</div>
        </div>
        <div class="feat-item">
            <div class="feat-icon-wrap">
                <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
            </div>
            <div class="feat-title">Harga Terjangkau</div>
            <div class="feat-desc">Harga bersahabat dengan kualitas yang tidak pernah mengecewakan.</div>
        </div>
        <div class="feat-item">
            <div class="feat-icon-wrap">
                <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <div class="feat-title">Kualitas Terjaga</div>
            <div class="feat-desc">Setiap produk dipilih dengan cermat untuk memastikan kualitas terbaik.</div>
        </div>
    </div>

    <!-- ══════════ TENTANG ══════════ -->
    <section class="about-section" id="tentang">
        <div class="about-img-side">
            <img src="img/index-tokogambar.png" alt="Toko Warung Azzahroh">
        </div>
        <div class="about-text">
            <div class="section-eyebrow">Tentang Kami</div>
            <h2 class="about-h2">
                Warung Azzahroh,<br>
                <em>Toko Kelontong</em> Pilihan Keluarga
            </h2>
            <p class="about-desc">
                Warung Azzahroh hadir sebagai solusi belanja kebutuhan sehari-hari yang lengkap, terjangkau, dan mudah diakses. Dari makanan ringan hingga produk kebersihan, semua tersedia di satu tempat dengan pelayanan yang ramah dan cepat.
            </p>
            <div class="about-highlights">
                <div class="about-hl">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    Tim Berpengalaman
                </div>
                <div class="about-hl">
                    <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Lokasi Strategis
                </div>
                <div class="about-hl">
                    <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                    Pelanggan Utama
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════ KATEGORI ══════════ -->
    <section class="kategori-section" id="kategori">
        <div class="section-header">
            <div class="section-eyebrow" style="justify-content:center; color:#7a1f2e;">Kategori Produk</div>
            <h2 class="section-title">Temukan <span>Produk</span> Favorit Anda</h2>
            <p class="section-sub">Berbagai kategori produk tersedia untuk memenuhi semua kebutuhan harian Anda.</p>
        </div>
        <div class="kategori-grid">
            <a href="user/katalog-makanan.html" class="kat-card">
                <img src="img/makanan-ringan.png" alt="Makanan Ringan" class="kat-img">
                <div class="kat-name">Makanan Ringan</div>
                <div class="kat-desc">Snack, wafer, keripik, dan cemilan favorit</div>
                <span class="kat-btn">Lihat Produk</span>
            </a>
            <a href="user/katalog-kebersihan.html" class="kat-card">
                <img src="img/kebersihan.png" alt="Kebersihan" class="kat-img">
                <div class="kat-name">Kebersihan</div>
                <div class="kat-desc">Detergen, sabun, dan perlengkapan bersih</div>
                <span class="kat-btn">Lihat Produk</span>
            </a>
            <a href="user/katalog-semua.html" class="kat-card">
                <img src="img/produk.png" alt="Semua Produk" class="kat-img">
                <div class="kat-name">Semua Produk</div>
                <div class="kat-desc">Jelajahi seluruh koleksi produk terlengkap</div>
                <span class="kat-btn">Lihat Semua</span>
            </a>
        </div>
    </section>

    <!-- ══════════ VOUCHER / PROMO ══════════ -->
    <section class="promo-section">
        <div class="promo-left">
            <div class="section-eyebrow" style="color:#7a1f2e;">Promo Eksklusif</div>
            <h2 class="promo-h2">Hemat Lebih Banyak dengan <span>Voucher</span></h2>
            <p class="promo-desc">
                Gunakan kode voucher eksklusif kami untuk mendapatkan potongan harga spesial di setiap pembelian. Tersedia untuk pelanggan baru dan pelanggan setia Warung Azzahroh.
            </p>
            <a href="user/login.html" class="btn-hero-primary" style="font-size:14px; padding:12px 28px;">
                <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:currentColor;"><path d="M20 12v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6"/><path d="M12 2v13"/><polyline points="9 9 12 12 15 9"/></svg>
                Klaim Voucher Sekarang
            </a>
        </div>
        <div class="promo-right">
            <div class="voucher-3d">
                <div class="voucher-shimmer"></div>
                <div class="voucher-top">
                    <div>
                        <div style="font-size:11px;color:#ffe082;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;">Special Discount</div>
                        <div class="v-disc-big">DISKON 10%</div>
                        <div class="v-disc-sub">Untuk Pelanggan Baru</div>
                    </div>
                    <div class="v-brand">
                        <img src="img/logo-utama.png" alt="Warung Azzahroh">
                    </div>
                </div>
                <div class="voucher-bottom">
                    <div class="v-info">
                        <p><strong>Min. Belanja</strong> Rp25.000</p>
                        <p><strong>Berlaku</strong> 30 hari ke depan</p>
                        <p style="font-size:10px;margin-top:6px;color:rgba(255,255,255,0.4);">*Syarat &amp; ketentuan berlaku</p>
                    </div>
                    <div class="v-code-wrap">
                        <div class="v-code">AZZAHROH10</div>
                        <a href="user/login.html" class="v-claim-btn">Klaim Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════ CONTACT / LOKASI ══════════ -->
    <section class="contact-section" id="lokasi">
        <div class="section-header" style="margin-bottom:44px;">
            <div class="section-eyebrow" style="justify-content:center;color:#7a1f2e;">Hubungi Kami</div>
            <h2 class="section-title">Kami Siap <span>Membantu</span> Anda</h2>
        </div>
        <div class="contact-grid">
            <div class="contact-channels">
                <div class="ch-item">
                    <div class="ch-icon">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <div class="ch-name">Email</div>
                        <div class="ch-hint">Tim kami siap membantu Anda</div>
                        <a href="mailto:warungazzahroh@gmail.com" class="ch-link">warungazzahroh@gmail.com</a>
                    </div>
                </div>
                <div class="ch-item">
                    <div class="ch-icon">
                        <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                    </div>
                    <div>
                        <div class="ch-name">WhatsApp</div>
                        <div class="ch-hint">Senin–Minggu, 08.00–21.00</div>
                        <a href="https://wa.me/6287623677632" target="_blank" class="ch-link">+62 87623677632</a>
                    </div>
                </div>
                <div class="ch-item">
                    <div class="ch-icon">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <div class="ch-name">Lokasi</div>
                        <div class="ch-hint">Datang langsung ke toko kami</div>
                        <span class="ch-link" style="cursor:default;">Surabaya, Rungkut</span>
                    </div>
                </div>
            </div>
            <div class="map-card">
                <div class="map-topbar">
                    <div class="map-topbar-left">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Rungkut, Surabaya
                    </div>
                    <a href="https://maps.google.com/?q=Surabaya+Rungkut" target="_blank">Buka di Google Maps &rarr;</a>
                </div>
                <iframe class="map-frame"
                    src="https://maps.google.com/maps?q=Surabaya%2C%20Rungkut&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- ══════════ LOGIN PORTAL CTA ══════════ -->
    <section class="login-cta">
        <h2>Masuk ke Portal Anda</h2>
        <p>Kelola toko, lacak pesanan, atau mulai belanja — semuanya dari satu tempat.</p>
        <div class="login-portal-btns">
            <a href="user/login.html" class="portal-btn">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <span class="portal-btn-name">Pengguna</span>
                <span class="portal-btn-desc">Login untuk berbelanja</span>
            </a>
            <a href="fo/login-fo.html" class="portal-btn">
                <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                <span class="portal-btn-name">Front Office</span>
                <span class="portal-btn-desc">Kelola transaksi toko</span>
            </a>
            <a href="admin/login.html" class="portal-btn">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                <span class="portal-btn-name">Admin</span>
                <span class="portal-btn-desc">Panel administrasi toko</span>
            </a>
        </div>
    </section>

    <!-- ══════════ FOOTER ══════════ -->
    <footer class="footer">
        <div class="footer-brand">
            <img src="img/logo-footer.png" alt="Warung Azzahroh" class="footer-logo">
            <div class="footer-div"></div>
            <span class="footer-tagline">Belanja kebutuhan sehari-hari</span>
        </div>
        <div class="footer-copy">&copy; 2026 Warung Azzahroh. All rights reserved.</div>
    </footer>

</body>
</html>
