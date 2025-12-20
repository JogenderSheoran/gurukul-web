<!doctype html>
<html lang="en">
@include('frontend.include.css')

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- Banner -->
    <x-inner-banner title="Our Team" />

    <!-- Team Section -->
    <section class="teamModern py-5">
        <div class="container">

            <!-- Tabs -->
            <div class="teamTabs text-center mb-5">
                <button class="teamTab active" onclick="switchTeam('teaching', this)">
                    Teaching Staff
                </button>
                <button class="teamTab" onclick="switchTeam('nonTeaching', this)">
                    Non-Teaching Staff
                </button>
            </div>

            <!-- Teaching Staff -->
            <div id="teaching" class="teamWrap active">
                <div class="row g-4">

                    @for($i=1;$i<=6;$i++)
                    <div class="col-lg-4 col-md-6">
                        <div class="staffCardModern">
                            <div class="cardBg"
                                 style="background-image:url('https://picsum.photos/500/300?random={{ $i }}')">
                            </div>

                            <div class="cardBody">
                                <div class="profilePic">
                                    <img src="https://i.pravatar.cc/200?img={{ $i }}" />
                                </div>

                                <h5>Mr. Navdeep Sharma</h5>
                                <span class="designation">PGT – Physical Education</span>

                                <p>
                                    Dedicated educator with strong academic background and
                                    student-centric teaching approach.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endfor

                </div>
            </div>

            <!-- Non Teaching Staff -->
            <div id="nonTeaching" class="teamWrap">
                <div class="row g-4">

                    @for($i=7;$i<=12;$i++)
                    <div class="col-lg-4 col-md-6">
                        <div class="staffCardModern">
                            <div class="cardBg"
                                 style="background-image:url('https://picsum.photos/500/300?random={{ $i }}')">
                            </div>

                            <div class="cardBody">
                                <div class="profilePic">
                                    <img src="https://i.pravatar.cc/200?img={{ $i }}" />
                                </div>

                                <h5>Mr. Santosh Kumar</h5>
                                <span class="designation">Administration</span>

                                <p>
                                    Responsible for smooth operations and student support services.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endfor

                </div>
            </div>

        </div>
    </section>

    @include('frontend.include.footer')
</div>

@include('frontend.include.js')

<script>
function switchTeam(type, btn){
    document.querySelectorAll('.teamWrap').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.teamTab').forEach(el => el.classList.remove('active'));

    document.getElementById(type).classList.add('active');
    btn.classList.add('active');
}
</script>

</body>
</html>
<style>
    /* Section */
.teamModern {
    background: #f7f8fa;
}

/* Tabs */
.teamTabs .teamTab {
    border: 1px solid #eee;
    background: #fff;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 600;
    margin: 0 8px;
    transition: 0.3s;
}
.teamTabs .teamTab.active {
    background: #ff8a00;
    color: #fff;
    border-color: #ff8a00;
}

/* Card */
.staffCardModern {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    transition: 0.3s;
}
.staffCardModern:hover {
    transform: translateY(-6px);
}

/* Background image with orange overlay */
.cardBg {
    height: 160px;
    background-size: cover;
    background-position: center;
    position: relative;
}
.cardBg::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(255,138,0,0.55);
}

/* Body */
.cardBody {
    padding: 60px 25px 30px;
    text-align: center;
    position: relative;
}

/* Profile image */
.profilePic {
    position: absolute;
    top: -45px;
    left: 50%;
    transform: translateX(-50%);
}
.profilePic img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    border: 4px solid #fff;
    object-fit: cover;
    background: #fff;
}

/* Text */
.cardBody h5 {
    margin-top: 10px;
    font-weight: 700;
}
.designation {
    font-size: 14px;
    color: #ff8a00;
    font-weight: 600;
}
.cardBody p {
    font-size: 14px;
    color: #666;
    margin-top: 12px;
}

/* Tab content */
.teamWrap {
    display: none;
}
.teamWrap.active {
    display: block;
}

.teamModern .row {
    row-gap: 40px;   /* vertical space between rows */
}

/* Responsive */
@media(max-width:768px){
    .teamTabs .teamTab {
        margin-bottom: 10px;
        padding: 10px 20px;
    }
}
</style>