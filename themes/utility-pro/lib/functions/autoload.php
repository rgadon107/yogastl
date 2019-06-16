<?php

/**
 * Autoload files in child theme.
 *
 * We could use Composer, but it feels a bit heavy for the number of files we need to load up.  As this is procedural
 * and not OOP, we can handle loading the files directly right here in this file.  Now to add more files to be loaded,
 * well shucks you can do that right here.  A function is provided for each folder.
 *
 * Resist the temptation to add widgets, custom post types, taxonomies, and/or shortcodes in your theme.  Those features
 * go into a plugin and not in your theme.  If you put them here, I want you to picture me shaking my head back and
 * forth.  Come on....I taught you better than that.
 *
 * @package     yogaStLouis\utilityPro\Functions
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        http://spiralwebdb.com
 * @license     GNU General Public License 2.0+
 */
namespace yogaStLouis\utilityPro\Functions;

/**
 *  Loads non-admin files.
 *  Uncomment the ones you want to run, and comment out the ones you don't.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_nonadmin_files() {

	$filenames = array(
		'/setup.php',
//		'/components/customizer/css-handler.php',
//		'/components/customizer/customizer.php',
//		'/components/customizer/helpers.php',
		'/components/author-box.php',
		'/functions/breadcrumb.php',
		'/functions/skip-links.php',
//		'/structure/archive.php',
//		'/structure/comments.php',
		'/structure/footer.php',
		'/structure/header.php',
		'/structure/menu-footer.php',
		'/structure/menu-header.php',
		'/structure/post.php',
		'/structure/site-inner.php',
	);

	load_specified_files( $filenames );

}

//add_action( 'admin_init', __NAMESPACE__ . '\load_admin_files' );
/**
 *  Loads admin files.  Preregister callback to event only if admin file(s) are needed.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_admin_files() {

	$filenames = array(

	);

	load_specified_files( $filenames );
}

/**
 *  Helper function used above to load each of the specified files.
 *
 * @since 1.0.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {

	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';

	foreach( $filenames as $filename ) {
		include( $folder_root . $filename );
	}
}

load_nonadmin_files();