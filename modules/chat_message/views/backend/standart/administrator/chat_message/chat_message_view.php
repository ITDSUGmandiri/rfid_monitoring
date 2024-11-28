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
      Chat Message      <small><?= cclang('detail', ['Chat Message']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/chat_message'); ?>">Chat Message</a></li>
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
                     <h3 class="widget-user-username">Chat Message</h3>
                     <h5 class="widget-user-desc">Detail Chat Message</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_chat_message" id="form_chat_message" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($chat_message->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Message User Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-message_user_id"><?= _ent($chat_message->message_user_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Chat Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-chat_id"><?= _ent($chat_message->chat_id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Uid </label>

                        <div class="col-sm-8">
                        <span class="detail_group-uid"><?= _ent($chat_message->uid); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Message </label>

                        <div class="col-sm-8">
                        <span class="detail_group-message"><?= _ent($chat_message->message); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status"><?= _ent($chat_message->status); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Created At </label>

                        <div class="col-sm-8">
                        <span class="detail_group-created_at"><?= _ent($chat_message->created_at); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('chat_message_update', function() use ($chat_message){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit chat_message (Ctrl+e)" href="<?= admin_site_url('/chat_message/edit/'.$chat_message->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Chat Message']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/chat_message/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Chat Message']); ?></a>
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