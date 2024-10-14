<?php

declare(strict_types=1);

if (\class_exists('WP_Block_Patterns_Registry')) {
    \add_action('init', function () {
        \register_block_pattern(
            'boxernia/bsk__page-privacy-policy',
            [
                'title' => \__('BSK - strona Privacy policy', 'Boxernia'),
                'content' => '<!-- wp:group {"tagName":"section","className":"container container\u002d\u002d768 py-5","layout":{"type":"constrained"}} -->
                <section class="wp-block-group container container--768 py-5"><!-- wp:heading {"textAlign":"center","level":1,"className":"mb-5"} -->
                <h1 class="has-text-align-center mb-5">Polityka prywatności</h1>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Ta Polityka Prywatności opisuje sposób, w jaki gromadzimy, przetwarzamy i chronimy Twoje dane osobowe w ramach korzystania z naszej strony internetowej.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Gromadzenie danych osobowych</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Podczas korzystania z naszej strony internetowej możemy zbierać dane osobowe, takie jak Twoje imię, nazwisko, adres e-mail i numer telefonu. Mogą być one zbierane na kilka sposobów, m.in. poprzez formularze kontaktowe, subskrypcję newslettera lub poprzez pliki cookies</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Wykorzystanie danych osobowych</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Twoje dane osobowe mogą być wykorzystywane w następujące sposoby:</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:list -->
                <ul><!-- wp:list-item -->
                <li>w celu udzielenia odpowiedzi na Twoje zapytania,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>w celu dostarczenia Ci informacji na temat produktów lub usług,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>w celu wysyłki newslettera, jeśli wyrazisz na to zgodę,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>w celu analizy ruchu na stronie internetowej i dostosowania jej do Twoich potrzeb,</li>
                <!-- /wp:list-item -->
                
                <!-- wp:list-item -->
                <li>w celu przestrzegania przepisów prawa.</li>
                <!-- /wp:list-item --></ul>
                <!-- /wp:list -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Przetwarzanie danych osobowych</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Twoje dane osobowe mogą być przetwarzane przez naszych partnerów biznesowych, którzy zapewniają nam usługi związane z funkcjonowaniem strony internetowej, takie jak hosting, analizy danych, itp. Zapewniamy, że wszyscy nasi partnerzy biznesowi są zobowiązani do przestrzegania przepisów prawa w zakresie ochrony danych osobowych.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Bezpieczeństwo danych osobowych</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Zapewniamy odpowiednie środki techniczne i organizacyjne w celu ochrony Twoich danych osobowych przed nieuprawnionym dostępem, ich utratą lub uszkodzeniem.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Prawa związane z danymi osobowymi</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Masz prawo do wglądu w swoje dane osobowe, ich poprawienia, usunięcia lub ograniczenia przetwarzania. Masz również prawo do przenoszenia swoich danych osobowych do innego podmiotu, jak również do wniesienia skargi do organu nadzorczego.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Pliki cookies</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>Nasza strona internetowa korzysta z plików cookies w celu zapewnienia jej poprawnego działania oraz dostosowania jej do Twoich potrzeb. Pliki cookies umożliwiają nam zbieranie informacji o Twoich preferencjach oraz historii korzystania z naszej strony internetowej. Możesz zawsze zablokować lub usunąć pliki cookies w ustawieniach swojej przeglądarki internetowej.</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:heading {"className":"h3"} -->
                <h2 class="h3">Kontakt</h2>
                <!-- /wp:heading -->
                
                <!-- wp:paragraph -->
                <p>W razie pytań lub wątpliwości związanych z Polityką Prywatności lub przetwarzaniem Twoich danych osobowych, prosimy o kontakt za pomocą formularza na naszej stronie internetowej lub na adres e-mail.</p>
                <!-- /wp:paragraph --></section>
                <!-- /wp:group -->',
            ]
        );
    });
}
