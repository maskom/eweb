<header class="banner" id="header">
  <nav class="navbar  navbar-main fixed-top">
    <div class="container container_header">
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'menu_id' => 'nav-primary']);
      endif;
      ?>
    </div>
  </nav>
</header>
