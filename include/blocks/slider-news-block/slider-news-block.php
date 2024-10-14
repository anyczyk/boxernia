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

$className = 'bsk-slider py-3 py-sm-5';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 9, 'paged' => $paged, 'post_type' => 'post' );
$title = get_field('slider-news-block-title');
$slider_news_filter_sepia = get_field('slider-news-filter-sepia');
$slider_news_tag_title = get_field('slider_news-tag-title') ? get_field('slider_news-tag-title') : 'h2';
$slider_news_tag_title_slide = get_field('slider_news-tag-title-slide') ? get_field('slider_news-tag-title-slide') : 'h3';
$slider_news_only_slider = get_field('slider-news-only-slider');

query_posts($args);

$latest_post = get_posts($args);
?>
<div class="<?=$className ?>">
<?php if ( have_posts() ) : ?>
    <div class="container">
        <?php
        if($title) : ?>
            <<?=$slider_news_tag_title ?> class="bsk-slider__title mb-3 mb-sm-5"><?= $title ?></<?=$slider_news_tag_title ?>>
        <?php
        endif;
        ?>

        <?php if(!$slider_news_only_slider) { ?>
            <div class="grid bsk-slider__latest">
                <?php
                $i = 0;
                while (have_posts()) : the_post();
                $short_content = wp_strip_all_tags( get_the_content() );
                $i++;
                $img = get_the_post_thumbnail( $post->ID, 'medium' );
                $excerpt = get_the_excerpt($post->ID);
                if($i < 3) {
                ?>
                <div class="g-col-12 g-col-sm-6 <?= ($i === 1) ? 'g-col-lg-8' : 'g-col-lg-4' ?> d-flex">
                    <div class="bsk-tile <?= ($i === 1) ? 'bsk-tile--latest-news' : '' ?>">
                    <div class="bsk-tile__image <?= $slider_news_filter_sepia ? 'filter-sepia' : '' ?>">
                        <?php if($img) : ?>
                            <?= $img ?>
                        <?php else : ?>
                            <img src="<?= get_bloginfo('template_directory'); ?>/assets/images/bsk.webp" alt="BSK Boxernia">
                        <?php endif; ?>
                    </div>
                    <div class="bsk-tile__text p-4">
                        <<?= $slider_news_tag_title_slide ?> class="bsk-tile__title-slide">
                        <?= get_the_title() ?>
                    </<?= $slider_news_tag_title_slide ?>>
                    <p class="bsk-tile__date"><span><?= get_the_time('l, F j, Y') ?></span></p>
                    <?php if($excerpt || $short_content) : ?>
                        <p class="bsk-tile__description"><?= $excerpt ?: $short_content ?></p>
                    <?php endif; ?>
                    <a class="bsk-tile__btn bsk-btn-1 mt-auto mx-auto ajax-link" href="<?= get_permalink($post->ID); ?>">
                        Czytaj więcej
                    </a>
                </div>
                </div>
                </div>
                <?php } ?>
                <?php endwhile; ?>
            </div>
        <?php } ?>

        <div class="bsk-slider__wrapper">
            <div class="bsk-slider__swiper swiper">
                <div class="swiper-wrapper">
                    <?php
                    $i = 0;
                    while (have_posts()) : the_post();
                        $short_content = wp_strip_all_tags( get_the_content() );
                        $i++;
                        $img = get_the_post_thumbnail( $post->ID, 'medium' );
                        $excerpt = get_the_excerpt($post->ID);
                        if($slider_news_only_slider || $i > 2) {
                        ?>
                            <div class="bsk-slider__swiper-slide swiper-slide bsk-tile">
                                <div class="bsk-tile__image <?= $slider_news_filter_sepia ? 'filter-sepia' : '' ?>">
                                    <?php if($img) : ?>
                                        <?= $img ?>
                                    <?php else : ?>
                                        <img src="<?= get_bloginfo('template_directory'); ?>/assets/images/bsk.webp" alt="BSK Boxernia">
                                    <?php endif; ?>
                                </div>
                                <div class="bsk-tile__text p-4">
                                    <<?= $slider_news_tag_title_slide ?> class="bsk-tile__title-slide">
                                        <?= get_the_title() ?>
                                    </<?= $slider_news_tag_title_slide ?>>
                                    <p class="bsk-tile__date"><span><?= get_the_time('l, F j, Y') ?></span></p>
                                    <?php if($excerpt || $short_content) : ?>
                                        <p class="bsk-tile__description"><?= $excerpt ?: $short_content ?></p>
                                    <?php endif; ?>
                                    <a class="bsk-tile__btn bsk-btn-1 mt-auto mx-auto ajax-link" href="<?= get_permalink($post->ID); ?>">
                                        Czytaj więcej
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endwhile; ?>

                    <div class="bsk-slider__swiper-slide swiper-slide bsk-tile">
                        <div class="bsk-tile__image">
                                <img style="filter: grayscale(1);" src="<?= get_bloginfo('template_directory'); ?>/assets/images/bsk.webp" alt="BSK Boxernia">
                        </div>
                        <div class="bsk-tile__text p-4">
                            <a class="bsk-tile__btn bsk-btn-1 mx-auto my-auto ajax-menu" href="<?= get_site_url() ?>/archiwum/">Zobacz archiwum aktualności</a>
                        </div>
                    </div>

                </div>
            </div>
            <button class="bsk-slider__swiper-prev" aria-label="Prev"></button>
            <button class="bsk-slider__swiper-next" aria-label="Next"></button>
        </div>
        <div class="swiper-pagination mt-3 mt-sm-5"></div>
    </div>
    <?php wp_reset_query(); ?>
<?php else : ?>
    <p>No posts found...</p>
<?php endif; ?>
</div>
