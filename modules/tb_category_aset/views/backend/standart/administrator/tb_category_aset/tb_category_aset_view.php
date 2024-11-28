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
      Jenis Kategori Aset      <small><?= cclang('detail', ['Jenis Kategori Aset']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_category_aset'); ?>">Jenis Kategori Aset</a></li>
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
                     <h3 class="widget-user-username">Jenis Kategori Aset</h3>
                     <h5 class="widget-user-desc">Detail Jenis Kategori Aset</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_category_aset" id="form_tb_category_aset" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_category_aset->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Kategori </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_kategori"><?= _ent($tb_category_aset->kode_kategori); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama"><?= _ent($tb_category_aset->nama); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_category_aset_update', function() use ($tb_category_aset){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_category_aset (Ctrl+e)" href="<?= admin_site_url('/tb_category_aset/edit/'.$tb_category_aset->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Category Aset']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_category_aset/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Category Aset']); ?></a>
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