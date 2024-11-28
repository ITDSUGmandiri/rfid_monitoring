<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>

<script type="text/javascript">
    function domo() {

        $('*').bind('keydown', 'Ctrl+s', function() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<style>
    </style>

<section class="content-header">
    <h1>
        Register Aset<small><?= cclang('new', ['Register Aset']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_transaksi'); ?>">Register Aset</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        
                        <div class="widget-user-header ">

                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            
                            <h3 class="widget-user-username">Tb Master Transaksi</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Tb Master Transaksi']); ?></h5>
                            <hr>
                        </div>

                        <?= form_open('', [
                            'name' => 'form_tb_master_transaksi_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tb_master_transaksi_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                        
                    <h3>Form Register</h3>
                    
                    <section>                  

                        <input type="hidden" class="form-control" name="tipe_transaksi" id="tipe_transaksi" value="2">
                        <input type="hidden" class="form-control" name="status_transaksi" id="status_transaksi" value="1">
                        <input type="hidden" class="form-control" name="id_pegawai_input" id="id_pegawai_input" value="1">
                        <input type="hidden" class="form-control" name="nama_pegawai_input" id="nama_pegawai_input" value="Ridwan Sapoetra">
    
                        <div class="form-group group-tgl_awal_transaksi ">
                            <label for="tgl_awal_transaksi" class="col-sm-2 control-label">Tgl Awal Transaksi                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tgl_awal_transaksi" placeholder="Tgl Awal Transaksi" id="tgl_awal_transaksi">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
    
                        <div class="form-group group-ket_transaksi ">
                            <label for="ket_transaksi" class="col-sm-2 control-label">Ket Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ket_transaksi" id="ket_transaksi" placeholder="Ket Transaksi" value="<?= set_value('ket_transaksi'); ?>">
                                <small class="info help-block">
                                    <b>Input Ket Transaksi</b> Max Length : 500.</small>
                            </div>
                        </div>

                    </section>

                    <h3>Pilih Aset</h3>
                    
                    <section>          
                  
                            <!-- /.widget-user -->
                            <div class="row">

                                <div class="col-md-8">

                                    <!-- <form name="form_master_aset" id="form_master_aset" action="<?= admin_base_url('/tb_master_aset/datatable_aset_master'); ?>"> -->
                                                                
                                        <!-- <div class="col-sm-2 padd-left-0 " >
                                            <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >                                
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2 padd-left-0 ">
                                            <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                                        </div> -->
                                                    
                                        <div class="col-sm-3 padd-left-0  " >
                                            <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                                        </div>
                                        
                                        <div class="col-sm-3 padd-left-0 " >
                                            <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                                                <option value=""><?= cclang('all'); ?></option>
                                                <option <?= $this->input->get('f') == 'nama_aset' ? 'selected' :''; ?> value="nama_aset">Nama Aset</option>
                                                <option <?= $this->input->get('f') == 'kode_aset' ? 'selected' :''; ?> value="kode_aset">Kode Aset</option>
                                                <option <?= $this->input->get('f') == 'nup' ? 'selected' :''; ?> value="nup">NUP</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-1 padd-left-0 ">
                                            <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                            Filter
                                            </button>
                                        </div>
                                        
                                        <div class="col-sm-1 padd-left-0 ">
                                            <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/tb_master_transaksi/datatable_aset_master');?>" title="<?= cclang('reset_filter'); ?>">
                                                <i class="fa fa-undo"></i>
                                            </a>
                                        </div>

                                    <!-- </form> -->
                                
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-12">

                                    <div class="table-responsive"> 

                                    <br>
                        
                                        <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                            <thead>
                                            <tr class="">          
                                                <th>
                                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                                </th>                  
                                                <th style="text-align: center"><?= cclang('ID Aset') ?></th>
                                                <th style="text-align: center" data-field="kode_tid"data-sort="1" data-primary-key="0"> <?= cclang('Nama Aset') ?></th>
                                                <th style="text-align: center" data-field="kode_epc"data-sort="1" data-primary-key="0"> <?= cclang('Kode Aset') ?></th>
                                                <th style="text-align: center" data-field="status_tag"data-sort="1" data-primary-key="0"> <?= cclang('NUP') ?></th>
                                                <!-- <th style="text-align: center">Description</th>                         -->
                                            </tr>
                                            </thead>
                                            <tbody id="tbody_ug_mstag">
                                                <?= $tables ?>
                                            </tbody>
                                        </table>

                                    </div>
                                
                                </div>

                            </div>

                    </section>

                    <h3>Pilih Tag</h3>
                    
                    <section>                  

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">IP Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="IP Address">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3"></div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-flat btn-info btn_search btn_action btn_search_back btn-block" id="btn_search" data-stype='back' title="Search">
                                        <i class="ion ion-ios-list-outline"></i> Search
                                    </a>
                                </div>
                                <small class="info help-block"><b>Status:</b> <div id="status"></div></small>
                            </div>

                            <div class="col-md-3"></div>
                        </div>


                        <div class="table-responsive"> 

                            <br>
                            <!-- <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                <thead>
                                <tr class="">                            
                                    <th style="text-align: center">
                                        <?= cclang('No') ?>
                                    </th>
                                    <th style="text-align: center" data-field="kode_tid"data-sort="1" data-primary-key="0"> <?= cclang('kode_tid') ?></th>
                                    <th style="text-align: center" data-field="kode_epc"data-sort="1" data-primary-key="0"> <?= cclang('kode_epc') ?></th>
                                    <th style="text-align: center" data-field="status_tag"data-sort="1" data-primary-key="0"> <?= cclang('status_tag') ?></th>
                                    <th style="text-align: center">Description</th>                        
                                </tr>
                                </thead>
                                <tbody id="tbody_ug_mstag">
                                    <?= $tables ?>
                                </tbody>
                            </table> -->

                        </div>
                        
                        <div class="message"></div>

                        <div class="row-fluid col-md-7 container-button-bottom">

                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i>Searching RFID Tag...</i>
                            </span>

                        </div>

                    </section>
                    
                    <h3>Pilih Area</h3>
                
                    <section>
                        
                        <div class="form-group group-id_area ">
                            <label for="id_area" class="col-sm-2 control-label">Id Area                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_area" id="id_area" data-placeholder="Select Id Area">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_master_area') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->area; ?></option>
                                    <?php endforeach; ?>                                 </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-id_gedung ">
                            <label for="id_gedung" class="col-sm-2 control-label">Id Gedung                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_gedung" id="id_gedung" data-placeholder="Select Id Gedung">
                                    <option value=""></option>
                                                                    </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-id_ruangan ">
                            <label for="id_ruangan" class="col-sm-2 control-label">Id Ruangan                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_ruangan" id="id_ruangan" data-placeholder="Select Id Ruangan">
                                    <option value=""></option>
                                                                    </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="row-fluid col-md-7 container-button-bottom">

                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>

                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">
                            </div>

                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>

                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>

                        </div>

                    </section>


                <div class="message"></div>

                <?= form_close(); ?>

            </div>

            <div class="row">
                    
                                <div class="col-md-4">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                                        <div class="table-pagination"><?= $pagination; ?></div>
                                    </div>
                                </div>

                            </div>

        </div>

    </div>

</div>

</div>

</section>

<script>
  var module_name = "tb_master_transaksi"
  var use_ajax_crud = false
</script>

<!-- <script src="<?= BASE_ASSET ?>js/filter.js"></script> -->

<script type="text/javascript">

    function RemoveParameterFromUrl(url, parameter) {
        return url
            .replace(new RegExp('[?&]' + parameter + '=[^&#]*(#.*)?$'), '$1')
            .replace(new RegExp('([?&])' + parameter + '=[^&]*&'), '$1');
    }

    function reloadDataTable(url) {
        var pushurl = RemoveParameterFromUrl(url, 'ajax');
        
        //window.history.pushState('page2', 'Title', pushurl);
        // alert(url);

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

    function initSortableAjax(module_name, table) {

        module_name = module_name
        // http://localhost/rfid_monitoring/administrator/ug_mstag
        // http://localhost/rfid_monitoring/administrator/tb_master_transaksi/datatable_aset_master
        // var url = new URL(window.location);

        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master';
        // alert(url);

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
                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master?ajax=1&st=' + st + '&sb=' + sb + '&q=' + (q ? q : '') + '&f=' + (f ? f : '') + '&filter=' + (filter ? filter : '')
                    // alert(url);
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
                // alert(url);

                var location = new URL(url);
                var filter = location.searchParams.get("filter");
                var q = location.searchParams.get("q");

                // var regex = /index\/(\d+)/;
                var regex = /datatable_aset_master\/(\d+)/;
                var matches = regex.exec(url);

                if (matches == null) {
                    page = '';
                } else {
                    page = matches[1];
                }
                var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master/' + page + '?ajax=1&q=' + (q ? q : '') + '&filter=' + (filter ? filter : '')
                reloadDataTable(url);
            }
        });

    }
</script>

<script>
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
            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master/?ajax=1&filter=' + json
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
            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master' + '?ajax=1&q=' + $('#filter').val() + '&f=' + $('#field').val()
            // alert(url);
            reloadDataTable(url)
        });

        $('a#reset').on('click', function (event) {
            event.preventDefault();
            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master' + '?ajax=1';
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

            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master' + '/export?q=' + (q ? q : '') + '&f=' + (f ? f : '') + '&filter=' + (filter ? filter : '')

            window.location = url;
        });

        $('.btn-export-pdf').click(function (event) {
            event.preventDefault();
            var url = window.location;
            var location = new URL(url);
            var filter = location.searchParams.get("filter");
            var q = location.searchParams.get("q");
            var f = location.searchParams.get("f");

            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/datatable_aset_master' + '/export_pdf?q=' + (q ? q : '') + '&f=' + (f ? f : '') + '&filter=' + (filter ? filter : '')

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
                                        var url = `${BASE_URL}/${ADMIN_NAMESPACE_URL}/${module_name}/datatable_aset_master/?ajax=1`

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

    $(document).ready(function() {

        "use strict";
        window.event_submit_and_action = '';
                    
        $('.container-button-bottom').hide();
            
        $('.form-step').steps({
            headerTag: 'h3',
            bodyTag: 'section',
            autoFocus: true,
            enableAllSteps: true,
            onFinishing: function() {
                $('.btn_save_back').trigger('click')
            },
            labels: {
                finish: 'save'
            }
        });
            
        $('.custom-button-wrapper').appendTo('.actions')

        $('#id_area').change(function(event) {
            var val = $(this).val();
            $.LoadingOverlay('show')
            $.ajax({
                    url: ADMIN_BASE_URL + '/tb_master_transaksi/ajax_id_gedung/' + val,
                    dataType: 'JSON',
                })
                .done(function(res) {
                    var html = '<option value=""></option>';
                    $.each(res, function(index, val) {
                        html += '<option value="' + val.id + '">' + val.gedung + '</option>'
                    });
                    $('#id_gedung').html(html);
                    $('#id_gedung').trigger('chosen:updated');

                })
                .fail(function() {
                    toastr['error']('Error', 'Getting data fail')
                })
                .always(function() {
                    $.LoadingOverlay('hide')
                });

        });

        $('#id_gedung').change(function(event) {
            var val = $(this).val();
            $.LoadingOverlay('show')
            $.ajax({
                    url: ADMIN_BASE_URL + '/tb_master_transaksi/ajax_id_ruangan/' + val,
                    dataType: 'JSON',
                })
                .done(function(res) {
                    var html = '<option value=""></option>';
                    $.each(res, function(index, val) {
                        html += '<option value="' + val.id + '">' + val.ruangan + '</option>'
                    });
                    $('#id_ruangan').html(html);
                    $('#id_ruangan').trigger('chosen:updated');

                })
                .fail(function() {
                    toastr['error']('Error', 'Getting data fail')
                })
                .always(function() {
                    $.LoadingOverlay('hide')
                });

        });

    
        //check all
        var checkAll = $('#check_all');
        var checkboxes = $('input.check');

        checkAll.on('ifChecked ifUnchecked', function(event) {   
            if (event.type == 'ifChecked') {
                checkboxes.iCheck('check');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });

        checkboxes.on('ifChanged', function(event){
            if(checkboxes.filter(':checked').length == checkboxes.length) {
                checkAll.prop('checked', 'checked');
            } else {
                checkAll.removeProp('checked');
            }
            checkAll.iCheck('update');
        });

        initSortableAjax('tb_master_transaksi', $('table.dataTable'));

    }); /*end doc ready*/
</script>