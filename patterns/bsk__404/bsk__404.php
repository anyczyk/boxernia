<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__404',
            [
                'title' => \__('BSK - 404 page', 'Boxernia'),
                'content' => '<!-- wp:group {"className":"bsk-404 container container\u002d\u002d768 py-5","layout":{"type":"constrained"}} -->
                <div class="wp-block-group bsk-404 container container--768 py-5"><!-- wp:heading {"textAlign":"center","level":1} -->
                <h1 class="has-text-align-center">404</h1>
                <!-- /wp:heading -->
                
                <!-- wp:heading {"textAlign":"center"} -->
                <h2 class="has-text-align-center">Mamy problem ze znalezieniem strona, której szukasz.</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">Strona mogła zostać przeniesiona lub już nie istnieje.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
                <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="/">Idż do strony głównej</a></div>
                <!-- /wp:button --></div>
                <!-- /wp:buttons --></div>
                <!-- /wp:group -->',
            ]
        );
    });
}