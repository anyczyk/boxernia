<?php
get_header();
?>

<?php

$post_slug = '404';
$post = get_page_by_path($post_slug, OBJECT, 'elements');

if($post) {
    $blocks = parse_blocks($post->post_content);
    $block_content = '';

    foreach ($blocks as $block) {
        $block_content .= render_block($block);
    }
    echo $block_content;
};

//$post_id = 1274;
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
?>

<?php
get_footer();
?>