<!doctype html>
<html lang="en">

@include('frontend.include.css')

<body>

<!-- head top -->
@include('frontend.include.topbar')
<!-- head top ends -->

<!-- Navbar section -->
@include('frontend.include.head')
<!-- Navbar section ends -->

<div class="main">

    <!-- INNER BANNER COMPONENT -->
    <x-inner-banner title="Principal Message" />

    <!-- Principal Message Section -->
    <section class="aboutUs principalMessage py-5">
        <div class="container">
            <div class="row align-items-start">

                <!-- Left Profile Card -->
                <div class="col-lg-4 mb-4">
                    <div class="profileCard text-center">
                        <div class="profileImg">
                            <img src="{{ asset('storage/principal/principal.jpg') }}" alt="Principal">
                        </div>
                        <h4 class="mt-3">Principal</h4>
                        <span>Gurukul Takshshila</span>
                    </div>
                </div>

                <!-- Right Message Content -->
                <div class="col-lg-8">
                    <div class="messageContent">
                        <div class="MainHead text-start">
                            <h2>Principal Message</h2>
                            <p>Gurukul Takshshila</p>
                        </div>

                        <p>
                            It is my great pleasure to welcome you all to Gurukul Takshshila.
                            Our institution believes in nurturing young minds with a balance
                            of academic excellence and strong moral values.
                        </p>

                        <p>
                            We focus on holistic education where students are encouraged
                            to think creatively, develop leadership qualities, and grow
                            into responsible global citizens.
                        </p>

                        <p>
                            Our dedicated faculty, modern infrastructure, and value-based
                            education system ensure that every child reaches their true
                            potential.
                        </p>

                        <p>
                            I warmly invite parents and students to be a part of this
                            enriching educational journey.
                        </p>

                        <p class="fw-bold mt-4">
                            Warm Regards,<br>
                            Principal<br>
                            Gurukul Takshshila
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
