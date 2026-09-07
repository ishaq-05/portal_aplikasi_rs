@extends('layouts.superadmin')

@section('title', 'Kelola Aplikasi - Super Admin')

@push('styles')

<style>

    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .page-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .page-header h1 {
        font-size: 32px;
        line-height: 1.15;
        font-weight: 800;
        color: #111827;
        margin-bottom: 7px;
    }

    .page-header p {
        font-size: 15px;
        color: #5f7695;
    }


    /* =====================================================
       TOOLBAR
    ===================================================== */

    .toolbar {
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 12px;
    }


    /* =====================================================
       SEARCH BOX
    ===================================================== */

    .search-box {
        width: 390px;
        position: relative;
    }


    .search-box input {
        width: 100%;
        height: 42px;

        border: 2px solid #222;
        border-radius: 22px;

        padding: 0 45px 0 45px;

        font-size: 14px;

        outline: none;

        background: #ffffff;

        transition: .2s ease;
    }


    .search-box input:focus {
        border-color: #087f60;

        box-shadow:
            0 0 0 3px rgba(8, 127, 96, .08);
    }


    .search-icon {
        position: absolute;

        left: 15px;
        top: 50%;

        transform: translateY(-50%);

        font-size: 20px;

        pointer-events: none;

        z-index: 2;
    }


    /* =====================================================
       CLEAR SEARCH
    ===================================================== */

    .search-clear {
        position: absolute;

        right: 10px;
        top: 50%;

        transform: translateY(-50%);

        width: 25px;
        height: 25px;

        border: none;
        border-radius: 50%;

        background: #eeeeee;

        color: #555;

        font-size: 17px;

        display: none;

        align-items: center;
        justify-content: center;

        cursor: pointer;

        transition: .15s ease;
    }


    .search-clear:hover {
        background: #dcdcdc;
        color: #111;
    }


    /* =====================================================
       ADD BUTTON
    ===================================================== */

    .add-button {
        height: 43px;

        padding: 0 18px;

        border-radius: 9px;

        background: #087f60;

        border: 1px solid #005f48;

        color: #ffffff;

        text-decoration: none;

        font-size: 13px;

        font-weight: bold;

        display: flex;

        align-items: center;

        gap: 10px;

        white-space: nowrap;

        transition: .2s ease;
    }


    .add-button:hover {
        background: #066b51;
        color: #ffffff;
    }


    .plus-icon {
        width: 28px;
        height: 28px;

        border-radius: 50%;

        background: #ffffff;

        color: #087f60;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 22px;

        font-weight: bold;
    }


    /* =====================================================
       SEARCH RESULT INFO
    ===================================================== */

    .search-result {
        display: none;

        margin-bottom: 12px;

        padding: 10px 14px;

        border-radius: 7px;

        background: #effaf6;

        border: 1px solid #cceee2;

        color: #087f60;

        font-size: 13px;
    }


    .search-result strong {
        font-weight: 700;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .table-container {
        width: 100%;

        overflow-x: auto;
    }


    table {
        width: 100%;

        border-collapse: collapse;

        background: #ffffff;

        border: 1px solid #222;
    }


    th {
        height: 58px;

        padding: 10px 14px;

        background: #087f60;

        color: #ffffff;

        font-size: 15px;

        font-weight: bold;

        text-align: center;

        border: 1px solid #222;
    }


    td {
        height: 58px;

        padding: 8px 14px;

        font-size: 14px;

        text-align: center;

        border: 1px solid #222;

        color: #111827;
    }


    tbody tr {
        transition: .15s ease;
    }


    tbody tr:hover {
        background: #f3faf7;
    }


    tbody tr.search-hidden {
        display: none;
    }


    /* =====================================================
       LOGO
    ===================================================== */

    .logo-cell {
        width: 155px;
    }


    .application-logo {
        width: 80px;
        height: 48px;

        object-fit: contain;

        display: block;

        margin: auto;

        border: 1px solid #aeb5bd;

        border-radius: 8px;

        background: #ffffff;
    }


    .no-logo {
        width: 80px;
        height: 48px;

        margin: auto;

        display: flex;

        align-items: center;
        justify-content: center;

        background: #eef7f4;

        border: 1px solid #aeb5bd;

        border-radius: 8px;

        color: #087f60;

        font-weight: bold;
    }


    /* =====================================================
       APPLICATION NAME
    ===================================================== */

    .application-name {
        font-size: 15px;
        font-weight: 600;
    }


    /* =====================================================
       URL
    ===================================================== */

    .application-url {
        max-width: 520px;

        margin: auto;

        overflow: hidden;

        white-space: nowrap;

        text-overflow: ellipsis;

        color: #075985;
    }


    /* =====================================================
       STATUS
    ===================================================== */

    .status {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-width: 68px;

        padding: 7px 13px;

        border-radius: 20px;

        font-size: 12px;

        font-weight: bold;
    }


    .status-active {
        background: #d9f7e6;

        color: #087f60;
    }


    .status-inactive {
        background: #fee2e2;

        color: #b91c1c;
    }


    /* =====================================================
       ACTION
    ===================================================== */

    .action-wrapper {
        display: flex;

        align-items: center;
        justify-content: center;

        gap: 12px;
    }


    .action-button {
        width: 42px;
        height: 42px;

        border-radius: 9px;

        display: flex;

        align-items: center;
        justify-content: center;

        text-decoration: none;

        font-size: 21px;

        cursor: pointer;

        transition: .15s ease;
    }


    .edit-button {
        background: #62c3ae;

        border: 1px solid #111827;

        color: #111827;
    }


    .edit-button:hover {
        background: #45b39b;

        color: #111827;
    }


    .delete-button {
        background: #ff6972;

        border: 1px solid #111827;

        color: #111827;
    }


    .delete-button:hover {
        background: #f14d58;
    }


    .delete-button button {
        border: none;

        background: transparent;

        width: 100%;
        height: 100%;

        cursor: pointer;

        font-size: 20px;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .table-footer {
        margin-top: 10px;

        color: #5f7695;

        font-size: 14px;
    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .empty {
        padding: 50px 20px;

        text-align: center;

        color: #64748b;

        background: #ffffff;

        border: 1px solid #d7dce2;

        border-radius: 10px;
    }


    .empty h3 {
        margin-bottom: 8px;

        color: #334155;

        font-size: 18px;
    }


    .empty p {
        font-size: 14px;
    }


    /* =====================================================
       SEARCH EMPTY
    ===================================================== */

    .search-empty {
        display: none;

        padding: 50px 20px;

        text-align: center;

        background: #ffffff;

        border: 1px solid #d7dce2;

        border-radius: 10px;
    }


    .search-empty-icon {
        font-size: 42px;

        margin-bottom: 10px;
    }


    .search-empty h3 {
        margin-bottom: 7px;

        color: #334155;

        font-size: 18px;
    }


    .search-empty p {
        color: #64748b;

        font-size: 13px;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .toolbar {
            gap: 12px;
        }


        .search-box {
            width: 100%;
        }

    }


    @media (max-width: 700px) {

        .toolbar {
            flex-direction: column;

            align-items: stretch;
        }


        .add-button {
            justify-content: center;
        }


        .page-header h1 {
            font-size: 27px;
        }


        .search-box {
            width: 100%;
        }

    }

</style>

@endpush


@section('content')

<div>

    

    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="page-header">

        <h1>
            KELOLA APLIKASI PORTAL
            <br>
            SUPER ADMIN
        </h1>

        <p>
            Kelola aplikasi yang tersedia di Portal Rumah Sakit.
        </p>

    </div>


    {{-- =====================================================
         TOOLBAR
    ====================================================== --}}

    <div class="toolbar">

        {{-- SEARCH --}}

        <form
            action="{{ route('superadmin.applications.index') }}"
            method="GET"
            class="search-box"
            id="searchForm"
        >

            <span class="search-icon">
                🔍
            </span>


            <input
                type="text"
                name="search"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Cari nama aplikasi, URL, atau status..."
                autocomplete="off"
            >


            <button
                type="button"
                id="searchClear"
                class="search-clear"
                title="Hapus pencarian"
                aria-label="Hapus pencarian"
            >
                ×
            </button>

        </form>


        {{-- TAMBAH APLIKASI --}}

        <a
            href="{{ route('superadmin.applications.create') }}"
            class="add-button"
        >

            <span class="plus-icon">
                +
            </span>

            TAMBAH APLIKASI

        </a>

    </div>


    {{-- =====================================================
         SEARCH RESULT
    ====================================================== --}}

    <div
        class="search-result"
        id="searchResult"
    ></div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    @if ($applications->count() > 0)

        <div
            class="table-container"
            id="tableContainer"
        >

            <table>

                <thead>

                    <tr>

                        <th style="width: 80px;">
                            No
                        </th>

                        <th class="logo-cell">
                            Logo
                        </th>

                        <th>
                            Nama Aplikasi
                        </th>

                        <th>
                            URL
                        </th>

                        <th style="width: 140px;">
                            Status
                        </th>

                        <th style="width: 230px;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody id="applicationsTableBody">

                    @foreach ($applications as $index => $application)

                        <tr
                            class="application-row"
                            data-name="{{ strtolower($application->name) }}"
                            data-url="{{ strtolower($application->url) }}"
                            data-status="{{ $application->is_active ? 'aktif' : 'nonaktif' }}"
                        >

                            {{-- NOMOR --}}

                            <td class="row-number">
                                {{ $index + 1 }}
                            </td>


                            {{-- LOGO --}}

                            <td>

                                @if ($application->icon)

                                    <img
                                        src="{{ asset('storage/' . $application->icon) }}"
                                        alt="{{ $application->name }}"
                                        class="application-logo"
                                    >

                                @else

                                    <div class="no-logo">

                                        {{
                                            strtoupper(
                                                substr(
                                                    $application->name,
                                                    0,
                                                    1
                                                )
                                            )
                                        }}

                                    </div>

                                @endif

                            </td>


                            {{-- NAMA --}}

                            <td>

                                <div class="application-name">
                                    {{ $application->name }}
                                </div>

                            </td>


                            {{-- URL --}}

                            <td>

                                <div
                                    class="application-url"
                                    title="{{ $application->url }}"
                                >
                                    {{ $application->url }}
                                </div>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if ($application->is_active)

                                    <span class="status status-active">
                                        Aktif
                                    </span>

                                @else

                                    <span class="status status-inactive">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <div class="action-wrapper">

                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('superadmin.applications.edit', $application) }}"
                                        class="action-button edit-button"
                                        title="Edit aplikasi"
                                    >
                                        ✎
                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('superadmin.applications.destroy', $application) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus aplikasi {{ $application->name }}?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-button delete-button"
                                            title="Hapus aplikasi"
                                        >
                                            🗑
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        {{-- =====================================================
             SEARCH EMPTY
        ====================================================== --}}

        <div
            class="search-empty"
            id="searchEmpty"
        >

            <div class="search-empty-icon">
                🔍
            </div>

            <h3>
                Aplikasi Tidak Ditemukan
            </h3>

            <p>
                Tidak ada aplikasi yang sesuai dengan pencarian.
            </p>

        </div>


        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <div class="table-footer">

            Menampilkan

            <strong id="visibleCount">
                {{ $applications->count() }}
            </strong>

            aplikasi

        </div>


    @else

        <div class="empty">

            <h3>
                Belum ada aplikasi
            </h3>

            <p>
                Silakan tambahkan aplikasi baru ke portal.
            </p>

        </div>

    @endif

</div>


@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('searchInput');

    const searchClear =
        document.getElementById('searchClear');

    const searchResult =
        document.getElementById('searchResult');

    const searchEmpty =
        document.getElementById('searchEmpty');

    const visibleCount =
        document.getElementById('visibleCount');

    const rows =
        Array.from(
            document.querySelectorAll('.application-row')
        );


    /*
    |--------------------------------------------------------------------------
    | FUNGSI SEARCH
    |--------------------------------------------------------------------------
    */

    function performSearch() {

        if (!searchInput) {
            return;
        }


        const keyword =
            searchInput.value
                .toLowerCase()
                .trim();


        let visibleRows = 0;


        /*
        |--------------------------------------------------------------------------
        | TOMBOL CLEAR
        |--------------------------------------------------------------------------
        */

        if (keyword.length > 0) {

            searchClear.style.display = 'flex';

        } else {

            searchClear.style.display = 'none';

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER DATA
        |--------------------------------------------------------------------------
        */

        rows.forEach(function (row) {

            const name =
                row.dataset.name || '';

            const url =
                row.dataset.url || '';

            const status =
                row.dataset.status || '';


            const matched =
                name.includes(keyword) ||
                url.includes(keyword) ||
                status.includes(keyword);


            if (matched) {

                row.classList.remove('search-hidden');

                visibleRows++;

            } else {

                row.classList.add('search-hidden');

            }

        });


        /*
        |--------------------------------------------------------------------------
        | NOMOR URUT DINAMIS
        |--------------------------------------------------------------------------
        */

        let number = 1;

        rows.forEach(function (row) {

            if (!row.classList.contains('search-hidden')) {

                const numberCell =
                    row.querySelector('.row-number');

                if (numberCell) {

                    numberCell.textContent = number;

                    number++;

                }

            }

        });


        /*
        |--------------------------------------------------------------------------
        | HASIL PENCARIAN
        |--------------------------------------------------------------------------
        */

        if (keyword !== '') {

            searchResult.style.display = 'block';

            searchResult.innerHTML =
                '🔎 Ditemukan <strong>' +
                visibleRows +
                '</strong> aplikasi untuk pencarian ' +
                '<strong>"' +
                escapeHtml(keyword) +
                '"</strong>.';

        } else {

            searchResult.style.display = 'none';

            searchResult.innerHTML = '';

        }


        /*
        |--------------------------------------------------------------------------
        | EMPTY SEARCH
        |--------------------------------------------------------------------------
        */

        if (
            keyword !== '' &&
            visibleRows === 0
        ) {

            searchEmpty.style.display = 'block';

        } else {

            searchEmpty.style.display = 'none';

        }


        /*
        |--------------------------------------------------------------------------
        | JUMLAH DATA
        |--------------------------------------------------------------------------
        */

        if (visibleCount) {

            visibleCount.textContent =
                visibleRows;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(text) {

        const element =
            document.createElement('div');

        element.textContent = text;

        return element.innerHTML;

    }


    /*
    |--------------------------------------------------------------------------
    | KETIKA MENGETIK
    |--------------------------------------------------------------------------
    */

    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                performSearch();

            }
        );


        /*
        |--------------------------------------------------------------------------
        | ENTER
        |--------------------------------------------------------------------------
        */

        searchInput.addEventListener(
            'keydown',
            function (event) {

                if (event.key === 'Enter') {

                    event.preventDefault();

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLEAR SEARCH
    |--------------------------------------------------------------------------
    */

    if (searchClear) {

        searchClear.addEventListener(
            'click',
            function () {

                searchInput.value = '';

                performSearch();

                searchInput.focus();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | JALANKAN SAAT HALAMAN DIBUKA
    |--------------------------------------------------------------------------
    */

    performSearch();

});

</script>

@endpush
