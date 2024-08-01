<?php
/**
 * The Aquila Theme Traits File
 *
 * @package Aquila
 */

namespace AQUILA_THEME\inc\traits;

trait Singleton {
	/**
	 * The constructor function
	 */
	public function __construct() {
	}

	/**
	 * The clone function;
	 *
	 * @return void
	 */
	public function __clone() {
	}

	/**
	 * The class instance function
	 *
	 * @return array
	 */
	final public static function get_instance() {
		static $instance = array();

		$called_class = get_called_class();

		if ( ! isset( $instance[ $called_class ] ) ) {
			$instance[ $called_class ] = new $called_class();

			do_action( sprintf( 'aquila_theme_singleton_init%s', $called_class ) );
		}

		return $instance[ $called_class ];
	}
}
