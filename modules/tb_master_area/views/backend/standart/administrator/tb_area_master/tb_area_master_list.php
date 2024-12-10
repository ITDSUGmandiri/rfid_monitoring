<script type="text/javascript">
   function domo() {

      $('*').bind('keydown', 'Ctrl+a', function() {
         window.location.href = ADMIN_BASE_URL + '/tb_master_area/add';
         return false;
      });

      $('*').bind('keydown', 'Ctrl+f', function() {
         $('#sbtn').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+x', function() {
         $('#reset').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+b', function() {

         $('#reset').trigger('click');
         return false;
      });
   }

   jQuery(document).ready(domo);
</script>
<!-- <section class="content-header">
   <h1>
      <?= cclang('tb_master_area') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('tb_master_area') ?></li>
   </ol>
</section> -->
<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('tb_master_area_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tb_master_area')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/tb_master_area/add'); ?>"><i class="fa fa-plus-square-o"></i> Tambah Area Baru</a>
                        <?php }) ?>
                        <?php is_allowed('tb_master_area_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tb_master_area') ?> " href="<?= admin_site_url('/tb_master_area/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('tb_master_area_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tb_master_area') ?> " href="<?= admin_site_url('/tb_master_area/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Data Area</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('tb_area_master')]); ?> <i class="label bg-yellow"><span class="total-rows"><?= $tb_area_master_counts; ?></span> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_tb_master_area" id="form_tb_master_area" action="<?= admin_base_url('/tb_master_area/index'); ?>">



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
                           </div>
                           <div class="col-sm-3 padd-left-0  ">
                              <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                           </div>
                           <div class="col-sm-3 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="f" id="field">
                                 <option value=""><?= cclang('all'); ?></option>
                                 <option <?= $this->input->get('f') == 'kode_tid' ? 'selected' : ''; ?> value="kode_tid">Kode Tid</option>
                                 <option <?= $this->input->get('f') == 'kode_aset' ? 'selected' : ''; ?> value="kode_aset">Kode Aset</option>
                                 <option <?= $this->input->get('f') == 'nup' ? 'selected' : ''; ?> value="nup">Nup</option>
                                 <option <?= $this->input->get('f') == 'kategori' ? 'selected' : ''; ?> value="kategori">Kategori</option>
                                 <option <?= $this->input->get('f') == 'merk' ? 'selected' : ''; ?> value="merk">Merk</option>
                                 <option <?= $this->input->get('f') == 'tipe' ? 'selected' : ''; ?> value="tipe">Tipe</option>
                                 <option <?= $this->input->get('f') == 'id_kondisi' ? 'selected' : ''; ?> value="id_kondisi">Id Kondisi</option>
                                 <option <?= $this->input->get('f') == 'status' ? 'selected' : ''; ?> value="status">Status</option>
                                 <option <?= $this->input->get('f') == 'tipe_moving' ? 'selected' : ''; ?> value="tipe_moving">Tipe Moving</option>
                                 <option <?= $this->input->get('f') == 'nama_aset' ? 'selected' : ''; ?> value="nama_aset">Nama Aset</option>
                                 <option <?= $this->input->get('f') == 'id_area' ? 'selected' : ''; ?> value="id_area">Id Area</option>
                                 <option <?= $this->input->get('f') == 'id_gedung' ? 'selected' : ''; ?> value="id_gedung">Id Gedung</option>
                                 <option <?= $this->input->get('f') == 'id_ruangan' ? 'selected' : ''; ?> value="id_ruangan">Id Ruangan</option>
                                 <option <?= $this->input->get('f') == 'tgl_perolehan' ? 'selected' : ''; ?> value="tgl_perolehan">Tgl Perolehan</option>
                                 <option <?= $this->input->get('f') == 'tgl_inventarisasi' ? 'selected' : ''; ?> value="tgl_inventarisasi">Tgl Inventarisasi</option>
                                 <option <?= $this->input->get('f') == 'flag_inventarisasi' ? 'selected' : ''; ?> value="flag_inventarisasi">Flag Inventarisasi</option>
                                 <option <?= $this->input->get('f') == 'tgl_peminjaman' ? 'selected' : ''; ?> value="tgl_peminjaman">Tgl Peminjaman</option>
                                 <option <?= $this->input->get('f') == 'tgl_pengembalian' ? 'selected' : ''; ?> value="tgl_pengembalian">Tgl Pengembalian</option>
                                 <option <?= $this->input->get('f') == 'tgl_mutasi' ? 'selected' : ''; ?> value="tgl_mutasi">Tgl Mutasi</option>
                                 <option <?= $this->input->get('f') == 'id_lokasi_moving' ? 'selected' : ''; ?> value="id_lokasi_moving">Id Lokasi Moving</option>
                                 <option <?= $this->input->get('f') == 'id_pegawai' ? 'selected' : ''; ?> value="id_pegawai">Id Pegawai</option>
                              </select>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                 Filter
                              </button>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/tb_master_area'); ?>" title="<?= cclang('reset_filter'); ?>">
                                 <i class="fa fa-undo"></i>
                              </a>
                           </div> -->
                        </div>
                        <div class="col-md-4">
                           <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                              <div class="table-pagination"><?= $pagination; ?></div>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive">

                        <br>
                        <table id="exampleas" class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr class="">

                                 <th data-field="kode_tid" data-primary-key="0"> Kode Area</th>
                                 <th data-field="kode_aset" data-primary-key="0"> Nama Area</th>
                                 <th data-field="nama_aset" data-primary-key="0"> Keterangan Area</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_tb_master_area">
                              <?= $tables ?>
                           </tbody>
                        </table>
                     </div>
               </div>
               <hr>

            </div>
            </form>
         </div>
      </div>
   </div>
</section>
<script>
   var module_name = "tb_master_area";
   var use_ajax_crud = false;
</script>
<script src="<?= BASE_ASSET ?>js/filter.js"></script>


<script>
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
         var serialize_bulk = $('#form_tb_master_area').serialize();

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
                     document.location.href = ADMIN_BASE_URL + '/tb_master_area/delete?' + serialize_bulk;
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
      initSortableAjax('tb_master_area', $('table.dataTable'));
   }); /*end doc ready*/
</script>