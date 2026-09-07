<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        /*
        |--------------------------------------------------------------------------
        | SEMUA APLIKASI
        |--------------------------------------------------------------------------
        */

        $applications = Application::where('is_active', true)
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | APLIKASI POPULER
        |--------------------------------------------------------------------------
        |
        | Mengambil 3 aplikasi aktif dengan jumlah klik/kunjungan terbanyak.
        |
        */

        $popularApplications = $this->getPopularApplications();

        return view('applications.index', compact(
            'applications',
            'popularApplications',
            'search'
        ));
    }

    /**
     * Mengambil 3 aplikasi paling populer berdasarkan jumlah klik.
     */
    private function getPopularApplications()
    {
        return Application::where('is_active', true)
            ->withCount('visits')
            ->orderByDesc('visits_count')
            ->orderBy('name')
            ->take(3)
            ->get();
    }

    /**
     * API untuk mengambil data aplikasi populer terbaru.
     *
     * Digunakan JavaScript agar tampilan user
     * dapat diperbarui otomatis tanpa refresh halaman.
     */
    public function popular()
    {
        $popularApplications = $this->getPopularApplications();

        return response()->json(
            $popularApplications->map(function ($application, $index) {
                return [
                    'id' => $application->id,
                    'rank' => $index + 1,
                    'name' => $application->name,
                    'description' => $application->description
                        ?: 'Aplikasi yang sering digunakan user.',
                    'icon' => $application->icon
                        ? asset('storage/' . $application->icon)
                        : null,
                    'visits_count' => $application->visits_count,
                    'url' => route('applications.open', $application),
                ];
            })->values()
        );
    }
}
