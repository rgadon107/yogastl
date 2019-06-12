<?php
/**
 *  Header HTML markup structure.
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

add_action( 'genesis_before_header', __NAMESPACE__ . '\render_utility_bar_before_header' );
/**
 * Add Utility Bar sidebar (widgetized area) before (above) header.
 *
 * @since 1.0.0
 */
function render_utility_bar_before_header() {

	genesis_widget_area( 'utility-bar', array(
		'before' => '<div class="utility-bar"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

add_filter( 'genesis_site_title_wrap', __NAMESPACE__ . '\filter_site_title_wrap' );
/**
 * Filter the default site title wrapping element
 *
 * @param string $wrap The wrapping element (h1, h2, p, etc.).
 *
 * @since 1.0.0
 *
 */
function filter_site_title_wrap() {
	return 'h1';
}

add_action( 'genesis_after_header', __NAMESPACE__ . '\render_utility_bar_after_header', 6 );
/**
 *  Add Utility Bar sidebar (widgetized area) after (below) header.
 *
 * @since 1.0.0
 *
 */
function render_utility_bar_after_header()  {

	genesis_widget_area( 'utility-bar-after-header',
		array(
			'before' => '<div class="utility-bar-after-header"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}