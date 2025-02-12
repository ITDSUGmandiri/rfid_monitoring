<link href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>


<section class="content-header">
    <h1>
        Register Aset<small><?= cclang('new', ['Register Aset']); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/registrasi_aset'); ?>">Register Aset</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>

<section class="content">

    <!-- Insert New Data box -->
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Isi data pada form dengan lengkap dan benar</h3>
            <div class="box-tools pull-right">
                <!-- <button type="button" onClick="window.location='<?php echo site_url(); ?>aset';" class="btn btn-default"><i class="fa fa-undo"></i> Cancel</button> -->
            </div>
        </div>

        <div class="box-body" id="add_new">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <?= form_open('', [
                    'name' => 'form_tb_master_transaksi_add',
                    // 'class' => 'form-horizontal form-step',
                    // 'class' => 'form-step',
                    'id' => 'form_tb_master_transaksi_add',
                    'enctype' => 'multipart/form-data',
                    'method' => 'POST',
                    'autocomplete' => 'off',
                    'class' => 'form form-horizontal'
                ]);
                ?>

                <?php
                $user_groups = $this->model_group->get_user_group_ids();
                ?>

                <h3 style="text-decoration: underline;">Form Register</h3>
                <!-- <hr> -->

                <!-- <section> -->
                <fieldset>

                    <!-- <div class="form-group group-tipe_transaksi ">
                            <label for="tipe_transaksi" class="col-sm-2 control-label">Tipe Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="tipe_transaksi" id="tipe_transaksi" data-placeholder="Select Tipe Transaksi">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_master_type_transaksi', $conditions) as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->tipe_transaksi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div> -->

                    <input type="hidden" name="ip_address_server" id="ip_address_server" value="<?= $pengaturan_sistem->ip_address_server; ?>">
                    <input type="hidden" name="port_ws_server" id="port_ws_server" value="<?= $pengaturan_sistem->port_ws_server; ?>">

                    <input type="hidden" name="tipe_transaksi" id="tipe_transaksi" value="2">
                    <input type="hidden" name="status_transaksi" id="status_transaksi" value="1">
                    <input type="hidden" name="id_pegawai_input" id="id_pegawai_input" value="0">
                    <input type="hidden" name="nama_pegawai_input" id="nama_pegawai_input" value="0">
                    <input type="hidden" name="id_pegawai" id="id_pegawai" value="0">
                    <input type="hidden" name="nama_pegawai" id="nama_pegawai" value="0">

                    <!-- <div class="form-group group-status_transaksi ">
                            <label for="status_transaksi" class="col-sm-2 control-label">Status Transaksi<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="Status Transaksi" value="<?= set_value('status_transaksi'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div> -->

                    <div class="form-group group-tgl_awal_transaksi ">
                        <label for="tgl_awal_transaksi" class="col-sm-2 control-label">Tgl Awal Transaksi<i class="required">*</i>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                                <input type="text" class="form-control pull-right datepicker" name="tgl_awal_transaksi" placeholder="Tgl Awal Transaksi" id="tgl_awal_transaksi">
                            </div>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <div class="form-group group-ket_transaksi ">
                        <label for="ket_transaksi" class="col-sm-2 control-label">Ket Transaksi<i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ket_transaksi" id="ket_transaksi" placeholder="Ket Transaksi" value="<?= set_value('ket_transaksi'); ?>">
                            <small class="info help-block">
                                <b>Input Ket Transaksi</b> Max Length : 500.</small>
                        </div>
                    </div>

                    <!-- <div class="form-group group-id_pegawai_input ">
                            <label for="id_pegawai_input" class="col-sm-2 control-label">Id Pegawai Input</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="id_pegawai_input" id="id_pegawai_input" placeholder="Id Pegawai Input" value="<?= set_value('id_pegawai_input'); ?>">
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-nama_pegawai_input ">
                            <label for="nama_pegawai_input" class="col-sm-2 control-label">Nama Pegawai Input</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_pegawai_input" id="nama_pegawai_input" placeholder="Nama Pegawai Input" value="<?= set_value('nama_pegawai_input'); ?>">
                                <small class="info help-block">
                                    <b>Input Nama Pegawai Input</b> Max Length : 100.</small>
                            </div>
                        </div> -->

                </fieldset>
                <!-- </section> -->

                <h3 style="text-decoration: underline;">Pilih Area</h3>
                <!-- <hr> -->

                <!-- <section> -->
                <fieldset>

                    <div class="form-group group-id_area ">
                        <label for="id_area" class="col-sm-2 control-label">Area<i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control chosen chosen-select-deselect" name="id_area" id="id_area" data-placeholder="Pilih Area">
                                <option value=""></option>
                                <?php foreach (db_get_all_data('tb_master_area') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->area; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <div class="form-group group-id_gedung ">
                        <label for="id_gedung" class="col-sm-2 control-label">Gedung<i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control chosen chosen-select-deselect" name="id_gedung" id="id_gedung" data-placeholder="Pilih Gedung">
                                <option value=""></option>
                            </select>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <div class="form-group group-id_ruangan ">
                        <label for="id_ruangan" class="col-sm-2 control-label">Ruangan<i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control chosen chosen-select-deselect" name="id_ruangan" id="id_ruangan" data-placeholder="Pilih Ruangan">
                                <option value=""></option>
                            </select>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>

                    <!-- </section> -->
                </fieldset>

                <h3 style="text-decoration: underline;">Pilih Aset</h3>
                <!-- <hr> -->

                <!-- <section> -->
                <fieldset>

                    <!-- <div class="row">

                            <div class="col-md-8">
                                                                
                                        <div class="col-sm-2 padd-left-0 " >
                                            <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >                                
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2 padd-left-0 ">
                                            <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                                        </div>
                                                    
                                        <div class="col-sm-3 padd-left-0  " >
                                            <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                                        </div>
                                        
                                        <div class="col-sm-3 padd-left-0 " >
                                            <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                                                <option value=""><?= cclang('all'); ?></option>
                                                <option <?= $this->input->get('f') == 'nama_aset' ? 'selected' : ''; ?> value="nama_aset">Nama Aset</option>
                                                <option <?= $this->input->get('f') == 'kode_aset' ? 'selected' : ''; ?> value="kode_aset">Kode Aset</option>
                                                <option <?= $this->input->get('f') == 'nup' ? 'selected' : ''; ?> value="nup">NUP</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-1 padd-left-0 ">
                                            <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                            Filter
                                            </button>
                                        </div>
                                        
                                        <div class="col-sm-1 padd-left-0 ">
                                            <a class="btn btn-default btn-flat" name="refresh" id="refresh" value="Apply" title="<?= cclang('reset_filter'); ?>">
                                                <i class="fa fa-undo"></i>
                                            </a>
                                        </div>
                                
                            </div>

                        </div> -->

                    <div class="row" style="margin-top: 10px; margin-bottom: 20px">
                        <div class="col-md-12">

                            <table id="register" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="MyTableCheckAllButton">
                                            <!-- <button style="border: none; background: transparent; font-size: 14px;" id="MyTableCheckAllButton">
                                                <i class="far fa-square"></i>
                                            </button> -->
                                        </th>
                                        <th>ID Aset</th>
                                        <th>Nama Aset</th>
                                        <th>Kode Aset</th>
                                        <th>NUP Aset</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tb_master_asets as $tb_master_aset): ?>

                                        <tr>
                                            <td></td>
                                            <td id="id_aset" key="id_aset"><?= _ent($tb_master_aset->id_aset); ?></td>
                                            <td id="nama_aset" key="nama_aset"><?= _ent($tb_master_aset->nama_aset); ?></td>
                                            <td id="kode_aset" key="kode_aset"><?= _ent($tb_master_aset->kode_aset); ?></td>
                                            <td id="nup" key="nup"><?= _ent($tb_master_aset->nup); ?></td>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>ID Aset</th>
                                        <th>Nama Aset</th>
                                        <th>Kode Aset</th>
                                        <th>NUP Aset</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                    <!-- </section> -->
                </fieldset>

                <div class="row">
                    <div class="col-md-3">
                        <input type="hidden" name="data_array_aset" id="data_array_aset" value="0">
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">

                            <input type="hidden" name="string_id" id="string_id" value="0">

                            <a class="btn btn-flat btn-success btn_search btn_action btn_search_back btn-block" id="btn_pilih_aset" data-stype='back' title="Search">
                                <i class="ion ion-ios-list-outline"></i> Pilih Aset
                            </a>

                        </div>
                        <small class="info help-block"><b>Total Aset dipilih: <span id="total_aset_checklist"></span></b>
                        </small>
                    </div>

                    <div class="col-md-3"></div>
                </div>

                <h3 style="text-decoration: underline;">Pilih Tag</h3>

                <fieldset>

                    <div class="row">

                        <div class="col-md-3"></div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">IP Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="IP Address">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3"></div>

                    </div>

                </fieldset>

                <!-- <fieldset>

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Single RFID Tag</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="single_rfid_tag" name="single_rfid_tag" placeholder="Single RFID Tag">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-flat btn-primary btn_search btn_action btn_search_back btn-block" id="btn_search_single_tag" data-stype='back' title="Search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3"></div>
                            
                        </div>

                        <div class="row">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode EPC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="single_kode_epc" name="single_kode_epc" placeholder="Kode EPC">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3"></div>
                            
                        </div>

                    </fieldset> -->

                <div class="row">

                    <div class="col-md-3">
                        <input type="hidden" name="array_tag_code" id="array_tag_code" value="0">
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">

                            <a class="btn btn-flat btn-info btn_search btn_action btn_search_back btn-block" id="btn_search" data-stype='back' title="Search">
                                <i class="fa fa-search"></i>&nbsp;Search
                            </a>

                            <!-- &nbsp;&nbsp;

                                <a class="btn btn-flat btn-success btn_search btn_action btn_search_back btn-block" id="btn_get_list_tag" data-stype='back' title="Search">
                                    <i class="fa fa-list"></i>&nbsp;Get All Data RFID Tag
                                </a>

                                &nbsp;&nbsp;

                                <a class="btn btn-flat btn-danger btn_search btn_action btn_search_back btn-block" id="btn_delete_tag" data-stype='back' title="Search">
                                    <i class="fa fa-trash"></i>&nbsp;Delete Data RFID Tag
                                </a>

                                &nbsp;&nbsp;

                                <a class="btn btn-flat btn-danger btn_search btn_action btn_search_back btn-block" id="btn_all_delete_tag" data-stype='back' title="Search">
                                    <i class="fa fa-trash"></i>&nbsp;Delete All Data RFID Tag
                                </a>

                                &nbsp;&nbsp;

                                <a class="btn btn-flat btn-primary btn_search btn_action btn_search_back btn-block" id="btn_insert_tag" data-stype='back' title="Search">
                                    <i class="fa fa-plus"></i>&nbsp;Insert Data RFID Tag
                                </a>

                                &nbsp;&nbsp;

                                <a class="btn btn-flat btn-warning btn_search btn_action btn_search_back btn-block" id="btn_update_tag" data-stype='back' title="Search">
                                    <i class="fa fa-pencil"></i>&nbsp;Update Data RFID Tag
                                </a>

                                &nbsp;&nbsp;

                                <a class="btn btn-flat btn-default btn_search btn_action btn_search_back btn-block" id="btn_delete_tag" data-stype='back' title="Search">
                                    <i class="fa fa-check"></i>&nbsp;Cek Data Valid
                                </a> -->

                        </div>
                        <small class="info help-block"><b>Status:</b>
                            <div id="status"></div>
                        </small>&nbsp;&nbsp;<small class="info help-block"><b>Total RFID Tag:</b>
                            <div id="total_rfid_tag"></div>
                        </small>
                    </div>

                    <div class="col-md-3"></div>
                </div>

                <div class="row" style="margin-top: 10px; margin-bottom: 20px">
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <br>
                            <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                <thead>
                                    <tr class="">
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center" data-field="kode_tid" data-sort="1" data-primary-key="0"> <?= cclang('kode_tid') ?></th>
                                        <th style="text-align: center" data-field="kode_epc" data-sort="1" data-primary-key="0"> <?= cclang('kode_epc') ?></th>
                                        <th style="text-align: center" data-field="status_tag" data-sort="1" data-primary-key="0"> <?= cclang('status_tag') ?></th>
                                        <!-- <th style="text-align: center">Description</th>                         -->
                                    </tr>
                                </thead>
                                <tbody id="tbody_ug_mstag">
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">

                            <!-- Submit Button -->
                            <!-- <button onclick="return confirm('Save your data?')" name="submit" id="submit" type="submit" class="peringatan btn btn-default">
                                    <i class="fa fa-save"></i> Submit
                                </button> -->

                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>

                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <!-- Cancel Button -->
                            <div class="custom-button-wrapper"></div>

                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>

                            <!-- Loading Indicator -->
                            <span class="loading loading-hide" style="display: inline-block; margin-left: 15px;">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg" alt="Loading">
                                <i id="data_processing"></i>
                            </span>
                        </div>

                        <!-- Help Text -->
                        <div class="text-center">
                            <p class="help-block">(*) Mandatory</p>
                        </div>

                    </div>

                </div>

                <div class="message"></div>

                <?= form_close(); ?>

            </div>
            <!-- /.col-xs-12 -->

        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->

