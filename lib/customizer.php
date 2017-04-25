<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');


/**
 * remove  head scripts
 */
function remove_head_scripts() {

    //remove Emoji, we are not using it
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action ( 'wp_head', 'rsd_link' );
    //Remove WP generator from header, this is security potential.
    remove_action('wp_head', 'wp_generator');
    add_action('wp_footer', 'wp_print_scripts', 1);
    add_action('wp_footer', 'wp_enqueue_scripts', 1);
    add_action('wp_footer', 'wp_print_head_scripts', 1);
    //Remove WP Rest API
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\remove_head_scripts', 100);
