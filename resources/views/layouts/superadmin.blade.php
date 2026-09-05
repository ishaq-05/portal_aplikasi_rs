<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Super Admin')
    </title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f9fb;
            color: #111827;
        }

        /* =====================================================
           APP
        ===================================================== */

        .app-container {
            width: 100%;
            min-height: 100vh;
            background: #f7f9fb;
            overflow-x: hidden;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .header {
            width: 100%;
            height: 85px;

            background: #ffffff;

            border-bottom: 1px solid #222;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 32px;
        }


        .logo-wrapper {
            height: 70px;

            display: flex;
            align-items: center;
        }


        .logo-wrapper img {
            width: 180px;
            height: 65px;

            object-fit: contain;
            object-position: center;

            display: block;
        }


        .admin-name {
            font-size: 16px;
            color: #111827;
            font-weight: 500;
        }


        /* =====================================================
           CONTENT WRAPPER
        ===================================================== */

        .content-wrapper {
            width: 100%;
            min-height: calc(100vh - 85px);

            display: flex;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: 242px;
            flex-shrink: 0;

            background: #ffffff;

            border-right: 1px solid #d7dce2;

            min-height: calc(100vh - 85px);
        }


        .sidebar-menu {
            list-style: none;

            padding: 26px 14px;
        }


        .sidebar-menu li {
            width: 100%;

            margin-bottom: 8px;
        }


        .sidebar-menu a {
            width: 100%;
            min-height: 54px;

            padding: 0 18px;

            display: flex;
            align-items: center;

            gap: 14px;

            text-decoration: none;

            color: #172033;

            font-size: 15px;

            border-radius: 9px;

            transition: 0.15s ease;
        }


        .sidebar-menu a:hover {
            background: #effaf6;
            color: #087d5e;
        }


        .sidebar-menu a.active {
            background: #087f70;

            color: #ffffff;

            font-weight: bold;
        }


        .menu-icon {
            width: 22px;
            height: 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            font-size: 19px;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {
            flex: 1;

            min-width: 0;

            background: #f7f9fb;

            padding: 38px 38px 50px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 700px) {

            .header {
                height: 70px;
                padding: 0 18px;
            }


            .logo-wrapper img {
                width: 145px;
                height: 58px;
            }


            .content-wrapper {
                flex-direction: column;
            }


            .sidebar {
                width: 100%;

                min-height: auto;

                border-right: none;

                border-bottom: 1px solid #d7dce2;
            }


            .sidebar-menu {
                display: flex;

                overflow-x: auto;

                padding: 8px;
            }


            .sidebar-menu li {
                width: auto;
                margin: 0;
            }


            .sidebar-menu a {
                width: auto;

                min-width: 160px;

                min-height: 45px;

                padding: 0 14px;
            }


            .main-content {
                padding: 25px 15px 35px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

<div class="app-container">


    {{-- =====================================================
         TOPBAR
    ====================================================== --}}

    <header class="header">

        <div class="logo-wrapper">

            <img
                src="{{ asset('images/logo-syifa-global-group.png') }}"
                alt="Syifa Global Group"
            >

        </div>


        <div class="admin-name">
            super admin
        </div>

    </header>



    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <div class="content-wrapper">


        {{-- =================================================
             SIDEBAR
        ================================================== --}}

        <aside class="sidebar">

            <ul class="sidebar-menu">


                {{-- DASHBOARD --}}

                <li>

                    <a
                        href="{{ route('superadmin.dashboard') }}"
                        class="{{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}"
                    >

                        <span class="menu-icon">
                            🏠
                        </span>

                        <span>
                            DASHBOARD
                        </span>

                    </a>

                </li>



                {{-- KELOLA APLIKASI --}}

                <li>

                    <a
                        href="{{ route('superadmin.applications.index') }}"
                        class="{{ request()->routeIs('superadmin.applications.*') ? 'active' : '' }}"
                    >

                        <span class="menu-icon">
                            ⚙
                        </span>

                        <span>
                            KELOLA APLIKASI
                        </span>

                    </a>

                </li>



                {{-- KEMBALI KE PORTAL --}}

                <li>

                    <a
                        href="{{ route('applications.index') }}"
                    >

                        <span class="menu-icon">
                            ▦
                        </span>

                        <span>
                            KEMBALI KE PORTAL
                        </span>

                    </a>

                </li>


            </ul>

        </aside>



        {{-- =================================================
             HALAMAN
        ================================================== --}}

        <main class="main-content">

            @yield('content')

        </main>

    </div>

</div>


@stack('scripts')

</body>

</html>
