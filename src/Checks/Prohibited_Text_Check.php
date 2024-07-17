<?php
/**
 * Class Prohibited_Text_Check
 *
 * @package FreshCheck
 */

namespace Nilambar\Fresh_Check\Checks;

use WordPress\Plugin_Check\Checker\Check_Result;
use WordPress\Plugin_Check\Checker\Checks\Abstract_File_Check;
use WordPress\Plugin_Check\Traits\Amend_Check_Result;
use WordPress\Plugin_Check\Traits\Stable_Check;

class Prohibited_Text_Check extends Abstract_File_Check {

	use Amend_Check_Result;
	use Stable_Check;

	public function get_categories() {
			return [ 'fresh' ];
	}

	protected function check_files( Check_Result $result, array $files ) {
		$php_files = self::filter_files_by_extension( $files, 'php' );
		var_dump( $php_files );
		$file      = self::file_preg_match( '#(violence|inhuman)#', $php_files );

		if ( $file ) {
				$this->add_result_error_for_file(
					$result,
					__( 'Prohibited text found.', 'fresh-check' ),
					'prohibited_text_detected',
					$file
				);
		}
	}
}
