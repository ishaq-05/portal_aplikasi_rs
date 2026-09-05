@extends('layouts.superadmin')


@section('title', 'Kelola Aplikasi - Super Admin')


@push('styles')

<style>

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

        margin-bottom: 12px;
    }


    .search-box {
        width: 390px;

        position: relative;
    }


    .search-box input {
        width: 100%;

        height: 42px;

        border: 2px solid #222;

        border-radius: 22px;

        padding: 0 18px 0 45px;

        font-size: 14px;

        outline: none;
    }


    .search-box input:focus {
        border-color: #087f60;
    }


    .search-icon {
        position: absolute;

        left: 15px;

        top: 50%;

        transform: translateY(-50%);

        font-size: 22px;
    }


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
    }


    .add-button:hover {
        background: #066b51;
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


    tbody tr:hover {
        background: #f3faf7;
    }


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


    .application-name {
        font-size: 15px;
    }


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
    }


    .edit-button {
        background: #62c3ae;

        border: 1px solid #111827;

        color: #111827;
    }


    .edit-button:hover {
        background: #45b39b;
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


    .empty {
        padding: 50px 20px;

        text-align: center;

        color: #64748b;

        background: #ffffff;

        border: 1px solid #d7dce2;

        border-radius: 10px;
    }


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

    }

</style>

@endpush



@section('content')


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



<div class="toolbar">


    <form
        action="{{ route('superadmin.applications.index') }}"
        method="GET"
        class="search-box"
    >

        <span class="search-icon">
            🔍
        </span>

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="search"
        >

    </form>



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



@if ($applications->count() > 0)


<div class="table-container">

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


        <tbody>


            @foreach ($applications as $index => $application)


            <tr>


                <td>
                    {{ $index + 1 }}
                </td>



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



                <td>

                    <div class="application-name">
                        {{ $application->name }}
                    </div>

                </td>



                <td>

                    <div class="application-url">

                        {{ $application->url }}

                    </div>

                </td>



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



                <td>

                    <div class="action-wrapper">


                        <a
                            href="{{ route('superadmin.applications.edit', $application) }}"
                            class="action-button edit-button"
                            title="Edit aplikasi"
                        >
                            ✎
                        </a>



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



<div class="table-footer">

    Menampilkan {{ $applications->count() }} aplikasi

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


@endsection
