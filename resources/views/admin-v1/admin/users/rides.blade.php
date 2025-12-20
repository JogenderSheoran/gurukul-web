@extends('admin-v1.layouts.header')
@section('title', $title)
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- User Info Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-car mr-2"></i>
                                Ride History - {{ $user->username }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin-v1.users') }}" class="btn btn-sm btn-secondary mr-2">
                                    <i class="fas fa-arrow-left"></i> Back to Users
                                </a>
                                <a href="{{ route('admin-v1.users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit User
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>User ID:</strong> {{ $user->id }}
                                </div>
                                <div class="col-md-3">
                                    <strong>Mobile:</strong> {{ $user->mobile }}
                                </div>
                                <div class="col-md-3">
                                    <strong>Status:</strong> 
                                    <span class="badge {{ $user->status ? 'badge-success' : 'badge-danger' }}">
                                        {{ $user->status ? 'Active' : 'Blocked' }}
                                    </span>
                                </div>
                                <div class="col-md-3">
                                    <strong>Registered:</strong> {{ $user->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ride Statistics -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="totalRides">{{ \App\Models\Ride::where('user_id', $user->id)->count() }}</h3>
                            <p>Total Rides</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="completedRides">{{ \App\Models\Ride::where('user_id', $user->id)->where('status', 'completed')->count() }}</h3>
                            <p>Completed Rides</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="cancelledRides">{{ \App\Models\Ride::where('user_id', $user->id)->where('status', 'cancelled')->count() }}</h3>
                            <p>Cancelled Rides</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="totalAmount">₹{{ \App\Models\Ride::where('user_id', $user->id)->where('status', 'completed')->sum('charges') ?? 0 }}</h3>
                            <p>Total Amount</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rides Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-2"></i>
                                Ride Details
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="rides-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ride ID</th>
                                    <th>Driver</th>
                                    <th>Pickup Location</th>
                                    <th>Drop Location</th>
                                    <th>Distance</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Data will be loaded via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Main Content  -->
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- page script -->
    <script>
        var table;
        $(function () {
            // Initialize DataTable
            table = $('#rides-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin-v1.users.rides.data', $user->id) }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "ride_id", "name": "ride_id" },
                    { "data": "driver_name", "name": "driver_name" },
                    { "data": "pickup_address", "name": "pickup_address" },
                    { "data": "drop_address", "name": "drop_address" },
                    { "data": "distance", "name": "distance" },
                    { "data": "total_amount", "name": "total_amount" },
                    { "data": "status", "name": "status" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[8, 'desc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });
        });

        // View ride details function
        function viewRideDetails(rideId) {
            // You can implement ride details modal here
            Swal.fire({
                title: 'Ride Details',
                text: 'Ride ID: ' + rideId,
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }
    </script>
@endpush

@push('style')
<style>
    .small-box {
        border-radius: 10px;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        transition: all 0.3s ease;
    }
    
    .small-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,.2);
    }
    
    .card {
        border-radius: 10px;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    }
    
    .badge {
        font-size: 0.875em;
    }
</style>
@endpush
