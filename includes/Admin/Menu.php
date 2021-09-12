<?php

namespace Base\Plugin\Admin;

/**
 * Menu
 */
class Menu {

	/**
	 * Function __construct
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Function admin_menu
	 *
	 * @return void
	 */
	public function admin_menu() {
		add_menu_page( __( 'Base Plugin', 'base-plugin' ), __( 'Base Plugin', 'base-plugin' ), 'manage_options', 'base-plugin', array( $this, 'plugin_page' ), 'dashicons-art', 2 );

	}

	/**
	 * Function plugin_page
	 *
	 * @return void
	 */
	public function plugin_page() {
		echo 'Base Plugin';
	}
}
