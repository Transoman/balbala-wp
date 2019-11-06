<?php

/**
 * Collection Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'collection-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'collection';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$title = get_field('title') ?: 'Заголовок...';

?>

<?php if (have_rows( 'collection_slider' )): ?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="collection__wrap">
    <div class="section-head">
      <?php if ($title): ?>
        <h2 class="section-title"><?php echo $title; ?></h2>
      <?php endif; ?>

      <div class="slider-controls">
        <div class="swiper-button-prev"><?php ith_the_icon( 'arrow-left' ); ?></div>
        <div class="swiper-button-next"><?php ith_the_icon( 'arrow-right' ); ?></div>
      </div>
    </div>

    <div class="collection-slider swiper-container">
      <div class="swiper-wrapper">
        <?php while (have_rows( 'collection_slider' )): the_row();
          $collections = get_sub_field('slides');
          if (count($collections) == 1): ?>
            <div class="collection-slider__item swiper-slide">
              <?php while (have_rows( 'slides' )): the_row();
              global $post;
              $post_object = get_sub_field( 'collection' );
              $post = $post_object;
              setup_postdata($post); ?>
                <div class="product-item">

                  <div class="product-item__content">
                    <?php $new = get_field( 'new', get_the_ID() );
                    $perc_sale = get_field( 'perc_sale', get_the_ID() );
                    $price = get_field( 'price', get_the_ID() );
                    if ($new || $perc_sale): ?>
                      <div class="product-item__ribbons">
                        <?php if ($new): ?>
                          <span class="product-item__ribbon product-item__ribbon--new">Новинка</span>
                        <?php endif; ?>
                        <?php if ($perc_sale): ?>
                          <span class="product-item__ribbon product-item__ribbon--sale-perc">-<?php echo $perc_sale; ?>%</span>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>">
                      <h3 class="product-item__title"><?php the_title(); ?></h3>
                    </a>

                    <span class="product-item__cat">Коллекция</span>

                    <div class="product-item__bottom">
                      <?php if ($price): ?>
                        <span class="price"><?php echo $price; ?> KZT</span>
                      <?php endif; ?>
                      <a href="<?php the_permalink(); ?>" class="btn">Показать</a>
                    </div>
                  </div>

                  <div class="product-item__img">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'large' ); ?>
                    </a>
                  </div>

                </div>
              <?php wp_reset_postdata(); endwhile; ?>
            </div>
          <?php else: ?>
            <div class="collection-slider__item collection-slider__item--double swiper-slide">
              <?php while (have_rows( 'slides' )): the_row();
                global $post;
                $post_object = get_sub_field( 'collection' );
                $post = $post_object;
                setup_postdata($post); ?>
              <div class="product-item">

                <div class="product-item__content">
                  <?php $new = get_field( 'new', get_the_ID() );
                  $perc_sale = get_field( 'perc_sale', get_the_ID() );
                  $price = get_field( 'price', get_the_ID() );
                  if ($new || $perc_sale): ?>
                    <div class="product-item__ribbons">
                      <?php if ($new): ?>
                        <span class="product-item__ribbon product-item__ribbon--new">Новинка</span>
                      <?php endif; ?>
                      <?php if ($perc_sale): ?>
                        <span class="product-item__ribbon product-item__ribbon--sale-perc">-<?php echo $perc_sale; ?>%</span>
                      <?php endif; ?>
                      <span class="product-item__cat">Коллекция</span>
                    </div>
                  <?php endif; ?>

                  <a href="<?php the_permalink(); ?>">
                    <h3 class="product-item__title"><?php the_title(); ?></h3>
                  </a>

                  <div class="product-item__bottom">
                    <?php if ($price): ?>
                      <span class="price"><?php echo $price; ?> KZT</span>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" class="btn">Показать</a>
                  </div>
                </div>

                <div class="product-item__img">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'large' ); ?>
                  </a>
                </div>

              </div>
            <?php wp_reset_postdata(); endwhile; ?>
            </div>
          <?php endif;
        endwhile; ?>
      </div>
    </div>

  </div>
</section>
<?php endif; ?>