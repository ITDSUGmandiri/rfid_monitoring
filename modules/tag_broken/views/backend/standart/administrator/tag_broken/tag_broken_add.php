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
        Broken <small><?= cclang('new', ['Broken']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tag_broken'); ?>">Broken</a></li>
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
                            <h3 class="widget-user-username">Broken</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Broken']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_tag_broken_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_tag_broken_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                        <div class="form-group group-rfid_id">
                            <label for="rfid_id" class="col-sm-2 control-label">RFID <i class="required">*</i></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="rfid_id" id="rfid_id" data-placeholder="Select RFID">
                                    <option value=""></option>
                                    <?php
                                    $selected_rfid = isset($_POST['rfid_id']) ? $_POST['rfid_id'] : '';
                                    $conditions = ['location_status' => 'TERSEDIA'];
                                    $join_table = 'tag_location';
                                    $join_on = 'tag_rfid.rfid_id = tag_location.rfid_id';
                                    foreach (db_get_all_data_reza('tag_rfid', $conditions, $join_table, $join_on) as $row) :
                                    ?>
                                        <option value="<?= $row->rfid_id ?>" <?= $row->rfid_id == $selected_rfid ? 'selected' : '' ?>><?= $row->rfid_rfid; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block"><b>Input Rfid Id</b> Max Length : 11.</small>
                            </div>
                        </div>

                        <div class="form-group group-librarian_id">
                            <label for="librarian_id" class="col-sm-2 control-label">Librarian <i class="required">*</i></label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="librarian_id" id="librarian_id" data-placeholder="Select Librarian">
                                    <option value=""></option>
                                    <?php
                                    if (!empty($selected_rfid)) {
                                        $conditions = ['tag_location.rfid_id' => $selected_rfid];
                                        $join_table = 'tag_location';
                                        $join_on = 'tag_librarian.librarian_id = tag_location.librarian_id';
                                        foreach (db_get_all_data_reza('tag_librarian', $conditions, $join_table, $join_on) as $row) :
                                    ?>
                                            <option value="<?= $row->librarian_id ?>"><?= $row->librarian_name; ?></option>
                                    <?php
                                        endforeach;
                                    }
                                    ?>
                                </select>
                                <small class="info help-block"><b>Input Librarian Id</b> Max Length : 11.</small>
                            </div>
                        </div>



                        <div class="form-group group-broken_laporan ">
                            <label for="broken_laporan" class="col-sm-2 control-label">Tanggal Kerusakan <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="broken_laporan" placeholder="Tanggal Kerusakan" id="broken_laporan">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group group-broken_keterangan ">
                            <label for="broken_keterangan" class="col-sm-2 control-label">Keterangan Kerusakan <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="broken_keterangan" name="broken_keterangan" rows="5" class="textarea form-control" placeholder="Keterangan  Kerusakan"><?= set_value('broken_keterangan'); ?></textarea>
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
    var module_name = "tag_broken"
    var use_ajax_crud = false
</script>

<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';


        $('#rfid_id').change(function() {
            this.form.submit();
        });

        var librarianDropdown = $('#librarian_id');
        if (librarianDropdown.find('option').length === 2) {
            librarianDropdown.val(librarianDropdown.find('option:eq(1)').val());
        }
        librarianDropdown.trigger('chosen:updated');




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
                        window.location.href = ADMIN_BASE_URL + '/tag_broken';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();

            var form_tag_broken = $('#form_tag_broken_add');
            var data_post = form_tag_broken.serializeArray();
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
                    url: ADMIN_BASE_URL + '/tag_broken/add_save',
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

                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tag_broken/index/?ajax=1'
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