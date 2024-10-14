<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page_workouts',
            [
                'title' => \__('BSK - strona Treningi', 'Boxernia'),
                'content' => '<!-- wp:acf/banner-block {"id":"block_640bc29a9a621","name":"acf/banner-block","data":{"banner-title":"Treningi","_banner-title":"banner-title_key","tag-title":"h1","_tag-title":"tag-title_key","banner-desc":"","_banner-desc":"banner-desc_key","banner-image":"","_banner-image":"banner-image_key","banner-filter-sepia":"0","_banner-filter-sepia":"banner-filter-sepia_key","banner-image-fixed":"0","_banner-image-fixed":"banner-image-fixed_key","show-banner-logo":"0","_show-banner-logo":"banner-show-logo_key","banner-small":"1","_banner-small":"banner-small_key"},"align":"","mode":"edit"} /-->

                <!-- wp:my-plugin/section-block -->
                <section class="wp-block-my-plugin-section-block bsk-single-content bg-color-white py-0 py-sm-5"><div class="container px-0 px-sm-3"><div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand"><div class="container--768 mx-auto"><!-- wp:heading {"className":"h4 mb-4"} -->
                <h2 class="h4 mb-4">Trening obejmuje:</h2>
                <!-- /wp:heading -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>naukę techniki bokserskiej (ciosów, uników, zasłon, poruszania się),</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>ćwiczenia na przyborach bokserskich (workach, gruszkach, refleksówkach, platformach, skakankach, piłkach lekarskich itp.),&nbsp;</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>trening koordynacji ruchowej, szybkości i wytrzymałości siłowej,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>tarczowanie z trenerem i instruktorami.</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                <p>⬆️ Poniedziałek:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>09:00 początkujący, średnio zaawansowani, zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>16:30 dzieci i młodzież ( roczniki 2012-2004)</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>17:45 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>19:00 średnio zaawansowani, zaawansowani,zawodnicy</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>20:15 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Wtorek:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>09:00 początkujący, średnio zaawansowani, zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>17:45 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>19:00 średnio zaawansowani, zaawansowani,zawodnicy</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>20:15 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:paragraph -->
                <p>⬆️ środa:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>09:00 początkujący, średnio zaawansowani, zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>16:30 dzieci i młodzież ( roczniki 2012-2004)</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>17:45 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>19:00 średnio zaawansowani, zaawansowani,zawodnicy</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>20:15 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list --></div>
                <!-- /wp:column -->
                
                <!-- wp:column -->
                <div class="wp-block-column"><!-- wp:paragraph -->
                <p>⬆️ Czwartek:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>09:00 początkujący, średnio zaawansowani, zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>17:45 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>19:00 średnio zaawansowani, zaawansowani,zawodnicy</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>20:15 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Piątek:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>09:00 początkujący, średnio zaawansowani, zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>16:30 dzieci i młodzież ( roczniki 2012-2004)</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>17:45 początkujący, średnio zaawansowani</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>19:00 średnio zaawansowani, zaawansowani,zawodnicy</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:paragraph -->
                <p>⬆️ Soboty:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>11:00 początkujący ,średnio zaawansowani, zaawansowani,zawodnicy</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list --></div>
                <!-- /wp:column --></div>
                <!-- /wp:columns -->
                
                <!-- wp:paragraph -->
                <p>Treningi indywidualne - możliwość ustalenia indywidualnych terminów.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p><strong>HONORUJEMY KARTY BENEFIT SYSTEMS MULTISPORT CLASSIC, MULTISPORT PLUS ORAZ OK SYSTEM</strong></p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>Kobiety, młodzież szkolna, studenci <strong>ZNIŻKI</strong>.</p>
                <!-- /wp:paragraph --></div></div></div></section>
                <!-- /wp:my-plugin/section-block -->',
            ]
        );
    });
}