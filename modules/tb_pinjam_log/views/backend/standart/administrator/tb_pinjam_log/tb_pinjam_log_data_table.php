<?php foreach($tb_pinjam_logs as $tb_pinjam_log): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_pinjam_log->id; ?>">
        </td>
                
        <td><span class="list_group-pinjam_id"><?= _ent($tb_pinjam_log->pinjam_id); ?></span></td> 
        <td><span class="list_group-tanggal_proses"><?= _ent($tb_pinjam_log->tanggal_proses); ?></span></td> 
        <td><span class="list_group-tanggal_pinjam"><?= _ent($tb_pinjam_log->tanggal_pinjam); ?></span></td> 
        <td><span class="list_group-waktu_pinjam"><?= _ent($tb_pinjam_log->waktu_pinjam); ?></span></td> 
        <td><span class="list_group-tanggal_kembali"><?= _ent($tb_pinjam_log->tanggal_kembali); ?></span></td> 
        <td><span class="list_group-waktu_kembali"><?= _ent($tb_pinjam_log->waktu_kembali); ?></span></td> 
        <td><?php if  ($tb_pinjam_log->lend_id) {

            echo admin_anchor('/tb_pegawai_master/view/'.$tb_pinjam_log->lend_id.'?popup=show', $tb_pinjam_log->tb_pegawai_master_Pegawai, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-peminjam"><?= _ent($tb_pinjam_log->peminjam); ?></span></td> 
        <td><?php if  ($tb_pinjam_log->job) {

            echo admin_anchor('/tb_kelompok_kerjaan/view/'.$tb_pinjam_log->job.'?popup=show', $tb_pinjam_log->tb_kelompok_kerjaan_jenis, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-alamat"><?= _ent($tb_pinjam_log->alamat); ?></span></td> 
        <td><span class="list_group-telp"><?= _ent($tb_pinjam_log->telp); ?></span></td> 
        <td><?= join_multi_select($tb_pinjam_log->tag_code, 'tb_asset_master', 'tag_code', 'nama_brg'); ?></td> 
        <td><span class="list_group-status"><?= _ent($tb_pinjam_log->status); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('tb_pinjam_log_view', function() use ($tb_pinjam_log){?>
                        <a href="<?= admin_site_url('/tb_pinjam_log/view/' . $tb_pinjam_log->id); ?>" data-id="<?= $tb_pinjam_log->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_pinjam_log_update', function() use ($tb_pinjam_log){?>
            <a href="<?= admin_site_url('/tb_pinjam_log/edit/' . $tb_pinjam_log->id); ?>" data-id="<?= $tb_pinjam_log->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_pinjam_log_delete', function() use ($tb_pinjam_log){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_pinjam_log/delete/' . $tb_pinjam_log->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_pinjam_log_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Pinjam Log data is not available
        </td>
        </tr>
    <?php endif; ?>