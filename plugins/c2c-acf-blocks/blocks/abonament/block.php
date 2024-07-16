<?php

    function cab_register_abonament_block() {
        register_block_type(CAB_PATH . 'blocks/abonament/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_abonament_block' );

    require __DIR__ . '/fields.php';
