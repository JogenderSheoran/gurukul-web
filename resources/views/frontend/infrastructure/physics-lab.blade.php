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

    <!-- COMMON ORANGE BANNER -->
    <x-inner-banner
        title="Physics Laboratory"
        subtitle="Learning Physics Through Practical Experiments"
    />

    <!-- INTRO SECTION -->
    <section class="physicsIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Science Education</span>
                    <h2>Advanced Physics Laboratory</h2>

                    <p>
                        The Physics Laboratory at Gurukul Takshshila provides students with
                        hands-on experience to understand fundamental principles of physics
                        through observation and experimentation.
                    </p>

                    <p>
                        Equipped with modern apparatus and guided by experienced faculty,
                        the lab encourages curiosity, logical thinking and scientific temperament
                        among students.
                    </p>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=2001"
                        class="img-fluid rounded-4 shadow"
                        alt="Physics Laboratory at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- PHYSICS LAB AMENITIES -->
    <section class="physicsAmenities py-5 bg-light">
        <div class="container text-center">
            <h2>Physics Lab Amenities</h2>
            <p class="mb-5">Facilities designed for effective practical learning</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">🔬</div>
                        <h5>Modern Apparatus</h5>
                        <p>Advanced instruments for mechanics, optics, electricity and magnetism.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">⚡</div>
                        <h5>Electrical Experiments</h5>
                        <p>Hands-on experiments for current, voltage, resistance and circuits.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">📐</div>
                        <h5>Optics & Mechanics</h5>
                        <p>Experiments related to light, motion, force and energy.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">🧪</div>
                        <h5>Safe Lab Environment</h5>
                        <p>Strict safety measures and supervised lab sessions.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">👨‍🏫</div>
                        <h5>Qualified Faculty</h5>
                        <p>Experienced teachers guiding experiments and observations.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">📘</div>
                        <h5>Practical Manuals</h5>
                        <p>Well-structured lab manuals aligned with curriculum standards.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">🧠</div>
                        <h5>Concept Clarity</h5>
                        <p>Strengthens theoretical knowledge through practical application.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="amenityCard">
                        <div class="icon">🔍</div>
                        <h5>Scientific Observation</h5>
                        <p>Encourages analytical thinking and accurate observations.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="physicsBenefits py-5">
        <div class="container">
            <h2 class="text-center mb-4">Benefits of Physics Lab Learning</h2>

            <ul class="benefitsList">
                <li>Improves understanding of physical laws and concepts</li>
                <li>Develops scientific reasoning and analytical skills</li>
                <li>Encourages curiosity and experimentation</li>
                <li>Builds problem-solving abilities</li>
                <li>Enhances academic performance in science subjects</li>
                <li>Prepares students for advanced scientific studies</li>
            </ul>
        </div>
    </section>

    <!-- PHYSICS LAB GALLERY -->
    <x-slider
        title="Physics Lab Gallery"
        subtitle="A glimpse of experiments and practical learning"
        :images="[
            'https://picsum.photos/600/400?random=2101',
            'https://picsum.photos/600/400?random=2102',
            'https://picsum.photos/600/400?random=2103',
            'https://picsum.photos/600/400?random=2104'
        ]"
    />

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
