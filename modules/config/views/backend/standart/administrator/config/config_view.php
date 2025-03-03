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
      Config      <small><?= cclang('detail', ['Config']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/config'); ?>">Config</a></li>
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
                     <h3 class="widget-user-username">Config</h3>
                     <h5 class="widget-user-desc">Detail Config</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_config" id="form_config" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Config </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_config"><?= _ent($config->id_config); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode"><?= _ent($config->kode); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Config Name </label>

                        <div class="col-sm-8">
                        <span class="detail_group-config_name"><?= _ent($config->config_name); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Variable </label>

                        <div class="col-sm-8">
                        <span class="detail_group-variable"><?= _ent($config->variable); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Value </label>

                        <div class="col-sm-8">
                        <span class="detail_group-value"><?= _ent($config->value); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Is Active </label>

                        <div class="col-sm-8">
                        <span class="detail_group-is_active"><?= _ent($config->is_active); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Owner </label>

                        <div class="col-sm-8">
                        <span class="detail_group-owner"><?= _ent($config->owner); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-keterangan"><?= _ent($config->keterangan); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('config_update', function() use ($config){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit config (Ctrl+e)" href="<?= admin_site_url('/config/edit/'.$config->id_config); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Config']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/config/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Config']); ?></a>
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