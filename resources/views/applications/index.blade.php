<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Aplikasi RSU Syifa Medika</title>
    <!-- M

    <main>
        <!-- HERO SECTION -->
        <section class="hero-wrapper" id="beranda">
            <div class="hero-container">
                <div class="hero-text">
                    <div class="hero-brand">
                        <img src="{{ asset('images/logosyifa.png') }}" alt="RSU Syifa Medika" class="rsu-logo">
                    </div>
                    <h1>Pusat Akses Terpadu Seluruh Aplikasi<br>RSU Syifa Medika Banjarbaru</h1>
                    <p class=
            </div>

            <!-- Judul Aplikasi Populer -->
            <div class="popular-title-box" id="aplikasi-populer">
                <h2>Aplikasi Populer</h2>
            </div>
        </section>

        <!-- APLIKASI POPULER SECTION -->
        <section class="popular-green-section">
            <div class="po
                                    <span class="fallback-icon">📱</span>
                                @endif
                            </div>
                            <div class="popular-card-bottom">
                                <div class="badge-rank rank-{{ $loop->iteration }}">
                                    {{ $loop->iteration }}
                                </div>
                                <h3>{{ $application->name }}</h3>
                                <p>{{ $application->description ?: 'Mendaftarkan Diri untuk Pemeriksaan' }}</p>
                                <a href="{{ route('applications.open', $application) }}" class="btn-open">Buka Aplikasi</a>
                            </div>
                        </div>
                    @empty
                        <div class="empty text-white">Belum ada data aplikasi populer.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- SEMUA APLIKASI SECTION -->
        <section class="all-apps-section" id="semua-aplikasi">
            <div class="all-apps-container">
                <h2 class="section-title text-dark">Semua Aplikasi</h2>
                <div class="applications-grid">
                    @forelse($applications as $application)
                        <div class="app-card">
                            <div class="app-card-header">
                                @if($application->icon)
                                    <img src="{{ asset('storage/' . $application->icon) }}" alt="{{ $application->name }}">
                                @else
                                    <div class="placeholder-box"></div>
                                @endif
                            </div>
                            <div class="app-card-body">
                                <h3>{{ $application->name }}</h3>
                                <p>{{ $application->description ?: 'Mendaftarkan Diri untuk Pemeriksaan' }}</p>
                                <a href="{{ route('applications.open', $application) }}" class="btn-open">Buka Aplikasi</a>
                            </div>
                        </div>
                    @empty
                        <div class="empty">Belum ada aplikasi tersedia.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bottom-green-footer"></footer>
    </main>

    <script>
        const storageUrl = @json(asset('storage'));

        async function loadPopularApplications() {
            try {
                const response = await fetch('{{ route('applications.popular') }}', {
                    headers: { 'Accept': 'application/json' },
                    cache: 'no-store'
                });
                if (!response.ok) return;

                const applications = await response.json();
                const popularList = document.getElementById('popularApplicationsList');
                if (!popularList || !applications.length) return;

                popularList.innerHTML = applications.slice(0, 3).map((application, index) => {
                    const logoUrl = application.icon
                        ? (application.icon.startsWith('http') ? application.icon : `${storageUrl}/${application.icon}`)
                        : null;
                    const name = application.name || 'SiLapor';
                    const description = application.description || 'Mendaftarkan Diri untuk Pemeriksaan';
                    const logo = logoUrl ? `<img src="${logoUrl}" alt="${escapeHtml(name)}">` : '<span class="fallback-icon">📱</span>';

                    return `
                        <div class="popular-card" data-application-id="${application.id}">
                            <div class="popular-card-top">
                                ${logo}
                            </div>
                            <div class="popular-card-bottom">
                                <div class="badge-rank rank-${index + 1}">
                                    ${index + 1}
                                </div>
                                <h3>${escapeHtml(name)}</h3>
                                <p>${escapeHtml(description)}</p>
                                <a href="{{ url('/applications') }}/${application.id}/open" class="btn-open">Buka Aplikasi</a>
                            </div>
                        </div>
                    `;
                }).join('');
            } catch (error) {
                console.error('Error updating popular applications:', error);
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
        @endif
    </script>
</body>
</html>