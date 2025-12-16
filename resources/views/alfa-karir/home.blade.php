<!-- resources/views/landing/home.blade.php -->
@extends('layouts.landing')

@section('title', 'Home - Alfamart Career')

@section('content')
    <!-- Hero Carousel Section -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        @php
            $carouselItems = $home
                ->whereIn('sub_section', ['image_1', 'image_2', 'image_3', 'image_4', 'image_5'])
                ->values();
        @endphp

        <!-- Indicators - Dynamic based on actual items -->
        <div class="carousel-indicators">
            @foreach ($carouselItems as $index => $item)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}">
                </button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach ($carouselItems as $index => $item)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="hero-slide" style="background-image: url('{{ asset('storage/' . $item->image) }}');">

                        <div class="hero-overlay"></div>

                        <div class="hero-content">
                            <div class="container">

                                <h1 class="hero-title">
                                    {{ $item->title ?? '#JumpAndGrowWithUs' }}
                                </h1>

                                <p class="hero-subtitle">
                                    {{ $item->subtitle ?? 'Temukan Pekerjaan Impianmu di Alfamart!' }}
                                </p>

                                <!-- Search Box -->
                                <div class="search-box">
                                    <div class="search-field">
                                        <i class="fas fa-map-marker-alt text-muted"></i>
                                        <select class="form-select border-0">
                                            <option>Semua Lokasi</option>
                                            <option>Jakarta</option>
                                            <option>Bandung</option>
                                            <option>Surabaya</option>
                                        </select>
                                    </div>

                                    <div class="search-field">
                                        <i class="fas fa-briefcase text-muted"></i>
                                        <select class="form-select border-0">
                                            <option>Divisi</option>
                                            <option>IT</option>
                                            <option>Finance</option>
                                            <option>Operations</option>
                                        </select>
                                    </div>

                                    <div class="search-field search-input">
                                        <i class="fas fa-search text-muted"></i>
                                        <input type="text" class="form-control border-0"
                                            placeholder="Ketik role favorit anda">
                                    </div>

                                    <button class="btn btn-primary search-btn">Cari</button>
                                    <a href="#" class="btn btn-danger ms-2">Semua Lowongan</a>
                                </div>

                                <div class="scroll-indicator">
                                    <p class="text-white mb-2">Geser untuk detail Alfamart</p>
                                    <i class="fas fa-computer-mouse text-white"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- About Section -->
    <section class="about-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">{{ $about['about_title']->text ?? '' }}</h2>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <p class="about-text" style="text-align: justify; line-height: 1.8;">
                        {{ $about['about_desc']->text ?? '' }}
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="about-video">
                        <img src="{{ asset('storage/' . $about['about_video_image']->image) }}" alt="Alfamart Building"
                            class="img-fluid rounded shadow">
                        <a href="{{ $about['about_video']->url }}" class="video-play-button" target="_blank">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="timeline-section mt-5">
                <img src="{{ asset('storage/' . $about['about_image']->image) }}" alt="Timeline Alfamart"
                    class="img-fluid rounded ">
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="core-values-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">{{ $core_values['core_values_title']->text ?? 'Core Values (2i & 3k)' }}
            </h2>

            <div class="core-values-grid">
                <!-- Core Value 1 -->
                @if (isset($core_values['core_values_image_1']) &&
                        File::exists(public_path('storage/' . $core_values['core_values_image_5']->image)))
                    <div class="core-value-item">
                        <img src="{{ asset('storage/' . $core_values['core_values_image_1']->image) }}"
                            alt="Integritas Yang Tinggi" class="img-fluid">
                    </div>
                @endif

                <!-- Core Value 2 -->
                @if (isset($core_values['core_values_image_2']) &&
                        File::exists(public_path('storage/' . $core_values['core_values_image_5']->image)))
                    <div class="core-value-item">
                        <img src="{{ asset('storage/' . $core_values['core_values_image_2']->image) }}"
                            alt="Inovasi untuk kemajuan yang lebih baik" class="img-fluid">
                    </div>
                @endif

                <!-- Core Value 3 -->
                @if (isset($core_values['core_values_image_3']) &&
                        File::exists(public_path('storage/' . $core_values['core_values_image_5']->image)))
                    <div class="core-value-item">
                        <img src="{{ asset('storage/' . $core_values['core_values_image_3']->image) }}"
                            alt="Kualitas & Produktivitas yang tertinggi" class="img-fluid">
                    </div>
                @endif

                <!-- Core Value 4 -->
                @if (isset($core_values['core_values_image_4']) &&
                        File::exists(public_path('storage/' . $core_values['core_values_image_5']->image)))
                    <div class="core-value-item">
                        <img src="{{ asset('storage/' . $core_values['core_values_image_4']->image) }}"
                            alt="Kerja sama tim" class="img-fluid">
                    </div>
                @endif

                <!-- Core Value 5 -->
                @if (isset($core_values['core_values_image_5']) &&
                        File::exists(public_path('storage/' . $core_values['core_values_image_5']->image)))
                    <div class="core-value-item">
                        <img src="{{ asset('storage/' . $core_values['core_values_image_5']->image) }}"
                            alt="Kepuasan pelanggan melalui standar pelayanan yang terbaik" class="img-fluid">
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Kata Alfanesia Section -->
    <section class="kata-alfanesia-section py-5">
        <div class="container">
            <div id="kataAlfanesiaCarousel" class="carousel slide" data-bs-ride="carousel">
                @php
                    // Collect all kata alfanesia images that exist
                    $kataAlfanesiaItems = [];
                    for ($i = 1; $i <= 10; $i++) {
                        $key = 'image_' . $i;
                        if (
                            isset($kata_alfanesia[$key]) &&
                            !empty($kata_alfanesia[$key]->image) &&
                            File::exists(public_path('storage/' . $kata_alfanesia[$key]->image))
                        ) {
                            $kataAlfanesiaItems[] = $kata_alfanesia[$key];
                        }
                    }
                @endphp

                @if (count($kataAlfanesiaItems) > 0)
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach ($kataAlfanesiaItems as $index => $item)
                            <button type="button" data-bs-target="#kataAlfanesiaCarousel"
                                data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"
                                aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach ($kataAlfanesiaItems as $index => $item)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="kata-alfanesia-slide">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->title ?? 'Kata Alfanesia ' . ($index + 1) }}" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#kataAlfanesiaCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#kataAlfanesiaCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @else
                    <div class="alert alert-info text-center">
                        Belum ada data Kata Alfanesia
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Join Us Section -->
    <section class="join-us-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">{{ $tagline_join['title']->text }}</h2>
                <p class="text-muted fs-5">{{ $tagline_join['sub_title']->text }}</p>
            </div>

            <div class="row g-4 mb-5">
                <!-- Operation Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="join-card">
                        <div class="join-card-icon">
                            <img src="{{ asset('images/icon_OPERATION.png') }}" alt="Operation">
                        </div>
                        <h3 class="join-card-title">Operation</h3>
                        <a href="#" class="join-card-link">10 Posisi</a>
                    </div>
                </div>

                <!-- Finance Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="join-card">
                        <div class="join-card-icon">
                            <img src="{{ asset('images/icon_FINANCE.png') }}" alt="Finance">
                        </div>
                        <h3 class="join-card-title">Finance</h3>
                        <a href="#" class="join-card-link">10 Posisi</a>
                    </div>
                </div>

                <!-- Franchise Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="join-card">
                        <div class="join-card-icon">
                            <img src="{{ asset('images/icon_FRANCHISE.png') }}" alt="Franchise">
                        </div>
                        <h3 class="join-card-title">Franchise</h3>
                        <a href="#" class="join-card-link">10 Posisi</a>
                    </div>
                </div>
            </div>

            <!-- Lowongan Lain Button -->
            <div class="text-center">
                <button class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Lowongan Lain</button>
            </div>
        </div>
    </section>

    <!-- Branch Locations Section -->
    <section class="branch-locations-section py-5">
        <!-- Header with Icon - Inside container for padding -->
        <div class="container">
            <div class="text-center mb-4">
                <div class="location-icon-wrapper mb-3">
                    <img src="{{ asset('images/App-HC_Area Wilayah.png') }}" alt="Location Icon" class="location-icon">
                </div>
                <h2 class="fw-bold">
                    Terdapat 32 Cabang di Indonesia menjadi Kerja lebih dekat dengan tempat tinggalmu
                </h2>
            </div>
        </div>

        <!-- Map Container - Full width, no container -->
        <div class="map-container position-relative">
            <img src="{{ asset('images/indonesia-map.png') }}" alt="Indonesia Map" class="map-image">

            <!-- Search Controls Overlay - Bottom -->
            <div class="map-search-overlay">
                <div class="d-flex gap-2 justify-content-center align-items-center flex-wrap">
                    <select class="form-select map-select">
                        <option selected>- Kota/Kabupaten -</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="medan">Medan</option>
                        <option value="semarang">Semarang</option>
                    </select>

                    <select class="form-select map-select">
                        <option selected>- Kecamatan -</option>
                        <option value="1">Kecamatan 1</option>
                        <option value="2">Kecamatan 2</option>
                        <option value="3">Kecamatan 3</option>
                    </select>

                    <button class="btn btn-primary btn-search">Cari</button>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">FAQ</h2>

            <div class="accordion faq-accordion" id="faqAccordion">
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                            Bagaimana cara melamar pekerjaan di Alfamart?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Anda dapat melamar pekerjaan di Alfamart melalui website resmi kami dengan mengisi formulir
                            aplikasi online. Pastikan Anda melengkapi semua data yang diperlukan dan mengunggah dokumen
                            pendukung seperti CV dan surat lamaran.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                            Apakah ada lowongan pekerjaan untuk lulusan SMA/SMK?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, Alfamart menyediakan berbagai lowongan untuk lulusan SMA/SMK, khususnya untuk posisi Store
                            Crew, Kasir, dan posisi entry-level lainnya. Kami percaya bahwa setiap orang memiliki
                            kesempatan untuk berkembang bersama kami.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                            Apakah ada lowongan pekerjaan yang dekat dengan rumah/domisili saya?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Alfamart memiliki lebih dari 32 cabang di seluruh Indonesia. Anda dapat menggunakan fitur
                            pencarian lokasi di website kami untuk menemukan lowongan yang tersedia di area terdekat dengan
                            domisili Anda.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                            Apakah proses interview dilaksanakan secara Online atau Offline?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Proses interview dapat dilaksanakan secara online maupun offline, tergantung pada posisi yang
                            dilamar dan kebijakan perusahaan saat itu. Tim HR kami akan menginformasikan detail proses
                            interview kepada kandidat yang lolos tahap seleksi administrasi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Initialize carousel with better configuration
        document.addEventListener('DOMContentLoaded', function() {
            var carouselElement = document.getElementById('heroCarousel');

            if (carouselElement) {
                var carousel = new bootstrap.Carousel(carouselElement, {
                    interval: 5000,
                    ride: 'carousel',
                    pause: 'hover',
                    wrap: true,
                    keyboard: true,
                    touch: true
                });

                // Debug: Log carousel events
                carouselElement.addEventListener('slide.bs.carousel', function(e) {
                    console.log('Sliding to:', e.to);
                });

                carouselElement.addEventListener('slid.bs.carousel', function(e) {
                    console.log('Slid to:', e.to);
                });
            }
        });
    </script>
@endpush
