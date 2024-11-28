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
      Label      <small><?= cclang('detail', ['Label']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_label'); ?>">Label</a></li>
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
                     <h3 class="widget-user-username">Label</h3>
                     <h5 class="widget-user-desc">Detail Label</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_label" id="form_tag_label" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Label Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-label_id"><?= _ent($tag_label->label_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Supplier </label>

                        <div class="col-sm-8">
                        <span class="detail_group-label_supplier"><?= _ent($tag_label->label_supplier); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Name </label>

                        <div class="col-sm-8">
                        <span class="detail_group-label_name"><?= _ent($tag_label->label_name); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Description </label>

                        <div class="col-sm-8">
                        <span class="detail_group-label_description"><?= _ent($tag_label->label_description); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Image </label>
                        <div class="col-sm-8">
                             <?php if (is_image($tag_label->label_image)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/tag_label/' . $tag_label->label_image; ?>">
                                <img src="<?= BASE_URL . 'uploads/tag_label/' . $tag_label->label_image; ?>" class="image-responsive" alt="image tag_label" title="label_image tag_label" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= ADMIN_BASE_URL . '/file/download/tag_label/' . $tag_label->label_image; ?>">
                                 <img src="<?= get_icon_file($tag_label->label_image); ?>" class="image-responsive" alt="image tag_label" title="label_image <?= $tag_label->label_image; ?>" width="40px"> 
                               <?= $tag_label->label_image ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dimension </label>

                        <div class="col-sm-8">
                        <span class="detail_group-label_dimension"><?= _ent($tag_label->label_dimension); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Referensi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-referensi"><?= _ent($tag_label->referensi); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_label_update', function() use ($tag_label){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_label (Ctrl+e)" href="<?= admin_site_url('/tag_label/edit/'.$tag_label->label_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Label']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_label/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Label']); ?></a>
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