<?php
function create_elements_post_type() {
    register_post_type( 'elements',
        array(
            'labels' => array(
                'name' => __( 'Elements' ),
                'singular_name' => __( 'Element' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'elements'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'slider-news-block' )
        )
    );
}
add_action( 'init', 'create_elements_post_type' );
