<?php foreach ($tb_pegawai_masters as $tb_pegawai_master): ?>
    <tr>


        <td><span class="list_group-NIP"><?= _ent($tb_pegawai_master->nip); ?></span></td>
        <td><span class="list_group-Pegawai"><?= _ent($tb_pegawai_master->nama); ?></span></td>
        <td><span class="list_group-Jabatan"><?= _ent($tb_pegawai_master->jabatan); ?></span></td>
        <td><span class="list_group-Telp"><?= _ent($tb_pegawai_master->email); ?></span></td>
        <td width="150">

            <?php is_allowed('tb_pegawai_master_view', function () use ($tb_pegawai_master) { ?>
                <a href="<?= admin_site_url('/tb_master_pegawai/view/' . $tb_pegawai_master->id); ?>" data-id="<?= $tb_pegawai_master->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tb_pegawai_master_update', function () use ($tb_pegawai_master) { ?>
                    <a href="<?= admin_site_url('/tb_master_pegawai/edit/' . $tb_pegawai_master->id); ?>" data-id="<?= $tb_pegawai_master->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                <?php }) ?>

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tb_pegawai_master_counts == 0) : ?>
    <tr>
        <td colspan="100">
            Tb Pegawai Master data is not available
        </td>
    </tr>
<?php endif; ?>