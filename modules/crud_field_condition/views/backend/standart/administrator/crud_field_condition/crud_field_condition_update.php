

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
        Crud Field Condition        <small>Edit Crud Field Condition</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/crud_field_condition'); ?>">Crud Field Condition</a></li>
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
                            <h3 class="widget-user-username">Crud Field Condition</h3>
                            <h5 class="widget-user-desc">Edit Crud Field Condition</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/crud_field_condition/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_crud_field_condition',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_crud_field_condition',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-crud_field_id  ">
                                <label for="crud_field_id" class="col-sm-2 control-label">Crud Field Id                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="crud_field_id" id="crud_field_id" placeholder="" value="<?= set_value('crud_field_id', $crud_field_condition->crud_field_id); ?>">
                                    <small class="info help-block">
                                        <b>Input Crud Field Id</b> Max Length : 11.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-reff  ">
                                <label for="reff" class="col-sm-2 control-label">Reff                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="reff" name="reff" rows="10" cols="80"> <?= set_value('reff', $crud_field_condition->reff); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-crud_id  ">
                                <label for="crud_id" class="col-sm-2 control-label">Crud Id                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group col-md-8 input-password">
                                        <input type="password" class="form-control password" name="crud_id" id="crud_id" placeholder="" value="">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-flat show-password"><i class="fa fa-eye eye"></i></button>
                                        </span>
                                    </div>
                                    <small class="info help-block">
                                        <b>Input Crud Id</b> Max Length : 11.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-cond_field  ">
                                <label for="cond_field" class="col-sm-2 control-label">Cond Field                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="cond_field" name="cond_field" rows="10" cols="80"> <?= set_value('cond_field', $crud_field_condition->cond_field); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-cond_operator  ">
                                <label for="cond_operator" class="col-sm-2 control-label">Cond Operator                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="cond_operator" name="cond_operator" rows="10" cols="80"> <?= set_value('cond_operator', $crud_field_condition->cond_operator); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-cond_value  ">
                                <label for="cond_value" class="col-sm-2 control-label">Cond Value                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="cond_value" name="cond_value" rows="10" cols="80"> <?= set_value('cond_value', $crud_field_condition->cond_value); ?></textarea>
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

    <script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>

<script>
    $(document).ready(function() {

        "use strict";
        
    window.event_submit_and_action = '';
            
    
      
      
      
        
        
    CKEDITOR.replace('reff');
    var reff = CKEDITOR.instances.reff;
        CKEDITOR.replace('cond_field');
    var cond_field = CKEDITOR.instances.cond_field;
        CKEDITOR.replace('cond_operator');
    var cond_operator = CKEDITOR.instances.cond_operator;
        CKEDITOR.replace('cond_value');
    var cond_value = CKEDITOR.instances.cond_value;
        
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
                    window.location.href = ADMIN_BASE_URL + '/crud_field_condition';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#reff').val(reff.getData());
        $('#cond_field').val(cond_field.getData());
        $('#cond_operator').val(cond_operator.getData());
        $('#cond_value').val(cond_value.getData());
        
    var form_crud_field_condition = $('#form_crud_field_condition');
    var data_post = form_crud_field_condition.serializeArray();
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
            url: form_crud_field_condition.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#crud_field_condition_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

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