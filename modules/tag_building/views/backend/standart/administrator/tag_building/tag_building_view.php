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
      Building      <small><?= cclang('detail', ['Building']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_building'); ?>">Building</a></li>
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
                     <h3 class="widget-user-username">Building</h3>
                     <h5 class="widget-user-desc">Detail Building</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_building" id="form_tag_building" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Building Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-building_id"><?= _ent($tag_building->building_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Building Name </label>

                        <div class="col-sm-8">
                        <span class="detail_group-building_name"><?= _ent($tag_building->building_name); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_building_update', function() use ($tag_building){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_building (Ctrl+e)" href="<?= admin_site_url('/tag_building/edit/'.$tag_building->building_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Building']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_building/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Building']); ?></a>
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