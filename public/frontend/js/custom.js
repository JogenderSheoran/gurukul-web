$(document).ready(function () {
$(".hasSubMenu").click(function() {
  $(".submenus").toggleClass("open");
});
});



$(document).ready(function () {
  $(".bannerSlider").slick({
    centerMode: false,
    centerPadding: "0px",
    dots: false,
	arrows:true,
    autoplay: false,
    slidesToScroll: 1,
    slidesToShow: 1,
    prevArrow:
      '<span class="priv_arrow"> <i class="fa fa-chevron-left" aria-hidden="true"></i></span>',
    nextArrow:
      '<span class="next_arrow"> <i class="fa fa-chevron-right" aria-hidden="true"></i></span>',
    responsive: [
      {
        breakpoint: 980,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
});