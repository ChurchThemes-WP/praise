<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package praise
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses praise_header_style()
 * @uses praise_admin_header_style()
 * @uses praise_admin_header_image()
 */
function praise_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'praise_custom_header_args', array(
		'default-image'          => get_stylesheet_directory_uri() . '/assets/images/header.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 1500,
		'height'                 => 300,
		'flex-height'            => true,
		'wp-head-callback'       => 'praise_header_style'
	) ) );
}
add_action( 'after_setup_theme', 'praise_custom_header_setup' );

if ( ! function_exists( 'praise_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see praise_custom_header_setup().
 */
function praise_header_style() {

	?>
	<style type="text/css" id="praise-header-image">
	.site-header{
		background-image: url("<?php header_image(); ?>");
	}
	</style>
	<?php

	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	// If the header text has been hidden.
	} else {
	?>
		<style type="text/css" id="praise-header-css">
			.site-title,
			.site-description {
				clip: rect(1px, 1px, 1px, 1px);
				position: absolute;
			}
		</style>
	<?php
	}
}
endif; // praise_header_style