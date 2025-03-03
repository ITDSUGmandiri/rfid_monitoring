

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
        Config        <small>Edit Config</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/config'); ?>">Config</a></li>
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
                            <h3 class="widget-user-username">Config</h3>
                            <h5 class="widget-user-desc">Edit Config</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/config/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_config_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_config_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

	<div class="form-group group-kode  ">
		<label for="kode" class="col-sm-2 control-label">Kode			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="kode" id="kode" placeholder="" value="<?= set_value('kode', $config->kode); ?>">
			<small class="info help-block">
				<b>Input Kode</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-config_name  ">
		<label for="config_name" class="col-sm-2 control-label">Config Name			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="config_name" id="config_name" placeholder="" value="<?= set_value('config_name', $config->config_name); ?>">
			<small class="info help-block">
				<b>Input Config Name</b> Max Length : 100.</small>
		</div>
	</div>


                            

	<div class="form-group group-variable  ">
		<label for="variable" class="col-sm-2 control-label">Variable			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="variable" id="variable" placeholder="" value="<?= set_value('variable', $config->variable); ?>">
			<small class="info help-block">
				<b>Input Variable</b> Max Length : 100.</small>
		</div>
	</div>


                            

<div class="form-group group-value  ">
        <label for="value" class="col-sm-2 control-label">Value            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="value" id="value" placeholder="" value="<?= set_value('value', $config->value); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-is_active  ">
		<label for="is_active" class="col-sm-2 control-label">Is Active			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="is_active" id="is_active" placeholder="" value="<?= set_value('is_active', $config->is_active); ?>">
			<small class="info help-block">
				<b>Input Is Active</b> Max Length : 1.</small>
		</div>
	</div>


                            

<div class="form-group ">
        <label for="owner" class="col-sm-2 control-label">Owner            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="owner" id="owner" data-placeholder="Select Owner">
                <option value=""></option>
                <option <?= $config->owner == "web" ? 'selected' :''; ?> value="web">web</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-keterangan  ">
        <label for="keterangan" class="col-sm-2 control-label">Keterangan            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <textarea id="keterangan" name="keterangan" rows="10" cols="80"> <?= set_value('keterangan', $config->keterangan); ?></textarea>
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
  var module_name = "config"
  var use_ajax_crud = false

</script>

    <script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>

<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';

        


        
        
        
    CKEDITOR.replace('keterangan');
    var keterangan = CKEDITOR.instances.keterangan;
        
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
                    window.location.href = ADMIN_BASE_URL + '/config';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#keterangan').val(keterangan.getData());
        
    var form_config = $('#form_config_edit');
    var data_post = form_config.serializeArray();
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
            url: form_config.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#config_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/config/index/?ajax=1'
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