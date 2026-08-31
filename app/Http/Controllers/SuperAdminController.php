<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationVisit;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik aplikasi
        |--------------------------------------------------------------------------
        */

        $totalApplications = Application::count();

        $activeApplications = Application::where(
            'is_active',
            true
        )->count();

        $inactiveApplications = Application::where(
            'is_active',
            false
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Periode analisis
        |--------------------------------------------------------------------------
        |
        | Kita mengambil data 6 bulan terakhir.
        |
        */

        $startDate = Carbon::now()
            ->startOfMonth()
            ->subMonths(5);

        $endDate = Carbon::now()
            ->endOfMonth();


        /*
        |--------------------------------------------------------------------------
        | Semua kunjungan aplikasi 6 bulan terakhir
        |--------------------------------------------------------------------------
        */

        $visits = ApplicationVisit::whereBetween(
            'visited_at',
            [
                $startDate,
                $endDate
            ]
        )
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Grafik penggunaan per bulan
        |--------------------------------------------------------------------------
        */

        $monthlyUsage = [];
        $monthlyLabels = [];

        for ($i = 5; $i >= 0; $i--) {

            $month = Carbon::now()
                ->startOfMonth()
                ->subMonths($i);

            $key = $month->format('Y-m');

            $monthlyLabels[] = $month->translatedFormat('M Y');

            $monthlyUsage[$key] = $visits
                ->filter(function ($visit) use ($month) {

                    return Carbon::parse(
                        $visit->visited_at
                    )->isSameMonth($month);

                })
                ->count();
        }


        /*
        |--------------------------------------------------------------------------
        | Total penggunaan
        |--------------------------------------------------------------------------
        */

        $totalVisits = $visits->count();


        /*
        |--------------------------------------------------------------------------
        | Penggunaan bulan ini
        |--------------------------------------------------------------------------
        */

        $currentMonth = Carbon::now()
            ->startOfMonth();

        $previousMonth = Carbon::now()
            ->startOfMonth()
            ->subMonth();


        $currentMonthVisits = $visits
            ->filter(function ($visit) use ($currentMonth) {

                return Carbon::parse(
                    $visit->visited_at
                )->isSameMonth($currentMonth);

            })
            ->count();


        $previousMonthVisits = $visits
            ->filter(function ($visit) use ($previousMonth) {

                return Carbon::parse(
                    $visit->visited_at
                )->isSameMonth($previousMonth);

            })
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Persentase perubahan
        |--------------------------------------------------------------------------
        */

        if ($previousMonthVisits > 0) {

            $usageChange = round(
                (
                    ($currentMonthVisits - $previousMonthVisits)
                    / $previousMonthVisits
                ) * 100,
                1
            );

        } elseif ($currentMonthVisits > 0) {

            $usageChange = 100;

        } else {

            $usageChange = 0;

        }


        /*
        |--------------------------------------------------------------------------
        | Status kenaikan / penurunan
        |--------------------------------------------------------------------------
        */

        if ($usageChange > 0) {

            $usageTrend = 'up';

        } elseif ($usageChange < 0) {

            $usageTrend = 'down';

        } else {

            $usageTrend = 'same';

        }


        /*
        |--------------------------------------------------------------------------
        | Jumlah aplikasi yang pernah digunakan
        |--------------------------------------------------------------------------
        */

        $usedApplications = ApplicationVisit::distinct(
            'application_id'
        )->count('application_id');


        /*
        |--------------------------------------------------------------------------
        | Ranking aplikasi berdasarkan jumlah penggunaan
        |--------------------------------------------------------------------------
        */

        $applicationAnalytics = Application::withCount(
            'visits'
        )
        ->orderByDesc('visits_count')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Top 5 aplikasi populer
        |--------------------------------------------------------------------------
        */

        $popularApplications = $applicationAnalytics
            ->take(5)
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Analisis masing-masing aplikasi
        |--------------------------------------------------------------------------
        */

        foreach ($popularApplications as $application) {

            $currentApplicationVisits = ApplicationVisit::where(
                'application_id',
                $application->id
            )
            ->whereBetween(
                'visited_at',
                [
                    $currentMonth->copy()->startOfMonth(),
                    $currentMonth->copy()->endOfMonth()
                ]
            )
            ->count();


            $previousApplicationVisits = ApplicationVisit::where(
                'application_id',
                $application->id
            )
            ->whereBetween(
                'visited_at',
                [
                    $previousMonth->copy()->startOfMonth(),
                    $previousMonth->copy()->endOfMonth()
                ]
            )
            ->count();


            /*
            |------------------------------------------------------------------
            | Persentase perubahan aplikasi
            |------------------------------------------------------------------
            */

            if ($previousApplicationVisits > 0) {

                $applicationChange = round(
                    (
                        (
                            $currentApplicationVisits
                            - $previousApplicationVisits
                        )
                        / $previousApplicationVisits
                    ) * 100,
                    1
                );

            } elseif ($currentApplicationVisits > 0) {

                $applicationChange = 100;

            } else {

                $applicationChange = 0;

            }


            /*
            |------------------------------------------------------------------
            | Status trend aplikasi
            |------------------------------------------------------------------
            */

            if ($applicationChange > 0) {

                $applicationTrend = 'up';

            } elseif ($applicationChange < 0) {

                $applicationTrend = 'down';

            } else {

                $applicationTrend = 'same';

            }


            $application->current_month_visits =
                $currentApplicationVisits;

            $application->previous_month_visits =
                $previousApplicationVisits;

            $application->usage_change =
                $applicationChange;

            $application->usage_trend =
                $applicationTrend;
        }


        /*
        |--------------------------------------------------------------------------
        | Aplikasi paling populer
        |--------------------------------------------------------------------------
        */

        $mostPopularApplication =
            $popularApplications->first();


        /*
        |--------------------------------------------------------------------------
        | Kirim data ke dashboard
        |--------------------------------------------------------------------------
        */

        return view(
            'superadmin.dashboard',
            compact(
                'totalApplications',
                'activeApplications',
                'inactiveApplications',

                'totalVisits',
                'usedApplications',

                'currentMonthVisits',
                'previousMonthVisits',

                'usageChange',
                'usageTrend',

                'monthlyLabels',
                'monthlyUsage',

                'mostPopularApplication',
                'popularApplications',

                'applicationAnalytics'
            )
        );
    }
}
