<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <!-- SEO -->
    <x-seo
        :title="$seo['title']"
        :description="$seo['description']"
        :keywords="$seo['keywords']"
        :image="$seo['image']"
    />
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- COMMON BANNER (H1) -->
    <x-inner-banner
        title="Library Facilities"
        subtitle="A Knowledge-Rich & Peaceful Learning Environment"
    />

    <!-- INTRO SECTION -->
    <section class="libraryIntro py-5">
        <div class="container">
            @if($section)
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Knowledge Hub</span>
                    <h2>Well-Equipped School Library</h2>

                    <div>
                        {!! $section->description !!}
                    </div>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="{{ asset('storage/' . $section->main_image) }}"
                        class="img-fluid rounded-4 shadow"
                        alt="School Library at Gurukul Takshshila"
                    >
                </div>

            </div>
            @else
            <div class="row align-items-center">
                <div class="col-lg-12 mb-4 text-center">
                    <p class="text-muted">Content not available at the moment.</p>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- LIBRARY AMENITIES -->
    <section class="libraryAmenities py-5 bg-light">
        <div class="container text-center">
            <h2>Library Amenities</h2>
            <p class="mb-5">Facilities designed to promote focused reading and research</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">📚</div>
                        <h5>Extensive Book Collection</h5>
                        <p>
                            Academic, reference and competitive exam books across subjects.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">💻</div>
                        <h5>Digital Resources</h5>
                        <p>
                            Access to digital content, e-learning material and encyclopedias.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🪑</div>
                        <h5>Quiet Reading Area</h5>
                        <p>
                            Comfortable seating with a calm and distraction-free environment.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🧑‍🏫</div>
                        <h5>Guided Supervision</h5>
                        <p>
                            Library staff assists students in research and book selection.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- LIBRARY GALLERY (COMMON SLIDER COMPONENT) -->
    @if($section && $section->slider_images && count($section->slider_images) > 0)
    <x-slider
        title="Library Gallery"
        subtitle="Explore our calm and resource-rich library spaces"
        :images="collect($section->slider_images)->map(fn($img) => asset('storage/' . $img))->toArray()"
    />
    @endif

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')
<style>
    .sectionTag{
    font-size:13px;
    color:#ff8a00;
    font-weight:600;
    margin-bottom:8px;
    display:inline-block;
}

.amenityCard{
    height:100%;
    background:#fff;
    padding:30px 20px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    text-align:center;
    transition:.3s;
}

.amenityCard:hover{
    transform:translateY(-6px);
}

.amenityCard .icon{
    font-size:36px;
    margin-bottom:12px;
}

.amenityCard h5{
    font-weight:700;
    margin-bottom:10px;
}

.amenityCard p{
    font-size:14px;
    margin-top:auto;
}
</style>
</body>
</html>
