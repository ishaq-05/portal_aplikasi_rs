<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Aplikasi RSU Syifa Medika</title>

    <link rel="stylesheet" href="{{ asset('css/styleindex.css') }}?v={{ time() }}">

    <style>
        .header .brand {
            flex-shrink: 0;
            display: flex;
            align-items: center;
        }

        .header .logo-img {
            display: block;
            width: 185px !important;
            height: auto !important;
            max-width: 185px !important;
            max-height: 52px !important;
            object-fit: contain !important;
            object-position: left center !important;
        }

        /* Styling khusus badge logo footer tanpa teks */
        .footer-brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .footer-brand-badge img {
            height: 20px;
            width: auto;
            object-fit: contain;
        }

        @media (max-width: 800px) {
            .header .logo-img {
                width: 165px !important;
                max-width: 165px !important;
                max-height: 48px !important;
            }
        }

        @media (max-width: 600px) {
            .header .logo-img {
                width: 150px !important;
                max-width: 150px !important;
                max-height: 45px !important;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-content">

            <div class="brand">
                <img
                    src="{{ asset('images/logo-new.png') }}"
                    alt="Portal PT. Syifa Global Group"
                    class="logo-img"
                >
            </div>

            <nav class="navbar">
                <a href="#beranda" class="nav-link">Beranda</a>
                <a href="#aplikasi-populer" class="nav-link">Aplikasi Populer</a>
                <a href="#semua-aplikasi" class="nav-link">Semua Aplikasi</a>
            </nav>

        </div>
    </header>

    <main>

        <section class="hero-wrapper" id="beranda">
            <div class="hero-container">

                <div class="hero-text">

                    <h1>
                        Pusat Akses Terpadu Seluruh Aplikasi<br>
                        RSU Syifa Medika Banjarbaru
                    </h1>

                    <p class="hero-subtitle">
                        Connected Care, Better Experience.
                    </p>

                    <form
                        method="GET"
                        action="{{ route('applications.index') }}"
                        class="search-form"
                    >
                        <div class="search-input-wrapper">
                            <span class="search-icon">🔍</span>

                            <input
                                type="text"
                                name="search"
                                placeholder="Cari Aplikasi..."
                                value="{{ $search }}"
                            >
                        </div>
                    </form>

                </div>

                <div class="hero-image">
                    <div class="oval-image-wrapper">
                        <img
                            src="{{ asset('images/rs.jpeg') }}"
                            alt="Gedung RSU Syifa Medika"
                        >
                    </div>
                </div>

            </div>

            <div
                class="popular-title-box"
                id="aplikasi-populer"
            >
                <h2>Aplikasi Populer</h2>
            </div>

        </section>

        <section class="popular-green-section">

            <div class="popular-grid-container">

                <div
                    class="popular-grid"
                    id="popularApplicationsList"
                >

                    @forelse($popularApplications as $application)

                        <div
                            class="popular-card"
                            data-application-id="{{ $application->id }}"
                        >

                            <div class="popular-card-top">

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

                            <div class="popular-card-bottom">

                                <h3>
                                    {{ $application->name }}
                                </h3>

                                <p>
                                    {{ $application->description ?: 'Mendaftarkan Diri untuk Pemeriksaan' }}
                                </p>

                                <a
                                    href="{{ route('applications.open', $application) }}"
                                    class="btn-open"
                                >
                                    Buka Aplikasi
                                </a>

                            </div>

                        </div>

                    @empty

                        <div class="empty text-white">
                            Belum ada data aplikasi populer.
                        </div>

                    @endforelse

                </div>

            </div>

        </section>

        <section
            class="all-apps-section"
            id="semua-aplikasi"
        >

            <div class="all-apps-container">

                <h2 class="section-title text-dark">
                    Semua Aplikasi
                </h2>

                <div class="applications-grid">

                    @forelse($applications as $application)

                        <div class="app-card">

                            <div class="app-card-header">

                                @if($application->icon)

                                    <img
                                        src="{{ asset('storage/' . $application->icon) }}"
                                        alt="{{ $application->name }}"
                                    >

                                @else

                                    <div class="placeholder-box">
                                        <span class="fallback-icon">
                                            📱
                                        </span>
                                    </div>

                                @endif

                            </div>

                            <div class="app-card-body">

                                <h3>
                                    {{ $application->name }}
                                </h3>

                                <p>
                                    {{ $application->description ?: 'Mendaftarkan Diri untuk Pemeriksaan' }}
                                </p>

                                <a
                                    href="{{ route('applications.open', $application) }}"
                                    class="btn-open"
                                >
                                    Buka Aplikasi
                                </a>

                            </div>

                        </div>

                    @empty

                        <div class="empty">
                            Belum ada aplikasi tersedia.
                        </div>

                    @endforelse

                </div>

            </div>

        </section>

        <footer class="bottom-green-footer">

            <div class="footer-content">

                <div class="footer-brand">

                    <div class="footer-brand-badge">

                        <img
                            src="{{ asset('images/logosyifa.png') }}"
                            alt="RSU Syifa Medika Banjarbaru"
                        >

                        <img
                            src="{{ asset('images/logobrb.png') }}"
                            alt="RSU Syifa Medika Barabai"
                        >

                    </div>

                    <div class="footer-social-icons">

                        <a
                            href="#"
                            aria-label="Instagram"
                        >
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <rect
                                    x="2"
                                    y="2"
                                    width="20"
                                    height="20"
                                    rx="5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                />
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="4.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                />
                                <circle
                                    cx="17.5"
                                    cy="6.5"
                                    r="1.3"
                                    fill="currentColor"
                                />
                            </svg>
                        </a>

                        <a
                            href="#"
                            aria-label="TikTok"
                        >
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M15 3v10.5a3.5 3.5 0 1 1-3.5-3.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                />
                                <path
                                    d="M15 3c.5 3 2.5 5 6 5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </a>

                        <a
                            href="#"
                            aria-label="Facebook"
                        >
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M14 21v-7h2.5l.5-3H14V9c0-.9.3-1.5 1.7-1.5H17V4.8c-.3 0-1.2-.1-2.3-.1-2.3 0-3.9 1.4-3.9 4V11H8.5v3H11v7h3z"
                                    fill="currentColor"
                                />
                            </svg>
                        </a>

                    </div>

                </div>

                <div class="footer-column">

                    <h4>
                        Instagram
                    </h4>

                    <p>
                        @rsusyifamedikabjb
                    </p>

                    <p>
                        @rsusyifamedikabrb
                    </p>

                    <p>
                        @syifaglobal.group
                    </p>

                </div>

                <div class="footer-column">

                    <h4>
                        Facebook
                    </h4>

                    <p>
                        @rsusyifamedikabjb
                    </p>

                </div>

            </div>

            <hr class="footer-divider">

            <p class="footer-copyright">
                &copy; RSU Syifa Medika {{ date('Y') }}
            </p>

        </footer>

    </main>

    <script>
        const storageUrl = @json(asset('storage'));

        async function loadPopularApplications() {
            try {
                const response = await fetch(
                    '{{ route('applications.popular') }}',
                    {
                        headers: {
                            'Accept': 'application/json'
                        },
                        cache: 'no-store'
                    }
                );

                if (!response.ok) return;

                const applications = await response.json();

                const popularList =
                    document.getElementById(
                        'popularApplicationsList'
                    );

                if (!popularList || !applications.length) {
                    return;
                }

                popularList.innerHTML =
                    applications
                        .slice(0, 3)
                        .map((application) => {

                            const logoUrl =
                                application.icon
                                    ? (
                                        application.icon.startsWith('http')
                                            ? application.icon
                                            : `${storageUrl}/${application.icon}`
                                    )
                                    : null;

                            const name =
                                application.name || 'SiLapor';

                            const description =
                                application.description ||
                                'Mendaftarkan Diri untuk Pemeriksaan';

                            const logo =
                                logoUrl
                                    ? `<img src="${logoUrl}" alt="${escapeHtml(name)}">`
                                    : '<span class="fallback-icon">📱</span>';

                            return `
                                <div
                                    class="popular-card"
                                    data-application-id="${application.id}"
                                >

                                    <div class="popular-card-top">
                                        ${logo}
                                    </div>

                                    <div class="popular-card-bottom">

                                        <h3>
                                            ${escapeHtml(name)}
                                        </h3>

                                        <p>
                                            ${escapeHtml(description)}
                                        </p>

                                        <a
                                            href="{{ url('/applications') }}/${application.id}/open"
                                            class="btn-open"
                                        >
                                            Buka Aplikasi
                                        </a>

                                    </div>

                                </div>
                            `;

                        })
                        .join('');

            } catch (error) {

                console.error(
                    'Error updating popular applications:',
                    error
                );

            }
        }

        function escapeHtml(text) {

            const div =
                document.createElement('div');

            div.textContent =
                text ?? '';

            return div.innerHTML;
        }

        @if(!$search)

            loadPopularApplications();

            setInterval(
                loadPopularApplications,
                3000
            );

        @endif
    </script>

</body>
</html>