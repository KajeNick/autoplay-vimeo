<?php
/**
 * Plugin Name: Autoplay for vimeo videos
 * Plugin URI: https://nsukonny.ru/
 * Description: Autoplay all videos from page by shortcode [autoplay-vimeo]
 * Version: 1.0.0
 * Author: NSukonny
 * Author URI: https://nsukonny.ru
 * Text Domain: autoplay-vimeo
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Autoplay_Vimeo' ) ) {

	include_once dirname( __FILE__ ) . '/libraries/autoplay-vimeo.php';

}

/**
 * The main function for returning Autoplay_Vimeo instance
 *
 * @since 1.0.0
 *
 * @return object The one and only true Autoplay_Vimeo instance.
 */
function autoplay_vimeo_runner() {

	return Autoplay_Vimeo::instance();
}

autoplay_vimeo_runner();