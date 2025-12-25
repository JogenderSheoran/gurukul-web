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
        title="Smart Classrooms"
        subtitle="Virtual & Interactive Board Enabled Learning"
        pageKey="virtual-and-interactive-board-smart-classrooms"
    />

    <!-- INTRO -->
    <section class="smartIntro py-5">
        <div class="container">
            @if($section)
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Digital Learning</span>
                    <h2>Virtual & Interactive Board Smart Classrooms</h2>

                    <div>
                        {!! $section->description !!}
                    </div>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="{{ asset('storage/' . $section->main_image) }}"
                        class="img-fluid rounded-4 shadow"
                        alt="Smart Classroom with Interactive Board at Gurukul Takshshila"
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

    <!-- SMART CLASSROOM AMENITIES -->
    <section class="smartAmenities py-5 bg-light">
        <div class="container text-center">
            <h2>Smart Classroom Amenities</h2>
            <p class="mb-5">Technology-driven facilities that enhance teaching and learning</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🖥️</div>
                        <h5>Interactive Smart Boards</h5>
                        <p>Touch-enabled boards for dynamic and interactive lessons.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">📽️</div>
                        <h5>High-Resolution Projectors</h5>
                        <p>Clear visuals for videos, presentations and digital content.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🔊</div>
                        <h5>Audio-Visual Learning</h5>
                        <p>Integrated sound systems for effective communication.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🌐</div>
                        <h5>Internet Enabled Classrooms</h5>
                        <p>Access to digital resources and online learning tools.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">📊</div>
                        <h5>Digital Learning Content</h5>
                        <p>Animated lessons, simulations and multimedia materials.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">💺</div>
                        <h5>Ergonomic Seating</h5>
                        <p>Comfortable seating designed for focused learning.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">💡</div>
                        <h5>Well-lit Environment</h5>
                        <p>Proper lighting to reduce eye strain and fatigue.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">👨‍🏫</div>
                        <h5>Teacher-Controlled Systems</h5>
                        <p>Teachers manage digital tools for smooth classroom flow.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="smartBenefits py-5">
        <div class="container">
            <h2 class="text-center mb-4">Benefits of Smart Classrooms</h2>

            <ul class="benefitsList">
                <li>Improves conceptual clarity through visual learning</li>
                <li>Encourages student interaction and participation</li>
                <li>Makes complex topics easy to understand</li>
                <li>Supports different learning styles</li>
                <li>Enhances teacher effectiveness</li>
                <li>Prepares students for digital future</li>
            </ul>
        </div>
    </section>

    <!-- SMART CLASSROOM GALLERY (COMMON SLIDER) -->
    @if($section && $section->slider_images && count($section->slider_images) > 0)
    <x-slider
        title="Smart Classroom Gallery"
        subtitle="Inside our virtual and interactive learning spaces"
        :images="collect($section->slider_images)->map(fn($img) => asset('storage/' . $img))->toArray()"
    />
    @endif

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
