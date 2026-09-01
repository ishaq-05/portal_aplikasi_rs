<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Super Admin</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #17365d;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 40px;
        }


        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .portal-logo img {
            width: 190px;
            height: auto;
            max-height: 65px;
            object-fit: contain;
            display: block;
        }


        /* =========================================================
           CONTAINER
        ========================================================= */

        .container {
            max-width: 1400px;
            margin: auto;
            padding: 45px 25px 60px;
        }


        /* =========================================================
           TITLE
        ========================================================= */

        .page-title {
            margin-bottom: 35px;
        }


        .page-title h1 {
            font-size: 36px;
            margin-bottom: 8px;
        }


        .page-title p {
            color: #58708d;
            font-size: 16px;
        }


        /* =========================================================
           STATISTIC CARDS
        ========================================================= */

        .stats {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;
            margin-bottom: 35px;
        }


        .stat-card {
            background: #ffffff;
            border: 1px solid #e0e5ec;
            border-radius: 18px;
            padding: 25px;
            min-height: 170px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.03);
        }


        .stat-info {
            flex: 1;
        }


        .stat-label {
            color: #58708d;
            font-size: 15px;
            margin-bottom: 12px;
        }


        .stat-number {
            font-size: 38px;
            font-weight: bold;
            color: #111827;
        }


        .stat-chart {
            width: 145px;
            height: 65px;
        }


        /* =========================================================
           ANALISIS PENGGUNAAN
        ========================================================= */

        .analytics-section {
            background: #ffffff;
            border: 1px solid #e0e5ec;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 35px;

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.03);
        }


        .section-title {
            margin-bottom: 25px;
        }


        .section-title h2 {
            font-size: 26px;
            margin-bottom: 7px;
        }


        .section-title p {
            color: #58708d;
        }


        /* =========================================================
           USAGE SUMMARY
        ========================================================= */

        .usage-summary {
            display: grid;
            grid-template-columns:
                1fr 1fr;

            gap: 20px;
            margin-bottom: 30px;
        }


        .usage-box {
            border: 1px solid #e0e5ec;
            border-radius: 15px;
            padding: 25px;
            background: #fbfcfe;
        }


        .usage-box-title {
            color: #58708d;
            font-weight: bold;
            margin-bottom: 10px;
        }


        .usage-number {
            font-size: 32px;
            font-weight: bold;
            color: #111827;
        }


        .trend {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
        }


        .trend.up {
            color: #059669;
        }


        .trend.down {
            color: #dc2626;
        }


        .trend.same {
            color: #6b7280;
        }


        /* =========================================================
           GRAPH
        ========================================================= */

        .chart-container {
            border: 1px solid #e0e5ec;
            border-radius: 15px;
            padding: 25px;
            background: #ffffff;
        }


        .chart-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }


        .line-chart {
            width: 100%;
            height: 280px;
        }


        /* =========================================================
           POPULAR APPLICATION
        ========================================================= */

        .popular-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }


        .popular-item {
            border: 1px solid #e0e5ec;
            border-radius: 15px;
            padding: 20px;

            display: flex;
            align-items: center;
            gap: 20px;

            background: #ffffff;

            transition: 0.2s;
        }


        .popular-item:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.05);
        }


        .ranking {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #f0fdfa;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
            font-weight: bold;

            color: #0f766e;
        }


        .popular-info {
            flex: 1;
        }


        .popular-info h3 {
            font-size: 18px;
            color: #111827;
            margin-bottom: 5px;
        }


        .popular-info p {
            color: #58708d;
            font-size: 14px;
        }


        .popular-total {
            text-align: right;
            min-width: 120px;
        }


        .popular-total strong {
            display: block;
            font-size: 22px;
            color: #111827;
        }


        .popular-total span {
            color: #58708d;
            font-size: 13px;
        }


        .popular-trend {
            min-width: 130px;
            text-align: right;
            font-weight: bold;
        }


        .popular-trend.up {
            color: #059669;
        }


        .popular-trend.down {
            color: #dc2626;
        }


        .popular-trend.same {
            color: #6b7280;
        }


        /* =========================================================
           MANAGEMENT
        ========================================================= */

        .management {
            background: #ffffff;
            border: 1px solid #e0e5ec;
            border-radius: 18px;
            padding: 30px;
        }


        .management-title {
            margin-bottom: 20px;
        }


        .management-title h2 {
            font-size: 25px;
            margin-bottom: 5px;
        }


        .management-title p {
            color: #58708d;
        }


        .management-grid {
            display: grid;
            grid-template-columns:
                1fr 1fr;

            gap: 20px;
        }


        .management-card {
            display: block;

            padding: 25px;

            border: 1px solid #e0e5ec;
            border-radius: 15px;

            text-decoration: none;
            color: inherit;

            transition: 0.2s;
        }


        .management-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.06);

            border-color: #0f766e;
        }


        .management-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #f0fdfa;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            margin-bottom: 15px;
        }


        .management-card h3 {
            font-size: 18px;
            margin-bottom: 7px;
        }


        .management-card p {
            color: #58708d;
            font-size: 14px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .stats {
                grid-template-columns: 1fr;
            }


            .usage-summary {
                grid-template-columns: 1fr;
            }


            .management-grid {
                grid-template-columns: 1fr;
            }


            .popular-item {
                flex-wrap: wrap;
            }


            .popular-total,
            .popular-trend {
                text-align: left;
            }

        }


        @media (max-width: 600px) {

            .header {
                padding: 15px 20px;
            }


            .portal-logo img {
                width: 150px;
            }


            .container {
                padding: 30px 15px;
            }


            .page-title h1 {
                font-size: 28px;
            }


            .stat-card {
                min-height: 140px;
            }


            .stat-chart {
                width: 100px;
            }


            .analytics-section,
            .management {
                padding: 20px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     HEADER
========================================================= -->

<header class="header">

    <div class="header-content">

        <div class="portal-logo">

            <img
                src="{{ asset('images/logo-syifa-global-group.png') }}"
                alt="Syifa Global Group"
            >

        </div>

    </div>

</header>



<main class="container">


    <!-- =====================================================
         TITLE
    ====================================================== -->

    <section class="page-title">

        <h1>
            Dashboard Super Admin
        </h1>

        <p>
            Kelola dan pantau penggunaan aplikasi Portal Rumah Sakit.
        </p>

    </section>



    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <section class="stats">


        <!-- TOTAL APLIKASI -->

        <div class="stat-card">

            <div class="stat-info">

                <div class="stat-label">
                    Total Aplikasi
                </div>

                <div class="stat-number">
                    {{ $totalApplications }}
                </div>

            </div>


            <div class="stat-chart">

                <svg
                    viewBox="0 0 150 65"
                    width="100%"
                    height="100%"
                >

                    <polyline
                        points="5,55 30,48 55,50 80,35 105,40 130,20 145,25"
                        fill="none"
                        stroke="#0f766e"
                        stroke-width="3"
                    />

                </svg>

            </div>

        </div>



        <!-- APLIKASI AKTIF -->

        <div class="stat-card">

            <div class="stat-info">

                <div class="stat-label">
                    Aplikasi Aktif
                </div>

                <div class="stat-number">
                    {{ $activeApplications }}
                </div>

            </div>


            <div class="stat-chart">

                <svg
                    viewBox="0 0 150 65"
                    width="100%"
                    height="100%"
                >

                    <polyline
                        points="5,50 30,45 55,48 80,35 105,32 130,20 145,15"
                        fill="none"
                        stroke="#0f766e"
                        stroke-width="3"
                    />

                </svg>

            </div>

        </div>



        <!-- APLIKASI NONAKTIF -->

        <div class="stat-card">

            <div class="stat-info">

                <div class="stat-label">
                    Aplikasi Nonaktif
                </div>

                <div class="stat-number">
                    {{ $inactiveApplications }}
                </div>

            </div>


            <div class="stat-chart">

                <svg
                    viewBox="0 0 150 65"
                    width="100%"
                    height="100%"
                >

                    <polyline
                        points="5,20 30,25 55,30 80,28 105,40 130,45 145,52"
                        fill="none"
                        stroke="#dc2626"
                        stroke-width="3"
                    />

                </svg>

            </div>

        </div>

    </section>



    <!-- =====================================================
         ANALISIS PENGGUNAAN
    ====================================================== -->

    <section class="analytics-section">


        <div class="section-title">

            <h2>
                Analisis Penggunaan Aplikasi
            </h2>

            <p>
                Perbandingan aktivitas user berdasarkan 6 bulan terakhir.
            </p>

        </div>



        <!-- SUMMARY -->

        <div class="usage-summary">


            <!-- BULAN INI -->

            <div class="usage-box">

                <div class="usage-box-title">
                    Penggunaan Bulan Ini
                </div>

                <div class="usage-number">
                    {{ $currentMonthVisits }}
                </div>

                @if($usageTrend === 'up')

                    <div class="trend up">

                        📈 Naik {{ abs($usageChange) }}%

                        dibanding bulan lalu

                    </div>

                @elseif($usageTrend === 'down')

                    <div class="trend down">

                        📉 Turun {{ abs($usageChange) }}%

                        dibanding bulan lalu

                    </div>

                @else

                    <div class="trend same">

                        ➖ Tidak ada perubahan

                        dibanding bulan lalu

                    </div>

                @endif

            </div>



            <!-- PERNAH DIGUNAKAN -->

            <div class="usage-box">

                <div class="usage-box-title">
                    Aplikasi yang Pernah Digunakan
                </div>

                <div class="usage-number">
                    {{ $usedApplications }}
                </div>

                <div class="trend same">

                    Dari {{ $totalApplications }}
                    aplikasi yang tersedia

                </div>

            </div>

        </div>



        <!-- =================================================
             LINE CHART
        ================================================== -->

        <div class="chart-container">

            <div class="chart-title">
                Tren Penggunaan 6 Bulan Terakhir
            </div>


            <svg
                class="line-chart"
                viewBox="0 0 900 280"
                preserveAspectRatio="none"
            >

                <!-- garis horizontal -->

                <line
                    x1="60"
                    y1="40"
                    x2="850"
                    y2="40"
                    stroke="#e5e7eb"
                    stroke-width="1"
                />

                <line
                    x1="60"
                    y1="100"
                    x2="850"
                    y2="100"
                    stroke="#e5e7eb"
                    stroke-width="1"
                />

                <line
                    x1="60"
                    y1="160"
                    x2="850"
                    y2="160"
                    stroke="#e5e7eb"
                    stroke-width="1"
                />

                <line
                    x1="60"
                    y1="220"
                    x2="850"
                    y2="220"
                    stroke="#e5e7eb"
                    stroke-width="1"
                />


                @php

                    $chartValues =
                        array_values($monthlyUsage);

                    $maxValue =
                        max($chartValues ?: [1]);

                    if ($maxValue == 0) {
                        $maxValue = 1;
                    }

                    $points = [];

                    foreach ($chartValues as $index => $value) {

                        $x =
                            60 +
                            (
                                $index *
                                (790 / 5)
                            );

                        $y =
                            220 -
                            (
                                ($value / $maxValue)
                                * 180
                            );

                        $points[] =
                            $x . ',' . $y;
                    }

                    $pointsString =
                        implode(
                            ' ',
                            $points
                        );

                @endphp


                <!-- area -->

                <polyline
                    points="{{ $pointsString }}"
                    fill="none"
                    stroke="#0f766e"
                    stroke-width="4"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />


                <!-- titik -->

                @foreach($chartValues as $index => $value)

                    @php

                        $x =
                            60 +
                            (
                                $index *
                                (790 / 5)
                            );

                        $y =
                            220 -
                            (
                                ($value / $maxValue)
                                * 180
                            );

                    @endphp

                    <circle
                        cx="{{ $x }}"
                        cy="{{ $y }}"
                        r="6"
                        fill="#ffffff"
                        stroke="#0f766e"
                        stroke-width="4"
                    />

                @endforeach


                <!-- label bulan -->

                @foreach($monthlyLabels as $index => $label)

                    @php

                        $x =
                            60 +
                            (
                                $index *
                                (790 / 5)
                            );

                    @endphp

                    <text
                        x="{{ $x }}"
                        y="255"
                        text-anchor="middle"
                        font-size="13"
                        fill="#58708d"
                    >
                        {{ $label }}
                    </text>

                @endforeach

            </svg>

        </div>

    </section>



    <!-- =====================================================
         TOP 5
    ====================================================== -->

    <section class="analytics-section">


        <div class="section-title">

            <h2>
                Aplikasi Paling Populer
            </h2>

            <p>
                Hanya menampilkan 5 aplikasi dengan penggunaan tertinggi.
            </p>

        </div>


        <div class="popular-list">


            @forelse($popularApplications as $index => $application)


                <div class="popular-item">


                    <!-- RANK -->

                    <div class="ranking">

                        #{{ $index + 1 }}

                    </div>



                    <!-- INFO -->

                    <div class="popular-info">

                        <h3>
                            {{ $application->name }}
                        </h3>

                        <p>
                            Total digunakan
                            {{ $application->visits_count }}
                            kali
                        </p>

                    </div>



                    <!-- TOTAL -->

                    <div class="popular-total">

                        <strong>
                            {{ $application->visits_count }}
                        </strong>

                        <span>
                            penggunaan
                        </span>

                    </div>



                    <!-- TREND -->

                    <div
                        class="
                            popular-trend
                            {{ $application->usage_trend }}
                        "
                    >

                        @if(
                            $application->usage_trend
                            === 'up'
                        )

                            📈
                            +{{ abs($application->usage_change) }}%

                        @elseif(
                            $application->usage_trend
                            === 'down'
                        )

                            📉
                            -{{ abs($application->usage_change) }}%

                        @else

                            ➖ 0%

                        @endif


                        <div
                            style="
                                font-size:12px;
                                font-weight:normal;
                                margin-top:4px;
                            "
                        >

                            dibanding bulan lalu

                        </div>

                    </div>


                </div>


            @empty

                <div class="usage-box">

                    Belum ada data penggunaan aplikasi.

                </div>

            @endforelse


        </div>

    </section>



    <!-- =====================================================
         MANAGEMENT
    ====================================================== -->

    <section class="management">


        <div class="management-title">

            <h2>
                Manajemen Portal
            </h2>

            <p>
                Kelola aplikasi yang tersedia di portal.
            </p>

        </div>



        <div class="management-grid">


            <!-- KELOLA APLIKASI -->

            <a
                href="{{ route('superadmin.applications.index') }}"
                class="management-card"
            >

                <div class="management-icon">
                    📱
                </div>

                <h3>
                    Kelola Aplikasi
                </h3>

                <p>
                    Tambah, edit, dan hapus aplikasi portal.
                </p>

            </a>



            <!-- LIHAT PORTAL -->

            <a
                href="{{ route('applications.index') }}"
                class="management-card"
            >

                <div class="management-icon">
                    🌐
                </div>

                <h3>
                    Lihat Portal
                </h3>

                <p>
                    Kembali melihat portal aplikasi sebagai user.
                </p>

            </a>


        </div>

    </section>


</main>


</body>

</html>
