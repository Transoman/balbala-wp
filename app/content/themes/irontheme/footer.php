  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <div class="footer__wrap">
        <div class="footer__col footer__col--logo">
          <div class="logo footer__logo">
            <?php the_custom_logo(); ?>
          </div>
          <p>Авторские права © 2019 <br>Все права защищены</p>
        </div>

        <?php if (is_active_sidebar('footer-menu')): ?>
          <div class="footer__col footer__col--menu">
            <?php dynamic_sidebar('footer-menu'); ?>
          </div>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-subscribe')): ?>
          <div class="footer__col footer__col--subscribe">
            <?php dynamic_sidebar('footer-subscribe'); ?>

            <?php $social = get_field('social', 'option'); ?>

            <ul class="social footer__social">
              <?php if ($social['instagram']): ?>
                <li>
                  <a href="<?php echo esc_url($social['instagram']); ?>" target="_blank"><?php ith_the_icon('insta'); ?></a>
                </li>
              <?php endif; ?>
              <?php if ($social['fb']): ?>
                <li>
                  <a href="<?php echo esc_url($social['fb']); ?>" target="_blank"><?php ith_the_icon('fb'); ?></a>
                </li>
              <?php endif; ?>
              <?php if ($social['twitter']): ?>
                <li>
                  <a href="<?php echo esc_url($social['twitter']); ?>" target="_blank"><?php ith_the_icon('twitter'); ?></a>
                </li>
              <?php endif; ?>
            </ul>

          </div>
        <?php endif; ?>
      </div>

      <?php $btn = get_field('policy', 'option');
      if ($btn['url']): ?>
      <p class="footer__policy">
        <a href="<?php echo esc_url($btn['url']); ?>"<?php echo $btn['target'] ? ' target="'.$btn['target'].'"' : ''; ?>><?php echo $btn['title']; ?></a>
      </p>
      <?php endif; ?>
    </div>
  </footer><!-- #colophon -->

</div><!-- /.wrapper -->

<?php wp_footer(); ?>

</body>
</html>
