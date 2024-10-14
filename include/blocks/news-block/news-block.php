<?php
global $post;
$className = 'bsk-news py-3 py-sm-5' . (!empty($block['className']) ? ' ' . $block['className'] : '');
$paged = (get_query_var('paged')) ?: 1;
$posts_per_page = get_field('news-block-posts-per-page') ?: 6;
$order = 'DESC';
$args = ['posts_per_page' => $posts_per_page, 'paged' => $paged, 'order' => $order, 'fields' => 'found_posts'];
$query = new WP_Query($args);
$title = get_field('news-block-title');
$news_filter_sepia = get_field('news-filter-sepia');
$news_tag_title = get_field('news-tag-title') ?: 'h2';
$news_tag_title_tile = get_field('news-tag-title-tile') ?: 'h3';
?>
<div class="<?=$className ?>"
    data-posts-order="<?= $order ?>"
    data-posts-per-pages="<?= $posts_per_page ?>"
    data-filter-sepia="<?=$news_filter_sepia ?>"
    data-tag-title-tile="<?= $news_tag_title_tile ?>"
    data-count-posts="<?= $query->found_posts ?>"
    >
    <?php if ( $query->have_posts() ) : ?>
        <div class="container">
            <?php if($title) : ?>
                <<?= $news_tag_title ?> class="bsk-slider__title mb-3 mb-sm-5"><?= $title ?></<?= $news_tag_title ?>>
            <?php endif; ?>
            <div class="text-center mb-3 mb-sm-5">
                <button class="bsk-tile__btn-load-start bsk-tile__btn bsk-btn-1">Wczytaj posty od najstarszego</button>
            </div>
            <p class="bsk-news__count-posts pt-2">Ilość wczytanych postów: <span class="bsk-news__count-posts-show"><?= $posts_per_page ?></span> / <?= $query->found_posts ?></p>
            <ul class="list-unstyled bsk-news__list grid">
                <?php while ($query->have_posts()) : $query->the_post();
                    $short_content = wp_strip_all_tags( get_the_content() );
                    $img = get_the_post_thumbnail( $post->ID, 'medium' ); ?>
                    <li class="bsk-tile g-col-12 g-col-sm-6 g-col-md-4">
                        <div class="bsk-tile__image <?= $news_filter_sepia ? 'filter-sepia' : '' ?>">
                            <?= $img ?: '<img src="'. get_bloginfo('template_directory') . '/assets/images/bsk.webp" alt="BSK Boxernia">' ?>
                        </div>
                        <div class="bsk-tile__text p-4">
                            <<?= $news_tag_title_tile ?> class="bsk-tile__title-slide"><?= get_the_title() ?></<?= $news_tag_title_tile ?>>
                            <p class="bsk-tile__date"><span><?= get_the_time('l, F j, Y') ?></span></p>
                            <?php if($short_content) : ?><p class="bsk-tile__description"><?= $short_content ?></p><?php endif; ?>
                            <a class="bsk-tile__btn bsk-btn-1 mt-auto mx-auto ajax-link" href="<?= get_permalink($post->ID); ?>">Czytaj więcej</a>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="bsk-news__pagination text-center mt-3 mt-sm-5">
                <button class="bsk-tile__btn-load-more bsk-tile__btn bsk-btn-1 mt-auto mx-auto" data-page="1">Wczytaj kolejne max <?= $posts_per_page ?> postów</button>
            </div>
        </div>
        <?php wp_reset_query();
    else : ?>
        <p>No posts found...</p>
    <?php endif; ?>
</div>