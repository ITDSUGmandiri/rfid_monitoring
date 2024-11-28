<?php foreach($tag_brokens as $tag_broken): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_broken->broken_id; ?>">
        </td>
                
        <td><?php if  ($tag_broken->rfid_id) {

            echo admin_anchor('/tag_rfid/view/'.$tag_broken->rfid_id.'?popup=show', $tag_broken->tag_rfid_rfid_rfid, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tag_broken->librarian_id) {

            echo admin_anchor('/tag_librarian/view/'.$tag_broken->librarian_id.'?popup=show', $tag_broken->tag_librarian_librarian_name, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-broken_laporan"><?= _ent($tag_broken->broken_laporan); ?></span></td> 
        <td><span class="list_group-broken_keterangan"><?= _ent($tag_broken->broken_keterangan); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_broken_view', function() use ($tag_broken){?>
                        <a href="<?= admin_site_url('/tag_broken/view/' . $tag_broken->broken_id); ?>" data-id="<?= $tag_broken->broken_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_broken_delete', function() use ($tag_broken){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_broken/delete/' . $tag_broken->broken_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_broken_counts == 0) :?>
        <tr>
        <td colspan="100">
        Broken data is not available
        </td>
        </tr>
    <?php endif; ?>