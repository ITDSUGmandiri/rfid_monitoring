<script type="text/javascript">
   function domo() {

      $('*').bind('keydown', 'Ctrl+a', function() {
         window.location.href = ADMIN_BASE_URL + '/Tb_pegawai_master/add';
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
      <?= cclang('tb_pegawai_master') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('tb_pegawai_master') ?></li>
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
                        <?php is_allowed('tb_pegawai_master_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tb_pegawai_master')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/tb_master_pegawai/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('tb_pegawai_master')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('tb_pegawai_master_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tb_pegawai_master') ?> " href="<?= admin_site_url('/tb_master_pegawai/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('tb_pegawai_master_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tb_pegawai_master') ?> " href="<?= admin_site_url('/tb_master_pegawai/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('tb_pegawai_master') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('tb_pegawai_master')]); ?> <i class="label bg-yellow"><span class="total-rows"><?= $tb_pegawai_master_counts; ?></span> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_tb_pegawai_master" id="form_tb_pegawai_master" action="<?= admin_base_url('/tb_pegawai_master/index'); ?>">



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
                                 <option <?= $this->input->get('f') == 'NIP' ? 'selected' : ''; ?> value="NIP">NIP</option>
                                 <option <?= $this->input->get('f') == 'Pegawai' ? 'selected' : ''; ?> value="Pegawai">Pegawai</option>
                                 <option <?= $this->input->get('f') == 'Jabatan' ? 'selected' : ''; ?> value="Jabatan">Jabatan</option>
                                 <option <?= $this->input->get('f') == 'Telp' ? 'selected' : ''; ?> value="Telp">Telp</option>
                                 <option <?= $this->input->get('f') == 'Alamat' ? 'selected' : ''; ?> value="Alamat">Alamat</option>
                                 <option <?= $this->input->get('f') == 'Email' ? 'selected' : ''; ?> value="Email">Email</option>
                              </select>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                 Filter
                              </button>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/tb_pegawai_master'); ?>" title="<?= cclang('reset_filter'); ?>">
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

                                 <th data-field="NIP" data-sort="1" data-primary-key="0"> <?= cclang('NIP') ?></th>
                                 <th data-field="Pegawai" data-sort="1" data-primary-key="0"> <?= cclang('Pegawai') ?></th>
                                 <th data-field="Jabatan" data-sort="1" data-primary-key="0"> <?= cclang('Jabatan') ?></th>
                                 <th data-field="Email" data-sort="1" data-primary-key="0"> <?= cclang('Email') ?></th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_tb_pegawai_master">
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
   var module_name = "tb_pegawai_master"
   var use_ajax_crud = false
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



            //    $(document).on('click', '#apply', function() {

            //       var bulk = $('#bulk');
            //       var serialize_bulk = $('#form_tb_pegawai_master').serialize();

            //       if (bulk.val() == 'delete') {
            //          swal({
            //                title: "<?= cclang('are_you_sure'); ?>",
            //                text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            //                type: "warning",
            //                showCancelButton: true,
            //                confirmButtonColor: "#DD6B55",
            //                confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            //                cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            //                closeOnConfirm: true,
            //                closeOnCancel: true
            //             },
            //             function(isConfirm) {
            //                if (isConfirm) {
            //                   document.location.href = ADMIN_BASE_URL + '/tb_pegawai_master/delete?' + serialize_bulk;
            //                }
            //             });

            //          return false;

            //       } else if (bulk.val() == '') {
            //          swal({
            //             title: "Upss",
            //             text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            //             type: "warning",
            //             showCancelButton: false,
            //             confirmButtonColor: "#DD6B55",
            //             confirmButtonText: "Okay!",
            //             closeOnConfirm: true,
            //             closeOnCancel: true
            //          });

            //          return false;
            //       }

            //       return false;

            //    }); /*end appliy click*/


            //    //check all
            //    var checkAll = $('#check_all');
            //    var checkboxes = $('input.check');

            //    checkAll.on('ifChecked ifUnchecked', function(event) {
            //       if (event.type == 'ifChecked') {
            //          checkboxes.iCheck('check');
            //       } else {
            //          checkboxes.iCheck('uncheck');
            //       }
            //    });

            //    checkboxes.on('ifChanged', function(event) {
            //       if (checkboxes.filter(':checked').length == checkboxes.length) {
            //          checkAll.prop('checked', 'checked');
            //       } else {
            //          checkAll.removeProp('checked');
            //       }
            //       checkAll.iCheck('update');
            //    });
            //    initSortableAjax('tb_pegawai_master', $('table.dataTable'));
            // }); /*end doc ready*/
</script>