<!doctype html>
<html lang="en">

<head>
    @include('frontend.include.css')

    <!-- SEO COMPONENT -->
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

    <!-- ORANGE INNER BANNER -->
    <x-inner-banner
        title="Health & Wellness"
        subtitle="Comprehensive Healthcare & Wellness Support"
    />

    <!-- INTRO SECTION -->
    <section class="healthIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Student Care</span>
                    <h2>Health & Wellness at Gurukul Takshshila</h2>

                    <p>
                        At Gurukul Takshshila, student health and well-being are our highest
                        priorities. A healthy mind and body are essential for effective learning,
                        growth, and character development.
                    </p>

                    <p>
                        Our campus is equipped with comprehensive medical facilities, trained
                        healthcare professionals, and wellness programs to ensure students remain
                        physically fit, mentally strong, and emotionally balanced throughout their
                        academic journey.
                    </p>
                </div>

                <!-- IMAGE -->
                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/600/400?random=91"
                        class="img-fluid rounded-4 shadow"
                        alt="Student Health and Wellness at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="healthFeatures py-5 bg-light">
        <div class="container text-center">
            <h2>Our Health & Wellness Features</h2>
            <p class="mb-5">Comprehensive healthcare and wellness support for our students</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-3">
                    <div class="healthCard">
                        <div class="icon">🩺</div>
                        <h5>24/7 Medical Staff</h5>
                        <p>
                            Qualified medical staff available round the clock with doctor on call
                            for emergencies.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="healthCard">
                        <div class="icon">🚑</div>
                        <h5>First Aid Care</h5>
                        <p>
                            Immediate medical assistance and first aid care for minor injuries and
                            health issues.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="healthCard">
                        <div class="icon">🧘</div>
                        <h5>Wellness Programs</h5>
                        <p>
                            Daily yoga, meditation, fitness and wellness activities for holistic
                            development.
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="healthCard">
                        <div class="icon">📋</div>
                        <h5>Regular Check-ups</h5>
                        <p>
                            Routine health monitoring and preventive care through scheduled medical
                            check-ups.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="healthGallery py-5">
        <div class="container text-center">
           <x-slider
                title="Health & Wellness Gallery"
                subtitle="Explore our healthcare facilities and wellness programs"
                :images="[
                    'https://picsum.photos/600/400?random=101',
                    'https://picsum.photos/600/400?random=102',
                    'https://picsum.photos/600/400?random=103',
                    'https://picsum.photos/600/400?random=104'
                ]"
            />
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

<!-- Slick -->

<script>
$(document).ready(function () {
    $('.commonGallerySlider').slick({
        slidesToShow: 3,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            { breakpoint: 992, settings: { slidesToShow: 2 }},
            { breakpoint: 576, settings: { slidesToShow: 1 }}
        ]
    });
});
</script>
<style>
    .sectionTag{
    font-size:13px;
    color:#ff8a00;
    font-weight:600;
    display:inline-block;
    margin-bottom:8px;
}

.healthCard{
    height:100%;
    background:#fff;
    padding:30px 20px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    text-align:center;
}

.healthCard .icon{
    font-size:36px;
    margin-bottom:12px;
}

.healthCard h5{
    font-weight:700;
    margin-bottom:10px;
}

.healthCard p{
    font-size:14px;
    margin-top:auto;
}

.galleryItem{
    padding:10px;
}

.galleryItem img{
    width:100%;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}

</style>
</body>
</html>
