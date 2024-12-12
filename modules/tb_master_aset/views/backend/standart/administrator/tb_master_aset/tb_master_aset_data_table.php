<?php foreach ($tb_master_asets as $tb_master_aset): ?>
    <tr>


        <td><span class="list_group-kode_tid"><?= _ent($tb_master_aset->kode_tid); ?></span></td>
        <td><span class="list_group-kode_aset"><?= _ent($tb_master_aset->kode_aset); ?></span></td>
        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->nama_aset); ?></span></td>
        <td><span class="list_group-id_area"><?= _ent($tb_master_aset->status); ?></span></td>
        <td width="150">

            <?php is_allowed('tb_master_aset_view', function () use ($tb_master_aset) { ?>
                <a href="<?= admin_site_url('/tb_master_aset/view/' . $tb_master_aset->id_aset); ?>" data-id="<?= $tb_master_aset->id_aset ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tb_master_aset_update', function () use ($tb_master_aset) { ?>
                    <a href="<?= admin_site_url('/tb_master_aset/edit/' . $tb_master_aset->id_aset); ?>" data-id="<?= $tb_master_aset->id_aset ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                <?php }) ?>
                <!-- <?php is_allowed('tb_master_aset_delete', function () use ($tb_master_aset) { ?>
                    <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_master_aset/delete/' . $tb_master_aset->id_aset); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                <?php }) ?> -->

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tb_master_aset_counts == 0) : ?>
    <tr>
        <td colspan="100">
            Tb Master Aset data is not available
        </td>
    </tr>
<?php endif; ?>