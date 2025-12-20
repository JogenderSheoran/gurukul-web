<!doctype html>
<html lang="en">
@include('frontend.include.css')

<body>
     <section class="announcement">
        <div class="">
            <div class="announcementInner marqueeHorizontal">
                <div class="item marquee-content-hori">
                    Most Affordable Residential School
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
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                                    <li><a href="#">CBSE Rules</a></li>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mainInnerRight">
                    <!-- Welcome section -->

                    <section class="welcome">
                        <div class="container">
                            <h2 class="welcomeHeading">Welcome To Gurukul Takshila</h2>
                            @foreach($homePageTexts as $text)
                                <h3>{{ $text->heading_en }}</h3>
                                <div>{!! $text->text_en !!}</div>
                                @if(!$loop->last)
                                    <br>
                                @endif
                            @endforeach
                            
                            @if($homePageTexts->isEmpty())
                            <h3>Our Vision</h3>
                            <p>"Build on Indian ethos and scientific temperament to prepare global leaders from this
                                iconic learning center of the Country."</p>
                            <h3>Our Mission</h3>
                            <p>Founded in 1912 by Swami Shardhanand Ji with grand vision of inculcating Indian ethos and
                                scientific temperament in the young minds, Gurukul Kurukshetra has been on mission mode
                                ever since its inception to provide public school education from its sprawling 40 Acres
                                campus to create safe, secure, happy and stimulating learning environment to instill
                                honor, respect and compassion in each student and prepare him for success throughout his
                                life.</p>
                            @endif
                        </div>
                    </section>

                    <!-- About section -->

                    <section class="aboutUs">
                        <div class="container">
                            <div class="MainHead">
                                <h2>About Us</h2>
                                <h3>Where can I get some?</h3>
                                <p>There are many variations of passages of Lorem Ipsum available</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="aboutText">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.
                                        <span class="readMore">Read More</span>
                                        <div class="hoverText">
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout. The point of using
                                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                            opposed to using 'Content here, content here', making it look like readable
                                            English.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="aboutText">
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.
                                        <span class="readMoreNext">Read More</span>
                                        <div class="hoverTextNext">
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout. The point of using
                                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                            opposed to using 'Content here, content here', making it look like readable
                                            English.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


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
                                <p>Stay updated with the latest happenings and upcoming events at Gurukul Takshila</p>
                            </div>
                            <div class="row">
                                @forelse($topScorers as $scorer)
                                <div class="col-lg-4">
                                    <div class="box">
                                        <div class="image">
                                            @if($scorer->image)
                                                <img src="{{ asset('storage/' . $scorer->image) }}" alt="{{ $scorer->name }}">
                                            @else
                                                <img src="img/student.png" alt="{{ $scorer->name }}">
                                            @endif
                                            <i class="fa-solid fa-trophy"></i>
                                        </div>
                                        <h5 class="name">{{ $scorer->name }}</h5>
                                        <div class="class">Class {{ $scorer->class }} {{ $scorer->section }}</div>
                                        @if($scorer->percentage)
                                        <div class="percentage">{{ $scorer->percentage }}%</div>
                                        @endif
                                        <div class="inSubject">School Topper in {{ $scorer->subject }}</div>
                                        @if($scorer->academic_year)
                                        <div class="year">Academic Year {{ $scorer->academic_year }}</div>
                                        @endif
                                    </div>
                                </div>
                                @empty
                                <div class="col-lg-12 text-center">
                                    <p>No top scorers available at the moment.</p>
                                </div>
                                @endforelse
                            </div>
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
    @include('frontend.include.js')
</body>

</html>
