<?php
/**
 * The main function file of the theme.
 *
 * @package Aquila
 */

/**
 * Enqueue the scripts & styles
 *
 * @return void
 */
function aquila_enqueue_scripts() {
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
		get_template_directory_uri() . '/assets/src/library/bootstrap-4.6.2-dist/css/bootstrap.min.css',
		array(),
		'4.6.2',
		'all'
	);

	// Register scripts.
	wp_register_script(
		'main-js',
		get_template_directory_uri() . '/assets/main.js',
		array(),
		fileatime(
			get_template_directory() . '/assets/main.js'
		),
		true
	);

	wp_register_script(
		'bootstrap-js',
		get_template_directory_uri() . '/assets/src/library/bootstrap-4.6.2-dist/js/bootstrap.min.js',
		array( 'jquery' ),
		'4.6.2',
		true,
	);

	// Enqueue styles.
	wp_enqueue_style( 'style-css' );
	wp_enqueue_style( 'bootstrap-css' );

	// Enqueue scripts.
	wp_enqueue_script( 'main-js' );
	wp_enqueue_script( 'bootstrap-js' );
}

add_action( 'wp_enqueue_scripts', 'aquila_enqueue_scripts' );
