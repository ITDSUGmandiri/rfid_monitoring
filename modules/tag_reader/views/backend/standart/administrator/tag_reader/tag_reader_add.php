
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
<style>
    </style>
<section class="content-header">
    <h1>
        Reader        <small><?= cclang('new', ['Reader']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tag_reader'); ?>">Reader</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
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
                            <h3 class="widget-user-username">Reader</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Reader']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_tag_reader_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tag_reader_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                        <div class="form-group group-librarian_id ">
                            <label for="librarian_id" class="col-sm-2 control-label">Librarian                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="librarian_id" id="librarian_id" data-placeholder="Select Librarian">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [
                                    ];
                                    ?>

                                    <?php foreach (db_get_all_data('tag_librarian', $conditions) as $row): ?>
                                    <option value="<?= $row->librarian_id ?>"><?= $row->librarian_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                    

    <div class="form-group group-reader_name ">
                            <label for="reader_name" class="col-sm-2 control-label">Name                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="reader_name" id="reader_name" placeholder="Name" value="<?= set_value('reader_name'); ?>">
                                <small class="info help-block">
                                    <b>Input Reader Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_serialnumber ">
                            <label for="reader_serialnumber" class="col-sm-2 control-label">SN                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="reader_serialnumber" id="reader_serialnumber" placeholder="SN" value="<?= set_value('reader_serialnumber'); ?>">
                                <small class="info help-block">
                                    <b>Input Reader Serialnumber</b> Max Length : 10.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_type ">
                            <label for="reader_type" class="col-sm-2 control-label">Type                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="reader_type" id="reader_type" data-placeholder="Select Type">
                                    <option value=""></option>
                                    <option value="tcp">tcp</option>
                                    <option value="serial">serial</option>
                                                                    </select>
                                <small class="info help-block">

                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_ip ">
                            <label for="reader_ip" class="col-sm-2 control-label">IP                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="reader_ip" id="reader_ip" placeholder="IP" value="<?= set_value('reader_ip'); ?>">
                                <small class="info help-block">
                                    <b>Format Reader Ip must</b> Valid Ip,  <b>Input Reader Ip</b> Max Length : 45.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_port ">
                            <label for="reader_port" class="col-sm-2 control-label">Port                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="reader_port" id="reader_port" placeholder="Port" value="<?= set_value('reader_port'); ?>">
                                <small class="info help-block">
                                    <b>Input Reader Port</b> Max Length : 7.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_com ">
                            <label for="reader_com" class="col-sm-2 control-label">Com Port                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="reader_com" id="reader_com" data-placeholder="Select Com Port">
                                    <option value=""></option>
                                    <option value="/dev/cu.usbserial-1410">/dev/cu.usbserial-1410</option>
                                    <option value="/dev/cu.usbserial-1420">/dev/cu.usbserial-1420</option>
                                    <option value="COM1">COM1</option>
                                    <option value="COM2">COM2</option>
                                    <option value="COM3">COM3</option>
                                    <option value="COM4">COM4</option>
                                    <option value="COM5">COM5</option>
                                    <option value="COM6">COM6</option>
                                    <option value="COM7">COM7</option>
                                    <option value="COM8">COM8</option>
                                    <option value="COM9">COM9</option>
                                    <option value="COM10">COM10</option>
                                                                    </select>
                                <small class="info help-block">

                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group  wrapper-options-crud">
                            <label for="reader_baudrate" class="col-sm-2 control-label">Baud Rate                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_baudrate" value="9600"> 9600                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_baudrate" value="19200"> 19200                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_baudrate" value="38400"> 38400                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_baudrate" value="57600"> 57600                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_baudrate" value="115200"> 115200                                        </label>
                                    </div>
                                </select>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_power ">
                            <label for="reader_power" class="col-sm-2 control-label">Power                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="reader_power" id="reader_power" data-placeholder="Select Power">
                                    <option value=""></option>
                                    <option value="1">1 Dbi</option>
                                    <option value="2">2 Dbi</option>
                                    <option value="3">3 Dbi</option>
                                    <option value="25">25 Dbi</option>
                                                                    </select>
                                <small class="info help-block">

                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group  wrapper-options-crud">
                            <label for="reader_interval" class="col-sm-2 control-label">Interval                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="10"> 10                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="100"> 100                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="1000"> 1000                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="2000"> 2000                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="5000"> 5000                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="10000"> 10000                                        </label>
                                    </div>
                                <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input type="radio" class="flat-red" name="reader_interval" value="15000"> 15000                                        </label>
                                    </div>
                                </select>
                                <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_mode ">
                            <label for="reader_mode" class="col-sm-2 control-label">Mode                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="reader_mode" id="reader_mode" data-placeholder="Select Mode">
                                    <option value=""></option>
                                    <option value="answer">Answer</option>
                                    <option value="active">Active</option>
                                                                    </select>
                                <small class="info help-block">

                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-reader_family ">
                            <label for="reader_family" class="col-sm-2 control-label">Reader Family                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select" name="reader_family" id="reader_family" data-placeholder="Select Reader Family">
                                    <option value=""></option>
                                    <option value="hw">HW</option>
                                    <option value="rc">RC</option>
                                                                    </select>
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
</div>
</div>
</div>
</section>

<script>
  var module_name = "tag_reader"
  var use_ajax_crud = false
</script>

<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';

        


        

                    
    $('#btn_cancel').click(function() {
        swal({
                title: "<?= cclang('are_you_sure'); ?>",
                text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
                    window.location.href = ADMIN_BASE_URL + '/tag_reader';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tag_reader = $('#form_tag_reader_add');
    var data_post = form_tag_reader.serializeArray();
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
            url: ADMIN_BASE_URL + '/tag_reader/add_save',
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('.steps li').removeClass('error');
            $('form').find('.error-input').remove();
            if (res.success) {
                
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
            showPopup(false)


            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
            
            } else {
                if (res.errors) {

                    $.each(res.errors, function(index, val) {
                        $('form #' + index).parents('.form-group').addClass('has-error');
                        $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                    });
                    $('.steps li').removeClass('error');
                    $('.content section').each(function(index, el) {
                        if ($(this).find('.has-error').length) {
                            $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                        }
                    });
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

            if (use_ajax_crud == true) {

                var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tag_reader/index/?ajax=1'
                reloadDataTable(url);
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

    

    

    


    }); /*end doc ready*/
</script>