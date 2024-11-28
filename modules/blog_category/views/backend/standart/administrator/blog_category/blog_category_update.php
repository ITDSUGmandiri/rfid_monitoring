

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
        Blog Category        <small>Edit Blog Category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/blog_category'); ?>">Blog Category</a></li>
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
                            <h3 class="widget-user-username">Blog Category</h3>
                            <h5 class="widget-user-desc">Edit Blog Category</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/blog_category/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_blog_category_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_blog_category_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

	<div class="form-group group-category_name  ">
		<label for="category_name" class="col-sm-2 control-label">Category Name			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="category_name" id="category_name" placeholder="" value="<?= set_value('category_name', $blog_category->category_name); ?>">
			<small class="info help-block">
				<b>Input Category Name</b> Max Length : 200.</small>
		</div>
	</div>


                            

<div class="form-group group-category_desc  ">
        <label for="category_desc" class="col-sm-2 control-label">Category Desc            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div id="blog_category_category_desc_galery"></div>
            <div id="blog_category_category_desc_galery_listed">
                <?php foreach ((array) explode(',', $blog_category->category_desc) as $idx => $filename): ?>
                <input type="hidden" class="listed_file_uuid" name="blog_category_category_desc_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="blog_category_category_desc_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                <?php endforeach; ?>
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-pilihan  ">
        <label for="pilihan" class="col-sm-2 control-label">Pilihan            </label>
        <div class="col-sm-8">
            <div id="blog_category_pilihan_galery"></div>
            <div id="blog_category_pilihan_galery_listed">
                <?php foreach ((array) explode(',', $blog_category->pilihan) as $idx => $filename): ?>
                <input type="hidden" class="listed_file_uuid" name="blog_category_pilihan_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="blog_category_pilihan_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                <?php endforeach; ?>
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-check  ">
        <label for="check" class="col-sm-2 control-label">Check            </label>
        <div class="col-sm-8">
            <div id="blog_category_check_galery"></div>
            <div id="blog_category_check_galery_listed">
                <?php foreach ((array) explode(',', $blog_category->check) as $idx => $filename): ?>
                <input type="hidden" class="listed_file_uuid" name="blog_category_check_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="blog_category_check_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                <?php endforeach; ?>
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
  var module_name = "blog_category"
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
                    window.location.href = ADMIN_BASE_URL + '/blog_category';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_blog_category = $('#form_blog_category_edit');
    var data_post = form_blog_category.serializeArray();
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
            url: form_blog_category.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#blog_category_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/blog_category/index/?ajax=1'
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

        $('#blog_category_category_desc_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: ADMIN_BASE_URL + '/blog_category/upload_category_desc_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: ADMIN_BASE_URL + '/blog_category/delete_category_desc_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: ADMIN_BASE_URL + '/blog_category/get_category_desc_file/<?= $blog_category->category_id; ?>',
                refreshOnRequest: true
            },
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
                        var uuid = $('#blog_category_category_desc_galery').fineUploader('getUuid', id);
                        $('#blog_category_category_desc_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="blog_category_category_desc_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="blog_category_category_desc_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#blog_category_category_desc_galery_listed').find('.listed_file_uuid[name="blog_category_category_desc_uuid[' + id + ']"]').remove();
                        $('#blog_category_category_desc_galery_listed').find('.listed_file_name[name="blog_category_category_desc_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end category_desc galery*/
                var params = {};
        params[csrf] = token;

        $('#blog_category_pilihan_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: ADMIN_BASE_URL + '/blog_category/upload_pilihan_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: ADMIN_BASE_URL + '/blog_category/delete_pilihan_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: ADMIN_BASE_URL + '/blog_category/get_pilihan_file/<?= $blog_category->category_id; ?>',
                refreshOnRequest: true
            },
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
                        var uuid = $('#blog_category_pilihan_galery').fineUploader('getUuid', id);
                        $('#blog_category_pilihan_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="blog_category_pilihan_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="blog_category_pilihan_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#blog_category_pilihan_galery_listed').find('.listed_file_uuid[name="blog_category_pilihan_uuid[' + id + ']"]').remove();
                        $('#blog_category_pilihan_galery_listed').find('.listed_file_name[name="blog_category_pilihan_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end pilihan galery*/
                var params = {};
        params[csrf] = token;

        $('#blog_category_check_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: ADMIN_BASE_URL + '/blog_category/upload_check_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: ADMIN_BASE_URL + '/blog_category/delete_check_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: ADMIN_BASE_URL + '/blog_category/get_check_file/<?= $blog_category->category_id; ?>',
                refreshOnRequest: true
            },
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
                        var uuid = $('#blog_category_check_galery').fineUploader('getUuid', id);
                        $('#blog_category_check_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="blog_category_check_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="blog_category_check_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#blog_category_check_galery_listed').find('.listed_file_uuid[name="blog_category_check_uuid[' + id + ']"]').remove();
                        $('#blog_category_check_galery_listed').find('.listed_file_name[name="blog_category_check_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end check galery*/
        

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>