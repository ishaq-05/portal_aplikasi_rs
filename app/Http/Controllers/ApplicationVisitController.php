<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationVisit;

class ApplicationVisitController extends Controller
{
    public function open(Application $application)
    {
        if (!$application->is_active) {
            abort(404);
        }

        /*
        |--------------------------------------------------------------------------
        | CATAT KLIK USER
        |--------------------------------------------------------------------------
        |
        | Setiap user menekan "Buka Aplikasi",
        | maka jumlah kunjungan aplikasi bertambah 1.
        |
        */

        ApplicationVisit::create([
            'application_id' => $application->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | ARAHKAN USER KE APLIKASI
        |--------------------------------------------------------------------------
        */

        return redirect()->away($application->url);
    }
}
