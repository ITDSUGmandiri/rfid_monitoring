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
      Crud Field Condition      <small><?= cclang('detail', ['Crud Field Condition']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/crud_field_condition'); ?>">Crud Field Condition</a></li>
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
                     <h3 class="widget-user-username">Crud Field Condition</h3>
                     <h5 class="widget-user-desc">Detail Crud Field Condition</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_crud_field_condition" id="form_crud_field_condition" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($crud_field_condition->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Crud Field Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-crud_field_id"><?= _ent($crud_field_condition->crud_field_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Reff </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reff"><?= _ent($crud_field_condition->reff); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Crud Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-crud_id"><?= _ent($crud_field_condition->crud_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Cond Field </label>

                        <div class="col-sm-8">
                        <span class="detail_group-cond_field"><?= _ent($crud_field_condition->cond_field); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Cond Operator </label>

                        <div class="col-sm-8">
                        <span class="detail_group-cond_operator"><?= _ent($crud_field_condition->cond_operator); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Cond Value </label>

                        <div class="col-sm-8">
                        <span class="detail_group-cond_value"><?= _ent($crud_field_condition->cond_value); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('crud_field_condition_update', function() use ($crud_field_condition){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit crud_field_condition (Ctrl+e)" href="<?= admin_site_url('/crud_field_condition/edit/'.$crud_field_condition->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Crud Field Condition']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/crud_field_condition/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Crud Field Condition']); ?></a>
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