<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://kunalsaha@wisdmlabs.com
 * @since      1.0.0
 *
 * @package    Daily_Posts_Report
 * @subpackage Daily_Posts_Report/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Daily_Posts_Report
 * @subpackage Daily_Posts_Report/includes
 * @author     Kunal Saha <sahakunal1803@gmail.com>
 */
class Daily_Posts_Report_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'daily-posts-report',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
