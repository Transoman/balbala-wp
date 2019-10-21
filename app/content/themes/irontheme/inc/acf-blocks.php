<?php
function register_acf_block_types() {

  // register a testimonial block.
  acf_register_block_type(array(
    'name'              => 'hero',
    'title'             => __('Первый экран'),
    'render_template'   => 'template-parts/blocks/hero/hero.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array( 'hero', 'Первый экран' )
  ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'register_acf_block_types');
}