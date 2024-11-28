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
      Bmn      <small><?= cclang('detail', ['Bmn']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/bmn'); ?>">Bmn</a></li>
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
                     <h3 class="widget-user-username">Bmn</h3>
                     <h5 class="widget-user-desc">Detail Bmn</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_bmn" id="form_bmn" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Bmn </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_bmn"><?= _ent($bmn->id_bmn); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Bagian </label>

                        <div class="col-sm-8">
                        <span class="detail_group-bagian"><?= _ent($bmn->bagian); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Barang </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_barang"><?= _ent($bmn->kode_barang); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Barang </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_barang"><?= _ent($bmn->nama_barang); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nup </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nup"><?= _ent($bmn->nup); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Merk </label>

                        <div class="col-sm-8">
                        <span class="detail_group-merk"><?= _ent($bmn->merk); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Perolehan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_perolehan"><?= _ent($bmn->tanggal_perolehan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kategori Barang </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kategori_barang"><?= _ent($bmn->kategori_barang); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tahun Sensus </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tahun_sensus"><?= _ent($bmn->tahun_sensus); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-keterangan"><?= _ent($bmn->keterangan); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('bmn_update', function() use ($bmn){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit bmn (Ctrl+e)" href="<?= admin_site_url('/bmn/edit/'.$bmn->id_bmn); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Bmn']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/bmn/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Bmn']); ?></a>
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