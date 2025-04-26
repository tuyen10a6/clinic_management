import 'slick-carousel/slick/slick'
import 'slick-carousel/slick/slick.min'

$(document).ready(function () {
    $('.slide').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true,
    });
});
