<script type="text/javascript">
function domo(){
   $('*').bind('keydown', 'Ctrl+e', function() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function() {
      $('#btn_back').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      Pengaturan Sistem      <small><?= cclang('detail', ['Pengaturan Sistem']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/pengaturan_sistem'); ?>">Pengaturan Sistem</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Pengaturan Sistem</h3>
                     <h5 class="widget-user-desc">Detail Pengaturan Sistem</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_pengaturan_sistem" id="form_pengaturan_sistem" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Is System On </label>

                        <div class="col-sm-8">
                        <span class="detail_group-is_system_on"><?= _ent($pengaturan_sistem->is_system_on); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Ip Address Server </label>

                        <div class="col-sm-8">
                        <span class="detail_group-ip_address_server"><?= _ent($pengaturan_sistem->ip_address_server); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Protocol Ws Server </label>

                        <div class="col-sm-8">
                        <span class="detail_group-protocol_ws_server"><?= _ent($pengaturan_sistem->protocol_ws_server); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Port Ws Server </label>

                        <div class="col-sm-8">
                        <span class="detail_group-port_ws_server"><?= _ent($pengaturan_sistem->port_ws_server); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Validation Ip Address Server </label>

                        <div class="col-sm-8">
                        <span class="detail_group-validation_ip_address_server"><?= _ent($pengaturan_sistem->validation_ip_address_server); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Validation Protocol Ws Server </label>

                        <div class="col-sm-8">
                        <span class="detail_group-validation_protocol_ws_server"><?= _ent($pengaturan_sistem->validation_protocol_ws_server); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Validation Port Ws Server </label>

                        <div class="col-sm-8">
                        <span class="detail_group-validation_port_ws_server"><?= _ent($pengaturan_sistem->validation_port_ws_server); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Validation Auto Reconnect </label>

                        <div class="col-sm-8">
                        <span class="detail_group-validation_auto_reconnect"><?= _ent($pengaturan_sistem->validation_auto_reconnect); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Moving In </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_moving_in"><?= _ent($pengaturan_sistem->flag_moving_in); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Moving Out </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_moving_out"><?= _ent($pengaturan_sistem->flag_moving_out); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Timeout Duration </label>

                        <div class="col-sm-8">
                        <span class="detail_group-timeout_duration"><?= _ent($pengaturan_sistem->timeout_duration); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Is Web Play Buzzer </label>

                        <div class="col-sm-8">
                        <span class="detail_group-is_web_play_buzzer"><?= _ent($pengaturan_sistem->is_web_play_buzzer); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deras Status Default </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deras_status_default"><?= _ent($pengaturan_sistem->deras_status_default); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deras Description </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deras_description"><?= _ent($pengaturan_sistem->deras_description); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deras Category Default </label>

                        <div class="col-sm-8">
                        <span class="detail_group-deras_category_default"><?= _ent($pengaturan_sistem->deras_category_default); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Alarm Register Tag </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_alarm_register_tag"><?= _ent($pengaturan_sistem->flag_alarm_register_tag); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Status Available </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_status_available"><?= _ent($pengaturan_sistem->flag_status_available); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Status Not Available </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_status_not_available"><?= _ent($pengaturan_sistem->flag_status_not_available); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Kondisi Baik </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_kondisi_baik"><?= _ent($pengaturan_sistem->flag_kondisi_baik); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Sensus Normal </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_sensus_normal"><?= _ent($pengaturan_sistem->flag_sensus_normal); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Sensus Anomali </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_sensus_anomali"><?= _ent($pengaturan_sistem->flag_sensus_anomali); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('pengaturan_sistem_update', function() use ($pengaturan_sistem){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit pengaturan_sistem (Ctrl+e)" href="<?= admin_site_url('/pengaturan_sistem/edit/'.$pengaturan_sistem->is_system_on); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Pengaturan Sistem']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/pengaturan_sistem/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Pengaturan Sistem']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
$(document).ready(function(){

    "use strict";
    
   
   });
</script>