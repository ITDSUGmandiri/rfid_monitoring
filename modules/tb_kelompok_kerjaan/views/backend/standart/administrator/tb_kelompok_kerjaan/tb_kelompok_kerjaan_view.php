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
      Tb Kelompok Kerjaan      <small><?= cclang('detail', ['Tb Kelompok Kerjaan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_kelompok_kerjaan'); ?>">Tb Kelompok Kerjaan</a></li>
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
                     <h3 class="widget-user-username">Tb Kelompok Kerjaan</h3>
                     <h5 class="widget-user-desc">Detail Tb Kelompok Kerjaan</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_kelompok_kerjaan" id="form_tb_kelompok_kerjaan" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_kelompok_kerjaan->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode"><?= _ent($tb_kelompok_kerjaan->kode); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jenis </label>

                        <div class="col-sm-8">
                        <span class="detail_group-jenis"><?= _ent($tb_kelompok_kerjaan->jenis); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kelompok </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kelompok"><?= _ent($tb_kelompok_kerjaan->kelompok); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_kelompok_kerjaan_update', function() use ($tb_kelompok_kerjaan){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_kelompok_kerjaan (Ctrl+e)" href="<?= admin_site_url('/tb_kelompok_kerjaan/edit/'.$tb_kelompok_kerjaan->); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Kelompok Kerjaan']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_kelompok_kerjaan/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Kelompok Kerjaan']); ?></a>
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