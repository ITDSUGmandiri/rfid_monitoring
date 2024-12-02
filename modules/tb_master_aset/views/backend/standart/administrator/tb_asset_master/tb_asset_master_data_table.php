<?php foreach ($tb_asset_masters as $tb_asset_master): ?>
    <tr>

        <td style="text-align: unset;"><span class="list_group-kode_brg"><?= _ent($tb_asset_master->kode_tid); ?></span></td>
        <td style="text-align: unset;"><span class="list_group-tag_code"><?= _ent($tb_asset_master->kode_aset); ?></span></td>
        <td><span class="list_group-nama_brg"><?= _ent($tb_asset_master->nama_aset); ?></span></td>
        <td style="text-align: unset;"><span class="list_group-status_id"><?= _ent($tb_asset_master->status); ?></span></td>
        <td width="200">

            <?php is_allowed('tb_asset_master_view', function () use ($tb_asset_master) { ?>
                <a href="<?= admin_site_url('/tb_asset_master/view/' . $tb_asset_master->id); ?>" data-id="<?= $tb_asset_master->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tb_asset_master_update', function () use ($tb_asset_master) { ?>
                    <a href="<?= admin_site_url('/tb_asset_master/edit/' . $tb_asset_master->id); ?>" data-id="<?= $tb_asset_master->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                <?php }) ?>
                <?php is_allowed('tb_asset_master_delete', function () use ($tb_asset_master) { ?>
                    <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_master_aset/delete/' . $tb_asset_master->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                <?php }) ?>

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tb_asset_master_counts == 0) : ?>
    <tr>
        <td colspan="100">
            Tb Asset Master data is not available
        </td>
    </tr>
<?php endif; ?>