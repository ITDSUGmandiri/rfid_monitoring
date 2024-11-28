

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
        Check Upload        <small>Edit Check Upload</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/check_upload'); ?>">Check Upload</a></li>
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
                            <h3 class="widget-user-username">Check Upload</h3>
                            <h5 class="widget-user-desc">Edit Check Upload</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/check_upload/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_check_upload_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_check_upload_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

<div class="form-group group-file1  ">
        <label for="file1" class="col-sm-2 control-label">File1            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div id="check_upload_file1_galery"></div>
            <div id="check_upload_file1_galery_listed">
                <?php foreach ((array) explode(',', $check_upload->file1) as $idx => $filename): ?>
                <input type="hidden" class="listed_file_uuid" name="check_upload_file1_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="check_upload_file1_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                <?php endforeach; ?>
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-file2  ">
        <label for="file2" class="col-sm-2 control-label">File2            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div id="check_upload_file2_galery"></div>
            <div id="check_upload_file2_galery_listed">
                <?php foreach ((array) explode(',', $check_upload->file2) as $idx => $filename): ?>
                <input type="hidden" class="listed_file_uuid" name="check_upload_file2_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="check_upload_file2_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                <?php endforeach; ?>
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

<div class="form-group group-file3  ">
        <label for="file3" class="col-sm-2 control-label">File3            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <div id="check_upload_file3_galery"></div>
            <div id="check_upload_file3_galery_listed">
                <?php foreach ((array) explode(',', $check_upload->file3) as $idx => $filename): ?>
                <input type="hidden" class="listed_file_uuid" name="check_upload_file3_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="check_upload_file3_name[<?= $idx ?>]" value="<?= $filename; ?>" />
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
  var module_name = "check_upload"
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
                    window.location.href = ADMIN_BASE_URL + '/check_upload';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_check_upload = $('#form_check_upload_edit');
    var data_post = form_check_upload.serializeArray();
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
            url: form_check_upload.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#check_upload_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/check_upload/index/?ajax=1'
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

        $('#check_upload_file1_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: ADMIN_BASE_URL + '/check_upload/upload_file1_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: ADMIN_BASE_URL + '/check_upload/delete_file1_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: ADMIN_BASE_URL + '/check_upload/get_file1_file/<?= $check_upload->id; ?>',
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
                        var uuid = $('#check_upload_file1_galery').fineUploader('getUuid', id);
                        $('#check_upload_file1_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="check_upload_file1_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="check_upload_file1_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#check_upload_file1_galery_listed').find('.listed_file_uuid[name="check_upload_file1_uuid[' + id + ']"]').remove();
                        $('#check_upload_file1_galery_listed').find('.listed_file_name[name="check_upload_file1_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end file1 galery*/
                var params = {};
        params[csrf] = token;

        $('#check_upload_file2_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: ADMIN_BASE_URL + '/check_upload/upload_file2_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: ADMIN_BASE_URL + '/check_upload/delete_file2_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: ADMIN_BASE_URL + '/check_upload/get_file2_file/<?= $check_upload->id; ?>',
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
                        var uuid = $('#check_upload_file2_galery').fineUploader('getUuid', id);
                        $('#check_upload_file2_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="check_upload_file2_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="check_upload_file2_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#check_upload_file2_galery_listed').find('.listed_file_uuid[name="check_upload_file2_uuid[' + id + ']"]').remove();
                        $('#check_upload_file2_galery_listed').find('.listed_file_name[name="check_upload_file2_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end file2 galery*/
                var params = {};
        params[csrf] = token;

        $('#check_upload_file3_galery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: ADMIN_BASE_URL + '/check_upload/upload_file3_file',
                params: params
            },
            deleteFile: {
                enabled: true,
                endpoint: ADMIN_BASE_URL + '/check_upload/delete_file3_file',
            },
            thumbnails: {
                placeholders: {
                    waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                    notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                }
            },
            session: {
                endpoint: ADMIN_BASE_URL + '/check_upload/get_file3_file/<?= $check_upload->id; ?>',
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
                        var uuid = $('#check_upload_file3_galery').fineUploader('getUuid', id);
                        $('#check_upload_file3_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="check_upload_file3_uuid[' + id + ']" value="' + uuid + '" /><input type="hidden" class="listed_file_name" name="check_upload_file3_name[' + id + ']" value="' + xhr.uploadName + '" />');
                    } else {
                        toastr['error'](xhr.error);
                    }
                },
                onDeleteComplete: function(id, xhr, isError) {
                    if (isError == false) {
                        $('#check_upload_file3_galery_listed').find('.listed_file_uuid[name="check_upload_file3_uuid[' + id + ']"]').remove();
                        $('#check_upload_file3_galery_listed').find('.listed_file_name[name="check_upload_file3_name[' + id + ']"]').remove();
                    }
                }
            }
        }); /*end file3 galery*/
        

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>