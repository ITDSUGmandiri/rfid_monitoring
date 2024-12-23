<!-- <script src="<?= BASE_ASSET ?>admin-lte/plugins/jQuery/jquery-3.7.1.min.js"></script> -->

<!-- load file audio -->
<!-- <audio id="tingtung" src="<?php echo base_url(); ?>assets/audio/tingtung.mp3"></audio> -->
<!-- <audio id="buzzer" src="<?= BASE_ASSET ?>/sound/aset ditemukan.mp3"></audio> -->

<script src="<?= BASE_ASSET; ?>js/loadingoverlay.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->

<script type="text/javascript">
console.log("xxx");
    var dataArrayAset = []; // Array untuk menyimpan data

    function removeAllRow() {

        var rowCount = $('#your_table_id tbody tr').length;

        if (rowCount == 0) {
            return false;
        }

        $('#your_table_id tbody').empty();
        fixingNumbering();
        $('#total_rfid_tag').html(0);
        $('#total_aset_checklist').html(0);
        $('#string_id').val('');
        $('#data_array_aset').val('');
    }   

    function removeRow(row) {
        var rowCount = $('#your_table_id tbody tr').length;
        $(row).closest('tr').remove();
        fixingNumbering();
        $('#total_rfid_tag').html(rowCount-1);
        $('#total_aset_checklist').html(rowCount-1);
    }

    function fixingNumbering() {
        $('#your_table_id tbody tr').each(function(index) {
            $(this).find('td#numbering').text(index + 1);
        });
    }   

    //get value from checkbox table
    async function get_datatables_checked() 
    {
        var table = $('#asetTable').DataTable();
        var rowcollection =  table.$(".cekbok:checked", {"page": "all"});
        var string_id = "";
        var count = 0;
        var no = 1;
        var rowCount = $('#your_table_id tbody tr').length;

        // $('#your_table_id tbody').empty();

        for (let i = 0; i < rowcollection.length; i++) {
            let elem = rowcollection[i];

            var id = $(elem).val();
            var nama_aset = $(elem).data("nama-aset");
            var kode_aset = $(elem).data("kode-aset");
            var nup = $(elem).data("nup");
            var kode_tid = $(elem).data("kode-tid");

            // Cek apakah kode_tid sudah ada di dataArrayAset
            var tidExists = dataArrayAset.some(function(item) {
                return item.kode_tid === kode_tid;
            });

            // Hanya tambahkan jika kode_tid belum ada
            if (!tidExists) {
                dataArrayAset.push({
                    id: id,
                    kode_aset: kode_aset,
                    nup: nup, 
                    nama_aset: nama_aset,
                    kode_tid: kode_tid
                });
            }

            string_id = string_id + "~" + id;

            let rows = $("#your_table_id tbody tr");
            let found = false;

            for (let j = 0; j < rows.length; j++) {
                // Cari kolom dengan id yang sama dengan tid
                var hasilPencarianCell = $(rows[j]).find("td[id='" + kode_tid + "']");
                
                // Jika ditemukan kolom dengan id yang sesuai
                if (hasilPencarianCell.length > 0) {
                    console.log('Data dengan TID ' + kode_tid + ' sudah ada');
                    found = true;
                    break;
                }
            }

            if (!found) {
                count++;
                
                // tampilkan data di table hasil pencarian
                await new Promise(resolve => {        
                    $('#your_table_id tbody').append(`
                        <tr>    
                            <td id="numbering" style="text-align: center">${no}</td>
                            <td id="asset_id" style="text-align: center">${id}</td>
                            <td id="asset_name" style="text-align: left">${nama_aset}</td>
                            <td id="asset_code" style="text-align: left">${kode_aset}</td>
                            <td id="asset_nup" style="text-align: center">${nup}</td>
                            <td id="asset_tid_${kode_tid}" style="text-align: center">${kode_tid}</td>
                            <td id="${kode_tid}" style="text-align: center">Available</td>
                            <td style="text-align: center">
                                <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Semua Data" onclick="removeRow(this)"></i>
                            </td>
                        </tr>
                    `);
                    resolve();
                });

                no = no + 1;
            }
            
        }

        // if (string_id == "") {
        //     await new Promise(resolve => {
        //         swal({
        //             title: "Perhatian !",
        //             text: "Pilih / Ceklis dulu data yang ingin di pinjam !!",
        //             type: "warning"
        //         });
        //         resolve();
        //     });
        //     return false;
        // } else {
        //     $('#total_rfid_tag').html(count+rowCount);
        //     $('#total_aset_checklist').html(count+rowCount);
        //     $('#string_id').val(string_id);
        //     $('#data_array_aset').val(JSON.stringify(dataArrayAset)); // Menyimpan array data ke hidden input

        //     fixingNumbering();

        //     return true;
        // }
    }

    async function getAllAset() {
        
        // dataArrayAset = [];
        var rowCount = $('#your_table_id tbody tr').length;
        var no = rowCount + 1;
        var count = 0;
        var string_id = "";

        try {
            const response = await $.ajax({
                url: ADMIN_BASE_URL + '/peminjaman/get_all_aset',
                type: 'GET',
                dataType: 'json',
                data: {
                    id_area: $('#id_area').val(),
                    id_gedung: $('#id_gedung').val(),
                    id_ruangan: $('#id_ruangan').val()
                }
            });

            if (response.success) {

                for (const item of response.data) {
                    count++;

                    // Cek apakah kode_tid sudah ada dalam array
                    let tidExists = dataArrayAset.some(data => data.kode_tid === item.kode_tid);
                    
                    if (!tidExists) {
                        // Menambahkan data ke array jika kode_tid belum ada
                        dataArrayAset.push({
                            id: item.id_aset,
                            kode_aset: item.kode_aset, 
                            nup: item.nup,
                            nama_aset: item.nama_aset,
                            kode_tid: item.kode_tid
                        });
                    }

                    string_id = string_id + "~" + item.id_aset;

                    let rows = $("#your_table_id tbody tr");
                    let found = false;

                    for (let j = 0; j < rows.length; j++) {
                        // Cari kolom dengan id yang sama dengan tid
                        var hasilPencarianCell = $(rows[j]).find("td[id='" + item.kode_tid + "']");
                        
                        // Jika ditemukan kolom dengan id yang sesuai
                        if (hasilPencarianCell.length > 0) {
                            console.log('Data dengan TID ' + item.kode_tid + ' sudah ada');
                            found = true;
                            break;
                        }
                    }

                    if (!found) {
                        // tampilkan data di table hasil pencarian
                        await new Promise(resolve => {
                            $('#your_table_id tbody').append(`
                                <tr>    
                                    <td id="numbering" style="text-align: center">${no}</td>
                                    <td id="asset_id" style="text-align: center">${item.id_aset}</td>
                                    <td id="asset_name" style="text-align: left">${item.nama_aset}</td>
                                    <td id="asset_code" style="text-align: left">${item.kode_aset}</td>
                                    <td id="asset_nup" style="text-align: center">${item.nup}</td>
                                    <td id="asset_tid_${item.kode_tid}" style="text-align: center">${item.kode_tid}</td>
                                    <td id="${item.kode_tid}" style="text-align: center">Available</td>
                                    <td style="text-align: center">
                                        <i class="ui-tooltip fa fa-trash-o" title="Hapus Data" style="font-size: 22px; cursor:pointer;" data-original-title="Hapus Semua Data" onclick="removeRow(this)"></i>
                                    </td>
                                </tr>
                            `);
                            resolve();
                        });

                        no = no + 1;
                    }

                }

                $('#total_rfid_tag').html(count+rowCount);
                $('#total_aset_checklist').html(count+rowCount);
                $('#string_id').val(string_id);
                $('#data_array_aset').val(JSON.stringify(dataArrayAset));

                fixingNumbering();
            }

        } catch (error) {
            console.error(error);
        }
    }

    function get_check_unique_data(uniqueDataArray) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: ADMIN_BASE_URL + '/peminjaman/check_unique_data',
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
                url: ADMIN_BASE_URL + '/peminjaman/check_unique_single_tag',
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

    async function getAllAsetForBulk() {
        
        // dataArrayAset = [];

        document.getElementById('myChartPencarian').getContext('2d').clearRect(0, 0, chart.canvas.width, chart.canvas.height);
        chart.data.datasets[0].data = [0, 0, 0];
        chart.update();

        var string_id = "";

        var jumlah_aset_with_tag = 0;

        try {
            const response = await $.ajax({
                url: ADMIN_BASE_URL + '/peminjaman/get_all_aset',
                type: 'GET',
                dataType: 'json',
                data: {
                    id_area: $('#id_area').val(),
                    id_gedung: $('#id_gedung').val(),
                    id_ruangan: $('#id_ruangan').val()
                }
            });

            if (!response.success) {
                alert(response.message);
                return;
            }
            
            if (response.data.length === 0) {
                alert('Data tidak ditemukan!');
                return;
            }

            if (response.success) {

                for (const item of response.data) {
                    // count++;

                    // Cek apakah kode_tid sudah ada dalam array
                    let tidExists = dataArrayAset.some(data => data.kode_tid === item.kode_tid);
                    
                    if (!tidExists) {
                        // Menambahkan data ke array jika kode_tid belum ada
                        dataArrayAset.push({
                            id: item.id_aset,
                            kode_aset: item.kode_aset, 
                            nup: item.nup,
                            nama_aset: item.nama_aset,
                            kode_tid: item.kode_tid
                        });
                    }

                    string_id = string_id + "~" + item.id_aset;

                } // end for

                jumlah_aset_with_tag = response.data.length;
                $('#chart_aset_real').html(jumlah_aset_with_tag);
                $('#chart_aset_found').html('0');
                $('#chart_aset_not_found').html(jumlah_aset_with_tag);

                // labels: ["Aset Real", "Aset Ditemukan", "Aset Tidak Ditemukan"],
                // labels: ["Aset Tidak Ditemukan", "Aset Ditemukan", "Aset Real"],
                chart.data.datasets[0].data = [jumlah_aset_with_tag, 0, jumlah_aset_with_tag];
                chart.update();

                $('#total_rfid_tag').html('0');
                // $('#total_aset_checklist').html(count+rowCount);
                $('#string_id').val(string_id);
                $('#data_array_aset').val(JSON.stringify(dataArrayAset));

                chart_aset_real = jumlah_aset_with_tag;
                chart_aset_found = 0;
                chart_aset_not_found = jumlah_aset_with_tag;

            }

        } catch (error) {
            console.error(error);
        }
    }
