function readURL(input, $image) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $($image).attr('src', e.target.result);
            $('.close-img').css('display', 'block');
        };

        reader.readAsDataURL(input.files[0]);
        console.log(input.files[0].size);
    } else {
        $('.close-img').css('display', 'none');
    }
}

$("#photo").change(function(){
    readURL(this,'#image');
});

$("#vision_img").change(function(){
    readURL(this,'#imagev');
});

$("#mission_img").change(function(){
    readURL(this, '#imagem');
});
