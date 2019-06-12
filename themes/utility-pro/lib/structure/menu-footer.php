<?php
/**
 * Utility Pro.
 *
 * @package      yogaStLouis\utilityPro\Structure
 * @link         http://www.carriedils.com/utility-pro
 * @author       Carrie Dils
 * @copyright    Copyright (c) 2015, Carrie Dils
 * @license      GPL-2.0+
 */

namespace yogaStLouis\utilityPro\Structure;

add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_footer_nav_attributes' );
/**
 * Add a navigation area above the site footer and pass in class attributes.
 *
 * @since  1.0.0
 */
function add_footer_nav_attributes() {

	genesis_nav_menu(
		array(
			'menu_class'     => 'menu genesis-nav-menu menu-footer',
			'theme_location' => 'footer',
		)
	);

	// Add schema markup to Footer Navigation Menu.
	add_filter( 'genesis_attr_nav-footer', 'genesis_attributes_nav' );
}

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\limit_depth_of_footer_submenu' );
/**
 * Reduce the footer navigation menu to one level depth.
 *
 * @since  1.1.0
 *
 * @param  array $args Existing footer menu args.
 * @return array Amended footer menu args.
 */
function limit_depth_of_footer_submenu( $args ) {

	if ( 'footer' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;
}