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
          <div class="contact-dropdown__head">Нур-Султан</div>
          <div class="contact-dropdown__body">
            <ul class="contact-dropdown__list">
              <?php $i = 0; while ($branches->have_posts()): $branches->the_post();
              $location = get_field('location', get_the_ID()); ?>
                <li<?php echo $i++ == 0 ? ' class="active"' : ''; ?>>
                  <a href="#" data-id="<?php echo get_post_field('post_name'); ?>" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"><?php the_title(); ?></a>
                </li>
              <?php endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>

        <div id="contact-map" class="contact__map"></div>
      </div>

      <div class="contact__right">
        <h3>Контакты</h3>
        <?php $i = 0; while ($branches->have_posts()): $branches->the_post(); ?>
          <div class="contact__content<?php echo $i++ == 0 ? ' active' : ''; ?>" id="<?php echo get_post_field('post_name'); ?>">
            <div class="contact__address">
              <?php the_content(); ?>
            </div>

            <?php
              $phone = get_field( 'phone', get_the_ID() );
              $email = get_field( 'email', get_the_ID() );
             if ($phone): ?>
              <a href="tel:<?php echo preg_replace( '![^0-9/+]+!', '', $phone ); ?>" class="contact__data">
                <?php ith_the_icon('phone'); ?>
                <?php echo $phone; ?>
              </a><br>
            <?php endif; ?>
            <?php if ($email): ?>
              <a href="mailto:<?php echo $email; ?>" class="contact__data">
                <?php ith_the_icon('email'); ?>
                <?php echo $email; ?>
              </a>
            <?php endif; ?>

          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

    </div>

    <script>
      var myMap;
      function init() {
        var locations = [
          <?php while ($branches->have_posts()): $branches->the_post();
          $location = get_field( 'location', get_the_ID() ); ?>
            [<?php echo (float) $location['lat']; ?>, <?php echo (float) $location['lng']; ?>],
          <?php endwhile; wp_reset_postdata(); ?>
        ];

        myMap = new ymaps.Map('contact-map', {
          center: [48.5517362041292,66.9044335],
          controls: [],
          zoom: 3
        });

        myMap.setCenter(locations[0],17, { checkZoomRange: true });

        for (var i = 0; i < locations.length; i++) {
          myMap.geoObjects
            .add(new ymaps.Placemark(locations[i]))
        }

        var coords = document.querySelectorAll('.contact-dropdown__list a');
        coords.forEach(function(obj) {
          obj.addEventListener('click', function(e) {
            var lat = obj.getAttribute('data-lat');
            var lng = obj.getAttribute('data-lng');

            myMap.setCenter([lat, lng],17, { checkZoomRange: true });
          });
        });

      }
    </script>
    <script async defer src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=init"></script>
  <?php endif; ?>
</section>