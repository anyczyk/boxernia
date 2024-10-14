<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-archives',
            [
                'title' => \__('BSK - strona Archiwum', 'Boxernia'),
                'content' => '<!-- wp:acf/banner-block {"id":"block_640bc04d46032","name":"acf/banner-block","data":{"banner-title":"Archiwum Aktualności","_banner-title":"banner-title_key","tag-title":"h1","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":"","_banner-image":"banner-image_key","banner-filter-sepia":"0","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"0","_show-banner-logo":"banner-show-logo_key","banner-small":"1","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->

                <!-- wp:acf/news-block {"id":"block_6407a1d69d70e","name":"acf/news-block","data":{"news-block-title":"","_news-block-title":"news-block-title_key","news-block-posts-per-page":"6","_news-block-posts-per-page":"news-block-posts-per-page-key","news-tag-title":"h1","_news-tag-title":"news-tag-title_key","news-tag-title-tile":"h2","_news-tag-title-tile":"news-tag-title-tile_key","news-filter-sepia":"1","_news-filter-sepia":"news-filter-sepia_key"},"align":"","mode":"edit","className":"bg-color-white"} /-->',
            ]
        );
    });
}