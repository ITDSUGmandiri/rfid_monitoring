
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
        Bmn        <small><?= cclang('new', ['Bmn']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/bmn'); ?>">Bmn</a></li>
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
                            <h3 class="widget-user-username">Bmn</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Bmn']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_bmn_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_bmn_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                        <div class="form-group group-bagian ">
                            <label for="bagian" class="col-sm-2 control-label">Bagian                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="bagian" id="bagian" placeholder="Bagian" value="<?= set_value('bagian'); ?>">
                                <small class="info help-block">
                                    <b>Input Bagian</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-kode_barang ">
                            <label for="kode_barang" class="col-sm-2 control-label">Kode Barang                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?= set_value('kode_barang'); ?>">
                                <small class="info help-block">
                                    <b>Input Kode Barang</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-nama_barang ">
                            <label for="nama_barang" class="col-sm-2 control-label">Nama Barang                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang'); ?>">
                                <small class="info help-block">
                                    <b>Input Nama Barang</b> Max Length : 150.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-nup ">
                            <label for="nup" class="col-sm-2 control-label">Nup                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nup" id="nup" placeholder="Nup" value="<?= set_value('nup'); ?>">
                                <small class="info help-block">
                                    <b>Input Nup</b> Max Length : 11.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-merk ">
                            <label for="merk" class="col-sm-2 control-label">Merk                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?= set_value('merk'); ?>">
                                <small class="info help-block">
                                    <b>Input Merk</b> Max Length : 150.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-tanggal_perolehan ">
                            <label for="tanggal_perolehan" class="col-sm-2 control-label">Tanggal Perolehan                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal_perolehan" placeholder="Tanggal Perolehan" id="tanggal_perolehan">
                                </div>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                    

    <div class="form-group group-kategori_barang ">
                            <label for="kategori_barang" class="col-sm-2 control-label">Kategori Barang                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kategori_barang" id="kategori_barang" placeholder="Kategori Barang" value="<?= set_value('kategori_barang'); ?>">
                                <small class="info help-block">
                                    <b>Input Kategori Barang</b> Max Length : 50.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-tahun_sensus ">
                            <label for="tahun_sensus" class="col-sm-2 control-label">Tahun Sensus                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tahun_sensus" id="tahun_sensus" placeholder="Tahun Sensus" value="<?= set_value('tahun_sensus'); ?>">
                                <small class="info help-block">
                                    <b>Input Tahun Sensus</b> Max Length : 4.</small>
                            </div>
                        </div>
                    

    <div class="form-group group-keterangan ">
                            <label for="keterangan" class="col-sm-2 control-label">Keterangan                                <i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>">
                                <small class="info help-block">
                                    <b>Input Keterangan</b> Max Length : 255.</small>
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
  var module_name = "bmn"
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
                    window.location.href = ADMIN_BASE_URL + '/bmn';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_bmn = $('#form_bmn_add');
    var data_post = form_bmn.serializeArray();
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
            url: ADMIN_BASE_URL + '/bmn/add_save',
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

                var url = BASE_URL + ADMIN_NAMESPACE_URL + '/bmn/index/?ajax=1'
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