<?php
/**
 *  Asset loader handler.
 *
 * @package    yogaStLouis\utilityPro\Functions
 *
 * @since      1.0.0
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */
namespace yogaStLouis\utilityPro\Functions;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_style_assets' );
/**
 *  Enqueue Scripts and Styles
 *
 *  @since 1.0.0
 *
 *  @return void
 */
function enqueue_style_assets() {

	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'style', get_stylesheet_uri() . '/style.css' );

	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-responsive-menu', CHILD_URL . '/js/responsive-menu.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	$localized_script_args = array(
		'mainMenu' => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'subMenu'  => __( 'Menu', CHILD_TEXT_DOMAIN ),
	);
	wp_localize_script( CHILD_TEXT_DOMAIN . '-responsive-menu', 'genesis-developerL10n', $localized_script_args );

}