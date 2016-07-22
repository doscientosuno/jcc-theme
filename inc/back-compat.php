<?php
/**
 * JCC Theme back compat functionality
 *
 * Prevents JCC Theme from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage JCC Theme
 * @since JCC Theme 1.0
 */

/**
 * Prevent switching to JCC Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since JCC Theme 1.0
 */
function jcc_theme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'jcc_theme_upgrade_notice' );
}
add_action( 'after_switch_theme', 'jcc_theme_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * JCC Theme on WordPress versions prior to 4.1.
 *
 * @since JCC Theme 1.0
 */
function twentyfifteen_upgrade_notice() {
	$message = sprintf( __( 'JCC Theme requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'jcc-theme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since JCC Theme 1.0
 */
function twentyfifteen_customize() {
	wp_die( sprintf( __( 'JCC Theme requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'jcc-theme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'jcc_theme_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since JCC Theme 1.0
 */
function jcc_theme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'JCC Theme requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'jcc-theme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'jcc_theme_preview' );
