<style type="text/css">
   .widget-user-header {
      padding-left: 20px !important;
   }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        <?= cclang('dashboard') ?>
        
        <small>
        <?= cclang('control_panel') ?>
        </small>
    </h1>
    <ol class="breadcrumb">
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
    </ol>
</section>

<section class="content">
    <div class="row">
     <?php 
        $javascripts = [];
        $styles = [];

        foreach($widgeds as $widged):
           ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box button" >
                    <span class="info-box-icon bg-aqua">
                        <i class="fa fa-area-chart">
                        </i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            <center> <?= $widged ?></center>
                        </span>
                    </div>
                </div>
            </div>
            <?php
             
         endforeach;

         $javascripts = array_unique($javascripts);  
         $styles = array_unique($styles);  
         ?>
    </div>
  
</section>
<!-- /.content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.jQueryUI.js"></script>
<script src="<?= BASE_ASSET ?>js/dashboard.js"></script>
