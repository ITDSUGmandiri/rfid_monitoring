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
          <h3 class="box-title">DASHBOARD</h3>
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
                  <!-- <h3 class="box-title">PERGERAKAN ASET</h3> -->
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
                  <div class="col-md-2">
                    <?php

                    // Tampilkan hasil
                    echo "
                       <div class='info-box text-center bg-light-blue-active'>
        <h4 class='h1 font-weight-normal mb-3'>
          <i class='fas fa-file-alt indigo-text'></i>
          <span id='aset_teregister'>0</span>
        </h4>
        <p class='font-weight-normal text-muted text-white'>Total Aset </br>(Last 12 Month)</p>

      </div>";
                    ?>
                  </div>
                  <div class="col-md-2">
                    <?php

                    // Tampilkan hasil
                    echo "
                       <div class='info-box text-center bg-light-blue-active'>
        <h4 class='h1 font-weight-normal mb-3'>
          <i class='fas fa-file-alt indigo-text'></i>
          <span id='aset_total_pantau'>0</span>
        </h4>
        <p class='font-weight-normal text-muted text-white'>Total Aset</p>

      </div>";
                    ?>
                  </div>
                  <div class="col-md-2">
                    <?php

                    // Tampilkan hasil
                    echo "
                       <div class='info-box text-center bg-green-active'>
        <h4 class='h1 font-weight-normal mb-3'>
          <i class='fas fa-file-alt indigo-text'></i>
          <span id='aset_total_pantau'>0</span>
        </h4>
        <p class='font-weight-normal text-muted text-white'>Tersedia</p>

      </div>";
                    ?>
                  </div>
                  <div class=" col-md-2">
                    <?php

                    // Kueri untuk menghitung jumlah tape yang telah diperbarui kurang dari 2 hari yang lalu
                    echo "
                       <div class='info-box text-center bg-light-blue-active'>
        <h4 class='h1 font-weight-normal mb-3'>
          <i class='fas fa-file-alt indigo-text'></i>
          <span id='aset_total_pantau'>0</span>
        </h4>
        <p class='font-weight-normal text-muted text-white'>Peminjaman</p>

      </div>";
                    ?>
                  </div>
                  <div class="col-md-2">
                    <?php

                    // Kueri untuk menghitung jumlah tape yang telah diperbarui kurang dari 2 hari yang lalu
                    echo "
                       <div class='info-box text-center bg-light-blue-active'>
        <h4 class='h1 font-weight-normal mb-3'>
          <i class='fas fa-file-alt indigo-text'></i>
          <span id='aset_total_pantau'>0</span>
        </h4>
        <p class='font-weight-normal text-muted text-white'>Perpindahan</p>

      </div>";
                    ?>
                  </div>

                  <div class="col-md-2">
                    <?php

                    // Kueri untuk menghitung jumlah tape yang telah diperbarui kurang dari 2 hari yang lalu
                    echo "
                       <div class='info-box text-center bg-teal'>
        <h4 class='h1 font-weight-normal mb-3'>
          <i class='fas fa-file-alt indigo-text'></i>
          <span id='aset_total_pantau'>0</span>
        </h4>
        <p class='font-weight-normal text-muted text-white'>Perbaikan</p>

      </div>";
                    ?>
                  </div>
                </div>

              </div>

              <!-- <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">MONITORING READER</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        
                      </div>
                    </div>
                  </div>
                  <div id='librarian2'></div>
                </div>
              </div> -->
            </div>

          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Status Aset</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <canvas id="myChartSIMAN"></canvas>

                </div>

              </div>

            </div>
            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Aset Berdasarkan Ruangan</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <canvas id="myRoom"></canvas>

                </div>

              </div>

            </div>
            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Kategori Aset</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <canvas id="myCategory" width="150px" height="150px"></canvas>
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
    $('#aset_teregister, #sectiondashboard, #aset_total_pantau, #tape_total, #aset_anomali,#aset_mutasi,#aset_disposal, #tape_ontime, #tape_overdue, #tape_borrow, #tape_broken, #tape_anomaly').click(function() {
      var divId = $(this).attr('id'); // Mendapatkan ID div yang diklik
      var title = '';
      // Menggunakan ID div untuk memilih endpoint yang sesuai
      var endpoint = '';

      switch (divId) {
        case 'aset_teregister':
          endpoint = BASE_URL + '/administrator/dashboard/abc/gettotalpantau';
          title = 'TOTAL ASET YANG DIPANTAU';
          topic = 'pantau';
          break;
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
          topic = 'moving';
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
      showModalWithPagination(endpoint, title, topic);
    });

    // Fungsi untuk menampilkan modal dengan konten dari endpoint yang diberikan
    function showModalWithPagination(endpoint, title, topic) {

      // Lakukan request AJAX ke endpoint yang diberikan
      $.ajax({
        url: endpoint,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          // Proses data dan tampilkan dalam modal
          // Misalnya, Anda dapat membuat HTML untuk menampilkan data dalam bentuk tabel dan menambahkan pagination di dalamnya
          var modalContent = '<div class="modal-header"><h1>' + title + '</h1></div>'; // Contoh pembuatan konten modal
          modalContent += '<div class="modal-body">';
          // Misalnya, tampilkan data dalam bentuk tabel
          modalContent += '<table class="table">';

          if (topic == 'moving') {
            modalContent += '<tr><th>No</th><th>Tag Code</th><th>Kode Barang</th><th>NUP</th><th>Aset</th><th>Asal Ruangan</th><th></th></tr>';
          } else if (topic == 'ruangan') {
            modalContent += '<tr><th>No</th><th>Tag Code</th><th>Kode Barang</th><th>NUP</th><th>Aset</th><th></th></tr>';
          } else {
            modalContent += '<tr><th>No</th><th>Tag Code</th><th>Kode Barang</th><th>NUP</th><th>Aset</th><th>Lokasi</th><th></th></tr>';
          }

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
            if (topic == 'ruangan') {
              modalContent += '';
            } else {
              modalContent += '<td>' + item.name_room + '</td>';
            }


            // Misalnya, ambil field2 dari item
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
      $('#aset_teregister').text(data.totalpantau);
      $('#aset_total_pantau').text(data.total);
      $('#aset_anomali').text(data.sensus);
      $('#aset_mutasi').text(data.mutation);
      $('#aset_disposal').text(data.disposal);
      $('#tape_ontime').text(data.ontime);
      $('#tape_overdue').text(data.overdue);
      $('#tape_borrow').text(data.borrow);
      $('#tape_broken').text(data.broken);
      $('#tape_anomaly').text(data.anomaly);
    }

    $(document).on('click', '.xxx', function() {
      var divId = event.target.getAttribute("data-el");
      var roomName = decodeURI(event.target.getAttribute("name-room")).replace(/"/g, "");


      var title = '';
      // Menggunakan ID div untuk memilih endpoint yang sesuai
      var endpoint = '';

      // console.log('tape total');
      endpoint = BASE_URL + '/administrator/dashboard/abc/' + divId;
      title = 'ASET DI ' + roomName;
      topic = 'ruangan';

      showModalWithPagination(endpoint, title, topic);
    });

    function librarian(data) {
      var output = '';

      // Variabel untuk menyimpan nama bangunan terakhir
      var current_building = '';

      // Iterasi melalui setiap item dalam array 'librarian' di respons JSON
      data.librarian.forEach(function(item) {
        // console.log(item);
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
        output += "<div class='col-md-12 col-sm-8 col-xs-12'>";
        output += "<div class='bg-grey info-box'>";
        output += "<span id='sectiondashboard' class='xxx info-box-icon' data-el=" + item.id_room + " name-room=" + encodeURIComponent(JSON.stringify(item.building_name)) + ">" + item.total_rfid + "</span>";
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
        url: BASE_URL + '/administrator/dashboard/getSumAsetRoom',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          updateDashboard(data);
          // librarian(data);
          dChart.data.labels = data.labelcateg.map(item => [item.key_status]); // Mengganti labels
          dChart.data.datasets[0].data = data.labelcateg.map(item => item.total); // Mengganti data

          myChart1.data.labels = data.label.map(item => [item.ruangan]); // Mengganti labels
          myChart1.data.datasets[0].data = data.label.map(item => item.total); // Mengganti data

          myChart3.data.labels = data.labelkat.map(item => [item.kategori]); // Mengganti labels
          myChart3.data.datasets[0].data = data.labelkat.map(item => item.total); // Mengganti data

          dChart.update();
          myChart1.update();
          myChart3.update();
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
        console.log("xxx", data);
        // dChart.data.labels = data.labelcateg.map(item => [item.key_status]); // Mengganti labels
        // dChart.data.datasets[0].data = data.labelcateg.map(item => item.total); // Mengganti data
        // dChart.update();
        updateDashboard(data);
        // librarian(data);
        // readerradar(data);
      },
      error: function(xhr, status, error) {
        console.error("Failed to fetch data:", error);
      }
    });


    window.setInterval(function() {
      $.ajax({
        url: BASE_URL + '/administrator/dashboard/getSumAsetRoom',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          dChart.data.labels = data.labelcateg.map(item => [item.key_status]); // Mengganti labels
          dChart.data.datasets[0].data = data.labelcateg.map(item => item.total); // Mengganti data

          myChart1.data.labels = data.label.map(item => [item.ruangan]); // Mengganti labels
          myChart1.data.datasets[0].data = data.label.map(item => item.total); // Mengganti data

          myChart3.data.labels = data.labelkat.map(item => [item.kategori]); // Mengganti labels
          myChart3.data.datasets[0].data = data.labelkat.map(item => item.total); // Mengganti data

          dChart.update();
          myChart1.update();
          myChart3.update();
          updateDashboard(data);
          // librarian(data);
          // readerradar(data);


        },
        error: function(xhr, status, error) {
          console.error("Failed to fetch data:", error);
        }
      });
    }, 5000);


    var ctx2 = document.getElementById('myChartSIMAN').getContext('2d');
    var dChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        datasets: [{
          data: [],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
          ],
        }, ],
        labels: [],
      },
      options: {
        legend: {
          position: 'bottom',
          labels: {
            fontColor: "black",
            boxWidth: 20,
            padding: 20
          }
        },
        plugins: {
          datalabels: {
            formatter: (value) => {
              return value + '%';
            },
          },
        },
      },
    });

    var ctx1 = document.getElementById('myRoom').getContext('2d');
    var myChart1 = new Chart(ctx1, {
      type: 'pie',
      data: {
        datasets: [{
          data: [],
          backgroundColor: [

            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
          ],
        }, ],
        labels: [],
      },
      options: {
        legend: {
          position: 'bottom',
          labels: {
            fontColor: "black",
            boxWidth: 20,
            padding: 20
          }
        },
        plugins: {
          datalabels: {
            formatter: (value) => {
              return value + '%';
            },
          },
        },
      },
    });

    var ctx3 = document.getElementById('myCategory').getContext('2d');
    var myChart3 = new Chart(ctx3, {
      type: 'pie',
      data: {
        datasets: [{
          data: [],
          backgroundColor: [

            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
          ],
        }, ],
        labels: [],
      },
      options: {
        legend: {
          position: 'bottom',
          labels: {
            fontColor: "black",
            boxWidth: 20,
            padding: 20
          }
        },
        plugins: {
          datalabels: {
            formatter: (value) => {
              return value + '%';
            },
          },
        },
      },
    });

    // Inisialisasi chart dengan data dari PHP


    Chart.plugins.register({
      afterDatasetsDraw: function(chart, easing) {
        // To only draw at the end of animation, check for easing === 1
        var ctx = chart.ctx;
        if (chart.data.datasets[0].data.length < 1) {
          let ctx = chart.ctx;
          let width = chart.width;
          let height = chart.height;
          ctx.textAlign = "center";
          ctx.textBaseline = "middle";
          ctx.font = "26px Arial";
          ctx.fillText("No data to display", width / 2, height / 2);
          ctx.restore();
        }

        chart.data.datasets.forEach(function(dataset, i) {
          var meta = chart.getDatasetMeta(i);

          if (!meta.hidden) {
            meta.data.forEach(function(element, index) {
              // Draw the text in black, with the specified font
              ctx.fillStyle = '#FFF';

              var fontSize = 14;
              var fontStyle = 'bold';
              ctx.font = Chart.helpers.fontString(fontSize, fontStyle);

              // Just naively convert to string for now
              var dataString = dataset.data[index].toString();

              // Make sure alignment settings are correct
              ctx.textAlign = 'center';
              ctx.textBaseline = 'middle';

              var padding = -10;
              var position = element.tooltipPosition();
              ctx.fillText(dataString, position.x - (fontSize / 2) + 10, position.y - (fontSize / 2) - padding);
            });
          }
        });
      }
    });

    setInterval(newLibraraian, 5000);
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>