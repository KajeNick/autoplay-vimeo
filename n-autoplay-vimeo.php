<?php
/**
 * Plugin Name: N-Autoplay For Vimeo Videos
 * Plugin URI: https://wordpress.org/plugins/autoplay-vimeo/
 * Description: Autoplay all videos from page by shortcode [autoplay-vimeo]
 * Version: 1.0.0
 * Author: NSukonny
 * Author URI: https://nsukonny.ru
 * Text Domain: autoplay-vimeo
 * Domain Path: /languages
 * License: GPLv2 or later
 * Requires at least: 4.0
 * Tested up to: 5.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NAutoplay_Vimeo' ) ) {

	include_once dirname( __FILE__ ) . '/libraries/autoplay-vimeo.php';

}

/**
 * The main function for returning NAutoplay_Vimeo instance
 *
 * @since 1.0.0
 *
 * @return object The one and only true NAutoplay_Vimeo instance.
 */
function autoplay_vimeo_runner() {

	return NAutoplay_Vimeo::instance();
}

autoplay_vimeo_runner();