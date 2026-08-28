<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Pengelolaan Sampah')
    </title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        /* =========================================
           RESET
        ========================================= */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7f6;
            color: #17202a;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            width: 265px;
            height: 100vh;

            position: fixed;
            left: 0;
            top: 0;

            background: #006b32;
            color: white;

            overflow-y: auto;

            z-index: 1000;

            transition: all 0.3s ease;
        }


        /* Header Sidebar */

        .sidebar-header {
            height: 115px;

            background: white;
            color: #111;

            display: flex;
            align-items: center;

            padding: 20px;

            border-bottom: 1px solid #e5e5e5;
        }


        /* Logo */

        .logo-box {
            width: 48px;
            height: 48px;

            min-width: 48px;

            background: #087f3f;

            border-radius: 7px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 25px;

            margin-right: 12px;
        }


        /* Brand */

        .brand-title {
            font-size: 20px;

            font-weight: bold;

            line-height: 1.05;
        }


        .brand-subtitle {
            font-size: 12px;

            font-weight: bold;

            margin-top: 5px;

            white-space: nowrap;
        }


        /* =========================================
           SIDEBAR MENU
        ========================================= */

        .sidebar-menu {
            padding: 20px 12px 30px;
        }


        .sidebar-menu a {
            display: flex;

            align-items: center;

            gap: 14px;

            padding: 14px 14px;

            margin-bottom: 5px;

            color: white;

            text-decoration: none;

            border-radius: 10px;

            font-size: 15px;

            transition: all 0.2s ease;
        }


        .sidebar-menu a:hover {
            background: rgba(255,255,255,.10);

            transform: translateX(2px);
        }


        .sidebar-menu a.active {
            background: #188c20;

            box-shadow: 0 3px 8px rgba(0,0,0,.10);
        }


        .sidebar-menu i {
            width: 24px;

            min-width: 24px;

            text-align: center;

            font-size: 16px;
        }


        .sidebar-menu span {
            line-height: 1.3;
        }


        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main-content {
            margin-left: 265px;

            min-height: 100vh;

            transition: all 0.3s ease;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            height: 90px;

            background: #ffffff;

            border-bottom: 1px solid #e1e1e1;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 35px;

            position: sticky;

            top: 0;

            z-index: 900;
        }


        /* Tombol Menu */

        .menu-button {
            width: 45px;
            height: 45px;

            border: none;

            background: transparent;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #555;

            font-size: 25px;

            cursor: pointer;

            border-radius: 8px;

            transition: 0.2s;
        }


        .menu-button:hover {
            background: #f1f1f1;

            color: #087f3f;
        }


        /* =========================================
           ADMIN
        ========================================= */

        .admin {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .admin-icon {
            width: 44px;
            height: 44px;

            background: #006b32;

            color: #ffffff;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;
        }


        .admin-info {
            display: flex;

            flex-direction: column;

            line-height: 1.3;
        }


        .admin-info strong {
            font-size: 16px;

            color: #17202a;
        }


        .admin-info span {
            font-size: 13px;

            color: #777;

            margin-top: 2px;
        }


        /* =========================================
           PAGE CONTENT
        ========================================= */

        .page-content {
            padding: 30px 35px;

            min-height: calc(100vh - 90px);
        }


        /* =========================================
           GENERAL CARD
        ========================================= */

        .card {
            border: none;

            border-radius: 12px;

            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }


        /* =========================================
           BUTTON
        ========================================= */

        .btn-success {
            background: #188c20;

            border-color: #188c20;
        }


        .btn-success:hover {
            background: #127018;

            border-color: #127018;
        }


        /* =========================================
           TABLE
        ========================================= */

        .table {
            margin-bottom: 0;
        }


        .table thead th {
            background: #d8eee5;

            color: #111;

            font-weight: 600;

            vertical-align: middle;
        }


        .table td {
            vertical-align: middle;
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 992px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 0 20px;
            }

            .page-content {
                padding: 25px 20px;
            }

        }


        @media (max-width: 576px) {

            .sidebar {
                width: 250px;
            }

            .sidebar-header {
                height: 105px;
            }

            .brand-title {
                font-size: 18px;
            }

            .brand-subtitle {
                font-size: 10px;
            }

            .topbar {
                height: 75px;
            }

            .admin-info {
                display: none;
            }

            .page-content {
                padding: 20px 15px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================
         SIDEBAR
    ========================================= --}}

    <aside class="sidebar" id="sidebar">


        {{-- SIDEBAR HEADER --}}

        <div class="sidebar-header">

            <div class="logo-box">

                <i class="fas fa-recycle"></i>

            </div>


            <div>

                <div class="brand-title">

                    PENGELOLAAN<br>

                    SAMPAH

                </div>


                <div class="brand-subtitle">

                    KAMPUNG PANYALAHAN

                </div>

            </div>

        </div>


        {{-- =========================================
             MENU SIDEBAR
        ========================================= --}}

        <div class="sidebar-menu">


            {{-- DASHBOARD --}}

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="fas fa-home"></i>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- JADWAL --}}

            <a href="{{ route('jadwals.index') }}"
               class="{{ request()->routeIs('jadwals.*') ? 'active' : '' }}">

                <i class="fas fa-calendar-alt"></i>

                <span>
                    Jadwal Pemungutan
                </span>

            </a>


            {{-- DATA WARGA --}}

            <a href="{{ route('wargas.index') }}"
               class="{{ request()->routeIs('wargas.*') ? 'active' : '' }}">

                <i class="fas fa-users"></i>

                <span>
                    Data Warga
                </span>

            </a>


            {{-- DATA PETUGAS --}}

            <a href="{{ route('petugas.index') }}"
               class="{{ request()->routeIs('petugas.*') ? 'active' : '' }}">

                <i class="fas fa-user-tie"></i>

                <span>
                    Data Petugas
                </span>

            </a>


            {{-- DATA FASILITAS --}}

            <a href="{{ route('fasilitas.index') }}"
               class="{{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">

                <i class="fas fa-building"></i>

                <span>
                    Data Fasilitas
                </span>

            </a>


            {{-- ADMINISTRASI --}}

            <a href="{{ route('administrasi.index') }}"
               class="{{ request()->routeIs('administrasi.*') ||
                          request()->routeIs('pemasukans.*') ||
                          request()->routeIs('pengeluarans.*')
                          ? 'active' : '' }}">

                <i class="fas fa-calculator"></i>

                <span>
                    Administrasi / Pencatatan
                </span>

            </a>


            {{-- UPLOAD KEGIATAN --}}

            <a href="{{ route('kegiatans.index') }}"
               class="{{ request()->routeIs('kegiatans.*') ? 'active' : '' }}">

                <i class="fas fa-cloud-upload-alt"></i>

                <span>
                    Upload Kegiatan
                </span>

            </a>


        </div>

    </aside>



    {{-- =========================================
         MAIN CONTENT
    ========================================= --}}

    <main class="main-content">


        {{-- =========================================
             TOPBAR
        ========================================= --}}

        <header class="topbar">


            {{-- BUTTON MENU --}}

            <button
                type="button"
                class="menu-button"
                id="menuButton">

                <i class="fas fa-bars"></i>

            </button>


            {{-- ADMIN --}}

            <div class="admin">


                <div class="admin-icon">

                    <i class="fas fa-user"></i>

                </div>


                <div class="admin-info">

                    <strong>
                        Admin
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>


            </div>

        </header>



        {{-- =========================================
             CONTENT
        ========================================= --}}

        <section class="page-content">

            @yield('content')

        </section>


    </main>



    {{-- =========================================
         JAVASCRIPT
    ========================================= --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <script>

        const menuButton =
            document.getElementById('menuButton');

        const sidebar =
            document.getElementById('sidebar');


        menuButton.addEventListener('click', function () {

            sidebar.classList.toggle('show');

        });


        /*
         * Tutup sidebar ketika klik di luar
         * pada tampilan mobile
         */

        document.addEventListener('click', function (event) {

            if (window.innerWidth <= 992) {

                if (
                    !sidebar.contains(event.target) &&
                    !menuButton.contains(event.target)
                ) {

                    sidebar.classList.remove('show');

                }

            }

        });

    </script>


</body>

</html>