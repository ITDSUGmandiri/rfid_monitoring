

    <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
    <?php $this->load->view('core_template/fine_upload'); ?>
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
        Area        <small>Edit Area</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/lokasi_kerja'); ?>">Area</a></li>
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
                            <h3 class="widget-user-username">Area</h3>
                            <h5 class="widget-user-desc">Edit Area</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/lokasi_kerja/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_lokasi_kerja_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_lokasi_kerja_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

	<div class="form-group group-kode  ">
		<label for="kode" class="col-sm-2 control-label">Kode			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="kode" id="kode" placeholder="" value="<?= set_value('kode', $lokasi_kerja->kode); ?>">
			<small class="info help-block">
				<b>Input Kode</b> Max Length : 6.</small>
		</div>
	</div>


                            

	<div class="form-group group-nama_lokasi  ">
		<label for="nama_lokasi" class="col-sm-2 control-label">Nama Lokasi			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="" value="<?= set_value('nama_lokasi', $lokasi_kerja->nama_lokasi); ?>">
			<small class="info help-block">
				<b>Input Nama Lokasi</b> Max Length : 100.</small>
		</div>
	</div>


                            

	<div class="form-group group-keterangan  ">
		<label for="keterangan" class="col-sm-2 control-label">Keterangan			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="" value="<?= set_value('keterangan', $lokasi_kerja->keterangan); ?>">
			<small class="info help-block">
				<b>Input Keterangan</b> Max Length : 100.</small>
		</div>
	</div>


                            

	<div class="form-group group-alamat_lengkap  ">
		<label for="alamat_lengkap" class="col-sm-2 control-label">Alamat Lengkap			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="" value="<?= set_value('alamat_lengkap', $lokasi_kerja->alamat_lengkap); ?>">
			<small class="info help-block">
				<b>Input Alamat Lengkap</b> Max Length : 200.</small>
		</div>
	</div>


                            

	<div class="form-group group-lat  ">
		<label for="lat" class="col-sm-2 control-label">Lat			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="lat" id="lat" placeholder="" value="<?= set_value('lat', $lokasi_kerja->lat); ?>">
			<small class="info help-block">
				<b>Input Lat</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-long  ">
		<label for="long" class="col-sm-2 control-label">Long			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="long" id="long" placeholder="" value="<?= set_value('long', $lokasi_kerja->long); ?>">
			<small class="info help-block">
				<b>Input Long</b> Max Length : 50.</small>
		</div>
	</div>


                            

	<div class="form-group group-user_create  ">
		<label for="user_create" class="col-sm-2 control-label">User Create			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="user_create" id="user_create" placeholder="" value="<?= set_value('user_create', $lokasi_kerja->user_create); ?>">
			<small class="info help-block">
				<b>Input User Create</b> Max Length : 25.</small>
		</div>
	</div>


                            

<div class="form-group group-create_date  ">
        <label for="create_date" class="col-sm-2 control-label">Create Date            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datetimepicker" name="create_date" placeholder="" id="create_date" value="<?= set_value('create_date', $lokasi_kerja->create_date); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-user_change  ">
		<label for="user_change" class="col-sm-2 control-label">User Change			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="user_change" id="user_change" placeholder="" value="<?= set_value('user_change', $lokasi_kerja->user_change); ?>">
			<small class="info help-block">
				<b>Input User Change</b> Max Length : 25.</small>
		</div>
	</div>


                            

<div class="form-group group-change_date  ">
        <label for="change_date" class="col-sm-2 control-label">Change Date            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datetimepicker" name="change_date" placeholder="" id="change_date" value="<?= set_value('change_date', $lokasi_kerja->change_date); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-photo  ">
        <label for="photo" class="col-sm-2 control-label">Photo            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div id="lokasi_kerja_photo_galery"></div>
            <input class="data_file data_file_uuid" name="lokasi_kerja_photo_uuid" id="lokasi_kerja_photo_uuid" type="hidden" value="<?= set_value('lokasi_kerja_photo_uuid'); ?>">
            <input class="data_file" name="lokasi_kerja_photo_name" id="lokasi_kerja_photo_name" type="hidden" value="<?= set_value('lokasi_kerja_photo_name', $lokasi_kerja->photo); ?>">
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
  var module_name = "lokasi_kerja"
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
                    window.location.href = ADMIN_BASE_URL + '/lokasi_kerja';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_lokasi_kerja = $('#form_lokasi_kerja_edit');
    var data_post = form_lokasi_kerja.serializeArray();
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
            url: form_lokasi_kerja.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#lokasi_kerja_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/lokasi_kerja/index/?ajax=1'
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

                        var params = {};
            params[csrf] = token;

            $('#lokasi_kerja_photo_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: ADMIN_BASE_URL + '/lokasi_kerja/upload_photo_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: ADMIN_BASE_URL + '/lokasi_kerja/delete_photo_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: ADMIN_BASE_URL + '/lokasi_kerja/get_photo_file/<?= $lokasi_kerja->id; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["*"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#lokasi_kerja_photo_galery').fineUploader('getUuid', id);
                            $('#lokasi_kerja_photo_uuid').val(uuid);
                            $('#lokasi_kerja_photo_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#lokasi_kerja_photo_uuid').val();
                        $.get(ADMIN_BASE_URL + '/lokasi_kerja/delete_photo_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#lokasi_kerja_photo_uuid').val('');
                            $('#lokasi_kerja_photo_name').val('');
                        }
                    }
                }
            }); /*end photo galey*/
            

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>