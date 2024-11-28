function initSortableAjax(module_name, table) {
    module_name = module_name
    var url = new URL(window.location);
    var qst = '';
    var qsb = '';
    var q = '';
    var f = $('#filter').val();
    var filter = '[]';
    table.find('thead th').each(function (index, el) {
        var sb = $(this).data('field')
        var icon = '<i class=" fa fa-sort"></i>';
        if (qsb == $(this).data('field')) {
            var sort = 'desc';
            if (qst == 'ASC') {
                sort = 'asc';
            }
            icon = '<i class=" fa fa-sort-' + sort + '"></i>';
            qsb = $(this).data('field');
            qst = qst
        }
        if (qst == null && qsb == null && $(this).data('primary-key')) {
            qsb = $(this).data('field');
            qst = 'ASC';
            icon = '<i class=" fa fa-sort-desc"></i>';
        }
        var object = $(this);
        if ($(this).data('sort')) {
            $(this).append(` ` + icon)
            $(this).css('cursor', 'pointer')
            $(this).click(function (event) {
                event.preventDefault();
                var sb = object.data('field')
                var icon = '<i class=" fa fa-sort"></i>';
                var sorttype = object.attr('sort-type');
                var q = $('#filter').val();
                var url = new URL(window.location);
                var filter = url.searchParams.get("filter");

                table.find('thead th').removeAttr('sort-type')
                table.find('thead th .fa').replaceWith(icon)
                if (sorttype) {
                    if (sorttype == 'ASC') {
                        sorttype = 'DESC';
                        sort = 'desc';
                        icon = '<i class=" fa fa-sort-desc"></i>';
                    } else {
                        sorttype = 'ASC';
                        sort = 'asc';
                        icon = '<i class=" fa fa-sort-asc"></i>';
                    }
                    object.attr('sort-type', sorttype);
                } else {
                    sorttype = 'ASC';
                    sort = 'asc';
                    icon = '<i class=" fa fa-sort-asc"></i>';
                    object.attr('sort-type', sorttype);
                }
                st = sorttype;
                object.find('.fa').replaceWith(icon);
                var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '?ajax=1&st=' + st + '&sb=' + sb + '&q=' + (q ? q : '') + '&f=' + (f ? f : '') + '&filter=' + (filter ? filter : '')
                reloadDataTable(url);
            });
        }
    });
    $(document).on('click', '.pagination li a', function (event) {
        event.preventDefault();
        var page = 0;
        if (page !== false) {

            var st = '';
            var sb = '';
            var f = '';
            var filter = '[]';

            var url = $(this).attr('href');
            var location = new URL(url);
            var filter = location.searchParams.get("filter");
            var q = location.searchParams.get("q");

            var regex = /index\/(\d+)/;
            var matches = regex.exec(url);
            if (matches == null) {
                page = '';
            } else {
                page = matches[1];
            }
            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/index/' + page + '?ajax=1&q=' + (q ? q : '') + '&filter=' + (filter ? filter : '')
            reloadDataTable(url);
        }
    });
}

function RemoveParameterFromUrl(url, parameter) {
    return url
        .replace(new RegExp('[?&]' + parameter + '=[^&#]*(#.*)?$'), '$1')
        .replace(new RegExp('([?&])' + parameter + '=[^&]*&'), '$1');
}

