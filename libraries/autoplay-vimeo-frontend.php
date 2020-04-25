<?php
/**
 * Class NAutoplay_Vimeo_Fontend
 * Init all methods for work
 *
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

class NAutoplay_Vimeo_Fontend {

	/**
	 * NAutoplay_Vimeo_Fontend initialization.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		add_shortcode( 'autoplay-vimeo', array( $this, 'show_option' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ), 10 );

		add_action( 'wp_ajax_change_autoload', array( $this, 'ajax_change_autoload' ), 99 );
		add_action( 'wp_ajax_nopriv_change_autoload', array( $this, 'ajax_change_autoload' ), 99 );

	}

	/**
	 * Init frontend scripts
	 *
	 * @since 1.0.0
	 */
	public function add_scripts() {

		wp_enqueue_style( 'autoplay-vimeo-style', AUTOPLAY_VIMEO_PLUGIN_URL . '/assets/style.css' );

		wp_enqueue_script( 'autoplay-vimeo-scripts', AUTOPLAY_VIMEO_PLUGIN_URL . '/assets/scripts.js',
			array( 'jquery' ), time(), true );

		wp_enqueue_script( 'autoplay-vimeo-player-js', 'https://player.vimeo.com/api/player.js',
			array( 'jquery' ), time(), true );

		wp_localize_script(
			'autoplay-vimeo-scripts',
			'ajax_object',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			)
		);

	}

	/**
	 * Display on/off option
	 *
	 * @since 1.0.0
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	public function show_option( $attrs ) {

		$autoplay_vimeo = get_user_meta( get_current_user_id(), 'autoplay_vimeo', true );

		$display = '<label class="autoplay-vimeo-label">
						<input class="cb cb1" type="checkbox" name="autoplay_vimeo" '
		           . checked( $autoplay_vimeo, 1, false ) . ' />
  						<i></i> 
  						<span>Auto play videos</span>
                    </label>';

		return $display;
	}

	/**
	 * Save autoload state
	 *
	 * @since 1.0.0
	 */
	public function ajax_change_autoload() {

		ob_clean();

		update_user_meta( get_current_user_id(), 'autoplay_vimeo', $_POST['state'] == 1 ? 1 : 0 );
		wp_send_json_success();
		wp_die();

	}
}

function legacy_geo_members_runner() {

	$frontend = new NAutoplay_Vimeo_Fontend;
	$frontend->init();

	return true;
}

legacy_geo_members_runner();