<?php
function register_teams_block() {
    // Register Teams block
    acf_register_block_type(array(
        'name' => 'teams-block',
        'title' => __('Teams Block'),
        'description' => __('This is Teams Block.'),
        'render_template' => get_stylesheet_directory() . '/include/blocks/teams-block/teams-block.php',
        'category' => 'formatting',
        'icon' => 'superhero',
        'keywords' => array( 'teams', 'repeater', 'block' ),
        'mode' => 'edit',
        'supports' => array(
            'align' => false,
            'multiple' => true,
            'jsx' => true
        ),
    ));

    // Connect ACF fields to custom block
    acf_add_local_field_group(array(
        'key' => 'teams-block_fields',
        'title' => __('Teams Block'),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/teams-block',
                ),
            ),
        ),
        'fields' => array(
            array(
                'key' => 'teams-block-tab_key',
                'label' => 'Teams block',
                'name' => 'teams-block-tab',
                'type' => 'tab',
            ),
            array(
                'key' => 'teams-title_key',
                'label' => __('Title Teams'),
                'name' => 'teams-title',
                'type' => 'text',
            ),
            array(
                'key' => 'teams-tag-title_key',
                'label' => 'Title tag',
                'name' => 'teams-tag-title',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                    'p' => 'p',
                    'div' => 'div',
                ),
                'default_value' => 'h2',
            ),
            array(
                'key' => 'teams-key',
                'label' => 'Teams',
                'name' => 'teams',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'block',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'teams-name_key',
                        'label' => __('Name'),
                        'name' => 'teams-name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'teams-position_key',
                        'label' => __('Position'),
                        'name' => 'teams-position',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'teams-image_key',
                        'label' => 'Image',
                        'name' => 'teams-image',
                        'type' => 'image',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'teams-description_key',
                        'label' => 'Description',
                        'name' => 'teams-description',
                        'type' => 'wysiwyg',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'register_teams_block');
