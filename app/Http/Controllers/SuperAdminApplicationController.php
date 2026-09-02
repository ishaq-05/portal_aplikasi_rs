<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminApplicationController extends Controller
{
    /**
     * Menampilkan daftar aplikasi.
     */
    public function index()
    {
        $applications = Application::orderBy('name')->get();

        return view(
            'superadmin.applications.index',
            compact('applications')
        );
    }


    /**
     * Menampilkan form tambah aplikasi.
     */
    public function create()
    {
        return view('superadmin.applications.create');
    }


    /**
     * Menyimpan aplikasi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            // Nama aplikasi
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            // URL aplikasi
            'url' => [
                'required',
                'url',
                'max:2048',
            ],

            // Deskripsi aplikasi
            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            // Logo aplikasi
            'icon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            // Status aplikasi
            'is_active' => [
                'required',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            $validated['icon'] = $request
                ->file('icon')
                ->store('applications', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan Aplikasi
        |--------------------------------------------------------------------------
        */

        Application::create($validated);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('superadmin.applications.index')
            ->with(
                'success',
                'Aplikasi berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan form edit aplikasi.
     */
    public function edit(Application $application)
    {
        return view(
            'superadmin.applications.edit',
            compact('application')
        );
    }


    /**
     * Memperbarui aplikasi.
     */
    public function update(
        Request $request,
        Application $application
    ) {
        $validated = $request->validate([

            // Nama aplikasi
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            // URL aplikasi
            'url' => [
                'required',
                'url',
                'max:2048',
            ],

            // Deskripsi aplikasi
            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            // Logo aplikasi
            'icon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            // Status aplikasi
            'is_active' => [
                'required',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Jika Ada Logo Baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            // Hapus logo lama
            if ($application->icon) {

                Storage::disk('public')
                    ->delete($application->icon);
            }


            // Simpan logo baru
            $validated['icon'] = $request
                ->file('icon')
                ->store('applications', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update Data Aplikasi
        |--------------------------------------------------------------------------
        */

        $application->update($validated);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('superadmin.applications.index')
            ->with(
                'success',
                'Aplikasi berhasil diperbarui.'
            );
    }


    /**
     * Menghapus aplikasi.
     */
    public function destroy(Application $application)
    {
        /*
        |--------------------------------------------------------------------------
        | Hapus Logo
        |--------------------------------------------------------------------------
        */

        if ($application->icon) {

            Storage::disk('public')
                ->delete($application->icon);
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus Data Aplikasi
        |--------------------------------------------------------------------------
        */

        $application->delete();


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('superadmin.applications.index')
            ->with(
                'success',
                'Aplikasi berhasil dihapus.'
            );
    }
}
