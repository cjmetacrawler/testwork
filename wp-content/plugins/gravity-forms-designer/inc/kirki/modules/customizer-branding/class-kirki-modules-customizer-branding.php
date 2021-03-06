<?php
/**
 * Changes the customizer's branding.
 * For documentation please see
 * https://github.com/aristath/kirki/wiki/Styling-the-Customizer
 *
 * @package     Kirki
 * @category    Modules
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds styles to the customizer.
 */
class Kirki_Modules_Customizer_Branding {

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 3.0.0
	 */
	public function __construct() {

		add_action( 'customize_controls_print_scripts', array( $this, 'customize_controls_print_scripts' ) );

	}

	/**
	 * Enqueues the script responsible for branding the customizer
	 * and also adds variables to it using the wp_localize_script function.
	 * The actual branding is handled via JS.
	 *
	 * @access public
	 * @since 3.0.0
	 */
	public function customize_controls_print_scripts() {

		$config = apply_filters( 'kirki/config', array() );
		$vars   = array(
			'logoImage'   => '',
			'description' => '',
		);
		if ( isset( $config['logo_image'] ) && '' !== $config['logo_image'] ) {
			$vars['logoImage'] = esc_url_raw( $config['logo_image'] );
		}
		if ( isset( $config['description'] ) && '' !== $config['description'] ) {
			$vars['description'] = esc_textarea( $config['description'] );
		}

		if ( ! empty( $vars['logoImage'] ) || ! empty( $vars['description'] ) ) {
			wp_register_script( 'kirki-branding', Kirki::$url . '/modules/customizer-branding/branding.js' );
			wp_localize_script( 'kirki-branding', 'kirkiBranding', $vars );
			wp_enqueue_script( 'kirki-branding' );
		}
	}
}
