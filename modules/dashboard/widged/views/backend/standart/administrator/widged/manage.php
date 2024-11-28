<section class="content-header">
    <h1>
        <?= cclang('dashboard') ?>

        <small>
            <?= cclang('manage_widgeds') ?>
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
<style>
    .widged-list-item-bottom {
        background: #fff;
        margin-top: -15px;
        transition: all 0.2s;
        border-top: 1px solid #ccc;
    }

    .widged-bottom-action {
        padding: 7px;
        display: block;
    }

    .widged-bottom-action:hover {
        color: #fff;
        opacity: 0.8;
    }

    .widged-item {
        position: relative;
        margin-bottom: 20px;
    }


    .widged-bottom-action {
        width: 50%;
        float: left;
        border: 1px solid #ccc;
        text-align: center;
        background: #fff;
    }

    .btn-install-widged {
        color: #999;
        border-right: 0px solid #ccc;
    }

    .btn-remove-widged {
        color: #999;
    }

    .widged-item-desc {
        padding: 5px;
        color: #999;
        padding: 15px;
    }

    .action-bottom-wrapper {
        margin-top: 20px;
    }

    .icon-widged {
        background: #fff !important;
        padding: 10px;
    }

    .icon-widged img {
        width: 80%;
        margin-top: -30px !important;
    }
    
.not-installed {
}

.not-installed img {
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
}

.not-installed small {
    font-size: 10px;
    position: absolute;
}
</style>

<section class="content">
    <div class="row">
        <?php
        foreach ($widgeds as $widged) :  
            $installed = $this->db->table_exists($widged->instance->table_name);
            
            ?>
        
            <div class="col-md-3 col-sm-6 col-xs-12 widged-item <?= $installed ? '' : 'not-installed' ?>">
                <div class="info-box button">
                    <span class="info-box-icon icon-widged">
                        <?= $widged->get('icon') ?>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            <center> <?= $widged->get('name') ?></center>
                        </span>
                    </div>
                </div>
                <div class="widged-list-item-bottom">
                    <div class="widged-item-desc">
                        <?= $widged->get('description') ?>
                        <div class="action-bottom-wrapper">

                            <?php if (!$this->db->table_exists($widged->instance->table_name)) : ?>
                                <a href="<?= admin_base_url('/widged/install/' . $widged->get('name')) ?>" class="btn-install-widged btn btn-default btn-sm">
                                    Install
                                </a>
                            <?php else : ?>
                                <a href="<?= admin_base_url('/widged/uninstall/' . $widged->get('name')) ?>" class="btn-remove-widged btn btn-default btn-sm">
                                    Uninstall
                                </a>
                            <?php endif ?>

                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach ?>
    </div>

</section>
<script src="<?= BASE_ASSET ?>js/dashboard.js"></script>