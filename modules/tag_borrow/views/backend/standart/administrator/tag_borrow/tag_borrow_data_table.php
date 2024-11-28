<?php foreach($tag_borrows as $tag_borrow): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_borrow->borrow_id; ?>">
        </td>
                
        <td><?php if  ($tag_borrow->rfid_id) {

            echo admin_anchor('/tag_rfid/view/'.$tag_borrow->rfid_id.'?popup=show', $tag_borrow->tag_rfid_rfid_rfid, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tag_borrow->librarian_id) {

            echo admin_anchor('/tag_librarian/view/'.$tag_borrow->librarian_id.'?popup=show', $tag_borrow->tag_librarian_librarian_name, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-borrow_keperluan"><?= _ent($tag_borrow->borrow_keperluan); ?></span></td> 
        <td><span class="list_group-borrow_peminjam"><?= _ent($tag_borrow->borrow_peminjam); ?></span></td> 
        <td><span class="list_group-borrow_peminjaman"><?= _ent($tag_borrow->borrow_peminjaman); ?></span></td> 
        <td><span class="list_group-borrow_pengembalian"><?= _ent($tag_borrow->borrow_pengembalian); ?></span></td> 
        <td><span class="list_group-borrow_status"><?= _ent($tag_borrow->borrow_status); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_borrow_view', function() use ($tag_borrow){?>
                        <a href="<?= admin_site_url('/tag_borrow/view/' . $tag_borrow->borrow_id); ?>" data-id="<?= $tag_borrow->borrow_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_borrow_update', function() use ($tag_borrow){?>
            <a href="<?= admin_site_url('/tag_borrow/edit/' . $tag_borrow->borrow_id); ?>" data-id="<?= $tag_borrow->borrow_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_borrow_delete', function() use ($tag_borrow){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_borrow/delete/' . $tag_borrow->borrow_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_borrow_counts == 0) :?>
        <tr>
        <td colspan="100">
        Borrow data is not available
        </td>
        </tr>
    <?php endif; ?>