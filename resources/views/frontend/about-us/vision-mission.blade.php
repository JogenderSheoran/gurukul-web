<!doctype html>
<html lang="en">

@include('frontend.include.css')

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- DYNAMIC INNER BANNER -->
    <x-inner-banner title="Vision & Mission" />

    <!-- Vision Section -->
    <section class="visionMissionSection py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Vision Text -->
                <div class="col-lg-6 mb-4">
                    <div class="vmContent">
                        <span class="sectionTag">Our Vision</span>
                        <h2>Vision Statement</h2>

                        <div class="vmCard">
                            <h5>Our Vision</h5>
                            <p>
                                Gurukul Takshshila aims to create and nurture the traditional
                                value of the Vedic system for holistic development of the child,
                                promoting excellence, innovation, lifelong learning, and a
                                learner-centered environment of world-class standards.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Vision Image (DUMMY) -->
                <div class="col-lg-6 mb-4">
                    <div class="vmImage">
                        <img src="https://picsum.photos/700/450?random=1" alt="Vision Image">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="visionMissionSection py-5 bg-light">
        <div class="container">
            <div class="row align-items-center flex-lg-row-reverse">

                <!-- Mission Text -->
                <div class="col-lg-6 mb-4">
                    <div class="vmContent">
                        <span class="sectionTag">Our Mission</span>
                        <h2>Mission Statement</h2>

                        <div class="vmCard">
                            <h5>Our Mission</h5>
                            <ul>
                                <li>To develop strong moral values, character, and discipline.</li>
                                <li>To provide a dynamic and inclusive learning environment.</li>
                                <li>To encourage critical thinking and creativity.</li>
                                <li>To nurture leadership, teamwork, and responsibility.</li>
                                <li>To inspire lifelong learning and curiosity.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Mission Image (DUMMY) -->
                <div class="col-lg-6 mb-4">
                    <div class="vmImage">
                        <img src="https://picsum.photos/700/450?random=2" alt="Mission Image">
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
<style>
    .visionMissionSection { position: relative; }

.sectionTag {
    font-size: 13px;
    color: #ff8a00;
    font-weight: 600;
    margin-bottom: 8px;
    display: inline-block;
}

.vmContent h2 {
    font-weight: 700;
    margin-bottom: 20px;
}

.vmCard {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    border-left: 4px solid #ff8a00;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.vmCard h5 {
    font-weight: 700;
    margin-bottom: 10px;
}

.vmCard p,
.vmCard li {
    font-size: 14.5px;
    line-height: 1.8;
}

.vmCard ul { padding-left: 18px; }

.vmImage img {
    width: 100%;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}
</style>
