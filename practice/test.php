<?php
/**
 * The project code practice file
 *
 * @package aquila
 */

spl_autoload_register(
	function ( $classes ) {
		include 'inc/class-' . strtolower( $classes ) . '.php';
	}
);


$student = new Student();
$person  = new Person();

$student->print_string( 'Hello, student! How are you doing?' );
$person->print_string( 'Hello, person! How are you doing?' );

trait Singleton {
	/**
	 * The singleton instance
	 *
	 * @return mixed
	 */
	public static function get_instance() {
		$instance = array();

		$called_class = get_called_class();

		if ( ! isset( $instance[ $called_class ] ) ) {
			$instance[ $called_class ] = new $called_class();
		}

		return $called_class;
	}
}
