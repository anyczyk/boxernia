<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-news',
            [
                'title' => \__('BSK - strona Aktualności', 'Boxernia'),
                'content' => '<!-- wp:acf/banner-block {"id":"block_640b3735e46cd","name":"acf/banner-block","data":{"banner-title":"","_banner-title":"banner-title_key","tag-title":"div","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":1099,"_banner-image":"banner-image_key","banner-filter-sepia":"0","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"1","_show-banner-logo":"banner-show-logo_key","banner-small":"0","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->
                
                <!-- wp:acf/slider-news-block {"id":"block_6408ae201adc0","name":"acf/slider-news-block","data":{"slider-news-block-title":"Najnowsze wpisy","_slider-news-block-title":"slider-news-block-title_key","slider_news-tag-title":"h1","_slider_news-tag-title":"slider_news-tag-title_key","slider_news-tag-title-slide":"h2","_slider_news-tag-title-slide":"slider_news-tag-title-slide_key","slider-news-filter-sepia":"1","_slider-news-filter-sepia":"slider-news-filter-sepia_key"},"align":"","mode":"edit"} /-->
                
                <!-- wp:acf/banner-block {"id":"block_640c6c58f0ee9","name":"acf/banner-block","data":{"banner-title":"","_banner-title":"banner-title_key","tag-title":"h2","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":1239,"_banner-image":"banner-image_key","banner-filter-sepia":"1","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"1","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"1","_show-banner-logo":"banner-show-logo_key","banner-small":"0","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->',
            ]
        );
    });
}