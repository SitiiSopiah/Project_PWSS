<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Pengelolaan Sampah')
    </title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #ffffff;
            color: #111820;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;

            width: 265px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #00652d 0%,
                #004d24 100%
            );

            color: white;

            z-index: 1000;

            overflow-y: auto;
        }


        /* =====================================================
           LOGO SIDEBAR
        ===================================================== */

        .sidebar-logo {
            height: 115px;

            background: white;

            display: flex;
            align-items: center;

            padding: 20px 24px;

            border-right: 1px solid #ddd;
        }

        .sidebar-logo-icon {
            width: 48px;
            height: 48px;

            min-width: 48px;

            border-radius: 6px;

            background: #08763b;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;

            margin-right: 15px;
        }

        .sidebar-logo-text {
            line-height: 1.05;
        }

        .sidebar-logo-text strong {
            display: block;

            font-size: 19px;

            font-weight: 800;

            color: #111820;
        }

        .sidebar-logo-text span {
            display: block;

            font-size: 12px;

            font-weight: 700;

            color: #222;

            margin-top: 5px;
        }


        /* =====================================================
           MENU SIDEBAR
        ===================================================== */

        .sidebar-menu {
            padding: 20px 12px 80px;
        }


        .sidebar-menu a {
            display: flex;
            align-items: center;

            width: 100%;
            min-height: 52px;

            padding: 0 14px;

            margin-bottom: 5px;

            border-radius: 10px;

            color: #ffffff;

            text-decoration: none;

            font-size: 15px;

            font-weight: 500;

            transition: all 0.2s ease;
        }


        .sidebar-menu a i {
            width: 30px;

            min-width: 30px;

            font-size: 20px;

            margin-right: 8px;

            text-align: center;
        }


        /* HOVER */

        .sidebar-menu a:hover {
            background: rgba(255, 255, 255, 0.12);

            color: #ffffff;
        }


        /* MENU AKTIF */

        .sidebar-menu a.active {
            background: linear-gradient(
                90deg,
                #268d20,
                #17771c
            );

            color: white;

            box-shadow:
                0 3px 8px rgba(0, 0, 0, 0.12);
        }


        /* =====================================================
           BAGIAN BAWAH SIDEBAR
        ===================================================== */

        .sidebar-bottom {
            position: absolute;

            bottom: 25px;
            left: 0;

            width: 100%;

            display: flex;

            justify-content: center;
        }


        /* Tombol logout */

        .logout-button {
            width: 42px;
            height: 42px;

            border: none;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.12);

            color: white;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;

            cursor: pointer;

            transition: 0.2s;
        }


        .logout-button:hover {
            background: rgba(255, 255, 255, 0.22);

            transform: scale(1.05);
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main {
            margin-left: 265px;

            min-height: 100vh;

            background: white;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            height: 90px;

            border-bottom: 1px solid #e5e5e5;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }


        /* Hamburger */

        .menu-button {
            font-size: 31px;

            color: #555;

            cursor: pointer;

            line-height: 1;
        }


        /* =====================================================
           ADMIN PROFILE
        ===================================================== */

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .admin-icon {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: #003f27;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;
        }


        .admin-name {
            line-height: 1.25;
        }


        .admin-name strong {
            display: block;

            font-size: 16px;

            font-weight: 700;
        }


        .admin-name span {
            display: block;

            color: #777;

            font-size: 13px;

            margin-top: 2px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .sidebar {
                width: 230px;
            }

            .main {
                margin-left: 230px;
            }

            .sidebar-logo {
                padding: 18px;
            }

            .sidebar-logo-text strong {
                font-size: 17px;
            }

            .sidebar-menu a {
                font-size: 14px;
            }

        }


        @media (max-width: 700px) {

            .sidebar {
                width: 230px;

                transform: translateX(-100%);

                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 18px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


{{-- =========================================================
     SIDEBAR
========================================================= --}}

<aside class="sidebar" id="sidebar">


    {{-- =====================================================
         LOGO
    ====================================================== --}}

    <div class="sidebar-logo">

        <div class="sidebar-logo-icon">

            <i class="bi bi-recycle"></i>

        </div>


        <div class="sidebar-logo-text">

            <strong>
                PENGELOLAAN
            </strong>

            <strong>
                SAMPAH
            </strong>

            <span>
                KAMPUNG PANYALAHAN
            </span>

        </div>

    </div>


    {{-- =====================================================
         MENU
    ====================================================== --}}

    <nav class="sidebar-menu">


        {{-- ================= DASHBOARD ================= --}}

        <a
            href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >

            <i class="bi bi-house-door-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        {{-- ================= JADWAL ================= --}}

        <a
            href="{{ route('jadwals.index') }}"
            class="{{ request()->routeIs('jadwals.*') ? 'active' : '' }}"
        >

            <i class="bi bi-calendar3"></i>

            <span>
                Jadwal Pemungutan
            </span>

        </a>


        {{-- ================= PEMASUKAN & PENGELUARAN ================= --}}

        <a
            href="{{ route('pemasukans.index') }}"
            class="{{
                request()->routeIs('pemasukans.*') ||
                request()->routeIs('pengeluarans.*')
                ? 'active'
                : ''
            }}"
        >

            <i class="bi bi-arrow-left-right"></i>

            <span>
                Pemasukan & Pengeluaran
            </span>

        </a>


        {{-- ================= FASILITAS ================= --}}

        <a
            href="{{ route('fasilitas.index') }}"
            class="{{ request()->routeIs('fasilitas.*') ? 'active' : '' }}"
        >

            <i class="bi bi-building"></i>

            <span>
                Data Fasilitas
            </span>

        </a>


        {{-- ================= PENCATATAN ================= --}}

        <a
            href="{{ route('pencatatans.index') }}"
            class="{{ request()->routeIs('pencatatans.*') ? 'active' : '' }}"
        >

            <i class="bi bi-clipboard2-data"></i>

            <span>
                Administrasi / Pencatatan
            </span>

        </a>


        {{-- ================= KEGIATAN ================= --}}

        <a
            href="{{ route('kegiatans.index') }}"
            class="{{ request()->routeIs('kegiatans.*') ? 'active' : '' }}"
        >

            <i class="bi bi-cloud-arrow-up-fill"></i>

            <span>
                Upload Kegiatan
            </span>

        </a>


        {{-- ================= VISI MISI ================= --}}

        <a
            href="#"
            class="{{ request()->is('visi-misi*') ? 'active' : '' }}"
        >

            <i class="bi bi-bullseye"></i>

            <span>
                Visi & Misi
            </span>

        </a>


        {{-- ================= TEKNISI ================= --}}

        <a
            href="#"
            class="{{ request()->is('teknisi*') ? 'active' : '' }}"
        >

            <i class="bi bi-diagram-3-fill"></i>

            <span>
                Teknisi
            </span>

        </a>


        {{-- ================= LAPORAN ================= --}}

        <a
            href="#"
            class="{{ request()->is('laporan*') ? 'active' : '' }}"
        >

            <i class="bi bi-file-earmark-text-fill"></i>

            <span>
                Laporan
            </span>

        </a>


        {{-- ================= PENGATURAN ================= --}}

        <a
            href="#"
            class="{{ request()->is('pengaturan*') ? 'active' : '' }}"
        >

            <i class="bi bi-gear-fill"></i>

            <span>
                Pengaturan
            </span>

        </a>


    </nav>


    {{-- =====================================================
         LOGOUT
    ====================================================== --}}

    <div class="sidebar-bottom">

        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="logout-button"
                title="Logout"
            >

                <i class="bi bi-arrow-left"></i>

            </button>

        </form>

    </div>


</aside>



{{-- =========================================================
     MAIN
========================================================= --}}

<main class="main">


    {{-- =====================================================
         TOPBAR
    ====================================================== --}}

    <header class="topbar">


        {{-- HAMBURGER --}}

        <div
            class="menu-button"
            onclick="toggleSidebar()"
        >

            <i class="bi bi-list"></i>

        </div>


        {{-- ADMIN --}}

        <div class="admin-profile">

            <div class="admin-icon">

                <i class="bi bi-person-fill"></i>

            </div>


            <div class="admin-name">

                <strong>
                    Admin
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </div>


    </header>


    {{-- =====================================================
         ISI HALAMAN
    ====================================================== --}}

    @yield('content')


</main>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

    function toggleSidebar()
    {
        const sidebar = document.getElementById('sidebar');

        sidebar.classList.toggle('show');
    }

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


@stack('scripts')


</body>

</html>