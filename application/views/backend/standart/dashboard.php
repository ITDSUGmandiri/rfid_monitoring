<?php
// Di awal skrip PHP Anda
ini_set('display_errors', 0); // Menyembunyikan pesan error dari tampilan publik
ini_set('log_errors', 1); // Mengaktifkan logging error ke file log PHP
ini_set('error_log', '/lokasi/penyimpanan/error.log'); // Menentukan lokasi penyimpanan file log error

// Memuat CI instance
$CI = &get_instance();

?>

<style type="text/css">
  .widget-user-header {
    padding-left: 20px !important;
  }

  .bgcard {
    background-color: burlywood;
  }

  .readerOn {
    background-color: #008d4c;
  }


  .warning {
    color: #fff;
    animation: blink 1s infinite;
    /* Animasi dengan nama 'blink', durasi 1 detik, dan diulang secara tak terbatas (infinite) */
  }

  @keyframes blink {
    0% {
      background-color: #76C594;
    }

    /* Warna latar belakang pada awal animasi */
    50% {
      background-color: #008d4c;
    }

    /* Warna latar belakang di tengah animasi */
    100% {
      background-color: #76C594;
    }

    /* Warna latar belakang pada akhir animasi, sama seperti awal */
  }

  .warning2 {
    color: #fff;
    animation: blink2 1s infinite;
    /* Animasi dengan nama 'blink', durasi 1 detik, dan diulang secara tak terbatas (infinite) */
  }

  @keyframes blink2 {
    0% {
      background-color: #FFB075;
    }

    /* Warna latar belakang pada awal animasi */
    50% {
      background-color: #ff851b;
    }

    /* Warna latar belakang di tengah animasi */
    100% {
      background-color: #FFB075;
    }

    /* Warna latar belakang pada akhir animasi, sama seperti awal */
  }

  .info-box-text {
    margin-top: 0px !important;
    font-size: 22px !important;
  }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
  <!-- <h1>
    <?= cclang('DASHBOARD INVENTORY ASET') ?>
    <small>

      <?= cclang('Dashboard') ?>
    </small>
  </h1> -->
  <!-- <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard">
        </i>
        <?= cclang('home') ?>
      </a>
    </li>
    <li class="active">
      <?= cclang('dashboard') ?>
    </li>
  </ol> -->
</section>

