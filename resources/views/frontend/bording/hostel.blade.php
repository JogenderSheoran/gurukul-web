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
    <x-inner-banner title="Hostel Facilities" subtitle="Gurukul Takshshila - Residential Life" pageKey="hostel" />

    <!-- SECOND IMAGE BANNER (CONTAINER WIDTH) -->
    @if($hostel && $hostel->banner_image)
    <section class="hostelImageBanner py-5">
        <div class="container">
            <div class="hostelBannerCard">
                <img src="{{ asset('storage/' . $hostel->banner_image) }}" alt="Hostel Banner">
            </div>
        </div>
    </section>
    @endif

    <!-- HOSTEL INTRO -->
    <section class="hostelIntroSection py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-4">
                    <span class="sectionTag">Our Hostel</span>
                    <h2>Our Hostel Facilities</h2>

                    @if($hostel && $hostel->description)
                        <div class="hostelText">
                            {!! $hostel->description !!}
                        </div>
                    @else
                        <p class="hostelText">
                            Boarding is one of the most distinctive features of a residential gurukul.
                            At Gurukul Takshshila, students experience a safe, disciplined, and homely
                            environment that supports academic and personal growth.
                        </p>

                        <p class="hostelText">
                            With modern facilities, nutritious meals, and dedicated mentors, our
                            hostel becomes a second home for students.
                        </p>
                    @endif

                    <div class="facilityList">
                        <div>🛏 Comfortable Accommodation</div>
                        <div>📶 High-Speed Internet</div>
                        <div>🍽 Nutritious Meals</div>
                        <div>🏥 Medical Facilities</div>
                        <div>🛡 24/7 Security</div>
                        <div>🎯 Recreation Areas</div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    @if($hostel && $hostel->additional_image)
                        <img src="{{ asset('storage/' . $hostel->additional_image) }}"
                             class="img-fluid hostelMainImage"
                             alt="Hostel Image">
                    @else
                        <img src="{{ asset('img/logo.png') }}"
                             class="img-fluid hostelMainImage"
                             alt="Hostel Image">
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- HOSTEL AMENITIES -->
    <section class="hostelAmenities py-5">
        <div class="container text-center">
            <h2 class="mb-5">Hostel Amenities</h2>

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="amenityIcon">🏠</div>
                        <h5>Homely Environment</h5>
                        <p>Warm and welcoming atmosphere.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="amenityIcon">📚</div>
                        <h5>Study Rooms</h5>
                        <p>Quiet and focused study areas.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="amenityIcon">🏋️</div>
                        <h5>Fitness Center</h5>
                        <p>Modern gym facilities.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="amenityCard">
                        <div class="amenityIcon">👥</div>
                        <h5>Common Areas</h5>
                        <p>Relaxation and social spaces.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- HOSTEL GALLERY SLIDER -->
    @if($hostel && $hostel->gallery_image && is_array($hostel->gallery_image) && count($hostel->gallery_image) > 0)
    <section class="hostelGallery py-5">
        <div class="container text-center">
            <h2>Hostel Gallery</h2>
            <p class="mb-4">Take a virtual tour of our hostel facilities</p>

            <div class="hostelGallerySlider">

                @foreach($hostel->gallery_image as $image)
                <div class="galleryItem">
                    <img src="{{ asset('storage/' . $image) }}" alt="Hostel Gallery">
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
    $('.hostelGallerySlider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 3 }},
            { breakpoint: 768,  settings: { slidesToShow: 2 }},
            { breakpoint: 480,  settings: { slidesToShow: 1 }}
        ]
    });
});
</script>
<style>
   <style>
.sectionTag{
    font-size:13px;
    color:#ff8a00;
    font-weight:600;
    margin-bottom:6px;
    display:inline-block;
}

.hostelText{
    font-size:15px;
    line-height:1.8;
}

.facilityList{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:12px;
    margin-top:20px;
}

.hostelMainImage{
    border-radius:16px;
    box-shadow:0 15px 30px rgba(0,0,0,0.15);
}

/* SECOND BANNER */
.hostelBannerCard{
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,0.18);
}

/* AMENITIES */
.amenityCard{
    background:#fff;
    padding:30px 20px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:.3s;
}

.amenityCard:hover{
    transform:translateY(-6px);
}

.amenityIcon{
    font-size:36px;
    margin-bottom:10px;
}

/* GALLERY */
.galleryItem{
    padding:10px;
}

.galleryItem img{
    width:100%;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}

/* Slick arrows */
.hostelGallerySlider .slick-prev,
.hostelGallerySlider .slick-next{
    background:#ff8a00;
    border-radius:50%;
    width:40px;
    height:40px;
    z-index:9;
}

.hostelGallerySlider .slick-prev:before,
.hostelGallerySlider .slick-next:before{
    color:#fff;
}

.hostelAmenities .row{
    align-items: stretch;
}

.amenityCard{
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>

</body>
</html>
