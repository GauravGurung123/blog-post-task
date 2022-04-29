/*
Template:  Phifi - Digital Marketing Agency Responsive HTML5 Template
Author: iqonicthemes.in
Version: 1.0
Design and Developed by: iqonicthemes.in
*/

/*----------------------------------------------
 Table of contents
------------------------------------------------

:: Page Loader
:: Header
:: Back To Top
:: Dropdown Menu
:: Toggler Button
:: Counter
:: Progress Bar
:: Circle progress bar
:: Effect Box
:: Progress Bar
:: Accordion
:: Magnific Popup
:: Owl Carousel
:: Wow Animation

======================================
[ End table content ]
======================================*/

(function(jQuery) {

    "use strict";
    jQuery(document).ready(function() {

        jQuery(window).on('load', function(e) {

            /*------------------------
            Page Loader
            --------------------------*/
            jQuery("#load").fadeOut();
            jQuery("#loading").delay(0).fadeOut("slow");

            /*------------------------
            Header
            --------------------------*/
            $('.navbar-nav li a').on('click', function(e) {
                var anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top - 0
                }, 1500);
                e.preventDefault();
            });

            function headerHeight() {
                var height = jQuery("#main-header").height();
                jQuery('.iq-height').css('height', height + 'px');
            }
            jQuery(function() {
                var header = jQuery("#main-header"),
                    yOffset = 0,
                    triggerPoint = 80;

                headerHeight();

                jQuery(window).resize(headerHeight);
                jQuery(window).on('scroll', function() {

                    yOffset = jQuery(window).scrollTop();

                    if (yOffset >= triggerPoint) {
                        header.addClass("menu-sticky animated slideInDown");
                    } else {
                        header.removeClass("menu-sticky animated slideInDown");
                    }

                });
            });
            $('.navbar-nav li a').on('click', function() {
                $('.navbar-nav li a.active').removeClass('active');
                $(this).addClass('active');
            });


            /*------------------------
             Back To Top
             --------------------------*/
            jQuery('#back-to-top').fadeOut();
            jQuery(window).on("scroll", function() {
                if (jQuery(this).scrollTop() > 250) {
                    jQuery('#back-to-top').fadeIn(1400);
                } else {
                    jQuery('#back-to-top').fadeOut(400);
                }
            });

            // scroll body to 0px on click
            jQuery('#top').on('click', function() {
                jQuery('top').tooltip('hide');
                jQuery('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });



            /*------------------------
            Dropdown Menu
            --------------------------*/
            $(".nav-item.dropdown").mouseenter(function() {
                $(this).addClass("menu-show");
            });

            $(".nav-item.dropdown").mouseleave(function() {
                $(this).removeClass("menu-show");
            });



            /*------------------------
            Toggler Button
            --------------------------*/
            jQuery(document).ready(function() {
                jQuery(".menu-btn").on( 'click' , function() {
                    jQuery(this).toggleClass("is-active");
                });
            });

            /*----------------
            Counter
            ---------------------*/
            jQuery('.timer').countTo();

            /*------------------------
            Progress Bar
            --------------------------*/
            jQuery('.iq-progress-bar > span').each(function() {
                var jQuerythis = jQuery(this);
                var width = jQuery(this).data('percent');
                jQuerythis.css({
                    'transition': 'width 2s'
                });
                setTimeout(function() {
                    jQuerythis.appear(function() {
                        jQuerythis.css('width', width + '%');
                    });
                }, 500);
            });

            /*------------------------
            Circle progress bar
            --------------------------*/
            function animateElements() {

                if ($(".progressbar-circle").length) {

                    jQuery('.progressbar-circle').each(function () {
                        var elementPos = jQuery(this).offset().top;
                        var topOfWindow = jQuery(window).scrollTop();
                        var percent = jQuery(this).find('.circle').attr('data-percent');
                        var percentage = parseInt(percent, 10) / parseInt(100, 10);
                        var animate = jQuery(this).data('animate');
                        if (elementPos < topOfWindow + jQuery(window).height() - 30 && !animate) {
                            jQuery(this).data('animate', true);
                            jQuery(this).find('.circle').circleProgress({
                                startAngle: -Math.PI / 2,
                                value: percent / 100,
                                thickness: 10,
                                fill: {
                                    color: '#fc3b3c'
                                }
                            }).stop();
                            jQuery(this).find('.circle.purple-hover').circleProgress({
                                fill: {
                                    color: '#fc3b3c'
                                }
                            });
                        }
                    });
                }

            }

            // Show animated elements
            animateElements();
            jQuery(window).scroll(animateElements);


            /*------------------------
            Effect Box
            --------------------------*/

            jQuery(".effect-box .effect-btn").on( 'click' , function() {
                jQuery(this).parent().toggleClass("main");
            });


            /*------------------------
            Progress Bar
            --------------------------*/
            jQuery('.iq-progress-bar > span').each(function() {
                var jQuerythis = jQuery(this);
                var width = jQuery(this).data('percent');
                jQuerythis.css({
                    'transition': 'width 2s'
                });
                setTimeout(function() {
                    jQuerythis.appear(function() {
                        jQuerythis.css('width', width + '%');
                    });
                }, 500);
            });

            /*------------------------
            Accordion
            --------------------------*/
            jQuery('.iq-accordion .iq-accordion-block .iq-accordion-details').hide();
            jQuery('.iq-accordion .iq-accordion-block:first').addClass('iq-active').children().slideDown('slow');
            jQuery('.iq-accordion .iq-accordion-block').on("click", function() {
                if (jQuery(this).children('div.iq-accordion-details').is(':hidden')) {
                    jQuery('.iq-accordion .iq-accordion-block').removeClass('iq-active').children('div.iq-accordion-details').slideUp('slow');
                    jQuery(this).toggleClass('iq-active').children('div.iq-accordion-details').slideDown('slow');
                }
            });

            /*------------------------
            Magnific Popup
            --------------------------*/
            jQuery('.popup-gallery').magnificPopup({
                delegate: 'a.popup-img',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                    }
                }
            });


            jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });

            /*------------------------
            Owl Carousel
            --------------------------*/
            jQuery('.owl-carousel').each(function() {
                var jQuerycarousel = jQuery(this);
                jQuerycarousel.owlCarousel({
                    items: jQuerycarousel.data("items"),
                    loop: jQuerycarousel.data("loop"),
                    margin: jQuerycarousel.data("margin"),
                    stagePadding: jQuerycarousel.data("padding"),
                    nav: jQuerycarousel.data("nav"),
                    dots: jQuerycarousel.data("dots"),
                    autoplay: jQuerycarousel.data("autoplay"),
                    autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
                    navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
                    responsiveClass: true,
                    responsive: {
                        // breakpoint from 0 up
                        0: {
                            items: jQuerycarousel.data("items-mobile-sm"),
                            nav: false,
                            dots: true
                        },
                        // breakpoint from 480 up
                        480: {
                            items: jQuerycarousel.data("items-mobile"),
                            nav: false,
                            dots: true
                        },
                        // breakpoint from 786 up
                        768: {
                            items: jQuerycarousel.data("items-tab")
                        },
                        // breakpoint from 1023 up
                        1023: {
                            items: jQuerycarousel.data("items-laptop")
                        },
                        1199: {
                            items: jQuerycarousel.data("items")
                        }
                    }
                });
            });

            /*------------------------
            Wow Animation
            --------------------------*/
            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 0,
                mobile: false,
                live: true
            });
            wow.init();

            jQuery('.slick-current').prev().addClass('near-item');
            jQuery('.slick-current').next().addClass('near-item');

        });

    });


})(jQuery);