<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <x-seo
        :title="$seo['title']"
        :description="$seo['description']"
        :keywords="$seo['keywords']"
        :image="$seo['image']"
    />

    {{-- Admission common CSS --}}
    @include('frontend.include.admission-css')
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    {{-- ORANGE BANNER --}}
    <x-inner-banner
        title="Admission Form"
        subtitle="Gurukul Takshshila – Submit Your Admission Enquiry"
        pageKey="admission-form"
    />

    <section class="admissionPage py-5">
        <div class="container">
            <div class="row g-4">

                {{-- LEFT CONTENT --}}
                <div class="col-lg-8">

                    {{-- INTRO CARD --}}
                    <div class="gradientCard">
                        <h3>Admission Enquiry Form</h3>
                        <p>
                            Please fill out the form below with accurate information. Our admission team will contact you shortly.
                        </p>
                    </div>

                    {{-- ADMISSION FORM --}}
                    <div class="contentBlock">
                        <div class="card" style="border: 3px solid #ff6600; border-radius: 12px;">
                            <div class="card-body p-4">
                                <form id="admissionEnquiryFormPage">
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

                                    <div class="alert alert-success d-none" id="successMessagePage"></div>
                                    <div class="alert alert-danger d-none" id="errorMessagePage"></div>

                                    <button type="button" class="btn btn-lg w-100" id="submitEnquiryPage" style="background-color: #ff6600; color: white;">
                                        <i class="fas fa-paper-plane"></i> Submit Enquiry
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDEBAR --}}
                <div class="col-lg-4">

                    <div class="sideBox">
                        <h5>Quick Links</h5>
                        <ul class="sideLinks">
                            <li class="active"><a href="{{ route('admission-form') }}">Admission Form</a></li>
                            <li><a href="{{ route('admission-procedure') }}">Admission Procedure</a></li>
                            <li><a href="{{ route('entrance-cum-syllabus') }}">Entrance cum Syllabus</a></li>
                            <li><a href="{{ route('fee-structure') }}">Fee Structure</a></li>
                            <li><a href="{{ route('required-item') }}">Required Items</a></li>
                            <li><a href="{{ route('important-information') }}">Important Information</a></li>
                        </ul>
                    </div>

                    <div class="sideBox">
                        <h5>Admission Highlights</h5>

                        <div class="highlightItem">
                            📅 <strong>Academic Year 2025</strong><br>
                            Admissions Open
                        </div>

                        <div class="highlightItem">
                            🎓 <strong>Classes Available</strong><br>
                            4th to Class 12th
                        </div>

                        <div class="highlightItem">
                            🏠 <strong>Boarding Facility</strong><br>
                            Available for All Classes
                        </div>
                    </div>

                    <div class="sideBox helpBox">
                        <h5>Need Help?</h5>
                        <p>
                            For any admission related queries,
                            contact our counselors.
                        </p>
                        <a href="tel:7419192932" class="btn btn-orange w-100">
                            Call Now
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

<script>
$(document).ready(function() {
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
    $('#submitEnquiryPage').on('click', function() {
        var form = $('#admissionEnquiryFormPage')[0];
        
        // Check HTML5 validation
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        var formData = $('#admissionEnquiryFormPage').serialize();
        var submitBtn = $(this);
        
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');
        $('#successMessagePage, #errorMessagePage').addClass('d-none');
        
        $.ajax({
            url: '{{ route("admission-enquiry.store") }}',
            type: 'POST',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#successMessagePage').text(response.message).removeClass('d-none');
                    $('#admissionEnquiryFormPage')[0].reset();
                    
                    // Scroll to success message
                    $('html, body').animate({
                        scrollTop: $('#successMessagePage').offset().top - 100
                    }, 500);
                    
                    setTimeout(function() {
                        $('#successMessagePage').addClass('d-none');
                    }, 5000);
                }
            },
            error: function(xhr) {
                console.log('AJAX Error:', xhr.status, xhr.responseText);
                console.log('Response JSON:', xhr.responseJSON);
                
                var errorHtml = '<ul class="mb-0">';
                var responseData = xhr.responseJSON;
                
                // Try to parse JSON if it's not already parsed
                if (!responseData && xhr.responseText) {
                    try {
                        responseData = JSON.parse(xhr.responseText);
                    } catch (e) {
                        console.log('Failed to parse JSON response:', e);
                    }
                }
                
                // Check if we have validation errors
                if (responseData && responseData.errors) {
                    var errors = responseData.errors;
                    $.each(errors, function(key, value) {
                        if (key === 'email_address' && (value[0].includes('has already been taken') || value[0].includes('already been taken'))) {
                            errorHtml += '<li>This email address has already been used for an admission enquiry. Please use a different email address or contact us if you need assistance.</li>';
                        } else {
                            errorHtml += '<li>' + value[0] + '</li>';
                        }
                    });
                } else if (responseData && responseData.message) {
                    // Handle single error message
                    errorHtml += '<li>' + responseData.message + '</li>';
                } else {
                    // Fallback error message
                    errorHtml += '<li>An error occurred. Please try again. (Status: ' + xhr.status + ')</li>';
                }
                
                errorHtml += '</ul>';
                $('#errorMessagePage').html(errorHtml).removeClass('d-none');
                
                // Scroll to error message
                $('html, body').animate({
                    scrollTop: $('#errorMessagePage').offset().top - 100
                }, 500);
            },
            complete: function() {
                submitBtn.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Submit Enquiry');
            }
        });
    });
});
</script>

<style>
#admissionEnquiryFormPage .form-control:focus {
    border-color: #ff6600;
    box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.25);
}

#admissionEnquiryFormPage h6 {
    font-weight: 600;
    border-bottom: 2px solid #ff6600;
    padding-bottom: 8px;
}

#admissionEnquiryFormPage label {
    font-weight: 500;
    font-size: 14px;
}

#admissionEnquiryFormPage .text-danger {
    font-weight: bold;
}

.highlightItem {
    padding: 10px 0;
    font-size: 14px;
    border-bottom: 1px solid #eee;
}

.highlightItem:last-child {
    border-bottom: none;
}

.helpBox {
    background: #fff7ec;
}

.btn-orange {
    background-color: #ff6600;
    color: white;
    font-weight: 600;
}

.btn-orange:hover {
    background-color: #e55a00;
    color: white;
}
</style>

</body>
</html>
