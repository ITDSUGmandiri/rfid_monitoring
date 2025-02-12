<script type="text/javascript">
    function domo() {
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



<!-- Theme style -->
<!-- <link rel="stylesheet" href="<?= base_url('asset'); ?>/vendor/dist/css/adminlte.min.css"> -->
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 9999;

        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 900px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation - Zoom in the Modal */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }

    body {
        background: #eee;
    }

    .tab-buttons {
        display: flex;
    }

    .tab-button {
        background-color: #ffffff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        height: 40px;
    }

    .tab-button:hover {
        background-color: #ddd;
    }

    .tab {
        margin-right: 18px;
        padding: 20px;
        width: 100%;
        background-color: #ccc;
    }

    .active-tab-button {
        background-color: #ccc;
        transform: scaleY(1.1);
        transform-origin: bottom;
    }

    .rotingtxt {
        -webkit-transform: rotate(331deg);
        -moz-transform: rotate(331deg);
        -o-transform: rotate(331deg);
        transform: rotate(331deg);
        font-size: 12em;
        color: rgba(255, 5, 5, 0.17);
        position: absolute;
        font-family: 'Denk One', sans-serif;
        text-transform: uppercase;
        padding-top: 10%;
    }

    .product-image {
        max-width: 100%;
        height: auto;
        width: 100%;
    }

    .product-image-thumbs {
        -ms-flex-align: stretch;
        align-items: stretch;
        display: -ms-flexbox;
        display: flex;
        margin-top: 2rem;
    }

    .product-image-thumb {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.075);
        border-radius: 0.25rem;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        display: -ms-flexbox;
        display: flex;
        margin-right: 1rem;
        max-width: 7rem;
        padding: 0.5rem;
    }

    .product-image-thumb img {
        max-width: 100%;
        height: auto;
        -ms-flex-item-align: center;
        align-self: center;
    }

    .product-image-thumb:hover {
        opacity: 0.5;
    }
