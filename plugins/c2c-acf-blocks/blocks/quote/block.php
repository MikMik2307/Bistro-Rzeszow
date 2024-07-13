<?php

    function cab_register_quote_block() {
        register_block_type(CAB_PATH . 'blocks/quote/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_quote_block' );

    require __DIR__ . '/fields.php';
