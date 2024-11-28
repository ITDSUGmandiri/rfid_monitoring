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
      Table Asset Master      <small><?= cclang('detail', ['Table Asset Master']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/table_asset_master'); ?>">Table Asset Master</a></li>
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
                     <h3 class="widget-user-username">Table Asset Master</h3>
                     <h5 class="widget-user-desc">Detail Table Asset Master</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_table_asset_master" id="form_table_asset_master" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Satker </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_satker"><?= _ent($table_asset_master->kode_satker); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Satker </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_satker"><?= _ent($table_asset_master->nama_satker); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">For Inventaris </label>

                        <div class="col-sm-8">
                        <span class="detail_group-for_inventaris"><?= _ent($table_asset_master->for_inventaris); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Brg </label>

                        <div class="col-sm-8">
                        <span class="detail_group-kode_brg"><?= _ent($table_asset_master->kode_brg); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">NUP </label>

                        <div class="col-sm-8">
                        <span class="detail_group-NUP"><?= _ent($table_asset_master->NUP); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Rfid Code Label </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_code_label"><?= _ent($table_asset_master->rfid_code_label); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Brg </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_brg"><?= _ent($table_asset_master->nama_brg); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Merk </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Merk"><?= _ent($table_asset_master->Merk); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tipe </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Tipe"><?= _ent($table_asset_master->Tipe); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kondisi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-Kondisi"><?= _ent($table_asset_master->Kondisi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Usia </label>

                        <div class="col-sm-8">
                        <span class="detail_group-usia"><?= _ent($table_asset_master->usia); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Lokasi Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-lokasi_id"><?= _ent($table_asset_master->lokasi_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tgl Inventarisasi </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tgl_inventarisasi"><?= _ent($table_asset_master->tgl_inventarisasi); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Location Asset </label>

                        <div class="col-sm-8">
                        <span class="detail_group-location_asset"><?= _ent($table_asset_master->location_asset); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($table_asset_master->id); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('table_asset_master_update', function() use ($table_asset_master){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit table_asset_master (Ctrl+e)" href="<?= admin_site_url('/table_asset_master/edit/'.$table_asset_master->0); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Table Asset Master']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/table_asset_master/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Table Asset Master']); ?></a>
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