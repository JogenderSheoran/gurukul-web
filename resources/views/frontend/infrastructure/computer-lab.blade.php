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
        title="Computer Lab"
        subtitle="Hands-on Digital Learning & Technology Skills"
        pageKey="computer-lab"
    />

    <!-- INTRO SECTION -->
    <section class="computerIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Digital Education</span>
                    <h2>Advanced Computer Lab Facilities</h2>

                    @if($lab && $lab->description)
                        <div>
                            {!! $lab->description !!}
                        </div>
                    @else
                        <p>
                            The Computer Lab at Gurukul Takshshila is designed to equip students with
                            essential digital skills required in today's technology-driven world.
                            The lab provides a structured environment for hands-on learning and
                            practical exposure.
                        </p>

                        <p>
                            With modern computer systems, high-speed internet connectivity and
                            guided instruction, students gain confidence in using technology for
                            academics, research and innovation.
                        </p>
                    @endif
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    @if($lab && $lab->main_banner)
                        <img
                            src="{{ asset('storage/' . $lab->main_banner) }}"
                            class="img-fluid rounded-4 shadow"
                            alt="Computer Lab at Gurukul Takshshila"
                        >
                    @else
                        <img
                            src="{{ asset('img/logo.png') }}"
                            class="img-fluid rounded-4 shadow"
                            alt="Computer Lab at Gurukul Takshshila"
                        >
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- COMPUTER LAB AMENITIES -->
    <section class="computerAmenities py-5 bg-light">
        <div class="container text-center">
            <h2>Computer Lab Amenities</h2>
            <p class="mb-5">Technology-driven facilities that enhance digital learning</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🖥️</div>
                        <h5>Modern Computer Systems</h5>
                        <p>Latest desktop systems for smooth and efficient performance.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🌐</div>
                        <h5>High-Speed Internet</h5>
                        <p>Fast and secure internet connectivity for research and learning.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">💻</div>
                        <h5>Practical IT Training</h5>
                        <p>Hands-on training in computer basics, coding and applications.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🛡️</div>
                        <h5>Safe & Monitored Usage</h5>
                        <p>Supervised lab environment ensuring safe and focused learning.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">📊</div>
                        <h5>Educational Software</h5>
                        <p>Access to learning tools, programming software and applications.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">👨‍🏫</div>
                        <h5>Qualified Instructors</h5>
                        <p>Experienced teachers guide students during lab sessions.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">🧑‍💻</div>
                        <h5>Individual Workstations</h5>
                        <p>Dedicated systems for each student to practice independently.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="icon">⚙️</div>
                        <h5>Regular System Updates</h5>
                        <p>Maintained and updated systems for optimal performance.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="computerBenefits py-5">
        <div class="container">
            <h2 class="text-center mb-4">Benefits of Computer Lab Learning</h2>

            <ul class="benefitsList">
                <li>Develops digital literacy and technical skills</li>
                <li>Enhances problem-solving and logical thinking</li>
                <li>Encourages innovation and creativity</li>
                <li>Supports academic learning and research</li>
                <li>Prepares students for future technology careers</li>
                <li>Builds confidence in using digital tools</li>
            </ul>
        </div>
    </section>

    <!-- COMPUTER LAB GALLERY (COMMON SLIDER) -->
    @if($lab && $lab->slider_images && is_array($lab->slider_images) && count($lab->slider_images) > 0)
    <x-slider
        title="Computer Lab Gallery"
        subtitle="Inside our modern and well-equipped computer lab"
        :images="collect($lab->slider_images)->map(fn($img) => asset('storage/' . $img))->toArray()"
    />
    @endif

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
