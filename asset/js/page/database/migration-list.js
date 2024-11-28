$(document).ready(function () {

    "use strict";

    $('#btn_add_new_migration').on('click', function (event) {
        event.preventDefault();
        swal({
            title: "New Migration",
            text: "Fill Migration Name:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Name",
            animation: false
        }, function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("Migration Name is Required!");
                return false
            }
            var name = inputValue;
            swal({
                title: "New Migration",
                text: "Fill Table Name:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Table",
                animation: false
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("Table Name is Required!");
                    return false
                }
                document.location.href = BASE_URL + '/migrate/index?name=' + name + '&table=' + inputValue;

            });
        });
    });

    $(document).on('click', 'a.remove-data', function () {

        var url = $(this).attr('data-href');

        swal({
            title: cclang('are_you_sure'),
            text: cclang('data_to_be_deleted_can_not_be_restored'),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: cclang('yes_delete_it'),
            cancelButtonText: cclang('no_cancel_plx'),
            closeOnConfirm: true,
            closeOnCancel: true
        },
            function (isConfirm) {
                if (isConfirm) {
                    document.location.href = url;
                }
            });

        return false;
    });
}); /*end doc ready*/