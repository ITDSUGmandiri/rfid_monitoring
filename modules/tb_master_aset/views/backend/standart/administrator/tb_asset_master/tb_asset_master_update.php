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
        Tb Asset Master <small>Edit Tb Asset Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_asset_master'); ?>">Tb Asset Master</a></li>
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
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Tb Asset Master</h3>
                            <h5 class="widget-user-desc">Edit Tb Asset Master</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tb_asset_master/edit_save/' . $this->uri->segment(4)), [
                            'name' => 'form_tb_asset_master_edit',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tb_asset_master_edit',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>



                        <div class="form-group group-kode_brg  ">
                            <label for="kode_brg" class="col-sm-2 control-label">Kode Brg </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_brg" id="kode_brg" placeholder="" value="<?= set_value('kode_brg', $tb_asset_master->kode_brg); ?>">
                                <small class="info help-block">
                                    <b>Input Kode Brg</b> Max Length : 15.</small>
                            </div>
                        </div>




                        <div class="form-group group-nup  ">
                            <label for="nup" class="col-sm-2 control-label">Nup </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nup" id="nup" placeholder="" value="<?= set_value('nup', $tb_asset_master->nup); ?>">
                                <small class="info help-block">
                                    <b>Input Nup</b> Max Length : 11.</small>
                            </div>
                        </div>




                        <div class="form-group group-tag_code  ">
                            <label for="tag_code" class="col-sm-2 control-label">Tag Code </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tag_code" id="tag_code" placeholder="" value="<?= set_value('tag_code', $tb_asset_master->tag_code); ?>">
                                <small class="info help-block">
                                    <b>Input Tag Code</b> Max Length : 15.</small>
                            </div>
                        </div>




                        <div class="form-group group-nama_brg  ">
                            <label for="nama_brg" class="col-sm-2 control-label">Nama Brg </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="" value="<?= set_value('nama_brg', $tb_asset_master->nama_brg); ?>">
                                <small class="info help-block">
                                    <b>Input Nama Brg</b> Max Length : 200.</small>
                            </div>
                        </div>




                        <div class="form-group group-Merk  ">
                            <label for="Merk" class="col-sm-2 control-label">Merk </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Merk" id="Merk" placeholder="" value="<?= set_value('Merk', $tb_asset_master->merk); ?>">
                                <small class="info help-block">
                                    <b>Input Merk</b> Max Length : 50.</small>
                            </div>
                        </div>




                        <div class="form-group group-Tipe  ">
                            <label for="Tipe" class="col-sm-2 control-label">Tipe </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Tipe" id="Tipe" placeholder="" value="<?= set_value('Tipe', $tb_asset_master->tipe); ?>">
                                <small class="info help-block">
                                    <b>Input Tipe</b> Max Length : 30.</small>
                            </div>
                        </div>




                        <div class="form-group group-Kondisi">
                            <label for="Kondisi" class="col-sm-2 control-label">Kondisi </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="Kondisi" id="Kondisi" data-placeholder="Select Kondisi">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>
                                    <?php foreach (db_get_all_data('tb_kondisi_master', $conditions) as $row): ?>
                                        <option <?= $row->kondisi_id == $tb_asset_master->kondisi ? 'selected' : ''; ?> value="<?= $row->kondisi_id ?>"><?= $row->keterangan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    <b>Input Kondisi</b> Max Length : 5.</small>
                            </div>
                        </div>






                        <div class="form-group group-Nilai  ">
                            <label for="Nilai" class="col-sm-2 control-label">Nilai </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Nilai" id="Nilai" placeholder="" value="<?= set_value('Nilai', $tb_asset_master->nilai); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>




                        <div class="form-group group-Kelompok  ">
                            <label for="Kelompok" class="col-sm-2 control-label">Kelompok </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="Kelompok" id="Kelompok" placeholder="" value="<?= set_value('Kelompok', $tb_asset_master->kelompok); ?>">
                                <small class="info help-block">
                                    <b>Input Kelompok</b> Max Length : 10.</small>
                            </div>
                        </div>




                        <div class="form-group group-tgl_inventarisasi  ">
                            <label for="tgl_inventarisasi" class="col-sm-2 control-label">Tgl Inventarisasi </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tgl_inventarisasi" placeholder="" id="tgl_inventarisasi" value="<?= set_value('tb_asset_master_tgl_inventarisasi_name', $tb_asset_master->tgl_inventarisasi); ?>">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>





                        <div class="form-group group-tglperolehan  ">
                            <label for="tglperolehan" class="col-sm-2 control-label">Tglperolehan </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tglperolehan" placeholder="" id="tglperolehan" value="<?= set_value('tb_asset_master_tglperolehan_name', $tb_asset_master->tglperolehan); ?>">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>





                        <div class="form-group group-Lokasi">
                            <label for="Lokasi" class="col-sm-2 control-label">Lokasi </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="Lokasi" id="Lokasi" data-placeholder="Select Lokasi">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>
                                    <?php foreach (db_get_all_data('tb_room_master', $conditions) as $row): ?>
                                        <option <?= $row->id_room == $tb_asset_master->lokasi ? 'selected' : ''; ?> value="<?= $row->id_room ?>"><?= $row->name_room; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    <b>Input Lokasi</b> Max Length : 255.</small>
                            </div>
                        </div>






                        <div class="form-group  wrapper-options-crud group-status_id">
                            <label for="status_id" class="col-sm-2 control-label">Status Id </label>
                            <div class="col-sm-8">
                                <div class="col-md-3 padding-left-0">
                                    <label>
                                        <input <?= $tb_asset_master->status_id == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="status_id" value="1"> IN Room </label>
                                </div>
                                <div class="col-md-3 padding-left-0">
                                    <label>
                                        <input <?= $tb_asset_master->status_id == "9" ? "checked" : ""; ?> type="radio" class="flat-red" name="status_id" value="9"> OUT Room </label>
                                </div>
                                </select>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                </div>
                            </div>
                        </div>




                        <div class="form-group group-Keterangan  ">
                            <label for="Keterangan" class="col-sm-2 control-label">Keterangan </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Keterangan" id="Keterangan" placeholder="" value="<?= set_value('Keterangan', $tb_asset_master->keterangan); ?>">
                                <small class="info help-block">
                                    <b>Input Keterangan</b> Max Length : 200.</small>
                            </div>
                        </div>




                        <div class="form-group group-PICbarang">
                            <label for="PICbarang" class="col-sm-2 control-label">PICbarang </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="PICbarang" id="PICbarang" data-placeholder="Select PICbarang">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>
                                    <?php foreach (db_get_all_data('tb_pegawai_master', $conditions) as $row): ?>
                                        <option <?= $row->NIP == $tb_asset_master->pic_aset ? 'selected' : ''; ?> value="<?= $row->NIP ?>"><?= $row->Pegawai; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    <b>Input PICbarang</b> Max Length : 11.</small>
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
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>

<script>
    var module_name = "tb_asset_master"
    var use_ajax_crud = false
</script>


<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';








        $('#btn_cancel').click(function() {
            swal({
                    title: "Are you sure?",
                    text: "the data that you have created will be in the exhaust!",
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
                        window.location.href = ADMIN_BASE_URL + '/tb_asset_master';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();

            var form_tb_asset_master = $('#form_tb_asset_master_edit');
            var data_post = form_tb_asset_master.serializeArray();
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
                    url: form_tb_asset_master.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('form').find('.error-input').remove();
                    $('.steps li').removeClass('error');
                    if (res.success) {
                        var id = $('#tb_asset_master_image_galery').find('li').attr('qq-file-id');
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
                        $('.data_file_uuid').val('');
                        showPopup(false)

                        if (use_ajax_crud == true) {

                            var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_asset_master/index/?ajax=1'
                            reloadDataTable(url);
                        }



                    } else {
                        if (res.errors) {
                            parseErrorField(res.errors);
                        }
                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });
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





        async function chain() {}

        chain();




    }); /*end doc ready*/
</script>