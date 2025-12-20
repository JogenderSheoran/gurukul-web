<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin-v1.layouts.head')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet"/>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<!-- Immediate Loader CSS to prevent white screen -->
<style>
    /* Ensure loader shows immediately */
    #pageLoader {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        background: #F5F7F8 !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        z-index: 9999 !important;
    }
    
    /* Allow JavaScript to control visibility */
    #pageLoader.fade-out {
        opacity: 0 !important;
        visibility: hidden !important;
        transition: opacity 0.5s ease-out, visibility 0.5s ease-out !important;
    }
</style>

<!-- Modern Page Loader -->
<div class="page-loader" id="pageLoader">
    <div class="loader-content">
        <div class="loader-logo">
            <img src="{{ asset('frontend/img/logo.jpeg') }}" alt="Gurukul Logo">
        </div>
        <div class="loader-spinner"></div>
        <div class="loader-text">Gurukul Admin</div>
        <div class="loader-subtext">Loading your dashboard...</div>
    </div>
</div>

<!-- AJAX Loading Overlay -->
<div class="ajax-loader" id="ajaxLoader">
    <div class="ajax-loader-content">
        <div class="ajax-spinner"></div>
        <div class="ajax-loader-text">Processing...</div>
    </div>
</div>


    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Fullscreen Toggle -->
                <li class="nav-item">
                    <a class="btn btn-primary rounded" href="" target="_blank">
                        <i class="fas fa-store"></i> Visit Website
                    </a>
                </li>


                <!-- Fullscreen Toggle -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>


                <!-- User Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link pt-1" data-toggle="dropdown" href="#">
                        <img src="{{ auth()->user()->photo ? asset('storage/'.auth()->user()->photo) : 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png' }}" width="35" class="img-circle" alt="User Image" style="width: 35px;
  height: 35px;
  object-fit: cover;
  border: 1px solid var(--accent-color);
  background: var(--theme-color);">
                        <span class="ml-2 d-none d-sm-inline-block">{{ auth()->user()->name }} <i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-item text-left d-flex py-2">
                            <img src="{{ auth()->user()->photo ? asset('storage/'.auth()->user()->photo) : 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png' }}" class="img-circle" width="50" alt="User Image" style="width: 50px;
  height: 50px;
  object-fit: cover;
  border: 1px solid var(--accent-color);
  background: var(--theme-color);
  margin: 0 10px 0 0;">
                            <p class="mb-0">
                                {{ auth()->user()->name }}<br>
                                <small>{{ auth()->user()->email }}</small>
                            </p>
                        </div>
                        <div class="dropdown-divider"></div>
                        {{--  <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#passwordResetModal">
                             <i class="fas fa-lock mr-2"></i> Change Password
                         </a> --}}

                        {{-- <div class="dropdown-divider"></div> --}}

                        
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off mr-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                       
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        @include('admin-v1.layouts.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer text-sm">
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>

    <!-- Sync Buzy Stock Modal -->
    <div class="modal fade" id="syncBuzyStockModal" tabindex="-1" role="dialog" aria-labelledby="syncBuzyStockModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="syncBuzyStockModalLabel">
                        <i class="fas fa-sync-alt text-primary"></i> Sync Buzy Stock
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="syncMessage">
                        <p>Are you sure you want to sync buzy stock?</p>
                    </div>
                    <div id="syncProgress" style="display: none;">
                        <div class="text-center">
                            <i class="fas fa-sync fa-spin fa-2x mb-2"></i>
                            <p class="mb-0">Please wait, stock sync is in progress...</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmSync">Yes, Sync Now</button>
                </div>
            </div>
        </div>
    </div>


<!-- Scripts -->
<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/ckeditor_standard/ckeditor.js') }}"></script>
<script src="{{ asset('admin_assets/js/adminlte.js') }}"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script src="{{ asset('admin_assets/plugins/select2/js/select2.js') }}"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function () {
        //$('.select2').select2()

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });

        @foreach(['success', 'warning', 'error', 'info'] as $type)
        @if(Session::has($type))
        Toast.fire({icon: '{{ $type }}', title: `{{ Session::get($type) }}`});
        @endif
        @endforeach

        const url = window.location.href.split('?')[0];
        $('ul.nav-sidebar a').filter(function () {
            return this.href === url;
        }).addClass('active');

        $('ul.nav-treeview a').filter(function () {
            return this.href === url;
        }).parentsUntil('.nav-sidebar > .nav-treeview').addClass('menu-open').prev('a').addClass('active');

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    });

    // Modern Loader Functions
    window.LoaderUtils = {
        // Show page loader
        showPageLoader: function() {
            const $loader = $('#pageLoader');
            $loader.removeClass('fade-out');
            $loader.css({
                'display': 'flex',
                'opacity': '1',
                'visibility': 'visible'
            });
        },
        
        // Hide page loader
        hidePageLoader: function() {
            const $loader = $('#pageLoader');
            $loader.addClass('fade-out');
            // Force hide after animation
            setTimeout(function() {
                $loader.css('display', 'none');
            }, 500);
        },
        
        // Show AJAX loader with custom text
        showAjaxLoader: function(text = 'Processing...') {
            $('#ajaxLoader .ajax-loader-text').text(text);
            $('#ajaxLoader').css('display', 'flex');
        },
        
        // Hide AJAX loader
        hideAjaxLoader: function() {
            $('#ajaxLoader').hide();
        },
        
        // Add loading state to button
        addButtonLoader: function(button, text = null) {
            const $btn = $(button);
            $btn.addClass('btn-loading');
            if (text) {
                $btn.data('original-text', $btn.html());
                $btn.html('<span class="btn-text">' + text + '</span>');
            }
        },
        
        // Remove loading state from button
        removeButtonLoader: function(button) {
            const $btn = $(button);
            $btn.removeClass('btn-loading');
            const originalText = $btn.data('original-text');
            if (originalText) {
                $btn.html(originalText);
                $btn.removeData('original-text');
            }
        }
    };

    // Immediate loader control - runs as soon as possible
    (function() {
        // Show loader immediately
        const pageLoader = document.getElementById('pageLoader');
        if (pageLoader) {
            pageLoader.style.display = 'flex';
            pageLoader.style.opacity = '1';
            pageLoader.style.visibility = 'visible';
        }
    })();

    // Document ready handler
    $(document).ready(function() {
        // Ensure loader is visible
        LoaderUtils.showPageLoader();
        
        // Hide loader when DOM is ready and images are loaded
        const hideLoader = function() {
            setTimeout(function() {
                LoaderUtils.hidePageLoader();
            }, 600);
        };
        
        // Check if page is already loaded
        if (document.readyState === 'complete') {
            hideLoader();
        } else {
            $(window).on('load', hideLoader);
        }
    });

    // Handle page navigation and refresh
    $(window).on('beforeunload', function() {
        LoaderUtils.showPageLoader();
    });

    // Fallback: Hide loader after maximum time
    setTimeout(function() {
        if ($('#pageLoader').is(':visible')) {
            LoaderUtils.hidePageLoader();
        }
    }, 8000);

    // Handle browser back/forward buttons
    $(window).on('pageshow', function(event) {
        if (event.originalEvent.persisted) {
            // Page was loaded from cache
            setTimeout(function() {
                LoaderUtils.hidePageLoader();
            }, 300);
        }
    });

    // Show AJAX loader for all AJAX requests
    $(document).ajaxStart(function() {
        LoaderUtils.showAjaxLoader('Loading...');
    });

    $(document).ajaxStop(function() {
        LoaderUtils.hideAjaxLoader();
    });

    // DataTables loading integration
    $(document).on('preInit.dt', function(e, settings) {
        LoaderUtils.showAjaxLoader('Loading table data...');
    });

    $(document).on('init.dt', function(e, settings) {
        LoaderUtils.hideAjaxLoader();
    });

    // Common DataTables Configuration - Simple & Consistent
    window.CommonDataTableConfig = {
        "processing": true,
        "serverSide": true,
        "pageLength": 25,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "pagingType": "simple_numbers",
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": false,
        "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
               '<"row"<"col-sm-12"tr>>' +
               '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        "language": {
            "paginate": {
                "next": "Next",
                "previous": "Previous"
            },
            "lengthMenu": "Show _MENU_ entries per page",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "processing": "Loading data...",
            "emptyTable": "No data available in table",
            "zeroRecords": "No matching records found"
        },
        "drawCallback": function(settings) {
            // Ensure pagination styling is applied after each draw
            $('.dataTables_paginate .paginate_button').addClass('btn-pagination');
        }
    };

    // Form submission loading states
    $(document).on('submit', 'form[data-loading]', function() {
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"], input[type="submit"]');
        const loadingText = $form.data('loading-text') || 'Processing...';
        
        LoaderUtils.addButtonLoader($submitBtn, loadingText);
        
        // Auto-remove loader after 10 seconds as fallback
        setTimeout(function() {
            LoaderUtils.removeButtonLoader($submitBtn);
        }, 10000);
    });

    // Button click loading states
    $(document).on('click', '[data-loading-btn]', function() {
        const $btn = $(this);
        const loadingText = $btn.data('loading-text') || 'Loading...';
        
        LoaderUtils.addButtonLoader($btn, loadingText);
        
        // Auto-remove loader after 5 seconds as fallback
        setTimeout(function() {
            LoaderUtils.removeButtonLoader($btn);
        }, 5000);
    });
</script>
@stack('style')
@stack('scripts')
</body>
</html>
