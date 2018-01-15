$l = $('.carousel-showmanymoveone .item').length;


$('#product-carousel').carousel({
    interval: 4000
});

if ($l < 4) {
    $('#product-carousel').carousel({interval: false});
}

$('.carousel-showmanymoveone .item').each(function () {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));


    if (next.next().length > 0) {
        next.next().children(':first-child').clone().appendTo($(this));
    }
    else if ($l > 2) {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});
;$(function () {

CKEDITOR.replaceAll( 'editor-area', {
    filebrowserBrowseUrl: '/browser/browse.php',
    filebrowserUploadUrl: '/uploader/upload.php'
} );

});
;$('.item-wrapper a').each(function () {
    $linkClass = $(this).attr('class').split(' ');
    $lastLinkClass = $linkClass[$linkClass.length - 1];

    $(this).on('click', function () {
        $('.image-nav-menu .large-item').removeClass('active');

        $linkClass = $(this).attr('class').split(' ');
        $lastLinkClass = $linkClass[$linkClass.length - 1];

        $('.homepage-gallery-carousel .item').each(function () {
            if ($(this).children('.' + $lastLinkClass).length !== 0) {
                $('.homepage-gallery-carousel .item').removeClass('active');
                $(this).addClass('active');
            }
        });
        $('.image-nav-menu .item.' + $lastLinkClass).addClass('active');
    });
});
;(function($) {
setTimeout(function () {

        $('tr').find('td .add-another-button').on('click', function () {
            $elem = $(this).parent().parent().clone();
            $elem.find('.add-another-button').remove();
            $currid = $elem.find('.count').attr('id');

            console.log($currid);

            $currclass = $elem.find('.count').attr('class').split(' ')[1];

            $parentClass = $(this).parent().parent().parent().attr('class');

            $numOfCurrElem = $('.'+$currclass).length;


            $elemId = $elem.find('.count').attr('id');
            $elemId = $elemId.substring(0, $elemId.length - 3);
            $elem.find('.count').attr('id', $elemId + '[' + $numOfCurrElem + ']');

            $elemClass = $elem.find('.count').attr('class');
            $elemClass = $elemClass.substring(0, $elemClass.length - 3);
            $elem.find('.count').attr('class', $elemClass + '[' + $numOfCurrElem + ']');

            $elemName = $elem.find('.count').attr('name');
            $elemName = $elemName.substring(0, $elemName.length - 3);
            $elem.find('.count').attr('name', $elemName + '[' + $numOfCurrElem + ']');



            $tId = $elem.find('.has-thermostat').attr('id');
            $tId = $tId.substring(0, $tId.length - 3);
            $elem.find('.has-thermostat').attr('id', $tId + '[' + $numOfCurrElem + ']');

            $tName = $elem.find('.has-thermostat').attr('name');
            $tName = $tName.substring(0, $tName.length - 3);
            $elem.find('.has-thermostat').attr('name', $tName + '[' + $numOfCurrElem + ']');




            $elem.insertAfter($(this).parent().parent());
           // orderCount();

        });

}, 100);

})(jQuery);;(function ($) {
    function addAngebotField($id, $btn) {
        $new_field = '<div class="property-item property-item' + $id + '"> \
              <div class="property-item-image"></div> \
              <div> \
                <img id="imageang' + $id + '" \
                     src="" \
                     alt=""/> \
                <a href="#" class="close-img-ang_' + $id + '"> \
                  <button type="button">Reset</button> \
                </a> \
              </div> \
              <input type="file" class="form-control" id="service_ang' + $id + '" \
                     name="ang_image' + $id +'"> \
              <span class="help-block"> Max filesize is 400Kb</span> \
              <h4 class="property-item-title"><textarea class="bg-field full-textarea" name="item-title_' + $id + '"></textarea></h4> \
              <p class="property-item-description"><textarea class="bg-field full-textarea" name="item-desc_' + $id + '"></textarea></p> \
              </div>';

        $($btn).prev().after($new_field);

            $("#prop_image_" + $id).change(function (x) {
        return function () {
            readURL(this, '#imageprop_image_' + x, '#close-prop_image_' + x);
        }
    }($id));

    }

    $('.add-new-angebot-button').on('click', function () {
        $id = $('#max_id_angebot').val();
        addAngebotField(parseInt($id) + 1, this);
    });
})(jQuery);
;(function ($) {
    function addCarouselItemField($id, $btn) {
        $new_field = '<div class="item-edit"> \
        <div class="carousel-img-ed carousel-image-edit' + $id + '"> \
          <div class="prev-image"> \
            <img id="imagecarousel_image_' + $id + '" \
                 src="" \
                 alt=""/> \
            <div id="close-carousel_image_' + $id + '"> \
              <button type="button">Reset</button> \
            </div> \
          </div> \
          <input type="file" class="form-control" \
                 id="carousel_image_' + $id + '" \
                 name="carousel_image[carousel_image_' + $id + ']" \
          > \
          <span class="help-block"> Max filesize is 2mb</span> \
          <input type="hidden" \
                 name="carousel_image[carousel_image_' + $id + ']" \
                 value="' + $id + '"> \
          </div> </div>';

        $($btn).prev().after($new_field);

         $("#carousel_image_" + $id).change(function (x) {
        return function () {
            readURL(this, '#imagecarousel_image_' + x, '#close-carousel_image_' + x);
        }
    }($id));
    }

    $('.add-new-carousel-item').on('click', function () {
        $id = $('#max_carousel_id').val();
        addCarouselItemField(parseInt($id) + 1, this);
    });
})(jQuery);
;(function ($) {
    function addQuestionField($index) {
        $new_field = '<div class="faq-item panel box-mid-margin panel-default"> \
                    <h4 class="faq-item-title collapsed" \
                    data-parent="#accordion" \
                    data-toggle="collapse" \
                    data-target="#answer-' + $index + '" \
                    aria-expanded="false">\
                    <span class="glyphicon glyphicon-chevron-down arrow-down"> \
                     </span> \
                    <input type="text" placeholder="Question"\
                              name="question_' + $index + '" \
                              class="full-textarea"></h4> \
                    <div  role="definition" id="answer-' + $index + '" \
                    class="faq-item-answer panel-collapse collapse " \
                    aria-expanded="false" \
                    style="height: 0px;"><textarea\
                        class="editor-area full-textarea answer_' + $index + '" \
                        name="answer_' + $index + '" \
                       ></textarea> \
                       <input type="hidden" name="id_' +$index +'"  value="' + $index + '"> \
                        </div> \
                        <a class="glyphicon glyphicon-trash delete-faq-item">Delete</a> \
                       </div> \
                  </div>';


        $('.faq-item').last().after($new_field);
         CKEDITOR.replaceAll( 'answer_' + $index );
    }

    $('.add-new-question-button').on('click', function () {
        $lastId = $('.faq-item .faq-item-answer').last().attr('id');

        $split = $lastId.split('-');
        $index = $split[$split.length - 1];

        addQuestionField(parseInt($index) + 1);
    });


})(jQuery);
;(function ($) {
    function addFileField($j, $btn, $cid) {
        $new_field = '<div class="doc-item box-mid-margin doc-item-' + $j + '"> \
              <label for="name_' + $j + '">Name:</label> \
             <input type="text" id="name_' + $j + '" \
                    name="doc[' + $j + '][name]"  class="full-textarea"> \
              <label for="file_' + $j + '">File:</label> \
             <input type="file" id="file_' + $j + '" \
                    name="doc[' + $j + ']" class="full-textarea"> \
              <input type="hidden" name="doc[' + $j + '][cid]" value="' + $cid + '">  \
              </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-document').on('click', function () {
        $id = $('#max_id').val();

        $catId = $(this).attr('class');

        $split = $catId.split(' ');
        $lastClass = $split[$split.length - 1];

        $splitClass = $lastClass.split('-');
        $cid = $splitClass[$splitClass.length - 1];

        addFileField(parseInt($id) + 1, this, $cid);
    });


})(jQuery);
;(function ($) {
    function addGalleryItemField($id, $btn) {
        $new_field = '<div class="item-wrapper-edit "> \
            <div class=""> \
              <img id="imagegallery_item_' + $id + '" \
                   src="" \
                   alt=""/> \
              <div id="close-gallery_item_' + $id + '"> \
                <button type="button">Reset</button> \
              </div> \
            </div> \
            <input type="file" class="form-control" \
                   id="gallery_item_' + $id + '" \
                   name="gallery[item_' + $id + ']"> \
            <span class="help-block"> Max filesize is 2mb</span> \
            <input type="hidden" name="gallery[item_' + $id + ']" value="' + $id + '"> \
            <div class="gallery-image-title"> \
            <label for="is-on-main-gallery-' + $id + '">Image title</label> \
            <input type="text" id="is-on-main-gallery-' + $id + '" name="img-title-main-gallery[item_' + $id + ']"> \
            </div> \
            <div class="is-on-main-item"> \
            <input type="checkbox" id="is-on-main-gallery-' + $id + '" name="is-on-main-gallery[item_' + $id + ']" > \
            <label for="is-on-main-gallery-' + $id + '">Is main image</label> \
            </div></div>';

        $($btn).prev().after($new_field);

         $("#gallery_item_" + $id).change(function (x) {
        return function () {
            readURL(this, '#imagegallery_item_' + x, '#close-gallery_item_' + x);
        }
    }($id));
    }

    $('.add-new-gallery-item').on('click', function () {
        $id = $('#max_gallery_id').val();
        addGalleryItemField(parseInt($id) + 1, this);
    });
})(jQuery);
;(function ($) {
    function addPropField($id, $btn) {
        $new_field = '<div class="property-item property-item_' + $id + '"> \
              <div class="property-item-image" style=""></div> \
            <div class="">\
              <img id="imageprop_image_' + $id + '" \
                   src="/" \
                   alt=""/> \
              <div id="close-prop_image_' + $id + '"> \
                <button type="button">Reset</button> \
              </div> \
            </div> \
            <input type="file" class="form-control" \
                   id="prop_image_' + $id + '" \
                   name="property[' + $id + '][image]" \
            > \
            <span class="help-block"> Max filesize is 400Kb</span> \
            <input type="hidden" \
                   name="property[' + $id + '][id]" \
                   value="' + $id + '"> \
            <h4 class="property-item-title"> \
              <input type="text" class="full-textarea" name="property[' + $id + '][title]" value=""> \
              </h4> \
              <p class="property-item-description"> \
              <textarea class="editor-area full-textarea" name="property[' + $id + '][description]"> \
              </textarea></p> \
              </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-prop').on('click', function () {
        $id = $('#max_prop_id').val();
        addPropField(parseInt($id) + 1, this);
    });
})(jQuery);
;(function ($) {
    function addMenuItemField($id, $btn) {
        $new_field = '<div class="modal-menu-item box-small-mb"> \
            <label for="menu-item-title-'+$id+'">Link title:</label> \
            <input type="text" id="menu-item-title-' + $id + '" class="" name="modal_menu[' +$id + '][title]" value="">\
            <label for="menu-item-path-'+$id+'">Link path:</label> \
            <input type="text" id="menu-item-path-' + $id + '"  name="modal_menu[' + $id + '][link]" value=""> \
            <input type="hidden" name="modal_menu[' + $id +'][id]"  value="' + $id +'">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-menu-item').on('click', function () {
        $id = $('#max_id_menu').val();
        addMenuItemField(parseInt($id) + 1, this);
    });
})(jQuery);
;(function ($) {
    function addPhoneField($id, $btn) {
        $new_field = '<div class="phone-item box-small-mb"> \
            <label for="phone-title-'+$id+'">Text:</label> \
            <input type="text" id="phone-title-'+$id+'" name="phones['+$id+'][text]" value=""> \
            <label for="phone-num-'+$id+'">Phone:</label> \
            <input type="text" id="phone-num-'+$id+'"  name="phones['+$id+'][tel]" value=""> \
            <input type="hidden" name="phones[' + $id +'][id]"  value="' + $id +'">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-phone').on('click', function () {
        $id = $('#max_id_phone').val();
        addPhoneField(parseInt($id) + 1, this);
    });
})(jQuery);
;(function ($) {
    function addServiceLinkField($id, $btn) {
        $new_field = '<div class="service-link-item box-small-mb"> \
            <label for="link-title-'+$id+'">Link title:</label> \
            <input type="text" id="link-title-'+$id+'" class="box-small-mb" name="footer_service_links['+$id+'][title]" value=""> \
            <label for="link-path-'+$id+'">Link path:</label> \
            <input type="text" id="link-path-'+$id+'"  name="footer_service_links['+$id+'][link]" value=""> \
            <input type="hidden" name="footer_service_links['+$id+'][id]"  value="' + $id +'">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-service-link').on('click', function () {
        $id = $('#max_id').val();
        addServiceLinkField(parseInt($id) + 1, this);
        $('#max_id').val($id+1);
    });

    ///////

        function addLinkField($id, $btn) {
        $new_field = '<div class="service-link-item box-mid-margin"> \
            <label for="link-title-'+ $id +'">Link title:</label> \
            <input type="text" id="link-title-' + $id + '" class="" name="footer_links[' + $id + '][title]" > \
            <label for="link-path-' + $id + '">Link path:</label> \
            <input type="text" id="link-path-' + $id + '"  name="footer_links[' + $id + '][link]" > \
            <input type="hidden" name="footer_links[' + $id + '][id]"  value="' + $id + '"> \
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-link').on('click', function () {
        $id = $('#max_link_id').val();
        addLinkField(parseInt($id) + 1, this);
        $('#max_link_id').val($id+1);
    });

            ///////

        function addHeaderLinkField($id, $btn) {
        $new_field = '<div class="header-link-item box-mid-margin"> \
            <label for="header-link-title-' + $id + '">Link title:</label> \
            <input type="text" id="header-link-title-' + $id + '" class="" name="header_links[' + $id + '][title]"> \
            <label for="header-link-path-'+$id+'">Link path:</label> \
            <input type="text" id="header-link-path-' + $id + '"  name="header_links[' + $id + '][link]"> \
            <input type="hidden" name="header_links[' + $id + '][id]"  value="' + $id + '">\
          </div>';

        $($btn).prev().after($new_field);
    }

    $('.add-new-header-link').on('click', function () {
        $id = $('#max_header_link_id').val();
        addHeaderLinkField(parseInt($id) + 1, this);
        $('#max_header_link_id').val($id+1);
    });
})(jQuery);
;(function () {
    function disableSubmit(login, pass, pass_r) {
        if (login.length !== 0 && pass.length >= 8 && pass_r.length >= 8 && pass == pass_r) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
            console.log('attr added');

        }
    }

    function checkParams($elem) {
        var login = $('#login').val();
        var pass = $('#pass').val();
        var pass_r = $('#pass_r').val();

        if ($($elem).val().length !== 0 || (($elem == '#pass' || $elem == '#pass_r') && $($elem).val().length >= 8)) {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'none');
            $($elem).removeClass('red-field');
        } else {
            $('.' + ($($elem).parent().attr('class')) + ' ~ .error-block').css('display', 'block');
            $($elem).addClass('red-field');
        }

        disableSubmit(login, pass, pass_r);

    }

    function errorField($elem) {
        if ($($elem).val().length === 0) {
            $('.' + ($($elem).parent().attr('class')) + '  .error-block').css('display', 'block');
            $($elem).addClass('red-field');
        } else {
            $('.' + ($($elem).parent().attr('class')) + ' .error-block').css('display', 'none');
            $($elem).removeClass('red-field');
        }
    }

    function checkLogin($elem) {
        var element = $elem.val();


        if (element.length !== 0) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');

        }

        errorField($elem);
    }

    if ($('.handler-adding-form').length > 0) {
        disableSubmit($('.handler-adding-form #login').val(), $('.handler-adding-form #pass').val());

        $('.handler-adding-form #login').on('blur', function () {
            checkParams('.handler-adding-form #login');
        });

        $('.handler-adding-form #pass').on('blur', function () {
            checkParams('#pass');
        });

        $('.handler-adding-form #pass_r').on('blur', function () {
            checkParams('.handler-adding-form #pass_r');
        });
    }


    if ($('.handler-editing-form').length > 0) {
        $('.handler-editing-form #login').on('blur', function () {
            checkLogin('.handler-editing-form #login');
        });

        $('.handler-editing-form #pass_r').on('blur', function () {
            errorField('.handler-editing-form #pass_r');
        });

        $('.handler-editing-form #pass').on('blur', function () {
            errorField('.handler-editing-form #pass');
        });
    }



    $('#pass_r').attr('disabled', true);
    $('#pass').on('input', function () {
            if($('#pass').val().length < 8) {
        $('#pass_r').attr('disabled', true);
    } else {
        $('#pass_r').attr('disabled', false);
    }
        });




}());
;$('#homepageCarousel').carousel({
 interval: 5000,
 });;$('#imageNavMenu .close').on('click', function () {
    $("#imageNavMenu").modal('hide');
});

