<?php foreach($tag_rfids as $tag_rfid): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_rfid->rfid_id; ?>">
        </td>
                
        <td><?php if  ($tag_rfid->label_id) {

            echo admin_anchor('/tag_label/view/'.$tag_rfid->label_id.'?popup=show', $tag_rfid->tag_label_label_name, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-rfid_barcode"><?= _ent($tag_rfid->rfid_barcode); ?></span></td> 
        <td><span class="list_group-rfid_rfid"><?= _ent($tag_rfid->rfid_rfid); ?></span></td> 
        <td><span class="list_group-rfid_status"><?= _ent($tag_rfid->rfid_status); ?></span></td> 
        <td><span class="list_group-rfid_note"><?= _ent($tag_rfid->rfid_note); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_rfid_view', function() use ($tag_rfid){?>
                        <a href="<?= admin_site_url('/tag_rfid/view/' . $tag_rfid->rfid_id); ?>" data-id="<?= $tag_rfid->rfid_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_rfid_delete', function() use ($tag_rfid){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_rfid/delete/' . $tag_rfid->rfid_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_rfid_counts == 0) :?>
        <tr>
        <td colspan="100">
        RFID data is not available
        </td>
        </tr>
    <?php endif; ?>