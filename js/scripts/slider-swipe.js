function hammerSwipe($selector) {
    var hammer = new Hammer(document.querySelector($selector));
    var $carousel = $($selector).carousel({"interval": 5000});
    hammer.get("swipe");
    hammer.on("swipeleft", function () {
        $carousel.carousel("next");
    });
    hammer.on("swiperight", function () {
        $carousel.carousel("prev");
    });
}

if ($('.swipe-carousel').length !== 0) {
    hammerSwipe('.swipe-carousel');
}

if ($('#homepageGalleryCarousel').length !== 0) {
    var hammer = new Hammer(document.querySelector('#homepageGalleryCarousel'));
    var $car = $("#homepageGalleryCarousel").carousel({"pause":true,"interval":false});
    hammer.get("swipe");

    hammer.on("swipeleft", function () {
        $car.carousel("next");
    });
    hammer.on("swiperight", function () {
        $car.carousel("prev");
    });
}

if ($('#bildGalleryCarousel').length !== 0) {
    var hammer = new Hammer(document.querySelector('#bildGalleryCarousel'));
    var $car = $("#bildGalleryCarousel").carousel({"pause":true,"interval":false});
    hammer.get("swipe");

    hammer.on("swipeleft", function () {
        $car.carousel("next");
    });
    hammer.on("swiperight", function () {
        $car.carousel("prev");
    });
}

$l = $('.carousel-showmanymoveone .item').length;
if($('#product-carousel').length !== 0) {
    if ($l > 3) {
        var hammer = new Hammer(document.querySelector('#product-carousel'));
        var $carousel = $("#product-carousel").carousel({"interval": 0});
        hammer.get("swipe");

        hammer.on("swipeleft", function () {
            $carousel.carousel("next");
        });
        hammer.on("swiperight", function () {
            $carousel.carousel("prev");
        });
    }
}
/*
if ($('#thumbcarousel').length !== 0) {
    var hammer = new Hammer(document.querySelector('#thumbcarousel'));
    var $car = $("#thumbcarousel").carousel({"pause":true,"interval":false});
    hammer.get("swipe");

    hammer.on("swipeleft", function () {
        $car.carousel("next");
    });
    hammer.on("swiperight", function () {
        $car.carousel("prev");
    });
}*/