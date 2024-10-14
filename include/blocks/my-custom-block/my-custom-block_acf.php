<?php
function register_custom_block() {
    // Register custom block
    acf_register_block_type(array(
        'name' => 'my-custom-block',
        'title' => __('My Custom Block'),
        'description' => __('This is my custom block.'),
        'render_template' => get_stylesheet_directory() . '/include/blocks/my-custom-block/my-custom-block.php',
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array( 'my', 'custom', 'block' ),
        'mode' => 'edit',
        'supports' => array(
            'align' => false,
            'multiple' => true,
            'jsx' => true
        ),
    ));

    // Connect ACF fields to custom block
    acf_add_local_field_group(array(
        'key' => 'my-custom-block-fields',
        'title' => __('Fields for Custom Block'),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/my-custom-block',
                ),
            ),
        ),
        'fields' => array(
            array(
                'key' => 'title',
                'label' => __('Title'),
                'name' => 'title',
                'type' => 'text',
            ),
            array(
                'key' => 'text',
                'label' => __('Text'),
                'name' => 'text',
                'type' => 'textarea',
            ),
        ),
    ));
}
add_action('acf/init', 'register_custom_block');
