<?php foreach($blog_categorys as $blog_category): ?>
    <tr>
                <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="<?= $blog_category->category_id; ?>">
        </td>
                
        <td><span class="list_group-category_name"><?= _ent($blog_category->category_name); ?></span></td> 
        <td>
            <?php foreach (explode(',', $blog_category->category_desc) as $file): ?>
            <?php if (!empty($file)): ?>
            <?php if (is_image($file)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>">
                <img src="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>" class="image-responsive" alt="image blog_category" title="category_desc blog_category" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>" target="blank">
                <img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image blog_category" title="category_desc <?= $file; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </td>
         
        <td>
            <?php foreach (explode(',', $blog_category->pilihan) as $file): ?>
            <?php if (!empty($file)): ?>
            <?php if (is_image($file)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>">
                <img src="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>" class="image-responsive" alt="image blog_category" title="pilihan blog_category" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>" target="blank">
                <img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image blog_category" title="pilihan <?= $file; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </td>
         
        <td>
            <?php foreach (explode(',', $blog_category->check) as $file): ?>
            <?php if (!empty($file)): ?>
            <?php if (is_image($file)): ?>
            <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>">
                <img src="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>" class="image-responsive" alt="image blog_category" title="check blog_category" width="40px">
            </a>
            <?php else: ?>
                <a href="<?= BASE_URL . 'uploads/blog_category/' . $file; ?>" target="blank">
                <img src="<?= get_icon_file($file); ?>" class="image-responsive image-icon" alt="image blog_category" title="check <?= $file; ?>" width="40px"> 
                </a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </td>
         
        <td width="200">
        
                        <?php is_allowed('blog_category_view', function() use ($blog_category){?>
                        <a href="<?= admin_site_url('/blog_category/view/' . $blog_category->category_id); ?>" data-id="<?= $blog_category->category_id ?>" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
            <?php }) ?>
            <?php is_allowed('blog_category_update', function() use ($blog_category){?>
            <a href="<?= admin_site_url('/blog_category/edit/' . $blog_category->category_id); ?>" data-id="<?= $blog_category->category_id ?>" class="label-default btn-act-edit"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
            <?php }) ?>
            <?php is_allowed('blog_category_delete', function() use ($blog_category){?>
            <a href="javascript:void(0);" data-href="<?= admin_site_url('/blog_category/delete/' . $blog_category->category_id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
            <?php }) ?>

        </td>    </tr>
    <?php endforeach; ?>
    <?php if ($blog_category_counts == 0) :?>
        <tr>
        <td colspan="100">
        Blog Category data is not available
        </td>
        </tr>
    <?php endif; ?>