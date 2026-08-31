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
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'url' => [
                'required',
                'url',
                'max:2048',
            ],

            'icon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

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


        return redirect()
            ->route('superadmin.applications.index')
            ->with('success', 'Aplikasi berhasil ditambahkan.');
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
    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'url' => [
                'required',
                'url',
                'max:2048',
            ],

            'icon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Jika ada logo baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            // Hapus logo lama
            if ($application->icon) {
                Storage::disk('public')->delete($application->icon);
            }

            // Simpan logo baru
            $validated['icon'] = $request
                ->file('icon')
                ->store('applications', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update data aplikasi
        |--------------------------------------------------------------------------
        */

        $application->update($validated);


        return redirect()
            ->route('superadmin.applications.index')
            ->with('success', 'Aplikasi berhasil diperbarui.');
    }


    /**
     * Menghapus aplikasi.
     */
    public function destroy(Application $application)
    {
        /*
        |--------------------------------------------------------------------------
        | Hapus logo dari storage
        |--------------------------------------------------------------------------
        */

        if ($application->icon) {
            Storage::disk('public')->delete($application->icon);
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus data aplikasi
        |--------------------------------------------------------------------------
        */

        $application->delete();


        return redirect()
            ->route('superadmin.applications.index')
            ->with('success', 'Aplikasi berhasil dihapus.');
    }
}
