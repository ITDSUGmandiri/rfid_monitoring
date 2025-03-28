<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Rekon Sensus Aset</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">-->
  <link href="<?php echo base_url(); ?>asset/templates/adminlte-2-3-11/dist/css/normalize.min.css" rel="stylesheet"
    type="text/css" />

  <!-- Load paper.css for happy printing -->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">-->
  <link href="<?php echo base_url(); ?>asset/templates/adminlte-2-3-11/dist/css/paper.css" rel="stylesheet" type="text/css" />

  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12pt;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo {
            width: 100px;
            height: 100px;
            background-color: #efefef;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .instansi {
            font-size: 14pt;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .alamat {
            font-size: 11pt;
            margin-bottom: 5px;
        }
        
        .kontak {
            font-size: 11pt;
            margin-bottom: 20px;
        }
        
        .judul-laporan {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .tanggal-cetak {
            text-align: center;
            margin-bottom: 20px;
        }
        
        /* table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        } */
        
        /* th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        } */
        
        th {
            background-color: #f2f2f2;
        }
        
        .footer {
            margin-top: 50px;
        }
        
        .page-number {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .ttd-container {
            float: right;
            text-align: center;
            margin-right: 50px;
        }
        
        .ttd-title {
            margin-bottom: 120px;
        }
        
        .ttd-nama {
            text-decoration: underline;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .ttd-nip {
            font-size: 11pt;
        }

        hr {
            border-top: 3px double #000;
            margin: 20px 0;
        }
  </style>

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page {
      size: A4 landscape
    }
  </style>

  <style>
    header,
    footer {
      position: absolute;
      left: 0;
      right: 0;
      background-color: white;
      padding-right: 0.5cm;
      padding-left: 0.5cm;
    }

    header {
      top: 0;
      padding-top: 5mm;
      padding-bottom: 3mm;
    }

    footer {
      bottom: 0;
      color: #000;
      padding-top: 0.5mm;
      padding-bottom: 0.5mm;
    }


    /*
      @media print {
        
        body, page {
          margin: 0;
          box-shadow: 0;
        }
        
        header, footer {
          position: fixed;
          left: 0;
          right: 0;
          background-color: white;
          padding-right: 0.5cm;
          padding-left: 0.5cm;
        }

      }
      */

    .halaman {
      padding: 0.5cm;
    }

    .table-footer {
      font-size: 9px;
    }

    /* table border-color:inherit; */
    .tg {
      border-collapse: collapse;
      border-spacing: 0;
      padding: 100px;
    }

    .tg td {
      font-family: Arial, sans-serif;
      font-size: 9px;
      padding: 8px 4px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: black;
    }

    .tg th {
      font-family: Arial, sans-serif;
      font-size: 9px;
      font-weight: bold;
      padding: 5px 5px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: black;
    }

    .tg .tg-kali {
      font-family: Arial, sans-serif;
      font-size: 10px;
      font-weight: bold;
      padding: 5px 5px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: black;
    }

    .tg .tg-0pky {
      text-align: left;
      vertical-align: center
    }

    .tg .tg-0lax {
      text-align: center;
      vertical-align: center
    }

    .tg .tg-0knn {
      text-align: right;
      vertical-align: center
    }
  </style>

  <style type="text/css">
    html {
      font-family: helvetica;
    }

    #background {
      position: absolute;
      z-index: 0;
      background: white;
      display: block;
      min-height: 50%;
      min-width: 50%;
      color: yellow;
    }

    #bg-text {
      color: lightgrey;
      font-size: 120px;
      transform: rotate(300deg);
      -webkit-transform: rotate(300deg);
    }
  </style>

</head>

<body class="A4 landscape">

  <?php
    $no = 1;
	  $number_page = 0;
    $max = count($tb_detail_transaksi);
    $total_biaya_ds = 0;
    $total_biaya_lalamove = 0;
    $total_fee_rs = 0;
    // $persentase_fee_rs = $fee_faskes;
    $pembagi_mod = 13;
    $total_uang_tunai = 0;
    $total_uang_non_tunai = 0;

    //echo '<pre>';
		//echo print_r($laporan_list);
    //echo '</pre>';
    
    //exit;

    foreach ($tb_detail_transaksi as $val){ ?>

  <?php 
        if(($no == 1 || $no % $pembagi_mod == 0)){
          $number_page++;
      ?>

  <!--<page size="legal" layout="landscape">-->

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-0.5mm">

    <header>

      <table style="width:100%;">
        <tr>
          <td width="10%" align="middle" rowspan="4">
            <!--<div class="logo">-->
            <img src="<?php echo base_url(); ?>asset/img/icon/logosekneg.png" alt="generic business logo" height="110"
              width="160" />
            <!--</div>-->
          </td>
          <td valign="bottom" height="0.1">
            <div style="font-weight: bold; padding-top: 10px; padding-bottom: 0px; font-size: 15pt;">KEMENTERIAN SEKRETARIAT NEGARA REPUBLIK INDONESIA</div>
          </td>
        </tr>

        <tr>
          <td valign="top" height="0.1">
            <div style="font-weight: bold; padding-top: 0px; padding-bottom: 0px; font-size: 11pt;">
              <!-- <?php echo $ds_alamat; ?> -->
               Jalan Veteran No. 17-18, Jakarta Pusat 10110
            </div>
          </td>
        </tr>

        <tr>
          <td valign="top" height="0.0">
            <div style="font-weight: bold; padding-top: 0px; padding-bottom: 0px; font-size: 11pt;">Telepon: (021) 3832269 | Email: humas@setneg.go.id | Website : https://www.setneg.go.id/
            </div>
          </td>
        </tr>

      </table>

    </header>

    <div class="halaman">

      <br><br><br><br><br><br>

      <table style="width:100%;">
        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 25px; padding-bottom: 0px; padding-left: 10px;"><span
                style="font-weight: bold; font-size: 10pt;">Laporan Rekon Sensus</span></div>
          </td>
        </tr>

        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 2px; padding-bottom: 0px; padding-left: 10px;">
              <span style="font-weight: bold; font-size: 8pt;">Tanggal: <?php echo $this->fungsi->tanggal_indo($tb_master_transaksi->tanggal_sensus); ?></span>
              <span style="font-size: 8pt;"></span>
            </div>
          </td>
        </tr>
        
        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 2px; padding-bottom: 0px; padding-left: 10px;">
              <span style="font-weight: bold; font-size: 8pt;">Petugas: <?php echo $full_name; ?></span>
              <span style="font-size: 8pt;"></span>
            </div>
          </td>
        </tr>

        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 2px; padding-bottom: 0px; padding-left: 10px;">
              <span style="font-weight: bold; font-size: 8pt;">Uraian: <?php echo $tb_master_transaksi->ket_transaksi; ?></span>
              <span style="font-size: 8pt;"></span>
            </div>
          </td>
        </tr>

      </table>

      <br>

      <table style="width:100%" class="tg">
        <tr>
          <th class="tg-0lax">No.</th>
          <th class="tg-0lax">RFID Tag</th>
          <th class="tg-0lax">Kode Aset</th>
          <th class="tg-0lax">NUP</th>
          <th class="tg-0lax">Nama Aset</th>
          <th class="tg-0lax">Kategori</th>
          <th class="tg-0lax">Lokasi (Master)</th>
          <th class="tg-0lax">Lokasi (Sensus)</th>
          <th class="tg-0lax">Status Lokasi</th>
          <th class="tg-0lax">Kondisi</th>
          <th class="tg-0lax">Status Aset</th>
        </tr>
        <!-- block if header -->
        <?php } ?>

        <tr>

          <td class="tg-0lax">
            <?php echo $no; ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->kode_tid ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->kode_aset; ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->nup; ?>
          </td>
          <td class="tg-0pky">
            <?php echo $val->nama_aset ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->kategori_aset ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->lokasi_master ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->lokasi_sensus ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->status_sensus ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->kondisi_aset ?>
          </td>
          <td class="tg-0lax">
            <?php echo $val->catatan_sensus ?>
          </td>

        </tr>

        <!-- begin footer -->

        <?php

                    /*
                    $total_biaya_ds = $total_biaya_ds + $val->jmlh_pembayaran;
                    $total_biaya_lalamove = $total_biaya_lalamove + $val->biaya_driver;
                    
                    if ($val->metode_pembayaran === 'TN'){
                      $total_uang_tunai = $total_uang_tunai + $val->jmlh_pembayaran;
                    } else { 
                      $total_uang_non_tunai = $total_uang_non_tunai + $val->jmlh_pembayaran;
                    }
                    */

                    if (($no+1) % $pembagi_mod == 0 || $no == $max){

                      if ($no == $max){

                        //$total_fee_rs = ($total_biaya_ds / 100) * $persentase_fee_rs;
                    ?>

        <?php
                      }
                    ?>

      </table>

    </div><!--halaman-->

    <!-- footer bisa di taro disini -->

    <footer>

      <table class="table-footer" style="width:100%">

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Tanggal Cetak :
              <?php echo $this->fungsi->tanggal_indo(date('Y-m-d'), true); ?>
            </span></td>
        </tr>

      </table>

      <p align="center">
        <?php echo $number_page; ?>
      </p>

    </footer>

    <!--</page>-->

  </section>

  <?php } ?>

  <?php 
  $no++;
  } 
  // end query laporan
  ?>

  <section class="sheet padding-0.5mm">

    <header>

      <table style="width:100%;">
        <tr>
          <td width="10%" align="middle" rowspan="4">
            <!--<div class="logo">-->
            <img src="<?php echo base_url(); ?>asset/img/icon/logosekneg.png" alt="generic business logo" height="110"
              width="160" />
            <!--</div>-->
          </td>
          <td valign="bottom" height="0.1">
            <div style="font-weight: bold; padding-top: 10px; padding-bottom: 0px; font-size: 15pt;">KEMENTERIAN SEKRETARIAT NEGARA REPUBLIK INDONESIA</div>
          </td>
        </tr>

        <tr>
          <td valign="top" height="0.1">
            <div style="font-weight: bold; padding-top: 0px; padding-bottom: 0px; font-size: 11pt;">
              <!-- <?php echo $ds_alamat; ?> -->
               Jalan Veteran No. 17-18, Jakarta Pusat 10110
            </div>
          </td>
        </tr>

        <tr>
          <td valign="top" height="0.0">
            <div style="font-weight: bold; padding-top: 0px; padding-bottom: 0px; font-size: 11pt;">Telepon: (021) 3832269 | Email: humas@setneg.go.id | Website : https://www.setneg.go.id/
            </div>
          </td>
        </tr>

      </table>

    </header>

    <div class="halaman">

      <br><br><br><br><br><br><br>

      <br>
      <!-- <span style="font-weight: bold; font-size: 11pt;">Laporan Rekon Sensus</span><br> -->
      <!-- <span style="font-weight: bold; font-size: 8pt;">Tanggal: </span><br>
      <span style="font-weight: bold; font-size: 8pt;">Petugas: </span> -->
      <!-- <br><br> -->

      <!-- <table style="width:100%;">
        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 25px; padding-bottom: 0px; padding-left: 10px;"><span
                style="font-weight: bold; font-size: 10pt;">Laporan Rekon Sensus</span></div>
          </td>
        </tr>
        
        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 2px; padding-bottom: 0px; padding-left: 10px;">
              <span style="font-weight: bold; font-size: 8pt;">Tanggal Sensus: </span>
              <span style="font-size: 8pt;"><?php echo $this->fungsi->tanggal_indo($tb_master_transaksi->tgl_awal_transaksi, false); ?></span>
            </div>
          </td>
        </tr>
        
        <tr>
          <td valign="top" height="0.1">
            <div style="padding-top: 2px; padding-bottom: 10px; padding-left: 10px;">
              <span style="font-weight: bold; font-size: 8pt;">Petugas Sensus: </span>
              <span style="font-size: 8pt;"><?php echo $full_name; ?></span>
            </div>
          </td>
        </tr>

      </table> -->

      <table style="width:31%" class="tg">

        <tr>
          <th style="width:15%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">Summary Report</span>
          </th>
          <th style="width:1%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">:</span></th>
          <th style="width:15%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">Nilai</span></th>
        </tr>

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Total Aset</span></td>
          <td style="width:1%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">:</span></td>
          <td class="tg-0pky"><span style="font-weight: bold; font-size: 8pt;">
              <?php echo $summary_report['total_aset_tahun_all'] ?>
            </span></td>
        </tr>

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Total Aset Ruangan</span></td>
          <td style="width:1%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">:</span></td>
          <td class="tg-0pky"><span style="font-weight: bold; font-size: 8pt;">
              <?php echo $summary_report['total_aset_ruangan'] ?>
            </span></td>
        </tr>

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Total Aset Terdata</span></td>
          <td style="width:1%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">:</span></td>
          <td class="tg-0pky"><span style="font-weight: bold; font-size: 8pt;">
              <?php echo $summary_report['total_aset_terdata'] ?>
            </span></td>
        </tr>

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Total Ditemukan</span></td>
          <td style="width:1%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">:</span></td>
          <td class="tg-0pky"><span style="font-weight: bold; font-size: 8pt;">
              <?php echo $summary_report['total_cocok'] ?>
            </span></td>
        </tr>

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Total Tidak Ditemukan</span></td>
          <td style="width:1%" class="tg-0lax"><span style="font-weight: bold; font-size: 8pt;">:</span></td>
          <td class="tg-0pky"><span style="font-weight: bold; font-size: 8pt;">
              <?php echo $summary_report['total_hilang'] ?>
            </span></td>
        </tr>

      </table>

    </div> <!-- end div halaman summary report  -->

    <footer>

      <table class="table-footer" style="width:100%">

        <tr>
          <td><span style="font-weight: bold; font-size: 8pt;">Tanggal Cetak :
              <?php echo $this->fungsi->tanggal_indo(date('Y-m-d'), true); ?>
            </span></td>
        </tr>

      </table>

      <p align="center">
        <?php echo $number_page+1; ?>
      </p>

    </footer>

    <div class="footer">

        <!-- <div class="page-number">
            Halaman 1 dari 1
        </div> -->
        
        <div class="ttd-container">
            <div class="ttd-title">
                Jakarta, <?php echo $this->fungsi->tanggal_indo(date('Y-m-d'), false) ?><br>
                Kepala Biro Umum,
            </div>
            <div class="ttd-nama">Drs. Ahmad Sudrajat, M.M.</div>
            <div class="ttd-nip">NIP. 196710151992031002</div>
        </div>
    </div>

  </section>

</body>

</html>