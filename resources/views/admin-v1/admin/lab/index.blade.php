@extends('admin-v1.layouts.header')
@section('title', 'Labs Management')
@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-4 col-6"><div class="small-box bg-info"><div class="inner"><h3>{{ $totalLabs ?? 0 }}</h3><p>Total Labs</p></div><div class="icon"><i class="fas fa-flask"></i></div></div></div>
<div class="col-lg-4 col-6"><div class="small-box bg-success"><div class="inner"><h3>{{ $activeLabs ?? 0 }}</h3><p>Active Labs</p></div><div class="icon"><i class="fas fa-check-circle"></i></div></div></div>
<div class="col-lg-4 col-6"><div class="small-box bg-warning"><div class="inner"><h3>{{ $inactiveLabs ?? 0 }}</h3><p>Inactive Labs</p></div><div class="icon"><i class="fas fa-times-circle"></i></div></div></div>
</div>
<div class="row"><div class="col-12"><div class="card"><div class="card-header"><h3 class="card-title"><i class="fas fa-flask mr-2"></i>Labs Management</h3><div class="card-tools"><a href='{{ route("admin.lab.create") }}' class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New Lab</a></div></div>
<div class="card-body">
<div class="row mb-3">
<div class="col-md-3"><label>Filter by Status:</label><select id="statusFilter" class="form-control"><option value="">All</option><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
</div>
<table id="labs-table" class="table table-bordered table-striped"><thead><tr><th>#</th><th>Lab Name</th><th>Main Banner</th><th>Slider Images</th><th>Description</th><th>Status</th><th>Created At</th><th>Actions</th></tr></thead><tbody></tbody></table>
</div></div></div></div>
</div>
</section>
@endsection
@push('scripts')
<script>
var table;
$(function(){
    table = $('#labs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.lab.data') }}",
            type: "GET",
            data: function(d) {
                d.status = $('#statusFilter').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'lab_name', name: 'lab_name'},
            {data: 'main_banner', name: 'main_banner', orderable: false},
            {data: 'slider_count', name: 'slider_count', orderable: false},
            {data: 'description', name: 'description'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[6, 'desc']],
        pageLength: 25
    });
    $('#statusFilter').change(function(){
        table.draw();
    });
});

function toggleStatus(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to change the status?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/lab/' + id + '/toggle-status',
                type: 'POST',
                data: {_token: '{{ csrf_token() }}'},
                success: function(response) {
                    Swal.fire('Success!', response.message, 'success');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
}

function deleteLab(id) {
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
                url: '/admin/lab/' + id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function(response) {
                    Swal.fire('Deleted!', response.message, 'success');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    });
}
</script>
@endpush
