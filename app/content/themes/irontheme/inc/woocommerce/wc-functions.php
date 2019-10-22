<?php

/**
 * Disable all styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Cart Count
 */
function ith_header_cart_count() {
  $cart_count = WC()->cart->get_cart_contents_count();
  if($cart_count > 99){
    $cart_count = '99+';
  }
  ?>
  <span class="header-cart__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
  <?php
}

/**
 * Display Discount Percentage
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'ith_show_sale_percentage_loop', 25 );

function ith_show_sale_percentage_loop() {
  global $product;

  if ( ! $product->is_on_sale() ) return;

  if ( $product->is_type( 'simple' ) ) {
    $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
  } elseif ( $product->is_type( 'variable' ) ) {
    $max_percentage = 0;
    foreach ( $product->get_children() as $child_id ) {
      $variation = wc_get_product( $child_id );
      $price = $variation->get_regular_price();
      $sale = $variation->get_sale_price();
      if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
      if ( $percentage > $max_percentage ) {
        $max_percentage = $percentage;
      }
    }
  }
  if ( $max_percentage > 0 ) echo "<div class='product-item__sale-perc'>-" . ceil($max_percentage) . "%</div>";
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

function woocommerce_template_loop_product_title() {
  echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'product-item__title' ) ) . '">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}