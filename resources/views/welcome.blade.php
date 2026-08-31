<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Karyawan - Syifa Global Group</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styling Front End (CSS Native) -->
    <style>
        /* Mengaktifkan Gulir Halus (Smooth Scroll) */
        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #ffffff;
            overflow-x: hidden;
        }

        /* 1. Header / Navbar (Hijau Gelap) */
        .navbar {
            background-color: #031c10;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 40px;
            height: 60px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Container Logo dengan Latar Belakang Putih */
        .navbar .logo-link {
            display: flex;
            align-items: center;
            background-color: #ffffff; /* Latar putih untuk menjaga warna asli logo */
            padding: 4px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        .navbar .logo-img {
            height: 30px; /* Ukuran proporsional di dalam kotak putih */
            width: auto;
            object-fit: contain;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            font-weight: 400;
            transition: opacity 0.2s;
        }

        .nav-links a:hover {
            opacity: 0.8;
        }

        /* 2. Banner Utama */
        .hero-section {
            position: relative;
            width: 100%;
            min-height: calc(100vh - 60px);
            background: linear-gradient(135deg, rgba(140, 15, 110, 0.88), rgba(70, 8, 75, 0.93)), 
                        url("{{ asset('images/figma_portal.jpeg') }}") center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ffffff;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 34px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .hero-content p {
            font-size: 14px;
            font-weight: 300;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        /* Container untuk Search Box dan Hasil Dropdown */
        .search-container {
            position: relative;
            width: 100%;
            max-width: 520px;
            margin: 0 auto;
        }

        .search-box {
            background: #ffffff;
            padding: 10px 24px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .search-box svg {
            width: 18px;
            height: 18px;
            fill: #666666;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px;
            color: #333333;
        }

        /* Box Hasil Pencarian (Dropdown) */
        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 10px;
            width: 320px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            display: none;
            z-index: 99;
            text-align: left;
            overflow: hidden;
            max-height: 350px;
            overflow-y: auto;
        }

        .search-result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border-bottom: 1px solid #eee;
            background: #ffffff;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-info {
            flex: 1;
            padding-right: 12px;
        }

        .search-result-info h3 {
            font-size: 14px;
            font-weight: 700;
            color: #000000;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .search-result-info p {
            font-size: 10px;
            color: #777777;
            margin-bottom: 10px;
            line-height: 1.2;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .search-result-btn {
            display: inline-block;
            border: 1px solid #333333;
            padding: 4px 12px;
            color: #333333;
            text-decoration: none;
            font-size: 11px;
            border-radius: 2px;
            font-weight: 500;
        }

        .search-result-img {
            width: 90px;
            height: 90px;
            background-color: #d8dddf;
            border-radius: 4px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .no-result-item {
            padding: 16px;
            color: #777;
            font-size: 12px;
            text-align: center;
        }

        /* 3. Section Aplikasi Populer */
        .popular-section {
            background-color: #031c10;
            padding: 60px 50px;
            color: #ffffff;
            text-align: center;
        }

        .popular-section h2 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        .card-grid-top {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .card-horizontal {
            background: #ffffff;
            color: #333333;
            display: flex;
            justify-content: space-between;
            padding: 20px;
            border-radius: 4px;
            text-align: left;
        }

        .card-info h3 {
            font-size: 18px;
            font-weight: 700;
            color: #000000;
        }

        .card-info p {
            font-size: 10px;
            color: #666666;
            margin: 6px 0 12px 0;
        }

        .btn-kunjungi {
            display: inline-block;
            border: 1px solid #444444;
            padding: 3px 14px;
            color: #333333;
            text-decoration: none;
            font-size: 11px;
            border-radius: 2px;
        }

        .card-image-placeholder {
            width: 100px;
            height: 100px;
            background-color: #c8c8c8;
            border-radius: 2px;
            object-fit: cover;
        }

        /* 4. Section Semua Aplikasi (Bawah) */
        .bottom-section {
            background-color: #ffffff;
            padding: 60px 50px;
        }

        .card-grid-bottom {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            max-width: 1100px;
            margin: 0 auto;
            text-align: center;
        }

        .card-vertical {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .card-vertical .card-img-top {
            width: 100%;
            height: 170px;
            background-color: #d2d2d2;
            border-radius: 12px;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .card-vertical h4 {
            font-size: 14px;
            font-weight: 700;
            color: #111111;
        }

        .card-vertical p {
            font-size: 8px;
            color: #777777;
            margin-top: 2px;
        }

        .empty-state {
            grid-column: 1 / -1;
            padding: 40px 0;
            color: #888888;
            font-size: 14px;
        }
        .empty-state-white {
            color: rgba(255, 255, 255, 0.6);
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar">
        <a href="#beranda" class="logo-link">
            <img src="{{ asset('images/logo-syifa-global-group.png') }}" alt="Syifa Global Group" class="logo-img">
        </a>
        <ul class="nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#aplikasi-populer">Aplikasi Populer</a></li>
            <li><a href="#semua-aplikasi">Semua Aplikasi</a></li>
        </ul>
    </nav>

    <!-- Banner Utama (Beranda) -->
    <section id="beranda" class="hero-section">
        <div class="hero-content">
            <h1>Akses Mudah untuk<br>Layanan Rumah Sakit Anda</h1>
            <p>Connected Care, Better Experience.</p>
            
            <div class="search-container">
                <form action="{{ route('applications.index') }}" method="GET" class="search-box">
                    <svg viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    <input type="text" id="searchInput" name="search" placeholder="Cari..." value="{{ request('search') }}" autocomplete="off">
                </form>

                <!-- Box Hasil Pencarian Otomatis -->
                <div id="searchResults" class="search-results-dropdown"></div>
            </div>
        </div>
    </section>

    <!-- Section Aplikasi Populer -->
    <section id="aplikasi-populer" class="popular-section">
        <h2>Aplikasi Populer</h2>
        <div class="card-grid-top">
            @if(isset($applications) && count($applications) > 0)
                @foreach($applications->take(3) as $app)
                    <div class="card-horizontal">
                        <div class="card-info">
                            <div>
                                <h3>{{ $app->name ?? $app->title ?? '' }}</h3>
                                <p>{{ $app->description ?? '' }}</p>
                            </div>
                            <a href="{{ isset($app->id) ? route('applications.open', $app->id) : '#' }}" target="_blank" class="btn-kunjungi">Kunjungi</a>
                        </div>
                        @if(isset($app->icon) && $app->icon)
                            <img src="{{ asset('storage/' . $app->icon) }}" alt="{{ $app->name ?? '' }}" class="card-image-placeholder">
                        @else
                            <div class="card-image-placeholder"></div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="empty-state empty-state-white">
                    Belum ada aplikasi populer yang ditambahkan.
                </div>
            @endif
        </div>
    </section>

    <!-- Section Semua Aplikasi -->
    <section id="semua-aplikasi" class="bottom-section">
        <div class="card-grid-bottom">
            @if(isset($applications) && count($applications) > 0)
                @foreach($applications as $app)
                    <a href="{{ isset($app->id) ? route('applications.open', $app->id) : '#' }}" target="_blank" class="card-vertical">
                        @if(isset($app->icon) && $app->icon)
                            <img src="{{ asset('storage/' . $app->icon) }}" alt="{{ $app->name ?? '' }}" class="card-img-top">
                        @else
                            <div class="card-img-top"></div>
                        @endif
                        <h4>{{ $app->name ?? $app->title ?? '' }}</h4>
                        <p>{{ $app->description ?? '' }}</p>
                    </a>
                @endforeach
            @else
                <div class="empty-state">
                    Belum ada aplikasi yang tersedia.
                </div>
            @endif
        </div>
    </section>

    <!-- Script JavaScript untuk Filter Otomatis saat Mengetik -->
    <script>
        const applicationsData = @json($applications ?? []);
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            
            if (query.length === 0) {
                searchResults.style.display = 'none';
                searchResults.innerHTML = '';
                return;
            }

            const filteredApps = applicationsData.filter(app => {
                const name = (app.name || app.title || '').toLowerCase();
                const desc = (app.description || '').toLowerCase();
                return name.includes(query) || desc.includes(query);
            });

            searchResults.innerHTML = '';

            if (filteredApps.length > 0) {
                filteredApps.forEach(app => {
                    const name = app.name || app.title || '';
                    const desc = app.description || '';
                    const iconUrl = app.icon ? `/storage/${app.icon}` : '';
                    const openUrl = app.id ? `/applications/${app.id}/open` : '#';

                    const itemHtml = `
                        <div class="search-result-item">
                            <div class="search-result-info">
                                <h3>${name}</h3>
                                <p>${desc}</p>
                                <a href="${openUrl}" target="_blank" class="search-result-btn">Kunjungi</a>
                            </div>
                            ${iconUrl ? `<img src="${iconUrl}" class="search-result-img" alt="${name}">` : `<div class="search-result-img"></div>`}
                        </div>
                    `;
                    searchResults.insertAdjacentHTML('beforeend', itemHtml);
                });
            } else {
                searchResults.innerHTML = `<div class="no-result-item">Aplikasi tidak ditemukan</div>`;
            }

            searchResults.style.display = 'block';
        });

        // Sembunyikan dropdown saat klik di luar kolom pencarian
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });

        // Tampilkan kembali jika input diklik lagi
        searchInput.addEventListener('focus', function() {
            if (this.value.trim().length > 0) {
                searchResults.style.display = 'block';
            }
        });
    </script>
</body>
</html>