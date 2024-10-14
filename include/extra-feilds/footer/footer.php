<?php
function custom_settings_field() {
    add_settings_field('footer_field_1', 'Footer field 1', 'footer_field_1_callback', 'general');
    add_settings_field('footer_field_2', 'Footer field 2', 'footer_field_2_callback', 'general');
}
add_action('admin_init', 'custom_settings_field');

function footer_field_1_callback() {
    $value = get_option('footer_field_1');
    wp_editor($value, 'footer_field_1', array(
        'wpautop' => true,
        'media_buttons' => true,
        'textarea_name' => 'footer_field_1',
        'textarea_rows' => 5,
        'teeny' => false,
        'tinymce' => true
    ));
}

function footer_field_2_callback() {
    $value = get_option('footer_field_2');
    echo '<textarea id="footer_field_2" name="footer_field_2" rows="5">' . esc_attr($value) . '</textarea>';
}

function register_custom_settings() {
    register_setting('general', 'footer_field_1');
    register_setting('general', 'footer_field_2');
}
add_action('admin_init', 'register_custom_settings');
