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
      Reader      <small><?= cclang('detail', ['Reader']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/tag_reader'); ?>">Reader</a></li>
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
                     <h3 class="widget-user-username">Reader</h3>
                     <h5 class="widget-user-desc">Detail Reader</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_tag_reader" id="form_tag_reader" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Reader Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_id"><?= _ent($tag_reader->reader_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Librarian </label>

                        <div class="col-sm-8">
                           <?= _ent($tag_reader->tag_librarian_librarian_name); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Name </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_name"><?= _ent($tag_reader->reader_name); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SN </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_serialnumber"><?= _ent($tag_reader->reader_serialnumber); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Type </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_type"><?= _ent($tag_reader->reader_type); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">IP </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_ip"><?= _ent($tag_reader->reader_ip); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Port </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_port"><?= _ent($tag_reader->reader_port); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Com Port </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_com"><?= _ent($tag_reader->reader_com); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Baud Rate </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_baudrate"><?= _ent($tag_reader->reader_baudrate); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Power </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_power"><?= _ent($tag_reader->reader_power); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Interval </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_interval"><?= _ent($tag_reader->reader_interval); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Mode </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_mode"><?= _ent($tag_reader->reader_mode); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Reader Family </label>

                        <div class="col-sm-8">
                        <span class="detail_group-reader_family"><?= _ent($tag_reader->reader_family); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('tag_reader_update', function() use ($tag_reader){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit tag_reader (Ctrl+e)" href="<?= admin_site_url('/tag_reader/edit/'.$tag_reader->reader_id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Tag Reader']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/tag_reader/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Tag Reader']); ?></a>
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