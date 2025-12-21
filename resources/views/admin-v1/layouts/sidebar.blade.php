<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
              
                    <!-- Admin Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Banner Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.banner.index') }}" class="nav-link {{ request()->routeIs('admin.banner.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image text-success"></i>
                            <p>Banner</p>
                        </a>
                    </li>

                    <!-- Top Scorer Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.top-scorer.index') }}" class="nav-link {{ request()->routeIs('admin.top-scorer.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-warning"></i>
                            <p>Top Scorer</p>
                        </a>
                    </li>

                    <!-- Welcome Popup Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.welcome-popup.index') }}" class="nav-link {{ request()->routeIs('admin.welcome-popup.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-window-maximize text-info"></i>
                            <p>Welcome Popup</p>
                        </a>
                    </li>

                    <!-- Blog Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-blog text-danger"></i>
                            <p>Blog</p>
                        </a>
                    </li>

                    <!-- Inner Banner Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.inner-banner.index') }}" class="nav-link {{ request()->routeIs('admin.inner-banner.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-images text-primary"></i>
                            <p>Inner Banner</p>
                        </a>
                    </li>

                    <!-- News & Events Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.news-event.index') }}" class="nav-link {{ request()->routeIs('admin.news-event.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper text-warning"></i>
                            <p>News & Events</p>
                        </a>
                    </li>

                    <!-- Admission Enquiries -->
                    <li class="nav-item">
                        <a href="{{ route('admin.admission-enquiry.index') }}" class="nav-link {{ request()->routeIs('admin.admission-enquiry.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-graduation-cap text-primary"></i>
                            <p>Admission Enquiries</p>
                        </a>
                    </li>

                    <!-- Contact Enquiries -->
                    <li class="nav-item">
                        <a href="{{ route('admin.contact-enquiry.index') }}" class="nav-link {{ request()->routeIs('admin.contact-enquiry.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope text-success"></i>
                            <p>Contact Enquiries</p>
                        </a>
                    </li>

                    <!-- Statistics Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.stat.index') }}" class="nav-link {{ request()->routeIs('admin.stat.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-bar text-info"></i>
                            <p>Statistics</p>
                        </a>
                    </li>

                    <!-- Infrastructure Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.infrastructure.index') }}" class="nav-link {{ request()->routeIs('admin.infrastructure.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building text-success"></i>
                            <p>Infrastructure</p>
                        </a>
                    </li>

                    <!-- Labs Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.lab.index') }}" class="nav-link {{ request()->routeIs('admin.lab.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-flask text-primary"></i>
                            <p>Labs</p>
                        </a>
                    </li>

                    <!-- Home Page Text Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.home-page-text.index') }}" class="nav-link {{ request()->routeIs('admin.home-page-text.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt text-danger"></i>
                            <p>Home Page Text</p>
                        </a>
                    </li>

                    <!-- About Us Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.about-us.index') }}" class="nav-link {{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-info-circle text-info"></i>
                            <p>About Us</p>
                        </a>
                    </li>

                    <!-- Page Banners Management -->
                    <li class="nav-item">
                        <a href="{{ route('admin.page-banner.index') }}" class="nav-link {{ request()->routeIs('admin.page-banner.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image text-warning"></i>
                            <p>Page Banners</p>
                        </a>
                    </li>

                    <!-- Team Main Menu -->
                    <li class="nav-item {{ request()->routeIs('admin.team-member.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.team-member.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users text-danger"></i>
                            <p>
                                Team
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.team-member.index') }}" class="nav-link {{ request()->routeIs('admin.team-member.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Team Members</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Mandatory Public Disclosure -->
                    <li class="nav-item">
                        <a href="{{ route('admin.mandatory-disclosure.index') }}" class="nav-link {{ request()->routeIs('admin.mandatory-disclosure.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-contract text-purple"></i>
                            <p>Mandatory Public Disclosure</p>
                        </a>
                    </li>

                    <!-- Infrastructure Sections -->
                    <li class="nav-item">
                        <a href="{{ route('admin.infrastructure-section.index') }}" class="nav-link {{ request()->routeIs('admin.infrastructure-section.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building text-info"></i>
                            <p>Infrastructure Sections</p>
                        </a>
                    </li>

                    <!-- Programs -->
                    <li class="nav-item">
                        <a href="{{ route('admin.program.index') }}" class="nav-link {{ request()->routeIs('admin.program.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks text-primary"></i>
                            <p>Programs</p>
                        </a>
                    </li>

                    <!-- Boarding Main Menu -->
                    <li class="nav-item {{ request()->routeIs('admin.hostel.*') || request()->routeIs('admin.nutrition-management.*') || request()->routeIs('admin.health-nutrition.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.hostel.*') || request()->routeIs('admin.nutrition-management.*') || request()->routeIs('admin.health-nutrition.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bed text-success"></i>
                            <p>
                                Boarding
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.hostel.index') }}" class="nav-link {{ request()->routeIs('admin.hostel.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hostel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.nutrition-management.index') }}" class="nav-link {{ request()->routeIs('admin.nutrition-management.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nutrition Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.health-nutrition.index') }}" class="nav-link {{ request()->routeIs('admin.health-nutrition.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Health Nutrition</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Program Main Menu -->
                    <li class="nav-item {{ request()->routeIs('admin.sports-complex.*') || request()->routeIs('admin.reading-mission.*') || request()->routeIs('admin.co-curricular-activity.*') || request()->routeIs('admin.competitive-exam.*') || request()->routeIs('admin.house-system.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.sports-complex.*') || request()->routeIs('admin.reading-mission.*') || request()->routeIs('admin.co-curricular-activity.*') || request()->routeIs('admin.competitive-exam.*') || request()->routeIs('admin.house-system.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-graduation-cap text-primary"></i>
                            <p>
                                Program
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.co-curricular-activity.index') }}" class="nav-link {{ request()->routeIs('admin.co-curricular-activity.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Co-curricular Activities</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.competitive-exam.index') }}" class="nav-link {{ request()->routeIs('admin.competitive-exam.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Competitive Exam</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.house-system.index') }}" class="nav-link {{ request()->routeIs('admin.house-system.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>House System</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sports-complex.index') }}" class="nav-link {{ request()->routeIs('admin.sports-complex.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sports Complex</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.reading-mission.index') }}" class="nav-link {{ request()->routeIs('admin.reading-mission.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reading Mission</p>
                                </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </nav>
    </div>
    <!--
 /.sidebar -->
</aside>
