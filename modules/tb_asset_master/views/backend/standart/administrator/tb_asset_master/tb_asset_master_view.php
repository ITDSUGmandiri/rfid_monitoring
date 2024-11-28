<script type="text/javascript">
    function domo() {
        $('*').bind('keydown', 'Ctrl+e', function() {
            $('#btn_edit').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_back').trigger('click');
            return false;
        });
    }

    jQuery(document).ready(domo);
</script>
<section class="content-header">
    <h1>
        Tb Asset Master <small><?= cclang('detail', ['Tb Asset Master']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_asset_master'); ?>">Tb Asset Master</a></li>
        <li class="active"><?= cclang('detail'); ?></li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Tb Asset Master</h3>
                            <h5 class="widget-user-desc">Detail Tb Asset Master</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_tb_asset_master" id="form_tb_asset_master">

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-id"><?= _ent($tb_asset_master->id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Kode Brg </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-kode_brg"><?= _ent($tb_asset_master->kode_brg); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Nup </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-nup"><?= _ent($tb_asset_master->nup); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Tag Code </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-tag_code"><?= _ent($tb_asset_master->tag_code); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Nama Brg </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-nama_brg"><?= _ent($tb_asset_master->nama_brg); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Merk </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-Merk"><?= _ent($tb_asset_master->merk); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Tipe </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-Tipe"><?= _ent($tb_asset_master->tipe); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Kondisi </label>

                                <div class="col-sm-8">
                                    <?= _ent($tb_asset_master->tb_kondisi_master_keterangan); ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Nilai </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-Nilai"><?= _ent($tb_asset_master->nilai); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Kelompok </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-Kelompok"><?= _ent($tb_asset_master->kelompok); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Tgl Inventarisasi </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-tgl_inventarisasi"><?= _ent($tb_asset_master->tgl_inventarisasi); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Tglperolehan </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-tglperolehan"><?= _ent($tb_asset_master->tglperolehan); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Lokasi </label>

                                <div class="col-sm-8">
                                    <?= _ent($tb_asset_master->tb_room_master_name_room); ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Status Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-status_id"><?= _ent($tb_asset_master->status_id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Keterangan </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-Keterangan"><?= _ent($tb_asset_master->keterangan); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">PICbarang </label>

                                <div class="col-sm-8">
                                    <?= _ent($tb_asset_master->tb_pegawai_master_Pegawai); ?>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('tb_asset_master_update', function () use ($tb_asset_master) { ?>
                                    <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_asset_master (Ctrl+e)" href="<?= admin_site_url('/tb_asset_master/edit/' . $tb_asset_master->id); ?>"><i class="fa fa-edit"></i> <?= cclang('update', ['Tb Asset Master']); ?> </a>
                                <?php }) ?>
                                <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_asset_master/'); ?>"><i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Tb Asset Master']); ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        "use strict";


    });
</script>