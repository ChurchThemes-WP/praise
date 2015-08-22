<?php

/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'praise-fonts', praise_fonts_url() );
}

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles' );

require_once get_stylesheet_directory() . '/inc/colorcase.php';

require_once get_stylesheet_directory() . '/inc/customizer.php';

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
 * The use of Lato and Source Serif Pro by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @return string $fonts_url  Font stylesheet or empty string if disabled.
 */
function praise_fonts_url() {
  $fonts_url = '';

  /* Translators: If there are characters in your language that are not
   * supported by Lato, translate this to 'off'. Do not translate
   * into your own language.
   */
  $lato = _x( 'on', 'Lato font: on or off', 'rock' );

  /* Translators: If there are characters in your language that are not
   * supported by Source Serif Pro, translate this to 'off'. Do not translate into your
   * own language.
   */
  $source_serif = _x( 'on', 'Source Serif Pro font: on or off', 'rock' );

  if ( 'off' !== $lato || 'off' !== $source_serif ) {
    $font_families = array();

    if ( 'off' !== $lato )
      $font_families[] = 'Lato:400,700,900';

    if ( 'off' !== $source_serif )
      $font_families[] = 'Source Serif Pro:400,700';

    $query_args = array(
      'family' => urlencode( implode( '|', $font_families ) ),
      'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
  }

  return $fonts_url;
}

function praise_add_header_bar(){
  if( get_theme_mod( 'show_header_bar' ) === 'true' ){
    get_template_part( 'header', 'bar' );
  }
}

add_action( 'rock_header_before', 'praise_add_header_bar' );