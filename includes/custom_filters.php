<?php

    function template_single_post($single){
        global $wp_query, $post;
        /* Checks for single template by post type */
        if ( $post->post_type == 'bv_blank' ) {
            if ( file_exists( plugin_dir_path(__FILE__) . '../templates/bv-single.php' ) ) {
                return plugin_dir_path(__FILE__) . '../templates/bv-single.php';
            }
        }
        return $single;
    }