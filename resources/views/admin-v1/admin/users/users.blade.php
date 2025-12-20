@extends('admin-v1.layouts.header')
@section('title', $title)
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="totalUsers">{{ \App\Models\User::count() }}</h3>
                            <p>Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="activeUsers">{{ \App\Models\User::where('status', 1)->count() }}</h3>
                            <p>Active Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="blockedUsers">{{ \App\Models\User::where('status', 0)->count() }}</h3>
                            <p>Blocked Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-times"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="todayUsers">{{ \App\Models\User::whereDate('created_at', today())->count() }}</h3>
                            <p>Today's Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-2"></i>
                                Users Management
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- Filter Section -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="userTypeFilter">Filter by User Type:</label>
                                    <select id="userTypeFilter" class="form-control">
                                        <option value="">All Users</option>
                                        <option value="app">App Users</option>
                                        <option value="ivr">IVR Users</option>
                                    </select>
                                </div>
                            </div>
                            <table id="users-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mobile No</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Register Date</th>
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
            table = $('#users-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin-v1.users.data') }}",
                    "type": "GET",
                    "data": function(d) {
                        d.user_type = $('#userTypeFilter').val();
                    }
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "mobile", "name": "mobile" },
                    { "data": "name", "name": "name" },
                    { "data": "personal_detail", "name": "personal_detail" },
                    { "data": "type", "name": "type" },
                    { "data": "status", "name": "status" },
                    { "data": "date", "name": "date" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[6, 'desc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });

            // User type filter change event
            $('#userTypeFilter').on('change', function() {
                table.ajax.reload();
            });
        });

        // Toggle user status function
        function toggleStatus(id, currentStatus) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to change the status of this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin-v1.users.toggle-status') }}",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Updated!',
                                    'User status has been changed.',
                                    'success'
                                );
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', response.message || 'Could not update status', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'AJAX request failed.', 'error');
                        }
                    });
                }
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
        cursor: pointer;
        font-size: 0.875em;
    }
</style>
@endpush
