<?php

    function cab_register_text_section_block() {
        register_block_type(CAB_PATH . 'blocks/text-section/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_text_section_block' );

    require __DIR__ . '/fields.php';
