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
      Tb Pinjam Log      <small><?= cclang('detail', ['Tb Pinjam Log']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_pinjam_log'); ?>">Tb Pinjam Log</a></li>
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
                     <h3 class="widget-user-username">Tb Pinjam Log</h3>
                     <h5 class="widget-user-desc">Detail Tb Pinjam Log</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_pinjam_log" id="form_tb_pinjam_log" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_pinjam_log->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Pinjam Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pinjam_id"><?= _ent($tb_pinjam_log->pinjam_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Proses </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_proses"><?= _ent($tb_pinjam_log->tanggal_proses); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Pinjam </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_pinjam"><?= _ent($tb_pinjam_log->tanggal_pinjam); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Waktu Pinjam </label>

                        <div class="col-sm-8">
                        <span class="detail_group-waktu_pinjam"><?= _ent($tb_pinjam_log->waktu_pinjam); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal Kembali </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_kembali"><?= _ent($tb_pinjam_log->tanggal_kembali); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Waktu Kembali </label>

                        <div class="col-sm-8">
                        <span class="detail_group-waktu_kembali"><?= _ent($tb_pinjam_log->waktu_kembali); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lend Id </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_pinjam_log->tb_pegawai_master_Pegawai); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Peminjam </label>

                        <div class="col-sm-8">
                        <span class="detail_group-peminjam"><?= _ent($tb_pinjam_log->peminjam); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Job </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_pinjam_log->tb_kelompok_kerjaan_jenis); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Alamat </label>

                        <div class="col-sm-8">
                        <span class="detail_group-alamat"><?= _ent($tb_pinjam_log->alamat); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Telp </label>

                        <div class="col-sm-8">
                        <span class="detail_group-telp"><?= _ent($tb_pinjam_log->telp); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Aset </label>

                        <div class="col-sm-8">
                          <?= join_multi_select($tb_pinjam_log->tag_code, 'tb_asset_master', 'tag_code', 'nama_brg'); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status"><?= _ent($tb_pinjam_log->status); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_pinjam_log_update', function() use ($tb_pinjam_log){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_pinjam_log (Ctrl+e)" href="<?= admin_site_url('/tb_pinjam_log/edit/'.$tb_pinjam_log->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Pinjam Log']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_pinjam_log/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Pinjam Log']); ?></a>
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