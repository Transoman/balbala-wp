<?php

/**
 * WC Category Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'wc-category-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wc-category';
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
  <div class="wc-category__wrap">
    <?php if ($title): ?>
      <h2 class="section-title"><?php echo $title; ?></h2>
    <?php endif; ?>

    <?php $wc_cats = get_terms(array(
      'taxonomy' => 'product_cat',
      'hide_empty' => false,
      'orderby'       => 'id',
    ));

    if ($wc_cats): ?>
      <div class="wc-category-list">
        <?php foreach ($wc_cats as $cat):
          $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); ?>
          <a href="<?php echo get_term_link( $cat ); ?>" class="wc-category-list__item">
            <div class="wc-category-list__icon">
              <?php echo wp_get_attachment_image( $thumbnail_id ); ?>
            </div>
            <h3 class="wc-category-list__title"><?php echo $cat->name; ?></h3>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>