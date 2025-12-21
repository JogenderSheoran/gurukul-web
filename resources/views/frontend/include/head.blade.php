 <section class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <button type="button" class="btn btn-primary desktopHide">Apply Now</button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <!-- Home -->
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>

                        <!-- About Us -->
                        <li class="nav-item dropdown {{ request()->is('chairmain-message*', 'principal-message*', 'vision-mission*', 'core-values*', 'team*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About Us <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                                <a class="dropdown-item" href="{{ route('chairmain-message') }}">Chairman's Message</a>
                                <a class="dropdown-item" href="{{ route('principal-message') }}">Principal's Message</a>
                                <a class="dropdown-item" href="{{ route('vision-mission') }}">Vision & Mission</a>
                                <a class="dropdown-item" href="{{ route('core-values') }}">Core Values</a>
                                <a class="dropdown-item" href="{{ route('team') }}">Team Gurukul</a>
                            </div>
                        </li>

                        <!-- Boarding -->
                        <li class="nav-item dropdown {{ request()->is('hostel*', 'nutrition*', 'health-wellness*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="boardingDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Boarding <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="boardingDropdown">
                                <a class="dropdown-item" href="{{ route('hostel') }}">Hostel Facilities</a>
                                <a class="dropdown-item" href="{{ route('nutrition') }}">Nutrition & Mess</a>
                                <a class="dropdown-item" href="{{ route('health-wellness') }}">Health & Wellness</a>
                            </div>
                        </li>

                        <!-- Infrastructure -->
                        <li class="nav-item dropdown {{ request()->is('classroom-facilities*', 'library-facilities*', 'music-dance-classes*', 'virtual-and-interactive-board-smart-classrooms*', 'computer-lab*', 'physics-lab*', 'chemistry-lab*', 'biology-lab*', 'art-lab*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="infrastructureDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Infrastructure <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="infrastructureDropdown">
                                <a class="dropdown-item" href="{{ route('classroom-facilities') }}">Classrooms</a>
                                <a class="dropdown-item" href="{{ route('library-facilities') }}">Library</a>
                                <a class="dropdown-item" href="{{ route('music-dance-classes') }}">Music and Dance Classes</a>
                                <a class="dropdown-item" href="{{ route('virtual-and-interactive-board-smart-classrooms') }}">Smart Classrooms</a>
                                <a class="dropdown-item" href="{{ route('computer-labs') }}">Computer Lab</a>
                                <a class="dropdown-item" href="{{ route('physics-labs') }}">Physics Lab</a>
                                <a class="dropdown-item" href="{{ route('chemistry-labs') }}">Chemistry Lab</a>
                                <a class="dropdown-item" href="{{ route('biology-labs') }}">Biology Lab</a>
                                <a class="dropdown-item" href="{{ route('art-labs') }}">Art Lab</a>
                            </div>
                        </li>

                        <!-- Special Programme -->
                        <li class="nav-item dropdown {{ request()->is('sports-complex*', 'reading-mission*', 'celebration-adventure*', 'co-curricular-activities*', 'competitive-exam*', 'house-system*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="specialDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Special Programme <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="specialDropdown">
                                <a class="dropdown-item" href="{{ route('sports-complex') }}">Sports Complex</a>
                                <a class="dropdown-item" href="{{ route('reading-mission') }}">Reading Mission</a>
                                <a class="dropdown-item" href="{{ route('celebration-adventure') }}">Celebrations & Adventure Trips</a>
                                <a class="dropdown-item" href="{{ route('co-curricular-activities') }}">Co-curricular Activities</a>
                                <a class="dropdown-item" href="{{ route('competitive-exam') }}">Competitive Examinations</a>
                                <a class="dropdown-item" href="{{ route('house-system') }}">House System</a>
                            </div>
                        </li>

                        <!-- Admission -->
                        <li class="nav-item dropdown {{ request()->is('admission-form*', 'admission-procedure*', 'entrance-cum-syllabus*', 'fee-structure*', 'required-item*', 'important-information*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="admissionDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admission <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="admissionDropdown">
                                <a class="dropdown-item" href="{{ route('admission-form') }}">Admission Form</a>
                                <a class="dropdown-item" href="{{ route('admission-procedure') }}">Admission Procedure</a>
                                <a class="dropdown-item" href="{{ route('entrance-cum-syllabus') }}">Entrance cum Syllabus</a>
                                <a class="dropdown-item" href="{{ route('fee-structure') }}">Fee Structure</a>
                                <a class="dropdown-item" href="{{ route('required-item') }}">Required Items</a>
                                <a class="dropdown-item" href="{{ route('important-information') }}">Important Information</a>
                            </div>
                        </li>

                        <!-- Updates -->
                        <li class="nav-item dropdown {{ request()->is('blogs*', 'gallery*', 'news*', 'events*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="updatesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Updates <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="updatesDropdown">
                                <a class="dropdown-item" href="{{ route('blogs') }}">Blog</a>
                                <a class="dropdown-item" href="{{ route('mandatory-disclosure') }}">Mandatory Disclosure</a>
                                <a class="dropdown-item" href="{{ route('gallery.index') }}">Gallery</a>
                            </div>
                        </li>

                        <!-- Contact Us -->
                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary mobileHide">Apply Now</button>
                </div>
            </nav>
        </div>
    </section>