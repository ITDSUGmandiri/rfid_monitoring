
    <script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>


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
        Register Aset        <small>Edit Register Aset</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_transaksi'); ?>">Register Aset</a></li>
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
                            <h3 class="widget-user-username">Register Aset</h3>
                            <h5 class="widget-user-desc">Edit Register Aset</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/tb_master_transaksi/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_tb_master_transaksi_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_tb_master_transaksi_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    <h3>Form Register</h3>
<section>


<div class="form-group group-tipe_transaksi">
        <label for="tipe_transaksi" class="col-sm-2 control-label">Tipe Transaksi            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="tipe_transaksi" id="tipe_transaksi" data-placeholder="Select Tipe Transaksi">
                <option value=""></option>
                <?php
                $conditions = [
                ];
                ?>
                <?php foreach (db_get_all_data('tb_master_type_transaksi', $conditions) as $row): ?>
                <option <?= $row->id == $tb_master_transaksi->tipe_transaksi ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->tipe_transaksi; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>




                            

	<div class="form-group group-status_transaksi  ">
		<label for="status_transaksi" class="col-sm-2 control-label">Status Transaksi			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="" value="<?= set_value('status_transaksi', $tb_master_transaksi->status_transaksi); ?>">
			<small class="info help-block">
				</small>
		</div>
	</div>


                            

<div class="form-group group-tgl_awal_transaksi  ">
        <label for="tgl_awal_transaksi" class="col-sm-2 control-label">Tgl Awal Transaksi            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datepicker" name="tgl_awal_transaksi" placeholder="" id="tgl_awal_transaksi" value="<?= set_value('tb_master_transaksi_tgl_awal_transaksi_name', $tb_master_transaksi->tgl_awal_transaksi); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>



                            

	<div class="form-group group-ket_transaksi  ">
		<label for="ket_transaksi" class="col-sm-2 control-label">Ket Transaksi			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="ket_transaksi" id="ket_transaksi" placeholder="" value="<?= set_value('ket_transaksi', $tb_master_transaksi->ket_transaksi); ?>">
			<small class="info help-block">
				<b>Input Ket Transaksi</b> Max Length : 500.</small>
		</div>
	</div>


                            

<div class="form-group group-id_pegawai_input  ">
        <label for="id_pegawai_input" class="col-sm-2 control-label">Id Pegawai Input            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="id_pegawai_input" id="id_pegawai_input" placeholder="" value="<?= set_value('id_pegawai_input', $tb_master_transaksi->id_pegawai_input); ?>">
            <small class="info help-block">
                </small>
        </div>
    </div>


                            

	<div class="form-group group-nama_pegawai_input  ">
		<label for="nama_pegawai_input" class="col-sm-2 control-label">Nama Pegawai Input			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_pegawai_input" id="nama_pegawai_input" placeholder="" value="<?= set_value('nama_pegawai_input', $tb_master_transaksi->nama_pegawai_input); ?>">
			<small class="info help-block">
				<b>Input Nama Pegawai Input</b> Max Length : 100.</small>
		</div>
	</div>


                            </section><h3>Pilih Area</h3>
<section>


<div class="form-group group-id_area">
        <label for="id_area" class="col-sm-2 control-label">Id Area            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="id_area" id="id_area" data-placeholder="Select Id Area">
                <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_master_area') as $row): ?>
                    <option <?= $row->id == $tb_master_transaksi->id_area ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->area; ?></option>
                    <?php endforeach; ?>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>



                            

<div class="form-group group-id_gedung">
        <label for="id_gedung" class="col-sm-2 control-label">Id Gedung            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="id_gedung" id="id_gedung" data-placeholder="Select Id Gedung">
                <option value=""></option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>



                            

<div class="form-group group-id_ruangan">
        <label for="id_ruangan" class="col-sm-2 control-label">Id Ruangan            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <select class="form-control chosen chosen-select-deselect" name="id_ruangan" id="id_ruangan" data-placeholder="Select Id Ruangan">
                <option value=""></option>
                            </select>
            <small class="info help-block">
                </small>
        </div>
    </div>




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
</section>

<div class="message"></div>
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
  var module_name = "tb_master_transaksi"
  var use_ajax_crud = false

</script>


<script>
    $(document).ready(function() {

        "use strict";

        window.event_submit_and_action = '';

        


        
                    $('.container-button-bottom').hide();
            $('.form-step').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                enableAllSteps: true,
                onFinishing: function() {
                    $('.btn_save_back').trigger('click')
                },
                labels: {
                    finish: 'save'
                }
            });
            $('.custom-button-wrapper').appendTo('.actions')

        
        
    
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
                    window.location.href = ADMIN_BASE_URL + '/tb_master_transaksi';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_tb_master_transaksi = $('#form_tb_master_transaksi_edit');
    var data_post = form_tb_master_transaksi.serializeArray();
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
            url: form_tb_master_transaksi.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#tb_master_transaksi_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_master_transaksi/index/?ajax=1'
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

    

    

    function chained_id_gedung(selected, complete) {
        var val = $('#id_area').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: ADMIN_BASE_URL + '/tb_master_transaksi/ajax_id_gedung/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.id ? 'selected' : '') + ' value="' + val.id + '">' + val.gedung + '</option>'
                });
                $('#id_gedung').html(html);
                $('#id_gedung').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#id_area').change(function(event) {
        chained_id_gedung('')
    });

    function chained_id_ruangan(selected, complete) {
        var val = $('#id_gedung').val();
        $.LoadingOverlay('show')
        return $.ajax({
                url: ADMIN_BASE_URL + '/tb_master_transaksi/ajax_id_ruangan/' + val,
                dataType: 'JSON',
            })
            .done(function(res) {
                var html = '<option value=""></option>';
                $.each(res, function(index, val) {
                    html += '<option ' + (selected == val.id ? 'selected' : '') + ' value="' + val.id + '">' + val.ruangan + '</option>'
                });
                $('#id_ruangan').html(html);
                $('#id_ruangan').trigger('chosen:updated');
                if (typeof complete != 'undefined') {
                    complete();
                }

            })
            .fail(function() {
                toastr['error']('Error', 'Getting data fail')
            })
            .always(function() {
                $.LoadingOverlay('hide')
            });
    }


    $('#id_gedung').change(function(event) {
        chained_id_ruangan('')
    });

    async function chain() {
         await chained_id_gedung("<?= $tb_master_transaksi->id_gedung ?>");
         await chained_id_ruangan("<?= $tb_master_transaksi->id_ruangan ?>");
            }

    chain();




    }); /*end doc ready*/
</script>