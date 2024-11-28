<?php foreach($tb_kondisi_masters as $tb_kondisi_master): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_kondisi_master->id; ?>">
        </td>
                
        <td><span class="list_group-kondisi_id"><?= _ent($tb_kondisi_master->kondisi_id); ?></span></td> 
        <td><span class="list_group-keterangan"><?= _ent($tb_kondisi_master->keterangan); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_kondisi_master_view', function() use ($tb_kondisi_master){?>
                        <a href="<?= admin_site_url('/tb_kondisi_master/view/' . $tb_kondisi_master->id); ?>" data-id="<?= $tb_kondisi_master->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_kondisi_master_update', function() use ($tb_kondisi_master){?>
            <a href="<?= admin_site_url('/tb_kondisi_master/edit/' . $tb_kondisi_master->id); ?>" data-id="<?= $tb_kondisi_master->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_kondisi_master_delete', function() use ($tb_kondisi_master){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_kondisi_master/delete/' . $tb_kondisi_master->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_kondisi_master_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Kondisi Master data is not available
        </td>
        </tr>
    <?php endif; ?>