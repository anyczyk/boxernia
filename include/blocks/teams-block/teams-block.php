<?php declare(strict_types=1);
/**
 * Filters Block Template.
 *
 * @param array  $block      The block settings and attributes.
 * @param string $content    The block inner HTML (empty).
 * @param bool   $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$className = 'teams-block bsk-single-content bg-color-white py-0 py-sm-5';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

$teamsTitle = get_field('teams-title');
$teamsTagTitle = get_field('teams-tag-title');
$teamsTagTitleSub = 'h2';

if($teamsTagTitle == 'h1' || $teamsTagTitle == 'h2' || $teamsTagTitle == 'h3' || $teamsTagTitle == 'h4' || $teamsTagTitle == 'h5' || $teamsTagTitle == 'h6') {
    $teamsTagTitleSub = intval(substr($teamsTagTitle,1,2)) +1;
    $teamsTagTitleSub = 'h'.$teamsTagTitleSub;
}

?>
<section class="<?=$className ?>">
    <div class="container px-0 px-sm-3">
        <div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand">
            <div class="container--768 mx-auto">
                <?php if($teamsTitle): ?>
                    <<?= $teamsTagTitle ?> class="teams-block__title h4 mb-4"><?= $teamsTitle ?></<?= $teamsTagTitle ?>>
                <?php endif; ?>

                <?php if( have_rows('teams') ): ?>
                    <ul class="teams-block__list list-unstyled d-flex flex-column gap-5 mb-0">
                        <?php while( have_rows('teams') ): the_row();
                            $teamsName = get_sub_field('teams-name');
                            $teamsPosition = get_sub_field('teams-position');
                            $teamsImage = get_sub_field('teams-image');
                            $teamsDescription = get_sub_field('teams-description');
                            $teamsDefaultImage = get_template_directory_uri() . '/include/blocks/teams-block/images/boxer-white.png';
                            ?>
                            <li class="d-flex flex-column flex-sm-row gap-3">

                                    <div class="teams-block__item-image">
                                        <img class="bg-color-borwn d-block mx-auto <?= $teamsImage ? '' : 'opacity-25' ?>" src="<?= $teamsImage ? $teamsImage["url"] : $teamsDefaultImage ?>" alt="<?= $teamsImage ? $teamsImage["alt"] : 'Boxer' ?>" />
                                    </div>
                                <?php if($teamsName || $teamsPosition || $teamsDescription) : ?>
                                    <div class="teams-block__text w-100">
                                        <?php if($teamsName) : ?>
                                            <<?= $teamsTagTitleSub ?> class="teams-block__item-name h5"><?= $teamsName ?></<?= $teamsTagTitleSub ?>>
                                        <?php endif; ?>
                                        <?php if($teamsPosition) : ?>
                                            <p class="teams-block__item-position h6 mb-4"><?= $teamsPosition ?></p>
                                        <?php endif; ?>
                                        <?php if($teamsDescription) : ?>
                                            <div class="teams-block__item-description"><?= $teamsDescription ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


