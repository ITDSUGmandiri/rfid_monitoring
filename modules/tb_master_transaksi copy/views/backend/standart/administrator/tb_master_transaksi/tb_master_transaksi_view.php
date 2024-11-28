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
      Tb Master Transaksi      <small><?= cclang('detail', ['Tb Master Transaksi']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_master_transaksi'); ?>">Tb Master Transaksi</a></li>
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
                     <h3 class="widget-user-username">Tb Master Transaksi</h3>
                     <h5 class="widget-user-desc">Detail Tb Master Transaksi</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_master_transaksi" id="form_tb_master_transaksi" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_master_transaksi->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Transaksi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_transaksi"><?= _ent($tb_master_transaksi->kode_transaksi); ?></span>
                        </div>
                    </div>
                                        
                  <h3>Form Register</h3>
                  <section>
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tipe Transaksi </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_master_transaksi->tb_master_type_transaksi_tipe_transaksi); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status Transaksi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status_transaksi"><?= _ent($tb_master_transaksi->status_transaksi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Awal Transaksi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_awal_transaksi"><?= _ent($tb_master_transaksi->tgl_awal_transaksi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Ket Transaksi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-ket_transaksi"><?= _ent($tb_master_transaksi->ket_transaksi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Pegawai Input </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_pegawai_input"><?= _ent($tb_master_transaksi->id_pegawai_input); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Pegawai Input </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_pegawai_input"><?= _ent($tb_master_transaksi->nama_pegawai_input); ?></span>
                        </div>
                    </div>
                                        </section>
                  <h3>Pilih Area</h3>
                  <section>
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Area </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_master_transaksi->tb_master_area_area); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Gedung </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_master_transaksi->tb_master_gedung_gedung); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Ruangan </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_master_transaksi->tb_master_ruangan_ruangan); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                                               </section>
                        <div class="message"></div>
                          
                    <div class="view-nav">
                        <?php is_allowed('tb_master_transaksi_update', function() use ($tb_master_transaksi){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_master_transaksi (Ctrl+e)" href="<?= admin_site_url('/tb_master_transaksi/edit/'.$tb_master_transaksi->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Master Transaksi']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_master_transaksi/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Master Transaksi']); ?></a>
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
    
   
   $('.container-button-bottom').hide();
   $('.form-step').steps({
      headerTag: 'h3',
      bodyTag: 'section',
      autoFocus: true,
      enableAllSteps : true,
      onFinishing : function(){
        $('.btn_save_back').trigger('click')
      },
      labels : {
        finish : 'save'
      },
      enableFinishButton : false
  });
  });
</script>