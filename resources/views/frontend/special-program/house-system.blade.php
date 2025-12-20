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
    />

    <!-- INTRO SECTION -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-6 mb-4">
                    <h2>House System</h2>

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
                </div>

                <!-- IMAGE -->
                <div class="col-lg-6 mb-4 text-center">
                    <img
                        src="https://picsum.photos/700/450?random=10001"
                        class="img-fluid rounded-4 shadow"
                        alt="House System Activities at Gurukul Takshshila"
                    >
                </div>

            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="commonGallerySection bg-light">
        <div class="container text-center">
            <h2>House System Gallery</h2>
            <p class="gallerySubtitle">
                Explore our vibrant house activities and achievements
            </p>

            <div class="commonGallerySlider">

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=10101" alt="">
                </div>

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=10102" alt="">
                </div>

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=10103" alt="">
                </div>

                <div class="galleryItem">
                    <img src="https://picsum.photos/600/400?random=10104" alt="">
                </div>

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
