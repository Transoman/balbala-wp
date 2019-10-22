<?php
function register_acf_block_types() {
  acf_register_block_type(array(
    'name'              => 'hero',
    'title'             => __('Первый экран'),
    'render_template'   => 'template-parts/blocks/hero/hero.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array( 'hero', 'Первый экран' )
  ));

  acf_register_block_type(array(
    'name'              => 'wc-category',
    'title'             => __('WC Категории'),
    'render_template'   => 'template-parts/blocks/wc-category/wc-category.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array(  )
  ));

  acf_register_block_type(array(
    'name'              => 'wc-new-products',
    'title'             => __('WC Новые продукты'),
    'render_template'   => 'template-parts/blocks/wc-new-products/wc-new-products.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array(  )
  ));

  acf_register_block_type(array(
    'name'              => 'advantages',
    'title'             => __('Преимущества'),
    'render_template'   => 'template-parts/blocks/advantages/advantages.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array(  )
  ));

  acf_register_block_type(array(
    'name'              => 'photo-video',
    'title'             => __('Фото и видео'),
    'render_template'   => 'template-parts/blocks/photo-video/photo-video.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array(  )
  ));

  acf_register_block_type(array(
    'name'              => 'contact',
    'title'             => __('Контакты'),
    'render_template'   => 'template-parts/blocks/contact/contact.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'mode'              => 'auto',
    'keywords'          => array(  )
  ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'register_acf_block_types');
}