@extends('admin-v1.layouts.header')
@section('title', 'Adventure & Celebrations Management')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalRecords }}</h3>
                            <p>Total Records</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $adventureCount }}</h3>
                            <p>Adventure Trips</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hiking"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $celebrationCount }}</h3>
                            <p>Celebrations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $activeRecords }}</h3>
                            <p>Active Records</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Adventure & Celebrations
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.adventure-celebration.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Add New Record
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <select id="sectionTypeFilter" class="form-control">
                                        <option value="">All Types</option>
                                        <option value="adventure">Adventure</option>
                                        <option value="celebration">Celebration</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select id="statusFilter" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <table id="adventureCelebrationTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Card Image</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Gallery Link</th>
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
            var table = $('#adventureCelebrationTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.adventure-celebration.data') }}",
                    data: function(d) {
                        d.status = $('#statusFilter').val();
                        d.section_type = $('#sectionTypeFilter').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'card_image', name: 'card_image', orderable: false },
                    { data: 'title', name: 'title' },
                    { data: 'section_type', name: 'section_type' },
                    { data: 'gallery_link', name: 'gallery_link', orderable: false },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[6, 'desc']]
            });

            $('#statusFilter, #sectionTypeFilter').change(function() {
                table.draw();
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
                        url: "{{ url('admin/adventure-celebration') }}/" + id + "/toggle-status",
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire('Success!', 'Status toggled successfully!', 'success');
                            $('#adventureCelebrationTable').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Something went wrong!', 'error');
                        }
                    });
                }
            });
        }

        function deleteRecord(id) {
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
                        url: "{{ url('admin/adventure-celebration') }}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            $('#adventureCelebrationTable').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Something went wrong!', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endpush
