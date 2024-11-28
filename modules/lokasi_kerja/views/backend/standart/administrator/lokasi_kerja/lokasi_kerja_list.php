<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = ADMIN_BASE_URL + '/Lokasi_kerja/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      <?= cclang('lokasi_kerja') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('lokasi_kerja') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('lokasi_kerja_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('lokasi_kerja')]); ?>  (Ctrl+a)" href="<?=  admin_site_url('/lokasi_kerja/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('lokasi_kerja')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('lokasi_kerja_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('lokasi_kerja') ?> " href="<?= admin_site_url('/lokasi_kerja/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                                <?php is_allowed('lokasi_kerja_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('lokasi_kerja') ?> " href="<?= admin_site_url('/lokasi_kerja/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('lokasi_kerja') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('lokasi_kerja')]); ?>  <i class="label bg-yellow"><span class="total-rows"><?= $lokasi_kerja_counts; ?></span>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_lokasi_kerja" id="form_lokasi_kerja" action="<?= admin_base_url('/lokasi_kerja/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
                     <div class="col-md-8">
                                                <div class="col-sm-2 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                                                         <option value="delete">Delete</option>
                                                      </select>
                        </div>
                        <div class="col-sm-2 padd-left-0 ">
                           <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                        </div>
                                                <div class="col-sm-3 padd-left-0  " >
                           <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                        </div>
                        <div class="col-sm-3 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                              <option value=""><?= cclang('all'); ?></option>
                               <option <?= $this->input->get('f') == 'kode' ? 'selected' :''; ?> value="kode">Kode</option>
                            <option <?= $this->input->get('f') == 'nama_lokasi' ? 'selected' :''; ?> value="nama_lokasi">Nama Lokasi</option>
                            <option <?= $this->input->get('f') == 'keterangan' ? 'selected' :''; ?> value="keterangan">Keterangan</option>
                            <option <?= $this->input->get('f') == 'alamat_lengkap' ? 'selected' :''; ?> value="alamat_lengkap">Alamat Lengkap</option>
                            <option <?= $this->input->get('f') == 'lat' ? 'selected' :''; ?> value="lat">Lat</option>
                            <option <?= $this->input->get('f') == 'long' ? 'selected' :''; ?> value="long">Long</option>
                            <option <?= $this->input->get('f') == 'user_create' ? 'selected' :''; ?> value="user_create">User Create</option>
                            <option <?= $this->input->get('f') == 'create_date' ? 'selected' :''; ?> value="create_date">Create Date</option>
                            <option <?= $this->input->get('f') == 'user_change' ? 'selected' :''; ?> value="user_change">User Change</option>
                            <option <?= $this->input->get('f') == 'change_date' ? 'selected' :''; ?> value="change_date">Change Date</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/lokasi_kerja');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                           <div class="table-pagination"><?= $pagination; ?></div>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive"> 

                  <br>
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                                                     <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                                                    <th data-field="kode"data-sort="1" data-primary-key="0"> <?= cclang('kode') ?></th>
                           <th data-field="nama_lokasi"data-sort="1" data-primary-key="0"> <?= cclang('nama_lokasi') ?></th>
                           <th data-field="keterangan"data-sort="1" data-primary-key="0"> <?= cclang('keterangan') ?></th>
                           <th data-field="alamat_lengkap"data-sort="1" data-primary-key="0"> <?= cclang('alamat_lengkap') ?></th>
                           <th data-field="lat"data-sort="1" data-primary-key="0"> <?= cclang('lat') ?></th>
                           <th data-field="long"data-sort="1" data-primary-key="0"> <?= cclang('long') ?></th>
                           <th data-field="user_create"data-sort="1" data-primary-key="0"> <?= cclang('user_create') ?></th>
                           <th data-field="create_date"data-sort="1" data-primary-key="0"> <?= cclang('create_date') ?></th>
                           <th data-field="user_change"data-sort="1" data-primary-key="0"> <?= cclang('user_change') ?></th>
                           <th data-field="change_date"data-sort="1" data-primary-key="0"> <?= cclang('change_date') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_lokasi_kerja">
                            <?= $tables ?>
                      </tbody>
                  </table>
                  </div>
               </div>
               <hr>
             
            </div>
            </form>            
         </div>
      </div>
   </div>
</section>
<script>
  var module_name = "lokasi_kerja"
  var use_ajax_crud = false  
</script>
<script src="<?= BASE_ASSET ?>js/filter.js"></script>


<script>
  $(document).ready(function(){

    "use strict";
   
    
      
      if (use_ajax_crud ==false) {

         $(document).on('click', 'a.remove-data', function(){
   
         var url = $(this).attr('data-href');
   
         swal({
             title: "<?= cclang('are_you_sure'); ?>",
             text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
             cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
             closeOnConfirm: true,
             closeOnCancel: true
           },
           function(isConfirm){
             if (isConfirm) {
               document.location.href = url;            
             }
           });
   
         return false;
       });
      }



    $(document).on('click', '#apply', function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_lokasi_kerja').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = ADMIN_BASE_URL + '/lokasi_kerja/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortableAjax('lokasi_kerja', $('table.dataTable'));
  }); /*end doc ready*/
</script>