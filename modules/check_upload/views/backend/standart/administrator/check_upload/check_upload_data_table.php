<?php foreach($check_uploads as $check_upload): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $check_upload->id; ?>">
        </td>
                
        <td>
            <?php foreach (explode(',', $check_upload->file1) as $file): ?>
            <?php if (!empty($file)): ?>
            <?php if (is_image($file)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>">
                <img src="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>" class="image-responsive" alt="image check_upload" title="file1 check_upload" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>" target="blank">
                <img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image check_upload" title="file1 <?= $file; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </td>
         
        <td>
            <?php foreach (explode(',', $check_upload->file2) as $file): ?>
            <?php if (!empty($file)): ?>
            <?php if (is_image($file)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>">
                <img src="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>" class="image-responsive" alt="image check_upload" title="file2 check_upload" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>" target="blank">
                <img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image check_upload" title="file2 <?= $file; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </td>
         
        <td>
            <?php foreach (explode(',', $check_upload->file3) as $file): ?>
            <?php if (!empty($file)): ?>
            <?php if (is_image($file)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>">
                <img src="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>" class="image-responsive" alt="image check_upload" title="file3 check_upload" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/check_upload/' . $file; ?>" target="blank">
                <img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image check_upload" title="file3 <?= $file; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </td>
         
        <td width="200">
        
                        <?php is_allowed('check_upload_view', function() use ($check_upload){?>
                        <a href="<?= admin_site_url('/check_upload/view/' . $check_upload->id); ?>" data-id="<?= $check_upload->id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('check_upload_update', function() use ($check_upload){?>
            <a href="<?= admin_site_url('/check_upload/edit/' . $check_upload->id); ?>" data-id="<?= $check_upload->id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('check_upload_delete', function() use ($check_upload){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/check_upload/delete/' . $check_upload->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($check_upload_counts == 0) :?>
        <tr>
        <td colspan="100">
        Check Upload data is not available
        </td>
        </tr>
    <?php endif; ?>