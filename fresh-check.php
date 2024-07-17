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
 * Requires Plugins: plugin-check
 */

use Nilambar\Fresh_Check\Checks\PostsPerPage_Check;
use Nilambar\Fresh_Check\Checks\Prohibited_Text_Check;

// Define.
define( 'FRESH_CHECK_VERSION', '1.0.0' );
define( 'FRESH_CHECK_BASE_NAME', basename( __DIR__ ) );
define( 'FRESH_CHECK_BASE_FILEPATH', __FILE__ );
define( 'FRESH_CHECK_BASE_FILENAME', plugin_basename( __FILE__ ) );
define( 'FRESH_CHECK_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'FRESH_CHECK_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );

// Include autoload.
if ( file_exists( FRESH_CHECK_DIR . '/vendor/autoload.php' ) ) {
	require_once FRESH_CHECK_DIR . '/vendor/autoload.php';
}

// Register check category.
add_filter(
	'wp_plugin_check_categories',
	function ( array $categories ) {
		return array_merge( $categories, [ 'fresh' => esc_html__( 'Fresh', 'fresh-check' ) ] );
	}
);

// Set default category.
add_filter(
	'wp_plugin_check_default_categories',
	function () {
		return [
			'general',
			'fresh',
		];
	}
);

// Register checks.
add_filter(
	'wp_plugin_check_checks',
	function ( array $checks ) {
		require_once FRESH_CHECK_DIR . '/src/Checks/PostsPerPage_Check.php';
		require_once FRESH_CHECK_DIR . '/src/Checks/Prohibited_Text_Check.php';
		return array_merge(
			$checks,
			[
				'postsperpage'    => new PostsPerPage_Check(),
				'prohibited_text' => new Prohibited_Text_Check(),
			]
		);
	}
);
