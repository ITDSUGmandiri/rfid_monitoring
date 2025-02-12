

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
        Pengaturan Sistem        <small>Edit Pengaturan Sistem</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/pengaturan_sistem'); ?>">Pengaturan Sistem</a></li>
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
                            <h3 class="widget-user-username">Pengaturan Sistem</h3>
                            <h5 class="widget-user-desc">Edit Pengaturan Sistem</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/pengaturan_sistem/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_pengaturan_sistem_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_pengaturan_sistem_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

	<div class="form-group group-ip_address_server  ">
		<label for="ip_address_server" class="col-sm-2 control-label">Ip Address Server			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="ip_address_server" id="ip_address_server" placeholder="" value="<?= set_value('ip_address_server', $pengaturan_sistem->ip_address_server); ?>">
			<small class="info help-block">
				<b>Input Ip Address Server</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-protocol_ws_server  ">
		<label for="protocol_ws_server" class="col-sm-2 control-label">Protocol Ws Server			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="protocol_ws_server" id="protocol_ws_server" placeholder="" value="<?= set_value('protocol_ws_server', $pengaturan_sistem->protocol_ws_server); ?>">
			<small class="info help-block">
				<b>Input Protocol Ws Server</b> Max Length : 3.</small>
		</div>
	</div>


                            

	<div class="form-group group-port_ws_server  ">
		<label for="port_ws_server" class="col-sm-2 control-label">Port Ws Server			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="port_ws_server" id="port_ws_server" placeholder="" value="<?= set_value('port_ws_server', $pengaturan_sistem->port_ws_server); ?>">
			<small class="info help-block">
				<b>Input Port Ws Server</b> Max Length : 4.</small>
		</div>
	</div>


                            

	<div class="form-group group-validation_ip_address_server  ">
		<label for="validation_ip_address_server" class="col-sm-2 control-label">Validation Ip Address Server			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="validation_ip_address_server" id="validation_ip_address_server" placeholder="" value="<?= set_value('validation_ip_address_server', $pengaturan_sistem->validation_ip_address_server); ?>">
			<small class="info help-block">
				<b>Input Validation Ip Address Server</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-validation_protocol_ws_server  ">
		<label for="validation_protocol_ws_server" class="col-sm-2 control-label">Validation Protocol Ws Server			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="validation_protocol_ws_server" id="validation_protocol_ws_server" placeholder="" value="<?= set_value('validation_protocol_ws_server', $pengaturan_sistem->validation_protocol_ws_server); ?>">
			<small class="info help-block">
				<b>Input Validation Protocol Ws Server</b> Max Length : 3.</small>
		</div>
	</div>


                            

	<div class="form-group group-validation_port_ws_server  ">
		<label for="validation_port_ws_server" class="col-sm-2 control-label">Validation Port Ws Server			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="validation_port_ws_server" id="validation_port_ws_server" placeholder="" value="<?= set_value('validation_port_ws_server', $pengaturan_sistem->validation_port_ws_server); ?>">
			<small class="info help-block">
				<b>Input Validation Port Ws Server</b> Max Length : 4.</small>
		</div>
	</div>


                            

	<div class="form-group group-validation_auto_reconnect  ">
		<label for="validation_auto_reconnect" class="col-sm-2 control-label">Validation Auto Reconnect			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="validation_auto_reconnect" id="validation_auto_reconnect" placeholder="" value="<?= set_value('validation_auto_reconnect', $pengaturan_sistem->validation_auto_reconnect); ?>">
			<small class="info help-block">
				</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_moving_in  ">
		<label for="flag_moving_in" class="col-sm-2 control-label">Flag Moving In			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_moving_in" id="flag_moving_in" placeholder="" value="<?= set_value('flag_moving_in', $pengaturan_sistem->flag_moving_in); ?>">
			<small class="info help-block">
				<b>Input Flag Moving In</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_moving_out  ">
		<label for="flag_moving_out" class="col-sm-2 control-label">Flag Moving Out			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_moving_out" id="flag_moving_out" placeholder="" value="<?= set_value('flag_moving_out', $pengaturan_sistem->flag_moving_out); ?>">
			<small class="info help-block">
				<b>Input Flag Moving Out</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-timeout_duration  ">
		<label for="timeout_duration" class="col-sm-2 control-label">Timeout Duration			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="timeout_duration" id="timeout_duration" placeholder="" value="<?= set_value('timeout_duration', $pengaturan_sistem->timeout_duration); ?>">
			<small class="info help-block">
				</small>
		</div>
	</div>


                            

	<div class="form-group group-is_web_play_buzzer  ">
		<label for="is_web_play_buzzer" class="col-sm-2 control-label">Is Web Play Buzzer			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="is_web_play_buzzer" id="is_web_play_buzzer" placeholder="" value="<?= set_value('is_web_play_buzzer', $pengaturan_sistem->is_web_play_buzzer); ?>">
			<small class="info help-block">
				<b>Input Is Web Play Buzzer</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-deras_status_default  ">
		<label for="deras_status_default" class="col-sm-2 control-label">Deras Status Default			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="deras_status_default" id="deras_status_default" placeholder="" value="<?= set_value('deras_status_default', $pengaturan_sistem->deras_status_default); ?>">
			<small class="info help-block">
				<b>Input Deras Status Default</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-deras_description  ">
		<label for="deras_description" class="col-sm-2 control-label">Deras Description			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="deras_description" id="deras_description" placeholder="" value="<?= set_value('deras_description', $pengaturan_sistem->deras_description); ?>">
			<small class="info help-block">
				<b>Input Deras Description</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-deras_category_default  ">
		<label for="deras_category_default" class="col-sm-2 control-label">Deras Category Default			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="deras_category_default" id="deras_category_default" placeholder="" value="<?= set_value('deras_category_default', $pengaturan_sistem->deras_category_default); ?>">
			<small class="info help-block">
				</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_alarm_register_tag  ">
		<label for="flag_alarm_register_tag" class="col-sm-2 control-label">Flag Alarm Register Tag			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_alarm_register_tag" id="flag_alarm_register_tag" placeholder="" value="<?= set_value('flag_alarm_register_tag', $pengaturan_sistem->flag_alarm_register_tag); ?>">
			<small class="info help-block">
				<b>Input Flag Alarm Register Tag</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_status_available  ">
		<label for="flag_status_available" class="col-sm-2 control-label">Flag Status Available			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_status_available" id="flag_status_available" placeholder="" value="<?= set_value('flag_status_available', $pengaturan_sistem->flag_status_available); ?>">
			<small class="info help-block">
				<b>Input Flag Status Available</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_status_not_available  ">
		<label for="flag_status_not_available" class="col-sm-2 control-label">Flag Status Not Available			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_status_not_available" id="flag_status_not_available" placeholder="" value="<?= set_value('flag_status_not_available', $pengaturan_sistem->flag_status_not_available); ?>">
			<small class="info help-block">
				<b>Input Flag Status Not Available</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_kondisi_baik  ">
		<label for="flag_kondisi_baik" class="col-sm-2 control-label">Flag Kondisi Baik			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_kondisi_baik" id="flag_kondisi_baik" placeholder="" value="<?= set_value('flag_kondisi_baik', $pengaturan_sistem->flag_kondisi_baik); ?>">
			<small class="info help-block">
				<b>Input Flag Kondisi Baik</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_sensus_normal  ">
		<label for="flag_sensus_normal" class="col-sm-2 control-label">Flag Sensus Normal			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_sensus_normal" id="flag_sensus_normal" placeholder="" value="<?= set_value('flag_sensus_normal', $pengaturan_sistem->flag_sensus_normal); ?>">
			<small class="info help-block">
				<b>Input Flag Sensus Normal</b> Max Length : 1.</small>
		</div>
	</div>


                            

	<div class="form-group group-flag_sensus_anomali  ">
		<label for="flag_sensus_anomali" class="col-sm-2 control-label">Flag Sensus Anomali			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="flag_sensus_anomali" id="flag_sensus_anomali" placeholder="" value="<?= set_value('flag_sensus_anomali', $pengaturan_sistem->flag_sensus_anomali); ?>">
			<small class="info help-block">
				<b>Input Flag Sensus Anomali</b> Max Length : 1.</small>
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
  var module_name = "pengaturan_sistem"
  var use_ajax_crud = true

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
                    window.location.href = ADMIN_BASE_URL + '/pengaturan_sistem';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_pengaturan_sistem = $('#form_pengaturan_sistem_edit');
    var data_post = form_pengaturan_sistem.serializeArray();
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
            url: form_pengaturan_sistem.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#pengaturan_sistem_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/pengaturan_sistem/index/?ajax=1'
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