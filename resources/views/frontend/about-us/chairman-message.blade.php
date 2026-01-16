<!doctype html>
<html lang="en">

@include('frontend.include.css')

<style>
.profileCard {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.profileImg {
    width: 200px;
    height: 200px;
    margin: 0 auto 20px;
    border-radius: 50%;
    overflow: hidden;
    border: 5px solid #ff6600;
}

.profileImg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profileCard h4 {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 5px;
}

.profileCard span {
    color: #666;
    font-size: 16px;
}

.messageContent {
    background: #f9f9f9;
    padding: 30px;
    border-radius: 15px;
}

.MainHead h2 {
    color: #ff6600;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
}

.MainHead p {
    color: #666;
    font-size: 16px;
    margin-bottom: 25px;
}

.message-text {
    line-height: 1.8;
    color: #444;
    font-size: 16px;
}

.message-text p {
    margin-bottom: 15px;
}
</style>

<body>

<!-- head top -->
@include('frontend.include.topbar')
<!-- head top ends -->

<!-- Navbar section -->
@include('frontend.include.head')
<!-- Navbar section ends -->

<div class="main">

    <!-- INNER BANNER COMPONENT -->
    <x-inner-banner title="Chairman Message" pageKey="chairman-message" />

    <!-- Chairman Message Section -->
    <section class="aboutUs principalMessage py-5">
        <div class="container">
            @if($aboutSectionData && $aboutSectionData->chairman_message)
            <div class="row align-items-start">

                <!-- Left Profile Card -->
                <div class="col-lg-4 mb-4">
                    <div class="profileCard text-center">
                        <div class="profileImg">
                            @if($aboutSectionData->chairman_image)
                                <img src="{{ asset('storage/' . $aboutSectionData->chairman_image) }}" alt="Chairman">
                            @else
                                <img src="{{ asset('img/principal.png') }}" alt="Chairman">
                            @endif
                        </div>
                        <h4 class="mt-3">Chairman</h4>
                        <span>Gurukul Takshshila</span>
                    </div>
                </div>

                <!-- Right Message Content -->
                <div class="col-lg-8">
                    <div class="messageContent">
                        <div class="MainHead text-start">
                            <h2>Chairman&apos;s Message</h2>
                            <p>Gurukul Takshshila</p>
                        </div>

                        <div class="message-text">
                            {!! $aboutSectionData->chairman_message !!}
                        </div>
                    </div>
                </div>

            </div>
            @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Chairman&apos;s message will be available soon.
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