</section>

<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/socket.io.js"></script>

<script type="text/javascript">
    var module_name = "registrasi_aset";
    var use_ajax_crud = false;
</script>


<script>
    $(document).ready(function() {
        // checked pagination
        let myTable = $('#register').DataTable({
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0,
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child',
                headerCheckbox: 'select-page'
            },
            // select: {
            //     style: 'os', // 'single', 'multi', 'os', 'multi+shift'
            //     selector: 'td:first-child',
            // },
            order: [
                [1, 'asc'],
            ],
        });



        $('#MyTableCheckAllButton').click(function() {
            if (myTable.rows({
                    selected: true
                }).count() > 0) {
                myTable.rows().deselect();
                return;
            }

            myTable.rows().select();

        });

        myTable.on('select deselect', function(e, dt, type, indexes) {
            if (type === 'row') {
                // We may use dt instead of myTable to have the freshest data.
                if (dt.rows().count() === dt.rows({
                        selected: myTable.rows('.selected').data().toArray().length != 0
                    }).count()) {
                    var uncek1 = myTable.rows('.selected').data().toArray().length

                    // Deselect all items button.
                    if (uncek1 < 1) {
                        $("#MyTableCheckAllButton").prop('checked', false);
                        $('#MyTableCheckAllButton').removeClass('far fa-minus-square');
                        $('#MyTableCheckAllButton').removeClass('fa-check-square');

                    } else {
                        $("#MyTableCheckAllButton").prop('checked', true);

                    }
                    // $('#MyTableCheckAllButton').addClass('far fa-check-square');
                    return;
                }

                if (dt.rows({
                        selected: myTable.rows('.selected').data().toArray().length != 0
                    }).count() === 0) {
                    var uncek2 = myTable.rows('.selected').data().toArray().length
                    // Deselect all items button.
                    console.log("vv", uncek2);

                    if (uncek2 === 0) {
                        $('#MyTableCheckAllButton').removeClass('fa-minus-square');
                        $('#MyTableCheckAllButton').removeClass('fa-check-square');

                    } else {
                        $('#MyTableCheckAllButton').addClass('far fa-square');

                    }
                    // Select all items button.
                    return;
                }

                var arrl = myTable.rows('.selected').data().toArray().length
                // Deselect all items button.
                if (arrl === 0) {
                    $('#MyTableCheckAllButton').removeClass('fa-square');
                } else {
                    $('#MyTableCheckAllButton').removeClass('fa-check-square');
                    $('#MyTableCheckAllButton').addClass('far fa-minus-square');
                }

                // // Deselect some items button.
                // $('#MyTableCheckAllButton').addClass('far fa-minus-square');
                // $('#MyTableCheckAllButton').removeClass('fa-square');

            }
        });
        // batas check pagination

        $('#btn_pilih_aset').click(function(e) {
            // e.preventDefault();
            // get_datatables_checked();
            // return false;
            console.log("ridwan", myTable.rows('.selected').data().toArray().length);

            if (myTable.rows('.selected').data().toArray().length == 0) {
                $('#total_aset_checklist').html(0);
                swal({
                    title: "Perhatian !",
                    text: "Silahkan pilih Aset yang ingin di Daftarkan RFID!",
                    type: "error"
                });
                return false;
            } else {
                $('#total_aset_checklist').html(myTable.rows('.selected').data().toArray().length);

                arrayObj = myTable.rows('.selected').data().toArray().map(item => {
                    return {
                        id: item[1],
                        kode_aset: item[3],
                        nama_aset: item[2],
                        nup: item[4]
                    };
                });

                // $('#string_id').val(string_id);
                $('#data_array_aset').val(JSON.stringify(arrayObj)); // Menyimpan array data ke hidden input
                return true;
            }
        });


    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

        $('.loading').hide();
        $('#total_aset_checklist').html('0');
        $('#total_rfid_tag').html('0');
        $('#status').html('Disconnected');
        $('#ip_address').attr('placeholder', 'Masukkan IP Address');
        // $('#ip_address').val('');

        var stored_ip_address = localStorage.getItem('ip_address');

        if (stored_ip_address) {
            $('#ip_address').val(stored_ip_address);
            // console.log('IP Address yang tersimpan:', stored_ip_address);
            // alert('IP Address tersimpan: ' + stored_ip_address);
        } else {
            // localStorage.setItem('ip_address', ip_address);
            console.log('Tidak ada IP Address yang tersimpan.');
            // alert('Tidak ada IP Address yang tersimpan.');
        }

        "use strict";
        window.event_submit_and_action = '';
        $('.container-button-bottom').hide();

        // Deklarasi array global untuk menyimpan data unik berdasarkan TID
        var uniqueDataArray = [];

        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/serverSideData';



        // table = $('#asetTable').DataTable({
        //     // "paging": true,
        //     // "searching": true,
        //     // "ordering": true,
        //     // "info": true,
        //     "processing": true,
        //     "serverSide": true,
        //     "ajax": {
        //         url: url,
        //         type: "POST",
        //         // type: "GET",
        //         // data: function (d) {
        //         //     d.filter_id_parameter = $('#filter_id_parameter').val();
        //         // }
        //     },
        //     "order": [
        //         [3, 'asc']
        //     ],
        //     columns: [{

        //             "data": "checkbox_id_master_aset",
        //             "className": "dt-center",
        //             "orderable": false,
        //             "searchable": false
        //         },
        //         {
        //             "data": "auto_number",
        //             "className": "dt-center",
        //             "orderable": false,
        //             "searchable": false
        //         },
        //         {
        //             data: "id",
        //             className: "dt-center",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "nama_aset",
        //             className: "dt-left",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "kode_aset",
        //             className: "dt-left",
        //             orderable: true,
        //             searchable: true
        //         },
        //         {
        //             data: "nup",
        //             className: "dt-center",
        //             orderable: true,
        //             searchable: true
        //         },
        //         // { data: "Action", className: "dt-center", orderable: false, searchable: false },
        //     ],
        //     "createdRow": function(row, data, dataIndex) {
        //         // Paksa semua kolom angka menjadi rata tengah
        //         $('td', row).eq(1).css('text-align', 'center');
        //         $('td', row).eq(2).css('text-align', 'center');
        //         $('td', row).eq(5).css('text-align', 'center');
        //     }
        // });



        $('#btn_search_single_tag').click(function() {

            $('#single_rfid_tag').val('');

            var ip_address = $('#ip_address').val();
            // var single_rfid_tag = $('#single_rfid_tag').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            // if (single_rfid_tag == '') {
            //     swal({
            //         title: "Error", 
            //         text: "Single RFID Tag tidak boleh kosong!",
            //         type: "error",
            //         showCancelButton: false,
            //         confirmButtonColor: "#DD6B55",
            //         confirmButtonText: "Okay!",
            //         closeOnConfirm: true
            //     });
            //     return false;
            // }

            const socket = new WebSocket('ws://' + ip_address + ':3030');

            // socket.addEventListener('open', function() {
            //     socket.send('{"event": "scan-rfid-single"}');
            // });

            socket.onopen = function(event) {
                $('#status').html('Connected');
                socket.send('{"event": "scan-rfid-single"}');
            };

            socket.onclose = function(event) {
                if (event.wasClean) {
                    console.log('WebSocket connection closed');
                } else {
                    console.log('WebSocket connection died');
                }
                $('#status').html('Not Connected to Server');
                $('#data_processing').html('');
            };

            socket.onmessage = async function(event) {

                var parsedData = JSON.parse(event.data);

                if (parsedData.event == 'scan-rfid-result') {

                    $('#single_rfid_tag').val(parsedData.data_tid);
                    $('#single_kode_epc').val(parsedData.data);
                    console.log('scan-rfid-result: ' + parsedData.data_tid);
                    // socket.send('{"event": "db-storage-insert-rfid-list", "value": {"tid": "' + parsedData.data_tid + '", "status": 1}}');

                } else {
                    console.log('event: ' + parsedData.event);
                }
            };

            return false;
        });

        $('#btn_update_tag').click(function() {

            var ip_address = $('#ip_address_server').val();
            var port_ws_server = $('#port_ws_server').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            if (port_ws_server == '') {
                swal({
                    title: "Error",
                    text: "Port WebSocket Server tidak boleh kosong, silahkan cek pengaturan sistem!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            var single_rfid_tag = $('#single_rfid_tag').val();

            if (single_rfid_tag == '') {
                swal({
                    title: "Error",
                    text: "RFID Tag tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            var single_kode_epc = $('#single_kode_epc').val();

            if (single_kode_epc == '') {
                swal({
                    title: "Error",
                    text: "Kode EPC tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

            socket.addEventListener('open', function() {

                var status = 2;
                var flag_alarm = 0;

                // var flag_alarm_input = prompt("Masukkan nilai flag alarm (0 atau 1):", "0");

                // // Validasi input hanya boleh 0 atau 1
                // if(flag_alarm_input !== "0" && flag_alarm_input !== "1") {
                //     swal({
                //         title: "Error",
                //         text: "Flag alarm hanya boleh diisi nilai 0 atau 1!",
                //         type: "error", 
                //         showCancelButton: false,
                //         confirmButtonColor: "#DD6B55",
                //         confirmButtonText: "Okay!",
                //         closeOnConfirm: true
                //     });
                //     return false;
                // }

                // flag_alarm = parseInt(flag_alarm_input);

                var description = 'DEMO-RFID';
                var category = 0;

                alert('tid: ' + single_rfid_tag + ' epc: ' + single_kode_epc + ' status: ' + status + ' description: ' + description + ' flag_alarm: ' + flag_alarm + ' category: ' + category);

                socket.send('{"event": "db-storage-update-rfid-list", "value": {"tid": "' + single_rfid_tag + '", "epc": "' + single_kode_epc + '", "status": "' + status + '", "description": "' + description + '", "flag_alarm": "' + flag_alarm + '", "category": "' + category + '"}}');
                console.log('post db-storage-update-rfid-list: ' + single_rfid_tag + ' ' + single_kode_epc);
            });

            socket.onopen = function(event) {
                $('#status').html('Connected');
            };

            socket.onclose = function(event) {
                $('#status').html('Not Connected to Server');
                $('#data_processing').html('');
            };

            socket.onmessage = async function(event) {

                var parsedData = JSON.parse(event.data);
                console.log('event datang: ' + event.data);

                var event_name = parsedData.event;
                var message = parsedData.message;

                if (event_name == 'response-db-storage-update-rfid-list') {

                    if (message == 'success') {

                        console.log('response-db-storage-update-rfid-list: ' + message);
                        $('#single_rfid_tag').val('');
                        $('#single_kode_epc').val('');

                        swal({
                            title: "Info",
                            text: "RFID Tag berhasil diupdate!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: true
                        });

                    } else {
                        console.log('response-db-storage-update-rfid-list failed: ' + message);
                    }

                } else if (event_name == 'error') {

                    console.log('Error: ' + message);

                    swal({
                        title: "Error",
                        text: message,
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });

                } else {
                    console.log('event: ' + event_name);
                }

            };

        });

        $('#btn_insert_tag').click(function() {

            var ip_address = $('#ip_address_server').val();
            var port_ws_server = $('#port_ws_server').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }
            const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

            socket.addEventListener('open', function() {
                var single_rfid_tag = $('#single_rfid_tag').val();
                var single_kode_epc = $('#single_kode_epc').val();
                var status = 1;
                var description = 'DEMO-RFID';
                var flag_alarm = 0;
                var category = 0;
                socket.send('{"event": "db-storage-insert-rfid-list", "value": {"tid": "' + single_rfid_tag + '", "epc": "' + single_kode_epc + '", "status": "' + status + '", "description": "' + description + '", "flag_alarm": "' + flag_alarm + '", "category": "' + category + '"}}');
                console.log('post db-storage-insert-rfid-list: ' + single_rfid_tag);
            });

            socket.onopen = function(event) {
                $('#status').html('Connected');
            };

            socket.onclose = function(event) {
                if (event.wasClean) {
                    console.log('WebSocket connection closed');
                } else {
                    console.log('WebSocket connection died');
                }
                $('#status').html('Not Connected to Server');
                $('#data_processing').html('');
            };

            socket.onmessage = async function(event) {

                var parsedData = JSON.parse(event.data);
                console.log('event datang: ' + event.data);

                var event_name = parsedData.event;
                var message = parsedData.message;

                if (event_name == 'response-db-storage-insert-rfid-list') {

                    if (message == '[Success] Insert Tags!') {
                        console.log('response-db-storage-insert-rfid-list: ' + message);
                        $('#single_rfid_tag').val('');
                        $('#single_kode_epc').val('');
                    } else if (message == '[Failed] Insert Tags!') {
                        console.log('response-db-storage-insert-rfid-list failed: ' + message);
                    } else if (message == '[Info] Tags Already Register') {

                        $('#single_rfid_tag').val('');
                        $('#single_kode_epc').val('');

                        swal({
                            title: "Info",
                            text: "RFID Tag sudah terdaftar!",
                            type: "info",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: true
                        });

                    } else if (message == '[Invalid] Rfid Tags!') {

                        swal({
                            title: "Info",
                            text: "RFID Tag tidak valid!",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: true
                        });

                    } else {
                        console.log('response-db-storage-insert-rfid-list: ' + message);
                    }

                } else if (event_name == 'error') {

                    console.log('error: ' + message);

                    swal({
                        title: "Error",
                        text: message,
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });

                } else {
                    console.log('event: ' + event_name);
                }

            };

        });

        $('#btn_all_delete_tag').click(async function() {

            var ip_address = $('#ip_address_server').val();
            var port_ws_server = $('#port_ws_server').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            if (port_ws_server == '') {
                swal({
                    title: "Error",
                    text: "Port WebSocket Server tidak boleh kosong, silahkan cek pengaturan sistem!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            const result = await new Promise((resolve) => {
                swal({
                        title: "Konfirmasi",
                        text: "Anda yakin ingin menghapus semua RFID Tag?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Tidak, Batalkan!",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        resolve(isConfirm);
                    });
            });

            if (!result) {
                return false;
            }

            try {
                const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

                await new Promise((resolve, reject) => {
                    socket.addEventListener('open', async function() {

                        try {

                            const response = await fetch('<?php echo base_url('administrator/registrasi_aset/get_all_tag'); ?>');
                            const data = await response.json();

                            console.log(data);

                            const uniqueDataArray = data.data;

                            for (const item of uniqueDataArray) {

                                const data = {
                                    event: "db-storage-remove-rfid-list",
                                    value: {
                                        tid: item.kode_tid
                                    }
                                };

                                socket.send(JSON.stringify(data));
                                console.log('post db-storage-remove-rfid-list: ' + item.kode_tid);

                                await new Promise(resolve => setTimeout(resolve, 100)); // Delay antar pengiriman

                            }
                            resolve();

                        } catch (error) {
                            reject(error);
                        }

                    });

                    socket.addEventListener('error', function(error) {
                        reject(error);
                    });
                });

            } catch (error) {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "Terjadi kesalahan saat menghapus data",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
            }

            // Hapus data dari database lokal
            try {

                const response = await fetch('<?php echo base_url('administrator/registrasi_aset/delete_all_tag'); ?>');
                const data = await response.json();

                console.log(data);

                if (data.success) {

                    swal({
                        title: "Info",
                        text: "Semua RFID Tag berhasil dihapus!",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });

                }

            } catch (error) {
                console.error('Error saat menghapus dari database lokal:', error);
                swal({
                    title: "Error",
                    text: "Terjadi kesalahan saat menghapus data dari database lokal",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

        });

        $('#btn_delete_tag').click(function() {

            var ip_address = $('#ip_address_server').val();
            var port_ws_server = $('#port_ws_server').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            if (port_ws_server == '') {
                swal({
                    title: "Error",
                    text: "Port WebSocket Server tidak boleh kosong, silahkan cek pengaturan sistem!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            var single_rfid_tag = $('#single_rfid_tag').val();

            // harus di tambahin ini, karena klo pas mau delete parameter tid nya kosong, maka tidak ada response dari server
            if (single_rfid_tag == '') {
                swal({
                    title: "Error",
                    text: "RFID Tag tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            swal({
                    title: "Konfirmasi",
                    text: "Anda yakin ingin menghapus RFID Tag ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {

                    if (!isConfirm) {
                        return false;
                    } else {

                        const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

                        socket.addEventListener('open', function() {
                            socket.send('{"event": "db-storage-remove-rfid-list", "value": {"tid": "' + single_rfid_tag + '"}}');
                            console.log('post db-storage-remove-rfid-list: ' + single_rfid_tag);
                        });

                        socket.onopen = function(event) {
                            $('#status').html('Connected');
                        };

                        socket.onclose = function(event) {
                            if (event.wasClean) {
                                console.log('WebSocket connection closed');
                            } else {
                                console.log('WebSocket connection died');
                            }
                            $('#status').html('Not Connected to Server');
                            $('#data_processing').html('');
                        };

                        socket.onmessage = async function(event) {

                            var parsedData = JSON.parse(event.data);
                            console.log('event datang: ' + event.data);

                            var event_name = parsedData.event;
                            var message = parsedData.message;

                            if (event_name == 'response-db-storage-remove-rfid-list') {

                                if (message == '[Success] Unregister Tags') {
                                    console.log('response-db-storage-remove-rfid-list: ' + message);
                                    $('#single_rfid_tag').val('');
                                    $('#single_kode_epc').val('');

                                    swal({
                                        title: "Info",
                                        text: "RFID Tag berhasil dihapus!",
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Okay!",
                                        closeOnConfirm: true
                                    });

                                } else {
                                    console.log('response-db-storage-remove-rfid-list failed: ' + message);
                                }

                            } else {
                                console.log('event: ' + event_name);
                            }

                        };

                    }

                });

        });

        $('#btn_get_list_tag').click(function() {

            var ip_address = $('#ip_address_server').val();
            var port_ws_server = $('#port_ws_server').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address Server tidak boleh kosong, silahkan cek pengaturan sistem!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            if (port_ws_server == '') {
                swal({
                    title: "Error",
                    text: "Port WebSocket Server tidak boleh kosong, silahkan cek pengaturan sistem!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }
            const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

            socket.addEventListener('open', function() {
                socket.send('{"event": "db-storage-get-rfid-list"}');
            });

            socket.onopen = function(event) {

                // console.log('Your System Connected to WebSocket server');
                $('#status').html('Connected');
                //   const messageArea = document.getElementById('messageArea');
                //   messageArea.innerHTML = '';
                //   messageArea.innerHTML += 'Status : Connected to Server';
                //socket.send('refresh');

            };

            socket.onclose = function(event) {
                if (event.wasClean) {
                    console.log('WebSocket connection closed');
                } else {
                    console.log('WebSocket connection died');
                }
                $('#status').html('Not Connected to Server');
                $('#data_processing').html('');
            };

            socket.onmessage = function(event) {

                var parsedData = JSON.parse(event.data);
                var event_name = parsedData.event;

                if (event_name == 'response-db-storage-get-rfid-list') {

                    var statusCode = parsedData.statusCode;
                    var message = parsedData.message;
                    var value = parsedData.value;

                    if (statusCode == 1 && message == 'success') {

                        console.log('response-db-storage-get-rfid-list: ' + value);
                        $('#your_table_id tbody').empty();

                        // Ekstrak data dari value
                        value.forEach(function(item, index) {
                            var no = index + 1;
                            $('#your_table_id tbody').append(`
                                <tr>    
                                    <td style="text-align: center">${no}</td>
                                    <td style="text-align: center">${item.tid}</td>
                                    <td style="text-align: center">${item.epc}</td>
                                    <td style="text-align: center">${item.status}</td>
                                    <td style="text-align: center">${item.description}</td>
                                    <td style="text-align: center">${item.category}</td>
                                    <td style="text-align: center">${item.flag_alarm}</td>
                                    <td style="text-align: center">${item.no_sku}</td>
                                </tr>
                            `);
                        });

                        $('#total_rfid_tag').html(value.length);
                    }

                } else {
                    console.log('event: ' + event_name);
                }

            }

        });


        $('#checkall').change(function() {
            var cells = $('#asetTable').find('tbody > tr > td:nth-child(1)');
            $(cells).find(':checkbox').prop('checked', $(this).is(':checked'));
        });

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

        $(document).on('click', '#refresh', function(event) {
            event.preventDefault();
            // reload_datatables();
            return false;
        });

        // $('#btn_pilih_aset').click(function(e) {
        //     e.preventDefault();
        //     get_datatables_checked();
        //     return false;
        // });

        $('#btn_search').click(async function() {

            // Reset uniqueDataArray
            uniqueDataArray = [];
            var ip_address = $('#ip_address').val();

            if (ip_address == '') {
                swal({
                    title: "Error",
                    text: "IP Address tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            localStorage.setItem('ip_address', ip_address);

            const socket = new WebSocket('ws://' + ip_address + ':3030');
            console.log("ee", socket);

            $('#your_table_id tbody tr').remove();

            socket.onopen = function(event) {

                // console.log('Your System Connected to WebSocket server');
                $('#status').html('Connected');
                //   const messageArea = document.getElementById('messageArea');
                //   messageArea.innerHTML = '';
                //   messageArea.innerHTML += 'Status : Connected to Server';
                //socket.send('refresh');

            };

            socket.onclose = function(event) {
                if (event.wasClean) {
                    console.log('WebSocket connection closed');
                } else {
                    console.log('WebSocket connection died');
                }
                $('#status').html('Not Connected to Server');
                $('#data_processing').html('');
            };

            var postTimeout = null; // Timer untuk mendeteksi tidak ada data baru
            var timeoutDuration = 2000; // Waktu tunggu (ms) untuk memposting data ke database

            socket.onmessage = async function(event) {

                var parsedData = JSON.parse(event.data);
                var event_name = parsedData.event;

                if (event_name == 'scan-rfid-result') {

                    $('#data_processing').html('Searching RFID Tag...');

                    // const messageArea = document.getElementById('messageArea');
                    // messageArea.innerHTML = '';
                    // messageArea.innerHTML += 'Receive Data from Server';

                    // $('.loading').show();

                    try {
                        var tid = parsedData.data_tid;
                        var epc = parsedData.data;
                        var alias_antenna = 'handheld';
                        var status_tag = 'OK';
                        var description = 'OK';
                        var count_tag = 0;

                        // Cek apakah data dengan TID dan alias_antenna tersebut sudah ada
                        var isExisting = uniqueDataArray.some(data => data.tid === tid);

                        if (!isExisting) {

                            var is_unique_single_tag = '0';

                            // alert('is_unique_single_tag declare: ' + is_unique_single_tag);

                            // Cek apakah data dengan TID tersebut sudah ada
                            get_check_unique_single_tag(tid).then(async function(response) {

                                is_unique_single_tag = response.check;

                                if (is_unique_single_tag != 0) {

                                    isExisting = uniqueDataArray.some(data => data.tid === tid);

                                    if (!isExisting) {

                                        console.log('your tid: ' + tid, 'is available');

                                        count_tag++;

                                        var waktu = new Date().toISOString();

                                        // Tambahkan data baru ke array jika TID belum ada
                                        uniqueDataArray.push({
                                            tid: tid,
                                            epc: epc,
                                            status: status_tag,
                                            // waktu: waktu,
                                            description: description
                                        });

                                        // Tambahkan data baru ke tabel HTML
                                        $('#your_table_id tbody').append(`
                                            <tr>
                                            <td style="text-align: center;">${uniqueDataArray.length}</td>
                                            <td style="text-align: center;">${tid}</td>
                                            <td style="text-align: center;">${epc}</td>
                                            <td style="text-align: center;">${status_tag}</td>
                                            </tr>
                                        `);

                                        $('#array_tag_code').val(JSON.stringify(uniqueDataArray));
                                        $('#total_rfid_tag').html(uniqueDataArray.length);

                                        //console.log('Data baru ditambahkan:', parsedData.value);
                                    }

                                } else {
                                    console.log('your tid: ' + tid, 'is not available');
                                }

                            }).catch(function(error) {
                                console.error('Error:', error);
                            });

                        } else {
                            //console.log('Data dengan TID ini sudah ada:', tid);
                        }

                        // Reset timer setiap kali data baru diterima
                        // resetPostTimer();

                    } catch (error) {
                        console.error('Error parsing JSON data:', error);
                    }

                } else if (event_name == 'response-scan-rfid-on') {
                    $('.loading').show();
                } else if (event_name == 'response-scan-rfid-off') {
                    $('.loading').hide();
                }
            };

            return false;
        });

        $('.btn_save').click(async function(e) {

            e.preventDefault();
            $('.message').fadeOut();
            $('#data_processing').html('');

            var total_aset_checklist = $('#total_aset_checklist').html();

            console.log("ko", total_aset_checklis.length);

            if (total_aset_checklist == 0) {

                swal({
                    title: "Error",
                    text: "Pilih dulu Aset yang akan di registrasi!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });

                return false;
            }

            var total_rfid_tag = $('#total_rfid_tag').html();

            if (total_rfid_tag == 0) {

                swal({
                    title: "Error",
                    text: "RFID Tag tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });

                return false;
            }

            if (total_rfid_tag != total_aset_checklist) {
                swal({
                    title: "Error",
                    text: "Total RFID Tag tidak sama dengan total Aset yang dipilih!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });

                return false;
            }

            // get_datatables_checked();

            // Cek apakah data RFID sudah ada di database
            try {
                const response = await get_check_unique_data(uniqueDataArray);
                if (response.exists) {
                    swal({
                        title: "Error",
                        text: "RFID Tag sudah terdaftar di database!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });
                    return false;
                }

            } catch (error) {
                console.error('Error checking unique data:', error);
                swal({
                    title: "Error",
                    text: "Terjadi kesalahan saat memeriksa data RFID!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            // posting data rfid tag ke web socket server terlebih dahulu

            // var is_posting_rfid_tag_success = false;

            // var ip_address = $('#ip_address_server').val();
            // var port_ws_server = $('#port_ws_server').val();

            // const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

            // socket.addEventListener('open', function() {

            //     uniqueDataArray.forEach(function(item) {
            //         var tid = item.tid;
            //         var epc = item.epc;
            //         var status = 1;
            //         var description = 'DEMO-RFID';
            //         var flag_alarm = 0; 
            //         var category = 0;

            //         socket.send('{"event": "db-storage-insert-rfid-list", "value": {"tid": "' + tid + '", "epc": "' + epc + '", "status": "' + status + '", "description": "' + description + '", "flag_alarm": "' + flag_alarm + '", "category": "' + category + '"}}');
            //         console.log('post db-storage-insert-rfid-list: ' + tid);
            //     });

            // });

            // socket.onopen = function(event) {
            //     $('#status').html('Connected');
            // };

            // socket.onclose = function(event) {
            //     if (event.wasClean) {
            //         console.log('WebSocket connection closed');
            //     } else {
            //         console.log('WebSocket connection died'); 
            //     }
            //     $('#status').html('Not Connected to Server');
            //     $('#data_processing').html('');
            // };

            // socket.onmessage = async function (event) {

            //     var parsedData = JSON.parse(event.data);
            //     // console.log('event datang: ' + event.data);

            //     var event_name = parsedData.event;
            //     var message = parsedData.message;
            //     var tid = parsedData.value.tid;

            //     if (event_name == 'response-db-storage-insert-rfid-list') {
            //         if (message == '[Success] Insert Tags!') {
            //             is_posting_rfid_tag_success = true;
            //             console.log('posting data rfid tag: ' + tid + ', is_posting_rfid_tag_success: ' + is_posting_rfid_tag_success + ' berhasil!');
            //         } else if (message == '[Failed] Insert Tags!') {

            //             // jika posting data rfid tag ke web socket server gagal, maka tidak akan di simpan ke database
            //             is_posting_rfid_tag_success = false;

            //             swal({
            //                 title: "Error",
            //                 text: "RFID Tag tidak valid!",
            //                 type: "error", 
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#DD6B55",
            //                 confirmButtonText: "Okay!",
            //                 closeOnConfirm: true
            //             });

            //             return false;

            //         } else if (message == '[Info] Tags Already Register') {

            //             is_posting_rfid_tag_success = false;

            //             swal({
            //                 title: "Info",
            //                 text: "RFID Tag sudah terdaftar!",
            //                 type: "info",
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#DD6B55",
            //                 confirmButtonText: "Okay!",
            //                 closeOnConfirm: true
            //             }); 

            //         } else if (message == '[Invalid] Rfid Tags!') {

            //             is_posting_rfid_tag_success = false;
            //             swal({
            //                 title: "Info",
            //                 text: "RFID Tag tidak valid!",
            //                 type: "error", 
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#DD6B55",
            //                 confirmButtonText: "Okay!",
            //                 closeOnConfirm: true
            //             });

            //         } else {
            //             console.log('response-db-storage-insert-rfid-list: ' + message);
            //         }   

            //     } else if (event_name == 'error') {
            //         console.log('error: ' + message);

            //         swal({
            //             title: "Error",
            //             text: message,
            //             type: "error",
            //             showCancelButton: false,
            //             confirmButtonColor: "#DD6B55",
            //             confirmButtonText: "Okay!",
            //             closeOnConfirm: true
            //         });

            //     }
            //     else {
            //         console.log('event: ' + event_name);
            //     }

            // };

            // cek apakah ada posting data rfid tag ke web socket server yang gagal

            // if (!is_posting_rfid_tag_success) {

            //     // delete data rfid tag yang sudah di simpan ke database
            //     uniqueDataArray.forEach(function(item) {

            //         var tid = item.tid;
            //         console.log('delete db-storage-remove-rfid-list (yang mau di hapus) : ' + tid);

            //         if (socket.readyState === WebSocket.OPEN) {
            //             socket.send('{"event": "db-storage-remove-rfid-list", "value": {"tid": "' + tid + '"}}');
            //         } else {
            //             console.log('WebSocket masih dalam status CONNECTING, tidak dapat mengirim pesan');
            //         }

            //     }); 

            //     swal({
            //         title: "Info",
            //         text: "Proses simpan data RFID Tag gagal, karena posting data RFID Tag ke web socket server gagal!",
            //         type: "error", 
            //         showCancelButton: false,
            //         confirmButtonColor: "#DD6B55",
            //         confirmButtonText: "Okay!",
            //         closeOnConfirm: true
            //     });

            //     return false;

            // }

            // end proses posting data rfid tag ke web socket server

            var form_tb_master_transaksi = $('#form_tb_master_transaksi_add');
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

            data_post.push({
                name: 'uniqueDataArray',
                value: JSON.stringify(uniqueDataArray)
            });

            $('#data_processing').html('Saving data...');
            $('.loading').show();

            $.ajax({
                    url: ADMIN_BASE_URL + '/registrasi_aset/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {

                    $('form').find('.form-group').removeClass('has-error');
                    $('.steps li').removeClass('error');
                    $('form').find('.error-input').remove();

                    if (res.success) {

                        $('#data_processing').html('');

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
                        // reload_datatables();
                        $('#your_table_id tbody tr').remove();
                        $('#total_rfid_tag').html(0);
                        $('#total_aset_checklist').html(0);
                        $('#data_processing').html('');

                        $('.chosen option').prop('selected', false).trigger('chosen:updated');

                    } else {

                        // reload_datatables();
                        $('#data_processing').html('');
                        $('#total_rfid_tag').html(0);
                        $('#total_aset_checklist').html(0);
                        $('#your_table_id tbody tr').remove();

                        if (res.errors) {

                            $.each(res.errors, function(index, val) {
                                $('form #' + index).parents('.form-group').addClass('has-error');
                                $('form #' + index).parents('.form-group').find('small').prepend(`<div class="error-input">` + val + `</div>`);
                            });

                            $('.steps li').removeClass('error');
                            $('.content section').each(function(index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                }
                            });
                        }

                        $('#data_processing').html('');

                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });

                    }

                    if (use_ajax_crud == true) {
                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/registrasi_aset/index/?ajax=1'
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

        function get_check_unique_data(uniqueDataArray) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: ADMIN_BASE_URL + '/registrasi_aset/check_unique_data',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        uniqueData: JSON.stringify(uniqueDataArray)
                    },
                    success: function(response) {
                        resolve(response);
                    },
                    error: function(xhr, status, error) {
                        reject(error);
                    }
                });
            });
        }

        function get_check_unique_single_tag(tid) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: ADMIN_BASE_URL + '/registrasi_aset/check_unique_single_tag',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        tid: tid
                    },
                    success: function(response) {
                        resolve(response);
                    },
                    error: function(xhr, status, error) {
                        reject(error);
                    }
                });
            });
        }


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
                        window.location.href = ADMIN_BASE_URL + '/registrasi_aset';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(async function(e) {

            e.preventDefault();
            $('.message').fadeOut();
            $('#data_processing').html('');

            var total_aset_checklist = $('#total_aset_checklist').html();

            if (total_aset_checklist == 0) {

                swal({
                    title: "Error",
                    text: "Pilih dulu Aset yang akan di registrasi!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });

                return false;

            }

            var total_rfid_tag = $('#total_rfid_tag').html();

            if (total_rfid_tag == 0) {

                swal({
                    title: "Error",
                    text: "RFID Tag tidak boleh kosong!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });

                return false;
            }

            if (total_rfid_tag != total_aset_checklist) {

                swal({
                    title: "Error",
                    text: "Total RFID Tag tidak sama dengan total Aset yang dipilih!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });

                return false;
            }

            // get_datatables_checked();

            // Cek apakah data RFID sudah ada di database
            try {
                const response = await get_check_unique_data(uniqueDataArray);

                if (response.exists) {
                    swal({
                        title: "Error",
                        text: "RFID Tag sudah terdaftar di database!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });
                    return false;
                }

            } catch (error) {
                console.error('Error checking unique data:', error);
                swal({
                    title: "Error",
                    text: "Terjadi kesalahan saat memeriksa data RFID!",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Okay!",
                    closeOnConfirm: true
                });
                return false;
            }

            // posting data rfid tag ke web socket server terlebih dahulu

            // var is_posting_rfid_tag_success = false;

            // var ip_address = $('#ip_address_server').val();
            // var port_ws_server = $('#port_ws_server').val();

            // const socket = new WebSocket('ws://' + ip_address + ':' + port_ws_server);

            // socket.addEventListener('open', function() {

            //     uniqueDataArray.forEach(function(item) {
            //         var tid = item.tid;
            //         var epc = item.epc;
            //         var status = 1;
            //         var description = 'DEMO-RFID';
            //         var flag_alarm = 0; 
            //         var category = 0;

            //         socket.send('{"event": "db-storage-insert-rfid-list", "value": {"tid": "' + tid + '", "epc": "' + epc + '", "status": "' + status + '", "description": "' + description + '", "flag_alarm": "' + flag_alarm + '", "category": "' + category + '"}}');
            //         console.log('post db-storage-insert-rfid-list: ' + tid);
            //     });

            // });

            // socket.onopen = function(event) {
            //     $('#status').html('Connected');
            // };

            // socket.onclose = function(event) {
            //     if (event.wasClean) {
            //         console.log('WebSocket connection closed');
            //     } else {
            //         console.log('WebSocket connection died'); 
            //     }
            //     $('#status').html('Not Connected to Server');
            //     $('#data_processing').html('');
            // };

            // socket.onmessage = async function (event) {

            //     var parsedData = JSON.parse(event.data);
            //     // console.log('event datang: ' + event.data);

            //     var event_name = parsedData.event;
            //     var message = parsedData.message;
            //     var tid = parsedData.value.tid;

            //     if (event_name == 'response-db-storage-insert-rfid-list') {

            //         if (message == '[Success] Insert Tags!') {
            //             is_posting_rfid_tag_success = true;
            //             console.log('posting data rfid tag: ' + tid + ', is_posting_rfid_tag_success: ' + is_posting_rfid_tag_success + ' berhasil!');
            //         } else if (message == '[Failed] Insert Tags!') {

            //             // jika posting data rfid tag ke web socket server gagal, maka tidak akan di simpan ke database
            //             is_posting_rfid_tag_success = false;

            //             swal({
            //                 title: "Error",
            //                 text: "RFID Tag tidak valid!",
            //                 type: "error", 
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#DD6B55",
            //                 confirmButtonText: "Okay!",
            //                 closeOnConfirm: true
            //             });

            //             return false;

            //         } else if (message == '[Info] Tags Already Register') {

            //             is_posting_rfid_tag_success = false;

            //             swal({
            //                 title: "Info",
            //                 text: "RFID Tag sudah terdaftar!",
            //                 type: "info",
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#DD6B55",
            //                 confirmButtonText: "Okay!",
            //                 closeOnConfirm: true
            //             }); 

            //         } else if (message == '[Invalid] Rfid Tags!') {

            //             is_posting_rfid_tag_success = false;

            //             swal({
            //                 title: "Info",
            //                 text: "RFID Tag tidak valid!",
            //                 type: "error", 
            //                 showCancelButton: false,
            //                 confirmButtonColor: "#DD6B55",
            //                 confirmButtonText: "Okay!",
            //                 closeOnConfirm: true
            //             });

            //         } else {
            //             console.log('response-db-storage-insert-rfid-list: ' + message);
            //         }   

            //     } else if (event_name == 'error') {

            //         console.log('error: ' + message);

            //         swal({
            //             title: "Error",
            //             text: message,
            //             type: "error",
            //             showCancelButton: false,
            //             confirmButtonColor: "#DD6B55",
            //             confirmButtonText: "Okay!",
            //             closeOnConfirm: true
            //         });

            //     }
            //     else {
            //         console.log('event: ' + event_name);
            //     }

            // };

            // cek apakah ada posting data rfid tag ke web socket server yang gagal

            // if (!is_posting_rfid_tag_success) {

            //     // delete data rfid tag yang sudah di simpan ke database
            //     uniqueDataArray.forEach(function(item) {

            //         var tid = item.tid;
            //         console.log('delete db-storage-remove-rfid-list (yang mau di hapus) : ' + tid);

            //         if (socket.readyState === WebSocket.OPEN) {
            //             socket.send('{"event": "db-storage-remove-rfid-list", "value": {"tid": "' + tid + '"}}');
            //         } else {
            //             console.log('WebSocket masih dalam status CONNECTING, tidak dapat mengirim pesan');
            //         }

            //     }); 

            //     swal({
            //         title: "Info",
            //         text: "Proses simpan data RFID Tag gagal, karena posting data RFID Tag ke web socket server gagal!",
            //         type: "error", 
            //         showCancelButton: false,
            //         confirmButtonColor: "#DD6B55",
            //         confirmButtonText: "Okay!",
            //         closeOnConfirm: true
            //     });

            //     return false;

            // }

            // end proses posting data rfid tag ke web socket server

            var form_tb_master_transaksi = $('#form_tb_master_transaksi_add');
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

            data_post.push({
                name: 'uniqueDataArray',
                value: JSON.stringify(uniqueDataArray)
            });

            $('#data_processing').html('Saving data...');
            $('.loading').show();

            $.ajax({
                    url: ADMIN_BASE_URL + '/registrasi_aset/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {

                    $('form').find('.form-group').removeClass('has-error');
                    $('.steps li').removeClass('error');
                    $('form').find('.error-input').remove();

                    if (res.success) {

                        $('#data_processing').html('');

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
                        // reload_datatables();
                        $('#your_table_id tbody tr').remove();
                        $('#total_rfid_tag').html(0);
                        $('#total_aset_checklist').html(0);
                        $('#data_processing').html('');

                        $('.chosen option').prop('selected', false).trigger('chosen:updated');

                    } else {

                        // reload_datatables();
                        $('#data_processing').html('');
                        $('#total_rfid_tag').html(0);
                        $('#total_aset_checklist').html(0);
                        $('#your_table_id tbody tr').remove();

                        if (res.errors) {

                            $.each(res.errors, function(index, val) {
                                $('form #' + index).parents('.form-group').addClass('has-error');
                                $('form #' + index).parents('.form-group').find('small').prepend(`<div class="error-input">` + val + `</div>`);
                            });

                            $('.steps li').removeClass('error');

                            $('.content section').each(function(index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                }
                            });

                        }

                        $('#data_processing').html('');

                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });

                    }

                    if (use_ajax_crud == true) {
                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/registrasi_aset/index/?ajax=1'
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

        $('#id_area').change(function(event) {
            var val = $(this).val();
            $.LoadingOverlay('show')
            $.ajax({
                    url: ADMIN_BASE_URL + '/registrasi_aset/ajax_id_gedung/' + val,
                    dataType: 'JSON',
                })
                .done(function(res) {
                    var html = '<option value=""></option>';
                    $.each(res, function(index, val) {
                        html += '<option value="' + val.id + '">' + val.gedung + '</option>'
                    });
                    $('#id_gedung').html(html);
                    $('#id_gedung').trigger('chosen:updated');

                })
                .fail(function() {
                    toastr['error']('Error', 'Getting data fail')
                })
                .always(function() {
                    $.LoadingOverlay('hide')
                });

        });

        $('#id_gedung').change(function(event) {
            var val = $(this).val();
            $.LoadingOverlay('show')
            $.ajax({
                    url: ADMIN_BASE_URL + '/registrasi_aset/ajax_id_ruangan/' + val,
                    dataType: 'JSON',
                })
                .done(function(res) {
                    var html = '<option value=""></option>';
                    $.each(res, function(index, val) {
                        html += '<option value="' + val.id + '">' + val.ruangan + '</option>'
                    });
                    $('#id_ruangan').html(html);
                    $('#id_ruangan').trigger('chosen:updated');

                })
                .fail(function() {
                    toastr['error']('Error', 'Getting data fail')
                })
                .always(function() {
                    $.LoadingOverlay('hide')
                });

        });

    }); /*end doc ready*/
</script>