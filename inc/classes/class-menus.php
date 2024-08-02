<?php
/**
 * The site navigation menu.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\inc;

use AQUILA_THEME\inc\traits\Singleton;

/**
 * Navigation menu handler
 */
class Menus {
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
		add_action( 'init', array( $this, 'register_menus' ) );
	}

	/**
	 * Register site menus
	 *
	 * @return void
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'aquila-header-menu' => esc_html__( 'Header Menu', 'aquila' ),
				'aquila-footer-menu' => esc_html__( 'Footer Menu', 'aquila' ),
			)
		);
	}

	/**
	 * Get the menu id.
	 *
	 * @param string $location The theme location.
	 * @return int;
	 */
	public function get_menu_id( $location ) {
		$locations = get_nav_menu_locations();

		$menu_id = $locations[ $location ];

		return ! empty( $menu_id ) ? $menu_id : '';
	}

	/**
	 * The child menu items
	 *
	 * @param array $menu_array The menu array.
	 * @param int   $parent_id parent menu id.
	 * @return array
	 */
	public function get_child_menu_items( $menu_array, $parent_id ) {
		$child_menus = array();

		if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
			foreach ( $menu_array as $menu ) {
				if ( intval( $menu->menu_item_parent ) === $parent_id ) {
					array_push( $child_menus, $menu );
				}
			}
		}

		return $child_menus;
	}
}
