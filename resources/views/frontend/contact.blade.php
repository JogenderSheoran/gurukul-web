<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <x-seo
        title="Contact Us | गुरुकुल तक्षशिला"
        description="Get in touch with Gurukul Takshshila for admission inquiries, feedback or general information."
        keywords="Gurukul Takshshila contact, school inquiry, admission"
        image="{{ asset('assets/img/contact-banner.jpg') }}"
    />

    <style>
        /* --- Contact Form --- */
        .contact-section {
            padding: 60px 0;
        }

        .contact-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0,0,0,.08);
            padding: 40px;
            transition: transform .3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .contact-card h3 {
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 28px;
        }

        .form-control {
            border-radius: 12px;
            padding: 15px;
            border:1px solid #ccc;
            margin-bottom: 20px;
        }

        .btn-contact {
            background: #c0392b;
            color: #fff;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 12px;
            border:none;
            transition:.3s;
        }

        .btn-contact:hover {
            background: #e74c3c;
        }

        /* --- Info Section --- */
        .contact-info h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .contact-info p {
            color: #555;
            margin-bottom: 20px;
        }

        .info-box {
            background:#f7f7f7;
            padding:25px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.05);
            transition:.3s;
        }

        .info-box:hover {
            transform: translateY(-5px);
        }

        .info-box i {
            font-size:30px;
            color:#c0392b;
            margin-bottom:15px;
        }

        /* --- Responsive --- */
        @media(max-width:768px){
            .contact-banner h1{ font-size:32px; }
        }
    </style>
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- ORANGE BANNER -->
    <x-inner-banner
        title="Contact Us"
        subtitle="Get in Touch with Gurukul Takshshila"
    />

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-5">

                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-card">
                        <h3>Get in Touch</h3>
                        <div class="alert alert-success d-none" id="contactSuccessMessage"></div>
                        <div class="alert alert-danger d-none" id="contactErrorMessage"></div>
                        <form id="contactEnquiryForm">
                            @csrf
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number" pattern="[0-9]{10}" required>
                            <input type="text" name="subject" class="form-control" placeholder="Subject (Optional)">
                            <textarea name="message" rows="6" class="form-control" placeholder="Your Message" required></textarea>
                            <button type="submit" class="btn-contact" id="submitContactBtn">Send Message</button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="fas fa-map-marker-alt"></i>
                                <h5>Address</h5>
                                <p>Gurukul Takshshila<br>Karnal-Kaithal Highway<br>Ahmedpur, Rasina-136042<br>Teh. Pundri District Kaithal, Haryana</p>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top:20px;">
                            <div class="info-box">
                                <i class="fas fa-phone"></i>
                                <h5>Phone</h5>
                                <p>7419192930</p>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top:20px;">
                            <div class="info-box">
                                <i class="fas fa-envelope"></i>
                                <h5>Email</h5>
                                <p style="word-wrap: break-word;">Gurukultakshshilaadmission@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top:20px;">
                            <div class="info-box">
                                <i class="fas fa-clock"></i>
                                <h5>Timing</h5>
                                <p>Mon - Sat: 08:00 AM - 06:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Map Section -->
    <!-- <section class="pb-5">
        <div class="container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.123456789!2d76.6!3d28.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x123456789abcdef!2sGurukul%20Takshshila!5e0!3m2!1sen!2sin!4v1234567890" 
                width="100%" height="400" style="border:0; border-radius:15px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section> -->

</div>

@include('frontend.include.footer')
@include('frontend.include.js')

<script>
$(document).ready(function() {
    $('#contactEnquiryForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        var submitBtn = $('#submitContactBtn');
        
        submitBtn.prop('disabled', true).text('Sending...');
        $('#contactSuccessMessage, #contactErrorMessage').addClass('d-none');
        
        $.ajax({
            url: '{{ route("contact-enquiry.store") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#contactSuccessMessage').text(response.message).removeClass('d-none');
                    $('#contactEnquiryForm')[0].reset();
                    
                    setTimeout(function() {
                        $('#contactSuccessMessage').addClass('d-none');
                    }, 5000);
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
                $('#contactErrorMessage').html(errorHtml).removeClass('d-none');
            },
            complete: function() {
                submitBtn.prop('disabled', false).text('Send Message');
            }
        });
    });
});
</script>

</body>
</html>
