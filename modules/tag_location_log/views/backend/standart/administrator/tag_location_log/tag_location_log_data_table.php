<?php foreach($tag_location_logs as $tag_location_log): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_location_log->log_id; ?>">
        </td>
                
        <td><?php if  ($tag_location_log->rfid_id) {

            echo admin_anchor('/tag_rfid/view/'.$tag_location_log->rfid_id.'?popup=show', $tag_location_log->tag_rfid_rfid_rfid, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tag_location_log->librarian_id) {

            echo admin_anchor('/tag_librarian/view/'.$tag_location_log->librarian_id.'?popup=show', $tag_location_log->tag_librarian_librarian_name, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-log_status"><?= _ent($tag_location_log->log_status); ?></span></td> 
        <td><span class="list_group-log_created"><?= _ent($tag_location_log->log_created); ?></span></td> 
        <td><span class="list_group-log_createdby"><?= _ent($tag_location_log->log_createdby); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_location_log_view', function() use ($tag_location_log){?>
                        <a href="<?= admin_site_url('/tag_location_log/view/' . $tag_location_log->log_id); ?>" data-id="<?= $tag_location_log->log_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_location_log_update', function() use ($tag_location_log){?>
            <a href="<?= admin_site_url('/tag_location_log/edit/' . $tag_location_log->log_id); ?>" data-id="<?= $tag_location_log->log_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_location_log_delete', function() use ($tag_location_log){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_location_log/delete/' . $tag_location_log->log_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_location_log_counts == 0) :?>
        <tr>
        <td colspan="100">
        Location Log data is not available
        </td>
        </tr>
    <?php endif; ?>