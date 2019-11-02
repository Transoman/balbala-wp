<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header<?php echo !is_home() || !is_front_page() ? ' header--inner' : ''; ?>">
    <div class="container">

      <div class="logo header__logo">
        <?php the_custom_logo(); ?>
      </div>

      <div class="header__nav">
        <button type="button" class="nav-toggle">
          <span class="nav-toggle__line"></span>
        </button>

        <nav class="nav">
          <button type="button" class="nav__close"></button>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav-list',
            'menu_id'         => '',
          ) );
          ?>
        </nav>
      </div>

      <div class="nav-overlay"></div>

      <div class="phone header__phone">
        <?php $phone = get_field( 'phone', 'option' ); 
        $email = get_field( 'email', 'option' ); 
        if ($phone): ?>
          <a href="tel:<?php echo preg_replace( '![^0-9/+]+!', '', $phone ); ?>" class="phone__tel">
            <?php ith_the_icon( '24-hours' ); ?>
            <?php echo $phone; ?>
          </a><br>
        <?php endif; ?>
        <?php if ($email): ?>
          <a href="mailto:<?php echo $email; ?>" class="phone__email"><?php echo $email; ?></a>
        <?php endif; ?>
      </div>

      <div class="header-actions header__actions">
        <div class="header-actions__item header-telegram">
          <a href="#" class="header-actions__toggle">
            <?php ith_the_icon( 'telegram', 'header-actions__icon' ); ?>
          </a>
        </div>

        <div class="header-actions__item header-search">
          <button type="button" class="header-actions__toggle header-search__toggle">
            <?php ith_the_icon( 'loupe', 'header-actions__icon' ); ?>
          </button>
          <div class="header-search__wrap">
            <button type="button" class="header-search__close"></button>
            <form action="<?php echo home_url( '/' ); ?>" class="header-search__form">
              <input type="search" name="s" placeholder="Поиск товаров..." class="form-field header-search__field">
              <button type="submit" class="header-search__btn">
                <?php ith_the_icon( 'loupe' ); ?>
              </button>
            </form>
          </div>
        </div>

        <div class="header-actions__item header-cart">
          <a href="<?php echo wc_get_cart_url(); ?>" class="header-actions__toggle header-cart__toggle">
            <?php ith_the_icon( 'shopping-cart', 'header-actions__icon' ); ?>
            <?php ith_header_cart_count(); ?>
          </a>
        </div>
      </div>

    </div>
  </header><!-- /.header-->

  <div class="content">