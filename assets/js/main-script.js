(function ($) {
    "use strict";

    var editMode = false;
    
// content scroller script starts

var cwSlider = function ( $scope, $ ) {
    
    var slider = $scope.find( '.slider' ).eq(0);

    var sliderWrapper = slider.find( '.slider-wrapper');
    var sliderPrev = slider.find( '.slider-prev');
    var sliderNext = slider.find( '.slider-next');
    
    sliderWrapper.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: sliderPrev,
        nextArrow: sliderNext,
        dots: true,
        autoplay: true,
        autoplayspeed: 3000
    });

}


// tilt hover js end
$(window).on('elementor/frontend/init', function () {
    if( elementorFrontend.isEditMode() ) {
        editMode = true;
    }
    
    elementorFrontend.hooks.addAction( 'frontend/element_ready/cw-slider.default', cwSlider );
} );

}(jQuery));