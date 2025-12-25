<!doctype html>
<html lang="en">

@include('frontend.include.css')

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- DYNAMIC INNER BANNER -->
    <x-inner-banner title="Vision & Mission" pageKey="vision-mission" />

    <!-- Vision Section -->
    <section class="visionMissionSection py-5">
        <div class="container">
            @if($aboutSectionData && $aboutSectionData->our_vision)
            <div class="row align-items-center">

                <!-- Vision Text -->
                <div class="col-lg-6 mb-4">
                    <div class="vmContent">
                        <span class="sectionTag">Our Vision</span>
                        <h2>Vision Statement</h2>

                        <div class="vmCard">
                            <h5>Our Vision</h5>
                            <div>
                                {!! $aboutSectionData->our_vision !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vision Image -->
                <div class="col-lg-6 mb-4">
                    <div class="vmImage">
                        @if($aboutSectionData->our_vision_image)
                            <img src="{{ asset('storage/' . $aboutSectionData->our_vision_image) }}" alt="Vision Image">
                        @else
                            <img src="{{ asset('img/default-vision.jpg') }}" alt="Vision Image">
                        @endif
                    </div>
                </div>

            </div>
            @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Vision content will be available soon.
            </div>
            @endif
        </div>
    </section>

    <!-- Mission Section -->
    <section class="visionMissionSection py-5 bg-light">
        <div class="container">
            @if($aboutSectionData && $aboutSectionData->our_mission)
            <div class="row align-items-center flex-lg-row-reverse">

                <!-- Mission Text -->
                <div class="col-lg-6 mb-4">
                    <div class="vmContent">
                        <span class="sectionTag">Our Mission</span>
                        <h2>Mission Statement</h2>

                        <div class="vmCard">
                            <h5>Our Mission</h5>
                            <div>
                                {!! $aboutSectionData->our_mission !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mission Image -->
                <div class="col-lg-6 mb-4">
                    <div class="vmImage">
                        @if($aboutSectionData->our_mission_image)
                            <img src="{{ asset('storage/' . $aboutSectionData->our_mission_image) }}" alt="Mission Image">
                        @else
                            <img src="{{ asset('img/default-mission.jpg') }}" alt="Mission Image">
                        @endif
                    </div>
                </div>

            </div>
            @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Mission content will be available soon.
            </div>
            @endif
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
