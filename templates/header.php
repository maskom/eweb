<header class="banner" id="header">
  <nav class="navbar  navbar-white fixed-top">
    <div class="container container_header">
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" alt="<?php bloginfo('name'); ?>">
        <img class="hidden-sm-down" src="<?php echo get_stylesheet_directory_uri().'/dist/images/logo_siteV2.png' ?>" alt="<?php bloginfo('name'); ?>"/>
        <img class="hidden-md-up logo-mobile" src="<?php echo get_stylesheet_directory_uri().'/dist/images/logo_site_mobileV1.png' ?>" alt="<?php bloginfo('name'); ?>"/>
      </a>
      <div class="my-2 my-lg-0 float-right wrap-search">
        <?php get_search_form(); ?>
      </div>
    </div>
  </nav>
</header>
