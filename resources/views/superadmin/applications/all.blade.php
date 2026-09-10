@extends('layouts.superadmin')

@section('title', 'Semua Aplikasi - Super Admin')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

   .all-applications-page {
    position: relative;
    isolation: isolate;

    font-family: 'Poppins', Arial, Helvetica, sans-serif;

    min-height: 100vh;
    width: 100%;
    padding: 40px 30px 60px;

    box-sizing: border-box;
    background: transparent;
}

.all-applications-page::before {
    content: "";
    position: fixed;

    top: 50px;
    right: 0;
    bottom: 0;
    left: 190px;

    background:
        linear-gradient(
            rgba(105, 140, 120, 0.75),
            rgba(105, 140, 120, 0.75)
        ),
        url('{{ asset('images/rs.jpeg') }}')
        center center / cover no-repeat;

    z-index: -1;
    pointer-events: none;
}

    .applications-page-header {
        margin-bottom: 25px;
    }

    .applications-page-title {
        margin: 0 0 4px;
        color: #ffffff;
        font-size: 38px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .applications-page-subtitle {
        margin: 0;
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
        font-weight: 400;
    }

    /* Statistics Grid & Cards */
    .statistics-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .statistics-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 20px 24px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        border: none;
    }

    .statistics-label {
        margin-bottom: 8px;
        color: #374151;
        font-size: 13px;
        font-weight: 600;
    }

    .statistics-value {
        color: #111827;
        font-size: 42px;
        font-weight: 800;
        line-height: 1;
    }

    .statistics-card.inactive .statistics-value {
        color: #111827;
    }

    /* Main Container Card */
    .applications-section {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(8px);
        border-radius: 24px;
        padding: 28px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    /* Search Area */
    .applications-search-area {
        margin-bottom: 24px;
    }

    .search-form {
        position: relative;
        width: 100%;
    }

    .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        width: 18px;
        height: 18px;
        transform: translateY(-50%);
        color: #9ca3af;
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        height: 48px;
        padding: 0 45px 0 48px;
        border: 1px solid #d1d5db;
        border-radius: 24px;
        outline: none;
        background: #ffffff;
        color: #1f2937;
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
        font-size: 13px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        transition: all .2s ease;
    }

    .search-input::placeholder {
        color: #9ca3af;
    }

    .search-input:focus {
        border-color: #0d8a72;
        box-shadow: 0 0 0 3px rgba(13, 138, 114, 0.15);
    }

    .search-clear {
        position: absolute;
        right: 15px;
        top: 50%;
        width: 24px;
        height: 24px;
        display: none;
        align-items: center;
        justify-content: center;
        transform: translateY(-50%);
        border: none;
        border-radius: 50%;
        background: #e5e7eb;
        color: #4b5563;
        font-size: 16px;
        cursor: pointer;
    }

    .search-clear:hover {
        background: #d1d5db;
        color: #111827;
    }

    .search-result {
        margin-bottom: 15px;
        color: #4b5563;
        font-size: 13px;
    }

    .search-result strong {
        color: #111827;
    }

    /* Inner Green Panel for Cards */
    .applications-inner-panel {
        background: #5b8260;
        border-radius: 20px;
        padding: 30px 24px;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .inner-panel-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .inner-panel-title {
        color: #ffffff;
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 4px;
    }

    .inner-panel-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 13px;
        margin: 0;
    }

    /* Application Cards Grid */
    .applications-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
    }

    /* Dua Warna Application Card Style - Pembatas 50/50 Presisi */
    .application-card {
        background: #ffffff;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: transform .2s ease, box-shadow .2s ease;
        overflow: hidden;
        height: 340px;
    }

    .application-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .application-card.hidden {
        display: none !important;
    }

    /* Bagian Atas: Logo (Putih - 50%) */
    .application-logo {
        width: 100%;
        height: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
        padding: 16px;
        box-sizing: border-box;
    }

    .application-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .logo-placeholder {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eef7f4;
        color: #0d8a72;
        font-size: 22px;
        font-weight: 700;
    }

    /* Bagian Bawah: Konten (Abu-abu / Krem - 50%) */
    .application-content {
        width: 100%;
        height: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center; /* Mengubah dari space-between ke center agar rapat */
        gap: 8px; /* Mengatur jarak seragam antar komponen internal */
        background: #dcded8;
        padding: 16px;
        box-sizing: border-box;
    }

    .application-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .application-name {
        margin: 0 0 2px;
        color: #111827;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.2;
    }

    .application-description {
        margin: 0 0 6px;
        color: #4b5563;
        font-size: 11px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .application-status {
        margin-bottom: 2px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 2px 10px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 600;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .status-active {
        background: #d1fae5;
        color: #065f46;
    }

    .status-active .status-dot {
        background: #10b981;
    }

    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-inactive .status-dot {
        background: #ef4444;
    }

    /* Elemen URL Aplikasi */
    .application-url {
        color: #0d8a72;
        font-size: 10.5px;
        font-weight: 500;
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 0 4px;
    }

    .application-action {
        width: 100%;
        margin-top: 2px;
    }

    .open-application-button {
        width: 100%;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #ffffff;
        color: #374151;
        text-decoration: none;
        font-size: 11px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .open-application-button:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
        color: #111827;
    }

    .open-application-button.inactive {
        background: #f9fafb;
        color: #9ca3af;
    }

    /* Empty & Footer States */
    .empty-state {
        padding: 40px 20px;
        text-align: center;
        background: #ffffff;
        border-radius: 16px;
    }

    .empty-icon {
        width: 50px;
        height: 50px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f3f4f6;
        color: #6b7280;
    }

    .empty-title {
        margin: 0 0 4px;
        color: #111827;
        font-size: 15px;
        font-weight: 700;
    }

    .empty-text {
        margin: 0;
        color: #6b7280;
        font-size: 12px;
    }

    .applications-footer {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid rgba(0, 0, 0, 0.08);
        color: #6b7280;
        font-size: 12px;
    }

    .applications-footer strong {
        color: #111827;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .applications-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 900px) {
        .applications-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .statistics-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .all-applications-page {
            padding: 20px 15px 40px;
        }

        .applications-page-title {
            font-size: 28px;
        }

        .applications-grid {
            grid-template-columns: 1fr;
        }

        .applications-section {
            padding: 18px;
        }

        .applications-inner-panel {
            padding: 20px 14px;
        }
    }
</style>
@endpush

@section('content')

<div class="all-applications-page">

    <div class="applications-page-header">
        <div>
            <h1 class="applications-page-title">
                Semua Aplikasi
            </h1>
            <p class="applications-page-subtitle">
                Melihat seluruh aplikasi yang terdaftar di dalam sistem portal.
            </p>
        </div>
    </div>

    <div class="statistics-grid">
        <div class="statistics-card">
            <div class="statistics-label">
                Total Aplikasi
            </div>
            <div class="statistics-value">
                {{ $totalApplications }}
            </div>
        </div>

        <div class="statistics-card">
            <div class="statistics-label">
                Aplikasi Aktif
            </div>
            <div class="statistics-value">
                {{ $activeApplications }}
            </div>
        </div>

        <div class="statistics-card inactive">
            <div class="statistics-label">
                Aplikasi Nonaktif
            </div>
            <div class="statistics-value">
                {{ $inactiveApplications }}
            </div>
        </div>
    </div>

    <div class="applications-section">

        <div class="applications-search-area">
            <form
                action="{{ route('superadmin.all-applications') }}"
                method="GET"
                class="search-form"
                id="searchForm"
            >
                <svg
                    class="search-icon"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="16.65" y1="16.65" x2="21" y2="21"></line>
                </svg>

                <input
                    type="text"
                    name="search"
                    id="applicationSearch"
                    value="{{ $search }}"
                    class="search-input"
                    placeholder="Cari nama atau deskripsi aplikasi..."
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
        </div>

        <div
            class="search-result"
            id="searchResult"
            style="display: none;"
        ></div>

        <div class="applications-inner-panel">

            <div class="inner-panel-header">
                <h2 class="inner-panel-title">Daftar Aplikasi Portal</h2>
                <p class="inner-panel-subtitle">Aplikasi yang terdaftar dan siap digunakan oleh pengguna</p>
            </div>

            @if($applications->count() > 0)

                <div
                    class="applications-grid"
                    id="applicationsGrid"
                >
                    @foreach($applications as $application)
                        <div
                            class="application-card"
                            data-name="{{ strtolower($application->name) }}"
                            data-description="{{ strtolower($application->description ?? '') }}"
                        >
                            <div class="application-logo">
                                @if($application->icon)
                                    <img
                                        src="{{ asset('storage/' . $application->icon) }}"
                                        alt="Logo {{ $application->name }}"
                                    >
                                @else
                                    <div class="logo-placeholder">
                                        {{ strtoupper(
                                            substr(
                                                $application->name,
                                                0,
                                                1
                                            )
                                        ) }}
                                    </div>
                                @endif
                            </div>

                            <div class="application-content">
                                <div class="application-info">
                                    <h2 class="application-name">
                                        {{ $application->name }}
                                    </h2>

                                    <p class="application-description">
                                        {{ $application->description ?: 'Tidak ada deskripsi aplikasi.' }}
                                    </p>

                                    <div class="application-status">
                                        @if($application->is_active)
                                            <span class="status-badge status-active">
                                                <span class="status-dot"></span>
                                                Aktif
                                            </span>
                                        @else
                                            <span class="status-badge status-inactive">
                                                <span class="status-dot"></span>
                                                Nonaktif
                                            </span>
                                        @endif
                                    </div>

                                    <div
                                        class="application-url"
                                        title="{{ $application->url }}"
                                    >
                                        {{ $application->url }}
                                    </div>
                                </div>

                                <div class="application-action">
                                    <a
                                        href="{{ $application->url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="open-application-button {{ !$application->is_active ? 'inactive' : '' }}"
                                    >
                                        Buka Aplikasi
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div
                    class="empty-state"
                    id="emptySearch"
                    style="display: none;"
                >
                    <div class="empty-icon">
                        <svg
                            width="26"
                            height="26"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="11" cy="11" r="7"></circle>
                            <line x1="16.65" y1="16.65" x2="21" y2="21"></line>
                        </svg>
                    </div>

                    <h3 class="empty-title">
                        Aplikasi Tidak Ditemukan
                    </h3>

                    <p class="empty-text">
                        Tidak ada aplikasi yang cocok dengan pencarian.
                    </p>
                </div>

            @else

                <div class="empty-state">
                    <div class="empty-icon">
                        <svg
                            width="26"
                            height="26"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="11" cy="11" r="7"></circle>
                            <line x1="16.65" y1="16.65" x2="21" y2="21"></line>
                        </svg>
                    </div>

                    <h3 class="empty-title">
                        @if($search)
                            Aplikasi Tidak Ditemukan
                        @else
                            Belum Ada Aplikasi
                        @endif
                    </h3>

                    <p class="empty-text">
                        @if($search)
                            Tidak ada aplikasi yang cocok dengan pencarian "{{ $search }}".
                        @else
                            Belum ada aplikasi yang terdaftar.
                        @endif
                    </p>
                </div>

            @endif

        </div>

        <div class="applications-footer">
            Menampilkan
            <strong id="visibleCount">
                {{ $applications->count() }}
            </strong>
            aplikasi
            <span id="footerText">
                @if($search)
                    dari hasil pencarian.
                @else
                    yang terdaftar di dalam sistem.
                @endif
            </span>
        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('applicationSearch');
    const clearButton = document.getElementById('searchClear');
    const cards = Array.from(document.querySelectorAll('.application-card'));
    const emptySearch = document.getElementById('emptySearch');
    const searchResult = document.getElementById('searchResult');
    const visibleCount = document.getElementById('visibleCount');

    function performSearch() {
        if (!searchInput) return;

        const keyword = searchInput.value.toLowerCase().trim();
        let totalVisible = 0;

        if (keyword.length > 0) {
            clearButton.style.display = 'flex';
        } else {
            clearButton.style.display = 'none';
        }

        cards.forEach(function (card) {
            const name = card.dataset.name || '';
            const description = card.dataset.description || '';
            const match = name.includes(keyword) || description.includes(keyword);

            if (match) {
                card.classList.remove('hidden');
                totalVisible++;
            } else {
                card.classList.add('hidden');
            }
        });

        if (keyword !== '') {
            searchResult.style.display = 'block';
            searchResult.innerHTML = 'Menampilkan hasil pencarian untuk <strong>"' + escapeHtml(keyword) + '"</strong> — ditemukan <strong>' + totalVisible + '</strong> aplikasi.';
        } else {
            searchResult.style.display = 'none';
            searchResult.innerHTML = '';
        }

        if (emptySearch) {
            if (keyword !== '' && totalVisible === 0) {
                emptySearch.style.display = 'block';
            } else {
                emptySearch.style.display = 'none';
            }
        }

        if (visibleCount) {
            visibleCount.textContent = totalVisible;
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            performSearch();
        });

        searchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                const keyword = searchInput.value.trim();
                const url = new URL(window.location.href);

                if (keyword !== '') {
                    url.searchParams.set('search', keyword);
                } else {
                    url.searchParams.delete('search');
                }

                window.location.href = url.toString();
            }
        });
    }

    if (clearButton) {
        clearButton.addEventListener('click', function () {
            searchInput.value = '';
            performSearch();
            searchInput.focus();
        });
    }

    performSearch();
});
</script>
@endpush
