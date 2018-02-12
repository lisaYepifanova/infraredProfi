function readURL(input, $image, $closeImg) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $($image).attr('src', e.target.result);
            $($closeImg).css('display', 'block');
        };

        reader.readAsDataURL(input.files[0]);
        console.log(input.files[0].size);
    } else {
        $($closeImg).css('display', 'none');
    }
}

$("#photo").change(function () {
    readURL(this, '#image', '.close-img');
});

$("#vision_img").change(function () {
    readURL(this, '#imagev', '.close-imgv');
});

$("#mission_img").change(function () {
    readURL(this, '#imagem', '.close-imgm');
});

$("#description_image").change(function () {
    readURL(this, '#imaged', '.close-imgd');
});

$("#comparison_infra_image").change(function () {
    readURL(this, '#imagecomparison_infra', '.close-imgm');
});

$("#comparison_convect_image").change(function () {
    readURL(this, '#imagecomparison_convect', '.close-imgm');
});

$("#convect_house_image").change(function () {
    readURL(this, '#imageconvect_house_image', '.close-imgm');
});

$("#infra_house_image").change(function () {
    readURL(this, '#imageinfra_house_image', '.close-imgm');
});

//fur handler
$("#service_bg_image").change(function () {
    readURL(this, '#imageservice_bg', '.close-imgm');
});

var $i;

for ($i = 1; $i <= 6; $i++) {
//service fur handler
    $("#service_image" + $i).change(function () {
        readURL(this, '#imageservice_' + $i, '.close-imgm');
    });

//angebot fur handler
    $("#service_ang" + $i).change(function () {
        readURL(this, '#imageang_' + $i, '.close-imgm');
    });
}

//fur handler ang bg
$("#service_angbg").change(function () {
    readURL(this, '#imageangbg', '.close-imgm');
});

//main
$("#sign_image").change(function () {
    readURL(this, '#imagesign_image', '.close-imgm');
});

$("#property_image").change(function () {
    readURL(this, '#imageproperty_image', '.close-imgm');
});

$("#gallery_bg_image").change(function () {
    readURL(this, '#imagegallery_bg', '.close-imgm');
});

//main carousel
for ($i = 1; $i <= 20; $i++) {
    $("#carousel_image_" + $i).change(function (x) {
        return function () {
            readURL(this, '#imagecarousel_image_' + x, '#close-carousel_image_' + x);
        }
    }($i));
}


//main prop
for ($i = 1; $i <= 10; $i++) {
    $("#prop_image_" + $i).change(function (x) {
        return function () {
            readURL(this, '#imageprop_image_' + x, '#close-prop_image_' + x);
        }
    }($i));
}


//main gallery
for ($i = 1; $i <= 30; $i++) {
    $("#gallery_item_" + $i).change(function (x) {
        return function () {
            readURL(this, '#imagegallery_item_' + x, '#close-gallery_item_' + x);
        }
    }($i));
}

//default
$("#logo_image").change(function () {
    readURL(this, '#imagelogo_image', '.close-logo-image');
});

$("#category_image_field").change(function () {
    readURL(this, '#category_image', '.close-category_image');
});

//edit product

$("#prod_main_image_field").change(function () {
    readURL(this, '#prod_main_image', '.close-prod_main_image');
});

//prod gallery

$("#prod_image_field-1").change(function () {
    readURL(this, '#prod_image-1', '.close-prod_image-1');
});


//edit bildmotive
//main gallery
for ($i = 1; $i <= 300; $i++) {
    $("#prod_image_field-" + $i).change(function (x) {
        return function () {
            readURL(this, '#prod_image-' + x, '.close-bild_image-' + x);
        }
    }($i));
}

