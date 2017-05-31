<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function custom_query( $query ) {
  if ( ! is_admin() ) {
    if ($query->is_main_query() ) {
       // $query->set('orderby', 'rand');
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', __NAMESPACE__ . '\\custom_query' );

function get_archive($title) {
  return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}
add_filter('get_the_archive_title', __NAMESPACE__ . '\\get_archive');


// DIY Popular Posts @ https://digwp.com/2016/03/diy-popular-posts/
function shapeSpace_popular_posts($post_id) {
  $count_key = 'popular_posts';
  $count = get_post_meta($post_id, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($post_id, $count_key);
    add_post_meta($post_id, $count_key, '0');
  } else {
    $count++;
    update_post_meta($post_id, $count_key, $count);
  }
}
function shapeSpace_track_posts($post_id) {
  if (!is_single()) return;
  if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
  shapeSpace_popular_posts($post_id);
}
add_action('wp_head', __NAMESPACE__ . '\\shapeSpace_track_posts');