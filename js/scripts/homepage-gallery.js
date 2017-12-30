(function () {
    function homepageGalleryOnHover($current) {
        console.log("." + $current);
        $("." + $current).siblings().animate(
            {
                opacity: 0.6
            }, 500
        );
        $("." + $current).animate(
            {
                opacity: 1,
            }, 500
        )
/*
        $("." + $current + " .homepage-gallery-item-title").animate(
            {
                top: '20%'
            }, 500
        )
*/

    }

    $homepageGallery = ".homepage-products";
    $homepageGalleryItem = ".homepage-gallery-item-wrapper";


    $($homepageGalleryItem).on({
        mouseenter: function () {
            $curr = $(this).attr('class').split(" ");
            homepageGalleryOnHover($curr[1]);

        }
    });

    $($homepageGallery).on({
        mouseleave: function () {
            $('.homepage-products div').animate(
                {
                    opacity: 1
                }, 300
            )

        }
    });
}());
