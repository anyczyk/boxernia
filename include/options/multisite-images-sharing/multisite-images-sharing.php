<?php
/**
 * Copies attachment to a specific blog within a WordPress Multisite network
 *
 * @author Misha Rudrastyh
 *
 * @param int $attachment_id Attachment ID
 * @param int $blog_id Blog ID where to move a media file
 * @return bool true on success, false if error occurs
 */
function rudr_copy_attachment_to_blog( $attachment_id, $blog_id ) {

    // get image path unscaled or you can use get_attached_file() if it is not necessary to copy full-sized originals
    $file = wp_get_original_image_path( $attachment_id );

    // exit the function if an attachment with this specific ID doesn't exist
    if( ! $file ) {
        return false;
    }

    // switching to a blog we are going to copy the image to
    switch_to_blog( $blog_id );

    $uploads = wp_upload_dir();

    $filename = wp_unique_filename( $uploads[ 'path' ], basename( $file ) );
    $new_file = $uploads[ 'path' ] . "/$filename";
    $new_file_url = $uploads[ 'url' ] . "/$filename";

    // copy the media file into another multisite subsite uploads directory
    $sideload = @copy( $file, $new_file );

    if( false === $sideload ) {
        return false;
    }

    // it is time to insert media file into media gallery
    $inserted_attachment_id = wp_insert_attachment(
        array(
            'guid' => $new_file_url,
            'post_mime_type' => mime_content_type( $new_file ),
            'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ),
        $new_file
    );

    // make sure this file is included, because wp_generate_attachment_metadata() depends on it
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    // update the attachment metadata.
    wp_update_attachment_metadata(
        $inserted_attachment_id,
        wp_generate_attachment_metadata( $inserted_attachment_id, $new_file )
    );

    restore_current_blog();

    return true;

}

// add bulk action
add_filter( 'bulk_actions-upload', 'rudr_upload_bulk_actions' );
function rudr_upload_bulk_actions( $bulk_array ) {

    if( 2 == get_current_blog_id() ) {
        return $bulk_array;
    }

    $bulk_array[ 'rudr_copy_attachment_to' ] = 'Skopiuj do EN site';
    return $bulk_array;
}
// perform bulk action
add_filter( 'handle_bulk_actions-upload', 'rudr_multisite_move_media', 10, 3 );
function rudr_multisite_move_media( $redirect, $doaction, $object_ids ) {
    // do something for our bulk action
    if( 'rudr_copy_attachment_to' === $doaction ) {
        $count = 0;
        $blog_id = 2;
        foreach( $object_ids as $attachment_id ) { // for each media selected
            if( rudr_copy_attachment_to_blog( $attachment_id, $blog_id ) ) {
                $count++;
            }
        }
        $redirect = add_query_arg( 'rudr_bulk_media', $count, $redirect );
    }
    return $redirect;
}
// print notices in admin
add_action( 'admin_notices', 'misha_bulk_action_notices' );
function misha_bulk_action_notices() {
    // but you can create an awesome message
    if( ! empty( $_REQUEST[ 'rudr_bulk_media' ] ) ) {
        // depending on how many posts have been changed, our message may be different
        printf( '<div id="message" class="updated notice is-dismissible"><p>' . _n( '%d image has been copied to &laquo;Store&raquo;.', '%d images have been copied to &laquo;Store&raquo;.', absint( $_REQUEST[ 'rudr_bulk_media' ] ) ) . '</p></div>', $_REQUEST[ 'rudr_bulk_media' ] );
    }
}
