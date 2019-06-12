<?php
/**
 *  Site-inner HTML Markup.
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

add_action('genesis_before_content', __NAMESPACE__ . '\render_blog_page_title_after_content_sidebar_wrap' );
/**
 *  Render the blog page title on the front and post pages.
 *
 *  @since 1.0.0
 *
 *  @return void
 */
function render_blog_page_title_after_content_sidebar_wrap() {

	if ( is_front_page() || is_singular( 'post' ) ) {

		include( CHILD_COMPONENTS_DIR . '/site-inner/views/blog-title.php' );
	}
}