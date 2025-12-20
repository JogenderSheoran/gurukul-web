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

    <!-- ORANGE INNER BANNER -->
    <x-inner-banner
        title="Sports Complex"
        subtitle="Building Strength, Discipline & Team Spirit"
    />

    <!-- INTRO SECTION -->
    <section class="sportsIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Physical Education</span>
                    <h2>Gurukul Takshshila Sports Complex</h2>

                    <p>
                        Sports and games are a regular feature at Gurukul Takshshila and an
                        integral part of its curriculum. Coaches, physical education teachers,
                        and instructors prepare students to discover their latent talents and
                        enable them to participate in indoor and outdoor games at various levels.
                    </p>

                    <p>
                        Adequate space and facilities are available for Volleyball, Basketball,
                        Football, Table Tennis, Handball, Badminton, Boxing, Gymnastics,
                        Wrestling, Athletics, Kabaddi and more. The curriculum and coaching
                        help students learn, practice and master a wide range of sports skills.
                    </p>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=6001"
                        class="img-fluid rounded-4 shadow"
                        alt="Sports Complex at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- SPORTS AMENITIES -->
    <section class="sportsAmenities py-5 bg-light">
        <div class="container text-center">
            <h2>Our Sports Facilities</h2>
            <p class="mb-5">World-class sports infrastructure for comprehensive athletic development</p>

            <div class="row align-items-stretch">

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏐</div>
                        <h5>Volleyball Court</h5>
                        <p>Professional volleyball court with quality flooring and nets.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏀</div>
                        <h5>Basketball Court</h5>
                        <p>Standard basketball court with proper hoops and markings.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">⚽</div>
                        <h5>Football Ground</h5>
                        <p>Large football field with proper grass and goal posts.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏓</div>
                        <h5>Table Tennis</h5>
                        <p>Indoor table tennis facility with multiple tables.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏃‍♂️</div>
                        <h5>Athletics Track</h5>
                        <p>Professional running track for athletics training.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🤸‍♂️</div>
                        <h5>Gymnastics Hall</h5>
                        <p>Equipped gymnastics hall with necessary apparatus.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🥊</div>
                        <h5>Boxing Ring</h5>
                        <p>Professional boxing ring for combat sports training.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏆</div>
                        <h5>Multi-Sports</h5>
                        <p>Badminton, Wrestling, Kabaddi and other sports facilities.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="sportsBenefits py-5">
        <div class="container">
            <h2 class="text-center mb-4">Benefits of Sports Education</h2>

            <ul class="benefitsList">
                <li>Improves physical fitness and stamina</li>
                <li>Builds discipline, teamwork and leadership</li>
                <li>Enhances mental strength and focus</li>
                <li>Encourages healthy competition</li>
                <li>Boosts confidence and self-esteem</li>
                <li>Promotes overall personality development</li>
            </ul>
        </div>
    </section>

    <!-- SPORTS GALLERY -->
    <x-slider
        title="Glimpses of Tournaments"
        subtitle="Explore our sports facilities and tournament moments"
        :images="[
            'https://picsum.photos/600/400?random=6101',
            'https://picsum.photos/600/400?random=6102',
            'https://picsum.photos/600/400?random=6103',
            'https://picsum.photos/600/400?random=6104'
        ]"
    />

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
