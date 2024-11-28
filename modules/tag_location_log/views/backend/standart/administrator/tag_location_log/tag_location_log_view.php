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
      Location Log      <small><?= cclang('detail', ['Location Log']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_location_log'); ?>">Location Log</a></li>
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
                     <h3 class="widget-user-username">Location Log</h3>
                     <h5 class="widget-user-desc">Detail Location Log</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_location_log" id="form_tag_location_log" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Log Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-log_id"><?= _ent($tag_location_log->log_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">RFID </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_location_log->tag_rfid_rfid_rfid); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Librarian </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_location_log->tag_librarian_librarian_name); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-log_status"><?= _ent($tag_location_log->log_status); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_location_log_update', function() use ($tag_location_log){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_location_log (Ctrl+e)" href="<?= admin_site_url('/tag_location_log/edit/'.$tag_location_log->log_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Location Log']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_location_log/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Location Log']); ?></a>
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