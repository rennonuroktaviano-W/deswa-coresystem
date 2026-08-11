<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | DESWA SSO</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        /* =========================================
           RESET
        ========================================= */

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
                radial-gradient(
                    circle at 15% 15%,
                    rgba(79, 70, 229, 0.25),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 85%,
                    rgba(6, 182, 212, 0.18),
                    transparent 30%
                ),
                #050816;

            color: #ffffff;

            overflow-x: hidden;
        }


        /* =========================================
           BACKGROUND GRID
        ========================================= */

        body::before {

            content: "";

            position: fixed;

            inset: 0;

            background-image:

                linear-gradient(
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px
                ),

                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.025) 1px,
                    transparent 1px
                );

            background-size: 50px 50px;

            pointer-events: none;

            z-index: -2;
        }


        /* =========================================
           BACKGROUND GLOW
        ========================================= */

        .orb {

            position: fixed;

            border-radius: 50%;

            filter: blur(100px);

            pointer-events: none;

            z-index: -1;
        }

        .orb-one {

            width: 320px;
            height: 320px;

            background: #4f46e5;

            top: -150px;
            left: -130px;

            opacity: 0.25;
        }

        .orb-two {

            width: 320px;
            height: 320px;

            background: #06b6d4;

            right: -140px;
            bottom: -140px;

            opacity: 0.20;
        }


        /* =========================================
           MAIN LAYOUT
        ========================================= */

        .app {

            display: flex;

            min-height: 100vh;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {

            width: 255px;

            position: fixed;

            top: 15px;
            left: 15px;
            bottom: 15px;

            padding: 25px 16px;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            background: rgba(15, 23, 42, 0.72);

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 20px;

            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);

            box-shadow:

                0 25px 60px rgba(0, 0, 0, 0.35),

                inset 0 1px 0
                rgba(255, 255, 255, 0.04);
        }


        /* =========================================
           BRAND
        ========================================= */

        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 5px 8px;

            margin-bottom: 55px;
        }

        .brand-logo {

            width: 42px;
            height: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #06b6d4
                );

            box-shadow:
                0 0 30px
                rgba(99, 102, 241, 0.35);

            font-size: 20px;

            font-weight: 800;
        }

        .brand-title {

            font-size: 16px;

            font-weight: 800;

            letter-spacing: 0.3px;
        }

        .brand-subtitle {

            margin-top: 3px;

            color: #94a3b8;

            font-size: 10px;

            font-weight: 500;
        }


        /* =========================================
           MENU
        ========================================= */

        .menu-title {

            padding-left: 9px;

            margin-bottom: 10px;

            color: #64748b;

            font-size: 11px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 0.8px;
        }

        .menu {

            display: flex;

            flex-direction: column;

            gap: 6px;
        }

        .menu-item {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 12px 13px;

            color: #94a3b8;

            text-decoration: none;

            border: 1px solid transparent;

            border-radius: 12px;

            font-size: 13px;

            font-weight: 500;

            transition: all 0.25s ease;
        }

        .menu-item:hover {

            color: #ffffff;

            background: rgba(99, 102, 241, 0.08);

            border-color:
                rgba(99, 102, 241, 0.12);
        }

        .menu-item.active {

            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    rgba(99, 102, 241, 0.20),
                    rgba(6, 182, 212, 0.08)
                );

            border-color:
                rgba(99, 102, 241, 0.22);

            box-shadow:
                inset 3px 0 0 #6366f1;
        }

        .menu-icon {

            width: 20px;

            text-align: center;

            font-size: 16px;

            color: #818cf8;
        }


        /* =========================================
           USER PROFILE
        ========================================= */

        .user-box {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 15px 8px 5px;

            border-top:
                1px solid rgba(255,255,255,0.07);
        }

        .avatar {

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #06b6d4
                );

            font-size: 12px;

            font-weight: 800;

            box-shadow:
                0 0 20px
                rgba(99, 102, 241, 0.25);
        }

        .user-name {

            max-width: 145px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;

            font-size: 11px;

            font-weight: 700;
        }

        .user-role {

            margin-top: 3px;

            color: #64748b;

            font-size: 10px;

            font-weight: 500;
        }


        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main {

            width: calc(100% - 285px);

            margin-left: 285px;

            padding: 15px 45px 60px;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {

            height: 62px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom:
                1px solid rgba(255,255,255,0.05);
        }

        .date {

            color: #94a3b8;

            font-size: 12px;

            font-weight: 500;
        }

        .date span {

            color: #e2e8f0;
        }

        .theme-button {

            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border:
                1px solid rgba(255,255,255,0.08);

            border-radius: 11px;

            background:
                rgba(15,23,42,0.6);

            color: #cbd5e1;

            cursor: pointer;

            font-size: 16px;

            transition: 0.25s;
        }

        .theme-button:hover {

            color: #ffffff;

            border-color:
                rgba(99,102,241,0.35);

            background:
                rgba(99,102,241,0.12);

            transform: rotate(-10deg);
        }


        /* =========================================
           HERO
        ========================================= */

        .hero {

            padding-top: 38px;
        }

        .hero-badge {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 7px 11px;

            margin-bottom: 15px;

            border:
                1px solid rgba(99,102,241,0.18);

            border-radius: 20px;

            background:
                rgba(99,102,241,0.08);

            color: #a5b4fc;

            font-size: 10px;

            font-weight: 600;
        }

        .status-dot {

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #22c55e;

            box-shadow:
                0 0 10px rgba(34,197,94,0.7);
        }

        .hero h1 {

            max-width: 650px;

            font-size: 31px;

            line-height: 1.25;

            font-weight: 800;

            letter-spacing: -1px;

            background:
                linear-gradient(
                    135deg,
                    #ffffff 30%,
                    #a5b4fc 70%,
                    #67e8f9
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;
        }

        .hero p {

            max-width: 570px;

            margin-top: 13px;

            color: #94a3b8;

            font-size: 13px;

            line-height: 1.7;
        }


        /* =========================================
           SEARCH
        ========================================= */

        .search-box {

            position: relative;

            margin-top: 30px;
        }

        .search-box input {

            width: 100%;

            height: 53px;

            padding: 0 20px 0 48px;

            border:
                1px solid rgba(255,255,255,0.08);

            border-radius: 14px;

            background:
                rgba(15,23,42,0.60);

            color: #ffffff;

            outline: none;

            font-family: inherit;

            font-size: 13px;

            backdrop-filter: blur(15px);

            transition: 0.25s;
        }

        .search-box input::placeholder {

            color: #475569;
        }

        .search-box input:focus {

            border-color: #6366f1;

            box-shadow:
                0 0 0 3px
                rgba(99,102,241,0.10),

                0 0 25px
                rgba(99,102,241,0.08);
        }

        .search-icon {

            position: absolute;

            left: 17px;

            top: 16px;

            color: #64748b;

            font-size: 18px;

            pointer-events: none;
        }


        /* =========================================
           CATEGORIES
        ========================================= */

        .categories {

            display: flex;

            flex-wrap: wrap;

            gap: 8px;

            margin-top: 14px;
        }

        .category {

            padding: 7px 12px;

            border:
                1px solid rgba(255,255,255,0.07);

            border-radius: 20px;

            background:
                rgba(15,23,42,0.45);

            color: #64748b;

            font-size: 10px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }

        .category:hover {

            color: #c7d2fe;

            border-color:
                rgba(99,102,241,0.25);
        }

        .category.active {

            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    rgba(99,102,241,0.30),
                    rgba(79,70,229,0.18)
                );

            border-color:
                rgba(99,102,241,0.30);
        }


        /* =========================================
           APPLICATION GRID
        ========================================= */

        .applications {

            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-top: 28px;
        }


        /* =========================================
           APPLICATION CARD
        ========================================= */

        .app-card {

            position: relative;

            min-height: 245px;

            padding: 22px;

            display: block;

            overflow: hidden;

            text-decoration: none;

            color: inherit;

            background:
                linear-gradient(
                    145deg,
                    rgba(15,23,42,0.78),
                    rgba(15,23,42,0.52)
                );

            border:
                1px solid rgba(255,255,255,0.08);

            border-radius: 18px;

            backdrop-filter: blur(20px);

            -webkit-backdrop-filter: blur(20px);

            box-shadow:
                0 20px 45px
                rgba(0,0,0,0.18),

                inset 0 1px 0
                rgba(255,255,255,0.035);

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }


        /* Card Glow */

        .app-card::before {

            content: "";

            position: absolute;

            width: 130px;
            height: 130px;

            top: -70px;
            right: -60px;

            border-radius: 50%;

            background:
                rgba(99,102,241,0.18);

            filter: blur(35px);

            opacity: 0;

            transition: 0.3s;
        }

        .app-card:hover {

            transform: translateY(-5px);

            border-color:
                rgba(99,102,241,0.35);

            box-shadow:
                0 25px 55px
                rgba(0,0,0,0.28),

                0 0 35px
                rgba(79,70,229,0.08);
        }

        .app-card:hover::before {

            opacity: 1;
        }


        /* =========================================
           APP ICON
        ========================================= */

        .app-icon {

            width: 54px;
            height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 22px;

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    rgba(99,102,241,0.18),
                    rgba(6,182,212,0.10)
                );

            border:
                1px solid rgba(99,102,241,0.18);

            color: #a5b4fc;

            font-size: 22px;

            box-shadow:
                0 10px 25px
                rgba(79,70,229,0.10);
        }

        .app-card h2 {

            font-size: 15px;

            font-weight: 700;

            margin-bottom: 9px;
        }

        .app-card p {

            min-height: 40px;

            color: #64748b;

            font-size: 11px;

            line-height: 1.6;
        }


        /* =========================================
           TAGS
        ========================================= */

        .tags {

            display: flex;

            flex-wrap: wrap;

            gap: 5px;

            margin-top: 18px;
        }

        .tag {

            padding: 5px 8px;

            border-radius: 6px;

            background:
                rgba(99,102,241,0.08);

            border:
                1px solid rgba(99,102,241,0.10);

            color: #818cf8;

            font-size: 8px;

            font-weight: 700;

            letter-spacing: 0.2px;
        }


        /* =========================================
           SSO BADGE
        ========================================= */

        .coming {

            position: absolute;

            top: 18px;
            right: 18px;

            padding: 5px 7px;

            border-radius: 6px;

            background:
                rgba(6,182,212,0.08);

            border:
                1px solid rgba(6,182,212,0.12);

            color: #67e8f9;

            font-size: 8px;

            font-weight: 700;

            letter-spacing: 0.3px;
        }


        /* =========================================
           PRA REGISTRASI SPECIAL
        ========================================= */

        .app-card.primary {

            border-color:
                rgba(99,102,241,0.22);

            background:
                linear-gradient(
                    145deg,
                    rgba(79,70,229,0.13),
                    rgba(15,23,42,0.70)
                );
        }

        .app-card.primary .app-icon {

            background:
                linear-gradient(
                    135deg,
                    rgba(99,102,241,0.35),
                    rgba(6,182,212,0.18)
                );

            color: #ffffff;

            border-color:
                rgba(99,102,241,0.30);

            box-shadow:
                0 0 25px
                rgba(99,102,241,0.15);
        }


        /* =========================================
           DISABLED CARDS
        ========================================= */

        .app-card.disabled {

            cursor: default;

            opacity: 0.75;
        }

        .app-card.disabled:hover {

            transform: none;

            border-color:
                rgba(255,255,255,0.08);

            box-shadow:
                0 20px 45px
                rgba(0,0,0,0.18);
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1200px) {

            .applications {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 800px) {

            .sidebar {

                width: 75px;

                padding: 20px 10px;
            }

            .brand {

                justify-content: center;

                padding: 0;
            }

            .brand-title,
            .brand-subtitle,
            .menu-title,
            .menu-item span:not(.menu-icon),
            .user-name,
            .user-role {

                display: none;
            }

            .user-box {

                justify-content: center;
            }

            .main {

                width: calc(100% - 95px);

                margin-left: 95px;

                padding:
                    15px 20px 50px;
            }

        }


        @media (max-width: 600px) {

            .applications {

                grid-template-columns: 1fr;
            }

            .hero h1 {

                font-size: 25px;
            }

            .hero p {

                font-size: 12px;
            }

        }

        /* =========================================
   LIGHT MODE
========================================= */

body.light-mode {

    background:
        radial-gradient(
            circle at 15% 15%,
            rgba(99, 102, 241, 0.12),
            transparent 30%
        ),
        radial-gradient(
            circle at 85% 85%,
            rgba(6, 182, 212, 0.10),
            transparent 30%
        ),
        #f8fafc;

    color: #0f172a;
}


/* Grid */

body.light-mode::before {

    background-image:

        linear-gradient(
            rgba(15, 23, 42, 0.035) 1px,
            transparent 1px
        ),

        linear-gradient(
            90deg,
            rgba(15, 23, 42, 0.035) 1px,
            transparent 1px
        );
}


/* Sidebar */

body.light-mode .sidebar {

    background: rgba(255, 255, 255, 0.78);

    border-color:
        rgba(15, 23, 42, 0.08);

    box-shadow:
        0 20px 50px rgba(15, 23, 42, 0.08),

        inset 0 1px 0
        rgba(255, 255, 255, 0.9);
}


/* Brand */

body.light-mode .brand-title {

    color: #0f172a;
}

body.light-mode .brand-subtitle {

    color: #64748b;
}


/* Menu */

body.light-mode .menu-item {

    color: #64748b;
}

body.light-mode .menu-item:hover {

    color: #312e81;

    background:
        rgba(99, 102, 241, 0.07);

    border-color:
        rgba(99, 102, 241, 0.12);
}

body.light-mode .menu-item.active {

    color: #312e81;

    background:
        linear-gradient(
            135deg,
            rgba(99, 102, 241, 0.13),
            rgba(6, 182, 212, 0.07)
        );

    border-color:
        rgba(99, 102, 241, 0.18);
}


/* User */

body.light-mode .user-box {

    border-color:
        rgba(15, 23, 42, 0.08);
}

body.light-mode .user-name {

    color: #0f172a;
}

body.light-mode .user-role {

    color: #64748b;
}


/* Topbar */

body.light-mode .topbar {

    border-color:
        rgba(15, 23, 42, 0.07);
}

body.light-mode .date {

    color: #64748b;
}

body.light-mode .date span {

    color: #334155;
}


/* Theme button */

body.light-mode .theme-button {

    background:
        rgba(255, 255, 255, 0.75);

    color: #475569;

    border-color:
        rgba(15, 23, 42, 0.08);

    box-shadow:
        0 5px 20px
        rgba(15, 23, 42, 0.05);
}

body.light-mode .theme-button:hover {

    color: #4f46e5;

    border-color:
        rgba(99, 102, 241, 0.25);

    background:
        rgba(99, 102, 241, 0.06);
}


/* Hero */

body.light-mode .hero h1 {

    background:
        linear-gradient(
            135deg,
            #0f172a 30%,
            #4f46e5 70%,
            #0891b2
        );

    -webkit-background-clip: text;

    -webkit-text-fill-color: transparent;
}

body.light-mode .hero p {

    color: #64748b;
}


/* Search */

body.light-mode .search-box input {

    background:
        rgba(255, 255, 255, 0.75);

    color: #0f172a;

    border-color:
        rgba(15, 23, 42, 0.09);

    box-shadow:
        0 10px 30px
        rgba(15, 23, 42, 0.03);
}

body.light-mode .search-box input::placeholder {

    color: #94a3b8;
}

body.light-mode .search-box input:focus {

    border-color: #6366f1;

    box-shadow:
        0 0 0 3px
        rgba(99, 102, 241, 0.08),

        0 10px 30px
        rgba(99, 102, 241, 0.08);
}


/* Categories */

body.light-mode .category {

    background:
        rgba(255, 255, 255, 0.65);

    color: #64748b;

    border-color:
        rgba(15, 23, 42, 0.07);
}

body.light-mode .category:hover {

    color: #4f46e5;

    border-color:
        rgba(99, 102, 241, 0.20);
}

body.light-mode .category.active {

    color: #3730a3;

    background:
        rgba(99, 102, 241, 0.10);

    border-color:
        rgba(99, 102, 241, 0.20);
}


/* Application Card */

body.light-mode .app-card {

    background:
        linear-gradient(
            145deg,
            rgba(255, 255, 255, 0.88),
            rgba(248, 250, 252, 0.78)
        );

    border-color:
        rgba(15, 23, 42, 0.08);

    box-shadow:
        0 15px 40px
        rgba(15, 23, 42, 0.06),

        inset 0 1px 0
        rgba(255, 255, 255, 0.95);
}

body.light-mode .app-card:hover {

    border-color:
        rgba(99, 102, 241, 0.30);

    box-shadow:
        0 20px 45px
        rgba(15, 23, 42, 0.10),

        0 0 30px
        rgba(99, 102, 241, 0.07);
}

body.light-mode .app-card h2 {

    color: #0f172a;
}

body.light-mode .app-card p {

    color: #64748b;
}


/* App Icon */

body.light-mode .app-icon {

    background:
        linear-gradient(
            135deg,
            rgba(99, 102, 241, 0.10),
            rgba(6, 182, 212, 0.07)
        );

    border-color:
        rgba(99, 102, 241, 0.14);

    color: #4f46e5;
}


/* Tags */

body.light-mode .tag {

    background:
        rgba(99, 102, 241, 0.07);

    border-color:
        rgba(99, 102, 241, 0.10);

    color: #4f46e5;
}


/* Primary Pra Registrasi */

body.light-mode .app-card.primary {

    background:
        linear-gradient(
            145deg,
            rgba(99, 102, 241, 0.10),
            rgba(255, 255, 255, 0.90)
        );

    border-color:
        rgba(99, 102, 241, 0.20);
}

body.light-mode .app-card.primary .app-icon {

    background:
        linear-gradient(
            135deg,
            rgba(99, 102, 241, 0.20),
            rgba(6, 182, 212, 0.12)
        );

    color: #4338ca;

    border-color:
        rgba(99, 102, 241, 0.20);
}

    </style>

</head>


<body>


    <!-- Background Glow -->

    <div class="orb orb-one"></div>

    <div class="orb orb-two"></div>


    <div class="app">


        <!-- =====================================
             SIDEBAR
        ====================================== -->

        <aside class="sidebar">


            <div>


                <!-- Brand -->

                <div class="brand">

                    <div class="brand-logo">
                        S
                    </div>

                    <div>

                        <div class="brand-title">
                            DESWA
                        </div>

                        <div class="brand-subtitle">
                            SSO Integrated System
                        </div>

                    </div>

                </div>


                <!-- Menu -->

                <div class="menu-title">
                    Main Menu
                </div>


                <nav class="menu">


                    <a
                        href="{{ url('/dashboard') }}"
                        class="menu-item active"
                    >

                        <span class="menu-icon">
                            ▦
                        </span>

                        <span>
                            Aplikasi Digital
                        </span>

                    </a>


                    <a
                        href="#"
                        class="menu-item"
                    >

                        <span class="menu-icon">
                            ◫
                        </span>

                        <span>
                            Sesi Perangkat
                        </span>

                    </a>


                </nav>


            </div>


            <!-- User -->

            <div class="user-box">


                <div class="avatar">
                    RA
                </div>


                <div>

                    <div class="user-name">
                        USER DEMO
                    </div>

                    <div class="user-role">
                        MAHASISWA
                    </div>

                </div>


            </div>


        </aside>



        <!-- =====================================
             MAIN
        ====================================== -->

        <main class="main">


            <!-- Topbar -->

            <header class="topbar">


                <div class="date">

                    <span>
                        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
                    </span>

                </div>


                <button
                   class="theme-button"
                   id="themeToggle"
                   title="Ubah tema"
                   type="button"
>
                   ☾
                </button>


            </header>



            <!-- Hero -->

            <section class="hero">


                <div class="hero-badge">

                    <span class="status-dot"></span>

                    SSO Integrated System

                </div>


                <h1>
                    Semua Aplikasi dengan Satu Akun!
                </h1>


                <p>

                    Sekarang login aplikasi tinggal pilih.
                    Tidak perlu pusing lupa password ataupun
                    login berulang kali di aplikasi yang berbeda.

                </p>


            </section>



            <!-- Search -->

            <div class="search-box">

                <span class="search-icon">
                    ⌕
                </span>


                <input
                    type="text"
                    id="searchApp"
                    placeholder="Cari aplikasi..."
                >

            </div>



            <!-- Categories -->

            <div class="categories">

                <span
                    class="category active"
                    data-category="all"
                >
                    Semua
                </span>

                <span
                    class="category"
                    data-category="akademik"
                >
                    Akademik
                </span>

                <span
                    class="category"
                    data-category="prestasi"
                >
                    Prestasi
                </span>

                <span
                    class="category"
                    data-category="kerjasama"
                >
                    Kerjasama
                </span>

            </div>



            <!-- Applications -->

            <section
                class="applications"
                id="applicationList"
            >


                <!-- RAISE -->

                <div
                    class="app-card disabled"
                    data-name="raise"
                    data-category="akademik"
                >

                    <span class="coming">
                        SSO
                    </span>


                    <div class="app-icon">
                        🎓
                    </div>


                    <h2>
                        RAISE
                    </h2>


                    <p>
                        Aplikasi dalam ekosistem
                        Single Sign-On.
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

                <div
                    class="app-card disabled"
                    data-name="bo"
                    data-category="prestasi"
                >

                    <span class="coming">
                        SSO
                    </span>


                    <div class="app-icon">
                        📊
                    </div>


                    <h2>
                        BO
                    </h2>


                    <p>
                        Aplikasi dalam ekosistem
                        Single Sign-On.
                    </p>


                    <div class="tags">

                        <span class="tag">
                            BO
                        </span>

                    </div>

                </div>



                <!-- SF -->

                <div
                    class="app-card disabled"
                    data-name="sf"
                    data-category="kerjasama"
                >

                    <span class="coming">
                        SSO
                    </span>


                    <div class="app-icon">
                        🤝
                    </div>


                    <h2>
                        SF
                    </h2>


                    <p>
                        Aplikasi dalam ekosistem
                        Single Sign-On.
                    </p>


                    <div class="tags">

                        <span class="tag">
                            SF
                        </span>

                    </div>

                </div>



                <!-- PRA REGISTRASI -->

                <a
                    href="{{ url('/pra-registrasi') }}"
                    class="app-card primary"
                    data-name="pra registrasi"
                    data-category="akademik"
                >


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



    <!-- =========================================
         SEARCH SCRIPT
    ========================================== -->

    <script>

        const searchInput =
            document.getElementById('searchApp');

        const cards =
            document.querySelectorAll('.app-card');


        searchInput.addEventListener(
            'input',
            function () {

                const keyword =
                    this.value.toLowerCase().trim();


                cards.forEach(card => {

                    const name =
                        card.dataset.name
                        .toLowerCase();


                    if (name.includes(keyword)) {

                        card.style.display = '';

                    } else {

                        card.style.display = 'none';

                    }

                });

            }
        );


        /* =====================================
           CATEGORY FILTER
        ====================================== */

        const categories =
            document.querySelectorAll('.category');


        categories.forEach(category => {

            category.addEventListener(
                'click',
                function () {

                    categories.forEach(item => {

                        item.classList.remove('active');

                    });


                    this.classList.add('active');


                    const selected =
                        this.dataset.category;


                    cards.forEach(card => {

                        const cardCategory =
                            card.dataset.category;


                        if (
                            selected === 'all' ||
                            selected === cardCategory
                        ) {

                            card.style.display = '';

                        } else {

                            card.style.display = 'none';

                        }

                    });

                }
            );

        });
 
/* =========================================
   DARK / LIGHT MODE
========================================= */

const themeToggle =
    document.getElementById('themeToggle');


/*
    Ambil tema yang tersimpan
*/

const savedTheme =
    localStorage.getItem('dashboard-theme');


/*
    Jika sebelumnya user memilih light mode
*/

if (savedTheme === 'light') {

    document.body.classList.add('light-mode');

    themeToggle.textContent = '☀';

    themeToggle.title = 'Gunakan mode malam';
}


/*
    Tombol toggle
*/

themeToggle.addEventListener('click', function () {

    document.body.classList.toggle('light-mode');


    const isLight =
        document.body.classList.contains('light-mode');


    if (isLight) {

        /*
            Mode siang
        */

        this.textContent = '☀';

        this.title = 'Gunakan mode malam';

        localStorage.setItem(
            'dashboard-theme',
            'light'
        );

    } else {

        /*
            Mode malam
        */

        this.textContent = '☾';

        this.title = 'Gunakan mode siang';

        localStorage.setItem(
            'dashboard-theme',
            'dark'
        );

    }

});

    </script>


</body>

</html>