<?php foreach($table_asset_masters as $table_asset_master): ?>
    <tr>
                
        <td><span class="list_group-kode_satker"><?= _ent($table_asset_master->kode_satker); ?></span></td> 
        <td><span class="list_group-nama_satker"><?= _ent($table_asset_master->nama_satker); ?></span></td> 
        <td><span class="list_group-for_inventaris"><?= _ent($table_asset_master->for_inventaris); ?></span></td> 
        <td><span class="list_group-kode_brg"><?= _ent($table_asset_master->kode_brg); ?></span></td> 
        <td><span class="list_group-NUP"><?= _ent($table_asset_master->NUP); ?></span></td> 
        <td><span class="list_group-rfid_code_label"><?= _ent($table_asset_master->rfid_code_label); ?></span></td> 
        <td><span class="list_group-nama_brg"><?= _ent($table_asset_master->nama_brg); ?></span></td> 
        <td><span class="list_group-Merk"><?= _ent($table_asset_master->Merk); ?></span></td> 
        <td><span class="list_group-Tipe"><?= _ent($table_asset_master->Tipe); ?></span></td> 
        <td><span class="list_group-Kondisi"><?= _ent($table_asset_master->Kondisi); ?></span></td> 
        <td><span class="list_group-usia"><?= _ent($table_asset_master->usia); ?></span></td> 
        <td><span class="list_group-lokasi_id"><?= _ent($table_asset_master->lokasi_id); ?></span></td> 
        <td><span class="list_group-tgl_inventarisasi"><?= _ent($table_asset_master->tgl_inventarisasi); ?></span></td> 
        <td><span class="list_group-location_asset"><?= _ent($table_asset_master->location_asset); ?></span></td> 
        <td><span class="list_group-id"><?= _ent($table_asset_master->id); ?></span></td> 
            </tr>
    <?php endforeach; ?>
    <?php if ($table_asset_master_counts == 0) :?>
        <tr>
        <td colspan="100">
        Table Asset Master data is not available
        </td>
        </tr>
    <?php endif; ?>