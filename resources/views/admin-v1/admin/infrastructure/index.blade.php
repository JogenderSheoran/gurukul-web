@extends('admin-v1.layouts.header')
@section('title', 'Infrastructure Management')
@section('content')
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-4 col-6"><div class="small-box bg-info"><div class="inner"><h3>{{ $totalInfrastructures ?? 0 }}</h3><p>Total Infrastructure</p></div><div class="icon"><i class="fas fa-building"></i></div></div></div>
<div class="col-lg-4 col-6"><div class="small-box bg-success"><div class="inner"><h3>{{ $activeInfrastructures ?? 0 }}</h3><p>Active</p></div><div class="icon"><i class="fas fa-check-circle"></i></div></div></div>
<div class="col-lg-4 col-6"><div class="small-box bg-warning"><div class="inner"><h3>{{ $inactiveInfrastructures ?? 0 }}</h3><p>Inactive</p></div><div class="icon"><i class="fas fa-times-circle"></i></div></div></div>
</div>
<div class="row"><div class="col-12"><div class="card"><div class="card-header"><h3 class="card-title"><i class="fas fa-building mr-2"></i>Infrastructure Management</h3><div class="card-tools"><a href='{{ route("admin.infrastructure.create") }}' class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New</a></div></div>
<div class="card-body">
<div class="row mb-3">
<div class="col-md-3"><label>Filter by Status:</label><select id="statusFilter" class="form-control"><option value="">All</option><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
</div>
<table id="infrastructure-table" class="table table-bordered table-striped"><thead><tr><th>#</th><th>Icon</th><th>Heading</th><th>Description</th><th>Order</th><th>Status</th><th>Created At</th><th>Actions</th></tr></thead><tbody></tbody></table>
</div></div></div></div>
</div>
</section>
@endsection
@push('scripts')
<script>
var table;
$(function(){
    table = $('#infrastructure-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.infrastructure.data') }}",
            type: "GET",
            data: function(d) {
                d.status = $('#statusFilter').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'icon'},
            {data: 'heading'},
            {data: 'description'},
            {data: 'order'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'action', orderable: false, searchable: false}
        ],
        order: [[4, 'asc']],
        pageLength: 25
    });
    
    $('#statusFilter').on('change', function() {
        table.ajax.reload();
    });
});

function toggleStatus(id) {
    $.ajax({
        url: "{{ url('admin/infrastructure') }}/" + id + "/toggle-status",
        type: "POST",
        data: {_token: "{{ csrf_token() }}"},
        success: function(r) {
            if(r.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: r.message,
                    timer: 1500,
                    showConfirmButton: false
                });
                table.ajax.reload();
            }
        }
    });
}

function deleteInfrastructure(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: "{{ url('admin/infrastructure') }}/" + id,
                type: "DELETE",
                data: {_token: "{{ csrf_token() }}"},
                success: function(r) {
                    if(r.success) {
                        Swal.fire('Deleted!', 'Infrastructure deleted.', 'success');
                        table.ajax.reload();
                    }
                }
            });
        }
    });
}
</script>
@endpush
