<?php
/**
 * Sidebar (widgetized areas) HTML markup structure.
 *
 * @package      yogaStLouis\utilityPro
 * @link         https://store.carriedils.com/
 * @author       Carrie Dils
 * @copyright    Copyright (c) 2015, Carrie Dils
 * @license      GPL-2.0+
 */

namespace yogaStLouis\utilityPro;

add_action( 'genesis_setup', __NAMESPACE__ . '\utility_pro_register_widget_areas', 8 );
/**
 * Register the sidebar (widgetized areas) enabled in the child theme on front-page.php.
 *
 * @since  1.1.1
 */
function utility_pro_register_widget_areas() {

	$widget_areas = array(
		array(
			'id'          => 'utility-bar',
			'name'        => __( 'Utility Bar', 'CHILD_TEXT_DOMAIN' ),
			'description' => __( 'This is the utility bar across the top of page.', 'CHILD_TEXT_DOMAIN' ),
		),
		array(
			'id'          => 'utility-bar-after-header',
			'name'        => __( 'Utility Bar After Header', 'CHILD_TEXT_DOMAIN' ),
			'description' => __( 'This is the utility bar below the bottom of the header area.', 'CHILD_TEXT_DOMAIN' ),
		),
		array(
			'id'          => 'utility-home-welcome',
			'name'        => __( 'Home Welcome', 'CHILD_TEXT_DOMAIN' ),
			'description' => __( 'This is the welcome section at the top of the home page.', 'CHILD_TEXT_DOMAIN' ),
		),
		array(
			'id'          => 'utility-home-gallery-1',
			'name'        => sprintf( _x( 'Home Gallery %d', 'Group of Home Gallery widget areas', 'CHILD_TEXT_DOMAIN' ), 1 ),
			'description' => sprintf( _x( 'Home Gallery %d widget area on home page.', 'Description of widget area', 'CHILD_TEXT_DOMAIN' ), 1 ),
		),
		array(
			'id'          => 'utility-home-gallery-2',
			'name'        => sprintf( _x( 'Home Gallery %d', 'Group of Home Gallery widget areas', 'CHILD_TEXT_DOMAIN' ), 2 ),
			'description' => sprintf( _x( 'Home Gallery %d widget area on home page.', 'Description of widget area', 'CHILD_TEXT_DOMAIN' ), 2 ),
		),
		array(
			'id'          => 'utility-home-gallery-3',
			'name'        => sprintf( _x( 'Home Gallery %d', 'Group of Home Gallery widget areas', 'CHILD_TEXT_DOMAIN' ), 3 ),
			'description' => sprintf( _x( 'Home Gallery %d widget area on home page.', 'Description of widget area', 'CHILD_TEXT_DOMAIN' ), 3 ),
		),
		array(
			'id'          => 'utility-home-gallery-4',
			'name'        => sprintf( _x( 'Home Gallery %d', 'Group of Home Gallery widget areas', 'CHILD_TEXT_DOMAIN' ), 4 ),
			'description' => sprintf( _x( 'Home Gallery %d widget area on home page.', 'Description of widget area', 'CHILD_TEXT_DOMAIN' ), 4 ),
		),
		array(
			'id'          => 'utility-call-to-action',
			'name'        => __( 'Call to Action', 'CHILD_TEXT_DOMAIN' ),
			'description' => __( 'This is the Call to Action section on the home page.', 'CHILD_TEXT_DOMAIN' ),
		),
	);

	$widget_areas = apply_filters( 'utility_pro_default_widget_areas', $widget_areas );

	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}