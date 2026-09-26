<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0A0A0A">
    <title>BEDJE Yvonne Letysia · Portfolio – Opérations, Comptabilité & Digital</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== RESET & VARIABLES ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg: #0A0A0A;
            --bg-soft: #111111;
            --bg-card: #161616;
            --border: #262626;
            --border-hover: #404040;
            --text: #FAFAFA;
            --text-muted: #A1A1A1;
            --text-dim: #737373;
            --accent: #6366F1;
            --accent-hover: #818CF8;
            --accent-glow: rgba(99,102,241,0.15);
            --green: #10B981;
            --yellow: #FBBF24;
        }

        html { scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            font-size: 16px;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4 { font-weight: 700; letter-spacing: -0.03em; line-height: 1.2; }

        a { text-decoration: none; color: inherit; }

        .container-custom {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== SCROLL PROGRESS BAR ===== */
        .scroll-progress {
            position: fixed;
            top: 0; left: 0;
            height: 2px;
            width: 0%;
            background: linear-gradient(90deg, var(--accent), #A78BFA);
            z-index: 2000;
            transition: width 0.1s linear;
        }

        /* ===== WHATSAPP FLOTTANT ===== */
        .whatsapp-float {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            z-index: 1500;
            box-shadow: 0 10px 30px rgba(37,211,102,0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: whatsappPulse 2s infinite;
        }
        .whatsapp-float:hover {
            background: #128C7E;
            color: white;
            transform: scale(1.1) translateY(-4px);
            box-shadow: 0 15px 40px rgba(37,211,102,0.6);
        }
        .whatsapp-float::after {
            content: 'Ajoutez-moi sur WhatsApp';
            position: absolute;
            right: 70px;
            background: var(--bg-card);
            color: var(--text);
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateX(10px);
            border: 1px solid var(--border);
        }
        .whatsapp-float:hover::after {
            opacity: 1;
            transform: translateX(0);
        }
        @keyframes whatsappPulse {
            0%, 100% { box-shadow: 0 10px 30px rgba(37,211,102,0.4); }
            50% { box-shadow: 0 10px 30px rgba(37,211,102,0.7), 0 0 0 10px rgba(37,211,102,0.1); }
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(10,10,10,0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 14px 0;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            transition: padding 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
        }
        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(10,10,10,0.95);
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text) !important;
            letter-spacing: -0.5px;
            transition: transform 0.3s ease;
        }
        .navbar-brand:hover { transform: scale(1.05); }
        .navbar-brand span { color: var(--accent); }
        .navbar-toggler {
            border: 1px solid var(--border);
            padding: 6px 10px;
            border-radius: 8px;
            background: transparent;
            transition: all 0.3s ease;
        }
        .navbar-toggler:hover { border-color: var(--accent); }
        .navbar-toggler:focus { box-shadow: none; }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23FAFAFA' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .navbar-nav .nav-link {
            color: var(--text-muted) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 8px 14px !important;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--text) !important;
            background: var(--bg-card);
            transform: translateY(-2px);
        }
        .btn-nav {
            background: var(--accent);
            color: white;
            border: none;
            padding: 9px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            position: relative;
            overflow: hidden;
        }
        .btn-nav::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }
        .btn-nav:hover::before { width: 300px; height: 300px; }
        .btn-nav:hover {
            background: var(--accent-hover);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px var(--accent-glow);
        }

        /* ===== HERO ===== */
        .hero {
            padding: 130px 0 70px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 50%;
            transform: translateX(-50%);
            width: 800px; height: 600px;
            background: radial-gradient(circle, var(--accent-glow) 0%, transparent 70%);
            pointer-events: none;
            animation: floatGlow 8s ease-in-out infinite;
        }
        @keyframes floatGlow {
            0%, 100% { transform: translateX(-50%) translateY(0) scale(1); opacity: 0.8; }
            50% { transform: translateX(-50%) translateY(-20px) scale(1.1); opacity: 1; }
        }
        .hero h1 {
            font-size: clamp(2.2rem, 7vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 30px;
            letter-spacing: -0.04em;
        }
        .hero h1 .gradient {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-hover) 50%, #A78BFA 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 5s ease infinite;
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* ===== HERO CONTENT (2 COLONNES) ===== */
        .hero-content {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 50px;
            align-items: start;
            margin-bottom: 35px;
        }
        .hero-left {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .hero-intro {
            font-size: 1.2rem;
            color: var(--text);
            line-height: 1.6;
            margin: 0;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }
        .hero-intro strong {
            color: var(--text);
            font-weight: 700;
        }
        .hero-text {
            font-size: 1rem;
            color: var(--text-muted);
            line-height: 1.7;
            margin: 0;
        }
        .hero-text strong {
            color: var(--text);
            font-weight: 600;
        }
        .hero-right {
            display: flex;
            align-items: flex-start;
            justify-content: flex-end;
        }
        .hero-right .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-top: 0;
            max-width: 100%;
            width: 100%;
        }
        .hero-right .stat-box {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px 18px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-align: left;
        }
        .hero-right .stat-box::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 2px;
            background: linear-gradient(90deg, var(--accent), #A78BFA);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .hero-right .stat-box:hover::before { transform: scaleX(1); }
        .hero-right .stat-box:hover {
            border-color: var(--accent);
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(99,102,241,0.15);
        }
        .hero-right .stat-box h3 {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }
        .hero-right .stat-box:hover h3 { color: var(--accent-hover); }
        .hero-right .stat-box h3 span { color: var(--accent); }
        .hero-right .stat-box p {
            font-size: 0.78rem;
            color: var(--text-dim);
            margin: 0;
            font-weight: 500;
            line-height: 1.3;
        }

        /* ===== HERO ACTIONS ===== */
        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }
        .btn-primary-custom {
            background: var(--accent);
            color: white;
            border: none;
            padding: 13px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }
        .btn-primary-custom i { transition: transform 0.3s ease; }
        .btn-primary-custom:hover i { transform: translateX(5px); }
        .btn-primary-custom:hover {
            background: var(--accent-hover);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px var(--accent-glow);
        }
        .btn-wa-hero {
            background: #25D366;
            color: white;
            border: none;
            padding: 13px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }
        .btn-wa-hero::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }
        .btn-wa-hero:hover::before { width: 300px; height: 300px; }
        .btn-wa-hero:hover {
            background: #128C7E;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(37,211,102,0.3);
        }
        .btn-outline-custom {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
            padding: 12px 26px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-outline-custom:hover {
            background: var(--bg-card);
            border-color: var(--accent);
            color: var(--text);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        /* ===== SECTIONS ===== */
        section { padding: 80px 0; }
        .section-label {
            display: inline-block;
            color: var(--accent);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            transition: letter-spacing 0.3s ease;
        }
        .section-label:hover { letter-spacing: 3px; }
        .section-title {
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            font-weight: 800;
            color: var(--text);
            margin-bottom: 12px;
            letter-spacing: -0.03em;
        }
        .section-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 48px;
            max-width: 650px;
        }

        /* ===== COMPÉTENCES ===== */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
        }
        .skill-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            gap: 16px;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
        }
        .skill-card::after {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(99,102,241,0.05), transparent);
            transition: left 0.6s ease;
        }
        .skill-card:hover::after { left: 100%; }
        .skill-card:hover {
            border-color: var(--accent);
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4), 0 0 0 1px var(--accent);
        }
        .skill-icon {
            background: linear-gradient(135deg, var(--accent), #8B5CF6);
            color: white;
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.4s ease;
        }
        .skill-card:hover .skill-icon {
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 0 10px 25px var(--accent-glow);
        }
        .skill-card h5 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
            transition: color 0.3s ease;
        }
        .skill-card:hover h5 { color: var(--accent-hover); }
        .skill-card p {
            font-size: 0.88rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.55;
        }

        /* ===== TIMELINE ===== */
        .timeline-item {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, var(--accent), #8B5CF6);
            transition: width 0.3s ease;
        }
        .timeline-item:hover::before { width: 5px; }
        .timeline-item:hover {
            border-color: var(--accent);
            transform: translateX(8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }
        .timeline-item h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }
        .timeline-item:hover h4 { color: var(--accent-hover); }
        .timeline-item .meta {
            font-size: 0.82rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 14px;
            letter-spacing: 0.3px;
        }
        .timeline-item ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .timeline-item ul li {
            font-size: 0.9rem;
            color: var(--text-muted);
            padding: 5px 0 5px 22px;
            position: relative;
            line-height: 1.55;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .timeline-item ul li:hover {
            color: var(--text);
            transform: translateX(4px);
        }
        .timeline-item ul li::before {
            content: '';
            position: absolute;
            left: 0; top: 12px;
            width: 6px; height: 6px;
            background: var(--accent);
            border-radius: 50%;
            transition: transform 0.3s ease, background 0.3s ease;
        }
        .timeline-item ul li:hover::before {
            transform: scale(1.5);
            background: var(--accent-hover);
        }

        /* ===== INFO BOX ===== */
        .info-box {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .info-box:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .info-box h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-box h4 i {
            color: var(--accent);
            transition: transform 0.3s ease;
        }
        .info-box:hover h4 i { transform: scale(1.2) rotate(-10deg); }
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
            font-size: 0.92rem;
            color: var(--text-muted);
            transition: all 0.3s ease;
        }
        .info-item:hover {
            color: var(--text);
            padding-left: 6px;
        }
        .info-item:last-child { border-bottom: none; }
        .info-item i {
            color: var(--accent);
            font-size: 1rem;
            width: 20px;
            text-align: center;
            margin-top: 2px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }
        .info-item:hover i { transform: scale(1.2); }
        .info-item strong { color: var(--text); font-weight: 600; }

        /* ===== RÉFÉRENCES ===== */
        .ref-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
        }
        .ref-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .ref-card::before {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 60px; height: 60px;
            background: radial-gradient(circle, var(--accent-glow), transparent);
            border-radius: 50%;
            transform: translate(30%, -30%);
            transition: transform 0.4s ease;
        }
        .ref-card:hover::before { transform: translate(20%, -20%) scale(1.5); }
        .ref-card:hover {
            border-color: var(--accent);
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }
        .ref-card h5 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }
        .ref-card:hover h5 { color: var(--accent-hover); }
        .ref-card .role {
            font-size: 0.82rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 12px;
        }
        .ref-card .phone {
            font-size: 0.9rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }
        .ref-card:hover .phone { color: var(--text); }
        .ref-card .phone i { color: var(--accent); }

        /* ===== CONTACT ===== */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }
        .contact-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .contact-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 100%; height: 2px;
            background: linear-gradient(90deg, var(--accent), #A78BFA);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .contact-card:hover::after { transform: scaleX(1); }
        .contact-card:hover {
            border-color: var(--accent);
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(99,102,241,0.15);
        }
        .contact-card.whatsapp:hover::after {
            background: linear-gradient(90deg, #25D366, #128C7E);
        }
        .contact-card.whatsapp:hover {
            border-color: #25D366;
            box-shadow: 0 15px 35px rgba(37,211,102,0.2);
        }
        .contact-icon {
            background: linear-gradient(135deg, var(--accent), #8B5CF6);
            color: white;
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .contact-card:hover .contact-icon {
            transform: scale(1.1) rotate(-8deg);
        }
        .contact-card.whatsapp .contact-icon {
            background: linear-gradient(135deg, #25D366, #128C7E);
        }
        .contact-card .label {
            font-size: 0.78rem;
            color: var(--text-dim);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }
        .contact-card .value {
            font-size: 0.95rem;
            color: var(--text);
            font-weight: 600;
            word-break: break-word;
        }
        .btn-wa {
            background: #25D366;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .btn-wa::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 0; height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }
        .btn-wa:hover::before { width: 300px; height: 300px; }
        .btn-wa:hover {
            background: #128C7E;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(37,211,102,0.3);
        }

        /* ===== FOOTER ===== */
        .footer {
            border-top: 1px solid var(--border);
            padding: 40px 0 30px;
            text-align: center;
            color: var(--text-dim);
            font-size: 0.85rem;
        }
        .footer strong { color: var(--text); }
        .footer .social {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .footer .social a {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .footer .social a:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: white;
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 25px var(--accent-glow);
        }
        .footer .social a.whatsapp:hover {
            background: #25D366;
            border-color: #25D366;
            box-shadow: 0 10px 25px rgba(37,211,102,0.3);
        }

        /* ===== ANIMATIONS AU SCROLL ===== */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .fade-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .fade-left.visible {
            opacity: 1;
            transform: translateX(0);
        }
        .fade-right {
            opacity: 0;
            transform: translateX(40px);
            transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .fade-right.visible {
            opacity: 1;
            transform: translateX(0);
        }
        .zoom-in {
            opacity: 0;
            transform: scale(0.92);
            transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1), transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .zoom-in.visible {
            opacity: 1;
            transform: scale(1);
        }

        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }
        .delay-4 { transition-delay: 0.4s; }
        .delay-5 { transition-delay: 0.5s; }
        .delay-6 { transition-delay: 0.6s; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .hero-right {
                justify-content: flex-start;
            }
            .hero-right .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        @media (max-width: 768px) {
            .hero { padding: 110px 0 60px; }
            .hero h1 { font-size: 2.1rem; margin-bottom: 24px; }
            .hero-intro { font-size: 1.05rem; }
            .hero-text { font-size: 0.95rem; }
            .hero-content { gap: 24px; margin-bottom: 28px; }
            .hero-right .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .hero-right .stat-box { padding: 16px 14px; }
            .hero-right .stat-box h3 { font-size: 1.4rem; }
            .hero-actions {
                flex-direction: column;
                gap: 10px;
            }
            .hero-actions .btn-primary-custom,
            .hero-actions .btn-wa-hero,
            .hero-actions .btn-outline-custom {
                width: 100%;
                justify-content: center;
            }
            section { padding: 60px 0; }
            .skill-card { padding: 20px; }
            .timeline-item { padding: 20px; }
            .info-box { padding: 22px; }
            .contact-card { padding: 20px; }
            .ref-card { padding: 20px; }
            .timeline-item:hover { transform: translateY(-4px); }
            .contact-card:hover { transform: translateY(-4px); }
            .whatsapp-float {
                width: 56px;
                height: 56px;
                font-size: 1.6rem;
                bottom: 20px;
                right: 20px;
            }
            .whatsapp-float::after { display: none; }
        }
        @media (max-width: 480px) {
            .hero h1 { font-size: 1.8rem; }
            .section-title { font-size: 1.6rem; }
            .navbar-brand { font-size: 1.1rem; }
            .container-custom { padding: 0 18px; }
            .hero-right .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .hero-right .stat-box h3 { font-size: 1.3rem; }
        }

        /* ===== PRÉFÉRENCE DE MOUVEMENT RÉDUIT ===== */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body>

<!-- BARRE DE PROGRESSION -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- BOUTON WHATSAPP FLOTTANT -->
<a href="https://wa.me/qr/46QFZPRTWLPOH1" class="whatsapp-float" target="_blank" rel="noopener" title="Ajoutez-moi sur WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container-custom">
        <a class="navbar-brand" href="#">BEDJE<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link active" href="#home">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#competences">Compétences</a></li>
                <li class="nav-item"><a class="nav-link" href="#experience">Expérience</a></li>
                <li class="nav-item"><a class="nav-link" href="#formation">Formation</a></li>
                <li class="nav-item"><a class="nav-link" href="#references">Références</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a href="https://wa.me/qr/46QFZPRTWLPOH1" target="_blank" rel="noopener" class="btn-nav">
                        <i class="fab fa-whatsapp me-1"></i> WhatsApp
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="home" class="hero">
    <div class="container-custom">
        <div class="fade-up">

            <!-- TITRE -->
            <h1>
                BEDJE Yvonne<br>
                <span class="gradient">Letysia</span>
            </h1>

            <!-- PROFIL EN 2 COLONNES -->
            <div class="hero-content">
                <div class="hero-left">
                    <p class="hero-intro">
                        <strong>Professionnelle polyvalente</strong> spécialisée en opérations, administration, comptabilité et digital.
                    </p>
                    <p class="hero-text">
                        Titulaire d'une <strong>Licence en Génie Logiciel</strong>, d'un 
                        <strong>HND en Management des Systèmes d'Information</strong> et d'un 
                        <strong>Baccalauréat en Comptabilité et Gestion</strong>.
                    </p>
                    <p class="hero-text">
                        Je combine compétences techniques (<strong>développement d'applications</strong>) 
                        et opérationnelles (<strong>gestion administrative, comptable et de flotte</strong>) 
                        avec une forte capacité d'organisation, de reporting et d'amélioration des processus 
                        grâce au numérique.
                    </p>
                    <p class="hero-text">
                        Formée en <strong>bureautique avancée</strong>, <strong>marketing digital</strong> 
                        et <strong>community management</strong>.
                    </p>
                </div>

                <!-- STATS À DROITE -->
                <div class="hero-right">
                    <div class="stats-grid">
                        <div class="stat-box">
                            <h3>3<span>+</span></h3>
                            <p>ans d'expérience</p>
                        </div>
                        <div class="stat-box">
                            <h3>3<span>+</span></h3>
                            <p>diplômes obtenus</p>
                        </div>
                        <div class="stat-box">
                            <h3>100<span>%</span></h3>
                            <p>polyvalente</p>
                        </div>
                        <div class="stat-box">
                            <h3>6<span>+</span></h3>
                            <p>domaines maîtrisés</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BOUTONS -->
            <div class="hero-actions">
                <a href="#experience" class="btn-primary-custom">
                    Voir mon parcours <i class="fas fa-arrow-right"></i>
                </a>
                <a href="https://wa.me/qr/46QFZPRTWLPOH1" target="_blank" rel="noopener" class="btn-wa-hero">
                    <i class="fab fa-whatsapp"></i> Ajoutez-moi sur WhatsApp
                </a>
                <a href="#contact" class="btn-outline-custom">
                    <i class="fas fa-envelope"></i> Me contacter
                </a>
            </div>

        </div>
    </div>
</section>

<!-- COMPÉTENCES -->
<section id="competences">
    <div class="container-custom">
        <div class="fade-up">
            <div class="section-label">Expertise</div>
            <h2 class="section-title">Mes compétences</h2>
            <p class="section-subtitle">Un profil polyvalent couvrant les opérations, la comptabilité, l'administration et le digital.</p>
        </div>
        <div class="skills-grid">
            <div class="skill-card zoom-in delay-1">
                <div class="skill-icon"><i class="fas fa-code"></i></div>
                <div>
                    <h5>Développement d'applications</h5>
                    <p>Conception et développement d'applications web et mobiles (Laravel, PHP, Python, HTML/CSS).</p>
                </div>
            </div>
            <div class="skill-card zoom-in delay-2">
                <div class="skill-icon"><i class="fas fa-calculator"></i></div>
                <div>
                    <h5>Comptabilité & Gestion</h5>
                    <p>Tenue des comptes, suivi budgétaire, facturation, rapprochements et reporting financier.</p>
                </div>
            </div>
            <div class="skill-card zoom-in delay-3">
                <div class="skill-icon"><i class="fas fa-file-invoice"></i></div>
                <div>
                    <h5>Gestion administrative</h5>
                    <p>Gestion documentaire, suivi financier, reporting et amélioration des processus.</p>
                </div>
            </div>
            <div class="skill-card zoom-in delay-4">
                <div class="skill-icon"><i class="fas fa-truck"></i></div>
                <div>
                    <h5>Gestion de flotte</h5>
                    <p>Suivi des véhicules, planification, optimisation des coûts et reporting.</p>
                </div>
            </div>
            <div class="skill-card zoom-in delay-5">
                <div class="skill-icon"><i class="fas fa-users"></i></div>
                <div>
                    <h5>Coordination d'équipes</h5>
                    <p>Encadrement, communication, suivi des partenaires et prestataires.</p>
                </div>
            </div>
            <div class="skill-card zoom-in delay-6">
                <div class="skill-icon"><i class="fas fa-bullhorn"></i></div>
                <div>
                    <h5>Gestion du digital</h5>
                    <p>Marketing digital, community management, gestion des réseaux sociaux, création de contenu.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EXPÉRIENCE -->
<section id="experience" style="background: var(--bg-soft);">
    <div class="container-custom">
        <div class="fade-up">
            <div class="section-label">Parcours</div>
            <h2 class="section-title">Expérience professionnelle</h2>
            <p class="section-subtitle">Un parcours riche alliant comptabilité, administration, opérations et digital.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 fade-left">
                <div class="timeline-item">
                    <h4>Assistante de direction</h4>
                    <div class="meta">Tamen Empire · 2025 – 2026</div>
                    <ul>
                        <li>Assistance administrative et organisationnelle</li>
                        <li>Préparation de documents professionnels (Word, Excel, PowerPoint)</li>
                        <li>Participation aux activités de communication et réseaux sociaux</li>
                        <li>Suivi administratif et financier, reporting</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 fade-right">
                <div class="timeline-item">
                    <h4>Employée polyvalente</h4>
                    <div class="meta">La Synagogue High Tech · 2025 – 2026</div>
                    <ul>
                        <li>Gestion administrative et suivi des dossiers clients</li>
                        <li>Appui comptable : facturation, suivi des paiements et reporting</li>
                        <li>Participation aux activités digitales et communication</li>
                        <li>Coordination avec les équipes techniques</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 fade-left">
                <div class="timeline-item">
                    <h4>Comptable (stage & missions)</h4>
                    <div class="meta">Expérience en comptabilité · 2023 – 2024</div>
                    <ul>
                        <li>Tenue des livres comptables et saisie des écritures</li>
                        <li>Suivi des factures, rapprochements bancaires et gestion de caisse</li>
                        <li>Préparation des états financiers et reporting</li>
                        <li>Utilisation d'Excel avancé pour le suivi budgétaire</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 fade-right">
                <div class="timeline-item">
                    <h4>Stagiaire</h4>
                    <div class="meta">CHRACERH · 2024</div>
                    <ul>
                        <li>Appui aux tâches administratives et gestion de l'information</li>
                        <li>Traitement et organisation des documents et données</li>
                        <li>Participation au travail d'équipe</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 fade-left">
                <div class="timeline-item">
                    <h4>Stagiaire</h4>
                    <div class="meta">Hôpital Général de Yaoundé · 2023</div>
                    <ul>
                        <li>Appui aux tâches administratives et organisation des documents</li>
                        <li>Utilisation des outils informatiques</li>
                        <li>Collaboration au sein d'une équipe professionnelle</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 fade-right">
                <div class="timeline-item">
                    <h4>Formations complémentaires</h4>
                    <div class="meta">En ligne & certifiantes</div>
                    <ul>
                        <li>Bureautique avancée (Excel, PowerPoint)</li>
                        <li>Marketing digital</li>
                        <li>Community Management</li>
                        <li>Gestion des réseaux sociaux</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FORMATION -->
<section id="formation">
    <div class="container-custom">
        <div class="fade-up">
            <div class="section-label">Éducation</div>
            <h2 class="section-title">Formation académique</h2>
            <p class="section-subtitle">Un socle solide en comptabilité, informatique et gestion des systèmes d'information.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 fade-left">
                <div class="info-box">
                    <h4><i class="fas fa-graduation-cap"></i> Diplômes</h4>
                    <div class="info-item">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <strong>Licence en Génie Logiciel</strong><br>
                            <span style="font-size: 0.82rem; color: var(--text-dim);">Institut Supérieur HINTEL · 2025</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <strong>HND en Management des Systèmes d'Information</strong><br>
                            <span style="font-size: 0.82rem; color: var(--text-dim);">Institut Supérieur HINTEL · 2024</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <strong>Baccalauréat en Comptabilité et Gestion</strong><br>
                            <span style="font-size: 0.82rem; color: var(--text-dim);">Lycée · 2021</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-book"></i>
                        <div>
                            <strong>Formations complémentaires</strong><br>
                            <span style="font-size: 0.82rem; color: var(--text-dim);">Bureautique · Marketing digital · Community Management</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 fade-right">
                <div class="info-box">
                    <h4><i class="fas fa-star"></i> Langues & Qualités</h4>
                    <div class="info-item"><i class="fas fa-language"></i> <span><strong>Français</strong> — Courant</span></div>
                    <div class="info-item"><i class="fas fa-language"></i> <span><strong>Anglais</strong> — Intermédiaire</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Organisation</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Adaptabilité</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Esprit d'équipe</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Communication</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Résolution de problèmes</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Apprentissage rapide</span></div>
                    <div class="info-item"><i class="fas fa-check"></i> <span>Travail à distance</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RÉFÉRENCES -->
<section id="references" style="background: var(--bg-soft);">
    <div class="container-custom">
        <div class="fade-up">
            <div class="section-label">Références</div>
            <h2 class="section-title">Mes références professionnelles</h2>
            <p class="section-subtitle">Personnes qui peuvent témoigner de mon parcours et de mes compétences.</p>
        </div>
        <div class="ref-grid">
            <div class="ref-card zoom-in delay-1">
                <h5>M. PORIO</h5>
                <div class="role">Chef de service – Cellule Informatique</div>
                <div class="phone"><i class="fas fa-phone"></i> 692 471 646</div>
                <div style="font-size: 0.82rem; color: var(--text-dim); margin-top: 8px;">Hôpital Général de Yaoundé</div>
            </div>
            <div class="ref-card zoom-in delay-2">
                <h5>M. MBAZOA Armel</h5>
                <div class="role">Chef de la Cellule Informatique</div>
                <div class="phone"><i class="fas fa-phone"></i> 697 580 392</div>
                <div style="font-size: 0.82rem; color: var(--text-dim); margin-top: 8px;">CHRACERH</div>
            </div>
            <div class="ref-card zoom-in delay-3">
                <h5>M. PALAI EKOME Roméo</h5>
                <div class="role">Responsable</div>
                <div class="phone"><i class="fas fa-phone"></i> —</div>
                <div style="font-size: 0.82rem; color: var(--text-dim); margin-top: 8px;">Tamen Empire</div>
            </div>
            <div class="ref-card zoom-in delay-4">
                <h5>M. ALANGA ANANG Clément</h5>
                <div class="role">Responsable</div>
                <div class="phone"><i class="fas fa-phone"></i> 695 378 272</div>
                <div style="font-size: 0.82rem; color: var(--text-dim); margin-top: 8px;">La Synagogue High Tech</div>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact">
    <div class="container-custom">
        <div class="fade-up">
            <div class="section-label">Contact</div>
            <h2 class="section-title">Travaillons ensemble</h2>
            <p class="section-subtitle">Une opportunité, une mission, un projet ? N'hésitez pas à me contacter.</p>
        </div>
        <div class="contact-grid">
            <a href="https://wa.me/qr/46QFZPRTWLPOH1" target="_blank" rel="noopener" class="contact-card whatsapp zoom-in delay-1">
                <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                <div>
                    <div class="label">WhatsApp</div>
                    <div class="value">Ajoutez-moi sur WhatsApp</div>
                </div>
            </a>
            <a href="mailto:Yvonnebedje@gmail.com" class="contact-card zoom-in delay-2">
                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                <div>
                    <div class="label">Email</div>
                    <div class="value">Yvonnebedje@gmail.com</div>
                </div>
            </a>
            <div class="contact-card zoom-in delay-3">
                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <div class="label">Localisation</div>
                    <div class="value">Douala, Cameroun</div>
                </div>
            </div>
        </div>
        <div class="fade-up" style="text-align: center;">
            <a href="https://wa.me/qr/46QFZPRTWLPOH1" target="_blank" rel="noopener" class="btn-wa">
                <i class="fab fa-whatsapp"></i> Ajoutez-moi sur WhatsApp
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container-custom">
        <div class="social">
            <a href="https://wa.me/qr/46QFZPRTWLPOH1" target="_blank" rel="noopener" class="whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            <a href="mailto:Yvonnebedje@gmail.com" title="Email"><i class="fas fa-envelope"></i></a>
            <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p><strong>BEDJE Yvonne Letysia</strong> — Opérations · Comptabilité · Administration · Digital</p>
        <p style="margin-top: 8px; font-size: 0.8rem;">© 2025 · Tous droits réservés</p>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ===== SCROLL PROGRESS BAR =====
    const scrollProgress = document.getElementById('scrollProgress');
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = (scrollTop / docHeight) * 100;
        scrollProgress.style.width = progress + '%';
    });

    // ===== NAVBAR SCROLL EFFECT =====
    const mainNav = document.getElementById('mainNav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            mainNav.classList.add('scrolled');
        } else {
            mainNav.classList.remove('scrolled');
        }
    });

    // ===== ANIMATIONS AU SCROLL =====
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.fade-up, .fade-left, .fade-right, .zoom-in').forEach(el => observer.observe(el));

    // ===== NAVIGATION ACTIVE AU SCROLL =====
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    });

    // ===== FERMETURE DU MENU MOBILE AU CLIC =====
    document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const navMenu = document.getElementById('navMenu');
            if (navMenu.classList.contains('show')) {
                new bootstrap.Collapse(navMenu).hide();
            }
        });
    });
</script>
</body>
</html>