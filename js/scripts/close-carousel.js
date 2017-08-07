$('#imageNavMenu .close').on('click', function () {
    $("#imageNavMenu").modal('hide');
});

$(document).mouseup(function (e) { // событие клика по веб-документу
    var div = $("#imageNavMenu .modal-dialog"); // тут указываем ID элемента
    var mod = $("#imageNavMenu"); // тут указываем ID элемента
    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        mod.modal('hide');
    }
});