

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
        Data Reader RFID        <small>Edit Data Reader RFID</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tag_reader'); ?>">Data Reader RFID</a></li>
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
                            <h3 class="widget-user-username">Data Reader RFID</h3>
                            <h5 class="widget-user-desc">Edit Data Reader RFID</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tag_reader/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tag_reader_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tag_reader_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

<div class="form-group group-room_id">
        <label for="room_id" class="col-sm-2 control-label">Ruangan            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="room_id" id="room_id" data-placeholder="Select Ruangan">
                <option value=""></option>
                <?php
                $conditions = [
                ];
                ?>
                <?php foreach (db_get_all_data('tb_room_master', $conditions) as $row): ?>
                <option <?= $row->id_room == $tag_reader->room_id ? 'selected' : ''; ?> value="<?= $row->id_room ?>"><?= $row->name_room; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>




                            

	<div class="form-group group-reader_name  ">
		<label for="reader_name" class="col-sm-2 control-label">Nama Reader			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="reader_name" id="reader_name" placeholder="" value="<?= set_value('reader_name', $tag_reader->reader_name); ?>">
			<small class="info help-block">
				<b>Input Reader Name</b> Max Length : 50.</small>
		</div>
	</div>


                            

<div class="form-group  wrapper-options-crud group-setfor">
        <label for="setfor" class="col-sm-2 control-label">Posisi Untuk IN/OUT?            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div class="col-md-3 padding-left-0">
                    <label>
                        <input <?= $tag_reader->setfor == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="setfor" value="1"> IN                    </label>
                </div>
            <div class="col-md-3 padding-left-0">
                    <label>
                        <input <?= $tag_reader->setfor == "7" ? "checked" : ""; ?> type="radio" class="flat-red" name="setfor" value="7"> Out                    </label>
                </div>
            </select>
            <div class="row-fluid clear-both">
                <small class="info help-block">
                    </small>
            </div>
        </div>
    </div>


                            

	<div class="form-group group-reader_serialnumber  ">
		<label for="reader_serialnumber" class="col-sm-2 control-label">Serial Number			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="reader_serialnumber" id="reader_serialnumber" placeholder="" value="<?= set_value('reader_serialnumber', $tag_reader->reader_serialnumber); ?>">
			<small class="info help-block">
				<b>Input Reader Serialnumber</b> Max Length : 10.</small>
		</div>
	</div>


                            

<div class="form-group ">
        <label for="reader_type" class="col-sm-2 control-label">Tipe            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_type" id="reader_type" data-placeholder="Select Tipe">
                <option value=""></option>
                <option <?= $tag_reader->reader_type == "tcp" ? 'selected' :''; ?> value="tcp">tcp</option>
                <option <?= $tag_reader->reader_type == "serial" ? 'selected' :''; ?> value="serial">serial</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-reader_ip  ">
		<label for="reader_ip" class="col-sm-2 control-label">IP Address			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="reader_ip" id="reader_ip" placeholder="" value="<?= set_value('reader_ip', $tag_reader->reader_ip); ?>">
			<small class="info help-block">
				<b>Input Reader Ip</b> Max Length : 45.</small>
		</div>
	</div>


                            

	<div class="form-group group-reader_port  ">
		<label for="reader_port" class="col-sm-2 control-label">Port			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="reader_port" id="reader_port" placeholder="" value="<?= set_value('reader_port', $tag_reader->reader_port); ?>">
			<small class="info help-block">
				<b>Input Reader Port</b> Max Length : 7.</small>
		</div>
	</div>


                            

