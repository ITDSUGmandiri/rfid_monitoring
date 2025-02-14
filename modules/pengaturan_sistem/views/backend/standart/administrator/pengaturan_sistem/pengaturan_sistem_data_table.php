<?php foreach($pengaturan_sistems as $pengaturan_sistem): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $pengaturan_sistem->is_system_on; ?>">
        </td>
                
        <td><span class="list_group-ip_address_server"><?= _ent($pengaturan_sistem->ip_address_server); ?></span></td> 
        <td><span class="list_group-protocol_ws_server"><?= _ent($pengaturan_sistem->protocol_ws_server); ?></span></td> 
        <td><span class="list_group-port_ws_server"><?= _ent($pengaturan_sistem->port_ws_server); ?></span></td> 
        <td><span class="list_group-validation_ip_address_server"><?= _ent($pengaturan_sistem->validation_ip_address_server); ?></span></td> 
        <td><span class="list_group-validation_protocol_ws_server"><?= _ent($pengaturan_sistem->validation_protocol_ws_server); ?></span></td> 
        <td><span class="list_group-validation_port_ws_server"><?= _ent($pengaturan_sistem->validation_port_ws_server); ?></span></td> 
        <td><span class="list_group-validation_auto_reconnect"><?= _ent($pengaturan_sistem->validation_auto_reconnect); ?></span></td> 
        <td><span class="list_group-flag_moving_in"><?= _ent($pengaturan_sistem->flag_moving_in); ?></span></td> 
        <td><span class="list_group-flag_moving_out"><?= _ent($pengaturan_sistem->flag_moving_out); ?></span></td> 
        <td><span class="list_group-timeout_duration"><?= _ent($pengaturan_sistem->timeout_duration); ?></span></td> 
        <td><span class="list_group-is_web_play_buzzer"><?= _ent($pengaturan_sistem->is_web_play_buzzer); ?></span></td> 
        <td><span class="list_group-deras_status_default"><?= _ent($pengaturan_sistem->deras_status_default); ?></span></td> 
        <td><span class="list_group-deras_description"><?= _ent($pengaturan_sistem->deras_description); ?></span></td> 
        <td><span class="list_group-deras_category_default"><?= _ent($pengaturan_sistem->deras_category_default); ?></span></td> 
        <td><span class="list_group-flag_alarm_register_tag"><?= _ent($pengaturan_sistem->flag_alarm_register_tag); ?></span></td> 
        <td><span class="list_group-flag_status_available"><?= _ent($pengaturan_sistem->flag_status_available); ?></span></td> 
        <td><span class="list_group-flag_status_not_available"><?= _ent($pengaturan_sistem->flag_status_not_available); ?></span></td> 
        <td><span class="list_group-flag_kondisi_baik"><?= _ent($pengaturan_sistem->flag_kondisi_baik); ?></span></td> 
        <td><span class="list_group-flag_sensus_normal"><?= _ent($pengaturan_sistem->flag_sensus_normal); ?></span></td> 
        <td><span class="list_group-flag_sensus_anomali"><?= _ent($pengaturan_sistem->flag_sensus_anomali); ?></span></td> 
        <td width="200">
        
                        <?php is_allowed('pengaturan_sistem_view', function() use ($pengaturan_sistem){?>
                        <a href="<?= admin_site_url('/pengaturan_sistem/view/' . $pengaturan_sistem->is_system_on); ?>" data-id="<?= $pengaturan_sistem->is_system_on ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('pengaturan_sistem_update', function() use ($pengaturan_sistem){?>
            <a href="<?= admin_site_url('/pengaturan_sistem/edit/' . $pengaturan_sistem->is_system_on); ?>" data-id="<?= $pengaturan_sistem->is_system_on ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('pengaturan_sistem_delete', function() use ($pengaturan_sistem){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/pengaturan_sistem/delete/' . $pengaturan_sistem->is_system_on); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($pengaturan_sistem_counts == 0) :?>
        <tr>
        <td colspan="100">
        Pengaturan Sistem data is not available
        </td>
        </tr>
    <?php endif; ?>