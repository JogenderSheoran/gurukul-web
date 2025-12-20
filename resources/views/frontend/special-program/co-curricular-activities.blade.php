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
        title="Co-curricular Activities"
        subtitle="Nurturing Creativity, Confidence & Team Spirit"
    />

    <!-- INTRO SECTION -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-6 mb-4">
                    <h2>Co-curricular Activities</h2>

                    <p>
                        Co-curricular Activities at Gurukul Takshshila include
                        Declamation, Dance, Music, Quizzes, Poster Making,
                        Extempore, Recitation and many more.
                    </p>

                    <p>
                        We celebrate all festivals and involve students right from
                        the primary classes. These activities help inculcate
                        creativity, discipline, confidence and healthy competition.
                    </p>
                </div>

                <!-- IMAGE -->
                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=8001"
                        class="img-fluid rounded-4 shadow"
                        alt="Co-curricular Activities at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- ACTIVITY FEATURES -->
    <section class="py-5">
        <div class="container text-center">
            <div class="row align-items-stretch">

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🎨</div>
                        <h5>Creative Arts</h5>
                        <p>
                            Explore artistic talents through drawing, painting,
                            poster making and creative workshops.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🎵</div>
                        <h5>Performing Arts</h5>
                        <p>
                            Develop performance skills in music, dance,
                            drama and stage events.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🏆</div>
                        <h5>Competitions</h5>
                        <p>
                            Participate in academic and non-academic competitions
                            to boost confidence.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">👥</div>
                        <h5>Team Activities</h5>
                        <p>
                            Build teamwork, leadership and collaboration skills
                            through group activities.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ACTIVITY GALLERY -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2>Activity Gallery</h2>
            <p class="mb-5">A glimpse of student participation and creativity</p>

            <div class="row align-items-stretch">

                <div class="col-lg-4 col-md-6 amenityCol">
                    <div class="amenityCard p-0">
                        <img src="https://picsum.photos/500/320?random=8101" class="img-fluid rounded">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 amenityCol">
                    <div class="amenityCard p-0">
                        <img src="https://picsum.photos/500/320?random=8102" class="img-fluid rounded">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 amenityCol">
                    <div class="amenityCard p-0">
                        <img src="https://picsum.photos/500/320?random=8103" class="img-fluid rounded">
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
