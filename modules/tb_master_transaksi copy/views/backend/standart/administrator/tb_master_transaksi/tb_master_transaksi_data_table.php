<?php foreach($tb_master_transaksis as $tb_master_transaksi): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_master_transaksi->id; ?>">
        </td>
                
        <td><span class="list_group-kode_transaksi"><?= _ent($tb_master_transaksi->kode_transaksi); ?></span></td> 
        <td><?php if  ($tb_master_transaksi->tipe_transaksi) {

            echo admin_anchor('/tb_master_type_transaksi/view/'.$tb_master_transaksi->tipe_transaksi.'?popup=show', $tb_master_transaksi->tb_master_type_transaksi_tipe_transaksi, ['class' => 'popup-view']); }?> </td>
         
        <td><span class="list_group-status_transaksi"><?= _ent($tb_master_transaksi->status_transaksi); ?></span></td> 
        <td><span class="list_group-tgl_awal_transaksi"><?= _ent($tb_master_transaksi->tgl_awal_transaksi); ?></span></td> 
        <td><span class="list_group-ket_transaksi"><?= _ent($tb_master_transaksi->ket_transaksi); ?></span></td> 
        <td><span class="list_group-id_pegawai_input"><?= _ent($tb_master_transaksi->id_pegawai_input); ?></span></td> 
        <td><span class="list_group-nama_pegawai_input"><?= _ent($tb_master_transaksi->nama_pegawai_input); ?></span></td> 
        <td><?php if  ($tb_master_transaksi->id_area) {

            echo admin_anchor('/tb_master_area/view/'.$tb_master_transaksi->id_area.'?popup=show', $tb_master_transaksi->tb_master_area_area, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tb_master_transaksi->id_gedung) {

            echo admin_anchor('/tb_master_gedung/view/'.$tb_master_transaksi->id_gedung.'?popup=show', $tb_master_transaksi->tb_master_gedung_gedung, ['class' => 'popup-view']); }?> </td>
         
        <td><?php if  ($tb_master_transaksi->id_ruangan) {

            echo admin_anchor('/tb_master_ruangan/view/'.$tb_master_transaksi->id_ruangan.'?popup=show', $tb_master_transaksi->tb_master_ruangan_ruangan, ['class' => 'popup-view']); }?> </td>
         
        <td width="200">
        
                        <?php is_allowed('tb_master_transaksi_view', function() use ($tb_master_transaksi){?>
                        <a href="<?= admin_site_url('/tb_master_transaksi/view/' . $tb_master_transaksi->id); ?>" data-id="<?= $tb_master_transaksi->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('tb_master_transaksi_update', function() use ($tb_master_transaksi){?>
            <a href="<?= admin_site_url('/tb_master_transaksi/edit/' . $tb_master_transaksi->id); ?>" data-id="<?= $tb_master_transaksi->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('tb_master_transaksi_delete', function() use ($tb_master_transaksi){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/tb_master_transaksi/delete/' . $tb_master_transaksi->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($tb_master_transaksi_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Master Transaksi data is not available
        </td>
        </tr>
    <?php endif; ?>