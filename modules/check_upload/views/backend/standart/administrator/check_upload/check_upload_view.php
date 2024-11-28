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
      Check Upload      <small><?= cclang('detail', ['Check Upload']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/check_upload'); ?>">Check Upload</a></li>
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
                     <h3 class="widget-user-username">Check Upload</h3>
                     <h5 class="widget-user-desc">Detail Check Upload</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_check_upload" id="form_check_upload" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($check_upload->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> File1 </label>
                        <div class="col-sm-8">
                             <?php if (!empty($check_upload->file1)): ?>
                             <?php foreach (explode(',', $check_upload->file1) as $filename): ?>
                               <?php if (is_image($check_upload->file1)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/check_upload/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/check_upload/' . $filename; ?>" class="image-responsive" alt="image check_upload" title="file1 check_upload" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= ADMIN_BASE_URL . '/file/download/check_upload/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image check_upload" title="file1 <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> File2 </label>
                        <div class="col-sm-8">
                             <?php if (!empty($check_upload->file2)): ?>
                             <?php foreach (explode(',', $check_upload->file2) as $filename): ?>
                               <?php if (is_image($check_upload->file2)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/check_upload/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/check_upload/' . $filename; ?>" class="image-responsive" alt="image check_upload" title="file2 check_upload" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= ADMIN_BASE_URL . '/file/download/check_upload/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image check_upload" title="file2 <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> File3 </label>
                        <div class="col-sm-8">
                             <?php if (!empty($check_upload->file3)): ?>
                             <?php foreach (explode(',', $check_upload->file3) as $filename): ?>
                               <?php if (is_image($check_upload->file3)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/check_upload/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/check_upload/' . $filename; ?>" class="image-responsive" alt="image check_upload" title="file3 check_upload" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= ADMIN_BASE_URL . '/file/download/check_upload/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image check_upload" title="file3 <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('check_upload_update', function() use ($check_upload){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit check_upload (Ctrl+e)" href="<?= admin_site_url('/check_upload/edit/'.$check_upload->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Check Upload']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/check_upload/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Check Upload']); ?></a>
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