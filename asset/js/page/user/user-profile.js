$(document).ready(function () {

    "use strict";

    $('*').bind('keydown', 'Ctrl+e', function assets() {
        $('#btn_edit').trigger('click');
        return false;
    });

    $('*').bind('keydown', 'Ctrl+x', function assets() {
        window.location.href = ADMIN_BASE_URL + '/user';
        return false;
    });

}); /*end doc ready*/