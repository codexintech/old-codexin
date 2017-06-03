jQuery(window).load(function() { 
    jQuery(".cssload-container").delay(400).fadeOut("slow");
    jQuery(".cssload-speeding-wheel").delay(400).fadeOut("slow");
    jQuery("#loader").delay(800).fadeOut("slow"); 

});

jQuery(document).ready(function($){

	// activating wow (animation on scroll) 
	new WOW().init();

	// activating superfish menu
	$(".sf-menu").superfish({

		delay:       0,                            // one second delay on mouseout
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
		speed:       'fast',                          // faster animation speed
		autoArrows:  false  

	});
    
    $('.counter').counterUp({ delay: 10, time: 2000 });

	$('.mpopup').magnificPopup({
	  type:'image',
	  mainClass: 'mfp-with-zoom', // this class is for CSS animation below

	  zoom: {
	    enabled: true, // By default it's false, so don't forget to enable it

	    duration: 300, // duration of the effect, in milliseconds
	    easing: 'ease-in-out', // CSS transition easing function
	    opener: function(openerElement) {
	      // openerElement is the element on which popup was initialized, in this case its <a> tag
	      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
	      return openerElement.is('img') ? openerElement : openerElement.find('img');
	    }
	  }
	});


	$(".mpopup, .img-gallery").click(function(){
		$("html").addClass("pop-triggered");
	});

	$("li.menu-item-has-children > a").append('<span><i class="fa fa-angle-down"></i></span>');



    $('.client-list').slick({
        slidesToShow: 6,
        arrows: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 000,
        speed: 2500,
        cssEase: 'linear',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                }
            }, {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                    dots: false,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                dots: false,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });



            // $('#cx_cta_section').parallax({
            //     imageSrc: '<?php echo $img_source1; ?>'
            // });


        // $(window).on('load', function() { 
        //     $('#status').fadeOut(); 
        //     $('#preloader').delay(350).fadeOut('slow'); 
        //     $('body').delay(350);
        // })


    // Portfolio Isotop settings
        
    var $isoimage = $('.portfolio');

    var $portfolio = $isoimage.imagesLoaded( function() {
        $isoimage.isotope({
             itemSelector: '.portfolio-item'
        });
    });


    $('.portfolio-filter .cx_filter_btn').click(function(e) {
        var $this = $(this);
        e.preventDefault();

        var $filter = $this.attr('data-filter');

        $portfolio.isotope({
             filter: $filter  
        });

        $('.portfolio-filter .cx_filter_btn').removeClass('cx_active');
        $this.addClass('cx_active');
    }); 

    $('.testimonials').slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        speed: 500,
        autoplay: false,
        autoplaySpeed: 4000,
        cssEase: 'ease-in-out',
    });

    /*--------------------------------------------------------------
    scrollUp button (Go to top) at the right bottom corner of window
    ---------------------------------------------------------------- */

    // $(window).on('scroll',function () {
    //     if($(window).scrollTop()>200) {
    //         $("#toTop").fadeIn();
    //     } else {
    //         $("#toTop").fadeOut();
    //     }
    // });

    $("#toTop").on('click', function() {
        $("html,body").animate({
            scrollTop:0
        }, 500)
    });  //scrollup finished

    // for(var i = 1; i<4; i++) {
    //     var j = parseInt(i);
    //     //console.log(j);
    //     //console.log('done');

    //     var str1 = 'cx-typed-strings';
    //     var res = str1.concat(j);
    //     console.log(res);

        $(".cx-element-1").typed({
            stringsElement: document.getElementById("cx-typed-strings-1"),
            typeSpeed: 100,
            backDelay: 500,
            loop: true,
            contentType: 'html', // or text
            // defaults to null for infinite loop
            loopCount: null,
        });
    // }



   
});


// For Responsive Menu

var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
});

var slideLeftBtn = document.querySelector('#c-button--slide-left');

slideLeftBtn.addEventListener('click', function(e) {
	e.preventDefault;
	slideLeft.open();
});


