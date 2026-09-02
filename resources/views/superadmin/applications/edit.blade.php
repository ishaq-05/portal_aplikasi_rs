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


        /* =========================================================
           NAVBAR
        ========================================================= */

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


        /* =========================================================
           CONTAINER
        ========================================================= */

        .container {

            max-width: 850px;

            margin: 40px auto;

            padding: 0 25px;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {

            margin-bottom: 25px;
        }


        .header h1 {

            font-size: 30px;

            margin-bottom: 8px;
        }


        .header p {

            color: #6b7280;

            line-height: 1.6;
        }


        /* =========================================================
           CARD
        ========================================================= */

        .card {

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 15px;

            padding: 30px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.04);
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-group {

            margin-bottom: 24px;
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
        input[type="file"],
        textarea {

            width: 100%;

            padding: 13px 14px;

            border: 1px solid #d1d5db;

            border-radius: 9px;

            font-size: 14px;

            outline: none;

            background: white;

            font-family: Arial, sans-serif;
        }


        input[type="text"]:focus,
        input[type="url"]:focus,
        input[type="file"]:focus,
        textarea:focus {

            border-color: #0f766e;

            box-shadow:
                0 0 0 3px rgba(15, 118, 110, 0.08);
        }


        /* =========================================================
           DESKRIPSI
        ========================================================= */

        textarea {

            min-height: 120px;

            resize: vertical;

            line-height: 1.6;
        }


        .description-counter {

            display: flex;

            justify-content: space-between;

            margin-top: 6px;

            font-size: 12px;

            color: #6b7280;
        }


        /* =========================================================
           HELP
        ========================================================= */

        .help {

            margin-top: 7px;

            color: #6b7280;

            font-size: 12px;

            line-height: 1.5;
        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error {

            margin-top: 7px;

            color: #dc2626;

            font-size: 13px;
        }


        /* =========================================================
           CURRENT LOGO
        ========================================================= */

        .current-logo {

            width: 110px;

            height: 110px;

            margin-bottom: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #f9fafb;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 10px;

            overflow: hidden;
        }


        .current-logo img {

            width: 100%;

            height: 100%;

            object-fit: contain;

            object-position: center;

            display: block;
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


        /* =========================================================
           PREVIEW LOGO BARU
        ========================================================= */

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

            width: 80px;

            height: 80px;

            object-fit: contain;

            object-position: center;

            border-radius: 12px;

            border: 1px solid #e5e7eb;

            padding: 6px;

            background: #f9fafb;
        }


        .preview-text {

            color: #6b7280;

            font-size: 13px;
        }


        /* =========================================================
           STATUS
        ========================================================= */

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

            flex-shrink: 0;
        }


        .status-text strong {

            display: block;

            font-size: 14px;

            margin-bottom: 3px;
        }


        .status-text span {

            font-size: 12px;

            color: #6b7280;

            line-height: 1.5;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

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


        .btn-secondary:hover {

            background: #f9fafb;
        }


        .btn-primary {

            border: none;

            background: #0f766e;

            color: white;
        }


        .btn-primary:hover {

            background: #115e59;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 600px) {

            .navbar {

                padding: 0 20px;
            }


            .container {

                margin-top: 30px;

                padding: 0 15px;
            }


            .card {

                padding: 20px;
            }


            .header h1 {

                font-size: 26px;
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


<!-- =========================================================
     NAVBAR
========================================================= -->

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



<!-- =========================================================
     MAIN
========================================================= -->

<main class="container">


    <div class="header">

        <h1>
            Edit Aplikasi
        </h1>

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



            <!-- =================================================
                 NAMA
            ================================================== -->

            <div class="form-group">

                <label for="name">

                    Nama Aplikasi

                    <span class="required">
                        *
                    </span>

                </label>


                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $application->name) }}"
                    placeholder="Contoh: SIMRS"
                    required
                >


                @error('name')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>



            <!-- =================================================
                 URL
            ================================================== -->

            <div class="form-group">

                <label for="url">

                    URL Aplikasi

                    <span class="required">
                        *
                    </span>

                </label>


                <input
                    type="url"
                    id="url"
                    name="url"
                    value="{{ old('url', $application->url) }}"
                    placeholder="https://contoh.rumahsakit.com"
                    required
                >


                <div class="help">

                    Masukkan alamat lengkap aplikasi,
                    termasuk http:// atau https://.

                </div>


                @error('url')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>



            <!-- =================================================
                 DESKRIPSI
            ================================================== -->

            <div class="form-group">

                <label for="description">

                    Deskripsi Aplikasi

                </label>


                <textarea
                    id="description"
                    name="description"
                    maxlength="1000"
                    placeholder="Contoh: Aplikasi untuk mengelola data dan pelayanan rumah sakit."
                >{{ old('description', $application->description) }}</textarea>


                <div class="description-counter">

                    <span>
                        Jelaskan secara singkat fungsi aplikasi.
                    </span>

                    <span id="descriptionCount">
                        0 / 1000
                    </span>

                </div>


                @error('description')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>



            <!-- =================================================
                 LOGO SAAT INI
            ================================================== -->

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



                <!-- GANTI LOGO -->

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
                    Format JPG, JPEG, PNG, WEBP, atau SVG.
                    Maksimal 2 MB.

                </div>


                @error('icon')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror



                <!-- PREVIEW LOGO BARU -->

                <div
                    class="preview-container"
                    id="previewContainer"
                >

                    <img
                        id="preview"
                        class="preview"
                        alt="Preview logo baru"
                    >


                    <span class="preview-text">

                        Preview logo baru

                    </span>

                </div>

            </div>



            <!-- =================================================
                 STATUS
            ================================================== -->

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



            <!-- =================================================
                 ACTIONS
            ================================================== -->

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



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    /*
    |--------------------------------------------------------------------------
    | Preview Logo Baru
    |--------------------------------------------------------------------------
    */

    const iconInput =
        document.getElementById('icon');


    const preview =
        document.getElementById('preview');


    const previewContainer =
        document.getElementById('previewContainer');


    iconInput.addEventListener(
        'change',
        function () {

            const file = this.files[0];


            if (!file) {

                previewContainer.classList.remove('show');

                return;
            }


            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    preview.src =
                        event.target.result;

                    previewContainer.classList.add('show');

                };


            reader.readAsDataURL(file);

        }
    );



    /*
    |--------------------------------------------------------------------------
    | Counter Deskripsi
    |--------------------------------------------------------------------------
    */

    const description =
        document.getElementById('description');


    const descriptionCount =
        document.getElementById('descriptionCount');


    function updateDescriptionCount() {

        const length =
            description.value.length;


        descriptionCount.textContent =
            length + ' / 1000';

    }


    description.addEventListener(
        'input',
        updateDescriptionCount
    );


    updateDescriptionCount();

</script>


</body>

</html>
