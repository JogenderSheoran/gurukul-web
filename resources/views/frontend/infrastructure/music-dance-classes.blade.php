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
        title="Music & Dance Classes"
        subtitle="Nurturing Creativity, Expression & Performing Arts Excellence"
    />

    <!-- INTRO -->
    <section class="musicDanceIntro py-5">
        <div class="container">
            @if($section)
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Performing Arts</span>
                    <h2>Music & Dance Program</h2>

                    <div>
                        {!! $section->description !!}
                    </div>
                </div>

                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="{{ asset('storage/' . $section->main_image) }}"
                        class="img-fluid rounded-4 shadow"
                        alt="Music and Dance Classes at Gurukul Takshshila"
                    >
                </div>

            </div>
            @else
            <div class="row align-items-center">
                <div class="col-lg-12 mb-4 text-center">
                    <p class="text-muted">Content not available at the moment.</p>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- MUSIC PROGRAM -->
    <section class="musicProgram py-5 bg-light">
        <div class="container text-center">
            <h2>Music Program</h2>
            <p class="mb-5">Developing musical skills through theory, practice and performance</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Vocal Music Training</h5>
                        <p>Training in vocal techniques, pitch control and musical expression.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Instrumental Music</h5>
                        <p>Piano, guitar, drums and other instruments for practical learning.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Music Theory & Composition</h5>
                        <p>Understanding rhythm, notation, harmony and composition basics.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Classical & Contemporary Music</h5>
                        <p>Exposure to traditional classical styles and modern music forms.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Choir & Group Performances</h5>
                        <p>Group singing and ensemble performances to build teamwork.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Music Technology</h5>
                        <p>Introduction to recording, sound mixing and music technology tools.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- DANCE PROGRAM -->
    <section class="danceProgram py-5">
        <div class="container text-center">
            <h2>Dance Program</h2>
            <p class="mb-5">Exploring movement, rhythm and cultural expression through dance</p>

            <div class="row g-4 align-items-stretch">

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Classical Dance Forms</h5>
                        <p>Bharatanatyam, Kathak and other classical traditions.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Contemporary & Modern Dance</h5>
                        <p>Creative movement styles that encourage expression and innovation.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Folk Dance Traditions</h5>
                        <p>Celebrating regional and cultural folk dance forms.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Hip-hop & Street Dance</h5>
                        <p>High-energy styles that build confidence and rhythm.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Ballet & Jazz</h5>
                        <p>Graceful and technical dance forms for body control.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="amenityCard">
                        <h5>Choreography & Performance</h5>
                        <p>Stage performances and choreography for real-world exposure.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFITS -->
    <section class="musicDanceBenefits py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Benefits of Music & Dance Education</h2>

            <ul class="benefitsList">
                <li>Enhances creativity and self-expression</li>
                <li>Builds confidence and stage presence</li>
                <li>Develops discipline and dedication</li>
                <li>Improves physical coordination and flexibility</li>
                <li>Fosters cultural appreciation</li>
                <li>Provides stress relief and emotional balance</li>
            </ul>
        </div>
    </section>

    <!-- GALLERY (COMMON SLIDER) -->
    @if($section && $section->slider_images && count($section->slider_images) > 0)
    <x-slider
        title="Music & Dance Gallery"
        subtitle="Moments from our vibrant performing arts sessions"
        :images="collect($section->slider_images)->map(fn($img) => asset('storage/' . $img))->toArray()"
    />
    @endif

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')
<style>
    .sectionTag{
    font-size:13px;
    color:#ff8a00;
    font-weight:600;
    margin-bottom:8px;
    display:inline-block;
}

.amenityCard{
    height:100%;
    background:#fff;
    padding:28px 20px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    text-align:center;
    transition:.3s;
}

.amenityCard:hover{
    transform:translateY(-6px);
}

.amenityCard h5{
    font-weight:700;
    margin-bottom:10px;
}

.amenityCard p{
    font-size:14px;
    margin-top:auto;
}

.benefitsList{
    max-width:700px;
    margin:0 auto;
    font-size:15px;
    line-height:1.9;
}
</style>
</body>
</html>
