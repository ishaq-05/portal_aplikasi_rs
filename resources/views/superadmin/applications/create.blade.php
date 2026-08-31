<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Aplikasi</title>

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

            font-size: 20px;
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

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.04);
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

            box-shadow:
                0 0 0 3px rgba(15, 118, 110, 0.08);
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

            background: #f9fafb;
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

        @media (max-width: 600px) {

            .navbar {
                padding: 0 20px;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .actions .btn {
                width: 100%;

                text-align: center;
            }
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

            <h2>
                Portal Aplikasi
            </h2>

            <p>
                Super Admin
            </p>

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

        <h1>
            Tambah Aplikasi
        </h1>

        <p>
            Tambahkan aplikasi baru ke Portal Aplikasi Rumah Sakit.
        </p>

    </div>


    <div class="card">


        <form
            action="{{ route('superadmin.applications.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- Nama Aplikasi --}}

            <div class="form-group">

                <label for="name">

                    Nama Aplikasi

                    <span class="required">*</span>

                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: E-Office"
                    required
                >

                @error('name')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- URL --}}

            <div class="form-group">

                <label for="url">

                    URL Aplikasi

                    <span class="required">*</span>

                </label>

                <input
                    type="url"
                    id="url"
                    name="url"
                    value="{{ old('url') }}"
                    placeholder="https://contoh.rumahsakit.com"
                    required
                >

                <div class="help">
                    Masukkan alamat lengkap aplikasi, termasuk http:// atau https://.
                </div>

                @error('url')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- Logo --}}

            <div class="form-group">

                <label for="icon">
                    Logo Aplikasi
                </label>

                <input
                    type="file"
                    id="icon"
                    name="icon"
                    accept=".jpg,.jpeg,.png,.webp,.svg"
                >

                <div class="help">
                    Format: JPG, JPEG, PNG, WEBP, atau SVG. Maksimal 2 MB.
                </div>

                @error('icon')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror


                <div
                    class="preview-container"
                    id="previewContainer"
                >

                    <img
                        id="preview"
                        class="preview"
                        alt="Preview logo"
                    >

                    <span>
                        Preview logo
                    </span>

                </div>

            </div>


            {{-- Status --}}

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
                        checked
                    >

                    <div class="status-text">

                        <strong>
                            Aplikasi Aktif
                        </strong>

                        <span>
                            Aplikasi akan langsung ditampilkan kepada user.
                        </span>

                    </div>

                </div>

            </div>


            {{-- Actions --}}

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
                    Simpan Aplikasi
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
