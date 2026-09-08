@extends('layouts.superadmin')

@section('title', 'Semua Aplikasi - Super Admin')

@push('styles')

<style>

    .all-applications-page {
        width: 100%;
        min-height: 100%;
    }

    .applications-page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 25px;
        margin-bottom: 25px;
    }

    .applications-page-title {
        margin: 0 0 7px;
        color: #10233f;
        font-size: 29px;
        font-weight: 750;
        line-height: 1.2;
    }

    .applications-page-subtitle {
        margin: 0;
        color: #6f8097;
        font-size: 13px;
        line-height: 1.6;
    }

    .portal-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 38px;
        padding: 0 17px;
        border: none;
        border-radius: 8px;
        background: #0f8278;
        color: #ffffff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: all .2s ease;
    }

    .portal-button:hover {
        background: #096c64;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .statistics-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 26px;
    }

    .statistics-card {
        min-height: 91px;
        padding: 18px 20px;
        background: #ffffff;
        border: 1px solid #dfe6ef;
        border-radius: 10px;
        box-shadow: 0 4px 14px rgba(18, 35, 63, .035);
    }

    .statistics-label {
        margin-bottom: 7px;
        color: #72839a;
        font-size: 12px;
        font-weight: 500;
    }

    .statistics-value {
        color: #0d8077;
        font-size: 27px;
        font-weight: 800;
        line-height: 1;
    }

    .statistics-card.inactive .statistics-value {
        color: #d13b3b;
    }

    .applications-section {
        background: #ffffff;
        border: 1px solid #dfe6ef;
        border-radius: 12px;
        box-shadow: 0 5px 18px rgba(18, 35, 63, .04);
        overflow: hidden;
    }

    .applications-search-area {
        padding: 19px 22px;
        border-bottom: 1px solid #e5eaf1;
        background: #ffffff;
    }

    .search-form {
        position: relative;
        width: 100%;
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        width: 17px;
        height: 17px;
        transform: translateY(-50%);
        color: #71829a;
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        height: 43px;
        padding: 0 45px 0 43px;
        border: 1px solid #d6dfeb;
        border-radius: 8px;
        outline: none;
        background: #ffffff;
        color: #263954;
        font-size: 12px;
        transition: all .2s ease;
    }

    .search-input::placeholder {
        color: #91a0b3;
    }

    .search-input:focus {
        border-color: #0f8278;
        box-shadow: 0 0 0 3px rgba(15, 130, 120, .08);
    }

    .search-clear {
        position: absolute;
        right: 13px;
        top: 50%;
        width: 24px;
        height: 24px;
        display: none;
        align-items: center;
        justify-content: center;
        transform: translateY(-50%);
        border: none;
        border-radius: 50%;
        background: #edf1f5;
        color: #65758b;
        text-decoration: none;
        font-size: 16px;
        line-height: 1;
        cursor: pointer;
    }

    .search-clear:hover {
        background: #dfe5ec;
        color: #263954;
    }

    .search-result {
        padding: 13px 23px 0;
        color: #71829a;
        font-size: 12px;
    }

    .search-result strong {
        color: #233650;
    }

    .applications-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
        padding: 22px;
    }

    .application-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        min-height: 335px;
        padding: 15px;
        background: #ffffff;
        border: 1px solid #dfe6ef;
        border-radius: 11px;
        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }

    .application-card:hover {
        transform: translateY(-3px);
        border-color: #c8d5e3;
        box-shadow: 0 9px 20px rgba(18, 35, 63, .08);
    }

    .application-card.hidden {
        display: none !important;
    }

    .application-logo {
        width: 100%;
        height: 108px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        background: #fafbfc;
        border: 1px solid #d7e0ea;
        border-radius: 9px;
        overflow: hidden;
    }

    .application-logo img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: contain;
        object-position: center;
    }

    .logo-placeholder {
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #e9f4f2;
        color: #0f8278;
        font-size: 24px;
        font-weight: 800;
    }

    .application-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding-top: 15px;
        text-align: center;
    }

    .application-name {
        margin: 0 0 7px;
        color: #10233f;
        font-size: 17px;
        font-weight: 750;
        line-height: 1.25;
        word-break: break-word;
    }

    .application-description {
        min-height: 39px;
        margin: 0;
        color: #71829a;
        font-size: 12px;
        line-height: 1.55;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    .application-status {
        display: flex;
        justify-content: center;
        margin-top: 13px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    .status-active {
        background: #d9f7e7;
        color: #087844;
    }

    .status-active .status-dot {
        background: #079447;
    }

    .status-inactive {
        background: #fde3e3;
        color: #b42318;
    }

    .status-inactive .status-dot {
        background: #d92d20;
    }

    .application-url {
        margin-top: 10px;
        color: #3472b9;
        font-size: 10px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .application-action {
        margin-top: 15px;
    }

    .open-application-button {
        width: 100%;
        min-height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border-radius: 8px;
        background: #0f8278;
        color: #ffffff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: all .2s ease;
    }

    .open-application-button:hover {
        background: #096c64;
        color: #ffffff;
        box-shadow: 0 5px 12px rgba(15, 130, 120, .18);
    }

    .open-application-button.inactive {
        background: #7d8998;
    }

    .open-application-button.inactive:hover {
        background: #687585;
    }

    .empty-state {
        padding: 70px 25px;
        text-align: center;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #edf4f3;
        color: #0f8278;
        font-size: 24px;
    }

    .empty-title {
        margin: 0 0 7px;
        color: #253751;
        font-size: 17px;
        font-weight: 700;
    }

    .empty-text {
        margin: 0;
        color: #7a899c;
        font-size: 12px;
    }

    .applications-footer {
        padding: 14px 23px;
        border-top: 1px solid #e5eaf1;
        color: #71829a;
        font-size: 11px;
    }

    .applications-footer strong {
        color: #253751;
    }

    @media (max-width: 1250px) {
        .applications-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 1000px) {
        .all-applications-page {
            padding: 28px 25px 40px;
        }

        .applications-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .applications-page-header {
            flex-direction: column;
        }

        .portal-button {
            align-self: flex-start;
        }

        .statistics-grid {
            grid-template-columns: 1fr;
        }

        .applications-grid {
            grid-template-columns: 1fr;
        }

        .all-applications-page {
            padding: 22px 15px 35px;
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
                    <circle
                        cx="11"
                        cy="11"
                        r="7"
                    ></circle>

                    <line
                        x1="16.65"
                        y1="16.65"
                        x2="21"
                        y2="21"
                    ></line>
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

                            <div class="application-action">

                                <a
                                    href="{{ $application->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="open-application-button {{ !$application->is_active ? 'inactive' : '' }}"
                                >
                                    🚀 Buka Aplikasi
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
                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        ></circle>

                        <line
                            x1="16.65"
                            y1="16.65"
                            x2="21"
                            y2="21"
                        ></line>
                    </svg>

                </div>

                <h3 class="empty-title">
                    Aplikasi Tidak Ditemukan
                </h3>

                <p class="empty-text">
                    Tidak ada aplikasi yang cocok dengan pencarian.
                </p>

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
                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        ></circle>

                        <line
                            x1="16.65"
                            y1="16.65"
                            x2="21"
                            y2="21"
                        ></line>
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

                        Tidak ada aplikasi yang cocok dengan
                        pencarian "{{ $search }}".

                    @else

                        Belum ada aplikasi yang terdaftar.

                    @endif

                </p>

            </div>

        @endif

    </div>

</div>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('applicationSearch');

    const clearButton =
        document.getElementById('searchClear');

    const searchForm =
        document.getElementById('searchForm');

    const cards =
        Array.from(
            document.querySelectorAll('.application-card')
        );

    const emptySearch =
        document.getElementById('emptySearch');

    const searchResult =
        document.getElementById('searchResult');

    const visibleCount =
        document.getElementById('visibleCount');

    function performSearch() {

        if (!searchInput) {
            return;
        }

        const keyword =
            searchInput.value
                .toLowerCase()
                .trim();

        let totalVisible = 0;

        if (keyword.length > 0) {

            clearButton.style.display = 'flex';

        } else {

            clearButton.style.display = 'none';

        }

        cards.forEach(function (card) {

            const name =
                card.dataset.name || '';

            const description =
                card.dataset.description || '';

            const match =
                name.includes(keyword) ||
                description.includes(keyword);

            if (match) {

                card.classList.remove('hidden');

                totalVisible++;

            } else {

                card.classList.add('hidden');

            }

        });

        if (keyword !== '') {

            searchResult.style.display = 'block';

            searchResult.innerHTML =
                'Menampilkan hasil pencarian untuk ' +
                '<strong>"' +
                escapeHtml(keyword) +
                '"</strong>' +
                ' — ditemukan ' +
                '<strong>' +
                totalVisible +
                '</strong>' +
                ' aplikasi.';

        } else {

            searchResult.style.display = 'none';

            searchResult.innerHTML = '';

        }

        if (
            keyword !== '' &&
            totalVisible === 0
        ) {

            emptySearch.style.display = 'block';

        } else {

            emptySearch.style.display = 'none';

        }

                    } else {

                        url.searchParams.delete(
                            'search'
                        );

                    }

                    window.location.href =
                        url.toString();

                }

            }
        );

    }

    if (cl

@endpush
