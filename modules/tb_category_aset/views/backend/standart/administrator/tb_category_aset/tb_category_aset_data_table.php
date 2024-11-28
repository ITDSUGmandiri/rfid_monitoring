<?php foreach($tb_category_asets as $tb_category_aset): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_category_aset->id; ?>">
        </td>
                
        <td><span class="list_group-kode_kategori"><?= _ent($tb_category_aset->kode_kategori); ?></span></td> 
        <td><span class="list_group-nama"><?= _ent($tb_category_aset->nama); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_category_aset_view', function() use ($tb_category_aset){?>
                        <a href="<?= admin_site_url('/tb_category_aset/view/' . $tb_category_aset->id); ?>" data-id="<?= $tb_category_aset->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_category_aset_update', function() use ($tb_category_aset){?>
            <a href="<?= admin_site_url('/tb_category_aset/edit/' . $tb_category_aset->id); ?>" data-id="<?= $tb_category_aset->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_category_aset_delete', function() use ($tb_category_aset){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_category_aset/delete/' . $tb_category_aset->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_category_aset_counts == 0) :?>
        <tr>
        <td colspan="100">
        Jenis Kategori Aset data is not available
        </td>
        </tr>
    <?php endif; ?>