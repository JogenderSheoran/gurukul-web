<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <x-seo
        title="{{ $seo['title'] }}"
        description="{{ $seo['description'] }}"
        keywords="{{ $seo['keywords'] }}"
        image="{{ $seo['image'] }}"
    />
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    {{-- Adventure & Celebrations Section --}}
    @if($adventureCelebrations && count($adventureCelebrations) > 0)
    <section class="adventureCelebrations py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Adventure Trips & Celebrations</h2>
            <p class="text-center mb-5">Explore our exciting adventures and memorable celebrations</p>
            <div class="row g-4">
                @foreach($adventureCelebrations as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="adventureCard">
                        @if($item->card_image)
                            <img src="{{ asset('storage/' . $item->card_image) }}" alt="{{ $item->title }}" class="img-fluid rounded mb-3">
                        @else
                            <img src="{{ asset('img/logo.png') }}" alt="{{ $item->title }}" class="img-fluid rounded mb-3">
                        @endif
                        <h6 class="text-center">{{ $item->title }}</h6>
                        <p class="text-center">
                            <span class="badge {{ $item->section_type == 'adventure' ? 'badge-info' : 'badge-warning' }}">
                                {{ ucfirst($item->section_type) }}
                            </span>
                        </p>
                        @if($item->gallery_link)
                            <div class="text-center">
                                <a href="{{ $item->gallery_link }}" target="_blank" class="btn btn-sm btn-orange">
                                    <i class="fas fa-external-link-alt"></i> View Gallery
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Gallery --}}
    <section class="galleryPage py-5">
        <div class="container">
            <h2 class="text-center mb-4">Photo Gallery</h2>
            <p class="text-center mb-5">Moments captured at Gurukul Takshshila</p>
            <div class="row g-4">

                @foreach ($images as $image)
                    <div class="col-lg-3 col-md-4 col-sm-6 galleryItem">
                        <div class="galleryCard">
                            @if(is_array($image))
                                <img src="{{ $image['url'] }}"
                                     alt="{{ $image['title'] ?? 'Gurukul Takshshila Gallery Image' }}"
                                     title="{{ $image['title'] ?? '' }}"
                                     loading="lazy">
                            @else
                                <img src="{{ $image }}"
                                     alt="Gurukul Takshshila Gallery Image"
                                     loading="lazy">
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')

{{-- Gallery Styles --}}
<style>
/* Adventure Card Styles */
.adventureCard {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.adventureCard:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.15);
}

.adventureCard img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

.adventureCard h6 {
    font-weight: 600;
    margin: 15px 0 10px;
    color: #333;
}

.btn-orange {
    background: #ff8a00;
    color: #fff;
    border: none;
    padding: 8px 20px;
    border-radius: 6px;
    transition: background 0.3s ease;
}

.btn-orange:hover {
    background: #e67a00;
    color: #fff;
}

.badge-info {
    background: #17a2b8;
    color: #fff;
    padding: 5px 12px;
    border-radius: 4px;
}

.badge-warning {
    background: #ffc107;
    color: #333;
    padding: 5px 12px;
    border-radius: 4px;
}

/* Spacing fix */
.galleryItem {
    margin-bottom: 24px;
}

/* Card base */
.galleryCard {
    position: relative;
    overflow: hidden;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 12px 32px rgba(0,0,0,0.12);

    /* Entry animation */
    opacity: 0;
    transform: translateY(-30px);
    animation: slideDownFade 0.8s ease forwards;
}

/* Stagger animation */
.galleryItem:nth-child(1)  .galleryCard { animation-delay: 0.05s; }
.galleryItem:nth-child(2)  .galleryCard { animation-delay: 0.10s; }
.galleryItem:nth-child(3)  .galleryCard { animation-delay: 0.15s; }
.galleryItem:nth-child(4)  .galleryCard { animation-delay: 0.20s; }
.galleryItem:nth-child(5)  .galleryCard { animation-delay: 0.25s; }
.galleryItem:nth-child(6)  .galleryCard { animation-delay: 0.30s; }
.galleryItem:nth-child(7)  .galleryCard { animation-delay: 0.35s; }
.galleryItem:nth-child(8)  .galleryCard { animation-delay: 0.40s; }
.galleryItem:nth-child(9)  .galleryCard { animation-delay: 0.45s; }
.galleryItem:nth-child(10) .galleryCard { animation-delay: 0.50s; }

/* Image */
.galleryCard img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease, filter 0.6s ease;
}

/* Hover zoom */
.galleryCard:hover img {
    transform: scale(1.12);
    filter: brightness(0.85);
}

/* Overlay */
.galleryCard::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.45),
        rgba(0,0,0,0)
    );
    opacity: 0;
    transition: opacity 0.4s ease;
}

.galleryCard:hover::after {
    opacity: 1;
}

/* Entry animation keyframes */
@keyframes slideDownFade {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

</body>
</html>
