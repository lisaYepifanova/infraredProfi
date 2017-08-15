function arrowsRotation($accTitle, $tex) {
    $($accTitle).on('click', function () {


        if ($(this).hasClass('opened')) {
            $(this).removeClass('opened');
            $($accTitle).addClass('closed');

        } else {
           $('html, body').animate({scrollTop: parseInt($(this).parent().prev().offset().top) + parseInt($(this).parent().prev().children($accTitle).css('height'))  + 'px' },1500);
            $($accTitle).removeClass('opened');
            $(this).addClass('opened');
            $(this).removeClass('closed');
        }



  $($tex).on('shown.bs.collapse', function(){
    console.log('ok');
    //$('html, body').animate({scrollTop: (parseInt($(this).prev($accTitle).offset().top)) + 'px'}, 100);
  });
    });
}

$(document).ready(function () {
    arrowsRotation('.faq-item-title', '.faq-item-title + div');
});

