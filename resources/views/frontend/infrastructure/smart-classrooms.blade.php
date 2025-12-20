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
    />

    <!-- INTRO -->
    <section class="smartIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Digital Learning</span>
                    <h2>Virtual & Interactive Board Smart Classrooms</h2>

                    <p>
                        Gurukul Takshshila’s smart classrooms integrate modern technology with
                        traditional teaching methods to enhance student engagement and
                        understanding. Virtual and interactive boards transform lessons into
                        immersive learning experiences.
                    </p>

                    <p>
                        These classrooms promote visual learning, real-time interaction, and
                        better concept clarity, making education more engaging, effective and
                        student-centric.
                    </p>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=801"
                        class="img-fluid rounded-4 shadow"
                        alt="Smart Classroom with Interactive Board at Gurukul Takshshila"
                    >
                </div>

            </div>
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
    <x-slider
        title="Smart Classroom Gallery"
        subtitle="Inside our virtual and interactive learning spaces"
        :images="[
            'https://picsum.photos/600/400?random=901',
            'https://picsum.photos/600/400?random=902',
            'https://picsum.photos/600/400?random=903',
            'https://picsum.photos/600/400?random=904'
        ]"
    />

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
