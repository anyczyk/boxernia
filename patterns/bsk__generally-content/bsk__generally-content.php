<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__generally-content',
            [
                'title' => \__('BSK - Generally content', 'Boxernia'),
                'content' => '<!-- wp:group {"tagName":"section","className":"bsk-default-content bg-color-white py-0 py-sm-5","layout":{"type":"constrained"}} -->
                <section class="wp-block-group bsk-default-content bg-color-white py-0 py-sm-5"><!-- wp:group {"className":"container px-0 px-sm-3","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group container px-0 px-sm-3"><!-- wp:group {"className":"bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand"><!-- wp:group {"tagName":"section","className":"container\u002d\u002d768 mx-auto","layout":{"type":"constrained"}} -->
                            <section class="wp-block-group container--768 mx-auto"><!-- wp:heading {"className":"h4"} -->
                                <h2 class="h4"><strong>Lorem ipsum Header</strong></h2>
                                <!-- /wp:heading -->
                
                                <!-- wp:paragraph -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <!-- /wp:paragraph -->
                
                                <!-- wp:paragraph -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <!-- /wp:paragraph -->
                
                                <!-- wp:paragraph -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <!-- /wp:paragraph --></section>
                            <!-- /wp:group --></div>
                        <!-- /wp:group --></div>
                    <!-- /wp:group --></section>
                <!-- /wp:group -->',
            ]
        );
    });
}