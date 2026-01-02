<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <x-seo
        title="Important Information | Gurukul Takshshila Rules & Regulations"
        description="Rules, regulations, discipline guidelines and boarding rules of Gurukul Takshshila"
        keywords="Gurukul Takshshila rules, boarding rules, school discipline, hostel rules"
        image="{{ asset('assets/images/seo/rules.jpg') }}"
    />

    @include('frontend.include.important-information-css')
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- ===== ORANGE BANNER ===== -->
    <x-inner-banner
        title="Important Information"
        subtitle="Gurukul Takshshila – Rules, Regulations & Guidelines"
    />

    <!-- ===== CONTENT ===== -->
    <section class="importantPage py-5">
        <div class="container">

            <!-- ===== CONDUCT RULES ===== -->
            <div class="ruleSection">
                <h3 class="sectionTitle">
                    Conduct and Discipline Rules of GURUKUL TAKSHSHILA
                </h3>

                <p class="hindiTitle">गुरुकुल तक्षशिला के आचार नियम</p>

                <div class="ruleList">

                    <div class="ruleItem">
                        <span class="ruleNo">1.</span>
                        <div>
                            <p class="hindiText">
                                मेरा बेटा नियमित रूप से गुरुकुल आएगा और गुरुकुल तक्षशिला,
                                अहमदपुर-रसिना (कैथल) हरियाणा में रहकर पढ़ाई करेगा।
                            </p>
                            <p class="engText">
                                My son will come to Gurukul regularly and study at Gurukul Takshshila,
                                Ahmedpur-Rasina (Kaithal), Haryana and follow all rules.
                            </p>
                        </div>
                    </div>

                    <div class="ruleItem">
                        <span class="ruleNo">2.</span>
                        <div>
                            <p class="hindiText">
                                प्रवेश के समय या बाद में दस्तावेज़ों की त्रुटि के लिए माता-पिता जिम्मेदार होंगे।
                            </p>
                            <p class="engText">
                                Parents/guardians will be responsible for any problem in documents.
                            </p>
                        </div>
                    </div>

                    <div class="ruleItem">
                        <span class="ruleNo">3.</span>
                        <div>
                            <p class="hindiText">
                                बच्चे की सही मेडिकल रिपोर्ट देना अनिवार्य होगा।
                            </p>
                            <p class="engText">
                                Parents must provide correct medical report of the child.
                            </p>
                        </div>
                    </div>

                    <div class="ruleItem">
                        <span class="ruleNo">4.</span>
                        <div>
                            <p class="hindiText">
                                विजिट का समय सोमवार से शनिवार सुबह 10:00 से दोपहर 2:00 तक रहेगा।
                            </p>
                            <p class="engText">
                                Visiting hours: Monday to Saturday (10:00 AM – 2:00 PM).
                            </p>
                        </div>
                    </div>

                    <div class="ruleItem">
                        <span class="ruleNo">5.</span>
                        <div>
                            <p class="hindiText">
                                परीक्षा में अनुपस्थिति, झगड़ा, संपत्ति नुकसान, धूम्रपान आदि पर प्रवेश रद्द हो सकता है।
                            </p>
                            <ul class="bulletList">
                                <li>Absence in examinations</li>
                                <li>Contempt of Gurukul rules</li>
                                <li>Fighting or quarrelling</li>
                                <li>Damage to property</li>
                                <li>Smoking or alcohol use</li>
                            </ul>
                        </div>
                    </div>

                    <div class="ruleItem">
                        <span class="ruleNo">6.</span>
                        <div>
                            <p class="hindiText">
                                फीस वापसी गुरुकुल की निर्धारित प्रक्रिया अनुसार होगी।
                            </p>
                            <p class="engText">
                                Fee refund will be as per Gurukul Takshshila’s refund policy.
                            </p>
                        </div>
                    </div>

                </div>

                <p class="signature">
                    प्रबंधक, गुरुकुल तक्षशिला<br>
                    <strong>Manager, Gurukul Takshshila</strong>
                </p>
            </div>

            <!-- ===== GOLDEN RULES ===== -->
            <div class="ruleSection mt-5">
                <h3 class="sectionTitle">
                    Golden Rules of Gurukul Takshshila's Boarding
                </h3>

                <p class="hindiTitle">गुरुकुल तक्षशिला के बोर्डिंग के नियम</p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="goldenCard">
                            <strong>1.</strong>
                            Brahmacharis must remain disciplined and courteous at all times.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="goldenCard">
                            <strong>2.</strong>
                            Good manners and cultured behavior are mandatory.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="goldenCard">
                            <strong>3.</strong>
                            Only prescribed uniform and clean clothes are allowed.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="goldenCard">
                            <strong>4.</strong>
                            Respect teachers, staff and fellow students.
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== IMPORTANT WARNING ===== -->
            <div class="warningBox mt-5">
                <strong>⚠ Important Rule:</strong>
                Mobile phones and electronic gadgets are strictly prohibited.
                Fine of ₹10,000 will be imposed if found.
            </div>

            <!-- ===== CONTACT BOX ===== -->
            <div class="contactBox mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h5>📞 Contact</h5>
                        <p>7419192930</p>
                    </div>
                    <div class="col-md-6">
                        <h5>📍 Address</h5>
                        <p>
                            Gurukul Takshshila<br>
                            Karnal-Kaithal Highway<br>
                            Ahmedpur, Rasina-136042<br>
                            Teh. Pundri District Kaithal, Haryana
                        </p>
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
