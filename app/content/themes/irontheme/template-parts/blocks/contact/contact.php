<?php

/**
 * Contact Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact';
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

  <?php $branches = get_any_post( 'branch', -1 );
  if ($branches->have_posts()): ?>
    <div class="contact__wrap">
      <div class="contact__left">
        <div class="contact-dropdown">
          <div class="contact-dropdown__head"></div>
          <div class="contact-dropdown__body">
            <ul class="contact-dropdown__list">
              <?php while ($branches->have_posts()): $branches->the_post(); ?>
                <li>
                  <a href=""><?php the_title(); ?></a>
                </li>
              <?php endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>

        <div id="contact-map" class="contact__map"></div>
      </div>

      <div class="contact__right">
        <h3>Контакты</h3>
      </div>

    </div>
  <?php endif; ?>
</section>