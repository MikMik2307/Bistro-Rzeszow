<?php
    function cab_fields_quote_block() {

        acf_add_local_field_group( array(
            'key' => 'group_651b022db63a8',
            'title' => 'Quote',
            'fields' => array(
                array(
                    'key' => 'field_651b022d79480',
                    'label' => 'Quote text',
                    'name' => 'quote_text',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'cab/quote',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ) );
    }
    add_action('acf/init', __NAMESPACE__ .'\cab_fields_quote_block');
