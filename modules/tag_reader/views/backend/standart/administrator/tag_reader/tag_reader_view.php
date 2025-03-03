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
        Data Reader RFID <small><?= cclang('detail', ['Data Reader RFID']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tag_reader'); ?>">Data Reader RFID</a></li>
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
                            <h3 class="widget-user-username">Data Reader RFID</h3>
                            <h5 class="widget-user-desc">Detail Data Reader RFID</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_tag_reader" id="form_tag_reader">

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Reader Id </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_id"><?= _ent($tag_reader->reader_id); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Ruangan </label>

                                <div class="col-sm-8">
                                    <?= _ent($tag_reader->tb_room_master_name_room); ?>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Nama Reader </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_name"><?= _ent($tag_reader->reader_name); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Posisi Untuk IN/OUT? </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-setfor"><?= _ent($tag_reader->setfor); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Serial Number </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_serialnumber"><?= _ent($tag_reader->reader_serialnumber); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Tipe </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_type"><?= _ent($tag_reader->reader_type); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">IP Address </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_ip"><?= _ent($tag_reader->reader_ip); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Port </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_port"><?= _ent($tag_reader->reader_port); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">COM </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_com"><?= _ent($tag_reader->reader_com); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Baudrate </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_baudrate"><?= _ent($tag_reader->reader_baudrate); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Power </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_power"><?= _ent($tag_reader->reader_power); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Interval </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_interval"><?= _ent($tag_reader->reader_interval); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Mode </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_mode"><?= _ent($tag_reader->reader_mode); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Update By </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_updatedby"><?= _ent($tag_reader->reader_updatedby); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Updated </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_updated"><?= _ent($tag_reader->reader_updated); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Created By </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_createdby"><?= _ent($tag_reader->reader_createdby); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Created </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_created"><?= _ent($tag_reader->reader_created); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Reader Series </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_family"><?= _ent($tag_reader->reader_family); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Status Reader </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-connecting"><?= _ent($tag_reader->connecting); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Model </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_model"><?= _ent($tag_reader->reader_model); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Reader Identity </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_identity"><?= _ent($tag_reader->reader_identity == 1 ? 'Legal' : 'Ilegal'); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Antena </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_antena"><?= _ent($tag_reader->reader_antena); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Angle </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_angle"><?= _ent($tag_reader->reader_angle); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Gate </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-reader_gate"><?= _ent($tag_reader->reader_gate); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="content" class="col-sm-2 control-label">Alias Antena </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-alias_antenna"><?= _ent($tag_reader->alias_antenna); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="flag_alarm" class="col-sm-2 control-label">Alarm </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-flag_alarm"><?= _ent($tag_reader->flag_alarm == 1 ? 'On' : 'Off'); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="flag_buzzer" class="col-sm-2 control-label">Buzzer </label>

                                <div class="col-sm-8">
                                    <span class="detail_group-flag_buzzer"><?= _ent($tag_reader->flag_buzzer == 1 ? 'On' : 'Off'); ?></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="is_active" class="col-sm-2 control-label">Is Active</label>

                                <div class="col-sm-8">
                                    <span class="detail_group-is_active"><?= _ent($tag_reader->is_active == 1 ? 'On' : 'Off'); ?></span>
                                </div>
                            </div>

                            <br>
                            <br>




                            <div class="view-nav">
                                <?php is_allowed('tag_reader_update', function () use ($tag_reader) { ?>
                                    <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_reader (Ctrl+e)" href="<?= admin_site_url('/tag_reader/edit/' . $tag_reader->reader_id); ?>"><i class="fa fa-edit"></i> <?= cclang('update', ['Tag Reader']); ?> </a>
                                <?php }) ?>
                                <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_reader/'); ?>"><i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Tag Reader']); ?></a>
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