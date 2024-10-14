<?php
get_header();
?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if ( is_single() ) : ?>
            <h2><?= get_the_title() ?></h2>
        <?php endif; ?>
        <?= the_content(); ?>
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php
get_footer();
?>