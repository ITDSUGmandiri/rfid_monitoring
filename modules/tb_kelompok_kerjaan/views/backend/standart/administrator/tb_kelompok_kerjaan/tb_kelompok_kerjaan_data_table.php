<?php foreach($tb_kelompok_kerjaans as $tb_kelompok_kerjaan): ?>
    <tr>
                
        <td><span class="list_group-id"><?= _ent($tb_kelompok_kerjaan->id); ?></span></td> 
        <td><span class="list_group-kode"><?= _ent($tb_kelompok_kerjaan->kode); ?></span></td> 
        <td><span class="list_group-jenis"><?= _ent($tb_kelompok_kerjaan->jenis); ?></span></td> 
        <td><span class="list_group-kelompok"><?= _ent($tb_kelompok_kerjaan->kelompok); ?></span></td> 
            </tr>
    <?php endforeach; ?>
    <?php if ($tb_kelompok_kerjaan_counts == 0) :?>
        <tr>
        <td colspan="100">
        Tb Kelompok Kerjaan data is not available
        </td>
        </tr>
    <?php endif; ?>