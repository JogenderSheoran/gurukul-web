<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')
    @include('frontend.include.admission-css')
    <x-seo
        :title="$seo['title']"
        :description="$seo['description']"
        :keywords="$seo['keywords']"
        :image="$seo['image']"
    />
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- ORANGE BANNER -->
    <x-inner-banner
        title="Entrance cum Syllabus"
        subtitle="Gurukul Takshshila – Admission Test Information & Syllabus Details"
    />

    <section class="admissionPage py-5">
        <div class="container">
            <div class="row">

                <!-- LEFT CONTENT -->
                <div class="col-lg-8">

                    <!-- INTRO CARD -->
                    <div class="gradientCard mb-4">
                        <h3>Entrance cum Syllabus</h3>
                        <p>
                            Complete information about entrance examination and syllabus
                            for admission to Gurukul Takshshila.
                        </p>
                    </div>

                    <!-- TABLE -->
                    <div class="contentBlock">
                        <h4>Syllabus and Entrance Test Table</h4>

                        <div class="table-responsive">
                            <table class="table entranceTable">
                                <thead>
                                    <tr>
                                        <th>Round-I</th>
                                        <th>Round-II</th>
                                        <th>Round-III</th>
                                        <th>Round-IV</th>
                                        <th>Total Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Written Test<br><strong>40 Marks</strong></td>
                                        <td>Reading Skills<br>(English + Hindi)<br><strong>20 Marks</strong></td>
                                        <td>Writing Skills<br>(English + Hindi)<br><strong>20 Marks</strong></td>
                                        <td>Intra-personal Interview<br><strong>20 Marks</strong></td>
                                        <td class="totalCell">100 Marks</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="infoNote">
                            <strong>Note:</strong> The entrance test does not guarantee admission.
                            Final decision depends on merit and the Admission Committee.
                        </div>

                        <p class="mt-3">
                            <strong>Syllabus:</strong> Based on previous class syllabus including
                            basic grammar of English & Hindi, fundamentals of Mathematics,
                            EVS, General Science, Social Science and Current Affairs.
                        </p>
                    </div>

                    <!-- CONTACT -->
                    <div class="contentBlock">
                        <h4>Contact for Admission Queries</h4>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Admission Department</strong>
                                    <p>7082001718, 7419192930</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Assistant Registrar</strong>
                                    <p>7419192938</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Query & Counseling</strong>
                                    <p>7419192932</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Accountant</strong>
                                    <p>7419192939</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="col-lg-4">

                    <div class="sideBox">
                        <h5>Quick Links</h5>
                        <ul class="sideLinks">
                            <li><a href="{{ route('admission-form') }}">Admission Form</a></li>
                            <li><a href="{{ route('admission-procedure') }}">Admission Procedure</a></li>
                            <li class="active"><a href="{{ route('entrance-cum-syllabus') }}">Entrance cum Syllabus</a></li>
                            <li><a href="{{ route('fee-structure') }}">Fee Structure</a></li>
                            <li><a href="{{ route('required-item') }}">Required Items</a></li>
                            <li><a href="{{ route('important-information') }}">Important Information</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="sideBox">
                        <h5>Admission Process</h5>

                        <div class="stepItem"><span>1</span> Fill Application Form</div>
                        <div class="stepItem"><span>2</span> Appear for Entrance Test</div>
                        <div class="stepItem"><span>3</span> Merit List & Selection</div>
                        <div class="stepItem"><span>4</span> Final Admission</div>
                    </div>

                    <div class="sideBox">
                        <h5>Important Information</h5>
                        <ul class="infoList">
                            <li>Admission forms available throughout the year</li>
                            <li>Test duration: 2 hours</li>
                            <li>Merit-based selection</li>
                        </ul>
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