<section class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">ISTANA NEGARA JAKARTA</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chart-responsive">

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-body" role="document">
              <div class="modal-content">
                <!-- Konten modal akan ditampilkan di sini -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">POSISI ASET</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <!-- Konten modal akan ditampilkan di sini -->
                      </div>
                    </div>
                  </div>
                  <div id='librarian'></div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">PERGERAKAN ASET</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <!-- Konten modal akan ditampilkan di sini -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">

                      <?php

                      // Tampilkan hasil
                      echo "
                  <div class='info-box bg-grey'>
                      <span id='tape_total' class='info-box-icon'></span>
                      <div class='info-box-content'>
                          <span class='info-box-text'>Total Aset</span>
                          <div class='progress'>
                              <div class='progress-bar' style='width: 50%'></div>
                          </div>
                          <span class='progress-description'>
                              Total Aset Yang Sudah Di Inventarisasi & Untuk Di Pantau.
                          </span>
                      </div>
                  </div>";

                      // Kueri untuk menghitung jumlah tape yang telah diperbarui kurang dari 2 hari yang lalu
                      echo "
                  <div class='info-box bg-olive'>
                      <span id='tape_ontime' class='info-box-icon'></span>
                      <div class='info-box-content'>
                          <span class='info-box-text'>ASET MOVING (On Time)</span>
                          <div class='progress'>
                              <div class='progress-bar' style='width: 50%'></div>
                          </div>
                          <span class='progress-description'>
                              Total Aset Yang Sedang Moving Kondisi Normal.
                          </span>
                      </div>
                  </div>";

                      /// Kueri untuk menghitung jumlah tape yang telah diperbarui lebih dari 2 hari yang lalu

                      //     echo "
                      // <div class='info-box bg-yellow'>
                      //     <span id='tape_overdue' class='info-box-icon'></span>
                      //     <div class='info-box-content'>
                      //         <span class='info-box-text'>ASET MOVING (Overdue 2 Days)</span>
                      //         <div class='progress'>
                      //             <div class='progress-bar' style='width: 50%'></div>
                      //         </div>
                      //         <span class='progress-description'>
                      //             Total Aset Yang Sedang Moving Lewat 2 Hari.
                      //         </span>
                      //     </div>
                      // </div>";

                      // Query count dari tabel pinjam
                      echo "
                  <div class='info-box bg-blue'>
                    <span id='tape_borrow' class='info-box-icon'></span>
                    <div class='info-box-content'>
                      <span class='info-box-text'>ASET PINJAMAN</span>
    
                      <div class='progress'>
                        <div class='progress-bar' style='width: 50%'></div>
                      </div>
                      <span class='progress-description'>
                        Total Kondisi Aset Yang Sedang Di Pinjam.
                      </span>
                    </div>
                  </div>";

                      // Query count dari tabel pinjam
                      echo "
                  <div class='info-box bg-red'>
                    <span id='tape_broken' class='info-box-icon'></span>
                    <div class='info-box-content'>
                      <span class='info-box-text'>ASET RUSAK</span>
    
                      <div class='progress'>
                        <div class='progress-bar' style='width: 50%'></div>
                      </div>
                      <span class='progress-description'>
                        Total Kondisi Aset Yang Rusak/Perbaikan.
                      </span>
                    </div>
                  </div>";


                      ?>

                    </div>
                    <!-- <div class="col-md-6"><canvas id="myChart" width="400" height="250"></canvas></div> -->

                    <div class="col-md-6">
                      <?php

                      // Tampilkan hasil
                      //     echo "
                      // <div class='info-box bg-white'>
                      //     <span id='aset_anomali' class='info-box-icon'></span>
                      //     <div class='info-box-content'>
                      //         <span class='info-box-text'>Total Aset Anomali</span>
                      //         <div class='progress'>
                      //             <div class='progress-bar' style='width: 50%'></div>
                      //         </div>
                      //         <span class='progress-description'>
                      //             Total Aset Yang datanya tidak sesuai atau tidak lengkap.
                      //         </span>
                      //     </div>
                      // </div>";

                      // Kueri untuk menghitung jumlah tape yang telah diperbarui kurang dari 2 hari yang lalu
                      echo "
                  <div class='info-box bg-orange'>
                      <span id='aset_mutasi' class='info-box-icon'></span>
                      <div class='info-box-content'>
                          <span class='info-box-text'>ASET MUTASI</span>
                          <div class='progress'>
                              <div class='progress-bar' style='width: 50%'></div>
                          </div>
                          <span class='progress-description'>
                              Total Aset Yang Sudah Pindah Ruangan Atau Penanggung Jawab.
                          </span>
                      </div>
                  </div>";

                      // Query count dari tabel pinjam
                      echo "
                          <div class='info-box bg-grey'>
                            <span id='aset_disposal' class='info-box-icon'></span>
                            <div class='info-box-content'>
                              <span class='info-box-text'>DISPOSAL ASET</span>

                              <div class='progress'>
                                <div class='progress-bar' style='width: 50%'></div>
                              </div>
                              <span class='progress-description'>
                                Total Aset Yang akan atau sudah dihapus atau dijual.
                              </span>
                            </div>
                          </div>";

                      // Query count dari tabel pinjam
                      echo "
              <div class='info-box bg-black'>
                <span id='tape_anomaly' class='info-box-icon'></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>KOREKSI ASET</span>

                  <div class='progress'>
                    <div class='progress-bar' style='width: 50%'></div>
                  </div>
                  <span class='progress-description'>
                    Total Kondisi Aset Yang Salah Ruangan atau Pemilik.
                  </span>
                </div>
              </div>";
                      ?>

                    </div>
                  </div>

                  <!--  -->


                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">MONITORING READER</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <!-- Konten modal akan ditampilkan di sini -->
                      </div>
                    </div>
                  </div>
                  <div id='librarian2'></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"></script>

