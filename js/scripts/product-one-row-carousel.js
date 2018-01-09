$(document).ready(function () {
    $('.slider-prod').slick({
        centerMode: true,
        centerPadding: '20px',
        arrows: true,
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<span class="glyphicon glyphicon-chevron-left"></span>',
        nextArrow: '<span class="glyphicon glyphicon-chevron-right"></span>',

        responsive: [

            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
});