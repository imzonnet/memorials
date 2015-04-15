jQuery(document).ready(function($){

    $('.timeline-list').bxSlider({
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 290,
        slideMargin: 30,
        pager: false
    });

    $(".fancybox").fancybox();
    $(".fancybox-media").fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        helpers : {
            media : {}
        }
    });


});