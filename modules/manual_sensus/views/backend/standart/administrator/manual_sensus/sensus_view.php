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
      Sensus Aset<small><?= cclang('detail', ['Sensus Aset']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/registrasi_aset'); ?>">Sensus Aset</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>

<section class="content">

	<div class="box">

		<div class="box-header with-border">

			<h3 class="box-title">Data Sensus Aset</h3>
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

                <h3 style="text-decoration: underline;">Data Sensus</h3>

                     <fieldset> 
                     
                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Tanggal</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= date('d-m-Y', strtotime(_ent($tb_master_transaksi->tgl_awal_transaksi))); ?>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Petugas</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= _ent($tb_master_transaksi->nama_pegawai_input); ?>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Uraian</label>
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

                  <h3 style="text-decoration: underline;">Hasil Sensus</h3>

                  <fieldset>
                        
                     <div class="row" style="margin-top: 1px; margin-bottom: 20px">
                           
                        <div class="col-md-12">
                                 
                              <div class="table-responsive"> 

                                 <br>
                                 <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                       
                                    <thead>
                                    <tr class="">                            
                                       <th style="text-align: center">No.</th>
                                       <th style="text-align: center">RFID Tag</th>
                                       <th style="text-align: center">Kode Aset</th>
                                       <th style="text-align: center">NUP</th>
                                       <th style="text-align: center">Nama Aset</th>
                                       <th style="text-align: center">Kategori</th>
                                       <th style="text-align: center">Lokasi Sensus</th>
                                       <th style="text-align: center">Tahun Perolehan</th>
                                       <th style="text-align: center">Status Aset</th>
                                       <th style="text-align: center">Kondisi</th>
                                       <th style="text-align: center">Status Lokasi</th>
                                       <th style="text-align: center">Nilai Perolehan</th>
                                    </tr>   
                                    </thead>
                                       <tbody id="tbody_tb_detail_transaksi">   
                                       
                                       <?php 
                                       $no = 1;
                                       foreach($tb_detail_transaksi as $tb_detail_transaksi): ?>
                                          <tr>
                                             <td style="text-align: center"><?= $no++; ?></td> 
                                             <td style="text-align: center"><span class="list_group-id_aset"><?= _ent($tb_detail_transaksi->kode_tid); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($tb_detail_transaksi->kode_aset); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-nup"><?= _ent($tb_detail_transaksi->nup); ?></span></td>
                                             <td style="text-align: left"><span class="list_group-nama_aset"><?= _ent($tb_detail_transaksi->nama_aset); ?></span></td>
                                             <td style="text-align: left"><span class="list_group-kategori_aset"></span><?= _ent($tb_detail_transaksi->kategori_aset); ?></td>
                                             <td style="text-align: center"><span class="list_group-lokasi_sensus"><?= _ent($tb_detail_transaksi->lokasi_sensus); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-tahun_perolehan"><?= _ent($tb_detail_transaksi->tahun_perolehan); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-status_aset"><?= _ent(($tb_detail_transaksi->status_aset)); ?></span></td>

                                             <td style="text-align: center"><span class="list_group-kondisi_aset"><?= _ent(($tb_detail_transaksi->kondisi_aset)); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-ceklis_sensus"><?= _ent(($tb_detail_transaksi->ceklis_sensus)); ?></span></td>
                                             <td style="text-align: center"><span class="list_group-nilai_perolehan"><?= _ent(($tb_detail_transaksi->nilai_perolehan)); ?></span></td>
                                          </tr>
                                       <?php endforeach; ?>

                                       </tbody>
                                 </table>

                              </div>

                        </div>

                     </div>

                  </fieldset>

                  <h3 style="text-decoration: underline;">Summary Sensus</h3>

                  <fieldset>
                        
                     <div class="row" style="margin-top: 1px; margin-bottom: 20px">
                           
                        <div class="col-md-4">
                                 
                              <div class="table-responsive"> 

                                 <br>
                                 <table class="table table-bordered table-striped dataTable" id="your_table_id">
                                       
                                    <thead>
                                    <tr class="">                            
                                       <th style="text-align: center">Summary Sensus</th>
                                       <th style="text-align: center">Nilai</th>
                                    </tr>   
                                    </thead>
                                       <tbody id="tbody_tb_detail_transaksi">   
                                       
                                          <tr>
                                             <td style="text-align: left"><span class="list_group-id_aset">Total Aset</span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($summary_report['total_aset_tahun_all']); ?></span></td>
                                          </tr>

                                          <tr>
                                             <td style="text-align: left"><span class="list_group-id_aset">Total Aset Ruangan</span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($summary_report['total_aset_ruangan']); ?></span></td>
                                          </tr>

                                          <tr>
                                             <td style="text-align: left"><span class="list_group-id_aset">Total Aset Terdata</span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($summary_report['total_aset_terdata']); ?></span></td>
                                          </tr>

                                          <tr>
                                             <td style="text-align: left"><span class="list_group-id_aset">Total Ditemukan</span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($summary_report['total_cocok']); ?></span></td>
                                          </tr>

                                          <tr>
                                             <td style="text-align: left"><span class="list_group-id_aset">Total Tidak Ditemukan</span></td>
                                             <td style="text-align: center"><span class="list_group-kode_aset"><?= _ent($summary_report['total_hilang']); ?></span></td>
                                          </tr>

                                       </tbody>
                                 </table>

                              </div>

                        </div>

                     </div>

                  </fieldset>
                        
               <div class="message"></div>

               <?= form_close(); ?>
                          
               <div class="view-nav text-center">
                  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/manual_sensus/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Sensus Aset']); ?></a>
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