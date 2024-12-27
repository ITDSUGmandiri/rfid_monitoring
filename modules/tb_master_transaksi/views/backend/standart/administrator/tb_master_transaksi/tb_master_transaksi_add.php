<!-- <script src="<?= BASE_ASSET ?>admin-lte/plugins/jQuery/jquery-3.7.1.min.js"></script> -->
<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->

<script type="text/javascript">

    //get value from checkbox table
    function get_datatables_checked()
    {
        var table = $('#asetTable').DataTable();
        var rowcollection =  table.$(".cekbok:checked", {"page": "all"});
        var string_id = "";
        var count = 0;
        var dataArrayAset = []; // Array untuk menyimpan data

        rowcollection.each(function(index, elem)
        {
            var id = $(elem).val();
            var nama_aset = $(elem).data("nama-aset");
            var kode_aset = $(elem).data("kode-aset");
            var nup = $(elem).data("nup");
            count++;

            // Menambahkan data ke array
            dataArrayAset.push({
                id: id,
                kode_aset: kode_aset, 
                nup: nup,
                nama_aset: nama_aset
            });

            string_id = string_id + "~" + id;
        });

        if (string_id == "") {
            swal({
                title: "Perhatian !",
                text: "Pilih / Ceklis dulu data yang ingin di proses !!",
                type: "warning"
            });
            return false;
        } else {
            $('#total_aset_checklist').html(count);
            $('#string_id').val(string_id);
            $('#data_array_aset').val(JSON.stringify(dataArrayAset)); // Menyimpan array data ke hidden input
            return true;
        }
    }

    function get_check_unique_data(uniqueDataArray) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: ADMIN_BASE_URL + '/tb_master_transaksi/check_unique_data',
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
                url: ADMIN_BASE_URL + '/tb_master_transaksi/check_unique_single_tag',
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

    // function domo() {

    //     $('*').bind('keydown', 'Ctrl+s', function() {
    //         $('#btn_save').trigger('click');
    //         return false;
    //     });

    //     $('*').bind('keydown', 'Ctrl+x', function() {
    //         $('#btn_cancel').trigger('click');
    //         return false;
    //     });

    //     $('*').bind('keydown', 'Ctrl+d', function() {
    //         $('.btn_save_back').trigger('click');
    //         return false;
    //     });

    // }

    // jQuery(document).ready(domo);
</script>

<style>
    
</style>

<section class="content-header">
    <h1>    
    Register Aset<small><?= cclang('new', ['Register Aset']); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_transaksi'); ?>">Register Aset</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>

