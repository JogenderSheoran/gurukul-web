@extends('admin-v1.layouts.header')
@section('title', 'Gallery Management')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalImages }}</h3>
                            <p>Total Images</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-images"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $activeImages }}</h3>
                            <p>Active Images</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $inactiveImages }}</h3>
                            <p>Inactive Images</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $todayImages }}</h3>
                            <p>Today's Uploads</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-camera mr-2"></i>
                                Gallery Images
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.gallery.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Add New Image
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <select id="statusFilter" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-9 text-right">
                                    <button class="btn btn-danger" id="bulkDeleteBtn" style="display:none;">
                                        <i class="fas fa-trash"></i> Delete Selected
                                    </button>
                                </div>
                            </div>
                            <table id="galleryTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Main Content -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            var selectedIds = [];
            
            var table = $('#galleryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.gallery.data') }}",
                    data: function(d) {
                        d.status = $('#statusFilter').val();
                    }
                },
                columns: [
                    { 
                        data: 'id', 
                        name: 'id',
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            return '<input type="checkbox" class="row-checkbox" data-id="' + data + '">';
                        }
                    },
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'image', name: 'image', orderable: false },
                    { data: 'title', name: 'title' },
                    { data: 'order', name: 'order' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[4, 'asc']]
            });

            $('#statusFilter').change(function() {
                table.draw();
            });

            // Select all checkbox
            $('#selectAll').on('click', function() {
                var checked = $(this).prop('checked');
                $('.row-checkbox').prop('checked', checked);
                updateSelectedIds();
            });

            // Individual checkbox
            $(document).on('change', '.row-checkbox', function() {
                updateSelectedIds();
            });

            function updateSelectedIds() {
                selectedIds = [];
                $('.row-checkbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });
                
                if (selectedIds.length > 0) {
                    $('#bulkDeleteBtn').show();
                } else {
                    $('#bulkDeleteBtn').hide();
                }
            }

            // Bulk delete
            $('#bulkDeleteBtn').on('click', function() {
                if (selectedIds.length === 0) return;
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to delete " + selectedIds.length + " image(s)!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete them!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var deletePromises = [];
                        
                        selectedIds.forEach(function(id) {
                            deletePromises.push(
                                $.ajax({
                                    url: `/admin/gallery/${id}/remove-image`,
                                    type: 'DELETE',
                                    data: { _token: '{{ csrf_token() }}' }
                                })
                            );
                        });
                        
                        Promise.all(deletePromises).then(function() {
                            Swal.fire('Deleted!', 'Images have been deleted.', 'success');
                            table.ajax.reload();
                            selectedIds = [];
                            $('#bulkDeleteBtn').hide();
                            $('#selectAll').prop('checked', false);
                        }).catch(function() {
                            Swal.fire('Error!', 'Failed to delete some images', 'error');
                        });
                    }
                });
            });
        });

        function toggleStatus(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to toggle the status?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, toggle it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/gallery/${id}/toggle-status`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Success!', response.message, 'success');
                                $('#galleryTable').DataTable().ajax.reload();
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Failed to toggle status', 'error');
                        }
                    });
                }
            });
        }

        function deleteImage(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/gallery/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Deleted!', response.message, 'success');
                                $('#galleryTable').DataTable().ajax.reload();
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Failed to delete image', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endpush
