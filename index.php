<?php //get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="row">
      <div class="col-md-12">
          <div class="card card-list-article">
              <div class="card-block">
                  <div class="alert alert-warning">
                      <?php _e('Sorry, no results were found.', 'sage'); ?>
                  </div>
                  <?php get_search_form(); ?>
              </div>
          </div>
      </div>
  </div>
  
<?php endif; ?>
<div class="row">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
    <?php endwhile; ?>
</div>

<?php
if ( function_exists('wp_bootstrap_pagination') )
    wp_bootstrap_pagination();
?>
