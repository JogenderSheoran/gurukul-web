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

    {{-- Admission common CSS --}}
    @include('frontend.include.admission-css')
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    {{-- ORANGE BANNER --}}
    <x-inner-banner
        title="Fee Structure"
        subtitle="Gurukul Takshshila – Comprehensive Fee Details & Payment Options"
    />

    <section class="admissionPage py-5">
        <div class="container">
            <div class="row g-4">

                {{-- LEFT CONTENT --}}
                <div class="col-lg-8">

                    {{-- INTRO CARD --}}
                    <div class="gradientCard">
                        <h3>Fee Structure</h3>
                        <p>
                            Comprehensive fee details, concession policies and refund rules
                            applicable for admission at Gurukul Takshshila.
                        </p>
                    </div>

                    {{-- ACCOUNT DETAILS --}}
                    <div class="contentBlock">
                        <h4>Fee Structure (2026–27)</h4>

                        <h5 class="mt-3">Account Details</h5>

                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Bank Name</strong>
                                    ICICI Bank
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Account No.</strong>
                                    376005001644
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Account Name</strong>
                                    Gurukul Takshshila
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>IFSC Code</strong>
                                    ICIC0003760
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CONCESSION POLICY --}}
                    <div class="contentBlock">
                        <h4>Fee Concession Policy</h4>

                        <p>
                            Gurukul Takshshila provides fee concession only on tuition fees
                            and only for students having blood relations.
                        </p>

                        <div class="infoNote">
                            <strong>Two Children (Blood Relation):</strong><br>
                            From the same parents, the second child’s quarterly (three months)
                            tuition fee will be waived.
                        </div>

                        <div class="infoNote mt-3">
                            <strong>Three Children:</strong><br>
                            From the same parents, the half-yearly tuition fee of the third child
                            will be waived.
                        </div>

                        <div class="infoNote mt-3" style="background:#e8f7fb;border-left-color:#0aa2c0;">
                            <strong>Important:</strong> No request will be entertained
                            except the prescribed concession.
                        </div>
                    </div>

                    {{-- REFUND POLICY --}}
                    <div class="contentBlock">
                        <h4>Refund Policy</h4>

                        <p>
                            If for any reason admission is cancelled, the fee will be refunded
                            as per Gurukul Takshshila refund procedure.
                        </p>

                        <h6 class="mt-3">Refund Calculation</h6>

                        <div class="contactCard">
                            <strong>Deductions:</strong>
                            <ul class="mt-2">
                                <li>Admission Fee</li>
                                <li>Three Months Tuition Fee</li>
                                <li>One Month Mess Fee</li>
                                <li>One Month Hostel Fee</li>
                            </ul>

                            <div class="infoNote mt-3">
                                The remaining amount will be deposited back into the
                                registered bank account.
                            </div>
                        </div>

                        <div class="infoNote mt-3">
                            <strong>Note:</strong> Books and uniform once used
                            cannot be returned.
                        </div>
                    </div>

                    {{-- ADMIN CONTACT --}}
                    <div class="contentBlock">
                        <h4>Administrative Officer Contact</h4>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Contact</strong>
                                    7419192930
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Reception</strong>
                                    7419192931 (Time 08:00 AM to 05:00 PM)
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Admission Related Query</strong>
                                    7419192932, 7082001718
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Chief Warden</strong>
                                    7419192936
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Asst. Warden</strong>
                                    7419192937
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>CBSE & Other Related Query</strong>
                                    7419192938
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contactCard">
                                    <strong>Student Fees Related</strong>
                                    7419192939
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDEBAR --}}
                <div class="col-lg-4">

                    <div class="sideBox">
                        <h5>Quick Links</h5>
                        <ul class="sideLinks">
                            <li><a href="{{ route('admission-form') }}">Admission Form</a></li>
                            <li><a href="{{ route('admission-procedure') }}">Admission Procedure</a></li>
                            <li><a href="{{ route('entrance-cum-syllabus') }}">Entrance cum Syllabus</a></li>
                            <li class="active"><a href="{{ route('fee-structure') }}">Fee Structure</a></li>
                            <li><a href="{{ route('required-item') }}">Required Items</a></li>
                            <li><a href="{{ route('important-information') }}">Important Information</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="sideBox">
                        <h5>Payment Options</h5>
                        <ul class="infoList">
                            <li>Lump-sum (1 month exemption)</li>
                            <li>Installments (2–4 options)</li>
                            <li>Monthly (Due: 10th)</li>
                        </ul>
                    </div>

                    <div class="sideBox">
                        <h5>Important Notes</h5>
                        <ul class="infoList">
                            <li>Late payment fine: ₹100 per day</li>
                            <li>Sibling discounts available</li>
                            <li>Refund policy applies</li>
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
