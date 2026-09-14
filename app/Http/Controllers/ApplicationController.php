<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $applications = Application::query()
            ->where('is_active', true)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('name')
            ->get();

        $popularApplications = Application::query()
            ->where('is_active', true)
            ->withCount('visits')
            ->orderByDesc('visits_count')
            ->orderBy('name')
            ->take(3)
            ->get();

        return view('applications.index', compact(
            'applications',
            'popularApplications',
            'search'
        ));
    }

    public function popular()
    {
        $applications = Application::query()
            ->where('is_active', true)
            ->withCount('visits')
            ->orderByDesc('visits_count')
            ->orderBy('name')
            ->take(3)
            ->get([
                'id',
                'name',
                'description',
                'icon',
                'notification_type',
            ]);

        return response()->json($applications);
    }
}
