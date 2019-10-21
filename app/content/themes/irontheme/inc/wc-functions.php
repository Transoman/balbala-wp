<?php
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