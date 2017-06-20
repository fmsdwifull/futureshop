// On window load
// On Document Load
jQuery(window).load(function(){
    //site loader
    jQuery('#wraploader').hide();
});

// fixed header


    var $window          = jQuery( window ),
        $header          = jQuery( '.site-header' ),
        $siteDescription = jQuery('.site-description'),
        $body            = jQuery( 'body' );
        $headerHeight    = $header.outerHeight(),
        scrollTop        = 0,
        className        = 'fixed-header';
        $body.css( 'margin-top', $headerHeight + 'px' );

        function fixedHeader(){

          scrollTop        = $window.scrollTop();

          if ( ! $header.hasClass( className ) && scrollTop > $headerHeight  ) {
            $header.addClass( className );
          }else if ( $header.hasClass( className ) && scrollTop <= $headerHeight  ) {
            $header.removeClass( className );
          }
        }

  jQuery(window).load( fixedHeader );
  jQuery(window).scroll( fixedHeader );

jQuery(window).load(function(){
  jQuery('#load-wrap').css('opacity','0').hide();
});

// On document ready
jQuery(document).ready(function ($) {
  

  var $searchWrapper = $(".search-form-up");
  $searchWrapper.hide();
  
    // search section
    jQuery(".search-button").click(function( e ){
        e.preventDefault();

        $searchWrapper.slideToggle();

        if($('i',this).hasClass("fa-search")){
            $('i',this).removeClass("fa-search");
            $('i',this).addClass("fa-close");
        }
        else{
            $('i',this).removeClass("fa-close");
            $('i',this).addClass("fa-search");
        }
    });

    //What happen on window scroll
    function back_to_top(){
        var scrollTop = $(window).scrollTop();
        var offset = 500;
        if (scrollTop < offset) {
            $('.salient-back-to-top').hide();
        } else {
            $('.salient-back-to-top').show();
        }
    }

    // slick jQuery 
    jQuery('.carousel-group').slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      lazyLoad: 'ondemand',
      responsive: [
         {
           breakpoint: 1024,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             infinite: true,
             dots: true
           }
         },
         {
           breakpoint: 768,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2
           }
         },
         {
           breakpoint: 481,
           settings: {
             slidesToShow: 1,
             slidesToScroll: 1
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
       ]
    });

    jQuery(window).on("scroll", function (e) {
        back_to_top();
    });
    back_to_top();

    $('a[href*="#"]').on('click', function(event){
        if ($(this.hash).length){
            event.preventDefault();
            $("html, body").stop().animate({scrollTop: $(this.hash).offset().top - 70}, 2e3, "easeInOutExpo");
        }
    });

    /*wow js*/
    wow = new WOW({
            boxClass: 'salient-animate'
        }
    )
    wow.init();

    // mmenu
    jQuery('nav#menu').mmenu({
       // options
       "classes": "mm-slide mm-light",
       "counters": true,
       "header": true,
       "offCanvas": {
          "position"  : "right",
          "zposition": "back"
           },
       "extensions" : [ 'effect-slide-menu', 'pageshadow' ],
       "navbar"         : {
        "title"     : 'MENU'
       },
       "navbars"        : [{
            "position"  : 'top',
            "content"       : [
                'prev',
                'title',
                'close'
            ]
        }
       ]
    });

    jQuery('.menu-icon').click( function(e){
      e.preventDefault();

      bodyMargin = jQuery( 'body' ).css('margin-top');
      console.log( 'called');
      jQuery( 'body' ).css({marginTop:0});
    });

    jQuery('#pbOverlay').click( function(){

      jQuery( 'body' ).css({marginTop:bodyMargin});
      console.log( 'called sec');
      
    });



    
    // window scroll
    jQuery(window).on('scroll', function(){

       scrollTopPosition = jQuery(window).scrollTop();
         // gotop on scroll
         if( scrollTopPosition > 240 ) {
           $('#gotop').css({'bottom': 25});
         } else {
           $('#gotop').css({'bottom': -125}); 
         } 
     });

    // init Isotope
    var $grid = $('.grid');
    $grid.isotope({
        itemSelector: '.element-item',
        masonry: {
        }
        });





     // resize
     $(window).resize(function(){
        var  mastheadHeight = $('#masthead').outerHeight(),
             mobileScreen = $(window).width();
           $( '#fixedhead' ).css({'width': mobileScreen });
           //mobileScreenMargin(mobileScreen);
     });

     // popup for image in isotope
     $( '#port-gallery' ).photobox( '.element-item .popup-open', {
      time:0,
      zoomable:false
      //single: true
     });

    }); 
    
