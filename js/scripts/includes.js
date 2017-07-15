$(function () {
    var includes = $('[data-include]');
    jQuery.each(includes, function () {
        var file = 'htmlDocs/' + $(this).data('include') + '.html';
        $(this).load(file);
    });
});