<?php

    function cab_register_menu_block() {
        register_block_type(CAB_PATH . 'blocks/menu-block/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_menu_block' );

    require __DIR__ . '/fields.php';
