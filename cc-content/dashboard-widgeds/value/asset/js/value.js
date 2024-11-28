
function switchBasicMode() {
    sidebarWidgedSetting.find('.show-advance-mode').hide();
    sidebarWidgedSetting.find('.hide-advance-mode').show();
    sidebarWidgedSetting.find('.hide-basic-mode').hide();
}

function switchAdvanceMode() {
    sidebarWidgedSetting.find('.show-advance-mode').show();
    sidebarWidgedSetting.find('.hide-advance-mode').hide();
    sidebarWidgedSetting.find('.hide-basic-mode').show();
}


$(function () {

    var sidebarValueAdvanceMode = dashboard.createSidebar({
        name: 'sidebar-value-advance-mode',
        width: '500px',
        left: '480px',
        title: 'Live View Query',
        parent: 'sidebar-widged-setting'
    }).withScroll();

    var valueWidgedInstance = {};
    var widged = new Widged;

    widged.type('value').setup(function (item) {
        var id = item.meta.get('id')

        valueWidgedInstance[item.meta.get('id')] = '';

        var getDataInterval = function () {
            item.instance.loading(true)
        };
        dashboard.registerIntervalGetData(id, getDataInterval);
        var start = moment().subtract(29, 'days');
        var end = moment();
        var prefix = 'chart' + item.meta.get('id')
        if (localStorage.getItem(prefix + 'period_type', item.meta.get('period_type'))) {
            var from = localStorage.getItem(prefix + 'period_date_from', item.meta.get('period_date_from'));
            var to = localStorage.getItem(prefix + 'period_date_to', item.meta.get('period_date_to'));
            item.meta.set('period_type', localStorage.getItem(prefix + 'period_type', item.meta.get('period_type')));
            item.meta.set('period_date_from', from);
            item.meta.set('period_date_to', to);
            start = moment(from, 'YYYY-MM-DD HH:MM:SS');
            end = moment(to, 'YYYY-MM-DD HH:MM:SS');
        }

        function callback(start, end) {
            var label = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');
            item.meta.set('period_type', 'custom');
            item.meta.set('period_date_from', start.format('YYYY-MM-DD HH:MM:SS'));
            item.meta.set('period_date_to', end.format('YYYY-MM-DD HH:MM:SS'));
            item.object.find('#dateperiod span').html(label);
        }
        item.object.find('#dateperiod').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Auto Refresh': [moment(), moment()],
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                'Last Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, callback);
        item.object.find('#dateperiod').on('apply.daterangepicker', function (ev, picker) {
            if (picker.chosenLabel == 'Auto Refresh') {
                item.meta.set('period_type', 'auto_refresh');
                setTimeout(function () { }, 100);
            }
            localStorage.setItem(prefix + 'period_type', item.meta.get('period_type'));
            localStorage.setItem(prefix + 'period_date_from', item.meta.get('period_date_from'));
            localStorage.setItem(prefix + 'period_date_to', item.meta.get('period_date_to'));
            getDataInterval();
        });

        callback(start, end);
    });

    $(document).on('change', 'select#table_reff', function (event) {
        var _this = $(this);
        var url = new WidgedUrl;
        sidebarWidgedSetting.showLoader();
        url.get({
            widged_type: 'value',
            resource: 'valueGetField',
            params: {
                table: _this.val()
            },
            success: function (res) {
                var data = res.data;
                var source = `
            <option value=""></option>
            {{#tables}}<option data-type="{{type}}" value="{{name}}">{{name}}</option>{{/tables}}
            `;
                var sourceDateTime = `
            <option value=""></option>
            {{#tables}}
                {{#if (isDateTime type) }}
                <option data-type="{{type}}" value="{{name}}">{{name}}</option>
                {{/if}}
            {{/tables}}
            `;
                Handlebars.registerHelper('isDateTime', function (value) {
                    return value == 'datetime';
                });

                var template = Handlebars.compile(source);
                var output = template(data);
                var templateDateTime = Handlebars.compile(sourceDateTime);
                var outputDateTime = templateDateTime(data);
                sidebarWidgedSetting.find('select#group_by_field, select#y_axis_field').html((output))
                sidebarWidgedSetting.find('select#datetime_field').html((outputDateTime))
                sidebarWidgedSetting.find('#group_by_field').val(sidebarWidgedSetting.find('#group_by_field').attr('data-value'))
                sidebarWidgedSetting.find('#y_axis_field').val(sidebarWidgedSetting.find('#y_axis_field').attr('data-value'))
                sidebarWidgedSetting.find('#datetime_field').val(sidebarWidgedSetting.find('#datetime_field').attr('data-value'))
                sidebarWidgedSetting.find('select#group_by_field, select#y_axis_field, select#datetime_field').trigger('chosen:updated')
                sidebarWidgedSetting.find('#x_axis_field').trigger('change')
            },
            fail: function (res) { },
            always: function (res) {
                sidebarWidgedSetting.hideLoader();
            }
        })
    })

    $(document).on('click', '.btn-add-condition', function (event) {
        event.preventDefault();
        _this = $(this);
        var id = getUnixId();
        var data = {
            conditions: [
                {
                    chosen_select_deselect: 'chosen chosen-select-deselect',
                    id: id
                }
            ]
        }
        var template = Handlebars.compile($('.template-condition-item').html());
        var output = template(data);
        var conditionItemWrapper = sidebarWidgedSetting.find('.condition-item-wrapper');
        conditionItemWrapper.append(output);
        conditionItemWrapper.find('[data-condition-id="' + id + '"] #cond_field').html(sidebarWidgedSetting.find('#group_by_field').html());
        dashboard.initChosen();
        conditionItemWrapper.find('#cond_field').trigger('chosen:updated');
    });

    $(document).on('click', '.btn-remove-condition', function (event) {
        $(this).parents('.condition-item').remove();
    });

    $(document).on('change', 'select#x_axis_field', function (event) {
        event.preventDefault();
        if ($(this).find('option:selected').attr('data-type') == 'datetime') {
            $('.grouping-wrapper').show();
        } else {
            $('.grouping-wrapper').hide();
        }
    });


    var ctabs = new CTabs;
    ctabs.init('.tab-value-setting');


    $(document).on('click', '.tab-value-setting a.btn-basic-mode', function (event) {
        switchBasicMode();
        dashboard.closeSidePage(sidebarValueAdvanceMode);
    });

    $(document).on('click', '.tab-value-setting a.btn-advance-mode', function (event) {
        switchAdvanceMode();

        dashboard.showSidePage(sidebarValueAdvanceMode, false, $('.sidebar-widged-setting'));
        sidebarValueAdvanceMode.find('.sidebar-body').html(`
         <div class="cc-page-setting-wrapper">

            <div class="result-json">
            </div>
         </div>
        `)


    });

    $(document).on('click', 'a.btn-value-run-code', function (event) {
        dashboard.showSidePage(sidebarValueAdvanceMode, false, $('.sidebar-widged-setting'));
        sidebarValueAdvanceMode.find('.sidebar-body').html(`
         <div class="cc-page-setting-wrapper">

            <div class="result-json">
            </div>
         </div>
        `)

        return false;
    });

})