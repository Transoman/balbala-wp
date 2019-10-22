<?php

/**
 * Advantages Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'advantages-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'advantages';
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
  <?php if ($title): ?>
    <h2 class="section-title"><?php echo $title; ?></h2>
  <?php endif; ?>

  <?php if (have_rows('list')): ?>
    <div class="advantages__wrap">

      <?php echo wp_get_attachment_image( get_field('img'), 'full', '', array('class' => 'advantages__img') ); ?>

      <?php $i = 1; while (have_rows('list')): the_row(); ?>
        <div class="advantages__item">
          <div class="advantages__inner">
            <span class="advantages__num"><?php echo $i++; ?></span>
            <?php the_sub_field('text'); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>