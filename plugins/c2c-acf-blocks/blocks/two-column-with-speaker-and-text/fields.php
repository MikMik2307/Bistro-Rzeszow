<?php
    function oab_fields_two_column_with_speaker_and_text() {

        acf_add_local_field_group(array(
            'key' => 'group 8',
            'title' => 'Two column with image and text',
            'fields' => array(
                array(
                    'key' => 'field_29',
                    'label' => 'Text position',
                    'name' => 'text_position',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'Left' => 'Left',
                        'Right' => 'Right',
                    ),
                    'allow_null' => 0,
                    'other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'vertical',
                    'return_format' => 'value',
                    'save_other_choice' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'oab/two-column-with-speaker-and-text',
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
        ));
    }
    add_action('acf/init', __NAMESPACE__ .'\oab_fields_two_column_with_speaker_and_text');
