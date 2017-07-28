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

hammerSwipe('.swipe-carousel');

$l = $('.carousel-showmanymoveone .item').length;
if ($l > 3) {
    var hammer = new Hammer(document.querySelector('#thumbcarousel'));
    var $carousel = $("#thumbcarousel").carousel({"interval": 0});
    hammer.get("swipe");

    hammer.on("swipeleft", function () {
        $carousel.carousel("next");
    });
    hammer.on("swiperight", function () {
        $carousel.carousel("prev");
    });
}
