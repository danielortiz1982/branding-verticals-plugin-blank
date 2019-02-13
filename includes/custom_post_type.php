<?php

    // Reference -> https://codex.wordpress.org/Function_Reference/register_post_type
    register_post_type( 'bv_blank',

        array(
            'labels' => array(
                'name' => 'BV Blank',
                'singular_name' => 'BV Blank',
                'add_new' => 'Add New BV Blank',
                'add_new_item' => 'Add New BV Blank',
                'edit' => 'Edit',
                'edit_item' => 'Edit BV Blank',
                'new_item' => 'New BV Blank',
                'view' => 'View BV Blank',
                'view_item' => 'View BV Blank',
                'search_items' => 'Search BV Blank',
                'not_found' => 'No BV Blanks found',
                'not_found_in_trash' => 'No BV Blank found in Trash',    
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions', 'page-attributes', 'post-formats'),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-businessman',
            'has_archive' => true
        )

    );