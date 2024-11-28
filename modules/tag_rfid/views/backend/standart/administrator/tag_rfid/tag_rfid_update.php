

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
        RFID        <small>Edit RFID</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tag_rfid'); ?>">RFID</a></li>
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
                            <h3 class="widget-user-username">RFID</h3>
                            <h5 class="widget-user-desc">Edit RFID</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tag_rfid/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tag_rfid_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tag_rfid_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

<div class="form-group group-label_id">
        <label for="label_id" class="col-sm-2 control-label">Label Tag            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="label_id" id="label_id" data-placeholder="Select Label Tag">
                <option value=""></option>
                <?php
                $conditions = [
                ];
                ?>
                <?php foreach (db_get_all_data('tag_label', $conditions) as $row): ?>
                <option <?= $row->label_id == $tag_rfid->label_id ? 'selected' : ''; ?> value="<?= $row->label_id ?>"><?= $row->label_name; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="info help-block">
                <b>Input Label Id</b> Max Length : 11.</small>
        </div>
    </div>




                            

	<div class="form-group group-rfid_barcode  ">
		<label for="rfid_barcode" class="col-sm-2 control-label">Barcode			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="rfid_barcode" id="rfid_barcode" placeholder="" value="<?= set_value('rfid_barcode', $tag_rfid->rfid_barcode); ?>">
			<small class="info help-block">
				<b>Input Rfid Barcode</b> Max Length : 48.</small>
		</div>
	</div>


                            

	<div class="form-group group-rfid_rfid  ">
		<label for="rfid_rfid" class="col-sm-2 control-label">RFID			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="rfid_rfid" id="rfid_rfid" placeholder="" value="<?= set_value('rfid_rfid', $tag_rfid->rfid_rfid); ?>">
			<small class="info help-block">
				<b>Input Rfid Rfid</b> Max Length : 96.</small>
		</div>
	</div>


                            

<div class="form-group ">
        <label for="rfid_status" class="col-sm-2 control-label">Status            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select" name="rfid_status" id="rfid_status" data-placeholder="Select Status">
                <option value=""></option>
                <option <?= $tag_rfid->rfid_status == "yes" ? 'selected' :''; ?> value="yes">Yes</option>
                <option <?= $tag_rfid->rfid_status == "no" ? 'selected' :''; ?> value="no">No</option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-rfid_note  ">
		<label for="rfid_note" class="col-sm-2 control-label">Note			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="rfid_note" id="rfid_note" placeholder="" value="<?= set_value('rfid_note', $tag_rfid->rfid_note); ?>">
			<small class="info help-block">
				<b>Input Rfid Note</b> Max Length : 255.</small>
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
  var module_name = "tag_rfid"
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
                    window.location.href = ADMIN_BASE_URL + '/tag_rfid';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tag_rfid = $('#form_tag_rfid_edit');
    var data_post = form_tag_rfid.serializeArray();
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
            url: form_tag_rfid.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tag_rfid_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tag_rfid/index/?ajax=1'
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