<?php foreach ($tag_readers as $tag_reader): ?>
    <tr>
        <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $tag_reader->reader_id; ?>">
        </td>

        <td><?php if ($tag_reader->room_id) {

                echo admin_anchor('/tag_librarian/view/' . $tag_reader->room_id . '?popup=show', $tag_reader->tb_room_master_name_room, ['class' => 'popup-view']);
            } ?> </td>

        <td><span class="list_group-reader_name"><?= _ent($tag_reader->reader_name); ?></span></td>
        <td><span class="list_group-reader_serialnumber"><?= _ent($tag_reader->reader_serialnumber); ?></span></td>
        <td><span class="list_group-reader_type"><?= _ent($tag_reader->reader_type); ?></span></td>
        <td><span class="list_group-reader_ip"><?= _ent($tag_reader->reader_ip); ?></span></td>
        <td><span class="list_group-reader_port"><?= _ent($tag_reader->reader_port); ?></span></td>
        <td><span class="list_group-reader_com"><?= _ent($tag_reader->reader_com); ?></span></td>
        <td><span class="list_group-reader_baudrate"><?= _ent($tag_reader->reader_baudrate); ?></span></td>
        <td><span class="list_group-reader_power"><?= _ent($tag_reader->reader_power); ?></span></td>
        <td><span class="list_group-reader_interval"><?= _ent($tag_reader->reader_interval); ?></span></td>
        <td><span class="list_group-reader_mode"><?= _ent($tag_reader->reader_mode); ?></span></td>
        <td><span class="list_group-reader_family"><?= _ent($tag_reader->reader_family); ?></span></td>
        <td><span class="list_group-reader_model"><?= _ent($tag_reader->reader_model); ?></span></td>
        <td><span class="list_group-reader_identity"><?= _ent($tag_reader->reader_identity); ?></span></td>
        <td><span class="list_group-reader_antena"><?= _ent($tag_reader->reader_antena); ?></span></td>
        <td><span class="list_group-reader_angle"><?= _ent($tag_reader->reader_angle); ?></span></td>
        <td><span class="list_group-reader_gate"><?= _ent($tag_reader->reader_gate); ?></span></td>
        <td width="200">

            <?php is_allowed('tag_reader_view', function () use ($tag_reader) { ?>
                <a href="<?= admin_site_url('/tag_reader/view/' . $tag_reader->reader_id); ?>" data-id="<?= $tag_reader->reader_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                <?php }) ?>
                <?php is_allowed('tag_reader_update', function () use ($tag_reader) { ?>
                    <a href="<?= admin_site_url('/tag_reader/edit/' . $tag_reader->reader_id); ?>" data-id="<?= $tag_reader->reader_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                <?php }) ?>
                <?php is_allowed('tag_reader_delete', function () use ($tag_reader) { ?>
                    <a href="javascript:void(0);" data-href="<?= admin_site_url('/tag_reader/delete/' . $tag_reader->reader_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                <?php }) ?>

        </td>
    </tr>
<?php endforeach; ?>
<?php if ($tag_reader_counts == 0) : ?>
    <tr>
        <td colspan="100">
            Reader data is not available
        </td>
    </tr>
<?php endif; ?>