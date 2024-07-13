<?php

    function cab_register_range_list() {
        register_block_type(CAB_PATH . 'blocks/range-list/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_range_list' );

    require __DIR__ . '/fields.php';
