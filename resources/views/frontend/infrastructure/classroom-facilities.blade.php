<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

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

    <!-- COMMON BANNER -->
    <x-inner-banner
        title="Classroom Facilities"
        subtitle="Modern, Spacious & Technology-Enabled Learning Spaces"
    />

    <!-- INTRO -->
    <section class="classroomIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Learning Environment</span>
                    <h2>Smart & Student-Friendly Classrooms</h2>

                    <p>
                        At Gurukul Takshshila, classrooms are designed to create an engaging,
                        disciplined, and distraction-free learning environment. Our well-planned
                        classroom infrastructure supports effective teaching and focused learning.
                    </p>

                    <p>
                        Spacious seating, natural ventilation, digital learning tools and
                        ergonomic furniture ensure students remain comfortable and attentive
                        throughout the academic day.
                    </p>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=201"
                        class="img-fluid rounded-4 shadow"
                        alt="Smart Classroom at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- CLASSROOM AMENITIES -->
    <section class="classroomAmenities py-5 bg-light">
        <div class="container text-center">
            <h2>Classroom Amenities</h2>
            <p class="mb-5">Facilities that enhance concentration, interaction and learning quality</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🖥</div>
                        <h5>Smart Boards</h5>
                        <p>Digital boards for interactive and visual learning.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">💺</div>
                        <h5>Ergonomic Seating</h5>
                        <p>Comfortable desks designed for long study hours.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🌬</div>
                        <h5>Proper Ventilation</h5>
                        <p>Well-lit and airy classrooms for fresh learning atmosphere.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🔊</div>
                        <h5>Audio-Visual Aids</h5>
                        <p>Projectors and sound systems for effective teaching.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CLASSROOM GALLERY (COMMON COMPONENT) -->
    <x-slider
        title="Classroom Gallery"
        subtitle="Explore our modern and well-equipped classrooms"
        :images="[
            'https://picsum.photos/600/400?random=301',
            'https://picsum.photos/600/400?random=302',
            'https://picsum.photos/600/400?random=303',
            'https://picsum.photos/600/400?random=304'
        ]"
    />

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')
</body>
</html>