<!-- Skrip JavaScript -->
<script>
  $(document).ready(function() {

    const ws = new WebSocket("ws://localhost:3000");

    ws.onopen = function() {
      console.log("Connected to WebSocket server");
    };

    ws.onmessage = function(event) {
      const message = JSON.parse(event.data);
      newLibraraian();
      console.log(message);
      // updateDashboard(message);
    };

    ws.onclose = function() {
      console.log("Connection closed");
    };

    // Fungsi untuk menampilkan modal saat div dengan ID tertentu diklik
    $('#tape_total, #aset_anomali,#aset_mutasi,#aset_disposal, #tape_ontime, #tape_overdue, #tape_borrow, #tape_broken, #tape_anomaly').click(function() {
      var divId = $(this).attr('id'); // Mendapatkan ID div yang diklik
      var title = '';
      // Menggunakan ID div untuk memilih endpoint yang sesuai
      var endpoint = '';
      switch (divId) {
        case 'tape_total':
          // console.log('tape total');
          endpoint = BASE_URL + '/administrator/dashboard/abc/total';
          title = 'TOTAL TAPE';
          break;
        case 'aset_anomali':
          endpoint = BASE_URL + '/administrator/dashboard/abc/anomali';
          title = 'TOTAL ANOMALI';
          break;
        case 'aset_mutasi':
          endpoint = BASE_URL + '/administrator/dashboard/abc/mutation';
          title = 'TOTAL MUTASI';
          break;
        case 'aset_disposal':
          endpoint = BASE_URL + '/administrator/dashboard/abc/disposal';
          title = 'TOTAL HAPUS';
          break;
        case 'tape_ontime':
          endpoint = BASE_URL + '/administrator/dashboard/abc/ontime';
          title = 'ASET BERGERAK';
          break;
        case 'tape_overdue':
          endpoint = BASE_URL + '/administrator/dashboard/abc/overdue';
          title = 'TAPE OVER DUE';
          break;
        case 'tape_borrow':
          endpoint = BASE_URL + '/administrator/dashboard/abc/borrow';
          title = 'TAPE DIPINJAM';
          break;
        case 'tape_broken':
          endpoint = BASE_URL + '/administrator/dashboard/abc/broken';
          title = 'TAPE RUSAK';
          break;
        case 'tape_anomaly':
          endpoint = BASE_URL + '/administrator/dashboard/abc/koreksi';
          title = 'KOREKSI ASET';
          break;
        default:
          endpoint = '';
      }

      // Memanggil fungsi untuk menampilkan modal dengan konten dari endpoint yang sesuai
      showModalWithPagination(endpoint, title);
    });

    // Fungsi untuk menampilkan modal dengan konten dari endpoint yang diberikan
    function showModalWithPagination(endpoint, title) {

      // Lakukan request AJAX ke endpoint yang diberikan
      $.ajax({
        url: endpoint,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log("mm", data);
          // Proses data dan tampilkan dalam modal
          // Misalnya, Anda dapat membuat HTML untuk menampilkan data dalam bentuk tabel dan menambahkan pagination di dalamnya
          var modalContent = '<div class="modal-header"><h1>' + title + '</h1></div>'; // Contoh pembuatan konten modal
          modalContent += '<div class="modal-body">';
          // Misalnya, tampilkan data dalam bentuk tabel
          modalContent += '<table class="table">';
          modalContent += '<tr><th>No</th><th>Tag Code</th><th>Kode Barang</th><th>NUP</th><th>Aset</th><th>Ruangan Seharusnya</th><th>Ruangan Saat Ini</th><th></th></tr>';
          // Proses data dari respons JSON dan tambahkan ke dalam tabel
          // Misalnya, untuk setiap item dalam data, tambahkan baris baru ke tabel
          data.forEach(function(item, index) {
            var no = index + 1;
            // Misalnya, tambahkan baris baru dengan data item ke dalam tabel
            modalContent += '<tr>';
            modalContent += '<td>' + no + '</td>';
            modalContent += '<td>' + item.tag_code + '</td>'; // Misalnya, ambil field1 dari item
            modalContent += '<td>' + item.kode_brg + '</td>'; // Misalnya, ambil field2 dari item
            modalContent += '<td>' + item.nup + '</td>'; // Misalnya, ambil field2 dari item
            modalContent += '<td>' + item.nama_brg + '</td>'; // Misalnya, ambil field2 dari item
            modalContent += '<td>' + item.room2 + '</td>'; // Misalnya, ambil field2 dari item
            modalContent += '<td>' + item.room1 + '</td>';
            modalContent += '<td><button onclick="#">Rekonsiliasi</button></td>'; // Misalnya, ambil field2 dari item
            // Lanjutkan untuk setiap field yang diperlukan
            modalContent += '</tr>';
          });
          modalContent += '</table>';
          modalContent += '</div>';
          // Tambahkan tombol pagination di bagian bawah modal jika diperlukan
          // Misalnya, Anda dapat menambahkan tombol Next dan Previous untuk pagination
          modalContent += '<div class="modal-footer">';
          // modalContent += '<button type="button" class="btn btn-secondary">Previous</button>';
          // modalContent += '<button type="button" class="btn btn-secondary">Next</button>';
          modalContent += '</div>';

          // Tampilkan modal dengan konten yang telah dibuat
          $('#myModal').modal('show');
          $('.modal-content').html(modalContent);
        },
        error: function(xhr, status, error) {
          console.error("Failed to fetch data:", error);
        }
      });
    }

    function updateDashboard(data) {
      // console.log(data);
      $('#tape_total').text(data.total);
      $('#aset_anomali').text(data.anomali);
      $('#aset_mutasi').text(data.mutation);
      $('#aset_disposal').text(data.disposal);
      $('#tape_ontime').text(data.ontime);
      $('#tape_overdue').text(data.overdue);
      $('#tape_borrow').text(data.borrow);
      $('#tape_broken').text(data.broken);
      $('#tape_anomaly').text(data.anomaly);
    }

    function librarian(data) {
      var output = '';

      // Variabel untuk menyimpan nama bangunan terakhir
      var current_building = '';

      // Iterasi melalui setiap item dalam array 'librarian' di respons JSON
      data.librarian.forEach(function(item) {
        // Jika nama bangunan tidak sama dengan nama bangunan saat ini, tambahkan pemisah (div row)
        if (item.building_name !== current_building) {
          if (current_building !== '') {
            output += "</div>"; // Menutup row sebelumnya
          }
          output += "<div class='row'>";
          // output += "<div class='col-md-12'><h2>" + item.building_name + "</h2></div>"; // Tambahkan pemisah
          current_building = item.building_name; // Perbarui nama bangunan saat ini
        }

        // Tambahkan informasi librarian ke output HTML
        output += "<div class='col-md-4 col-sm-8 col-xs-12'>";
        output += "<div class='bg-grey info-box'>";
        output += "<span id='" + item.room_id + "' class='info-box-icon'>" + item.total_rfid + "</span>";
        output += "<div class='info-box-content'>";
        output += "<span class='info-box-text'>" + item.name_room + "</span>";
        output += "<div class='progress'>";
        output += "<div class='progress-bar' style='width: 95%'></div>";
        output += "</div>";
        output += "<span class='progress-description'>" + item.building_name + "</span>";

        output += "</div></div></div>";
      });

      // Menutup div terakhir jika ada
      if (current_building !== '') {
        output += "</div>"; // Menutup row terakhir
      }

      // Memasukkan output HTML ke dalam elemen dengan ID tertentu
      $('#librarian').html(output);
    }

    function readerradar(data) {
      var output = '';

      // Variabel untuk menyimpan nama bangunan terakhir
      var current_building = '';

      // Iterasi melalui setiap item dalam array 'librarian' di respons JSON
      data.librarian.forEach(function(item) {
        // Jika nama bangunan tidak sama dengan nama bangunan saat ini, tambahkan pemisah (div row)
        if (item.building_name !== current_building) {
          if (current_building !== '') {
            output += "</div>"; // Menutup row sebelumnya
          }
          output += "<div class='row'>";
          // output += "<div class='col-md-12'><h2>" + item.building_name + "</h2></div>"; // Tambahkan pemisah
          current_building = item.building_name; // Perbarui nama bangunan saat ini
        }

        // Tambahkan informasi librarian ke output HTML
        output += "<div class='col-md-4 col-xs-12'>";
        output += "<div class='bgcard info-box'>";

        output += "<span id='" + item.room_id + "' class='readerOn info-box-icon' style='font-size:14px'>" + "Reader A" + "</span>";
        output += "<span id='" + item.room_id + "' class='warning2 info-box-icon' style='font-size:14px'>" + "Reader B" + "</span>";
        output += "<div class='info-box-content'>";
        output += "<span class='info-box-text' style='text-wrap: wrap; text-align: center'>" + item.name_room + "</span>";

        output += "</div></div></div>";
      });

      // Menutup div terakhir jika ada
      if (current_building !== '') {
        output += "</div>"; // Menutup row terakhir
      }

      // Memasukkan output HTML ke dalam elemen dengan ID tertentu
      $('#librarian2').html(output);
    }

    function newLibraraian() {
      $.ajax({
        url: BASE_URL + '/administrator/dashboard/reza',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          updateDashboard(data);
          librarian(data);

          myChart.data.labels = data.label; // Mengganti labels
          myChart.data.datasets[0].data = data.values; // Mengganti data

          // Memperbarui chart
          myChart.update();
        },
        error: function(xhr, status, error) {
          console.error("Failed to fetch data:", error);
        }
      });
    }

    // Panggil fungsi AJAX saat halaman dimuat
    $.ajax({
      url: BASE_URL + '/administrator/dashboard/getSumAsetRoom',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        updateDashboard(data);
        librarian(data);
        readerradar(data);

        myChart.data.labels = data.label; // Mengganti labels
        myChart.data.datasets[0].data = data.values; // Mengganti data

        // Memperbarui chart
        myChart.update();
      },
      error: function(xhr, status, error) {
        console.error("Failed to fetch data:", error);
      }
    });

    // Inisialisasi chart dengan data dari PHP
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [{
          label: 'Jumlah',
          data: [],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value, index, values) {
                return Number.isInteger(value) ? value : '';
              }
            }
          }
        },
        plugins: {
          tooltip: {
            callbacks: {
              label: function(context) {
                var label = context.dataset.label || '';
                if (label) {
                  label += ': ';
                }
                if (context.parsed.y !== null) {
                  label += context.parsed.y.toLocaleString();
                }
                return label;
              }
            }
          }
        }
      }
    });
    setInterval(newLibraraian, 1000);
  });
</script>