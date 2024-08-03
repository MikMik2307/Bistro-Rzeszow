<?php
    function cab_fields_menu_block() {

        acf_add_local_field_group( array(
            'key' => 'group_66ad678abf20e',
            'title' => 'Menu',
            'fields' => array(
                array(
                    'key' => 'field_66ad678bdc2eb',
                    'label' => 'Tytuł',
                    'name' => 'title',
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
                    'key' => 'field_66ad679bdc2ec',
                    'label' => 'Pierwsza Kolumna',
                    'name' => 'first_column',
                    'aria-label' => '',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'table',
                    'pagination' => 0,
                    'min' => 0,
                    'max' => 0,
                    'collapsed' => '',
                    'button_label' => 'Dodaj wiersz',
                    'rows_per_page' => 20,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_66ad67c3dc2ed',
                            'label' => 'Kategoria Posiłku',
                            'name' => 'meal_category',
                            'aria-label' => '',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'table',
                            'pagination' => 0,
                            'min' => 0,
                            'max' => 0,
                            'collapsed' => '',
                            'button_label' => 'Dodaj wiersz',
                            'rows_per_page' => 20,
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_66ad67fbdc2ee',
                                    'label' => 'Nazwa Kategorii',
                                    'name' => 'category_name',
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
                                    'parent_repeater' => 'field_66ad67c3dc2ed',
                                ),
                                array(
                                    'key' => 'field_66ad680fdc2ef',
                                    'label' => 'Opis kategorii',
                                    'name' => 'category_description',
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
                                    'parent_repeater' => 'field_66ad67c3dc2ed',
                                ),
                                array(
                                    'key' => 'field_66ad681fdc2f0',
                                    'label' => 'Pozycja',
                                    'name' => 'menu_product',
                                    'aria-label' => '',
                                    'type' => 'repeater',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'layout' => 'table',
                                    'pagination' => 0,
                                    'min' => 0,
                                    'max' => 0,
                                    'collapsed' => '',
                                    'button_label' => 'Dodaj wiersz',
                                    'rows_per_page' => 20,
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_66ad6834dc2f1',
                                            'label' => 'Nazwa posiłku',
                                            'name' => 'meal_name',
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
                                            'parent_repeater' => 'field_66ad681fdc2f0',
                                        ),
                                        array(
                                            'key' => 'field_66ad6841dc2f2',
                                            'label' => 'Cena posiłku',
                                            'name' => 'meal_price',
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
                                            'parent_repeater' => 'field_66ad681fdc2f0',
                                        ),
                                    ),
                                    'parent_repeater' => 'field_66ad67c3dc2ed',
                                ),
                            ),
                            'parent_repeater' => 'field_66ad679bdc2ec',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_66ad6b3d215f3',
                    'label' => 'Druga Kolumna',
                    'name' => 'second_column',
                    'aria-label' => '',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'table',
                    'pagination' => 0,
                    'min' => 0,
                    'max' => 0,
                    'collapsed' => '',
                    'button_label' => 'Dodaj wiersz',
                    'rows_per_page' => 20,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_66ad6b3d215f4',
                            'label' => 'Kategoria Posiłku',
                            'name' => 'meal_category',
                            'aria-label' => '',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => '',
                            'min' => 0,
                            'max' => 0,
                            'collapsed' => '',
                            'button_label' => 'Dodaj wiersz',
                            'rows_per_page' => 20,
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_66ad6b3d215f5',
                                    'label' => 'Nazwa Kategorii',
                                    'name' => 'category_name',
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
                                    'parent_repeater' => 'field_66ad6b3d215f4',
                                ),
                                array(
                                    'key' => 'field_66ad6b3d215f6',
                                    'label' => 'Opis kategorii',
                                    'name' => 'category_description',
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
                                    'parent_repeater' => 'field_66ad6b3d215f4',
                                ),
                                array(
                                    'key' => 'field_66ad6b3d215f7',
                                    'label' => 'Pozycja',
                                    'name' => 'menu_product',
                                    'aria-label' => '',
                                    'type' => 'repeater',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'layout' => '',
                                    'min' => 0,
                                    'max' => 0,
                                    'collapsed' => '',
                                    'button_label' => 'Dodaj wiersz',
                                    'rows_per_page' => 20,
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_66ad6b3d215f8',
                                            'label' => 'Nazwa posiłku',
                                            'name' => 'meal_name',
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
                                            'parent_repeater' => 'field_66ad6b3d215f7',
                                        ),
                                        array(
                                            'key' => 'field_66ad6b3d215f9',
                                            'label' => 'Cena posiłku',
                                            'name' => 'meal_price',
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
                                            'parent_repeater' => 'field_66ad6b3d215f7',
                                        ),
                                    ),
                                    'parent_repeater' => 'field_66ad6b3d215f4',
                                ),
                            ),
                            'parent_repeater' => 'field_66ad6b3d215f3',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_66ad6b51215fa',
                    'label' => 'Trzecia Kolumna',
                    'name' => 'third_column',
                    'aria-label' => '',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'table',
                    'pagination' => 0,
                    'min' => 0,
                    'max' => 0,
                    'collapsed' => '',
                    'button_label' => 'Dodaj wiersz',
                    'rows_per_page' => 20,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_66ad6b51215fb',
                            'label' => 'Kategoria Posiłku',
                            'name' => 'meal_category',
                            'aria-label' => '',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'table',
                            'min' => 0,
                            'max' => 0,
                            'collapsed' => '',
                            'button_label' => 'Dodaj wiersz',
                            'rows_per_page' => 20,
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_66ad6b51215fc',
                                    'label' => 'Nazwa Kategorii',
                                    'name' => 'category_name',
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
                                    'parent_repeater' => 'field_66ad6b51215fb',
                                ),
                                array(
                                    'key' => 'field_66ad6b51215fd',
                                    'label' => 'Opis kategorii',
                                    'name' => 'category_description',
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
                                    'parent_repeater' => 'field_66ad6b51215fb',
                                ),
                                array(
                                    'key' => 'field_66ad6b51215fe',
                                    'label' => 'Pozycja',
                                    'name' => 'menu_product',
                                    'aria-label' => '',
                                    'type' => 'repeater',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'layout' => 'table',
                                    'min' => 0,
                                    'max' => 0,
                                    'collapsed' => '',
                                    'button_label' => 'Dodaj wiersz',
                                    'rows_per_page' => 20,
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_66ad6b51215ff',
                                            'label' => 'Nazwa posiłku',
                                            'name' => 'meal_name',
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
                                            'parent_repeater' => 'field_66ad6b51215fe',
                                        ),
                                        array(
                                            'key' => 'field_66ad6b5121600',
                                            'label' => 'Cena posiłku',
                                            'name' => 'meal_price',
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
                                            'parent_repeater' => 'field_66ad6b51215fe',
                                        ),
                                    ),
                                    'parent_repeater' => 'field_66ad6b51215fb',
                                ),
                            ),
                            'parent_repeater' => 'field_66ad6b51215fa',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_66ad6b89c9850',
                    'label' => 'Kolor tła',
                    'name' => 'background_color',
                    'aria-label' => '',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'enable_opacity' => 1,
                    'return_format' => 'string',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'cab/menu-block',
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
    add_action('acf/init', __NAMESPACE__ .'\cab_fields_menu_block');
