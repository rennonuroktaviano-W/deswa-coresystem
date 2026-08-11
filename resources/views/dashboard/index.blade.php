<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard SSO</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --bg: #050816;
        --panel: rgba(15, 23, 42, .72);
        --panel-strong: rgba(15, 23, 42, .88);
        --panel-soft: rgba(2, 6, 23, .48);
        --border: rgba(255, 255, 255, .09);
        --border-strong: rgba(129, 140, 248, .28);
        --text: #f8fafc;
        --muted: #94a3b8;
        --muted-2: #64748b;
        --indigo: #6366f1;
        --indigo-dark: #4f46e5;
        --cyan: #06b6d4;
        --radius-xl: 24px;
        --radius-lg: 18px;
        --radius-md: 14px;
        --shadow: 0 26px 70px rgba(0, 0, 0, .28);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
        background:
            radial-gradient(circle at 14% 10%, rgba(79, 70, 229, .28), transparent 28%),
            radial-gradient(circle at 88% 82%, rgba(6, 182, 212, .18), transparent 30%),
            var(--bg);
        color: var(--text);
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
        background-size: 50px 50px;
        mask-image: linear-gradient(to bottom, black 0%, rgba(0, 0, 0, .7) 65%, transparent 100%);
    }

    body::after {
        content: '';
        position: fixed;
        width: 360px;
        height: 360px;
        border-radius: 999px;
        right: -160px;
        top: 18%;
        background: rgba(99, 102, 241, .14);
        filter: blur(85px);
        pointer-events: none;
        z-index: 0;
    }

    button,
    input {
        font: inherit;
    }

    .app {
        display: flex;
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    /* SIDEBAR */
    .sidebar {
        width: 260px;
        min-height: calc(100vh - 24px);
        padding: 22px 16px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: fixed;
        left: 12px;
        top: 12px;
        bottom: 12px;
        z-index: 20;
        border: 1px solid var(--border);
        border-radius: var(--radius-xl);
        background: linear-gradient(180deg, rgba(15, 23, 42, .84), rgba(8, 13, 30, .68));
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        box-shadow: var(--shadow), inset 0 1px 0 rgba(255, 255, 255, .045);
        animation: slideIn .55s ease both;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 42px;
        padding: 4px 8px;
    }

    .brand-logo {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, var(--indigo), var(--indigo-dark));
        color: white;
        font-weight: 800;
        font-size: 14px;
        letter-spacing: -.3px;
        box-shadow: 0 12px 26px rgba(79, 70, 229, .34), inset 0 1px 0 rgba(255, 255, 255, .2);
    }

    .brand-title {
        font-size: 15px;
        font-weight: 800;
        letter-spacing: .6px;
    }

    .brand-subtitle {
        font-size: 10px;
        color: var(--muted);
        margin-top: 3px;
    }

    .menu-title {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .14em;
        color: var(--muted-2);
        margin: 0 0 10px 10px;
        font-weight: 700;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 12px;
        color: #cbd5e1;
        text-decoration: none;
        border-radius: 13px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid transparent;
        transition: .25s ease;
        position: relative;
        overflow: hidden;
    }

    .menu-item:hover {
        color: white;
        background: rgba(255, 255, 255, .045);
        border-color: var(--border);
        transform: translateX(2px);
    }

    .menu-item.active {
        color: white;
        background: linear-gradient(135deg, rgba(99, 102, 241, .22), rgba(79, 70, 229, .10));
        border-color: rgba(129, 140, 248, .22);
        box-shadow: 0 10px 28px rgba(79, 70, 229, .10);
    }

    .menu-item.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 11px;
        bottom: 11px;
        width: 3px;
        border-radius: 3px;
        background: #818cf8;
        box-shadow: 0 0 12px rgba(129, 140, 248, .8);
    }

    .menu-icon {
        width: 20px;
        text-align: center;
        font-size: 17px;
        color: #a5b4fc;
    }

    .user-box {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 15px 7px 4px;
        border-top: 1px solid var(--border);
    }

    .avatar {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, rgba(99, 102, 241, .22), rgba(6, 182, 212, .13));
        border: 1px solid rgba(129, 140, 248, .22);
        color: #e0e7ff;
        font-size: 12px;
        font-weight: 800;
    }

    .user-info {
        min-width: 0;
        flex: 1;
    }

    .user-name {
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 125px;
    }

    .user-role {
        color: var(--muted);
        font-size: 9px;
        margin-top: 3px;
        letter-spacing: .08em;
    }

    .logout-form {
        margin-left: auto;
    }

    .logout-button {
        width: 36px;
        height: 36px;
        border: 1px solid var(--border);
        background: rgba(255, 255, 255, .025);
        color: #cbd5e1;
        border-radius: 11px;
        cursor: pointer;
        display: grid;
        place-items: center;
        font-size: 16px;
        transition: .22s ease;
    }

    .logout-button:hover {
        color: #fff;
        border-color: rgba(248, 113, 113, .26);
        background: rgba(127, 29, 29, .16);
        box-shadow: 0 0 22px rgba(239, 68, 68, .08);
        transform: translateY(-1px);
    }

    /* MAIN */
    .main {
        margin-left: 284px;
        width: calc(100% - 284px);
        padding: 12px 34px 56px 22px;
    }

    .topbar {
        min-height: 70px;
        padding: 0 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        background: rgba(15, 23, 42, .48);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .035);
        animation: fadeUp .5s .05s ease both;
    }

    .date {
        color: #dbeafe;
        font-size: 12px;
        font-weight: 600;
    }

    .date::before {
        content: '●';
        color: #22c55e;
        font-size: 8px;
        margin-right: 9px;
        filter: drop-shadow(0 0 5px rgba(34, 197, 94, .8));
    }

    .theme-button {
        width: 39px;
        height: 39px;
        border: 1px solid var(--border);
        background: rgba(2, 6, 23, .46);
        border-radius: 12px;
        color: #c7d2fe;
        cursor: pointer;
        font-size: 16px;
        transition: .22s ease;
    }

    .theme-button:hover {
        border-color: rgba(129, 140, 248, .28);
        background: rgba(99, 102, 241, .10);
        box-shadow: 0 0 20px rgba(99, 102, 241, .10);
        transform: translateY(-1px);
    }

    /* HERO */
    .hero {
        padding: 58px 4px 12px;
        animation: fadeUp .55s .12s ease both;
        position: relative;
    }

    .hero::after {
        content: '';
        position: absolute;
        width: 220px;
        height: 90px;
        left: 0;
        top: 35px;
        background: rgba(79, 70, 229, .16);
        filter: blur(60px);
        pointer-events: none;
    }

    .hero h1 {
        font-size: clamp(29px, 3vw, 44px);
        line-height: 1.12;
        letter-spacing: -1.5px;
        max-width: 680px;
        margin-bottom: 16px;
        font-weight: 800;
        position: relative;
        z-index: 1;
    }

    .hero h1::after {
        content: '';
        display: inline-block;
        width: 9px;
        height: 9px;
        margin-left: 9px;
        border-radius: 99px;
        background: var(--cyan);
        box-shadow: 0 0 18px rgba(6, 182, 212, .75);
        vertical-align: .15em;
    }

    .hero p {
        max-width: 590px;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.75;
    }

    /* SEARCH */
    .search-box {
        margin-top: 24px;
        position: relative;
        animation: fadeUp .55s .18s ease both;
    }

    .search-box input {
        width: 100%;
        height: 58px;
        background: rgba(2, 6, 23, .52);
        border: 1px solid var(--border);
        border-radius: 15px;
        color: white;
        padding: 0 20px 0 50px;
        outline: none;
        font-size: 13px;
        transition: .25s ease;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .025);
    }

    .search-box input::placeholder {
        color: #64748b;
    }

    .search-box input:focus {
        border-color: var(--indigo);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .11), 0 0 28px rgba(99, 102, 241, .08);
        background: rgba(2, 6, 23, .68);
    }

    .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #818cf8;
        font-size: 20px;
        pointer-events: none;
    }

    /* CATEGORY */
    .categories {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 15px;
        animation: fadeUp .55s .22s ease both;
    }

    .category {
        border: 1px solid var(--border);
        background: rgba(15, 23, 42, .55);
        color: #cbd5e1;
        border-radius: 999px;
        padding: 8px 13px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .02em;
        transition: .22s ease;
    }

    .category:hover {
        transform: translateY(-1px);
        border-color: rgba(129, 140, 248, .26);
        color: white;
    }

    .category.active {
        color: white;
        border-color: rgba(129, 140, 248, .22);
        background: linear-gradient(135deg, var(--indigo), var(--indigo-dark));
        box-shadow: 0 8px 22px rgba(79, 70, 229, .22);
    }

    /* APPLICATION CARDS */
    .applications {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        margin-top: 30px;
    }

    .app-card {
        min-height: 260px;
        padding: 22px 20px;
        text-decoration: none;
        color: inherit;
        position: relative;
        overflow: hidden;
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        background: linear-gradient(180deg, rgba(15, 23, 42, .72), rgba(8, 13, 30, .62));
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, .16), inset 0 1px 0 rgba(255, 255, 255, .03);
        transition: transform .26s ease, border-color .26s ease, box-shadow .26s ease, background .26s ease;
        animation: fadeUp .55s ease both;
    }

    .app-card:nth-child(1) {
        animation-delay: .26s
    }

    .app-card:nth-child(2) {
        animation-delay: .31s
    }

    .app-card:nth-child(3) {
        animation-delay: .36s
    }

    .app-card:nth-child(4) {
        animation-delay: .41s
    }

    .app-card::before {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        right: -90px;
        top: -110px;
        border-radius: 50%;
        background: rgba(99, 102, 241, .10);
        filter: blur(35px);
        opacity: 0;
        transition: .28s ease;
    }

    .app-card::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: inherit;
        pointer-events: none;
        background: linear-gradient(135deg, rgba(255, 255, 255, .035), transparent 35%);
    }

    .app-card:hover {
        transform: translateY(-5px);
        border-color: rgba(129, 140, 248, .32);
        box-shadow: 0 22px 55px rgba(0, 0, 0, .22), 0 0 34px rgba(79, 70, 229, .09);
    }

    .app-card:hover::before {
        opacity: 1;
    }

    .app-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        display: grid;
        place-items: center;
        font-size: 23px;
        margin-bottom: 24px;
        border: 1px solid rgba(129, 140, 248, .18);
        background: linear-gradient(135deg, rgba(99, 102, 241, .18), rgba(6, 182, 212, .07));
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .04), 0 10px 28px rgba(79, 70, 229, .08);
        position: relative;
        z-index: 1;
    }

    .app-card h2 {
        font-size: 15px;
        margin-bottom: 9px;
        letter-spacing: -.2px;
        position: relative;
        z-index: 1;
    }

    .app-card p {
        color: var(--muted);
        font-size: 12px;
        line-height: 1.65;
        min-height: 40px;
        position: relative;
        z-index: 1;
    }

    .tags {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        margin-top: 19px;
        position: relative;
        z-index: 1;
    }

    .tag {
        background: rgba(99, 102, 241, .08);
        border: 1px solid rgba(129, 140, 248, .14);
        color: #c7d2fe;
        border-radius: 999px;
        padding: 5px 8px;
        font-size: 8px;
        font-weight: 800;
        letter-spacing: .06em;
    }

    .app-card.disabled {
        cursor: default;
        opacity: .78;
    }

    .app-card.disabled:hover {
        transform: translateY(-2px);
    }

    .coming {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
        font-size: 8px;
        font-weight: 800;
        letter-spacing: .08em;
        color: #67e8f9;
        background: rgba(6, 182, 212, .08);
        border: 1px solid rgba(34, 211, 238, .16);
        padding: 5px 8px;
        border-radius: 999px;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(18px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-18px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: .01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: .01ms !important;
        }
    }

    @media (max-width: 1180px) {
        .applications {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 820px) {
        .sidebar {
            width: 82px;
            padding: 18px 10px;
            border-radius: 20px;
        }

        .brand {
            justify-content: center;
            padding: 0;
            margin-bottom: 34px;
        }

        .brand-title,
        .brand-subtitle,
        .menu-title,
        .menu-item span:not(.menu-icon),
        .user-name,
        .user-role {
            display: none;
        }

        .menu-item {
            justify-content: center;
            padding: 12px 8px;
        }

        .menu-item.active::before {
            left: 1px;
        }

        .menu-icon {
            width: auto;
        }

        .user-box {
            justify-content: center;
            flex-direction: column;
            gap: 8px;
        }

        .logout-form {
            margin-left: 0;
        }

        .main {
            margin-left: 104px;
            width: calc(100% - 104px);
            padding: 12px 18px 44px 8px;
        }
    }

    @media (max-width: 580px) {
        .sidebar {
            left: 8px;
            top: 8px;
            bottom: 8px;
            width: 68px;
            min-height: calc(100vh - 16px);
        }

        .brand-logo {
            width: 38px;
            height: 38px;
            font-size: 12px;
        }

        .main {
            margin-left: 84px;
            width: calc(100% - 84px);
            padding: 8px 10px 34px 0;
        }

        .topbar {
            min-height: 60px;
            padding: 0 13px;
            border-radius: 15px;
        }

        .date {
            font-size: 10px;
        }

        .hero {
            padding-top: 38px;
        }

        .hero h1 {
            font-size: 27px;
            letter-spacing: -1px;
        }

        .hero p {
            font-size: 12px;
        }

        .search-box input {
            height: 54px;
        }

        .applications {
            grid-template-columns: 1fr;
            gap: 14px;
            margin-top: 24px;
        }

        .app-card {
            min-height: 235px;
        }
    }


    /* Interactive click atmosphere */
    .dashboard-click-glow {
        position: fixed;
        z-index: 999;
        width: 14px;
        height: 14px;
        margin: -7px 0 0 -7px;
        border-radius: 50%;
        pointer-events: none;
        background: radial-gradient(circle, rgba(165, 180, 252, .50) 0%, rgba(99, 102, 241, .22) 38%, rgba(6, 182, 212, .08) 60%, transparent 74%);
        box-shadow: 0 0 45px rgba(99, 102, 241, .28);
        animation: dashboardClick .62s ease-out forwards;
    }

    @keyframes dashboardClick {
        to {
            opacity: 0;
            transform: scale(14);
        }
    }

    .app-card,
    .theme-button,
    .logout-button,
    .menu-item {
        overflow: hidden;
    }

    .button-click-wave {
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .28);
        pointer-events: none;
        transform: translate(-50%, -50%) scale(0);
        animation: buttonClickWave .55s ease-out forwards;
    }

    @keyframes buttonClickWave {
        to {
            opacity: 0;
            transform: translate(-50%, -50%) scale(20);
        }
    }


    /* =========================
           BRAND LOGO IMAGE
        ========================= */
    .brand-logo {
        background: transparent;
        box-shadow: none;
        overflow: visible;
    }

    .brand-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        filter: drop-shadow(0 0 16px rgba(239, 68, 68, .32));
    }

    /* =========================
           LIGHT THEME
        ========================= */
    body.light-mode {
        --bg: #f5f7ff;
        --panel: rgba(255, 255, 255, .76);
        --panel-strong: rgba(255, 255, 255, .92);
        --panel-soft: rgba(248, 250, 252, .82);
        --border: rgba(15, 23, 42, .10);
        --border-strong: rgba(79, 70, 229, .22);
        --text: #0f172a;
        --muted: #64748b;
        --muted-2: #94a3b8;
        --shadow: 0 24px 60px rgba(15, 23, 42, .10);
        background:
            radial-gradient(circle at 14% 10%, rgba(99, 102, 241, .16), transparent 28%),
            radial-gradient(circle at 88% 82%, rgba(6, 182, 212, .12), transparent 30%),
            var(--bg);
    }

    body.light-mode::before {
        background-image:
            linear-gradient(rgba(15, 23, 42, .04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(15, 23, 42, .04) 1px, transparent 1px);
    }

    body.light-mode::after {
        background: rgba(99, 102, 241, .10);
    }

    body.light-mode .sidebar {
        background: linear-gradient(180deg, rgba(255, 255, 255, .88), rgba(248, 250, 252, .78));
        box-shadow: var(--shadow), inset 0 1px 0 rgba(255, 255, 255, .85);
    }

    body.light-mode .brand-title,
    body.light-mode .app-card h2 {
        color: #0f172a;
    }

    body.light-mode .menu-item {
        color: #475569;
    }

    body.light-mode .menu-item:hover {
        color: #0f172a;
        background: rgba(99, 102, 241, .06);
    }

    body.light-mode .menu-item.active {
        color: #312e81;
        background: linear-gradient(135deg, rgba(99, 102, 241, .14), rgba(79, 70, 229, .06));
    }

    body.light-mode .user-name {
        color: #0f172a;
    }

    body.light-mode .logout-button {
        color: #475569;
        background: rgba(255, 255, 255, .58);
    }

    body.light-mode .topbar {
        background: rgba(255, 255, 255, .66);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .78);
    }

    body.light-mode .date {
        color: #334155;
    }

    body.light-mode .theme-button {
        background: rgba(255, 255, 255, .72);
        color: #4f46e5;
    }

    body.light-mode .hero h1 {
        color: #0f172a;
    }

    body.light-mode .search-box input {
        background: rgba(255, 255, 255, .72);
        color: #0f172a;
    }

    body.light-mode .search-box input::placeholder {
        color: #94a3b8;
    }

    body.light-mode .search-box input:focus {
        background: rgba(255, 255, 255, .94);
    }

    body.light-mode .category {
        background: rgba(255, 255, 255, .65);
        color: #475569;
    }

    body.light-mode .category:hover {
        color: #312e81;
    }

    body.light-mode .category.active {
        color: #fff;
    }

    body.light-mode .app-card {
        background: linear-gradient(180deg, rgba(255, 255, 255, .80), rgba(248, 250, 252, .72));
        box-shadow: 0 18px 45px rgba(15, 23, 42, .07), inset 0 1px 0 rgba(255, 255, 255, .88);
    }

    body.light-mode .app-card:hover {
        background: rgba(255, 255, 255, .94);
    }

    body.light-mode .app-card p {
        color: #64748b;
    }

    body.light-mode .tag {
        background: rgba(99, 102, 241, .07);
        color: #4f46e5;
    }

    body.light-mode .app-icon {
        background: linear-gradient(135deg, rgba(99, 102, 241, .12), rgba(6, 182, 212, .09));
    }

    .theme-button #themeIcon {
        display: inline-block;
        transition: transform .3s ease;
    }

    .theme-button:active #themeIcon {
        transform: rotate(24deg) scale(.9);
    }
    </style>
