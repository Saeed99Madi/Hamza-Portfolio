/* global jQuery */

function getDir() {
    var dir = 'ltr';
    var rtl = $("#hdnIsRTL").val();
    if (rtl == true || rtl == 'true') {
        dir = 'rtl';
    }
    else {
        dir = 'ltr';
    }
    //if ($('html').attr('lang') == 'ar') {
    //    dir = 'rtl';
    //}
    return dir;
};

var main = function () {
    var handleMenuResponsive = function () {
        function close_menu() {
            $('.menu-grid').removeClass('active');
            $('.hamburger-menu').removeClass('active').addClass('unactive');
            $('body').removeClass('body-overflow');
        };
        jQuery(document).on('click','.hamburger-menu.unactive',function() {
            $('.menu-grid').addClass('active');
            $('.hamburger-menu').removeClass('unactive').addClass('active');
            $('body').addClass('body-overflow');
            return false
        });
        jQuery(document).on('click','.hamburger-menu.active',function() {
            close_menu();
            return false
        });
    };
    var handleStickyMenu = function() {
        function stickyMenu() {
            var top_scoll = 50;
            $(document).scrollTop() > top_scoll, $(window).on("scroll", function () {
                var e = $(document).scrollTop();
                e > top_scoll ? (
                    $("body").hasClass("sticky") || ($("body").addClass("sticky")),
                    e > top_scoll) : ($("body").removeClass("sticky"));
            });
        }

        function initStickyMenu() {
            stickyMenuSelector(), $(window).on("resize", function () {
                stickyMenuSelector()
            })
        }

        function stickyMenuSelector() {
            stickyMenu()
        }
        initStickyMenu();
    };
    var handleThreeLines = function () {
        if($('.two-lines').length) {
            $('.two-lines').ellipsis({
                lines: 2,responsive: true
            });
        }
        if($('.three-lines').length) {
            $('.three-lines').ellipsis({
                lines: 3,responsive: true
            });
        }
        if($('.four-lines').length) {
            $('.four-lines').ellipsis({
                lines: 4,responsive: true
            });
        }
    };
    var handlePartnersSlider = function () {
        if($('.partners-slick').length) {
            $('.partners-slick').slick({
                rtl: getDir() == 'rtl' ? true : false,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                nextArrow: '<i class="fas fa-chevron-right"></i>',
                prevArrow: '<i class="fas fa-chevron-left"></i>',
                responsive: [
                    {
                        breakpoint: 1001,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 451,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 351,
                        settings: {
                            slidesToShow: 1
                        }
                    },
                ]
            });
        }
    };
    
    var handleVideoBox = function () {
        $(document).on('click','.video-venobox',function () {
            $('.video-venobox').venobox();
            return false;
        });
        $(document).on('click','.image-venobox',function () {
            $('.image-venobox').venobox();
            return false;
        });
    };
    var handleDatePicker = function () {
        if($('.date-picker').length) {
            $('.date-picker').datepicker({
                maxViewMode: 0
            });
        }
    };
    var handleSelectMedia = function () {
        function menuLinksClose() {
            $('.menu-button').removeClass('active').addClass('unactive');
            $('.menu-list').removeClass('active');
        }
      if($('.menu-media').length) {
          var text = $('.menu-list>li.active').text();
          $('.menu-top>span').html(text);
          $(document).on('click','.menu-button.unactive', function () {
              $('.menu-button').removeClass('unactive').addClass('active');
              $('.menu-list').addClass('active');
          });
          $(document).on('click','.menu-button.active', function () {
              menuLinksClose()
          });

          $(document).on("click", "body", function (e) {
              var target = $(e.target);
              if (!$(e.target).is('.menu-list, .menu-list *, .menu-top, .menu-top *')) {
                  menuLinksClose()
              }
          });
      }
    };
    var handleSelecAbout = function () {
        function menuLinksClose() {
            $('.menuAbout-button').removeClass('active').addClass('unactive');
            $('.about-menu').removeClass('active');
        }
        if($('.menu-region').length) {
            var text = $('.about-menu>li.active').text();
            $('.menu-top>span').html(text);
            $(document).on('click','.menuAbout-button.unactive', function () {
                $('.menuAbout-button').removeClass('unactive').addClass('active');
                $('.about-menu').addClass('active');
            });
            $(document).on('click','.menuAbout-button.active', function () {
                menuLinksClose()
            });

            $(document).on("click", "body", function (e) {
                var target = $(e.target);
                if (!$(e.target).is('.about-menu, .about-menu *, .menu-top, .menu-top *')) {
                    menuLinksClose()
                }
            });
        }
    };
    return {
        init: function () {
            handleMenuResponsive();
            handleStickyMenu();
            handleThreeLines();
            handlePartnersSlider();
            //handleArticleSlider();
            handleVideoBox();
            handleDatePicker();
            handleSelectMedia();
            handleSelecAbout();
        }
    };
}();

jQuery(document).ready(function () {
    main.init();
});
