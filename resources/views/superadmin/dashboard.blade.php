@extends('layouts.superadmin')

@section('title', 'Dashboard - Super Admin')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

    .dashboard-page,
    .dashboard-page * {
        font-family: 'Poppins', Arial, sans-serif;
    }

    .dashboard-page {
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.25)),
            url('/images/rs.jpeg');
        background-size: cover;
        background-position: center bottom;
        background-repeat: no-repeat;
        padding: 20px 20px 260px;
        border-radius: 14px;
    }

    .dashboard-header {
        display: none;
    }

    /* STATS GRID */
    .stats-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
        margin-bottom: 32px;
    }

    .stat-card {
        min-height: 160px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px 24px 16px;
        color: #172033;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    .stat-title {
        font-size: 14px;
        font-weight: 700;
        color: #172033;
    }

    .stat-card-body {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 8px;
    }

    .stat-number {
        font-size: 58px;
        line-height: 1;
        font-weight: 600; /* Ketebalan angka statistik dikurangi dari 800 ke 600 */
        color: #0f172a;
    }

    .stat-sparkline {
        width: 120px;
        height: 50px;
        flex-shrink: 0;
    }

    .stat-sparkline.is-up polyline {
        stroke: #22c55e;
    }

    .stat-sparkline.is-down polyline {
        stroke: #ef4444;
    }

    .stat-sparkline polyline {
        fill: none;
        stroke-width: 2.5;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ANALYSIS SECTION - SESUAI GAMBAR REFERENSI */
    .analysis-section {
        width: 100%;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 28px 24px 28px;
        margin-bottom: 24px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
    }

    .analysis-title {
        text-align: center;
        font-size: 22px;
        font-weight: 600;
        color: #000000;
        margin-bottom: 2px;
        letter-spacing: -0.2px;
    }

    .analysis-description {
        text-align: center;
        font-size: 12px;
        color: #5f7695;
        margin-bottom: 20px;
    }

    .analysis-content {
        width: 100%;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 220px;
        gap: 16px;
    }

    .chart-card {
        min-height: 220px;
        background: #f8f9fa;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 22px;
        display: flex;
        flex-direction: column;
    }

    .chart-title {
        font-size: 14px;
        color: #000000;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .chart {
        position: relative;
        width: 100%;
        flex: 1;
        min-height: 130px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .chart-grid {
        width: 100%;
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .grid-line {
        width: 100%;
        height: 1px;
        background: #e2e8f0;
    }

    .chart-months,
    .chart-svg {
        display: none;
    }

    .analysis-side {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .analysis-card {
        flex: 1;
        min-height: 104px;
        background: #f8f9fa;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 16px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .analysis-card-title {
        font-size: 13px;
        font-weight: 600;
        color: #172033;
        margin-bottom: 4px;
    }

    .analysis-card-number {
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
    }

    .analysis-card-description {
        font-size: 11px;
        color: #64748b;
    }

    /* POPULAR SECTION */
    .popular-section {
        width: 100%;
        background: #5b8260;
        border: none;
        border-radius: 16px;
        padding: 30px 25px 35px;
        color: #ffffff;
    }

    .popular-header {
        text-align: center;
        margin-bottom: 24px;
    }

    .popular-header h2 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .popular-header p {
        font-size: 14px; /* Ukuran font deskripsi header aplikasi populer diperbesar */
        color: #ffffff;
    }

    .popular-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .popular-card {
        background: #ffffff;
        color: #111827;
        border-radius: 18px;
        overflow: hidden;
        min-height: 290px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .popular-logo-wrapper {
        width: 100%;
        height: 135px;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .popular-logo {
        max-width: 85%;
        max-height: 85px;
        object-fit: contain;
    }

    .popular-no-logo {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: bold;
        color: #5b8260;
        background: #f3f7f9;
    }

    .popular-body {
        flex: 1;
        background: #dcded3;
        padding: 20px 18px 24px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .popular-name {
        font-size: 22px;
        font-weight: 600; /* Ketebalan nama aplikasi dikurangi dari 800 ke 600 */
        color: #000000;
        margin-bottom: 4px;
    }

    .popular-description {
        font-size: 14px; /* Ukuran font deskripsi aplikasi diperbesar dari 12px ke 14px */
        color: #475569;
        margin-bottom: 14px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .popular-button {
        width: auto;
        padding: 6px 20px;
        background: #ffffff;
        border: 1px solid #111827;
        border-radius: 2px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #172033;
        font-size: 11px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .popular-button:hover {
        background: #111827;
        color: #ffffff;
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
        .analysis-content {
            grid-template-columns: minmax(0, 1fr) 180px;
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
        .popular-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .analysis-side {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard-page">

<div class="dashboard-header">
    <h1>DASHBOARD</h1>
    <p>Kelola dan pantau penggunaan aplikasi Portal Rumah Sakit.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-title">Total Aplikasi</div>
        <div class="stat-card-body">
            <div class="stat-number">{{ $totalApplications ?? 0 }}</div>
            <svg class="stat-sparkline is-up" viewBox="0 0 100 40" preserveAspectRatio="none">
                <polyline points="0,35 25,25 50,30 75,10 100,5" />
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Aplikasi Aktif</div>
        <div class="stat-card-body">
            <div class="stat-number">{{ $activeApplications ?? 0 }}</div>
            <svg class="stat-sparkline is-up" viewBox="0 0 100 40" preserveAspectRatio="none">
                <polyline points="0,35 25,25 50,30 75,10 100,5" />
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Aplikasi Nonaktif</div>
        <div class="stat-card-body">
            <div class="stat-number">{{ $inactiveApplications ?? 0 }}</div>
            <svg class="stat-sparkline is-down" viewBox="0 0 100 40" preserveAspectRatio="none">
                <polyline points="0,10 25,25 50,20 75,35 100,38" />
            </svg>
        </div>
    </div>
</div>

<section class="analysis-section">
    <h2 class="analysis-title">Analisis Penggunaan Aplikasi</h2>
    <p class="analysis-description">Perbandingan aktivitas user berdasarkan 6 bulan terakhir</p>

    <div class="analysis-content">
        <div class="chart-card">
            <div class="chart-title">Tren penggunaan 6 bulan terakhir</div>
            <div class="chart">
                <div class="chart-grid">
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                </div>

                <svg class="chart-svg" viewBox="0 0 600 130" preserveAspectRatio="none">
                    <polyline class="chart-line" points="0,110 120,110 240,110 360,110 480,25 600,45" />
                    <circle class="chart-point" cx="0" cy="110" r="5" />
                    <circle class="chart-point" cx="120" cy="110" r="5" />
                    <circle class="chart-point" cx="240" cy="110" r="5" />
                    <circle class="chart-point" cx="360" cy="110" r="5" />
                    <circle class="chart-point" cx="480" cy="25" r="5" />
                    <circle class="chart-point" cx="600" cy="45" r="5" />
                </svg>

                <div class="chart-months">
                    <span>Apr 2026</span>
                    <span>May 2026</span>
                    <span>Jun 2026</span>
                    <span>Jul 2026</span>
                    <span>Aug 2026</span>
                    <span>Sep 2026</span>
                </div>
            </div>
        </div>

        <div class="analysis-side">
            <div class="analysis-card">
                <div class="analysis-card-title">Penggunaan Bulan Lalu</div>
                <div class="analysis-card-number">{{ $lastMonthUsage ?? 0 }}</div>
                <div class="analysis-card-description">Penurunan 20% dari bulan lalu</div>
            </div>

            <div class="analysis-card">
                <div class="analysis-card-title">History Aplikasi</div>
                <div class="analysis-card-number">{{ $historyApplications ?? 0 }}</div>
                <div class="analysis-card-description">Dari {{ $totalApplications ?? 0 }} aplikasi tersedia</div>
            </div>
        </div>
    </div>
</section>

<section class="popular-section">
    <div class="popular-header">
        <h2>Aplikasi Paling Populer</h2>
        <p>Aplikasi yang paling sering digunakan oleh user.</p>
    </div>

    <div class="popular-grid">
        @if (isset($popularApplications) && $popularApplications->count() > 0)
            @foreach ($popularApplications->take(3) as $application)
                <div class="popular-card">
                    <div class="popular-logo-wrapper">
                        @if ($application->icon)
                            <img src="{{ asset('storage/' . $application->icon) }}" alt="{{ $application->name }}" class="popular-logo">
                        @else
                            <div class="popular-no-logo">
                                {{ strtoupper(substr($application->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    <div class="popular-body">
                        <div>
                            <div class="popular-name">{{ $application->name }}</div>
                            <div class="popular-description">
                                {{ $application->description ?? 'Aplikasi Portal Rumah Sakit' }}
                            </div>
                        </div>

                        <a href="{{ $application->url }}" target="_blank" rel="noopener noreferrer" class="popular-button">
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