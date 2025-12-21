<!-- Admission Enquiry Popup Modal -->
<div class="modal fade" id="admissionEnquiryModal" tabindex="-1" role="dialog" aria-labelledby="admissionEnquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border: 3px solid #ff6600; max-height: 90vh; overflow: hidden;">
            <div class="modal-header text-white" style="background-color: #ff6600;">
                <h5 class="modal-title" id="admissionEnquiryModalLabel">
                    <i class="fas fa-graduation-cap"></i> Admission Enquiry Form
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: calc(90vh - 120px); overflow-y: auto;">
                <form id="admissionEnquiryForm">
                    @csrf
                    
                    <!-- Student Information -->
                    <h6 class="mb-3" style="color: #ff6600;"><i class="fas fa-user"></i> Student Information</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="student_full_name">Student Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="student_full_name" name="student_full_name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="date_of_birth">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="age">Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="age" name="age" min="1" max="100" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender <span class="text-danger">*</span></label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nationality">Nationality <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nationality" name="nationality" value="Indian" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <h6 class="mb-3 mt-3" style="color: #ff6600;"><i class="fas fa-book"></i> Academic Information</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="last_class_study">Last Class Studied <span class="text-danger">*</span></label>
                            <select class="form-control" id="last_class_study" name="last_class_study" required>
                                <option value="">Select Class</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                                <option value="9th">9th</option>
                                <option value="10th">10th</option>
                                <option value="11th">11th</option>
                                <option value="12th">12th</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_school_board">Last School Board <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="last_school_board" name="last_school_board" placeholder="e.g., CBSE, ICSE, State Board" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="admission_for_class">Admission For Class <span class="text-danger">*</span></label>
                            <select class="form-control" id="admission_for_class" name="admission_for_class" required>
                                <option value="">Select Class</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                                <option value="9th">9th</option>
                                <option value="10th">10th</option>
                                <option value="11th">11th</option>
                                <option value="12th">12th</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Parent Information -->
                    <h6 class="mb-3 mt-3" style="color: #ff6600;"><i class="fas fa-users"></i> Parent Information</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="father_full_name">Father's Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="father_full_name" name="father_full_name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mother_full_name">Mother's Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="father_mobile_number">Father's Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="father_mobile_number" name="father_mobile_number" pattern="[0-9]{10}" placeholder="10 digit mobile number" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mother_mobile_number">Mother's Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="mother_mobile_number" name="mother_mobile_number" pattern="[0-9]{10}" placeholder="10 digit mobile number" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="email_address">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email_address" name="email_address" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="alert alert-success d-none" id="successMessage"></div>
                    <div class="alert alert-danger d-none" id="errorMessage"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn" id="submitEnquiry" style="background-color: #ff6600; color: white;">
                    <i class="fas fa-paper-plane"></i> Submit Enquiry
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Open modal when Apply Now button is clicked
    $('.btn-primary:contains("Apply Now")').on('click', function(e) {
        e.preventDefault();
        $('#admissionEnquiryModal').modal('show');
    });

    // Calculate age from date of birth
    $('#date_of_birth').on('change', function() {
        var dob = new Date($(this).val());
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        $('#age').val(age);
    });

    // Submit form
    $('#submitEnquiry').on('click', function() {
        var form = $('#admissionEnquiryForm')[0];
        
        // Check HTML5 validation
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        var formData = $('#admissionEnquiryForm').serialize();
        var submitBtn = $(this);
        
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
        $('#successMessage, #errorMessage').addClass('d-none');
        
        $.ajax({
            url: '{{ route("admission-enquiry.store") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#successMessage').text(response.message).removeClass('d-none');
                    $('#admissionEnquiryForm')[0].reset();
                    
                    setTimeout(function() {
                        $('#admissionEnquiryModal').modal('hide');
                        $('#successMessage').addClass('d-none');
                    }, 3000);
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<ul class="mb-0">';
                
                if (errors) {
                    $.each(errors, function(key, value) {
                        errorHtml += '<li>' + value[0] + '</li>';
                    });
                } else {
                    errorHtml += '<li>An error occurred. Please try again.</li>';
                }
                
                errorHtml += '</ul>';
                $('#errorMessage').html(errorHtml).removeClass('d-none');
            },
            complete: function() {
                submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Submit Enquiry');
            }
        });
    });
});
</script>

<style>
#admissionEnquiryModal .form-control:focus {
    border-color: #ff6600;
    box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.25);
}

#admissionEnquiryModal h6 {
    font-weight: 600;
    border-bottom: 2px solid #ff6600;
    padding-bottom: 8px;
}

#admissionEnquiryModal label {
    font-weight: 500;
    font-size: 14px;
}

#admissionEnquiryModal .text-danger {
    font-weight: bold;
}
</style>