function closeModal($modal, $dialog) {
    $(document).mouseup(function (e) { // событие клика по веб-документу
    var div = $($dialog); // тут указываем ID элемента
    var mod = $($modal); // тут указываем ID элемента

    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        mod.modal('hide');
    }
});
}

closeModal('#imageNavMenu', '#imageNavMenu .modal-dialog');
closeModal('.delete-item-modal', '.delete-item-modal .modal-dialog .modal-content');
;function closeImg(input) {


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
;(function () {

    var contactCol = ".contacts .contact-item-wrapper";
    var contactItem = ".contacts .contact-item";

    function itemSize(ind) {
        var itemWidth = parseInt($(contactCol).css("width"));
        var contactPaddingL = parseInt($(contactCol).css('padding-left'));
        var contactPaddingR = parseInt($(contactCol).css('padding-right'));

        return ( itemWidth - contactPaddingL - contactPaddingR) * ind + "px"
    }

    function setItemSize(ind) {
        $(contactItem).css('width', itemSize(ind));
        $(contactItem).css('height', itemSize(ind));
    }

    function contactItemResize() {

        $(contactCol).css('width', itemSize(0.9));
        $(contactCol).css('height', itemSize(0.9));
        $(contactCol).css('padding-left', '1rem');
        $(contactCol).css('padding-right', '1rem');

        setItemSize(0.9);

        if ($(window).width() < 390) {
            $(contactCol).css('width', '100%');

            $(contactCol).css('height', itemSize(1));
            setItemSize(1);
        }

        if ($(window).width() > 389 && $(window).width() < 721) {
            $(contactCol).css('width', '50%');
            $(contactCol).css('height', itemSize(1));
            setItemSize(1);
        }

        if ($(window).width() > 479 && $(window).width() < 560) {
            /*$(contactCol).css('width', '24%');
            $(contactCol).css('height', itemSize(1));
            setItemSize(1);*/
        }

        if ($(window).width() > 720) {
            $(contactCol).css('width', '25%');
            $(contactCol).css('height', itemSize(1));
            setItemSize(1);
        }
    }

    contactItemResize();

    $(window).resize(function () {
        contactItemResize()
    });

}());;(function ($) {
    $('.delete-angebot-item').on('click', function() {
        $classes = $(this).attr('class');
        $classes_arr = $classes.split(' ');

        $itemClass = $classes_arr[3];

        $split = $itemClass.split('-');
        $index = $split[$split.length - 1];

        $(".title-"+$index).remove();
        $("#answer-"+$index).remove();
    });
})(jQuery);;(function ($) {
    $('.delete-file-item').on('click', function() {
        $classes = $(this).attr('class');
        $classes_arr = $classes.split(' ');

        $itemClass = $classes_arr[3];

        $split = $itemClass.split('-');
        $index = $split[$split.length - 1];

        $(".title-"+$index).remove();
        $("#answer-"+$index).remove();
    });
})(jQuery);;(function ($) {
    $('.delete-faq-item').on('click', function() {
        $classes = $(this).attr('class');
        $classes_arr = $classes.split(' ');

        $itemClass = $classes_arr[3];

        $split = $itemClass.split('-');
        $index = $split[$split.length - 1];

        $(".title-"+$index).remove();
        $("#answer-"+$index).remove();
    });
})(jQuery);;(function () {

    function checkPass(pass, passr) {
        if ($(pass).val().length >= 8) {
            $('#pass + .green-tick-icon').css('display', 'block');
        } else {
            $('#pass + .green-tick-icon').css('display', 'none');
        }

        if (($(pass).val() !== '' && $(passr).val() !== '') && $(pass).val() == $(passr).val()) {
            $('#pass_r + .green-tick-icon').css('display', 'block');
        } else {
            $('#pass_r + .green-tick-icon').css('display', 'none');
        }

    }

    if ($('#pass').length > 0) {
        $('#pass').on('blur', function () {
            checkPass($('#pass'), $('#pass_r'))
        });
    }


    if ($('#pass_r').length > 0) {
        $('#pass_r').on('blur', function () {
            checkPass($('#pass'), $('#pass_r'))
        });
    }


}());
;(function () {
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
;$(function () {
    var includes = $('[data-include]');
    jQuery.each(includes, function () {
        var file = 'views/' + $(this).data('include') + '.html';
        $(this).load(file);
    });
});;/*
function findLongestWord(str) {
  var longestWord = str.split(' ').sort(function(a, b) { return b.length - a.length; });
  return longestWord[0].length;
}

$lWord = findLongestWord("The quick brown fox jumped over the lazy dog");

function onTextChange($fsize, $len) {
    var textLength = $($lWord).text().length;
    var fontSize = Math.min($fsize, ($len / textLength) * $fsize);
    $($lWord).css('font-size', fontSize + 'px');
}

onTextChange(12, 1000);
    */;(function () {
    function changeMainHeight() {
         $('.download-page').css('minHeight', 'unset');
         $('.faq-content-wrapper').css('minHeight', 'unset');
        $contactH = parseInt($('.contacts').css('height')) + parseInt($('.contacts').css('margin-top')) + parseInt($('.contacts').css('margin-bottom'));
        $footerH = parseInt($('footer').css('height'));
        $headerMargin = parseInt($('.page-header').css('margin-top'));
        $winH = parseInt($(document).height());

        $mainHeight = $winH - $headerMargin - $footerH - $contactH + 5;
        $mainHeight += 'px';


        $('.download-page').css('minHeight', $mainHeight);
        $fHeight = parseInt($mainHeight) - parseInt($('.page-header').css('height')) - parseInt($('.page-header').css('margin-bottom'));
        $('.faq-content-wrapper').css('minHeight', $fHeight);

    }

    changeMainHeight();
    $(window).resize(function () {
        if (parseInt($(window).width()) > 768) {
            changeMainHeight();
        }
    });
}());
;$('.left-panel').on('mouseenter', function(){
    //$('#asideNavMenu').modal('show');
});

$('.aside-modal-dialog').on('mouseleave', function(){
    //$('#asideNavMenu').modal('hide');
});
;if ($("div").is(".registration-form-sent")) {
    var container = $('html, body'),
        scrollTo = $('.registration-form-sent');

    $(window).load(function () {
        container.stop().animate({
            scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
        }, 2000, "easeOutCirc");
    });

}


;$('.modal-bg').foggy({
   blurRadius: 2,          // In pixels.
   opacity: 0.8,           // Falls back to a filter for IE.
   cssFilterSupport: true  // Use "-webkit-filter" where available.
 });;(function ($) {
    setTimeout(function () {
        orderCount();
    }, 1000);
})(jQuery);

function orderCount() {
    $('.num-of-items-wrapper').on('click', '.num-of-items-min', function () {


        $new_val = parseInt($(this).parent().find('.count').val()) - 1;

        console.log($(this).attr('id'));

        if ($new_val >= 0) {
            $(this).parent().find('.count').val($new_val);
        }
    });

    $('.num-of-items-wrapper').on('click', '.num-of-items-max', function () {
        $new_val = parseInt($(this).parent().find('.count').val()) + 1;
        $(this).parent().find('.count').val($new_val);
    });
}

function numOfItemsValid(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}


;(function () {
    function smoothAppearance($mainRegion, $target, $startPos, $speed) {
        $($target).css('opacity', '0');
        if (document.getElementById($mainRegion) !== null) {
            var target = $($target);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            var scrollToElem = targetPos - winHeight + $(window).height() * $startPos;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {
                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    var ind = (winScrollTop - scrollToElem) / ($(window).height() * $startPos);

                    if (ind <= 1 && ind > $($target).css('opacity')) {
                        $($target).css('opacity', ind);
                    } else {
                        $($target).animate({
                            opacity: '1'
                        }, $speed, 'easeInCubic');
                    }
                }


            });

            if (winScrollTop > scrollToElem + $(window).height() * $startPos) {
                $($target).animate({
                    opacity: '1'
                }, $speed, 'easeInCubic');
            }
        }
    }

    function simpleSmooth($target, $speed) {
        if (document.getElementsByClassName($target) !== null) {
            $($target).css('opacity', '0');
            $($target).animate({
                opacity: '1'
            }, $speed, 'easeInCubic');
        }


    }

    $mainRegion = 'main-page';
    $target = "#main-page  .philosophy";
    $startPos = 0.3;
    $speed = 2000;

    smoothAppearance($mainRegion, $target, $startPos, $speed);

    $target = "#main-page  .homepage-header-title-wrapper";
    simpleSmooth($target, 2000);

    smoothAppearance('contactBlock', '#contactBlock .row', $startPos, 1000);

    //fur-handler

    $target = "#fur-handler-page  .registration-top-block";
    simpleSmooth($target, 2000);

    simpleSmooth('#fur-handler-page h3:nth-child(2)', 2000);

    smoothAppearance('fur-handler-page', '#fur-handler-page .registration-description', $startPos, $speed);
    smoothAppearance('fur-handler-page', '#fur-handler-page .right-side-wrapper', $startPos, 2000);

    //tech
    simpleSmooth('.technology-description', 2000);

    smoothAppearance('technologyPage', '#technologyPage .description-img-wrapper', $startPos, 2000);
    smoothAppearance('technologyPage', '#technologyPage .description-scheme-title', $startPos, 2000);


    if ($(window).width() < 768) {
        smoothAppearance('technologyPage', '.comparison-title-left', $startPos, 2000);
        smoothAppearance('technologyPage', '.left-img-comparison-row .comparison-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.left-img-comparison-row .comparison-text-wrapper', $startPos, 2000);

        smoothAppearance('technologyPage', '.comparison-title-right', $startPos, 2000);
        smoothAppearance('technologyPage', '.right-img-comparison-row .comparison-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.right-img-comparison-row .comparison-text-wrapper', $startPos, 2000);

        smoothAppearance('technologyPage', '.convect-house-title', $startPos, 2000);
        smoothAppearance('technologyPage', '.convect-house-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.convect-house-description', $startPos, 2000);

        smoothAppearance('technologyPage', '.infra-house-title', $startPos, 2000);
        smoothAppearance('technologyPage', '.infra-house-img', $startPos, 2000);
        smoothAppearance('technologyPage', '.infra-house-description', $startPos, 2000);
    }

    simpleSmooth('.contacts-info-wrapper', 2000);

}());;// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
;$('#product-carousel').carousel({
    //interval: 4000,
    //pause: "hover"
});


$('#homepageGalleryCarousel').carousel({
    pause: true,
    interval: false
});

$('.homepage-gallery-carousel').carousel({
    pause: true,
    interval: false
});


if ($('.item.active .thumb').length > 2) {
    $('.item .thumb:nth-child(2)').css('transform', 'scale(1.85)');
    $('.item .thumb:nth-child(2)').css('z-index', '999');
    $('.item .thumb:nth-child(2)').css('position', 'relative');
    $('.item .thumb:nth-child(2)').css('box-shadow', 'rgb(251, 251, 251) 0px 0px 20px 9px');
    $('.item .thumb:nth-child(2)').css('border', '1px solid #dcdcdc52');
} else {
    $('.item .thumb').css('transform', 'scale(1)');
    $('.item .thumb').css('z-index', '1');
    $('.item .thumb:nth-child(2)').css('box-shadow', '0');
    $('.item .thumb:nth-child(2)').css('border', '0');
}


$('#product-carousel').on('slide.bs.carousel', function () {
    $('.item .thumb').css('transform', 'scale(1)');
    $('.item .thumb').css('z-index', '1');
     $('.item .thumb:nth-child(2)').css('box-shadow', '0');
     $('.item .thumb:nth-child(2)').css('border', '0');
});


$('#product-carousel').on('slid.bs.carousel', function () {
    if ($('.item.active .thumb').length > 2) {
        $('.item .thumb:nth-child(2)').css('transform', 'scale(1.85)');
        $('.item .thumb:nth-child(2)').css('z-index', '999');
        $('.item .thumb:nth-child(2)').css('position', 'relative');
        $('.item .thumb:nth-child(2)').css('box-shadow', 'rgb(251, 251, 251) 0px 0px 20px 9px');
        $('.item .thumb:nth-child(2)').css('border', '1px solid #dcdcdc52');
    } else {
        $('.item .thumb').css('transform', 'scale(1)');
        $('.item .thumb').css('z-index', '1');
         $('.item .thumb:nth-child(2)').css('box-shadow', '0');
         $('.item .thumb:nth-child(2)').css('border', '0');
    }

});
;$(function () {

    function recalcPosition($topPos) {
        $top = $(document).scrollTop(); //scrolled pixels from top
        $pip = $('.contacts').offset().top; //pixels from the contacts to the top
        $mtop = $('.contacts').css('margin-top');
        $height = $('.product-menu').outerHeight(); //height of the menu
        $pip = $pip - parseInt($mtop) * 2;
        if ($top > $topPos && $top < $pip - $height) {
            $('.product-menu').addClass('fixed').removeAttr("style").css({'position': 'fixed'});
        }
        else if ($top > $pip - $height) {
            $('.product-menu').removeClass('fixed').css({'position': 'absolute', 'bottom': '16px'});
        }
        else {
            $('.product-menu').removeClass('fixed').removeAttr("style").css({'position': 'fixed'});
        }
    }

    function productMenuScroll() {
        $topPos = $('.product-menu').offset().top; //pixels from the menu to the top

        //$rightHeight = $('.product-main').css('height');

        //$menuHeight = $('.product').css('height');
        $pip = $('.contacts').offset().top;
        $menuHeight = parseInt($(document).height()) - parseInt($pip);


        $('.product-menu-wrapper').css('height', $menuHeight);
        //recalcPosition($topPos);
        $(window).scroll(function () {
            //recalcPosition($topPos);
        });
    }

    function setMenuWidth() {
        $menuMaxWidth = (parseInt($(document).width()) - parseInt($('.container').width())) / 2 - 20 - $('.navbar-right-panel').width();
        $('.product-menu').css('maxWidth', $menuMaxWidth + 'px');
        $menuWidth = parseInt($('.product-menu').css('width'));
        $margin = ($menuMaxWidth - $menuWidth) / 2;
        if (parseInt($(document).width()) > 1200) {
            $('.product-menu').css('margin-left', $margin + 'px');
            $('.product-menu').css('margin-right', $margin + 'px');
        }

    }

    window.onload = function () {
        if ($('.product-menu-wrapper').length !== 0) {
            productMenuScroll();
            setMenuWidth();

            $(window).scroll(function () {
                //$menuHeight = $('.product').css('height');
                //$('.product-menu-wrapper').css('height', $menuHeight);

                setMenuWidth();
            });

            $(window).resize(function () {
                //$menuHeight = $('.product').css('height');
               // $('.product-menu-wrapper').css('height', $menuHeight);

                setMenuWidth();
            });

        }

    }
});
;$(document).ready(function () {
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

;(function () {
    $textWrapper = '.product-full-description-wrapper';
    $textBlock = '.product-full-description-wrapper';
    $productArrow = '.product-full-description-wrapper .arrow-down';
    $container = $('html, body');

    if ( parseInt($('.product-full-description').css('height')) > "200"  ) {
        $($productArrow).on('click', function () {


            if ($($textWrapper).prop('scrollHeight') > $($textWrapper).height()) {
                $maxH = parseInt($($textWrapper).prop('scrollHeight')) + 50;
                $($textWrapper).animate({maxHeight: $maxH + 'px'}, 1200);
                $($productArrow).css('position', 'relative');
                $($productArrow).css('padding', '0');
                $($productArrow).css('transform', 'scaleY(-1)');

            } else {
                $($textWrapper).animate({maxHeight: '200px'}, 1200);
                $($productArrow).css('position', 'absolute');
                $($productArrow).css('padding', '1rem');
                $($productArrow).css('transform', 'scaleY(1)');

                $('html, body').animate({scrollTop: $('.product-description').offset().top}, 1200);
            }
        });
    } else {
        $($productArrow).css('display', 'none');
    }
}());
;(function () {
    function appearanceFromSides($mainReg, $itemsBlock, $itemsTitle, $itemReg, $leftPropertySide) {

        if (document.getElementById($mainReg) !== null) {
            var target = $($itemsBlock);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            //items properties at the start
            $($itemsTitle).css('margin-left', '50%');
            $($itemsTitle).css('opacity', '0');
            $($itemReg).css('margin-left', '50%');
            $($itemReg).css('opacity', '0');

            //left side properties at the start
            $($leftPropertySide).css('margin-left', '-50%');
            $($leftPropertySide).css('opacity', '0');


            var scrollToElem = targetPos - winHeight + $(window).height() / 4;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {
                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    $($itemsTitle).animate({
                        marginLeft: '0',
                        opacity: '1'

                    }, 1000, 'easeOutCirc');

                    $($leftPropertySide).animate({
                        marginLeft: '0',
                        opacity: '1'

                    }, 1000, 'easeOutCirc');


                    for (var i = 1; i < $($itemReg).length + 1; i++) {

                        var itemH = $($itemReg + i).height();
                        var itemTop = $($itemReg + i).offset().top;
                        var scrollToItem = itemTop - winHeight + itemH / 3;
                        if (winScrollTop > scrollToItem) {
                            $($itemReg + i).delay(200 * i).animate({
                                marginLeft: '0',
                                opacity: '1'

                            }, 1000, 'easeOutCirc');
                        }
                    }
                }


            });
             if (winScrollTop > scrollToElem + $(window).height() * 0.3) {
                    for (var i = 1; i < $($itemReg).length + 1; i++) {
                        $($itemReg + i).delay(200 * i).animate({
                            marginLeft: '0',
                            opacity: '1'
                        }, 1000, 'easeOutCirc');
                    }
                }
        }
    }
    $mainReg = 'main-page';
    $itemsBlock = '#main-page  .homepage-properties ';
    $itemsTitle = "#main-page  .property-title";
    $itemReg = "#main-page .property-item";
    $leftPropertySide = "#main-page .properties-side .left-side-bg";
    appearanceFromSides($mainReg, $itemsBlock, $itemsTitle, $itemReg, $leftPropertySide);

    $mainReg = 'fur-handler-page';
    $itemsBlock = '#fur-handler-page  .registration-properties ';
    $itemsTitle = "#fur-handler-page  .property-title";
    $itemReg = "#fur-handler-page .property-item";
    $leftPropertySide = "#fur-handler-page .properties-side .left-side-bg";
    appearanceFromSides($mainReg, $itemsBlock, $itemsTitle, $itemReg, $leftPropertySide);

}());;function arrowsFaqRotation($accTitle) {
    $($accTitle).on('click', function () {
        $open_height = $('.price-list-content').height() + 20;
        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($accTitle).each(function () {
                $(this).removeClass('opened');
                $(this).addClass('closed');
            });
        } else {
            if ($('.opened').next().height() > 0) {
                 $open_height = $('.opened').next().height() + 20;
            }

            $($accTitle).each(function () {
                $(this).removeClass('opened');
                $(this).addClass('closed');
            });

            $(this).addClass('opened');
            $(this).removeClass('closed');


        }

        /* $(this).next().on('shown.bs.collapse', function () {
            */
            if ($(this).parent().prev().hasClass($accTitle)) {
                $('html, body').animate({scrollTop: parseInt($(this).parent().prev().offset().top) - $open_height + 'px'}, 300);
                console.log(parseInt($(this).parent().prev().offset().top));
            } else {
                $('html, body').animate({scrollTop: parseInt($(this).parent().offset().top) - $open_height + 'px'}, 300);
                console.log(parseInt($(this).parent().offset().top));
            }
        /* });*/
    });
}

