<link rel="stylesheet" href="<?= BASE_ASSET; ?>gridstack/dist/gridstack.css" />
<link rel="stylesheet" href="<?= BASE_ASSET; ?>gridstack/dist/gridstack-extra.css" />
<link rel="stylesheet" refresh-css="2000" href="<?= BASE_ASSET; ?>module/dashboard/css/dashboard.css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?= BASE_ASSET; ?>flag-icon/css/flag-icon.css" rel="stylesheet" media="all" />

<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET; ?>spectrum/spectrum.css">
<style>
    <?php if ($edit) : ?>.content,
    .content-header {
        padding-left: 100px;
    }

    <?php else : ?>.grid-stack {
        background: none !important;
    }

    .btn-setup-widged {
        display: none !important;
    }

    <?php endif ?>
</style>



<div class="modal fade " tabindex="-1" role="dialog" id="modalIcon">
    <div class="modal-dialog full-width" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <?php $this->load->view('menu/backend/standart/administrator/menu/partial_icon'); ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalAddWidged">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Widged</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <div class="widged-option" data-type="chart">
                        <div class="widged-icon">
                            <i class="fa fa-area-chart"></i>
                        </div>
                        <div class="widged-title">Chart</div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>


<section class="content-header">
    <h1 class="dashboard-title <?= $edit ?  '' : 'view-mode'  ?>" <?= $edit ? ' contenteditable="true"' : '' ?>>
        <?= $dashboard->title ?>
    </h1>

    <?php if ($edit == false && $this->aauth->is_allowed('dashboard_update')) : ?>
        <a class="pull-right btn-edit-dashboard" href="<?= admin_base_url('/dashboard/edit/' . $dashboard->slug) ?>"><i class="fa fa-cog"></i> </a>
    <?php endif ?>

</section>


<div class="modal fade" id="modalCharWidgedConfig">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php if ($edit) : ?>
    <div class="sidebar-wrapper">

        <?= $this->load->view('backend/standart/administrator/partial/dashboard_sidebar') ?>
    </div>
<?php endif ?>
<section class="content">


    <div class="grid-stack row">
        <?php

        foreach ($widgeds as $widged) :

            $instance = (new cc_widged)->loadWidged($widged->widged_type);

            $child = $this->db->get_where(
                $instance->table_name,
                [
                    'widged_id' => $widged->id
                ]
            )->row();

            $meta = new Cc_widged_config((array)$widged);
            $meta->set('child', new Cc_widged_config($child));
            echo $instance->render(
                $meta
            );

        endforeach;

        ?>
    </div>

</section>


<script>
    var dashboardConf = <?= json_encode((array)$dashboard) ?>;
    var editMode = <?= $this->uri->segment('3') == 'edit' ? '1' : '0' ?>;
    var dashboardSlug = "<?= $this->uri->segment('4') ?>";
</script>
<script type="text/javascript" src="<?= BASE_ASSET; ?>spectrum/spectrum.js"></script>
<script src="<?= BASE_ASSET; ?>/module/dashboard/js/handlebars.min.js"></script>
<script src="<?= BASE_ASSET; ?>/module/dashboard/js/lodash.min.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.jQueryUI.js"></script>
<script>
    var dashboardData = <?= json_encode($dashboard) ?>
</script>
<?php
$javascripts = [];
$styles = [];
$widgeds = $this->cc_widged->_load_widgeds();
$list_alls = [];
foreach ($widgeds as $widged) {
    if (method_exists($widged->instance, 'JS')) {
        $js = $widged->instance->JS();
        $js = array_map(
            function ($item) use ($widged, &$list_alls) {
                if (array_search($item, $list_alls) === false) {
                    $list_alls[] = $item;
                    return $widged->get('name') . '/' . $item;
                } else {
                    return false;
                }
            },
            $js
        );

        $javascripts = array_merge($javascripts, $js);
    }
    if (method_exists($widged->instance, 'CSS')) {
        $css = $widged->instance->CSS();
        $css = array_map(
            function ($item) use ($widged, &$list_alls) {
                if (array_search($item, $list_alls) === false) {
                    $list_alls[] = $item;
                    return $widged->get('name') . '/' . $item;
                } else {
                    return false;
                }
            },
            $css
        );

        $styles = array_merge($styles, $css);
    }
}

$javascripts = array_filter($javascripts, function ($item) {
    return $item !== false;
});
$javascripts = array_unique($javascripts);
$styles = array_filter($styles, function ($item) {
    return $item !== false;
});
$styles = array_unique($styles);
?>
<script src="<?= BASE_ASSET ?>module/dashboard/js/dashboard.js"></script>
<?php foreach ($javascripts as $js) : ?>
    <script src="<?= BASE_URL . 'cc-content/dashboard-widgeds/' . $js ?>"></script>
<?php endforeach ?>

<?php foreach ($styles as $css) : ?>
    <link rel="stylesheet" href="<?= BASE_URL . 'cc-content/dashboard-widgeds/' . $css ?>">
<?php endforeach ?>
<script>
    $(function() {

        dashboard.doIntervalGetData();
    })
</script>