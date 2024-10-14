<?php
function custom_gutenberg_color_palette() {
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name' => __( 'Black', 'nazwa-motywu' ),
                'slug' => 'black',
                'color' => '#000',
            ),
            array(
                'name' => __( 'White', 'nazwa-motywu' ),
                'slug' => 'white',
                'color' => '#fff',
            ),
            array(
                'name' => __( 'Sand', 'nazwa-motywu' ),
                'slug' => 'sand',
                'color' => '#fae7bc',
            ),
            array(
                'name' => __( 'Light sand', 'nazwa-motywu' ),
                'slug' => 'light-sand',
                'color' => '#fefaf2',
            ),
            array(
                'name' => __( 'Brown', 'nazwa-motywu' ),
                'slug' => 'brown',
                'color' => '#41361a',
            ),
            array(
                'name' => __( 'Dark brown', 'nazwa-motywu' ),
                'slug' => 'dark-brown',
                'color' => '#2c1b0e',
            ),
            array(
                'name' => __( 'Darker brown', 'nazwa-motywu' ),
                'slug' => 'darker-brown',
                'color' => '#1c1109',
            ),
            array(
                'name' => __( 'Blue', 'nazwa-motywu' ),
                'slug' => 'blue',
                'color' => '#177bd7',
            ),
            array(
                'name' => __( 'Light blue', 'nazwa-motywu' ),
                'slug' => 'light-blue',
                'color' => '#83b2dc',
            ),
        )
    );
}
add_action( 'after_setup_theme', 'custom_gutenberg_color_palette' );
