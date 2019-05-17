var _token = $('input[name="_token"]').val();
var url = $('input[name="url"]').val();
var ajaxUpdateStatus = new AjaxCommon({
    method: "POST",
    url: url
});

$('.update-admin-status').on('click', function () {
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
        updateViewStatus(result.admin);
    } else {
        alert(result.message);
    }
}

function updateViewStatus(admin) {
    if (admin.status == '1') {
        $('#status-admin-' + admin.id).text('active');
    } else {
        $('#status-admin-' + admin.id).text('block');
    }
}

