<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-price-list',
            [
                'title' => \__('BSK - strona Cennik', 'Boxernia'),
                'content' => '<!-- wp:my-plugin/section-block -->
                <section class="wp-block-my-plugin-section-block bsk-single-content bg-color-white py-0 py-sm-5"><div class="container px-0 px-sm-3"><div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand"><div class="container--768 mx-auto"><!-- wp:paragraph -->
                <p>SKŁADKA CZŁONKOWSKA</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>płatna zawsze z góry, na początku miesiąca,ważna od początku do końca miesiąca kalendarzowego<br>DOROŚLI 160 ZŁ<br>STUDENCI 140 ZŁ<br>KOBIETY 130 ZŁ NIELETNI (14-17 LAT), ZAWODNICY 120 ZŁ<br>NIELETNI (10-13 LAT) 110 ZŁ<br>Alternatywnie opłaty&nbsp; uiszczać można w formie karnetu.<br>KARNET (PŁATNY ZAWSZE Z GÓRY) – ważny od daty zakupu<br>KARNET OPEN (WAŻNY 1 MIESIĄC) 180 ZŁ DOROŚLI / 160 ZŁ STUDENCI 10 TRENINGÓW (WAŻNE 2 MIESIĄCE) 160 ZŁ<br>8 TRENINGÓW (WAŻNE 2 MIESIĄCE) 130 ZŁ<br>6 TRENINGÓW (WAŻNE 1 MIESIĄC) 100 ZŁ<br>4 TRENINGI (WAŻNE 1 MIESIĄC) 70 ZŁ<br>2 TRENINGI (WAŻNE 1 MIESIĄC) 40 ZŁ<br>WEJŚCIE JEDNORAZOWE 22 ZŁ</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>TRENING PERSONALNY (TERMINY ZAJĘĆ DO USTALENIA):</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>1 OSOBA – 100 ZŁ,</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>2 OSOBY – 150 ZŁ,</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph -->
                <p>3-4 OSOBY – 200 ZŁ</p>
                <!-- /wp:paragraph --></div></div></div></section>
                <!-- /wp:my-plugin/section-block -->',
            ]
        );
    });
}