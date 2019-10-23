<?php

/**
 * WC New Products Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'wc-new-products-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'new-products';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$title = get_field('title') ?: 'Заголовок...';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="new-products__wrap">
    <div class="section-head">
      <?php if ($title): ?>
        <h2 class="section-title"><?php echo $title; ?></h2>
      <?php endif; ?>

      <div class="slider-controls">
        <div class="swiper-button-prev"><?php ith_the_icon( 'arrow-left' ); ?></div>
        <div class="swiper-button-next"><?php ith_the_icon( 'arrow-right' ); ?></div>
      </div>
    </div>

    <?php $args = array(
      'post_type' => 'product',
      'stock' => 1,
      'posts_per_page' => 12,
      'orderby' =>'date',
      'order' => 'DESC'
    );

    $products = new WP_Query( $args );

    if ($products->have_posts()): ?>
      <div class="new-products-slider swiper-container">
        <div class="swiper-wrapper">
          <?php while ($products->have_posts()): $products->the_post(); ?>
            <div class="new-products-slider__item swiper-slide">
              <?php wc_get_template_part( 'content', 'product' ); ?>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>