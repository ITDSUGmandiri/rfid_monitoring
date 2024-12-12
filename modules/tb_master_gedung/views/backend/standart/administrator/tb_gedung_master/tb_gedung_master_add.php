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
            text: "Gedung berhasil ditambahkan",
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
        Halaman Tambah Data Gedung</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_gedung'); ?>">Master Gedung</a></li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/icongedung.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Gedung</h3>
                            <h5 class="widget-user-desc">Silahkan Lengkapi Data Gedung baru</h5>
                            <hr>
                        </div>
                        <?= form_open('administrator/tb_master_gedung/add_save', [
                            'name' => 'form_tb_gedung_master_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tb_gedung_master_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                        <div class="form-group group-area_id ">
                            <label for="area_id" class="col-sm-2 control-label">Nama Area <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="area_id" id="area_id" data-placeholder="Select Area">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_master_area', $conditions) as $row): ?>
                                        <option value="<?= $row->id ?>"><?= $row->area; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <div class="form-group group-kode_gedung ">
                            <label for="kode_gedung" class="col-sm-2 control-label">Nama Gedung <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="gedung" id="gedung" placeholder="Nama Gedung" value="<?= set_value('gedung'); ?>">
                                <small class="info help-block">
                                    <b>Input Kode Gedung</b> Max Length : 255.</small>
                            </div>
                        </div>


                        <div class="form-group group-gedung ">
                            <label for="gedung" class="col-sm-2 control-label">Keterangan Gedung <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ketgedung" id="ket_gedung" placeholder="Keterangan Gedung" value="<?= set_value('ket_gedung'); ?>">
                                <small class="info help-block">
                                    <b>Input Gedung</b> Max Length : 255.</small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="username" class="col-sm-2 control-label">Foto Gedung</label>

                            <div class="col-sm-8">
                                <input type="file" name="fotogedung" required="required">
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
    var module_name = "tb_gedung_master";
    var use_ajax_crud = false;
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
                        window.location.href = ADMIN_BASE_URL + '/tb_gedung_master';
                    }
                });

            return false;
        }); /*end btn cancel*/

        // $('.btn_save').click(function() {
        //     $('.message').fadeOut();

        //     var form_tb_gedung_master = $('#form_tb_gedung_master_add');
        //     var data_post = form_tb_gedung_master.serializeArray();
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
        //             url: ADMIN_BASE_URL + '/tb_gedung_master/add_save',
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

        //                 var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_gedung_master/index/?ajax=1'
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