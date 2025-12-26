<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Inner Banner -->
                <li class="nav-item">
                    <a href="{{ route('admin.inner-banner.index') }}"
                    class="nav-link {{ request()->routeIs('admin.inner-banner.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images text-primary"></i>
                        <p>Inner Banner</p>
                    </a>
                </li>

                <!-- Page Banners -->
                <li class="nav-item">
                    <a href="{{ route('admin.page-banner.index') }}"
                    class="nav-link {{ request()->routeIs('admin.page-banner.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image text-warning"></i>
                        <p>Page Banners</p>
                    </a>
                </li>

                <!-- Admission Enquiries -->
                <li class="nav-item">
                    <a href="{{ route('admin.admission-enquiry.index') }}"
                    class="nav-link {{ request()->routeIs('admin.admission-enquiry.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate text-info"></i>
                        <p>Admission Enquiries</p>
                    </a>
                </li>

                <!-- Contact Enquiries -->
                <li class="nav-item">
                    <a href="{{ route('admin.contact-enquiry.index') }}"
                    class="nav-link {{ request()->routeIs('admin.contact-enquiry.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope text-success"></i>
                        <p>Contact Enquiries</p>
                    </a>
                </li>


                <!-- HOME -->
                <li class="nav-item {{ request()->routeIs('admin.banner.*','admin.top-scorer.*','admin.welcome-popup.*','admin.stat.*','admin.home-page-text.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home text-primary"></i>
                        <p>Home <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.banner.index') }}" class="nav-link {{ request()->routeIs('admin.banner.*') ? 'active' : '' }}">
                                <i class="fas fa-image nav-icon"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.top-scorer.index') }}" class="nav-link {{ request()->routeIs('admin.top-scorer.*') ? 'active' : '' }}">
                                <i class="fas fa-trophy nav-icon text-warning"></i>
                                <p>Top Scorer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.welcome-popup.index') }}" class="nav-link {{ request()->routeIs('admin.welcome-popup.*') ? 'active' : '' }}">
                                <i class="fas fa-window-maximize nav-icon"></i>
                                <p>Welcome Popup</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.stat.index') }}" class="nav-link {{ request()->routeIs('admin.stat.*') ? 'active' : '' }}">
                                <i class="fas fa-chart-bar nav-icon"></i>
                                <p>Statistics</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.home-page-text.index') }}" class="nav-link {{ request()->routeIs('admin.home-page-text.*') ? 'active' : '' }}">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Home Page Text</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- ABOUT -->
                <li class="nav-item {{ request()->routeIs('admin.about-us.*','admin.team-member.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info-circle text-info"></i>
                        <p>About <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.about-us.index') }}" class="nav-link {{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
                                <i class="fas fa-building nav-icon"></i>
                                <p>About Us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team-member.index') }}" class="nav-link {{ request()->routeIs('admin.team-member.*') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Team Members</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- UPDATES -->
                <li class="nav-item {{ request()->routeIs('admin.blog.*','admin.news-event.*','admin.mandatory-disclosure.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn text-warning"></i>
                        <p>Updates <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}" class="nav-link">
                                <i class="fas fa-blog nav-icon"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.news-event.index') }}" class="nav-link">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>News & Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mandatory-disclosure.index') }}" class="nav-link">
                                <i class="fas fa-file-contract nav-icon"></i>
                                <p>Mandatory Disclosure</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.index') }}"
                                class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-images text-info"></i>
                                    <p>Gallery</p>
                                </a>
                        </li>
                    </ul>
                </li>

                <!-- INFRASTRUCTURE -->
                <li class="nav-item {{ request()->routeIs('admin.infrastructure-section.*','admin.lab.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building text-success"></i>
                        <p>Infrastructure <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.infrastructure-section.index') }}" class="nav-link">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Sections</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lab.index') }}" class="nav-link">
                                <i class="fas fa-flask nav-icon"></i>
                                <p>Labs</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- SPECIAL PROGRAMME -->
                <li class="nav-item {{ request()->routeIs('admin.sports-complex.*','admin.reading-mission.*','admin.adventure-celebration.*','admin.co-curricular-activity.*','admin.competitive-exam.*','admin.house-system.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-star text-danger"></i>
                        <p>Special Programme <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{ route('admin.sports-complex.index') }}" class="nav-link"><p>Sports Complex</p></a></li>
                        <li><a href="{{ route('admin.reading-mission.index') }}" class="nav-link"><p>Reading Mission</p></a></li>
                        <li><a href="{{ route('admin.adventure-celebration.index') }}" class="nav-link"><p>Adventure & Celebration</p></a></li>
                        <li><a href="{{ route('admin.co-curricular-activity.index') }}" class="nav-link"><p>Co-curricular</p></a></li>
                        <li><a href="{{ route('admin.competitive-exam.index') }}" class="nav-link"><p>Competitive Exam</p></a></li>
                        <li><a href="{{ route('admin.house-system.index') }}" class="nav-link"><p>House System</p></a></li>
                    </ul>
                </li>

                

            </ul>
        </nav>
    </div>
</aside>
