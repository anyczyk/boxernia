<?php declare(strict_types=1);
/**
 * Filters Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

global $post;

$className = 'bsk-news py-3 py-sm-5';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 9, 'paged' => $paged );
query_posts($args);
$title = get_field('news-block-title');
$news_filter_sepia = get_field('news-filter-sepia');
$news_tag_title = get_field('news-tag-title') ? get_field('news-tag-title') : 'h2';
$news_tag_title_tile = get_field('news-tag-title-tile') ? get_field('news-tag-title-tile') : 'h3';
?>
<div class="<?=$className ?>">
    <?php if ( have_posts() ) : ?>
        <div class="container">
            <?php
            if($title) : ?>
                <<?=$news_tag_title ?> class="bsk-slider__title mb-3 mb-sm-5"><?= $title ?></<?=$news_tag_title ?>>
            <?php
            endif;
            ?>

            <ul class="list-unstyled bsk-news__list grid">
                <?php
                while (have_posts()) : the_post();
                    $short_content = wp_strip_all_tags( get_the_content() );
                    ?>
                    <?php
                    $img = get_the_post_thumbnail( $post->ID, 'medium' );
                    ?>
                    <li class="bsk-tile g-col-12 g-col-sm-6 g-col-md-4">
                        <div class="bsk-tile__image <?= $news_filter_sepia ? 'filter-sepia' : '' ?>">
                            <?php if($img) : ?>
                                <?= $img ?>
                            <?php else : ?>
                                <img src="<?= get_bloginfo('template_directory'); ?>/assets/images/bsk.webp" alt="BSK Boxernia">
                            <?php endif; ?>
                        </div>
                        <div class="bsk-tile__text p-4">
                            <<?=$news_tag_title_tile ?> class="bsk-tile__title-slide"><?= get_the_title() ?></<?=$news_tag_title_tile ?>>
                            <p class="bsk-tile__date"><span><?= get_the_time('l, F j, Y') ?></span></p>
                            <?php if($short_content) : ?>
                                <p class="bsk-tile__description"><?= $short_content ?></p>
                            <?php endif; ?>
                            <a class="bsk-tile__btn bsk-btn-1 mt-auto mx-auto ajax-link" href="<?= get_post_permalink( $post->ID ); ?>">Czytaj więcej</a>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="bsk-news__pagination text-center mt-3 mt-sm-5">
                <?php previous_posts_link("« Poprzednie"); ?> | <?php next_posts_link("Następne »"); ?>
            </div>
        </div>
        <?php wp_reset_query(); ?>
    <?php else : ?>
        <p>No posts found...</p>
    <?php endif; ?>
</div>