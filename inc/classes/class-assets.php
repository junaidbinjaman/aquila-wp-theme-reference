<?php
/**
 * All the assets enqueue happens here.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\inc;

use AQUILA_THEME\inc\traits\Singleton;

/**
 * Assets enqueue handler class
 */
class Assets {
	use Singleton;

	/**
	 * Asset class constructor function.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * The function contains all the hooks of the theme
	 *
	 * @return void
	 */
	protected function setup_hooks() {
		/**
		 * Action hooks
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue theme styles
	 *
	 * @return void
	 */
	public function enqueue_styles() {
		// Register styles.
		wp_register_style(
			'style-css',
			get_stylesheet_uri(),
			array(),
			fileatime( get_template_directory() . '/style.css' ),
			'all'
		);

		wp_register_style(
			'bootstrap-css',
			AQUILA_DIR_URI . '/assets/src/library/bootstrap-4.6.2-dist/css/bootstrap.min.css',
			array(),
			'4.6.2',
			'all'
		);

		// Enqueue styles.
		wp_enqueue_style( 'style-css' );
		wp_enqueue_style( 'bootstrap-css' );
	}

	/**
	 * Enqueue theme scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		// Register scripts.
		wp_register_script(
			'main-js',
			AQUILA_DIR_URI . '/assets/main.js',
			array(),
			fileatime(
				get_template_directory() . '/assets/main.js'
			),
			true
		);

		wp_register_script(
			'bootstrap-js',
			AQUILA_DIR_URI . '/assets/src/library/bootstrap-4.6.2-dist/js/bootstrap.min.js',
			array( 'jquery' ),
			'4.6.2',
			true,
		);

		// Enqueue scripts.
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'bootstrap-js' );
	}
}
