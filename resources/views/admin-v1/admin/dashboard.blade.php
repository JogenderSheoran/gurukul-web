{{-- \resources\views\admin-v1\admin\dashboard.blade.php --}}
@extends('admin-v1.layouts.header')
@section('title')
    <title>{{ $title }} - Admin Dashboard</title>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fa fa-tachometer-alt"></i> Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <!-- Total Users Card -->
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-success h-100">
                        <div class="inner">
                            <h3>{{ number_format($stats['total_users']) }}</h3>
                            <p class="card-text-fixed">Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total App Downloads Card -->
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-dark h-100">
                        <div class="inner">
                            <h3>{{ number_format($stats['total_app_downloads']) }}</h3>
                            <p class="card-text-fixed">Total App<br>Downloads</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Payments Card -->
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-warning h-100">
                        <div class="inner">
                            <h3>₹{{ number_format($stats['total_payments'], 0) }}</h3>
                            <p class="card-text-fixed">Total App<br>Payment</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Completed Rides Card -->
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-primary h-100">
                        <div class="inner">
                            <h3>{{ number_format($stats['completed_rides']) }}</h3>
                            <p class="card-text-fixed">Total Complete<br>Ride</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Cancelled Rides Card -->
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-danger h-100">
                        <div class="inner">
                            <h3>{{ number_format($stats['cancelled_rides']) }}</h3>
                            <p class="card-text-fixed">Total Cancel<br>Ride</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Rides Card -->
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="small-box bg-info h-100">
                        <div class="inner">
                            <h3>{{ number_format($stats['total_rides']) }}</h3>
                            <p class="card-text-fixed">Total Ride</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Today's Statistics Row -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-calendar-day"></i> Today's Statistics</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fas fa-user-plus"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">New Users Today</span>
                                            <span class="info-box-number">{{ number_format($stats['today_users']) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="fas fa-route"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Rides Today</span>
                                            <span class="info-box-number">{{ number_format($stats['today_rides']) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning"><i class="fas fa-rupee-sign"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Revenue Today</span>
                                            <span class="info-box-number">₹{{ number_format($stats['today_payments'], 0) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="fas fa-ban"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Cancelled Today</span>
                                            <span class="info-box-number">{{ number_format($stats['today_cancelled_rides']) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mt-4">
                <!-- Users Monthly Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-line text-primary"></i> Monthly Users Registration</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="usersChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- IVR Leads Monthly Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-bar text-success"></i> Monthly IVR Leads</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="ivrLeadsChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities Row -->
            <div class="row mt-4">
                <!-- Recent Users -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-users"></i> Recent Users</h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                @forelse($recent_users as $user)
                                    <li>
                                        <img src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png' }}" alt="User Image">
                                        <a class="users-list-name" href="#">{{ $user->name }}</a>
                                        <span class="users-list-date">{{ $user->created_at->diffForHumans() }}</span>
                                    </li>
                                @empty
                                    <li class="text-center p-3">No recent users</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Recent Rides -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-car"></i> Recent Rides</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_rides as $ride)
                                        <tr>
                                            <td>{{ $ride->user->name ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge badge-{{ $ride->status == 'completed' ? 'success' : ($ride->status == 'cancelled' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($ride->status) }}
                                                </span>
                                            </td>
                                            <td>₹{{ number_format($ride->total_amount ?? 0, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No recent rides</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Leads -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-phone"></i> Recent IVR Leads</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_leads as $lead)
                                        <tr>
                                            <td>{{ $lead->name ?? 'N/A' }}</td>
                                            <td>{{ $lead->mobile_no ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge badge-{{ strtolower($lead->status) == 'converted' ? 'success' : (strtolower($lead->status) == 'lost' ? 'danger' : 'primary') }}">
                                                    {{ $lead->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No recent leads</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
<style>
    .small-box {
        border-radius: 10px;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        transition: all 0.3s ease;
        min-height: 140px;
        display: flex;
        flex-direction: column;
    }
    
    .small-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,.2);
    }
    
    .small-box .inner {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 80px;
    }
    
    .small-box .inner h3 {
        font-size: 2.2rem;
        font-weight: bold;
        margin: 0 0 5px 0;
        line-height: 1.2;
    }
    
    .card-text-fixed {
        font-size: 14px;
        font-weight: 500;
        margin: 0;
        line-height: 1.3;
        min-height: 32px;
        display: flex;
        align-items: center;
    }
    
    .small-box .icon {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 0;
        font-size: 70px;
        color: rgba(0,0,0,.15);
    }
    
    .small-box .small-box-footer {
        position: relative;
        text-align: center;
        padding: 8px 0;
        color: rgba(255,255,255,.8);
        text-decoration: none;
        z-index: 10;
        display: block;
        background: rgba(0,0,0,.1);
        border-radius: 0 0 10px 10px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .small-box .small-box-footer:hover {
        color: #fff;
        background: rgba(0,0,0,.2);
        text-decoration: none;
    }
    
    .info-box {
        border-radius: 8px;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    }
    
    .card {
        border-radius: 10px;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    }
    
    .users-list > li {
        width: 25%;
        float: left;
        padding: 10px;
        text-align: center;
    }
    
    .users-list > li img {
        border-radius: 50%;
        max-width: 40px;
        height: 40px;
        object-fit: cover;
    }

    /* Chart styling */
    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .small-box .inner h3 {
            font-size: 1.8rem;
        }
        .small-box .icon {
            font-size: 50px;
        }
    }
    
    @media (max-width: 576px) {
        .small-box {
            min-height: 120px;
        }
        .small-box .inner {
            min-height: 70px;
            padding: 12px;
        }
        .small-box .inner h3 {
            font-size: 1.6rem;
        }
        .card-text-fixed {
            font-size: 13px;
            min-height: 28px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Monthly chart data from backend
    const monthlyData = @json($monthlyData);
    
    // Users Chart Configuration
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    const usersChart = new Chart(usersCtx, {
        type: 'line',
        data: {
            labels: monthlyData.months,
            datasets: [{
                label: 'New Users',
                data: monthlyData.users,
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#007bff',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointHoverBackgroundColor: '#0056b3',
                pointHoverBorderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: 12,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#007bff',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        title: function(context) {
                            return 'Month: ' + context[0].label;
                        },
                        label: function(context) {
                            return 'New Users: ' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        },
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });

    // IVR Leads Chart Configuration
    const ivrLeadsCtx = document.getElementById('ivrLeadsChart').getContext('2d');
    const ivrLeadsChart = new Chart(ivrLeadsCtx, {
        type: 'bar',
        data: {
            labels: monthlyData.months,
            datasets: [{
                label: 'IVR Leads',
                data: monthlyData.ivr_leads,
                backgroundColor: 'rgba(40, 167, 69, 0.8)',
                borderColor: '#28a745',
                borderWidth: 2,
                borderRadius: 6,
                borderSkipped: false,
                hoverBackgroundColor: 'rgba(40, 167, 69, 0.9)',
                hoverBorderColor: '#1e7e34'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: 12,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#28a745',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        title: function(context) {
                            return 'Month: ' + context[0].label;
                        },
                        label: function(context) {
                            return 'IVR Leads: ' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        },
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
});
</script>
@endpush





