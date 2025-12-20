<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

   <x-seo
        title="{{ $seo['title'] }}"
        description="{{ $seo['description'] }}"
        keywords="{{ $seo['keywords'] }}"
        image="{{ $seo['image'] }}"
    />

</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    {{-- Inner Banner --}}
    <x-inner-banner
        title="Our Blog"
        subtitle="Insights, Activities & Educational Articles"
    />

    {{-- Blog Intro --}}
    <section class="blogIntro py-5">
        <div class="container text-center">
            <span class="sectionTag">Latest Articles</span>
            <h2>Knowledge & Updates</h2>
            <p class="mt-3">
                Stay updated with school activities, learning tips and educational insights
                from Gurukul Takshshila.
            </p>
        </div>
    </section>

    {{-- Blog Listing --}}
    <section class="blogList py-5 bg-light">
        <div class="container">
            <div class="row g-4">

                {{-- Blog Card --}}
                <div class="col-lg-4 col-md-6">
                    <article class="blogCard h-100">
                        <a href="{{ url('blog/art-education-benefits') }}">
                            <img src="https://picsum.photos/600/400?random=7001"
                                 class="img-fluid"
                                 alt="Benefits of Art Education">
                        </a>

                        <div class="blogContent">
                            <span class="blogMeta">Art Education • Jan 10, 2025</span>

                            <h3>
                                <a href="{{ url('blog/art-education-benefits') }}">
                                    Benefits of Art Education in Schools
                                </a>
                            </h3>

                            <p>
                                Art education plays a vital role in developing creativity,
                                confidence and emotional growth among students.
                            </p>

                            <a href="{{ url('blog/art-education-benefits') }}" class="readMore">
                                Read More →
                            </a>
                        </div>
                    </article>
                </div>

                {{-- Blog Card --}}
                <div class="col-lg-4 col-md-6">
                    <article class="blogCard h-100">
                        <a href="{{ url('blog/creative-learning') }}">
                            <img src="https://picsum.photos/600/400?random=7002"
                                 class="img-fluid"
                                 alt="Creative Learning Environment">
                        </a>

                        <div class="blogContent">
                            <span class="blogMeta">Creative Learning • Jan 5, 2025</span>

                            <h3>
                                <a href="{{ url('blog/creative-learning') }}">
                                    Creating a Creative Learning Environment
                                </a>
                            </h3>

                            <p>
                                A creative environment helps students explore ideas,
                                improve problem-solving skills and enjoy learning.
                            </p>

                            <a href="{{ url('blog/creative-learning') }}" class="readMore">
                                Read More →
                            </a>
                        </div>
                    </article>
                </div>

                {{-- Blog Card --}}
                <div class="col-lg-4 col-md-6">
                    <article class="blogCard h-100">
                        <a href="{{ url('blog/student-activities') }}">
                            <img src="https://picsum.photos/600/400?random=7003"
                                 class="img-fluid"
                                 alt="Student Activities">
                        </a>

                        <div class="blogContent">
                            <span class="blogMeta">School Activities • Dec 28, 2024</span>

                            <h3>
                                <a href="{{ url('blog/student-activities') }}">
                                    Importance of Co-Curricular Activities
                                </a>
                            </h3>

                            <p>
                                Co-curricular activities support holistic development
                                and improve social and leadership skills.
                            </p>

                            <a href="{{ url('blog/student-activities') }}" class="readMore">
                                Read More →
                            </a>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>

@include('frontend.include.footer')
</div>

@include('frontend.include.js')
</body>
</html>
