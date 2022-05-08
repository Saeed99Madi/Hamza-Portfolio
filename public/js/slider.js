/* global jQuery */

var slider = function () {
    var handleSlider = function () {
        var flag_item = false;
        var elm_parent = $('.slider-layers');
        var timer = elm_parent.attr('data-timer');
        var data_auto = elm_parent.attr('data-auto');
        if(timer == undefined) {
            timer = 5000;
        }
        if(data_auto == undefined) {
            data_auto = true;
        }
        var current = 0;
        var size_layers = $('.slider-layers>li').length;

        function sliderPaging() {
            for(var x=0;x<size_layers;x++) {
                $('.slider-paging').append('<li></li>');
            }
            $('.slider-paging>li').eq(0).addClass('active');
        }
        sliderPaging();

        $('.slider-layers>li').eq(0).removeClass('hide-layer').addClass('current');
        function next_layer() {
            current = parseInt(elm_parent.attr('data-current'));
            if(!flag_item)
            {
                flag_item = true;
                $('.slider-layers>li.current').find('.txt_animate').each(function () {
                    var animateOut = $(this).attr('data-animateOut');
                    $(this).addClass(animateOut);
                });
                $('.slider-layers>li').eq(current).addClass('hide-layer').removeClass('current');
                if(current>=(size_layers-1)) {
                    current = 0;
                    elm_parent.attr('data-current',current);
                }
                else {
                    current++;
                    elm_parent.attr('data-current',current);
                }
                $('.slider-layers>li').eq(current).removeClass('hide-layer').addClass('current');
                $('.slider-paging>li').removeClass('active').eq(current).addClass('active');
                setTimeout(function () {
                    $('.slider-layers>li.current').find('.txt_animate').each(function () {
                        var animateOut = $(this).attr('data-animateOut');
                        var animateIn = $(this).attr('data-animateIn');
                        $(this).removeClass('hide fadeOutLeft '+animateOut).addClass(animateIn);
                    });
                    flag_item = false;
                },600);
            }
        }
        function prev_layer() {
            current = parseInt(elm_parent.attr('data-current'));
            if(!flag_item) {
                flag_item = true;
                $('.slider-layers>li.current').find('.txt_animate').each(function () {
                    var animateOut = $(this).attr('data-animateOut');
                    $(this).addClass(animateOut);
                });
                $('.slider-layers>li').eq(current).addClass('hide-layer').removeClass('current');
                if(current<=0) {
                    current = size_layers-1;
                    elm_parent.attr('data-current',current);
                }
                else {
                    current--;
                    elm_parent.attr('data-current',current);
                }
                $('.slider-layers>li').eq(current).removeClass('hide-layer').addClass('current');
                $('.slider-paging>li').removeClass('active').eq(current).addClass('active');
                setTimeout(function () {
                    $('.slider-layers>li.current').find('.txt_animate').each(function () {
                        var animateOut = $(this).attr('data-animateOut');
                        var animateIn = $(this).attr('data-animateIn');
                        $(this).removeClass('hide fadeOutLeft '+animateOut).addClass(animateIn);
                    });
                    flag_item = false;
                },600);
            }
        };
        var animateLayer = setInterval(function () {
            next_layer();
        }, timer);
        function layerAnimateStop() {
            clearInterval(animateLayer);
        }
        function animateLayers() {
            next_layer();
            layerAnimateStop();
            animateLayer = setInterval(function () {
                next_layer();
            }, timer);
        }

        $(document).on('click','.slider-paging>li',function () {
            var index = $(this).index();
            current = index;
            animateLayers();
            return false;
        });
    };
    return {
        init: function () {
            handleSlider();
        }
    };
}();

jQuery(document).ready(function () {
    slider.init();
});
