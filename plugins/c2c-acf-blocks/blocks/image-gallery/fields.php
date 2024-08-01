<?php
    function cab_fields_image_gallery_block() {

        acf_add_local_field_group( array(
            'key' => 'group_66ababceb478b',
            'title' => 'Galeria',
            'fields' => array(
                array(
                    'key' => 'field_66abbacfb8fb4',
                    'label' => 'Images Gallery',
                    'name' => 'images_gallery',
                    'aria-label' => '',
                    'type' => 'gallery',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'library' => 'all',
                    'min' => '',
                    'max' => '',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                    'insert' => 'append',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_66abcbc9d1d70',
                    'label' => 'Pełna Szerokość',
                    'name' => 'full_width',
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui_on_text' => 'Pełna szerokość',
                    'ui_off_text' => 'Standardowa szerokość',
                    'ui' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'cab/image-gallery',
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
    add_action('acf/init', __NAMESPACE__ .'\cab_fields_image_gallery_block');
