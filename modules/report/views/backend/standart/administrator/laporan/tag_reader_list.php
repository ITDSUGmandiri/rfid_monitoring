 <style>
    .bagianprint {
       overflow: scroll;
       margin-top: 50px;
       border-style: inset;
       padding: 50px;
    }

    table {
       font-family: arial, sans-serif;
       border-collapse: collapse;
       width: 100%;
    }

    td,
    th {
       border: 1px solid #dddddd;
       text-align: center;
       padding: 8px;

    }

    /* tr:nth-child(even) {
       background-color: #dddddd;
    } */

    form>h2 {
       color: #0094ff;
    }

    form>p:first-child {
       font-size: large;
    }

    .createPDF {
       font-size: 14px;
    }
 </style>
 <section class="content-header">
    <h1>
       Data Laporan<small><?= cclang('list_all'); ?></small>
    </h1>
    <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active"><?= cclang('tag_reader') ?></li>
    </ol>
 </section>
 <!-- Main content -->
 <section class="content">
    <div class="row">

       <div class="col-md-12">
          <div class="box box-warning">
             <div class="box-body ">
                <div class="box box-widget widget-user-2">
                   <div class="widget-user-header ">
                      <div class="row pull-right">
                         <?php is_allowed('tag_reader_add', function () { ?>
                            <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tag_reader')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/tag_reader/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('tag_reader')]); ?></a>
                         <?php }) ?>
                         <?php is_allowed('tag_reader_export', function () { ?>
                            <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tag_reader') ?> " href="<?= admin_site_url('/tag_reader/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                         <?php }) ?>
                         <?php is_allowed('tag_reader_export', function () { ?>
                            <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tag_reader') ?> " href="<?= admin_site_url('/tag_reader/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                         <?php }) ?>
                      </div>
                      <div class="widget-user-image">
                         <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">LAPORAN ASET</h3>
                      <h5 class="widget-user-desc"><?= cclang('list_all', 'Pergerakan Data Aset'); ?></h5>
                   </div>

                   <form name="form_tag_reader" id="form_tag_reader" action="report/ambildata">
                      <!-- /.widget-user -->
                      <div class="row">
                         <div class="col-md-8">
                            <!-- <div class="col-sm-2 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
                                 <option value="delete">Delete</option>
                              </select>
                           </div>
                           <div class="col-sm-2 padd-left-0 ">
                              <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                           </div> -->

                            <div class="col-sm-3 padd-left-0 ">
                               <select type="text" class="form-control chosen chosen-select" name="jenlap" id="field">
                                  <option value="0">--Pilih Laporan--</option>
                                  <option value="1">Laporan Sensus</option>
                                  <option value="2">Laporan Perbaikan</option>
                                  <option value="3">Laporan Peminjaman</option>
                               </select>
                            </div>
                            <div class="col-sm-3 padd-left-0 ">
                               <select class="form-control chosen chosen-select-deselect" name="area_id" id="area_id" data-placeholder="Select Area">
                                  <option value="0">Pilih Ruangan</option>
                                  <?php
                                    $conditions = [];
                                    ?>

                                  <?php foreach (db_get_all_data('tb_master_ruangan', $conditions) as $row): ?>
                                     <option value="<?= $row->id ?>"><?= $row->ruangan; ?></option>
                                  <?php endforeach; ?>
                               </select>
                            </div>
                            <div class="col-sm-2 padd-left-0 ">
                               <input type="text" name="detreng" class="form-control" placeholder="Pilih Rentang Tanggal">
                            </div>
                            <div class="col-sm-2 padd-left-0 ">
                               <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                  Load Data
                               </button>
                            </div>
                            <div class="col-sm-1 padd-left-0 ">
                               <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/ambildata'); ?>" title="<?= cclang('reset_filter'); ?>">
                                  <i class="fa fa-undo"></i>
                               </a>
                            </div>
                            <div class="col-sm-1 padd-left-0  ">
                               <button class="btn btn-danger" class="html2PdfConverter" onclick="createPDF()">Download PDF </button>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                               <div class="table-pagination"><?= $pagination; ?></div>
                            </div>
                         </div>
                      </div>
                      <div class="table-responsive">
                         <div class="bagianprint" id="element-to-print">


                            <!-- Sample Table -->
                            <form class="form">

                               <h2><img src="<?= base_url('asset/img/icon/sekneglogodb.png') ?>" width="20%" /></h2>
                               <h3><strong>Laporan Aset</strong></h3>
                               <p>Area&emsp;&emsp;&emsp;&emsp;:</br>
                                  Kategori&emsp;&emsp;&nbsp;&nbsp;:</br>
                                  Satuan Kerja&ensp;:</br>Periode&emsp;&emsp;&ensp;&nbsp;:</h5>


                               <table>
                                  <tbody>
                                     <tr>
                                        <th colspan="4">Nomor</th>
                                        <th colspan="3">Spesifikasi Barang</th>
                                        <th rowspan="2">Tgl Perolehan</th>
                                        <th rowspan="2">Tgl Inventarisasi</th>
                                        <th rowspan="2">Lokasi Asal</th>
                                        <th rowspan="2">Kondisi</th>
                                        <th rowspan="2">Status</th>
                                        <th colspan="2">Jumlah</th>
                                        <th rowspan="2">Keterangan</th>

                                     </tr>
                                     <tr>
                                        <th>No.</th>
                                        <th>Kode Aset.</th>
                                        <th>NUP.</th>
                                        <th>Kode RFID.</th>
                                        <th>Nama Aset</th>
                                        <th>Merk/Type</th>
                                        <th>Kategori</th>
                                        <th>Aset</th>
                                        <th>Harga</th>


                                     </tr>
                                     <tr>
                                        <td>6</td>
                                        <td>Giovanni Rovelli</td>
                                        <td>Italy</td>
                                     </tr>
                                  </tbody>
                               </table>

                            </form>
                            <!-- Sample Progressbar -->
                            <div>
                               <div class="progress">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                     <span class="sr-only">70% Complete</span>
                                  </div>
                               </div>


                               <p>Dicetak&emsp;&emsp;: <?= date('Y-m-d H:i:s'); ?></br>
                                  PIC&emsp;&emsp;&emsp;&nbsp;&nbsp;: <?= $this->session->userdata('full_name') ?></br>
                               </p>

                            </div>
                            <br><br>
                            <table>
                               <tr>
                                  <td style="width: 50%;">
                                     <p>Mengetahui,</br>Kepala Bagian Bidang...<br><br><br><br><br><strong style=" text-decoration: underline; ">Nama Perorangan</strong><br>NIP:0000000001</p>
                                  </td>

                                  <td style="width: 50%;">
                                     <p>Penanggung Jawab Aset<br><br><br><br><br><br><strong style=" text-decoration: underline; ">Nama Perorangan</strong><br>NIP:0000000001</p>
                                  </td>
                               </tr>
                            </table>
                         </div>
                      </div>
                </div>
                <hr>

             </div>
             </form>
          </div>
       </div>
    </div>
 </section>

 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

 <script>
    $('input[name="detreng"]').daterangepicker();
    $(document).ready(function() {

       "use strict";



       if (use_ajax_crud == false) {

          $(document).on('click', 'a.remove-data', function() {

             var url = $(this).attr('data-href');

             swal({
                   title: "<?= cclang('are_you_sure'); ?>",
                   text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                   cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                   closeOnConfirm: true,
                   closeOnCancel: true
                },
                function(isConfirm) {
                   if (isConfirm) {
                      document.location.href = url;
                   }
                });

             return false;
          });
       }



       $(document).on('click', '#apply', function() {

          var bulk = $('#bulk');
          var serialize_bulk = $('#form_tag_reader').serialize();

          if (bulk.val() == 'delete') {
             swal({
                   title: "<?= cclang('are_you_sure'); ?>",
                   text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                   cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                   closeOnConfirm: true,
                   closeOnCancel: true
                },
                function(isConfirm) {
                   if (isConfirm) {
                      document.location.href = ADMIN_BASE_URL + '/tag_reader/delete?' + serialize_bulk;
                   }
                });

             return false;

          } else if (bulk.val() == '') {
             swal({
                title: "Upss",
                text: "<?= cclang('please_choose_bulk_action_first'); ?>",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Okay!",
                closeOnConfirm: true,
                closeOnCancel: true
             });

             return false;
          }

          return false;

       }); /*end appliy click*/


       //check all
       var checkAll = $('#check_all');
       var checkboxes = $('input.check');

       checkAll.on('ifChecked ifUnchecked', function(event) {
          if (event.type == 'ifChecked') {
             checkboxes.iCheck('check');
          } else {
             checkboxes.iCheck('uncheck');
          }
       });

       checkboxes.on('ifChanged', function(event) {
          if (checkboxes.filter(':checked').length == checkboxes.length) {
             checkAll.prop('checked', 'checked');
          } else {
             checkAll.removeProp('checked');
          }
          checkAll.iCheck('update');
       });
       initSortableAjax('tag_reader', $('table.dataTable'));
    }); /*end doc ready*/
 </script>