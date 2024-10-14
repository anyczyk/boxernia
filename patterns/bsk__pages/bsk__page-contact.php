<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-contact',
            [
                'title' => \__('BSK - strona Kontakt', 'Boxernia'),
                'content' => '<!-- wp:acf/banner-block {"id":"block_640c4c3f42e52","name":"acf/banner-block","data":{"banner-title":"Kontakt","_banner-title":"banner-title_key","tag-title":"h1","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":"","_banner-image":"banner-image_key","banner-filter-sepia":"0","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"0","_show-banner-logo":"banner-show-logo_key","banner-small":"1","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->

                <!-- wp:my-plugin/section-block -->
                <section class="wp-block-my-plugin-section-block bsk-single-content bg-color-white py-0 py-sm-5"><div class="container px-0 px-sm-3"><div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand"><div class="container--768 mx-auto"><!-- wp:heading {"className":"h4 mb-4"} -->
                <h2 class="h4 mb-4">Wszelkie informacje dotyczące klubu i treningów:</h2>
                <!-- /wp:heading -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>tel: 501 41 07 41, 600 59 55 44</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>mail: <a href="mailto:felix-boxing@wp.pl">felix-boxing@wp.pl</a></li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>Nr konta;&nbsp; mBank 18 1140 2004 0000 3102 8049 5569</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>Kalwaryjska 9-15 Kraków, schodami w dół, górny przycisk na domofonie</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column {"className":"bsk-form-1"} -->
                <div class="wp-block-column bsk-form-1"><!-- wp:heading {"className":"h4 mb-4"} -->
                <h2 class="h4 mb-4">Napisz do nas:</h2>
                <!-- /wp:heading -->
                
                <!-- wp:html -->
                [contact-form-7 id="1212" title="Formularz 1"]
                <!-- /wp:html --></div>
                <!-- /wp:column -->
                
                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:heading {"className":"h4 mb-4"} -->
                <h2 class="h4 mb-4">Mapa dojazdu:</h2>
                <!-- /wp:heading -->
                
                <!-- wp:image {"align":"center","id":1215,"sizeSlug":"full","linkDestination":"custom"} -->
                <figure class="wp-block-image aligncenter size-full"><a href="https://www.google.com/maps/place/Kalwaryjska+9,+30-509+Krak%C3%B3w/@50.0428202,19.9446248,17z/data=!4m13!1m7!3m6!1s0x47165b5cc9fbab63:0x73354779e94d13ab!2sKalwaryjska+9,+30-509+Krak%C3%B3w!3b1!8m2!3d50.0428168!4d19.9468135!3m4!1s0x47165b5cc9fbab63:0x73354779e94d13ab!8m2!3d50.0428168!4d19.9468135" target="_blank" rel=" noreferrer noopener"><img src="http://boxernia.local/wp-content/uploads/2023/03/boxernia.png" alt="" class="wp-image-1215"/></a></figure>
                <!-- /wp:image --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></div></div></div></section>
                <!-- /wp:my-plugin/section-block -->
                
                <!-- wp:acf/banner-block {"id":"block_640c4dcb42e53","name":"acf/banner-block","data":{"banner-title":"","_banner-title":"banner-title_key","tag-title":"h2","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":1218,"_banner-image":"banner-image_key","banner-filter-sepia":"0","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"0","_show-banner-logo":"banner-show-logo_key","banner-small":"0","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->',

            ]
        );
    });
}