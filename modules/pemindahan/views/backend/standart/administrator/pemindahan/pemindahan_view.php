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
      Pemindahan<small><?= cclang('detail', ['Pemindahan']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= admin_site_url('/pemindahan'); ?>">Pemindahan</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>

<section class="content">

	<div class="box">

		<div class="box-header with-border">

			<h3 class="box-title">Data Pemindahan</h3>
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

                <h3 style="text-decoration: underline;">Detail Pemindahan</h3>

                     <fieldset> 
                     
                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Tgl Pemindahan</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= date('d-m-Y', strtotime(_ent($tb_master_transaksi->tgl_awal_transaksi))); ?>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="row">
                           <label class="col-sm-2 control-label">Keterangan</label>
                           <div class="col-sm-8" style="padding-top: 7px;">
                              <?= _ent($tb_master_transaksi->ket_transaksi); ?>
                           </div>
                        </div>
                     </div>

                    <!-- Menampilkan Keterangan Selesai -->
                    <?php if (_ent($tb_master_transaksi->status_transaksi) == 3): ?>
                        <div class="form-group">
                           <div class="row">
                              <label class="col-sm-2 control-label">Keterangan Selesai</label>
                              <div class="col-sm-8" style="padding-top: 7px;">
                                 <span id="keterangan_selesai_display"><?= _ent($tb_master_transaksi->ket_transaksi2); ?></span>
                              </div>
                           </div>
                     </div>
                     <?php endif; ?>

                     <!-- Menampilkan Keterangan Batal -->
                     <?php if (_ent($tb_master_transaksi->status_transaksi) == 4): ?>
                        <div class="form-group">
                           <div class="row">
                              <label class="col-sm-2 control-label">Keterangan Batal</label>
                              <div class="col-sm-8" style="padding-top: 7px;">
                                 <span id="keterangan_batal_display"><?= _ent($tb_master_transaksi->ket_transaksi2); ?></span>
                              </div>
                           </div>
                     </div>
                     <?php endif; ?>
                     
                     <!-- Menampilkan Foto berdasarkan Status -->
                     <?php if (_ent($tb_master_transaksi->status_transaksi) == 3): ?>
                        <!-- Status Selesai -->
                        <div class="form-group">
                           <div class="row">
                              <label class="col-sm-2 control-label">Foto Selesai Pemindahan</label>
                              <div class="col-sm-8" style="padding-top: 7px;">
                                 <?php if (!empty($tb_master_transaksi->image_uri)): ?>
                                    <img src="<?= base_url('uploads/Pemindahan/' . $tb_master_transaksi->image_uri); ?>" 
                                       alt="Foto Selesai Pemindahan" 
                                       class="img-thumbnail" 
                                       style="max-width: 300px;">
                                 <?php else: ?>
                                    <p>Tidak ada foto tersedia.</p>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>

                     <?php elseif (_ent($tb_master_transaksi->status_transaksi) == 4): ?>
                        <!-- Status Batal -->
                        <div class="form-group">
                           <div class="row">
                              <label class="col-sm-2 control-label">Foto Batal Pemindahan</label>
                              <div class="col-sm-8" style="padding-top: 7px;">
                                 <?php if (!empty($tb_master_transaksi->image_uri)): ?>
                                    <img src="<?= base_url('uploads/Pemindahan/' . $tb_master_transaksi->image_uri); ?>" 
                                       alt="Foto Batal Pemindahan" 
                                       class="img-thumbnail" 
                                       style="max-width: 300px;">
                                 <?php else: ?>
                                    <p>Tidak ada foto tersedia.</p>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     <?php endif; ?>
                  
                  <div class="form-group">
                     <div class="row">
                        <label class="col-sm-2 control-label">Area Asal</label>
                        <div class="col-sm-8" style="padding-top: 7px;">
                           <?= _ent($tb_master_transaksi->tb_master_area_area); ?>
                        </div>
                     </div>
                  </div>
                                       
                  <div class="form-group">
                     <div class="row">
                        <label class="col-sm-2 control-label">Gedung Asal</label>
                        <div class="col-sm-8" style="padding-top: 7px;">
                           <?= _ent($tb_master_transaksi->tb_master_gedung_gedung); ?>
                        </div>
                     </div>
                  </div>
                                       
                  <div class="form-group">
                     <div class="row">
                        <label class="col-sm-2 control-label">Ruangan Asal</label>
                        <div class="col-sm-8" style="padding-top: 7px;">
                           <?= _ent($tb_master_transaksi->tb_master_ruangan_ruangan); ?>
                        </div>
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <div class="row">
                        <label class="col-sm-2 control-label">Area Tujuan</label>
                        <div class="col-sm-8" style="padding-top: 7px;">
                           <?= _ent($tb_master_transaksi->tb_master_area_area2); ?>
                        </div>
                     </div>
                  </div>
                                       
                  <div class="form-group">
                     <div class="row">
                        <label class="col-sm-2 control-label">Gedung Tujuan</label>
                        <div class="col-sm-8" style="padding-top: 7px;">
                           <?= _ent($tb_master_transaksi->tb_master_gedung_gedung2); ?>
                        </div>
                     </div>
                  </div>
                                       
                  <div class="form-group">
                     <div class="row">
                        <label class="col-sm-2 control-label">Ruangan Tujuan</label>
                        <div class="col-sm-8" style="padding-top: 7px;">
                           <?= _ent($tb_master_transaksi->tb_master_ruangan_ruangan2); ?>
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

               <?php
               // Pastikan $tb_master_transaksi sudah di-load sebelumnya
               $status_transaksi = $tb_master_transaksi->status_transaksi;  // Ambil status transaksi

               // Cek apakah status transaksi = 3, jika ya, sembunyikan tombol selesai
               $show_selesai_button = ($status_transaksi == 1); // Tombol selesai hanya muncul jika status bukan 3
               $show_batal_button = ($status_transaksi == 1); // Tombol selesai hanya muncul jika status bukan 3
               ?>
                          
               <div class="view-nav text-center">
                  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/pemindahan/'); ?>">
                     <i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Pemindahan']); ?>
                  </a>

               <!-- Tombol selesai hanya ditampilkan jika status_transaksi == 1 -->
               <?php if ($show_selesai_button): ?>
                  <a class="btn btn-flat btn-success" id="btn_selesai" href="javascript:void(0);" data-id="<?= $id; ?>">
                     <i class="fa fa-check"></i> <?= cclang('pemindahan_selesai', ['Pemindahan']); ?>
                  </a>
               <?php endif; ?>

               <!-- Tombol Batal hanya ditampilkan jika status_transaksi == 1 -->
               <?php if ($show_batal_button): ?>
                  <a class="btn btn-flat btn-danger" id="btn_batal" href="javascript:void(0);" data-id="<?= $id; ?>">
                     <i class="fa fa-times"></i> <?= cclang('pemindahan_batal', ['Pemindahan']); ?>
                  </a>
               <?php endif; ?>
               </div>

               <!-- Modal Popup untuk Keterangan Selesai -->
               <div id="modal_selesai" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Keterangan Selesai</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="keterangan_selesai">Masukkan Keterangan:</label>
                           <textarea id="keterangan_selesai" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                           <label for="foto_selesai">Unggah Foto atau Ambil Gambar:</label>
                           <input type="file" id="foto_selesai" class="form-control" accept="image/*" capture="camera">
                           <small class="form-text text-muted">Unggah foto atau ambil gambar menggunakan kamera.</small>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success" id="submit_selesai">Selesai</button>
                     </div>
                  </div>
               </div>
               </div>

               <!-- Modal Popup untuk Keterangan Batal -->
               <div id="modal_batal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Keterangan Batal</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="keterangan_batal">Masukkan Keterangan Pembatalan:</label>
                           <textarea id="keterangan_batal" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                           <label for="foto_batal">Unggah Foto atau Ambil Gambar:</label>
                           <input type="file" id="foto_batal" class="form-control" accept="image/*" capture="camera">
                           <small class="form-text text-muted">Unggah foto atau ambil gambar menggunakan kamera.</small>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" id="submit_batal">Selesai</button>
                     </div>
                  </div>
               </div>
               </div>
         </div>
         <!-- /.col-xs-12 -->

      </div>		
     <!-- /.box-body -->

	</div>
	<!-- /.box -->

</section>

<script>// Menambahkan event listener untuk tombol selesai
$(document).on('click', '#btn_selesai', function(e) {
    e.preventDefault();
    
    // Tampilkan modal untuk input keterangan selesai
    $('#modal_selesai').modal('show');
});

// Menambahkan event listener untuk tombol batal
$(document).on('click', '#btn_batal', function(e) {
    e.preventDefault();
    
    // Tampilkan modal untuk input keterangan selesai
    $('#modal_batal').modal('show');
});

// Menambahkan event listener untuk tombol submit di modal
$(document).on('click', '#submit_selesai', function(e) {
    e.preventDefault();
    
    // Ambil keterangan yang diinputkan
    const keterangan = $('#keterangan_selesai').val().trim();
    const foto = $('#foto_selesai')[0].files[0];

    if (!keterangan) {
        alert('Keterangan tidak boleh kosong!');
        return;
    }

    if (!foto) {
        alert('Harap unggah foto!');
        return;
    }
    
    // Ambil ID transaksi dari tombol
    const id = $('#btn_selesai').data('id');
    if (!id) {
        alert('ID transaksi tidak ditemukan!');
        return;
    }

   const formData = new FormData();
   formData.append('keterangan_selesai', keterangan);
   formData.append('foto', foto);

   // Kirim data keterangan selesai dan update status transaksi
   $.ajax({
      url: '<?= admin_site_url('/pemindahan/selesai/'); ?>' + id,  // Pastikan URL sudah sesuai
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
            var json = JSON.parse(response);
            // Cek apakah update berhasil berdasarkan respons
            if (json.success) {

                // Update tampilan keterangan selesai di halaman
                $('#keterangan_selesai_display').text(keterangan);
               
                // Update status transaksi menjadi selesai (status 3)
                $('#status_transaksi').text('Selesai');
               
                // Tutup modal setelah update berhasil
                $('#modal_selesai').modal('hide');
                
                // Update tombol selesai, sembunyikan
                $('#btn_selesai').hide();
                
                // Update tombol batal, sembunyikan
                $('#btn_batal').hide();
                
                // Tampilkan pesan keterangan selesai berhasil
                $('.message').html('<div class="alert alert-success">Keterangan selesai berhasil diperbarui!</div>');
                            
            } else {
                // Jika ada masalah atau gagal, tampilkan pesan error
                alert('Gagal mengupdate status! Coba lagi.');
            }
        },
        error: function(xhr, status, error) {
            // Jika terjadi error dalam AJAX, tampilkan pesan error
            console.error('AJAX Error:', status, error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });

});



// Menambahkan event listener untuk tombol submit di modal
$(document).on('click', '#submit_batal', function(e) {
    e.preventDefault();
    
    // Ambil keterangan yang diinputkan
    const keterangan = $('#keterangan_batal').val().trim();
    const foto = $('#foto_batal')[0].files[0];
    
    if (!keterangan) {
        alert('Keterangan tidak boleh kosong!');
        return;
    }

   if (!foto) {
      alert('Harap unggah foto!');
      return;
   }
    
    // Ambil ID transaksi dari tombol
    const id = $('#btn_batal').data('id');
    if (!id) {
        alert('ID transaksi tidak ditemukan!');
        return;
    }

   const formData = new FormData();
   formData.append('keterangan_batal', keterangan);
   formData.append('foto', foto);

    // Kirim data keterangan selesai dan update status transaksi
    $.ajax({
        url: '<?= admin_site_url('/pemindahan/batal/'); ?>' + id,  // Pastikan URL sudah sesuai
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            var json = JSON.parse(response);
            // Cek apakah update berhasil berdasarkan respons
            if (json.success) {
   
                // Update tampilan keterangan batal di halaman
                $('#keterangan_batal_display').text(keterangan);
               
                // Update status transaksi menjadi batal (status 4)
                $('#status_transaksi').text('Batal');
               
                // Tutup modal setelah update berhasil
                $('#modal_batal').modal('hide');
                
                // Update tombol selesai, sembunyikan
                $('#btn_batal').hide();
                
                // Update tombol selesai, sembunyikan
                $('#btn_selesai').hide();
                
                // Tampilkan pesan keterangan batal berhasil
                $('.message').html('<div class="alert alert-success">Keterangan batal berhasil diperbarui!</div>');
                                
            } else {
                // Jika ada masalah atau gagal, tampilkan pesan error
                alert('Gagal mengupdate status! Coba lagi.');
            }
        },
        error: function(xhr, status, error) {
            // Jika terjadi error dalam AJAX, tampilkan pesan error
            console.error('AJAX Error:', status, error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });
});
</script>