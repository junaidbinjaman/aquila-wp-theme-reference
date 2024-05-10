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
	wp_enqueue_style(
		'style-css',
		get_stylesheet_uri(),
		array(),
		fileatime( get_template_directory() . '/style.css' ),
		'all'
	);

	wp_enqueue_script(
		'main-js',
		get_template_directory_uri() . '/assets/main.js',
		array(),
		fileatime(
			get_template_directory() . '/assets/main.js'
		),
		true
	);
}

add_action( 'wp_enqueue_scripts', 'aquila_enqueue_scripts' );
