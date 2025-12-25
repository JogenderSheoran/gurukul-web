<!doctype html>
<html lang="en">

@include('frontend.include.css')

<!-- Slick CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- ORANGE INNER BANNER -->
    <x-inner-banner
        title="Nutrition & Mess"
        subtitle="Gurukul Takshshila - Healthy Meals & Balanced Nutrition"
        pageKey="nutrition"
    />

    <!-- NUTRITION INTRO -->
    <section class="nutritionIntro py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-lg-7 mb-4">
                    <h2>Nutrition & Mess Facilities</h2>

                    @if($nutrition && $nutrition->description)
                        <div>
                            {!! $nutrition->description !!}
                        </div>
                    @else
                        <p>
                            Gurukul Takshshila has a well-equipped kitchen and is designed to maintain
                            perfect hygiene. We ensure that our kitchen and cleanliness are
                            sparkly clean by pursuing regular maintenance.
                        </p>

                        <p>
                            Meal plans are drawn up in consultation with a nutritionist to ensure a
                            healthy, well-balanced diet. A wide choice of vegetarian cuisine is on offer.
                        </p>

                        <p>
                            Mealtimes are fun where students get together and have their food under
                            the observant eyes of their mentors. Reverse Osmosis systems are installed
                            to provide clean and safe drinking water throughout the campus.
                        </p>

                        <h6 class="mt-4 fw-bold">Our Nutrition Features:</h6>
                        <ul class="nutritionList">
                            <li>Well-equipped kitchen with modern facilities</li>
                            <li>Perfect hygiene and cleanliness standards</li>
                            <li>Nutritionist-planned balanced meals</li>
                            <li>Wide variety of vegetarian cuisine</li>
                            <li>Clean and safe drinking water with RO systems</li>
                            <li>Supervised mealtimes with mentors</li>
                        </ul>
                    @endif
                </div>

                <!-- IMAGE -->
                <div class="col-lg-5 mb-4 text-center">
                    @if($nutrition && $nutrition->main_image)
                        <div class="nutritionIconCircle">
                            <img src="{{ asset('storage/' . $nutrition->main_image) }}" alt="Nutrition">
                        </div>
                    @else
                        <div class="nutritionIconCircle">
                            <img src="https://cdn-icons-png.flaticon.com/512/3043/3043910.png" alt="Nutrition">
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- NUTRITION FEATURES CARDS -->
    <section class="nutritionCards py-5">
        <div class="container">
            <div class="row g-4 align-items-stretch">

                <div class="col-md-3">
                    <div class="nutritionCard">
                        <img src="https://cdn-icons-png.flaticon.com/512/706/706164.png">
                        <h5>Vegetarian Cuisine</h5>
                        <p>Wide choice of healthy vegetarian dishes prepared with fresh ingredients.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="nutritionCard">
                        <img src="https://cdn-icons-png.flaticon.com/512/3063/3063827.png">
                        <h5>Nutritionist Planned</h5>
                        <p>Meal plans designed in consultation with qualified nutritionists.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="nutritionCard">
                        <img src="https://cdn-icons-png.flaticon.com/512/2913/2913465.png">
                        <h5>Perfect Hygiene</h5>
                        <p>Regular maintenance ensures sparkly clean kitchen and dining areas.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="nutritionCard">
                        <img src="https://cdn-icons-png.flaticon.com/512/415/415733.png">
                        <h5>Clean Water</h5>
                        <p>Reverse Osmosis systems provide clean and safe drinking water.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- NUTRITION GALLERY -->
    @if($nutrition && $nutrition->gallery_image && is_array($nutrition->gallery_image) && count($nutrition->gallery_image) > 0)
    <section class="nutritionGallery py-5">
        <div class="container text-center">
            <h2>Nutrition Gallery</h2>
            <p class="mb-4">Explore our kitchen facilities and dining areas</p>

            <div class="nutritionGallerySlider">

                @foreach($nutrition->gallery_image as $image)
                <div class="galleryItem">
                    <img src="{{ asset('storage/' . $image) }}" alt="Nutrition Gallery">
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

<!-- jQuery & Slick -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
$(document).ready(function () {
    $('.nutritionGallerySlider').slick({
        slidesToShow: 3,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            { breakpoint: 992, settings: { slidesToShow: 2 }},
            { breakpoint: 576, settings: { slidesToShow: 1 }}
        ]
    });
});
</script>

<style>
   /* Nutrition Intro */
.nutritionList{
    padding-left:18px;
    font-size:14.5px;
    line-height:1.8;
}

.nutritionIconCircle{
    width:220px;
    height:220px;
    margin:auto;
    border-radius:50%;
    background:#e9fbff;
    display:flex;
    align-items:center;
    justify-content:center;
}

.nutritionIconCircle img{
    width:120px;
}

/* Nutrition Cards */
.nutritionCard{
    height:100%;
    background:#fff;
    padding:30px 20px;
    border-radius:14px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
}

.nutritionCard img{
    width:45px;
    margin:0 auto 15px;
}

.nutritionCard h5{
    font-weight:700;
    margin-bottom:10px;
}

.nutritionCard p{
    font-size:14px;
    margin-top:auto;
}

/* Gallery */
.galleryItem{
    padding:10px;
}

.galleryItem img{
    width:100%;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}

/* Slick arrows */
.nutritionGallerySlider .slick-prev,
.nutritionGallerySlider .slick-next{
    background:#ff8a00;
    width:38px;
    height:38px;
    border-radius:50%;
}

.nutritionGallerySlider .slick-prev:before,
.nutritionGallerySlider .slick-next:before{
    color:#fff;
}

</style>

</body>
</html>
