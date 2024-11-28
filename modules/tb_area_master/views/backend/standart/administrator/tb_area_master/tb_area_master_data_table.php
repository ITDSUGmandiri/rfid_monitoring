<?php foreach($tb_area_masters as $tb_area_master): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_area_master->id_area; ?>">
        </td>
                
        <td><span class="list_group-kota"><?= _ent($tb_area_master->kota); ?></span></td> 
        <td><span class="list_group-alamat"><?= _ent($tb_area_master->alamat); ?></span></td> 
        <td><span class="list_group-area"><?= _ent($tb_area_master->area); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_area_master_view', function() use ($tb_area_master){?>
                        <a href="<?= admin_site_url('/tb_area_master/view/' . $tb_area_master->id_area); ?>" data-id="<?= $tb_area_master->id_area ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_area_master_update', function() use ($tb_area_master){?>
            <a href="<?= admin_site_url('/tb_area_master/edit/' . $tb_area_master->id_area); ?>" data-id="<?= $tb_area_master->id_area ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_area_master_delete', function() use ($tb_area_master){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_area_master/delete/' . $tb_area_master->id_area); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_area_master_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Area Master data is not available
        </td>
        </tr>
    <?php endif; ?>