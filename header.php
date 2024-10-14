<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="Boks, Boks Kraków, Box, Box Kraków, Boksernia, Boxernia, BSK, Boxerania Serca Krakowa">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" href="<?= get_bloginfo('template_directory') ?>/favicon32.png">
<!--    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />-->
    <link rel="Stylesheet" type="text/css" href="<?= get_bloginfo('template_directory') ?>/public/style.css" />
    <title>
        <?= is_front_page() ? get_bloginfo( 'name' ) : wp_title( '' ); ?>
    </title>
    <link rel="canonical" href="<?= get_permalink() ?>">

    <meta property="og:url" content="<?= get_permalink() ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= get_the_title() .' - '. get_bloginfo( 'name') ?>">
    <meta property="og:description" content="<?= get_the_excerpt() ? get_the_excerpt() : 'Boxernia BSK - Treningi bokserskie' ?>">
    <meta property="og:image" content="<?= has_post_thumbnail() ? get_the_post_thumbnail_url() : get_bloginfo('template_directory').'/screenshot.jpg' ?>">

    <?php wp_head(); ?>
</head>
<?php
$post_slug = 'footer-elements-in-a-single-post';
$post = get_page_by_path($post_slug, OBJECT, 'elements');
?>
<body <?php body_class(); ?> data-site-id="<?= get_current_blog_id() ?>" data-slider-for-single-id="<?= $post->ID ?>" data-homepage-id="<?= get_option('page_on_front') ?>" data-theme-url="<?= get_template_directory_uri() ?>">
<?php
wp_reset_postdata();
?>
<!--<div id="fb-root"></div>-->
<header class="bsk-main-bar">
    <div class="container">
        <div class="bsk-main-bar__content">
            <a class="bsk-main-bar__logo ajax-link" href="<?= get_site_url() ?>/"><img src="<?= get_bloginfo('template_directory') ?>/assets/images/logo6.png" alt="Logo - BSK Boxernia"></a>
            <button class="bsk-main-bar__hamburger"><span>Show/Hide Menu</span></button>
            <nav class="bsk-main-bar__menu">
                <?php wp_nav_menu( array(
                    'menu' => 'main-menu',
                    'menu_class' => 'list-unstyled ajax-menu ajax-menu-main',
                    'container' => false
                ));  ?>
            </nav>
        </div>
    </div>
</header>

<div class="main-content entry-content">