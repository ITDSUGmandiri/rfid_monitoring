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
      RFID      <small><?= cclang('detail', ['RFID']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_rfid'); ?>">RFID</a></li>
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
                     <h3 class="widget-user-username">RFID</h3>
                     <h5 class="widget-user-desc">Detail RFID</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_rfid" id="form_tag_rfid" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Rfid Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_id"><?= _ent($tag_rfid->rfid_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Label Tag </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_rfid->tag_label_label_name); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Barcode </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_barcode"><?= _ent($tag_rfid->rfid_barcode); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RFID </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_rfid"><?= _ent($tag_rfid->rfid_rfid); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_status"><?= _ent($tag_rfid->rfid_status); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Note </label>

                        <div class="col-sm-8">
                        <span class="detail_group-rfid_note"><?= _ent($tag_rfid->rfid_note); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_rfid_update', function() use ($tag_rfid){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_rfid (Ctrl+e)" href="<?= admin_site_url('/tag_rfid/edit/'.$tag_rfid->rfid_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Rfid']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_rfid/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Rfid']); ?></a>
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