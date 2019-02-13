<?php

function sample_meta_box_save( $post_id ){
		
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'sample_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;
    

    // List of allowed HTML elements to be passed to the wp_kses method
    // Reference -> https://codex.wordpress.org/Function_Reference/wp_kses
    $allowed = array();
    
    // The function update_post_meta() updates the value of an existing meta key (custom field) for the specified post.
    // Reference -> https://codex.wordpress.org/Function_Reference/update_post_meta
    if( isset( $_POST['sample_input'] ) )

        update_post_meta( $post_id, 'sample_input', wp_kses( $_POST['sample_input'], $allowed ) );

    ///////////////////////////////////////// End of ~ sample_input Input Update Post Meta /////////////////////////////////////////
        
    if( isset( $_POST['sample_select'] ) )

        update_post_meta( $post_id, 'sample_select', wp_kses( $_POST['sample_select'], $allowed ) );

    ///////////////////////////////////////// End of sample_select ~ Select Update Post Meta /////////////////////////////////////////
        
    if( isset( $_POST['sample_radio'] ) )

        update_post_meta( $post_id, 'sample_radio', wp_kses( $_POST['sample_radio'], $allowed ) );
    

    ///////////////////////////////////////// End of sample_checkbox ~ Radio Update Post Meta /////////////////////////////////////////
        
    if( isset( $_POST['sample_textarea'] ) )

        update_post_meta( $post_id, 'sample_textarea', wp_kses( $_POST['sample_textarea'], $allowed ) );

    ///////////////////////////////////////// End of sample_textarea ~ Textarea Update Post Meta /////////////////////////////////////////

    if(!empty($_FILES['sample_file_upload']['name'])) {

        $supported_types = array('application/pdf');

        $arr_file_type = wp_check_filetype(basename($_FILES['sample_file_upload']['name']));

        $uploaded_type = $arr_file_type['type'];

        if(in_array($uploaded_type, $supported_types)) {

            $upload = wp_upload_bits($_FILES['sample_file_upload']['name'], null, file_get_contents($_FILES['sample_file_upload']['tmp_name']));
            if(isset($upload['error']) && $upload['error'] != 0) {

                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);

            } else {

                update_post_meta($post_id, 'sample_file_upload', $upload);

            }
        }

        else {

            wp_die("The file type that you've uploaded is not a PDF. " . '<a href="#" onclick="history.back();">Return to Post</a>');

        }
    } 
    //////////////////////////////////////// End of sample_file_upload ~ File Upload Update Post Meta ////////////////////////////////////////

}