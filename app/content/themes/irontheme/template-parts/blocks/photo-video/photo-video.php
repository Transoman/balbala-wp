<?php

/**
 * Photo and Video Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'photo-video-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'photo-video';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$title = get_field('title') ?: 'Заголовок...';
$gallery = get_field('photos');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if ($title): ?>
    <h2 class="section-title"><?php echo $title; ?></h2>
  <?php endif; ?>

  <div class="photo-video__wrap">
    <?php if ($gallery): ?>
      <div class="photo-video__left">
        <div class="photo-video-slider swiper-container">
          <div class="swiper-wrapper">
            <?php foreach ($gallery as $img): ?>
              <a href="<?php echo wp_get_attachment_image_url( $img, 'full' ); ?>" data-fancybox="gallery" class="photo-video-slider__item swiper-slide">
                <?php echo wp_get_attachment_image( $img, 'slider-gallery' ); ?>
              </a>
            <?php endforeach; ?>
          </div>
          <div class="slider-controls">
            <div class="swiper-button-prev"><?php ith_the_icon( 'arrow-left' ); ?></div>
            <div class="swiper-button-next"><?php ith_the_icon( 'arrow-right' ); ?></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if (have_rows('video_list')): ?>
      <div class="photo-video__right">
        <div class="photo-video-list">
          <?php while (have_rows('video_list')): the_row(); ?>
            <div class="photo-video-list__item">
              <div class="video">
                <a href="<?php echo esc_url(get_sub_field('video')); ?>" class="video__link"></a>
                <button type="button" aria-label="Запустить видео" class="video__button"></button>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>