</script>

<section class="content-header">
    <h1>    
    Peminjaman Aset<small><?= cclang('new', ['Peminjaman Aset']); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/peminjaman'); ?>">Peminjaman Aset</a></li>
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
                        'name' => 'form_peminjaman_add',            
                        // 'class' => 'form-horizontal form-step',
                        // 'class' => 'form-step',
                        'id' => 'form_peminjaman_add',
                        'enctype' => 'multipart/form-data',
                        'method' => 'POST',
                        'autocomplete' => 'off',
                        'class' => 'form form-horizontal'
                    ]); 
                ?>
                            
                <?php
                $user_groups = $this->model_group->get_user_group_ids();
                ?>

                <h3 style="text-decoration: underline;">Form Peminjaman</h3>
                
                    <!-- <section> -->
                    <fieldset>
                        
                        <div class="form-group group-id_area ">
                            <label for="id_area" class="col-sm-2 control-label">Area
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_area" id="id_area" data-placeholder="Pilih Area">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tb_master_area') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->area; ?></option>
                                    <?php endforeach; ?>                                 </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-id_gedung ">
                            <label for="id_gedung" class="col-sm-2 control-label">Gedung</label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_gedung" id="id_gedung" data-placeholder="Pilih Gedung">
                                    <option value=""></option>
                                                                    </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>

                        <div class="form-group group-id_ruangan ">
                            <label for="id_ruangan" class="col-sm-2 control-label">Ruangan
                                </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_ruangan" id="id_ruangan" data-placeholder="Pilih Ruangan">
                                    <option value=""></option>
                                                                    </select>
                                <small class="info help-block">
                                    </small>
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <div id="containerHeaderPilihAset">
                        <h3 style="text-decoration: underline;">Pilih Aset</h3>
                    </div>
                    <!-- <hr> -->

                    <!-- <section> -->
                    <fieldset id="containerPilihAset">

                        <div class="row" style="margin-top: 10px; margin-bottom: 20px">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="asetTable">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center" class="check"><input type="checkbox" id="checkall" value=""/></th>
                                                <th style="text-align: center">No.</th>
                                                <th style="text-align: center">ID Aset</th>
                                                <th style="text-align: center">Nama Aset</th>
                                                <th style="text-align: center">Kode Aset</th>
                                                <th style="text-align: center">Kode NUP</th>
                                                <th style="text-align: center">Kode Tag</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- DataTable will populate the rows automatically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    <!-- </section> -->
                    </fieldset>

                    <fieldset id="containerPilihAsetFooter">

                        <div class="row" style="margin-top: 10px; margin-bottom: 20px">

                            <div class="col-md-3"></div>
                                        
                            <div class="col-md-6">
                                <input type="hidden" name="data_array_aset" id="data_array_aset" value="0">
                                <input type="hidden" name="string_id" id="string_id" value="0">
                                    
                                <a class="btn btn-flat btn-success btn_search btn_action btn_search_back btn-block" id="btn_pilih_aset" data-stype='back' title="Search">
                                    <i class="ion ion-ios-list-outline"></i> Pilih Aset
                                </a>    
                                    
                                <!-- <small class="info help-block"><b>Total aset:</b> <div id="total_aset_checklist"></div></small> -->
                            </div>

                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="select_all" value="0"> Pilih Semua
                                    </label>
                                </div>
                            </div>

                        </div>

                    </fieldset>

                    <h3 style="text-decoration: underline;">Aset yang Dipinjam</h3>

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
                                    <i class="fa fa-search"></i>&nbsp;Scanning Aset
                                </a>

                            </div>

                            <small class="info help-block"><b>Status:</b> <div id="status"></div></small>&nbsp;&nbsp;
                        </div>

                        <div class="col-md-3"></div>
                    </div>

                    <div id="containerChartResult">

                        <div class="row">        
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>
                        </div>

                    </div>

                    <div id="containerHasilPencarian" class="row" style="margin-top: 10px; margin-bottom: 20px">
                        <div class="col-md-12">
                                
                            <div class="table-responsive"> 

                                <br>
                                <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                    <thead>
                                    <tr class="">                            
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center" data-field="id_aset"data-sort="1" data-primary-key="0"> <?= cclang('ID Aset') ?></th>
                                        <th style="text-align: center" data-field="nama_aset"data-sort="1" data-primary-key="0"> <?= cclang('Nama Aset') ?></th>
                                        <th style="text-align: center" data-field="kode_aset"data-sort="1" data-primary-key="0"> <?= cclang('Kode Aset') ?></th>
                                        <th style="text-align: center" data-field="nup"data-sort="1" data-primary-key="0"> <?= cclang('Kode NUP') ?></th>
                                        <th style="text-align: center" data-field="kode_tid"data-sort="1" data-primary-key="0"> <?= cclang('Kode Tag') ?></th>
                                        <th style="text-align: center" data-field="hasil_pencarian"data-sort="1" data-primary-key="0"> <?= cclang('Status Aset') ?></th>
                                        
                                        <th style="text-align: center; vertical-align: middle;">
                                            <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                <i class="ui-tooltip fa fa-trash-o" 
                                                title="Hapus Semua" 
                                                style="font-size: 22px; cursor: pointer;" 
                                                data-original-title="Hapus Semua" 
                                                onclick="removeAllRow(this)">
                                                </i>
                                            </div>
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DataTable will populate the rows automatically -->
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <div class="form-group text-center">

                                <!-- Cancel Button -->
                                <div class="custom-button-wrapper"></div>

                                <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>

                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                                <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                    <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                                </a>

                                <!-- Loading Indicator -->
                                <span class="loading loading-hide" style="display: inline-block; margin-left: 15px;">
                                    <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg" alt="Loading">
                                    <i id="data_processing"></i>
                                </span>
                            </div>

                        </div>
                    
                    </div>
                    <!-- /.row -->
                    
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  var module_name = "peminjaman"
  var use_ajax_crud = false
