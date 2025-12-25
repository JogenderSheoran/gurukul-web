<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')
    <x-seo
        title="Biology Laboratory | Gurukul Takshshila"
        description="Modern Biology Laboratory at Gurukul Takshshila with microscopes, specimens and practical life science learning."
        keywords="biology lab, school biology laboratory, life science lab"
        image="{{ asset('assets/img/biology-lab-banner.jpg') }}"
    />
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

<x-inner-banner
    title="Biology Laboratory"
    subtitle="Understanding Life Through Observation & Experiments"
    pageKey="biology-lab"
/>

<section class="biologyIntro py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <span class="sectionTag">Life Sciences</span>
                <h2>Well-Equipped Biology Laboratory</h2>
                @if($lab && $lab->description)
                    <div>
                        {!! $lab->description !!}
                    </div>
                @else
                    <p>
                        The Biology Laboratory encourages students to explore the living world
                        through experiments, observations and microscopic studies.
                    </p>
                    <p>
                        Students gain practical exposure to anatomy, botany and zoology concepts.
                    </p>
                @endif
            </div>
            <div class="col-lg-6 mb-4 text-center">
                @if($lab && $lab->main_banner)
                    <img src="{{ asset('storage/' . $lab->main_banner) }}" class="img-fluid rounded-4 shadow" alt="Biology Lab">
                @else
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-4 shadow" alt="Biology Lab">
                @endif
            </div>
        </div>
    </div>
</section>

<section class="biologyAmenities py-5 bg-light">
    <div class="container text-center">
        <h2>Biology Lab Amenities</h2>
        <p class="mb-5">Hands-on life science learning facilities</p>

        <div class="row align-items-stretch">
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🔬</div><h5>Microscopes</h5><p>Advanced microscopes for specimen observation.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🌱</div><h5>Botany Studies</h5><p>Plant structure and growth experiments.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🧬</div><h5>Anatomy Models</h5><p>Human and animal anatomy models.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">👨‍🏫</div><h5>Guided Learning</h5><p>Expert teachers guide practical sessions.</p></div></div>
        </div>
    </div>
</section>

@if($lab && $lab->slider_images && is_array($lab->slider_images) && count($lab->slider_images) > 0)
<x-slider
    title="Biology Lab Gallery"
    subtitle="Exploring life sciences through practical learning"
    :images="collect($lab->slider_images)->map(fn($img) => asset('storage/' . $img))->toArray()"
/>
@endif

@include('frontend.include.footer')
</div>
@include('frontend.include.js')
</body>
</html>
