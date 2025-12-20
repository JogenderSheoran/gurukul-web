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
	 $(".hoverText").hide().hide();
	$("span.readMore").click(function () {
      $(".hoverText").slideToggle(300);
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