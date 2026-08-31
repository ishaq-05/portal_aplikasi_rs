<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationVisit;

class ApplicationVisitController extends Controller
{
    public function open(Application $application)
    {
        // Catat penggunaan aplikasi
        ApplicationVisit::create([
            'application_id' => $application->id,
            'session_id' => session()->getId(),
            'visited_at' => now(),
        ]);

        // Arahkan user ke aplikasi
        return redirect()->away($application->url);
    }
}
