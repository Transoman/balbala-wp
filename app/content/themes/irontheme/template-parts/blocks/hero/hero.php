<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$title = get_field('title') ?: 'Заголовок...';
$descr = get_field('descr') ?: 'Описание...';
$btn = get_field('btn');
$video = get_field('video');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="hero__wrap">
      <div class="hero__content">
        <h1 class="section-title"><?php echo $title; ?></h1>
        <div class="hero__descr"><?php echo $descr; ?></div>

        <?php if ($btn['url']): ?>
          <a href="<?php echo esc_url($btn['url']); ?>"<?php echo $btn['target'] ? ' target="'.$btn['target'].'"' : ''; ?> class="btn"><?php echo $btn['title']; ?></a>
        <?php endif; ?>
      </div>
      <div class="hero__video">
        <?php if ($video): ?>
          <div class="video">
            <a href="<?php echo esc_url($video); ?>" class="video__link"></a>
            <button type="button" aria-label="Запустить видео" class="video__button"></button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!--<div id="<?php /*echo esc_attr($id); */?>" class="<?php /*echo esc_attr($className); */?>">
  <blockquote class="testimonial-blockquote">
    <span class="testimonial-text"><?php /*echo $text; */?></span>
    <span class="testimonial-author"><?php /*echo $author; */?></span>
    <span class="testimonial-role"><?php /*echo $role; */?></span>
  </blockquote>
  <div class="testimonial-image">
    <?php /*echo wp_get_attachment_image( $image, 'full' ); */?>
  </div>
  <style type="text/css">
    #<?php /*echo $id; */?> {
      background: <?php /*echo $background_color; */?>;
      color: <?php /*echo $text_color; */?>;
    }
  </style>
</div>-->