
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
        Tb Master Aset        <small><?= cclang('new', ['Tb Master Aset']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_aset'); ?>">Tb Master Aset</a></li>
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
                            <h3 class="widget-user-username">Tb Master Aset</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Tb Master Aset']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_tb_master_aset_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tb_master_aset_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                        <div class="form-group group-kode_tid ">
                            <label for="kode_tid" class="col-sm-2 control-label">Kode Tid                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="kode_tid" id="kode_tid" placeholder="Kode Tid" value="<?= set_value('kode_tid'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-kode_aset ">
                            <label for="kode_aset" class="col-sm-2 control-label">Kode Aset                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_aset" id="kode_aset" placeholder="Kode Aset" value="<?= set_value('kode_aset'); ?>">
                                <small class="info help-block">
                                    <b>Input Kode Aset</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-nup ">
                            <label for="nup" class="col-sm-2 control-label">Nup                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nup" id="nup" placeholder="Nup" value="<?= set_value('nup'); ?>">
                                <small class="info help-block">
                                    <b>Input Nup</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-kategori ">
                            <label for="kategori" class="col-sm-2 control-label">Kategori                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?= set_value('kategori'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-merk ">
                            <label for="merk" class="col-sm-2 control-label">Merk                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?= set_value('merk'); ?>">
                                <small class="info help-block">
                                    <b>Input Merk</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-tipe ">
                            <label for="tipe" class="col-sm-2 control-label">Tipe                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?= set_value('tipe'); ?>">
                                <small class="info help-block">
                                    <b>Input Tipe</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-id_kondisi ">
                            <label for="id_kondisi" class="col-sm-2 control-label">Id Kondisi                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_kondisi" id="id_kondisi" placeholder="Id Kondisi" value="<?= set_value('id_kondisi'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-status ">
                            <label for="status" class="col-sm-2 control-label">Status                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="status" id="status" placeholder="Status" value="<?= set_value('status'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tipe_moving ">
                            <label for="tipe_moving" class="col-sm-2 control-label">Tipe Moving                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tipe_moving" id="tipe_moving" placeholder="Tipe Moving" value="<?= set_value('tipe_moving'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-nama_aset ">
                            <label for="nama_aset" class="col-sm-2 control-label">Nama Aset                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_aset" id="nama_aset" placeholder="Nama Aset" value="<?= set_value('nama_aset'); ?>">
                                <small class="info help-block">
                                    <b>Input Nama Aset</b> Max Length : 100.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-id_area ">
                            <label for="id_area" class="col-sm-2 control-label">Id Area                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_area" id="id_area" placeholder="Id Area" value="<?= set_value('id_area'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-id_gedung ">
                            <label for="id_gedung" class="col-sm-2 control-label">Id Gedung                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_gedung" id="id_gedung" placeholder="Id Gedung" value="<?= set_value('id_gedung'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-id_ruangan ">
                            <label for="id_ruangan" class="col-sm-2 control-label">Id Ruangan                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_ruangan" id="id_ruangan" placeholder="Id Ruangan" value="<?= set_value('id_ruangan'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tgl_perolehan ">
                            <label for="tgl_perolehan" class="col-sm-2 control-label">Tgl Perolehan                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datetimepicker" name="tgl_perolehan" id="tgl_perolehan">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tgl_inventarisasi ">
                            <label for="tgl_inventarisasi" class="col-sm-2 control-label">Tgl Inventarisasi                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datetimepicker" name="tgl_inventarisasi" id="tgl_inventarisasi">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-flag_inventarisasi ">
                            <label for="flag_inventarisasi" class="col-sm-2 control-label">Flag Inventarisasi                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="flag_inventarisasi" id="flag_inventarisasi" placeholder="Flag Inventarisasi" value="<?= set_value('flag_inventarisasi'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tgl_peminjaman ">
                            <label for="tgl_peminjaman" class="col-sm-2 control-label">Tgl Peminjaman                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datetimepicker" name="tgl_peminjaman" id="tgl_peminjaman">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tgl_pengembalian ">
                            <label for="tgl_pengembalian" class="col-sm-2 control-label">Tgl Pengembalian                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datetimepicker" name="tgl_pengembalian" id="tgl_pengembalian">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-tgl_mutasi ">
                            <label for="tgl_mutasi" class="col-sm-2 control-label">Tgl Mutasi                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datetimepicker" name="tgl_mutasi" id="tgl_mutasi">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-id_lokasi_moving ">
                            <label for="id_lokasi_moving" class="col-sm-2 control-label">Id Lokasi Moving                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_lokasi_moving" id="id_lokasi_moving" placeholder="Id Lokasi Moving" value="<?= set_value('id_lokasi_moving'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-id_pegawai ">
                            <label for="id_pegawai" class="col-sm-2 control-label">Id Pegawai                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_pegawai" id="id_pegawai" placeholder="Id Pegawai" value="<?= set_value('id_pegawai'); ?>">
                                <small class="info help-block">
                                    </small>
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
  var module_name = "tb_master_aset"
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
                    window.location.href = ADMIN_BASE_URL + '/tb_master_aset';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tb_master_aset = $('#form_tb_master_aset_add');
    var data_post = form_tb_master_aset.serializeArray();
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
            url: ADMIN_BASE_URL + '/tb_master_aset/add_save',
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

                var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_master_aset/index/?ajax=1'
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