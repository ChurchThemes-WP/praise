<?php

/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'praise-fonts', praise_fonts_url() );
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

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Work Sans and Martel by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @return string $fonts_url  Font stylesheet or empty string if disabled.
 */
function praise_fonts_url() {
  $fonts_url = '';

  /* Translators: If there are characters in your language that are not
   * supported by Work Sans, translate this to 'off'. Do not translate
   * into your own language.
   */
  $work_sans = _x( 'on', 'Work Sans font: on or off', 'rock' );

  /* Translators: If there are characters in your language that are not
   * supported by Martel, translate this to 'off'. Do not translate into your
   * own language.
   */
  $martel = _x( 'on', 'Martel font: on or off', 'rock' );

  if ( 'off' !== $work_sans || 'off' !== $martel ) {
    $font_families = array();

    if ( 'off' !== $work_sans )
      $font_families[] = 'Work Sans:400,700,800';

    if ( 'off' !== $martel )
      $font_families[] = 'Martel:400,200,300,600,700,800,900';

    $query_args = array(
      'family' => urlencode( implode( '|', $font_families ) ),
      'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
  }

  return $fonts_url;
}