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
      display: none;
      margin-right: 18px;
      padding: 20px;
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
         title: "Oops, Detail Aset tidak ada",
         text: "Kode TID Aset tidak ditemukan, silahkan perbarui data Aset!",
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
      <small>Detail Area</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a href="<?= admin_site_url('/tb_master_area'); ?>">Master Area</a></li>
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
         <?php foreach ($tb_master_area as $value): ?>
            <div class="row">
               <div class="col-12 col-sm-5">
                  <h5 class="d-inline-block d-sm-none">Foto : <?= $value->area; ?></h5>
                  <div class="col-12">
                     <img id="myImg" src="<?= base_url('uploads'); ?>/Area/<?= $value->image_uri ?>" class="product-image" alt="Area Image">
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
                  <h4>Informasi Detail Area</h4>
                  <div class="col-6">

                     <div class="table-responsive">
                        <table class="table">
                           <tr>
                              <th style="width:50%">ID Area:</th>
                              <td><?= $value->id; ?></td>
                           </tr>
                           <tr>
                              <th>Nama Area:</th>
                              <td><?= $value->area; ?></td>
                           </tr>
                           <tr>
                              <th>Keterangan Area:</th>
                              <td><?= $value->ket_area; ?></td>
                           </tr>
                        </table>
                     </div>

                  </div>
               </div>

            </div>
         <?php endforeach; ?>

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
</script>

<script>
   $(document).ready(function() {

      "use strict";


   });
</script>