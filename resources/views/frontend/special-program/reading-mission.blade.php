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
        title="Reading Mission"
        subtitle="Developing Independent & Thoughtful Learners"
    />

    <!-- INTRO SECTION -->
    <section class="readingIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-6 mb-4">
                    <h2>Reading Mission</h2>

                    <p>
                        We have incorporated an interesting Reading Programme into our
                        curriculum. The Reading Mission Programme is an engaging initiative
                        that encourages children to build vocabulary, derive connections
                        between stories and real life, and understand different perspectives.
                    </p>

                    <p>
                        Children who read are able to think more deeply, express themselves
                        more freely and grow into confident, independent learners.
                    </p>
                </div>

                <!-- IMAGE -->
                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=7001"
                        class="img-fluid rounded-4 shadow"
                        alt="Reading Mission Programme at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFITS SECTION -->
    <section class="readingBenefits py-5 bg-light">
        <div class="container text-center">
            <h2>Benefits of Our Reading Program</h2>
            <p class="mb-5">
                Developing lifelong learners through comprehensive reading initiatives
            </p>

            <div class="row align-items-stretch">

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🧠</div>
                        <h5>Critical Thinking</h5>
                        <p>
                            Develop analytical and critical thinking skills through
                            diverse literature.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">📖</div>
                        <h5>Vocabulary Building</h5>
                        <p>
                            Expand vocabulary and improve language comprehension skills.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">❤️</div>
                        <h5>Love for Literature</h5>
                        <p>
                            Foster a lifelong passion for reading and literature.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">🎓</div>
                        <h5>Academic Success</h5>
                        <p>
                            Build strong foundation skills essential for academic achievement.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ACTIVITIES SECTION -->
    <section class="readingActivities py-5">
        <div class="container text-center">
            <h2>Our Reading Activities</h2>
            <p class="mb-5">
                Engaging programs to make reading fun and meaningful
            </p>

            <div class="row align-items-stretch justify-content-center">

                <div class="col-lg-4 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">👥</div>
                        <h5>Reading Circles</h5>
                        <p>
                            Interactive group discussions about books and stories.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">📚</div>
                        <h5>Library Sessions</h5>
                        <p>
                            Regular visits to explore diverse genres and authors.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <div class="icon">✍️</div>
                        <h5>Creative Writing</h5>
                        <p>
                            Encouraging students to create their own stories and poems.
                        </p>
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
