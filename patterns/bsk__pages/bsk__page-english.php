<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-english',
            [
                'title' => \__('BSK - strona English', 'Boxernia'),
                'content' => '<!-- wp:acf/banner-block {"id":"block_640c4eca95c16","name":"acf/banner-block","data":{"banner-title":"English","_banner-title":"banner-title_key","tag-title":"h1","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":"","_banner-image":"banner-image_key","banner-filter-sepia":"0","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"0","_show-banner-logo":"banner-show-logo_key","banner-small":"1","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->

                <!-- wp:my-plugin/section-block -->
                <section class="wp-block-my-plugin-section-block bsk-single-content bg-color-white py-0 py-sm-5"><div class="container px-0 px-sm-3"><div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand"><div class="container--768 mx-auto"><!-- wp:paragraph -->
                <p>Trainings are in Polish but we have a lot of foreigners and the language is not a problem ;)</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>We accept Benefit Systems Multisport Classic, Multisport Plus and Ok System.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>You have to sign up only for the first training by the e-mail: felix-boxing@wp.pl or by the phone: +48 600 595 544. Later, you can come when you prefer.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>In addition to the sports outfit, shoes are to be changed. Club equipment is available at our gym, however, over time, for reasons of hygiene, it is good to stock up on your own, if necessary you can buy all equipment in our gym at reasonable prices (gloves, hand tape, mouthguard).</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"textAlign":"center","className":"h4 my-5"} -->
                <h2 class="has-text-align-center h4 my-5">Schedule:</h2>
                <!-- /wp:heading -->
                
                <!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                <p>⬆️ Monday: </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>09:00 beginners, intermediate, advanced, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>16:30 children and youth (class 2004–2012) </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>17:45 beginners, intermediate, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>19:00 intermediate, advanced </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>20:15 beginners, intermediate, youth</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Tuesday : </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>09:00 beginners, intermediate, advanced, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>17:45 beginners, intermediate, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>19:00 intermediate, advanced </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>20:15 beginners, intermediate, youth</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p></p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Wednesday : </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>09:00 beginners, intermediate, advanced, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>16:30 children and youth (class 2004–2012) </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>17:45 beginners, intermediate, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>19:00 intermediate, advanced </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>20:15 beginners, intermediate, youth</p>
                <!-- /wp:paragraph --></div>
                <!-- /wp:column -->
                
                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                <p>⬆️ Thursday:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>09:00 beginners, intermediate, advanced, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>17:45 beginners, intermediate, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>19:00 intermediate, advanced </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>20:15 beginners, intermediate, youth</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Friday: </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>09:00 beginners, intermediate, advanced, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>16:30 children and youth (class 2004–2012)</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>17:45 beginners, intermediate, youth </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>19:00 intermediate, advanced</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Saturday: </p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>11:00 beginners, intermediate, advanced, youth</p>
                <!-- /wp:paragraph --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns --></div></div></div></section>
                <!-- /wp:my-plugin/section-block -->

                <!-- wp:acf/banner-block {"id":"block_640c4f7195c17","name":"acf/banner-block","data":{"banner-title":"","_banner-title":"banner-title_key","tag-title":"h2","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":1175,"_banner-image":"banner-image_key","banner-filter-sepia":"1","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"1","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"1","_show-banner-logo":"banner-show-logo_key","banner-small":"0","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->',
            ]
        );
    });
}