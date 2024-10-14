<?php
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php if ( is_single() ) :
        $get_the_title = get_the_title();
        $short_content = wp_strip_all_tags( get_the_content() );
        $three_dots = '';
        if(strlen($short_content) > 80) {
            $three_dots = '...';
        }
        $short_content = substr($short_content, 0,80) . $three_dots;
        $get_the_excerpt = get_the_excerpt() ? get_the_excerpt() : $short_content;
        $current_url = get_permalink();
        $featured_img_url = get_bloginfo('template_directory') . '/assets/images/logo6.png';

        if ( has_post_thumbnail() ) {
            $featured_img_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
            $featured_img_url = $featured_img_array[0];
        }

        $encoded_title = rawurlencode($get_the_title);
        $encoded_description = rawurlencode($get_the_excerpt);
        $encoded_url = rawurlencode($current_url);
        $encoded_image_url = rawurlencode($featured_img_url);

        $link = "https://www.facebook.com/sharer/sharer.php?u={$encoded_url}&title={$encoded_title}&description={$encoded_description}&picture={$encoded_image_url}";

        ?>
        <div class="bsk-banner bsk-banner--small py-2">

            <?php if ( has_post_thumbnail() ) { ?>
                <?php
                echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'bsk-banner__image' ) );
                ?>
            <?php } ?>

            <div class="container container--768 text-center py-2">
                <h1 class="bsk-banner__title">
                    <?= $get_the_title ?>
                </h1>
                <p><span><?= get_the_time('l, F j, Y') ?></span></p>
            </div>
        </div>
    <?php endif; ?>
    <section class="bsk-default-content bg-color-white py-0 py-sm-5">
        <div class="container px-0 px-sm-3">
            <div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand">
                <div class="container--768 mx-auto">
                    <nav class="bsk-default-content__social-sharing">
                        <ul>
                            <li class="bsk-ico-facebook">
                                <a class="bsk-window-share"
                                   target="_blank" href="<?= $link ?>"
                                   aria-label="Udostępnij post na Facebook"
                                   title="Udostępnij post na Facebook"></a>
                            </li>
                        </ul>
                    </nav>

                    <?php get_the_excerpt() ?>

                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; else: ?>
    <div class="container container--768 py-5">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
<?php endif; ?>

<?php

// switch_to_blog(1);

$post_slug = 'footer-elements-in-a-single-post';
$post = get_page_by_path($post_slug, OBJECT, 'elements');
if($post) {
    $blocks = parse_blocks($post->post_content);
    $block_content = '';
    foreach ($blocks as $block) {
        $block_content .= render_block($block);
    }
    echo $block_content;
};

//$post_id = 22;
//$post = get_post($post_id);
//if($post) {
//    $blocks = parse_blocks($post->post_content);
//    $block_content = '';
//
//    foreach ($blocks as $block) {
//        $block_content .= render_block($block);
//    }
//    echo $block_content;
//};

// restore_current_blog();
?>

<?php
get_footer();
?>