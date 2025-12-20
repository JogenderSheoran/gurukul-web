{{-- \resources\views\admin-v1\admin\wordpress-leads.blade.php --}}
@extends('admin-v1.layouts.header')
@section('title')
    <title>
        Website Leads - Admin Dashboard
    </title>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fa fa-users"></i> Website Leads</h1>
                </div><!-- /.col -->
                {{--<div class="col-sm-6 text-right">
                    <a href="#" class="btn btn-primary btn-rounded text-dark"><i class="fa fa-download"></i>
                        Export Leads</a>
                </div>--}}<!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="col-lg-12">
                    @if( Session::has( 'success' ))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check"></i> {{ Session::get( 'success' ) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if( Session::has( 'error' ))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-times"></i> {{ Session::get( 'error' ) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if( Session::has( 'warning' ))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-triangle"></i> {{ Session::get( 'warning' ) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-body">
                            <table id="wordpress-leads-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Source</th>
                                    <th>Page URL</th>
                                    <th>Submission Time</th>
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

    <!-- page script -->
    <script>
        $(function () {
            $('#wordpress-leads-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('admin-v1.wordpress-leads.data') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "DT_RowIndex", "name": "DT_RowIndex", "orderable": false, "searchable": false },
                    { "data": "name", "name": "name" },
                    { "data": "email", "name": "email" },
                    { "data": "phone", "name": "phone" },
                    { "data": "source", "name": "source" },
                    { "data": "page_url", "name": "page_url" },
                    { "data": "created_at", "name": "created_at" },
                    { "data": "action", "name": "action", "orderable": false, "searchable": false }
                ],
                "order": [[6, 'desc']],
                "pageLength": 25,
                "responsive": true,
                "autoWidth": false
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Delete lead functionality
            $(document).on('click', '.delete-btn', function () {
                var id = $(this).data('id');
                var URL = "{{ route('admin-v1.wordpress-leads.delete', ':id') }}";
                URL = URL.replace(':id', id);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: URL,
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire("Deleted!", "Lead has been deleted.", "success");
                                    $('#wordpress-leads-table').DataTable().ajax.reload();
                                } else {
                                    Swal.fire("Oops", response.message || "Something went wrong!", "warning");
                                }
                            },
                            error: function (xhr) {
                                Swal.fire("Error", "Failed to delete the lead. Try again!", "error");
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Cancelled', 'Lead is safe :)', 'error');
                    }
                });
            });

            // View lead details functionality
            $(document).on('click', '.view-btn', function () {
                var id = $(this).data('id');
                var URL = "{{ route('admin-v1.wordpress-leads.show', ':id') }}";
                URL = URL.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: URL,
                    success: function (response) {
                        if (response.success) {
                            var lead = response.data;
                            var fieldsHtml = '';
                            
                            if (lead.fields && typeof lead.fields === 'object') {
                                Object.keys(lead.fields).forEach(function(key) {
                                    if (lead.fields[key]) {
                                        fieldsHtml += '<p><strong>' + key + ':</strong> ' + lead.fields[key] + '</p>';
                                    }
                                });
                            }

                            Swal.fire({
                                title: 'Lead Details',
                                html: `
                                    <div class="text-left">
                                        <p><strong>Name:</strong> ${lead.name || 'N/A'}</p>
                                        <p><strong>Email:</strong> ${lead.email || 'N/A'}</p>
                                        <p><strong>Phone:</strong> ${lead.phone || 'N/A'}</p>
                                        <p><strong>Page URL:</strong> ${lead.page_url || 'N/A'}</p>
                                        <p><strong>Created:</strong> ${new Date(lead.created_at).toLocaleString()}</p>
                                        ${fieldsHtml ? '<hr><h6>Additional Fields:</h6>' + fieldsHtml : ''}
                                    </div>
                                `,
                                width: '600px',
                                showCloseButton: true,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire("Error", response.message || "Failed to load lead details", "error");
                        }
                    },
                    error: function (xhr) {
                        Swal.fire("Error", "Failed to load lead details. Try again!", "error");
                    }
                });
            });

            // Convert lead functionality
            $(document).on('click', '.convert-btn', function () {
                var id = $(this).data('id');
                var URL = "{{ route('admin.convertWordpressToIvrLead') }}";

                Swal.fire({
                    title: 'Convert to IVR Lead?',
                    text: "This will create a new IVR lead from this Website lead data.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    confirmButtonText: 'Yes, convert it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading
                        Swal.fire({
                            title: 'Converting...',
                            text: 'Please wait while we convert the lead.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Create form and submit
                        var form = $('<form>', {
                            'method': 'POST',
                            'action': URL
                        });
                        
                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': $('meta[name="csrf-token"]').attr('content')
                        }));
                        
                        form.append($('<input>', {
                            'type': 'hidden',
                            'name': 'wordpress_lead_id',
                            'value': id
                        }));
                        
                        $('body').append(form);
                        form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Cancelled', 'Lead conversion cancelled :)', 'info');
                    }
                });
            });

            // Toggle Status
            $(document).on('click', '.toggleStatusBtn', function () {
                const btn = $(this);
                const id = btn.data('id');
                const currentStatus = btn.data('status');

                $.ajax({
                    url: '#',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status: currentStatus
                    },
                    success: function (res) {
                        if (res.success) {
                            const newStatus = currentStatus === 1 ? 0 : 1;
                            btn.data('status', newStatus)
                                .toggleClass('btn-success btn-danger')
                                .text(newStatus ? 'Published' : 'Draft')
                                .attr('title', newStatus ? 'Click to Disable' : 'Click to Enable');
                            Swal.fire('Updated!', 'Blog status has been changed.', 'success');

                        } else {
                            Swal.fire('Error', res.message || 'Could not update status', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'AJAX request failed.', 'error');
                    }
                });
            });
        });


    </script>
@endpush