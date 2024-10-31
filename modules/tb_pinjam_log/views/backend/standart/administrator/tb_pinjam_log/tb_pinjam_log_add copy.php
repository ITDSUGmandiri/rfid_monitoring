
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
        Tb Pinjam Log        <small><?= cclang('new', ['Tb Pinjam Log']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_pinjam_log'); ?>">Tb Pinjam Log</a></li>
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
                            <h3 class="widget-user-username">Tb Pinjam Log</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Tb Pinjam Log']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_tb_pinjam_log_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tb_pinjam_log_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                        <div class="form-group group-tanggal_pinjam ">
                            <label for="tanggal_pinjam" class="col-sm-2 control-label">Tanggal Pinjam                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal_pinjam" placeholder="Tanggal Pinjam" id="tanggal_pinjam">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-waktu_pinjam ">
                            <label for="waktu_pinjam" class="col-sm-2 control-label">Waktu Pinjam                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="waktu_pinjam" id="waktu_pinjam">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tanggal_kembali ">
                            <label for="tanggal_kembali" class="col-sm-2 control-label">Tanggal Kembali                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal_kembali" placeholder="Tanggal Kembali" id="tanggal_kembali">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-waktu_kembali ">
                            <label for="waktu_kembali" class="col-sm-2 control-label">Waktu Kembali                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="waktu_kembali" id="waktu_kembali">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-lend_id ">
                            <label for="lend_id" class="col-sm-2 control-label">Lend Id                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="lend_id" id="lend_id" data-placeholder="Select Lend Id">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [
                                    ];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_pegawai_master', $conditions) as $row): ?>
                                    <option value="<?= $row->NIP ?>"><?= $row->Pegawai; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    <b>Input Lend Id</b> Max Length : 255.</small>
                            </div>
                        </div>

                    

    <div class="form-group group-peminjam ">
                            <label for="peminjam" class="col-sm-2 control-label">Peminjam                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="peminjam" id="peminjam" placeholder="Peminjam" value="<?= set_value('peminjam'); ?>">
                                <small class="info help-block">
                                    <b>Input Peminjam</b> Max Length : 255.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-job ">
                            <label for="job" class="col-sm-2 control-label">Job                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="job" id="job" data-placeholder="Select Job">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [
                                    ];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_kelompok_kerjaan', $conditions) as $row): ?>
                                    <option value="<?= $row->kode ?>"><?= $row->jenis; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    <b>Input Job</b> Max Length : 255.</small>
                            </div>
                        </div>

                    

    <div class="form-group group-alamat ">
                            <label for="alamat" class="col-sm-2 control-label">Alamat                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                <small class="info help-block">
                                    <b>Input Alamat</b> Max Length : 255.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-telp ">
                            <label for="telp" class="col-sm-2 control-label">Telp                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?= set_value('telp'); ?>">
                                <small class="info help-block">
                                    <b>Input Telp</b> Max Length : 11.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-tag_code ">
                            <label for="tag_code" class="col-sm-2 control-label">Aset                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="tag_code[]" id="tag_code" data-placeholder="Select Aset" multiple>
                                    <option value=""></option>

                                    <?php
                                    $conditions = [
                                    ];
                                    ?>
                                    <?php foreach (db_get_all_data('tb_asset_master', $conditions) as $row): ?>
                                    <option value="<?= $row->tag_code ?>"><?= $row->nama_brg; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    Pilih Aset yang di Pinjam</small>
                            </div>
                        </div>
                    

    <div class="form-group  wrapper-options-crud">
                            <label for="status" class="col-sm-2 control-label">Status                                </label>
                            <div class="col-sm-8">
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="status" value="1"> Selesai                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="status" value="2"> Pinjam                                        </label>
                                    </div>
                                </select>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        </div>
                    

    

    <div class="message"></div>
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
<?= form_close(); ?>
</div>
</div>
</div>
</div>
</div>
</section>

<script>
  var module_name = "tb_pinjam_log"
  var use_ajax_crud = false
</script>

<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';

        


        

                    
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
                    window.location.href = ADMIN_BASE_URL + '/tb_pinjam_log';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tb_pinjam_log = $('#form_tb_pinjam_log_add');
    var data_post = form_tb_pinjam_log.serializeArray();
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
            url: ADMIN_BASE_URL + '/tb_pinjam_log/add_save',
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

                var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_pinjam_log/index/?ajax=1'
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

    

    

    


    }); /*end doc ready*/
</script>