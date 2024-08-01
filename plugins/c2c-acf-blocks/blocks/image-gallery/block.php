<?php

    function cab_register_image_gallery_block() {
        register_block_type(CAB_PATH . 'blocks/image-gallery/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_image_gallery_block' );

    require __DIR__ . '/fields.php';
