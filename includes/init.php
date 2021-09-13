<?php


function tequ_init(){
    /**
 * Register a custom post type called "test".
 *
 * @see get_post_type_test() for label keys.
 */
    $labels = array(
        'name'                  => _x( 'Tests', 'Post type general name', 'tequ' ),
        'singular_name'         => _x( 'Test', 'Post type singular name', 'tequ' ),
        'menu_name'             => _x( 'Tests', 'Admin Menu text', 'tequ' ),
        'name_admin_bar'        => _x( 'Test', 'Add New on Toolbar', 'tequ' ),
        'add_new'               => __( 'Add New', 'tequ' ),
        'add_new_item'          => __( 'Add New Test', 'tequ' ),
        'new_item'              => __( 'New Test', 'tequ' ),
        'edit_item'             => __( 'Edit Test', 'tequ' ),
        'view_item'             => __( 'View Test', 'tequ' ),
        'all_items'             => __( 'All Tests', 'tequ' ),
        'search_items'          => __( 'Search Tests', 'tequ' ),
        'parent_item_colon'     => __( 'Parent Tests:', 'tequ' ),
        'not_found'             => __( 'No Tests found.', 'tequ' ),
        'not_found_in_trash'    => __( 'No Tests found in Trash.', 'tequ' ),
        'featured_image'        => _x( 'Test Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'tequ' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'tequ' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'tequ' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'tequ' ),
        'archives'              => _x( 'Test archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'tequ' ),
        'insert_into_item'      => _x( 'Insert into Test', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'tequ' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Test', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'tequ' ),
        'filter_items_list'     => _x( 'Filter Tests list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'tequ' ),
        'items_list_navigation' => _x( 'Tests list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'tequ' ),
        'items_list'            => _x( 'Tests list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'tequ' )
    );
 
    $args = array(
        'labels'             => $labels,
        'description'        => 'Test type post',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'test' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'         => 'dashicons-editor-spellcheck',
        'supports'           => array('title'),
        // 'taxonomies'         => array('category', 'post_tag'),
        'show_in_rest'      => true
    );
 
    $tequ_page = register_post_type( 'test', $args );
}
 