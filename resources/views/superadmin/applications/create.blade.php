<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Aplikasi Portal</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;

            background: #f4f6f8;

            color: #111827;

            min-height: 100vh;
        }


        /* =====================================================
           HALAMAN
        ===================================================== */

        .page {
            width: 100%;

            min-height: 100vh;

            padding: 1px 20px 40px;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            width: 742px;

            max-width: 100%;

            margin: 0 auto;

            padding-top: 47px;

            text-align: center;

            position: relative;
        }


        .header h1 {
            font-size: 30px;

            line-height: 1.15;

            font-weight: 900;

            color: #050505;

            text-shadow: 1px 1px 0 #777;
        }


        .header p {
            margin-top: 7px;

            font-size: 16px;

            color: #172033;
        }


        /* =====================================================
           TOMBOL KEMBALI
        ===================================================== */

        .back-button {
            position: absolute;

            right: 0;

            top: 187px;

            width: 157px;

            height: 28px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 17px;

            border: 2px solid #111827;

            border-radius: 18px;

            background: #087f60;

            color: white;

            text-decoration: none;

            font-size: 12px;

            font-weight: 900;

            transition: 0.2s;
        }


        .back-button:hover {
            background: #066c52;

            transform: translateY(-1px);
        }


        .back-arrow {
            font-size: 27px;

            font-weight: 900;

            line-height: 20px;
        }


        /* =====================================================
           FORM CONTAINER
        ===================================================== */

        .form-wrapper {
            width: 742px;

            max-width: 100%;

            margin: 104px auto 0;

            background: white;

            border: 2px solid #111111;

            border-radius: 8px;

            overflow: hidden;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-content {
            padding: 10px 108px 23px;
        }


        .form-group {
            margin-bottom: 16px;
        }


        .form-label {
            display: block;

            margin-bottom: 2px;

            font-size: 13px;

            font-weight: 900;

            color: #111111;
        }


        .form-control {
            width: 100%;

            height: 30px;

            padding: 4px 9px;

            border: 1px solid #111111;

            border-radius: 9px;

            background: white;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 12px;

            color: #111111;

            outline: none;
        }


        .form-control:focus {
            border-color: #087f60;

            box-shadow: 0 0 0 2px rgba(8, 127, 96, 0.12);
        }


        textarea.form-control {
            height: 97px;

            padding: 7px 9px;

            resize: vertical;
        }


        .form-help {
            margin-top: 2px;

            padding-left: 7px;

            font-size: 11px;

            color: #172033;

            line-height: 1.3;
        }


        .error {
            margin-top: 4px;

            color: #dc2626;

            font-size: 11px;

            font-weight: bold;
        }


        /* =====================================================
           UPLOAD LOGO
        ===================================================== */

        .upload-box {
            position: relative;

            width: 100%;

            height: 84px;

            border: 1px dashed #111111;

            border-radius: 8px;

            background: white;

            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;

            cursor: pointer;

            overflow: hidden;
        }


        .upload-box:hover {
            background: #f7fbf9;

            border-color: #087f60;
        }


        .upload-input {
            position: absolute;

            inset: 0;

            width: 100%;

            height: 100%;

            opacity: 0;

            cursor: pointer;
        }


        .upload-content {
            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            pointer-events: none;
        }


        .upload-icon {
            width: 31px;

            height: 25px;

            color: #4b5563;

            margin-bottom: 1px;
        }


        .upload-icon svg {
            width: 100%;

            height: 100%;
        }


        .upload-title {
            font-size: 12px;

            line-height: 1.1;

            font-weight: 900;
        }


        .upload-format {
            margin-top: 2px;

            font-size: 11px;

            color: #172033;
        }


        /* =====================================================
           PREVIEW LOGO
        ===================================================== */

        .logo-preview {
            display: none;

            width: 100%;

            height: 100%;

            align-items: center;

            justify-content: center;

            flex-direction: column;
        }


        .logo-preview img {
            max-width: 100px;

            max-height: 55px;

            object-fit: contain;
        }


        .logo-preview-name {
            margin-top: 3px;

            font-size: 10px;

            color: #475569;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status-box {
            width: 100%;

            height: 47px;

            border: 1px solid #111111;

            border-radius: 9px;

            display: flex;

            align-items: center;

            padding: 0 9px;
        }


        .status-label {
            width: 100%;

            display: flex;

            align-items: center;

            gap: 10px;

            cursor: pointer;
        }


        /* =====================================================
           TOGGLE
        ===================================================== */

        .toggle {
            position: relative;

            flex-shrink: 0;

            width: 42px;

            height: 21px;
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

            width: 17px;

            height: 17px;

            left: 2px;

            top: 2px;

            border-radius: 50%;

            background: white;

            transition: 0.2s;

            box-shadow: 0 1px 2px rgba(0,0,0,0.25);
        }


        .toggle input:checked + .toggle-slider {
            background: #00c878;
        }


        .toggle input:checked + .toggle-slider::before {
            transform: translateX(21px);
        }


        .status-text {
            display: flex;

            flex-direction: column;
        }


        .status-title {
            font-size: 12px;

            font-weight: 900;
        }


        .status-description {
            margin-top: 2px;

            font-size: 11px;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .form-footer {
            min-height: 78px;

            border-top: 1px solid #111111;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 20px;

            padding: 0 44px;
        }


        .button {
            height: 28px;

            min-width: 125px;

            padding: 0 18px;

            border-radius: 17px;

            border: 2px solid #111827;

            font-size: 12px;

            font-weight: 900;

            cursor: pointer;

            text-decoration: none;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .button-cancel {
            background: #ff3b43;

            color: #111111;
        }


        .button-cancel:hover {
            background: #ed252e;
        }


        .button-save {
            background: #087f60;

            color: white;
        }


        .button-save:hover {
            background: #066c52;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 650px) {

            .page {
                padding-left: 12px;

                padding-right: 12px;
            }


            .header {
                padding-top: 30px;
            }


            .header h1 {
                font-size: 24px;
            }


            .header p {
                font-size: 14px;
            }


            .back-button {
                position: relative;

                top: auto;

                right: auto;

                margin: 25px 0 0 auto;
            }


            .form-wrapper {
                margin-top: 30px;
            }


            .form-content {
                padding: 20px 25px;
            }


            .form-footer {
                padding: 18px 20px;

                gap: 10px;
            }


            .button {
                min-width: 105px;
            }

        }


    </style>

</head>


<body>


<div class="page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="header">

        <h1>
            TAMBAH APLIKASI PORTAL
        </h1>

        <p>
            Tambahkan aplikasi baru ke Portal Aplikasi Rumah Sakit.
        </p>


        <a
            href="{{ route('superadmin.applications.index') }}"
            class="back-button"
        >

            <span class="back-arrow">
                ←
            </span>

            <span>
                Kembali
            </span>

        </a>

    </div>



    {{-- =====================================================
         FORM WRAPPER
    ====================================================== --}}

    <div class="form-wrapper">


        <form
            id="addApplicationForm"
            action="{{ route('superadmin.applications.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-content">


                {{-- NAMA APLIKASI --}}

                <div class="form-group">

                    <label
                        for="name"
                        class="form-label"
                    >
                        NAMA APLIKASI
                    </label>


                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >


                    <div class="form-help">
                        Masukan nama aplikasi yang akan di tampilkan di portal
                    </div>


                    @error('name')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- URL --}}

                <div class="form-group">

                    <label
                        for="url"
                        class="form-label"
                    >
                        URL APLIKASI
                    </label>


                    <input
                        type="url"
                        id="url"
                        name="url"
                        class="form-control"
                        value="{{ old('url') }}"
                        required
                    >


                    <div class="form-help">
                        Masukan alamat lengkap aplikasi, termasuk http:// atau https://.
                    </div>


                    @error('url')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- DESKRIPSI --}}

                <div class="form-group">

                    <label
                        for="description"
                        class="form-label"
                    >
                        DESKRIPSI APLIKASI
                    </label>


                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        required
                    >{{ old('description') }}</textarea>


                    <div class="form-help">
                        Jelaskan secara singkat fungsi aplikasi
                    </div>


                    @error('description')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- LOGO --}}

                <div class="form-group">

                    <label class="form-label">
                        LOGO APLIKASI
                    </label>


                    <label
                        class="upload-box"
                        for="icon"
                    >

                        <input
                            type="file"
                            id="icon"
                            name="icon"
                            class="upload-input"
                            accept=".jpg,.jpeg,.png,.webp,.svg"
                        >


                        <div
                            class="upload-content"
                            id="uploadContent"
                        >

                            <div class="upload-icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >

                                    <path
                                        d="M12 16V4"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                    />

                                    <path
                                        d="M7.5 8.5L12 4L16.5 8.5"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />

                                    <path
                                        d="M5 16.5V18C5 19.1046 5.89543 20 7 20H17C18.1046 20 19 19.1046 19 18V16.5"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                    />

                                </svg>

                            </div>


                            <div class="upload-title">

                                KLIK UNTUK
                                <br>
                                UPLOAD LOGO

                            </div>


                            <div class="upload-format">

                                Format: JPG, JPEG, PNG, WEBP, atau SVG.
                                Maksimal 2 MB.

                            </div>

                        </div>


                        <div
                            class="logo-preview"
                            id="logoPreview"
                        >

                            <img
                                id="previewImage"
                                src=""
                                alt="Preview Logo"
                            >


                            <div
                                class="logo-preview-name"
                                id="previewName"
                            ></div>

                        </div>

                    </label>


                    @error('icon')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- STATUS --}}

                <div class="form-group">

                    <label class="form-label">
                        STATUS APLIKASI
                    </label>


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


                            <span class="status-text">

                                <span class="status-title">
                                    Aplikasi Aktif
                                </span>

                                <span class="status-description">
                                    Aplikasi akan langsung ditampilkan kepada user
                                </span>

                            </span>


                        </label>

                    </div>

                </div>


            </div>



            {{-- =================================================
                 FOOTER BUTTON
            ================================================== --}}

            <div class="form-footer">


                <a
                    href="{{ route('superadmin.applications.index') }}"
                    class="button button-cancel"
                >
                    Batal
                </a>


                <button
                    type="submit"
                    class="button button-save"
                >
                    Simpan Aplikasi
                </button>


            </div>


        </form>


    </div>

</div>



<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const fileInput =
            document.getElementById('icon');

        const uploadContent =
            document.getElementById('uploadContent');

        const logoPreview =
            document.getElementById('logoPreview');

        const previewImage =
            document.getElementById('previewImage');

        const previewName =
            document.getElementById('previewName');


        fileInput.addEventListener(
            'change',
            function () {

                const file = this.files[0];


                if (!file) {

                    uploadContent.style.display =
                        'flex';

                    logoPreview.style.display =
                        'none';

                    return;
                }


                const reader =
                    new FileReader();


                reader.onload =
                    function (event) {

                        previewImage.src =
                            event.target.result;

                        previewName.textContent =
                            file.name;

                        uploadContent.style.display =
                            'none';

                        logoPreview.style.display =
                            'flex';

                    };


                reader.readAsDataURL(file);

            }
        );

    }
);

</script>


</body>

</html>
