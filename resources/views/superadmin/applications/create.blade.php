@extends('layouts.superadmin')

@section('title', 'Tambah Aplikasi Portal')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    .portal-container {
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
        padding: 40px 20px 60px;
        /* Gradasi Hijau Overlay di atas Foto Background */
        background-image: linear-gradient(135deg, rgba(46, 78, 63, 0.75), rgba(91, 130, 96, 0.75)), url('/images/rs.jpeg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
    }

    .portal-header {
        width: 800px;
        max-width: 100%;
        margin: 0 auto;
        text-align: center;
    }

    .portal-header h1 {
        font-size: 38px;
        line-height: 1.2;
        font-weight: 700;
        color: #ffffff;
        text-shadow: none;
        letter-spacing: -0.5px;
    }

    .portal-header p {
        margin-top: 6px;
        font-size: 15px;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 400;
    }

    .form-wrapper {
        width: 820px;
        max-width: 100%;
        margin: 28px auto 0;
        background: white;
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .form-content {
        padding: 40px 45px 20px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 15px;
        font-weight: 600;
        color: #1f2937;
    }

    .form-control {
        width: 100%;
        height: 48px;
        padding: 10px 16px;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        background: #ffffff;
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #111827;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
        border-color: #0d8a72;
        box-shadow: 0 0 0 3px rgba(13, 138, 114, 0.15);
    }

    textarea.form-control {
        height: 100px;
        padding: 12px 16px;
        resize: vertical;
    }

    .form-help {
        margin-top: 6px;
        padding-left: 2px;
        font-size: 11px;
        color: #9ca3af;
        line-height: 1.3;
    }

    .error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
        font-weight: 500;
    }

    /* Upload File Input */
    .file-input-wrapper {
        width: 100%;
        height: 48px;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        background: #ffffff;
        display: flex;
        align-items: center;
        padding: 0 12px;
        position: relative;
    }

    .upload-box {
        width: 100%;
        height: 100%;
        border: none;
        background: transparent;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .upload-input {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
    }

    .custom-file-btn {
        background: #e5e7eb;
        color: #374151;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        margin-right: 12px;
        white-space: nowrap;
    }

    .file-name-text {
        font-size: 12px;
        color: #6b7280;
    }

    .logo-preview {
        display: none;
        align-items: center;
        gap: 10px;
        width: 100%;
    }

    .logo-preview img {
        max-height: 32px;
        object-fit: contain;
    }

    .logo-preview-name {
        font-size: 12px;
        color: #374151;
    }

    /* Status Box */
    .status-box {
        width: 100%;
        height: 48px;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        display: flex;
        align-items: center;
        padding: 0 16px;
        background: #ffffff;
    }

    .status-label {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
    }

    .toggle {
        position: relative;
        flex-shrink: 0;
        width: 44px;
        height: 22px;
    }

    .toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        inset: 0;
        border-radius: 20px;
        background: #d1d5db;
        transition: 0.2s;
    }

    .toggle-slider::before {
        content: "";
        position: absolute;
        width: 18px;
        height: 18px;
        left: 2px;
        top: 2px;
        border-radius: 50%;
        background: white;
        transition: 0.2s;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .toggle input:checked + .toggle-slider {
        background: #0d8a72;
    }

    .toggle input:checked + .toggle-slider::before {
        transform: translateX(22px);
    }

    .status-title {
        font-size: 13px;
        font-weight: 600;
        color: #1f2937;
    }

    /* Footer & Buttons */
    .form-footer {
        padding: 20px 45px 35px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        border-top: 1px solid #e5e7eb;
    }

    .button {
        height: 42px;
        min-width: 100px;
        padding: 0 24px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .button-cancel {
        background: #ffffff;
        color: #374151;
        border: 1px solid #d1d5db;
    }

    .button-cancel:hover {
        background: #f3f4f6;
    }

    .button-save {
        background: #0d8a72;
        color: white;
        border: none;
    }

    .button-save:hover {
        background: #0a735f;
    }

    @media (max-width: 650px) {
        .portal-container {
            padding: 20px 12px 40px;
        }

        .portal-header h1 {
            font-size: 28px;
        }

        .portal-header p {
            font-size: 13px;
        }

        .form-content {
            padding: 25px 20px 15px;
        }

        .form-footer {
            padding: 15px 20px 25px;
        }

        .button {
            height: 38px;
            padding: 0 16px;
            font-size: 13px;
        }
    }
</style>

<div class="portal-container">

    <div class="portal-header">
        <h1>Tambah Aplikasi</h1>
        <p>Tambahkan aplikasi baru ke Portal Aplikasi Rumah Sakit.</p>
    </div>

    <div class="form-wrapper">
        <form
            id="addApplicationForm"
            action="{{ route('superadmin.applications.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-content">

                <div class="form-group">
                    <label for="name" class="form-label">Nama Aplikasi</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url" class="form-label">URL Aplikasi</label>
                    <input
                        type="url"
                        id="url"
                        name="url"
                        class="form-control"
                        value="{{ old('url') }}"
                        required
                    >
                    <div class="form-help">Masukkan alamat lengkap aplikasi, termasuk http:// atau https://.</div>
                    @error('url')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Logo Aplikasi</label>
                    <div class="file-input-wrapper">
                        <label class="upload-box" for="icon">
                            <input
                                type="file"
                                id="icon"
                                name="icon"
                                class="upload-input"
                                accept=".jpg,.jpeg,.png,.webp,.svg"
                            >
                            <div class="upload-content" id="uploadContent" style="display: flex; align-items: center;">
                                <span class="custom-file-btn">Choose File</span>
                                <span class="file-name-text" id="fileNameText">No File Chosen</span>
                            </div>
                            <div class="logo-preview" id="logoPreview">
                                <img id="previewImage" src="" alt="Preview Logo">
                                <div class="logo-preview-name" id="previewName"></div>
                            </div>
                        </label>
                    </div>
                    <div class="form-help">Format: JPG, JPEG, PNG, WEBP, atau SVG. Maksimal 2 MB.</div>
                    @error('icon')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi Aplikasi</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Status Aplikasi</label>
                    <div class="status-box">
                        <label class="status-label">
                            <span class="toggle">
                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}
                                >
                                <span class="toggle-slider"></span>
                            </span>
                            <span class="status-title">Aplikasi Aktif</span>
                        </label>
                    </div>
                </div>

            </div>

            <div class="form-footer">
                <a href="{{ route('superadmin.applications.index') }}" class="button button-cancel">Batal</a>
                <button type="submit" class="button button-save">Simpan Perubahan</button>
            </div>

        </form>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('icon');
        const uploadContent = document.getElementById('uploadContent');
        const logoPreview = document.getElementById('logoPreview');
        const previewImage = document.getElementById('previewImage');
        const previewName = document.getElementById('previewName');

        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) {
                uploadContent.style.display = 'flex';
                logoPreview.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (event) {
                previewImage.src = event.target.result;
                previewName.textContent = file.name;
                uploadContent.style.display = 'none';
                logoPreview.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection