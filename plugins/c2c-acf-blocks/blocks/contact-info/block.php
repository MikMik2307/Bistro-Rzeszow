<?php

    function cab_register_contact_info_block() {
        register_block_type(CAB_PATH . 'blocks/contact-info/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_contact_info_block' );

    require __DIR__ . '/fields.php';
