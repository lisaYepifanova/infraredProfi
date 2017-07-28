$l = $('.carousel-showmanymoveone .item').length;


$('#thumbcarousel').carousel({interval: false});
if ($l<4) {
  $('#thumbcarousel').carousel({interval: false});
}

$('.carousel-showmanymoveone .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));


  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else if ($l>3){
    $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