</script>

<script type="text/javascript">

    $(document).ready(function() {

        // $('#containerChart').hide();
        // $('#containerChartResult').hide();

        // var dataArrayAset = []; // Array untuk menyimpan data

        var chart_aset_real = 0;
        var chart_aset_found = 0;
        var chart_aset_not_found = 0;
        
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

        var table;
        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/' + module_name + '/serverSideData';

        table = $('#asetTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: url,
                type: "POST",
                data: function(d) {
                    d.id_area = $('#id_area').val();
                    d.id_gedung = $('#id_gedung').val(); 
                    d.id_ruangan = $('#id_ruangan').val();
                    d.select_all = $('#select_all').val();
                }
            },
            "order": [[3, 'asc']],
            columns: [
                {
                    "data": "checkbox_id_master_aset",
                    "className": "dt-center", 
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "auto_number",
                    "className": "dt-center",
                    "orderable": false,
                    "searchable": false
                },
                { data: "id", className: "dt-center", orderable: true, searchable: true },
                { data: "nama_aset", className: "dt-left", orderable: true, searchable: true },
                { data: "kode_aset", className: "dt-left", orderable: true, searchable: true },
                { data: "nup", className: "dt-center", orderable: true, searchable: true },
                { data: "kode_tid", className: "dt-center", orderable: true, searchable: true },
            ],
            "createdRow": function (row, data, dataIndex) {
                // Paksa semua kolom angka menjadi rata tengah
                $('td', row).eq(1).css('text-align', 'center');
                $('td', row).eq(2).css('text-align', 'center');
                $('td', row).eq(5).css('text-align', 'center');
            }
        });

        function reload_datatables() {
            table.ajax.reload();
            // table.ajax.reload(null,false); //reload datatable ajax 
        }

        $('#id_area, #id_gedung, #id_ruangan').change(function() {
            reload_datatables();
        });

        $('#select_all').change(function() {

            var id_area = $('#id_area').val();
            var id_gedung = $('#id_gedung').val();
            var id_ruangan = $('#id_ruangan').val();    

            if ($(this).is(':checked')) {

                if (id_area == '') {
                    swal({
                        title: "Error",
                        text: "Area tidak boleh kosong!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });
                    $(this).prop('checked', false);
                    $(this).val('0');
                    return false;
                }

                if (id_gedung == '') {
                    swal({
                        title: "Error",
                        text: "Gedung tidak boleh kosong!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Okay!",
                        closeOnConfirm: true
                    });
                    $(this).prop('checked', false);
                    $(this).val('0');
                    return false;
                }

                $('#asetTable').find('input[type="checkbox"]').prop('checked', false);
                $('#asetTable').find('input[type="checkbox"]').prop('disabled', true);
                $(this).val('1');

            } else {
                $('#asetTable').find('input[type="checkbox"]').prop('disabled', false);
                $(this).val('0'); 
            }

        });

        $('#btn_search').click(async function() {
            
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

            // console.log('dataArrayAset: ', dataArrayAset);

            socket.onmessage = function (event) {

                var parsedData = JSON.parse(event.data);
                var event_name = parsedData.event;

                if (event_name == 'scan-rfid-result') {

                    {

                        try {
                        
                            var tid = parsedData.data_tid;
                            var epc = parsedData.data;
                            var alias_antenna = 'handheld';
                            var status_tag = 'OK';
                            var description = 'OK';
                            var count_tag = 0;

                            // Cek apakah data dengan TID dan alias_antenna tersebut sudah ada
                            var isExisting = dataArrayAset.some(data => data.kode_tid === tid);

                            if (!isExisting) {

                                var is_unique_single_tag = '0';

                                get_check_unique_single_tag(tid).then(async function(response) {
                                
                                is_unique_single_tag = response.check;

                                if (is_unique_single_tag == 0) {
                                    
                                    isExisting = dataArrayAset.some(data => data.kode_tid === tid);

                                        console.log('your tid: ' + tid, 'is available');

                                        count_tag++;

                                    var waktu = new Date().toISOString();
                                
                                        // Tambahkan data baru ke array jika TID belum ada
                                        uniqueDataArray.push({
                                         id: item.id_aset,
                                         kode_aset: item.kode_aset, 
                                         nup: item.nup,
                                         nama_aset: item.nama_aset,
                                         kode_tid: item.kode_tid
                                       });

                                       $('#your_table_id tbody').append(`
                                            <tr>
                                                <td style="text-align: center;">${DataArray.length}</td>
                                                <td style="text-align: center;">${id}</td>
                                                <td style="text-align: center;">${kode_aset}</td>
                                                <td style="text-align: center;">${nup}</td>
                                                <td style="text-align: center;">${nama_aset}</td>
                                                <td style="text-align: center;">${kode_tid}</td>
                                            </tr>
                                        `);

                                        // $('#array_tag_code').val(JSON.stringify(uniqueDataArray));
                                        $('#total_rfid_tag').html(uniqueDataArray.length);

                                        console.log('Data baru ditambahkan:', tid);

                                    }

                            }); 

                            } else {
                                console.log('Data dengan TID ' + tid + ' tidak ada');
                            }

                        } catch (error) {
                            console.error('Error parsing JSON data:', error);
                        }

                    } // metode_pencarian = partial

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

        $('#btn_pilih_aset').click(async function(e) {
            
            e.preventDefault();

            let id_area = $('#id_area').val();
            let id_gedung = $('#id_gedung').val();
            let id_ruangan = $('#id_ruangan').val();
                
            if ($('#select_all').val() == '1') {
                    
                if (id_area == '') {
                        
                    await new Promise((resolve) => {
                            
                        swal({
                                title: "Error",
                                text: "Area tidak boleh kosong!",
                                type: "error", 
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Okay!",
                                closeOnConfirm: true
                            }, function() {
                                resolve();
                            });

                    });

                    return false;
                    
                }   

                if (id_gedung == '') {
    
                    await new Promise((resolve) => {
                        
                        swal({
                            title: "Error",
                            text: "Gedung tidak boleh kosong!",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Okay!",
                            closeOnConfirm: true
                        }, function() {
                            resolve();
                        });

                    });

                    return false;

                }   

                await getAllAset();

            } else {
                await get_datatables_checked();
            }

            $('#asetTable').find('input[type="checkbox"]').prop('checked', false);
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
                    window.location.href = ADMIN_BASE_URL + '/peminjaman';
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

            $('#data_processing').html('Saving data...');
            $('.loading').show();

            $.ajax({
                    url: ADMIN_BASE_URL + '/peminjaman/add_save',
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
                        reload_datatables();
                        $('#your_table_id tbody tr').remove();
                        $('#total_rfid_tag').html(0);
                        $('#total_aset_checklist').html(0);
                        $('#data_processing').html('');

                        $('.chosen option').prop('selected', false).trigger('chosen:updated');
                    
                    } else {

                        reload_datatables();
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
                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/peminjaman/index/?ajax=1'
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
                url: ADMIN_BASE_URL + '/peminjaman/ajax_id_gedung/' + val,
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
                url: ADMIN_BASE_URL + '/peminjaman/ajax_id_ruangan/' + val,
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