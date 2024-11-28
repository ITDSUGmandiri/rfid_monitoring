<?php foreach($tb_master_asets as $tb_master_aset): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_master_aset->id; ?>">
        </td>
                
        <td><span class="list_group-kode_tid"><?= _ent($tb_master_aset->kode_tid); ?></span></td> 
        <td><span class="list_group-kode_aset"><?= _ent($tb_master_aset->kode_aset); ?></span></td> 
        <td><span class="list_group-nup"><?= _ent($tb_master_aset->nup); ?></span></td> 
        <td><span class="list_group-kategori"><?= _ent($tb_master_aset->kategori); ?></span></td> 
        <td><span class="list_group-merk"><?= _ent($tb_master_aset->merk); ?></span></td> 
        <td><span class="list_group-tipe"><?= _ent($tb_master_aset->tipe); ?></span></td> 
        <td><span class="list_group-id_kondisi"><?= _ent($tb_master_aset->id_kondisi); ?></span></td> 
        <td><span class="list_group-status"><?= _ent($tb_master_aset->status); ?></span></td> 
        <td><span class="list_group-tipe_moving"><?= _ent($tb_master_aset->tipe_moving); ?></span></td> 
        <td><span class="list_group-nama_aset"><?= _ent($tb_master_aset->nama_aset); ?></span></td> 
        <td><span class="list_group-id_area"><?= _ent($tb_master_aset->id_area); ?></span></td> 
        <td><span class="list_group-id_gedung"><?= _ent($tb_master_aset->id_gedung); ?></span></td> 
        <td><span class="list_group-id_ruangan"><?= _ent($tb_master_aset->id_ruangan); ?></span></td> 
        <td><span class="list_group-tgl_perolehan"><?= _ent($tb_master_aset->tgl_perolehan); ?></span></td> 
        <td><span class="list_group-tgl_inventarisasi"><?= _ent($tb_master_aset->tgl_inventarisasi); ?></span></td> 
        <td><span class="list_group-flag_inventarisasi"><?= _ent($tb_master_aset->flag_inventarisasi); ?></span></td> 
        <td><span class="list_group-tgl_peminjaman"><?= _ent($tb_master_aset->tgl_peminjaman); ?></span></td> 
        <td><span class="list_group-tgl_pengembalian"><?= _ent($tb_master_aset->tgl_pengembalian); ?></span></td> 
        <td><span class="list_group-tgl_mutasi"><?= _ent($tb_master_aset->tgl_mutasi); ?></span></td> 
        <td><span class="list_group-id_lokasi_moving"><?= _ent($tb_master_aset->id_lokasi_moving); ?></span></td> 
        <td><span class="list_group-id_pegawai"><?= _ent($tb_master_aset->id_pegawai); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_master_aset_view', function() use ($tb_master_aset){?>
                        <a href="<?= admin_site_url('/tb_master_aset/view/' . $tb_master_aset->id); ?>" data-id="<?= $tb_master_aset->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_master_aset_update', function() use ($tb_master_aset){?>
            <a href="<?= admin_site_url('/tb_master_aset/edit/' . $tb_master_aset->id); ?>" data-id="<?= $tb_master_aset->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_master_aset_delete', function() use ($tb_master_aset){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_master_aset/delete/' . $tb_master_aset->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_master_aset_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Master Aset data is not available
        </td>
        </tr>
    <?php endif; ?>