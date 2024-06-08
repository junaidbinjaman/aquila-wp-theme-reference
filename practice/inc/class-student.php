<?php
/**
 * The student class
 *
 * @package aquila
 */

/**
 * The student class
 */
class Student {

	/**
	 * The student string printing function
	 *
	 * @param string $string The string that a user passes.
	 * @return void
	 */
	public function print_string( $string ) {
		echo $string; // phpcs:ignore
	}
}

$student = new Student();

$student->print_string( 'Hello, student! How are you doing?' );