<section class="content">

    <!-- Insert New Data box -->
	<div class="box">
			
		<div class="box-header with-border">
			<h3 class="box-title">Isi data pada form dengan lengkap dan benar</h3>
				<div class="box-tools pull-right">
					<!-- <button type="button" onClick="window.location='<?php echo site_url();?>aset';" class="btn btn-default"><i class="fa fa-undo"></i> Cancel</button> -->
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
                                    $conditions = [
                                    ];
                                    ?>

                                    <?php foreach (db_get_all_data('tb_master_type_transaksi', $conditions) as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->tipe_transaksi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div> -->

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
                                <select class="form-control chosen chosen-select-deselect" name="id_area" id="id_area" data-placeholder="Select Id Area">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_master_area') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->area; ?></option>
                                    <?php endforeach; ?>                                 </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-id_gedung ">
                            <label for="id_gedung" class="col-sm-2 control-label">Gedung<i class="required">*</i>
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_gedung" id="id_gedung" data-placeholder="Select Id Gedung">
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
                                <select class="form-control chosen chosen-select-deselect" name="id_ruangan" id="id_ruangan" data-placeholder="Select Id Ruangan">
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
                                                <option <?= $this->input->get('f') == 'nama_aset' ? 'selected' :''; ?> value="nama_aset">Nama Aset</option>
                                                <option <?= $this->input->get('f') == 'kode_aset' ? 'selected' :''; ?> value="kode_aset">Kode Aset</option>
                                                <option <?= $this->input->get('f') == 'nup' ? 'selected' :''; ?> value="nup">NUP</option>
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
                                
                                <table width="100%" class="table table-bordered table-striped" id="asetTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width: 5%" class="check"><input type="checkbox" id="checkall" value=""/></th>
                                            <th style="text-align: center; width: 5%">No.</th>
                                            <th style="text-align: center; width: 10%">ID Aset</th>
                                            <th style="text-align: center; width: 40%">Nama Aset</th>
                                            <th style="text-align: center; width: 20%">Kode Aset</th>
                                            <th style="text-align: center; width: 20%">Kode NUP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DataTable will populate the rows automatically -->
                                    </tbody>
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
                            <small class="info help-block"><b>Total aset:</b> <div id="total_aset_checklist"></div></small>
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

                    <div class="row">

                        <div class="col-md-3">
                            <input type="hidden" name="array_tag_code" id="array_tag_code" value="0">   
                        </div>
                                    
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-flat btn-info btn_search btn_action btn_search_back btn-block" id="btn_search" data-stype='back' title="Search">
                                    <i class="ion ion-ios-list-outline"></i> Search
                                </a>
                            </div>
                            <small class="info help-block"><b>Status:</b> <div id="status"></div></small>&nbsp;&nbsp;<small class="info help-block"><b>Total RFID Tag:</b> <div id="total_rfid_tag"></div></small>
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
                                        <th style="text-align: center" data-field="kode_tid"data-sort="1" data-primary-key="0"> <?= cclang('kode_tid') ?></th>
                                        <th style="text-align: center" data-field="kode_epc"data-sort="1" data-primary-key="0"> <?= cclang('kode_epc') ?></th>
                                        <th style="text-align: center" data-field="status_tag"data-sort="1" data-primary-key="0"> <?= cclang('status_tag') ?></th>
                                        <!-- <th style="text-align: center">Description</th>                         -->
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_ug_mstag">
                                        <?= $tables ?>
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

<script src="<?php echo base_url(); ?>asset/js/socket.io.js"></script>

<script type="text/javascript">
  var module_name = "tb_master_transaksi"
  var use_ajax_crud = false
</script>

<script type="text/javascript">

    $(document).ready(function() {

        $('.loading').hide();
        $('#total_aset_checklist').html('0');
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

        var table;
        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/serverSideData';

        table = $('#asetTable').DataTable({
            // "paging": true,
            // "searching": true,
            // "ordering": true,
            // "info": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: url,
                type: "POST",
                // type: "GET",
                // data: function (d) {
                //     d.filter_id_parameter = $('#filter_id_parameter').val();
                // }
            },
            "order": [[3, 'asc']],
            columns: [
                {
                    "data": "checkbox_id_master_aset",
                    "className": "dt-center",
                    "orderable": false,
                    "searchable": false
                },
                { data: "auto_number", className: "dt-center", orderable: true, searchable: true },
                { data: "id", className: "dt-center", orderable: true, searchable: true },
                { data: "nama_aset", className: "dt-left", orderable: true, searchable: true },
                { data: "kode_aset", className: "dt-left", orderable: true, searchable: true },
                { data: "nup", className: "dt-center", orderable: true, searchable: true },
                // { data: "Action", className: "dt-center", orderable: false, searchable: false },
            ]
        });

        function reload_datatables() {
            table.ajax.reload();
            // table.ajax.reload(null,false); //reload datatable ajax 
        }

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

            socket.onmessage = async function (event) {

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

        $('#checkall').change(function(){
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
            reload_datatables();
            return false;
        });

        $('#btn_pilih_aset').click(function(e) {
            e.preventDefault();
            get_datatables_checked();
            return false;
        });
    
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
                    window.location.href = ADMIN_BASE_URL + '/tb_master_transaksi';
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

            get_datatables_checked();

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

            $('.loading').show();
            $('#data_processing').html('Saving data...');

            $.ajax({
                    url: ADMIN_BASE_URL + '/tb_master_transaksi/add_save',
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

                        $('.chosen option').prop('selected', false).trigger('chosen:updated');
                    
                    } else {

                        $('#data_processing').html('');

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
                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_master_transaksi/index/?ajax=1'
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
                url: ADMIN_BASE_URL + '/tb_master_transaksi/ajax_id_gedung/' + val,
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
                url: ADMIN_BASE_URL + '/tb_master_transaksi/ajax_id_ruangan/' + val,
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