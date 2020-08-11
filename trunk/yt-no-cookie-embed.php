<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://punktbar.de
 * @since             1.0.0
 * @package           Yt_No_Cookie_Embed
 *
 * @wordpress-plugin
 * Plugin Name:       Youtube No-Cookie Embed
 * Description:       This plugin extends the Fusion Builder plugin with a "Youtube (No-Cookie)" page builder element.
 * Version:           1.0.0
 * Author:            punktbar
 * Author URI:        https://punktbar.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yt-no-cookie-embed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'YT_NO_COOKIE_EMBED_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yt-no-cookie-embed-activator.php
 */
function activate_yt_no_cookie_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yt-no-cookie-embed-activator.php';
	Yt_No_Cookie_Embed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yt-no-cookie-embed-deactivator.php
 */
function deactivate_yt_no_cookie_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yt-no-cookie-embed-deactivator.php';
	Yt_No_Cookie_Embed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yt_no_cookie_embed' );
register_deactivation_hook( __FILE__, 'deactivate_yt_no_cookie_embed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yt-no-cookie-embed.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_yt_no_cookie_embed() {

	$plugin = new Yt_No_Cookie_Embed();
	$plugin->run();

}
run_yt_no_cookie_embed();
