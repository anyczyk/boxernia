<?php
function register_slider_news_block() {
    // Register news block
    acf_register_block_type(array(
        'name' => 'slider-news-block',
        'title' => __('Slider News Block'),
        'description' => __('This is Slider News Block.'),
        'render_template' => get_stylesheet_directory() . '/include/blocks/slider-news-block/slider-news-block.php',
        'category' => 'formatting',
        'icon' => 'superhero',
        'keywords' => array( 'slider', 'news', 'block' ),
        'mode' => 'edit',
        'supports' => array(
            'align' => false,
            'multiple' => true,
            'jsx' => true
        ),
    ));

    // Connect ACF fields to custom block
    acf_add_local_field_group(array(
        'key' => 'slider-news-block-fields',
        'title' => __('Slider News Block'),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/slider-news-block',
                ),
            ),
        ),
        'fields' => array(
            [
                'key' => 'slider-news-block_key',
                'label' => 'Slider news block',
                'name' => 'slider-news-block',
                'type' => 'tab',
            ],
            array(
                'key' => 'slider-news-block-title_key',
                'label' => __('Title News'),
                'name' => 'slider-news-block-title',
                'type' => 'text',
            ),
            array(
                'key' => 'slider_news-tag-title_key',
                'label' => 'Title tag',
                'name' => 'slider_news-tag-title',
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
                'key' => 'slider_news-tag-title-slide_key',
                'label' => 'Title tag tile',
                'name' => 'slider_news-tag-title-slide',
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
                'default_value' => 'h3',
            ),
            array(
                'key' => 'slider_news-tag-title-slide_key',
                'label' => 'Title tag tile',
                'name' => 'slider_news-tag-title-slide',
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
                'key' => 'slider-news-filter-sepia_key',
                'label' => __('Sepia image'),
                'name' => 'slider-news-filter-sepia',
                'type' => 'true_false',
            ),
            array(
                'key' => 'slider-news-only-slider_key',
                'label' => __('Only slider'),
                'name' => 'slider-news-only-slider',
                'type' => 'true_false',
            ),
        ),
    ));
}
add_action('acf/init', 'register_slider_news_block');
