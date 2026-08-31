<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Aplikasi</title>

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
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 25px;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 30px;
            margin-bottom: 7px;
        }

        .top p {
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;

            border-radius: 9px;

            text-decoration: none;

            font-weight: bold;
            font-size: 14px;
        }
        .btn-danger {
    background: #dc2626;
    color: white;
    border: 1px solid #dc2626;
    cursor: pointer;
}

.btn-danger:hover {
    background: #b91c1c;
    border-color: #b91c1c;
}

        .btn-primary {
            background: #0f766e;
            color: white;
        }

        .btn-secondary {
            background: white;
            color: #374151;

            border: 1px solid #d1d5db;
        }

        .table-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            overflow: hidden;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;

            background: #f9fafb;

            padding: 15px 18px;

            font-size: 13px;

            color: #6b7280;

            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px 18px;

            border-bottom: 1px solid #f0f0f0;

            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .icon {
            width: 45px;
            height: 45px;

            object-fit: cover;

            border-radius: 10px;

            border: 1px solid #e5e7eb;
        }

        .no-icon {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e6fffb;

            border-radius: 10px;

            color: #0f766e;

            font-weight: bold;
        }

        .status {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;
        }

        .active {
            background: #dcfce7;
            color: #166534;
        }

        .inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .url {
            max-width: 250px;

            overflow: hidden;

            white-space: nowrap;

            text-overflow: ellipsis;

            color: #2563eb;
        }

        .empty {
            padding: 50px;

            text-align: center;

            color: #6b7280;
        }

        @media (max-width: 800px) {

            .navbar {
                padding: 0 20px;
            }

            .top {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 750px;
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
            <h2>Portal Aplikasi</h2>
            <p>Super Admin</p>
        </div>

    </div>

    <a
        href="{{ route('superadmin.dashboard') }}"
        class="btn btn-secondary"
    >
        ← Dashboard
    </a>

</nav>


<main class="container">

    <div class="top">

        <div>
            <h1>Kelola Aplikasi</h1>

            <p>
                Kelola aplikasi yang tersedia di Portal Rumah Sakit.
            </p>
        </div>

        <a
    href="{{ route('superadmin.applications.create') }}"
    class="btn btn-primary"
>
    + Tambah Aplikasi
</a>

    </div>


    <div class="table-card">

        @if ($applications->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>Logo</th>
                        <th>Nama Aplikasi</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($applications as $application)

                        <tr>

                            <td>

                                @if ($application->icon)

                                    <img
                                        src="{{ asset('storage/' . $application->icon) }}"
                                        class="icon"
                                        alt="{{ $application->name }}"
                                    >

                                @else

                                    <div class="no-icon">
                                        {{ strtoupper(substr($application->name, 0, 1)) }}
                                    </div>

                                @endif

                            </td>


                            <td>

                                <strong>
                                    {{ $application->name }}
                                </strong>

                            </td>


                            <td>

                                <div class="url">
                                    {{ $application->url }}
                                </div>

                            </td>


                            <td>

                                @if ($application->is_active)

                                    <span class="status active">
                                        Aktif
                                    </span>

                                @else

                                    <span class="status inactive">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>
                            <td>

    <a
        href="{{ route('superadmin.applications.edit', $application) }}"
        class="btn btn-secondary"
    >
        Edit
    </a>

    <form
        action="{{ route('superadmin.applications.destroy', $application) }}"
        method="POST"
        style="display: inline;"
        onsubmit="return confirm('Yakin ingin menghapus aplikasi {{ $application->name }}?');"
    >

        @csrf

        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger"
        >
            Hapus
        </button>

    </form>

</td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">

                <h3>Belum ada aplikasi</h3>

                <p>
                    Silakan tambahkan aplikasi baru ke portal.
                </p>

            </div>

        @endif

    </div>

</main>

</body>

</html>
