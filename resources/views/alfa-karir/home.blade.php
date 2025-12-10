<!-- resources/views/landing/home.blade.php -->
@extends('layouts.landing')

@section('title', 'Home - Alfamart Career')

@section('content')
<!-- Hero Carousel Section -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    @php
        $carouselItems = $home->whereIn('sub_section', ['image_1','image_2','image_3', 'image_4', 'image_5'])->values();
    @endphp
    
    <!-- Indicators - Dynamic based on actual items -->
    <div class="carousel-indicators">
        @foreach ($carouselItems as $index => $item)
            <button type="button" 
                    data-bs-target="#heroCarousel" 
                    data-bs-slide-to="{{ $index }}" 
                    class="{{ $index == 0 ? 'active' : '' }}"
                    aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}">
            </button>
        @endforeach
    </div>
    
    <!-- Slides -->
    <div class="carousel-inner">
        @foreach ($carouselItems as $index => $item)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="hero-slide"
                 style="background-image: url('{{ asset('storage/'.$item->image) }}');">

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
                                <input type="text"
                                       class="form-control border-0"
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
                    <img src="{{ asset('storage/'.$about['about_video_image']->image) }}" alt="Alfamart Building" class="img-fluid rounded shadow">
                    <a href="{{ $about['about_video']->url }}" class="video-play-button" target="_blank">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Timeline -->
        <div class="timeline-section mt-5">
            <img src="{{ asset('storage/'.$about['about_image']->image) }}" alt="Timeline Alfamart" class="img-fluid rounded ">
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Hero Carousel Styles */
.carousel {
    position: relative;
}

.hero-slide {
    height: 600px;
    background-size: cover;
    background-position: center;
    position: relative;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    pointer-events: none; /* Prevents overlay from blocking controls */
}

.hero-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
    padding: 0 20px;
    pointer-events: none; /* Allows clicks to pass through to controls */
}

.hero-content > * {
    pointer-events: auto; /* Re-enables clicks for content inside */
}

.hero-title {
    color: #ffc107;
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.hero-subtitle {
    color: white;
    font-size: 24px;
    margin-bottom: 40px;
}

/* Search Box */
.search-box {
    background: white;
    border-radius: 50px;
    padding: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: 1100px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.search-field {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 15px;
    border-right: 1px solid #dee2e6;
}

.search-field:last-of-type {
    border-right: none;
}

.search-input {
    flex: 1;
}

.search-field select,
.search-field input {
    border: none !important;
    box-shadow: none !important;
    outline: none !important;
}

.search-btn {
    background: #0d6efd;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    white-space: nowrap;
}

.search-btn:hover {
    background: #0b5ed7;
}

.btn-danger {
    background: #dc3545;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    white-space: nowrap;
    text-decoration: none;
}

.btn-danger:hover {
    background: #c82333;
}

/* Scroll Indicator */
.scroll-indicator {
    text-align: center;
    margin-top: 50px;
}

.scroll-indicator i {
    font-size: 24px;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* Carousel Indicators */
.carousel-indicators {
    z-index: 15; /* Ensures indicators are above content */
}

.carousel-indicators button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 5px;
}

/* Carousel Controls - IMPORTANT FIXES */
.carousel-control-prev,
.carousel-control-next {
    width: 5%; /* Better width for larger click area */
    z-index: 10; /* Ensures controls are above content but below indicators */
    opacity: 0.8;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    opacity: 1;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 3rem;
    height: 3rem;
    background-size: 100% 100%;
}

/* Add background circle to make controls more visible */
.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
    filter: drop-shadow(0 0 3px rgba(0,0,0,0.5));
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    filter: drop-shadow(0 0 3px rgba(0,0,0,0.5));
}

/* Responsive */
@media (max-width: 992px) {
    .hero-title {
        font-size: 36px;
    }
    
    .hero-subtitle {
        font-size: 18px;
    }
    
    .search-box {
        flex-direction: column;
        padding: 20px;
        border-radius: 20px;
    }
    
    .search-field {
        width: 100%;
        border-right: none;
        border-bottom: 1px solid #dee2e6;
        padding: 10px 0;
    }
    
    .search-field:last-of-type {
        border-bottom: none;
    }
    
    .search-btn,
    .btn-danger {
        width: 100%;
        margin: 5px 0 !important;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 10%;
    }
}

@media (max-width: 768px) {
    .hero-slide {
        height: 500px;
    }
    
    .hero-title {
        font-size: 28px;
    }
    
    .hero-subtitle {
        font-size: 16px;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 2rem;
        height: 2rem;
    }
}

/* About Section Styles */
.about-section {
    background-color: #f8f9fa;
}

.about-section h2 {
    font-size: 36px;
    color: #333;
}

.about-text {
    font-size: 16px;
    color: #555;
    line-height: 1.8;
}

.about-video {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
}

.about-video img {
    width: 100%;
    height: auto;
    display: block;
}

.video-play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: #ffc107;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
}

.video-play-button:hover {
    transform: translate(-50%, -50%) scale(1.1);
    background: #ffcd38;
}

.video-play-button i {
    color: white;
    font-size: 28px;
    margin-left: 5px;
}

.timeline-section {
    margin-top: 50px;
}

.timeline-section img {
    width: 100%;
    height: auto;
}

/* Responsive About Section */
@media (max-width: 768px) {
    .about-section h2 {
        font-size: 28px;
    }
    
    .about-text {
        font-size: 14px;
    }
    
    .video-play-button {
        width: 60px;
        height: 60px;
    }
    
    .video-play-button i {
        font-size: 20px;
    }
}
</style>
@endpush

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