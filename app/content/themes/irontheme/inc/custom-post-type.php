<?php
// Register Branch Post Type
function branch_post_type() {

  $labels = array(
    'name'                  => _x( 'Филиалы', 'Post Type General Name', 'ith' ),
    'singular_name'         => _x( 'Филиал', 'Post Type Singular Name', 'ith' ),
    'menu_name'             => __( 'Филиалы', 'ith' ),
    'name_admin_bar'        => __( 'Филиалы', 'ith' ),
    'archives'              => __( 'Филиалы', 'ith' )
  );
  $args = array(
    'label'                 => __( 'Филиал', 'ith' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor' ),
    'hierarchical'          => false,
    'public'                => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-store',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'branch', $args );

}
add_action( 'init', 'branch_post_type', 0 );


// Register Collection Post Type
function collection_post_type() {

  $labels = array(
    'name'                  => _x( 'Коллекции', 'Post Type General Name', 'ith' ),
    'singular_name'         => _x( 'Коллекция', 'Post Type Singular Name', 'ith' ),
    'menu_name'             => __( 'Коллекции', 'ith' ),
    'name_admin_bar'        => __( 'Коллекции', 'ith' ),
    'archives'              => __( 'Коллекции', 'ith' )
  );
  $args = array(
    'label'                 => __( 'Коллекция', 'ith' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'thumbnail' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-images-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'collection', $args );

}
add_action( 'init', 'collection_post_type', 0 );