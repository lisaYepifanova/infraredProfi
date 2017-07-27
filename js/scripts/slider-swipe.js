var hammer = new Hammer(document.querySelector('.carousel'));
var $carousel = $(".carousel").carousel({"interval": 0});
hammer.get("swipe");
hammer.on("swipeleft", function () {
    $carousel.carousel("next");
});
hammer.on("swiperight", function () {
    $carousel.carousel("prev");
});




var hammer = new Hammer(document.querySelector('#thumbcarousel'));
var $carousel = $("#thumbcarousel").carousel({"interval": 0});
hammer.get("swipe");
hammer.on("swipeleft", function () {
    $carousel.carousel("next");
});
hammer.on("swiperight", function () {
    $carousel.carousel("prev");
});