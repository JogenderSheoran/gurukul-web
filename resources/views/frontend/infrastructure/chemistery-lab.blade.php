<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')
    <x-seo
        title="Chemistry Laboratory | Gurukul Takshshila"
        description="Well-equipped Chemistry Laboratory at Gurukul Takshshila with modern apparatus, safe experiments and hands-on chemical learning."
        keywords="chemistry lab, school chemistry laboratory, practical chemistry learning"
        image="{{ asset('assets/img/chemistry-lab-banner.jpg') }}"
    />
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

<x-inner-banner
    title="Chemistry Laboratory"
    subtitle="Exploring Chemistry Through Safe & Practical Experiments"
    pageKey="chemistry-lab"
/>

<section class="chemistryIntro py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <span class="sectionTag">Science Education</span>
                <h2>Advanced Chemistry Laboratory</h2>
                @if($lab && $lab->description)
                    <div>
                        {!! $lab->description !!}
                    </div>
                @else
                    <p>
                        Our Chemistry Laboratory enables students to understand chemical concepts
                        through observation, experimentation and analysis in a safe environment.
                    </p>
                    <p>
                        Proper safety measures, modern equipment and guided supervision make
                        chemistry learning engaging and effective.
                    </p>
                @endif
            </div>
            <div class="col-lg-6 mb-4 text-center">
                @if($lab && $lab->main_banner)
                    <img src="{{ asset('storage/' . $lab->main_banner) }}" class="img-fluid rounded-4 shadow" alt="Chemistry Lab">
                @else
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-4 shadow" alt="Chemistry Lab">
                @endif
            </div>
        </div>
    </div>
</section>

<section class="chemistryAmenities py-5 bg-light">
    <div class="container text-center">
        <h2>Chemistry Lab Amenities</h2>
        <p class="mb-5">Safe and structured practical learning facilities</p>

        <div class="row align-items-stretch">
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🧪</div><h5>Modern Glassware</h5><p>Beakers, flasks and lab equipment for experiments.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🔥</div><h5>Chemical Reactions</h5><p>Hands-on experience with safe chemical reactions.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🧯</div><h5>Safety Equipment</h5><p>Fire extinguishers, goggles and lab coats.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">👨‍🏫</div><h5>Expert Supervision</h5><p>Qualified teachers guide every experiment.</p></div></div>
        </div>
    </div>
</section>

@if($lab && $lab->slider_images && is_array($lab->slider_images) && count($lab->slider_images) > 0)
<x-slider
    title="Chemistry Lab Gallery"
    subtitle="Hands-on chemistry experiments in action"
    :images="collect($lab->slider_images)->map(fn($img) => asset('storage/' . $img))->toArray()"
/>
@endif

@include('frontend.include.footer')
</div>
@include('frontend.include.js')
</body>
</html>
