function closeImg(input) {


}

$(".close-img").on('click', function(){
    $('#image').attr('src', '#');
    $('#photo').val('');
    $('.close-img').css('display', 'none');
});

$(".close-imgv").on('click', function(){
    $('#imagev').attr('src', '#');
    $('#vision_img').val('');
    $('.close-img').css('display', 'none');
});

$(".close-imgm").on('click', function(){
    $('#imagem').attr('src', '#');
    $('#mission_img').val('');
    $('.close-img').css('display', 'none');
});