<?php 
$base_url_extension = _ent(url_extension(basename(__DIR__))); 

cicool()->addMenu(cicool()::ADMIN_SIDEBAR_MENU, [
    'label'         => 'Chatting',
    'type'          => 'menu',
    'icon_color'    => '',
    'link'          => admin_url('chat'),
    'icon'          => 'fa fa-commenting-o',
    'menu_type_id'  => cicool()::TYPE_MENU
]);
