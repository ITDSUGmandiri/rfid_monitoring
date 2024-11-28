<?php foreach($tb_history_invents as $tb_history_invent): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_history_invent->id; ?>">
        </td>
                
        <td><span class="list_group-tanggal"><?= _ent($tb_history_invent->tanggal); ?></span></td> 
        <td><span class="list_group-waktu"><?= _ent($tb_history_invent->waktu); ?></span></td> 
        <td><?php if  ($tb_history_invent->id_room) {

            echo admin_anchor('/tb_room_master/view/'.$tb_history_invent->id_room.'?popup=show', $tb_history_invent->tb_room_master_name_room, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-user"><?= _ent($tb_history_invent->user); ?></span></td> 
        <td><span class="list_group-labeling"><?= _ent($tb_history_invent->labeling); ?></span></td> 
        <td><span class="list_group-rfid_code_tag"><?= _ent($tb_history_invent->rfid_code_tag); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_history_invent_view', function() use ($tb_history_invent){?>
                        <a href="<?= admin_site_url('/tb_history_invent/view/' . $tb_history_invent->id); ?>" data-id="<?= $tb_history_invent->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_history_invent_update', function() use ($tb_history_invent){?>
            <a href="<?= admin_site_url('/tb_history_invent/edit/' . $tb_history_invent->id); ?>" data-id="<?= $tb_history_invent->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_history_invent_delete', function() use ($tb_history_invent){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_history_invent/delete/' . $tb_history_invent->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_history_invent_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb History Invent data is not available
        </td>
        </tr>
    <?php endif; ?>