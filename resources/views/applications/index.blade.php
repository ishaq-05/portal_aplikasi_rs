<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Portal Aplikasi Rumah Sakit</title>


    <style>

        /* =========================================================
           RESET
        ========================================================= */

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
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f7fb;

            color: #1f2937;

            line-height: 1.5;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            position: sticky;

            top: 0;

            z-index: 1000;

            width: 100%;

            background: rgba(255, 255, 255, 0.98);

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


        /* =========================================================
           LOGO
        ========================================================= */

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


        /* =========================================================
           NAVBAR
        ========================================================= */

        .navbar {
            display: flex;

            align-items: center;

            justify-content: flex-end;

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


        /* =========================================================
           MAIN CONTAINER
        ========================================================= */

        .container {
            width: 100%;

            max-width: 1200px;

            margin: 0 auto;

            padding:
                55px 25px
                80px;
        }


        /* =========================================================
           HERO / BERANDA
        ========================================================= */

        .hero {
            text-align: center;

            margin-bottom: 70px;
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


        /* =========================================================
           SEARCH
        ========================================================= */

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


        /* =========================================================
           SECTION HEADER
        ========================================================= */

        .section-header {
            text-align: center;

            margin-bottom: 32px;
        }


        .section-header h2 {
            color: #173f6b;

            font-size: 32px;

            font-weight: 700;

            margin-bottom: 5px;
        }


        .section-header p {
            color: #64748b;

            font-size: 15px;
        }


        /* =========================================================
           PEMISAH SECTION
        ========================================================= */

        .section-divider {
            width: 100%;

            height: 1px;

            background: #e2e8f0;

            margin:
                0 auto
                60px;
        }

        /* =========================
   APLIKASI POPULER
========================= */

.popular-section {
    background: #087f5b;
    padding: 30px 24px 18px;
    margin-top: 0;
    border-bottom: 3px solid #8b5cf6;
}

.popular-section .section-divider {
    display: none;
}

.popular-section .section-header {
    text-align: center;
    margin-bottom: 26px;
}

.popular-section .section-header h2 {
    color: #ffffff;
    font-size: 30px;
    font-weight: 800;
    text-transform: uppercase;
    margin: 0;
    letter-spacing: 0.5px;
}

.popular-section .section-header p {
    display: none;
}

/* Container 3 card */
.popular-list {
    display: flex;
    justify-content: center;
    align-items: stretch;
    gap: 122px;
    max-width: 1000px;
    margin: 0 auto;
}

/* Card */
.popular-card {
    position: relative;
    width: 181px;
    min-width: 181px;
    height: 169px;

    display: flex;
    flex-direction: column;

    background: #f4f7fa;
    border: 1.5px solid #222;
    border-radius: 9px;

    overflow: visible;
}

/* Logo */
.popular-icon {
    width: 100%;
    height: 84px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #fffdf5;

    border-radius: 8px 8px 6px 6px;
    border-bottom: 1px solid #999;

    overflow: hidden;
}

.popular-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 8px 15px;
}

.popular-fallback {
    font-size: 35px;
}

/* Ranking */
.popular-rank {
    position: absolute;

    top: 82px;
    right: 7px;

    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #b8b8b8;
    color: #111;

    border-radius: 50%;

    font-size: 17px;
    font-weight: 800;

    z-index: 5;
}

/* Info */
.popular-info {
    flex: 1;

    text-align: center;

    padding: 8px 7px 2px;
}

.popular-info h3 {
    margin: 0 0 3px;

    color: #111;

    font-size: 17px;
    line-height: 20px;

    font-weight: 800;
}

.popular-info p {
    margin: 0;

    color: #555;

    font-size: 10px;
    line-height: 13px;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Jumlah penggunaan */
.popular-count {
    display: none;
}

/* Tombol */
.popular-button {
    align-self: center;

    width: 121px;
    height: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 7px;

    background: #fffdf5;

    border: 1.5px solid #222;
    border-radius: 20px;

    color: #111;

    font-size: 11px;
    font-weight: 700;

    text-decoration: none;

    transition: 0.2s ease;
}

.popular-button:hover {
    background: #ffffff;
    transform: translateY(-1px);
}

/* Jika data kosong */
.popular-list .empty {
    width: 100%;
    text-align: center;
    color: white;
}

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 850px) {
    .popular-list {
        gap: 30px;
    }
}

@media (max-width: 650px) {
    .popular-list {
        flex-wrap: wrap;
        gap: 20px;
    }

    .popular-card {
        width: 181px;
    }
}


        /* =========================================================
           POPULAR CARD
        ========================================================= */

        .popular-card {
            width: 100%;

            min-height: 108px;

            display: grid;

            grid-template-columns:
                55px
                72px
                minmax(0, 1fr)
                90px
                145px;

            align-items: center;

            gap: 15px;

            padding: 18px 22px;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }


        .popular-card:hover {
            transform: translateY(-2px);

            border-color: #cbd5e1;

            box-shadow:
                0 10px 25px rgba(15, 23, 42, 0.07);
        }


        /* =========================================================
           RANKING
        ========================================================= */

        .popular-rank {
            width: 52px;

            height: 52px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background: #f1f5f9;

            color: #64748b;

            font-size: 17px;

            font-weight: 700;
        }


        .popular-card:first-child .popular-rank {
            background: #fff5cc;

            color: #a16207;
        }


        .popular-card:nth-child(3) .popular-rank {
            background: #fff0e5;

            color: #c2410c;
        }


        /* =========================================================
           POPULAR LOGO
        ========================================================= */

        .popular-icon {
            width: 72px;

            height: 72px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 8px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 13px;

            overflow: hidden;
        }


        .popular-icon img {
            display: block;

            width: auto;

            height: auto;

            max-width: 100%;

            max-height: 100%;

            object-fit: contain;

            object-position: center;

            margin: auto;
        }


        .popular-fallback {
            font-size: 27px;
        }


        /* =========================================================
           POPULAR INFO
        ========================================================= */

        .popular-info {
            min-width: 0;
        }


        .popular-info h3 {
            color: #173f6b;

            font-size: 18px;

            font-weight: 700;

            margin-bottom: 3px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        .popular-info p {
            color: #64748b;

            font-size: 14px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        /* =========================================================
           JUMLAH KUNJUNGAN
        ========================================================= */

        .popular-count {
            text-align: right;
        }


        .popular-count strong {
            display: block;

            color: #111827;

            font-size: 22px;

            font-weight: 700;

            line-height: 1.2;
        }


        .popular-count span {
            color: #64748b;

            font-size: 12px;
        }


        /* =========================================================
           BUTTON POPULAR
        ========================================================= */

        .popular-button {
            display: flex;

            align-items: center;

            justify-content: center;

            min-height: 40px;

            padding: 10px 15px;

            background: #0f766e;

            color: #ffffff;

            border-radius: 9px;

            text-align: center;

            text-decoration: none;

            font-family: inherit;

            font-size: 14px;

            font-weight: 700;

            white-space: nowrap;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .popular-button:hover {
            background: #115e59;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(15, 118, 110, 0.18);
        }


        /* =========================================================
           SEMUA APLIKASI
        ========================================================= */

        .all-applications-section {
            scroll-margin-top: 100px;
        }


        .all-section-header {
            margin-bottom: 30px;
        }


        .all-section-header h2 {
            color: #173f6b;

            font-size: 30px;

            font-weight: 700;

            margin-bottom: 5px;
        }


        .all-section-header p {
            color: #64748b;

            font-size: 15px;
        }


        /* =========================================================
           APPLICATION GRID
        ========================================================= */

        .applications {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 20px;
        }


        /* =========================================================
           APPLICATION CARD
        ========================================================= */

        .application-card {
            display: flex;

            flex-direction: column;

            min-width: 0;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 20px;

            min-height: 370px;

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


        /* =========================================================
           APPLICATION LOGO CONTAINER
        ========================================================= */

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


        /*
        Logo tidak dipaksa memenuhi kotak.
        Ini yang membuat logo tidak terpotong.
        */

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


        .fallback-icon {
            display: flex;

            align-items: center;

            justify-content: center;

            width: 100%;

            height: 100%;

            font-size: 42px;

            line-height: 1;
        }


        /* =========================================================
           APPLICATION NAME
        ========================================================= */

        .application-card h3 {
            color: #172b4d;

            font-size: 18px;

            font-weight: 700;

            line-height: 1.35;

            min-height: 25px;

            margin-bottom: 7px;

            word-break: break-word;
        }


        /* =========================================================
           APPLICATION DESCRIPTION
        ========================================================= */

        .application-description {
            color: #64748b;

            font-size: 14px;

            font-weight: 400;

            line-height: 1.55;

            margin-bottom: 18px;

            min-height: 65px;

            display: -webkit-box;

            -webkit-line-clamp: 3;

            -webkit-box-orient: vertical;

            overflow: hidden;

            word-break: break-word;
        }


        /* =========================================================
           OPEN BUTTON
        ========================================================= */

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


        /* =========================================================
           SEARCH RESULT
        ========================================================= */

        .search-result-section {
            scroll-margin-top: 100px;

            margin-bottom: 50px;
        }


        .search-result-header {
            text-align: center;

            margin-bottom: 30px;
        }


        .search-result-header h2 {
            color: #173f6b;

            font-size: 28px;

            font-weight: 700;

            margin-bottom: 5px;
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

            justify-content: center;

            margin-top: 13px;

            padding: 8px 13px;

            background: #f0fdfa;

            color: #0f766e;

            border-radius: 8px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition:
                background 0.2s ease;
        }


        .clear-search:hover {
            background: #ccfbf1;
        }


        /* =========================================================
           EMPTY
        ========================================================= */

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


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 1050px) {

            .applications {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }


            .popular-card {
                grid-template-columns:
                    55px
                    72px
                    minmax(0, 1fr)
                    80px
                    135px;
            }

        }


        /* =========================================================
           SMALL LAPTOP / TABLET
        ========================================================= */

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

                flex-wrap: wrap;
            }


            .container {
                padding:
                    40px 18px
                    60px;
            }


            .hero {
                margin-bottom: 50px;
            }


            .hero h2 {
                font-size: 30px;
            }


            .applications {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 16px;
            }


            .popular-card {
                grid-template-columns:
                    52px
                    65px
                    minmax(0, 1fr);

                gap: 13px;
            }


            .popular-count {
                display: none;
            }


            .popular-button {
                grid-column: 1 / -1;

                width: 100%;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

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


            .section-header h2 {
                font-size: 27px;
            }


            .section-header p {
                font-size: 14px;
            }


            .popular-section {
                margin-bottom: 65px;
            }


            .popular-card {
                grid-template-columns:
                    48px
                    60px
                    minmax(0, 1fr);

                padding: 15px;

                border-radius: 14px;
            }


            .popular-rank {
                width: 48px;

                height: 48px;

                font-size: 15px;
            }


            .popular-icon {
                width: 60px;

                height: 60px;

                padding: 7px;
            }


            .popular-info h3 {
                font-size: 16px;
            }


            .popular-info p {
                font-size: 13px;
            }


            .popular-button {
                grid-column: 1 / -1;

                margin-top: 2px;
            }


            .all-section-header h2 {
                font-size: 27px;
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

                min-height: 65px;
            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

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


        /* =========================================================
           FINAL APLIKASI POPULER DESIGN
           Tampilan 3 kartu seperti referensi
        ========================================================= */

        .popular-section {
            background: #087f5b !important;
            padding: 30px 24px 18px !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            border-bottom: 3px solid #8b5cf6 !important;
        }

        .popular-section .section-divider {
            display: none !important;
        }

        .popular-section .section-header {
            text-align: center !important;
            margin-bottom: 26px !important;
        }

        .popular-section .section-header h2 {
            color: #ffffff !important;
            font-size: 30px !important;
            line-height: 1.2 !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            margin: 0 !important;
            letter-spacing: 0.5px !important;
        }

        .popular-section .section-header p {
            display: none !important;
        }

        .popular-section .popular-list {
            width: 100% !important;
            max-width: 1000px !important;
            margin: 0 auto !important;

            display: flex !important;
            flex-direction: row !important;
            justify-content: center !important;
            align-items: stretch !important;

            gap: 122px !important;
        }

        .popular-section .popular-card {
            position: relative !important;

            width: 181px !important;
            min-width: 181px !important;
            max-width: 181px !important;
            height: 169px !important;
            min-height: 169px !important;

            display: flex !important;
            flex-direction: column !important;
            grid-template-columns: none !important;

            padding: 0 !important;
            gap: 0 !important;

            background: #f4f7fa !important;
            border: 1.5px solid #222222 !important;
            border-radius: 9px !important;

            overflow: visible !important;

            transition: transform 0.2s ease, box-shadow 0.2s ease !important;
        }

        .popular-section .popular-card:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15) !important;
        }

        .popular-section .popular-icon {
            width: 100% !important;
            height: 84px !important;
            min-height: 84px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            padding: 8px 15px !important;

            background: #fffdf5 !important;

            border: 0 !important;
            border-bottom: 1px solid #999999 !important;
            border-radius: 8px 8px 6px 6px !important;

            overflow: hidden !important;
        }

        .popular-section .popular-icon img {
            display: block !important;
            width: 100% !important;
            height: 100% !important;

            max-width: 100% !important;
            max-height: 100% !important;

            padding: 0 !important;
            margin: auto !important;

            object-fit: contain !important;
            object-position: center !important;
        }

        .popular-section .popular-fallback {
            font-size: 35px !important;
        }

        .popular-section .popular-rank {
            position: absolute !important;

            top: 82px !important;
            right: 7px !important;

            width: 31px !important;
            height: 31px !important;
            min-width: 31px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            padding: 0 !important;

            background: #b8b8b8 !important;
            color: #111111 !important;

            border-radius: 50% !important;

            font-size: 17px !important;
            line-height: 1 !important;
            font-weight: 800 !important;

            z-index: 5 !important;
        }

        .popular-section .popular-info {
            width: 100% !important;
            min-width: 0 !important;

            flex: 1 !important;

            display: block !important;

            text-align: center !important;

            padding: 8px 7px 2px !important;
        }

        .popular-section .popular-info h3 {
            margin: 0 0 3px !important;

            color: #111111 !important;

            font-size: 17px !important;
            line-height: 20px !important;
            font-weight: 800 !important;

            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        .popular-section .popular-info p {
            margin: 0 !important;

            color: #555555 !important;

            font-size: 10px !important;
            line-height: 13px !important;

            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        .popular-section .popular-count {
            display: none !important;
        }

        .popular-section .popular-button {
            align-self: center !important;

            width: 121px !important;
            min-width: 121px !important;
            max-width: 121px !important;

            height: 22px !important;
            min-height: 22px !important;

            display: flex !important;
            align-items: center !important;
            justify-content: center !important;

            margin: 0 0 7px !important;
            padding: 0 !important;

            background: #fffdf5 !important;

            border: 1.5px solid #222222 !important;
            border-radius: 20px !important;

            color: #111111 !important;

            font-family: inherit !important;
            font-size: 11px !important;
            line-height: 1 !important;
            font-weight: 700 !important;

            text-align: center !important;
            text-decoration: none !important;
            white-space: nowrap !important;

            transition: 0.2s ease !important;
        }

        .popular-section .popular-button:hover {
            background: #ffffff !important;
            color: #111111 !important;
            transform: translateY(-1px) !important;
            box-shadow: none !important;
        }

        .popular-section .popular-list .empty {
            width: 100% !important;
            text-align: center !important;
            color: #ffffff !important;
        }

        @media (max-width: 850px) {
            .popular-section .popular-list {
                gap: 30px !important;
            }
        }

        @media (max-width: 650px) {
            .popular-section .popular-list {
                flex-wrap: wrap !important;
                gap: 20px !important;
            }

            .popular-section .popular-card {
                width: 181px !important;
                min-width: 181px !important;
                max-width: 181px !important;
            }
        }

        @media (max-width: 600px) {
            .popular-section {
                padding: 25px 15px 18px !important;
            }

            .popular-section .section-header h2 {
                font-size: 27px !important;
            }

            .popular-section .popular-list {
                gap: 18px !important;
            }
        }

    </style>

</head>


<body>


    <!-- =========================================================
         HEADER / NAVBAR
    ========================================================= -->

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
                    href="#beranda"
                    class="nav-link active"
                >
                    🏠 Beranda
                </a>


                <a
                    href="#aplikasi-populer"
                    class="nav-link"
                >
                    ⭐ Aplikasi Populer
                </a>


                <a
                    href="#semua-aplikasi"
                    class="nav-link"
                >
                    📱 Semua Aplikasi
                </a>

            </nav>

        </div>

    </header>



    <!-- =========================================================
         MAIN
    ========================================================= -->

    <main class="container">


        <!-- =====================================================
             BERANDA
        ====================================================== -->

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



        @if($search)

            <!-- =================================================
                 HASIL PENCARIAN
            ================================================== -->

            <section
                class="search-result-section"
                id="hasil-pencarian"
            >

                <div class="search-result-header">

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

                </div>


                <!-- HASIL SEARCH -->

                <section class="applications">

                    @forelse($applications as $application)

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


                            <!-- NAMA -->

                            <h3>
                                {{ $application->name }}
                            </h3>


                            <!-- DESKRIPSI -->

                            <p class="application-description">
                                {{ $application->description ?: 'Tidak ada deskripsi aplikasi.' }}
                            </p>


                            <!-- BUTTON -->

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

            </section>


        @else


            <!-- =================================================
                 APLIKASI POPULER
            ================================================== -->

            <section
                class="popular-section"
                id="aplikasi-populer"
            >

                <div class="section-divider"></div>


                <div class="section-header">

                    <h2>
                        ⭐ Aplikasi Populer
                    </h2>


                    <p>
                        3 aplikasi yang paling sering digunakan oleh user.
                    </p>

                </div>


                <div
    class="popular-list"
    id="popularApplicationsList"
>
    @forelse($popularApplications as $application)

        <div
            class="popular-card"
            data-application-id="{{ $application->id }}"
        >

            <!-- RANKING -->

            <div class="popular-rank">
                #{{ $loop->iteration }}
            </div>


            <!-- LOGO -->

            <div class="popular-icon">

                @if($application->icon)

                    <img
                        src="{{ asset('storage/' . $application->icon) }}"
                        alt="{{ $application->name }}"
                    >

                @else

                    <span class="popular-fallback">
                        📱
                    </span>

                @endif

            </div>


            <!-- INFO -->

            <div class="popular-info">

                <h3>
                    {{ $application->name }}
                </h3>

                <p>
                    {{ $application->description ?: 'Aplikasi yang sering digunakan user.' }}
                </p>

            </div>


            <!-- JUMLAH KLIK -->

            <div class="popular-count">

                <strong>
                    {{ $application->visits_count }}
                </strong>

                <span>
                    kali digunakan
                </span>

            </div>


            <!-- BUTTON -->

            <a
                href="{{ route('applications.open', $application) }}"
                class="popular-button"
            >
                Buka Aplikasi →
            </a>

        </div>

    @empty

        <div class="empty">

            <h3>
                Belum ada data aplikasi populer
            </h3>

            <p>
                Data akan muncul setelah aplikasi digunakan oleh user.
            </p>

        </div>

    @endforelse
</div>

            </section>



            <!-- =================================================
                 SEMUA APLIKASI
            ================================================== -->

            <section
                class="all-applications-section"
                id="semua-aplikasi"
            >

                <div class="all-section-header">

                    <h2>
                        📱 Semua Aplikasi
                    </h2>


                    <p>
                        Pilih aplikasi yang ingin kamu gunakan.
                    </p>

                </div>


                <section class="applications">

                    @forelse($applications as $application)

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


                            <!-- NAMA -->

                            <h3>
                                {{ $application->name }}
                            </h3>


                            <!-- DESKRIPSI -->

                            <p class="application-description">
                                {{ $application->description ?: 'Tidak ada deskripsi aplikasi.' }}
                            </p>


                            <!-- BUTTON -->

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
                                Belum ada aplikasi
                            </h3>


                            <p>
                                Belum ada aplikasi aktif yang tersedia.
                            </p>

                        </div>

                    @endforelse

                </section>

            </section>

        @endif


    </main>
<script>
    /*
     * =========================================================
     * APLIKASI POPULER - UPDATE OTOMATIS
     * =========================================================
     *
     * Logo TIDAK lagi diambil dari application.icon milik API.
     * URL logo dibuat oleh Laravel dari data aplikasi yang ada
     * di halaman, sehingga sama persis dengan logo pada card
     * "Semua Aplikasi".
     */

    const applicationLogoMap = @json(
        $applications->mapWithKeys(function ($application) {
            return [
                $application->id => $application->icon
                    ? asset('storage/' . $application->icon)
                    : null
            ];
        })
    );


    async function loadPopularApplications() {
        try {
            const response = await fetch(
                '{{ route('applications.popular') }}',
                {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    cache: 'no-store'
                }
            );

            if (!response.ok) {
                throw new Error('Gagal mengambil data aplikasi populer.');
            }

            const applications = await response.json();

            const popularList = document.getElementById(
                'popularApplicationsList'
            );

            if (!popularList) {
                return;
            }

            if (!applications.length) {
                popularList.innerHTML = `
                    <div class="empty">
                        <h3>Belum ada data aplikasi populer</h3>
                        <p>
                            Data akan muncul setelah aplikasi digunakan oleh user.
                        </p>
                    </div>
                `;

                return;
            }

            popularList.innerHTML = applications.map((application, index) => {

                const appId = application.id;

                /*
                 * Gunakan URL logo yang dibuat Laravel.
                 * Ini mencegah logo menjadi broken image.
                 */
                const logoUrl =
                    applicationLogoMap[appId] ??
                    applicationDataMap[appId]?.icon ??
                    null;

                const appName =
                    applicationDataMap[appId]?.name ??
                    application.name ??
                    'Aplikasi';

                const description =
                    applicationDataMap[appId]?.description ??
                    application.description ??
                    'Aplikasi yang sering digunakan user.';

                const openUrl =
                    applicationDataMap[appId]?.url ??
                    `{{ url('/applications') }}/${appId}/open`;

                const logoHtml = logoUrl
                    ? `
                        <img
                            src="${logoUrl}"
                            alt="${escapeHtml(appName)}"
                            loading="eager"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <span
                            class="popular-fallback"
                            style="display:none;"
                        >📱</span>
                    `
                    : `
                        <span class="popular-fallback">📱</span>
                    `;

                return `
                    <div
                        class="popular-card"
                        data-application-id="${appId}"
                    >

                        <div class="popular-rank">
                            ${index + 1}
                        </div>

                        <div class="popular-icon">
                            ${logoHtml}
                        </div>

                        <div class="popular-info">
                            <h3>
                                ${escapeHtml(appName)}
                            </h3>

                            <p>
                                ${escapeHtml(
                                    description ||
                                    'Aplikasi yang sering digunakan user.'
                                )}
                            </p>
                        </div>

                        <div class="popular-count">
                            <strong>
                                ${application.visits_count ?? 0}
                            </strong>

                            <span>
                                kali digunakan
                            </span>
                        </div>

                        <a
                            href="${openUrl}"
                            class="popular-button"
                        >
                            Buka Aplikasi →
                        </a>

                    </div>
                `;
            }).join('');

        } catch (error) {
            console.error(
                'Gagal memperbarui aplikasi populer:',
                error
            );
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text ?? '';
        return div.innerHTML;
    }

    /*
     * Jangan menjalankan polling saat user sedang melakukan
     * pencarian karena section Aplikasi Populer memang tidak
     * ditampilkan pada kondisi tersebut.
     */
    @if(!$search)
        loadPopularApplications();

        // Update ranking dan jumlah klik setiap 3 detik.
        setInterval(loadPopularApplications, 3000);

        // Update saat user kembali ke tab browser.
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) {
                loadPopularApplications();
            }
        });
    @endif
</script>

</body>

</html>
