<script src="https://kit.fontawesome.com/2691c044c1.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('frontend/js/custom.js')}}"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

	<script>
  AOS.init();
</script>
<script>
$(document).ready(function() {

        $('.counter').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
 
});  

</script>

<script>
$(document).ready(function () {
  $('#popup').fadeIn(400);

  $('#closePopup').on('click', function () {
    $('#popup').fadeOut(300);
  });
});

</script>


<script>
$(document).ready(function () {
	// Old Read More functionality for About section
	$(".hoverText").hide().hide();
	$("span.readMore").click(function () {
		var target = $(this).data('target');
		
		// If it's the new dynamic content
		if (target) {
			var previewClass = '.content-preview-' + target;
			var fullClass = '.content-full-' + target;
			
			if ($(fullClass).is(':visible')) {
				$(fullClass).slideUp(300);
				$(previewClass).slideDown(300);
				$(this).text('Read More');
			} else {
				$(previewClass).slideUp(300);
				$(fullClass).slideDown(300);
				$(this).text('Read Less');
			}
		} else {
			// Old functionality for About section
			$(".hoverText").slideToggle(300);
		}
    });
	
	$(".hoverTextNext").hide().hide();
	$("span.readMoreNext").click(function () {
      $(".hoverTextNext").slideToggle(300);
    });
	
});

</script>
<script>
$(document).ready(function () {

    if ($('.commonGallerySlider').length) {
        $('.commonGallerySlider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                { breakpoint: 992, settings: { slidesToShow: 2 }},
                { breakpoint: 576, settings: { slidesToShow: 1 }}
            ]
        });
    }

});
</script>

<script>
// Admission Popup Functionality
$(document).ready(function() {
    // Open modal when Apply Now button is clicked - works globally
    $(document).on('click', '.btn-primary', function(e) {
        if ($(this).text().trim() === 'Apply Now') {
            e.preventDefault();
            $('#admissionEnquiryModal').modal('show');
        }
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