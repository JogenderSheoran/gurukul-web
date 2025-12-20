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

    <!-- COMMON ORANGE BANNER -->
    <x-inner-banner
        title="Celebrations & Adventure Trips"
        subtitle="Creating unforgettable memories through exciting adventures and celebrations"
    />

    <!-- ADVENTURE TRIPS -->
    <section class="py-5">
        <div class="container text-center">
            <h2>Adventure Trips</h2>
            <p class="mb-5">
                Adventure trips are a chance to explore, learn beyond classrooms and
                develop confidence, teamwork and independence.
            </p>

            <div class="row align-items-stretch">

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=5001" class="img-fluid rounded mb-3">
                        <h6>Adventure Trip to Manali</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=5002" class="img-fluid rounded mb-3">
                        <h6>Educational Trip to Chhatbir Zoo</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=5003" class="img-fluid rounded mb-3">
                        <h6>Trip to Amritsar & Wagah Border</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=5004" class="img-fluid rounded mb-3">
                        <h6>Geeta Jayanti Visit</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CELEBRATIONS -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2>Celebrations</h2>
            <p class="mb-5">
                Celebrating special moments and achievements that make our
                school community vibrant and memorable.
            </p>

            <div class="row align-items-stretch">

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=6001" class="img-fluid rounded mb-3">
                        <h6>School Opening Function</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=6002" class="img-fluid rounded mb-3">
                        <h6>Independence Day</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=6003" class="img-fluid rounded mb-3">
                        <h6>Annual Function 2018</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 amenityCol">
                    <div class="amenityCard">
                        <img src="https://picsum.photos/400/260?random=6004" class="img-fluid rounded mb-3">
                        <h6>Annual Function 2019</h6>
                        <a href="#" class="btn btn-orange mt-auto">View Gallery</a>
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
