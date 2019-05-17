var _token = $('input[name="_token"]').val();
var url = $('input[name="url"]').val();
var ajaxUpdateStatus = new AjaxCommon({method:"POST", url: url});

$('.update-course-status').on('click', function(){
    updateStatus($(this).attr('data-id'));
});
function updateStatus(id, stauts)
{
    ajaxUpdateStatus.options.data = {
        _token: _token,
        id: id,
    }
    ajaxUpdateStatus.load();
}

ajaxUpdateStatus.callback = function(result) {
    if (result.status) {
        updateViewStatus(result.course);
    } else {
        alert(result.message);
    }
}

function updateViewStatus(course) {
    $('#status-course-' + course.id).attr('data-status', course.status);
    if (course.status == '1') {
        $('#status-course-' + course.id).text('active');
    } else {
        $('#status-course-' + course.id).text('unactive');
    }
}