<!doctype html>
<html lang="en">

@include('frontend.include.css')

<body>

<!-- Topbar -->
@include('frontend.include.topbar')

<!-- Header -->
@include('frontend.include.head')

<div class="main">

    <!-- DYNAMIC ORANGE BANNER -->
    <x-inner-banner title="Core Values" pageKey="core-values" />

    <!-- Core Values Section -->
    <section class="coreValuesSection py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Content -->
                <div class="col-lg-6 mb-4">
                    <div class="coreContent">
                        <span class="sectionTag">Our Foundation</span>
                        <h1>Core Value</h1>

                        <div class="coreCard">
                            <ul>
                                <li>
                                    To help children acquire the subject knowledge, skills and
                                    understandings they need to become aware of themselves and
                                    the world around them.
                                </li>
                                <li>
                                    To help children develop an international mindset alongside
                                    an ingrained and deep-rooted sensitivity of their own nationality.
                                </li>
                                <li>
                                    To do each of these in ways that take into account up-to-date
                                    research into how children learn and how they can be encouraged
                                    to be lifelong learners.
                                </li>
                                <li>
                                    Respect for diversity of people, faith, culture, and ideas.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="col-lg-6 mb-4">
                    <div class="coreImage">
                        <img src="https://picsum.photos/700/500?random=10" alt="Core Values">
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

<style>
    .coreValuesSection {
    position: relative;
}

.sectionTag {
    display: inline-block;
    font-size: 13px;
    color: #ff8a00;
    font-weight: 600;
    margin-bottom: 8px;
}

.coreContent h2 {
    font-weight: 700;
    margin-bottom: 20px;
}

.coreCard {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    border-left: 4px solid #ff8a00;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.coreCard ul {
    padding-left: 18px;
    margin: 0;
}

.coreCard li {
    font-size: 14.5px;
    line-height: 1.8;
    margin-bottom: 10px;
}

.coreImage img {
    width: 100%;
    border-radius: 16px;
    border: 3px solid #ff8a00;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* Mobile */
@media (max-width: 768px) {
    .coreContent h2 {
        font-size: 26px;
    }
}
</style>