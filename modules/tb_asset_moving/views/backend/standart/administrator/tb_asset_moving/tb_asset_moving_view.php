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
      Tb Asset Moving      <small><?= cclang('detail', ['Tb Asset Moving']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_asset_moving'); ?>">Tb Asset Moving</a></li>
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
                     <h3 class="widget-user-username">Tb Asset Moving</h3>
                     <h5 class="widget-user-desc">Detail Tb Asset Moving</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_asset_moving" id="form_tb_asset_moving" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_asset_moving->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal"><?= _ent($tb_asset_moving->tanggal); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Waktu </label>

                        <div class="col-sm-8">
                        <span class="detail_group-waktu"><?= _ent($tb_asset_moving->waktu); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Reader </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_asset_moving->tag_reader_reader_name); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Ruangan </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_asset_moving->tb_room_master_name_room); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Aset </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_asset_moving->tb_asset_master_nama_brg); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status Moving </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status_moving"><?= _ent($tb_asset_moving->status_moving); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_asset_moving_update', function() use ($tb_asset_moving){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_asset_moving (Ctrl+e)" href="<?= admin_site_url('/tb_asset_moving/edit/'.$tb_asset_moving->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb Asset Moving']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_asset_moving/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb Asset Moving']); ?></a>
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