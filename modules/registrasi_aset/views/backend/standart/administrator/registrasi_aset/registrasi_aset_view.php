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
      Register Aset<small><?= cclang('detail', ['Register Aset']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/registrasi_aset'); ?>">Register Aset</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>

<section class="content">

	<div class="box">

		<div class="box-header with-border">

			<h3 class="box-title">Data Register Aset</h3>
				<div class="box-tools pull-right">
					<!-- <button type="button" onClick="window.location='<?php echo site_url();?>aset';" class="btn btn-default"><i class="fa fa-undo"></i> Cancel</button> -->
				</div>	

      </div>
			
      <div class="box-body">

         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

               <?= form_open('', [            
                        'name' => 'form_tb_master_transaksi_add',            
                        'id' => 'form_tb_master_transaksi_add',
                        'enctype' => 'multipart/form-data',
                        'method' => 'POST',
                        'autocomplete' => 'off',
                        'class' => 'form form-horizontal'
                    ]); 
                ?>
                            
                <?php
                $user_groups = $this->model_group->get_user_group_ids();
                ?>

                <h3 style="text-decoration: underline;">Detail Register</h3>

                     <fieldset> 
                     
                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Tgl Awal Transaksi</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= date('d-m-Y', strtotime(_ent($tb_master_transaksi->tgl_awal_transaksi))); ?>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Ket Transaksi</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= _ent($tb_master_transaksi->ket_transaksi); ?>
                           </div>
                        </div>
                     </div>
                  
                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Area</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= _ent($tb_master_transaksi->tb_master_area_area); ?>
                           </div>
                        </div>
                     </div>
                                          
                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Gedung</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= _ent($tb_master_transaksi->tb_master_gedung_gedung); ?>
                           </div>
                        </div>
                     </div>
                                          
                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Ruangan</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= _ent($tb_master_transaksi->tb_master_ruangan_ruangan); ?>
                           </div>
                        </div>
                     </div>
                                          
                  </fieldset>

                  <h3 style="text-decoration: underline;">Detail Aset</h3>

                  <fieldset>
                        
                     <div class="row" style="margin-top: 1px; margin-bottom: 20px">
                           
                        <div class="col-md-12">
                                 
                              <div class="table-responsive"> 

                                 <br>
                                 <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                       
                                    <thead>
                                    <tr class="">                            
                                       <th style="text-align: center">No.</th>
                                       <th style="text-align: center">ID Aset</th>
                                       <th style="text-align: center">Nama Aset</th>
                                       <th style="text-align: center">Kode Aset</th>
                                       <th style="text-align: center">Kode NUP</th>
                                       <th style="text-align: center">Kode Tag</th>
                                    </tr>   
                                    </thead>
                                       <tbody id="tbody_tb_detail_transaksi">   
                                       
                                       <?php 
                                       $no = 1;
                                       foreach($tb_detail_transaksi as $tb_detail_transaksi): ?>
                                          <tr>
                                             <td style="text-align: center"><?= $no++; ?></td> 
                                             <td style="text-align: center"><span class="list_group-id_aset"><?= _ent($tb_detail_transaksi->id_aset); ?></span></td>
                                             <td style="text-align: left"><span class="list_group-nama_aset"><?= _ent($tb_detail_transaksi->nama_aset); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($tb_detail_transaksi->kode_aset); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-nup"><?= _ent($tb_detail_transaksi->nup); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-kode_tid"><?= _ent($tb_detail_transaksi->kode_tid); ?></span></td>
                                          </tr>
                                       <?php endforeach; ?>

                                       </tbody>
                                 </table>

                              </div>

                        </div>

                     </div>

                  </fieldset>
                        
               <div class="message"></div>

               <?= form_close(); ?>
                          
               <div class="view-nav text-center">
                  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/registrasi_aset/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Register Aset']); ?></a>
               </div>
                    
         </div>
         <!-- /.col-xs-12 -->

      </div>		
     <!-- /.box-body -->

	</div>
	<!-- /.box -->

</section>

<script>
$(document).ready(function(){

   "use strict";
   $('.container-button-bottom').hide();
   
  });
</script>