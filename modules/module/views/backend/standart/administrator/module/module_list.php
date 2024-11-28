<section class="content-header">
   <h1>
      Module<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Module</li>
   </ol>
</section>

<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">

                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', 'Module'); ?> (Ctrl+a)" href="<?= admin_site_url('/module/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', 'Module'); ?></a>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET ?>img/list.png" alt="User Avatar">
                     </div>

                     <h3 class="widget-user-username">Module</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', ['Module']); ?> <i class="label bg-yellow"><?= count($modules); ?> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_module" id="form_module" action="<?= admin_base_url('/module/index'); ?>">


                     <div class="table-responsive">
                        <table class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr>
                                 <th>
                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                 </th>
                                 <th>Name</th>
                                 <!-- <th>Action</th> -->
                              </tr>
                           </thead>
                           <tbody id="tbody_module">
                              <?php foreach ($modules as $module) :  ?>

                                 <tr>
                                    <td width="5">
                                       <input type="checkbox" class="flat-red check" name="id[]" value="<?= $module->item; ?>">
                                    </td>

                                    <td>
                                       <?= (isset($module->parent) ? '<span class="label label-primary"><i class="fa fa-code-fork"></i> bundle from ' . $module->parent . '</span> - ' : '') . _ent(ucwords($module->item)); ?><br>

                                    </td>
                                    <!--   <td width="200">
                         
                            <?php if ($module->actived()) : ?>
                         
                            <?php is_allowed('module_activate', function () use ($module) { ?>
                            <a href="<?= admin_site_url('/module/deactivation/?mod=' . base64_encode($module->path)); ?>" class="label-default  "><i class="fa fa-minus-square  "></i> <?= cclang('btn_deactivation'); ?></a>
                            <?php }) ?>
                            <?php else : ?>
                            <?php is_allowed('module_deactivate', function () use ($module) { ?>
                            <a href="<?= admin_site_url('/module/activation/?mod=' . base64_encode($module->path)); ?>" class="label-default"><i class="fa  fa-plus-square-o "></i> <?= cclang('btn_activation'); ?></a>
                            <?php }) ?>
                            <?php endif ?>
                         
                         </td> -->
                                 </tr>
                              <?php endforeach; ?>
                              <?php if (count($modules) == 0) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Module data is not available
                                    </td>
                                 </tr>
                              <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
               </div>
               <hr>


            </div>

         </div>

      </div>
   </div>
</section>


<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET ?>admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="<?= BASE_ASSET ?>admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_ASSET ?>admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
   $(document).ready(function() {

      "use strict";

      $('.remove-data').on('click', function() {

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


      $('#apply').on('click', function() {

         var bulk = $('#bulk');
         var serialize_bulk = $('#form_module').serialize();

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
                     document.location.href = ADMIN_BASE_URL + '/module/delete?' + serialize_bulk;
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

   }); /*end doc ready*/
</script>