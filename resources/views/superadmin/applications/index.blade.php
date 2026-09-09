@extends('layouts.superadmin')

@section('title', 'Kelola Aplikasi - Super Admin')

@push('styles')
<!-- Import Font Plus Jakarta Sans agar tipografi 100% mirip target -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    * {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* LATAR BELAKANG CONTAINER */
    .page-wrapper {
        min-height: 100vh;
        width: 100%;
        padding: 40px 30px;
        box-sizing: border-box;
    }

    .page-inner {
        max-width: 980px;
        margin: 0 auto;
    }

    /* HEADER */
    .page-header {
        text-align: center;
        margin-bottom: 25px;
        margin-top: 5px;
    }

    .page-header h1 {
        font-size: 40px;
        line-height: 1.2;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 6px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .page-header p {
        font-size: 14px;
        color: #f1f5f9;
        font-weight: 400;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    /* TABEL KARTU (BORDER BIRU SUDAH DIHAPUS TOTAL) */
    .table-card {
        background: #ffffff;
        border-radius: 20px;
        border: none; /* Tanpa border biru */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 20px;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #ffffff;
    }

    th {
        height: 50px;
        padding: 12px 24px;
        background: #ffffff;
        color: #94a3b8;
        font-size: 14px;
        font-weight: 500;
        text-align: left;
        border-bottom: 1.5px solid #e2e8f0;
    }

    th.text-center, td.text-center {
        text-align: center;
    }

    td {
        height: 60px;
        padding: 10px 24px;
        font-size: 14px;
        text-align: left;
        border-bottom: 1.5px solid #e2e8f0;
        color: #0f172a;
        vertical-align: middle;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    /* LOGO KOTAK MEMBULAT */
    .logo-cell {
        width: 70px;
    }

    .application-logo {
        width: 44px;
        height: 44px;
        object-fit: cover;
        border-radius: 12px;
    }

    .no-logo {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #cbd5e1;
    }

    .application-name {
        font-size: 14px;
        font-weight: 700;
        color: #000000;
    }

    .application-url {
        color: #64748b;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
    }

    /* BENTUK KOTAK TOMBOL EDIT & HAPUS PERSIS TARGET */
    .action-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .btn-action-edit {
        padding: 5px 14px;
        border-radius: 8px; /* Sudut membulat sedang */
        background: linear-gradient(180deg, #ffffff 0%, #f1f5f9 100%);
        border: 1px solid #cbd5e1;
        color: #334155;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        display: inline-block;
    }

    .btn-action-delete {
        padding: 5px 14px;
        border-radius: 8px; /* Sudut membulat sedang */
        background: #ef4444;
        border: none;
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    /* TOMBOL TAMBAH APLIKASI */
    .bottom-toolbar {
        display: flex;
        justify-content: flex-end;
    }

    .add-button {
        height: 38px;
        padding: 0 20px;
        border-radius: 20px;
        background: #ffffff;
        border: none;
        color: #0f172a;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@section('content')

<div class="page-wrapper" style="background: linear-gradient(rgba(105, 140, 120, 0.75), rgba(105, 140, 120, 0.75)), url('{{ asset('images/rs.jpeg') }}') center/cover no-repeat;">
    <div class="page-inner">
        
        <!-- HEADER -->
        <div class="page-header">
            <h1>Kelola Aplikasi</h1>
            <p>Kelola aplikasi yang tersedia di Portal Rumah Sakit.</p>
        </div>

        <!-- TABEL KARTU -->
        <div class="table-card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th class="logo-cell">Logo</th>
                            <th>Nama Aplikasi</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td class="logo-cell">
                                    @if ($application->icon)
                                        <img src="{{ asset('storage/' . $application->icon) }}" class="application-logo">
                                    @else
                                        <div class="no-logo"></div>
                                    @endif
                                </td>
                                <td>
                                    <div class="application-name">{{ $application->name }}</div>
                                </td>
                                <td>
                                    <a href="{{ $application->url }}" target="_blank" class="application-url">
                                        {{ $application->url }}
                                    </a>
                                </td>
                                <td></td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="{{ route('superadmin.applications.edit', $application) }}" class="btn-action-edit">Edit</a>
                                        <form action="{{ route('superadmin.applications.destroy', $application) }}" method="POST" onsubmit="return confirm('Hapus aplikasi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-delete">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TOMBOL TAMBAH APLIKASI -->
        <div class="bottom-toolbar">
            <a href="{{ route('superadmin.applications.create') }}" class="add-button">
                + Tambah Aplikasi
            </a>
        </div>

    </div>
</div>

@endsection