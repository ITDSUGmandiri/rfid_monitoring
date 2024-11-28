<?php foreach($tag_anomalys as $tag_anomaly): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_anomaly->anomaly_id; ?>">
        </td>
                
        <td><?php if  ($tag_anomaly->rfid_id) {

            echo admin_anchor('/tag_rfid/view/'.$tag_anomaly->rfid_id.'?popup=show', $tag_anomaly->tag_rfid_rfid_rfid, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tag_anomaly->anomaly_right_librarian) {

            echo admin_anchor('/tag_librarian/view/'.$tag_anomaly->anomaly_right_librarian.'?popup=show', $tag_anomaly->tag_librarian_librarian_name, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tag_anomaly->anomaly_wrong_librarian) {

            echo admin_anchor('/tag_librarian/view/'.$tag_anomaly->anomaly_wrong_librarian.'?popup=show', $tag_anomaly->tag_librarian_librarian_name, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-anomaly_status"><?= _ent($tag_anomaly->anomaly_status); ?></span></td> 
        <td><span class="list_group-rfid_barcode"><?= _ent($tag_anomaly->rfid_barcode); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_anomaly_view', function() use ($tag_anomaly){?>
                        <a href="<?= admin_site_url('/tag_anomaly/view/' . $tag_anomaly->anomaly_id); ?>" data-id="<?= $tag_anomaly->anomaly_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_anomaly_update', function() use ($tag_anomaly){?>
            <a href="<?= admin_site_url('/tag_anomaly/edit/' . $tag_anomaly->anomaly_id); ?>" data-id="<?= $tag_anomaly->anomaly_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_anomaly_delete', function() use ($tag_anomaly){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_anomaly/delete/' . $tag_anomaly->anomaly_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_anomaly_counts == 0) :?>
        <tr>
        <td colspan="100">
        Anomaly data is not available
        </td>
        </tr>
    <?php endif; ?>