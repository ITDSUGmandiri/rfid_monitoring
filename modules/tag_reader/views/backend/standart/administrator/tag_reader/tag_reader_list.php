<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = ADMIN_BASE_URL + '/Tag_reader/add';
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
      <?= cclang('tag_reader') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('tag_reader') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('tag_reader_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tag_reader')]); ?>  (Ctrl+a)" href="<?=  admin_site_url('/tag_reader/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('tag_reader')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('tag_reader_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tag_reader') ?> " href="<?= admin_site_url('/tag_reader/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                                <?php is_allowed('tag_reader_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tag_reader') ?> " href="<?= admin_site_url('/tag_reader/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('tag_reader') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('tag_reader')]); ?>  <i class="label bg-yellow"><span class="total-rows"><?= $tag_reader_counts; ?></span>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_tag_reader" id="form_tag_reader" action="<?= admin_base_url('/tag_reader/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
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
                               <option <?= $this->input->get('f') == 'librarian_id' ? 'selected' :''; ?> value="librarian_id">Librarian</option>
                            <option <?= $this->input->get('f') == 'reader_name' ? 'selected' :''; ?> value="reader_name">Name</option>
                            <option <?= $this->input->get('f') == 'reader_serialnumber' ? 'selected' :''; ?> value="reader_serialnumber">SN</option>
                            <option <?= $this->input->get('f') == 'reader_type' ? 'selected' :''; ?> value="reader_type">Type</option>
                            <option <?= $this->input->get('f') == 'reader_ip' ? 'selected' :''; ?> value="reader_ip">IP</option>
                            <option <?= $this->input->get('f') == 'reader_port' ? 'selected' :''; ?> value="reader_port">Port</option>
                            <option <?= $this->input->get('f') == 'reader_com' ? 'selected' :''; ?> value="reader_com">Com Port</option>
                            <option <?= $this->input->get('f') == 'reader_baudrate' ? 'selected' :''; ?> value="reader_baudrate">Baud Rate</option>
                            <option <?= $this->input->get('f') == 'reader_power' ? 'selected' :''; ?> value="reader_power">Power</option>
                            <option <?= $this->input->get('f') == 'reader_interval' ? 'selected' :''; ?> value="reader_interval">Interval</option>
                            <option <?= $this->input->get('f') == 'reader_mode' ? 'selected' :''; ?> value="reader_mode">Mode</option>
                            <option <?= $this->input->get('f') == 'reader_family' ? 'selected' :''; ?> value="reader_family">Reader Family</option>
                            <option <?= $this->input->get('f') == 'reader_model' ? 'selected' :''; ?> value="reader_model">Reader Model</option>
                            <option <?= $this->input->get('f') == 'reader_identity' ? 'selected' :''; ?> value="reader_identity">Reader Identity</option>
                            <option <?= $this->input->get('f') == 'reader_antena' ? 'selected' :''; ?> value="reader_antena">Reader Antena</option>
                            <option <?= $this->input->get('f') == 'reader_angle' ? 'selected' :''; ?> value="reader_angle">Reader Angle</option>
                            <option <?= $this->input->get('f') == 'reader_gate' ? 'selected' :''; ?> value="reader_gate">Reader Gate</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/tag_reader');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                           <div class="table-pagination"><?= $pagination; ?></div>
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
                                                    <th data-field="librarian_id"data-sort="1" data-primary-key="0"> <?= cclang('librarian_id') ?></th>
                           <th data-field="reader_name"data-sort="1" data-primary-key="0"> <?= cclang('reader_name') ?></th>
                           <th data-field="reader_serialnumber"data-sort="1" data-primary-key="0"> <?= cclang('reader_serialnumber') ?></th>
                           <th data-field="reader_type"data-sort="1" data-primary-key="0"> <?= cclang('reader_type') ?></th>
                           <th data-field="reader_ip"data-sort="1" data-primary-key="0"> <?= cclang('reader_ip') ?></th>
                           <th data-field="reader_port"data-sort="1" data-primary-key="0"> <?= cclang('reader_port') ?></th>
                           <th data-field="reader_com"data-sort="1" data-primary-key="0"> <?= cclang('reader_com') ?></th>
                           <th data-field="reader_baudrate"data-sort="1" data-primary-key="0"> <?= cclang('reader_baudrate') ?></th>
                           <th data-field="reader_power"data-sort="1" data-primary-key="0"> <?= cclang('reader_power') ?></th>
                           <th data-field="reader_interval"data-sort="1" data-primary-key="0"> <?= cclang('reader_interval') ?></th>
                           <th data-field="reader_mode"data-sort="1" data-primary-key="0"> <?= cclang('reader_mode') ?></th>
                           <th data-field="reader_family"data-sort="1" data-primary-key="0"> <?= cclang('reader_family') ?></th>
                           <th data-field="reader_model"data-sort="1" data-primary-key="0"> <?= cclang('reader_model') ?></th>
                           <th data-field="reader_identity"data-sort="1" data-primary-key="0"> <?= cclang('reader_identity') ?></th>
                           <th data-field="reader_antena"data-sort="1" data-primary-key="0"> <?= cclang('reader_antena') ?></th>
                           <th data-field="reader_angle"data-sort="1" data-primary-key="0"> <?= cclang('reader_angle') ?></th>
                           <th data-field="reader_gate"data-sort="1" data-primary-key="0"> <?= cclang('reader_gate') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_tag_reader">
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
  var module_name = "tag_reader"
  var use_ajax_crud = false  
</script>
<script src="<?= BASE_ASSET ?>js/filter.js"></script>


<script>
  $(document).ready(function(){

    "use strict";
   
    
      
      if (use_ajax_crud ==false) {

         $(document).on('click', 'a.remove-data', function(){
   
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
           function(isConfirm){
             if (isConfirm) {
               document.location.href = url;            
             }
           });
   
         return false;
       });
      }



    $(document).on('click', '#apply', function(){

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
          function(isConfirm){
            if (isConfirm) {
               document.location.href = ADMIN_BASE_URL + '/tag_reader/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
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

    });/*end appliy click*/


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

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortableAjax('tag_reader', $('table.dataTable'));
  }); /*end doc ready*/
</script>