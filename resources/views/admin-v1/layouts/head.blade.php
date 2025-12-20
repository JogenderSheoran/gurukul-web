<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('title')

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="user-auth" content="{{ Auth::check() ? 'true' : '' }}">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="MultyByte">
{{--<link rel="canonical" href="{{ \App\Helpers\UtilityHelper::canonical_url() }}">--}}

<!-- Favicon -->
<link rel="icon" href="{{ asset('assets_mvc/images/favicon.png') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('assets_mvc/images/favicon.png') }}" type="image/x-icon">

<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Core Vendor Styles -->
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- UI Plugins -->
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/select2/css/select2.css') }}">

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('admin_assets/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/css/primary-theme-4.css') }}">

<!-- Custom DataTables Pagination Styling -->
<style>
    /* Simple DataTables Pagination Styling */
    .dataTables_wrapper .dataTables_paginate {
        float: right;
        text-align: right;
        padding-top: 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        box-sizing: border-box;
        display: inline-block;
        min-width: 2rem;
        padding: 0.375rem 0.75rem;
        margin-left: 0.125rem;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        color: #495057 !important;
        background: #fff !important;
        border: 1px solid #dee2e6 !important;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        line-height: 1.5;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #0056b3 !important;
        background: #e9ecef !important;
        border-color: #adb5bd !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        background: #007bff !important;
        border-color: #007bff !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        background: #0056b3 !important;
        border-color: #0056b3 !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        color: #6c757d !important;
        background: #fff !important;
        border-color: #dee2e6 !important;
        cursor: not-allowed !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
        color: #6c757d !important;
        background: #fff !important;
        border-color: #dee2e6 !important;
    }
    
    /* Bootstrap 4 DataTables Integration */
    .page-item .page-link {
        color: #007bff !important;
        background-color: #fff !important;
        border: 1px solid #dee2e6 !important;
    }
    
    .page-item .page-link:hover {
        color: #0056b3 !important;
        background-color: #e9ecef !important;
        border-color: #adb5bd !important;
    }
    
    .page-item.active .page-link {
        color: #fff !important;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
    
    .page-item.disabled .page-link {
        color: #6c757d !important;
        background-color: #fff !important;
        border-color: #dee2e6 !important;
    }
    
    /* DataTables Info and Length Styling */
    .dataTables_wrapper .dataTables_info {
        color: #6c757d !important;
        font-size: 0.875rem;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #ced4da !important;
        border-radius: 0.25rem !important;
        padding: 0.375rem 0.75rem !important;
        color: #495057 !important;
    }
    
    /* Search Box Styling */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ced4da !important;
        border-radius: 0.25rem !important;
        padding: 0.375rem 0.75rem !important;
        color: #495057 !important;
    }
    
    /* Consistent table styling */
    .table-responsive .table {
        margin-bottom: 0 !important;
    }
    
    /* Processing indicator styling */
    .dataTables_wrapper .dataTables_processing {
        background: rgba(255, 255, 255, 0.9) !important;
        border: 1px solid #007bff !important;
        color: #007bff !important;
        border-radius: 0.25rem !important;
    }
    
    /* Force consistent pagination styling across all DataTables */
    .dataTables_wrapper .dataTables_paginate .paginate_button,
    .pagination .page-link {
        min-width: 2rem !important;
        padding: 0.375rem 0.75rem !important;
        margin-left: 0.125rem !important;
        text-align: center !important;
        text-decoration: none !important;
        cursor: pointer !important;
        color: #495057 !important;
        background: #fff !important;
        border: 1px solid #dee2e6 !important;
        border-radius: 0.25rem !important;
        font-size: 0.875rem !important;
        line-height: 1.5 !important;
        display: inline-block !important;
        box-sizing: border-box !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
    .pagination .page-link:hover {
        color: #0056b3 !important;
        background: #e9ecef !important;
        border-color: #adb5bd !important;
        text-decoration: none !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .pagination .page-item.active .page-link {
        color: #fff !important;
        background: #007bff !important;
        border-color: #007bff !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,
    .pagination .page-item.active .page-link:hover {
        color: #fff !important;
        background: #0056b3 !important;
        border-color: #0056b3 !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .pagination .page-item.disabled .page-link {
        color: #6c757d !important;
        background: #fff !important;
        border-color: #dee2e6 !important;
        cursor: not-allowed !important;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
    .pagination .page-item.disabled .page-link:hover {
        color: #6c757d !important;
        background: #fff !important;
        border-color: #dee2e6 !important;
    }
    
    /* Modern Page Loader - Matching Admin Theme */
    .page-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #F5F7F8;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
    }
    
    .page-loader.fade-out {
        opacity: 0;
        visibility: hidden;
    }
    
    .loader-content {
        text-align: center;
        color: #333;
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
    }
    
    .loader-logo {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        animation: logoFloat 3s ease-in-out infinite;
    }
    
    .loader-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    
    .loader-spinner {
        width: 50px;
        height: 50px;
        border: 3px solid #e9ecef;
        border-top: 3px solid #359FFF;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }
    
    .loader-text {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #223543;
        font-family: 'Inter', sans-serif;
    }
    
    .loader-subtext {
        font-size: 14px;
        color: #6c757d;
        font-family: 'Inter', sans-serif;
        animation: fadeInOut 3s ease-in-out infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    @keyframes fadeInOut {
        0%, 100% { opacity: 0.8; }
        50% { opacity: 0.4; }
    }
    
    @keyframes logoFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    /* AJAX Loading Overlay - Matching Admin Theme */
    .ajax-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(245, 247, 248, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9998;
    }
    
    .ajax-loader-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
        min-width: 200px;
    }
    
    .ajax-spinner {
        width: 40px;
        height: 40px;
        border: 3px solid #e9ecef;
        border-top: 3px solid #359FFF;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 15px;
    }
    
    .ajax-loader-text {
        color: #223543;
        font-size: 16px;
        font-weight: 500;
        font-family: 'Inter', sans-serif;
    }
    
    /* Button Loading States */
    .btn-loading {
        position: relative;
        pointer-events: none;
    }
    
    .btn-loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -8px;
        border: 2px solid transparent;
        border-top-color: currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    .btn-loading .btn-text {
        opacity: 0;
    }
</style>

@stack('metaDetails')
@stack('style')
