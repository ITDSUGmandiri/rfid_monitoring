<?php foreach($tb_gedung_masters as $tb_gedung_master): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_gedung_master->id_gedung; ?>">
        </td>
                
        <td><span class="list_group-kode_gedung"><?= _ent($tb_gedung_master->kode_gedung); ?></span></td> 
        <td><span class="list_group-gedung"><?= _ent($tb_gedung_master->gedung); ?></span></td> 
        <td><?php if  ($tb_gedung_master->area_id) {

            echo admin_anchor('/tb_area_master/view/'.$tb_gedung_master->area_id.'?popup=show', $tb_gedung_master->tb_area_master_area, ['class' => 'popup-view']); }?> </td>
         
        <td width="200">
        
                        <?php is_allowed('tb_gedung_master_view', function() use ($tb_gedung_master){?>
                        <a href="<?= admin_site_url('/tb_gedung_master/view/' . $tb_gedung_master->id_gedung); ?>" data-id="<?= $tb_gedung_master->id_gedung ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_gedung_master_update', function() use ($tb_gedung_master){?>
            <a href="<?= admin_site_url('/tb_gedung_master/edit/' . $tb_gedung_master->id_gedung); ?>" data-id="<?= $tb_gedung_master->id_gedung ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_gedung_master_delete', function() use ($tb_gedung_master){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_gedung_master/delete/' . $tb_gedung_master->id_gedung); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_gedung_master_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Gedung Master data is not available
        </td>
        </tr>
    <?php endif; ?>