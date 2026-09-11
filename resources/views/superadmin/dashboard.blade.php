@extends('layouts.superadmin')

@section('title', 'Dashboard - Super Admin')

@push('styles')
<style>
    .dashboard-page {
        width: 100%;
        padding: 32px 30px 45px;
    }


    .dashboard-page {
        position: relative;
        isolation: isolate;
    }

    .dashboard-page::before {
    content: "";
    position: fixed;
    top: 50px;
    right: 0;
    bottom: 0;
    left: 190px;
    background:
        linear-gradient(
            rgba(105, 140, 120, 0.75),
            rgba(105, 140, 120, 0.75)
        ),
        url("{{ asset('images/rs.jpeg') }}") center center / cover no-repeat;
    z-index: -2;
    pointer-events: none;
}

    .dashboard-page::after {
        content: "";
        position: fixed;
        top: 50px;
        right: 0;
        bottom: 0;
        left: 190px;
        background: rgba(255, 255, 255, 0.10);
        z-index: -1;
        pointer-events: none;
    }

    .dashboard-header,
    .stats-grid,
    .analysis-section,
    .activity-section,
    .popular-section {
        position: relative;
        z-index: 1;
    }

    .dashboard-header {
        margin-bottom: 28px;
    }

    .dashboard-header h1 {
    font-size: 34px;
    line-height: 1.1;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 8px;
}

