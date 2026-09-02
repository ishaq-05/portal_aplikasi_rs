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
        | Mengambil 5 aplikasi aktif dengan jumlah kunjungan terbanyak.
        |
        */

        $popularApplications = Application::where('is_active', true)
            ->withCount('visits')
            ->orderByDesc('visits_count')
            ->orderBy('name')
            ->take(5)
            ->get();


        return view('applications.index', compact(
            'applications',
            'popularApplications',
            'search'
        ));
    }
}
