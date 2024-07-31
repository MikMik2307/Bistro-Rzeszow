<?php

    function cab_register_homepage_hero_block() {
        register_block_type(CAB_PATH . 'blocks/homepage-hero/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_homepage_hero_block' );

    require __DIR__ . '/fields.php';
