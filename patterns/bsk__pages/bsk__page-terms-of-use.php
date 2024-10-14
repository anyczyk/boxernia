<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-terms-of-use',
            [
                'title' => \__('BSK - strona Warunki korzystania', 'Boxernia'),
                'content' => '<!-- wp:group {"tagName":"section","className":"container container\u002d\u002d768 py-5","layout":{"type":"constrained"}} -->
                <section class="wp-block-group container container--768 py-5"><!-- wp:heading {"textAlign":"center","level":1,"className":"mb-5"} -->
                <h1 class="has-text-align-center mb-5">Warunki korzystania</h1>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Ta strona internetowa i wszelkie związane z nią treści, informacje i usługi są udostępniane na podstawie poniższych Warunków Korzystania. Korzystanie z naszej strony internetowej oznacza akceptację niniejszych Warunków Korzystania. W razie niezgody z tymi Warunkami, prosimy o niekorzystanie z naszej strony internetowej.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Właściciel strony</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Ta strona internetowa jest własnością [nazwa firmy] z siedzibą w [adres]. Wszelkie prawa do tej strony i jej zawartości są zastrzeżone.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Ograniczenia korzystania</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Korzystanie z tej strony internetowej jest dozwolone wyłącznie w celach legalnych i zgodnych z tymi Warunkami Korzystania. Nie wolno dokonywać żadnych działań, które mogą naruszać prawa innych użytkowników lub właściciela strony internetowej, w tym m.in.:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>naruszać praw autorskich lub innych praw własności intelektualnej,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>publikować obraźliwych lub nielegalnych treści,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>próbować uzyskać nieautoryzowany dostęp do informacji lub danych przechowywanych na tej stronie internetowej,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>naruszać prywatność innych użytkowników lub osób trzecich.</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Zawartość strony internetowej</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Zawartość tej strony internetowej ma charakter informacyjny i może być zmieniana lub aktualizowana w dowolnym czasie bez uprzedniego powiadomienia. Właściciel strony internetowej nie gwarantuje dokładności, kompletności ani aktualności informacji zawartych na tej stronie.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Odpowiedzialność</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Korzystanie z tej strony internetowej odbywa się na własne ryzyko. Właściciel strony internetowej nie ponosi odpowiedzialności za szkody wynikłe z korzystania z tej strony internetowej lub związane z nią treści i informacje.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Zewnętrzne linki</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Ta strona internetowa może zawierać linki do innych stron internetowych, które nie są kontrolowane ani zarządzane przez właściciela tej strony internetowej. Właściciel strony internetowej nie ponosi odpowiedzialności za treści lub działania tych stron internetowych.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Zmiana Warunków Korzystania</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Właściciel strony internetowej zastrzega sobie prawo do zmiany Warunków Korzystania w dowolnym czasie i bez uprzedniego powiadomienia. Korzystanie z tej strony internetowej po wprowadzeniu zmian w Warunkach Korzystania oznacza akceptację tych zmian.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Kontakt</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>W razie pytań lub wątpliwości związanych z Warunkami Korzystania, prosimy o kontakt za pomocą formularza na naszej stronie internetowej lub na adres e-mail.</p>
                <!-- /wp:paragraph --></section>
                <!-- /wp:group -->',
            ]
        );
    });
}