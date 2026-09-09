@extends('layouts.superadmin')

@section('content')
<style>
    /* Wrapper background gambar dengan overlay hijau */
    .content-bg-wrapper {
        min-height: 100vh;
        width: 100%;
        background: 
            linear-gradient(rgba(115, 157, 120, 0.85), rgba(115, 157, 120, 0.85)), 
            url("{{ asset('images/rs.jpeg') }}") center/cover no-repeat fixed;
        padding: 40px 20px 60px 20px;
        margin: -1.5rem; /* Menutupi padding default dari layout utama jika ada */
    }

    .edit-portal-container {
        width: 100%;
        max-width: 650px;
        margin: 0 auto;
    }

    /* Header dibuat warna putih presisi acuan */
    .edit-portal-header {
        text-align: center;
        margin-bottom: 25px;
        color: #ffffff;
    }

    .edit-portal-header h1 {
        font-size: 36px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 6px;
    }

    .edit-portal-header p {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.9);
    }

    .edit-portal-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 35px 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 15px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        height: 46px;
        padding: 10px 16px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        background-color: #ffffff;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #0b7a69;
    }

    textarea.form-control {
        height: 46px;
        resize: none;
    }

    /* Logo Saat Ini Box */
    .current-logo-box {
        width: 60px;
        height: 50px;
        background-color: #d9d9d9;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .current-logo-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Input File wrapper */
    .file-input-wrapper {
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 6px 12px;
        background-color: #ffffff;
    }

    .file-input-wrapper input[type="file"] {
        font-size: 13px;
        color: #374151;
        width: 100%;
        cursor: pointer;
    }

    .form-help {
        font-size: 11px;
        color: #6b7280;
        margin-top: 6px;
    }

    /* Status Checkbox Box */
    .status-box {
        border: 1px solid #d1d5db;
        border-radius: 10px;
        height: 48px;
        padding: 0 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        background-color: #ffffff;
    }

    .status-box input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #0b7a69;
        cursor: pointer;
    }

    .status-box label {
        font-size: 14px;
        font-weight: 500;
        color: #111827;
        cursor: pointer;
    }

    .divider {
        height: 1px;
        background-color: #e5e7eb;
        margin: 25px 0;
    }

    /* Action Buttons */
    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .btn-portal {
        height: 42px;
        padding: 0 28px;
        border-radius: 9999px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border: 1px solid transparent;
    }

    .btn-cancel {
        background-color: #ffffff;
        color: #111827;
        border-color: #d1d5db;
    }

    .btn-cancel:hover {
        background-color: #f9fafb;
    }

    .btn-save {
        background-color: #0b7a69;
        color: #ffffff;
    }

    .btn-save:hover {
        background-color: #086355;
    }

    .text-error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 4px;
    }
</style>

<div class="content-bg-wrapper">
    <div class="edit-portal-container">
        <div class="edit-portal-header">
            <h1>Edit Aplikasi</h1>
            <p>Ubah informasi aplikasi yang tersedia di portal.</p>
        </div>

        <div class="edit-portal-card">
            <form action="{{ route('superadmin.applications.update', $application) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Aplikasi -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Aplikasi</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-control" 
                        value="{{ old('name', $application->name) }}" 
                        required
                    >
                    @error('name')
                        <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- URL Aplikasi -->
                <div class="form-group">
                    <label for="url" class="form-label">URL Aplikasi</label>
                    <input 
                        type="url" 
                        id="url" 
                        name="url" 
                        class="form-control" 
                        value="{{ old('url', $application->url) }}" 
                        required
                    >
                    @error('url')
                        <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Logo Saat Ini -->
                <div class="form-group">
                    <label class="form-label">Logo Saat Ini</label>
                    <div class="current-logo-box">
                        @if ($application->icon)
                            <img src="{{ asset('storage/' . $application->icon) }}" alt="{{ $application->name }}">
                        @endif
                    </div>
                </div>

                <!-- Ganti Logo -->
                <div class="form-group">
                    <label for="icon" class="form-label">Ganti Logo</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="icon" name="icon" accept=".jpg,.jpeg,.png,.webp,.svg">
                    </div>
                    <div class="form-help">Kosongkan jika tidak ingin mengganti logo. Maksimal 2 MB.</div>
                    @error('icon')
                        <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Edit Deskripsi -->
                <div class="form-group">
                    <label for="description" class="form-label">Edit Deskripsi</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="form-control"
                    >{{ old('description', $application->description) }}</textarea>
                    @error('description')
                        <div class="text-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status Aplikasi -->
                <div class="form-group">
                    <label class="form-label">Status Aplikasi</label>
                    <div class="status-box">
                        <input 
                            type="checkbox" 
                            id="is_active" 
                            name="is_active" 
                            value="1" 
                            {{ old('is_active', $application->is_active) ? 'checked' : '' }}
                        >
                        <label for="is_active">Active</label>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Action Buttons -->
                <div class="form-footer">
                    <a href="{{ route('superadmin.applications.index') }}" class="btn-portal btn-cancel">Batal</a>
                    <button type="submit" class="btn-portal btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection