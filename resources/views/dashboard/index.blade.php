<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard SSO</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #09090b;
            color: #f5f5f5;
            min-height: 100vh;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 245px;
            background: #18181b;
            border: 1px solid #27272a;
            min-height: 100vh;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            left: 8px;
            top: 4px;
            bottom: 4px;
            border-radius: 7px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 55px;
            padding-left: 8px;
        }

        .brand-logo {
            width: 34px;
            height: 34px;
            background: #ffffff;
            color: #18181b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 18px;
            border-radius: 2px;
        }

        .brand-title {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #a1a1aa;
            margin-top: 3px;
        }

        .menu-title {
            font-size: 12px;
            color: #a1a1aa;
            margin-bottom: 12px;
            padding-left: 8px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 10px;
            color: #d4d4d8;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
            transition: .2s;
        }

        .menu-item:hover,
        .menu-item.active {
            background: #29292d;
            color: white;
        }

        .menu-icon {
            width: 18px;
            text-align: center;
            font-size: 17px;
        }

        /* =========================
           USER
        ========================= */

        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 8px;
            border-top: 1px solid #27272a;
            padding-top: 18px;
        }

        .avatar {
            width: 34px;
            height: 34px;
            background: #27272a;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
        }

        .user-name {
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 135px;
        }

        .user-role {
            color: #a1a1aa;
            font-size: 11px;
            margin-top: 2px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 245px;
            width: calc(100% - 245px);
            padding: 4px 38px 50px 43px;
        }

        .topbar {
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #18181b;
        }

        .date {
            color: #d4d4d8;
            font-size: 14px;
            font-weight: 600;
        }

        .theme-button {
            width: 38px;
            height: 38px;
            border: 1px solid #27272a;
            background: transparent;
            border-radius: 7px;
            color: #f5f5f5;
            cursor: pointer;
            font-size: 17px;
        }

        .theme-button:hover {
            background: #18181b;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            padding-top: 25px;
        }

        .hero h1 {
            font-size: 25px;
            line-height: 1.3;
            margin-bottom: 20px;
            color: #fafafa;
        }

        .hero p {
            max-width: 500px;
            color: #d4d4d8;
            font-size: 16px;
            line-height: 1.5;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-box {
            margin-top: 32px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            height: 56px;
            background: transparent;
            border: 1px solid #27272a;
            border-radius: 7px;
            color: white;
            padding: 0 20px 0 48px;
            outline: none;
            font-size: 14px;
        }

        .search-box input:focus {
            border-color: #52525b;
        }

        .search-icon {
            position: absolute;
            left: 17px;
            top: 17px;
            color: #71717a;
            font-size: 20px;
        }

        /* =========================
           CATEGORY
        ========================= */

        .categories {
            display: flex;
            gap: 9px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .category {
            border: 1px solid #27272a;
            background: #27272a;
            color: #f4f4f5;
            border-radius: 20px;
            padding: 7px 13px;
            font-size: 13px;
        }

        .category.active {
            background: #3f3f46;
        }

        /* =========================
           APPLICATION CARDS
        ========================= */

        .applications {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
            margin-top: 36px;
        }

        .app-card {
            min-height: 255px;
            background: #141416;
            border: 1px solid #27272a;
            border-radius: 11px;
            padding: 22px 20px;
            text-decoration: none;
            color: inherit;
            transition: transform .2s, border-color .2s, background .2s;
            position: relative;
            overflow: hidden;
        }

        .app-card:hover {
            transform: translateY(-3px);
            border-color: #52525b;
            background: #18181b;
        }

        .app-icon {
            width: 58px;
            height: 58px;
            border-radius: 13px;
            background: #27272a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin-bottom: 22px;
        }

        .app-card h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .app-card p {
            color: #a1a1aa;
            font-size: 13px;
            line-height: 1.55;
            min-height: 42px;
        }

        .tags {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .tag {
            background: #27272a;
            color: #d4d4d8;
            border-radius: 4px;
            padding: 5px 8px;
            font-size: 10px;
            font-weight: 700;
        }

        .app-card.disabled {
            cursor: default;
        }

        .app-card.disabled:hover {
            transform: none;
        }

        .coming {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 10px;
            color: #71717a;
            background: #27272a;
            padding: 5px 7px;
            border-radius: 5px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {
            .applications {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand-title,
            .brand-subtitle,
            .menu-title,
            .menu-item span:not(.menu-icon),
            .user-name,
            .user-role {
                display: none;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .user-box {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);
                padding: 4px 20px 40px;
            }

            .applications {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>
            <div class="brand">
                <div class="brand-logo">S</div>

                <div>
                    <div class="brand-title">DESWA</div>
                    <div class="brand-subtitle">SSO Integrated System</div>
                </div>
            </div>

            <div class="menu-title">
                Main Menu
            </div>

            <nav class="menu">

                <a href="{{ url('/dashboard') }}"
                   class="menu-item active">
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


    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="date">
                {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
            </div>

            <button class="theme-button">
                ☾
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

            <input
                type="text"
                id="searchApp"
                placeholder="Cari aplikasi..."
            >

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
            <div class="app-card disabled"
                 data-name="raise">

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
            <div class="app-card disabled"
                 data-name="bo">

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
            <div class="app-card disabled"
                 data-name="sf">

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
            <a href="{{ url('/pra-registrasi') }}"
               class="app-card"
               data-name="pra registrasi">

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

    searchInput.addEventListener('input', function () {

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

</script>

</body>
</html>