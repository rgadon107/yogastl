<?php
/**
 *  Author box customizations.
 *
 * @package    yogaStLouis\utilityPro\Components
 *
 * @since      1.0.0
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */

namespace yogaStLouis\utilityPro\Components;

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\customize_author_box_gravatar_size' );
/**
 * Customize the Gravatar size in the author box.
 *
 * @since 1.0.0
 *
 * @param int $size Existing pixel size of gravatar.
 *
 * @return int Pixel size of gravatar.
 */
function customize_author_box_gravatar_size( $size ) {
	return 96;
}