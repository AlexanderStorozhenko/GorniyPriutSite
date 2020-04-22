$(document).ready(function () {
    $('.home_carousel__loader').remove();
    $('.owl-carousel').owlCarousel({
        loop: true,
        items: 1,
        margin: 1,
        autoplay: true,
        autoplayTimeout: 5000
    });
});