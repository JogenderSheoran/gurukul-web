@extends('admin-v1.layouts.header')
@section('title', 'Blog Management')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="totalBlogs">{{ $totalBlogs ?? 0 }}</h3>
                            <p>Total Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-blog"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="publishedBlogs">{{ $publishedBlogs ?? 0 }}</h3>
                            <p>Published Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="draftBlogs">{{ $draftBlogs ?? 0 }}</h3>
                            <p>Draft Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="todayBlogs">{{ $todayBlogs ?? 0 }}</h3>
                            <p>Today's Blogs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blogs Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-blog mr-2"></i>
                                Blog Management
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Create Blog Post
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
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <table id="blogs-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Publish Date</th>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- page script -->
    <script>
        var table;
        $(function () {
            // Initialize DataTable
            table = $('#blogs-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.blog.data') }}",
                    "type": "GET",
                    "data": function(d) {
                        d.status = $('#statusFilter').val();
                    }
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "title", "name": "title" },
                    { "data": "author", "name": "author" },
                    { "data": "status", "name": "status" },
                    { "data": "publish_date", "name": "publish_date" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[5, 'desc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });

            // Status filter change event
            $('#statusFilter').on('change', function() {
                table.ajax.reload();
            });
        });

        // Toggle blog status function
        function toggleStatus(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to change the status of this blog?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/blog') }}/" + id + "/toggle-status",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Updated!',
                                    'Blog status has been changed.',
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

        // Delete blog function
        function deleteBlog(id) {
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
                        url: "{{ url('admin/blog') }}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Blog has been deleted.',
                                    'success'
                                );
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', response.message || 'Could not delete blog', 'error');
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
