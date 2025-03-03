<?php foreach($configs as $config): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $config->id_config; ?>">
        </td>
                
        <td><span class="list_group-kode"><?= _ent($config->kode); ?></span></td> 
        <td><span class="list_group-config_name"><?= _ent($config->config_name); ?></span></td> 
        <td><span class="list_group-variable"><?= _ent($config->variable); ?></span></td> 
        <td><span class="list_group-value"><?= _ent($config->value); ?></span></td> 
        <td><span class="list_group-is_active"><?= _ent($config->is_active); ?></span></td> 
        <td><span class="list_group-owner"><?= _ent($config->owner); ?></span></td> 
        <td><span class="list_group-keterangan"><?= _ent($config->keterangan); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('config_view', function() use ($config){?>
                        <a href="<?= admin_site_url('/config/view/' . $config->id_config); ?>" data-id="<?= $config->id_config ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('config_update', function() use ($config){?>
            <a href="<?= admin_site_url('/config/edit/' . $config->id_config); ?>" data-id="<?= $config->id_config ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('config_delete', function() use ($config){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/config/delete/' . $config->id_config); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($config_counts == 0) :?>
        <tr>
        <td colspan="100">
        Config data is not available
        </td>
        </tr>
    <?php endif; ?>