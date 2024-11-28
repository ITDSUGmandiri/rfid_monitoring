<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = ADMIN_BASE_URL + '/Crud_field_condition/add';
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
      <?= cclang('crud_field_condition') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('crud_field_condition') ?></li>
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
                        <?php is_allowed('crud_field_condition_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('crud_field_condition')]); ?>  (Ctrl+a)" href="<?=  admin_site_url('/crud_field_condition/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('crud_field_condition')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('crud_field_condition_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('crud_field_condition') ?> " href="<?= admin_site_url('/crud_field_condition/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                                <?php is_allowed('crud_field_condition_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('crud_field_condition') ?> " href="<?= admin_site_url('/crud_field_condition/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('crud_field_condition') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('crud_field_condition')]); ?>  <i class="label bg-yellow"><?= $crud_field_condition_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_crud_field_condition" id="form_crud_field_condition" action="<?= admin_base_url('/crud_field_condition/index'); ?>">
                  


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
                               <option <?= $this->input->get('f') == 'crud_field_id' ? 'selected' :''; ?> value="crud_field_id">Crud Field Id</option>
                            <option <?= $this->input->get('f') == 'reff' ? 'selected' :''; ?> value="reff">Reff</option>
                            <option <?= $this->input->get('f') == 'crud_id' ? 'selected' :''; ?> value="crud_id">Crud Id</option>
                            <option <?= $this->input->get('f') == 'cond_field' ? 'selected' :''; ?> value="cond_field">Cond Field</option>
                            <option <?= $this->input->get('f') == 'cond_operator' ? 'selected' :''; ?> value="cond_operator">Cond Operator</option>
                            <option <?= $this->input->get('f') == 'cond_value' ? 'selected' :''; ?> value="cond_value">Cond Value</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/crud_field_condition');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
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
                                                    <th data-field="crud_field_id"data-sort="1" data-primary-key="0"> <?= cclang('crud_field_id') ?></th>
                           <th data-field="reff"data-sort="1" data-primary-key="0"> <?= cclang('reff') ?></th>
                           <th data-field="crud_id"data-sort="1" data-primary-key="0"> <?= cclang('crud_id') ?></th>
                           <th data-field="cond_field"data-sort="1" data-primary-key="0"> <?= cclang('cond_field') ?></th>
                           <th data-field="cond_operator"data-sort="1" data-primary-key="0"> <?= cclang('cond_operator') ?></th>
                           <th data-field="cond_value"data-sort="1" data-primary-key="0"> <?= cclang('cond_value') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_crud_field_condition">
                     <?php foreach($crud_field_conditions as $crud_field_condition): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $crud_field_condition->id; ?>">
                           </td>
                                                       
                           <td><span class="list_group-crud_field_id"><?= _ent($crud_field_condition->crud_field_id); ?></span></td> 
                           <td><span class="list_group-reff"><?= _ent($crud_field_condition->reff); ?></span></td> 
                           <td><span class="list_group-crud_id"><?= _ent($crud_field_condition->crud_id); ?></span></td> 
                           <td><span class="list_group-cond_field"><?= _ent($crud_field_condition->cond_field); ?></span></td> 
                           <td><span class="list_group-cond_operator"><?= _ent($crud_field_condition->cond_operator); ?></span></td> 
                           <td><span class="list_group-cond_value"><?= _ent($crud_field_condition->cond_value); ?></span></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('crud_field_condition_view', function() use ($crud_field_condition){?>
                                                              <a href="<?= admin_site_url('/crud_field_condition/view/' . $crud_field_condition->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('crud_field_condition_update', function() use ($crud_field_condition){?>
                              <a href="<?= admin_site_url('/crud_field_condition/edit/' . $crud_field_condition->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('crud_field_condition_delete', function() use ($crud_field_condition){?>
                              <a href="javascript:void(0);" data-href="<?= admin_site_url('/crud_field_condition/delete/' . $crud_field_condition->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($crud_field_condition_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Crud Field Condition data is not available
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
  $(document).ready(function(){

    "use strict";
   
    
      
    $('.remove-data').click(function(){

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


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_crud_field_condition').serialize();

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
               document.location.href = ADMIN_BASE_URL + '/crud_field_condition/delete?' + serialize_bulk;      
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
    initSortable('crud_field_condition', $('table.dataTable'));
  }); /*end doc ready*/
</script>