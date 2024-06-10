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



