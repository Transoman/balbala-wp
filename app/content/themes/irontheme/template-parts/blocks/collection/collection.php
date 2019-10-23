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
        <div class="collection-slider__item swiper-slide">
          <div class="product-item">
            
            <div class="product-item__content">
              <div class="product-item__ribbons">
                <div class="product-item__new">Новинка</div>
                <div class="product-item__sale-perc">-10%</div>
              </div>
  
              <a href="#">
                <h3 class="product-item__title">Для женщин</h3>
              </a>
  
              <span class="product-item__cat">Коллекция</span>

              <div class="product-item__bottom">
                <span class="price">от 500 KZT</span>
                <a href="#" class="btn">Показать</a>
              </div>
            </div>

            <div class="product-item__img">
              <a href="#">
                <img src="<?php echo THEME_URL; ?>/images/content/collection-sock.jpg" alt="">
              </a>
            </div>

          </div>
        </div>
        <div class="collection-slider__item collection-slider__item--double swiper-slide">
          <div class="product-item">

            <div class="product-item__content">
              <div class="product-item__ribbons">
                <div class="product-item__new">Новинка</div>
                <div class="product-item__sale-perc">-10%</div>
                <span class="product-item__cat">Коллекция</span>
              </div>

              <a href="#">
                <h3 class="product-item__title">Для мужчин</h3>
              </a>

              <div class="product-item__bottom">
                <span class="price">от 500 KZT</span>
                <a href="#" class="btn">Показать</a>
              </div>
            </div>

            <div class="product-item__img">
              <a href="#">
                <img src="<?php echo THEME_URL; ?>/images/content/collection-sock.jpg" alt="">
              </a>
            </div>

          </div>
          <div class="product-item">

            <div class="product-item__content">
              <div class="product-item__ribbons">
                <div class="product-item__new">Новинка</div>
                <div class="product-item__sale-perc">-10%</div>
                <span class="product-item__cat">Коллекция</span>
              </div>

              <a href="#">
                <h3 class="product-item__title">Для детей</h3>
              </a>

              <div class="product-item__bottom">
                <span class="price">500 KZT</span>
                <a href="#" class="btn">Показать</a>
              </div>
            </div>

            <div class="product-item__img">
              <a href="#">
                <img src="<?php echo THEME_URL; ?>/images/content/collection-sock.jpg" alt="">
              </a>
            </div>

          </div>
        </div>
        <div class="collection-slider__item swiper-slide">
          <div class="product-item">

            <div class="product-item__content">
              <div class="product-item__ribbons">
                <div class="product-item__new">Новинка</div>
                <div class="product-item__sale-perc">-10%</div>
              </div>

              <a href="#">
                <h3 class="product-item__title">Для женщин</h3>
              </a>

              <span class="product-item__cat">Коллекция</span>

              <div class="product-item__bottom">
                <span class="price">от 500 KZT</span>
                <a href="#" class="btn">Показать</a>
              </div>
            </div>

            <div class="product-item__img">
              <a href="#">
                <img src="<?php echo THEME_URL; ?>/images/content/collection-sock.jpg" alt="">
              </a>
            </div>

          </div>
        </div>
        <div class="collection-slider__item collection-slider__item--double swiper-slide">
          <div class="product-item">

            <div class="product-item__content">
              <div class="product-item__ribbons">
                <div class="product-item__new">Новинка</div>
                <div class="product-item__sale-perc">-10%</div>
                <span class="product-item__cat">Коллекция</span>
              </div>

              <a href="#">
                <h3 class="product-item__title">Для мужчин</h3>
              </a>

              <div class="product-item__bottom">
                <span class="price">от 500 KZT</span>
                <a href="#" class="btn">Показать</a>
              </div>
            </div>

            <div class="product-item__img">
              <a href="#">
                <img src="<?php echo THEME_URL; ?>/images/content/collection-sock.jpg" alt="">
              </a>
            </div>

          </div>
          <div class="product-item">

            <div class="product-item__content">
              <div class="product-item__ribbons">
                <div class="product-item__new">Новинка</div>
                <div class="product-item__sale-perc">-10%</div>
                <span class="product-item__cat">Коллекция</span>
              </div>

              <a href="#">
                <h3 class="product-item__title">Для детей</h3>
              </a>

              <div class="product-item__bottom">
                <span class="price">500 KZT</span>
                <a href="#" class="btn">Показать</a>
              </div>
            </div>

            <div class="product-item__img">
              <a href="#">
                <img src="<?php echo THEME_URL; ?>/images/content/collection-sock.jpg" alt="">
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>