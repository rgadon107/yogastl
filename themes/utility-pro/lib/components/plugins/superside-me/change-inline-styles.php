<?php
/**
 *  Description
 *
 * @package    yogaStLouis\utilityPro\Components\Plugins\SuperSideMe
 *
 * @since      1.0.0
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */

namespace yogaStLouis\utilityPro\Components\Plugins\SuperSideMe;

//add_filter( 'supersideme_modify_display_css', __NAMESPACE__ . '\modify_nav_menu_inline_css' );
/**
 *  Modify inline CSS to avoid targeting `nav` HTML tag.
 *
 *  @since 1.0.0
 *
 *  @param $hidden array Array of nav elements targeted with `display: none`.
 *
 *  @return $hidden array Remove `nav` element from targeted array.
 */
function modify_nav_menu_inline_css( $hidden )    {

	$hidden = array_slice( $hidden, 1, 5 );

	return $hidden;
}