<?php

/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles' );

require_once get_template_directory() . '/inc/colorcase.php';
