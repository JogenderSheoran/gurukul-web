@extends('admin-v1.layouts.header')
@section('title', 'Top Scorer Management')
@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards Row -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="totalScorers">{{ $totalScorers ?? 0 }}</h3>
                            <p>Total Top Scorers</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="totalClasses">{{ $totalClasses ?? 0 }}</h3>
                            <p>Total Classes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="totalSubjects">{{ $totalSubjects ?? 0 }}</h3>
                            <p>Total Subjects</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="todayScorers">{{ $todayScorers ?? 0 }}</h3>
                            <p>Today's Entries</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Scorers Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-medal mr-2"></i>
                                Top Scorer Management
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.top-scorer.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> Add Top Scorer
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Filter Section -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="classFilter">Filter by Class:</label>
                                    <select id="classFilter" class="form-control">
                                        <option value="">All Classes</option>
                                        @foreach($classes ?? [] as $class)
                                        <option value="{{ $class }}">{{ $class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="sectionFilter">Filter by Section:</label>
                                    <select id="sectionFilter" class="form-control">
                                        <option value="">All Sections</option>
                                        @foreach($sections ?? [] as $section)
                                        <option value="{{ $section }}">{{ $section }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="subjectFilter">Filter by Subject:</label>
                                    <select id="subjectFilter" class="form-control">
                                        <option value="">All Subjects</option>
                                        @foreach($subjects ?? [] as $subject)
                                        <option value="{{ $subject }}">{{ $subject }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <table id="top-scorers-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Percentage</th>
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
            table = $('#top-scorers-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin.top-scorer.data') }}",
                    "type": "GET",
                    "data": function(d) {
                        d.class = $('#classFilter').val();
                        d.section = $('#sectionFilter').val();
                        d.subject = $('#subjectFilter').val();
                    }
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "name", "name": "name" },
                    { "data": "class", "name": "class" },
                    { "data": "section", "name": "section" },
                    { "data": "subject", "name": "subject" },
                    { "data": "percentage", "name": "percentage" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[6, 'desc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });

            // Filter change events
            $('#classFilter, #sectionFilter, #subjectFilter').on('change', function() {
                table.ajax.reload();
            });
        });

        // Delete top scorer function
        function deleteScorer(id) {
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
                        url: "{{ url('admin/top-scorer') }}/" + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Top scorer has been deleted.',
                                    'success'
                                );
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', response.message || 'Could not delete top scorer', 'error');
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
