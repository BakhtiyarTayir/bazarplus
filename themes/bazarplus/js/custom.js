setTimeout(function () {
    var preload = document.getElementById("preloader");
    if (preload) {
        preload["classList"]["add"]("preloader-hide")
    }
}, 150);

jQuery(window).scroll(function () {
    var scrollTop = jQuery(window).scrollTop();
    if (scrollTop > 50) {
        jQuery('.header-bar').removeClass('header-bar-detached');
        jQuery('.footer-bar').removeClass('footer-bar-detached');
    } else {
        jQuery('.header-bar').addClass('header-bar-detached');
        jQuery('.footer-bar').addClass('footer-bar-detached');
    }
});

jQuery(window).scroll(function () {
    var scrollTop = jQuery(window).scrollTop();
    if (jQuery('.column_column__1Vkn8').length) {
        var offtop = jQuery('.column_column__1Vkn8').offset().top;
        if (scrollTop > offtop) {
            jQuery('.bOkHCz').addClass('fixed-bar');
        } else {
            jQuery('.bOkHCz').removeClass('fixed-bar');

        }
    }

});

function scrollNav() {
    jQuery('nav a').click(function () {
        jQuery(".active").removeClass("active");
        jQuery(this).closest('li').addClass("active");
        var indexs = jQuery(this).closest('.owl-item').index();
        jQuery('.product_categories').trigger('to.owl.carousel', [indexs, 500, true]);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 250
        }, 300);
        return false;
    });
}
scrollNav();


// + - buttons for add cart and remove cart

;
(function($) {
    "use strict";
    var BAZARPLUS_THEM = {
        init: function() {
            this.biolife_woo_quantily();
        },
        biolife_woo_quantily: function() {
            $('body').on('click', '.quantity .quantity-plus', function(e) {
                var _this = $(this).closest('.quantity').find('input.qty'),
                    _value = parseInt(_this.val()),
                    _max = parseInt(_this.attr('max')),
                    _step = parseInt(_this.data('step')),
                    _value = _value + _step;
                if (_max && _value > _max) {
                    _value = _max;
                }
                _this.val(_value);
                _this.trigger("change");
                e.preventDefault();
            });
            $(document).on('change', function() {
                $('.quantity').each(function() {
                    var _this = $(this).find('input.qty'),
                        _value = _this.val(),
                        _max = parseInt(_this.attr('max'));
                    if (_value > _max) {
                        $(this).find('.quantity-plus').css('pointer-events', 'none')
                    } else {
                        $(this).find('.quantity-plus').css('pointer-events', 'auto')
                    }
                })
            });
            $('body').on('click', '.quantity .quantity-minus', function(e) {
                var _this = $(this).closest('.quantity').find('input.qty'),
                    _value = parseInt(_this.val()),
                    _min = parseInt(_this.attr('min')),
                    _step = parseInt(_this.data('step')),
                    _value = _value - _step;
                if (_min && _value < _min) {
                    _value = _min;
                }
                if (!_min && _value < 0) {
                    _value = 0;
                }
                _this.val(_value);
                _this.trigger("change");
                e.preventDefault();
            });
        },
    };
    document.addEventListener("DOMContentLoaded", function(event) {
        BAZARPLUS_THEM.init();
    });
})(jQuery, window, document);
    
var timeout;

jQuery(document).ready(function ($) {
    jQuery(function ($) {
        jQuery('.woocommerce').on('change', 'input.qty', function () {

            if (timeout !== undefined) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function () {
                jQuery("[name='update_cart']").trigger("click");
            }, 1000); // 1 second delay, half a second (500) seems comfortable too

        });
    });
});