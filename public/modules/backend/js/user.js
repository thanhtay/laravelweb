var _token = $('input[name="_token"]').val();
var url = $('input[name="url"]').val();
var ajaxUpdateStatus = new AjaxCommon({
    method: "POST",
    url: url
});

$('.update-user-status').on('click', function () {
    changeStatus($(this).attr('data-id'));
});

function changeStatus(id) {
    ajaxUpdateStatus.options.data = {
        _token: _token,
        id: id,
    }
    ajaxUpdateStatus.load();
}

ajaxUpdateStatus.callback = function (result) {
    if (result.status) {
        updateViewStatus(result.user);
    } else {
        alert(result.message);
    }
}

function updateViewStatus(user) {
    if (user.status == '1') {
        $('#status-user-' + user.id).text('active');
    } else {
        $('#status-user-' + user.id).text('block');
    }
}