<div class="form-group ">
        <label for="reader_com" class="col-sm-2 control-label">COM            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_com" id="reader_com" data-placeholder="Select COM">
                <option value=""></option>
                <option <?= $tag_reader->reader_com == "/dev/cu.usbserial-1410" ? 'selected' :''; ?> value="/dev/cu.usbserial-1410">/dev/cu.usbserial-1410</option>
                <option <?= $tag_reader->reader_com == "/dev/cu.usbserial-1420" ? 'selected' :''; ?> value="/dev/cu.usbserial-1420">/dev/cu.usbserial-1420</option>
                <option <?= $tag_reader->reader_com == "COM1" ? 'selected' :''; ?> value="COM1">COM1</option>
                <option <?= $tag_reader->reader_com == "COM2" ? 'selected' :''; ?> value="COM2">COM2</option>
                <option <?= $tag_reader->reader_com == "COM3" ? 'selected' :''; ?> value="COM3">COM3</option>
                <option <?= $tag_reader->reader_com == "COM4" ? 'selected' :''; ?> value="COM4">COM4</option>
                <option <?= $tag_reader->reader_com == "COM5" ? 'selected' :''; ?> value="COM5">COM5</option>
                <option <?= $tag_reader->reader_com == "COM6" ? 'selected' :''; ?> value="COM6">COM6</option>
                <option <?= $tag_reader->reader_com == "COM7" ? 'selected' :''; ?> value="COM7">COM7</option>
                <option <?= $tag_reader->reader_com == "COM8" ? 'selected' :''; ?> value="COM8">COM8</option>
                <option <?= $tag_reader->reader_com == "COM9" ? 'selected' :''; ?> value="COM9">COM9</option>
                <option <?= $tag_reader->reader_com == "COM10" ? 'selected' :''; ?> value="COM10">COM10</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group ">
        <label for="reader_baudrate" class="col-sm-2 control-label">Baudrate            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_baudrate" id="reader_baudrate" data-placeholder="Select Baudrate">
                <option value=""></option>
                <option <?= $tag_reader->reader_baudrate == "9600" ? 'selected' :''; ?> value="9600">9600</option>
                <option <?= $tag_reader->reader_baudrate == "19200" ? 'selected' :''; ?> value="19200">19200</option>
                <option <?= $tag_reader->reader_baudrate == "38400" ? 'selected' :''; ?> value="38400">38400</option>
                <option <?= $tag_reader->reader_baudrate == "57600" ? 'selected' :''; ?> value="57600">57600</option>
                <option <?= $tag_reader->reader_baudrate == "115200" ? 'selected' :''; ?> value="115200">115200</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-reader_power  ">
        <label for="reader_power" class="col-sm-2 control-label">Power            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="reader_power" id="reader_power" placeholder="" value="<?= set_value('reader_power', $tag_reader->reader_power); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group ">
        <label for="reader_interval" class="col-sm-2 control-label">Interval            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_interval" id="reader_interval" data-placeholder="Select Interval">
                <option value=""></option>
                <option <?= $tag_reader->reader_interval == "10" ? 'selected' :''; ?> value="10">10</option>
                <option <?= $tag_reader->reader_interval == "100" ? 'selected' :''; ?> value="100">100</option>
                <option <?= $tag_reader->reader_interval == "1000" ? 'selected' :''; ?> value="1000">1000</option>
                <option <?= $tag_reader->reader_interval == "2000" ? 'selected' :''; ?> value="2000">2000</option>
                <option <?= $tag_reader->reader_interval == "5000" ? 'selected' :''; ?> value="5000">5000</option>
                <option <?= $tag_reader->reader_interval == "10000" ? 'selected' :''; ?> value="10000">10000</option>
                <option <?= $tag_reader->reader_interval == "15000" ? 'selected' :''; ?> value="15000">15000</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group ">
        <label for="reader_mode" class="col-sm-2 control-label">Mode            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_mode" id="reader_mode" data-placeholder="Select Mode">
                <option value=""></option>
                <option <?= $tag_reader->reader_mode == "answer" ? 'selected' :''; ?> value="answer">answer</option>
                <option <?= $tag_reader->reader_mode == "active" ? 'selected' :''; ?> value="active">active</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-reader_updatedby  ">
        <label for="reader_updatedby" class="col-sm-2 control-label">Update By            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="reader_updatedby" id="reader_updatedby" placeholder="" value="<?= set_value('reader_updatedby', $tag_reader->reader_updatedby); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-reader_updated  ">
        <label for="reader_updated" class="col-sm-2 control-label">Updated            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datetimepicker" name="reader_updated" placeholder="" id="reader_updated" value="<?= set_value('reader_updated', $tag_reader->reader_updated); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-reader_createdby  ">
        <label for="reader_createdby" class="col-sm-2 control-label">Created By            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="reader_createdby" id="reader_createdby" placeholder="" value="<?= set_value('reader_createdby', $tag_reader->reader_createdby); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-reader_created  ">
        <label for="reader_created" class="col-sm-2 control-label">Created            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datetimepicker" name="reader_created" placeholder="" id="reader_created" value="<?= set_value('reader_created', $tag_reader->reader_created); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group ">
        <label for="reader_family" class="col-sm-2 control-label">Reader Series            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_family" id="reader_family" data-placeholder="Select Reader Series">
                <option value=""></option>
                <option <?= $tag_reader->reader_family == "hw" ? 'selected' :''; ?> value="hw">hw</option>
                <option <?= $tag_reader->reader_family == "rc" ? 'selected' :''; ?> value="rc">rc</option>
                <option <?= $tag_reader->reader_family == "other" ? 'selected' :''; ?> value="other">other</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group  wrapper-options-crud group-connecting">
        <label for="connecting" class="col-sm-2 control-label">Status Reader            </label>
        <div class="col-sm-8">
            <div class="col-md-3 padding-left-0">
                    <label>
                        <input <?= $tag_reader->connecting == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="connecting" value="1"> Connected                    </label>
                </div>
            <div class="col-md-3 padding-left-0">
                    <label>
                        <input <?= $tag_reader->connecting == "9" ? "checked" : ""; ?> type="radio" class="flat-red" name="connecting" value="9"> Disconnected                    </label>
                </div>
            </select>
            <div class="row-fluid clear-both">
                <small class="info help-block">
                    </small>
            </div>
        </div>
    </div>


                            

	<div class="form-group group-reader_model  ">
		<label for="reader_model" class="col-sm-2 control-label">Model			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="reader_model" id="reader_model" placeholder="" value="<?= set_value('reader_model', $tag_reader->reader_model); ?>">
			<small class="info help-block">
				<b>Input Reader Model</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-reader_identity  ">
		<label for="reader_identity" class="col-sm-2 control-label">Reader Identity			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="reader_identity" id="reader_identity" placeholder="" value="<?= set_value('reader_identity', $tag_reader->reader_identity); ?>">
			<small class="info help-block">
				<b>Input Reader Identity</b> Max Length : 50.</small>
		</div>
	</div>


                            

<div class="form-group ">
        <label for="reader_antena" class="col-sm-2 control-label">Antena            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="reader_antena" id="reader_antena" data-placeholder="Select Antena">
                <option value=""></option>
                <option <?= $tag_reader->reader_antena == "single" ? 'selected' :''; ?> value="single">single</option>
                <option <?= $tag_reader->reader_antena == "double" ? 'selected' :''; ?> value="double">double</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-alias_antenna  ">
		<label for="alias_antenna" class="col-sm-2 control-label">Alias Antena			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="alias_antenna" id="alias_antenna" placeholder="" value="<?= set_value('alias_antenna', $tag_reader->alias_antenna); ?>">
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
<!--/box body -->
</div>
<!--/box -->
</div>
</div>
</section>

<script>
  var module_name = "tag_reader"
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
                    window.location.href = ADMIN_BASE_URL + '/tag_reader';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tag_reader = $('#form_tag_reader_edit');
    var data_post = form_tag_reader.serializeArray();
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
            url: form_tag_reader.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tag_reader_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tag_reader/index/?ajax=1'
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

    

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>