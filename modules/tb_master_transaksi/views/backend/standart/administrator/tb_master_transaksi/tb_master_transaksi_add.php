<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    // function domo() {

    //     $('*').bind('keydown', 'Ctrl+s', function() {
    //         $('#btn_save').trigger('click');
    //         return false;
    //     });

    //     $('*').bind('keydown', 'Ctrl+x', function() {
    //         $('#btn_cancel').trigger('click');
    //         return false;
    //     });

    //     $('*').bind('keydown', 'Ctrl+d', function() {
    //         $('.btn_save_back').trigger('click');
    //         return false;
    //     });

    // }

    // jQuery(document).ready(domo);
</script>

<style>
    
</style>

<section class="content-header">
    <h1>    
    Register Aset<small><?= cclang('new', ['Register Aset']); ?></small>
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
                            <h3 class="widget-user-username">Register Aset</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Register Aset']); ?></h5>
                            <hr>
                        </div>

                        <?= form_open('', [
                            'name' => 'form_tb_master_transaksi_add',
                            // 'class' => 'form-horizontal form-step',
                            'class' => 'form-step',
                            'id' => 'form_tb_master_transaksi_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                    <h3>Form Register</h3>

                    <section>
                        
                        <div class="form-group group-tipe_transaksi ">
                            <label for="tipe_transaksi" class="col-sm-2 control-label">Tipe Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="tipe_transaksi" id="tipe_transaksi" data-placeholder="Select Tipe Transaksi">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [
                                    ];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_master_type_transaksi', $conditions) as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->tipe_transaksi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-status_transaksi ">
                            <label for="status_transaksi" class="col-sm-2 control-label">Status Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="Status Transaksi" value="<?= set_value('status_transaksi'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    
                        <div class="form-group group-tgl_awal_transaksi ">
                            <label for="tgl_awal_transaksi" class="col-sm-2 control-label">Tgl Awal Transaksi<i class="required">*</i>
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

                        <div class="form-group group-id_pegawai_input ">
                            <label for="id_pegawai_input" class="col-sm-2 control-label">Id Pegawai Input</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_pegawai_input" id="id_pegawai_input" placeholder="Id Pegawai Input" value="<?= set_value('id_pegawai_input'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-nama_pegawai_input ">
                            <label for="nama_pegawai_input" class="col-sm-2 control-label">Nama Pegawai Input</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_pegawai_input" id="nama_pegawai_input" placeholder="Nama Pegawai Input" value="<?= set_value('nama_pegawai_input'); ?>">
                                <small class="info help-block">
                                    <b>Input Nama Pegawai Input</b> Max Length : 100.</small>
                            </div>
                        </div>

                    </section>
                    
                    <h3>Pilih Aset</h3>

                    <section>

                        <div class="row">

                            <div class="col-md-8">
                                                                
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
                                            <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="javascript:void(0)" onclick="reload_datatables()" title="<?= cclang('reset_filter'); ?>">
                                                <i class="fa fa-undo"></i>
                                            </a>
                                        </div>
                                
                            </div>

                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                                
                                <table width="100%" class="table table-bordered table-striped" id="asetTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;" class="check"><input type="checkbox" id="checkall" value=""/></th>
                                            <th>No.</th>
                                            <th style="text-align: center;">Nama Aset</th>
                                            <th style="text-align: center;">Kode Aset</th>
                                            <th style="text-align: center;">Kode NUP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DataTable will populate the rows automatically -->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    
                    </section>

                    <h3>Pilih Area</h3>
                
                    <section>
                        
                        <div class="form-group group-id_area ">
                            <label for="id_area" class="col-sm-2 control-label">Area<i class="required">*</i>
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
                            <label for="id_gedung" class="col-sm-2 control-label">Gedung<i class="required">*</i>
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
                            <label for="id_ruangan" class="col-sm-2 control-label">Ruangan<i class="required">*</i>
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

                            <div class="custom-button-wrapper"></div>

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

            </div>

        </div>

    </div>

</div>

</section>

<button type="button" class="btn btn-primary" name="refresh" id="refresh" title="Refresh Aset"><i class="fa fa-refresh"></i>&nbsp;Refresh</button>

<script type="text/javascript">
  var module_name = "tb_master_transaksi"
  var use_ajax_crud = false
</script>

<script type="text/javascript">

    $(document).ready(function() {

        "use strict";
        window.event_submit_and_action = '';
        $('.container-button-bottom').hide();

        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/serverSideData';

        $('#asetTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: url,
                type: "POST",
                // data: function (d) {
                //     d.filter_id_parameter = $('#filter_id_parameter').val();
                // }
            },
            "order": [[3, 'asc']],
            columns: [
                {
                    "data": "checkbox_id_master_aset",
                    "className": "dt-center",
                    "orderable": false,
                    "searchable": false
                },
                { data: "id", className: "dt-center" },
                { data: "nama_aset", className: "dt-left" },
                { data: "kode_aset", className: "dt-left" },
                { data: "nup", className: "dt-center" },
                // { data: "Action", className: "dt-center", orderable: false, searchable: false },
            ]
        });

        $('#checkall').change(function(){
            var cells = $('#asetTable').find('tbody > tr > td:nth-child(2)');
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
        });
            
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

        
        $(document).on('click', '#refresh', function(event) {
            event.preventDefault();
            reload_datatables();
            return false;
        });
    
        $('#btn_cancel').click(function() {
                
            swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = ADMIN_BASE_URL + '/tb_master_transaksi';
                }
            });

            return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {

        $('.message').fadeOut();
        
        var form_tb_master_transaksi = $('#form_tb_master_transaksi_add');
        var data_post = form_tb_master_transaksi.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({
            name: 'save_type',
            value: save_type
        });

        data_post.push({
            name: 'event_submit_and_action',
            value: window.event_submit_and_action
        });   

        $('.loading').show();

        $.ajax({
                url: ADMIN_BASE_URL + '/tb_master_transaksi/add_save',
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {

                $('form').find('.form-group').removeClass('has-error');
                $('.steps li').removeClass('error');
                $('form').find('.error-input').remove();

                if (res.success) {
                    
                    if (save_type == 'back') {
                        window.location.href = res.redirect;
                        return;
                    }

                    if (use_ajax_crud) {
                        toastr['success'](res.message)
                    } else {

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();

                    }

                    showPopup(false)

                    resetForm();

                    $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
                } else {

                    if (res.errors) {

                        $.each(res.errors, function(index, val) {
                            $('form #' + index).parents('.form-group').addClass('has-error');
                            $('form #' + index).parents('.form-group').find('small').prepend(`
                        <div class="error-input">` + val + `</div>
                        `);
                        });
                        $('.steps li').removeClass('error');
                        $('.content section').each(function(index, el) {
                            if ($(this).find('.has-error').length) {
                                $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                            }
                        });
                    }

                    $('.message').printMessage({
                        message: res.message,
                        type: 'warning'
                    });

                }

                if (use_ajax_crud == true) {
                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_master_transaksi/index/?ajax=1'
                    reloadDataTable(url);
                }

            })
            .fail(function() {
                $('.message').printMessage({
                    message: 'Error save data',
                    type: 'warning'
                });
            })
            .always(function() {
                $('.loading').hide();
                $('html, body').animate({
                    scrollTop: $(document).height()
                }, 2000);
            });
            
        return false;
    }); /*end btn save*/

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

    }); /*end doc ready*/

    function reload_datatables() {
        var table = $('#asetTable').DataTable();
        table.ajax.reload();
    }
</script>