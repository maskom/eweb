<?php
/**
 * Template Name: popular post
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<?php
$popular = new WP_Query(array('posts_per_page'=>20, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
while ($popular->have_posts()) : $popular->the_post(); ?>
  <?php get_template_part('templates/content') ?>
<?php endwhile; wp_reset_postdata(); ?>
