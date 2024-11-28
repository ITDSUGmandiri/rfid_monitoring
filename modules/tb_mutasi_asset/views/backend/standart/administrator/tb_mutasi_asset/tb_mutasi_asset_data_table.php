<?php foreach($tb_mutasi_assets as $tb_mutasi_asset): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_mutasi_asset->id; ?>">
        </td>
                
        <td><span class="list_group-mutasi_id"><?= _ent($tb_mutasi_asset->mutasi_id); ?></span></td> 
        <td><span class="list_group-code_rfidtag"><?= _ent($tb_mutasi_asset->code_rfidtag); ?></span></td> 
        <td><span class="list_group-id_room_old"><?= _ent($tb_mutasi_asset->id_room_old); ?></span></td> 
        <td><span class="list_group-id_room_new"><?= _ent($tb_mutasi_asset->id_room_new); ?></span></td> 
        <td><span class="list_group-tanggal_m"><?= _ent($tb_mutasi_asset->tanggal_m); ?></span></td> 
        <td><span class="list_group-waktu_m"><?= _ent($tb_mutasi_asset->waktu_m); ?></span></td> 
        <td><span class="list_group-pic"><?= _ent($tb_mutasi_asset->pic); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_mutasi_asset_view', function() use ($tb_mutasi_asset){?>
                        <a href="<?= admin_site_url('/tb_mutasi_asset/view/' . $tb_mutasi_asset->id); ?>" data-id="<?= $tb_mutasi_asset->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_mutasi_asset_update', function() use ($tb_mutasi_asset){?>
            <a href="<?= admin_site_url('/tb_mutasi_asset/edit/' . $tb_mutasi_asset->id); ?>" data-id="<?= $tb_mutasi_asset->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_mutasi_asset_delete', function() use ($tb_mutasi_asset){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_mutasi_asset/delete/' . $tb_mutasi_asset->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_mutasi_asset_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Mutasi Asset data is not available
        </td>
        </tr>
    <?php endif; ?>