@extends('admin-v1.layouts.header')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="totalBanners">{{ $totalBanners ?? 0 }}</h3>
                            <p>Total Banners</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-image"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="activeBanners">{{ $activeBanners ?? 0 }}</h3>
                            <p>Active Banners</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="inactiveBanners">{{ $inactiveBanners ?? 0 }}</h3>
                            <p>Inactive Banners</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="todayBanners">{{ $todayBanners ?? 0 }}</h3>
                            <p>Today's Banners</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banners Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-images mr-2"></i>
                                Banner Management
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Add New Banner
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Filter Section -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="statusFilter">Filter by Status:</label>
                                    <select id="statusFilter" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <table id="banners-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created At</th>
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
    <!-- page script -->
    <script>
        var table;
        $(function () {
            // Initialize DataTable
            table = $('#banners-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.banner.data') }}",
                    "type": "GET",
                    "data": function(d) {
                        d.status = $('#statusFilter').val();
                    }
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "image", "name": "image", "orderable": false, "searchable": false },
                    { "data": "title", "name": "title" },
                    { "data": "status", "name": "status" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[4, 'desc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });

            // Filter change event
            $('#statusFilter').on('change', function() {
                table.ajax.reload();
            });
        });

        // Toggle banner status
        function toggleStatus(id) {
            $.ajax({
                url: "{{ url('admin/banner') }}/" + id + "/toggle-status",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire('Error', response.message || 'Could not toggle status', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'AJAX request failed.', 'error');
                }
            });
        }

        // Delete banner function
        function deleteBanner(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/banner') }}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Banner has been deleted.',
                                    'success'
                                );
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', response.message || 'Could not delete banner', 'error');
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
    
    .banner-thumbnail {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,.1);
    }
    
    .badge {
        font-size: 0.875em;
        padding: 0.35em 0.65em;
    }
</style>
@endpush
