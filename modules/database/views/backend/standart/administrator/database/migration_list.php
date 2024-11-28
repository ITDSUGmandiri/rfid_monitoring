<section class="content-header">
    <h1>
        <?= cclang('migration') ?><small><?= cclang('list_all'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= cclang('migration') ?></li>
    </ol>
</section>

<section class="content">



    <div class="row">

        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">

                    <div class="box box-widget widget-user-2">

                        <div class="widget-user-header ">
                            <div class="row pull-right">


                                <div class="btn-group open">
                                    <button type="button" class="btn btn-success btn-flat">Migration</button>
                                    <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= admin_site_url('/database/convert_to/timestamp'); ?>"><i class="fa fa-calendar"></i> <?= cclang('convert_to_timestamp') ?></a></li>
                                        <li><a class="btn_add_new" id="btn_add_new" title="" href="<?= site_url('/migrate/latest'); ?>"><i class="fa fa-play-circle-o"></i> <?= cclang('migrate_to_latest_version'); ?></a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </div>


                                <?php is_allowed('migration_add', function () { ?>
                                    <a class="btn btn-flat btn-success btn_add_new_migration" id="btn_add_new_migration" title="<?= cclang('add_new_button', [cclang('migration')]); ?>  (Ctrl+a)" href="<?= admin_site_url('/migration/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('migration')]); ?></a>
                                <?php }) ?>

                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET ?>img/list.png" alt="User Avatar">
                            </div>

                            <h3 class="widget-user-username"><?= cclang('migration') ?></h3>
                            <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('table')]); ?> <i class="label bg-yellow"><?= $migration_counts; ?> <?= cclang('items'); ?></i></h5>
                        </div>


                        <form name="form_migration" id="form_migration" action="<?= admin_base_url('/database/migration'); ?>">
                            <div class="row mb-10">
                                <div class="col-md-8">

                                    <div class="col-sm-3 padd-left-0  ">
                                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                                    </div>

                                    <div class="col-sm-1 padd-left-0 ">
                                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                            Filter
                                        </button>
                                    </div>
                                    <div class="col-sm-1 padd-left-0 ">
                                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= admin_base_url('/database/migration'); ?>" title="<?= cclang('reset_filter'); ?>">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                                    </div>
                                </div>
                            </div>
                        </form>



                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th data-field="migration_name" data-sort="1" data-primary-key="0"> <?= cclang('migration_name') ?></th>
                                        <th width="300px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_migration">
                                    <?php

                                    foreach ($migrations as $migration_name) :
                                        $rollback = true;

                                        preg_match('/^(\d+)/', $migration_name, $matches);
                                        $migration_version = $matches[0];
                                    ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?= $migration_name ?>

                                                    <?php
                                                    if (preg_match("/" . $current_version->version . "/", $migration_name)) {
                                                        echo "<span class='badge bg-green pull-right'><i class='fa fa-info-circle'></i> curent version</span>";
                                                        $rollback = false;
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td width="200">

                                                <a href="<?= site_url('/migrate/rollback/' . $migration_version); ?>" class="label-default"><i class="fa fa-refresh "></i> <?= cclang('rollback'); ?></a>
                                                <a href="<?= admin_url('/database/set_migration_version/' . $migration_version); ?>" class="label-default"><i class="fa fa-exchange"></i> <?= cclang('set_version'); ?></a>
                                                <a href="javascript:void(0);" data-href="<?= admin_site_url('/database/remove_migration/' . ccencrypt($migration_name)); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove'); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="<?= BASE_ASSET ?>treejs/tree.css">
<script src="<?= BASE_ASSET ?>treejs/tree.js"></script>
<script src="<?= BASE_ASSET ?>js/page/database/migration-list.js"></script>