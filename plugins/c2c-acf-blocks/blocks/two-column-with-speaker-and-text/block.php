<?php

    function cab_register_two_column_with_speaker_and_text() {
        register_block_type(CAB_PATH . 'blocks/two-column-with-speaker-and-text/block.json');
    }
    add_action( 'init', __NAMESPACE__ . '\cab_register_two_column_with_speaker_and_text' );

    require __DIR__ . '/fields.php';
