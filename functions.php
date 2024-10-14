<?php
function register_my_menus() {
    register_nav_menus(
        array(
           'menu-position-one' => 'Menu position one' ,
           'menu-position-two' =>  'Menu position two' ,
        )
    );
}
add_action( 'init', 'register_my_menus' );

//function my_scripts() {
//    wp_register_script('myscripts', get_bloginfo('template_directory').'/assets/js/scripts.js', NULL, NULL, false);
//    wp_script_add_data('myscripts', 'type', 'module');
//    wp_enqueue_script('myscripts');
//
//}
//add_action('wp_enqueue_scripts', 'my_scripts');

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'post' ) );
add_theme_support( 'post-thumbnails', array( 'page' ) );

/* BLOCKS */
include_once(get_stylesheet_directory() . '/include/blocks/my-custom-block/my-custom-block_acf.php');
include_once(get_stylesheet_directory() . '/include/blocks/news-block/news-block_acf.php');
include_once(get_stylesheet_directory() . '/include/blocks/slider-news-block/slider-news-block_acf.php');
include_once(get_stylesheet_directory() . '/include/blocks/banner-block/banner-block_acf.php');
include_once(get_stylesheet_directory() . '/include/blocks/teams-block/teams-block_acf.php');
include_once(get_stylesheet_directory() . '/include/blocks/section-block/section-block.php');

/* ELEMENTS */
include_once(get_stylesheet_directory() . '/include/elements/menu-images/menu-images_acf.php');
include_once(get_stylesheet_directory() . '/include/elements/menu-images/menu-images_class.php');

/* CPT */
include_once(get_stylesheet_directory() . '/include/cpt/elements/elements.php');

/* New colors for gutenberg */
include_once(get_stylesheet_directory() . '/include/options/gutenberg-default-colors/gutenberg-default-colors.php');

/* Generall options */
include_once(get_stylesheet_directory() . '/include/options/generall.php');

/* Custom fields for footer */
include_once(get_stylesheet_directory() . '/include/extra-feilds/footer/footer.php');

/* Multisite images sharing */
include_once(get_stylesheet_directory() . '/include/options/multisite-images-sharing/multisite-images-sharing.php');

/* Patterns */
include_once(get_stylesheet_directory() . '/patterns/index.php');

