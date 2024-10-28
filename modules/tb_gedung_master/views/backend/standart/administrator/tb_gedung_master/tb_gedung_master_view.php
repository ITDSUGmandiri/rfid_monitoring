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
      Tb Gedung Master      <small><?= cclang('detail', ['Tb Gedung Master']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_gedung_master'); ?>">Tb Gedung Master</a></li>
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
                     <h3 class="widget-user-username">Tb Gedung Master</h3>
                     <h5 class="widget-user-desc">Detail Tb Gedung Master</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_gedung_master" id="form_tb_gedung_master" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_gedung_master->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Area Id </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_gedung_master->tb_area_master_kota); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Gedung </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_gedung"><?= _ent($tb_gedung_master->id_gedung); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Gedung </label>

                        <div class="col-sm-8">
                        <span class="detail_group-gedung"><?= _ent($tb_gedung_master->gedung); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_gedung_master_update', function() use ($tb_gedung_master){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_gedung_master (Ctrl+e)" href="<?= admin_site_url('/tb_gedung_master/edit/'.$tb_gedung_master->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Gedung Master']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_gedung_master/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Gedung Master']); ?></a>
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