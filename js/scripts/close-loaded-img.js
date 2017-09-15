function closeImg(input) {


}

$(".close-img").on('click', function(){
    $('#image').attr('src', '#');
    $('#photo').val('');
    $('.close-img').css('display', 'none');
});
