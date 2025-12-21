@extends("admin-v1.layouts.header")
@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="totalContactEnquiries">0</h3>
                        <p>Total Contact Enquiries</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-envelope mr-2"></i>Contact Enquiries
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="contact-enquiries-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- View Enquiry Modal -->
<div class="modal fade" id="viewContactEnquiryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">
                    <i class="fas fa-eye"></i> Contact Enquiry Details
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-success"><i class="fas fa-user"></i> Contact Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="30%">Name:</th>
                                <td id="view_name"></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td id="view_email"></td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td id="view_phone"></td>
                            </tr>
                            <tr>
                                <th>Subject:</th>
                                <td id="view_subject"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6 class="text-success"><i class="fas fa-comment"></i> Message</h6>
                        <div class="alert alert-light">
                            <p id="view_message" style="white-space: pre-wrap;"></p>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6 class="text-success"><i class="fas fa-clock"></i> Submission Details</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="30%">Submitted On:</th>
                                <td id="view_created_at"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
var table;
$(function(){
    table = $('#contact-enquiries-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.contact-enquiry.data') }}",
            type: "GET"
        },
        columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'subject'},
            {data: 'created_at'},
            {data: 'action', orderable: false, searchable: false}
        ],
        order: [[5, 'desc']],
        pageLength: 25
    });
    
    // Update total count
    table.on('draw', function() {
        var info = table.page.info();
        $('#totalContactEnquiries').text(info.recordsTotal);
    });
});

// View enquiry details
$(document).on('click', '.view-contact-enquiry', function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "{{ url('admin/contact-enquiry') }}/" + id,
        type: "GET",
        success: function(response) {
            if(response.success) {
                var data = response.data;
                
                $('#view_name').text(data.name);
                $('#view_email').text(data.email);
                $('#view_phone').text(data.phone);
                $('#view_subject').text(data.subject || 'N/A');
                $('#view_message').text(data.message);
                $('#view_created_at').text(new Date(data.created_at).toLocaleString());
                
                $('#viewContactEnquiryModal').modal('show');
            }
        }
    });
});
</script>
@endpush
