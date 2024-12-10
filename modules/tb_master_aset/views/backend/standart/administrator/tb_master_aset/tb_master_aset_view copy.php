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
      Tb Master Aset      <small><?= cclang('detail', ['Tb Master Aset']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_master_aset'); ?>">Tb Master Aset</a></li>
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
                     <h3 class="widget-user-username">Tb Master Aset</h3>
                     <h5 class="widget-user-desc">Detail Tb Master Aset</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_master_aset" id="form_tb_master_aset" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_master_aset->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Tid </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_tid"><?= _ent($tb_master_aset->kode_tid); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Aset </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_aset"><?= _ent($tb_master_aset->kode_aset); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nup </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nup"><?= _ent($tb_master_aset->nup); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kategori </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kategori"><?= _ent($tb_master_aset->kategori); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Merk </label>

                        <div class="col-sm-8">
                        <span class="detail_group-merk"><?= _ent($tb_master_aset->merk); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tipe </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tipe"><?= _ent($tb_master_aset->tipe); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Kondisi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_kondisi"><?= _ent($tb_master_aset->id_kondisi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status"><?= _ent($tb_master_aset->status); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tipe Moving </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tipe_moving"><?= _ent($tb_master_aset->tipe_moving); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Aset </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_aset"><?= _ent($tb_master_aset->nama_aset); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Area </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_area"><?= _ent($tb_master_aset->id_area); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Gedung </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_gedung"><?= _ent($tb_master_aset->id_gedung); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Ruangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_ruangan"><?= _ent($tb_master_aset->id_ruangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Perolehan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_perolehan"><?= _ent($tb_master_aset->tgl_perolehan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Inventarisasi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_inventarisasi"><?= _ent($tb_master_aset->tgl_inventarisasi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Flag Inventarisasi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-flag_inventarisasi"><?= _ent($tb_master_aset->flag_inventarisasi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Peminjaman </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_peminjaman"><?= _ent($tb_master_aset->tgl_peminjaman); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Pengembalian </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_pengembalian"><?= _ent($tb_master_aset->tgl_pengembalian); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Mutasi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_mutasi"><?= _ent($tb_master_aset->tgl_mutasi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Lokasi Moving </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_lokasi_moving"><?= _ent($tb_master_aset->id_lokasi_moving); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Pegawai </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_pegawai"><?= _ent($tb_master_aset->id_pegawai); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_master_aset_update', function() use ($tb_master_aset){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_master_aset (Ctrl+e)" href="<?= admin_site_url('/tb_master_aset/edit/'.$tb_master_aset->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Master Aset']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_master_aset/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Master Aset']); ?></a>
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