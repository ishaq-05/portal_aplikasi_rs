<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuperAdminAccountController extends Controller
{
    /**
     * Menampilkan halaman akun Super Admin.
     */
    public function index()
    {
        $user = auth()->user();

        if (!$user || !$user->is_super_admin) {
            abort(403);
        }

        return view('superadmin.account.profile', compact('user'));
    }

    /**
     * Memperbarui data akun Super Admin.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if (!$user || !$user->is_super_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'current_password' => [
                'nullable',
                'required_with:new_password',
                'current_password',
            ],

            'new_password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah digunakan oleh akun lain.',

            'profile_photo.image' => 'File yang dipilih harus berupa gambar.',
            'profile_photo.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'profile_photo.max' => 'Ukuran foto maksimal 2 MB.',

            'current_password.required_with' => 'Password saat ini wajib diisi jika ingin mengganti password.',
            'current_password.current_password' => 'Password saat ini tidak sesuai.',

            'new_password.min' => 'Password baru minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Nama dan Email
        |--------------------------------------------------------------------------
        */

        $user->name = $validated['name'];
        $user->email = $validated['email'];


        /*
        |--------------------------------------------------------------------------
        | Update Foto Profil
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Hapus foto lama jika ada.
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru.
            $user->profile_photo = $request
                ->file('profile_photo')
                ->store('profile', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update Password
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['new_password'])) {
            $user->password = Hash::make($validated['new_password']);
        }


        /*
        |--------------------------------------------------------------------------
        | Jangan mengubah:
        |
        | - role
        | - is_super_admin
        |--------------------------------------------------------------------------
        */

        $user->save();

        return redirect()
            ->route('superadmin.account')
            ->with('success', 'Data akun berhasil diperbarui.');
    }
}
