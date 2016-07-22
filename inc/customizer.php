<?php
/**
 * Twenty Fifteen Customizer functionality
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function jcc_theme_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
  	'label'      => __( 'Upload a logo', 'jcc-theme' ),
		'section'    => 'images',
		'settings'   => 'your_setting_id',
		'context'    => 'your_setting_context'
  )));
}
add_action( 'customize_register', 'jcc_theme_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Fifteen 1.0
 */
function jcc_theme_customize_preview_js() {
	wp_enqueue_script( 'jcc_theme-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'jcc_theme_customize_preview_js' );
