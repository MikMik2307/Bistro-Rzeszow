<?php

    function cab_register_locations_block() {
        register_block_type(CAB_PATH . 'blocks/locations/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_locations_block' );

    require __DIR__ . '/fields.php';