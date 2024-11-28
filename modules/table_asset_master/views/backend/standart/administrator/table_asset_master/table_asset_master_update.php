

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
        Table Asset Master        <small>Edit Table Asset Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/table_asset_master'); ?>">Table Asset Master</a></li>
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
                            <h3 class="widget-user-username">Table Asset Master</h3>
                            <h5 class="widget-user-desc">Edit Table Asset Master</h5>
                            <hr>
                        </div>
                        <?= form_open(admin_base_url('/table_asset_master/edit_save/'.$this->uri->segment(4)), [
                        'name' => 'form_table_asset_master_edit',
                        'class' => 'form-horizontal form-step',
                        'id' => 'form_table_asset_master_edit',
                        'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    

	<div class="form-group group-kode_satker  ">
		<label for="kode_satker" class="col-sm-2 control-label">Kode Satker			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="kode_satker" id="kode_satker" placeholder="" value="<?= set_value('kode_satker', $table_asset_master->kode_satker); ?>">
			<small class="info help-block">
				<b>Input Kode Satker</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-nama_satker  ">
		<label for="nama_satker" class="col-sm-2 control-label">Nama Satker			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_satker" id="nama_satker" placeholder="" value="<?= set_value('nama_satker', $table_asset_master->nama_satker); ?>">
			<small class="info help-block">
				<b>Input Nama Satker</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-for_inventaris  ">
		<label for="for_inventaris" class="col-sm-2 control-label">For Inventaris			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="for_inventaris" id="for_inventaris" placeholder="" value="<?= set_value('for_inventaris', $table_asset_master->for_inventaris); ?>">
			<small class="info help-block">
				<b>Input For Inventaris</b> Max Length : 30.</small>
		</div>
	</div>


                            

<div class="form-group group-kode_brg  ">
        <label for="kode_brg" class="col-sm-2 control-label">Kode Brg            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="kode_brg" id="kode_brg" placeholder="" value="<?= set_value('kode_brg', $table_asset_master->kode_brg); ?>">
            <small class="info help-block">
                <b>Input Kode Brg</b> Max Length : 11.</small>
        </div>
    </div>


                            

<div class="form-group group-NUP  ">
        <label for="NUP" class="col-sm-2 control-label">NUP            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="NUP" id="NUP" placeholder="" value="<?= set_value('NUP', $table_asset_master->NUP); ?>">
            <small class="info help-block">
                <b>Input NUP</b> Max Length : 11.</small>
        </div>
    </div>


                            

<div class="form-group group-rfid_code_label  ">
        <label for="rfid_code_label" class="col-sm-2 control-label">Rfid Code Label            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="rfid_code_label" id="rfid_code_label" placeholder="" value="<?= set_value('rfid_code_label', $table_asset_master->rfid_code_label); ?>">
            <small class="info help-block">
                <b>Input Rfid Code Label</b> Max Length : 11.</small>
        </div>
    </div>


                            

	<div class="form-group group-nama_brg  ">
		<label for="nama_brg" class="col-sm-2 control-label">Nama Brg			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="" value="<?= set_value('nama_brg', $table_asset_master->nama_brg); ?>">
			<small class="info help-block">
				<b>Input Nama Brg</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-Merk  ">
		<label for="Merk" class="col-sm-2 control-label">Merk			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Merk" id="Merk" placeholder="" value="<?= set_value('Merk', $table_asset_master->Merk); ?>">
			<small class="info help-block">
				<b>Input Merk</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-Tipe  ">
		<label for="Tipe" class="col-sm-2 control-label">Tipe			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Tipe" id="Tipe" placeholder="" value="<?= set_value('Tipe', $table_asset_master->Tipe); ?>">
			<small class="info help-block">
				<b>Input Tipe</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-Kondisi  ">
		<label for="Kondisi" class="col-sm-2 control-label">Kondisi			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="Kondisi" id="Kondisi" placeholder="" value="<?= set_value('Kondisi', $table_asset_master->Kondisi); ?>">
			<small class="info help-block">
				<b>Input Kondisi</b> Max Length : 30.</small>
		</div>
	</div>


                            

<div class="form-group group-usia  ">
        <label for="usia" class="col-sm-2 control-label">Usia            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="usia" id="usia" placeholder="" value="<?= set_value('usia', $table_asset_master->usia); ?>">
            <small class="info help-block">
                <b>Input Usia</b> Max Length : 10.</small>
        </div>
    </div>


                            

<div class="form-group group-lokasi_id  ">
        <label for="lokasi_id" class="col-sm-2 control-label">Lokasi Id            <i class="required">*</i>
            </label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="lokasi_id" id="lokasi_id" placeholder="" value="<?= set_value('lokasi_id', $table_asset_master->lokasi_id); ?>">
            <small class="info help-block">
                <b>Input Lokasi Id</b> Max Length : 11.</small>
        </div>
    </div>


                            

<div class="form-group group-tgl_inventarisasi  ">
        <label for="tgl_inventarisasi" class="col-sm-2 control-label">Tgl Inventarisasi            <i class="required">*</i>
            </label>
        <div class="col-sm-6">
            <div class="input-group date col-sm-8">
                <input type="text" class="form-control pull-right datepicker" name="tgl_inventarisasi" placeholder="" id="tgl_inventarisasi" value="<?= set_value('table_asset_master_tgl_inventarisasi_name', $table_asset_master->tgl_inventarisasi); ?>">
            </div>
            <small class="info help-block">
                </small>
        </div>
    </div>



                            

	<div class="form-group group-location_asset  ">
		<label for="location_asset" class="col-sm-2 control-label">Location Asset			<i class="required">*</i>
			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="location_asset" id="location_asset" placeholder="" value="<?= set_value('location_asset', $table_asset_master->location_asset); ?>">
			<small class="info help-block">
				<b>Input Location Asset</b> Max Length : 30.</small>
		</div>
	</div>


                            

	<div class="form-group group-id  ">
		<label for="id" class="col-sm-2 control-label">Id			</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="id" id="id" placeholder="" value="<?= set_value('id', $table_asset_master->id); ?>">
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
  var module_name = "table_asset_master"
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
                    window.location.href = ADMIN_BASE_URL + '/table_asset_master';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_table_asset_master = $('#form_table_asset_master_edit');
    var data_post = form_table_asset_master.serializeArray();
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
            url: form_table_asset_master.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#table_asset_master_image_galery').find('li').attr('qq-file-id');
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

                    var url = BASE_URL + ADMIN_NAMESPACE_URL + '/table_asset_master/index/?ajax=1'
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