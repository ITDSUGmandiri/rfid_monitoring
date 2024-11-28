<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = ADMIN_BASE_URL + '/Chat_message/add';
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
      <?= cclang('chat_message') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('chat_message') ?></li>
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
                        <?php is_allowed('chat_message_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('chat_message')]); ?>  (Ctrl+a)" href="<?=  admin_site_url('/chat_message/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('chat_message')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('chat_message_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('chat_message') ?> " href="<?= admin_site_url('/chat_message/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                                <?php is_allowed('chat_message_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('chat_message') ?> " href="<?= admin_site_url('/chat_message/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('chat_message') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('chat_message')]); ?>  <i class="label bg-yellow"><?= $chat_message_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_chat_message" id="form_chat_message" action="<?= admin_base_url('/chat_message/index'); ?>">
                  


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
                               <option <?= $this->input->get('f') == 'message_user_id' ? 'selected' :''; ?> value="message_user_id">Message User Id</option>
                            <option <?= $this->input->get('f') == 'chat_id' ? 'selected' :''; ?> value="chat_id">Chat Id</option>
                            <option <?= $this->input->get('f') == 'uid' ? 'selected' :''; ?> value="uid">Uid</option>
                            <option <?= $this->input->get('f') == 'message' ? 'selected' :''; ?> value="message">Message</option>
                            <option <?= $this->input->get('f') == 'status' ? 'selected' :''; ?> value="status">Status</option>
                            <option <?= $this->input->get('f') == 'created_at' ? 'selected' :''; ?> value="created_at">Created At</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/chat_message');?>" title="<?= cclang('reset_filter'); ?>">
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
                                                    <th data-field="message_user_id"data-sort="1" data-primary-key="0"> <?= cclang('message_user_id') ?></th>
                           <th data-field="chat_id"data-sort="1" data-primary-key="0"> <?= cclang('chat_id') ?></th>
                           <th data-field="uid"data-sort="1" data-primary-key="0"> <?= cclang('uid') ?></th>
                           <th data-field="message"data-sort="1" data-primary-key="0"> <?= cclang('message') ?></th>
                           <th data-field="status"data-sort="1" data-primary-key="0"> <?= cclang('status') ?></th>
                           <th data-field="created_at"data-sort="1" data-primary-key="0"> <?= cclang('created_at') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_chat_message">
                     <?php foreach($chat_messages as $chat_message): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $chat_message->id; ?>">
                           </td>
                                                       
                           <td><span class="list_group-message_user_id"><?= _ent($chat_message->message_user_id); ?></span></td> 
                           <td><span class="list_group-chat_id"><?= _ent($chat_message->chat_id); ?></span></td> 
                           <td><span class="list_group-uid"><?= _ent($chat_message->uid); ?></span></td> 
                           <td><span class="list_group-message"><?= _ent($chat_message->message); ?></span></td> 
                           <td><span class="list_group-status"><?= _ent($chat_message->status); ?></span></td> 
                           <td><span class="list_group-created_at"><?= _ent($chat_message->created_at); ?></span></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('chat_message_view', function() use ($chat_message){?>
                                                              <a href="<?= admin_site_url('/chat_message/view/' . $chat_message->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('chat_message_update', function() use ($chat_message){?>
                              <a href="<?= admin_site_url('/chat_message/edit/' . $chat_message->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('chat_message_delete', function() use ($chat_message){?>
                              <a href="javascript:void(0);" data-href="<?= admin_site_url('/chat_message/delete/' . $chat_message->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($chat_message_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Chat Message data is not available
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
      var serialize_bulk = $('#form_chat_message').serialize();

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
               document.location.href = ADMIN_BASE_URL + '/chat_message/delete?' + serialize_bulk;      
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
    initSortable('chat_message', $('table.dataTable'));
  }); /*end doc ready*/
</script>