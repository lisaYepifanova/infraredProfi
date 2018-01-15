$('#imageNavMenu .close').on('click', function () {
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
