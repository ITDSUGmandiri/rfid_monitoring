<?php foreach($tag_labels as $tag_label): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_label->label_id; ?>">
        </td>
                
        <td><span class="list_group-label_supplier"><?= _ent($tag_label->label_supplier); ?></span></td> 
        <td><span class="list_group-label_name"><?= _ent($tag_label->label_name); ?></span></td> 
        <td><span class="list_group-label_description"><?= _ent($tag_label->label_description); ?></span></td> 
        <td>
            <?php if (!empty($tag_label->label_image)): ?>
            <?php if (is_image($tag_label->label_image)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/tag_label/' . $tag_label->label_image; ?>">
                <img src="<?= BASE_URL . 'uploads/tag_label/' . $tag_label->label_image; ?>" class="image-responsive" alt="image tag_label" title="label_image tag_label" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/tag_label/' . $tag_label->label_image; ?>" target="blank">
                <img src="<?= get_icon_file($tag_label->label_image); ?>" class="image-responsive image-icon" alt="image tag_label" title="label_image <?= $tag_label->label_image; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
        </td>
         
        <td><span class="list_group-label_dimension"><?= _ent($tag_label->label_dimension); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_label_view', function() use ($tag_label){?>
                        <a href="<?= admin_site_url('/tag_label/view/' . $tag_label->label_id); ?>" data-id="<?= $tag_label->label_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_label_update', function() use ($tag_label){?>
            <a href="<?= admin_site_url('/tag_label/edit/' . $tag_label->label_id); ?>" data-id="<?= $tag_label->label_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_label_delete', function() use ($tag_label){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_label/delete/' . $tag_label->label_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_label_counts == 0) :?>
        <tr>
        <td colspan="100">
        Label data is not available
        </td>
        </tr>
    <?php endif; ?>