.dashboard-header p {
    font-size: 15px;
    color: #ffffff;
}

    .stats-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
        margin-bottom: 32px;
    }

    .stat-card {
        min-height: 160px;
        background: #087f60;
        border: 1px solid #005f48;
        border-radius: 12px;
        padding: 21px 25px;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 5px 12px rgba(0, 0, 0, 0.10);
    }

    .stat-title {
        font-size: 15px;
        font-weight: 700;
    }

    .stat-number {
        text-align: center;
        font-size: 55px;
        line-height: 1;
        font-weight: 800;
        margin: 5px 0;
    }

    .stat-description {
        text-align: center;
        font-size: 13px;
        font-weight: 500;
    }

    .analysis-section {
        width: 100%;
        background: #ffffff;
        border: 1px solid #dfe5ec;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04);
    }

    .analysis-title {
        font-size: 27px;
        font-weight: 800;
        color: #172033;
        margin-bottom: 4px;
    }

    .analysis-description {
        font-size: 14px;
        color: #5f7695;
        margin-bottom: 16px;
    }

    .analysis-content {
        width: 100%;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 205px;
        gap: 15px;
    }

    .chart-card {
        min-height: 215px;
        background: #ffffff;
        border: 1px solid #dfe5ec;
        border-radius: 12px;
        padding: 14px 15px;
    }

    .chart-title {
        font-size: 13px;
        color: #172033;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .chart {
        position: relative;
        width: 100%;
        height: 165px;
        overflow: hidden;
    }

    .chart-grid {
        position: absolute;
        left: 50px;
        right: 10px;
        top: 10px;
        bottom: 25px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .grid-line {
        width: 100%;
        height: 1px;
        background: #d5dbe3;
    }

    .chart-svg {
        position: absolute;
        left: 50px;
        right: 10px;
        top: 10px;
        bottom: 25px;
        width: calc(100% - 60px);
        height: calc(100% - 35px);
        overflow: visible;
    }

    .chart-line {
        fill: none;
        stroke: #087f60;
        stroke-width: 3;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .chart-point {
        fill: #ffffff;
        stroke: #087f60;
        stroke-width: 3;
        cursor: pointer;
    }

    .chart-point:hover {
        fill: #087f60;
    }

    .chart-y-labels {
        position: absolute;
        left: 0;
        top: 10px;
        bottom: 25px;
        width: 42px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;
        padding-right: 6px;
        color: #7b8798;
        font-size: 9px;
    }

    .chart-months {
        position: absolute;
        left: 50px;
        right: 10px;
        bottom: 0;
        display: flex;
        justify-content: space-between;
        color: #5f7695;
        font-size: 10px;
    }

    .analysis-side {
        display: flex;
        flex-direction: column;
        gap: 11px;
    }

    .analysis-card {
        flex: 1;
        min-height: 96px;
        background: #087f60;
        color: #ffffff;
        border: 1px solid #005f48;
        border-radius: 10px;
        padding: 11px 13px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .analysis-card-title {
        font-size: 12px;
        font-weight: 700;
    }

    .analysis-card-number {
        text-align: center;
        font-size: 42px;
        line-height: 1;
        font-weight: 800;
    }

    .analysis-card-description {
        text-align: center;
        font-size: 10px;
        font-weight: 500;
    }

    .trend-up {
        color: #d8ffe9;
    }

    .trend-down {
        color: #ffe1e1;
    }

    .trend-same {
        color: #ffffff;
    }

    .activity-section {
        width: 100%;
        margin-bottom: 30px;
    }

    .activity-header {
        margin-bottom: 16px;
    }

  .activity-header h2 {
    font-size: 24px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 4px;
}

.activity-header p {
    font-size: 13px;
    color: #ffffff;
}

    .activity-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .activity-card {
        background: #ffffff;
        border: 1px solid #dfe5ec;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04);
    }

    .activity-card-title {
        font-size: 16px;
        font-weight: 700;
        color: #172033;
        margin-bottom: 3px;
    }

    .activity-card-description {
        font-size: 11px;
        color: #64748b;
        margin-bottom: 18px;
    }

    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 13px;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .activity-rank {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #d2e3d7;
        color: #2e4e3f;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 11px;
        font-weight: 700;
    }

    .activity-info {
        flex: 1;
        min-width: 0;
    }

    .activity-name {
        font-size: 12px;
        font-weight: 700;
        color: #172033;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .activity-count {
        font-size: 10px;
        color: #64748b;
        margin-top: 2px;
    }

    .activity-progress {
        width: 100%;
        height: 6px;
        background: #edf1f4;
        border-radius: 999px;
        overflow: hidden;
        margin-top: 6px;
    }

    .activity-progress span {
        display: block;
        height: 100%;
        background: #087f60;
        border-radius: 999px;
    }

    .rare-progress span {
        background: #9aa7b5;
    }

    .activity-empty {
        text-align: center;
        padding: 20px 10px;
        color: #64748b;
        font-size: 12px;
        border: 1px dashed #d5dbe3;
        border-radius: 10px;
    }

    .popular-section {
        width: 100%;
        background: #087f60;
        border: 1px solid #005f48;
        border-radius: 12px;
        padding: 22px 25px 27px;
        color: #ffffff;
    }

    .popular-header {
        text-align: center;
        margin-bottom: 22px;
    }

    .popular-header h2 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .popular-header p {
        font-size: 14px;
        color: #ffffff;
    }

    .popular-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 28px;
    }

    .popular-card {
        background: #ffffff;
        color: #111827;
        border: 1px solid #172033;
        border-radius: 10px;
        overflow: hidden;
        min-height: 165px;
        display: flex;
        flex-direction: column;
    }

    .popular-logo-wrapper {
        width: 100%;
        height: 88px;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 1px solid #e2e8f0;
    }

    .popular-logo {
        width: 145px;
        height: 75px;
        object-fit: contain;
    }

    .popular-no-logo {
        width: 145px;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: bold;
        color: #087f60;
        background: #f3f7f9;
    }

    .popular-body {
        flex: 1;
        padding: 8px 12px 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .popular-rank {
        font-size: 11px;
        color: #087f60;
        font-weight: bold;
        margin-bottom: 2px;
    }

    .popular-name {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 3px;
    }

    .popular-description {
        font-size: 11px;
        color: #5f7695;
        margin-bottom: 7px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .popular-count {
        font-size: 10px;
        color: #64748b;
        margin-bottom: 7px;
    }

    .popular-button {
        width: 100%;
        height: 30px;
        background: #ffffff;
        border: 1px solid #172033;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #172033;
        font-size: 11px;
        font-weight: bold;
    }

    .popular-button:hover {
        background: #eefaf6;
        color: #087f60;
    }

    .popular-empty {
        grid-column: 1 / -1;
        text-align: center;
        padding: 30px;
        background: #ffffff;
        color: #64748b;
        border-radius: 10px;
    }

    @media (max-width: 1100px) {
        .dashboard-page {
            padding: 30px 25px 40px;
        }

        .analysis-content {
            grid-template-columns: minmax(0, 1fr) 180px;
        }

        .popular-grid {
            gap: 18px;
        }
    }

    @media (max-width: 900px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .analysis-content {
            grid-template-columns: 1fr;
        }

        .analysis-side {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .activity-grid {
            grid-template-columns: 1fr;
        }

        .popular-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }


    @media (max-width: 768px) {
        .dashboard-page::before,
        .dashboard-page::after {
            left: 0;
        }
    }

    @media (max-width: 700px) {
        .dashboard-page {
            padding: 25px 15px 35px;
        }

        .dashboard-header h1 {
            font-size: 29px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .popular-grid {
            grid-template-columns: 1fr;
        }

        .chart {
            overflow-x: auto;
        }

        .chart-svg {
            min-width: 500px;
        }

        .chart-months {
            min-width: 500px;
        }
    }

    @media (max-width: 480px) {
        .analysis-side {
            grid-template-columns: 1fr;
        }

        .dashboard-header h1 {
            font-size: 25px;
        }

        .analysis-title {
            font-size: 22px;
        }

        .popular-header h2 {
            font-size: 24px;
        }
    }
</style>
@endpush

@section('content')

<div class="dashboard-page">

    <div class="dashboard-header">
        <h1>DASHBOARD</h1>
        <p>Kelola dan pantau penggunaan aplikasi Portal Rumah Sakit.</p>
    </div>

    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-title">
                Total Aplikasi
            </div>

            <div class="stat-number">
                {{ $totalApplications }}
            </div>

            <div class="stat-description">
                Total aplikasi dalam sistem
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">
                Aplikasi Aktif
            </div>

            <div class="stat-number">
                {{ $activeApplications }}
            </div>

            <div class="stat-description">
                Aplikasi yang dapat digunakan user
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">
                Aplikasi Nonaktif
            </div>

            <div class="stat-number">
                {{ $inactiveApplications }}
            </div>

            <div class="stat-description">
                Aplikasi yang tidak aktif
            </div>
        </div>

    </div>

    <section class="analysis-section">

        <h2 class="analysis-title">
            ANALISIS PENGGUNA APLIKASI
        </h2>

        <p class="analysis-description">
            Perbandingan aktivitas user berdasarkan 6 bulan terakhir.
        </p>

        <div class="analysis-content">

            <div class="chart-card">

                <div class="chart-title">
                    Tren Penggunaan 6 Bulan Terakhir
                </div>

                <div class="chart">

                    <div class="chart-y-labels">
                        <span>{{ $maxUsage }}</span>
                        <span>{{ round($maxUsage * 0.75) }}</span>
                        <span>{{ round($maxUsage * 0.50) }}</span>
                        <span>{{ round($maxUsage * 0.25) }}</span>
                        <span>0</span>
                    </div>

                    <div class="chart-grid">
                        <div class="grid-line"></div>
                        <div class="grid-line"></div>
                        <div class="grid-line"></div>
                        <div class="grid-line"></div>
                        <div class="grid-line"></div>
                    </div>

                    <svg
                        class="chart-svg"
                        viewBox="0 0 600 130"
                        preserveAspectRatio="none"
                    >
                        <polyline
                            class="chart-line"
                            points="{{ $polylinePoints }}"
                        />

                        @foreach ($chartPoints as $point)
                            <circle
                                class="chart-point"
                                cx="{{ $point['x'] }}"
                                cy="{{ $point['y'] }}"
                                r="5"
                            >
                                <title>
                                    {{ $point['label'] }}:
                                    {{ $point['total'] }}
                                    penggunaan
                                </title>
                            </circle>
                        @endforeach
                    </svg>

                    <div class="chart-months">
                        @foreach ($months as $month)
                            <span>{{ $month['label'] }}</span>
                        @endforeach
                    </div>

                </div>

            </div>

            <div class="analysis-side">

                <div class="analysis-card">

                    <div class="analysis-card-title">
                        Penggunaan Bulan Lalu
                    </div>

                    <div class="analysis-card-number">
                        {{ $lastMonthUsage }}
                    </div>

                    <div class="analysis-card-description
                        @if ($usageTrend === 'up')
                            trend-up
                        @elseif ($usageTrend === 'down')
                            trend-down
                        @else
                            trend-same
                        @endif
                    ">
                        @if ($usageTrend === 'up')
                            ↑ Naik {{ abs($usageChange) }}%
                        @elseif ($usageTrend === 'down')
                            ↓ Turun {{ abs($usageChange) }}%
                        @else
                            → Tidak berubah
                        @endif
                    </div>

                </div>

                <div class="analysis-card">

                    <div class="analysis-card-title">
                        History Aplikasi
                    </div>

                    <div class="analysis-card-number">
                        {{ $historyApplications }}
                    </div>

                    <div class="analysis-card-description">
                        Dari {{ $totalApplications }} aplikasi tersedia
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="activity-section">

        <div class="activity-header">
            <h2>Aktivitas Aplikasi</h2>

            <p>
                Tingkat penggunaan aplikasi berdasarkan data 6 bulan terakhir.
            </p>
        </div>

        <div class="activity-grid">

            <div class="activity-card">

                <div class="activity-card-title">
                    Aplikasi Sangat Aktif
                </div>

                <div class="activity-card-description">
                    Aplikasi dengan jumlah penggunaan tertinggi.
                </div>

                <div class="activity-list">

                    @forelse ($veryActiveApplications as $application)

                        @php
                            $activePercentage = $mostActiveCount > 0
                                ? ($application->visits_count / $mostActiveCount) * 100
                                : 0;
                        @endphp

                        <div class="activity-item">

                            <div class="activity-rank">
                                {{ $loop->iteration }}
                            </div>

                            <div class="activity-info">

                                <div class="activity-name">
                                    {{ $application->name }}
                                </div>

                                <div class="activity-count">
                                    {{ $application->visits_count }}
                                    kali digunakan
                                </div>

                                <div class="activity-progress">
                                    <span
                                        style="width: {{ min(100, $activePercentage) }}%;"
                                    ></span>
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="activity-empty">
                            Belum ada data penggunaan aplikasi.
                        </div>

                    @endforelse

                </div>

            </div>

            <div class="activity-card">

                <div class="activity-card-title">
                    Aplikasi Jarang Digunakan
                </div>

                <div class="activity-card-description">
                    Aplikasi dengan jumlah penggunaan paling rendah.
                </div>

                <div class="activity-list">

                    @forelse ($rarelyUsedApplications as $application)

                        @php
                            $rarePercentage = $mostActiveCount > 0
                                ? ($application->visits_count / $mostActiveCount) * 100
                                : 0;
                        @endphp

                        <div class="activity-item">

                            <div class="activity-rank">
                                {{ $loop->iteration }}
                            </div>

                            <div class="activity-info">

                                <div class="activity-name">
                                    {{ $application->name }}
                                </div>

                                <div class="activity-count">
                                    {{ $application->visits_count }}
                                    kali digunakan
                                </div>

                                <div class="activity-progress rare-progress">
                                    <span
                                        style="width: {{ min(100, $rarePercentage) }}%;"
                                    ></span>
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="activity-empty">
                            Belum ada data penggunaan aplikasi.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </section>

    <section class="popular-section">

        <div class="popular-header">

            <h2>
                APLIKASI POPULER
            </h2>

            <p>
                Aplikasi yang paling sering digunakan oleh user.
            </p>

        </div>

        <div class="popular-grid">

            @if ($popularApplications->count() > 0)

                @foreach ($popularApplications as $index => $application)

                    <div class="popular-card">

                        <div class="popular-logo-wrapper">

                            @if ($application->icon)

                                <img
                                    src="{{ asset('storage/' . $application->icon) }}"
                                    alt="{{ $application->name }}"
                                    class="popular-logo"
                                >

                            @else

                                <div class="popular-no-logo">
                                    {{
                                        strtoupper(
                                            substr(
                                                $application->name,
                                                0,
                                                1
                                            )
                                        )
                                    }}
                                </div>

                            @endif

                        </div>

                        <div class="popular-body">

                            <div>

                                <div class="popular-rank">
                                    #{{ $index + 1 }}
                                </div>

                                <div class="popular-name">
                                    {{ $application->name }}
                                </div>

                                <div class="popular-description">
                                    {{
                                        $application->description
                                        ?: 'Aplikasi Portal Rumah Sakit'
                                    }}
                                </div>

                                <div class="popular-count">
                                    {{ $application->visits_count }}
                                    kali digunakan
                                </div>

                            </div>

                            <a
                                href="{{ $application->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="popular-button"
                            >
                                Buka Aplikasi
                            </a>

                        </div>

                    </div>

                @endforeach

            @else

                <div class="popular-empty">
                    Belum ada data aplikasi populer.
                </div>

            @endif

        </div>

    </section>

</div>

@endsection
