<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('name')->get();

        return view('superadmin.applications.index', compact('applications'));
    }

    public function allApplications(Request $request)
    {
        $search = trim($request->input('search', ''));

        $totalApplications = Application::count();
        $activeApplications = Application::where('is_active', true)->count();
        $inactiveApplications = Application::where('is_active', false)->count();

        $applications = Application::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('name')
            ->get();

        return view('superadmin.applications.all', compact(
            'applications',
            'search',
            'totalApplications',
            'activeApplications',
            'inactiveApplications'
        ));
    }

    public function create()
    {
        return view('superadmin.applications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Aplikasi baru otomatis mendapatkan badge NEW.
        $validated['notification_type'] = 'new';

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('applications', 'public');
        }

        Application::create($validated);

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Aplikasi berhasil ditambahkan.');
    }

    public function edit(Application $application)
    {
        return view('superadmin.applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'notification_type' => ['nullable', 'in:new,updated'],
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('icon')) {
            if ($application->icon) {
                Storage::disk('public')->delete($application->icon);
            }

            $validated['icon'] = $request->file('icon')->store('applications', 'public');
        }

        $application->update($validated);

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Aplikasi berhasil diperbarui.');
    }

    public function destroy(Application $application)
    {
        if ($application->icon) {
            Storage::disk('public')->delete($application->icon);
        }

        $application->delete();

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Aplikasi berhasil dihapus.');
    }

    public function toggleStatus(Application $application)
    {
        $application->update([
            'is_active' => ! $application->is_active,
        ]);

        return redirect()
            ->route('superadmin.applications.index')
            ->with(
                'success',
                $application->is_active
                    ? 'Aplikasi berhasil diaktifkan.'
                    : 'Aplikasi berhasil dinonaktifkan.'
            );
    }
}
