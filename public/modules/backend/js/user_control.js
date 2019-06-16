$('.list_class li').on('click', function(){
    createDataPermission($(this));
    $(this).hide();
});
$('.list_permission li').on('click', function(){
    removeDataPermission($(this));
});

function createDataPermission(el) {
    let id = el.attr('data-id');
    let tmpClone = el.clone();
    tmpClone.on('click', function(){
        removeDataPermission($(this));
    });
    $('.list_permission').append(tmpClone);
    
    let input = '<input id="permission-' + id + '" name="permissions[]" type="hidden" value="'+ id +'">';
    $('.permission_data').append(input);
}

function removeDataPermission(el) {
    let id = el.attr('data-id');
    $('.list_class').find('li[data-id="'+ id +'"]').show();
    el.remove();

    $('.permission_data').find('#permission-' + id).remove();
}

$('input[name=isTeacher]').on('change', function(){
    if ($('input[name=isTeacher]:checked' ).val() == 1) {
        $('.permissions-content').show();
    } else {
        $('.permissions-content').hide();
    }
})