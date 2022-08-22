(function($) {
"use strict";

    jQuery(document).ready(function(){

        $('.banner-active').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		  arrows: true,
		  loop: true,
		  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>' ,
		  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>' ,
		  responsive: [
		  	{
		      breakpoint: 1200,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
		    },
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 500,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
			},
			{
				breakpoint: 375,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  arrows: false,
				}
			  }
		  ]
		});

		$('.team-active').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: true,
			loop: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>' ,
			nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>' ,
			responsive: [
				{
				breakpoint: 1200,
				settings: {
				  slidesToShow: 3,
				  slidesToScroll: 1,
				}
			  },
			  {
				breakpoint: 992,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 767,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 577,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  arrows: false,
				}
			  },
			]
		  });

		  $('.testimonial-active').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: true,
			loop: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-up"></i></button>' ,
			nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-down"></i></button>' ,
			responsive: [
				{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			  },
			  {
				breakpoint: 992,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 500,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1
				}
			  }
			]
		  });

		  $('.partner-active').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false,
			loop: true,
			prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-up"></i></button>' ,
			nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-down"></i></button>' ,
			responsive: [
				{
				breakpoint: 1200,
				settings: {
				  slidesToShow: 4,
				  slidesToScroll: 1,
				}
			  },
			  {
				breakpoint: 992,
				settings: {
				  slidesToShow: 3,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 768,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 576,
				settings: {
				  slidesToShow: 2,
				  slidesToScroll: 1
				}
			  },
			  {
				breakpoint: 480,
				settings: {
				  slidesToShow: 1,
				  slidesToScroll: 1
				}
			  }
			]
		  });

		$(".slide-down").on('click',function(){
			$(".submenu").slideToggle(1000);
		})

		$('.select').niceSelect();

		$('.counter').counterUp({
            delay: 5,
            time: 2000
		});

		$('.video-popup').magnificPopup({
		type: 'iframe'
		});


    });


})(jQuery);
