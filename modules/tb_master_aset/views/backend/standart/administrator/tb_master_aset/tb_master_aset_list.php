<script type="text/javascript">
   function domo() {

      $('*').bind('keydown', 'Ctrl+a', function() {
         window.location.href = ADMIN_BASE_URL + '/Tb_master_aset/add';
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
<style>
   /* Style untuk modal */
   .modal {
      display: none;
      /* Sembunyikan modal saat pertama kali */
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Background transparan */
   }

   /* Konten modal */
   .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border-radius: 8px;
      width: 50%;
      text-align: center;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
   }

   /* Tombol close */
   .close {
      color: red;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
   }

   .close:hover {
      color: darkred;
   }
</style>




<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('tb_master_aset_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tb_master_aset')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/tb_master_aset/add'); ?>"><i class="fa fa-plus-square-o"></i> Tambah Aset Baru</a>
                        <?php }) ?>
                        <?php is_allowed('tb_master_aset_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tb_master_aset') ?> " href="<?= admin_site_url('/tb_master_aset/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('tb_master_aset_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tb_master_aset') ?> " href="<?= admin_site_url('/tb_master_aset/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                        <button class="btn btn-primary" id="openModalBtn">Upload Excel</button>

                     </div>

                     <div class=" widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Data Aset</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('tb_master_aset')]); ?> <i class="label bg-yellow"><span class="total-rows"><?= $tb_master_aset_counts; ?></span> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_tb_master_aset" id="form_tb_master_aset" action="<?= admin_base_url('/tb_master_aset/index'); ?>">



                     <!-- /.widget-user -->
                     <div class="row">
                        <div class="col-md-8">

                        </div>

                     </div>
                     <div class="table-responsive">

                        <br>
                        <table id="masterdata" class="display">
                           <thead>
                              <tr class="">

                                 <th data-field="kode_tid" data-primary-key="0"> <?= cclang('kode_tid') ?></th>
                                 <th data-field="kode_aset" data-primary-key="0"> <?= cclang('kode_aset') ?></th>
                                 <th data-field="nama_aset" data-primary-key="0"> <?= cclang('nama_aset') ?></th>
                                 <th data-field="id_area" data-primary-key="0"> Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="">
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
<!-- Modal -->
<div id="myModal" class="modal">
   <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Import Data Aset (Bulk)</h2>
      <form id="uploadForm" enctype="multipart/form-data">
         <input type="file" name="file" id="file" required>
         <br><br>
         <button type="submit">Upload</button>
      </form>
      <div id="uploadResult"></div>
   </div>
</div>
<script>
   var module_name = "tb_master_aset"
   var use_ajax_crud = false;
</script>
<script src="<?= BASE_ASSET ?>js/filter.js"></script>
<script>
   // Ambil elemen modal dan tombol
   var modal = document.getElementById("myModal");
   var btn = document.getElementById("openModalBtn");
   var span = document.getElementsByClassName("close")[0];

   // Saat tombol diklik, modal muncul
   btn.onclick = function() {
      modal.style.display = "block";
   }

   // Saat tombol close diklik, modal disembunyikan
   span.onclick = function() {
      modal.style.display = "none";
   }

   // Klik di luar modal akan menutup modal
   window.onclick = function(event) {
      if (event.target == modal) {
         modal.style.display = "none";
      }
   }

   $(document).ready(function() {
      $("#uploadForm").submit(function(e) {
         e.preventDefault(); // Mencegah reload halaman

         var formData = new FormData(this);
         var url = BASE_URL + ADMIN_NAMESPACE_URL + '/tb_master_aset/upload';
         console.log(url, "lop");

         $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
               $("#uploadResult").html("<p class='text-info'>Mohon tunggu sedang Mengupload...</p>");
            },
            success: function(response) {
               $("#uploadResult").html("<p class='text-success'>" + response + "</p>");
            },
            error: function() {
               $("#uploadResult").html("<p class='text-danger'>Gagal mengupload!</p>");
            }
         });
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
         var serialize_bulk = $('#form_tb_master_aset').serialize();

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
                     document.location.href = ADMIN_BASE_URL + '/tb_master_aset/delete?' + serialize_bulk;
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
      initSortableAjax('tb_master_aset', $('table.dataTable'));
   }); /*end doc ready*/
</script>