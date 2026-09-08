<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminApplicationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | KELOLA APLIKASI
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $applications = Application::orderBy('name')->get();

        return view(
            'superadmin.applications.index',
            compact('applications')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SEMUA APLIKASI
    |--------------------------------------------------------------------------
    */

    public function allApplications(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil keyword search
        |--------------------------------------------------------------------------
        */

        $search = trim(
            $request->input('search', '')
        );


        /*
        |--------------------------------------------------------------------------
        | Statistik
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
        | Ambil aplikasi
        |--------------------------------------------------------------------------
        |
        | Search berdasarkan:
        | 1. Nama aplikasi
        | 2. Deskripsi aplikasi
        |
        */

        $applications = Application::query()

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhere(
                        'description',
                        'like',
                        '%' . $search . '%'
                    );

                });

            })

            ->orderBy('name', 'asc')

            ->get();


        /*
        |--------------------------------------------------------------------------
        | Kirim data ke View
        |--------------------------------------------------------------------------
        */

        return view(
            'superadmin.applications.all',
            compact(
                'applications',
                'search',
                'totalApplications',
                'activeApplications',
                'inactiveApplications'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            'superadmin.applications.create'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'url' => [
                'required',
                'url',
                'max:2048'
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'icon' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->has('is_active');


        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            $validated['icon'] =
                $request
                    ->file('icon')
                    ->store(
                        'applications',
                        'public'
                    );

        }


        /*
        |--------------------------------------------------------------------------
        | Simpan
        |--------------------------------------------------------------------------
        */

        Application::create($validated);


        return redirect()
            ->route(
                'superadmin.applications.index'
            )
            ->with(
                'success',
                'Aplikasi berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Application $application)
    {
        return view(
            'superadmin.applications.edit',
            compact('application')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Application $application
    ) {

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'url' => [
                'required',
                'url',
                'max:2048'
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'icon' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->has('is_active');


        /*
        |--------------------------------------------------------------------------
        | Ganti Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            if ($application->icon) {

                Storage::disk('public')
                    ->delete(
                        $application->icon
                    );

            }


            $validated['icon'] =
                $request
                    ->file('icon')
                    ->store(
                        'applications',
                        'public'
                    );

        }


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $application->update(
            $validated
        );


        return redirect()
            ->route(
                'superadmin.applications.index'
            )
            ->with(
                'success',
                'Aplikasi berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Application $application
    ) {

        if ($application->icon) {

            Storage::disk('public')
                ->delete(
                    $application->icon
                );

        }


        $application->delete();


        return redirect()
            ->route(
                'superadmin.applications.index'
            )
            ->with(
                'success',
                'Aplikasi berhasil dihapus.'
            );
    }
}
