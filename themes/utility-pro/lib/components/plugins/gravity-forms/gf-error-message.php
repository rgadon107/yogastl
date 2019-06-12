<?php
/**
 *  Gravity Forms.
 *
 * @package    yogaStLouis\utilityPro\Components\Plugins
 *
 * @since      1.0.0
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */

namespace yogaStLouis\utilityPro\Components\Plugins;

add_filter( 'gform_validation_message_2', __NAMESPACE__ . '\change_error_message' );
/**
 *  Filter Gravity Forms error message in 'full name' fields used on front-page Email Signup Form .
 *
 * @since 1.0.0
 *
 * @return string $message
 */
function change_error_message( $message ) {

	include CHILD_COMPONENTS_DIR . '/plugins/gravity-forms/views/gf-error-view.php';

	return $message;
}