<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Portal Aplikasi Rumah Sakit</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family:
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f7fb;

            color: #1f2937;

            line-height: 1.5;
        }

        .header {
            position: sticky;

            top: 0;

            z-index: 1000;

            width: 100%;

            background: rgba(255, 255, 255, 0.98);

            border-bottom: 1px solid #e5e7eb;

            box-shadow:
                0 2px 10px rgba(15, 23, 42, 0.04);

            padding: 14px 40px;
        }

        .header-content {
            width: 100%;

            min-height: 58px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 30px;
        }

        .brand {
            display: flex;

            align-items: center;

            flex-shrink: 0;
        }

        .portal-logo {
            display: flex;

            align-items: center;
        }

        .portal-logo img {
            display: block;

            width: 180px;

            height: auto;

            max-height: 55px;

            object-fit: contain;

            object-position: center;
        }

        .navbar {
            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 8px;
        }

        .nav-link {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 10px 15px;

            color: #475569;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            border-radius: 9px;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .nav-link:hover {
            background: #f0fdfa;

            color: #0f766e;

            transform: translateY(-1px);
        }

        .nav-link.active {
            background: #f0fdfa;

            color: #0f766e;
        }

        .container {
            width: 100%;

            max-width: 1200px;

            margin: 0 auto;

            padding:
                55px 25px
                80px;
        }

        .hero {
            text-align: center;

            margin-bottom: 70px;
        }

        .hero h2 {
            color: #173f6b;

            font-size: 36px;

            font-weight: 700;

            letter-spacing: -0.5px;

            margin-bottom: 10px;
        }

        .hero p {
            color: #64748b;

            font-size: 16px;

            font-weight: 400;
        }

        .search-area {
            width: 100%;

            max-width: 720px;

            margin: 30px auto 0;
        }

        .search-form {
            display: flex;

            gap: 10px;

            width: 100%;
        }

        .search-input {
            flex: 1;

            min-width: 0;

            padding: 15px 18px;

            background: #ffffff;

            border: 1px solid #d1d5db;

            border-radius: 11px;

            color: #1f2937;

            font-family: inherit;

            font-size: 15px;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            border-color: #0f766e;

            box-shadow:
                0 0 0 3px rgba(15, 118, 110, 0.10);
        }

        .search-button {
            flex-shrink: 0;

            padding: 15px 25px;

            border: none;

            border-radius: 11px;

            background: #0f766e;

            color: #ffffff;

            font-family: inherit;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .search-button:hover {
            background: #115e59;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(15, 118, 110, 0.18);
        }

        .section-header {
            text-align: center;

            margin-bottom: 32px;
        }

        .section-header h2 {
            color: #173f6b;

            font-size: 32px;

            font-weight: 700;

            margin-bottom: 5px;
        }

        .section-header p {
            color: #64748b;

            font-size: 15px;
        }

        .section-divider {
            width: 100%;

            height: 1px;

            background: #e2e8f0;

            margin:
                0 auto
                60px;
        }

        .all-applications-section {
            scroll-margin-top: 100px;
        }

        .all-section-header {
            margin-bottom: 30px;
        }

        .all-section-header h2 {
            color: #173f6b;

            font-size: 30px;

            font-weight: 700;

            margin-bottom: 5px;
        }

        .all-section-header p {
            color: #64748b;

            font-size: 15px;
        }

        .applications {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 20px;
        }

        .application-card {
            display: flex;

            flex-direction: column;

            min-width: 0;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 20px;

            min-height: 370px;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }

        .application-card:hover {
            transform: translateY(-4px);

            border-color: #cbd5e1;

            box-shadow:
                0 12px 28px rgba(15, 23, 42, 0.08);
        }

        .application-icon {
            width: 100%;

            height: 155px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            margin-bottom: 18px;

            padding: 18px;

            background: #f0fdfa;

            border-radius: 13px;

            overflow: hidden;
        }

        .application-icon img {
            display: block;

            width: auto;

            height: auto;

            max-width: 100%;

            max-height: 100%;

            object-fit: contain;

            object-position: center;

            margin: auto;
        }

        .fallback-icon {
            display: flex;

            align-items: center;

            justify-content: center;

            width: 100%;

            height: 100%;

            font-size: 42px;

            line-height: 1;
        }

        .application-card h3 {
            color: #172b4d;

            font-size: 18px;

            font-weight: 700;

            line-height: 1.35;

            min-height: 25px;

            margin-bottom: 7px;

            word-break: break-word;
        }

        .application-description {
            color: #64748b;

            font-size: 14px;

            font-weight: 400;

            line-height: 1.55;

            margin-bottom: 18px;

            min-height: 65px;

            display: -webkit-box;

            -webkit-line-clamp: 3;

            -webkit-box-orient: vertical;

            overflow: hidden;

            word-break: break-word;
        }

        .open-button {
            display: flex;

            align-items: center;

            justify-content: center;

            width: 100%;

            margin-top: auto;

            min-height: 42px;

            padding: 10px 14px;

            background: #0f766e;

            color: #ffffff;

            border-radius: 9px;

            text-align: center;

            text-decoration: none;

            font-family: inherit;

            font-size: 14px;

            font-weight: 700;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .open-button:hover {
            background: #115e59;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(15, 118, 110, 0.18);
        }

        .search-result-section {
            scroll-margin-top: 100px;

            margin-bottom: 50px;
        }

        .search-result-header {
            text-align: center;

            margin-bottom: 30px;
        }

        .search-result-header h2 {
            color: #173f6b;

            font-size: 28px;

            font-weight: 700;

            margin-bottom: 5px;
        }

        .search-result-header p {
            color: #64748b;

            font-size: 14px;
        }

        .search-result-header strong {
            color: #334155;
        }

        .clear-search {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            margin-top: 13px;

            padding: 8px 13px;

            background: #f0fdfa;

            color: #0f766e;

            border-radius: 8px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition:
                background 0.2s ease;
        }

        .clear-search:hover {
            background: #ccfbf1;
        }

        .empty {
            grid-column: 1 / -1;

            text-align: center;

            padding: 70px 20px;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            color: #64748b;
        }

        .empty h3 {
            color: #374151;

            font-size: 20px;

            margin-bottom: 8px;
        }

        .empty p {
            font-size: 14px;
        }

        @media (max-width: 1050px) {

            .applications {
                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }

        }

        @media (max-width: 800px) {

            .header {
                padding: 12px 20px;
            }

            .header-content {
                min-height: auto;

                flex-direction: column;

                gap: 12px;
            }

            .navbar {
                width: 100%;

                justify-content: center;

                flex-wrap: wrap;
            }

            .container {
                padding:
                    40px 18px
                    60px;
            }

            .hero {
                margin-bottom: 50px;
            }

            .hero h2 {
                font-size: 30px;
            }

            .applications {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 16px;
            }

        }

        @media (max-width: 600px) {

            .header {
                padding: 12px 15px;
            }

            .header-content {
                gap: 10px;
            }

            .portal-logo img {
                width: 150px;

                max-height: 48px;
            }

            .navbar {
                gap: 4px;
            }

            .nav-link {
                padding: 8px 10px;

                font-size: 13px;
            }

            .container {
                padding:
                    35px 15px
                    50px;
            }

            .hero h2 {
                font-size: 27px;

                line-height: 1.25;
            }

            .hero p {
                font-size: 14px;
            }

            .search-area {
                margin-top: 25px;
            }

            .search-form {
                flex-direction: column;

                gap: 9px;
            }

            .search-input {
                width: 100%;
            }

            .search-button {
                width: 100%;
            }

            .section-header h2 {
                font-size: 27px;
            }

            .section-header p {
                font-size: 14px;
            }

            .all-section-header h2 {
                font-size: 27px;
            }

            .applications {
                grid-template-columns: 1fr;

                gap: 15px;
            }

            .application-card {
                min-height: 350px;

                padding: 18px;
            }

            .application-icon {
                height: 160px;

                padding: 20px;
            }

            .application-card h3 {
                font-size: 18px;
            }

            .application-description {
                font-size: 14px;

                min-height: 65px;
            }

        }

        @media (max-width: 380px) {

            .nav-link {
                padding: 7px 8px;

                font-size: 12px;
            }

            .hero h2 {
                font-size: 24px;
            }

            .application-icon {
                height: 145px;
            }

        }

        .popular-section { background:#087f5b; padding:30px 24px 18px; margin:0; border-bottom:3px solid #8b5cf6; }
        .popular-section .section-divider { display:none; }
        .popular-section .section-header { text-align:center; margin-bottom:26px; }
        .popular-section .section-header h2 { color:#fff; font-size:30px; line-height:1.2; font-weight:800; text-transform:uppercase; margin:0; letter-spacing:.5px; }
        .popular-section .section-header p { display:none; }
        .popular-section .popular-list { width:100%; max-width:1000px; margin:0 auto; display:flex; flex-direction:row; justify-content:center; align-items:stretch; gap:122px; }
        .popular-section .popular-card { position:relative; width:181px; min-width:181px; max-width:181px; height:169px; min-height:169px; display:flex; flex-direction:column; padding:0; gap:0; background:#f4f7fa; border:1.5px solid #222; border-radius:9px; overflow:visible; transition:transform .2s ease,box-shadow .2s ease; }
        .popular-section .popular-card:hover { transform:translateY(-3px); box-shadow:0 8px 16px rgba(0,0,0,.15); }
        .popular-section .popular-icon { width:100%; height:84px; min-height:84px; display:flex; align-items:center; justify-content:center; padding:8px 15px; background:#fffdf5; border:0; border-bottom:1px solid #999; border-radius:8px 8px 6px 6px; overflow:hidden; }
        .popular-section .popular-icon img { display:block; width:100%; height:100%; max-width:100%; max-height:100%; padding:0; margin:auto; object-fit:contain; object-position:center; }
        .popular-section .popular-fallback { font-size:35px; }
        .popular-section .popular-rank { position:absolute; top:82px; right:7px; width:31px; height:31px; min-width:31px; display:flex; align-items:center; justify-content:center; padding:0; background:#b8b8b8; color:#111; border-radius:50%; font-size:17px; line-height:1; font-weight:800; z-index:5; }
        .popular-section .popular-info { width:100%; min-width:0; flex:1; display:block; text-align:center; padding:8px 7px 2px; }
        .popular-section .popular-info h3 { margin:0 0 3px; color:#111; font-size:17px; line-height:20px; font-weight:800; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
        .popular-section .popular-info p { margin:0; color:#555; font-size:10px; line-height:13px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
        .popular-section .popular-count { display:none; }
        .popular-section .popular-button { align-self:center; width:121px; min-width:121px; max-width:121px; height:22px; min-height:22px; display:flex; align-items:center; justify-content:center; margin:0 0 7px; padding:0; background:#fffdf5; border:1.5px solid #222; border-radius:20px; color:#111; font-family:inherit; font-size:11px; line-height:1; font-weight:700; text-align:center; text-decoration:none; white-space:nowrap; transition:.2s ease; }
        .popular-section .popular-button:hover { background:#fff; color:#111; transform:translateY(-1px); box-shadow:none; }
        .popular-section .popular-list .empty { width:100%; text-align:center; color:#fff; }
        @media (max-width:850px) { .popular-section .popular-list { gap:30px; } }
        @media (max-width:650px) { .popular-section .popular-list { flex-wrap:wrap; gap:20px; } .popular-section .popular-card { width:181px; min-width:181px; max-width:181px; } }
        @media (max-width:600px) { .popular-section { padding:25px 15px 18px; } .popular-section .section-header h2 { font-size:27px; } .popular-section .popular-list { gap:18px; } }

    </style>

</head>

<body>

    <header class="header">

        <div class="header-content">

            <div class="brand">

                <div class="portal-logo">

                    <img
                        src="{{ asset('images/logo-syifa-global-group.png') }}"
                        alt="Syifa Global Group"
                    >

                </div>

            </div>

            <nav class="navbar">

                <a
                    href="#beranda"
                    class="nav-link active"
                >
                    🏠 Beranda
                </a>

                <a
                    href="#aplikasi-populer"
                    class="nav-link"
                >
                    ⭐ Aplikasi Populer
                </a>

                <a
                    href="#semua-aplikasi"
                    class="nav-link"
                >
                    📱 Semua Aplikasi
                </a>

            </nav>

        </div>

    </header>

    <main class="container">

        <section
            class="hero"
            id="beranda"
        >

            <h2>
                Portal Aplikasi Rumah Sakit
            </h2>

            <p>
                Akses berbagai aplikasi rumah sakit dalam satu tempat.
            </p>

            <div class="search-area">

                <form
                    method="GET"
                    action="{{ route('applications.index') }}"
                    class="search-form"
                >

                    <input
                        type="text"
                        name="search"
                        class="search-input"
                        placeholder="Cari aplikasi..."
                        value="{{ $search }}"
                    >

                    <button
                        type="submit"
                        class="search-button"
                    >
                        🔍 Cari
                    </button>

                </form>

            </div>

        </section>

        @if($search)

            <section
                class="search-result-section"
                id="hasil-pencarian"
            >

                <div class="search-result-header">

                    <h2>
                        🔎 Hasil Pencarian
                    </h2>

                    <p>
                        Menampilkan aplikasi yang sesuai dengan:
                        <strong>
                            "{{ $search }}"
                        </strong>
                    </p>

                    <a
                        href="{{ route('applications.index') }}"
                        class="clear-search"
                    >
                        ✕ Hapus Pencarian
                    </a>

                </div>

                <section class="applications">

                    @forelse($applications as $application)

                        <div class="application-card">

                            <div class="application-icon">

                                @if($application->icon)

                                    <img
                                        src="{{ asset('storage/' . $application->icon) }}"
                                        alt="{{ $application->name }}"
                                    >

                                @else

                                    <span class="fallback-icon">
                                        📱
                                    </span>

                                @endif

                            </div>

                            <h3>
                                {{ $application->name }}
                            </h3>

                            <p class="application-description">
                                {{ $application->description ?: 'Tidak ada deskripsi aplikasi.' }}
                            </p>

                            <a
                                href="{{ route('applications.open', $application) }}"
                                class="open-button"
                            >
                                Buka Aplikasi →
                            </a>

                        </div>

                    @empty

                        <div class="empty">

                            <h3>
                                Aplikasi tidak ditemukan
                            </h3>

                            <p>
                                Coba gunakan kata kunci pencarian lain.
                            </p>

                        </div>

                    @endforelse

                </section>

            </section>

        @else

            <section
                class="popular-section"
                id="aplikasi-populer"
            >

                <div class="section-divider"></div>

                <div class="section-header">

                    <h2>
                        ⭐ Aplikasi Populer
                    </h2>

                    <p>
                        3 aplikasi yang paling sering digunakan oleh user.
                    </p>

                </div>

                <div
    class="popular-list"
    id="popularApplicationsList"
>
    @forelse($popularApplications as $application)

        <div
            class="popular-card"
            data-application-id="{{ $application->id }}"
        >

            <div class="popular-rank">
                #{{ $loop->iteration }}
            </div>

            <div class="popular-icon">

                @if($application->icon)

                    <img
                        src="{{ asset('storage/' . $application->icon) }}"
                        alt="{{ $application->name }}"
                    >

                @else

                    <span class="popular-fallback">
                        📱
                    </span>

                @endif

            </div>

            <div class="popular-info">

                <h3>
                    {{ $application->name }}
                </h3>

                <p>
                    {{ $application->description ?: 'Aplikasi yang sering digunakan user.' }}
                </p>

            </div>

            <div class="popular-count">

                <strong>
                    {{ $application->visits_count }}
                </strong>

                <span>
                    kali digunakan
                </span>

            </div>

            <a
                href="{{ route('applications.open', $application) }}"
                class="popular-button"
            >
                Buka Aplikasi →
            </a>

        </div>

    @empty

        <div class="empty">

            <h3>
                Belum ada data aplikasi populer
            </h3>

            <p>
                Data akan muncul setelah aplikasi digunakan oleh user.
            </p>

        </div>

    @endforelse
</div>

            </section>

            <section
                class="all-applications-section"
                id="semua-aplikasi"
            >

                <div class="all-section-header">

                    <h2>
                        📱 Semua Aplikasi
                    </h2>

                    <p>
                        Pilih aplikasi yang ingin kamu gunakan.
                    </p>

                </div>

                <section class="applications">

                    @forelse($applications as $application)

                        <div class="application-card">

                            <div class="application-icon">

                                @if($application->icon)

                                    <img
                                        src="{{ asset('storage/' . $application->icon) }}"
                                        alt="{{ $application->name }}"
                                    >

                                @else

                                    <span class="fallback-icon">
                                        📱
                                    </span>

                                @endif

                            </div>

                            <h3>
                                {{ $application->name }}
                            </h3>

                            <p class="application-description">
                                {{ $application->description ?: 'Tidak ada deskripsi aplikasi.' }}
                            </p>

                            <a
                                href="{{ route('applications.open', $application) }}"
                                class="open-button"
                            >
                                Buka Aplikasi →
                            </a>

                        </div>

                    @empty

                        <div class="empty">

                            <h3>
                                Belum ada aplikasi
                            </h3>

                            <p>
                                Belum ada aplikasi aktif yang tersedia.
                            </p>

                        </div>

                    @endforelse

                </section>

            </section>

        @endif

    </main>
<script>
    const storageUrl = @json(asset('storage'));

    async function loadPopularApplications() {
        try {
            const response = await fetch('{{ route('applications.popular') }}', {
                headers: { 'Accept': 'application/json' },
                cache: 'no-store'
            });

            if (!response.ok) throw new Error('Gagal mengambil data aplikasi populer.');

            const applications = await response.json();
            const popularList = document.getElementById('popularApplicationsList');

            if (!popularList) return;

            if (!applications.length) {
                popularList.innerHTML = `
                    <div class="empty">
                        <h3>Belum ada data aplikasi populer</h3>
                        <p>Data akan muncul setelah aplikasi digunakan oleh user.</p>
                    </div>
                `;
                return;
            }

            popularList.innerHTML = applications.map((application, index) => {
                const logoUrl = application.icon
                    ? (application.icon.startsWith('http')
                        ? application.icon
                        : `${storageUrl}/${application.icon}`)
                    : null;
                const name = application.name || 'Aplikasi';
                const description = application.description || 'Aplikasi yang sering digunakan user.';
                const logo = logoUrl
                    ? `<img src="${logoUrl}" alt="${escapeHtml(name)}">`
                    : '<span class="popular-fallback">📱</span>';

                return `
                    <div class="popular-card" data-application-id="${application.id}">
                        <div class="popular-rank">${index + 1}</div>
                        <div class="popular-icon">${logo}</div>
                        <div class="popular-info">
                            <h3>${escapeHtml(name)}</h3>
                            <p>${escapeHtml(description)}</p>
                        </div>
                        <div class="popular-count">
                            <strong>${application.visits_count ?? 0}</strong>
                            <span>kali digunakan</span>
                        </div>
                        <a href="{{ url('/applications') }}/${application.id}/open" class="popular-button">
                            Buka Aplikasi →
                        </a>
                    </div>
                `;
            }).join('');
        } catch (error) {
            console.error('Gagal memperbarui aplikasi populer:', error);
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text ?? '';
        return div.innerHTML;
    }

    @if(!$search)
        loadPopularApplications();
        setInterval(loadPopularApplications, 3000);

        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) loadPopularApplications();
        });
    @endif
</script>

</body>

</html>
