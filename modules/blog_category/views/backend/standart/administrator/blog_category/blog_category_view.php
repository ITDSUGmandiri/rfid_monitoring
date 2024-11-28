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
      Blog Category      <small><?= cclang('detail', ['Blog Category']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/blog_category'); ?>">Blog Category</a></li>
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
                     <h3 class="widget-user-username">Blog Category</h3>
                     <h5 class="widget-user-desc">Detail Blog Category</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_blog_category" id="form_blog_category" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Category Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-category_id"><?= _ent($blog_category->category_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Category Name </label>

                        <div class="col-sm-8">
                        <span class="detail_group-category_name"><?= _ent($blog_category->category_name); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Category Desc </label>
                        <div class="col-sm-8">
                             <?php if (!empty($blog_category->category_desc)): ?>
                             <?php foreach (explode(',', $blog_category->category_desc) as $filename): ?>
                               <?php if (is_image($blog_category->category_desc)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog_category/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/blog_category/' . $filename; ?>" class="image-responsive" alt="image blog_category" title="category_desc blog_category" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= ADMIN_BASE_URL . '/file/download/blog_category/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image blog_category" title="category_desc <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Pilihan </label>
                        <div class="col-sm-8">
                             <?php if (!empty($blog_category->pilihan)): ?>
                             <?php foreach (explode(',', $blog_category->pilihan) as $filename): ?>
                               <?php if (is_image($blog_category->pilihan)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog_category/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/blog_category/' . $filename; ?>" class="image-responsive" alt="image blog_category" title="pilihan blog_category" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= ADMIN_BASE_URL . '/file/download/blog_category/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image blog_category" title="pilihan <?= $filename; ?>" width="40px"> 
                                 <?= $filename ?>
                               </a>
                               </label>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </div>
                    </div>
                  
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Check </label>
                        <div class="col-sm-8">
                             <?php if (!empty($blog_category->check)): ?>
                             <?php foreach (explode(',', $blog_category->check) as $filename): ?>
                               <?php if (is_image($blog_category->check)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog_category/' . $filename; ?>">
                                  <img src="<?= BASE_URL . 'uploads/blog_category/' . $filename; ?>" class="image-responsive" alt="image blog_category" title="check blog_category" width="40px">
                                </a>
                                <?php else: ?>
                                <label>
                                  <a href="<?= ADMIN_BASE_URL . '/file/download/blog_category/' . $filename; ?>">
                                   <img src="<?= get_icon_file($filename); ?>" class="image-responsive" alt="image blog_category" title="check <?= $filename; ?>" width="40px"> 
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
                        <?php is_allowed('blog_category_update', function() use ($blog_category){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit blog_category (Ctrl+e)" href="<?= admin_site_url('/blog_category/edit/'.$blog_category->category_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Blog Category']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/blog_category/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Blog Category']); ?></a>
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