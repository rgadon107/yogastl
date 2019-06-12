<?php
/**
 *  Theme Initialization file.
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

/**
 *  Initialize the theme's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */

function init_constants() {

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name') );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI') );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version') );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain') );

	// Define Directory Location Constants.
	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_THEME_INCLUDES', CHILD_THEME_DIR . '/includes' );
	define( 'CHILD_COMPONENTS_DIR', CHILD_THEME_DIR  . '/lib/components' );

}

init_constants();