<?php

    function cab_register_newsletter_block() {
        register_block_type(CAB_PATH . 'blocks/newsletter/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_newsletter_block' );

    require __DIR__ . '/fields.php';
