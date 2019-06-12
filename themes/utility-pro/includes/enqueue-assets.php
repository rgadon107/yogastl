<?php
/**
 * Enqueue child theme assets.
 *
 * @package      yogaStLouis\utilityPro
 * @link         http://www.carriedils.com/utility-pro
 * @author       Carrie Dils
 * @copyright    Copyright (c) 2015, Carrie Dils
 * @license      GPL-2.0+
 */

namespace yogaStLouis\utilityPro;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_theme_assets' );
/**
 * Enqueue theme assets.
 *
 * @since 1.0.0
 */
function enqueue_theme_assets() {

	// Replace style.css with style-rtl.css for RTL languages.
	wp_style_add_data( CHILD_TEXT_DOMAIN, 'rtl', 'replace' );

	// Load mobile responsive menu.
	wp_enqueue_script( 'utility-pro-responsive-menu', CHILD_THEME_URL . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );

	$localize = array(
		'buttonText'     => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'buttonLabel'    => __( 'Primary Navigation Menu', CHILD_TEXT_DOMAIN ),
		'subButtonText'  => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'subButtonLabel' => __( 'Sub Navigation Menu', CHILD_TEXT_DOMAIN ),
	);

	// Localize the responsive menu script (for translation).
	wp_localize_script( CHILD_TEXT_DOMAIN . '-responsive-menu', 'utilityResponsiveL10n', $localize );

	// Keyboard navigation (dropdown menus) script.
	wp_enqueue_script( 'genwpacc-dropdown',  CHILD_THEME_URL . '/js/genwpacc-dropdown.js', array( 'jquery' ), false, true );

	// Load skiplink scripts only if Genesis Accessible plugin is not active.
	if ( ! check_genesis_accessible_plugin_is_active() ) {

		wp_enqueue_script( 'genwpacc-skiplinks-js',  CHILD_THEME_URL . '/js/genwpacc-skiplinks.js', array(), '1.0.0', true );
	}

	// Load remaining scripts only if custom background is being used
	// and we're on the home page or a page using the landing page template.
	if ( ! get_background_image() || ( ! ( is_front_page() || is_page_template( 'page_landing.php' ) ) ) ) {
		return;
	}

	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-backstretch', get_stylesheet_directory_uri() . '/js/backstretch.min.js', array( 'jquery' ), '2.0.1', true );
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-backstretch-args', get_stylesheet_directory_uri() . '/js/backstretch.args.js', array( 'utility-pro-backstretch' ), CHILD_THEME_VERSION, true );

	wp_localize_script( CHILD_TEXT_DOMAIN . '-backstretch-args', 'utilityBackstretchL10n', array( 'src' => get_background_image() ) );

	// Add support for WordPress dashicons.
	wp_enqueue_style( 'dashicons' );
}
