$('#show-form-lesson').on('click', function () {
    $('#lesson-form').show();
})
var _token = $('input[name="_token"]').val();
var url_create = $('input[name="url-create"]').val();
var url_edit = $('input[name="url-edit"]').val();
var url_delete = $('input[name="url-delete"]').val();

var ajaxCreate = new AjaxCommon({
    method: "POST",
    url: url_create
});
var ajaxUpdate = new AjaxCommon({
    method: "POST",
    url: url_edit
});
var ajaxDelete = new AjaxCommon({
    method: "POST",
    url: url_delete
});

$('#create-lesson').on('click', function () {
    createLesson();
})

$('#name').on('keypress',function(e) {
    if(e.which == 13) {
        createLesson();
    }
});
function createLesson() {
    let idCourse = $('input[name="id-course"]').val();
    $('input[name="name"]').removeClass('form-error');
    if ($('input[name="name"]').val() == '') {
        $('input[name="name"]').addClass('form-error');
    } else {
        ajaxCreate.options.data = {
            _token: _token,
            id_course: idCourse,
            name: $('input[name="name"]').val(),
            count: $('.list-lesson').find('tbody tr').length,
        }
        ajaxCreate.load();
    }
}
ajaxCreate.callback = function (result) {
    renderNewLesson(result);
}

function renderNewLesson(result) {
    $('.list-lesson').find('tbody').append(result.html);
    $('#lesson-form').hide();
    $('input[name="name"]').val('');
}

$('.list-lesson').on('click', '.delete-lesson', function () {
    if (confirm('Do you want to delete this lesson?')) {
        ajaxDelete.options.data = {
            _token: _token,
            id: $(this).attr('data-id'),
        }
        ajaxDelete.load();
    }
})

ajaxDelete.callback = function (result) {
    renderDeleteLesson(result);
}

function renderDeleteLesson(result) {
    $('#lesson-' + result.id).remove();
    resetNoColumn();
}

function resetNoColumn() {
    let listNo = $('.list-lesson').find('.no');
    for (let i = 0; i < listNo.length; ++i) {
        listNo[i].innerText = i + 1;
    }
}


$('.list-lesson').on('click', '.edit-lesson', function () {
    let parent = $(this).parents('tr');
    parent.find('.name-lesson').hide();
    parent.find('.edit-form').show();
})

$('.list-lesson').on('click', '.update-lesson', function(){
    let parent = $(this).parents('tr');
    updateLesson(parent)
});

$('.list-lesson').on('keypress', '.input-name', function(e){
    if(e.which == 13) {
        let parent = $(this).parents('tr');
        updateLesson(parent)
    }
    
});

function updateLesson(parent) {
    let lesson_name = parent.find('input[name="lesson-name"]');
    let id = parent.attr('data-id');
    if (lesson_name.val() != '') {
        parent.find('input[name="lesson-name"]').removeClass('form-error');
        ajaxUpdate.options.data = {
            _token: _token,
            id: id,
            name: lesson_name.val(),
        }

        ajaxUpdate.load();
            
    } else {
        parent.find('input[name="lesson-name"]').addClass('form-error');
    }
}

ajaxUpdate.callback = function(result) {
    renderUpdateLesson(result);
}

function renderUpdateLesson(result) {
    let parent = $('#lesson-' + result.lesson.id);
    parent.find('.name-lesson a').html(result.lesson.name);
    parent.find('.name-lesson').show();
    parent.find('.edit-form').hide();
    parent.find('.updated-at').html(result.lesson.updated_at);
    
}
