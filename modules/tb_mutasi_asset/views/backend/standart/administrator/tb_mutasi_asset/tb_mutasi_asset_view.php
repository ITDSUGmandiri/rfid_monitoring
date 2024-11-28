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
      Tb Mutasi Asset      <small><?= cclang('detail', ['Tb Mutasi Asset']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_mutasi_asset'); ?>">Tb Mutasi Asset</a></li>
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
                     <h3 class="widget-user-username">Tb Mutasi Asset</h3>
                     <h5 class="widget-user-desc">Detail Tb Mutasi Asset</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_mutasi_asset" id="form_tb_mutasi_asset" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_mutasi_asset->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Mutasi Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-mutasi_id"><?= _ent($tb_mutasi_asset->mutasi_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Code Rfidtag </label>

                        <div class="col-sm-8">
                        <span class="detail_group-code_rfidtag"><?= _ent($tb_mutasi_asset->code_rfidtag); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Room Old </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_room_old"><?= _ent($tb_mutasi_asset->id_room_old); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Room New </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_room_new"><?= _ent($tb_mutasi_asset->id_room_new); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal M </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal_m"><?= _ent($tb_mutasi_asset->tanggal_m); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Waktu M </label>

                        <div class="col-sm-8">
                        <span class="detail_group-waktu_m"><?= _ent($tb_mutasi_asset->waktu_m); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Pic </label>

                        <div class="col-sm-8">
                        <span class="detail_group-pic"><?= _ent($tb_mutasi_asset->pic); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_mutasi_asset_update', function() use ($tb_mutasi_asset){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_mutasi_asset (Ctrl+e)" href="<?= admin_site_url('/tb_mutasi_asset/edit/'.$tb_mutasi_asset->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Mutasi Asset']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_mutasi_asset/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Mutasi Asset']); ?></a>
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