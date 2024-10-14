<?php
function register_news_block() {
    // Register news block
    acf_register_block_type(array(
        'name' => 'news-block',
        'title' => __('News Block'),
        'description' => __('This is News Block.'),
        'render_template' => get_stylesheet_directory() . '/include/blocks/news-block/news-block.php',
        'category' => 'formatting',
        'icon' => 'superhero',
        'keywords' => array( 'news', 'block' ),
        'mode' => 'edit',
        'supports' => array(
            'align' => false,
            'multiple' => true,
            'jsx' => true
        ),
    ));

    // Connect ACF fields to custom block
    acf_add_local_field_group(array(
        'key' => 'news-block-fields',
        'title' => __('News block'),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/news-block',
                ),
            ),
        ),
        'fields' => array(
            [
                'key' => 'news-block_key',
                'label' => 'News block',
                'name' => 'news-block',
                'type' => 'tab',
            ],
            array(
                'key' => 'news-block-title_key',
                'label' => __('Title News'),
                'name' => 'news-block-title',
                'type' => 'text',
            ),
            array(
                'key' => 'news-block-posts-per-page-key',
                'label' => __('Posts per page'),
                'name' => 'news-block-posts-per-page',
                'type' => 'number',
                'default_value' => 6,
            ),
            array(
                'key' => 'news-tag-title_key',
                'label' => 'Title tag',
                'name' => 'news-tag-title',
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
                'key' => 'news-tag-title-tile_key',
                'label' => 'Title tile tag',
                'name' => 'news-tag-title-tile',
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
                'key' => 'news-filter-sepia_key',
                'label' => __('Sepia image'),
                'name' => 'news-filter-sepia',
                'type' => 'true_false',
            ),
        ),
    ));
}
add_action('acf/init', 'register_news_block');