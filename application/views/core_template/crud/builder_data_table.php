{php_open_tag} foreach($<?= $table_name; ?>s as $<?= $table_name; ?>): {php_close_tag}
    <tr>
        <?php if ($primary_key): ?>
        <td width="5">
            <input type="checkbox" class="flat-red check" name="id[]" value="{php_open_tag_echo} $<?= $table_name; ?>->{primary_key}; ?>">
        </td>
        <?php endif ?>
        
        <?php foreach ($this->crud_builder->getFieldShowInColumn(true) as $field => $option): ?><?php 
        $field = $option['name'];
        $relation = $this->crud_builder->getFieldRelation($field);
        $is_relation_multiple = $this->crud_builder->isMultipleInput($field);
        if (!$this->crud_builder->getFieldFile($field) AND !$this->crud_builder->getFieldFileMultiple($field) AND !$relation){ 
        ?><td><span class="list_<?= $option['wrapper_class'] ?>">{php_open_tag_echo} _ent($<?= $table_name; ?>-><?= $field; ?>); {php_close_tag}</span></td><?php } elseif ($is_relation_multiple){
        ?><td>{php_open_tag_echo} join_multi_select($<?= $table_name; ?>-><?= $field; ?>, '<?= $relation['relation_table'] ?>', '<?= $relation['relation_value'] ?>', '<?= $relation['relation_label'] ?>'); {php_close_tag}</td><?php } elseif ($relation){
        ?><td>{php_open_tag} if  ($<?= $table_name; ?>-><?= $field; ?>) {

            echo admin_anchor('/<?= $relation['relation_table']; ?>/view/'.$<?= $table_name; ?>-><?= $field; ?>.'?popup=show', $<?= $table_name; ?>-><?= $relation['relation_table'].'_'.$relation['relation_label']; ?>, ['class' => 'popup-view']); }{php_close_tag} </td>
        <?php } elseif($this->crud_builder->getFieldFileMultiple($field)) { 
        ?><td>
            {php_open_tag} foreach (explode(',', $<?= $table_name; ?>-><?= $field; ?>) as $file): {php_close_tag}
            {php_open_tag} if (!empty($file)): {php_close_tag}
            {php_open_tag} if (is_image($file)): {php_close_tag}
            <a class="fancybox" rel="group" href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $file; {php_close_tag}">
                <img src="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $file; {php_close_tag}" class="image-responsive" alt="image <?= $table_name; ?>" title="<?= $field; ?> <?= $table_name; ?>" width="40px">
            </a>
            {php_open_tag} else: {php_close_tag}
                <a href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $file; {php_close_tag}" target="blank">
                <img src="{php_open_tag_echo} get_icon_file($file); {php_close_tag}" class="image-responsive image-icon" alt="image <?= $table_name; ?>" title="<?= $field; ?> {php_open_tag_echo} $file; {php_close_tag}" width="40px"> 
                </a>
            {php_open_tag} endif; {php_close_tag}
            {php_open_tag} endif; {php_close_tag}
            {php_open_tag} endforeach; {php_close_tag}
        </td>
        <?php } else { 
        ?><td>
            {php_open_tag} if (!empty($<?= $table_name; ?>-><?= $field; ?>)): {php_close_tag}
            {php_open_tag} if (is_image($<?= $table_name; ?>-><?= $field; ?>)): {php_close_tag}
            <a class="fancybox" rel="group" href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= $field;?>; {php_close_tag}">
                <img src="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= $field;?>; {php_close_tag}" class="image-responsive" alt="image <?= $table_name; ?>" title="<?= $field; ?> <?= $table_name; ?>" width="40px">
            </a>
            {php_open_tag} else: {php_close_tag}
                <a href="{php_open_tag_echo} BASE_URL . 'uploads/<?= $table_name; ?>/' . $<?= $table_name; ?>-><?= $field;?>; {php_close_tag}" target="blank">
                <img src="{php_open_tag_echo} get_icon_file($<?= $table_name; ?>-><?= $field; ?>); {php_close_tag}" class="image-responsive image-icon" alt="image <?= $table_name; ?>" title="<?= $field; ?> {php_open_tag_echo} $<?= $table_name; ?>-><?= $field; ?>; {php_close_tag}" width="40px"> 
                </a>
            {php_open_tag} endif; {php_close_tag}
            {php_open_tag} endif; {php_close_tag}
        </td>
        <?php } ?> 
        <?php endforeach; 
        ?><?php if ($primary_key): ?><td width="200">
        
            <?php if ($this->input->post('read')) { ?>
            {php_open_tag} is_allowed('<?= $table_name; ?>_view', function() use ($<?= $table_name; ?>){{php_close_tag}
            <?php foreach($crud_actions as $action): ?>
                <?php 
            $meta = json_decode($action->meta);

            if ($action->action == 'report'){ ?>
                <a href="{php_open_tag_echo} report_builder(<?= $meta->report ?>, ${table_name}->{primary_key}); {php_close_tag}" target="blank" class="label-default"><i class="fa fa-file-pdf-o"></i> {php_open_tag_echo} cclang('PDF') {php_close_tag}
                <?php } 
                
                
            if ($action->action == 'button'){ ?>
                <!-- <a href="{php_open_tag_echo} base_url("<?= str_replace('{id}', '${table_name}->{primary_key}', @$meta->link) ?>"); {php_close_tag}" target="blank" class="label-default"><i class="fa <?= $meta->icon ?>"></i> <?= $meta->label ?>  -->
                <?php } ?>
                
                <?php endforeach ?>
            <a href="{php_open_tag_echo} admin_site_url('/<?= $table_name; ?>/view/' . ${table_name}->{primary_key}); {php_close_tag}" data-id="{php_open_tag_echo} ${table_name}->{primary_key} {php_close_tag}" class="label-default btn-act-view"><i class="fa fa-newspaper-o"></i> {php_open_tag_echo} cclang('view_button'); {php_close_tag}
            {php_open_tag} }) {php_close_tag}
            <?php } ?><?php if ($this->input->post('update')) { ?>{php_open_tag} is_allowed('<?= $table_name; ?>_update', function() use ($<?= $table_name; ?>){{php_close_tag}
            <a href="{php_open_tag_echo} admin_site_url('/<?= $table_name; ?>/edit/' . ${table_name}->{primary_key}); {php_close_tag}" data-id="{php_open_tag_echo} ${table_name}->{primary_key} {php_close_tag}" class="label-default btn-act-edit"><i class="fa fa-edit "></i> {php_open_tag_echo} cclang('update_button'); {php_close_tag}</a>
            {php_open_tag} }) {php_close_tag}
            <?php } ?>{php_open_tag} is_allowed('<?= $table_name; ?>_delete', function() use ($<?= $table_name; ?>){{php_close_tag}
            <a href="javascript:void(0);" data-href="{php_open_tag_echo} admin_site_url('/<?= $table_name; ?>/delete/' . ${table_name}->{primary_key}); {php_close_tag}" class="label-default remove-data"><i class="fa fa-close"></i> {php_open_tag_echo} cclang('remove_button'); {php_close_tag}</a>
            {php_open_tag} }) {php_close_tag}

        </td><?php endif ?>
    </tr>
    {php_open_tag} endforeach; {php_close_tag}
    {php_open_tag} if ($<?= $table_name; ?>_counts == 0) :{php_close_tag}
        <tr>
        <td colspan="100">
        <?= ucwords($subject); ?> data is not available
        </td>
        </tr>
    {php_open_tag} endif; {php_close_tag}