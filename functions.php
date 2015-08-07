<?php

/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles' );

require_once get_template_directory() . '/inc/colorcase.php';

// Custom Header
$args = array(
  'flex-width'    => true,
  'width'         => 0,
  'flex-height'   => true,
  'height'        => 250,
  'default-image' => get_stylesheet_directory_uri() . '/assets/images/header.jpg',
);

add_theme_support( 'custom-header', $args );

function praise_custom_header() {
  ?>
  <style type="text/css" id="custom-header-css">
    .site-header { background-image: url('<?php header_image() ?>'); }
  </style>
  <?php
}

add_action( 'wp_head', 'praise_custom_header' );
