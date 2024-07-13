<?php
    function cab_fields_newsletter_block() {

        acf_add_local_field_group( array(
            'key' => 'group_651b1dcec6070',
            'title' => 'Newsletter',
            'fields' => array(
                array(
                    'key' => 'field_651b1dce82c6d',
                    'label' => 'Subtitle',
                    'name' => 'newsletter_subtitle',
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
                array(
                    'key' => 'field_651b1dee82c6e',
                    'label' => 'Title',
                    'name' => 'newsletter_title',
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
                array(
                    'key' => 'field_651b1f01f859f',
                    'label' => 'Form name',
                    'name' => 'form_name',
                    'aria-label' => '',
                    'type' => 'relationship',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'post_type' => array(
                        0 => 'wpcf7_contact_form',
                    ),
                    'post_status' => '',
                    'taxonomy' => '',
                    'filters' => array(
                        0 => 'search',
                    ),
                    'return_format' => 'object',
                    'min' => '',
                    'max' => '',
                    'elements' => '',
                    'bidirectional' => 0,
                    'bidirectional_target' => array(
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'cab/newsletter',
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
    add_action('acf/init', __NAMESPACE__ .'\cab_fields_newsletter_block');
