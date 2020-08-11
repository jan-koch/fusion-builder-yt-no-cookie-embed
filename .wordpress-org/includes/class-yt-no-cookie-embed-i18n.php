<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://punktbar.de
 * @since      1.0.0
 *
 * @package    Yt_No_Cookie_Embed
 * @subpackage Yt_No_Cookie_Embed/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Yt_No_Cookie_Embed
 * @subpackage Yt_No_Cookie_Embed/includes
 * @author     punktbar <kontakt@punktbar.de>
 */
class Yt_No_Cookie_Embed_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'yt-no-cookie-embed',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
