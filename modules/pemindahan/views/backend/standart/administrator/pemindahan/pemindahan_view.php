<script type="text/javascript">

var dataArrayAset = [];
var dataArrayAset2 = [];

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
               $show_search_button = ($status_transaksi <> 0); // Tombol selesai hanya muncul jika status bukan 3
               $show_clear_search_button = ($status_transaksi <> 0); // Tombol selesai hanya muncul jika status bukan 3
               $show_selesai_button = ($status_transaksi == 1); // Tombol selesai hanya muncul jika status bukan 3
               $show_batal_button = ($status_transaksi == 1); // Tombol selesai hanya muncul jika status bukan 3
               ?>
                          
               <div class="view-nav text-center">
                  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= admin_site_url('/pemindahan/'); ?>">
                     <i class="fa fa-undo"></i> <?= cclang('go_list_button', ['Pemindahan']); ?>
                  </a>

               <!-- Tombol search hanya ditampilkan jika status_transaksi == 1 -->
               <?php if ($show_search_button): ?>
                  <a class="btn btn-flat btn-default btn-action" id="btn_search_aset" href="javascript:void(0);" data-id="<?= $id; ?>">
                     <i class="fa fa"></i> <?= cclang('Search'); ?>
                  </a>
               <?php endif; ?>

               <!-- Tombol search hanya ditampilkan jika status_transaksi == 1 -->
               <?php if ($show_clear_search_button): ?>
                  <a class="btn btn-flat btn-default btn-action" id="btn_clear_search" href="javascript:void(0);" data-id="<?= $id; ?>">
                     <i class="fa fa"></i> <?= cclang('Clear Search'); ?>
                  </a>
               <?php endif; ?>

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

$('#btn_search_aset').click(async function (e) {
    e.preventDefault();

    // Ambil ID dari data-id di tombol
    const id = $('#btn_search_aset').data('id');
    
    // Cek apakah ID ditemukan
    if (!id) {
        alert('ID transaksi tidak ditemukan!');
        return;
    }

    try {
        console.log("ID yang dimasukkan:", id); // Log ID untuk debugging
        await getSearchAset(id); // Kirim ID ke fungsi getSearchAset
    } catch (error) {
        console.error("Error saat pencarian aset:", error);
    }
});

async function getSearchAset(id) {

var rowCount = $('#your_table_id tbody tr').length;
var no = rowCount + 1;
var string_id = "";

console.log("ID yang diterima di getSearchAset:", id);  // Log ID untuk debugging

try {
    const response = await $.ajax({
        url: `${ADMIN_BASE_URL}/pemindahan/get_search_aset?id=${id}`,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('Response from server:', data); // Debug respons
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error); // Debug error AJAX
        }
    });

    if (response.success) {

        if (response.data.length == 0) {

            await new Promise(resolve => {
                Swal.fire({
                    title: "Perhatian !",
                    text: "Data aset kosong !!",
                    icon: 'warning',
                    allowOutsideClick: false
                });
                resolve();
            });
            
            return false;

        }

        for (const item of response.data) {

            // Cek apakah kode_tid sudah ada dalam array
            let tidExists = dataArrayAset2.some(data => data.kode_tid === item.kode_tid);

            if (!tidExists) {

                // Menambahkan data ke array jika kode_tid belum ada
                dataArrayAset2.push({
                    id: item.id_aset,
                    kode_aset: item.kode_aset,
                    nup: item.nup,
                    nama_aset: item.nama_aset,
                    kode_tid: item.kode_tid
                });

                let rows = $("#your_table_id tbody tr");
                let found = false;

                for (let j = 0; j < rows.length; j++) {
                    // Cari kolom dengan id yang sama dengan tid
                    var hasilPencarianCell = $(rows[j]).find("td[id='" + item.kode_tid + "']");
                    
                    // Jika ditemukan kolom dengan id yang sesuai
                    if (hasilPencarianCell.length > 0) {
                        console.log('Data dengan TID ' + item.kode_tid + ' sudah ada');
                        found = true;
                        break;
                    }
                }

                if (!found) {
                    // tampilkan data di table hasil pencarian
                    await new Promise(resolve => {
                        $('#your_table_id tbody').append(`
                            <tr>    
                                <td id="numbering" style="text-align: center">${no}</td>
                                <td id="asset_id" style="text-align: center">${item.id_aset}</td>
                                <td id="asset_name" style="text-align: left">${item.nama_aset}</td>
                                <td id="asset_code" style="text-align: center">${item.kode_aset}</td>
                                <td id="asset_nup" style="text-align: center">${item.nup}</td>
                                <td id="asset_tid_${item.kode_tid}" style="text-align: center">${item.kode_tid}</td>
                                <td id="${item.kode_tid}" style="text-align: center; background-color: #FF0000">Not Available</td>
                                <td style="text-align: center">
                                </td>
                            </tr>
                        `);
                        resolve();
                    });

                    no = no + 1;
                }

            }

            string_id = string_id + "~" + item.id_aset;
            console.log(string_id);
            
        }

        // let jumlah_aset_with_tag = $('#your_table_id tbody tr').length;
        let jumlah_aset_with_tag = dataArrayAset2.length;

        $('#total_rfid_tag').html(jumlah_aset_with_tag);
        $('#total_aset_checklist').html(jumlah_aset_with_tag);
        $('#string_id').val(string_id);
        $('#data_array_aset').val(JSON.stringify(dataArrayAset2));

        fixingNumbering('partial');

        $('#chart_aset_real').html(jumlah_aset_with_tag);

        chart_aset_real = jumlah_aset_with_tag;

        return true;
    }

} catch (error) {
    console.error(error);
}
}

$('#btn_clear_search').click(function (e) {
    e.preventDefault();

    // Konfirmasi sebelum menghapus data
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menghapus semua data hasil pencarian?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            // Kosongkan dataArrayAset2
            dataArrayAset2 = [];
            console.log('Data array aset telah dihapus:', dataArrayAset2);

            // Kosongkan tabel hasil pencarian
            $('#your_table_id tbody').empty();

            // Reset nilai indikator dan elemen terkait
            $('#total_rfid_tag').html(0);
            $('#total_aset_checklist').html(0);
            $('#string_id').val('');
            $('#data_array_aset').val('');
            $('#chart_aset_real').html(0);
            chart_aset_real = 0;

            // Tampilkan pesan sukses
            Swal.fire({
                title: 'Berhasil',
                text: 'Data pencarian berhasil dihapus.',
                icon: 'success',
                allowOutsideClick: false
            });
        }
    });
});


</script>