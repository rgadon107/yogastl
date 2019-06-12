<?php
/**
 * Utility Pro.
 *
 * @package      yogaStLouis\utilityPro
 * @link         http://www.carriedils.com/utility-pro
 * @author       Carrie Dils
 * @copyright    Copyright (c) 2015, Carrie Dils
 * @license      GPL-2.0+
 */

namespace yogaStLouis\utilityPro;

// Enable shortcodes in widgets.
add_filter( 'widget_text', 'do_shortcode' );

add_filter( 'theme_page_templates', __NAMESPACE__ . '\utility_pro_remove_genesis_page_templates' );
/**
 * Remove Genesis Blog page template.
 *
 * @param array $page_templates Existing recognised page templates.
 * @return array Amended recognised page templates.
 */
function utility_pro_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}

/**
 * Customize the search form to improve accessibility.
 *
 * The instantiation can accept an array of custom strings, should you want
 * the search form have different strings in different contexts.
 *
 * @since 1.0.0
 *
 * @return string Search form markup.
 */
function utility_pro_get_search_form() {
	$search = new Utility_Pro_Search_Form;
	return $search->get_form();
}

/**
 * Check whether Genesis Accessible plugin is active.
 *
 * If the Genesis Accessible plugin is in use, disable certain accessibility
 * features in Utility Pro and default to plugin settings to avoid unneccessary
 * scripts from loading.
 *
 * @since  1.0.0
 *
 * @return boolean
 */
function check_genesis_accessible_plugin_is_active() {
	return function_exists( 'genwpacc_genesis_init' );
}

function launch_utility_skip_links()    {
	// Load accesibility components if the Genesis Accessible plugin is not active.
	if ( ! check_genesis_accessible_plugin_is_active() ) {

		// Load skip links (accessibility).
		include CHILD_THEME_INCLUDES . '/skip-links.php';
	}
}