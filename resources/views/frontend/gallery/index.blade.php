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

    {{-- Gallery --}}
    <section class="galleryPage py-5">
        <div class="container">
            <div class="row g-4">

                @foreach ($images as $image)
                    <div class="col-lg-3 col-md-4 col-sm-6 galleryItem">
                        <div class="galleryCard">
                            <img src="{{ $image }}"
                                 alt="Gurukul Takshshila Gallery Image"
                                 loading="lazy">
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