</style>
<?php if ($this->session->flashdata('nulldata')) { ?>
    <script>
        Swal.fire({
            icon: "warning",
            title: "Oops, Data Aset tidak lengkap",
            text: "Silahkan perbarui atau lengkapi Data Aset!",
        }).then(okay => {
            if (okay) {
                window.history.go(-1);
            }
        });
        // window.history.go(-1);
    </script>
<?php } ?>
<section class="content-header">
    <h1>
        <small><?= cclang('detail', ['Tb Master Aset']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= admin_site_url('/tb_master_aset'); ?>">Master Aset</a></li>
        <li class="active"><?= cclang('detail'); ?></li>
    </ol>
</section>
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<section class="content">


    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <?php foreach ($tb_master_aset as $value): ?>
                <div class="row">
                    <div class="col-12 col-sm-5">
                        <h3 class="d-inline-block d-sm-none"><?= $value->nama_aset; ?> <?= $value->merk; ?> <?= $value->tipe; ?></h3>
                        <div class="col-12">
                            <?php if ($value->kategori == '1' && $value->image_uri != '') { ?>
                                <img id="myImg" src="<?= base_url('uploads'); ?>/Seni/<?= $value->image_uri ?>" class="product-image">

                            <?php } else if ($value->kategori == '2' && $value->image_uri != '') { ?>

                                <img id="myImg" src="<?= base_url('uploads'); ?>/Elektronik/<?= $value->image_uri ?>" class="product-image">

                            <?php } else { ?>
                                <img id="myImg" src="https://media.istockphoto.com/id/1138179183/id/vektor/tidak-ada-tanda-gambar-yang-tersedia.jpg?s=170667a&w=0&k=20&c=tKN6Y_eDwEKdopmJIIYyX-Slv4mH8zoW_Qm7pXv2DQw=" class="product-image">

                            <?php } ?>
                        </div>
                        <!-- <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="<?= base_url('asset'); ?>/image/lukisan01.jpeg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="<?= base_url('asset'); ?>/image/lukisan01.jpeg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="<?= base_url('asset'); ?>/image/lukisan01.jpeg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="<?= base_url('asset'); ?>/image/lukisan01.jpeg" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="<?= base_url('asset'); ?>/image/lukisan01.jpeg" alt="Product Image"></div>
                    </div> -->
                    </div>
                    <div class="col-12 col-sm-6">
                        <p class="rotingtxt"><img src="<?= base_url('asset'); ?>/img/icon/sekneglogodb.png" alt="AdminLTE Logo" class="w-100" style="opacity: .5"></p>
                        <hr>
                        <h4>Informasi Detail Aset</h4>
                        <div class="col-6">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Kode RFID Aset:</th>
                                        <td><?= $value->kode_tid; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Barang Aset:</th>
                                        <td><?= $value->kode_aset; ?></td>
                                    </tr>
                                    <tr>
                                        <th>NUP Aset:</th>
                                        <td><?= $value->nup; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Aset:</th>
                                        <td><?= $value->nama_aset; ?> <?= $value->merk; ?> <?= $value->tipe; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Aset:</th>
                                        <td><?= $value->ket_kategori; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Aset:</th>
                                        <td><?= $value->ket_status; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Lokasi Asal:</th>
                                        <td><?= $value->ruangasal; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi Saat Ini:</th>
                                        <td><?= $value->ruangaktual; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penanggung Jawab:</th>
                                        <td><?= $value->nama; ?></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

            <div style="margin-top: 50px;">
                <div class="tab-buttons">
                    <button class="tab-button active-tab-button" onclick="toggleTab(0)">History</button>
                    <button class="tab-button" onclick="toggleTab(1)">Event</button>
                </div>
                <div class="tab" style="width: auto;" id="tab1">
                    <table id="tabledetail" class="table table-bordered table-striped dataTable">
                        <?php if (count($history) > 0) { ?>
                            <thead>
                                <tr class="">

                                    <th data-field="kode_tid" data-primary-key="0"> Tanggal</th>
                                    <th data-field="kode_aset" data-primary-key="0"> Waktu</th>
                                    <th data-field="nama_aset" data-primary-key="0"> Ruangan</th>
                                    <!-- <th data-field="nama_aset" data-primary-key="0"> Keterangan</th> -->
                                    <th data-field="id_area" data-primary-key="0"> Status</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_tb_master_aset">
                                <?php foreach ($history as $tb_master_aset): ?>
                                    <tr>
                                        <td><span class="list_group-kode_tid"><?= _ent($tb_master_aset->tanggal); ?></span></td>
                                        <td><span class="list_group-kode_aset"><?= _ent($tb_master_aset->waktugerak); ?></span></td>
                                        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->ruangan); ?></span></td>
                                        <!-- <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->tipe_moving) === 0 ? 'Legal Moving' : 'Ilegal Moving' ?></span></td> -->

                                        <td><span class="list_group-id_area"><?= _ent($tb_master_aset->status_moving); ?></span></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        <?php } else { ?>
                            <tr>
                                <td colspan="100">
                                    Tidak ada data Histori Pergerakan untuk Aset ini.
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab" style="width: auto;" id="tab2">
                    <table id="tabledetailevent" class="table table-bordered table-striped dataTable">
                        <?php if (count($transaksi) > 0) { ?>
                            <thead>
                                <tr class="">

                                    <th data-field="kode_tid" data-primary-key="0"> Tanggal</th>
                                    <th data-field="kode_aset" data-primary-key="0"> Waktu</th>
                                    <th data-field="nama_aset" data-primary-key="0"> Ruangan Awal</th>
                                    <th data-field="nama_aset" data-primary-key="0"> Ruangan Tujuan</th>
                                    <th data-field="nama_aset" data-primary-key="0"> Tipe Transaksi</th>
                                    <th data-field="nama_aset" data-primary-key="0"> Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_tb_master_aset">
                                <?php foreach ($transaksi as $tb_master_aset): ?>
                                    <tr>
                                        <td><span class="list_group-kode_tid"><?= _ent($tb_master_aset->tglawal); ?></span></td>
                                        <td><span class="list_group-kode_aset"><?= _ent($tb_master_aset->waktuawal); ?></span></td>
                                        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->ruangawal); ?></span></td>
                                        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->ruangtujuan); ?></span></td>
                                        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->tipe_transaksi); ?></span></td>
                                        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->ket_transaksi); ?></span></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        <?php } else { ?>
                            <tr>
                                <td colspan="100">
                                    Tidak ada data Transaksi untuk Aset ini.
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>

        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }


    function toggleTab(tabIndex) {
        let tabs = document.getElementsByClassName("tab");
        for (let i = 0; i < tabs.length; i++) {
            tabs[i].style.display = "none";
        }
        tabs[tabIndex].style.display = "block";
        // Remove the 'active-tab-button' class from all buttons
        let buttons = document.getElementsByClassName("tab-button");
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove("active-tab-button");
        }

        // Add the 'active-tab-button' class to the clicked button
        buttons[tabIndex].classList.add("active-tab-button");
    }

    toggleTab(0);


    function switchDiv() {
        var div1 = document.getElementById('div1');
        var div2 = document.getElementById('div2');

        div1.classList.toggle('active');
        div2.classList.toggle('active');
    }
</script>

<script>
    $(document).ready(function() {

        "use strict";


    });
</script>