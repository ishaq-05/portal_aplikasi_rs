@extends('layouts.superadmin')

@section('title', 'Dashboard - Super Admin')

@push('styles')
<style>
    .dashboard-header {
        margin-bottom: 28px;
    }

    .dashboard-header h1 {
        font-size: 34px;
        line-height: 1.1;
        font-weight: 800;
        color: #172033;
        margin-bottom: 8px;
    }

    .dashboard-header p {
        font-size: 16px;
        color: #5f7695;
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
        font-weight: bold;
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
        border: 2px solid #172033;
        border-radius: 13px;
        padding: 20px;
        margin-bottom: 38px;
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
        border: 1px solid #172033;
        border-radius: 10px;
        padding: 14px 15px;
    }

    .chart-title {
        font-size: 13px;
        color: #172033;
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

    .chart-months {
        position: absolute;
        left: 50px;
        right: 10px;
        bottom: 0;
        display: flex;
        justify-content: space-between;
        color: #5f7695;
        font-size: 11px;
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
        font-weight: bold;
    }

    .analysis-card-number {
        text-align: center;
        font-size: 42px;
        line-height: 1;
        font-weight: 800;
    }

    .analysis-card-description {
        text-align: center;
        font-size: 11px;
        font-weight: 500;
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
        border-bottom: 1px solid #172033;
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
        .popular-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .dashboard-header h1 {
            font-size: 29px;
        }
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .popular-grid {
            grid-template-columns: 1fr;
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

<div class="dashboard-header">
    <h1>DASHBOARD</h1>
    <p>Kelola dan pantau penggunaan aplikasi Portal Rumah Sakit.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-title">Total Aplikasi</div>
        <div class="stat-number">{{ $totalApplications ?? 0 }}</div>
        <div class="stat-description">Total aplikasi dalam sistem</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Aplikasi Aktif</div>
        <div class="stat-number">{{ $activeApplications ?? 0 }}</div>
        <div class="stat-description">Aplikasi yang dapat digunakan user</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Aplikasi Nonaktif</div>
        <div class="stat-number">{{ $inactiveApplications ?? 0 }}</div>
        <div class="stat-description">Aplikasi yang tidak aktif</div>
    </div>
</div>

<section class="analysis-section">
    <h2 class="analysis-title">ANALISIS PENGGUNA APLIKASI</h2>
    <p class="analysis-description">Perbandingan aktivitas user berdasarkan 6 bulan terakhir.</p>

    <div class="analysis-content">
        <div class="chart-card">
            <div class="chart-title">Tren Penggunaan 6 Bulan Terakhir</div>
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
        <h2>APLIKASI POPULER</h2>
        <p>Aplikasi yang paling sering digunakan oleh user.</p>
    </div>

    <div class="popular-grid">
        @if (isset($popularApplications) && $popularApplications->count() > 0)
            @foreach ($popularApplications->take(3) as $index => $application)
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
                            <div class="popular-rank">#{{ $index + 1 }}</div>
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

@endsection