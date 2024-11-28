<script type="text/javascript">
   function domo() {
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
      Log <small><?= cclang('detail', ['Log']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a href="<?= admin_site_url('/log'); ?>">Log</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Log</h3>
                     <h5 class="widget-user-desc">Detail Log</h5>
                     <hr>
                  </div>


                  <div class="form-horizontal form-step" name="form_log" id="form_log">

                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                           <span class="detail_group-id"><?= _ent($log->id); ?></span>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Title </label>
                        <div class="col-sm-8">
                           <?php if (is_image($log->title)) : ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/log/' . $log->title; ?>">
                                 <img src="<?= BASE_URL . 'uploads/log/' . $log->title; ?>" class="image-responsive" alt="image log" title="title log" width="40px">
                              </a>
                           <?php else : ?>
                              <label>
                                 <a href="<?= ADMIN_BASE_URL . '/file/download/log/' . $log->title; ?>">
                                    <img src="<?= get_icon_file($log->title); ?>" class="image-responsive" alt="image log" title="title <?= $log->title; ?>" width="40px">
                                    <?= $log->title ?>
                                 </a>
                              </label>
                           <?php endif; ?>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Message </label>

                        <div class="col-sm-8">
                           <span class="detail_group-message"><?= _ent($log->message); ?></span>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Type </label>

                        <div class="col-sm-8">
                           <span class="detail_group-type"><?= _ent($log->type); ?></span>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Data </label>

                        <div class="col-sm-8">
                           <span class="detail_group-data"><?= _ent($log->data); ?></span>
                        </div>
                     </div>

                     <br>
                     <br>




                     <div class="view-nav">
                        <?php is_allowed('log_update', function () use ($log) { ?>
                           <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit log (Ctrl+e)" href="<?= admin_site_url('/log/edit/' . $log->id); ?>"><i class="fa fa-edit"></i> <?= cclang('update', ['Log']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/log/'); ?>"><i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Log']); ?></a>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   $(document).ready(function() {

      "use strict";


   });
</script>