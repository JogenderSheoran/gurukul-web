<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
@include('frontend.include.css')
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
    .content-section {
        padding: 15px;
        background: #f9f9f9;
        border-radius: 8px;
        margin-bottom: 20px;
        min-height: 200px;
    }
    
    .content-section h3 {
        color: #333;
        margin-bottom: 15px;
        font-size: 1.3rem;
        font-weight: 600;
    }
    
    .content-preview, .content-full {
        line-height: 1.8;
        color: #555;
        text-align: justify;
    }
    
    .content-section .readMore {
        display: inline-block;
        margin-top: 10px;
        color: #ff6600;
        cursor: pointer;
        font-weight: 600;
        transition: color 0.3s;
    }
    
    .content-section .readMore:hover {
        color: #cc5200;
        text-decoration: underline;
    }
    
    .mb-4 {
        margin-bottom: 2rem !important;
    }
    
    /* Quick Links Icons */
    .NewsEvents.naturalEvents ul li a i {
        margin-right: 8px;
        color: #ff6600;
    }
    
    /* Fixed Banner Size */
    .bannerSlider .sliderItem img{
        width: 100%;
        height: 800px;
        object-fit: cover;
        object-position: center;
    }

    .innerBanner img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        object-position: center;
    }
    
    @media (max-width: 768px) {
        .bannerSlider .sliderItem img,
        .innerBanner img {
            height: 250px;
        }
    }
    
    /* Top Scorers Slider Styles */
    .TopScorer {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .topScorersSlider {
        margin-top: 40px;
    }
    
    .topScorersSlider .box {
        background: white;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin: 0 15px;
        transition: transform 0.3s ease;
        min-height: 450px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .topScorersSlider .box:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .topScorersSlider .image {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        border: 5px solid #ff6600;
    }
    
    .topScorersSlider .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .topScorersSlider .default-student-icon {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .topScorersSlider .default-student-icon i {
        font-size: 70px;
        color: white;
    }
    
    .topScorersSlider .trophy-icon {
        position: absolute;
        bottom: -5px;
        right: -5px;
        background: #ffd700;
        color: #ff6600;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        border: 3px solid white;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }
    
    .topScorersSlider .name {
        font-size: 22px;
        font-weight: 700;
        color: #333;
        margin: 15px 0 8px;
    }
    
    .topScorersSlider .class {
        color: #666;
        font-size: 15px;
        margin-bottom: 10px;
    }
    
    .topScorersSlider .percentage {
        background: #ff6600;
        color: #fff !important;
        font-size: 24px;
        font-weight: 700;
        padding: 10px 20px;
        border-radius: 50px;
        display: inline-block;
        margin: 10px 0;
    }
    
    .topScorersSlider .inSubject {
        color: #555;
        font-size: 14px;
        margin: 10px 0;
        font-weight: 500;
    }
    
    .topScorersSlider .year {
        color: #888;
        font-size: 13px;
        margin-top: 8px;
    }
    
    /* Slick Slider Customization */
    .topScorersSlider .slick-dots {
        bottom: -40px;
    }
    
    .topScorersSlider .slick-dots li button:before {
        font-size: 12px;
        color: #ff6600;
    }
    
    .topScorersSlider .slick-dots li.slick-active button:before {
        color: #ff6600;
    }
    
    .topScorersSlider .slick-prev,
    .topScorersSlider .slick-next {
        width: 45px;
        height: 45px;
        background: #ff6600;
        border-radius: 50%;
        z-index: 1;
    }
    
    .topScorersSlider .slick-prev:before,
    .topScorersSlider .slick-next:before {
        font-size: 20px;
    }
    
    .topScorersSlider .slick-prev {
        left: -60px;
    }
    
    .topScorersSlider .slick-next {
        right: -60px;
    }
    
    @media (max-width: 1200px) {
        .topScorersSlider .slick-prev {
            left: -30px;
        }
        .topScorersSlider .slick-next {
            right: -30px;
        }
    }
    
    @media (max-width: 768px) {
        .topScorersSlider .slick-prev {
            left: 10px;
        }
        .topScorersSlider .slick-next {
            right: 10px;
        }
        .topScorersSlider .box {
            min-height: 400px;
        }
    }
</style>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{URL::asset('frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<title>Gurukul Takshshila - Home</title>
</head>
<body>
     <section class="announcement">
        <div class="">
            <div class="announcementInner marqueeHorizontal">
                <div class="item marquee-content-hori">
                    गुरुकुल तक्षशिला Most Affordable Residential School
                </div>
                <div class="item marquee-content-hori">
                    An English medium, CBSE Affiliated, Senior Secondary, Residential (Boys) Gurukul with Difference
                </div>

            </div>
        </div>
    </section>
    @include('frontend.include.topbar')
    @include('frontend.include.head')

    <!-- Navbar section ends -->
    <div class="main">
        <!-- Banner -->
        <section class="banner">
            <div class="bannerSlider">
                @forelse($banners as $banner)
                <div class="sliderItem">
                    <img src="{{ asset('storage/' . $banner->image) }}" class="w100" style="width: 100%;" alt="{{ $banner->title ?? 'Banner' }}">
                </div>
                @empty
                <div class="sliderItem">
                    <img src="img/banner1.png" class="w100" alt="Default Banner">
                </div>
                @endforelse
            </div>
        </section>
        <div class="Maincontainer">
            <div class="mainInner">
                <div class="mainInnerleft">
                    <div class="mainInnerleftinner">
                        <div class="NewsEvents">
                            <div class="NewsEventsinner">
                                <h3>News Events</h3>
                                <div class="marquee">
                                    <ul class="marquee-inner">
                                        @forelse($newsEvents as $event)
                                        <li>
                                            <span class="date">{{ $event->created_at->format('d M Y') }}</span>
                                            {{ $event->title }}
                                            @if($event->description)
                                                - {{ Str::limit($event->description, 100) }}
                                            @endif
                                        </li>
                                        @empty
                                        <li>
                                            <span class="date">{{ date('d M Y') }}</span>No news or events available at the moment.
                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="NewsEvents naturalEvents ">
                            <div class="NewsEventsinner">
                                <h3>Quick Links</h3>

                                <ul>
                                     <li><a href="{{route('chairmain-message')}}"><i class="fas fa-user-tie"></i> Chairman Message</a></li>
                                    <li><a href="{{route('principal-message')}}"><i class="fas fa-chalkboard-teacher"></i> Principal Message</a></li>
                                    <li><a href="{{route('mandatory-disclosure')}}"><i class="fas fa-graduation-cap"></i>Mandatory Disclosure</a></li>
                                    <li><a href="{{route('admission-form')}}"><i class="fas fa-clipboard-list"></i>Admission Form</a></li>
                                    <li><a href="{{route('admission-procedure')}}"><i class="fas fa-check-circle"></i>Admission Procedure</a></li>
                                    <li><a href="{{route('contact')}}"><i class="fas fa-envelope"></i> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mainInnerRight">
                    <!-- Welcome section -->

                    	<section class="welcome">
                            <div class="container">
                                <h2 class="welcomeHeading">Welcome To Gurukul Takshila</h2>
                                
                                @forelse($homePageTexts as $index => $text)
                                <div class="row mb-4">
                                    <!-- Hindi Content - Left Side -->
                                    <div class="col-lg-6">
                                        <div class="content-section">
                                            <h3>{{ $text->heading_hi }}</h3>
                                            <div class="content-preview content-preview-hi-{{ $index }}">
                                                {!! Str::limit(strip_tags($text->text_hi), 250) !!}
                                            </div>
                                            <div class="content-full content-full-hi-{{ $index }}" style="display: none;">
                                                {!! $text->text_hi !!}
                                            </div>
                                            <span class="readMore" data-target="hi-{{ $index }}">Read More</span>
                                        </div>
                                    </div>
                                    
                                    <!-- English Content - Right Side -->
                                    <div class="col-lg-6">
                                        <div class="content-section">
                                            <h3>{{ $text->heading_en }}</h3>
                                            <div class="content-preview content-preview-en-{{ $index }}">
                                                {!! Str::limit(strip_tags($text->text_en), 250) !!}
                                            </div>
                                            <div class="content-full content-full-en-{{ $index }}" style="display: none;">
                                                {!! $text->text_en !!}
                                            </div>
                                            <span class="readMore" data-target="en-{{ $index }}">Read More</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>हमारा विज़न</h3>
                                        <p>भारतीय मूल्यों और वैज्ञानिक सोच पर आधारित इस प्रतिष्ठित शिक्षा केंद्र से वैश्विक नेता तैयार करना।</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3>Our Vision</h3>
                                        <p>"Build on Indian ethos and scientific temperament to prepare global leaders from this iconic learning center of the Country."</p>
                                    </div>
                                </div>
                                @endforelse
                                
                                @if($aboutSectionData && $aboutSectionData->chairman_message)
                                <br>
                                <h2 class="welcomeHeading">CHAIRMAN MESSAGE</h2>
                                <div class="personMessage">
                                    @if($aboutSectionData->chairman_image)
                                        <img src="{{ asset('storage/' . $aboutSectionData->chairman_image) }}" alt="Chairman">
                                    @else
                                        <img src="img/principal.png" alt="Chairman">
                                    @endif
                                    <p>{{ \Str::limit(strip_tags($aboutSectionData->chairman_message), 200) }}</p>
                                    <a href="{{ route('chairmain-message') }}" class="btn btn-sm" style="background: #ff6600; color: white; margin-top: 10px;">
                                        <i class="fas fa-book-reader"></i> Read More
                                    </a>
                                </div>
                                @endif
                                
                                @if($aboutSectionData && $aboutSectionData->principal_message)
                                <br>
                                <h2 class="welcomeHeading">PRINCIPAL&apos;S MESSAGE</h2>
                                <div class="personMessage">
                                    @if($aboutSectionData->principal_image)
                                        <img src="{{ asset('storage/' . $aboutSectionData->principal_image) }}" alt="Principal">
                                    @else
                                        <img src="img/principal.png" alt="Principal">
                                    @endif
                                    <p>{{ \Str::limit(strip_tags($aboutSectionData->principal_message), 200) }}</p>
                                    <a href="{{ route('principal-message') }}" class="btn btn-sm" style="background: #ff6600; color: white; margin-top: 10px;">
                                        <i class="fas fa-book-reader"></i> Read More
                                    </a>
                                </div>
                                @endif
                            </div>
				        </section>

			<!-- About section -->
			
                   

                    <!-- About section -->

                  


                    <!-- Inner Banner -->

                    <section class="innerBanner">
                        @if($innerBanner)
                            <img src="{{ asset('storage/' . $innerBanner->image) }}" class="w100" alt="{{ $innerBanner->title ?? 'Inner Banner' }}">
                        @else
                            <img src="img/banner1.png" class="w100" alt="Default Inner Banner">
                        @endif
                    </section>

                    <!-- Top scorer -->
                    <section class="TopScorer">
                        <div class="container">
                            <div class="MainHead text-center">
                                <h2>Our Top Scorers</h2>
                                <p>Celebrating academic excellence at Gurukul Takshshila</p>
                            </div>
                            
                            @if($topScorers->count() > 0)
                            <div class="topScorersSlider">
                                @foreach($topScorers as $scorer)
                                <div class="scorerSlide">
                                    <div class="box">
                                        <div class="image">
                                            @if($scorer->image)
                                                <img src="{{ asset('storage/' . $scorer->image) }}" alt="{{ $scorer->name }}">
                                            @else
                                                <div class="default-student-icon">
                                                    <i class="fas fa-user-graduate"></i>
                                                </div>
                                            @endif
                                            <i class="fa-solid fa-trophy trophy-icon"></i>
                                        </div>
                                        <h5 class="name">{{ $scorer->name }}</h5>
                                        <div class="class">Class {{ $scorer->class }} {{ $scorer->section }}</div>
                                        @if($scorer->percentage)
                                        <div class="percentage">{{ number_format($scorer->percentage, 2) }}%</div>
                                        @endif
                                        <div class="inSubject">School Topper in {{ $scorer->subject }}</div>
                                        @if($scorer->academic_year)
                                        <div class="year">Academic Year {{ $scorer->academic_year }}</div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center">
                                <p>No top scorers available at the moment.</p>
                            </div>
                            @endif
                        </div>
                    </section>


                    <!-- Icon with text section -->
                    <section class="iconWithText counterSec">
                        <div class="container">




                            <div class="container">

                                <div class="row">

                                    <div class="four col-md-3">
                                        <div class="counter-box colored">
                                            <i class="fa fa-thumbs-o-up"></i>
                                            <div class="iconText"><span class="counter">1000</span><i
                                                    class="fa-solid fa-plus"></i></div>
                                            <p>Happy Students</p>
                                        </div>
                                    </div>
                                    <div class="four col-md-3">
                                        <div class="counter-box">
                                            <i class="fa fa-group"></i>
                                            <div class="iconText"><span class="counter">50</span><i
                                                    class="fa-solid fa-plus"></i></div>
                                            <p>Expert Teachers</p>
                                        </div>
                                    </div>
                                    <div class="four col-md-3">
                                        <div class="counter-box">
                                            <i class="fa-solid fa-face-grin-stars"></i>
                                            <div class="iconText"><span class="counter">15</span><i
                                                    class="fa-solid fa-plus"></i></div>
                                            <p>Years of Excellence</p>
                                        </div>
                                    </div>
                                    <div class="four col-md-3">
                                        <div class="counter-box">
                                            <i class="fa-solid fa-check"></i>
                                            <div class="iconText"><span class="counter">95</span><i
                                                    class="fa-solid fa-plus"></i></div>
                                            <p>Success Rate</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </section>

                    <!-- Infrastructure section -->
                    <section class="infrastructure">
                        <div class="container">
                            <div class="MainHead text-center">
                                <h2>Our Infrastructure</h2>
                                <p>State-of-the-art facilities designed to provide the best learning enviornment</p>

                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="infrastructureInner">
                                        <div class="iconArea">
                                            <div class="icon"><i class="fa-solid fa-user"></i></div>
                                        </div>
                                        <h4>Modern Classrooms</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="infrastructureInner">
                                        <div class="iconArea">
                                            <div class="icon"><i class="fa-solid fa-book"></i></div>
                                        </div>
                                        <h4>Library & Study Hall</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="infrastructureInner">
                                        <div class="iconArea">
                                            <div class="icon"><i class="fa-solid fa-house"></i></div>
                                        </div>
                                        <h4>Residential Facilities</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="infrastructureInner">
                                        <div class="iconArea">
                                            <div class="icon"><i class="fa-solid fa-user"></i></div>
                                        </div>
                                        <h4>Yoga & Meditation Hall</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="infrastructureInner">
                                        <div class="iconArea">
                                            <div class="icon"><i class="fa-solid fa-dumbbell"></i></div>
                                        </div>
                                        <h4>Sports Complex</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="infrastructureInner">
                                        <div class="iconArea">
                                            <div class="icon"><i class="fa-solid fa-utensils"></i></div>
                                        </div>
                                        <h4>Dining Hall</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Footer -->
                </div>
            </div>

        </div>

     

     @include('frontend.include.footer')
       

    </div>
    
    @include('frontend.include.welcome-popup')
    @include('frontend.include.admission-popup')
    @include('frontend.include.js')
    
    <script>
    $(document).ready(function(){
        // Initialize Top Scorers Slider
        $('.topScorersSlider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    });
    </script>
</body>

</html>
