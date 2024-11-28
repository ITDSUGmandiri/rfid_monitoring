

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
        Tb Log Act        <small>Edit Tb Log Act</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_log_act'); ?>">Tb Log Act</a></li>
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
                            <h3 class="widget-user-username">Tb Log Act</h3>
                            <h5 class="widget-user-desc">Edit Tb Log Act</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tb_log_act/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tb_log_act_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tb_log_act_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

<div class="form-group group-log_id  ">
        <label for="log_id" class="col-sm-2 control-label">Log Id            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="log_id" id="log_id" placeholder="" value="<?= set_value('log_id', $tb_log_act->log_id); ?>">
            <small class="info help-block">
                <b>Input Log Id</b> Max Length : 11.</small>
        </div>
    </div>


                            

<div class="form-group group-act_id  ">
        <label for="act_id" class="col-sm-2 control-label">Act Id            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="act_id" id="act_id" placeholder="" value="<?= set_value('act_id', $tb_log_act->act_id); ?>">
            <small class="info help-block">
                <b>Input Act Id</b> Max Length : 11.</small>
        </div>
    </div>


                            

	<div class="form-group group-keterangan  ">
		<label for="keterangan" class="col-sm-2 control-label">Keterangan			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="" value="<?= set_value('keterangan', $tb_log_act->keterangan); ?>">
			<small class="info help-block">
				<b>Input Keterangan</b> Max Length : 255.</small>
		</div>
	</div>


                            

	<div class="form-group group-user  ">
		<label for="user" class="col-sm-2 control-label">User			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="user" id="user" placeholder="" value="<?= set_value('user', $tb_log_act->user); ?>">
			<small class="info help-block">
				<b>Input User</b> Max Length : 255.</small>
		</div>
	</div>


                            

<div class="form-group group-date  ">
        <label for="date" class="col-sm-2 control-label">Date            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datepicker" name="date" placeholder="" id="date" value="<?= set_value('tb_log_act_date_name', $tb_log_act->date); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>



                            

<div class="form-group group-time  ">
        <label for="time" class="col-sm-2 control-label">Time            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right timepicker" name="time" id="time" value="<?= set_value('tb_log_act_time_name', $tb_log_act->time); ?>">
            </div>
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
  var module_name = "tb_log_act"
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
                    window.location.href = ADMIN_BASE_URL + '/tb_log_act';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tb_log_act = $('#form_tb_log_act_edit');
    var data_post = form_tb_log_act.serializeArray();
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
            url: form_tb_log_act.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tb_log_act_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_log_act/index/?ajax=1'
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