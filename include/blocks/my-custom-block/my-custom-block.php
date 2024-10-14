<?php declare(strict_types=1);
/**
 * Filters Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$className = 'my-custom-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

// Get ACF fields for the custom block
$title = get_field('title');
$text = get_field('text');
?>

<div class="<?=$className ?>">
    <h2><?= $title; ?></h2>
    <p><?= $text; ?></p>
</div>