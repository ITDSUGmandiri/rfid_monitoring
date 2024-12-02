<script type="text/javascript">
   function domo() {

      $('*').bind('keydown', 'Ctrl+a', function() {
         window.location.href = ADMIN_BASE_URL + '/Tb_asset_master/add';
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="content-header">
   <h1>
      <?= cclang('tb_asset_master') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('tb_asset_master') ?></li>
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
                        <?php is_allowed('tb_asset_master_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tb_asset_master')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/tb_asset_master/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('tb_asset_master')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('tb_asset_master_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tb_asset_master') ?> " href="<?= admin_site_url('/tb_asset_master/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('tb_asset_master_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tb_asset_master') ?> " href="<?= admin_site_url('/tb_asset_master/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                        <?php is_allowed('tb_asset_master_export', function () { ?>
                           <a class="btn btn-flat btn-warning" title="<?= cclang('import'); ?> <?= cclang('tb_asset_master') ?> " href="<?= admin_site_url('/tb_asset_master/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('import'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('tb_asset_master_export', function () { ?>
                           <!-- href="<?= admin_site_url('/tb_asset_master/reset_data'); ?>" -->
                           <a id="resetdata" class="btn btn-flat btn-danger" title="Reset data Aset Master"><i class="fa fa-refresh"></i> Reset Data</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('tb_asset_master') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('tb_asset_master')]); ?> <i class="label bg-yellow"><span class="total-rows"><?= $tb_asset_master_counts; ?></span> <?= cclang('items'); ?></i></h5>
                  </div>

                  <div class="table-responsive">

                     <table id="exampleas" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                        <thead>
                           <tr class="">

                              <th data-field="kode_aset" data-sort="1" data-primary-key="0"> <?= cclang('kode_aset') ?></th>
                              <th data-field="nup" data-sort="1" data-primary-key="0"> <?= cclang('nup') ?></th>
                              <th data-field="tag_code" data-sort="1" data-primary-key="0"> <?= cclang('tag_code') ?></th>
                              <th data-field="nama_brg" data-sort="1" data-primary-key="0"> <?= cclang('nama_brg') ?></th>
                              <th data-field="Kondisi" data-sort="1" data-primary-key="0"> <?= cclang('Kondisi') ?></th>
                              <th data-field="Lokasi" data-sort="1" data-primary-key="0"> <?= cclang('Lokasi') ?></th>
                              <th data-field="status_id" data-sort="1" data-primary-key="0"> <?= cclang('status_id') ?></th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($tb_asset_masters as $tb_asset_master): ?>
                              <tr>


                                 <td><span class="list_group-kode_aset"><?= _ent($tb_asset_master->kode_aset); ?></span></td>
                                 <td><span class="list_group-nup"><?= _ent($tb_asset_master->nup); ?></span></td>
                                 <td><span class="list_group-kode_tid"><?= _ent($tb_asset_master->kode_tid); ?></span></td>
                                 <td><span class="list_group-nama_aset"><?= _ent($tb_asset_master->nama_aset); ?></span></td>
                                 <td><?php if ($tb_asset_master->ket_kondisi) {

                                          echo admin_anchor('/tb_kondisi_master/view/' . $tb_asset_master->ket_kondisi . '?popup=show', $tb_asset_master->tb_kondisi_master_keterangan, ['class' => 'popup-view']);
                                       } ?> </td>

                                 <td><?php if ($tb_asset_master->ruangan) {

                                          echo admin_anchor('/tb_room_master/view/' . $tb_asset_master->ruangan . '?popup=show', $tb_asset_master->tb_room_master_name_room, ['class' => 'popup-view']);
                                       } ?> </td>

                                 <td><span class="list_group-status_id"><?= _ent($tb_asset_master->ket_kondisi); ?></span></td>
                                 <td width="200">

                                    <?php is_allowed('tb_asset_master_view', function () use ($tb_asset_master) { ?>
                                       <a href="<?= admin_site_url('/tb_asset_master/view/' . $tb_asset_master->id); ?>" data-id="<?= $tb_asset_master->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                       <?php }) ?>
                                       <?php is_allowed('tb_asset_master_update', function () use ($tb_asset_master) { ?>
                                          <a href="<?= admin_site_url('/tb_asset_master/edit/' . $tb_asset_master->id); ?>" data-id="<?= $tb_asset_master->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                                       <?php }) ?>
                                       <?php is_allowed('tb_asset_master_delete', function () use ($tb_asset_master) { ?>
                                          <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_asset_master/delete/' . $tb_asset_master->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                       <?php }) ?>

                                 </td>
                              </tr>
                           <?php endforeach; ?>
                           <?php if ($tb_asset_master_counts == 0) : ?>
                              <tr>
                                 <td colspan="100">
                                    Tb Asset Master data is not available
                                 </td>
                              </tr>
                           <?php endif; ?>
                        </tbody>

                     </table>
                  </div>


               </div>

            </div>
         </div>
      </div>
</section>
<script>
   var module_name = "tb_asset_master"
   var use_ajax_crud = true
   document.getElementById('resetdata').addEventListener('click', function() {
      const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
            padding: "3em",
         },
         buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
         title: "Anda yakin ingin Reset Data?",
         text: "Mereset Data akan berpengaruh ke Monitoring Aset",
         icon: "warning",
         showCancelButton: true,
         confirmButtonText: "Ya, Reset Data",
         cancelButtonText: "Batal",
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
               title: "Reset!",
               text: "Data berhasil di Reset.",
               icon: "success"
            });
         } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
         ) {
            swalWithBootstrapButtons.fire({
               title: "Batal",
               text: "Anda batal Reset Data",
               icon: "error"
            });
         }
      });
   });
</script>

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
         var serialize_bulk = $('#form_tb_asset_master').serialize();

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
                     document.location.href = ADMIN_BASE_URL + '/tb_asset_master/delete?' + serialize_bulk;
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
      // var checkAll = $('#check_all');
      // var checkboxes = $('input.check');

      // checkAll.on('ifChecked ifUnchecked', function(event) {
      //    if (event.type == 'ifChecked') {
      //       checkboxes.iCheck('check');
      //    } else {
      //       checkboxes.iCheck('uncheck');
      //    }
      // });

      // checkboxes.on('ifChanged', function(event) {
      //    if (checkboxes.filter(':checked').length == checkboxes.length) {
      //       checkAll.prop('checked', 'checked');
      //    } else {
      //       checkAll.removeProp('checked');
      //    }
      //    checkAll.iCheck('update');
      // });
      // initSortableAjax('tb_asset_master', $('table.dataTable'));
   }); /*end doc ready*/
</script>