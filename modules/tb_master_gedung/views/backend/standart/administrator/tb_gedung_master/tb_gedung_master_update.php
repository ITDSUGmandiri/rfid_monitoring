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
<?php if ($this->session->flashdata('success')) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Simpan Data...",
            text: "Gedung berhasil diperbarui",
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
        <small>Halaman Edit Data Gedung</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_gedung'); ?>">Master Gedung</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <?php foreach ($tb_master_gedung as $value): ?>

                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header ">
                                <div class="widget-user-image">
                                    <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                                </div>
                                <h3 class="widget-user-username">Data <?= $value->gedung ?></h3>
                                <h5 class="widget-user-desc">Ubah Data</h5>
                                <hr>
                            </div>
                            <?= form_open(admin_base_url('/tb_master_gedung/edit_save/' . $this->uri->segment(4)), [
                                'name' => 'form_tb_area_master_edit',
                                'class' => 'form-horizontal form-step',
                                'id' => 'form_tb_area_master_edit',
                                'enctype' => 'multipart/form-data',
                                'method' => 'POST'
                            ]); ?>

                            <?php
                            $user_groups = $this->model_group->get_user_group_ids();
                            ?>



                            <div class="form-group group-area_id">
                                <label for="area_id" class="col-sm-2 control-label">Nama Area <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="area" id="area_id" data-placeholder="Select Area">
                                        <option value=""></option>
                                        <?php
                                        $conditions = [];
                                        ?>
                                        <?php foreach (db_get_all_data('tb_master_area', $conditions) as $row): ?>
                                            <option <?= $row->id == $value->id_area ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->area; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                    </small>
                                </div>
                            </div>

                            <div class="form-group group-kota  ">
                                <label for="kota" class="col-sm-2 control-label">Nama Gedung <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="gedung" id="gedung" placeholder="" value="<?= set_value('area', $value->gedung); ?>">
                                    <small class="info help-block">
                                        <b>Input Area</b> Max Length : 50.</small>
                                </div>
                            </div>






                            <div class="form-group group-alamat  ">
                                <label for="alamat" class="col-sm-2 control-label">Keterangan Gedung <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ket_gedung" id="ket_gedung" placeholder="" value="<?= set_value('ket_gedung', $value->ket_gedung); ?>">
                                    <small class="info help-block">
                                        <b>Input Keterangan Area</b> Max Length : 130.</small>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="username" class="col-sm-2 control-label">Foto Gedung Saat ini</label>

                                <div class="col-sm-1">
                                    <?php if ($value->image_uri != '') { ?>
                                        <img src="<?= base_url('uploads/Gedung/' .  $value->image_uri) ?>" alt="tidak ada foto" width="50" />

                                    <?php } else { ?>
                                        tidak ada foto
                                    <?php } ?>
                                </div>
                                <div>
                                    <label for="choose-file" class="custom-file-upload" id="choose-file-label">
                                        Ganti Foto
                                    </label>
                                    <input name="fotogedung" type="file" id="choose-file"
                                        accept=".jpg,.jpeg,.png" style="display: none;" />
                                </div>
                            </div>









                            <div class="message"></div>
                            <div class="row-fluid col-md-7 container-button-bottom">
                                <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                    <i class="fa fa-save"></i> Perbarui Data
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
            <?php endforeach; ?>

            <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>

<!-- <script>
    var module_name = "tb_area_master"
    var use_ajax_crud = false
</script> -->


<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';








        $('#btn_cancel').click(function() {
            swal({
                    title: "Batalkan Perubahan?",
                    // text: "the data that you have created will be in the exhaust!",
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
                        window.location.href = ADMIN_BASE_URL + '/tb_master_gedung';
                    }
                });

            return false;
        }); /*end btn cancel*/

        // $('.btn_save').click(function() {
        //     $('.message').fadeOut();

        //     var form_tb_area_master = $('#form_tb_area_master_edit');
        //     var data_post = form_tb_area_master.serializeArray();
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
        //             url: form_tb_area_master.attr('action'),
        //             type: 'POST',
        //             dataType: 'json',
        //             data: data_post,
        //         })
        //         .done(function(res) {
        //             $('form').find('.form-group').removeClass('has-error');
        //             $('form').find('.error-input').remove();
        //             $('.steps li').removeClass('error');
        //             if (res.success) {
        //                 var id = $('#tb_area_master_image_galery').find('li').attr('qq-file-id');
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
        //                 $('.data_file_uuid').val('');
        //                 showPopup(false)

        //                 if (use_ajax_crud == true) {

        //                     var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_area_master/index/?ajax=1'
        //                     reloadDataTable(url);
        //                 }



        //             } else {
        //                 if (res.errors) {
        //                     parseErrorField(res.errors);
        //                 }
        //                 $('.message').printMessage({
        //                     message: res.message,
        //                     type: 'warning'
        //                 });
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





        // async function chain() {}

        // chain();




    }); /*end doc ready*/
</script>