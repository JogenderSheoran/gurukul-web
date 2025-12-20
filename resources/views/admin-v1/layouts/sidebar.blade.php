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
            </ul>
        </nav>
    </div>
    <!--
 /.sidebar -->
</aside>
