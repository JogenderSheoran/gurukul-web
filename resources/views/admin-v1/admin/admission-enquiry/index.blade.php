@extends("admin-v1.layouts.header")
@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="totalEnquiries">0</h3>
                        <p>Total Admission Enquiries</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-graduation-cap mr-2"></i>Admission Enquiries
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="enquiries-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Admission Class</th>
                                    <th>Father Mobile</th>
                                    <th>Email</th>
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
<div class="modal fade" id="viewEnquiryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">
                    <i class="fas fa-eye"></i> Enquiry Details
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-primary"><i class="fas fa-user"></i> Student Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="30%">Full Name:</th>
                                <td id="view_student_name"></td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td id="view_dob"></td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td id="view_age"></td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td id="view_gender"></td>
                            </tr>
                            <tr>
                                <th>Nationality:</th>
                                <td id="view_nationality"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6 class="text-primary"><i class="fas fa-book"></i> Academic Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="30%">Last Class Studied:</th>
                                <td id="view_last_class"></td>
                            </tr>
                            <tr>
                                <th>Last School Board:</th>
                                <td id="view_last_board"></td>
                            </tr>
                            <tr>
                                <th>Admission For Class:</th>
                                <td id="view_admission_class"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6 class="text-primary"><i class="fas fa-users"></i> Parent Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th width="30%">Father's Name:</th>
                                <td id="view_father_name"></td>
                            </tr>
                            <tr>
                                <th>Father's Mobile:</th>
                                <td id="view_father_mobile"></td>
                            </tr>
                            <tr>
                                <th>Mother's Name:</th>
                                <td id="view_mother_name"></td>
                            </tr>
                            <tr>
                                <th>Mother's Mobile:</th>
                                <td id="view_mother_mobile"></td>
                            </tr>
                            <tr>
                                <th>Email Address:</th>
                                <td id="view_email"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h6 class="text-primary"><i class="fas fa-clock"></i> Submission Details</h6>
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
    table = $('#enquiries-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.admission-enquiry.data') }}",
            type: "GET"
        },
        columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'student_full_name'},
            {data: 'admission_for_class'},
            {data: 'father_mobile_number'},
            {data: 'email_address'},
            {data: 'created_at'},
            {data: 'action', orderable: false, searchable: false}
        ],
        order: [[5, 'desc']],
        pageLength: 25
    });
    
    // Update total count
    table.on('draw', function() {
        var info = table.page.info();
        $('#totalEnquiries').text(info.recordsTotal);
    });
});

// View enquiry details
$(document).on('click', '.view-enquiry', function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "{{ url('admin/admission-enquiry') }}/" + id,
        type: "GET",
        success: function(response) {
            if(response.success) {
                var data = response.data;
                
                // Student Info
                $('#view_student_name').text(data.student_full_name);
                $('#view_dob').text(data.date_of_birth);
                $('#view_age').text(data.age + ' years');
                $('#view_gender').text(data.gender);
                $('#view_nationality').text(data.nationality);
                
                // Academic Info
                $('#view_last_class').text(data.last_class_study);
                $('#view_last_board').text(data.last_school_board);
                $('#view_admission_class').text(data.admission_for_class);
                
                // Parent Info
                $('#view_father_name').text(data.father_full_name);
                $('#view_father_mobile').text(data.father_mobile_number);
                $('#view_mother_name').text(data.mother_full_name);
                $('#view_mother_mobile').text(data.mother_mobile_number);
                $('#view_email').text(data.email_address);
                
                // Submission Details
                $('#view_created_at').text(new Date(data.created_at).toLocaleString());
                
                $('#viewEnquiryModal').modal('show');
            }
        }
    });
});
</script>
@endpush
