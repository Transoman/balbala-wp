<?php
/**
 * Template Name: Главная
 */
get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
          <?php the_content(); ?>
        </div>
    </main><!-- #main -->
  </div><!-- #primary -->
<?php
get_footer();