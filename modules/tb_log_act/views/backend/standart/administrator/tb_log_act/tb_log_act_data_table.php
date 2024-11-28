<?php foreach($tb_log_acts as $tb_log_act): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_log_act->id; ?>">
        </td>
                
        <td><span class="list_group-log_id"><?= _ent($tb_log_act->log_id); ?></span></td> 
        <td><span class="list_group-act_id"><?= _ent($tb_log_act->act_id); ?></span></td> 
        <td><span class="list_group-keterangan"><?= _ent($tb_log_act->keterangan); ?></span></td> 
        <td><span class="list_group-user"><?= _ent($tb_log_act->user); ?></span></td> 
        <td><span class="list_group-date"><?= _ent($tb_log_act->date); ?></span></td> 
        <td><span class="list_group-time"><?= _ent($tb_log_act->time); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_log_act_view', function() use ($tb_log_act){?>
                        <a href="<?= admin_site_url('/tb_log_act/view/' . $tb_log_act->id); ?>" data-id="<?= $tb_log_act->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_log_act_update', function() use ($tb_log_act){?>
            <a href="<?= admin_site_url('/tb_log_act/edit/' . $tb_log_act->id); ?>" data-id="<?= $tb_log_act->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_log_act_delete', function() use ($tb_log_act){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_log_act/delete/' . $tb_log_act->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_log_act_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Log Act data is not available
        </td>
        </tr>
    <?php endif; ?>