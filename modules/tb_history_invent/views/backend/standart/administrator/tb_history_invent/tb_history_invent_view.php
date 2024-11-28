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
      Tb History Invent      <small><?= cclang('detail', ['Tb History Invent']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tb_history_invent'); ?>">Tb History Invent</a></li>
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
                     <h3 class="widget-user-username">Tb History Invent</h3>
                     <h5 class="widget-user-desc">Detail Tb History Invent</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tb_history_invent" id="form_tb_history_invent" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($tb_history_invent->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tanggal </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tanggal"><?= _ent($tb_history_invent->tanggal); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Waktu </label>

                        <div class="col-sm-8">
                        <span class="detail_group-waktu"><?= _ent($tb_history_invent->waktu); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Ruangan </label>

                        <div class="col-sm-8">
                           <?= _ent($tb_history_invent->tb_room_master_name_room); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">User </label>

                        <div class="col-sm-8">
                        <span class="detail_group-user"><?= _ent($tb_history_invent->user); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Labeling </label>

                        <div class="col-sm-8">
                        <span class="detail_group-labeling"><?= _ent($tb_history_invent->labeling); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Rfid Code Tag </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_code_tag"><?= _ent($tb_history_invent->rfid_code_tag); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tb_history_invent_update', function() use ($tb_history_invent){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tb_history_invent (Ctrl+e)" href="<?= admin_site_url('/tb_history_invent/edit/'.$tb_history_invent->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tb History Invent']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tb_history_invent/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tb History Invent']); ?></a>
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