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
<?php if ($this->session->flashdata('success')) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Simpan Data...",
            text: "Pegawai berhasil ditambahkan",
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('failsave')) { ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Data gagal disimpan, Periksa kembali inputan Anda!",
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('err_val')) { ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Terdapat masalah validasi, silahkan cek isian data anda!",
        });
    </script>
<?php } ?>
<section class="content-header">
    <h1>
        Halaman Tambah Data Pegawai </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_pegawai_master'); ?>">Master Pegawai</a></li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/iconpegawai.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Pegawai</h3>
                            <h5 class="widget-user-desc">Silahkan Lengkapi Data Pegawai baru</h5>
                            <hr>
                        </div>
                        <?= form_open('administrator/tb_master_pegawai/add_save', [
                            'name' => 'form_tb_pegawai_master_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tb_pegawai_master_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                        <div class="form-group group-NIP ">
                            <label for="NIP" class="col-sm-2 control-label">NIP <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nip" id="NIP" placeholder="NIP" value="<?= set_value('NIP'); ?>">
                                <small class="info help-block">
                                    <b>Input NIP</b> Max Length : 11.</small>
                            </div>
                        </div>


                        <div class="form-group group-Pegawai ">
                            <label for="Pegawai" class="col-sm-2 control-label">Pegawai <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pegawai" id="Pegawai" placeholder="Pegawai" value="<?= set_value('Pegawai'); ?>">
                                <small class="info help-block">
                                    <b>Input Pegawai</b> Max Length : 30.</small>
                            </div>
                        </div>


                        <div class="form-group group-Jabatan ">
                            <label for="Jabatan" class="col-sm-2 control-label">Jabatan <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jabatan" id="Jabatan" placeholder="Jabatan" value="<?= set_value('Jabatan'); ?>">
                                <small class="info help-block">
                                    <b>Input Jabatan</b> Max Length : 30.</small>
                            </div>
                        </div>


                        <div class="form-group group-Telp ">
                            <label for="Telp" class="col-sm-2 control-label">Telp <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="telp" id="Telp" placeholder="Telp" value="<?= set_value('Telp'); ?>">
                                <small class="info help-block">
                                    <b>Input Telp</b> Max Length : 11.</small>
                            </div>
                        </div>


                        <div class="form-group group-Alamat ">
                            <label for="Alamat" class="col-sm-2 control-label">Alamat <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alamat" id="Alamat" placeholder="Alamat" value="<?= set_value('Alamat'); ?>">
                                <small class="info help-block">
                                    <b>Input Alamat</b> Max Length : 30.</small>
                            </div>
                        </div>


                        <div class="form-group group-Email ">
                            <label for="Email" class="col-sm-2 control-label">Email <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" id="Email" placeholder="Email" value="<?= set_value('Email'); ?>">
                                <small class="info help-block">
                                    <b>Input Email</b> Max Length : 30.</small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="username" class="col-sm-2 control-label">Foto Pegawai</label>

                            <div class="col-sm-8">
                                <input type="file" name="fotopegawai" required="required">
                                <small class="info help-block">
                                    Ekstensi yang diperbolehkan .png | .jpg | .jpeg
                                </small>
                            </div>
                        </div>





                        <div class="message"></div>
                        <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <!-- <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a> -->

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

<!-- <script>
    var module_name = "tb_pegawai_master"
    var use_ajax_crud = false
</script> -->

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
                        window.location.href = ADMIN_BASE_URL + '/tb_pegawai_master';
                    }
                });

            return false;
        }); /*end btn cancel*/

        // $('.btn_save').click(function() {
        //     $('.message').fadeOut();

        //     var form_tb_pegawai_master = $('#form_tb_pegawai_master_add');
        //     var data_post = form_tb_pegawai_master.serializeArray();
        //     var save_type = $(this).attr('data-stype');

        //     data_post.push({
        //         name: 'save_type',
        //         value: save_type
        //     });

        //     data_post.push({
        //         name: 'event_submit_and_action',
        //         value: window.event_submit_and_action
        //     });



        //     $('.loading').show();

        //     $.ajax({
        //             url: ADMIN_BASE_URL + '/tb_pegawai_master/add_save',
        //             type: 'POST',
        //             dataType: 'json',
        //             data: data_post,
        //         })
        //         .done(function(res) {
        //             $('form').find('.form-group').removeClass('has-error');
        //             $('.steps li').removeClass('error');
        //             $('form').find('.error-input').remove();
        //             if (res.success) {

        //                 if (save_type == 'back') {
        //                     window.location.href = res.redirect;
        //                     return;
        //                 }

        //                 if (use_ajax_crud) {
        //                     toastr['success'](res.message)
        //                 } else {

        //                     $('.message').printMessage({
        //                         message: res.message
        //                     });
        //                     $('.message').fadeIn();
        //                 }
        //                 showPopup(false)


        //                 resetForm();
        //                 $('.chosen option').prop('selected', false).trigger('chosen:updated');

        //             } else {
        //                 if (res.errors) {

        //                     $.each(res.errors, function(index, val) {
        //                         $('form #' + index).parents('.form-group').addClass('has-error');
        //                         $('form #' + index).parents('.form-group').find('small').prepend(`
        //               <div class="error-input">` + val + `</div>
        //               `);
        //                     });
        //                     $('.steps li').removeClass('error');
        //                     $('.content section').each(function(index, el) {
        //                         if ($(this).find('.has-error').length) {
        //                             $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
        //                         }
        //                     });
        //                 }
        //                 $('.message').printMessage({
        //                     message: res.message,
        //                     type: 'warning'
        //                 });
        //             }

        //             if (use_ajax_crud == true) {

        //                 var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_pegawai_master/index/?ajax=1'
        //                 reloadDataTable(url);
        //             }

        //         })
        //         .fail(function() {
        //             $('.message').printMessage({
        //                 message: 'Error save data',
        //                 type: 'warning'
        //             });
        //         })
        //         .always(function() {
        //             $('.loading').hide();
        //             $('html, body').animate({
        //                 scrollTop: $(document).height()
        //             }, 2000);
        //         });

        //     return false;
        // }); /*end btn save*/








    }); /*end doc ready*/
</script>