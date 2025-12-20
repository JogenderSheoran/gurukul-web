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

    <x-inner-banner
        title="{{ $blog['title'] }}"
        subtitle="Gurukul Takshshila Blog"
    />

    {{-- Blog Details --}}
    <section class="blogDetails py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <article>
                        {{-- STATIC PICSUM IMAGE --}}
                        <img src="https://picsum.photos/900/500?random=1001"
                             class="img-fluid rounded-4 mb-4"
                             alt="{{ $blog['title'] }}">

                        <span class="blogMeta d-block mb-3">
                            {{ $blog['date'] }}
                        </span>

                        <div class="blogContent">
                            <p>{!! nl2br(e($blog['description'])) !!}</p>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>

    {{-- Related Blogs --}}
    <section class="relatedBlogs py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="sectionTag">Explore More</span>
                <h2>Related Blogs</h2>
                <p>Read more articles from Gurukul Takshshila</p>
            </div>

            <div class="row g-4">

                {{-- Related Blog 1 --}}
                <div class="col-lg-4 col-md-6">
                    <article class="blogCard h-100">
                        <a href="{{ url('/blog/creative-learning-environment') }}">
                            <img src="https://picsum.photos/600/400?random=2001"
                                 class="img-fluid"
                                 alt="Creative Learning Environment">
                        </a>

                        <div class="blogContent">
                            <span class="blogMeta">Jan 05, 2025</span>
                            <h3>
                                <a href="{{ url('/blog/creative-learning-environment') }}">
                                    Creating a Creative Learning Environment
                                </a>
                            </h3>
                            <a href="{{ url('/blog/creative-learning-environment') }}" class="readMore">
                                Read More →
                            </a>
                        </div>
                    </article>
                </div>

                {{-- Related Blog 2 --}}
                <div class="col-lg-4 col-md-6">
                    <article class="blogCard h-100">
                        <a href="{{ url('/blog/importance-of-co-curricular-activities') }}">
                            <img src="https://picsum.photos/600/400?random=2002"
                                 class="img-fluid"
                                 alt="Co-Curricular Activities">
                        </a>

                        <div class="blogContent">
                            <span class="blogMeta">Dec 28, 2024</span>
                            <h3>
                                <a href="{{ url('/blog/importance-of-co-curricular-activities') }}">
                                    Importance of Co-Curricular Activities
                                </a>
                            </h3>
                            <a href="{{ url('/blog/importance-of-co-curricular-activities') }}" class="readMore">
                                Read More →
                            </a>
                        </div>
                    </article>
                </div>

                {{-- Related Blog 3 --}}
                <div class="col-lg-4 col-md-6">
                    <article class="blogCard h-100">
                        <a href="{{ url('/blog/student-wellness-mental-health') }}">
                            <img src="https://picsum.photos/600/400?random=2003"
                                 class="img-fluid"
                                 alt="Student Wellness">
                        </a>

                        <div class="blogContent">
                            <span class="blogMeta">Dec 15, 2024</span>
                            <h3>
                                <a href="{{ url('/blog/student-wellness-mental-health') }}">
                                    Student Wellness & Mental Health
                                </a>
                            </h3>
                            <a href="{{ url('/blog/student-wellness-mental-health') }}" class="readMore">
                                Read More →
                            </a>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')
</body>
</html>
