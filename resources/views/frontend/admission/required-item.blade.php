<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <x-seo
        title="Required Items for Admission | Gurukul Takshshila"
        description="Complete list of required items, inventory details and school uniform for Gurukul Takshshila admission."
        keywords="required items gurukul, school inventory list, hostel items, school uniform"
        image="{{ asset('images/seo/required-items.jpg') }}"
    />

   @include('frontend.include.required-item-css')
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- Banner -->
    <x-inner-banner
        title="Required Items"
        subtitle="Complete list of items required for admission and hostel stay"
        pageKey="required-item"
    />

    <section class="requiredPage py-5">
        <div class="container">
            <div class="row">

                <!-- LEFT CONTENT -->
                <div class="col-lg-8">

                    <!-- Tabs -->
                    <div class="tabsWrapper mb-4">
                        <button class="tabBtn active" data-tab="items">Required Items & Stationary</button>
                        <button class="tabBtn" data-tab="inventory">Inventory Detail</button>
                        <button class="tabBtn" data-tab="uniform">School Uniform</button>
                    </div>

                    <!-- TAB 1 -->
                    <div class="tabContent active" id="items">
                        <div class="contentCard">
                            <h4>Required Items (To bring from home)</h4>

                            <ul class="itemList">
                                <li><span>Towels</span><strong>2 Pair</strong></li>
                                <li><span>Kurta Pajama (White)</span><strong>1 Pair</strong></li>
                                <li><span>Toothpaste & Tooth Brush</span><strong>2 Pair</strong></li>
                                <li><span>Hair Oil & Comb</span><strong>2 Pair</strong></li>
                                <li><span>Bathing Soap & Detergent</span><strong>2 Pair</strong></li>
                                <li><span>Black Shoes (Leather)</span><strong>1 Pair</strong></li>
                                <li><span>Sports Shoes</span><strong>1 Pair</strong></li>
                                <li><span>Blanket / Pillow</span><strong>1 Pair</strong></li>
                                <li><span>Water Bottle</span><strong>1</strong></li>
                            </ul>
                        </div>
                    </div>

                    <!-- TAB 2 -->
                    <div class="tabContent" id="inventory">
                        <div class="contentCard">
                            <h4>Inventory Detail</h4>

                            <ul class="itemList">
                                <li><span>Study Table</span><strong>1</strong></li>
                                <li><span>Mattress</span><strong>1</strong></li>
                                <li><span>Bucket & Mug</span><strong>1 Set</strong></li>
                                <li><span>Cloth Hangers</span><strong>6</strong></li>
                                <li><span>Lock & Keys</span><strong>1 Set</strong></li>
                            </ul>
                        </div>
                    </div>

                    <!-- TAB 3 -->
                    <div class="tabContent" id="uniform">
                        <div class="contentCard">
                            <h4>School Uniform (Purchase by Parents)</h4>

                            <table class="uniformTable">
                                <thead>
                                    <tr>
                                        <th>Particulars</th>
                                        <th>No. Pair</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>Shirt (Full + Half Sleeves)</td><td>2+2</td></tr>
                                    <tr><td>Track Suit</td><td>2 Pair</td></tr>
                                    <tr><td>T-Shirt & Trouser (House)</td><td>2 Pair</td></tr>
                                    <tr><td>Sweater</td><td>2 Pair</td></tr>
                                    <tr><td>Blazer</td><td>1 Pair</td></tr>
                                    <tr><td>Socks</td><td>6 Pair</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="infoNote mt-4">
                        <strong>Important:</strong> Please ensure all items are properly labeled with
                        the student’s name and class.
                    </div>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="col-lg-4">

                    <div class="sideBox">
                        <h5>Quick Links</h5>
                        <ul class="sideLinks">
                            <li><a href="{{ route('admission-form') }}">Admission Form</a></li>
                            <li><a href="{{ route('admission-procedure') }}">Admission Procedure</a></li>
                            <li><a href="{{ route('entrance-cum-syllabus') }}">Entrance cum Syllabus</a></li>
                            <li><a href="{{ route('fee-structure') }}">Fee Structure</a></li>
                            <li class="active"><a href="{{ route('required-item') }}">Required Items</a></li>
                            <li><a href="{{ route('important-information') }}">Important Information</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="sideBox">
                        <h5>Downloads</h5>
                        <a href="#" class="downloadBtn">Required Items List (PDF)</a>
                        <a href="#" class="downloadBtn">Inventory Checklist (PDF)</a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

<!-- TAB JS -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tabBtn");
    const contents = document.querySelectorAll(".tabContent");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("active"));
            contents.forEach(c => c.classList.remove("active"));

            tab.classList.add("active");
            document.getElementById(tab.dataset.tab).classList.add("active");
        });
    });
});
</script>

</body>
</html>
