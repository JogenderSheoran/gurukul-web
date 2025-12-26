@extends('admin-v1.layouts.header')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <!-- Team Members Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalTeam ?? 0 }}</h3>
                            <p>Team Members</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <!-- News & Events Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalNewsEvents ?? 0 }}</h3>
                            <p>News & Events</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                    </div>
                </div>

                <!-- Admission Enquiries Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalAdmissionEnquiries ?? 0 }}</h3>
                            <p>Admission Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                    </div>
                </div>

                <!-- Contact Us Enquiries Card -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalContactEnquiries ?? 0 }}</h3>
                            <p>Contact Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <h3>Welcome to Admin Dashboard</h3>
                            <p class="text-muted">Select an option from the sidebar to get started</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .small-box {
            border-radius: 0.25rem;
            position: relative;
            display: block;
            margin-bottom: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }
        .small-box > .inner {
            padding: 10px;
        }
        .small-box h3, .small-box p {
            z-index: 5;
        }
        .small-box .icon {
            transition: all .3s linear;
            position: absolute;
            top: -10px;
            right: 10px;
            z-index: 0;
            font-size: 70px;
            color: rgba(0,0,0,0.15);
        }
        .small-box:hover .icon {
            font-size: 75px;
        }
        .small-box .small-box-footer {
            position: relative;
            text-align: center;
            padding: 3px 0;
            color: #fff;
            color: rgba(255,255,255,0.8);
            display: block;
            z-index: 10;
            background: rgba(0,0,0,0.1);
            text-decoration: none;
        }
        .small-box .small-box-footer:hover {
            color: #fff;
            background: rgba(0,0,0,0.15);
        }
    </style>
@endpush
