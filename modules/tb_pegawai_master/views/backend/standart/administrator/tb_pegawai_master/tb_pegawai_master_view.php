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
      Tb Pegawai Master      <small><?= cclang('detail', ['Tb Pegawai Master']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_pegawai_master'); ?>">Tb Pegawai Master</a></li>
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
                     <h3 class="widget-user-username">Tb Pegawai Master</h3>
                     <h5 class="widget-user-desc">Detail Tb Pegawai Master</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_pegawai_master" id="form_tb_pegawai_master" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_pegawai_master->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">NIP </label>

                        <div class="col-sm-8">
                        <span class="detail_group-NIP"><?= _ent($tb_pegawai_master->NIP); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Pegawai </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Pegawai"><?= _ent($tb_pegawai_master->Pegawai); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jabatan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Jabatan"><?= _ent($tb_pegawai_master->Jabatan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Telp </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Telp"><?= _ent($tb_pegawai_master->Telp); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Alamat </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Alamat"><?= _ent($tb_pegawai_master->Alamat); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Email </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Email"><?= _ent($tb_pegawai_master->Email); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_pegawai_master_update', function() use ($tb_pegawai_master){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_pegawai_master (Ctrl+e)" href="<?= admin_site_url('/tb_pegawai_master/edit/'.$tb_pegawai_master->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Pegawai Master']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_pegawai_master/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Pegawai Master']); ?></a>
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