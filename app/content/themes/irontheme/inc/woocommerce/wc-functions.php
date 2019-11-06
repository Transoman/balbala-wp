<?php

/**
 * Disable all styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_action( 'wp_enqueue_scripts', 'fc_remove_woo_lightbox', 99 );
function fc_remove_woo_lightbox() {
  remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
  wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
  wp_dequeue_script( 'prettyPhoto' );
  wp_dequeue_script( 'prettyPhoto-init' );
}

/**
 * Cart Count
 */
function ith_header_cart_count() {
  $cart_count = WC()->cart->get_cart_contents_count();
  if ($cart_count > 99){
    $cart_count = '99+';
  }
  ?>
  <span class="header-cart__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
  <?php
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
  ith_header_cart_count();
  $fragments['.header-cart__count'] = ob_get_clean();
  return $fragments;
}

/**
 * Display Discount Percentage
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

add_action( 'woocommerce_before_shop_loop_item_title', 'ith_show_sale_percentage_loop', 25 );
add_action( 'woocommerce_before_single_product_summary', 'ith_show_sale_percentage_loop', 10 );

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

  echo '<div class="product-item__ribbons">';

	if (is_singular( 'product' )) { ?>
    <div class="product-item__ribbons-wishlist">
			<?php ith_woocommerce_add_wishlist(); ?>
    </div>
	<?php }

  $data_created_obj = (array) $product->get_date_created();
  $date_created = strtotime($data_created_obj['date']);
  $now_date = time();
  $limit = 864000;

  if ($now_date - $date_created <= $limit) {
    echo "<span class='product-item__ribbon product-item__ribbon--new'>Новинка</span>";
  }

  if ( $max_percentage > 0 ) echo "<span class='product-item__ribbon product-item__ribbon--sale-perc'>-" . ceil($max_percentage) . "%</span>";

  echo '</div>';
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

function woocommerce_template_loop_product_title() {
  echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'product-item__title' ) ) . '">' . get_the_title() . '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

add_action( 'woocommerce_after_shop_loop_item_title', 'ith_woocommerce_loop_product_cat', 5 );
function ith_woocommerce_loop_product_cat() {
  global $product;
  echo '<div class="product-item__cat">' . wp_get_post_terms($product->get_id(), 'product_cat')[0]->name . '</div>';
}

add_action( 'woocommerce_before_shop_loop_item', 'ith_woocommerce_add_wishlist', 5 );
function ith_woocommerce_add_wishlist() {
  echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Single product
 */
add_action( 'woocommerce_single_product_summary', 'ith_woocommerce_single_product_cat', 5 );
function ith_woocommerce_single_product_cat() {
	global $product;
	echo '<div class="product__cat">' . wp_get_post_terms($product->get_id(), 'product_cat')[0]->name . '</div>';
}

add_action( 'woocommerce_single_product_summary', 'ith_woocommerce_single_product_delivery', 5 );
function ith_woocommerce_single_product_delivery() {
	echo '<div class="product__free-delivery">'. ith_get_icon( 'delivery' ) .'Бесплатная доставка</div>';
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Checkout
 */
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'ith_woocommerce_override_checkout_fields' );

function ith_woocommerce_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_last_name']);

  $fields['billing']['billing_first_name']['placeholder'] = 'Имя и фамилия *';
  $fields['billing']['billing_country']['placeholder'] = 'Страна *';
  $fields['billing']['billing_city']['placeholder'] = 'Город *';
  $fields['billing']['billing_postcode']['placeholder'] = 'Почтовый индекс *';
  $fields['billing']['billing_phone']['placeholder'] = 'Телефон *';
  $fields['billing']['billing_email']['placeholder'] = 'Электронная почта *';

  $fields['billing']['billing_email']['priority'] = 20;

  return $fields;
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

add_filter('woocommerce_update_order_review_fragments', 'ith_woocommerce_order_fragments_split_shipping', 10, 1);

function ith_woocommerce_order_fragments_split_shipping($order_fragments) {

  ob_start();
  ith_woocommerce_order_review_shipping_split();
  $ith_woocommerce_order_review_shipping_split = ob_get_clean();

  $order_fragments['.woocommerce-shipping-totals'] = $ith_woocommerce_order_review_shipping_split;

  return $order_fragments;

}

// We'll get the template that just has the shipping options that we need for the new table
function ith_woocommerce_order_review_shipping_split( $deprecated = false ) {
  wc_get_template( 'checkout/shipping-order-review.php', array( 'checkout' => WC()->checkout() ) );
}