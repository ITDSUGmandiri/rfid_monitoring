<?php foreach ($tb_master_areas as $tb_master_area): ?>
    <tr>


        <td><span class="list_group-kode_tid"><?= _ent($tb_master_area->id); ?></span></td>
        <td><span class="list_group-kode_aset"><?= _ent($tb_master_area->area); ?></span></td>
        <td><span class="list_group-nama_aset"><?= _ent($tb_master_area->ket_area); ?></span></td>
        <td width="150">

            <?php is_allowed('tb_master_area_view', function () use ($tb_master_area) { ?>
                <a href="<?= admin_site_url('/tb_master_area/view/' . $tb_master_area->id); ?>" data-id="<?= $tb_master_area->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tb_master_area_update', function () use ($tb_master_area) { ?>
                    <a href="<?= admin_site_url('/tb_master_area/edit/' . $tb_master_area->id); ?>" data-id="<?= $tb_master_area->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                <?php }) ?>
                <!-- <?php is_allowed('tb_master_area_delete', function () use ($tb_master_area) { ?>
                    <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_master_area/delete/' . $tb_master_area->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                <?php }) ?> -->

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tb_area_master_counts == 0) : ?>
    <tr>
        <td colspan="100">
            Tb Master Aset data is not available
        </td>
    </tr>
<?php endif; ?>