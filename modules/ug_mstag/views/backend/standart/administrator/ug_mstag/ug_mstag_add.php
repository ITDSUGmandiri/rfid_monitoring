
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
        Master Tag RFID<small><?= cclang('new', ['Master Tag RFID']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/ug_mstag'); ?>">Master Tag RFID</a></li>
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
                            <h3 class="widget-user-username">Master Tag RFID</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Master Tag RFID']); ?></h5>
                            <hr>
                        </div>
                        
                        <?= form_open('', [
                            'name' => 'form_ug_mstag_add',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_ug_mstag_add',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

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
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-flat btn-info btn_search btn_action btn_search_back btn-block" id="btn_search" data-stype='back' title="Search">
                                        <i class="ion ion-ios-list-outline"></i> Search
                                    </a>
                                </div>
                                <small class="info help-block"><b>Status:</b> <div id="status"></div></small>
                            </div>

                            <div class="col-md-3"></div>
                        </div>


                    <div class="table-responsive"> 

                        <br>
                        <table class="table table-bordered table-striped dataTable" id="your_table_id">
                            <thead>
                            <tr class="">                            
                                <th style="text-align: center">
                                    <?= cclang('No') ?>
                                </th>
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
            <i>Searching RFID Tag...</i>
        </span>

    </div>

<?= form_close(); ?>
</div>
</div>
</div>
</div>
</div>

</section>

<script src="<?php echo base_url(); ?>asset/js/socket.io.js"></script>

<script>
  var module_name = "ug_mstag"
  var use_ajax_crud = false
</script>

<script>
    $(document).ready(function() {

        $('#status').html('Disconnected');
        $('#ip_address').attr('placeholder', 'Masukkan IP Address');
        // $('#ip_address').val('');

        var stored_ip_address = localStorage.getItem('ip_address');

        if (stored_ip_address) {
            $('#ip_address').val(stored_ip_address);
            console.log('IP Address yang tersimpan:', stored_ip_address);
            // alert('IP Address tersimpan: ' + stored_ip_address);
        } else {
            // localStorage.setItem('ip_address', ip_address);
            console.log('Tidak ada IP Address yang tersimpan.');
            // alert('Tidak ada IP Address yang tersimpan.');
        }
        
        "use strict";

        window.event_submit_and_action = '';

        // Deklarasi array global untuk menyimpan data unik berdasarkan TID
        var uniqueDataArray = [];

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
                        window.location.href = ADMIN_BASE_URL + '/ug_mstag';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('#btn_search').click(function() {

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
            };


            var postTimeout = null; // Timer untuk mendeteksi tidak ada data baru
            var timeoutDuration = 2000; // Waktu tunggu (ms) untuk memposting data ke database

            socket.onmessage = function (event) {

                var parsedData = JSON.parse(event.data);
                var event_name = parsedData.event;

                if (event_name == 'scan-rfid-result') {

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

                        // Cek apakah data dengan TID dan alias_antenna tersebut sudah ada
                        var isExisting = uniqueDataArray.some(data => data.tid === tid);

                        if (!isExisting) {

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

                            console.log('Data baru ditambahkan:', parsedData.value);
                        } else {
                            console.log('Data dengan TID ini sudah ada:', tid);
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

        $('.btn_save').click(function() {

            $('.message').fadeOut();
            
            var form_ug_mstag = $('#form_ug_mstag_add');
            var data_post = form_ug_mstag.serializeArray();
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

            if (uniqueDataArray.length > 0) {

                // alert('Please wait, saving data...');

                $.ajax({
                    url: ADMIN_BASE_URL + '/ug_mstag/add_save',
                    type: 'POST',
                    // dataType: 'json',
                    contentType: 'application/json',
                    // data: data_post,
                    data: JSON.stringify({ data_post: data_post, data: uniqueDataArray }),
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

                        var url = BASE_URL + ADMIN_NAMESPACE_URL + '/ug_mstag/index/?ajax=1'
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

            } else {
                alert('Tidak ada data untuk diposting.');
                console.log('Tidak ada data untuk diposting.');
                $('.loading').hide();
                return false;
            }

            return false;
        }); /*end btn save*/

    }); /*end doc ready*/
</script>