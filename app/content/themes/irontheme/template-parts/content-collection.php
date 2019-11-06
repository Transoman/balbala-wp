<div class="section-head">
  <div class="section-head__left">
    <h2 class="section-title section-title--page"><?php the_title(); ?></h2>
    <?php woocommerce_breadcrumb(); ?>
  </div>
</div>

<?php
$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$args = array(
  'post_type' => 'product',
  'post_status' => 'publish',
  'posts_per_page' => $count ? $count : get_option('posts_per_page'),
  'paged' => $paged,
  'order' => 'ASC',
  'orderby' => 'ID',
  'meta_query' => array(
    array(
      'key' => 'collection',
      'value' => get_the_ID(),
      'compare' => '='
    )
  )
);

$product = new WP_Query( $args );

if ($product->have_posts()):

  do_action( 'woocommerce_before_shop_loop' );

  woocommerce_product_loop_start();

  while ( $product->have_posts() ) {
    $product->the_post();

    /**
     * Hook: woocommerce_shop_loop.
     */
    do_action( 'woocommerce_shop_loop' );

    wc_get_template_part( 'content', 'product' );
  }

  woocommerce_product_loop_end(); ?>

<?php else:
  /**
   * Hook: woocommerce_no_products_found.
   *
   * @hooked wc_no_products_found - 10
   */
  do_action( 'woocommerce_no_products_found' );
endif; ?>
