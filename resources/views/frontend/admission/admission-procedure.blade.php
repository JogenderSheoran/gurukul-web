<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

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
        title="Admission Procedure"
        subtitle="Gurukul Takshshila – Requirements & Selection Process"
        pageKey="admission-procedure"
    />

    <section class="admissionPage py-5">
        <div class="container">
            <div class="row">

                <!-- LEFT CONTENT -->
                <div class="col-lg-8">

                    <h2 class="sectionTitle">
                        Requirements for Selection in Gurukul Takshshila Admission
                    </h2>

                    <!-- Registration -->
                    <div class="contentBlock">
                        <h4>Registration Process</h4>
                        <p>
                            An announcement will be made for the vacant seats at the discretion
                            of the Principal, usually three to four months before the academic
                            year begins.
                        </p>

                        <p>
                            A non-refundable registration fee will be charged. Registration does
                            not guarantee admission and is subject to testing and interview.
                        </p>

                        <div class="infoNote">
                            <strong>Important:</strong> Only registered candidates will be
                            eligible for admission.
                        </div>
                    </div>

                    <!-- Admission Process -->
                    <div class="contentBlock">
                        <h4>Admission Process</h4>
                        <p>
                            After registration, candidates will be informed about the
                            Entrance Test and Interview schedule.
                        </p>

                        <h5>Entrance Test</h5>
                        <ul class="checkList">
                            <li>English</li>
                            <li>Mathematics</li>
                            <li>Hindi</li>
                            <li>General Knowledge</li>
                        </ul>

                        <p>
                            Tests are based on the previous class syllabus.
                        </p>

                        <h5>Interview Process</h5>
                        <ul class="starList">
                            <li>Potential and aptitude</li>
                            <li>Personality and intelligence</li>
                            <li>Sporting skills</li>
                            <li>Creative abilities</li>
                        </ul>
                    </div>

                    <!-- Selection -->
                    <div class="contentBlock">
                        <h4>Selection Process</h4>

                        <p>
                            Selection is strictly based on merit and subject to the
                            decision of the Admission Committee.
                        </p>

                        <div class="infoNote warning">
                            <strong>Note:</strong> The Admission Committee reserves the
                            right to reject any application without assigning reasons.
                        </div>
                    </div>

                    <!-- Documents -->
                    <div class="contentBlock">
                        <h4>Required Documents</h4>

                        <ul class="docList">
                            <li>Visitors List</li>
                            <li>Clothing List</li>
                            <li>Travel Instructions</li>
                            <li>Medical Certificate</li>
                            <li>Personal Data Form</li>
                        </ul>
                    </div>

                    <!-- Contacts -->
                    <div class="contentBlock">
                        <h4>Contact Information</h4>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Contact</strong>
                                    <p>7419192930</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Reception</strong>
                                    <p>7419192931 (Time 08:00 AM to 05:00 PM)</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Admission Related Query</strong>
                                    <p>7419192932, 7082001718</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Chief Warden</strong>
                                    <p>7419192936</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Asst. Warden</strong>
                                    <p>7419192937</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>CBSE & Other Related Query</strong>
                                    <p>7419192938</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Student Fees Related</strong>
                                    <p>7419192939</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="col-lg-4">

                    <!-- Quick Links -->
                    <div class="sideBox">
                        <h5>Quick Links</h5>
                        <ul class="sideLinks">
                            <li><a href="{{ route('admission-form') }}">Admission Form</a></li>
                            <li class="active"><a href="{{ route('admission-procedure') }}">Admission Procedure</a></li>
                            <li><a href="{{ route('entrance-cum-syllabus') }}">Entrance cum Syllabus</a></li>
                            <li><a href="{{ route('fee-structure') }}">Fee Structure</a></li>
                            <li><a href="{{ route('required-item') }}">Required Items</a></li>
                            <li><a href="{{ route('important-information') }}">Important Information</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Highlights -->
                    <div class="sideBox">
                        <h5>Admission Highlights</h5>

                        <div class="highlightItem">
                            📅 <strong>Academic Year 2025</strong><br>
                            Admissions Open
                        </div>

                        <div class="highlightItem">
                            🎓 <strong>Classes Available</strong><br>
                            Nursery to Class 12th
                        </div>

                        <div class="highlightItem">
                            🏠 <strong>Boarding Facility</strong><br>
                            Available for All Classes
                        </div>
                    </div>

                    <!-- Help -->
                    <div class="sideBox helpBox">
                        <h5>Need Help?</h5>
                        <p>
                            For any admission related queries,
                            contact our counselors.
                        </p>
                        <a href="tel:7419192932" class="btn btn-orange w-100">
                            Call Now
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')
<style>
    .admissionPage .sectionTitle{
    font-weight:700;
    margin-bottom:25px;
}

.contentBlock{
    margin-bottom:40px;
}

.contentBlock h4{
    font-weight:700;
    margin-bottom:12px;
}

.infoNote{
    background:#fff4e5;
    border-left:4px solid #ff8a00;
    padding:12px 15px;
    font-size:14px;
    margin-top:15px;
}

.infoNote.warning{
    background:#fff1f1;
    border-color:#ff5a5a;
}

.checkList li::before{
    content:"✔";
    color:#ff8a00;
    margin-right:8px;
}

.starList li::before{
    content:"★";
    color:#ff8a00;
    margin-right:8px;
}

.sideBox{
    background:#fff;
    border-radius:12px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:25px;
}

.sideLinks li{
    list-style:none;
}

.sideLinks li a{
    display:block;
    padding:8px 0;
    color:#333;
}

.sideLinks li.active a{
    background:#ff8a00;
    color:#fff;
    padding:8px 12px;
    border-radius:6px;
}

.highlightItem{
    padding:10px 0;
    font-size:14px;
}

.contactCard{
    background:#f8f9fa;
    padding:12px;
    border-radius:8px;
}

.helpBox{
    background:#fff7ec;
}
</style>
</body>
</html>
