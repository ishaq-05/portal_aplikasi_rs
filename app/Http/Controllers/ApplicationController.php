<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil semua aplikasi
        $applications = $query->get();

        // Ambil 3 aplikasi terbaru untuk section Aplikasi Populer
        $popularApplications = Application::latest()->take(3)->get();

        return view('welcome', compact('applications', 'popularApplications'));
    }
}