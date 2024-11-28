<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = ADMIN_BASE_URL + '/Table_asset_master/add';
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
      <?= cclang('table_asset_master') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('table_asset_master') ?></li>
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
                        <?php is_allowed('table_asset_master_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('table_asset_master')]); ?>  (Ctrl+a)" href="<?=  admin_site_url('/table_asset_master/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('table_asset_master')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('table_asset_master_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('table_asset_master') ?> " href="<?= admin_site_url('/table_asset_master/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                                <?php is_allowed('table_asset_master_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('table_asset_master') ?> " href="<?= admin_site_url('/table_asset_master/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('table_asset_master') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('table_asset_master')]); ?>  <i class="label bg-yellow"><span class="total-rows"><?= $table_asset_master_counts; ?></span>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_table_asset_master" id="form_table_asset_master" action="<?= admin_base_url('/table_asset_master/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
                     <div class="col-md-8">
                                                <div class="col-sm-2 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
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
                               <option <?= $this->input->get('f') == 'kode_satker' ? 'selected' :''; ?> value="kode_satker">Kode Satker</option>
                            <option <?= $this->input->get('f') == 'nama_satker' ? 'selected' :''; ?> value="nama_satker">Nama Satker</option>
                            <option <?= $this->input->get('f') == 'for_inventaris' ? 'selected' :''; ?> value="for_inventaris">For Inventaris</option>
                            <option <?= $this->input->get('f') == 'kode_brg' ? 'selected' :''; ?> value="kode_brg">Kode Brg</option>
                            <option <?= $this->input->get('f') == 'NUP' ? 'selected' :''; ?> value="NUP">NUP</option>
                            <option <?= $this->input->get('f') == 'rfid_code_label' ? 'selected' :''; ?> value="rfid_code_label">Rfid Code Label</option>
                            <option <?= $this->input->get('f') == 'nama_brg' ? 'selected' :''; ?> value="nama_brg">Nama Brg</option>
                            <option <?= $this->input->get('f') == 'Merk' ? 'selected' :''; ?> value="Merk">Merk</option>
                            <option <?= $this->input->get('f') == 'Tipe' ? 'selected' :''; ?> value="Tipe">Tipe</option>
                            <option <?= $this->input->get('f') == 'Kondisi' ? 'selected' :''; ?> value="Kondisi">Kondisi</option>
                            <option <?= $this->input->get('f') == 'usia' ? 'selected' :''; ?> value="usia">Usia</option>
                            <option <?= $this->input->get('f') == 'lokasi_id' ? 'selected' :''; ?> value="lokasi_id">Lokasi Id</option>
                            <option <?= $this->input->get('f') == 'tgl_inventarisasi' ? 'selected' :''; ?> value="tgl_inventarisasi">Tgl Inventarisasi</option>
                            <option <?= $this->input->get('f') == 'location_asset' ? 'selected' :''; ?> value="location_asset">Location Asset</option>
                            <option <?= $this->input->get('f') == 'id' ? 'selected' :''; ?> value="id">Id</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/table_asset_master');?>" title="<?= cclang('reset_filter'); ?>">
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
                                                     <th data-field="kode_satker"data-sort="1" data-primary-key="0"> <?= cclang('kode_satker') ?></th>
                           <th data-field="nama_satker"data-sort="1" data-primary-key="0"> <?= cclang('nama_satker') ?></th>
                           <th data-field="for_inventaris"data-sort="1" data-primary-key="0"> <?= cclang('for_inventaris') ?></th>
                           <th data-field="kode_brg"data-sort="1" data-primary-key="0"> <?= cclang('kode_brg') ?></th>
                           <th data-field="NUP"data-sort="1" data-primary-key="0"> <?= cclang('NUP') ?></th>
                           <th data-field="rfid_code_label"data-sort="1" data-primary-key="0"> <?= cclang('rfid_code_label') ?></th>
                           <th data-field="nama_brg"data-sort="1" data-primary-key="0"> <?= cclang('nama_brg') ?></th>
                           <th data-field="Merk"data-sort="1" data-primary-key="0"> <?= cclang('Merk') ?></th>
                           <th data-field="Tipe"data-sort="1" data-primary-key="0"> <?= cclang('Tipe') ?></th>
                           <th data-field="Kondisi"data-sort="1" data-primary-key="0"> <?= cclang('Kondisi') ?></th>
                           <th data-field="usia"data-sort="1" data-primary-key="0"> <?= cclang('usia') ?></th>
                           <th data-field="lokasi_id"data-sort="1" data-primary-key="0"> <?= cclang('lokasi_id') ?></th>
                           <th data-field="tgl_inventarisasi"data-sort="1" data-primary-key="0"> <?= cclang('tgl_inventarisasi') ?></th>
                           <th data-field="location_asset"data-sort="1" data-primary-key="0"> <?= cclang('location_asset') ?></th>
                           <th data-field="id"data-sort="1" data-primary-key="0"> <?= cclang('id') ?></th>
                                                   </tr>
                     </thead>
                     <tbody id="tbody_table_asset_master">
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
  var module_name = "table_asset_master"
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
      var serialize_bulk = $('#form_table_asset_master').serialize();

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
               document.location.href = ADMIN_BASE_URL + '/table_asset_master/delete?' + serialize_bulk;      
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
    initSortableAjax('table_asset_master', $('table.dataTable'));
  }); /*end doc ready*/
</script>