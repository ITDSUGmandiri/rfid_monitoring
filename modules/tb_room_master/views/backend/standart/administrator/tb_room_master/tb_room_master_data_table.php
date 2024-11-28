<?php foreach($tb_room_masters as $tb_room_master): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_room_master->id_room; ?>">
        </td>
                
        <td><?php if  ($tb_room_master->gedung_id) {

            echo admin_anchor('/tb_gedung_master/view/'.$tb_room_master->gedung_id.'?popup=show', $tb_room_master->tb_gedung_master_gedung, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-kode_room"><?= _ent($tb_room_master->kode_room); ?></span></td> 
        <td><span class="list_group-name_room"><?= _ent($tb_room_master->name_room); ?></span></td> 
        <td><span class="list_group-lat"><?= _ent($tb_room_master->lat); ?></span></td> 
        <td><span class="list_group-long"><?= _ent($tb_room_master->long); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_room_master_view', function() use ($tb_room_master){?>
                        <a href="<?= admin_site_url('/tb_room_master/view/' . $tb_room_master->id_room); ?>" data-id="<?= $tb_room_master->id_room ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_room_master_update', function() use ($tb_room_master){?>
            <a href="<?= admin_site_url('/tb_room_master/edit/' . $tb_room_master->id_room); ?>" data-id="<?= $tb_room_master->id_room ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_room_master_delete', function() use ($tb_room_master){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_room_master/delete/' . $tb_room_master->id_room); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_room_master_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Room Master data is not available
        </td>
        </tr>
    <?php endif; ?>