<?php foreach($tb_pegawai_masters as $tb_pegawai_master): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_pegawai_master->id; ?>">
        </td>
                
        <td><span class="list_group-NIP"><?= _ent($tb_pegawai_master->NIP); ?></span></td> 
        <td><span class="list_group-Pegawai"><?= _ent($tb_pegawai_master->Pegawai); ?></span></td> 
        <td><span class="list_group-Jabatan"><?= _ent($tb_pegawai_master->Jabatan); ?></span></td> 
        <td><span class="list_group-Telp"><?= _ent($tb_pegawai_master->Telp); ?></span></td> 
        <td><span class="list_group-Alamat"><?= _ent($tb_pegawai_master->Alamat); ?></span></td> 
        <td><span class="list_group-Email"><?= _ent($tb_pegawai_master->Email); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_pegawai_master_view', function() use ($tb_pegawai_master){?>
                        <a href="<?= admin_site_url('/tb_pegawai_master/view/' . $tb_pegawai_master->id); ?>" data-id="<?= $tb_pegawai_master->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_pegawai_master_update', function() use ($tb_pegawai_master){?>
            <a href="<?= admin_site_url('/tb_pegawai_master/edit/' . $tb_pegawai_master->id); ?>" data-id="<?= $tb_pegawai_master->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_pegawai_master_delete', function() use ($tb_pegawai_master){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_pegawai_master/delete/' . $tb_pegawai_master->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_pegawai_master_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Pegawai Master data is not available
        </td>
        </tr>
    <?php endif; ?>