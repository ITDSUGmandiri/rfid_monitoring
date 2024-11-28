

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
        Tb History Invent        <small>Edit Tb History Invent</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_history_invent'); ?>">Tb History Invent</a></li>
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
                            <h3 class="widget-user-username">Tb History Invent</h3>
                            <h5 class="widget-user-desc">Edit Tb History Invent</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tb_history_invent/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tb_history_invent_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tb_history_invent_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

<div class="form-group group-tanggal  ">
        <label for="tanggal" class="col-sm-2 control-label">Tanggal            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datepicker" name="tanggal" placeholder="" id="tanggal" value="<?= set_value('tb_history_invent_tanggal_name', $tb_history_invent->tanggal); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>



                            

<div class="form-group group-waktu  ">
        <label for="waktu" class="col-sm-2 control-label">Waktu            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right timepicker" name="waktu" id="waktu" value="<?= set_value('tb_history_invent_waktu_name', $tb_history_invent->waktu); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-id_room">
        <label for="id_room" class="col-sm-2 control-label">Ruangan            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="id_room" id="id_room" data-placeholder="Select Ruangan">
                <option value=""></option>
                <?php
                $conditions = [
                ];
                ?>
                <?php foreach (db_get_all_data('tb_room_master', $conditions) as $row): ?>
                <option <?= $row->id_room == $tb_history_invent->id_room ? 'selected' : ''; ?> value="<?= $row->id_room ?>"><?= $row->name_room; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="info help-block">
                <b>Input Id Room</b> Max Length : 20.</small>
        </div>
    </div>




                            

<div class="form-group group-user  ">
        <label for="user" class="col-sm-2 control-label">User            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="user" id="user" placeholder="" value="<?= set_value('user', $tb_history_invent->user); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-labeling  ">
        <label for="labeling" class="col-sm-2 control-label">Labeling            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="labeling" id="labeling" placeholder="" value="<?= set_value('labeling', $tb_history_invent->labeling); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-rfid_code_tag  ">
		<label for="rfid_code_tag" class="col-sm-2 control-label">Rfid Code Tag			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="rfid_code_tag" id="rfid_code_tag" placeholder="" value="<?= set_value('rfid_code_tag', $tb_history_invent->rfid_code_tag); ?>">
			<small class="info help-block">
				<b>Input Rfid Code Tag</b> Max Length : 96.</small>
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
  var module_name = "tb_history_invent"
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
                    window.location.href = ADMIN_BASE_URL + '/tb_history_invent';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tb_history_invent = $('#form_tb_history_invent_edit');
    var data_post = form_tb_history_invent.serializeArray();
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
            url: form_tb_history_invent.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tb_history_invent_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_history_invent/index/?ajax=1'
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