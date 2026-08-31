<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Aplikasi</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }

        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 40px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #0f766e;
            color: white;

            border-radius: 10px;
        }

        .brand h2 {
            font-size: 18px;
        }

        .brand p {
            font-size: 12px;
            color: #6b7280;
            margin-top: 3px;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 25px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
        }

        input[type="text"],
        input[type="url"],
        input[type="file"] {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
            background: white;
        }

        input:focus {
            border-color: #0f766e;
        }

        .help {
            margin-top: 7px;
            color: #6b7280;
            font-size: 12px;
        }

        .error {
            margin-top: 7px;
            color: #dc2626;
            font-size: 13px;
        }

        .current-logo {
            margin-bottom: 15px;
        }

        .current-logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 5px;
            background: #f9fafb;
        }

        .no-logo {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e6fffb;
            color: #0f766e;
            border-radius: 12px;
            font-size: 25px;
            font-weight: bold;
        }

        .preview-container {
            margin-top: 15px;
            display: none;
            align-items: center;
            gap: 15px;
        }

        .preview-container.show {
            display: flex;
        }

        .preview {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            padding: 5px;
        }

        .status-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .status-box input {
            width: 18px;
            height: 18px;
        }

        .status-text strong {
            display: block;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .status-text span {
            font-size: 12px;
            color: #6b7280;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-primary {
            border: none;
            background: #0f766e;
            color: white;
        }

        .btn-primary:hover {
            background: #115e59;
        }

    </style>

</head>

<body>

<nav class="navbar">

    <div class="brand">

        <div class="brand-icon">
            🏥
        </div>

        <div>

            <h2>Portal Aplikasi</h2>

            <p>Super Admin</p>

        </div>

    </div>


    <a
        href="{{ route('superadmin.applications.index') }}"
        class="btn btn-secondary"
    >
        ← Kembali
    </a>

</nav>


<main class="container">

    <div class="header">

        <h1>Edit Aplikasi</h1>

        <p>
            Ubah informasi aplikasi yang tersedia di portal.
        </p>

    </div>


    <div class="card">

        <form
            action="{{ route('superadmin.applications.update', $application) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="form-group">

                <label for="name">
                    Nama Aplikasi
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $application->name) }}"
                    required
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="url">
                    URL Aplikasi
                    <span class="required">*</span>
                </label>

                <input
                    type="url"
                    id="url"
                    name="url"
                    value="{{ old('url', $application->url) }}"
                    required
                >

                @error('url')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>
                    Logo Saat Ini
                </label>

                <div class="current-logo">

                    @if ($application->icon)

                        <img
                            src="{{ asset('storage/' . $application->icon) }}"
                            alt="{{ $application->name }}"
                        >

                    @else

                        <div class="no-logo">
                            {{ strtoupper(substr($application->name, 0, 1)) }}
                        </div>

                    @endif

                </div>


                <label for="icon">
                    Ganti Logo
                </label>

                <input
                    type="file"
                    id="icon"
                    name="icon"
                    accept=".jpg,.jpeg,.png,.webp,.svg"
                >

                <div class="help">
                    Kosongkan jika tidak ingin mengganti logo.
                    Maksimal 2 MB.
                </div>

                @error('icon')
                    <div class="error">{{ $message }}</div>
                @enderror


                <div
                    class="preview-container"
                    id="previewContainer"
                >

                    <img
                        id="preview"
                        class="preview"
                        alt="Preview logo baru"
                    >

                    <span>
                        Preview logo baru
                    </span>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Status Aplikasi
                </label>

                <div class="status-box">

                    <input
                        type="hidden"
                        name="is_active"
                        value="0"
                    >

                    <input
                        type="checkbox"
                        id="is_active"
                        name="is_active"
                        value="1"
                        {{ $application->is_active ? 'checked' : '' }}
                    >

                    <div class="status-text">

                        <strong>
                            Aplikasi Aktif
                        </strong>

                        <span>
                            Jika aktif, aplikasi akan terlihat oleh user.
                        </span>

                    </div>

                </div>

            </div>


            <div class="actions">

                <a
                    href="{{ route('superadmin.applications.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</main>


<script>

    const iconInput =
        document.getElementById('icon');

    const preview =
        document.getElementById('preview');

    const previewContainer =
        document.getElementById('previewContainer');


    iconInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {

            previewContainer.classList.remove('show');

            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            preview.src =
                event.target.result;

            previewContainer.classList.add('show');

        };

        reader.readAsDataURL(file);

    });

</script>

</body>

</html>
