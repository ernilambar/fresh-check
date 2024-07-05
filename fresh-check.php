<?php
/**
 * Plugin Name: Fresh Check
 * Plugin URI: https://github.com/ernilambar/fresh-check
 * Description: Addon for Plugin Check.
 * Version: 1.0.0
 * Author: Nilambar Sharma
 * Author URI: https://www.nilambar.net/
 * Text Domain: fresh-check
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


use Nilambar\Fresh_Check\Checks\PostsPerPage_Check;

// Define.
define( 'FRESH_CHECK_VERSION', '1.0.0' );
define( 'FRESH_CHECK_BASE_NAME', basename( __DIR__ ) );
define( 'FRESH_CHECK_BASE_FILEPATH', __FILE__ );
define( 'FRESH_CHECK_BASE_FILENAME', plugin_basename( __FILE__ ) );
define( 'FRESH_CHECK_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'FRESH_CHECK_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );

// Include autoload.
if ( file_exists( FRESH_CHECK_DIR . '/vendor/autoload.php' ) ) {
	include_once FRESH_CHECK_DIR . '/vendor/autoload.php';
}

add_filter(
	'wp_plugin_check_checks',
	function ( array $checks ) {
		$checks['postsperpage'] = new PostsPerPage_Check();

		return $checks;
	},
	999
);
