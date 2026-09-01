<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal Aplikasi Rumah Sakit</title>

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }


        body {
            font-family:
                "Inter",
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f7fb;
            color: #1f2937;

            line-height: 1.5;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            position: sticky;
            top: 0;
            z-index: 1000;

            width: 100%;

            background: rgba(255, 255, 255, 0.97);

            border-bottom: 1px solid #e5e7eb;

            box-shadow:
                0 2px 10px rgba(15, 23, 42, 0.04);

            padding: 14px 40px;
        }


        .header-content {
            width: 100%;
            min-height: 58px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }


        /* =====================================================
           BRAND / LOGO SYIFA
        ===================================================== */

        .brand {
            display: flex;
            align-items: center;

            flex-shrink: 0;
        }


        .portal-logo {
            display: flex;
            align-items: center;
        }


        .portal-logo img {
            display: block;

            width: 180px;
            height: auto;

            max-height: 55px;

            object-fit: contain;
            object-position: center;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            display: flex;
            align-items: center;

            gap: 8px;
        }


        .nav-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            padding: 10px 15px;

            color: #475569;

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            border-radius: 9px;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }


        .nav-link:hover {
            background: #f0fdfa;
            color: #0f766e;

            transform: translateY(-1px);
        }


        .nav-link.active {
            background: #f0fdfa;
            color: #0f766e;
        }


        /* =====================================================
           MAIN CONTAINER
        ===================================================== */

        .container {
            width: 100%;
            max-width: 1200px;

            margin: 0 auto;

            padding:
                55px 25px
                70px;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            text-align: center;

            margin-bottom: 55px;
        }


        .hero h2 {
            color: #173f6b;

            font-size: 36px;
            font-weight: 700;

            letter-spacing: -0.5px;

            margin-bottom: 10px;
        }


        .hero p {
            color: #64748b;

            font-size: 16px;
            font-weight: 400;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-area {
            width: 100%;
            max-width: 720px;

            margin: 30px auto 0;
        }


        .search-form {
            display: flex;

            gap: 10px;

            width: 100%;
        }


        .search-input {
            flex: 1;

            min-width: 0;

            padding: 15px 18px;

            background: #ffffff;

            border: 1px solid #d1d5db;

            border-radius: 11px;

            color: #1f2937;

            font-family: inherit;
            font-size: 15px;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }


        .search-input::placeholder {
            color: #94a3b8;
        }


        .search-input:focus {
            border-color: #0f766e;

            box-shadow:
                0 0 0 3px rgba(15, 118, 110, 0.10);
        }


        .search-button {
            flex-shrink: 0;

            padding: 15px 25px;

            border: none;
            border-radius: 11px;

            background: #0f766e;
            color: #ffffff;

            font-family: inherit;
            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .search-button:hover {
            background: #115e59;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(15, 118, 110, 0.18);
        }


        /* =====================================================
           SEARCH RESULT HEADER
        ===================================================== */

        .search-result-header {
            margin-bottom: 30px;

            padding: 24px 26px;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 16px;
        }


        .search-result-header h2 {
            color: #173f6b;

            font-size: 25px;
            font-weight: 700;

            margin-bottom: 6px;
        }


        .search-result-header p {
            color: #64748b;

            font-size: 14px;
        }


        .search-result-header strong {
            color: #334155;
        }


        .clear-search {
            display: inline-flex;
            align-items: center;

            margin-top: 14px;

            padding: 8px 13px;

            background: #f0fdfa;

            color: #0f766e;

            border-radius: 8px;

            text-decoration: none;

            font-size: 13px;
            font-weight: 600;

            transition: background 0.2s ease;
        }


        .clear-search:hover {
            background: #ccfbf1;
        }


        /* =====================================================
           APPLICATION GRID
        ===================================================== */

        .applications {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 20px;
        }


        /* =====================================================
           APPLICATION CARD
        ===================================================== */

        .application-card {
            display: flex;
            flex-direction: column;

            min-width: 0;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 20px;

            min-height: 360px;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }


        .application-card:hover {
            transform: translateY(-4px);

            border-color: #cbd5e1;

            box-shadow:
                0 12px 28px rgba(15, 23, 42, 0.08);
        }


        /* =====================================================
           APPLICATION LOGO CONTAINER
        ===================================================== */

        .application-icon {
            width: 100%;
            height: 155px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            margin-bottom: 18px;

            padding: 18px;

            background: #f0fdfa;

            border-radius: 13px;

            overflow: hidden;
        }


        /* =====================================================
           APPLICATION LOGO

           Logo TIDAK dipaksa memenuhi container.

           Tujuannya:
           - tidak terpotong
           - tidak gepeng
           - tidak melebar
           - tidak berubah rasio
        ===================================================== */

        .application-icon img {
            display: block;

            width: auto;
            height: auto;

            max-width: 100%;
            max-height: 100%;

            object-fit: contain;
            object-position: center;

            margin: auto;
        }


        /* =====================================================
           FALLBACK ICON
        ===================================================== */

        .fallback-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;
            height: 100%;

            font-size: 42px;
            line-height: 1;
        }


        /* =====================================================
           APPLICATION NAME
        ===================================================== */

        .application-card h3 {
            color: #172b4d;

            font-size: 18px;
            font-weight: 700;

            line-height: 1.35;

            min-height: 25px;

            margin-bottom: 8px;

            word-break: break-word;
        }


        /* =====================================================
           APPLICATION DESCRIPTION
        ===================================================== */

        .application-description {
            color: #64748b;

            font-size: 14px;
            font-weight: 400;

            line-height: 1.6;

            margin-bottom: 18px;

            min-height: 67px;

            display: -webkit-box;

            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

            overflow: hidden;

            word-break: break-word;
        }


        /* =====================================================
           OPEN BUTTON
        ===================================================== */

        .open-button {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;

            margin-top: auto;

            min-height: 42px;

            padding: 10px 14px;

            background: #0f766e;
            color: #ffffff;

            border-radius: 9px;

            text-align: center;
            text-decoration: none;

            font-family: inherit;
            font-size: 14px;
            font-weight: 700;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .open-button:hover {
            background: #115e59;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(15, 118, 110, 0.18);
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {
            grid-column: 1 / -1;

            text-align: center;

            padding: 70px 20px;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            color: #64748b;
        }


        .empty h3 {
            color: #374151;

            font-size: 20px;

            margin-bottom: 8px;
        }


        .empty p {
            font-size: 14px;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1050px) {

            .applications {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }

        }


        /* =====================================================
           TABLET / SMALL LAPTOP
        ===================================================== */

        @media (max-width: 800px) {

            .header {
                padding: 12px 20px;
            }


            .header-content {
                min-height: auto;

                flex-direction: column;

                gap: 12px;
            }


            .navbar {
                width: 100%;

                justify-content: center;
            }


            .container {
                padding:
                    40px 18px
                    60px;
            }


            .hero {
                margin-bottom: 40px;
            }


            .hero h2 {
                font-size: 30px;
            }


            .applications {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 16px;
            }


            .application-card {
                padding: 18px;
            }


            .application-icon {
                height: 145px;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 600px) {

            .header {
                padding: 12px 15px;
            }


            .header-content {
                gap: 10px;
            }


            .portal-logo img {
                width: 150px;

                max-height: 48px;
            }


            .navbar {
                gap: 4px;

                flex-wrap: wrap;
            }


            .nav-link {
                padding: 8px 10px;

                font-size: 13px;
            }


            .container {
                padding:
                    35px 15px
                    50px;
            }


            .hero h2 {
                font-size: 27px;

                line-height: 1.25;
            }


            .hero p {
                font-size: 14px;
            }


            .search-area {
                margin-top: 25px;
            }


            .search-form {
                flex-direction: column;

                gap: 9px;
            }


            .search-input {
                width: 100%;
            }


            .search-button {
                width: 100%;
            }


            .search-result-header {
                padding: 20px;

                margin-bottom: 24px;
            }


            .search-result-header h2 {
                font-size: 22px;
            }


            .applications {
                grid-template-columns: 1fr;

                gap: 15px;
            }


            .application-card {
                min-height: 350px;

                padding: 18px;
            }


            .application-icon {
                height: 160px;

                padding: 20px;
            }


            .application-card h3 {
                font-size: 18px;
            }


            .application-description {
                font-size: 14px;

                min-height: 67px;
            }

        }


        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 380px) {

            .nav-link {
                padding: 7px 8px;

                font-size: 12px;
            }


            .hero h2 {
                font-size: 24px;
            }


            .application-icon {
                height: 145px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="header">

        <div class="header-content">


            <!-- LOGO -->

            <div class="brand">

                <div class="portal-logo">

                    <img
                        src="{{ asset('images/logo-syifa-global-group.png') }}"
                        alt="Syifa Global Group"
                    >

                </div>

            </div>


            <!-- NAVBAR -->

            <nav class="navbar">

                <a
                    href="{{ route('applications.index') }}"
                    class="nav-link active"
                >
                    🏠 Beranda
                </a>


                <a
                    href="{{ route('applications.index') }}#semua-aplikasi"
                    class="nav-link"
                >
                    📱 Semua Aplikasi
                </a>

            </nav>


        </div>

    </header>



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="container">


        <!-- =================================================
             HERO / BERANDA
        ================================================== -->

        <section
            class="hero"
            id="beranda"
        >

            <h2>
                Portal Aplikasi Rumah Sakit
            </h2>


            <p>
                Akses berbagai aplikasi rumah sakit dalam satu tempat.
            </p>


            <!-- SEARCH -->

            <div class="search-area">

                <form
                    method="GET"
                    action="{{ route('applications.index') }}"
                    class="search-form"
                >

                    <input
                        type="text"
                        name="search"
                        class="search-input"
                        placeholder="Cari aplikasi..."
                        value="{{ $search }}"
                    >


                    <button
                        type="submit"
                        class="search-button"
                    >
                        🔍 Cari
                    </button>

                </form>

            </div>

        </section>



        <!-- =================================================
             HASIL PENCARIAN
        ================================================== -->

        @if($search)

            <section class="search-result-header">

                <h2>
                    🔎 Hasil Pencarian
                </h2>


                <p>
                    Menampilkan aplikasi yang sesuai dengan:

                    <strong>
                        "{{ $search }}"
                    </strong>
                </p>


                <a
                    href="{{ route('applications.index') }}"
                    class="clear-search"
                >
                    ✕ Hapus Pencarian
                </a>

            </section>

        @endif



        <!-- =================================================
             SEMUA APLIKASI
        ================================================== -->

        <section
            class="applications"
            id="semua-aplikasi"
        >


            @forelse($applications as $application)


                <!-- APPLICATION CARD -->

                <div class="application-card">


                    <!-- LOGO -->

                    <div class="application-icon">


                        @if($application->icon)

                            <img
                                src="{{ asset('storage/' . $application->icon) }}"
                                alt="{{ $application->name }}"
                            >

                        @else

                            <span class="fallback-icon">
                                📱
                            </span>

                        @endif


                    </div>



                    <!-- NAME -->

                    <h3>
                        {{ $application->name }}
                    </h3>



                    <!-- DESCRIPTION -->

                    <p class="application-description">
                        {{ $application->description ?: 'Tidak ada deskripsi aplikasi.' }}
                    </p>



                    <!-- OPEN APPLICATION -->

                    <a
                        href="{{ route('applications.open', $application) }}"
                        class="open-button"
                    >
                        Buka Aplikasi →
                    </a>


                </div>


            @empty


                <!-- EMPTY -->

                <div class="empty">

                    <h3>
                        Aplikasi tidak ditemukan
                    </h3>


                    <p>
                        Coba gunakan kata kunci pencarian lain.
                    </p>

                </div>


            @endforelse


        </section>


    </main>


</body>

</html>
