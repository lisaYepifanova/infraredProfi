$(document).ready(function () {
    $('.slider-prod').slick({


                dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 2,
        centerMode: true,






        arrows: true,
        autoplay: false,
        autoplaySpeed: 4000,
        prevArrow: '<span class="glyphicon glyphicon-chevron-left"></span>',
        nextArrow: '<span class="glyphicon glyphicon-chevron-right"></span>',
        cssEase: 'linear',
        focusOnSelect: true,
        speed: 200,
        initialSlide: 1,
        responsive: [

            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '60px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.slick-slide').width($('.slick-list').width()*0.31);
});

