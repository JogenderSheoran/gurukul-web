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
        title="House System"
        subtitle="Gurukul Takshshila – Four Houses of Excellence"
        pageKey="house-system"
    />

    <!-- INTRO SECTION -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-6 mb-4">
                    <h2>House System</h2>

                    @if($houseSystem && $houseSystem->description)
                        <div>
                            {!! $houseSystem->description !!}
                        </div>
                    @else
                        <p>
                            The students of Gurukul Takshshila are grouped into four
                            separate Houses. Each House is guided and monitored by a
                            House In-charge along with other dedicated teachers.
                        </p>

                        <p>
                            The House System promotes leadership, discipline, teamwork
                            and a sense of belonging among students. Through inter-house
                            competitions, cultural events and sports activities, students
                            develop confidence and healthy competitive spirit.
                        </p>
                    @endif
                </div>

                <!-- IMAGE -->
                <div class="col-lg-6 mb-4 text-center">
                    @if($houseSystem && $houseSystem->main_image)
                        <img
                            src="{{ asset('storage/' . $houseSystem->main_image) }}"
                            class="img-fluid rounded-4 shadow"
                            alt="House System Activities at Gurukul Takshshila"
                        >
                    @else
                        <img
                            src="{{ asset('img/logo.png') }}"
                            class="img-fluid rounded-4 shadow"
                            alt="House System Activities at Gurukul Takshshila"
                        >
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- GALLERY -->
    @if($houseSystem && $houseSystem->gallery_images && is_array($houseSystem->gallery_images) && count($houseSystem->gallery_images) > 0)
    <section class="commonGallerySection bg-light">
        <div class="container text-center">
            <h2>House System Gallery</h2>
            <p class="gallerySubtitle">
                Explore our vibrant house activities and achievements
            </p>

            <div class="commonGallerySlider">

                @foreach($houseSystem->gallery_images as $image)
                <div class="galleryItem">
                    <img src="{{ asset('storage/' . $image) }}" alt="House System">
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
