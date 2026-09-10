<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        html, body {
            width: 100%;
            height: 100%;
            background: #ffffff;
            color: #111827;
        }

        .app-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #ffffff;
        }

        /* TOPBAR / HEADER (Dikunci di posisi atas) */
        .header {
            width: 100%;
            height: 50px;
            background: #5b8260;
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 1000;
            position: fixed; /* Kunci header di atas */
            top: 0;
            left: 0;
        }

        .logo-wrapper {
            height: 38px;
            display: flex;
            align-items: center;
        }

        .logo-wrapper img {
            height: 34px;
            width: auto;
            object-fit: contain;
        }

        /* CONTENT WRAPPER (Diberi margin-top setinggi header) */
        .content-wrapper {
            width: 100%;
            flex: 1;
            display: flex;
            margin-top: 50px; /* Supaya konten tidak tertutup header */
        }

        /* SIDEBAR (Dikunci di kiri) */
        .sidebar {
            width: 190px;
            flex-shrink: 0;
            background: #ffffff;
            padding: 16px 10px;
            position: sticky; /* Kunci sidebar agar ikut terdiam saat scroll */
            top: 50px;
            height: calc(100vh - 50px);
            overflow-y: auto;
        }

        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .sidebar-menu li {
            width: 100%;
        }

        .sidebar-menu a {
            width: 100%;
            height: 38px;
            padding: 0 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #2d3748;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover {
            background: #f1f5f9;
        }

        .sidebar-menu a.active {
            background: #d2e3d7;
            color: #1e293b;
            font-weight: 600;
        }

        .menu-icon {
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .menu-icon svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: #475569;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .sidebar-menu a.active .menu-icon svg {
            stroke: #2e4e3f;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            min-width: 0;
            background: #f7f9fb;
            padding: 0;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                top: 0;
                padding: 8px;
            }

            .sidebar-menu {
                flex-direction: row;
                overflow-x: auto;
            }

            .sidebar-menu a {
                white-space: nowrap;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="app-container">

    <!-- TOPBAR -->
    <header class="header">
        <div class="logo-wrapper">
            <img src="{{ asset('images/logo-syifa-global-group.png') }}" alt="Syifa Global Group">
        </div>
    </header>

    <!-- CONTENT WRAPPER -->
    <div class="content-wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <ul class="sidebar-menu">

                <!-- DASHBOARD -->
                <li>
                    <a href="{{ route('superadmin.dashboard') }}" class="{{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- KELOLA APLIKASI -->
                <li>
                    <a href="{{ route('superadmin.applications.index') }}" class="{{ request()->routeIs('superadmin.applications.*') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </span>
                        <span>Kelola Aplikasi</span>
                    </a>
                </li>

                <!-- SEMUA APLIKASI -->
                <li>
                    <a href="{{ route('superadmin.all-applications') }}" class="{{ request()->routeIs('superadmin.all-applications') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </span>
                        <span>Semua Aplikasi</span>
                    </a>
                </li>

                <!-- KEMBALI KE PORTAL -->
                <li>
                    <a href="{{ route('applications.index') }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 24 24">
                                <polyline points="9 14 4 9 9 4"></polyline>
                                <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                            </svg>
                        </span>
                        <span>Kembali ke portal</span>
                    </a>
                </li>

            </ul>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">
            @yield('content')
        </main>

    </div>

</div>

@stack('scripts')

</body>
</html>