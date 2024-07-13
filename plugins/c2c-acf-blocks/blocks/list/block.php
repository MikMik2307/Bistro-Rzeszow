<?php

    function cab_register_stats_with_text() {
        register_block_type(CAB_PATH . 'blocks/list/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_list' );

    require __DIR__ . '/fields.php';
