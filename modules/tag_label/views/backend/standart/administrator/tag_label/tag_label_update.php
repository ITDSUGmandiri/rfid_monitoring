

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
        Label        <small>Edit Label</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tag_label'); ?>">Label</a></li>
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
                            <h3 class="widget-user-username">Label</h3>
                            <h5 class="widget-user-desc">Edit Label</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tag_label/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tag_label_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tag_label_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

	<div class="form-group group-label_supplier  ">
		<label for="label_supplier" class="col-sm-2 control-label">Supplier			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="label_supplier" id="label_supplier" placeholder="" value="<?= set_value('label_supplier', $tag_label->label_supplier); ?>">
			<small class="info help-block">
				</small>
		</div>
	</div>


                            

	<div class="form-group group-label_name  ">
		<label for="label_name" class="col-sm-2 control-label">Name			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="label_name" id="label_name" placeholder="" value="<?= set_value('label_name', $tag_label->label_name); ?>">
			<small class="info help-block">
				<b>Input Label Name</b> Max Length : 255.</small>
		</div>
	</div>


                            

<div class="form-group group-label_description  ">
        <label for="label_description" class="col-sm-2 control-label">Description            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <textarea id="label_description" name="label_description" rows="10" cols="80"> <?= set_value('label_description', $tag_label->label_description); ?></textarea>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-label_image  ">
        <label for="label_image" class="col-sm-2 control-label">Image            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div id="tag_label_label_image_galery"></div>
            <input class="data_file data_file_uuid" name="tag_label_label_image_uuid" id="tag_label_label_image_uuid" type="hidden" value="<?= set_value('tag_label_label_image_uuid'); ?>">
            <input class="data_file" name="tag_label_label_image_name" id="tag_label_label_image_name" type="hidden" value="<?= set_value('tag_label_label_image_name', $tag_label->label_image); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                                                                                    

	<div class="form-group group-label_dimension  ">
		<label for="label_dimension" class="col-sm-2 control-label">Dimension			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="label_dimension" id="label_dimension" placeholder="" value="<?= set_value('label_dimension', $tag_label->label_dimension); ?>">
			<small class="info help-block">
				</small>
		</div>
	</div>


                            

	<div class="form-group group-referensi  ">
		<label for="referensi" class="col-sm-2 control-label">Referensi			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="referensi" id="referensi" placeholder="" value="<?= set_value('referensi', $tag_label->referensi); ?>">
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
  var module_name = "tag_label"
  var use_ajax_crud = false

</script>

    <script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>

<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';

        


        
        
        
    CKEDITOR.replace('label_description');
    var label_description = CKEDITOR.instances.label_description;
        
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
                    window.location.href = ADMIN_BASE_URL + '/tag_label';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#label_description').val(label_description.getData());
        
    var form_tag_label = $('#form_tag_label_edit');
    var data_post = form_tag_label.serializeArray();
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
            url: form_tag_label.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tag_label_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tag_label/index/?ajax=1'
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

            $('#tag_label_label_image_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: ADMIN_BASE_URL + '/tag_label/upload_label_image_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: ADMIN_BASE_URL + '/tag_label/delete_label_image_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: ADMIN_BASE_URL + '/tag_label/get_label_image_file/<?= $tag_label->label_id; ?>',
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
                            var uuid = $('#tag_label_label_image_galery').fineUploader('getUuid', id);
                            $('#tag_label_label_image_uuid').val(uuid);
                            $('#tag_label_label_image_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#tag_label_label_image_uuid').val();
                        $.get(ADMIN_BASE_URL + '/tag_label/delete_label_image_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#tag_label_label_image_uuid').val('');
                            $('#tag_label_label_image_name').val('');
                        }
                    }
                }
            }); /*end label_image galey*/
            

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>