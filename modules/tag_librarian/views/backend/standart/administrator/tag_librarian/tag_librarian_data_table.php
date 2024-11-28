<?php foreach($tag_librarians as $tag_librarian): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_librarian->librarian_id; ?>">
        </td>
                
        <td><span class="list_group-librarian_name"><?= _ent($tag_librarian->librarian_name); ?></span></td> 
        <td><span class="list_group-librarian_gate"><?= _ent($tag_librarian->librarian_gate); ?></span></td> 
        <td><?php if  ($tag_librarian->building_id) {

            echo admin_anchor('/lokasi_kerja/view/'.$tag_librarian->building_id.'?popup=show', $tag_librarian->lokasi_kerja_nama_lokasi, ['class' => 'popup-view']); }?> </td>
         
        <td width="200">
        
                        <?php is_allowed('tag_librarian_view', function() use ($tag_librarian){?>
                        <a href="<?= admin_site_url('/tag_librarian/view/' . $tag_librarian->librarian_id); ?>" data-id="<?= $tag_librarian->librarian_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_librarian_update', function() use ($tag_librarian){?>
            <a href="<?= admin_site_url('/tag_librarian/edit/' . $tag_librarian->librarian_id); ?>" data-id="<?= $tag_librarian->librarian_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_librarian_delete', function() use ($tag_librarian){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_librarian/delete/' . $tag_librarian->librarian_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_librarian_counts == 0) :?>
        <tr>
        <td colspan="100">
        Librarian data is not available
        </td>
        </tr>
    <?php endif; ?>