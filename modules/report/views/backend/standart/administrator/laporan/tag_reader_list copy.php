 <style>
    .bagianprint {
       border-style: inset;
       padding: 50px;
    }

    .text-align-container {
       text-align: center;
       font-weight: bold;
       text-decoration: underline;
       /* Atur teks di tengah */
    }

    .label-container {
       display: flex;
       flex-direction: column;
       /* Susun ke bawah */
       font-weight: 200;
       gap: 1px;
       /* Jarak antar teks */
    }

    .text-align-container h3 {
       display: inline;
       /* Jadikan elemen dalam satu baris */
    }

    table {
       font-family: arial, sans-serif;
       border-collapse: collapse;
       width: 100%;
    }

    td {
       font-size: 14px;
       border: 1px solid #dddddd;
       text-align: center;
       padding: 8px;

    }

    th {
       font-size: 16px;
       border: 1px solid #dddddd;
       text-align: center;
       padding: 8px;

    }

    /* tr:nth-child(even) {
       background-color: #dddddd;
    } */

    form>h2 {
       color: #0094ff;
    }

    form>p:first-child {
       font-size: large;
    }

    .createPDF {
       font-size: 14px;
    }

    .loading {
       display: none;
       /* Tersembunyi secara default */
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       background: rgba(221, 215, 215, 0.7);
       z-index: 10;
       text-align: center;
       line-height: 100px;
       /* Sesuaikan dengan tinggi kontainer */
       font-size: 20px;
       color: #333;
    }
 </style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

 <section class="content-header">
    <h1>
       Data Laporan<small><?= cclang('list_all'); ?></small>
    </h1>
    <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active"><?= cclang('tag_reader') ?></li>
    </ol>
 </section>
 <!-- Main content -->
 <section class="content">
    <div class="row">

       <div class="col-md-12">
          <div class="box box-warning">
             <div class="box-body ">
                <div class="box box-widget widget-user-2">
                   <div class="widget-user-header ">
                      <div class="row pull-right">
                         <?php is_allowed('tag_reader_add', function () { ?>
                            <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('tag_reader')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/tag_reader/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('tag_reader')]); ?></a>
                         <?php }) ?>
                         <?php is_allowed('tag_reader_export', function () { ?>
                            <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('tag_reader') ?> " href="<?= admin_site_url('/tag_reader/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                         <?php }) ?>
                         <?php is_allowed('tag_reader_export', function () { ?>
                            <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('tag_reader') ?> " href="<?= admin_site_url('/tag_reader/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                         <?php }) ?>
                      </div>
                      <div class="widget-user-image">
                         <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">LAPORAN ASET</h3>
                      <h5 class="widget-user-desc"><?= cclang('list_all', 'Pergerakan Data Aset'); ?></h5>
                   </div>

                   <!-- /.widget-user -->
                   <div class="row">
                      <div class="col-md-12">
                         <!-- <div class="col-sm-2 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
                                 <option value="delete">Delete</option>
                              </select>
                           </div>
                           <div class="col-sm-2 padd-left-0 ">
                              <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                           </div> -->

                         <div class="col-sm-2 padd-left-0 ">
                            <select type="text" class="form-control chosen chosen-select" name="jenlap" id="jenlap" required>
                               <option value="">--Pilih Laporan--</option>
                               <option value="1">Laporan Sensus</option>
                               <option value="2">Laporan Transaksi</option>
                               <!--  <option value="3">Laporan Peminjaman</option>
                                  <option value="4">Laporan Transaksi</option> -->

                            </select>
                         </div>
                         <div class="col-sm-2 padd-left-0 " style="display: none;" id="rung">
                            <select class="form-control chosen chosen-select-deselect" name="room_id" id="ruangan" data-placeholder="Select Area" required>
                               <option value="">Pilih Ruangan</option>
                               <option value="99">Semua Ruangan</option>

                               <?php
                                 $conditions = [];
                                 ?>

                               <?php foreach (db_get_all_data('tb_master_ruangan', $conditions) as $row): ?>
                                  <option value="<?= $row->id ?>"><?= $row->ruangan; ?></option>
                               <?php endforeach; ?>
                            </select>
                         </div>
                         <div class="col-sm-2 padd-left-0" style="display: none;" id="transak">
                            <select class="form-control chosen chosen-select-deselect" name="trans_id" id="pilihtransaksi" data-placeholder="Select Transaksi">
                               <option value="">Pilih Jenis Transaksi</option>
                               <option value="99">Semua Transaksi</option>

                               <?php
                                 $conditions = [];
                                 ?>

                               <?php foreach (db_get_all_data('tb_master_type_transaksi', $conditions) as $row): ?>
                                  <option value="<?= $row->id ?>"><?= $row->tipe_transaksi; ?></option>
                               <?php endforeach; ?>
                            </select>
                         </div>
                         <div class="col-sm-2 padd-left-0 ">
                            <input type="text" id="daterange" name="detreng" class="form-control" placeholder="Pilih Rentang Tanggal">
                         </div>
                         <div class="col-sm-3 padd-left-0 ">
                            <button type="submit" class="btn btn-flat" name="submit" id="btnload" value="Apply" title="<?= cclang('filter_search'); ?>">
                               Load Data
                            </button>
                         </div>
                         <!-- <div class="col-sm-1 padd-left-0 ">
                            <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/ambildata'); ?>" title="<?= cclang('reset_filter'); ?>">
                               <i class="fa fa-undo"></i>
                            </a>
                         </div> -->

                         <div class="col-sm-1 padd-left-0  ">
                            <button class="btn btn-danger" class="html2PdfConverter" onclick="createPDF()">Download PDF </button>
                         </div>
                      </div>
                      <div class="col-md-4">
                         <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                            <div class="table-pagination"><?= $pagination; ?></div>
                         </div>
                      </div>
                   </div>
                   <div class="table-responsive" style="margin-top: 50px;">
                      <i>*ini adalah area review laporan (ukuran kertas berukuran legal)</i>

                      <div class="bagianprint" id="element-to-print">
                         <div class="loading">Sedang memuat data...</div> <!-- Overlay loading -->

                         <!-- Sample Table -->
                         <form class="form">

                            <h2><img src="<?= base_url('asset/img/icon/sekneglogodb.png') ?>" width="20%" /></h2>
                            <hr />
                            <div class="text-align-container">
                               <h3 style="display: inline; font-weight:bold" id="judullaporan"><strong>
                                     *Judul Laporan*
                                  </strong></h3>
                               <h3 style="display: inline; font-weight:bold" id="tahun"><strong></strong></h3>
                            </div>
                            <div class="label-container" style="margin-top: 30px;">
                               <label style="font-size: 16px;">Satuan Kerja&ensp;:&nbsp;<span>Sekretariat Negara</span>
                               </label>
                               <label style="font-size: 16px;">Periode&emsp;&emsp;&ensp;&nbsp;:&nbsp;<span id="periode"></span>
                               </label>
                               <!-- <label style="font-size: 16px;">Kategori&emsp;&emsp;&nbsp;&nbsp;:&nbsp;<span><i>*kategori aset</i></span>
                               </label> -->
                               <label id="arealabel" style="font-size: 16px;">Area&emsp;&emsp;&emsp;&emsp;&nbsp;:&nbsp;

                                  <span id="area">


                                  </span>

                               </label>
                               <label id="ruanglabel" style="font-size: 16px;">Ruangan&emsp;&emsp;&nbsp;:&nbsp;
                                  <span id="ruangans">

                                  </span>

                               </label>
                            </div>


                            <table id="bl">
                               <thead>
                                  <tr>
                                     <th colspan="4">Nomor</th>
                                     <th colspan="3">Spesifikasi Barang</th>
                                     <th rowspan="2">Tgl Perolehan</th>
                                     <th rowspan="2">Tgl Inventarisasi</th>
                                     <th rowspan="2">Lokasi Asal</th>
                                     <th rowspan="2">Kondisi</th>
                                     <th rowspan="2">Status</th>
                                     <th rowspan="2">Nilai Aset</th>
                                     <th rowspan="2">Keterangan</th>

                                  </tr>
                                  <tr>
                                     <th>No.</th>
                                     <th>Kode Aset.</th>
                                     <th>NUP.</th>
                                     <th>Kode RFID.</th>
                                     <th>Nama Aset</th>
                                     <th>Merk/Type</th>
                                     <th>Kategori</th>
                                  </tr>
                               </thead>
                               <tbody>
                               </tbody>
                            </table>

                         </form>
                         <!-- Sample Progressbar -->
                         <div>
                            <div class="progress">

                            </div>


                            <p style="font-size: 16px;">Dicetak&emsp;&emsp;: <?= date('d-m-Y H:i:s'); ?></br>
                               Admin&emsp;&emsp;&nbsp;&nbsp;: <?= $this->session->userdata('username'); ?></br>
                            </p>

                         </div>
                         <br><br>
                         <table>
                            <tr>
                               <td style="width: 50%;">
                                  <p>Mengetahui,</br>Kepala Bagian Bidang...<br><br><br><br><br><strong style=" text-decoration: underline; ">Nama Perorangan</strong><br>NIP:0000000001</p>
                               </td>

                               <td style="width: 50%;">
                                  <p>Penanggung Jawab Aset<br><br><br><br><br><br><strong style=" text-decoration: underline; ">Nama Perorangan</strong><br>NIP:0000000001</p>
                               </td>
                            </tr>
                         </table>
                      </div>
                   </div>
                </div>
                <hr>

             </div>
          </div>
       </div>
    </div>
 </section>
 <script>
    $(document).ready(function() {
       $('#jenlap').change(function() {
          if ($(this).val() === "1") {
             console.log("cd", $(this).val())
             $("#rung").show(); // Hanya select3 yang disable
             document.getElementById('transak').style.display = 'none';

          }
          if ($(this).val() === "2") {
             console.log("cd", $(this).val())
             document.getElementById('rung').style.display = 'none';
             document.getElementById('transak').style.display = 'block';

          }
       });


    });

    function createPDF() {
       const {
          jsPDF
       } = window.jspdf;

       // Ambil elemen HTML berdasarkan ID
       const content = document.getElementById('element-to-print');


       // Konversi elemen HTML menjadi gambar menggunakan html2canvas
       html2canvas(content).then((canvas) => {
          const imgData = canvas.toDataURL('image/png');
          const pdf = new jsPDF({
             orientation: 'portrait', // Atau 'landscape' untuk orientasi lanskap
             unit: 'mm', // Satuan dalam mm
             format: [216, 356] // Ukuran kertas Legal (216mm x 356mm)
          });

          const pageWidth = pdf.internal.pageSize.width; // 297 mm (A4 Landscape)
          const imgWidth = pageWidth - 20;
          const pageHeight = pdf.internal.pageSize.height; // Tinggi halaman PDF dalam mm
          const imgHeight = (canvas.height * imgWidth) / canvas.width; // Skala tinggi berdasarkan lebar

          let position = 10; // Posisi awal Y dalam PDF

          // Jika gambar lebih tinggi dari halaman PDF, tambahkan halaman baru
          pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);


          const pdfData = pdf.output('bloburl');
          window.open(pdfData, '_blank'); // Menampilkan preview PDF di tab baru

          //  // Simpan PDF
          //  pdf.save('laporan_aset' + $("#jenlap").val() + $("#daterange").val() + '.pdf');
       });


    }
 </script>

 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


 <script>
    function formatTanggal(tanggal) {
       const [year, month, day] = tanggal.split('-');
       return `${day}/${month}/${year}`;
    }

    $("#btnload").click(function(e) {

       var ruangan = document.getElementById('ruangan');
       var laporan = document.getElementById('jenlap');

       if (ruangan.value === '' || laporan.value === '') { //validasi pilihan ruangan dan jenis laporan
          alert('Harap pilih salah satu opsi ruangan dan jenis laporan!');
          e.preventDefault(); // Mencegah pengiriman formulir
       } else {
          e.preventDefault();
          const selectedID = $("#jenlap").val(); // Ambil nilai ID yang dipilih
          const selectedRoom = $("#ruangan").val(); // Ambil nilai ID yang dipilih

          let daterangeValue = $("#daterange").val();

          var $contentDiv = $('#element-to-print'); // Target area
          var $loading = $contentDiv.find('.loading'); // Elemen loading

          // Tampilkan loading
          $loading.show();

          // Pisahkan tanggal awal dan akhir
          let [startDatex, endDatex] = daterangeValue.split("-");
          let startYear = moment(startDatex, "MM/DD/YYYY").year();
          let endYear = moment(endDatex, "MM/DD/YYYY").year();



          const final = startYear === endYear ? startYear : startYear + "-" + endYear;
          $('#tahun').text(`Tahun ${final}`);
          $('#periode').text(`${endDatex}`);
          const bodylaporan = $("#bl tbody");
          const headlaporan = $("#bl thead");

          let no = 1; // Mulai dari nomor 1


          if (selectedID == 1) {

             document.getElementById('arealabel').style.display = 'block';
             document.getElementById('ruanglabel').style.display = 'block';
             $('#judullaporan').text("Laporan Data Inventarisasi Aset (Sensus)");

             headlaporan.empty();
             // Loop melalui data dan tambahkan baris ke tabel

             const row = `
             <tr>
                                     <th colspan="4">Nomor</th>
                                     <th colspan="3">Spesifikasi Barang</th>
                                     <th rowspan="2">Tgl Perolehan</th>
                                     <th rowspan="2">Tgl Inventarisasi</th>
                                     <th rowspan="2">Lokasi Asal</th>
                                     <th rowspan="2">Kondisi</th>
                                     <th rowspan="2">Status</th>
                                     <th rowspan="2">Nilai Aset</th>
                                     <th rowspan="2">Keterangan</th>

                                  </tr>
                                  <tr>
                                     <th>No.</th>
                                     <th>Kode Aset.</th>
                                     <th>NUP.</th>
                                     <th>Kode RFID.</th>
                                     <th>Nama Aset</th>
                                     <th>Merk/Type</th>
                                     <th>Kategori</th>
                                  </tr>
        `;
             headlaporan.append(row);

             $.ajax({
                url: ADMIN_BASE_URL + '/report/ambildata', // Ganti dengan URL controller Anda
                type: 'POST',
                dataType: 'json', // Minta respons dalam format JSON
                data: {
                   jenlap: selectedID,
                   room_id: selectedRoom,
                   detreng: $("#daterange").val()
                }, // Kirim data ke controller
                success: function(response) {
                   $loading.hide();

                   if (response.area.length === 0) {
                      $('#area').text("Semua Area");
                      $('#ruangans').text("Semua Ruangan");
                   } else {
                      response.area.forEach((item, index) => {
                         $('#area').text(item.area + '/' + item.gedung);
                         $('#ruangans').text(item.ruangan);
                      });
                   }

                   if (Array.isArray(response.list_aset)) {
                      // Hanya akses .length jika data adalah array
                      bodylaporan.empty();
                      // Loop melalui data dan tambahkan baris ke tabel
                      response.list_aset.forEach((item, index) => {
                         const row = `
            <tr>
             <td>${no}</td>
                <td>${item.kode_aset}</td>
                <td>${item.nup}</td>
                <td>${item.kode_tid}</td>
               <td>${item.nama_aset}</td>
               <td>${item.merk}/${item.tipe}</td>
               <td>${item.kategori}</td>
               <td>${formatTanggal(item.tglperolehan)}</td>
               <td>${formatTanggal(item.tglsensus)}</td>
               <td>${item.ruangan}</td>
               <td>${item.kondisi}</td>
               <td>${item.status}</td>
               <td>${item.nilai_perolehan}</td>
                                        <td></td>

            </tr>
        `;
                         bodylaporan.append(row);
                         no++;
                      });

                   } else if (typeof data === 'object') {
                      // Jika data adalah objek
                      console.log('Data received is an object:', data);
                      // Lakukan sesuatu dengan objek
                   } else {
                      console.error('Data format is not correct!');
                   }



                   // Bisa lakukan sesuatu dengan response, misalnya tampilkan pesan atau perbarui elemen lain
                },
                error: function(xhr, status, error) {
                   $loading.hide();
                   console.log("Error: " + error);
                }
             });
          } else if (selectedID == 2) {
             document.getElementById('arealabel').style.display = 'none';
             document.getElementById('ruanglabel').style.display = 'none';
             // Jika tidak ada ID yang dipilih, tampilkan pesan default
             $('#judullaporan').text("Laporan Data Transaksi Seluruh Aset");

             headlaporan.empty();
             // Loop melalui data dan tambahkan baris ke tabel

             const row = `
             <tr>
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">No. Transaksi</th>
                                     <th colspan="2">Spesifikasi Barang</th>
                                     <th rowspan="2">Jenis Transaksi</th>
                                     <th colspan="2">Tanggal/Waktu</th>
                                     <th rowspan="2">Asal</th>
                                     <th rowspan="2">Tujuan</th>
                                      <th rowspan="2">Keterangan</th>
                                     <th rowspan="2">Status Akhir</th>
                                 
                                    

                                  </tr>
                                  <tr>
                                     <th>Kode RFID</th>
                                     <th>Aset</th>
                                     <th>Transaksi</th>
                                     <th>Jam</th>
                                  </tr>
        `;
             headlaporan.append(row);

             $.ajax({
                url: ADMIN_BASE_URL + '/report/ambiltransaksi', // Ganti dengan URL controller Anda
                type: 'POST',
                dataType: 'json', // Minta respons dalam format JSON
                data: {
                   jenlap: selectedID,
                   room_id: selectedRoom,
                   detreng: $("#daterange").val()
                }, // Kirim data ke controller
                success: function(response) {
                   console.log("gg", response);
                   $loading.hide();

                   //  if (response.area.length === 0) {
                   //     $('#area').text("Semua Area");
                   //     $('#ruangans').text("Semua Ruangan");
                   //  } else {
                   //     response.area.forEach((item, index) => {
                   //        $('#area').text(item.area + '/' + item.gedung);
                   //        $('#ruangans').text(item.ruangan);
                   //     });
                   //  }

                   if (Array.isArray(response.transaksi)) {
                      // Hanya akses .length jika data adalah array
                      bodylaporan.empty();
                      // Loop melalui data dan tambahkan baris ke tabel
                      response.transaksi.forEach((item, index) => {
                         const row = `
                            <tr>
                            <td>${no}</td>
                                                           <td>${item.id}</td>

                             
                               <td>${item.rfid}</td>
                               <td style="
    text-align: left;
    width: 90%;
">${item.asetnya}</td>
                               <td style="
    width: 20%;
">${item.tipe}</td>
                            
                               <td>${item.tgl_trans}</td>
                               <td>${item.time_trans}</td>
                               <td>${item.ruangawal ?? '-'}</td>
                               <td>${item.ruangtujuan ?? '-'}</td>
                               <td>${item.ket_transaksi2 ?? 'tidak ada keterangan'}\n${item.tgl_akhir ?? ''}\n${item.waktu_akhir ?? ''}</td>
                               <td>${item.statusnya == 1 ? 'Open' : item.statusnya == 2 ? 'Progress' : item.statusnya == 3 ? 'Completed' : 'Cancel'}</td>

                            </tr>
                      `;
                         bodylaporan.append(row);
                         no++;
                      });

                   } else if (typeof data === 'object') {
                      // Jika data adalah objek
                      console.log('Data received is an object:', data);
                      // Lakukan sesuatu dengan objek
                   } else {
                      console.error('Data format is not correct!');
                   }



                   // Bisa lakukan sesuatu dengan response, misalnya tampilkan pesan atau perbarui elemen lain
                },
                error: function(xhr, status, error) {
                   $loading.hide();
                   console.log("Error: " + error);
                }
             });

          } else {
             $('#judullaporan').text("Laporan Aset");

          }
       }

    });

    //untuk load libary calendar
    $('input[name="detreng"]').daterangepicker();
 </script>