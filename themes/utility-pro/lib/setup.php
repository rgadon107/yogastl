<?php
/**
 *  Setup child theme.
 *
 * @package    yogaStLouis\utilityPro
 *
 * @since      1.0.0
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */

namespace yogaStLouis\utilityPro;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme' );
/**
 *  Setup child theme
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_child_theme() {

	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, CHILD_THEME_DIR . '/assets/languages' );

	add_theme_supports();

	add_new_image_sizes();

	remove_default_sidebars();

	unregister_theme_layouts();

	// Unregister `genesis_skip_links` callback before header.
	remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

	// Remove Genesis post archive pagination (Genesis pagination settings still apply).
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

	// Apply search form enhancements (accessibility).
	add_filter( 'get_search_form', 'utility_pro_get_search_form', 25 );

}

/**
 *  Adds theme supports to site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_theme_supports() {

	$config = array(
		'html5'     => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		),
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),
		'genesis-responsive-viewport'     => true,  // Add viewport meta tag for mobile browsers ('true); ('null') to deactivate.
//		'custom-header'                   => array(
//			'width'           => 640,
//			'height'          => 135,
//			'header-selector' => '.site-title a',
//			'header-text'     => false,
//			'flex-height'     => true,
//		),
		'custom-background'               => array(
			'wp-head-callback' => '__return_false'
		),
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => 3,
		'genesis-style-selector'          => array(
			'utility-pro-purple' => __( 'Purple', CHILD_TEXT_DOMAIN ),
			'utility-pro-green'  => __( 'Green', CHILD_TEXT_DOMAIN ),
			'utility-pro-red'    => __( 'Red', CHILD_TEXT_DOMAIN ),
		),
		'genesis-structural-wraps' => array(
			'footer',
			'footer-widgets',
			'footernav',    // Custom.
			'menu-footer',  // Custom.
			'header',
			'home-gallery', // Custom.
			'nav',
			'subnav',   // Custom
			'site-inner',
			'site-tagline',
		),
		'genesis-menus' => array(
			'primary'   => __( 'Primary Navigation Menu', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Secondary Navigation Menu', CHILD_TEXT_DOMAIN ),
			'footer'    => __( 'Footer Navigation Menu', CHILD_TEXT_DOMAIN ),
		),
		'post-thumbnail'    => array(
			'post',
			'page',
//			'custom-post-type-name',
		)
	);

	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 *  Add new images sizes.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_new_image_sizes() {

	$config = array(
		'post-thumbnail' => array(
			'width'  => 100,
			'height' => 100,
			'crop'   => true,
		),
		'feature-large'  => array(
			'width'  => 960,
			'height' => 330,
			'crop'   => true,
		),
	);

	foreach ( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

/**
 *  Unregister secondary and header-right sidebars.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_default_sidebars()   {

	$config = array(
		'sidebar_id' => array(
			'sidebar-alt',
			'header-right'
		)
	);

	foreach( $config as $sidebar_id => $args )   {
		unregister_sidebar( $sidebar_id );
	}
}

/**
 *  Unregister layouts that use secondary sidebar.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_theme_layouts()    {

	$config = array(
		'layout_id' => array(
			'content-sidebar-sidebar',
			'sidebar-content-sidebar',
			'sidebar-sidebar-content'
		)
	);

	foreach( $config as $layout_id => $args )   {
		genesis_unregister_layout( $layout_id );
	}
}