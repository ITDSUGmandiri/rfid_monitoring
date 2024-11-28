<?php foreach($lokasi_kerjas as $lokasi_kerja): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $lokasi_kerja->id; ?>">
        </td>
                
        <td><span class="list_group-kode"><?= _ent($lokasi_kerja->kode); ?></span></td> 
        <td><span class="list_group-nama_lokasi"><?= _ent($lokasi_kerja->nama_lokasi); ?></span></td> 
        <td><span class="list_group-keterangan"><?= _ent($lokasi_kerja->keterangan); ?></span></td> 
        <td><span class="list_group-alamat_lengkap"><?= _ent($lokasi_kerja->alamat_lengkap); ?></span></td> 
        <td><span class="list_group-lat"><?= _ent($lokasi_kerja->lat); ?></span></td> 
        <td><span class="list_group-long"><?= _ent($lokasi_kerja->long); ?></span></td> 
        <td><span class="list_group-user_create"><?= _ent($lokasi_kerja->user_create); ?></span></td> 
        <td><span class="list_group-create_date"><?= _ent($lokasi_kerja->create_date); ?></span></td> 
        <td><span class="list_group-user_change"><?= _ent($lokasi_kerja->user_change); ?></span></td> 
        <td><span class="list_group-change_date"><?= _ent($lokasi_kerja->change_date); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('lokasi_kerja_view', function() use ($lokasi_kerja){?>
                        <a href="<?= admin_site_url('/lokasi_kerja/view/' . $lokasi_kerja->id); ?>" data-id="<?= $lokasi_kerja->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('lokasi_kerja_update', function() use ($lokasi_kerja){?>
            <a href="<?= admin_site_url('/lokasi_kerja/edit/' . $lokasi_kerja->id); ?>" data-id="<?= $lokasi_kerja->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('lokasi_kerja_delete', function() use ($lokasi_kerja){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/lokasi_kerja/delete/' . $lokasi_kerja->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($lokasi_kerja_counts == 0) :?>
        <tr>
        <td colspan="100">
        Area data is not available
        </td>
        </tr>
    <?php endif; ?>