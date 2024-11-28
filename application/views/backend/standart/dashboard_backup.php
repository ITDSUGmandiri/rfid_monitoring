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
		<?php cicool()->eventListen('dashboard_content_top'); ?>

		<?php is_allowed('dashboard_update', function () { ?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box button btn-new-dashboard">
					<span class="info-box-icon bg-default">
						<i class="fa fa-plus-circle">
						</i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">
							<center> <?= cclang('create_dashboard') ?></center>
						</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box button btn-manage-widged" onclick="goUrl(ADMIN_NAMESPACE_URL+'/widged/manage')">
					<span class="info-box-icon bg-default">
						<i class="fa fa-cog">
						</i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">
							<center> <?= cclang('manage_widged') ?></center>
						</span>
					</div>
				</div>
			</div>
		<?php }) ?>

		<div class="col-md-12 ">
		</div>

		<?php foreach ($dashboards as $dashboard) : ?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box button" onclick="goUrl(ADMIN_NAMESPACE_URL+'/dashboard/show/<?= $dashboard->slug ?>') ">
					<span class="info-box-icon bg-aqua">
						<i class="fa fa-area-chart">
						</i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">
							<center> <?= $dashboard->title ?></center>
						</span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>


	<!-- /.row -->
	<?php cicool()->eventListen('dashboard_content_bottom'); ?>

</section>
<!-- /.content -->

<script>
	var editMode = false;
	var dashboardSlug = false;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.js"></script>
<script src="<?= BASE_ASSET; ?>/gridstack/dist/gridstack.jQueryUI.js"></script>
<script src="<?= BASE_ASSET ?>module/dashboard/js/dashboard.js"></script>