function reloadDataTable(url) {
    var pushurl = RemoveParameterFromUrl(url, 'ajax');
    //window.history.pushState('page2', 'Title', pushurl);
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'JSON',
    }).done(function (res) {
        $('table tbody').html(res.tables);
        $('.table-pagination').html(res.pagination);
        $('.total-rows').html(res.total_row);

        $('.flat-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    }).fail(function () { }).always(function () { });


}

$(function () {
    var crud_key_field = {};
    var crud_fields = []
    $.each(crud_fields, function (index, val) {
        crud_key_field[val.field] = val;
    });
    console.log(crud_key_field)

    function afterStop() {
        $('.condition-item-parent').each(function (index, el) {
            var condtotal = $(this).find('.condition-item').length;
            if (condtotal == 0) {
                $(this).remove();
            }
        });
    }
    $(document).on('click', 'a.btn-remove-condition', function (event) {
        event.preventDefault();
        $(this).parents('.condition-item').remove();
        afterStop();
    });
    $(document).on('click', '.condition-item-parent-logic', function (event) {
        event.preventDefault();
        if ($(this).data('logic') == 'OR') {
            $(this).data('logic', 'AND').html('AND')
        } else {
            $(this).data('logic', 'OR').html('OR')
        }
    });
    $(document).on('click', '.condition-item-child-logic', function (event) {
        event.preventDefault();
        if ($(this).data('logic') == 'OR') {
            $(this).data('logic', 'AND').html('AND')
        } else {
            $(this).data('logic', 'OR').html('OR')
        }
    });

    function defineInputFilter(container) {
        var field = container.find('[name="field"] option:selected').attr('data-type');
        var field_name = container.find('[name="field"]').val();
        var operator = container.find('[name="operator"] ').val();
        var mapping = {
            'number': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'true_false'
            }],
            'true_false': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'true_false'
            }],
            'yes_no': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'yes_no'
            }],
            'datetime': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'between': 'between',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'datetime'
            }],
            'timestamp': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'between': 'between',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'datetime'
            }],
            'date': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'between': 'between',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'date'
            }],
            'time': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'time'
            }],
            'year': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                    'where_in': 'define_select',
                    'like': 'input',
                },
                default: 'year'
            }],
            'select': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'select'
            }],
            'select_multiple': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'select_multiple'
            }],
            'custom_select_multiple': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'custom_select_multiple'
            }],
            'custom_select': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'custom_select'
            }],
            'checkboxes': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'select_multiple'
            }],
            'custom_checkbox': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'custom_select_multiple'
            }],
            'options': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'select'
            }],
            'options': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'select'
            }],
            'custom_option': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'custom_select'
            }],
            'chained': [{
                match: {
                    'is_null': 'input',
                    'not_null': 'input',
                },
                default: 'select'
            }],
        }
        container.find('.opr-val-wrapper').hide();
        var matches = false;
        $.each(mapping[field], function (val, item) {
            $.each(item.match, function (match, input) {
                if (match == operator) {
                    container.find('.opr-val-wrapper[data-type="' + input + '"]').show();
                    matches = true;
                }
            });
            if (!matches) {
                container.find('.opr-val-wrapper[data-type="' + item.default + '"]').show();
            }
        });
        if (container.find('.opr-val-wrapper:visible').length == 0) {
            container.find('.opr-val-wrapper[data-type="input"]').show();
        }
        var input = container.find('.opr-val-wrapper[data-type="input"] input');
        input.removeAttr('readonly');
        input.attr('placeholder', '');
        input.val('');
        if (operator == 'is_null' || operator == 'not_null') {
            input.val('');
            input.attr('readonly', 'readonly');
        }
        if (operator == 'where_in') {
            input.attr('placeholder', 'item1, item2, ...');
        }
        if (operator == 'like') {
            input.val('%%');
        }
        if (field == 'custom_option' || field == 'custom_checkbox') {
            var options = crud_key_field[field_name].options;
            /* iterate through array or object */
            $.each(options.custom, function (index, val) {
                container.find('.opr-val-wrapper:visible select').append('<option>' + val + '</option>');
            });
        }
        initSelect2();
    }
    $(document).on('change', '.condition-item [name="field"]', function (event) {
        event.preventDefault();
        var type = $(this).find(':selected').data('type');
        var container = $(this).parents('.condition-item');
        container.find('[name="operator"] option').each(function (el) {
            if (!$(this).hasClass(type)) {
                $(this).hide();
            } else {
                $(this).show();
            }
        })
        defineInputFilter(container);
    });
    $(document).on('change', '.condition-item [name="operator"]', function (event) {
        event.preventDefault();
        var type = $(this).val();
        var container = $(this).parents('.condition-item');
        defineInputFilter(container);
    });

    function getFilterJson() {
        var filter = [];
        var iteration = 1;
        $('.condition-item-parent-wrapper .condition-item-parent').each(function (index, el) {
            var logic = $(this).find('.condition-item-parent-logic').data('logic');
            var conds = [];
            $(this).find('.condition-item-wrapper .condition-item').each(function (index, el) {
                var logic_child = $(this).find('.condition-item-child-logic').data('logic');
                var field = $(this).find('[name="field"]').val();
                var operator = $(this).find('[name="operator"]').val();
                var val = $(this).find('.opr-val-wrapper:visible input, .opr-val-wrapper:visible select').map(function () {
                    return this.value;
                }).get();
                var type = $(this).find('.opr-val-wrapper:visible').data('type');
                conds.push({
                    lg: logic_child,
                    fl: field,
                    op: operator,
                    vl: val,
                    tp: type,
                });
            });
            filter.push({
                lg: logic,
                co: conds
            })
            iteration++;
        });
        return filter;
    }
    $('.btn-do-filter').click(function (event) {
        event.preventDefault();
        var json = JSON.stringify(getFilterJson())
        var filter = $('.condition-item-parent-wrapper').clone().html();
        localStorage.setItem('filter_' + module_name, filter);
        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/index/?ajax=1&filter=' + json
        reloadDataTable(url);
        $('.modal-filter').modal('hide')
    });

    function initSelect2() {
        if ($(".select2-placeholder-multiple, .select2-ajax-multiple").data('select2')) {
            $('.select2-container').remove();
            $(".select2-placeholder-multiple").data('select2').destroy()
        }
        $(".select2-placeholder-multiple").select2({
            placeholder: "Select option",
            dropdownParent: $('.modal-filter'),
            allowClear: true
        });
        $(".select2-define-select").select2({
            placeholder: "Typing your tags",
            dropdownParent: $('.modal-filter'),
            tags: true
        });
        $('.select2-ajax-multiple').each(function (index, el) {
            var parent = $(this).parents('.condition-item');
            var type = parent.find('[name="field"] option:selected').data('type');
            var field_name = parent.find('[name="field"]').val();
            var new_params = {};
            if (type == 'select' || type == 'select_multiple' || type == 'checkboxes' || type == 'chained' || type == 'options') {
                var options = crud_key_field[field_name].options;
                new_params = {
                    table: options.relation.table,
                    label: options.relation.label,
                    value: options.relation.value,
                }
            }
            $(this).select2({
                ajax: {
                    url: BASE_URL + 'filter/ajax',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return $.extend(new_params, {
                            q: params.term, // search term
                            page: params.page
                        });;
                    },
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: data.items
                        };
                    }
                },
                placeholder: 'Search data',
                dropdownParent: $('.modal-filter'),
                minimumInputLength: 0,
                allowClear: true
            });
        });
    }

    function initSortAble() {
        $(".condition-item-wrapper").sortable({
            opacity: 0.6,
            connectWith: '.condition-item-wrapper',
            revert: true,
            handle: '.condition-item-handle',
            start: function (e, ui) { },
            receive: function (e, ui) { },
            stop: function (e, ui) {
                afterStop()
            }
        });
    }
    $.each(crud_fields, function (index, val) { });
    var new_cond = $('.filter-template .condition-item-parent').clone();
    new_cond.find('[name="field"]').val()
    new_cond.appendTo('.condition-item-parent-wrapper');
    initSortAble();

    function initDateTimePicker() {
        $('.datepicker').datetimepicker({
            timepicker: false,
            formatDate: 'Y.m.d',
        });
        $('.datepicker').inputmask({
            mask: "y-1-2",
            placeholder: "yyyy-mm-dd",
            leapday: "-02-29",
            separator: "-",
            alias: "yyyy/mm/dd"
        });
        $('.yearpicker').inputmask({
            mask: "y",
            placeholder: "yyyy",
            leapday: "-02-29",
            separator: "-",
            alias: "yyyy"
        });
        $('.datetimepicker').inputmask({
            mask: "y-1-2 h:s",
            placeholder: "yyyy-mm-dd hh:mm",
            leapday: "-02-29",
            separator: "-",
            alias: "yyyy/mm/dd"
        });
        $('.datetimepicker').datetimepicker({
            formatTime: 'H:i',
            formatDate: 'yyyy-mm-dd hh:ii',
        });
        $('.timepicker').inputmask({
            mask: "h:s",
            placeholder: "hh:mm",
            leapday: "-02-29",
            separator: "-",
            alias: "yyyy/mm/dd"
        });
        $('.timepicker').datetimepicker({
            datepicker: false,
            format: 'H:i',
            step: 5
        });

    }
    $('.btn-add-condition').click(function (event) {
        event.preventDefault();
        var new_cond = $('.filter-template .condition-item-parent').clone().appendTo('.condition-item-parent-wrapper')
        initSortAble();
        initDateTimePicker();
        initSelect2();
        new_cond.find('.condition-item [name="operator"]').trigger('change')
        new_cond.find('.condition-item [name="field"]').trigger('change')
    });
    $('.btn-clear-condition').click(function (event) {
        event.preventDefault();
        $('.condition-item-parent-wrapper .condition-item-parent').remove();
        initSortAble();
    });
    $('.btn-advance-filter').click(function (event) {
        event.preventDefault();
        $('.modal-filter').modal('show')

        setTimeout(function () {

            initSelect2();
            initSortAble();
            initDateTimePicker();
        }, 300);
    });

    $('form').on('submit', function (event) {
        event.preventDefault();
        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '?ajax=1&q=' + $('#filter').val() + '&f=' + $('#field').val()

        reloadDataTable(url)
    });

    $('a#reset').on('click', function (event) {
        event.preventDefault();
        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '?ajax=1';
        $('#filter').val('')
        reloadDataTable(url)
    });

    $('.btn-export-excel').click(function (event) {
        event.preventDefault();
        var url = window.location;
        var location = new URL(url);
        var filter = location.searchParams.get("filter");
        var q = location.searchParams.get("q");
        var f = location.searchParams.get("f");

        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/export?q=' + (q ? q : '') + '&f=' + (f ? f : '') + '&filter=' + (filter ? filter : '')

        window.location = url;
    });

    $('.btn-export-pdf').click(function (event) {
        event.preventDefault();
        var url = window.location;
        var location = new URL(url);
        var filter = location.searchParams.get("filter");
        var q = location.searchParams.get("q");
        var f = location.searchParams.get("f");

        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/export_pdf?q=' + (q ? q : '') + '&f=' + (f ? f : '') + '&filter=' + (filter ? filter : '')

        window.location = url;
    });

    function chosenInit() {

        var config = {
            '.chosen-select': {
                search_contains: true,
                search_contains: true,
                parser_config: {
                    copy_data_attributes: true
                }
            },
            '.chosen-select-deselect': {
                allow_single_deselect: true,
                search_contains: true,
                parser_config: {
                    copy_data_attributes: true
                }
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "95%"
            }
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    }

    function initAfterLoadView() {

        initSortAble();
        initDateTimePicker();
        chosenInit();
    }

    if (use_ajax_crud) {

        $(document).on('click', 'a.btn-act-view', function (event) {
            event.preventDefault();
            var url = $(this).attr('href') + '?popup=show'
            $('.modal-footer .view-nav, .modal-footer .container-button-bottom').remove();
            showPopup(url, function () {
                $('.view-nav').appendTo('.modal-footer')
                $('.modal-footer #btn_save_back, .modal-footer a#btn_back').remove();
                initAfterLoadView()

            });
        });
        $(document).on('click', 'a.btn-act-edit, a#btn_edit', function (event) {
            event.preventDefault();
            var url = $(this).attr('href') + '?popup=show'
            $('.modal-footer .view-nav, .modal-footer .container-button-bottom').remove();

            showPopup(url, function () {
                $('.container-button-bottom').appendTo('.modal-footer')
                $(' .modal-footer a.btn_save_back, .modal-footer a.btn_back, .modal-footer a#btn_cancel').remove();
                initAfterLoadView()

            });
        });
        $(document).on('click', ' a#btn_add_new', function (event) {
            event.preventDefault();
            var url = $(this).attr('href') + '?popup=show'
            $('.modal-footer .view-nav, .modal-footer .container-button-bottom').remove();

            showPopup(url, function () {
                $('.container-button-bottom').appendTo('.modal-footer')
                $(' .modal-footer a.btn_save_back, .modal-footer a.btn_back, .modal-footer a#btn_cancel').remove();
                initAfterLoadView()
            });
        });

        $(document).on('click', ' a.remove-data', function (event) {
            event.preventDefault();

            var url = $(this).attr('data-href') + "?ajax=1"

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

                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                        })
                            .done(function (res) {

                                if (res.success) {
                                    toastr["success"](res.message)
                                    var url = `${BASE_URL}/${ADMIN_NAMESPACE_URL}/${module_name}/index/?ajax=1`

                                    reloadDataTable(url);
                                } else {
                                    toastr["warning"](res.message)
                                }

                            })
                            .fail(function () {
                                toastr["warning"](res.message)
                            })
                            .always(function () {
                            });

                        return false;
                    }
                });

            return false;
        });
    }
})