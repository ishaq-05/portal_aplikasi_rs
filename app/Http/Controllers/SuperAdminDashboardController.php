<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationVisit;
use Carbon\Carbon;

class SuperAdminDashboardController extends Controller
{
    public function dashboard()
    {
        $now = Carbon::now();

        $totalApplications = Application::count();

        $activeApplications = Application::where(
            'is_active',
            true
        )->count();

        $inactiveApplications = Application::where(
            'is_active',
            false
        )->count();

        $currentMonthStart = $now->copy()->startOfMonth();

        $currentMonthEnd = $now->copy()->endOfMonth();

        $lastMonthStart = $now->copy()
            ->subMonth()
            ->startOfMonth();

        $lastMonthEnd = $now->copy()
            ->subMonth()
            ->endOfMonth();

        $currentMonthVisits = ApplicationVisit::whereBetween(
            'visited_at',
            [
                $currentMonthStart,
                $currentMonthEnd
            ]
        )->count();

        $lastMonthUsage = ApplicationVisit::whereBetween(
            'visited_at',
            [
                $lastMonthStart,
                $lastMonthEnd
            ]
        )->count();

        if ($lastMonthUsage > 0) {
            $usageChange = round(
                (
                    (
                        $currentMonthVisits -
                        $lastMonthUsage
                    ) /
                    $lastMonthUsage
                ) * 100,
                1
            );
        } elseif ($currentMonthVisits > 0) {
            $usageChange = 100;
        } else {
            $usageChange = 0;
        }

        if ($usageChange > 0) {
            $usageTrend = 'up';
        } elseif ($usageChange < 0) {
            $usageTrend = 'down';
        } else {
            $usageTrend = 'same';
        }

        $usedApplications = Application::whereHas(
            'visits'
        )->count();

        $historyApplications = Application::whereHas(
            'visits'
        )->count();

        $monthlyLabels = [];

        $monthlyUsage = [];

        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = $now->copy()->subMonths($i);

            $start = $month->copy()->startOfMonth();

            $end = $month->copy()->endOfMonth();

            $count = ApplicationVisit::whereBetween(
                'visited_at',
                [
                    $start,
                    $end
                ]
            )->count();

            $label = $month->format('M Y');

            $monthlyLabels[] = $label;

            $monthlyUsage[] = $count;

            $months[] = [
                'label' => $label,
                'total' => $count
            ];
        }

        $maxUsage = max(
            $monthlyUsage ?: [0]
        );

        if ($maxUsage <= 0) {
            $maxUsage = 1;
        }

        $chartWidth = 600;

        $chartHeight = 130;

        $chartBottom = 110;

        $chartTop = 10;

        $numberOfPoints = count(
            $monthlyUsage
        );

        if ($numberOfPoints > 1) {
            $xStep = $chartWidth /
                ($numberOfPoints - 1);
        } else {
            $xStep = 0;
        }

        $chartPoints = [];

        $polylinePointsArray = [];

        foreach (
            $monthlyUsage as $index => $usage
        ) {
            $x = $index * $xStep;

            $y = $chartBottom -
                (
                    ($usage / $maxUsage) *
                    ($chartBottom - $chartTop)
                );

            $x = round($x, 2);

            $y = round($y, 2);

            $label = $monthlyLabels[$index]
                ?? '';

            $chartPoints[] = [
                'x' => $x,
                'y' => $y,
                'value' => $usage,
                'total' => $usage,
                'label' => $label
            ];

            $polylinePointsArray[] =
                $x . ',' . $y;
        }

        $polylinePoints = implode(
            ' ',
            $polylinePointsArray
        );

        $popularApplications = Application::withCount(
            'visits'
        )
            ->orderByDesc('visits_count')
            ->orderBy('name')
            ->take(3)
            ->get();

        $sixMonthStart = $now->copy()
            ->subMonths(5)
            ->startOfMonth();

        $sixMonthEnd = $now->copy()
            ->endOfMonth();

        $applicationUsage = Application::withCount([
            'visits' => function ($query) use (
                $sixMonthStart,
                $sixMonthEnd
            ) {
                $query->whereBetween(
                    'visited_at',
                    [
                        $sixMonthStart,
                        $sixMonthEnd
                    ]
                );
            }
        ])
            ->orderByDesc('visits_count')
            ->orderBy('name')
            ->get();

        foreach (
            $applicationUsage as $application
        ) {
            $currentUsage = ApplicationVisit::where(
                'application_id',
                $application->id
            )
                ->whereBetween(
                    'visited_at',
                    [
                        $currentMonthStart,
                        $currentMonthEnd
                    ]
                )
                ->count();

            $previousUsage = ApplicationVisit::where(
                'application_id',
                $application->id
            )
                ->whereBetween(
                    'visited_at',
                    [
                        $lastMonthStart,
                        $lastMonthEnd
                    ]
                )
                ->count();

            if ($previousUsage > 0) {
                $change = round(
                    (
                        (
                            $currentUsage -
                            $previousUsage
                        ) /
                        $previousUsage
                    ) * 100,
                    1
                );
            } elseif ($currentUsage > 0) {
                $change = 100;
            } else {
                $change = 0;
            }

            if ($change > 0) {
                $trend = 'up';
            } elseif ($change < 0) {
                $trend = 'down';
            } else {
                $trend = 'same';
            }

            $application->usage_change = $change;

            $application->usage_trend = $trend;
        }

        $veryActiveApplications = $applicationUsage
            ->sortByDesc('visits_count')
            ->take(5)
            ->values();

        $rarelyUsedApplications = $applicationUsage
            ->sortBy('visits_count')
            ->take(5)
            ->values();

        $mostActiveCount = $veryActiveApplications->max(
            'visits_count'
        ) ?? 0;

        return view(
            'superadmin.dashboard',
            compact(
                'totalApplications',
                'activeApplications',
                'inactiveApplications',
                'currentMonthVisits',
                'lastMonthUsage',
                'usageChange',
                'usageTrend',
                'usedApplications',
                'historyApplications',
                'monthlyLabels',
                'monthlyUsage',
                'months',
                'maxUsage',
                'chartPoints',
                'polylinePoints',
                'popularApplications',
                'veryActiveApplications',
                'rarelyUsedApplications',
                'mostActiveCount'
            )
        );
    }
}
