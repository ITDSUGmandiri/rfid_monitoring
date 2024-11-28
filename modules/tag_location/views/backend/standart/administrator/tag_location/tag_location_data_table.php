<?php foreach($tag_locations as $tag_location): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_location->location_id; ?>">
        </td>
                
        <td><?php if  ($tag_location->rfid_id) {

            echo admin_anchor('/tag_rfid/view/'.$tag_location->rfid_id.'?popup=show', $tag_location->tag_rfid_rfid_rfid, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tag_location->librarian_id) {

            echo admin_anchor('/tag_librarian/view/'.$tag_location->librarian_id.'?popup=show', $tag_location->tag_librarian_librarian_name, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-location_status"><?= _ent($tag_location->location_status); ?></span></td> 
        <td><span class="list_group-location_created"><?= _ent($tag_location->location_created); ?></span></td> 
        <td><span class="list_group-location_updated"><?= _ent($tag_location->location_updated); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_location_view', function() use ($tag_location){?>
                        <a href="<?= admin_site_url('/tag_location/view/' . $tag_location->location_id); ?>" data-id="<?= $tag_location->location_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_location_update', function() use ($tag_location){?>
            <a href="<?= admin_site_url('/tag_location/edit/' . $tag_location->location_id); ?>" data-id="<?= $tag_location->location_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_location_delete', function() use ($tag_location){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_location/delete/' . $tag_location->location_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_location_counts == 0) :?>
        <tr>
        <td colspan="100">
        Location data is not available
        </td>
        </tr>
    <?php endif; ?>