</head>

<body>

    <div class="app">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div>
                <div class="brand">
                    <div class="brand-logo"><img src="{{ asset('images/logo.png') }}" alt="Logo DESWA"></div>

                    <div>
                        <div class="brand-title">DESWA</div>
                        <div class="brand-subtitle">SSO Integrated System</div>
                    </div>
                </div>

                <div class="menu-title">
                    Main Menu
                </div>

                <nav class="menu">

                    <a href="{{ url('/dashboard') }}" class="menu-item active">
                        <span class="menu-icon">▦</span>
                        <span>Aplikasi Digital</span>
                    </a>

                    <a href="#" class="menu-item">
                        <span class="menu-icon">▣</span>
                        <span>Sesi Perangkat</span>
                    </a>

                </nav>
            </div>

            <!-- USER -->
            <div class="user-box">

                <div class="avatar">
                    {{ strtoupper(substr($user->name ?? 'U', 0, 2)) }}
                </div>

                <div class="user-info">
                    <div class="user-name">
                        {{ $user->name ?? 'User' }}
                    </div>

                    <div class="user-role">
                        {{ strtoupper($user->role ?? 'USER') }}
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf

                    <button type="submit" class="logout-button" title="Logout" aria-label="Logout"
                        onclick="return confirm('Yakin ingin logout?')">
                        ⇥
                    </button>
                </form>

            </div>

        </aside>


        <!-- MAIN CONTENT -->
        <main class="main">

            <!-- TOPBAR -->
            <header class="topbar">

                <div class="date">
                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
                </div>

                <button class="theme-button" id="themeToggle" type="button" aria-label="Ganti mode tampilan"
                    title="Ganti mode tampilan">
                    <span id="themeIcon">☾</span>
                </button>

            </header>


            <!-- HERO -->
            <section class="hero">

                <h1>
                    Semua Aplikasi dengan Satu Akun!
                </h1>

                <p>
                    Sekarang login aplikasi tinggal pilih jadi gak perlu pusing
                    lupa password ataupun ribet login di aplikasi yang berbeda!
                </p>

            </section>


            <!-- SEARCH -->
            <div class="search-box">

                <span class="search-icon">
                    ⌕
                </span>

                <input type="text" id="searchApp" placeholder="Cari aplikasi...">

            </div>


            <!-- CATEGORY -->
            <div class="categories">

                <span class="category active">
                    Semua
                </span>

                <span class="category">
                    Akademik
                </span>

                <span class="category">
                    Prestasi
                </span>

                <span class="category">
                    Kerjasama
                </span>

            </div>


            <!-- APPLICATIONS -->
            <section class="applications" id="applicationList">


                <!-- RAISE -->
                <div class="app-card disabled" data-name="raise">

                    <div class="coming">
                        SSO
                    </div>

                    <div class="app-icon">
                        🎓
                    </div>

                    <h2>
                        RAISE
                    </h2>

                    <p>
                        Aplikasi dalam ekosistem Single Sign-On.
                    </p>

                    <div class="tags">
                        <span class="tag">
                            RAISE
                        </span>

                        <span class="tag">
                            AKADEMIK
                        </span>
                    </div>

                </div>


                <!-- BO -->
                <div class="app-card disabled" data-name="bo">

                    <div class="coming">
                        SSO
                    </div>

                    <div class="app-icon">
                        📊
                    </div>

                    <h2>
                        BO
                    </h2>

                    <p>
                        Aplikasi dalam ekosistem Single Sign-On.
                    </p>

                    <div class="tags">
                        <span class="tag">
                            BO
                        </span>
                    </div>

                </div>


                <!-- SF -->
                <div class="app-card disabled" data-name="sf">

                    <div class="coming">
                        SSO
                    </div>

                    <div class="app-icon">
                        🤝
                    </div>

                    <h2>
                        SF
                    </h2>

                    <p>
                        Aplikasi dalam ekosistem Single Sign-On.
                    </p>

                    <div class="tags">
                        <span class="tag">
                            SF
                        </span>
                    </div>

                </div>


                <!-- PRA REGISTRASI -->
                <a href="{{ route('pra-registrasi.index') }}" class="app-card" data-name="pra registrasi">

                    <div class="app-icon">
                        📝
                    </div>

                    <h2>
                        Pra Registrasi
                    </h2>

                    <p>
                        Pengelolaan data Pra Registrasi
                        dengan fungsi CRUD.
                    </p>

                    <div class="tags">
                        <span class="tag">
                            PRA REGISTRASI
                        </span>

                        <span class="tag">
                            CRUD
                        </span>
                    </div>

                </a>


            </section>

        </main>

    </div>


    <script>
    // ==========================
    // SEARCH APPLICATION
    // ==========================

    const searchInput = document.getElementById('searchApp');

    const cards = document.querySelectorAll('.app-card');

    searchInput.addEventListener('input', function() {

        const keyword = this.value.toLowerCase();

        cards.forEach(card => {

            const name = card.dataset.name;

            if (name.includes(keyword)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }

        });

    });



    // ==========================
    // DARK / LIGHT THEME
    // ==========================
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const savedTheme = localStorage.getItem('deswa-dashboard-theme');

    function applyTheme(theme) {
        const isLight = theme === 'light';
        document.body.classList.toggle('light-mode', isLight);
        themeIcon.textContent = isLight ? '☀' : '☾';
        themeToggle.setAttribute('aria-label', isLight ? 'Aktifkan mode gelap' : 'Aktifkan mode terang');
        themeToggle.setAttribute('title', isLight ? 'Mode Gelap' : 'Mode Terang');
    }

    applyTheme(savedTheme === 'light' ? 'light' : 'dark');

    themeToggle.addEventListener('click', function() {
        const nextTheme = document.body.classList.contains('light-mode') ? 'dark' : 'light';
        localStorage.setItem('deswa-dashboard-theme', nextTheme);
        applyTheme(nextTheme);
    });


    // ==========================
    // LIGHTWEIGHT CLICK EFFECTS
    // ==========================
    document.addEventListener('click', function(event) {
        const glow = document.createElement('span');
        glow.className = 'dashboard-click-glow';
        glow.style.left = `${event.clientX}px`;
        glow.style.top = `${event.clientY}px`;
        document.body.appendChild(glow);
        glow.addEventListener('animationend', () => glow.remove(), {
            once: true
        });

        const target = event.target.closest('.app-card, .theme-button, .logout-button, .menu-item');
        if (!target) return;

        const rect = target.getBoundingClientRect();
        const wave = document.createElement('span');
        wave.className = 'button-click-wave';
        wave.style.left = `${event.clientX - rect.left}px`;
        wave.style.top = `${event.clientY - rect.top}px`;
        target.appendChild(wave);
        wave.addEventListener('animationend', () => wave.remove(), {
            once: true
        });
    });
    </script>

</body>

</html>