<?php
/**
 * Plugin name: Base Plugin
 * Description: A basic plugin boilarplate.
 * Version: 1.0
 *
 * @package BasePlugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class BasePlugin {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	/**
	 * Class __construct.
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return \BasePlugin
	 */
	public static function init() {

		static $instance = false;
		if ( ! $instance ) {
			$instance = new self();
		}
		return $instance;

	}

	/**
	 * Define the required constants.
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'BASE_PLUGIN_VERSION', self::version );
		define( 'BASE_PLUGIN_FILE', __FILE__ );
		define( 'BASE_PLUGIN_PATH', __DIR__ );
		define( 'BASE_PLUGIN_URL', plugins_url( '', BASE_PLUGIN_FILE ) );
		define( 'BASE_PLUGIN_ASSETS', BASE_PLUGIN_URL . '/assets' );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {
		if ( is_admin() ) {
			new Base\Plugin\Admin();
		} else {
			new Base\Plugin\Frontend();
		}
	}
	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function activate() {
		$installed = get_option( 'base_plugin_installed' );

		if ( ! $installed ) {
			update_option( 'base_plugin_installed', time() );
		}

		update_option( 'base_plugin_version', BASE_PLUGIN_VERSION );
	}

}

/**
 * Initializing the main plugin
 *
 * @return \BasePlugin
 */
function base_plugin() {
	return BasePlugin::init();
}

// kick-off the plugin.
base_plugin();
