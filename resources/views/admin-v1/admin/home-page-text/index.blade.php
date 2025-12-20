@extends('admin-v1.layouts.header')
@section('title', 'Home Page Text Management')
@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-4 col-6"><div class="small-box bg-info"><div class="inner"><h3>{{ $totalTexts ?? 0 }}</h3><p>Total Texts</p></div><div class="icon"><i class="fas fa-file-alt"></i></div></div></div>
<div class="col-lg-4 col-6"><div class="small-box bg-success"><div class="inner"><h3>{{ $activeTexts ?? 0 }}</h3><p>Active Texts</p></div><div class="icon"><i class="fas fa-check-circle"></i></div></div></div>
<div class="col-lg-4 col-6"><div class="small-box bg-warning"><div class="inner"><h3>{{ $inactiveTexts ?? 0 }}</h3><p>Inactive Texts</p></div><div class="icon"><i class="fas fa-times-circle"></i></div></div></div>
</div>
<div class="row"><div class="col-12"><div class="card"><div class="card-header"><h3 class="card-title"><i class="fas fa-file-alt mr-2"></i>Home Page Text Management</h3><div class="card-tools"><a href='{{ route("admin.home-page-text.create") }}' class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New Text</a></div></div>
<div class="card-body">
<div class="row mb-3">
<div class="col-md-3"><label>Filter by Status:</label><select id="statusFilter" class="form-control"><option value="">All</option><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
</div>
<table id="texts-table" class="table table-bordered table-striped"><thead><tr><th>#</th><th>Heading (EN)</th><th>Heading (HI)</th><th>Text (EN)</th><th>Text (HI)</th><th>Status</th><th>Created At</th><th>Actions</th></tr></thead><tbody></tbody></table>
</div></div></div></div>
</div>
</section>
@endsection
@push('scripts')
<script>
var table;
$(function(){
    table = $('#texts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.home-page-text.data') }}",
            type: "GET",
            data: function(d) {
                d.status = $('#statusFilter').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'heading_en', name: 'heading_en'},
            {data: 'heading_hi', name: 'heading_hi'},
            {data: 'text_en', name: 'text_en'},
            {data: 'text_hi', name: 'text_hi'},
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
                url: '/admin/home-page-text/' + id + '/toggle-status',
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

function deleteText(id) {
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
                url: '/admin/home-page-text/' + id,
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
