<?php foreach($bmns as $bmn): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $bmn->id_bmn; ?>">
        </td>
                
        <td><span class="list_group-bagian"><?= _ent($bmn->bagian); ?></span></td> 
        <td><span class="list_group-kode_barang"><?= _ent($bmn->kode_barang); ?></span></td> 
        <td><span class="list_group-nama_barang"><?= _ent($bmn->nama_barang); ?></span></td> 
        <td><span class="list_group-nup"><?= _ent($bmn->nup); ?></span></td> 
        <td><span class="list_group-merk"><?= _ent($bmn->merk); ?></span></td> 
        <td><span class="list_group-tanggal_perolehan"><?= _ent($bmn->tanggal_perolehan); ?></span></td> 
        <td><span class="list_group-kategori_barang"><?= _ent($bmn->kategori_barang); ?></span></td> 
        <td><span class="list_group-tahun_sensus"><?= _ent($bmn->tahun_sensus); ?></span></td> 
        <td><span class="list_group-keterangan"><?= _ent($bmn->keterangan); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('bmn_view', function() use ($bmn){?>
                        <a href="<?= admin_site_url('/bmn/view/' . $bmn->id_bmn); ?>" data-id="<?= $bmn->id_bmn ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('bmn_update', function() use ($bmn){?>
            <a href="<?= admin_site_url('/bmn/edit/' . $bmn->id_bmn); ?>" data-id="<?= $bmn->id_bmn ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('bmn_delete', function() use ($bmn){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/bmn/delete/' . $bmn->id_bmn); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($bmn_counts == 0) :?>
        <tr>
        <td colspan="100">
        Bmn data is not available
        </td>
        </tr>
    <?php endif; ?>