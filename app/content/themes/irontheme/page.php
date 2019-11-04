<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mytheme
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <section class="section-page">
        <div class="container">

          <div class="section-head">
            <div class="section-head__left">
              <h2 class="section-title section-title--page"><?php the_title(); ?></h2>
              <?php woocommerce_breadcrumb(); ?>
            </div>
          </div>

          <?php
          while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;

          endwhile; // End of the loop.
          ?>

        </div>
      </section>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
