<script type="text/javascript">
   function domo() {

      $('*').bind('keydown', 'Ctrl+a', function() {
         window.location.href = ADMIN_BASE_URL + '/Log/add';
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
<section class="content-header">
   <h1>
      <?= cclang('log') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('log') ?></li>
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
                        <?php is_allowed('log_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('log')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/log/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('log')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('log_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('log') ?> " href="<?= admin_site_url('/log/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('log_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('log') ?> " href="<?= admin_site_url('/log/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('log') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('log')]); ?> <i class="label bg-yellow"><?= $log_counts; ?> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_log" id="form_log" action="<?= admin_base_url('/log/index'); ?>">



                     <!-- /.widget-user -->
                     <div class="row">
                        <div class="col-md-8">
                           <div class="col-sm-2 padd-left-0 ">
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
                                 <option <?= $this->input->get('f') == 'title' ? 'selected' : ''; ?> value="title">Title</option>
                                 <option <?= $this->input->get('f') == 'message' ? 'selected' : ''; ?> value="message">Message</option>
                                 <option <?= $this->input->get('f') == 'type' ? 'selected' : ''; ?> value="type">Type</option>
                                 <option <?= $this->input->get('f') == 'data' ? 'selected' : ''; ?> value="data">Data</option>
                                 <option <?= $this->input->get('f') == 'created_at' ? 'selected' : ''; ?> value="created_at">Created At</option>
                              </select>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                 Filter
                              </button>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/log'); ?>" title="<?= cclang('reset_filter'); ?>">
                                 <i class="fa fa-undo"></i>
                              </a>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                              <?= $pagination; ?>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive">

                        <br>
                        <table class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr class="">
                                 <th>
                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                 </th>
                                 <th data-field="title" data-sort="0" data-primary-key="0"> <?= cclang('title') ?></th>
                                 <th data-field="message" data-sort="1" data-primary-key="0"> <?= cclang('message') ?></th>
                                 <th data-field="type" data-sort="1" data-primary-key="0"> <?= cclang('type') ?></th>
                                 <th data-field="data" data-sort="1" data-primary-key="0"> <?= cclang('data') ?></th>
                                 <th data-field="created_at" data-sort="1" data-primary-key="0"> <?= cclang('created_at') ?></th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_log">
                              <?php foreach ($logs as $log) : ?>
                                 <tr>
                                    <td width="5">
                                       <input type="checkbox" class="flat-red check" name="id[]" value="<?= $log->id; ?>">
                                    </td>

                                    <td>
                                       <?php if (!empty($log->title)) : ?>
                                          <?php if (is_image($log->title)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/log/' . $log->title; ?>">
                                                <img src="<?= BASE_URL . 'uploads/log/' . $log->title; ?>" class="image-responsive" alt="image log" title="title log" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/log/' . $log->title; ?>" target="blank">
                                                <img src="<?= get_icon_file($log->title); ?>" class="image-responsive image-icon" alt="image log" title="title <?= $log->title; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td><span class="list_group-message"><?= _ent($log->message); ?></span></td>
                                    <td><span class="list_group-type"><?= _ent($log->type); ?></span></td>
                                    <td><span class="list_group-data"><?= _ent($log->data); ?></span></td>
                                    <td><span class="list_group-created_at"><?= _ent($log->created_at); ?></span></td>
                                    <td width="200">

                                       <?php is_allowed('log_view', function () use ($log) { ?>
                                          <a href="<?= admin_site_url('/log/view/' . $log->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                          <?php }) ?>
                                          <?php is_allowed('log_update', function () use ($log) { ?>
                                             <a href="<?= admin_site_url('/log/edit/' . $log->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                                          <?php }) ?>
                                          <?php is_allowed('log_delete', function () use ($log) { ?>
                                             <a href="javascript:void(0);" data-href="<?= admin_site_url('/log/delete/' . $log->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                          <?php }) ?>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                              <?php if ($log_counts == 0) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Log data is not available
                                    </td>
                                 </tr>
                              <?php endif; ?>

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
   $(document).ready(function() {

      "use strict";



      $('.remove-data').click(function() {

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


      $('#apply').click(function() {

         var bulk = $('#bulk');
         var serialize_bulk = $('#form_log').serialize();

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
                     document.location.href = ADMIN_BASE_URL + '/log/delete?' + serialize_bulk;
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
      initSortable('log', $('table.dataTable'));
   }); /*end doc ready*/
</script>