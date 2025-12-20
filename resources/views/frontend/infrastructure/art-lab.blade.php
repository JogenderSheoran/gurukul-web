<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')
    <x-seo
        title="Art Laboratory | Gurukul Takshshila"
        description="Creative Art Lab at Gurukul Takshshila for drawing, painting, sculpture and artistic expression."
        keywords="art lab, school art room, creative art education"
        image="{{ asset('assets/img/art-lab-banner.jpg') }}"
    />
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

<x-inner-banner
    title="Art Laboratory"
    subtitle="Nurturing Creativity & Artistic Expression"
/>

<section class="artIntro py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <span class="sectionTag">Creative Learning</span>
                <h2>Creative Art Laboratory</h2>
                <p>
                    The Art Lab at Gurukul Takshshila provides a creative space for students
                    to express ideas through drawing, painting and craft.
                </p>
                <p>
                    Art education helps develop imagination, confidence and emotional balance.
                </p>
            </div>
            <div class="col-lg-6 mb-4 text-center">
                <img src="https://picsum.photos/700/450?random=5001" class="img-fluid rounded-4 shadow" alt="Art Lab">
            </div>
        </div>
    </div>
</section>

<section class="artAmenities py-5 bg-light">
    <div class="container text-center">
        <h2>Art Lab Amenities</h2>
        <p class="mb-5">Facilities that inspire creativity and imagination</p>

        <div class="row align-items-stretch">
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🎨</div><h5>Drawing & Painting</h5><p>Colors, brushes and drawing materials.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🖌️</div><h5>Creative Tools</h5><p>Craft materials for innovative art projects.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🧑‍🎨</div><h5>Guided Art Sessions</h5><p>Art teachers nurture creativity.</p></div></div>
            <div class="col-lg-3 col-md-6 amenityCol"><div class="amenityCard"><div class="icon">🖼️</div><h5>Exhibition Space</h5><p>Display area for student artwork.</p></div></div>
        </div>
    </div>
</section>

<x-slider
    title="Art Lab Gallery"
    subtitle="Creative moments from our art laboratory"
    :images="[
        'https://picsum.photos/600/400?random=5101',
        'https://picsum.photos/600/400?random=5102',
        'https://picsum.photos/600/400?random=5103'
    ]"
/>

@include('frontend.include.footer')
</div>
@include('frontend.include.js')
</body>
</html>
