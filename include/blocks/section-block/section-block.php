<?php
function section_block_register_block_type() {
    wp_register_script(
        'section-block',
        get_template_directory_uri() . '/include/blocks/section-block/dist/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' )
    );

    register_block_type( 'my-plugin/section-block', array(
        'editor_script' => 'section-block',
    ) );
}
add_action( 'init', 'section_block_register_block_type' );