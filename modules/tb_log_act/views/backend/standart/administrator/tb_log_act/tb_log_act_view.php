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
      Tb Log Act      <small><?= cclang('detail', ['Tb Log Act']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_log_act'); ?>">Tb Log Act</a></li>
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
                     <h3 class="widget-user-username">Tb Log Act</h3>
                     <h5 class="widget-user-desc">Detail Tb Log Act</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_log_act" id="form_tb_log_act" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_log_act->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Log Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-log_id"><?= _ent($tb_log_act->log_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Act Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-act_id"><?= _ent($tb_log_act->act_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-keterangan"><?= _ent($tb_log_act->keterangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">User </label>

                        <div class="col-sm-8">
                        <span class="detail_group-user"><?= _ent($tb_log_act->user); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Date </label>

                        <div class="col-sm-8">
                        <span class="detail_group-date"><?= _ent($tb_log_act->date); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Time </label>

                        <div class="col-sm-8">
                        <span class="detail_group-time"><?= _ent($tb_log_act->time); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_log_act_update', function() use ($tb_log_act){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_log_act (Ctrl+e)" href="<?= admin_site_url('/tb_log_act/edit/'.$tb_log_act->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Log Act']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_log_act/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Log Act']); ?></a>
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