

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
        Tb Pegawai Master        <small>Edit Tb Pegawai Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_pegawai_master'); ?>">Tb Pegawai Master</a></li>
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
                            <h3 class="widget-user-username">Tb Pegawai Master</h3>
                            <h5 class="widget-user-desc">Edit Tb Pegawai Master</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tb_pegawai_master/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tb_pegawai_master_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tb_pegawai_master_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

<div class="form-group group-NIP  ">
        <label for="NIP" class="col-sm-2 control-label">NIP            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="NIP" id="NIP" placeholder="" value="<?= set_value('NIP', $tb_pegawai_master->NIP); ?>">
            <small class="info help-block">
                <b>Input NIP</b> Max Length : 11.</small>
        </div>
    </div>


                            

	<div class="form-group group-Pegawai  ">
		<label for="Pegawai" class="col-sm-2 control-label">Pegawai			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Pegawai" id="Pegawai" placeholder="" value="<?= set_value('Pegawai', $tb_pegawai_master->Pegawai); ?>">
			<small class="info help-block">
				<b>Input Pegawai</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-Jabatan  ">
		<label for="Jabatan" class="col-sm-2 control-label">Jabatan			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Jabatan" id="Jabatan" placeholder="" value="<?= set_value('Jabatan', $tb_pegawai_master->Jabatan); ?>">
			<small class="info help-block">
				<b>Input Jabatan</b> Max Length : 30.</small>
		</div>
	</div>


                            

<div class="form-group group-Telp  ">
        <label for="Telp" class="col-sm-2 control-label">Telp            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="Telp" id="Telp" placeholder="" value="<?= set_value('Telp', $tb_pegawai_master->Telp); ?>">
            <small class="info help-block">
                <b>Input Telp</b> Max Length : 11.</small>
        </div>
    </div>


                            

	<div class="form-group group-Alamat  ">
		<label for="Alamat" class="col-sm-2 control-label">Alamat			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="" value="<?= set_value('Alamat', $tb_pegawai_master->Alamat); ?>">
			<small class="info help-block">
				<b>Input Alamat</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-Email  ">
		<label for="Email" class="col-sm-2 control-label">Email			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Email" id="Email" placeholder="" value="<?= set_value('Email', $tb_pegawai_master->Email); ?>">
			<small class="info help-block">
				<b>Input Email</b> Max Length : 30.</small>
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
  var module_name = "tb_pegawai_master"
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
                    window.location.href = ADMIN_BASE_URL + '/tb_pegawai_master';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tb_pegawai_master = $('#form_tb_pegawai_master_edit');
    var data_post = form_tb_pegawai_master.serializeArray();
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
            url: form_tb_pegawai_master.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tb_pegawai_master_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_pegawai_master/index/?ajax=1'
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