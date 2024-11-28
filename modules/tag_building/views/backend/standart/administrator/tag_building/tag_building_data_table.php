<?php foreach($tag_buildings as $tag_building): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_building->building_id; ?>">
        </td>
                
        <td><span class="list_group-building_name"><?= _ent($tag_building->building_name); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tag_building_view', function() use ($tag_building){?>
                        <a href="<?= admin_site_url('/tag_building/view/' . $tag_building->building_id); ?>" data-id="<?= $tag_building->building_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tag_building_update', function() use ($tag_building){?>
            <a href="<?= admin_site_url('/tag_building/edit/' . $tag_building->building_id); ?>" data-id="<?= $tag_building->building_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tag_building_delete', function() use ($tag_building){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_building/delete/' . $tag_building->building_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tag_building_counts == 0) :?>
        <tr>
        <td colspan="100">
        Building data is not available
        </td>
        </tr>
    <?php endif; ?>