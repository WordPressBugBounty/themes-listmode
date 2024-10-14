jQuery(document).ready(function($) {
    'use strict';

    if(listmode_ajax_object.sticky_header_active){

    // grab the initial top offset of the navigation 
    var listmodestickyheadertop = $('#listmode-header-end').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var listmodestickyheader = function(){
        var listmodescrolltop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(listmode_ajax_object.sticky_header_mobile_active){
            if (listmodescrolltop > listmodestickyheadertop) {
                $('.listmode-site-header').addClass('listmode-fixed');
            } else {
                $('.listmode-site-header').removeClass('listmode-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (listmodescrolltop > listmodestickyheadertop) {
                    $('.listmode-site-header').addClass('listmode-fixed');
                } else {
                    $('.listmode-site-header').removeClass('listmode-fixed');
                }
            }
        }
    };

    listmodestickyheader();
    // and run it again every time you scroll
    $(window).on( "scroll", function() {
        listmodestickyheader();
    });

    }

    if(listmode_ajax_object.primary_menu_active){
        $(".listmode-nav-primary .listmode-primary-nav-menu").addClass("listmode-primary-responsive-menu");

        $( ".listmode-primary-responsive-menu-icon" ).on( "click", function() {
            $(this).next(".listmode-nav-primary .listmode-primary-nav-menu").slideToggle();
        });

        $(window).on( "resize", function() {
            if(window.innerWidth > 1112) {
                $(".listmode-nav-primary .listmode-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".listmode-primary-responsive-menu > li").removeClass("listmode-primary-menu-open");
            }
        });

        $( ".listmode-primary-responsive-menu > li" ).on( "click", function(event) {
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('listmode-submenu-toggle').parent().toggleClass("listmode-primary-menu-open");
            $(this).find(".children:first").toggleClass('listmode-submenu-toggle').parent().toggleClass("listmode-primary-menu-open");
        });

        $( "div.listmode-primary-responsive-menu > ul > li" ).on( "click", function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('listmode-submenu-toggle').parent().toggleClass("listmode-primary-menu-open");
        });
    }

    if($(".listmode-sticky-social-icon-search").length){
        $(".listmode-sticky-social-icon-search").on('click', function (e) {
            e.preventDefault();
            document.getElementById("listmode-search-overlay-wrap").style.display = "block";
            const listmode_focusableelements = 'button, [href], input';
            const listmode_search_modal = document.querySelector('#listmode-search-overlay-wrap');
            const listmode_firstfocusableelement = listmode_search_modal.querySelectorAll(listmode_focusableelements)[0];
            const listmode_focusablecontent = listmode_search_modal.querySelectorAll(listmode_focusableelements);
            const listmode_lastfocusableelement = listmode_focusablecontent[listmode_focusablecontent.length - 1];
            document.addEventListener('keydown', function(e) {
              let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
              if (!isTabPressed) {
                return;
              }
              if (e.shiftKey) {
                if (document.activeElement === listmode_firstfocusableelement) {
                  listmode_lastfocusableelement.focus();
                  e.preventDefault();
                }
              } else {
                if (document.activeElement === listmode_lastfocusableelement) {
                  listmode_firstfocusableelement.focus();
                  e.preventDefault();
                }
              }
            });
            listmode_firstfocusableelement.focus();
        });
    }

    if($(".listmode-search-closebtn").length){
        $(".listmode-search-closebtn").on('click', function (e) {
            e.preventDefault();
            document.getElementById("listmode-search-overlay-wrap").style.display = "none";
        });
    }

    if(listmode_ajax_object.fitvids_active){
        $(".post").fitVids();
    }

    if(listmode_ajax_object.backtotop_active){
        if($(".listmode-scroll-top").length){
            var listmode_scroll_button = $( '.listmode-scroll-top' );
            listmode_scroll_button.hide();

            $(window).on( "scroll", function() {
                if ( $( window ).scrollTop() < 20 ) {
                    $( '.listmode-scroll-top' ).fadeOut();
                } else {
                    $( '.listmode-scroll-top' ).fadeIn();
                }
            } );

            listmode_scroll_button.on( "click", function() {
                $( "html, body" ).animate( { scrollTop: 0 }, 300 );
                return false;
            } );
        }
    }

    var listmode_slider_autoplay;
    var listmode_slider_loop;
    var listmode_show_dots_pagination;
    var listmode_show_next_prev_navigation;
    var listmode_autoheight_active;
    var listmode_slider_rtl;
    var listmode_slider_autoplayhoverpause;
    if(listmode_ajax_object.slider_active){
        listmode_slider_autoplay = listmode_ajax_object.slider_autoplay ? true : false;
        listmode_slider_loop = listmode_ajax_object.slider_loop ? true : false;
        listmode_show_dots_pagination = listmode_ajax_object.show_dots_pagination ? true : false;
        listmode_show_next_prev_navigation = listmode_ajax_object.show_next_prev_navigation ? true : false;
        listmode_autoheight_active = listmode_ajax_object.autoheight_active ? true : false;
        listmode_slider_rtl = listmode_ajax_object.slider_rtl ? true : false;
        listmode_slider_autoplayhoverpause = listmode_ajax_object.slider_autoplayhoverpause ? true : false;

        if ( $().owlCarousel ) {
            var listmodecarouselwrapper = $('.listmode-posts-carousel');
            var imgLoad = imagesLoaded(listmodecarouselwrapper);
            imgLoad.on( 'always', function() {
                listmodecarouselwrapper.each(function(){
                        var $this = $(this);
                        $this.find('.owl-carousel').owlCarousel({
                            autoplay: listmode_slider_autoplay,
                            loop: listmode_slider_loop,
                            margin: 15,
                            smartSpeed: 250,
                            dots: listmode_show_dots_pagination,
                            dotsSpeed: 100,
                            nav: listmode_show_next_prev_navigation,
                            navSpeed: 100,
                            mouseDrag: true,
                            touchDrag: true,
                            rtl: listmode_slider_rtl,
                            autoplayTimeout: Number(listmode_ajax_object.slider_autoplaytimeout),
                            autoplaySpeed: Number(listmode_ajax_object.slider_autoplayspeed),
                            autoplayHoverPause: listmode_slider_autoplayhoverpause,
                            autoHeight: listmode_autoheight_active,
                            navText: [ '<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>' ],
                            responsive:{
                            0:{
                                items: 1
                            },
                            320:{
                                items: 1
                            },
                            412:{
                                items: 1
                            },
                            680:{
                                items: 2
                            },
                            890:{
                                items: 3
                            },
                            1024:{
                                items: 4
                            },
                            1113:{
                                items: 4
                            },
                            1277:{
                                items: 4
                            }
                        }
                    });
                });
            });
        }
    }

    if(listmode_ajax_object.sticky_sidebar_active){
        $('.listmode-main-wrapper, .listmode-sidebar-one-wrapper').theiaStickySidebar({
            containerSelector: ".listmode-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 960,
        });

        $(window).on( "resize", function() {
            $('.listmode-main-wrapper, .listmode-sidebar-one-wrapper').theiaStickySidebar({
                containerSelector: ".listmode-content-wrapper",
                additionalMarginTop: 0,
                additionalMarginBottom: 0,
                minWidth: 960,
            });
        });
    }

});