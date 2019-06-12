<?php

/**
 *  Breadcrumb navigation handling.
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

add_action( 'genesis_before_content', __NAMESPACE__ . '\reorder_breadcrumbs', 8 );
/**
 *  Reorder position of breadcrumbs on single posts and pages.
 */
function reorder_breadcrumbs()  {

	add_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

}


