setTimeout(function () {
    var preload = document.getElementById("preloader");
    if (preload) {
        preload["classList"]["add"]("preloader-hide")
    }
}, 150);

jQuery('.splide__list').owlCarousel({
    items: 1,
    margin: 15,
    loop: true,
    autoplay: true,
    smartSpeed: 1000,
    autoplayTimeout: 3000,
    dots: false,
    nav: false
})
jQuery('.collections').owlCarousel({
    nav: !0,
    dots: !1,
    margin: 30,
    loop: !0,
    touchDrag: !0,
    navText: ['<span aria-label="Previous">‹</span>', '<span aria-label="Next">›</span>'],
    responsive: {
        0: {
            items: 2,
            mouseDrag: !0,
            stagePadding: 25
        },
        500: {
            items: 2
        },
        700: {
            items: 4
        }
    }
})

jQuery('.cat-slider').owlCarousel({
    margin: 10,
    autoWidth: !0,
    dragEndSpeed: 600,
    nav: !0,
    dots: !1,
    slideBy: 2,
    navText: ['<span aria-label="Previous">‹</span>', '<span aria-label="Next">›</span>'],
    slideTransition: "ease",
    responsive: {
        1200: {
            margin: 20,
            items: 9
        },
        1024: {
            items: 8,
            margin: 20
        },
        992: {
            items: 7,
            margin: 20
        },
        600: {
            margin: 25,
            items: 6,
            nav: !1
        },
        480: {
            margin: 15,
            items: 3,
            autoWidth: !0,
            nav: !1
        },
        320: {
            margin: 10,
            items: 2,
            autoWidth: !0,
            nav: !1
        }
    }
})

jQuery('.product_categories').owlCarousel({
    margin: 10,
    autoWidth: !0,
    dragEndSpeed: 600,
    nav: !1,
    dots: !1,
    slideBy: 2,
    navText: ['<span aria-label="Previous">‹</span>', '<span aria-label="Next">›</span>'],
    slideTransition: "ease",
    responsive: {
        1200: {
            margin: 20,
            items: 9
        },
        1024: {
            items: 8,
            margin: 20
        },
        992: {
            items: 7,
            margin: 20
        },
        600: {
            margin: 25,
            items: 6,
            nav: !1
        },
        480: {
            margin: 15,
            items: 3,
            autoWidth: !0,
            nav: !1
        },
        320: {
            margin: 10,
            items: 2,
            autoWidth: !0,
            nav: !1
        }
    }
})



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
    if(jQuery('.column_column__1Vkn8').length){
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


// Cart page
jQuery(document).ready(function ($) {
    jQuery('body').on('click', '.quantity .quantity-plus', function (e) {
        var _this = jQuery(this).closest('.quantity').find('input.qty'),
            _value = parseInt(_this.val()),
            _max = parseInt(_this.attr('max')),
            _step = parseInt(_this.data('step')),
            _value = _value + _step - 1;
        if (_max && _value > _max) {
            _value = _max;
        }
        _this.val(_value);
        _this.trigger("change");
        e.preventDefault();
    });

    jQuery('body').on('click', '.quantity .quantity-minus', function (e) {
        var _this = jQuery(this).closest('.quantity').find('input.qty'),
            _value = parseInt(_this.val()),
            _min = parseInt(_this.attr('min')),
            _step = parseInt(_this.data('step')),
            _value = _value - _step + 1;
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
    jQuery(document).on('change', function () {
        jQuery('.quantity').each(function () {
            var _this = jQuery(this).find('input.qty'),
                _value = _this.val(),
                _max = parseInt(_this.attr('max'));
            if (_value > _max) {
                jQuery(this).find('.quantity-plus').css('pointer-events', 'none')
            } else {
                jQuery(this).find('.quantity-plus').css('pointer-events', 'auto')
            }
        })
    });

});

var timeout;

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