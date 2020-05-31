jQuery(document).ready(function(){
    jQuery('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });

    jQuery('.testimonial-slider').bxSlider({
        //pagerCustom: '.bxslider_testimonial_pager',
        auto: true,
        nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>'
    });

    var width = jQuery(window).width();
    console.log(width);
    if(width <= 470){
        var slideWidth = 425;
        var slideMargin = 0;
    } else {
        var slideWidth = 270;
        var slideMargin = 15;
    }

    jQuery('.cgs-product-slider').bxSlider({
        auto: true,
        minSlides: 1,
        maxSlides: 4,
        moveSlides: 1,
        slideWidth: slideWidth,
        slideMargin: slideMargin,
        adaptiveHeight: true,
        nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>'
    });

    jQuery('.masonry').masonry();
});
