<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://kunalsaha@wisdmlabs.com
 * @since             1.0.0
 * @package           Daily_Posts_Report
 *
 * @wordpress-plugin
 * Plugin Name:       Daily-Posts
 * Plugin URI:        https://Daily_Posts_Report@ksaha.com
 * Description:       This plugin will help in updating daily report in a fixed time.
 * Version:           1.0.0
 * Author:            Kunal Saha
 * Author URI:        https://kunalsaha@wisdmlabs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       daily-posts-report
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
define( 'DAILY_POSTS_REPORT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-daily-posts-report-activator.php
 */
function activate_daily_posts_report() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-daily-posts-report-activator.php';
	Daily_Posts_Report_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-daily-posts-report-deactivator.php
 */
function deactivate_daily_posts_report() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-daily-posts-report-deactivator.php';
	Daily_Posts_Report_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_daily_posts_report' );
register_deactivation_hook( __FILE__, 'deactivate_daily_posts_report' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-daily-posts-report.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
// remove schedule when deactivating plugin
function remove_schedule()
{
	wp_clear_scheduled_hook('send_admin_email');
}

register_deactivation_hook(__FILE__, 'remove_schedule');

function run_daily_posts_report() {

	$plugin = new Daily_Posts_Report();
	$plugin->run();

}
run_daily_posts_report();
