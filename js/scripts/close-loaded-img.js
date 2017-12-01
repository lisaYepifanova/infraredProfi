function closeImg(input) {


}

$(".close-img").on('click', function () {
    $('#image').attr('src', '#');
    $('#photo').val('');
    $('.close-img').css('display', 'none');
});

$(".close-imgv").on('click', function () {
    $('#imagev').attr('src', '#');
    $('#vision_img').val('');
    $('.close-imgv').css('display', 'none');
});

$(".close-imgm").on('click', function () {
    $('#imagem').attr('src', '#');
    $('#mission_img').val('');
    $('.close-imgm').css('display', 'none');
});

//  technology //
$(".close-img-description").on('click', function () {
    $('#imaged').attr('src', '#');
    $('#description_image').val('');
    $('.close-img-description').css('display', 'none');
});

$(".close-img-comparison_infra").on('click', function () {
    $('#imagecomparison_infra').attr('src', '#');
    $('#comparison_infra_image').val('');
    $('.close-img-comparison_infra').css('display', 'none');
});

$(".close-img-comparison_convect").on('click', function () {
    $('#imagecomparison_convect').attr('src', '#');
    $('#comparison_convect_image').val('');
    $('.close-img-comparison_convect').css('display', 'none');
});

$(".close-img-infra_house_image").on('click', function () {
    $('#imageinfra_house_image').attr('src', '#');
    $('#infra_house_image').val('');
    $('.close-img-infra_house_image').css('display', 'none');
});

$(".close-img-convect_house_image").on('click', function () {
    $('#imageconvect_house_image').attr('src', '#');
    $('#convect_house_image').val('');
    $('.close-img-convect_house_image').css('display', 'none');
});

////

////fur handler

$(".close-img-service_bg").on('click', function () {
    $('#imageservice_bg').attr('src', '#');
    $('#service_bg_image').val('');
    $('.close-img-service_bg').css('display', 'none');
});

//service fur handler
var $i;
for ($i = 1; $i <= 6; $i++) {
    $(".close-img-service_" + $i).on('click', function () {
        $('#imageservice_' + $i).attr('src', '#');
        $('#service_image_' + $i).val('');
        $(".close-img-service_" + $i).css('display', 'none');
    });
}

//angebot
for ($i = 1; $i <= 3; $i++) {
    $(".close-img-ang_" + $i).on('click', function () {
        $('#imageang_' + $i).attr('src', '#');
        $('#service_ang_' + $i).val('');
        $(".close-img-ang_" + $i).css('display', 'none');
    });
}

$(".close-img-angbg").on('click', function () {
    $('#imageangbg').attr('src', '#');
    $('#service_angbg').val('');
    $('.close-img-angbg').css('display', 'none');
});


//main
$(".close-sign_image").on('click', function () {
    $('#imagesign_image').attr('src', '#');
    $('#sign_image').val('');
    $('.close-sign_image').css('display', 'none');
});

$(".close-property_image").on('click', function () {
    $('#imageproperty_image').attr('src', '#');
    $('#property_image').val('');
    $('.close-property_image').css('display', 'none');
});

$(".close-gallery_bg").on('click', function () {

    $('.close-gallery_bg').css('display', 'none');

    $('#gallery_bg_image').val('');
    $('#imagegallery_bg').attr('src', '#');
});

//main carousel

for (var i = 1; i <= 10; i++) {
    $("#close-carousel_image_" + i).on('click', function (x) {
        return function() {
            $('#imagecarousel_image_' + x).attr('src', '#');
            $('#carousel_image_' + x).val('');
            $("#close-carousel_image_" + x).css('display', 'none');
            console.log("clicked .close-carousel_image_" + x);
        }
    }(i));
}

//main properties
for (var i = 1; i <= 10; i++) {
    $("#close-prop_image_" + i).on('click', function (x) {
        return function() {
            $('#imageprop_image_' + x).attr('src', '#');
            $('#prop_image_' + x).val('');
            $("#close-prop_image_" + x).css('display', 'none');
        }
    }(i));
}

//main gallery
for (var i = 1; i <= 30; i++) {
    $("#close-gallery_item_" + i).on('click', function (x) {
        return function() {
            $('#imagegallery_item_' + x).attr('src', '#');
            $('#gallery_item_' + x).val('');
            $("#close-gallery_item_" + x).css('display', 'none');
        }
    }(i));
}

//default
$(".close-logo-image").on('click', function () {
    $('#imagelogo_image').attr('src', '#');
    $('#logo_image').val('');
    $('.close-logo-image').css('display', 'none');
});
