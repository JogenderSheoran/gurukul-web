@extends('admin-v1.layouts.header')
@section('title', 'Statistics Management / आंकड़े प्रबंधन')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="totalStats">{{ $totalStats ?? 0 }}</h3>
                            <p>Total Stats / कुल आंकड़े</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="activeStats">{{ $activeStats ?? 0 }}</h3>
                            <p>Active / सक्रिय</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="inactiveStats">{{ $inactiveStats ?? 0 }}</h3>
                            <p>Inactive / निष्क्रिय</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="todayStats">{{ $todayStats ?? 0 }}</h3>
                            <p>Today / आज</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Statistics Management / आंकड़े प्रबंधन
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.stat.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Add New Stat / नया आंकड़ा जोड़ें
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Filter Section -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="statusFilter">Filter by Status / स्थिति के अनुसार फ़िल्टर करें:</label>
                                    <select id="statusFilter" class="form-control">
                                        <option value="">All Status / सभी स्थिति</option>
                                        <option value="active">Active / सक्रिय</option>
                                        <option value="inactive">Inactive / निष्क्रिय</option>
                                    </select>
                                </div>
                            </div>
                            <table id="stats-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon / आइकन</th>
                                    <th>Value / मान</th>
                                    <th>Heading / शीर्षक</th>
                                    <th>Order / क्रम</th>
                                    <th>Status / स्थिति</th>
                                    <th>Created At / बनाया गया</th>
                                    <th>Actions / क्रियाएं</th>
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
            table = $('#stats-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.stat.data') }}",
                    "type": "GET",
                    "data": function(d) {
                        d.status = $('#statusFilter').val();
                    }
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "icon", "name": "icon" },
                    { "data": "value", "name": "value" },
                    { "data": "heading", "name": "heading" },
                    { "data": "order", "name": "order" },
                    { "data": "status", "name": "status" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[4, 'asc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });

            // Status filter change event
            $('#statusFilter').on('change', function() {
                table.ajax.reload();
            });
        });

        // Toggle stat status function
        function toggleStatus(id) {
            $.ajax({
                url: "{{ url('admin/stat') }}/" + id + "/toggle-status",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success / सफलता',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire('Error / त्रुटि', response.message || 'Could not update status', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error / त्रुटि', 'AJAX request failed.', 'error');
                }
            });
        }

        // Delete stat function
        function deleteStat(id) {
            Swal.fire({
                title: 'Are you sure? / क्या आप सुनिश्चित हैं?',
                text: "You won't be able to revert this! / आप इसे वापस नहीं कर पाएंगे!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it! / हां, इसे हटाएं!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/stat') }}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted! / हटाया गया!',
                                    'Statistic has been deleted. / आंकड़ा हटा दिया गया है।',
                                    'success'
                                );
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error / त्रुटि', response.message || 'Could not delete stat', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error / त्रुटि', 'AJAX request failed.', 'error');
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
