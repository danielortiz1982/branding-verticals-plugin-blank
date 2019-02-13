<?php 


    $taxonomy    = 'bv_taxonomy';
    $object_type = 'bv_blank';
    
    $labels = array(
        'name'               => 'BV Taxonomies',
        'singular_name'      => 'BV Taxonomy',
        'search_items'       => 'Search BV Taxonomies',
        'all_items'          => 'All BV Taxonomies',
        'parent_item'        => 'Parent BV Taxonomy',
        'parent_item_colon'  => 'Parent BV Taxonomy:',
        'update_item'        => 'Update BV Taxonomy',
        'edit_item'          => 'Edit BV Taxonomies',
        'add_new_item'       => 'Add New BV Taxonomy', 
        'new_item_name'      => 'New BV Taxonomies',
        'menu_name'          => 'BV Taxonomies'
    );
     
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'how_in_nav_menus'  => true,
        'public'            => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'bv-taxonomies')
    );

    register_taxonomy($taxonomy, $object_type, $args); 
