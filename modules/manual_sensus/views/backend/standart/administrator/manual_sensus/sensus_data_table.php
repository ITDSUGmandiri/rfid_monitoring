<?php foreach($sensus as $tb_master_transaksi): ?>
    <tr>
        <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tb_master_transaksi->id; ?>">
        </td>
                
        <!-- <td><span class="list_group-kode_transaksi"><?= _ent($tb_master_transaksi->kode_transaksi); ?></span></td>  -->
        <td style="text-align: center"><?php if ($tb_master_transaksi->tipe_transaksi) {
            echo $tb_master_transaksi->tb_master_type_transaksi_tipe_transaksi; }?></td>
        <!-- <td><span class="list_group-status_transaksi"><?= _ent($tb_master_transaksi->status_transaksi); ?></span></td>  -->
        <td style="text-align: center"><span class="list_group-tgl_awal_transaksi"><?= _ent(date('d-m-Y', strtotime($tb_master_transaksi->tgl_awal_transaksi))); ?></span></td>
        <td><span class="list_group-ket_transaksi"><?= _ent($tb_master_transaksi->ket_transaksi); ?></span></td> 
        <!-- <td><span class="list_group-id_pegawai_input"><?= _ent($tb_master_transaksi->id_pegawai_input); ?></span></td> 
        <td><span class="list_group-nama_pegawai_input"><?= _ent($tb_master_transaksi->nama_pegawai_input); ?></span></td>  -->
        <td><?php if ($tb_master_transaksi->id_area) {
            echo $tb_master_transaksi->tb_master_area_area;
        } ?></td>
         
        <td><?php if ($tb_master_transaksi->id_gedung) {
            echo $tb_master_transaksi->tb_master_gedung_gedung;
        } ?></td>
         
        <td><?php if ($tb_master_transaksi->id_ruangan) {
            echo $tb_master_transaksi->tb_master_ruangan_ruangan;
        } ?></td>

        <td style="text-align: center"><?php if ($tb_master_transaksi->status_transaksi == '1') {
            echo 'Open';
        } else if ($tb_master_transaksi->status_transaksi == '2') {
            echo 'Progress';
        } else if ($tb_master_transaksi->status_transaksi == '3') {
            echo 'Complete';
        } else {
            echo 'Cancel';
        } 
        ?>
        </td>

        <td width="200" style="text-align: center">
        
            <?php is_allowed('sensus_view', function() use ($tb_master_transaksi){?>
                <a href="<?= admin_site_url('/sensus/view/' . $tb_master_transaksi->id . '/' . $tb_master_transaksi->id_ruangan); ?>" data-id="<?= $tb_master_transaksi->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>

            <?php is_allowed('sensus_view_hasil_sensus', function() use ($tb_master_transaksi){?>
                <a href="<?= admin_site_url('/sensus/hasilSensus/' . $tb_master_transaksi->id . '/' . $tb_master_transaksi->id_ruangan); ?>" data-id="<?= $tb_master_transaksi->id ?>" class="label-default btn-act-view"><i class="fa fa-file-pdf-o"></i> <?= cclang('Hasil'); ?>
            <?php }) ?>

            <?php is_allowed('sensus_view_rekon_sensus', function() use ($tb_master_transaksi){?>
                <a href="<?= admin_site_url('/sensus/rekonSensus/' . $tb_master_transaksi->id . '/' . $tb_master_transaksi->id_ruangan); ?>" data-id="<?= $tb_master_transaksi->id ?>" class="label-default btn-act-view"><i class="fa fa-file-text-o"></i> <?= cclang('Rekon'); ?>
            <?php }) ?>
            
            <!-- <?php is_allowed('sensus_view_update', function() use ($tb_master_transaksi){?>
            <a href="<?= admin_site_url('/sensus/edit/' . $tb_master_transaksi->id); ?>" data-id="<?= $tb_master_transaksi->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?> -->
            <!-- <?php is_allowed('sensus_view_delete', function() use ($tb_master_transaksi){?>
                <a href="javascript:void(0);" data-href="<?= admin_site_url('/sensus/delete/' . $tb_master_transaksi->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?> -->

        </td>    
    </tr>
<?php endforeach; ?>
<?php if ($sensus_counts == 0) :?>
        <tr>
        <td colspan="100">
        Sensus data is not available
        </td>
    </tr>
<?php endif; ?>