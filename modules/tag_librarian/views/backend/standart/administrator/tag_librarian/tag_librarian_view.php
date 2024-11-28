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
      Librarian      <small><?= cclang('detail', ['Librarian']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_librarian'); ?>">Librarian</a></li>
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
                     <h3 class="widget-user-username">Librarian</h3>
                     <h5 class="widget-user-desc">Detail Librarian</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_librarian" id="form_tag_librarian" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Librarian Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-librarian_id"><?= _ent($tag_librarian->librarian_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Librarian Name </label>

                        <div class="col-sm-8">
                        <span class="detail_group-librarian_name"><?= _ent($tag_librarian->librarian_name); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Librarian Gate </label>

                        <div class="col-sm-8">
                        <span class="detail_group-librarian_gate"><?= _ent($tag_librarian->librarian_gate); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Area </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_librarian->lokasi_kerja_nama_lokasi); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_librarian_update', function() use ($tag_librarian){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_librarian (Ctrl+e)" href="<?= admin_site_url('/tag_librarian/edit/'.$tag_librarian->librarian_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Librarian']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_librarian/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Librarian']); ?></a>
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