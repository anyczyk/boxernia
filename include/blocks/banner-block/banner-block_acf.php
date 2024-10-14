<?php
function register_banner_block() {
    // Register custom block
    acf_register_block_type(array(
        'name' => 'banner-block',
        'title' => __('Banner Block'),
        'description' => __('This is Banner Block'),
        'render_template' => get_stylesheet_directory() . '/include/blocks/banner-block/banner-block.php',
        'category' => 'formatting',
        'icon' => 'superhero',
        'keywords' => array( 'banner', 'block' ),
        'mode' => 'edit',
        'supports' => array(
            'align' => false,
            'multiple' => true,
            'jsx' => true
        ),
    ));

    // Connect ACF fields to custom block
    acf_add_local_field_group(array(
        'key' => 'banner-block-fields',
        'title' => __('Fields for Banner Block'),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/banner-block',
                ),
            ),
        ),
        'fields' => array(
            [
                'key' => 'banner-block_key',
                'label' => 'Banner block',
                'name' => 'banner-block',
                'type' => 'tab',
            ],
            array(
                'key' => 'banner-title_key',
                'label' => __('Title banner'),
                'name' => 'banner-title',
                'type' => 'text',
            ),
            array(
                'key' => 'tag-title_key',
                'label' => 'Title tag',
                'name' => 'tag-title',
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
                'key' => 'banner-desc_key',
                'label' => __('Description banner'),
                'name' => 'banner-desc',
                'type' => 'textarea',
            ),
            array(
                'key' => 'banner-image_key',
                'label' => __('Image banner'),
                'name' => 'banner-image',
                'type' => 'image',
            ),
            array(
                'key' => 'banner-filter-sepia_key',
                'label' => __('Sepia image'),
                'name' => 'banner-filter-sepia',
                'type' => 'true_false',
            ),
            array(
                'key' => 'banner-image-fixed_key',
                'label' => __('Image fixed'),
                'name' => 'banner-image-fixed',
                'type' => 'true_false',
            ),
            array(
                'key' => 'banner-show-logo_key',
                'label' => __('Show banner logo'),
                'name' => 'show-banner-logo',
                'type' => 'true_false',
            ),
            array(
                'key' => 'banner-small_key',
                'label' => __('Small banner'),
                'name' => 'banner-small',
                'type' => 'true_false',
            ),
        ),
    ));
}
add_action('acf/init', 'register_banner_block');
