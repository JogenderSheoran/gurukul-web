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
/>

<section class="biologyIntro py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <span class="sectionTag">Life Sciences</span>
                <h2>Well-Equipped Biology Laboratory</h2>
                <p>
                    The Biology Laboratory encourages students to explore the living world
                    through experiments, observations and microscopic studies.
                </p>
                <p>
                    Students gain practical exposure to anatomy, botany and zoology concepts.
                </p>
            </div>
            <div class="col-lg-6 mb-4 text-center">
                <img src="https://picsum.photos/700/450?random=4001" class="img-fluid rounded-4 shadow" alt="Biology Lab">
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

<x-slider
    title="Biology Lab Gallery"
    subtitle="Exploring life sciences through practical learning"
    :images="[
        'https://picsum.photos/600/400?random=4101',
        'https://picsum.photos/600/400?random=4102',
        'https://picsum.photos/600/400?random=4103'
    ]"
/>

@include('frontend.include.footer')
</div>
@include('frontend.include.js')
</body>
</html>
