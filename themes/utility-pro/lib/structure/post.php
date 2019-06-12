<?php
/**
 *  Post structure handling.
 *
 * @package    yogaStLouis\utilityPro\Structure
 *
 * @since      1.1.1
 *
 * @author     Robert A. Gadon
 *
 * @link       http://spiralwebdb.com
 *
 * @license    GNU General Public License 2.0+
 */

namespace yogaStLouis\utilityPro\Structure;

// Remove links from post titles.  Uncomment to activate.
//add_filter( 'genesis_link_post_title', '__return_false' );

add_filter( 'the_content', __NAMESPACE__ . '\render_featured_image_with_single_post_content' );
/**
 * Add featured image above single posts.
 *
 * Outputs image as part of the post content, so it's included in the RSS feed.
 * H/t to Robin Cornett for the suggestion of making image available to RSS.
 *
 * @since 1.1.0
 *
 * @param string $content Post content.
 *
 * @return null|string Return early if not a single post or there is no thumbnail.
 *                     Image and content markup otherwise.
 */
function render_featured_image_with_single_post_content( $content ) {

	if ( ! is_singular( 'post' ) || ! has_post_thumbnail() ) {
		return $content;
	}

	$image = '<div class="featured-image">';
	$image .= get_the_post_thumbnail( get_the_ID(), 'feature-large' );
	$image .= '</div>';

	return $image . $content;
}

//add_filter( 'the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
//add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
/**
 * Change the default 'Read More...' link HTML markup and content.
 *
 * @since 1.0.0
 *
 * @param string $html
 *
 * @return string
 */
function change_the_read_more_link( $html ) {
	$html = change_read_more_text( $html, __( 'Continue reading', 'utility-pro' ) );
	if ( doing_filter( 'get_the_content_more_link' ) ) {
		$html = strip_off_read_more_opening_dots( $html );
		return '</p><p>' . $html;
	}
	return sprintf( '<p>%s</p>', $html );
}

/**
 * Strips off the read more link's opening dot pattern.
 *
 * @since 1.0.0
 *
 * @param string $html
 * @param string $dots Dots pattern to strip off
 *
 * @return string
 */
function strip_off_read_more_opening_dots( $html, $dots = '&#x02026; ' ) {
	return substr( $html, strlen( $dots ) );
}

/**
 * Replace the read more text from the Genesis default text of '[Read more...]' to
 * the new specified replacement text.
 *
 * @since 1.0.0
 *
 * @param string $html Read more link HTML
 * @param string $replacement_text Replacement text
 *
 * @return string
 */
function change_read_more_text( $html, $replacement_text ) {
	$text_to_replace = __( '[Read more...]', 'utility-pro' );
	return str_replace( $text_to_replace, $replacement_text, $html );
}

//add_filter( 'post_class', __NAMESPACE__ . '\add_to_post_classes_for_grid_pattern' );
/**
 * Add attributes to the post class based on the number of columns selected.
 *
 * @since 1.0.0
 *
 * @param array     $classes    An Array of post classes.
 * @return array    $classes    An Array of post classes.
 */
function add_to_post_classes_for_grid_pattern( array $classes ) {
	if ( ! is_array( $classes ) )   {
		return $classes;
	}
	if ( ! is_home() )  {
		return $classes;
	}
	// Default $number_of_columns = 2.
	// Pass an integer from 2 - 6 along with $classes to specify number_of_columns.
	return get_classes_for_grid_pattern( $classes, 2 );
}

/**
 * Get the styling classes for the grid pattern based on the number of columns .
 *
 * @since 1.0.0
 *
 * @param   array   $classes                Post classes.
 * @param   int     $number_of_classes      Number of columns to set for this grid pattern.
 *
 * @return  array
 */
function get_classes_for_grid_pattern( array $classes, $number_of_columns = 2 )    {
	if ( $number_of_columns < 2 || $number_of_columns > 6 ) {
		return $classes;
	}
	// Call the global instance of the WP_Query and WP_Post objects to interact with their properties.
	global $wp_query;
	// The index position with the array equals $number_of_columns.
	$column_classes = array(
		'',              // index 0
		'',              // index 1
		'one-half',      // index 2 = represents 2 columns
		'one-third',     // index 3
		'one-fourth',    // index 4
		'one-fifth',     // index 5
		'one-sixth',     // index 6
	);
	// Copy the column class out of the array above, and add it to the end of the $classes array.
	// Limit the addition of column classes to 'post' post types only.
	if ( is_post_of_post_type() ) {
		$classes[] = $column_classes[ $number_of_columns ];
	}
	// Add the 'first' styling class to $classes[] when the modulus remainder == 0.
	if ( $wp_query->current_post % $number_of_columns == 0 ) {
		$classes[] = 'first';
	}
	return $classes;
}
/**
 * Checks if the current (or specified) post is of the specified post type.
 *
 * @since 1.0.0
 *
 * @param string            $post_type
 * @param int|WP_Post|null $post_or_post_id     Post ID or post object. When `null`,
 *                          WordPress uses global $post.
 *
 * @uses  get_post_type()     Retrieve the post type of the current post or of a given post.
 *
 * @return bool
 */
function is_post_of_post_type( $post_type = 'post', $post_or_post_id = null ) {
	return get_post_type( $post_or_post_id ) == $post_type;
}


add_action( 'genesis_after_endwhile', __NAMESPACE__ . '\add_accessible_posts_pagination' );
/**
 * Use WordPress archive pagination.
 *
 * Return a paginated navigation to next/previous set of posts, when
 * applicable. Includes screen reader text for better accessibility.
 *
 * @since  1.0.0
 *
 * @see the_posts_pagination()
 */
function add_accessible_posts_pagination() {

	$args = array(
		'mid_size' => 2,
		'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', CHILD_TEXT_DOMAIN ) . ' </span>',
	);

	if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		the_posts_pagination( $args );
	} else {
		the_posts_navigation( $args );
	}
}