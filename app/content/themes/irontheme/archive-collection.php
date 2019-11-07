<?php
defined( 'ABSPATH' ) || exit;

get_header(); ?>

  <section class="catalog section-page">
    <div class="container">
      <div class="section-head">
        <div class="section-head__left">
          <h2 class="section-title section-title--page"><?php post_type_archive_title('', true); ?></h2>
          <?php woocommerce_breadcrumb(); ?>
        </div>
      </div>

      <?php
      if (have_posts()):


        while ( have_posts() ) {
         the_post();

          get_template_part( 'template-parts/content', get_post_type() );
        }
      endif; ?>

    </div>
  </section>

<?php get_footer();