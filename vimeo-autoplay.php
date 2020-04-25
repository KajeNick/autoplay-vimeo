<?php
/**
 * Plugin Name: Vimeo autoplay
 * Plugin URI: https://nsukonny.ru/vimeo-autoplay
 * Description: Autoplay all videos from page by shortcode [vimeo-autoplay]
 * Version: 1.0.0
 * Author: NSukonny
 * Author URI: https://nsukonny.ru
 * Text Domain: vimeo-autoplay
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Vimeo_Autoplay' ) ) {

	include_once dirname( __FILE__ ) . '/libraries/vimeo-autoplay.php';

}

/**
 * The main function for returning Vimeo_Autoplay instance
 *
 * @since 1.0.0
 *
 * @return object The one and only true Vimeo_Autoplay instance.
 */
function vimeo_autoplay_runner() {

	return Vimeo_Autoplay::instance();
}

vimeo_autoplay_runner();