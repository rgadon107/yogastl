<?php
/**
 *  Description
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

add_filter( 'genesis_footer_creds_text', __NAMESPACE__ . '\filter_footer_creds' );
/**
 * Filter the footer text to include link to child theme URL.
 *
 * @since  1.0.1
 *
 * @param string $creds_text Existing credentials.
 *
 * @return string Footer credentials, as shortcodes.
 */
function filter_footer_creds( $creds_text ) {

	return '[footer_copyright first="2015"] &middot; <a href="<?php CHILD_THEME_URL; ?>">Utility Pro</a>.';
}