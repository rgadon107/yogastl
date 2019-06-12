<?php
/**
 * Functions (bootstrap) file for the Utility Pro child theme.
 *
 * @package      yogaStLouis\utilityPro
 * @link         http://www.spiralwebdb.com
 * @author       Robert A. Gadon
 * @license      GPL-2.0+
 */

namespace yogaStLouis\utilityPro;

include_once( 'lib/init.php' );

include_once( 'lib/functions/autoload.php' );

// This file loads the Google fonts used in this theme.
require CHILD_THEME_INCLUDES . '/google-fonts.php';

// This file contains search form improvements.
require CHILD_THEME_INCLUDES . '/class-search-form.php';

// Add theme widget areas.
include CHILD_THEME_INCLUDES . '/widget-areas.php';

// Miscellaenous functions used in theme configuration.
include CHILD_THEME_INCLUDES . '/theme-config.php';

// Add scripts to enqueue.
include CHILD_THEME_INCLUDES . '/enqueue-assets.php';

// Start the Genesis Framework
include_once( get_template_directory() . '/lib/init.php' );