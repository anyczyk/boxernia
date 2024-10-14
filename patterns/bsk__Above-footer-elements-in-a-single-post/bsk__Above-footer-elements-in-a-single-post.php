<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__Above-footer-elements-in-a-single-post',
            [
                'title' => \__('BSK - Above footer elements in a single post', 'Boxernia'),
                'content' => '<!-- wp:acf/slider-news-block {"id":"block_640c7a0a7e6a1","name":"acf/slider-news-block","data":{"slider-news-block-title":"Najnowsze wpisy","_slider-news-block-title":"slider-news-block-title_key","slider_news-tag-title":"h2","_slider_news-tag-title":"slider_news-tag-title_key","slider_news-tag-title-slide":"h3","_slider_news-tag-title-slide":"slider_news-tag-title-slide_key","slider-news-filter-sepia":"1","_slider-news-filter-sepia":"slider-news-filter-sepia_key","slider-news-only-slider":"1","_slider-news-only-slider":"slider-news-only-slider_key"},"align":"","mode":"edit"} /-->',
            ]
        );
    });
}