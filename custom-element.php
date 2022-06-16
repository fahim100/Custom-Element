<?php
/**
 * Plugin Name:       Elementor Custom Element
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Fahim Ahmmed
 * Author URI:        https://fahimahmmed.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       custom-element
 */

if( ! defined ('ABSPATH') ) {
    exit;
}

/**
 * Widgets Loader
 */

require plugin_dir_path(__FILE__).'widgets-loader.php';