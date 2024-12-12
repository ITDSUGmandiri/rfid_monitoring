<?php foreach ($tb_room_masters as $tb_room_master): ?>
    <tr>



        <td><span class="list_group-kode_room"><?= _ent($tb_room_master->id); ?></span></td>
        <td><span class="list_group-name_room"><?= _ent($tb_room_master->ruangan); ?></span></td>
        <td><span class="list_group-lat"><?= _ent($tb_room_master->gedung); ?></span></td>
        <td><span class="list_group-long"><?= _ent($tb_room_master->area); ?></span></td>
        <td width="200">

            <?php is_allowed('tb_room_master_view', function () use ($tb_room_master) { ?>
                <a href="<?= admin_site_url('/tb_master_ruangan/view/' . $tb_room_master->id); ?>" data-id="<?= $tb_room_master->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tb_room_master_update', function () use ($tb_room_master) { ?>
                    <a href="<?= admin_site_url('/tb_master_ruangan/edit/' . $tb_room_master->id); ?>" data-id="<?= $tb_room_master->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                <?php }) ?>
                <!-- <?php is_allowed('tb_room_master_delete', function () use ($tb_room_master) { ?>
                    <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_room_master/delete/' . $tb_room_master->id_room); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                <?php }) ?> -->

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tb_room_master_counts == 0) : ?>
    <tr>
        <td colspan="100">
            Tb Room Master data is not available
        </td>
    </tr>
<?php endif; ?>