
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('frontend/css/style.css')}}">
	<link  rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Gurukul Takshshila</title>
</head>
<style>
    /* ===== Common Gallery Section ===== */
.commonGallerySection{
    padding:70px 0;
}

.commonGallerySection h2{
    font-weight:700;
    margin-bottom:6px;
}

.gallerySubtitle{
    font-size:14.5px;
    color:#666;
    margin-bottom:30px;
}

.commonGallerySlider .galleryItem{
    padding:10px;
}

.commonGallerySlider img{
    width:100%;
    height:260px;
    object-fit:cover;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}

/* Slick dots */
.commonGallerySlider .slick-dots{
    bottom:-30px;
}

.commonGallerySlider .slick-dots li button:before{
    font-size:10px;
    color:#ff8a00;
}

.commonGallerySlider .slick-dots li.slick-active button:before{
    color:#ff8a00;
}

/* ==============================
   COMMON AMENITIES (CARDS)
   ============================== */

/* Section small tag */
.sectionTag{
    font-size:13px;
    color:#ff8a00;
    font-weight:600;
    margin-bottom:8px;
    display:inline-block;
    letter-spacing:.5px;
}

/* Amenity Card */
.amenityCard{
    height:100%;
    background:#ffffff;
    padding:30px 22px;
    border-radius:16px;
    box-shadow:0 10px 28px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    align-items:center;
    text-align:center;
    transition:all .35s ease;
    position:relative;
    overflow:hidden;
}

/* Hover Animation */
.amenityCard:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 45px rgba(0,0,0,0.15);
}

/* Icon Style */
.amenityCard .icon{
    font-size:38px;
    margin-bottom:14px;
    color:#ff8a00;
    transition:transform .35s ease;
}

/* Icon Animation on Hover */
.amenityCard:hover .icon{
    transform:scale(1.15) rotate(4deg);
}

/* Title */
.amenityCard h5{
    font-weight:700;
    margin-bottom:10px;
    font-size:16px;
}

/* Description */
.amenityCard p{
    font-size:14px;
    line-height:1.7;
    margin-top:auto;
    color:#555;
}

/* Optional Border Effect */
.amenityCard::after{
    content:'';
    position:absolute;
    inset:0;
    border-radius:16px;
    border:1px solid rgba(255,138,0,.15);
    opacity:0;
    transition:.35s;
}

.amenityCard:hover::after{
    opacity:1;
}

/* ==============================
   BENEFITS LIST (COMMON)
   ============================== */

.benefitsList{
    max-width:760px;
    margin:0 auto;
    padding-left:20px;
    font-size:15px;
    line-height:1.9;
}

.benefitsList li{
    margin-bottom:8px;
}

.benefitsList li::marker{
    color:#ff8a00;
}

.computerAmenities .row > [class*="col-"]{
    margin-bottom: 24px;   /* vertical gap */
}

.physicsAmenities .amenityCol{
    margin-bottom:32px;
}

.amenityCol{
    margin-bottom:32px;
}

</style>
