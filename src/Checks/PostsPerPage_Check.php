<?php
/**
 * Class PostsPerPage_Check
 *
 * @package FreshCheck
 */

namespace Nilambar\Fresh_Check\Checks;

use WordPress\Plugin_Check\Checker\Checks\Abstract_PHP_CodeSniffer_Check;
use WordPress\Plugin_Check\Traits\Stable_Check;

class PostsPerPage_Check extends Abstract_PHP_CodeSniffer_Check {

	use Stable_Check;

	public function get_categories() {
		return [ 'fresh' ];
	}

	protected function get_args() {
		return [
			'extensions' => 'php',
			'standard'   => FRESH_CHECK_DIR . '/rulesets/postsperpage.xml',
		];
	}
}