function arrowsDocRotation($accTitle) {
    $($accTitle).on('click', function () {
        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($accTitle).addClass('closed');
        } else {
            $($accTitle).removeClass('opened');
            $(this).addClass('opened');
            $(this).removeClass('closed');
        }
    });
}

$(document).ready(function () {
    arrowsFaqRotation('.faq-page .faq-item-title');
    arrowsFaqRotation('.order-page .prod-item-title');
    arrowsDocRotation('.download-page .faq-item-title');
});

;function readURL(input, $image, $closeImg) {

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
});;(function () {
    function setMLogoSize() {
        $window = parseInt($(window).width());
        $paddings = parseInt($('.header-wrapper').css('padding-left')) + parseInt($('.header-wrapper').css('padding-right'));
        $menuButtonPadding = parseInt($('.site-logo-wrapper').css('padding-right')) + parseInt($('.site-logo-wrapper').css('padding-left'));
        $menuButtonSize = parseInt($('.menu-link').width());
        $w = $window - $paddings - $menuButtonSize - $menuButtonPadding;

        return $w;
    }

    function setDLogoSize() {
        $window = parseInt($(window).width());
        $menu = parseInt($('.header-menu-wrapper').width());
        $hw = parseInt($('.header-wrapper').css('padding-left')) + parseInt($('.header-wrapper').css('padding-right'));
        $social = parseInt($('.header-social-items-wrapper').width());
        $logo_padd = parseInt($('.site-logo-wrapper').css('padding-left')) + parseInt($('.site-logo-wrapper').css('padding-right'));


        $w = $window - $menu - $social - $logo_padd - $hw - 32 - 15;

        return $w;
    }


    if (parseInt($(window).width()) < 460) {
        $('.site-logo-wrapper img').css('width', setMLogoSize() + 'px');
    } else if (parseInt($(window).width()) < 992) {
        $('.site-logo-wrapper img').css('width', '320px');
    }
    else if (parseInt($(window).width()) < 1400) {
        $('.site-logo-wrapper img').css('width', setDLogoSize() + 'px');
    } else {
        $('.site-logo-wrapper img').css('width', '480px');
    }




    var addEvent = function(object, type, callback) {
    if (object == null || typeof(object) == 'undefined') return;
    if (object.addEventListener) {
        object.addEventListener(type, callback, false);
    } else if (object.attachEvent) {
        object.attachEvent("on" + type, callback);
    } else {
        object["on"+type] = callback;
    }
};

    addEvent(window, "resize", function(event) {
          if (parseInt($(window).width()) < 460-15) {
            $('.site-logo-wrapper img').css('width', setMLogoSize() + 'px');
        } else if (parseInt($(window).width()) < 992-15) {
            $('.site-logo-wrapper img').css('width', '320px');
        }
        else if (parseInt($(window).width()) < 1400-15) {
            $('.site-logo-wrapper img').css('width', setDLogoSize() + 'px');
        } else {
            $('.site-logo-wrapper img').css('width', '480px');
        }
});

    function getLogoOffset() {
        return parseInt($('.site-logo-wrapper img').offset().left)+'px';
    }

    if($('.site-logo-wrapper img').offset().left > 0) {
        $('.header-top-line').css('padding-left', getLogoOffset);
        $('.header-top-line').css('padding-right', getLogoOffset);
    } else {
       $('.header-top-line').css('padding-left', '0px');
        $('.header-top-line').css('padding-right', '0px');
    }



        addEvent(window, "resize", function(event) {
          console.log($(window).width());
        if($('.site-logo-wrapper img').offset().left > 0) {
        $('.header-top-line').css('padding-left', getLogoOffset);
        $('.header-top-line').css('padding-right', getLogoOffset);
    } else {
       $('.header-top-line').css('padding-left', '0px');
        $('.header-top-line').css('padding-right', '0px');
    }
});

}());
;(function () {
    function sizeRect(i) {
        $('.row-' + i).on('click', function () {
            $('tr').removeClass('active-row');
            $('div').removeClass('active-rectangle');

            $('#row' + i + '.rectangle').addClass('active-rectangle');
            $('.row-' + i).addClass('active-row');
        });

        $('#row' + i).on('click', function () {
            $('tr').removeClass('active-row');
            $('div').removeClass('active-rectangle');
            $('.row-' + i).addClass('active-row');
            $('#row' + i + '.rectangle').addClass('active-rectangle');
        });
    }

    $row_num = $('.product-sizes tr').length;

    for (i = 1; i < $row_num; i++) {
        sizeRect(i);
    }


}());;function hammerSwipe($selector) {
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


$l = $('.carousel-showmanymoveone .item').length;
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
;(function () {

    function showArrow($element) {
        $($element).find('.arrow-down').css('display', 'block');
    }

    function hideArrow($element) {
        $($element).find('.arrow-down').css('display', 'none');
    }

    function overflowingEffect($element, $text) {
        //if overflowing
        if ($($element).prop('scrollHeight') > $($element).height()) {
            showArrow($element);
        } else {
            hideArrow($element);
        }
    }

    $arrow = '.arrow-down';

    function technologyTextHover($element, $child, $height) {
        if ($($element).length !== 0) {

            hideArrow($element);

            setInterval(function () {
                overflowingEffect($element, $child);
            }, 500);

            $($element).on('mouseenter', function () {
                $maxH = parseInt($($element).prop('scrollHeight')) + 20;

                $(this).animate({maxHeight: $maxH+'px'}, 500);
            });

            $($element).on('mouseleave', function () {
                $(this).animate({maxHeight: $height}, 500);
            });
        }
    }

    $height = "470px";
    technologyTextHover('.comparison-wrapper-1', '.comparison-wrapper-1 .comparison-text',$height);
    technologyTextHover('.comparison-wrapper-2', '.comparison-wrapper-2 .comparison-text',$height);

    $height = "300px";
    technologyTextHover('.convect-house-description', '.convect-house-description .comparison-text',$height);
    technologyTextHover('.infra-house-description', '.infra-house-description .comparison-text',$height);

}());;$(function () {



});
;(function () {
    function leftSideAppear($mainReg, $sideBlock, $startM) {
        if (document.getElementById($mainReg) !== null) {
            var target = $($sideBlock);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            $($sideBlock).css('margin-left', $startM);
            $($sideBlock).css('opacity', '0');

            var scrollToElem = targetPos - winHeight;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {

                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    console.log('test');
                    $($sideBlock).animate({
                        marginLeft: '0',
                        opacity: '1'

                    }, 2000, 'easeOutCirc');
                }


            });
            if (winScrollTop > scrollToElem + $(window).height() * 0.5) {
                $($sideBlock).animate({
                    marginLeft: '0',
                    opacity: '1'
                }, 2000, 'easeOutCirc');
            }
        }
    }

    function rightSideAppear($mainReg, $sideBlock, $startM) {
        if (document.getElementById($mainReg) !== null) {
            var target = $($sideBlock);
            var targetPos = target.offset().top;
            var winHeight = $(window).height();
            var targetH = target.height();

            $($sideBlock).css('margin-right', $startM);
            $($sideBlock).css('opacity', '0');

            var scrollToElem = targetPos - winHeight;
            var winScrollTop = $(this).scrollTop();

            $(window).scroll(function () {
                winScrollTop = $(this).scrollTop();

                if (winScrollTop > scrollToElem) {
                    $($sideBlock).animate({
                        marginRight: '0',
                        opacity: '1'

                    }, 2000, 'easeOutCirc');
                }


            });
            if (winScrollTop > scrollToElem + $(window).height() * 0.5) {
                $($sideBlock).animate({
                    marginRight: '0',
                    opacity: '1'
                }, 2000, 'easeOutCirc');
            }


        }

    }


    $mainTwoSideReg = 'technologyPage';

    if ($(window).width() > 767) {
        leftSideAppear($mainTwoSideReg, '.comparison-title-left', '-50%');
        rightSideAppear($mainTwoSideReg, '.comparison-title-right', '-50%');
        leftSideAppear($mainTwoSideReg, '.left-img-comparison-row .comparison-img img', '-50%');
        leftSideAppear($mainTwoSideReg, '.left-img-comparison-row .comparison-text', '50%');

        leftSideAppear($mainTwoSideReg, '.right-img-comparison-row .comparison-img img', '50%');
        leftSideAppear($mainTwoSideReg, '.right-img-comparison-row .comparison-text', '-50%');

        leftSideAppear($mainTwoSideReg, '.convect-house-block', '-50%');
        rightSideAppear($mainTwoSideReg, '.infrared-house-block', '-50%');
    }
}());