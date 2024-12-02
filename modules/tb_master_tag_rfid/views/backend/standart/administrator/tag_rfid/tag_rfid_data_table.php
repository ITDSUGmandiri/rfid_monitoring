<?php foreach ($tag_rfids as $tag_rfid): ?>
    <tr>




        <td><span class="list_group-rfid_barcode"><?= _ent($tag_rfid->kode_tid); ?></span></td>
        <td><span class="list_group-rfid_rfid"></td>
        <td><span class="list_group-rfid_rfid"></td>
        <td><span class="list_group-rfid_status"><?= _ent($tag_rfid->status_tag); ?></span></td>
        <td width="200">

            <?php is_allowed('tag_rfid_view', function () use ($tag_rfid) { ?>
                <a href="<?= admin_site_url('/tag_rfid/view/' . $tag_rfid->id); ?>" data-id="<?= $tag_rfid->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tag_rfid_delete', function () use ($tag_rfid) { ?>
                    <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_rfid/delete/' . $tag_rfid->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                <?php }) ?>

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tag_rfid_counts == 0) : ?>
    <tr>
        <td colspan="100">
            RFID data is not available
        </td>
    </tr>
<?php endif; ?>