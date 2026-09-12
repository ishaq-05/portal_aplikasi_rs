@extends('layouts.superadmin')

@section('title', 'Akun Super Admin')

@section('content')

<style>
    .account-page {
        width: 100%;
        min-height: calc(100vh - 50px);
        padding: 32px;
    }

    .account-header {
        margin-bottom: 24px;
    }

    .account-header h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #1f2937;
    }

    .account-header p {
        margin-top: 6px;
        font-size: 13px;
        color: #64748b;
    }

    .account-layout {
        width: 100%;
        max-width: 1050px;
        display: grid;
        grid-template-columns: 280px minmax(0, 1fr);
        gap: 22px;
        align-items: start;
    }

    /*
    |--------------------------------------------------------------------------
    | PROFILE CARD
    |--------------------------------------------------------------------------
    */

    .profile-card,
    .form-card {
        background: #ffffff;
        border: 1px solid #e8edf0;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
    }

    .profile-card {
        padding: 28px 22px;
        text-align: center;
    }

    .profile-photo-wrapper {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto 16px;
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        display: block;
        border: 4px solid #ffffff;
        box-shadow:
            0 0 0 1px #dbe5de,
            0 5px 15px rgba(15, 23, 42, 0.08);
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #d2e3d7;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2e4e3f;
        font-size: 34px;
        font-weight: 700;
        text-transform: uppercase;
        border: 4px solid #ffffff;
        box-shadow:
            0 0 0 1px #dbe5de,
            0 5px 15px rgba(15, 23, 42, 0.08);
    }

    .profile-photo-button {
        position: absolute;
        right: -2px;
        bottom: -2px;
        width: 31px;
        height: 31px;
        border-radius: 50%;
        border: 3px solid #ffffff;
        background: #5b8260;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 3px 8px rgba(15, 23, 42, 0.12);
        transition: background-color 0.2s ease, transform 0.15s ease;
    }

    .profile-photo-button:hover {
        background: #4d7253;
        transform: scale(1.05);
    }

    .profile-photo-button svg {
        width: 15px;
        height: 15px;
        fill: none;
        stroke: #ffffff;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .profile-photo-input {
        display: none;
    }

    .profile-photo-hint {
        margin-top: 8px;
        margin-bottom: 18px;
        font-size: 10px;
        color: #94a3b8;
    }

    .profile-name {
        font-size: 17px;
        font-weight: 700;
        color: #1f2937;
        word-break: break-word;
    }

    .profile-email {
        margin-top: 5px;
        font-size: 12px;
        color: #64748b;
        word-break: break-word;
    }

    .profile-role {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        margin-top: 18px;
        padding: 7px 14px;
        border-radius: 999px;
        background: #edf6ef;
        color: #2e4e3f;
        font-size: 11px;
        font-weight: 600;
    }

    .profile-role-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #5b8260;
    }

    .profile-info {
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #eef1f3;
        text-align: left;
    }

    .profile-info-title {
        font-size: 11px;
        font-weight: 600;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 10px;
    }

    .profile-info-text {
        font-size: 12px;
        line-height: 1.7;
        color: #64748b;
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CARD
    |--------------------------------------------------------------------------
    */

    .form-card {
        padding: 28px;
    }

    .form-section {
        padding-bottom: 24px;
        margin-bottom: 24px;
        border-bottom: 1px solid #eef1f3;
    }

    .form-section:last-of-type {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .form-section-title {
        margin-bottom: 4px;
        font-size: 15px;
        font-weight: 700;
        color: #1f2937;
    }

    .form-section-description {
        margin-bottom: 20px;
        font-size: 12px;
        color: #64748b;
        line-height: 1.6;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .form-group {
        width: 100%;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 12px;
        font-weight: 600;
        color: #374151;
    }

    .form-label span {
        color: #ef4444;
    }

    .form-input,
    .form-display {
        width: 100%;
        min-height: 42px;
        padding: 10px 13px;
        border: 1px solid #dbe2e7;
        border-radius: 8px;
        background: #ffffff;
        color: #1f2937;
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
        font-size: 12px;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-input:focus {
        border-color: #6b9270;
        box-shadow: 0 0 0 3px rgba(91, 130, 96, 0.10);
    }

    .form-input::placeholder {
        color: #a8b1bb;
    }

    .form-display {
        display: flex;
        align-items: center;
        background: #f8fafb;
        color: #475569;
        cursor: not-allowed;
    }

    .password-note {
        margin-top: 8px;
        font-size: 11px;
        line-height: 1.6;
        color: #94a3b8;
    }

    /*
    |--------------------------------------------------------------------------
    | ALERT
    |--------------------------------------------------------------------------
    */

    .alert-success {
        width: 100%;
        max-width: 1050px;
        margin-bottom: 18px;
        padding: 12px 15px;
        border: 1px solid #cfe3d3;
        border-radius: 9px;
        background: #eff8f1;
        color: #35633e;
        font-size: 12px;
        font-weight: 500;
    }

    .alert-error {
        width: 100%;
        max-width: 1050px;
        margin-bottom: 18px;
        padding: 12px 15px;
        border: 1px solid #f2caca;
        border-radius: 9px;
        background: #fff4f4;
        color: #a33a3a;
        font-size: 12px;
        font-weight: 500;
    }

    .field-error {
        margin-top: 6px;
        font-size: 11px;
        color: #dc2626;
    }

    /*
    |--------------------------------------------------------------------------
    | PHOTO ERROR
    |--------------------------------------------------------------------------
    */

    .photo-error {
        margin-top: 6px;
        font-size: 11px;
        color: #dc2626;
    }

    /*
    |--------------------------------------------------------------------------
    | BUTTON
    |--------------------------------------------------------------------------
    */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        margin-top: 26px;
        padding-top: 22px;
        border-top: 1px solid #eef1f3;
    }

    .btn-save {
        min-height: 40px;
        padding: 0 20px;
        border: none;
        border-radius: 8px;
        background: #5b8260;
        color: #ffffff;
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.15s ease;
    }

    .btn-save:hover {
        background: #4d7253;
    }

    .btn-save:active {
        transform: translateY(1px);
    }

    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 900px) {
        .account-layout {
            grid-template-columns: 1fr;
        }

        .profile-card {
            text-align: left;
        }

        .profile-photo-wrapper {
            margin: 0 0 16px;
        }

        .profile-info {
            text-align: left;
        }
    }

    @media (max-width: 700px) {
        .account-page {
            padding: 24px 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-card {
            padding: 22px 18px;
        }
    }

    @media (max-width: 480px) {
        .account-page {
            padding: 20px 14px;
        }

        .account-header h1 {
            font-size: 21px;
        }

        .form-actions {
            justify-content: stretch;
        }

        .btn-save {
            width: 100%;
        }
    }
</style>


<div class="account-page">

    {{-- ==========================================================
         HEADER
    =========================================================== --}}
    <div class="account-header">

        <h1>Akun</h1>

        <p>
            Kelola informasi akun Super Admin yang sedang digunakan.
        </p>

    </div>


    {{-- ==========================================================
         SUCCESS MESSAGE
    =========================================================== --}}
    @if (session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- ==========================================================
         ERROR MESSAGE
    =========================================================== --}}
    @if ($errors->any())

        <div class="alert-error">
            Terdapat data yang perlu diperiksa kembali.
        </div>

    @endif


    <div class="account-layout">


        {{-- ======================================================
             PROFILE CARD
        ======================================================= --}}
        <div class="profile-card">


            {{-- ==================================================
                 FOTO PROFIL
            =================================================== --}}
            <div class="profile-photo-wrapper">

                @if ($user->profile_photo)

                    <img
                        id="profilePhotoPreview"
                        src="{{ asset('storage/' . $user->profile_photo) }}"
                        alt="Foto Profil"
                        class="profile-photo"
                    >

                @else

                    <div
                        id="profileAvatar"
                        class="profile-avatar"
                    >
                        {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}
                    </div>

                    <img
                        id="profilePhotoPreview"
                        src=""
                        alt="Foto Profil"
                        class="profile-photo"
                        style="display: none;"
                    >

                @endif


                {{-- BUTTON CAMERA --}}
                <label
                    for="profile_photo"
                    class="profile-photo-button"
                    title="Ganti Foto"
                >

                    <svg viewBox="0 0 24 24">

                        <path d="M4 7h4l2-2h4l2 2h4a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"></path>

                        <circle cx="12" cy="13" r="3"></circle>

                    </svg>

                </label>

            </div>


            {{-- INPUT FOTO --}}
            <input
                type="file"
                id="profile_photo"
                name="profile_photo"
                form="accountForm"
                class="profile-photo-input"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
            >


            <div class="profile-photo-hint">
                JPG, PNG, atau WEBP • Maks. 2 MB
            </div>


            @error('profile_photo')

                <div class="photo-error">
                    {{ $message }}
                </div>

            @enderror


            <div class="profile-name">
                {{ $user->name }}
            </div>


            <div class="profile-email">
                {{ $user->email }}
            </div>


            <div class="profile-role">

                <span class="profile-role-dot"></span>

                Super Admin

            </div>


            <div class="profile-info">

                <div class="profile-info-title">
                    Status Akun
                </div>


                <div class="profile-info-text">

                    Akun ini memiliki akses sebagai Super Admin
                    untuk mengelola portal aplikasi rumah sakit.

                </div>

            </div>

        </div>


        {{-- ======================================================
             FORM CARD
        ======================================================= --}}
        <div class="form-card">

            <form
                id="accountForm"
                action="{{ route('superadmin.account.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- ==================================================
                     INFORMASI AKUN
                =================================================== --}}
                <div class="form-section">

                    <div class="form-section-title">
                        Informasi Akun
                    </div>


                    <div class="form-section-description">

                        Perbarui nama, email, dan foto profil
                        yang digunakan untuk akun Super Admin.

                    </div>


                    <div class="form-grid">


                        {{-- NAMA --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="name"
                            >
                                Nama <span>*</span>
                            </label>


                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-input"
                                value="{{ old('name', $user->name) }}"
                                placeholder="Masukkan nama"
                                required
                            >


                            @error('name')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="email"
                            >
                                Email <span>*</span>
                            </label>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                value="{{ old('email', $user->email) }}"
                                placeholder="Masukkan email"
                                required
                            >


                            @error('email')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- ROLE --}}
                        <div class="form-group full">

                            <label class="form-label">
                                Role
                            </label>


                            <div class="form-display">
                                Super Admin
                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     PASSWORD
                =================================================== --}}
                <div class="form-section">

                    <div class="form-section-title">
                        Ubah Password
                    </div>


                    <div class="form-section-description">

                        Kosongkan bagian ini jika tidak ingin
                        mengganti password.

                    </div>


                    <div class="form-grid">


                        {{-- PASSWORD SAAT INI --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="current_password"
                            >
                                Password Saat Ini
                            </label>


                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                class="form-input"
                                placeholder="Masukkan password saat ini"
                                autocomplete="current-password"
                            >


                            @error('current_password')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- PASSWORD BARU --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="new_password"
                            >
                                Password Baru
                            </label>


                            <input
                                type="password"
                                id="new_password"
                                name="new_password"
                                class="form-input"
                                placeholder="Minimal 8 karakter"
                                autocomplete="new-password"
                            >


                            @error('new_password')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="form-group full">

                            <label
                                class="form-label"
                                for="new_password_confirmation"
                            >
                                Konfirmasi Password Baru
                            </label>


                            <input
                                type="password"
                                id="new_password_confirmation"
                                name="new_password_confirmation"
                                class="form-input"
                                placeholder="Ulangi password baru"
                                autocomplete="new-password"
                            >


                            <div class="password-note">

                                Password baru minimal 8 karakter
                                dan harus dikonfirmasi ulang.

                            </div>


                            @error('new_password_confirmation')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     ACTION
                =================================================== --}}
                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ==============================================================
     PREVIEW FOTO SEBELUM DISIMPAN
=============================================================== --}}
<script>

    document.addEventListener('DOMContentLoaded', function () {

        const photoInput = document.getElementById('profile_photo');
        const photoPreview = document.getElementById('profilePhotoPreview');
        const profileAvatar = document.getElementById('profileAvatar');

        if (!photoInput) {
            return;
        }

        photoInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');
                photoInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB.');
                photoInput.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {

                if (profileAvatar) {
                    profileAvatar.style.display = 'none';
                }

                photoPreview.src = e.target.result;
                photoPreview.style.display = 'block';
            };

            reader.readAsDataURL(file);

        });

    });

</script>

@endsection
