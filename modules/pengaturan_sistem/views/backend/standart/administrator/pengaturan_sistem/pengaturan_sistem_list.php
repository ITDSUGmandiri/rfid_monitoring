<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = ADMIN_BASE_URL + '/Pengaturan_sistem/add';
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
      <?= cclang('pengaturan_sistem') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('pengaturan_sistem') ?></li>
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
                        <?php is_allowed('pengaturan_sistem_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('pengaturan_sistem')]); ?>  (Ctrl+a)" href="<?=  admin_site_url('/pengaturan_sistem/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('pengaturan_sistem')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('pengaturan_sistem_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('pengaturan_sistem') ?> " href="<?= admin_site_url('/pengaturan_sistem/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                                <?php is_allowed('pengaturan_sistem_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('pengaturan_sistem') ?> " href="<?= admin_site_url('/pengaturan_sistem/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('pengaturan_sistem') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('pengaturan_sistem')]); ?>  <i class="label bg-yellow"><span class="total-rows"><?= $pengaturan_sistem_counts; ?></span>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_pengaturan_sistem" id="form_pengaturan_sistem" action="<?= admin_base_url('/pengaturan_sistem/index'); ?>">
                  


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
                               <option <?= $this->input->get('f') == 'ip_address_server' ? 'selected' :''; ?> value="ip_address_server">Ip Address Server</option>
                            <option <?= $this->input->get('f') == 'protocol_ws_server' ? 'selected' :''; ?> value="protocol_ws_server">Protocol Ws Server</option>
                            <option <?= $this->input->get('f') == 'port_ws_server' ? 'selected' :''; ?> value="port_ws_server">Port Ws Server</option>
                            <option <?= $this->input->get('f') == 'validation_ip_address_server' ? 'selected' :''; ?> value="validation_ip_address_server">Validation Ip Address Server</option>
                            <option <?= $this->input->get('f') == 'validation_protocol_ws_server' ? 'selected' :''; ?> value="validation_protocol_ws_server">Validation Protocol Ws Server</option>
                            <option <?= $this->input->get('f') == 'validation_port_ws_server' ? 'selected' :''; ?> value="validation_port_ws_server">Validation Port Ws Server</option>
                            <option <?= $this->input->get('f') == 'validation_auto_reconnect' ? 'selected' :''; ?> value="validation_auto_reconnect">Validation Auto Reconnect</option>
                            <option <?= $this->input->get('f') == 'flag_moving_in' ? 'selected' :''; ?> value="flag_moving_in">Flag Moving In</option>
                            <option <?= $this->input->get('f') == 'flag_moving_out' ? 'selected' :''; ?> value="flag_moving_out">Flag Moving Out</option>
                            <option <?= $this->input->get('f') == 'timeout_duration' ? 'selected' :''; ?> value="timeout_duration">Timeout Duration</option>
                            <option <?= $this->input->get('f') == 'is_web_play_buzzer' ? 'selected' :''; ?> value="is_web_play_buzzer">Is Web Play Buzzer</option>
                            <option <?= $this->input->get('f') == 'deras_status_default' ? 'selected' :''; ?> value="deras_status_default">Deras Status Default</option>
                            <option <?= $this->input->get('f') == 'deras_description' ? 'selected' :''; ?> value="deras_description">Deras Description</option>
                            <option <?= $this->input->get('f') == 'deras_category_default' ? 'selected' :''; ?> value="deras_category_default">Deras Category Default</option>
                            <option <?= $this->input->get('f') == 'flag_alarm_register_tag' ? 'selected' :''; ?> value="flag_alarm_register_tag">Flag Alarm Register Tag</option>
                            <option <?= $this->input->get('f') == 'flag_status_available' ? 'selected' :''; ?> value="flag_status_available">Flag Status Available</option>
                            <option <?= $this->input->get('f') == 'flag_status_not_available' ? 'selected' :''; ?> value="flag_status_not_available">Flag Status Not Available</option>
                            <option <?= $this->input->get('f') == 'flag_kondisi_baik' ? 'selected' :''; ?> value="flag_kondisi_baik">Flag Kondisi Baik</option>
                            <option <?= $this->input->get('f') == 'flag_sensus_normal' ? 'selected' :''; ?> value="flag_sensus_normal">Flag Sensus Normal</option>
                            <option <?= $this->input->get('f') == 'flag_sensus_anomali' ? 'selected' :''; ?> value="flag_sensus_anomali">Flag Sensus Anomali</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/pengaturan_sistem');?>" title="<?= cclang('reset_filter'); ?>">
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
                                                    <th data-field="ip_address_server"data-sort="1" data-primary-key="0"> <?= cclang('ip_address_server') ?></th>
                           <th data-field="protocol_ws_server"data-sort="1" data-primary-key="0"> <?= cclang('protocol_ws_server') ?></th>
                           <th data-field="port_ws_server"data-sort="1" data-primary-key="0"> <?= cclang('port_ws_server') ?></th>
                           <th data-field="validation_ip_address_server"data-sort="1" data-primary-key="0"> <?= cclang('validation_ip_address_server') ?></th>
                           <th data-field="validation_protocol_ws_server"data-sort="1" data-primary-key="0"> <?= cclang('validation_protocol_ws_server') ?></th>
                           <th data-field="validation_port_ws_server"data-sort="1" data-primary-key="0"> <?= cclang('validation_port_ws_server') ?></th>
                           <th data-field="validation_auto_reconnect"data-sort="1" data-primary-key="0"> <?= cclang('validation_auto_reconnect') ?></th>
                           <th data-field="flag_moving_in"data-sort="1" data-primary-key="0"> <?= cclang('flag_moving_in') ?></th>
                           <th data-field="flag_moving_out"data-sort="1" data-primary-key="0"> <?= cclang('flag_moving_out') ?></th>
                           <th data-field="timeout_duration"data-sort="1" data-primary-key="0"> <?= cclang('timeout_duration') ?></th>
                           <th data-field="is_web_play_buzzer"data-sort="1" data-primary-key="0"> <?= cclang('is_web_play_buzzer') ?></th>
                           <th data-field="deras_status_default"data-sort="1" data-primary-key="0"> <?= cclang('deras_status_default') ?></th>
                           <th data-field="deras_description"data-sort="1" data-primary-key="0"> <?= cclang('deras_description') ?></th>
                           <th data-field="deras_category_default"data-sort="1" data-primary-key="0"> <?= cclang('deras_category_default') ?></th>
                           <th data-field="flag_alarm_register_tag"data-sort="1" data-primary-key="0"> <?= cclang('flag_alarm_register_tag') ?></th>
                           <th data-field="flag_status_available"data-sort="1" data-primary-key="0"> <?= cclang('flag_status_available') ?></th>
                           <th data-field="flag_status_not_available"data-sort="1" data-primary-key="0"> <?= cclang('flag_status_not_available') ?></th>
                           <th data-field="flag_kondisi_baik"data-sort="1" data-primary-key="0"> <?= cclang('flag_kondisi_baik') ?></th>
                           <th data-field="flag_sensus_normal"data-sort="1" data-primary-key="0"> <?= cclang('flag_sensus_normal') ?></th>
                           <th data-field="flag_sensus_anomali"data-sort="1" data-primary-key="0"> <?= cclang('flag_sensus_anomali') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_pengaturan_sistem">
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
  var module_name = "pengaturan_sistem"
  var use_ajax_crud = true  
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
      var serialize_bulk = $('#form_pengaturan_sistem').serialize();

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
               document.location.href = ADMIN_BASE_URL + '/pengaturan_sistem/delete?' + serialize_bulk;      
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
    initSortableAjax('pengaturan_sistem', $('table.dataTable'));
  }); /*end doc ready*/
</script>