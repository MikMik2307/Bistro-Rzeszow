<?php

    function cab_register_image_with_title() {
        register_block_type(CAB_PATH . 'blocks/image-with-title/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_image_with_title' );

    require __DIR__ . '/fields.php';
