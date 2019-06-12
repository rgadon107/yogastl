<?php
/**
 *  Menu HTML markup structure.
 *
 * @package    yogaStLouis\utilityPro\Structure
 *
 * @since      1.0.0
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */

namespace yogaStLouis\utilityPro\Structure;

add_action( 'genesis_before_header', __NAMESPACE__ . '\reorder_nav_menus_before_header' );
/**
 *  Reorder the primary and secondary navigation menus to appear before the header.
 *  Uncomment the event to activate feature.
 *
 * @since  1.0.1
 */
function reorder_nav_menus_before_header() {

	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_before_header', 'genesis_do_nav' );
	add_action( 'genesis_before_header', 'genesis_do_subnav' );

}

add_action( 'genesis_after_header', __NAMESPACE__ . '\render_header_menu_nav_container', 5 );
/*
 * Call menu component view file to render navigation container within the site-header.
 *
 * @since 1.0.0
 */
function render_header_menu_nav_container() {
	include CHILD_COMPONENTS_DIR . '/menu/views/header-navigation.php';
}