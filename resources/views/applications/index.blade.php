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
}

        .brand {
            display: flex;
            align-items: center;
        }

        /*
        |--------------------------------------------------------------------------
        | LOGO SYIFA GLOBAL GROUP
        |--------------------------------------------------------------------------
        */

       .portal-logo {
    display: flex;
    align-items: center;
}

.portal-logo img {
    width: 180px;
    height: auto;
    max-height: 55px;
    object-fit: contain;
    display: block;
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
        }

        .search-input:focus {
            border-color: #0f766e;
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
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }


        /* =========================================
           APPLICATION CARD
        ========================================= */

        .application-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
            transition: 0.2s;
        }

        .application-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }


        /* =========================================
           APPLICATION ICON
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
    padding: 10px;
}

.application-icon img {
    width: 100%;
    height: 100%;

    object-fit: contain;
    object-position: center;

    display: block;
}

        /* =========================================
           APPLICATION NAME
        ========================================= */

        .application-card h3 {
            font-size: 19px;
            margin-bottom: 20px;
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
        }

        .open-button:hover {
            background: #115e59;
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


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 600px) {

            .header {
                padding: 12px 20px;
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
        }
    </style>
</head>


<body>

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

    </div>

</header>


<main class="container">

    <section class="hero">

        <h2>
            Portal Aplikasi Rumah Sakit
        </h2>

        <p>
            Akses berbagai aplikasi rumah sakit dalam satu tempat.
        </p>


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


    <section class="applications">

        @forelse($applications as $application)

            <div class="application-card">

                <div class="application-icon">

                    @if($application->icon)

                        <img
                            src="{{ asset('storage/' . $application->icon) }}"
                            alt="{{ $application->name }}"
                        >

                    @else

                        📱

                    @endif

                </div>


                <h3>
                    {{ $application->name }}
                </h3>


           <a
    href="{{ route('applications.open', $application) }}"
    class="open-button"
>
    Buka Aplikasi →
</a>

            </div>


        @empty

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
