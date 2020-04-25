<?php

/**
 * Init class for Vimeo autoplay plugin
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

class Vimeo_Autoplay {

	/**
	 * The one and only true Vimeo_Autoplay instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @var object $instance
	 */
	private static $instance;

	/**
	 * Plugin version
	 *
	 * @since 1.0.0
	 * @var string
	 */
	private $version = '1.0.0';

	/**
	 * Instantiate the main class
	 *
	 * This function instantiates the class, initialize all functions and return the object.
	 *
	 * @since 1.0.0
	 * @return object The one and only true Vimeo_Autoplay instance.
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) && ( ! self::$instance instanceof Vimeo_Autoplay ) ) {

			self::$instance = new Vimeo_Autoplay;
			self::$instance->set_up_constants();
			self::$instance->includes();

		}

		return self::$instance;
	}

	/**
	 * Function for setting up constants
	 *
	 * This function is used to set up constants used throughout the plugin.
	 *
	 * @since 1.0.0
	 */
	public function set_up_constants() {

		self::set_up_constant( 'VIMEO_AUTOPLAY_VERSION', $this->version );
		self::set_up_constant( 'VIMEO_AUTOPLAY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) . '../' );
		self::set_up_constant( 'VIMEO_AUTOPLAY_PLUGIN_URL', plugin_dir_url( __FILE__ ) . '../' );
		self::set_up_constant( 'VIMEO_AUTOPLAY_LIBRARIES_PATH', plugin_dir_path( __FILE__ ) );

	}

	/**
	 * Make new constants
	 *
	 * @param string $name
	 * @param mixed $val
	 *
	 * @since 1.0.0
	 */
	public static function set_up_constant( $name, $val = false ) {

		if ( ! defined( $name ) ) {
			define( $name, $val );
		}

	}

	/**
	 * Includes all necessary PHP files
	 *
	 * This function is responsible for including all necessary PHP files.
	 *
	 * @since 1.0.0
	 */
	public function includes() {

		if ( defined( 'VIMEO_AUTOPLAY_LIBRARIES_PATH' ) ) {
			require VIMEO_AUTOPLAY_LIBRARIES_PATH . '/vimeo-autoplay-frontend.php';
		}

	}

}