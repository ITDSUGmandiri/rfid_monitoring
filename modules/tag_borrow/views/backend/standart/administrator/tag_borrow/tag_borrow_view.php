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
      Borrow      <small><?= cclang('detail', ['Borrow']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_borrow'); ?>">Borrow</a></li>
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
                     <h3 class="widget-user-username">Borrow</h3>
                     <h5 class="widget-user-desc">Detail Borrow</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_borrow" id="form_tag_borrow" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Borrow Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-borrow_id"><?= _ent($tag_borrow->borrow_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RFID </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_borrow->tag_rfid_rfid_rfid); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Librarian </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_borrow->tag_librarian_librarian_name); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keperluan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-borrow_keperluan"><?= _ent($tag_borrow->borrow_keperluan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Peminjam </label>

                        <div class="col-sm-8">
                        <span class="detail_group-borrow_peminjam"><?= _ent($tag_borrow->borrow_peminjam); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Peminjaman </label>

                        <div class="col-sm-8">
                        <span class="detail_group-borrow_peminjaman"><?= _ent($tag_borrow->borrow_peminjaman); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Pengembalian </label>

                        <div class="col-sm-8">
                        <span class="detail_group-borrow_pengembalian"><?= _ent($tag_borrow->borrow_pengembalian); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-borrow_status"><?= _ent($tag_borrow->borrow_status); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_borrow_update', function() use ($tag_borrow){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_borrow (Ctrl+e)" href="<?= admin_site_url('/tag_borrow/edit/'.$tag_borrow->borrow_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Borrow']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_borrow/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Borrow']); ?></a>
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