<?php
/**
 * The person class file
 *
 * @package aquila
 */

/**
 * The person class
 */
class Person {

	/**
	 * The person string printing function
	 *
	 * @param string $str The string that a user passes.
	 * @return void
	 */
	public function print_string( $str ) {
		echo $str; // phpcs:ignore
	}
}

$person = new Person();

$person->print_string( 'Hello, person! How are you doing?' );
