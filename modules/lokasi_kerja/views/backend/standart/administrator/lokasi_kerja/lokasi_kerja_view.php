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
      Area      <small><?= cclang('detail', ['Area']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/lokasi_kerja'); ?>">Area</a></li>
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
                     <h3 class="widget-user-username">Area</h3>
                     <h5 class="widget-user-desc">Detail Area</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_lokasi_kerja" id="form_lokasi_kerja" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($lokasi_kerja->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode"><?= _ent($lokasi_kerja->kode); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Lokasi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_lokasi"><?= _ent($lokasi_kerja->nama_lokasi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-keterangan"><?= _ent($lokasi_kerja->keterangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Alamat Lengkap </label>

                        <div class="col-sm-8">
                        <span class="detail_group-alamat_lengkap"><?= _ent($lokasi_kerja->alamat_lengkap); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lat </label>

                        <div class="col-sm-8">
                        <span class="detail_group-lat"><?= _ent($lokasi_kerja->lat); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Long </label>

                        <div class="col-sm-8">
                        <span class="detail_group-long"><?= _ent($lokasi_kerja->long); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">User Create </label>

                        <div class="col-sm-8">
                        <span class="detail_group-user_create"><?= _ent($lokasi_kerja->user_create); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                        <span class="detail_group-create_date"><?= _ent($lokasi_kerja->create_date); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">User Change </label>

                        <div class="col-sm-8">
                        <span class="detail_group-user_change"><?= _ent($lokasi_kerja->user_change); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Change Date </label>

                        <div class="col-sm-8">
                        <span class="detail_group-change_date"><?= _ent($lokasi_kerja->change_date); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Photo </label>
                        <div class="col-sm-8">
                             <?php if (is_image($lokasi_kerja->photo)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/lokasi_kerja/' . $lokasi_kerja->photo; ?>">
                                <img src="<?= BASE_URL . 'uploads/lokasi_kerja/' . $lokasi_kerja->photo; ?>" class="image-responsive" alt="image lokasi_kerja" title="photo lokasi_kerja" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= ADMIN_BASE_URL . '/file/download/lokasi_kerja/' . $lokasi_kerja->photo; ?>">
                                 <img src="<?= get_icon_file($lokasi_kerja->photo); ?>" class="image-responsive" alt="image lokasi_kerja" title="photo <?= $lokasi_kerja->photo; ?>" width="40px"> 
                               <?= $lokasi_kerja->photo ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('lokasi_kerja_update', function() use ($lokasi_kerja){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit lokasi_kerja (Ctrl+e)" href="<?= admin_site_url('/lokasi_kerja/edit/'.$lokasi_kerja->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Lokasi Kerja']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/lokasi_kerja/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Lokasi Kerja']); ?></a>
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