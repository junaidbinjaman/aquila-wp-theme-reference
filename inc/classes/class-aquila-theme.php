<?php
/**
 * Bootstrap the theme.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\inc;

use AQUILA_THEME\inc\traits\Singleton;

/**
 * The Aquila Theme bootstrap class.
 */
class AQUILA_THEME {
	use Singleton;

	/**
	 * The construct function of the Aquila Theme's bootstrap class
	 */
	protected function __construct() {

		Assets::get_instance();
		Menus::get_instance();

		// load classes.
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
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
	}

	/**
	 * The theme support wrapper function
	 *
	 * @return void
	 */
	public function theme_setup() {
		add_theme_support( 'title-tag' );

		add_theme_support(
			'custom-logo',
			array(
				'height'               => 100,
				'width'                => 400,
				'flex-height'          => true,
				'flex-width'           => true,
				'header-text'          => array( 'site-title', 'site-description' ),
				'unlink-homepage-logo' => true,
			)
		);

		$bg_defaults = array(
			'default-image'      => 'https://servicestack.github.io/images/hero/photo-1503435980610-a51f3ddfee50.jpg',
			'default-preset'     => 'default',
			'default-size'       => 'cover',
			'default-repeat'     => 'no-repeat',
			'default-attachment' => 'scroll',
		);

		add_theme_support( 'custom-background', $bg_defaults );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}
	}
}
