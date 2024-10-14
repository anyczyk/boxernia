<?php declare(strict_types=1);
/**
 * Filters Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$banner_small = get_field('banner-small') ? 'bsk-banner--small' : '';
$className = 'py-2  bsk-banner '.$banner_small;
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$title = get_field('banner-title');
$tag_title = get_field('tag-title') ? get_field('tag-title') : 'div';
$desc = get_field('banner-desc');
$image = get_field('banner-image');
$show_banner_logo = get_field('show-banner-logo');
$filter_sepia = get_field('banner-filter-sepia');
$image_fixed = get_field('banner-image-fixed');
?>
<?php if($title || $tag_title || $desc || $image || $show_banner_logo) : ?>
    <div class="<?=$className ?>" <?= ($image_fixed && $image) ? ('style="background-image: url('.$image["url"].')"') : '' ?>>
        <?php if($image_fixed && $image) : ?>
            <div class="bsk-banner__image-fixed <?= $filter_sepia ? 'filter-sepia' : '' ?>" style="background-image: url(<?= $image["url"] ?>)" role="img" aria-label="<?= $image["alt"] ?>">
            </div>
        <?php endif; ?>
        <?php if($image && !$image_fixed) : ?>
            <img class="bsk-banner__image <?= $filter_sepia ? 'filter-sepia' : '' ?>" src="<?= $image["url"] ?>" alt="<?= $image["alt"] ?>">
        <?php endif; ?>
        <?php if($show_banner_logo) : ?>
            <img class="bsk-banner__logo <?= !$filter_sepia ? 'filter-sepia' : '' ?>" src="<?= get_bloginfo('template_directory') ?>/include/blocks/banner-block/images/logo.png" alt="BSK Boxernia">
        <?php endif; ?>

        <?php if($title || $desc) : ?>
            <div class="container container--768 text-center py-2">
                <?php if($title) :?>
                    <<?= $tag_title ?> class="bsk-banner__title">
                        <?= $title ?>
                    </<?= $tag_title ?>>
                <?php endif; ?>
                <?php if($desc) :?>
                    <p class="bsk-banner__desc">
                        <?= $desc ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>