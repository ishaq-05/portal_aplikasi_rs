<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal Aplikasi Rumah Sakit</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }


        /* =========================================
           HEADER
        ========================================= */

        .header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 40px;
        }

        .header-content {
            width: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
        }


        /* =========================================
           LOGO SYIFA GLOBAL GROUP
        ========================================= */

        .portal-logo {
            display: flex;
            align-items: center;
        }

        .portal-logo img {
            width: 180px;
            height: auto;
            max-height: 55px;

            object-fit: contain;
            object-position: center;

            display: block;
        }


        /* =========================================
           NAVBAR
        ========================================= */

        .navbar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 10px 15px;

            color: #374151;
            text-decoration: none;

            font-size: 14px;
            font-weight: bold;

            border-radius: 9px;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .nav-link:hover {
            background: #f0fdfa;
            color: #0f766e;
        }

        .nav-link.active {
            background: #f0fdfa;
            color: #0f766e;
        }


        /* =========================================
           CONTAINER
        ========================================= */

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 50px 25px;
        }


        /* =========================================
           HERO
        ========================================= */

        .hero {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero h2 {
            font-size: 34px;
            margin-bottom: 12px;
            color: #172b4d;
        }

        .hero p {
            color: #6b7280;
            font-size: 16px;
        }


        /* =========================================
           SEARCH
        ========================================= */

        .search-area {
            max-width: 700px;
            margin: 30px auto;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;

            padding: 15px 18px;

            border: 1px solid #d1d5db;
            border-radius: 10px;

            font-size: 15px;

            outline: none;

            background: #ffffff;
        }

        .search-input:focus {
            border-color: #0f766e;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.08);
        }

        .search-button {
            padding: 15px 25px;

            border: none;
            border-radius: 10px;

            background: #0f766e;
            color: white;

            cursor: pointer;

            font-weight: bold;
        }

        .search-button:hover {
            background: #115e59;
        }


        /* =========================================
           APPLICATIONS
        ========================================= */

        .applications {
            display: grid;

            grid-template-columns:
                repeat(auto-fill, minmax(260px, 1fr));

            gap: 20px;
        }


        /* =========================================
           APPLICATION CARD
        ========================================= */

        .application-card {
            background: #ffffff;

            border: 1px solid #e5e7eb;
            border-radius: 16px;

            padding: 25px;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }

        .application-card:hover {
            transform: translateY(-4px);

            border-color: #d1d5db;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.08);
        }


        /* =========================================
           APPLICATION ICON

           Logo apa pun yang diupload:
           - tidak terpotong
           - tidak melebar
           - tidak berubah bentuk
           - otomatis mengecil jika terlalu besar
        ========================================= */

        .application-icon {
            width: 100%;
            height: 140px;

            border-radius: 14px;

            background: #f0fdfa;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            overflow: hidden;

            padding: 12px;
        }


        /* =========================================
           LOGO APLIKASI
        ========================================= */

        .application-icon img {
            display: block;

            width: 100% !important;
            height: 100% !important;

            max-width: 100%;
            max-height: 100%;

            object-fit: contain !important;
            object-position: center center;

            margin: 0;
            padding: 0;

            /*
             * Jangan gunakan:
             * object-fit: cover;
             *
             * Karena cover akan membuat gambar
             * terpotong ketika rasio berbeda.
             */
        }


        /* =========================================
           FALLBACK ICON
        ========================================= */

        .application-icon .fallback-icon {
            font-size: 42px;
            line-height: 1;
        }


        /* =========================================
           APPLICATION NAME
        ========================================= */

        .application-card h3 {
            font-size: 19px;

            margin-bottom: 20px;

            color: #172b4d;

            min-height: 23px;
        }


        /* =========================================
           OPEN BUTTON
        ========================================= */

        .open-button {
            display: block;

            text-align: center;

            padding: 11px;

            background: #0f766e;
            color: white;

            text-decoration: none;

            border-radius: 9px;

            font-size: 14px;
            font-weight: bold;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }

        .open-button:hover {
            background: #115e59;

            transform: translateY(-1px);
        }


        /* =========================================
           EMPTY
        ========================================= */

        .empty {
            grid-column: 1 / -1;

            text-align: center;

            padding: 60px 20px;

            color: #6b7280;
        }

        .empty h3 {
            margin-bottom: 8px;
            color: #374151;
        }


        /* =========================================
           HASIL PENCARIAN
        ========================================= */

        .search-result-header {
            margin-bottom: 25px;
        }

        .search-result-header h2 {
            color: #172b4d;
            font-size: 26px;
            margin-bottom: 8px;
        }

        .search-result-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .clear-search {
            display: inline-block;

            margin-top: 12px;

            padding: 8px 13px;

            border-radius: 8px;

            background: #f0fdfa;
            color: #0f766e;

            text-decoration: none;

            font-size: 13px;
            font-weight: bold;
        }

        .clear-search:hover {
            background: #ccfbf1;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 768px) {

            .header {
                padding: 12px 20px;
            }

            .header-content {
                flex-direction: column;
                gap: 12px;
            }

            .navbar {
                width: 100%;
                justify-content: center;
            }

            .portal-logo img {
                width: 150px;
                max-height: 48px;
            }

            .container {
                padding: 35px 15px;
            }

            .hero h2 {
                font-size: 27px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-button {
                width: 100%;
            }

            .applications {
                grid-template-columns:
                    repeat(auto-fill, minmax(220px, 1fr));

                gap: 15px;
            }

            .application-card {
                padding: 20px;
            }

            .application-icon {
                height: 130px;
            }
        }


        @media (max-width: 600px) {

            .navbar {
                gap: 5px;
            }

            .nav-link {
                padding: 9px 10px;
                font-size: 13px;
            }

            .applications {
                grid-template-columns: 1fr;
            }

            .application-icon {
                height: 150px;
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
         HERO
    ================================================== -->

    <section class="hero" id="beranda">

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

         Bagian ini hanya muncul ketika user melakukan
         pencarian.
    ================================================== -->

    @if($search)

        <section class="search-result-header">

            <h2>
                🔎 Hasil Pencarian
            </h2>

            <p>
                Menampilkan aplikasi yang sesuai dengan:
                <strong>"{{ $search }}"</strong>
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


                <!-- =================================================
                     LOGO APLIKASI
                ================================================== -->

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


                <!-- =================================================
                     NAMA APLIKASI
                ================================================== -->

                <h3>
                    {{ $application->name }}
                </h3>


                <!-- =================================================
                     BUKA APLIKASI
                ================================================== -->

                <a
                    href="{{ route('applications.open', $application) }}"
                    class="open-button"
                >
                    Buka Aplikasi →
                </a>


            </div>


        @empty


            <!-- =================================================
                 TIDAK ADA APLIKASI
            ================================================== -->

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
