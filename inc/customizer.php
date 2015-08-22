<?php
/**
 * Theme Customizer Settings
 *
 * @package praise
 */

function praise_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'show_header_bar' , array(
		'default'    => 'false',
		'transport'  => 'refresh',
	) );

	$wp_customize->add_setting( 'header_text1' , array(
		'default'    => 'Change this text in the Customizer.',
		'transport'  => 'refresh',
	) );

	$wp_customize->add_setting( 'header_text2' , array(
		'default'    => 'Change this text in the Customizer.',
		'transport'  => 'refresh',
	) );

	$wp_customize->add_section( 'praise_header' , array(
		'title'      => __( 'Header', 'praise' ),
		'priority'   => 30,
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_header_bar', array(
		'label'      => __( 'Show Header Top Bar?', 'praise' ),
		'section'    => 'praise_header',
		'settings'   => 'show_header_bar',
		'type'       => 'radio',
		'choices'    => array(
							'false' => __( 'No', 'praise' ),
							'true'  => __( 'Yes', 'praise' )
						)
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_text1', array(
		'label'      => __( 'Header Text (Top Left)', 'praise' ),
		'section'    => 'praise_header',
		'settings'   => 'header_text1',
		'type'       => 'textarea',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_text2', array(
		'label'      => __( 'Header Text (Top Right)', 'praise' ),
		'section'    => 'praise_header',
		'settings'   => 'header_text2',
		'type'       => 'textarea',
	) ) );

}
add_action( 'customize_register', 'praise_customize_register' );