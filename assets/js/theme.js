// -----------------------------

//   js index
/* =================== */
/*  
    1. Breaking News
    2. Preloader
    3. meanmenu
    4. Sticky Header
    5. countdown
    6. top-bar slider
    7. lt-video-slider
    8. feather spot slider
    9. Photo Gallery activation
   10. hot post carusel
   11. add class hotpost category
   12. video slider carusel
   13. add class video slider nav
   14. embded video popup
   15. scroolbar changed
   15. Ajax Contact Form

*/
// -----------------------------


(function($) {
    "use strict";


    /*---------------------
     1. Breaking News
    --------------------- */
    $('.newsticker').newsTicker({
        row_height: 20,
        max_rows: 1,
        speed: 600,
        direction: 'up',
        duration: 4000,
        autostart: 1,
        prevButton:  $('#prev'),
        nextButton:  $('#next'),
        pauseOnHover: 0
    })

    /*---------------------
     2. Preloader
    --------------------- */

    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() { $(this).remove(); });
    });


    $('.header-search-form button').on('click', function(){
        $('.header-search-form').toggleClass('hsf-show');
    });

    /*-----------------
     3. meanmenu
    -----------------*/
    $('nav#mobile-menu').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: '.mobile-menu',
    });

    /*-----------------
     4. Sticky Header
    -----------------*/
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > $('.header-bottom').offset().top ) {
            $('.menu-area').addClass('navbar-fixed-top');
        } else {
            $('.menu-area').removeClass('navbar-fixed-top');
        }
    });

    /*---------------------
     5. countdown
    --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });

    /*---------------------
     6. top-bar slider
    --------------------- */

    $('.top-bar-slider').owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        mouseDrag:false,
        animateIn:'animated fadeIn',
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

    /*---------------------
     7. lt-video-slider
    --------------------- */

    $('.lt-video-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: true,
        dotsEach: true,
        smartSpeed: 800,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

    /*---------------------
     8. feather spot slider
    --------------------- */

    $('.feather-post-area').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        mouseDrag:false,
        dotsEach: true,
        smartSpeed: 800,
        animateIn:'animated fadeIn',
        animateOut:'animated fadeOut',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    /*---------------------
     9. Photo Gallery activation
    --------------------- */
    $('.photo-gallery').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        dots: true,
        dotsEach: true,
        smartSpeed: 800,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    /*---------------------
     10. hot post carusel
    --------------------- */

    $('.widget-h-list').owlCarousel({
        items:1,
        loop:false,
        animateIn:'animated fadeIn',
        animateOut:'animated fadeOut',
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash'
    });


    $('.widget-hot-header a:nth-child(1)').on('click', function(){
        $('.widget-h-list').addClass('one-active');
        $('.widget-h-list').removeClass('two-active');
        $('.widget-h-list').removeClass('three-active');
    });
    $('.widget-hot-header a:nth-child(2)').on('click', function(){
        $('.widget-h-list').addClass('two-active');
        $('.widget-h-list').removeClass('one-active');
        $('.widget-h-list').removeClass('three-active');
    });
    $('.widget-hot-header a:nth-child(3)').on('click', function(){
        $('.widget-h-list').addClass('three-active');
        $('.widget-h-list').removeClass('one-active');
        $('.widget-h-list').removeClass('two-active');
    });

    /*---------------------
     11. add class hotpost category
    --------------------- */

    $('.widget-hot-header a').on('click', function(){
        $('.widget-hot-header a').removeClass('active');
        $(this).addClass('active');
    });

    /*---------------------
     12. video slider carusel
    --------------------- */
    $('.h3-video-slider').owlCarousel({
        items:1,
        loop:false,
        center:true,
        dots:false,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash'
    });

    /*-------------------------
     13. add class video slider nav
    --------------------------- */

    $('.wh3-msp-single-item').on('click', function(){
        $('.wh3-msp-single-item').removeClass('active');
        $(this).addClass('active');
    });

    /*---------------------
    14. embded video popup
    --------------------- */
    $('.lt-video').magnificPopup({
        type: 'iframe',
        iframe: {
            youtube: {
                index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                id: 'v=', // String that splits URL in a two parts, second part should be %id%
                // Or null - full URL will be returned
                // Or a function that should return %id%, for example:
                // id: function(url) { return 'parsed id'; }

                src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
            }
        }


    });

    /*---------------------
     14. scroolbar changed
     --------------------- */
    $(".h3-video-nav").niceScroll({cursorborder:"",cursorcolor:"#dc3027",boxzoom:true});

    /*---------------------
     15. Ajax Contact Form
     --------------------- */
    $('.cf-msg').hide();
    $('form#cf button#submit').on('click', function () {
        var fname = $('#name').val();
        var email = $('#email').val();
        var msg = $('#msg').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            alert('Please enter valid email');
            return false;
        }

        fname = $.trim(fname);
        email = $.trim(email);
        msg = $.trim(msg);
        if (fname !== '' && email !== '' && msg !== '') {
            var values = "name=" + name + "&email=" + email + " &msg=" + msg;
            $.ajax({
                type: "POST",
                url: "mail.php",
                data: values,
                success: function () {
                    $('#name').val('');
                    $('#email').val('');
                    $('#msg').val('');
                    $('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
                    setTimeout(function () {
                        $('.cf-msg').fadeOut('slow');
                    }, 4000);
                }
            });
        } else {
            $('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>');
        }
        return false;
    });

}(jQuery));
