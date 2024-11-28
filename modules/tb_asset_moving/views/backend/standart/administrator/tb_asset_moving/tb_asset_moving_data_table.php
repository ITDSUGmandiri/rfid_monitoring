<?php foreach($tb_asset_movings as $tb_asset_moving): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_asset_moving->id; ?>">
        </td>
                
        <td><span class="list_group-tanggal"><?= _ent($tb_asset_moving->tanggal); ?></span></td> 
        <td><span class="list_group-waktu"><?= _ent($tb_asset_moving->waktu); ?></span></td> 
        <td><?php if  ($tb_asset_moving->reader_id) {

            echo admin_anchor('/tag_reader/view/'.$tb_asset_moving->reader_id.'?popup=show', $tb_asset_moving->tag_reader_reader_name, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tb_asset_moving->room_id) {

            echo admin_anchor('/tb_room_master/view/'.$tb_asset_moving->room_id.'?popup=show', $tb_asset_moving->tb_room_master_name_room, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tb_asset_moving->tag_code) {

            echo admin_anchor('/tb_asset_master/view/'.$tb_asset_moving->tag_code.'?popup=show', $tb_asset_moving->tb_asset_master_nama_brg, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-status_moving"><?= _ent($tb_asset_moving->status_moving); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_asset_moving_view', function() use ($tb_asset_moving){?>
                        <a href="<?= admin_site_url('/tb_asset_moving/view/' . $tb_asset_moving->id); ?>" data-id="<?= $tb_asset_moving->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_asset_moving_update', function() use ($tb_asset_moving){?>
            <a href="<?= admin_site_url('/tb_asset_moving/edit/' . $tb_asset_moving->id); ?>" data-id="<?= $tb_asset_moving->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_asset_moving_delete', function() use ($tb_asset_moving){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_asset_moving/delete/' . $tb_asset_moving->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_asset_moving_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Asset Moving data is not available
        </td>
        </tr>
    <?php endif; ?>