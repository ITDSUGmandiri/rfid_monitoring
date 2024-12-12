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
<section class="content-header">
    <h1>
        <small>Edit Data Aset</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_aset'); ?>">Master Aset</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
</style>
<?php if ($this->session->flashdata('success')) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Simpan Data...",
            text: "Aset berhasil diperbarui",
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
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <?php foreach ($tb_master_aset as $value): ?>

                        <div class="box box-widget widget-user-2">
                            <!-- <div class="widget-user-header ">
                                <div class="widget-user-image">
                                    <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                                </div>
                                <h3 class="widget-user-username">Tb Master Aset</h3>
                                <h5 class="widget-user-desc">Edit Tb Master Aset</h5>
                                <hr>
                            </div> -->
                            <?= form_open(admin_base_url('/tb_master_aset/edit_save/' . $this->uri->segment(4)), [
                                'name' => 'form_tb_master_aset_edit',
                                'class' => 'form-horizontal form-step',
                                'id' => 'form_tb_master_aset_edit',
                                'enctype' => 'multipart/form-data',
                                'method' => 'POST'
                            ]); ?>

                            <?php
                            $user_groups = $this->model_group->get_user_group_ids();
                            ?>


                            <div class="form-group group-kode_aset ">
                                <label for="kode_aset" class="col-sm-2 control-label">Kode Aset <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="kode_aset" id="kode_aset" placeholder="Kode Aset" value="<?= $value->kode_aset; ?>">
                                    <small class="info help-block">
                                        <b>Input Kode Aset</b> Max Length : 50.</small>
                                </div>
                            </div>


                            <div class="form-group group-nup ">
                                <label for="nup" class="col-sm-2 control-label">Nup <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nup" id="nup" placeholder="Nup" value="<?= $value->nup; ?>">
                                    <small class="info help-block">
                                        <b>Input Nup</b> Max Length : 50.</small>
                                </div>
                            </div>

                            <div class="form-group group-nama_aset ">
                                <label for="nama_aset" class="col-sm-2 control-label">Nama Aset <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_aset" id="nama_aset" placeholder="Nama Aset" value="<?= $value->nama_aset; ?>">
                                    <small class="info help-block">
                                        <b>Input Nama Aset</b> Max Length : 100.</small>
                                </div>
                            </div>
                            <div class="form-group group-merk ">
                                <label for="merk" class="col-sm-2 control-label">Merk <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?= $value->merk; ?>">
                                    <small class="info help-block">
                                        <b>Input Merk</b> Max Length : 50.</small>
                                </div>
                            </div>


                            <div class="form-group group-tipe ">
                                <label for="tipe" class="col-sm-2 control-label">Tipe <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?= $value->tipe; ?>">
                                    <small class="info help-block">
                                        <b>Input Tipe</b> Max Length : 50.</small>
                                </div>
                            </div>



                            <div class="form-group group-kategori ">
                                <label for="kategori" class="col-sm-2 control-label">Kategori <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="kategori" id="kategori" tabi-ndex="5" placeholder="Select Kategori">

                                        <option value="0">Pilih Kategori</option>

                                        <?php foreach (db_get_all_data('tb_master_kategori') as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= ucwords($row->kategori); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        Select one category.
                                    </small>
                                </div>
                            </div>

                            <div class="form-group group-kategori">

                                <label for="kategori" class="col-sm-2 control-label">Area <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="area" id="area" tabi-ndex="5" placeholder="Select Area">
                                        <option value="0">Pilih Area</option>

                                        <?php foreach (db_get_all_data('tb_master_area') as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= ucwords($row->area); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        Pilih Area.
                                    </small>
                                </div>

                            </div>
                            <div class="form-group group-kategori">

                                <label for="kategori" class="col-sm-2 control-label">Gedung <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="gedung" id="gedung" tabi-ndex="5" placeholder="Select Kategori">
                                        <option value="0">Pilih Gedung</option>

                                        <?php foreach (db_get_all_data('tb_master_gedung') as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= ucwords($row->gedung); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        Pilih Gedung.
                                    </small>
                                </div>

                            </div>
                            <div class="form-group group-kategori">

                                <label for="kategori" class="col-sm-2 control-label">Ruangan <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="room" id="room" tabi-ndex="5" placeholder="Select Kategori">
                                        <option value="0">Pilih Ruangan</option>

                                        <?php foreach (db_get_all_data('tb_master_ruangan') as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= ucwords($row->ruangan); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        Pilih Ruangan.
                                    </small>
                                </div>

                            </div>
                            <div class="form-group group-kategori">

                                <label for="kategori" class="col-sm-2 control-label">Penanggung Jawab <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select" name="pic" id="pic" tabi-ndex="5" placeholder="Select Kategori">
                                        <option value="0">Pilih PIC</option>

                                        <?php foreach (db_get_all_data('tb_master_pegawai') as $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= ucwords($row->nama); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                        Pilih PIC.
                                    </small>
                                </div>

                            </div>

                            <div class="form-group group-tgl_perolehan ">
                                <label for="tgl_perolehan" class="col-sm-2 control-label">Tgl Perolehan <i class="required">*</i>
                                </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datetimepicker" value="<?= $value->tgl_perolehan; ?>" name="tgl_perolehan" id="tgl_perolehan">
                                    </div>
                                    <small class="info help-block">
                                    </small>
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="username" class="col-sm-2 control-label">Foto Aset Saat ini</label>

                                <div class="col-sm-1">
                                    <?php if ($value->image_uri != '') { ?>
                                        <img src="<?= base_url($value->kategori === 1 ? 'uploads/Seni/' . $value->image_uri  : 'uploads/Elektronik/' . $value->image_uri) ?>" alt="tidak ada foto" width="50" />

                                    <?php } else { ?>
                                        tidak ada foto
                                    <?php } ?>
                                </div>
                                <div>
                                    <label for="choose-file" class="custom-file-upload" id="choose-file-label">
                                        Ganti Foto
                                    </label>
                                    <input name="fotoaset" type="file" id="choose-file"
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
<!-- 
<script>
    var module_name = "tb_master_aset"
    var use_ajax_crud = false
</script> -->


<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';








        $('#btn_cancel').click(function() {
            swal({
                    title: "Batalkan Perubahan?",
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

        // 


    }); /*end doc ready*/
</script>