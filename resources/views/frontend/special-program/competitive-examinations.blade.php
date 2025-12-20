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

    <!-- ORANGE BANNER -->
    <x-inner-banner
        title="Excellence in Competitive Examinations"
        subtitle="Preparing Students for National & Global Success"
    />

    <!-- INTRO -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <h2>Excellence in Competitive Examinations</h2>

                    <p>
                        With the aim of promoting English, Science, Mathematics and Computer
                        Education, Gurukul Takshshila encourages students to take up
                        competitive examinations like NDA, NEET, JEE, EEE and Olympiads.
                    </p>

                    <p>
                        Our experienced faculty provides career counseling, structured guidance,
                        and exam-oriented training including Reading India, Arya Bhatta
                        Ganit Challenge, Vidyarthi Vigyan Manthan (VVM) and subject Olympiads.
                    </p>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=9001"
                        class="img-fluid rounded-4 shadow"
                        alt="Competitive Exam Preparation at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="py-5">
        <div class="container text-center">
            <div class="row align-items-stretch justify-content-center">

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">👨‍🎓</div>
                        <h3>500+</h3>
                        <p>Students Prepared</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏆</div>
                        <h3>95%</h3>
                        <p>Success Rate</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">👩‍🏫</div>
                        <h3>20+</h3>
                        <p>Expert Faculty</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">📅</div>
                        <h3>10+</h3>
                        <p>Years Experience</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- GALLERY SLIDER -->
    <section class="commonGallerySection bg-light">
        <div class="container text-center">
            <h2>Competitive Examinations Gallery</h2>
            <p class="gallerySubtitle">
                Glimpses of our students’ preparation and achievements
            </p>

            <div class="commonGallerySlider">

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=9101" alt="">
                </div>

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=9102" alt="">
                </div>

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=9103" alt="">
                </div>

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=9104" alt="">
                </div>

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
