<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-registrations',
            [
                'title' => \__('BSK - strona Zapisy', 'Boxernia'),
                'content' => '<!-- wp:acf/banner-block {"id":"block_640c2b56f4136","name":"acf/banner-block","data":{"banner-title":"Zapisy","_banner-title":"banner-title_key","tag-title":"h1","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":1099,"_banner-image":"banner-image_key","banner-filter-sepia":"1","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"0","_show-banner-logo":"banner-show-logo_key","banner-small":"1","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->

                <!-- wp:my-plugin/section-block -->
                <section class="wp-block-my-plugin-section-block bsk-single-content bg-color-white py-0 py-sm-5"><div class="container px-0 px-sm-3"><div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand"><div class="container--768 mx-auto"><!-- wp:paragraph -->
                <p>Nabór na zajęcia trwa przez cały rok, dołączyć można w każdej chwili.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>Zajęcia dla
                początkujących prowadzone są od podstaw.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>Trening trwa 1h 15min.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>Na pierwsze zajęcia
                zapisać można się mejlowo: felix-boxing@wp.pl bądź telefonicznie: 600 595 544.
                Na kolejne można już przychodzić w dowolne dni na wybrane godziny.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>Oprócz stroju sportowego obowiązują buty do przebrania. Sprzęt klubowy jest do dyspozycji trenujących na sali, natomiast z czasem ze względów choćby higienicznych, dobrze jest zaopatrzyć się we własny. W razie czego całe wyposażenie możemy sprowadzić po rozsądnych cenach (rękawice, owijki, ochraniacze, przyrządówki).</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:gallery {"columns":2,"linkTo":"media"} -->
                <figure class="wp-block-gallery has-nested-images columns-2 is-cropped"><!-- wp:image {"id":1239,"sizeSlug":"large","linkDestination":"media"} -->
                <figure class="wp-block-image size-large"><a href="http://boxernia.local/wp-content/uploads/2023/03/ring2.jpg"><img src="http://boxernia.local/wp-content/uploads/2023/03/ring2.jpg" alt="Ring" class="wp-image-1239"/></a></figure>
                <!-- /wp:image -->
                
                <!-- wp:image {"id":1218,"sizeSlug":"large","linkDestination":"media"} -->
                <figure class="wp-block-image size-large"><a href="http://boxernia.local/wp-content/uploads/2023/03/headquarters2.jpg"><img src="http://boxernia.local/wp-content/uploads/2023/03/headquarters2.jpg" alt="Headquarters" class="wp-image-1218"/></a></figure>
                <!-- /wp:image -->
                
                <!-- wp:image {"id":1175,"sizeSlug":"large","linkDestination":"media"} -->
                <figure class="wp-block-image size-large"><a href="http://boxernia.local/wp-content/uploads/2023/03/ring.jpg"><img src="http://boxernia.local/wp-content/uploads/2023/03/ring.jpg" alt="Ring" class="wp-image-1175"/></a></figure>
                <!-- /wp:image -->
                
                <!-- wp:image {"id":1169,"sizeSlug":"large","linkDestination":"media"} -->
                <figure class="wp-block-image size-large"><a href="http://boxernia.local/wp-content/uploads/2023/03/headquarters.jpg"><img src="http://boxernia.local/wp-content/uploads/2023/03/headquarters.jpg" alt="Headquarters" class="wp-image-1169"/></a></figure>
                <!-- /wp:image --></figure>
                <!-- /wp:gallery --></div></div></div></section>
                <!-- /wp:my-plugin/section-block -->
                
                <!-- wp:acf/banner-block {"id":"block_640c4340bc2cc","name":"acf/banner-block","data":{"banner-title":"","_banner-title":"banner-title_key","tag-title":"h2","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":1169,"_banner-image":"banner-image_key","banner-filter-sepia":"1","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"1","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"1","_show-banner-logo":"banner-show-logo_key","banner-small":"0","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->',

            ]
        );
    });
}